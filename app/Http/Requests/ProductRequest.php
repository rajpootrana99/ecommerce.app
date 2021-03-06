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
            'category_id' => 'required',
            'company_id' => 'required',
            'model_name' => 'required',
            'description' => 'required',
            'sale_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'qty' => 'numeric|required',
        ];
    }
}
