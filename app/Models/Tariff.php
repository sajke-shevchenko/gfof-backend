<?php

namespace App\Models;

use App\Enums\WeekDays;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * The tariff model.
 *
 * @property int $id Tariff identifier
 * @property string $name Tariff name
 * @property string $price Tariff price
 */
class Tariff extends Model
{
    public const ID = 'id';
    public const NAME = 'name';
    public const PRICE = 'price';

    /**
     * Returns days to delivery.
     *
     * @return array
     */
    public function getDeliveryDays(): array
    {
        $deliveryDays = Arr::where($this->toArray(), function ($value, $key) {
            return in_array($key, WeekDays::getConstants()) && $value == 1;
        });
        return array_keys($deliveryDays);
    }
}
