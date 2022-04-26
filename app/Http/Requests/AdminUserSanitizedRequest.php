<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class AdminUserSanitizedRequest extends FormRequest
{
    use SanitizesInput;

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
     *  Validation rules to be applied to the input.
     *
     *  @return void
     */
    public function rules()
    {
        return [
            'tipo_user' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'data_nascimento' => 'required',
            'password' => 'required|min:8',
        ];

    }
    /**
     *
     *  Filters to be applied to the input.
     *
     *  @return void
     */
    public function filters()
    {
        return [
            'tipo_user' => 'escape',
            'name' => 'escape',
            'email' => 'trim|escape|lowercase',
        ];
    }

    public function messages()
    {
        return [
            'tipo_user.required' => 'É necessário informar',
            'name.required' => 'É necessário informar',
            'email.required' => 'É necessário informar',
            'email.email' => 'Deve ser um email válido',
            'password.required' => 'É necessário informar',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres',
        ];
    }
}
