<?php

namespace App\Http\Requests\Administrator;

use App\ORM\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route()->parameter('user');

        $user = $this->isUser($user) ? ",{$user->id}" : '';

        return [
            'name'      => 'required|max:100',
            'email'     => 'required|max:100|email|unique:users,email' . $user,
            'password'  => empty($user) ? 'required|min:8' : '',
            'city_id'   => 'required|integer'
        ];
    }

    private function isUser($user): bool
    {
        return $user instanceof User;
    }
}
