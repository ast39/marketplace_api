<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="order_log",
 *     title="Order log data",
 *     @OA\Property(property="record_id", type="integer", example="1"),
 *     @OA\Property(property="order_id", type="integer", example="2"),
 *     @OA\Property(property="status", type="integer", example="5")
 * )
 */
class b5OrderLog {}
