<?php

namespace App\Swagger\Controllers;

class Category {

    /**
     *  @OA\Get(
     *     path="/category",
     *     operationId="/category/index",
     *     summary="Category list",
     *     description="Category list",
     *     tags={"Categories"},
     *     @OA\Parameter(name="parent", in="query", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="title", in="query", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="status", in="query", required=false, @OA\Schema(type="integer", enum={"0", "1"})),
     *     @OA\Response(
     *         response="200",
     *         description="Array of categories",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", type="array", @OA\Items(ref="#/components/schemas/category")),
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
     *     path="/category/{id}",
     *     operationId="category.show",
     *     summary="Category info",
     *     description="Category info",
     *     tags={"Categories"},
     *     @OA\Parameter(name="id", in="path", description="Category ID", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="Category unfo",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", ref="#/components/schemas/category"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Category not found.",
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
     *     path="/category",
     *     operationId="category.store",
     *     summary="Add new category",
     *     description="Add new category",
     *     tags={"Categories"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Category data",
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="parent_id", type="integer", nullable="true", example="1", description="Parent category ID"),
     *             @OA\Property(property="title", type="string", example="Test", description="Title"),
     *             @OA\Property(property="about", type="string", nullable="true", example="Some text", description="Description"),
     *             @OA\Property(property="status", type="integer", nullable="true", example="0", description="Status"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Created category ID",
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
     *     path="/category/{id}",
     *     operationId="category.update",
     *     summary="Update category",
     *     description="Update category",
     *     tags={"Categories"},
     *     @OA\Parameter(name="id", in="path", description="Category ID", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Category data",
     *         @OA\JsonContent(
     *             @OA\Property(property="parent_id", type="integer", nullable="true", example="1", description="Parent category ID"),
     *             @OA\Property(property="title", type="string", nullable="true", example="Test", description="Title"),
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
     *     path="/category/{id}",
     *     operationId="category.destroy",
     *     summary="Delete category",
     *     description="Delete category",
     *     tags={"Categories"},
     *     @OA\Parameter(name="id", in="path", description="Category ID", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response="200",
     *         description="Destroy result",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="bool", example="true")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Category not found",
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
