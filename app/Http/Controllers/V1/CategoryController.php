<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\CategoryFilter;
use App\Http\Libs\AppError;
use App\Http\Requests\Categories\CategoryFilterRequest;
use App\Http\Requests\Categories\CategoryStoreRequest;
use App\Http\Requests\Categories\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ErrorResource;
use App\Models\Category;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;


class CategoryController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Category list
     *
     * @param CategoryFilterRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function index(CategoryFilterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $filter = app()->make(CategoryFilter::class, [
            'queryParams' => array_filter($data)
        ]);

        $categories = Category::filter($filter)
            ->get() ?: null;

        return CategoryResource::collection($categories)
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Category info
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return (new ErrorResource(new AppError(901)))
                ->response()
                ->setStatusCode(404);
        }

        return (new CategoryResource($category))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Add new category
     *
     * @param CategoryStoreRequest $request
     * @return JsonResponse
     */
    public function store(CategoryStoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json([
            'data' => Category::create($data)->category_id ?? null,
        ], 201);
    }

    /**
     * Update category
     *
     * @param CategoryUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CategoryUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();

        $category = Category::find($id);

        if (is_null($category)) {
            return (new ErrorResource(new AppError(901)))
                ->response()
                ->setStatusCode(404);
        }

        return response()->json([
            'data' => $category->update($data),
        ], 200);
    }

    /**
     * Delete category
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return (new ErrorResource(new AppError(901)))
                ->response()
                ->setStatusCode(404);
        }

        return response()->json([
            'data' => $category->delete(),
        ], 200);
    }
}
