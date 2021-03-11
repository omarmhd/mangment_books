<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name'=>'required|string',
            'phone'=>'required|numeric',
            'email'=>"required|email|unique:users,email,{$this->user}",
            'role'=>'required',
            'image'=>'sometimes|required|mimes:jpg,png,jpeg',
            'password'=>'nullable'

        ];
    }
}
