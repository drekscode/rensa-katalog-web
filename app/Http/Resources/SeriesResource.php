<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
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
            'kategori_id' => $this->kategori_id,
            'nama_series' => $this->nama_series,
            'struktur_img' => $this->struktur_img && (str_starts_with($this->struktur_img, 'http') || str_starts_with($this->struktur_img, 'data:')) ? $this->struktur_img : ($this->struktur_img ? asset('storage/' . $this->struktur_img) : null),
            'cover_area' => $this->cover_area && (str_starts_with($this->cover_area, 'http') || str_starts_with($this->cover_area, 'data:')) ? $this->cover_area : ($this->cover_area ? asset('storage/' . $this->cover_area) : null),
            'material' => $this->material,
            'ketebalan' => $this->ketebalan,
            'ukuran' => $this->ukuran,
            'deskripsi_produk' => $this->deskripsi_produk,
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
            'kategori' => new KategoriResource($this->whenLoaded('kategori')),
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'hasil_pasang' => HasilPasangResource::collection($this->whenLoaded('hasilPasang')),
        ];
    }
}
