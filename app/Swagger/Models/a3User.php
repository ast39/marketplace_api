<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="user",
 *     title="User data",
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="Admin"),
 *     @OA\Property(property="email", type="string", example="test@gmail.com"),
 *     @OA\Property(property="verified", type="datetime", nullable="true", example="null"),
 *     @OA\Property(property="created", type="datetime", example="2023-10-04T16:33:11.000000Z"),
 *     @OA\Property(property="updated", type="datetime", example="2023-10-04T16:33:11.000000Z"),
 * )
 */
class a3User {}
