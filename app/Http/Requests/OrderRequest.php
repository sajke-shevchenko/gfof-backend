<?php

namespace App\Http\Requests;

use App\DTO\OrderData;
use App\DTO\UserData;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Order request.
 *
 * @property-read int $tariff_id
 */
class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'delivery_date' => ['required', 'date', 'after:today'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:12'],
            'address' => ['required', 'string', 'max:255'],
            'tariff_id' => ['required', 'integer', 'exists:tariffs,id'],
        ];
    }

    /**
     * Returns the order data.
     *
     * @return OrderData
     */
    public function getOrderData(): OrderData
    {
        return new OrderData([
            'delivery_date' => $this->get('delivery_date'),
        ]);
    }

    /**
     * Returns the user data.
     *
     * @return UserData
     */
    public function getUserData(): UserData
    {
        return new UserData([
            'name' => $this->get('name'),
            'phone' => $this->get('phone'),
            'address' => $this->get('address'),
        ]);
    }
}
