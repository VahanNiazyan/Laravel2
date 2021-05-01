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
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|min:5|max:50',
            'password' => 'required|min:4|max:500',
        ];
    }

    public function messages()
    {
        return[
            'fname.required' => 'Enter your name this empty!',
            'lname.required' => 'Enter your email this empty!',
            'email.required' => 'Enter your subject this empty!',
            'password.required' => 'Enter your message this empty!'
        ];
        
    }
}
