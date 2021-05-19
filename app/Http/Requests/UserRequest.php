<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
//            'level_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|min:5|max:50|unique:users',
            'password' => 'required|min:4|max:50|unique:users',
        ];
    }

    public function messages()
    {
        return[
//            'level_id.required' => 'Enter your level_id this empty!',
            'fname.required' => 'Enter your first name this empty!',
            'lname.required' => 'Enter your last name this empty!',
            'email.required' => 'Enter your email this empty!',
            'password.required' => 'Enter your password this empty!'
        ];

    }
}
