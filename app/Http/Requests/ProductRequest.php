<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required',
            'cover_path' => 'required|max:' . getMaxSize() . '|mimes:' . acceptImageType(0),
            'description' => 'nullable',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'images.*' => 'image|max:' . getMaxSize() . '|mimes:' . acceptImageType(0),
        ];
    }
}
