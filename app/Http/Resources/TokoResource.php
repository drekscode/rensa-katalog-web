<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_toko' => $this->nama_toko,
            'alamat' => $this->alamat,
            'link_maps' => $this->link_maps,
            'kontak' => $this->kontak,
            'image' => $this->image && (str_starts_with($this->image, 'http') || str_starts_with($this->image, 'data:')) ? $this->image : ($this->image ? asset('storage/' . $this->image) : null),
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
        ];
    }
}
