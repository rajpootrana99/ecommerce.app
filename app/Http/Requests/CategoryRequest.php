<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        return tap([
            'category_name' => 'required'
        ], function (){
            if(request()->hasFile(request()->icon)){
                request()->validate([
                    'icon' => 'required|file|image',
                ]);
            }
        });
    }
}
