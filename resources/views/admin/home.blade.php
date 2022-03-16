@extends('layouts.master')

@section('title', 'Página Inicial')


@section('content')
<style>
    dl {
        display: flex;
        height: 100%;
        flex: 1;
    }

    table thead th {
        color: #575962 !important;
    }

</style>

<div class="card card-fullscreen shadow">
    <div class="card-header text-center">
        <h4 class="card-title"> <strong>Painel de Controle Admin</strong>
        </h4>
    </div>
    <div class="card-content show">
        <div class="card-body">
            <div class="card-group">
                <div class="card shadow" id="card-curriculo">
                    <div class="card-header text-center">
                        <h4 class="card-title"><strong>Número de usuários</strong></h4>
                    </div>
                    <div class="card-body ">
                        <dl class="row">
                            <dt class="col-sm-6">Admin</dt>
                            <dd class="col-sm-6">{{$admin}}</dd>

                            <dt class="col-sm-6">Candidato</dt>
                            <dd class="col-sm-6">{{$candidato}}</dd>

                            <dt class="col-sm-6">Recrutador</dt>
                            <dd class="col-sm-6">{{$recrutador}}</dd>

                            <dt class="col-sm-6">Admin Demandante</dt>
                            <dd class="col-sm-6">{{$adminDemandante}}</dd>

                            <dt class="col-sm-6">Secretário</dt>
                            <dd class="col-sm-6">{{$secretario}}</dd>

                            <dt class="col-sm-6">Secretarias</dt>
                            <dd class="col-sm-6">{{$secretaria}}</dd>
                        </dl>
                    </div>
                </div>

                <div class="card shadow
            ">
                    <div class="card-header text-center">
                        <h4 class="card-title"><strong>Últimas Solicitações</strong></h4>
                    </div>
                    <div class="card-body ">
                        <table class="table table-responsive">
                            <thead align="center">
                                <th>Número</th>
                                <th>Secretaria</th>
                                <th>Nível</th>
                                <th>Data</th>
                            </thead>
                            <tbody align="center">
                                @foreach($solicitacoes as $solicitacao)
                                <tr>
                                    <td>{{$solicitacao->numero}}</td>
                                    <td>{{$solicitacao->secretaria->name}}</td>
                                    <td>{{$solicitacao->nivel}}</td>
                                    <td>{{$solicitacao->created_at->format('d/m/Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
