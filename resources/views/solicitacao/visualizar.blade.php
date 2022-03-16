@extends('layouts.masterfilter')

@section('title', 'Consultar Solicitações')

@section('content-title', 'Dados de candidatos')

@section('content')


<link href="{{asset('assets/fontawesome-free-6.0.0-web/css/all.css')}}" rel="stylesheet">
<script defer src="/your_path_to_version_6_files/js/all.js"></script>
<script type="text/javascript" src="{{asset('/assets/js/arraycity.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/arraycursos.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/arraybairros.js')}}"></script>
<link rel="stylesheet" href="{{asset('/assets/css/dropdowncidade.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('/assets/css/dropdownbairro.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('/assets/css/dropdowncurso.css')}}" type="text/css">

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<!-- CSS only -->

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header row">
                <h4 class="card-title" id="bordered-layout-colored-controls">
                     <strong>Candidato(a) {{$candidatos->name}}</strong></h4>
            </div>


            <div class="card-header">
                <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Dados Pessoais</strong></h4>
            </div>

            <section class="section">
                <form action="{{route('visualizar', $candidatos->id)}}" method="GET">
                @csrf

                 {{-- Formulário Nome --}}
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="name">Nome</label>
                            <div class="col-md-8">
                                <input type="text" id="name" class="form-control" placeholder=""
                                value="{{$user->name}}" readonly name="name">
                            </div>
                        </div>
                    </div>

                     {{-- Formulário Nome social --}}
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="nomesocial">Nome social</label>
                            <div class="col-md-8">
                                <input type="text" id="nomesocial" class="form-control" placeholder=""
                                value="{{$candidatos->nomesocial}}" readonly name="nomesocial">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Formulario CPF--}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="cpf">CPF</label>
                            <div class="col-md-8">
                                <input type="text" id="cpf" class="form-control" placeholder="" name="cpf"
                                    readonly value="{{$user->cpf}}">
                            </div>
                        </div>
                    </div>


                            {{-- Formulario RG--}}

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="rg">RG</label>
                            <div class="col-md-8">
                                <input type="text" id="rg" class="form-control " placeholder="" name="rg"
                                    readonly value="{{isset($candidatos->rg) ? $candidatos->rg : old('rg')}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Formulario Email--}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="email">Email</label>
                            <div class="col-md-8">
                                <input type="text" id="email" class="form-control" placeholder=""
                                    name="email" readonly value="{{$user->email}}">
                            </div>
                        </div>
                    </div>

                {{-- Formulario Data de nascimento     --}}
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="data_nascimento">Data de
                            Nascimento</label>
                        <div class="col-md-8">
                            <input type="date" id="data_nascimento" class="form-control" placeholder=""
                                name="data_nascimento" readonly
                                value="{{isset($candidatos->data_nascimento) ? date('Y-m-d',strtotime($candidatos->data_nascimento)) : old('data_nascimento')}}">
                        </div>
                    </div>
                </div>



                </div>

                    {{-- Formulario Telefone Residencial --}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-md-4 label-control" for="telefoneresidencial">Telefone residencial</label>
                                <div class="col-md-8">
                                    <input type="text" id="telefoneresidencial" class="form-control " placeholder=""
                                        name="telefoneresidencial" readonly
                                        value="{{isset($candidatos->telefoneresidencial) ? $candidatos->telefoneresidencial : old('telefoneresidencial')}}">
                                </div>
                            </div>
                        </div>
                        {{-- Formulario Telefone Celular --}}
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-md-4 label-control" for="telefonecelular">Telefone celular</label>
                                <div class="col-md-8">
                                    <input type="text" id="telefonecelular" class="form-control " placeholder=""
                                        name="telefonecelular" readonly
                                        value="{{isset($candidatos->telefonecelular) ? $candidatos->telefonecelular : old('telefonecelular')}}">
                                </div>
                            </div>
                        </div>

                   </div>
                 {{-- Formulario Nome do pai  --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="nome_pai">Nome do Pai</label>
                            <div class="col-md-8">
                                <input type="text" id="nome_pai" class="form-control " placeholder=""
                                    name="nome_pai" readonly
                                    value="{{isset($candidatos->nome_pai) ? $candidatos->nome_pai : old('nome_pai')}}">
                            </div>
                        </div>
                    </div>


                    {{-- Formulario Nome da mãe  --}}

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="nome_mae">Nome da Mãe</label>
                            <div class="col-md-8">
                                <input type="text" id="nome_mae" class="form-control" placeholder=""
                                    name="nome_mae" readonly
                                    value="{{isset($candidatos->nome_mae) ? $candidatos->nome_mae : old('nome_mae')}}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Formulario Deficiência  --}}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="campos_deficiencia">Deficiência</label
                            value="{{isset($candidatos->campos_deficiencia) ? $candidatos->campos_deficiencia : old('campos_deficiencia')}}">
                            <div class="col-md-8">





                            <div class="form-check" id="campos_deficiencia">
                                <input type="checkbox" onclick="return false;" class="form-check-input" id="deficiencia_fisica"
                                @if($candidatos->deficiencia_fisica=="S") checked @endif>

                               <label class="form-check-label"  for="deficiencia_fisica"> Física (inclui deficiência visual e auditiva)</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" onclick="return false;" class="form-check-input" id="deficiencia_intelectual" @if($candidatos->deficiencia_intelectual=="S") checked @endif>
                               <label class="form-check-label"  for="deficiencia_intelectual"> Intelectual</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" onclick="return false;" class="form-check-input" id="deficiencia_multipla" @if($candidatos->deficiencia_multipla=="S") checked @endif>
                               <label class="form-check-label"  for="deficiencia_multipla"> Múltipla</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" onclick="return false;" class="form-check-input" id="deficiencia_tea" @if($candidatos->deficiencia_tea=="S") checked @endif>
                               <label class="form-check-label"  for="deficiencia_tea"> TEA (Transtorno do Espectro Autista e Psicose)</label>
                            </div>
                               </div>
                        </div>
                    </div>

                {{-- Formulario Raça    --}}



                    <div class="col-md-6">
                    <div class="form-group row">
                   <label class="col-md-4 label-control" for="raca">Raça</label>

                   <div class="col-md-8" >

                <div class="form-check form-check-inline">
                    <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="branca" readonly {{ $candidatos->raca=="b" ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label class="form-check-label" for="branca">Branca</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="negra" readonly {{ $candidatos->raca=="n" ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label class="form-check-label" for="negra">Negra</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="parda" readonly {{ $candidatos->raca=="p" ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label class="form-check-label" for="parda">Parda</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="amarela" readonly {{ $candidatos->raca=="a" ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label class="form-check-label" for="amarela">Amarela</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="indigena" readonly {{ $candidatos->raca=="i" ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label class="form-check-label" for="indigena">Indígena</label>
                </div>

                    </div>
                            </div>
                        </div>
                 </div>

                {{-- Formulario ENDEREÇO  --}}

                <div class="card-header">
                    <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Endereço</strong></h4>
                </div>

                 {{-- RUA  --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="rua">Rua/Avenida</label>
                            <div class="col-md-8">
                                <input type="text" id="rua" class="form-control " placeholder="" name="rua"
                                    readonly
                                    value="{{isset($candidatos->rua) ? $candidatos->rua : old('rua')}}">
                            </div>
                        </div>
                    </div>
                     {{--  Número da rua  --}}
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="numero_rua">Número</label>
                            <div class="col-md-8">
                                <input type="text" id="numero_rua" class="form-control" placeholder=""
                                    name="numero_rua" readonly
                                    value="{{isset($candidatos->numero_rua) ? $candidatos->numero_rua : old('numero_rua')}}">
                            </div>
                        </div>
                    </div>
                </div>
                 {{-- Complemento  --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="complemento">Complemento</label>
                            <div class="col-md-8">
                                <input type="text" id="complemento" class="form-control " placeholder=""
                                    name="complemento" readonly
                                    value="{{isset($candidatos->complemento) ? $candidatos->complemento : old('complemento')}}">
                            </div>
                        </div>
                    </div>
                    {{-- CEP  --}}
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="cep">CEP</label>
                            <div class="col-md-8">
                                <input type="text" id="cep" class="form-control" placeholder="" name="cep"
                                    readonly
                                    value="{{isset($candidatos->cep) ? $candidatos->cep : old('cep')}}">
                            </div>
                        </div>
                    </div>
                </div>
                    {{-- Bairro  --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="bairro">Bairro</label>
                            <div class="col-md-8">
                                <input type="text" id="bairro" class="form-control " placeholder=""
                                    name="bairro" readonly
                                    value="{{isset($candidatos->bairro) ? $candidatos->bairro : old('bairro')}}">
                            </div>
                        </div>
                    </div>
                        {{-- Cidade  --}}
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="cidade">Cidade</label>
                            <div class="col-md-8">
                                <input type="text" id="cidade" class="form-control" placeholder=""
                                    name="cidade" readonly
                                    value="{{isset($candidatos->cidade) ? $candidatos->cidade : old('cidade')}}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Formulário Formação --}}

                <div class="card-header">
                    <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Formação</strong></h4>
                </div>

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

                {{-- Experiência e conhecimentos --}}

                <div class="card-header">
                    <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Experiência e Conhecimentos</strong></h4>
                </div>

                <h4 class="text-center" style="padding-top: 10px">Cursos realizados</h4>
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
                                        placeholder="" name="cursosrealizados" cols="50" rows="10"  value="{{old('cursosrealizados')}}"><?php echo htmlspecialchars(isset($profissional->cursosrealizados) ? $profissional->cursosrealizados : ''); ?></textarea>

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
                                        placeholder="" name="outrosconhecimentos" cols="50" rows="10" value="{{old('outrosconhecimentos')}}"><?php echo htmlspecialchars(isset($profissional->outrosconhecimentos) ? $profissional->outrosconhecimentos : ''); ?></textarea>

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
                                        placeholder="" name="experienciasprofissionais" cols="50" rows="10"  value="{{old('experienciasprofissionais')}}"><?php echo htmlspecialchars(isset($profissional->experienciasprofissionais) ? $profissional->experienciasprofissionais : ''); ?></textarea>

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
                                        {{ $profissional->jafoiestagiario =="nao" ? 'checked='.'"'.'checked'.'"' : '' }} >
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
                                value="{{isset($profissional->inicioperiodo) ? $profissional->inicioperiodo : ''}}" name="inicioperiodo">
                            </div><span>a</span>
                            <div class="col-md-5">
                                <input type="text" id="fimperiodo" class="form-control" placeholder="" readonly
                                value="{{isset($profissional->fimperiodo) ? $profissional->fimperiodo : ''}}" name="fimperiodo">
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
                                        placeholder="" name="secretaria" value="{{isset($profissional->secretaria) ? $profissional->secretaria : ''}}">

                                </div>
                                </div>
                            </div>


                            {{-- Formulario Links --}}

                            <div class="card-header">
                                <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Redes sociais</strong></h4>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                        for="instagram">Instagram</label>
                                    <div class="col-md-9">
                                        <input type="text" id="instagram" class="form-control " placeholder=""
                                            name="instagram" readonly
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
                                            name="facebook" readonly
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
                                            name="linkedin" readonly
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
                                            name="outro" readonly
                                            value="{{isset($cursoextra->outro) ? $cursoextra->outro : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Links</strong></h4>
                            </div>


                            <div class="col-md-10">
                                <div class="form-group row">
                                      <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                        for="links">Links:</label>
                                    <div class="col-md-9">
                                        <textarea type="text" id="links" class="form-control" readonly
                                            name="links" cols="50" rows="10" value="{{old('links')}}"><?php echo htmlspecialchars(isset($cursoextra->links) ? $cursoextra->links : ''); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <h4 class="card-title text-center" id="bordered-layout-colored-controls">
                                     <strong>Anexos Enviados</strong>
                                     <a class="btn btn-info" href="baixartodos/{{$candidatos->id}}" style="color: rgb(255, 255, 255)">
                                        Baixar Todos <i class="fa-solid fa-download" style="color: rgb(255, 255, 255)"></i></a>
                                    </h4>

                            </div>

<table class="table">
    <thead>
        <td>Nome</td>
        <td>Candidato {{$candidatos->id}}</td>
        <td>Arquivos</td>

    </thead>
    @foreach($documentos as $documento)

    <tr>
        <td>{{ $documento->nomeanexo }}</td>
        <td>{{$candidatos->id}}</td>
        <td>
             <a class="btn btn-info" href="baixar/{{$documento->id}}">Baixar <i class="fa-solid fa-download"></i></a>
        </td>

    </tr>

        @endforeach

    </table>


                {{--last div--}}
                </div>
            </div>



            </section>

        </form>
        </div>
    </div>


@endsection
