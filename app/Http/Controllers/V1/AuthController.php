<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class AuthController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }

        return $this->responseWithToken($token);
    }

    /**
     * @return JsonResponse
     */
    public function user(): JsonResponse
    {
        return response()->json(auth('api')->user());
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('api')->logout();

        return response()->json([
            'msg' => 'Successfully logged out',
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->responseWithToken(auth('api')->refresh());
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    protected function responseWithToken($token): JsonResponse
    {
        return response()->json([

            'access_token' => $token,
            'type'         => 'Bearer',
            'expires_in'   => config('jwt.ttl') * 60,
        ]);
    }

}
