<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "phone_number"                  =>  "required|min:10" ,
            "password"                      =>  "required|min:6" ,
            "activation_code"               =>  "required"
        ];
    }
}
