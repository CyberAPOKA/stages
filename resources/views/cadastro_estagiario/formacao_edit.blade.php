@extends('layouts.master')

@section('title', 'Formação')

@section('content-title', 'Meu Currículo')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Formação</strong></h4>
            </div>

            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-text"></div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            <form class="form form-horizontal form-bordered"
                                action="{{route('curriculo.formacao.update', $formacao->id)}}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="escolaridade">Escolaridade</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" id="escolaridade" name="escolaridade"
                                                        onchange="handleCursos()">
                                                        <option value="">Selecione uma opção</option>
                                                        @foreach ($listaEscolaridades as $escolaridade)
                                                        <option value="{{$escolaridade->id}}" @if(isset($escolaridade))
                                                            @if($escolaridade->
                                                            escolaridade ==
                                                            $formacao->listaCursos->escolaridade->escolaridade)
                                                            selected @endif @endif>{{$escolaridade->escolaridade}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="curso">Curso</label>
                                                <div class="col-md-8">
                                                    <select class="form-control dropdown" id="curso" name="curso"
                                                        data-live-search="true" data-size="5" data-dropup-auto="false">
                                                        @foreach ($listaCursos as $curso)
                                                        @if($formacao->listaCursos->escolaridade_id ==
                                                        $curso->escolaridade_id)
                                                        <option value="{{$curso->id}}" @if(isset($curso)) @if($curso->
                                                            curso == $formacao->listaCursos->curso)
                                                            selected @endif @endif
                                                            >{{$curso->curso}}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="semestre">Semestre</label>
                                                <div class="col-md-8">
                                                    <select class="form-control dropdown" id="semestre" name="semestre"
                                                        data-dropup-auto="false">
                                                        <option value="">Selecione uma opção</option>
                                                        @for($i = 1; $i < 11; $i++) <option value="{{$i}}"
                                                            @if(isset($formacao)) @if($formacao->semestre == $i)
                                                            selected @endif @endif>{{$i . 'º'}}</option>
                                                            @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="turno">Turno</label>
                                                <div class="col-md-8">
                                                    <select class="form-control dropdown" id="turno" name="turno"
                                                        data-dropup-auto="false">
                                                        <option value="">Selecione uma opção</option>
                                                        <option value="Manhã" @if(isset($formacao)) @if($formacao->
                                                            turno == "Manhã") selected @endif @endif>Manhã</option>
                                                        <option value="Tarde" @if(isset($formacao)) @if($formacao->
                                                            turno == "Tarde") selected @endif @endif>Tarde</option>
                                                        <option value="Noite" @if(isset($formacao)) @if($formacao->
                                                            turno == "Noite") selected @endif @endif>Noite</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="instituicao">Instituição</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="instituicao" class="form-control"
                                                        placeholder="" name="instituicao"
                                                        value="{{isset($formacao->instituicao) ? $formacao->instituicao : old('instituicao')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="situacao">Situação</label>
                                                <div class="col-md-8">
                                                    <select class="form-control dropdown" id="situacao" name="situacao"
                                                        data-dropup-auto="false">
                                                        <option value="">Selecione uma opção</option>
                                                        <option value="Em andamento" @if(isset($formacao))
                                                            @if($formacao->situacao == "Em andamento") selected
                                                            @endif @endif>Em andamento</option>
                                                        <option value="Finalizado" @if(isset($formacao)) @if($formacao->
                                                            situacao == "Finalizado") selected @endif
                                                            @endif>Finalizado</option>
                                                        <option value="Trancado" @if(isset($formacao)) @if($formacao->
                                                            situacao == "Trancado") selected @endif
                                                            @endif>Trancado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions text-left">
                                    <button type="submit" class="btn btn-primary bg-white rounded"
                                        style="margin-top: 12px;">
                                        <span class="oi oi-check"></span> Salvar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr size="50">
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\FormacaoSanitizedRequest') !!}

<script>
    const select = document.getElementById('escolaridade');
    const curso = document.getElementById('curso');

    function handleCursos() {
        if (select.value == 1) {
            curso.innerHTML =
                "<option value=''>Selecione uma opção</option> @foreach ($listaCursos as $listaCurso) @if($listaCurso->escolaridade_id == 1) <option value='{{$listaCurso->id}}'data-tokens='{{$listaCurso->curso}}'> {{$listaCurso->curso}}</option> @endif @endforeach";
        } else if (select.value == 2) {
            curso.innerHTML =
                "<option value=''>Selecione uma opção</option> @foreach ($listaCursos as $listaCurso) @if($listaCurso->escolaridade_id == 2) <option value='{{$listaCurso->id}}'data-tokens='{{$listaCurso->curso}}'> {{$listaCurso->curso}}</option> @endif @endforeach";
        } else if (select.value == 3) {
            curso.innerHTML =
                "<option value=''>Selecione uma opção</option> @foreach ($listaCursos as $listaCurso) @if($listaCurso->escolaridade_id == 3) <option value='{{$listaCurso->id}}'data-tokens='{{$listaCurso->curso}}'> {{$listaCurso->curso}}</option> @endif @endforeach";
        } else {
            curso.innerHTML = "<option value=''>Selecione uma opção</option>";
        }
    }

</script>

@stop
