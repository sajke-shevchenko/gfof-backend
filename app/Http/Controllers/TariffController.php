<?php

namespace App\Http\Controllers;

use App\Http\Transformers\TariffTransformer;
use App\Models\Tariff;
use App\Services\TariffService;
use Illuminate\Http\JsonResponse;

class TariffController extends Controller
{
    /**
     * Tariff business-logic service.
     *
     * @var TariffService
     */
    private $tariffService;

    /**
     * Tariff CRUD controller.
     *
     * @param TariffService $tariffService Tariff business-logic service.
     * @param TariffTransformer $tariffTransformer Tariff transformer
     */
    public function __construct(TariffService $tariffService, TariffTransformer $tariffTransformer)
    {
        parent::__construct($tariffTransformer);
        $this->tariffService = $tariffService;
    }

    /**
     * Returns all tariffs.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->collection($this->tariffService->getAll(), $this->transformer);
    }

    /**
     * Retrieve tariff details.
     *
     * @param Tariff $tariff The tariff to retrieve details
     *
     * @return JsonResponse
     */
    public function show(Tariff $tariff): JsonResponse
    {
        return $this->item($tariff, $this->transformer);
    }
}
