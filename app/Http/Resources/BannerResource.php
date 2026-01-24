<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'banner_image' => $this->banner_image && (str_starts_with($this->banner_image, 'http') || str_starts_with($this->banner_image, 'data:')) ? $this->banner_image : ($this->banner_image ? asset('storage/' . $this->banner_image) : null),
            'link' => $this->link,
            'urutan' => $this->urutan,
            'created_at' => $this->created_at ? $this->created_at->toIso8601String() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toIso8601String() : null,
        ];
    }
}
