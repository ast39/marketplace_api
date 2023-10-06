<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\OrderFilter;
use App\Http\Libs\AppError;
use App\Http\Requests\OrderPositions\OrderPositionsStoreRequest;
use App\Http\Requests\Orders\OrderFilterRequest;
use App\Http\Requests\Orders\OrderStoreRequest;
use App\Http\Requests\Orders\OrderUpdateRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderPosition;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;


class OrderController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Order list
     *
     * @param OrderFilterRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function index(OrderFilterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $filter = app()->make(OrderFilter::class, [
            'queryParams' => array_filter($data)
        ]);

        $orders = Order::filter($filter)
            ->get() ?: null;

        return OrderResource::collection($orders)
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Order info
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $order = Order::find($id);

        if (is_null($order)) {
            return (new ErrorResource(new AppError(903)))
                ->response()
                ->setStatusCode(404);
        }

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Add new order
     *
     * @param OrderStoreRequest $order_request
     * @param OrderPositionsStoreRequest $position_request
     * @return JsonResponse
     */
    public function store(OrderStoreRequest $order_request, OrderPositionsStoreRequest $position_request): JsonResponse
    {
        $data_order     = $order_request->validated();
        $data_positions = $position_request->validated();

        $order_id = Order::create($data_order)->order_id;
        foreach ($data_positions['positions'] as $position) {
            OrderPosition::create([
                'order_id'   => $order_id,
                'product_id' => $position['product_id'],
                'price'      => $position['price'],
                'discount'   => $position['discount'],
                'amount'     => $position['amount'],
            ]);
        }

        return response()->json([
            'data' => $order_id ?? null,
        ], 201);
    }

    /**
     * Update order
     *
     * @param OrderUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(OrderUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();

        $order = Order::find($id);

        if (is_null($order)) {
            return (new ErrorResource(new AppError(903)))
                ->response()
                ->setStatusCode(404);
        }

        return response()->json([
            'data' => $order->update($data),
        ], 200);
    }

    /**
     * Delete order
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $order = Order::find($id);

        if (is_null($order)) {
            return (new ErrorResource(new AppError(903)))
                ->response()
                ->setStatusCode(404);
        }

        return response()->json([
            'data' => $order->delete(),
        ], 200);
    }
}
