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
            'slug'         => $this->slug,
            'internal_id'  => $this->internal_id,
            'presentation' => $this->presentation,
            'phone'        => $this->phone,
            'category'     => $this->category ?     ['id' => $this->category->id, 'name' => $this->category->name] : null,
            'brand'        => $this->brand ?        ['id' => $this->brand->id, 'name' => $this->brand->name] : null,
            'type'         => $this->type ?         ['id' => $this->type->id, 'name' => $this->type->name] : null,
            'specialty'    => $this->specialty ?    ['id' => $this->specialty->id, 'name' => $this->specialty->name] : null,
            'files'        => $this->files->map(fn($file) => [
                'id'        => $file->id,
                'file_path' =>  asset('storage/' . $file->file_path),
                'order'     => $file->order,
            ]),
            'created_at'        => Helper::getDateLongFormat($this->created_at),
        ];
    }
}
