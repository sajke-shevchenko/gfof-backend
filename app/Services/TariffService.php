<?php

namespace App\Services;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * Tariff business-logic service.
 */
class TariffService
{
    /**
     * Returns all tariffs.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Tariff::all();
    }

    /**
     * Returns tariff model by given identifier.
     *
     * @param int $id The tariff identifier.
     *
     * @return Tariff|Model
     */
    public function getById(int $id): Tariff
    {
        return Tariff::query()->where(Tariff::ID, '=', $id)->first();
    }
}
