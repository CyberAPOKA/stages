@extends('layouts.master')

@section('title', 'Formação')

@section('content-title', 'Meu Currículo')

@section('content')

@if(session('message'))
  <script>
    Swal.fire({
  position: 'mid-mid',
  icon: 'success',
  title: 'Dados atualizados com sucesso!',
  showConfirmButton: false,
  timer: 1500
})
  </script>
 @endif

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Formação</strong></h4>
            </div>



            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            @foreach ($candidato->formacao as $formacao)
                            <form class="form form-horizontal form-bordered">
                                @csrf
                                <div class="form-body">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="escolaridade">Escolaridade</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="escolaridade" class="form-control"
                                                        placeholder="" readonly name="escolaridade"
                                                        value="{{isset($formacao->listaCursos->escolaridade->escolaridade) ? $formacao->listaCursos->escolaridade->escolaridade : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="curso">Curso</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="curso" class="form-control " placeholder=""
                                                        readonly name="curso"
                                                        value="{{isset($formacao->listaCursos->curso) ? $formacao->listaCursos->curso : ''}}">
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
                                                    <input type="text" id="semestre" class="form-control" placeholder=""
                                                        readonly name="semestre"
                                                        value="{{isset($formacao->semestre) ? $formacao->semestre . 'º' : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="turno">Turno</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="turno" class="form-control " placeholder=""
                                                        readonly name="turno"
                                                        value="{{isset($formacao->turno) ? $formacao->turno : ''}}">
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
                                                        placeholder="" readonly name="instituicao"
                                                        value="{{isset($formacao->instituicao) ? $formacao->instituicao : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="situacao">Situação</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="situacao" class="form-control" placeholder=""
                                                        readonly name="situacao"
                                                        value="{{isset($formacao->situacao) ? $formacao->situacao : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions text-left">
                                    <a href="{{route ('curriculo.formacao.edit', $formacao->id) }}"
                                        class="btn btn-primary" style="margin-top: 12px;">
                                        <span class="oi oi-pencil"></span> Editar
                                    </a>

                                </div>
                            </form>
                            <hr size="50">
                            {{-- @empty --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('destroyFormacao')
<script>
    function destroy(id) {
        swal({
                title: "Tem certeza que deseja deletar?",
                text: "Ao deletar, você sairá da fila de vagas deste curso",
                icon: "warning",
                buttons: ["Cancelar", true],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    url = "{{ route('curriculo.formacao.delete', ':id')}}";
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
                                text: "Formação deletada",
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
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    })
                }
            })
    };

</script>
@endsection
