<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
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
            'active'        => $this->active,
            'show_in_home'        => $this->show_in_home,
            'category'     => $this->category ?     ['id' => $this->category->id, 'name' => $this->category->name] : null,
            'brand'        => $this->brand ?        ['id' => $this->brand->id, 'name' => $this->brand->name] : null,
            'type'         => $this->type ?         ['id' => $this->type->id, 'name' => $this->type->name] : null,
            'specialty'    => $this->specialty ?    ['id' => $this->specialty->id, 'name' => $this->specialty->name] : null,
            'created_at' => Helper::getDateLongFormat($this->created_at),
            'image'        => optional($this->files->sortBy('order')->first())->file_path ? asset('storage/' . optional($this->files->sortBy('order')->first())->file_path) : null,
        ];
    }
}
