<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class SolicitacaoSanitizedRequest extends FormRequest
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
            'nivel' => 'required',
            'cursos' => 'required|array',
            'qtd_contratacao' => 'required_if:tipo_contratacao,Nova Contratação',
            'tel_secretaria' => 'required',
            'responsavel' => 'required',
            'horarios' => 'sometimes',
            'tipo_contratacao' => 'required',
            'nome_estagiario' => 'required_if:tipo_contratacao,Substituição',
            'informacoes' => 'sometimes',
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
            'nivel' => 'capitalize|escape',
            'cursos' => 'escape',
            'qtd_contratacao' => 'digit',
            'tel_secretaria' => 'escape',
            'responsavel' => 'capitalize|escape',
            'horarios' => 'escape',
            'tipo_contratacao' => 'capitalize|escape',
            'nome_estagiario' => 'capitalize|escape',
            'informacoes' => 'capitalize',
        ];
    }

    public function messages()
    {
        return [
            'nivel.required' => 'É necessário informar',
            'cursos.required' => 'É necessário informar',
            'qtd_contratacao.required' => 'É necessário informar',
            'tel_secretaria.required' => 'É necessário informar',
            'responsavel.required' => 'É necessário informar',
            'tel_secretaria.required' => 'É necessário informar',
            'tipo_contratacao.required' => 'É necessário informar',
            'nome_estagiario.required_if' => 'É necessário informar',
        ];
    }
}
