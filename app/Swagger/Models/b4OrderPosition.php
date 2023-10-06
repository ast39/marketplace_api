<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="order_position",
 *     title="Order position data",
 *     @OA\Property(property="record_id", type="integer", example="1"),
 *     @OA\Property(property="order_id", type="integer", example="2"),
 *     @OA\Property(property="product", ref="#/components/schemas/product"),
 *     @OA\Property(property="price", type="numeric", format="float", example="5000"),
 *     @OA\Property(property="discount", type="numeric", format="float", example="350"),
 *     @OA\Property(property="amount", type="numeric", format="float", example="4650")
 * )
 */
class b4OrderPosition {}
