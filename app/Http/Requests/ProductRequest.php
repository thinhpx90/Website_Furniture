<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'type_product_id' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'description' => 'nullable|max:5000',
            'origin' => 'required',
            'material' => 'required',
            'size' => 'required',
            'unit_price' => 'required|numeric',
            'promotion_price' => 'nullable|numeric',
            'unit' => 'required',
            'image' => 'nullable'
        ];
    }
}
