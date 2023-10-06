<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="token",
 *     title="Token data",
 *     @OA\Property(property="access_token", type="string", example="abcdef1234"),
 *     @OA\Property(property="type", type="string", example="Bearer"),
 *     @OA\Property(property="expires_in", type="integer", example="3600"),
 * )
 */
class a1Token {}
