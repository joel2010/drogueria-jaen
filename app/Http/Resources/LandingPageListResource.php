<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandingPageListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'subtitle'          => $this->subtitle,
            'state'             => $this->state,
            'order_index'       => $this->order_index,
            'image_computer'    => $this->imageComputer()?->file_path ? asset('storage/' . $this->imageComputer()->file_path) : null,
            'image_cellular'    => $this->imageCellular()?->file_path ? asset('storage/' . $this->imageCellular()->file_path) : null,
        ];
    }
}
