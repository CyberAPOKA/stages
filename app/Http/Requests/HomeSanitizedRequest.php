<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class HomeSanitizedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomesocial' => 'required',
            'rg' => 'required',
            'telefoneresidencial' => 'required',
            'telefonecelular' => 'required',
            'data_nascimento' => 'required|date',
            'rua' => 'required',
            'numero_rua' => 'required',
            'cep' => 'required',
            'cidade' => 'required',
            //'bairro' => 'required',
            //'bairro2' => 'required',
            'complemento' => 'required',
            'raca' => 'required',
            'nome_pai' => 'required',
            'nome_mae' => 'required',
            'escolaridade' => 'required',
            'curso' => 'required',
            'semestre' => 'required',
            'turno' => 'required',
            'instituicao' => 'required',
            'situacao' => 'required',

            'cursosrealizados' => 'required',
            'outrosconhecimentos' => 'required',
            'experienciasprofissionais' => 'required',
            'jafoiestagiario' => 'required',
            'situacao' => 'required',
            'situacao' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'É necessário informar.',
        ];
    }

}
