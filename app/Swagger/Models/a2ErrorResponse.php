<?php


namespace App\Swagger\Models;

/** @OA\Schema(
 *     type="object",
 *     schema="error_response",
 *     title="Error response",
 *     @OA\Property(property="error", type="object",
 * 	       @OA\Property(property="app", type="string", example="Some Api"),
 *         @OA\Property(property="code", type="integer", example="400"),
 *         @OA\Property(property="msg", type="string", example="Bad request"),
 *     )
 * )
 */
class a2ErrorResponse {}
