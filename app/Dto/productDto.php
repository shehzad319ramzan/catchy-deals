<?php

namespace App\Dto;

class productDto
{
    public readonly string $title;
    public readonly ?string $asin;
    public readonly ?string $ean;
    public readonly ?string $product_url;
    public readonly ?string $img_url;
    public readonly ?string $description;
    public readonly ?float $current_price;
    public readonly ?float $old_price;
    public readonly ?float $de_price;
    public readonly ?float $es_price;
    public readonly ?float $fr_price;
    public readonly ?float $it_price;
    public readonly ?string $posted_at;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->title = $request['title'];
        $this->asin = $request['asin'] ?? null;
        $this->ean = $request['ean'] ?? null;
        $this->product_url = $request['product_url'] ?? null;
        $this->img_url = $request['img_url'] ?? null;
        $this->description = $request['description'] ?? null;
        $this->current_price = isset($request['current_price']) ? (float)$request['current_price'] : null;
        $this->old_price = isset($request['old_price']) ? (float)$request['old_price'] : null;
        $this->de_price = isset($request['de_price']) ? (float)$request['de_price'] : null;
        $this->es_price = isset($request['es_price']) ? (float)$request['es_price'] : null;
        $this->fr_price = isset($request['fr_price']) ? (float)$request['fr_price'] : null;
        $this->it_price = isset($request['it_price']) ? (float)$request['it_price'] : null;
        $this->posted_at = $request['posted_at'] ?? null;
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'asin' => $this->asin,
            'ean' => $this->ean,
            'product_url' => $this->product_url,
            'img_url' => $this->img_url,
            'description' => $this->description,
            'current_price' => $this->current_price,
            'old_price' => $this->old_price,
            'de_price' => $this->de_price,
            'es_price' => $this->es_price,
            'fr_price' => $this->fr_price,
            'it_price' => $this->it_price,
            'posted_at' => $this->posted_at,
        ];
    }
}
