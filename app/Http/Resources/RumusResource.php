<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RumusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kategori_id' => $this->kategori_id,
            'panjang' => $this->panjang,
            'lebar' => $this->lebar,
            'lembar' => $this->lembar,
            'rumus' => $this->rumus,
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
            'kategori' => new KategoriResource($this->whenLoaded('kategori')),
        ];
    }
}
