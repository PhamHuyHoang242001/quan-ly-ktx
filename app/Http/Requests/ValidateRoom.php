<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ValidateRoom extends FormRequest
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
            'area' => 'required',
            'gender' => 'required',
            'room_number' => 'required|numeric',
            'max_numbers' => 'required|numeric',
        ];
    }
}
