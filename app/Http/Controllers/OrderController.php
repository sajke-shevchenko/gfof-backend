<?php

namespace App\Http\Controllers;

use App\Exceptions\ServiceException;
use App\Http\Requests\OrderRequest;
use App\Http\Transformers\OrderTransformer;
use App\Services\OrderService;
use App\Services\TariffService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse as Response;

class OrderController extends Controller
{
    /**
     * Order business-logic service.
     *
     * @var OrderService
     */
    private $orderService;

    private $userService;

    private $tariffService;

    /**
     * Order CRUD controller.
     *
     * @param OrderService $orderService Order business-logic service
     * @param TariffService $tariffService Tariff business-logic service
     * @param UserService $userService User business-logic service
     * @param OrderTransformer $orderTransformer Order transformer
     */
    public function __construct(
        OrderService $orderService,
        TariffService $tariffService,
        UserService $userService,
        OrderTransformer $orderTransformer
    ) {
        parent::__construct($orderTransformer);
        $this->orderService = $orderService;
        $this->tariffService = $tariffService;
        $this->userService = $userService;
    }

    /**
     * Returns all orders.
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->collection($this->orderService->getAll(), $this->transformer);
    }

    /**
     * Create a new order.
     *
     * @param OrderRequest $request Order request to validate data
     *
     * @return Response
     *
     * @throws ServiceException
     */
    public function store(OrderRequest $request): Response
    {
        $user = $this->userService->getByPhone($request->getUserData());
        $tariff = $this->tariffService->getById($request->tariff_id);

        $order = $this->orderService->create($request->getOrderData(), $user, $tariff);

        return $this->item($order, $this->transformer, Response::HTTP_CREATED);
    }
}
