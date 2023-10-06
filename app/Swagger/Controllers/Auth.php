<?php

namespace App\Swagger\Controllers;

class Auth {

    /**
     * @OA\Post(
     *     path="/auth/login",
     *     operationId="auth.login",
     *     summary="Auth in API",
     *     description="Auth in API",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Category data",
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", example="admin@gmail.com", description="User email"),
     *             @OA\Property(property="password", type="string", example="qwerty12", description="User password"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Token information",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/token"))
     *         )
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Error: Unauthorized.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     * ),
     */
    public function login() {}

    /**
     *  @OA\Get(
     *     path="/auth/user",
     *     operationId="auth.user",
     *     summary="Auth user info",
     *     description="Auth user info",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response="200",
     *         description="User data",
     *         @OA\JsonContent(
     *             @OA\Property(property="result", ref="#/components/schemas/user"),
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function user() {}

    /**
     * @OA\Post(
     *     path="/auth/logout",
     *     operationId="auth.logout",
     *     summary="Logout",
     *     description="Logout",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response="200",
     *         description="Created category ID",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function logout() {}

    /**
     * @OA\Post(
     *     path="/auth/refresh",
     *     operationId="auth.refresh",
     *     summary="Refresh API token",
     *     description="Refresh API token",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response="200",
     *         description="Created category ID",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/token")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", ref="#/components/schemas/error_response")
     *         )
     *     ),
     *     security={{ "apiAuth": {} }}
     * ),
     */
    public function refresh() {}

}
