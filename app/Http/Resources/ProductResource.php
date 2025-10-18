<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'subtitle'     => $this->subtitle,
            'description'  => $this->description,
            'internal_id'  => $this->internal_id,
            'presentation' => $this->presentation,
            'phone'        => $this->phone,
            'category_id'     => $this->category_id,
            'brand_id'        => $this->brand_id,
            'type_id'         => $this->type_id,
            'specialty_id'    => $this->specialty_id,
            'sort'    => $this->sort,
            'show_in_home'    => $this->show_in_home,
            'active'    => $this->active,
            'pdf' =>  $this->pdf ? asset($this->pdf) : null,
            'files'        => $this->files->map(fn($file) => [
                'id'        => $file->id,
                'file_path' =>  asset('storage/' . $file->file_path),
                'order'     => $file->order,
            ]),
            'created_at'        => Helper::getDateLongFormat($this->created_at),
        ];
    }
}
