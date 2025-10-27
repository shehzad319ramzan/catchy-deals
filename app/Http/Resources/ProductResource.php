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
            'title' => $this->title,
            'asin' => $this->asin,
            'ean' => $this->ean,
            'product_url' => $this->product_url,
            'img_url' => $this->img_url,
            'description' => $this->description,
            'pricing' => [
                'current_price' => $this->current_price,
                'old_price' => $this->old_price,
                'savings' => $this->current_price && $this->old_price 
                    ? $this->old_price - $this->current_price 
                    : null,
                'savings_percentage' => $this->current_price && $this->old_price 
                    ? round((($this->old_price - $this->current_price) / $this->old_price) * 100, 2)
                    : null,
            ],
            'regional_pricing' => [
                'de_price' => $this->de_price,
                'es_price' => $this->es_price,
                'fr_price' => $this->fr_price,
                'it_price' => $this->it_price,
            ],
            'timestamps' => [
                'posted_at' => $this->posted_at?->toISOString(),
                'created_at' => $this->created_at->toISOString(),
                'updated_at' => $this->updated_at->toISOString(),
            ],
            'status' => $this->status,
        ];
    }
}