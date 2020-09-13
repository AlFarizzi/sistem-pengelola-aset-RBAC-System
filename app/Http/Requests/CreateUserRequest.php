<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            "username" => ['required'],
            "nama" => ['required'],
            "password" => ['required','confirmed'],
            "password_confirmation" => ['required'],
            "alamat","email","no_hp","nik","jk","level" => ['required'],
        ];
    }
}
