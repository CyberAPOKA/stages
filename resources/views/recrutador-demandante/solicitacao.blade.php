@extends('layouts.master')

@section('title', 'Criar Solicitação')

@section('content-title', 'Criar Solicitação')

@section('breadcrumbs')

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header row">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Formulário para processo de
                        seleção</strong></h4>
            </div>

            {{--  @forelse ($users as $user) --}}
            <div class="card-content collpase show card-body">
                <form class="form form-horizontal form-bordered"
                    action="{{route('solicitacao.store', Auth::user()->id)}}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="col-sm-12">
                            <div class="form-group row ">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="userinput2">Nível</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="nivel" name="nivel">
                                        <option value="">Selecione uma opção</option>
                                        <option value="Médio"> Médio</option>
                                        <option value="Técnico"> Técnico</option>
                                        <option value="Superior"> Superior</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group row  ">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="tipo_contratacao">Tipo de contratação</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="tipo_contratacao" name="tipo_contratacao"
                                        onchange="handleInput()">
                                        <option value="">Selecione uma opção</option>
                                        <option value="Nova Contratação" id="nova"> Nova Contratação</option>
                                        <option value="Substituição" id="substituicao">
                                            Substituição</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" id="div_quantidade" disabled hidden>
                            <div class="form-group row  ">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="qtd_contratacao">Quantidade de contratações</label>
                                <div class="col-md-9">
                                    <input type="number" id="qtd_contratacao" class="form-control " placeholder=""
                                        name="qtd_contratacao">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" id="div_estagiario" disabled hidden>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="nome_estagiario">Nome do estagiário</label>
                                <div class="col-md-9">
                                    <input type="text" id="nome_estagiario" class="form-control "
                                        name="nome_estagiario">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group row  ">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="cursos">Curso(s) do(s) estagiário(s)</label>
                                <div class="col-md-9">
                                    <select multiple class="form-control selectpicker dropdown" id="cursos"
                                        name="cursos[]" data-live-search="true" data-size="5" data-dropup-auto="false"
                                        data-title="Selecione um ou mais cursos">
                                        @foreach ($listaCursos as $listaCurso)
                                        <option value="{{$listaCurso->id}}" data-tokens="{{$listaCurso->curso}}">
                                            {{$listaCurso->curso}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group row  ">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="tel_secretaria">Telefone da Secretaria</label>
                                <div class="col-md-9">
                                    <input type="text" id="tel_secretaria" class="form-control phone_with_ddd"
                                        placeholder="" name="tel_secretaria">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group row  ">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="responsavel">Responsável pelas entrevistas</label>
                                <div class="col-md-9">
                                    <input type="text" id="responsavel" class="form-control " placeholder=""
                                        name="responsavel">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-12">
                            <div class="form-group row  ">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="horarios">Horários</label>
                                <div class="col-md-9">
                                    <input type="time" id="horarios" class="form-control " placeholder=""
                                        name="horarios">
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-sm-12">
                            <div class="form-group row ">
                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="informacoes">Outras informações</label>
                                <div class="col-md-9">
                                    <textarea rows="7" id="informacoes" class="form-control" placeholder=""
                                        name="informacoes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions text-center" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary bg-white rounded"><span class="oi oi-check"></span>
                            Enviar</button>
                        <a href="" style="margin-left: 20px; text-align: center; color: #000; ">Cancelar</a>
                    </div>
                </form>
            </div>
            <hr size="50">
        </div>
        {{-- @empty --}}

        {{--   @endforelse --}}
    </div>
</div>

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\SolicitacaoSanitizedRequest') !!}

<script>
    const estagiario = document.getElementById('div_estagiario');
    const nome_estagiario = document.getElementById('nome_estagiario');
    const select = document.getElementById('tipo_contratacao');
    const div_quantidade = document.getElementById('div_quantidade');
    const qtd_contratacao = document.getElementById('qtd_contratacao');

    function handleInput() {
        if (select.value == 'Substituição') {
            estagiario.disabled = false;
            estagiario.hidden = false;
        } else {
            estagiario.disabled = true;
            estagiario.hidden = true;
            nome_estagiario.value = '';
        }

        if (select.value == 'Nova Contratação') {
            div_quantidade.disabled = false;
            div_quantidade.hidden = false;
        } else {
            div_quantidade.disabled = true;
            div_quantidade.hidden = true;
            qtd_contratacao.value = '';
        }

    }

</script>

@endsection
