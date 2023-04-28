<?php

namespace App\Http\Requests\Administrator;

use App\ORM\User\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the role is authorized to make this request.
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
        $role = $this->route()->parameter('role');

        $role = $this->isRole($role) ? ",{$role->id}" : '';

        return [
            'name'          => 'required|min:1|max:100|unique:roles,name' . $role,
            'permissions.*' => 'required|integer',
        ];
    }

    private function isRole($role): bool
    {
        return $role instanceof Role;
    }
}
