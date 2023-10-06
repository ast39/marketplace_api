<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="category",
 *     title="Category data",
 *     @OA\Property(property="category_id", type="integer", example="2"),
 *     @OA\Property(property="parent", nullable="true", type="object", example="category scheme"),
 *     @OA\Property(property="title", type="integer", example="Test"),
 *     @OA\Property(property="about", type="string", nullable="true", example="Some text"),
 *     @OA\Property(property="status", type="integer", example="0"),
 * )
 */
class b1Category {}
