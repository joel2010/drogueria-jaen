<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintBookListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                      => $this->id,

            'first_name'              => $this->first_name,
            'last_name'               => $this->last_name,
            'company_name'            => $this->company_name,
            'legal_representative'    => $this->legal_representative,
            'address'                 => $this->address,
            'document_number'         => $this->document_number,
            'email'                   => $this->email,
            'phone'                   => $this->phone,
            'additional_address'      => $this->additional_address,
            'minor'                   => (bool) $this->minor,
            'customer_type'           => $this->customer_type,

            'good'                    => $this->good,
            'invoice_number'          => $this->invoice_number,
            'claimed_amount'          => $this->claimed_amount,
            'good_description'        => $this->good_description,
            'product'                 => $this->product,

            'complaint_type'          => $this->complaint_type,
            'complaint_detail'        => $this->complaint_detail,
            'customer_request'        => $this->customer_request,
            'supplier_observations'   => $this->supplier_observations,

            'files'                   => $this->files->map(function ($file) {
                return [
                    'path'            => asset('storage/' . $file->file_path) ?? null,
                ];
            }),

            'created_at'              => Helper::getDateLongFormat($this->created_at),
        ];
    }
}
