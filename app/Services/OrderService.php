<?php

namespace App\Services;

use App\DTO\OrderData;
use App\Exceptions\ServiceException;
use App\Models\Order;
use App\Models\Tariff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Order business-logic service.
 */
class OrderService
{
    /**
     * Returns all orders.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Order::all();
    }

    /**
     * Create a new order.
     *
     * @param OrderData $orderData Order data to create
     * @param User $user The user who create a new order
     * @param Tariff $tariff The tariff that was chosen
     *
     * @return Order
     *
     * @throws ServiceException
     */
    public function create(OrderData $orderData, User $user, Tariff $tariff): Order
    {
        $deliveryDayName = strtolower(Carbon::create($orderData->delivery_date)->shortDayName);
        $tariffDeliveryDays = $tariff->getDeliveryDays();

        if (!in_array($deliveryDayName, $tariffDeliveryDays)) {
            throw new ServiceException(
                "The $tariff->name tariff can delivery only in following days: "
                .implode(",", $tariffDeliveryDays)
            );
        }
        $order = new Order($orderData->toArray());

        $order->user()->associate($user);
        $order->tariff()->associate($tariff);

        $order->save();

        return $order;
    }
}
