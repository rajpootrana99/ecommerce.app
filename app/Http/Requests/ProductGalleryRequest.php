<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductGalleryRequest extends FormRequest
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
            'product_id' => 'required',
        ], function (){
            if(request()->hasFile(request()->product_image)){
                request()->validate([
                    'product_image' => 'required|file|image',
                ]);
            }
        });
    }
}
