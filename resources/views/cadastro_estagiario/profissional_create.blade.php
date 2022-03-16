@extends('layouts.master')

@section('title', 'Profissional')

@section('content-title', 'Meu Currículo')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Profissional</strong></h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-text"></div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            <form class="form form-horizontal form-bordered"
                                action="{{route('curriculo.profissional.store', Auth::user()->id)}}" method="POST">
                                @csrf
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
                                            <textarea type="text" id="cursosrealizados" class="form-control "
                                                placeholder="" name="cursosrealizados" cols="50" rows="10" value="{{old('cursosrealizados')}}"></textarea>

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
                                            <textarea type="text" id="outrosconhecimentos" class="form-control "
                                                placeholder="" name="outrosconhecimentos" cols="50" rows="10" value="{{old('outrosconhecimentos')}}"></textarea>

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
                                            <textarea type="text" id="experienciasprofissionais" class="form-control "
                                                placeholder="" name="experienciasprofissionais" cols="50" rows="10" value="{{old('experienciasprofissionais')}}"></textarea>

                                        </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group row ">
                                            <label class="col-md-4 label-control" for="jafoiestagiario">Já foi estagiário da
                                                Prefeitura Municipal de São Leopoldo? </label>

                                               <div class="col-md-8" id="jafoiestagiario" >

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jafoiestagiario" id="sim" value="sim" >
                                                <label class="form-check-label" for="sim">Sim</label>
                                            </div><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jafoiestagiario" id="nao" value="nao" >
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
                                        <input type="text" id="inicioperiodo" class="form-control" placeholder="" name="inicioperiodo">
                                    </div><span>a</span>
                                    <div class="col-md-5">
                                        <input type="text" id="fimperiodo" class="form-control" placeholder="" name="fimperiodo">
                                    </div>
                                </div>
                                         </div>
                                        </div>

                                    <div class="col-md-10">
                                        <div class="form-group row ">
                                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                            for="secretaria">Secretaria</label>
                                        <div class="col-md-9">
                                            <input type="text" id="secretaria" class="form-control "
                                                placeholder="" name="secretaria" value="{{old('secretaria')}}">

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
            {{-- @empty --}}

            {{--   @endforelse --}}
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProfissionalSanitizedRequest') !!}

<script>
    function handleData(element) {
        const value = element.value;
        const data = document.getElementById('dataDiv');
        const inputData = document.getElementById('data_saida');

        if (value === '1') {
            data.style.display = 'none';
            inputData.value = '';
        } else {
            data.style.display = 'block';
            inputData.value = '';
        }
    }

</script>
@stop
