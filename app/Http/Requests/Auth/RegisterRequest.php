<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name"                =>  "required|min:3" ,
            "last_name"                 =>  "required|min:3" ,
            "phone_number"              =>  "required|min:10|unique:users,phone_number" ,
        ];
    }
}
