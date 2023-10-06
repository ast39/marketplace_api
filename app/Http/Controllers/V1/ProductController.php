<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Libs\AppError;
use App\Http\Requests\Products\ProductFilterRequest;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Product list
     *
     * @param ProductFilterRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function index(ProductFilterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, [
            'queryParams' => array_filter($data)
        ]);

        $products = Product::filter($filter)
            ->get() ?: null;

        return ProductResource::collection($products)
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Product info
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return (new ErrorResource(new AppError(902)))
                ->response()
                ->setStatusCode(404);
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Add new product
     *
     * @param ProductStoreRequest $request
     * @return JsonResponse
     */
    public function store(ProductStoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json([
            'data' => Product::create($data)->product_id ?? null,
        ], 201);
    }

    /**
     * Update product
     *
     * @param ProductUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(ProductUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();

        $product = Product::find($id);

        if (is_null($product)) {
            return (new ErrorResource(new AppError(902)))
                ->response()
                ->setStatusCode(404);
        }

        return response()->json([
            'data' => $product->update($data),
        ], 200);
    }

    /**
     * Delete product
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return (new ErrorResource(new AppError(902)))
                ->response()
                ->setStatusCode(404);
        }

        return response()->json([
            'data' => $product->delete(),
        ], 200);
    }
}
