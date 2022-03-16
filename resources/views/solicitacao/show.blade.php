@extends('layouts.master')

@section('title', 'Consultar Solicitações')

@section('content-title', 'Consulta de solicitações')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header row">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Solicitação
                        detalhada</strong></h4>
            </div>

            <div class="card-content collpase show card-body">
                <dl class="row">
                    <dt class="col-sm-3">Número do protocolo</dt>
                    <dd class="col-sm-9">{{$solicitacao->numero}}</dd>

                    <dt class="col-sm-3">Tipo de contratação</dt>
                    <dd class="col-sm-9">{{$solicitacao->tipo_contratacao}}</dd>

                    <dt class="col-sm-3">Nível</dt>
                    <dd class="col-sm-9">{{$solicitacao->nivel}}</dd>

                    <dt class="col-sm-3">Quantidade de vagas</dt>
                    <dd class="col-sm-9">{{$solicitacao->qtd_contratacao}}</dd>

                    <dt class="col-sm-3">Curso(s)</dt>
                    <dd class="col-sm-9" id="cursos">@foreach($solicitacao->curso as $curso)
                        {{$curso->curso}},@endforeach</dd>

                    <dt class="col-sm-3">Secretaria</dt>
                    <dd class="col-sm-9">{{$solicitacao->secretaria->name}}</dd>

                    <dt class="col-sm-3">Telefone da secretaria</dt>
                    <dd class="col-sm-9">{{$solicitacao->tel_secretaria}}</dd>

                    <dt class="col-sm-3">Recrutador</dt>
                    <dd class="col-sm-9">{{$solicitacao->recrutador->name}}</dd>

                    <dt class="col-sm-3">Responsável pelas entrevistas</dt>
                    <dd class="col-sm-9">{{$solicitacao->responsavel}}</dd>

                    @if($solicitacao->tipo_contratacao == 'Substituição' && isset($solicitacao->nome_estagiario))
                    <dt class="col-sm-3">Nome(s) do(s) estagiário(s) substituído(s)</dt>
                    <dd class="col-sm-9">{{$solicitacao->nome_estagiario}}</dd>
                    @endif

                    <dt class="col-sm-3">Informações</dt>
                    <dd class="col-sm-9">{{$solicitacao->informacoes}}</dd>

                    <dt class="col-sm-3">Data de criação</dt>
                    <dd class="col-sm-9">{{$solicitacao->created_at->format('d/m/Y')}}</dd>

                    <dt class="col-sm-3">Situação</dt>
                    @if($solicitacao->last_state != 'solicitado_ajustes')
                    <dd class="col-sm-9">{{$solicitacao->stateMachine()->metadata('state', 'title')}} </dd>
                    @else
                    <dd class="col-sm-9">{{$solicitacao->stateMachine()->metadata('state', 'title')}} por
                        {{$solicitacao->nome_ajustes}}
                    </dd>
                    @endif

                    @isset($solicitacao->ajustes)
                    <dt class="col-sm-3">Ajustes solicitados</dt>
                    <dd class="col-sm-9">{{$solicitacao->ajustes}}</dd>
                    @endisset

                    <br>
                    <br>
                    <p class="h5 col-sm-12" style="font-weight: bold; font-size: 16px; color: #312f2f;">Candidatos</p>

                    @foreach($solicitacao->candidatos as $candidato)

                    <dt class="col-sm-3">Nome</dt>
                    <dd class="col-sm-9">
                        {{$candidato->user->name}}</dd>

                    <dt class="col-sm-3">Currículo completo</dt>
                    <dd class="col-sm-9">
                        <a href="{{route('curriculo.detalhado', $candidato->id)}}" class="custom-button btn"
                            style="background: #0d47a1; border-color: #0d47a1; color: white;"
                            aria-pressed="true">Informações</a>
                        <a onclick="removerCandidato({{$candidato->id }}, {{$solicitacao->id}})"
                            class="custom-button btn btn-danger">Remover</a>
                    </dd>

                    <br>
                    <br>
                    @endforeach
                </dl>

                <div class="text-center" style="margin-top: 50px;">


                    {{-- APROVAR SOLICITAÇÃO --}}
                    @if($solicitacao->last_state != 'cancelada' && $solicitacao->last_state == 'criada')
                    @role('super-admin|admin-demandante')

                    <a onclick="aprovar({{$solicitacao->id}})" class="custom-button btn btn-success">Aprovar</a>

                    @endrole
                    @elseif($solicitacao->last_state == 'aprovado_adm_demandante')
                    @role('secretario')

                    <a onclick="aprovar({{$solicitacao->id}})" class="custom-button btn btn-success">Aprovar</a>

                    @endrole
                    @endif




                    {{-- SOLICITAR AJUSTES --}}
                    @if($solicitacao->last_state != 'cancelada' && $solicitacao->last_state == 'criada')
                    @role('super-admin|admin-demandante')

                    <a onclick="handleAjustes()" class="custom-button btn btn-warning">Solicitar
                        ajustes</a>

                    @endrole
                    @elseif($solicitacao->last_state != 'cancelada' && $solicitacao->last_state ==
                    'aprovado_adm_demandante')
                    @role('secretario')

                    <a onclick="handleAjustes()" class="custom-button btn btn-warning">Solicitar
                        ajustes</a>

                    @endrole
                    @endif
                    @if($solicitacao->id_ajustes == Auth::user()->id)

                    <a onclick="handleAjustes()" class="custom-button btn btn-warning">Editar
                        ajustes</a>

                    @endif



                    {{-- CANCELAR --}}
                    @if($solicitacao->last_state != 'cancelada' && $solicitacao->last_state == 'criada')
                    @role('super-admin|recrutador-demandante|admin-demandante')

                    <a onclick="cancel({{$solicitacao->id}})" class="custom-button btn btn-danger">Cancelar</a>

                    @endrole
                    @elseif($solicitacao->last_state != 'cancelada' && $solicitacao->last_state ==
                    'aprovado_adm_demandante')
                    @role('secretario')

                    <a onclick="cancel({{$solicitacao->id}})" class="custom-button btn btn-danger">Cancelar</a>

                    @endrole
                    @endif



                    {{-- SELECIONAR CANDIDATOS (RH) --}}
                    @if($solicitacao->last_state != 'cancelada')

                    <a href="{{route('fila', $solicitacao->id)}}" class="custom-button btn btn-primary">Selecionar
                        candidatos</a>

                    @endif




                    {{-- VOLTAR PARA A TELA DE CONSULTA--}}
                    <a href="{{route('consulta')}}" class="custom-button btn btn-primary">Voltar</a>


                    {{-- TEXTAREA PARA OS AJUSTES --}}
                    <form class="form form-horizontal form-bordered" hidden
                        action="{{route('solicitacao.ajustes', $solicitacao->id)}}" method="POST" id="ajustes">
                        <hr>
                        @csrf
                        <div class="form-body">
                            <div class="col-md-10">
                                <div class="form-group row ">
                                    <label class="col-md-3 label-control" for="ajustes">Ajustes</label>
                                    <div class="col-md-9">
                                        <textarea rows="7" id="ajustes" class="form-control" placeholder=""
                                            name="ajustes">{{isset($solicitacao->ajustes) ? $solicitacao->ajustes : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" class="custom-button btn btn-primary" style="margin-top: 12px;">
                                <span class="oi oi-check"></span> Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const ajustes = document.getElementById('ajustes');
    const cursos = document.getElementById('cursos');
    cursos.innerText = cursos.innerText.slice(0, -1);

    function handleAjustes() {
        ajustes.hidden = false;
    }

    function removerCandidato(candidato_id, id) {
        swal({
                title: "Tem certeza que deseja remover o candidato?",
                text: "Ao remover, o candidato será desvinculado desta solicitação",
                icon: "warning",
                buttons: ["Não", 'Remover'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    url = '/remover-candidato/' + candidato_id + '/' + id;
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                        success: function () {
                            swal({
                                title: "Sucesso!",
                                text: "Candidato removido",
                                icon: "success",
                                buttons: false,
                                timer: '1500',
                            }).then(function () {
                                location.reload();
                            });
                        },
                        error: function () {
                            swal({
                                title: 'Opps...',
                                text: "Erro inesperado",
                                icon: 'error',
                                timer: '1500'
                            })
                        }
                    })
                }
            })
    };


    function cancel(id) {
        swal({
                title: "Tem certeza que deseja cancelar a solicitação?",
                text: "Ao cancelar, a solicitação ficará suspensa e não será possível recuperar.",
                icon: "warning",
                buttons: ["Não", true],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    url = "{{ route('solicitacao.cancelar', ':id')}}";
                    url = url.replace(':id', id);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                        success: function () {
                            swal({
                                title: "Sucesso!",
                                text: "Solicitação cancelada",
                                icon: "success",
                                buttons: false,
                                timer: '1500',
                            }).then(function () {
                                location.reload();
                            });
                        },
                        error: function () {
                            swal({
                                title: 'Opps...',
                                text: "Erro inesperado",
                                icon: 'error',
                                timer: '1500'
                            })
                        }
                    })
                }
            })
    };

    function aprovar(id) {
        swal({
                title: "Tem certeza que deseja aprovar a solicitação?",
                text: "Ao aprovar, a solicitação passará para o próximo passo.",
                icon: "warning",
                buttons: ["Não", true],
            })
            .then((willApprove) => {
                if (willApprove) {
                    url = "{{ route('solicitacao.aprovar', ':id')}}";
                    url = url.replace(':id', id);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                        success: function () {
                            swal({
                                title: "Sucesso!",
                                text: "Solicitação aprovada",
                                icon: "success",
                                buttons: false,
                                timer: '1500',
                            }).then(function () {
                                location.reload();
                            });
                        },
                        error: function () {
                            swal({
                                title: 'Opps...',
                                text: "Erro inesperado",
                                icon: 'error',
                                timer: '1500'
                            })
                        }
                    })
                }
            })
    };

</script>

@endsection
