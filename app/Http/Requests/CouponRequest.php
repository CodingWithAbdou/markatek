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

        $routeName = $this->route()->getName();
        $methodName = explode('.', $routeName)[2];
        $validator = $methodName == 'update' ? 'nullable' : 'required';

        return [
            'code' =>  $validator . '|unique:coupons,code|min:4|max:20',
            'product_id' => 'required|exists:products,id',
            'value_discount' => 'required|numeric',
            'type_discount' => 'required',
            'usage_limit' => 'required|numeric',
            'used_at' => 'required|date',
            'expired_at' => 'required|date|after:used_at',
        ];
    }
}
