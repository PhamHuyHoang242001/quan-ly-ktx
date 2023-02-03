<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ValidateProfile extends FormRequest
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
            'mssv'  =>  'required|numeric|min:8|unique:profiles',
            'sdt' =>  'required|string|min:10',
            'quequan' =>  'required|string',
            'khoa' => 'required',
            'gender' => 'required',
            'vien' => 'required',
        ];
    }
}
