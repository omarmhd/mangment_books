<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createBookRequest extends FormRequest
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

    public function rules()
    {
        return [

            'category_id'=>'required|integer|exists:categories,id',
            'name'=>"required|string|unique:books,name",
            'number_copies'=>'required|numeric',
            'published_by'=>'required|string',
            'author'=>'required|string',
            'type_delivery'=>'required',
            'number_pages'=>'required|numeric',
            'description'=>'nullable',
            'publish_year'=>'required',
            'file'=>'sometimes|required|file',
            'cover'=>'required|image',
            'delivery_date'=>'required|date'

        ];
    }
}
