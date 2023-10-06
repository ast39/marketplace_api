<?php

namespace App\Http\Requests\Products;

use App\Enums\BasicStatusEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;


class ProductStoreRequest extends FormRequest {

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

            'category_id' => 'required|int',
            'title'       => 'required|string',
            'about'       => 'nullable|string',
            'unit'        => 'required|string',
            'stock'       => [
                "required",
                "regex:/^\d+(\.\d{1,2})?$/",
            ],
            'price'       => [
                "required",
                "regex:/^\d+(\.\d{1,2})?$/",
            ],
            'options'     => 'nullable|string',
            'status'    => [
                "nullable",
                new Enum(BasicStatusEnum::class)
            ],
        ];
    }
}

