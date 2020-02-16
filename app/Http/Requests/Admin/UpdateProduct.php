<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'name' => 'string',
            'cost' => 'numeric|min:1',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'characteristics' => 'required|array'
        ];
    }
}
