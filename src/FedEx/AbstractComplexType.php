<?php
namespace FedEx;

/**
 * Abstract class for SimpleTypes
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 */
abstract class AbstractComplexType
{

    /**
     * Holds the data as a key => value array
     *
     * @var array
     */
    protected $values = [];

    /**
     * The name of the extended class/data type
     *
     * @var string
     */
    protected $name;

    /**
     * Constructor
     *
     * @param array $options Data as key => value array
     */
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            foreach ($options as $name => $value) {
                $this->$name = $value;
            }
        }
    }

    /**
     * __set implementation
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        $setValueMethod = "set{$name}";
        if (method_exists($this, $setValueMethod)) {
            $this->$setValueMethod($value);
        }
    }

    /**
     * __get implementation
     *
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return (isset($this->values[$name])) ? $this->values[$name] : null;
    }

    /**
     * Recursive algorthim to convert complex types to an array
     *
     * @param array $arrayValues
     * @return array
     */
    protected function convertToArray($arrayValues)
    {
        $returnArray = array();

        foreach ($arrayValues as $key => $value) {
            if ($value instanceof self) {
                $returnArray[$key] = $value->toArray();
            } else if (is_array($value)) {
                $returnArray[$key] = $this->convertToArray($value);
            } else {
                if ($value instanceof SimpleType\AbstractSimpleType) {
                    $returnArray[$key] = (string)$value;
                } else {
                    $returnArray[$key] = $value;
                }
            }
        }

        return $returnArray;
    }

    /**
     * Returns the complex type as an array
     *
     * @param boolean $renderTopKey
     * @return array
     */
    public function toArray($renderTopKey = false)
    {
        $returnArray = $this->convertToArray($this->values);

        if ($renderTopKey) {
            return array($this->name => $returnArray);
        } else {
            return $returnArray;
        }
    }
}
