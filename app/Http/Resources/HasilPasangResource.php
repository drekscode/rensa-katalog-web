<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HasilPasangResource extends JsonResource
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
            'foto' => $this->foto && (str_starts_with($this->foto, 'http') || str_starts_with($this->foto, 'data:')) ? $this->foto : ($this->foto ? asset('storage/' . $this->foto) : null),
            'images' => $this->relationLoaded('images') ? $this->images->map(function ($img) {
                return $img->foto && (str_starts_with($img->foto, 'http') || str_starts_with($img->foto, 'data:')) ? $img->foto : ($img->foto ? asset('storage/' . $img->foto) : null);
            }) : [],
            'nama_project' => $this->nama_project,
            'tanggal' => $this->tanggal,
            'id_project' => $this->id_project,
            'id_series' => $this->id_series,
            'series' => new SeriesResource($this->whenLoaded('series')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
