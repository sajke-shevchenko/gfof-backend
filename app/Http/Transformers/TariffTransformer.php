<?php

namespace App\Http\Transformers;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Model;

class TariffTransformer implements ITransformer
{
    /**
     * {@inheritDoc}
     */
    public function transform(Model $model): array
    {
        return [
            Tariff::ID => $model->id,
            Tariff::NAME => $model->name,
            Tariff::PRICE => $model->price,
            'delivery_days' => $model->getDeliveryDays(),
        ];
    }
}
