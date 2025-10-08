<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintBookRequest extends FormRequest
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
            'first_name'               => 'required|string|max:255',
            'last_name'                => 'nullable|string|max:255',
            'company_name'             => 'nullable|string|max:255',
            'legal_representative'     => 'nullable|string|max:255',
            'address'                  => 'nullable|string|max:255',
            'document_number'          => 'required|string|max:50',
            'email'                    => 'nullable|email|max:255',
            'phone'                    => 'nullable|string|max:50',
            'additional_address'       => 'nullable|string|max:255',
            'minor'                    => 'nullable|boolean',
            'customer_type'            => 'required|string|max:100',

            'good'                     => 'nullable|string|max:255',
            'invoice_number'           => 'nullable|string|max:50',
            'claimed_amount'           => 'nullable|numeric|min:0',
            'good_description'         => 'nullable|string|max:255',
            'product'                  => 'nullable|string|max:255',

            'complaint_type'           => 'required|string|max:100',
            'complaint_detail'         => 'nullable|string|max:500',
            'customer_request'         => 'nullable|string|max:500',
            'supplier_observations'    => 'nullable|string|max:500',

            'files'               => 'sometimes|array|max:5',
            'files.*'             => 'nullable|file|mimes:jpeg,jpg,png,gif,pdf,zip|max:25600',
        ];
    }
}
