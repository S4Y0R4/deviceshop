<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        //Приводим первую кириллическую букву в слове в верхний регистр
        $this->merge([
            'category_name' => mb_strtoupper(mb_substr($this->category_name, 0, 1, 'UTF-8'),'UTF-8') . mb_strtolower(mb_substr($this->category_name, 1),'UTF-8'),
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
            'category_name' => 'required|string|max:255',
            'category_description' => 'string',
        ];
    }
}
