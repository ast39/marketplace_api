<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource {

    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'product_id'  => $this->product_id ?? null,
            'category'    => new CategoryResource($this->category),
            'title'       => $this->title      ?? null,
            'about'       => $this->about      ?? null,
            'unit'        => $this->unit       ?? null,
            'stock'       => $this->stock      ?? null,
            'price'       => $this->price      ?? null,
            'options'     => $this->options    ?? null,
            'status'      => $this->status     ?? null,
        ];
    }
}
