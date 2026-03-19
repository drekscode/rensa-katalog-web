<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RumusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $kategoriName = $this->kategori?->nama_kategori;
        $panjang = $this->panjang !== null ? rtrim(rtrim((string) $this->panjang, '0'), '.') : null;
        $lebar = $this->lebar !== null ? rtrim(rtrim((string) $this->lebar, '0'), '.') : null;

        $label = $kategoriName;

        if ($kategoriName && $this->rumus === 'Rumus Batang' && $panjang !== null && $lebar !== null) {
            $label = "{$kategoriName} ukuran {$panjang} cm x {$lebar} cm";
        } elseif ($kategoriName && strcasecmp((string) $this->rumus, 'Rumus Box') === 0 && $panjang !== null && $lebar !== null) {
            $label = "{$kategoriName} ukuran {$panjang} cm x {$lebar} cm";
            if ($this->lembar !== null) {
                $label .= ", {$this->lembar} pcs";
            }
        } elseif ($kategoriName && $this->rumus === 'Rumus M2') {
            $label = $kategoriName;
        }

        return [
            'id' => $this->id,
            'kategori_id' => $this->kategori_id,
            'panjang' => $this->panjang,
            'lebar' => $this->lebar,
            'lembar' => $this->lembar,
            'rumus' => $this->rumus,
            'label' => $label,
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
            'kategori' => new KategoriResource($this->whenLoaded('kategori')),
        ];
    }
}
