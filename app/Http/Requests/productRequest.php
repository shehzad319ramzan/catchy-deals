<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow public API access
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'asin' => 'nullable|string|max:255',
            'ean' => 'nullable|string|max:255',
            'product_url' => 'nullable|url',
            'img_url' => 'nullable|url',
            'description' => 'nullable|string',
            'current_price' => 'nullable|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'de_price' => 'nullable|numeric|min:0',
            'es_price' => 'nullable|numeric|min:0',
            'fr_price' => 'nullable|numeric|min:0',
            'it_price' => 'nullable|numeric|min:0',
            'posted_at' => 'nullable|date',
        ];
    }
}
