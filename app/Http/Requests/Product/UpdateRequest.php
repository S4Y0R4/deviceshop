<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

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
