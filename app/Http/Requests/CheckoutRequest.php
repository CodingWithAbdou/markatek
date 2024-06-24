<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            "country" => 'required|string|max:191',
            "phone" => 'required|string|max:191',
            "full_phone" => 'required|string|max:191',
            "email" => 'nullable|email|max:191',
            "place_id" => 'required|integer',
            "piece" => 'required|string|max:191',
            "street" => 'required|string|max:191',
            "avenue" => 'nullable|string|max:191',
            "house_number" => 'required|email|max:191',
            "note" => 'nullable|string',
            "coupon" => 'nullable|min:4|max:191|string|exists:coupons,code',
            "house_number" => 'required',
            "payment_method" => 'required|string|max:191|in:credit_card,knet',
            "terms" => 'required',
            "coupon_applay" => 'in:0,1',
        ];
    }
}
