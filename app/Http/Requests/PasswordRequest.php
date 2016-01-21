<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordRequest extends Request
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
            //
            'newpassword'=>'required|min:8',
            'repeatpassword'=>'required|same:newpassword'
        ];
    }


    public function messages()
    {
        return [
            'newpassword.required'  => 'Type your new password',
            'repeatpassword.required' => 'Please retype your new password'
        ];
    }
}