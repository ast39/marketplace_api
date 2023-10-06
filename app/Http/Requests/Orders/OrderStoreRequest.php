<?php

namespace App\Http\Requests\Orders;

use App\Enums\OrderTypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;


class OrderStoreRequest extends FormRequest {

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

            'owner_id'     => 'required|int',
            'about'        => 'nullable|string',
            'status'       => [
                "nullable",
                new Enum(OrderTypeEnum::class),
            ],
        ];
    }
}
