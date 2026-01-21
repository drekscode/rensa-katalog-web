<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TutorialGambarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kategori_id' => $this->kategori_id,
            'judul' => $this->judul,
            'gambar' => $this->gambar && str_starts_with($this->gambar, 'http') ? $this->gambar : ($this->gambar ? asset('storage/' . $this->gambar) : null),
            'deskripsi' => $this->deskripsi,
            'urutan' => $this->urutan,
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
            'kategori' => new KategoriResource($this->whenLoaded('kategori')),
        ];
    }
}
