<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandingPageRequest extends FormRequest
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
            'title' => [
                'required',
                'max:150',
            ],
            'subtitle' => [
                'nullable',
                'max:250',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
            'image_computer' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,avif',
            ],
            'image_cellular' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,avif',
            ],

        ];
    }
}
