<?php

namespace App\Http\Controllers;

use App\Http\Transformers\BaseTransformer;
use App\Http\Transformers\ITransformer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse as Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Base transformer.
     *
     * @var ITransformer
     */
    protected $transformer;

    /**
     * Base controller constructor.
     *
     * @param ITransformer|null $transformer Base transformer
     */
    public function __construct(?ITransformer $transformer = null)
    {
        $this->transformer = $transformer ?? new BaseTransformer();
    }

    /**
     * Returns response with the transformed data in the envelope.
     *
     * @param Collection $data Data to response
     * @param ITransformer $transformer Transformer to transform
     *
     * @return Response
     */
    protected function collection(Collection $data, ITransformer $transformer): Response
    {
        return response()->json([
            'results' => $data->map(function (Model $model) use ($transformer) {
                return $transformer->transform($model);
            }),
        ]);
    }

    /**
     * Returns response with the transformed data.
     *
     * @param Model $model Model to response
     * @param ITransformer $transformer Transformer to transform
     * @param int|null $statusCode Status code
     * @return Response
     */
    protected function item(Model $model, ITransformer $transformer, ?int $statusCode = Response::HTTP_OK): Response
    {
        return response()->json($transformer->transform($model), $statusCode);
    }
}
