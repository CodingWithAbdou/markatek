<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|unique:coupons,code|min:4|max:20',
            'discount' => 'required|numeric',
            'product_id' => 'required|exists:products,id',
            'discount' => 'required|numeric',
            'usage_limit' => 'required|numeric',
            'used_at' => 'required|date',
            'expired_at' => 'required|date|after:used_at',
        ];
    }
}
