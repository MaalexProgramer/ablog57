<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
{
	public function authorize()
	{
			return true;
	}


	public function rules()
	{
		$rules = [
			'display_name' => 'required'
		];

		if ($this->method() !== 'PUT') {
			$rules['name'] = 'required|unique:roles';
		}

		return $rules;
	}

	public function messages()
	{
		return [
			'name.required' => 'El identificador del rol es obligatorio.',
			'name.unique' 	=> 'Este identificador ya ha sido registrado.',
			'display_name.required' => 'El nombre del rol es obligatorio.'
		];
	}
}