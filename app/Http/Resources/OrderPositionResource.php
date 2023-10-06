<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class OrderPositionResource extends JsonResource {

    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'record_id' => $this->record_id  ?? null,
            'order_id'  => $this->order_id   ?? null,
            'product'   => new ProductResource($this->product),
            'price'     => $this->price      ?? null,
            'discount'  => $this->discount   ?? null,
            'amount'    => $this->amount     ?? null,
        ];
    }
}
