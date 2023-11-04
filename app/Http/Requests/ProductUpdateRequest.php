<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'product_name' => 'string|max:255',
            'category_id' => 'numeric|max:255',
            'brand_id' => 'numeric|max:255',
            'product_description' => 'string',
            'image' => 'nullable|string',
            'price' => 'numeric|min:0'
        ];
    }
}
