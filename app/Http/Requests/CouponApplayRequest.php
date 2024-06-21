<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponApplayRequest extends FormRequest
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
            'coupon' => 'required|min:4|max:191|string|exists:coupons,code'
        ];
    }
    public function messages(): array
    {
        return [
            'coupon.required' => __('validation.coupon_required'),
            'coupon.exists' => __('front.coupon_not_found'),
        ];
    }
}
