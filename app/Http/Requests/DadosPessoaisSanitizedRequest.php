<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class DadosPessoaisSanitizedRequest extends FormRequest
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
            'name' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'email' => 'required',
            'telefoneresidencial' => 'required',
            'telefonecelular' => 'required',
            'data_nascimento' => 'required|date',
            'rua' => 'required',
            'numero_rua' => 'required',
            'cep' => 'required',
            //'bairro' => 'required',
            'cidade' => 'required',
            'complemento' => 'required',
            'raca' => 'required',
            'nome_pai' => 'required',
            'nome_mae' => 'required',

           /* 'pcd' => 'required'*/
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     *  @return void
     */
    public function filters()
    {
        return [
            'name' => 'capitalize|escape',
            'cpf' => 'escape',
            'rg' => 'escape',
            'numero_rua' => 'digit',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'É necessário informar.',


        ];
    }
}
