@extends('layouts.master')

@section('title', 'Criar Usuários')

@section('content')

<div class="card card-fullscreen shadow">
    <div class="card-header text-center">
        <h4 class="card-title"> <strong>Criar Usuários</strong>
        </h4>
    </div>
    <div class="card-content collpase show">
        <div class="card-body">
            <form class="form form-horizontal form-bordered" action="{{route('users.store', Auth::user()->id)}}"
                method="POST">
                @csrf
                <div class="form-body">
                    <div class="col-md-10">
                        <div class="form-group row ">
                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                for="tipo_user">Tipo de usuário</label>
                            <div class="col-md-9">
                                <select class="form-control dropdown" id="tipo_user" name="tipo_user"
                                    data-dropup-auto="false" onchange="handleInput()">
                                    <option value="">Selecione uma opção</option>
                                    <option value="Admin-demandante">Admin demandante</option>
                                    <option value="Recrutador">Recrutador</option>
                                    <option value="Secretário">Secretário</option>
                                    <option value="Secretaria">Secretaria</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10" id="div" disabled hidden>
                        <div class="form-group row ">
                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                for="secretaria">Secretaria</label>
                            <div class="col-md-9">
                                <select class="form-control dropdown" id="secretaria" name="secretaria"
                                    data-dropup-auto="false">
                                    <option value="">Selecione uma opção</option>
                                    @foreach($secretarias as $secretaria)
                                    <option value="{{$secretaria->id}}">{{$secretaria->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group row ">
                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                for="name">Nome</label>
                            <div class="col-md-9">
                                <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group row ">
                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                for="email">Email</label>
                            <div class="col-md-9">
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{old('email')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group row ">
                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                for="password">Senha</label>
                            <div class="col-md-9">
                                <input type="password" id="password" class="form-control" name="password"
                                    value="{{old('password')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions text-left">
                    <button type="submit" class="btn btn-primary" style="margin-top: 12px;">
                        <span class="oi oi-check"></span> Criar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\AdminUserSanitizedRequest') !!}

<script>
    const user = document.getElementById('tipo_user');
    const secretaria = document.getElementById('secretaria');
    const div = document.getElementById('div');

    function handleInput() {
        if (user.value == 'Recrutador' || user.value == 'Admin-demandante' || user.value == 'Secretário') {
            div.disabled = false;
            div.hidden = false;
        } else {
            div.disable = true;
            div.hidden = true;
        }
    }

</script>

@endsection
