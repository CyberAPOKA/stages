@extends('layouts.master')

@section('title', 'Fila de candidatos por curso')

@section('content')

<div class="card card-fullscreen shadow">
    <div class="card-header text-center">
        <h4 class="card-title"> <strong>Fila de candidatos por curso</strong>
        </h4>
    </div>
    <div class="container col-6">
        <div class="form-group justify-content-center text-center">
            <form action="{{route('filtrar', $solicitacao->id)}}" method="get">
                @csrf
                <select class="form-control selectpicker dropdown" id="curso" name="curso" data-live-search="true"
                    data-size="10" data-dropup-auto="false" data-title="Selecione um curso">
                    @foreach ($listaCursos as $listaCurso)
                    <option value="{{$listaCurso->id}}" data-tokens="{{$listaCurso->curso}}">
                        {{$listaCurso->curso}}</option>
                    @endforeach
                </select>
                <button class="custom-button btn btn-primary" type="submit"
                    style="margin-top: 10px !important;">Filtrar</button>
            </form>
        </div>
    </div>
    <div>
        <form action="{{route('vincular.candidatos', $solicitacao->id)}}" method="post">
            @csrf
            <input readonly type="text" id="candidatos" class="form-control" name="candidatos"
                style="border: 0px solid white !important; height: 0px !important; padding: 0px !important;">
            <button class="custom-button btn btn-primary" type="submit"
                style="margin-top: 10px !important; margin-left: 30px !important;">Selecionar</button>
        </form>
    </div>
    <hr class="custom-hr">
    <div class="card-content show">
        <div class="card-body">
            <div class="card-group">
                <div class="table-responsive">
                    <table class="table table-striped" id="fila">
                        <thead align="center">
                            <tr>
                                <th scope="col-sm-1" width="10%">Posição</th>
                                <th scope="col">Nome</th>
                                <th scope="col">PCD</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Data de registro</th>
                                <th scope="col">Selecionar</th>
                                <th scope="col">Informações</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @isset($formacoes)
                            @foreach ($formacoes as $formacao)
                            @foreach($formacao as $f)
                            <tr>
                                <td></td>
                                <td>{{$f->candidato->user->name}}</td>
                                <td>
                                    @if ($f->candidato->pcd == 1)
                                    Sim
                                    @else
                                    Não
                                    @endif</td>
                                <td>{{$f->listaCursos->curso}}</td>
                                <td>{{$f->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <a id="adicionar{{ $f->candidato->id }}"
                                        onclick="adicionar({{ $f->candidato->id }})" data-toggle="tooltip"
                                        data-placement="bottom" title="Escolher"><span class="oi oi-plus"
                                            style="color: green;"></span></a>

                                    <a id="remover{{ $f->candidato->id }}" onclick="remover({{ $f->candidato->id }})"
                                        hidden data-toggle="tooltip" data-placement="bottom" title="Remover"><span
                                            class="oi oi-minus" style="color: red;"></span></a>
                                </td>
                                <td>
                                    <a href="{{route('curriculo.detalhado', $f->candidato->id)}}"
                                        onclick="event.preventDefault();" class="btn-lg" role="button"
                                        aria-pressed="true" data-toggle="modal" data-placement="bottom"
                                        data-target="#yourModal{{$f->candidato->id}}" title="Informações"><span
                                            class="oi oi-info"></span></a>
                                    {{-- <a href="{{route('curriculo.detalhado', $f->candidato->id)}}">Modal</a> --}}
                                    {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                        data-target="#yourModal{{$f->candidato->id}}"> --}}
                                </td>
                                <td style="width:1% !important;"></td>
                            </tr>
                            {{-- @include('candidato.modal_exemplo') --}}
                            @endforeach
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    function adicionar(id) {
        value = $("#candidatos").val();
        var soma = parseFloat($("#soma").val());
        if (value == "") {
            $("#candidatos").val(id);
            $("#adicionar" + id).attr("hidden", true);
            $("#remover" + id).attr("hidden", false);
            $("#soma").val(soma + 1);
            $('#teste').attr('hidden', false)
        } else {
            $("#candidatos").val(value + "," + id);
            $("#adicionar" + id).attr("hidden", true);
            $("#remover" + id).attr("hidden", false);
            $("#soma").val(soma + 1);
        }
    }

    function remover(id) {
        var soma = parseFloat($("#soma").val());
        // Pega o value atual
        value = $("#candidatos").val();

        var res = value.split(",");

        for (let index = 0; index < res.length; index++) {
            if (res[index] == id) {
                $(res[index] = null);
            }
        }
        var filtered = res.filter(function (el) {
            return el != null;
        });

        var ultima = filtered.join();

        if (ultima == ',') {
            $("#candidatos").val('');
            $("#soma").val(soma - 1);
        } else {
            $("#candidatos").val(ultima);
            $("#remover" + id).attr("hidden", true);
            $("#adicionar" + id).attr("hidden", false);
            $("#soma").val(soma - 1);
        }
        var soma = parseFloat($("#soma").val());
        if (soma == 0) {
            $('#teste').attr('hidden', true);
        }
    }

</script>



<script>
    $(document).ready(function () {
        const table = $('#fila').DataTable({
            responsive: true,
            "autoWidth": false,
            // "order": [
            //     [1, 'asc']
            // ],
            columnDefs: [{
                    responsivePriority: 1,
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                },
                {
                    responsivePriority: 1,
                    "searchable": false,
                    "orderable": false,
                    targets: 1,
                },
                {
                    responsivePriority: 10001,
                    "searchable": false,
                    "orderable": false,
                    targets: 2
                },
                {
                    responsivePriority: 10001,
                    "searchable": false,
                    "orderable": false,
                    targets: 3
                },
                {
                    responsivePriority: 10001,
                    "searchable": false,
                    "orderable": false,
                    targets: 4
                },
                {
                    responsivePriority: 1,
                    "searchable": false,
                    "orderable": false,
                    targets: 5
                },
                {
                    responsivePriority: 1,
                    "searchable": false,
                    "orderable": false,
                    targets: 6
                },
                {
                    responsivePriority: 1,
                    "searchable": false,
                    "orderable": false,
                    targets: 7
                },
            ],
            "orderCellsTop": true,
            "fixedHeader": true,
            "bFilter": false,
            "info": false,
            "sLengthMenu": false,
            "bLengthChange": false,
            "oLanguage": {

                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de START até END de TOTAL registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de MAX registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "MENU resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }

            },
        });


        table.on('order.dt search.dt', function () {
            table.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });

</script>

@endsection