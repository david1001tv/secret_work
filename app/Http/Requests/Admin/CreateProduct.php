<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'cost' => 'required|numeric|min:1',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'category' => 'required|integer|exists:product_categories,id',
            'characteristics' => 'required|array'
        ];
    }
}
