<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class OrderResource extends JsonResource {

    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'order_id'     => $this->order_id     ?? null,
            'about'        => $this->about        ?? null,
            'items'        => $this->items        ?? null,
            'amount'       => $this->amount       ?? null,
            'discount'     => $this->discount     ?? null,
            'total_amount' => $this->total_amount ?? null,
            'status'       => $this->status       ?? null,
            'owner'        => new UserResource($this->owner),
            'history'      => $this->history      ?? null,
            'positions'    => OrderPositionResource::collection($this->positions),
        ];
    }
}
