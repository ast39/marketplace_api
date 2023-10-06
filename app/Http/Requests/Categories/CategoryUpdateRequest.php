<?php

namespace App\Http\Requests\Categories;

use App\Enums\BasicStatusEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;


class CategoryUpdateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'parent_id' => 'nullable|int',
            'title'     => 'nullable|string',
            'about'     => 'nullable|string',
            'status'    => [
                "nullable",
                new Enum(BasicStatusEnum::class)
            ],
        ];
    }
}
