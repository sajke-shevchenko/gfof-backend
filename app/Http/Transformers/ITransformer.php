<?php

namespace App\Http\Transformers;

use Illuminate\Database\Eloquent\Model;

interface ITransformer
{
    /**
     * Transform given model.
     *
     * @param Model $model Model to transform
     *
     * @return array
     */
    public function transform(Model $model): array;
}
