<?php

namespace App\Http\Requests\Administrator;

use App\ORM\User\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PermissionRequest extends FormRequest
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
        $permission = $this->route()->parameter('permission');

        if ($permission instanceof Permission) {
            $permission = ",{$permission->id}";
        } else {
            $permission = '';
        }

        return [
            'name' => 'required|min:1|max:100|unique:permissions,name' . $permission,
        ];
    }
}
