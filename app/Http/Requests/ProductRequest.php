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
        $routeName = $this->route()->getName();
        $methodName = explode('.', $routeName)[2];
        $validator = $methodName == 'update' ? 'nullable' : 'required';

        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'category_id' => 'required',
            'cover_path' =>   $validator   . '|max:' . getMaxSize() . '|mimes:' . acceptImageType(0),
            'description_ar' => 'nullable',
            'description_en' => 'nullable',
            'price' => 'required|numeric|max:9999999.99',
            'quantity' => 'required|numeric',
            'images[]' => 'nullable|max:' . getMaxSize() . '|mimes:' . acceptImageType(0),
            'new_images[]' =>  'nullable|max:' . getMaxSize() . '|mimes:' . acceptImageType(0),
        ];
    }
}
