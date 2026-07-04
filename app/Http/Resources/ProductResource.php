<?php

namespace App\Http\Resources;

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
            'id' => $this->id,
            'series_id' => $this->series_id,
            'nama_product' => $this->nama_product,
            'thumbnail' => $this->thumbnail && (str_starts_with($this->thumbnail, 'http') || str_starts_with($this->thumbnail, 'data:')) ? $this->thumbnail : ($this->thumbnail ? asset('storage/' . $this->thumbnail) : null),
            'big_pic' => $this->big_pic && is_array($this->big_pic) ? array_values(array_filter(array_map(function($pic) {
                return is_string($pic) ? ((str_starts_with($pic, 'http') || str_starts_with($pic, 'data:')) ? $pic : asset('storage/' . $pic)) : null;
            }, $this->big_pic))) : [],
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
            'series' => new SeriesResource($this->whenLoaded('series')),
        ];
    }
}
