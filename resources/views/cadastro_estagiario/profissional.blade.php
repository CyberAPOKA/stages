@extends('layouts.master')

@section('title', 'Profissional')

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
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Experiência e Conhecimentos</strong></h4>
            </div>



            <div class="card-content collpase show">
                <div class="card-body">
                    @foreach ($candidato->profissional as $profissional)
                    <form class="form form-horizontal form-bordered">
                        <div class="form-body">
                            <br>
                            <h4 class="text-center">Cursos realizados</h4>
                            <div class="col-md-10">
                                <div class="form-group row ">
                                    <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="cursosrealizados"><br>
                                    - Nome do curso<br>
                                    - Instituição<br>
                                    - Carga horária<br>
                                    - Data de conclusão</label>
                                <div class="col-md-9">
                                    <textarea type="text" id="cursosrealizados" class="form-control " readonly
                                        placeholder="" name="cursosrealizados" cols="50" rows="10"  value="{{old('cursosrealizados')}}"><?php echo htmlspecialchars($profissional->cursosrealizados); ?></textarea>

                                </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="text-center">Outros conhecimentos </h4>
                            <div class="col-md-10">
                                <div class="form-group row ">
                                    <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="outrosconhecimentos"><br>
                                    - Informática<br>
                                    - Idiomas<br>
                                    - Outras habilidades<br>
                                   </label>
                                <div class="col-md-9">
                                    <textarea type="text" id="outrosconhecimentos" class="form-control" readonly
                                        placeholder="" name="outrosconhecimentos" cols="50" rows="10" value="{{old('outrosconhecimentos')}}"><?php echo htmlspecialchars($profissional->outrosconhecimentos); ?></textarea>

                                </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="text-center">Experiências profissionais</h4>
                            <div class="col-md-10">
                                <div class="form-group row ">
                                    <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="experienciasprofissionais"><br>
                                    - Estágios<br>
                                    - Trabalhos<br>
                                    - Freelas<br></label>
                                <div class="col-md-9">
                                    <textarea type="text" id="experienciasprofissionais" class="form-control" readonly
                                        placeholder="" name="experienciasprofissionais" cols="50" rows="10"  value="{{old('experienciasprofissionais')}}"><?php echo htmlspecialchars($profissional->experienciasprofissionais); ?></textarea>

                                </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row ">
                                    <label class="col-md-4 label-control" for="jafoiestagiario">Já foi estagiário da
                                        Prefeitura Municipal de São Leopoldo? </label>

                                       <div class="col-md-8" id="jafoiestagiario" >

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" onclick="return false;" type="radio" name="jafoiestagiario" id="sim" value="sim"
                                        {{ $profissional->jafoiestagiario=="sim" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                        <label class="form-check-label" for="sim">Sim</label>
                                    </div><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" onclick="return false;" type="radio" name="jafoiestagiario" id="nao" value="nao"
                                        {{ $profissional->jafoiestagiario=="nao" ? 'checked='.'"'.'checked'.'"' : '' }} >
                                        <label class="form-check-label" for="nao">Não</label>
                                    </div>
                                 </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row ">
                                    <label class="col-md-3 label-control" for="periodo">Período</label>
                            <div class="row">
                            <div class="col-md-5">
                                <input type="text" id="inicioperiodo" class="form-control" placeholder="" readonly
                                value="{{$profissional->inicioperiodo}}" name="inicioperiodo">
                            </div><span>a</span>
                            <div class="col-md-5">
                                <input type="text" id="fimperiodo" class="form-control" placeholder="" readonly
                                value="{{$profissional->fimperiodo}}" name="fimperiodo">
                            </div>
                        </div>
                                 </div>
                                </div>

                            <div class="col-md-10">
                                <div class="form-group row ">
                                    <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                    for="secretaria">Secretaria</label>
                                <div class="col-md-9">
                                    <input type="text" id="secretaria" class="form-control " readonly
                                        placeholder="" name="secretaria" value="{{$profissional->secretaria}}">

                                </div>
                                </div>
                            </div>
                            </div>

                        </div>
                        <div class="form-actions text-left">
                            <a href="{{route ('curriculo.profissional.edit', $profissional->id) }}"
                                class="btn btn-primary" style="margin-top: 12px;">
                                <span class="oi oi-pencil"></span> Editar
                            </a>

                        </div>
                    </form>
                    <hr size="50">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('destroyProfissional')
<script>
    function destroy(id) {
        swal({
                title: "Tem certeza que deseja deletar?",
                text: "Ao deletar, não será possível recuperar a informação",
                icon: "warning",
                buttons: ["Cancelar", true],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    url = "{{ route('curriculo.profissional.delete', ':id')}}";
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
                                text: "Informação deletada",
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
