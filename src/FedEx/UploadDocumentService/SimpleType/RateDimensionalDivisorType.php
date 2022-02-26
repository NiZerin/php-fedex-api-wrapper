<?php
namespace FedEx\UploadDocumentService\SimpleType;

use FedEx\AbstractSimpleType;

/**
 * Indicates the reason that a dim divisor value was chose.
 *
 * @package     PHP FedEx API wrapper
 * @subpackage  Upload Document Service
 */
class RateDimensionalDivisorType extends AbstractSimpleType
{
    const _COUNTRY = 'COUNTRY';
    const _CUSTOMER = 'CUSTOMER';
    const _OTHER = 'OTHER';
    const _PRODUCT = 'PRODUCT';
    const _WAIVED = 'WAIVED';
}