<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'asin',
        'ean',
        'product_url',
        'img_url',
        'description',
        'current_price',
        'old_price',
        'de_price',
        'es_price',
        'fr_price',
        'it_price',
        'posted_at',
        'status'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'current_price' => 'decimal:2',
            'old_price' => 'decimal:2',
            'de_price' => 'decimal:2',
            'es_price' => 'decimal:2',
            'fr_price' => 'decimal:2',
            'it_price' => 'decimal:2',
            'posted_at' => 'datetime',
        ];
    }
}
