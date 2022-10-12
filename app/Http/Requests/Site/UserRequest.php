<?php

namespace App\Http\Requests\Site;

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
            'name'              => 'required|min:6|max:100',
            'email'             => 'required|email|max:50|unique:users',
            'password'          => 'required|min:8|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => 'O campo Nome é obrigatório!',
            'name.min'              => 'O campo Nome deve conter no mínimo 3 letras!',
            'name.max'              => 'O campo Nome deve conter no máximo 100 letras!',
            'email.required'        => 'O campo E-mail é obrigatório!',
            'email.email'           => 'O campo E-mail deve conter um formato válido!',
            'email.max'             => 'O campo E-mail deve conter no máximo 50 letras!',
            'email.unique'          => 'Já existe esse e-mail cadastrado, favor recupere a conta ou utilize outro!',
            'password.required'     => 'O campo Senha é obrigatório!',
            'password.min'          => 'O campo Senha deve conter no mínimo 8 letras/números/simbolos!',
            'password.confirmed'    => 'O campo Senha e Confirme a senha devem ser iguais!',
        ];
    }
}
