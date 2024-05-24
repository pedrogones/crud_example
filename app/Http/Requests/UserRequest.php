<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>[
                'required',
                'email'
            ],
            'password'=>[
                'required',
                'confirmed'
            ]
        ];
    }

    public function messages(): array
    {

        return [
        'name.required'=>'Campo nome é obrigatório!',
        'email.required'=>'Email é obrigatório!',
        'email.email'=>'Formato de email incorreto!',
        'password.required'=>'A senha é obrigatória!',
        'password.confirmed'=>'As senhas diferem'
        ];
    }
}
