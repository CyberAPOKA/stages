@extends('layouts.master')

@section('title', 'Profissional')

@section('content-title', 'Meu Currículo')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header row">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Profissional</strong></h4>
            </div>

            <div class="card-content collpase show card-body">
                <div class="card-text"></div>
                <form class="form form-horizontal form-bordered"
                    action="{{route('curriculo.profissional.update', $profissional->id)}}" method="POST"
                    id="formProfissional" onload="handle()">
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
                                    placeholder="" name="cursosrealizados" cols="50" rows="10" value="{{old('cursosrealizados')}}"><?php echo htmlspecialchars($profissional->cursosrealizados); ?></textarea>

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
                                <textarea type="text" id="experienciasprofissionais" class="form-control "
                                    placeholder="" name="experienciasprofissionais" cols="50" rows="10" value="{{old('experienciasprofissionais')}}"><?php echo htmlspecialchars($profissional->experienciasprofissionais); ?></textarea>

                            </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group row ">
                                <label class="col-md-4 label-control" for="jafoiestagiario">Já foi estagiário da
                                    Prefeitura Municipal de São Leopoldo? </label>

                                   <div class="col-md-8" id="jafoiestagiario" >

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jafoiestagiario"
                                    {{ $profissional->jafoiestagiario=="sim" ? 'checked='.'"'.'checked'.'"' : '' }} id="sim" value="sim" >
                                    <label class="form-check-label" for="sim">Sim</label>
                                </div><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jafoiestagiario"
                                    {{ $profissional->jafoiestagiario=="nao" ? 'checked='.'"'.'checked'.'"' : '' }} id="nao" value="nao" >
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
                            <input type="text" id="inicioperiodo" class="form-control" placeholder=""
                            value="{{$profissional->inicioperiodo}}" name="inicioperiodo">
                        </div><span>a</span>
                        <div class="col-md-5">
                            <input type="text" id="fimperiodo" class="form-control" placeholder=""
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
                                <input type="text" id="secretaria" class="form-control"
                                    placeholder="" name="secretaria" value="{{$profissional->secretaria}}">

                            </div>
                            </div>
                        </div>


                        </div>
                    <div class="form-actions text-left">
                        <button type="submit" class="btn btn-primary bg-white rounded" style="margin-top: 12px;">
                            <span class="oi oi-check"></span> Salvar
                        </button>
                    </div>
                </form>
            </div>
            <hr size="50">
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProfissionalSanitizedRequest') !!}


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('emprego_atual');
        const data = document.getElementById('dataDiv');
        if (checkbox.value == 1) {
            data.style.display = 'none';
        }
    }, false);

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
