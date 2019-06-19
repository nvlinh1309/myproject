<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class myRequest extends FormRequest
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
             'mail'=> 'required|email',
             'pwd'=> 'required',
             
        ];
    }

    public function messages()
    {
        return [
             'mail.required'=>'Username must not null',
             'mail.email'=>'Email invalidate',
             'pwd.required'=>'Password must not null',
        ];
        
    }
}
