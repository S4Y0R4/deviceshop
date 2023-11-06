<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'brand_name'=>mb_strtoupper($this->brand_name, 'UTF-8'),
        ]);
    }

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
            'brand_name' => 'required|string|max:255',
            'brand_description' => 'string',
        ];
    }
}
