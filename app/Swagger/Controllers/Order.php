<?php

namespace App\Swagger\Controllers;

class Order {

    /**
     *  @OA\Get(
     *     path="/order",
     *     operationId="order.index",
     *     summary="Order list",
     *     description="Order list",
     *     tags={"Orders"},
     *     @OA\Parameter(name="owner", in="query", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="about", in="query", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="status", in="query", required=false, @OA\Schema(type="integer", enum={"-1", "0", "1", "2", "3", "4", "5", "9"})),
     *     @OA\Response(
     *         response="200",
     *         description="Array of orders",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", type="array", @OA\Items(ref="#/components/schemas/order")),
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function index() {}

    /**
     *  @OA\Get(
     *     path="/order/{id}",
     *     operationId="order.show",
     *     summary="Order info",
     *     description="Order info",
     *     tags={"Orders"},
     *     @OA\Parameter(name="id", in="path", description="Order ID", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="Order unfo",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", ref="#/components/schemas/order"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Order not found.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function show() {}

    /**
     * @OA\Post(
     *     path="/order",
     *     operationId="order.store",
     *     summary="Add new order",
     *     description="Add new order",
     *     tags={"Orders"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Order data",
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="owner_id", type="integer", example="1", description="Owner ID"),
     *             @OA\Property(property="about", type="string", nullable="true", example="Some text", description="Description"),
     *             @OA\Property(property="status", type="integer", nullable="true", example="0", description="Status"),
     *             @OA\Property(property="positions", type="array", collectionFormat="multi",
     *                 @OA\Items(
     *                     @OA\Property(property="order_id", type="integer", nullable="true", example="1", description="Order ID"),
     *                     @OA\Property(property="product_id", type="integer", example="2", description="Product ID"),
     *                     @OA\Property(property="price", type="numeric", format="float", example="25000", description="Product price"),
     *                     @OA\Property(property="discount", type="numeric", format="float", example="2500", description="Discount"),
     *                     @OA\Property(property="amount", type="numeric", format="float", nullable="true", example="22500", description="Total price"),
     *                 ),
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Created order ID",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function store() {}

    /**
     * @OA\Put(
     *     path="/order/{id}",
     *     operationId="order.update",
     *     summary="Update order",
     *     description="Update order",
     *     tags={"Orders"},
     *     @OA\Parameter(name="id", in="path", description="Order ID", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Order data",
     *         @OA\JsonContent(
     *             @OA\Property(property="owner_id", type="integer", nullable="true", example="1", description="Ccategory ID"),
     *             @OA\Property(property="about", type="string", nullable="true", example="Some text", description="Description"),
     *             @OA\Property(property="status", type="integer", nullable="true", example="0", description="Status"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Update result",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="bool")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function update() {}

    /**
     *  @OA\Delete(
     *     path="/order/{id}",
     *     operationId="order.destroy",
     *     summary="Delete order",
     *     description="Delete order",
     *     tags={"Orders"},
     *     @OA\Parameter(name="id", in="path", description="Order ID", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="Destroy result",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="bool", example="true")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Order not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="There are some active events in this stream OR Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function destroy() {}

}
