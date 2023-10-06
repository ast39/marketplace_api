<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class ErrorResource extends JsonResource {

    public static $wrap = 'error';

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [

            'app'  => env('APP_NAME', null),
            'code' => $this->code ?? $this['code'] ?? 400,
            'msg'  => $this->msg  ?? $this['msg']  ?? 'General error',
        ];
    }

    public function jsonOptions()
    {
        return JSON_UNESCAPED_UNICODE;
    }
}
