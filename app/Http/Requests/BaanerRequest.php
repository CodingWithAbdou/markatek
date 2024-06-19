<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaanerRequest extends FormRequest
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
            'title_en' => 'nullable',
            'title_ar' => 'nullable',
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'image_path' => $validator . '|max:' . getMaxSize() . '|mimes:' . acceptImageType(0),
        ];
    }
}
