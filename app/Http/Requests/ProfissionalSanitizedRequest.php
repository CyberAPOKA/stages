<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class ProfissionalSanitizedRequest extends FormRequest
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
            'cursosrealizados' => 'required',
            'outrosconhecimentos' => 'required',
            'experienciasprofissionais' => 'required',
            'jafoiestagiario' => 'required',
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     *  @return void
     */


    public function messages()
    {
        return [
            'cursosrealizados.required' => 'É necessário informar',
            'outrosconhecimentos.required' => 'É necessário informar',
            'experienciasprofissionais.required' => 'É necessário informar',
            'jafoiestagiario.required' => 'É necessário informar',
        ];
    }
}
