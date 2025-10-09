<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandingPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imageComputer = $this->imageComputer();
        $imageCellular = $this->imageCellular();

        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'sort'       => $this->order,
            'image_computer'    => $imageComputer ? [
                    'id' => $imageComputer->id,
                    'file_path' => asset('storage/' . $imageComputer->file_path),
                ] : null,
            'image_cellular'    => $imageCellular ? [
                'id' => $imageCellular->id,
                'file_path' => asset('storage/' . $imageCellular->file_path)
             ] : null,
            'created_at'        => Helper::getDateLongFormat($this->created_at),
        ];
    }
}
