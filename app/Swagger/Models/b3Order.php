<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="order",
 *     title="Order data",
 *     @OA\Property(property="order_id", type="integer", example="2"),
 *     @OA\Property(property="about", type="string", nullable="true", example="Some text"),
 *     @OA\Property(property="items", type="integer", example="5"),
 *     @OA\Property(property="amount", type="numeric", format="float", example="5000"),
 *     @OA\Property(property="discount", type="numeric", format="float", example="350"),
 *     @OA\Property(property="total_amount", type="numeric", format="float", example="4650"),
 *     @OA\Property(property="status", type="integer", example="0"),
 *     @OA\Property(property="owner", ref="#/components/schemas/user"),
 *     @OA\Property(property="history", type="array", @OA\Items(ref="#/components/schemas/order_log")),
 *     @OA\Property(property="positions", type="array", @OA\Items(ref="#/components/schemas/order_position")),
 * )
 */
class b3Order {}
