<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
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
               'user_id'=>'integer|exists:users,id',
                'book_id'=>'integer|exists:books,id',
                'note'=>'nullable',
                'collection_appointment'=>'required|date',

        ];
    }
}
