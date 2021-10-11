<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class OrderData extends DataTransferObject
{
    /**
     * Delivery date.
     *
     * @var string
     */
    public $delivery_date;
}
