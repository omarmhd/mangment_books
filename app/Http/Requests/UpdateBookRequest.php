<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'course_id'=>'integer|exists:Category,id',
            'name'=>"required|string|unique:books,name,{$this->book}",
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
