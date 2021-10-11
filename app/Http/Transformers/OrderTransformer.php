<?php

namespace App\Http\Transformers;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class OrderTransformer implements ITransformer
{
    /**
     * {@inheritDoc}
     */
    public function transform(Model $model): array
    {
        return [
            Order::DELIVERY_DATE => $model->delivery_date,
            'user' => $this->includeUser($model),
            'tariff' => $this->includeTariff($model),
        ];
    }

    /**
     * @param Order|Model $order
     *
     * @return array
     */
    private function includeUser(Order $order): array
    {
        $transformer = new UserTransformer();
        return $transformer->transform($order->user);
    }

    /**
     * @param Order|Model $order
     *
     * @return array
     */
    private function includeTariff(Order $order): array
    {
        $transformer = new TariffTransformer();
        return $transformer->transform($order->tariff);
    }
}
