<?php

namespace App\Http\Requests\Administrator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SpecieRequest extends FormRequest
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
        $specie = $this->route()->parameter('species');

        $specie = isset($specie) ? ",{$specie}" : '';

        return [
            'name'           => 'required|min:1|max:100|unique:species,name' . $specie,
            'animal_type_id' => 'required|integer',
        ];
    }
}
