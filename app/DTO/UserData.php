<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    /**
     * User name.
     *
     * @var string
     */
    public $name;

    /**
     * User phone.
     *
     * @var string
     */
    public $phone;

    /**
     * User address.
     *
     * @var string
     */
    public $address;
}
