<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="product",
 *     title="Product data",
 *     @OA\Property(property="product_id", type="integer", example="2"),
 *     @OA\Property(property="category", ref="#/components/schemas/category"),
 *     @OA\Property(property="title", type="integer", example="Test"),
 *     @OA\Property(property="about", type="string", nullable="true", example="Some text"),
 *     @OA\Property(property="unit", type="string", example="kg"),
 *     @OA\Property(property="stock", type="numeric", format="float", example="kg"),
 *     @OA\Property(property="price", type="numeric", format="float", example="kg"),
 *     @OA\Property(property="options", type="string", example="Some JSON data"),
 *     @OA\Property(property="status", type="integer", example="0"),
 * )
 */
class b2Product {}
