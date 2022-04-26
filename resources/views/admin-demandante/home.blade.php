@extends('layouts.master')

@section('title', 'Página Inicial')

@section('content')

<div class="card card-fullscreen shadow">
    <div class="card-header text-center">
        <h4 class="card-title"> <strong>Página Inicial Admin Demandante</strong>
        </h4>
    </div>
    <div class="card-content collpase show">
        <div class="card-body">
            <div class="card shadow-md
            " style="width: 50%;">
                <div class="card-header text-center">
                    <h4 class="card-title">Minhas Solicitações</h4>
                </div>
                <div class="card-body text-center">
                    {{-- <a href="{{route('consulta')}}" class="btn-add btn-primary"
                    style="padding: 15px 15px; font-size: 18px; font-weigth: bold">Acessar</a> --}}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
