<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|numeric|max:255',
            'brand_id' => 'required|numeric|max:255',
            'product_description' => 'required|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ];
    }
}
