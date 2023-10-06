<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class UserResource extends JsonResource {

    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'user_id'  => $this->id    ?? null,
            'email'    => $this->email ?? null,
            'name'     => $this->name  ?? null,
            'verified' => $this->email_verified_at ?? null,
            'created'  => $this->created_at ?? null,
            'updated'  => $this->updated_at ?? null,
        ];
    }
}
