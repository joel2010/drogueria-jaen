<?php

namespace App\Http\Requests;


use App\Models\Category;
use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TypeRequest extends FormRequest
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
            'name' => [
                'required',
                'max:150',
                Rule::unique(Type::class, 'name')->ignore($this->id)->whereNull('deleted_at'),
            ],
            'active' => [
                'required',
                'boolean',
            ],
        ];
    }
}
