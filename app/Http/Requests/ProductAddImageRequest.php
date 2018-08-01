<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ProductCreateRequest extends FormRequest
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
            //
            'name'        => 'required|min:4|unique:products',
            'category_id' => 'required',
            'stock'       => 'required|numeric',
            'price'       => 'required|numeric',
            'status'      => 'required',
            'description' => 'required|min:10|max:255',
            // 'image'       => 'required|mimes:jpeg,png,jpg,png|max:2048',
        ];
    }

    public function messages()
    {
        // use trans instead on Lang
        return [
            'name.required' => 'Product name is required',
            'category_id.required' => 'Please add a category first before adding a product',
        ];
    }
}
