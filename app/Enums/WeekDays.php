<?php

namespace App\Enums;

/** Week days enum. */
class WeekDays
{
    public const MONDAY = 'mon';
    public const TUESDAY = 'tue';
    public const WEDNESDAY = 'wed';
    public const THURSDAY = 'thu';
    public const FRIDAY = 'fri';
    public const SATURDAY = 'sat';
    public const SUNDAY = 'sun';

    /**
     * Returns all constants.
     *
     * @return string[]
     */
    public static function getConstants(): array
    {
        return [
            self::MONDAY,
            self::TUESDAY,
            self::WEDNESDAY,
            self::THURSDAY,
            self::FRIDAY,
            self::SATURDAY,
            self::SUNDAY,
        ];
    }
}
