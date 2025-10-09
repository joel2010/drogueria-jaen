<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        return  [
            'name'          => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'internal_id'   => [
                'required',
                'string',
                'max:100',
                Rule::unique('products', 'internal_id')->ignore($this->route('id'))->whereNull('deleted_at'),
            ],
            'presentation'  => 'nullable|string|max:255',
            'phone'         => 'nullable|max:250',
            'category_id'   => 'nullable|exists:categories,id',
            'brand_id'      => 'nullable|exists:brands,id',
            'type_id'       => 'nullable|exists:types,id',
            'specialty_id'  => 'nullable|exists:specialties,id',
            'images'        => 'sometimes|array',
            'images.*'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'active' => 'required|boolean',
            'show_in_home' => 'required|boolean',
            'sort' => 'required|numeric|min:1',
        ];
    }
}
