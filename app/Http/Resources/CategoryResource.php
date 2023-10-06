<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class CategoryResource extends JsonResource {

    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'category_id' => $this->category_id ?? null,
            'parent'      => new CategoryResource(Category::find($this->parent_id)),
            'title'       => $this->title       ?? null,
            'about'       => $this->about       ?? null,
            'status'      => $this->status      ?? null,
        ];
    }
}
