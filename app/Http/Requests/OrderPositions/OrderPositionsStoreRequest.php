<?php

namespace App\Http\Requests\OrderPositions;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class OrderPositionsStoreRequest extends FormRequest {

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

            'positions'              => 'required|array',
            'positions.*'            => 'required|array',
            'positions.*.order_id'   => 'nullable|int',
            'positions.*.product_id' => 'nullable|int',
            'positions.*.price' => [
                "required",
                "regex:/^\d+(\.\d{1,2})?$/",
            ],
            'positions.*.discount' => [
                "nullable",
                "regex:/^\d+(\.\d{1,2})?$/",
            ],
            'positions.*.amount' => [
                "required",
                "regex:/^\d+(\.\d{1,2})?$/",
            ],
        ];
    }
}
