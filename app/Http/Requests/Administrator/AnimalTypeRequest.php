<?php

namespace App\Http\Requests\Administrator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AnimalTypeRequest extends FormRequest
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
        $animalType = $this->route()->parameter('animal_type');

        $animalType = isset($animalType) ? ",{$animalType}" : '';

        return [
            'name' => 'required|min:1|max:100|unique:animal_types,name' . $animalType,
        ];
    }
}
