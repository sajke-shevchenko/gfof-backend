<?php

namespace App\Http\Transformers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserTransformer implements ITransformer
{
    /**
     * {@inheritDoc}
     */
    public function transform(Model $model): array
    {
        return [
            User::ID => $model->id,
            User::NAME => $model->name,
            User::EMAIL => $model->email,
            User::PHONE => $model->phone,
            User::ADDRESS => $model->address,
        ];
    }
}
