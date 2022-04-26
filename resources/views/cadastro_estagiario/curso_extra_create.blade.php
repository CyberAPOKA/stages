@extends('layouts.master')

@section('title', 'Cursos Extras')

@section('content-title', 'Meu Currículo')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Cursos Extras</strong></h4>
            </div>

            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-text"></div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            <form class="form form-horizontal form-bordered"
                                action="{{route('curriculo.curso_extra.store', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                for="instagram">Instagram</label>
                                            <div class="col-md-9">
                                                <input type="text" id="instagram" class="form-control " placeholder=""
                                                    name="instagram"
                                                    value="{{isset($cursoextra->instagram) ? $cursoextra->instagram : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                for="facebook">Facebook</label>
                                            <div class="col-md-9">
                                                <input type="text" id="facebook" class="form-control" placeholder=""
                                                    name="facebook"
                                                    value="{{isset($cursoextra->facebook) ? $cursoextra->facebook : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                for="linkedin">Linkedin</label>
                                            <div class="col-md-9">
                                                <input type="text" id="linkedin" class="form-control" placeholder=""
                                                    name="linkedin"
                                                    value="{{isset($cursoextra->linkedin) ? $cursoextra->linkedin : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                for="outro">Outro</label>
                                            <div class="col-md-9">
                                                <input type="text" id="outro" class="form-control" placeholder=""
                                                    name="outro"
                                                    value="{{isset($cursoextra->outro) ? $cursoextra->outro : ''}}">
                                            </div>
                                        </div>
                                    </div>

                               <br> <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Redes sociais</strong></h4><br>

                               <h4 class="text-center">No campo abaixo você pode informar links para conteúdos de trabalhos já realizados (arquivos, sites, portifólio, etc). O campo é opcional.</h4>
                                <div class="col-md-10">
                                    <div class="form-group row">
                                          <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                            for="links">Links:</label>
                                        <div class="col-md-9">
                                            <textarea type="text" id="links" class="form-control "
                                                name="links" cols="50" rows="10" value="{{old('links')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-center">Você pode também nos enviar no espaço abaixo arquivos como anexos ao formulário de inscrição. O limite é de 5 arquivos de no máximo 3MB cada.</h4>

                                <div class="col-md-10">
                                    <div class="form-group row">
                                        <div class="col-md-9">
                                            <h4>Arquivos:
                                                <input onchange="change_anexos()" type="file" id="anexos" name="anexos[]" multiple></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-actions text-left">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 12px;">
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
{!! JsValidator::formRequest('App\Http\Requests\CursoExtraSanitizedRequest') !!}

@stop
