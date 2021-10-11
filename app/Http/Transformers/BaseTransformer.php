<?php

namespace App\Http\Transformers;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

class BaseTransformer extends TransformerAbstract implements ITransformer
{
    /**
     * {@inheritDoc}
     */
    public function transform(Model $model): array
    {
        return $model->toArray();
    }
}
