<?php

namespace App\Swagger\Controllers;

class Product {

    /**
     *  @OA\Get(
     *     path="/product",
     *     operationId="product.index",
     *     summary="Product list",
     *     description="Product list",
     *     tags={"Products"},
     *     @OA\Parameter(name="category", in="query", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="title", in="query", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="status", in="query", required=false, @OA\Schema(type="integer", enum={"0", "1"})),
     *     @OA\Response(
     *         response="200",
     *         description="Array of products",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", type="array", @OA\Items(ref="#/components/schemas/product")),
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     * ),
     */
    public function index() {}

    /**
     *  @OA\Get(
     *     path="/product/{id}",
     *     operationId="product.show",
     *     summary="Product info",
     *     description="Product info",
     *     tags={"Products"},
     *     @OA\Parameter(name="id", in="path", description="Product ID", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="Product unfo",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", ref="#/components/schemas/product"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Product not found.",
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
     * ),
     */
    public function show() {}

    /**
     * @OA\Post(
     *     path="/product",
     *     operationId="product.store",
     *     summary="Add new product",
     *     description="Add new product",
     *     tags={"Products"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Product data",
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="category_id", type="integer", example="1", description="Ccategory ID"),
     *             @OA\Property(property="title", type="string", example="Test", description="Title"),
     *             @OA\Property(property="about", type="string", nullable="true", example="Some text", description="Description"),
     *             @OA\Property(property="unit", type="string", example="kg", description="Unit type"),
     *             @OA\Property(property="stock", type="numeric", format="float", example="10", description="Stock"),
     *             @OA\Property(property="price", type="numeric", format="float", example="105.45", description="Price"),
     *             @OA\Property(property="options", type="string", nullable="true", example="Color - Green", description="Some product options"),
     *             @OA\Property(property="status", type="integer", nullable="true", example="0", description="Status"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Created product ID",
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
     *     path="/product/{id}",
     *     operationId="product.update",
     *     summary="Update product",
     *     description="Update product",
     *     tags={"Products"},
     *     @OA\Parameter(name="id", in="path", description="Product ID", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Product data",
     *         @OA\JsonContent(
     *             @OA\Property(property="category_id", type="integer", nullable="true", example="1", description="Ccategory ID"),
     *             @OA\Property(property="title", type="string", nullable="true", example="Test", description="Title"),
     *             @OA\Property(property="about", type="string", nullable="true", example="Some text", description="Description"),
     *             @OA\Property(property="unit", type="string", nullable="true", example="kg", description="Unit type"),
     *             @OA\Property(property="stock", type="numeric", format="float", nullable="true", example="10", description="Stock"),
     *             @OA\Property(property="price", type="numeric", format="float", nullable="true", example="105.45", description="Price"),
     *             @OA\Property(property="options", type="string", nullable="true", example="Color - Green", description="Some product options"),
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
     *     path="/product/{id}",
     *     operationId="product.destroy",
     *     summary="Delete product",
     *     description="Delete product",
     *     tags={"Products"},
     *     @OA\Parameter(name="id", in="path", description="Product ID", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="Destroy result",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="bool", example="true")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Product not found",
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
