<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtikelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kategori_id' => $this->kategori_id,
            'judul' => $this->judul,
            'slug' => $this->slug,
            'foto' => $this->foto && (str_starts_with($this->foto, 'http') || str_starts_with($this->foto, 'data:')) ? $this->foto : ($this->foto ? asset('storage/' . $this->foto) : null),
            'foto2' => $this->foto2 && (str_starts_with($this->foto2, 'http') || str_starts_with($this->foto2, 'data:')) ? $this->foto2 : ($this->foto2 ? asset('storage/' . $this->foto2) : null),
            'foto3' => $this->foto3 && (str_starts_with($this->foto3, 'http') || str_starts_with($this->foto3, 'data:')) ? $this->foto3 : ($this->foto3 ? asset('storage/' . $this->foto3) : null),
            'deskripsi' => $this->deskripsi,
            'hastag_kategori' => $this->hastag_kategori,
            'date' => $this->date,
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
            'kategori' => new KategoriResource($this->whenLoaded('kategori')),
        ];
    }
}
