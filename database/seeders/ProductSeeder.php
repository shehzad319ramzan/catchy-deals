<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        product::create([
            'title' => 'Test Product',
            'asin' => 'B123456789',
            'ean' => '1234567890123',
            'product_url' => 'https://example.com/product',
            'img_url' => 'https://example.com/image.jpg',
            'description' => 'This is a test product description',
            'current_price' => 99.99,
            'old_price' => 129.99,
            'de_price' => 89.99,
            'es_price' => 95.99,
            'fr_price' => 97.99,
            'it_price' => 93.99,
            'posted_at' => now(),
            'status' => 1
        ]);
    }
}