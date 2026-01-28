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
            'foto' => $this->foto,
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
