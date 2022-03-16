<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class FormacaoSanitizedRequest extends FormRequest
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
            'escolaridade' => 'required',
            'curso' => 'required',
            'semestre' => 'required',
            'turno' => 'required',
            'instituicao' => 'required',
            'situacao' => 'required',
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
            'escolaridade' => 'capitalize|escape',
            'curso' => 'capitalize|escape',
            'semestre' => 'escape|digit',
            'turno' => 'trim|capitalize|escape',
            'instituicao' => 'escape',
            'situacao' => 'escape',
        ];
    }

    public function messages()
    {
        return [
            'escolaridade.required' => 'É necessário informar.',
            'curso.required' => 'É necessário informar.',
            'semestre.required' => 'É necessário informar.',
            'turno.required' => 'É necessário informar.',
            'instituicao.required' => 'É necessário informar.',
            'situacao.required' => 'É necessário informar.',
        ];
    }
}
