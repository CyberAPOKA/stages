@extends('layouts.master')

@section('title', 'Cursos')

@section('content-title', 'Meu Currículo')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Cursos</strong></h4>

                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text"></div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text"></div>
                                <form class="form form-horizontal form-bordered">
                                    <div class="form-body">
                                        <div class="col-md-10">
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                    for="userinput1">Curso / Certificação</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="userinput1" class="form-control "
                                                        placeholder="" name="escolaridade">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                    for="userinput2">Instituição</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="userinput2" class="form-control"
                                                        placeholder="" name="lastname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group row mx-auto">
                                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                    for="userinput1">Conclusão</label>
                                                <div class="col-md-9">
                                                    <input type="date" id="userinput1" class="form-control"
                                                        placeholder="" name="firstname">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-left">
                                        <button type="submit" class="btn btn-primary bg-white rounded"
                                            style="margin-top: 12px;"><i
                                                class="la la-check-square-o"></i>SALVAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr size="50">
            </div>
        </div>
    </div>

    @stop
