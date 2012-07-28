<?php
namespace FedEx\RateService\ComplexType;

use FedEx\AbstractComplexType;

/**
 * Image to be included from printer's memory, or from a local file for offline clients.
 *
 * @author      Jeremy Dunn <jeremy@jsdunn.info>
 * @package     PHP FedEx API wrapper
 * @subpackage  Rate Service
 */
class CustomLabelGraphicEntry
    extends AbstractComplexType
{
    protected $_name = 'CustomLabelGraphicEntry';

    /**
     * 
     *
     * @param CustomLabelPosition $Position
     * return CustomLabelGraphicEntry
     */
    public function setPosition(CustomLabelPosition $position)
    {
        $this->Position = $position;
        return $this;
    }
    
    /**
     * Printer-specific index of graphic image to be printed.
     *
     * @param string $PrinterGraphicId
     * return CustomLabelGraphicEntry
     */
    public function setPrinterGraphicId($printerGraphicId)
    {
        $this->PrinterGraphicId = $printerGraphicId;
        return $this;
    }
    
    /**
     * Fully-qualified path and file name for graphic image to be printed.
     *
     * @param string $FileGraphicFullName
     * return CustomLabelGraphicEntry
     */
    public function setFileGraphicFullName($fileGraphicFullName)
    {
        $this->FileGraphicFullName = $fileGraphicFullName;
        return $this;
    }
    

    
}