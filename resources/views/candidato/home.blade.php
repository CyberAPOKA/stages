@extends('layouts.master')

@section('title', 'Página Inicial')

@section('content')

@if(session('cadastrado'))
  <script>
    Swal.fire({
  position: 'mid-mid',
  icon: 'info',
  title: 'Usuário já cadastrado!',
  text: 'Você pode alterar seus dados na aba "Meu Currículo".',
})
  </script>
 @endif


@if(isset($user->candidato))
<input type="hidden" id="candidato" value="1">
@endif

@if(isset($user->candidato->formacao[0]))
<input type="hidden" id="formacao" value="1">
@endif

@if(isset($user->candidato->profissional[0]))
<input type="hidden" id="profissional" value="1">
@endif

@if(isset($user->candidato->cursoextra[0]))
<input type="hidden" id="cursoextra" value="1">
@endif


<div class="card card-fullscreen shadow">
    <div class="card-header text-center">
        <h4 class="card-title"> <strong>
            FORMULÁRIO PARA ENVIO DE CURRÍCULO - ESTÁGIO</strong>
        </h4>
    </div>
    <div class="card-content show">
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                    <div class="card-header">
                        <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Dados Pessoais</strong></h4>
                    </div>
                    <div class="card-content collpase show">

                            <form class="form form-horizontal form-bordered" method="post" enctype="multipart/form-data"
                                action="{{ route('store', $user->id, ) }}" id="formStore">
                                @csrf
                                <div class="form-body">

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
                                                    <input type="text" id="nomesocial" class="form-control"
                                                    placeholder="" name="nomesocial" value="{{$candidato->nomesocial}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Formulário CPF --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="cpf">CPF</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="cpf" class="form-control" placeholder=""
                                                    value="{{$user->cpf}}" readonly name="cpf">
                                                </div>
                                            </div>
                                        </div>

                                     {{-- Formulário RG --}}
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="rg">RG</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="rg" class="form-control " placeholder="" name="rg"
                                                    value="{{$candidato->rg}}"      >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Formulário EMAIL --}}
                                    <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="email">Email</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="email" class="form-control"
                                                    value="{{$user->email}}" readonly placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                         {{-- Formulário Data de nascimento --}}
                                         <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="data_nascimento">Data de
                                                    Nascimento</label>
                                                <div class="col-md-8">
                                                    <input type="date" id="data_nascimento" class="form-control" placeholder="" name="data_nascimento"
                                                    value="{{isset($candidato->data_nascimento) ? date('Y-m-d',strtotime($candidato->data_nascimento)) : old('data_nascimento')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                         {{-- Formulário TELEFONE --}}
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="telefoneresidencial">Telefone Residencial</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="telefoneresidencial" class="form-control phone_with_ddd"
                                                    value="{{$candidato->telefoneresidencial}}"   placeholder="" name="telefoneresidencial">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="telefonecelular">Telefone Celular</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="telefonecelular" class="form-control phone_with_ddd"
                                                    value="{{$candidato->telefonecelular}}"    placeholder="" name="telefonecelular">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     {{-- Formulário Nome do pai --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="nome_pai">Nome do Pai</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="nome_pai" class="form-control " placeholder=""
                                                        name="nome_pai" value="{{isset($candidato->nome_pai) ? $candidato->nome_pai : old('nome_pai')}}">
                                                </div>
                                            </div>
                                        </div>
                                         {{-- Formulário Nome da mãe --}}
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="nome_mae">Nome da Mãe</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="nome_mae" class="form-control" placeholder=""
                                                    value="{{$candidato->nome_mae}}"    name="nome_mae">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Formulario Deficiência  --}}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="campos_deficiencia">Deficiência</label>
                                                <div class="col-md-8" id="campos_deficiencia">

                                                <div class="form-check" >
                                                    <input type="checkbox"  class="form-check-input" name="deficiencia_fisica" id="deficiencia_fisica" value="S"
                                                    @if($candidato->deficiencia_fisica=="S") checked @endif>
                                                   <label class="form-check-label"  for="deficiencia_fisica"> Física (inclui deficiência visual e auditiva)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox"  class="form-check-input" name="deficiencia_intelectual" id="deficiencia_intelectual" value="S"
                                                    @if($candidato->deficiencia_intelectual=="S") checked @endif>
                                                   <label class="form-check-label"  for="deficiencia_intelectual"> Intelectual</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox"  class="form-check-input" name="deficiencia_multipla" id="deficiencia_multipla" value="S"
                                                    @if($candidato->deficiencia_multipla=="S") checked @endif>
                                                   <label class="form-check-label"  for="deficiencia_multipla"> Múltipla</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox"  class="form-check-input" name="deficiencia_tea" id="deficiencia_tea" value="S"
                                                    @if($candidato->deficiencia_tea=="S") checked @endif >
                                                   <label class="form-check-label"  for="deficiencia_tea"> TEA (Transtorno do Espectro Autista e Psicose)</label>
                                                </div>
                                                   </div>
                                            </div>
                                        </div>

                                    {{-- Formulario Raça    --}}

                                        <div class="col-md-6">
                                        <div class="form-group row">
                                       <label class="col-md-4 label-control" for="raca">Raça</label>

                                       <div class="col-md-8" id="raca" >

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="raca" id="branca" value="b"
                                        {{ $candidato->raca=="b" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                        <label class="form-check-label" for="branca">Branca</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="raca" id="negra" value="n"
                                        {{ $candidato->raca=="n" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                        <label class="form-check-label" for="negra">Negra</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="raca" id="parda" value="p"
                                        {{ $candidato->raca=="p" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                        <label class="form-check-label" for="parda">Parda</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="raca" id="amarela" value="a"
                                        {{ $candidato->raca=="a" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                        <label class="form-check-label" for="amarela">Amarela</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="raca" id="indigena" value="i"
                                        {{ $candidato->raca=="i" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                        <label class="form-check-label" for="indigena">Indígena</label>
                                    </div>

                                        </div>
                                                </div>
                                            </div>
                                     </div>



                                     {{-- Formulário ENDEREÇO --}}
                                     <div class="card-header">
                                        <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Endereço</strong></h4>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="cidade">Cidade</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" id="cidade" name="cidade"
                                                    onChange="display_payroll_div(this.selectedIndex);">
                                                    <option value="{{isset($candidato->cidade) ? $candidato->cidade : ''}}" selected>
                                                        {{isset($candidato->cidade) ? $candidato->cidade : 'Selecionar cidade'}}
                                                    </option>
                                                        @foreach ($listaCidades as $listaCidade)
                                                        <option value="{{$listaCidade->cidade}}">
                                                            {{$listaCidade->cidade}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="numero_rua">Número</label>
                                                <div class="col-md-8">
                                                    <input type="number" id="numero_rua" class="form-control" placeholder=""
                                                     value="{{$candidato->numero_rua}}"   name="numero_rua">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="bairro">Bairro</label>

                                                <div class="col-md-8">

                                                    <label for="selector" class="form-control">
                                                       {{isset($candidato->bairro) ? $candidato->bairro : 'Selecione uma cidade primeiro'}}
                                                    </label>

                                                <div id="inputbairro" style="display: none;">
                                                    <input type="text" value="{{isset($candidato->bairro) ? $candidato->bairro : ''}}"
                                                     id="bairro" name="bairro" placeholder="Digite seu bairro" class="form-control resetvalue">
                                                </div>

                                                <div id="select" style="display: none;">
                                                    <select class="form-control" id="bairro2" name="bairro2">
                                                        <option value="">Selecione uma opção</option>
                                                        @foreach ($listaBairros as $listaBairro)
                                                        <option value="{{$listaBairro->bairros}}">
                                                            {{$listaBairro->bairros}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="cep">CEP</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="cep" class="form-control" placeholder="" name="cep"
                                                    value="{{$candidato->cep}}" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="complemento">Complemento</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="complemento" class="form-control" placeholder=""
                                                    value="{{$candidato->complemento}}"   name="complemento">
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 label-control" for="rua">Rua/Avenida</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="rua" class="form-control " placeholder="" name="rua"
                                                    value="{{$candidato->rua}}" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="card-header">
                                    <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Formação</strong></h4>
                                </div><br>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="escolaridade">Escolaridade</label>
                                                <div class="col-md-8">
                                                    <select class="form-control" id="escolaridade" name="escolaridade"
                                                        onchange="handleCursos()">
                                                        <option value="{{isset($formacao->listaCursos->escolaridade->escolaridade) ? $formacao->listaCursos->escolaridade->escolaridade : ''}}">
                                                            {{isset($formacao->listaCursos->escolaridade->escolaridade) ? $formacao->listaCursos->escolaridade->escolaridade : 'Selecione uma opção'}}
                                                        </option>
                                                        @foreach ($listaEscolaridades as $listaEscolaridade)
                                                        <option value="{{$listaEscolaridade->id}}">
                                                            {{$listaEscolaridade->escolaridade}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="curso">Curso</label>
                                                <div class="col-md-8">
                                                    <select class="form-control dropdown" id="curso" name="curso"
                                                    data-live-search="true" data-size="5" data-dropup-auto="false">
                                                    @foreach ($listaCursos as $curso)
                                                    @if(isset($formacao->listaCursos->escolaridade_id) ==
                                                    $curso->escolaridade_id)
                                                    <option value="{{$curso->id}}" @if(isset($curso)) @if($curso->
                                                        curso == $formacao->listaCursos->curso)
                                                        selected @endif @endif
                                                        >{{isset($curso->curso) ? $curso->curso : 'teste'}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select>
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
                                                    <select class="form-control dropdown" id="semestre" name="semestre"
                                                        data-dropup-auto="false">
                                                        <option value="{{isset($formacao->semestre) ? $formacao->semestre : ''}}">
                                                            {{isset($formacao->semestre) ? $formacao->semestre : 'Selecione uma opção'}}
                                                        </option>
                                                        @for($i = 1; $i < 11; $i++) <option value="{{$i}}">
                                                            {{$i . 'º'}}</option>
                                                            @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="turno">Turno</label>
                                                <div class="col-md-8">
                                                    <select class="form-control dropdown" id="turno" name="turno"
                                                        data-dropup-auto="false">
                                                        <option value="{{isset($formacao->turno) ? $formacao->turno : ''}}">
                                                            {{isset($formacao->turno) ? $formacao->turno : 'Selecione uma opção'}}
                                                        </option>
                                                        <option value="Manhã">Manhã</option>
                                                        <option value="Tarde">Tarde</option>
                                                        <option value="Noite">Noite</option>
                                                    </select>
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
                                                    value="{{isset($formacao->instituicao) ? $formacao->instituicao : ''}}"    name="instituicao">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row ">
                                                <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                                    for="situacao">Situação</label>
                                                <div class="col-md-8">
                                                    <select class="form-control dropdown" id="situacao" name="situacao"
                                                        data-dropup-auto="false">
                                                        <option value="{{isset($formacao->situacao) ? $formacao->situacao : ''}}">
                                                            {{isset($formacao->situacao) ? $formacao->situacao : 'Selecione uma opção'}}
                                                        </option>
                                                        <option value="Em andamento">Em andamento</option>
                                                        <option value="Finalizado">Finalizado</option>
                                                        <option value="Trancado">Trancado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <h4 class="card-title text-center" id="bordered-layout-colored-controls"> <strong>Experiência e Conhecimentos</strong></h4>
                                </div>

                                    <div class="card-text"></div>
                                    <div class="card-content collpase show">

                                            <div class="card-text"></div>

                                                <div class="form-body">
                                                    <div class="col-md-10">
                                                        <div class="form-group row ">
                                                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                                for="cursosrealizados">Cursos realizados:<br>
                                                                - Nome do curso<br>
                                                                - Instituição<br>
                                                                - Carga horária<br>
                                                                - Data de conclusão</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" id="cursosrealizados" class="form-control "
                                                                    placeholder="" name="cursosrealizados" cols="50" rows="10" value="{{old('cursosrealizados')}}"><?php echo htmlspecialchars(isset($profissional->cursosrealizados) ? $profissional->cursosrealizados : ''); ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="form-group row ">
                                                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                                for="outrosconhecimentos">Outros Conhecimentos:<br>
                                                                - Informática<br>
                                                                - Idiomas<br>
                                                                - Outras habilidades
                                                               </label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" id="outrosconhecimentos" class="form-control "
                                                                    placeholder="" name="outrosconhecimentos" cols="50" rows="10" value="{{old('outrosconhecimentos')}}"><?php echo htmlspecialchars(isset($profissional->outrosconhecimentos) ? $profissional->outrosconhecimentos : ''); ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <div class="form-group row ">
                                                            <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                                for="experienciasprofissionais">Experiências Profissionais:</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" id="experienciasprofissionais" class="form-control "
                                                                    placeholder="" name="experienciasprofissionais" cols="50" rows="10" value="{{old('experienciasprofissionais')}}"><?php echo htmlspecialchars(isset($profissional->experienciasprofissionais) ? $profissional->experienciasprofissionais : ''); ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">
                                                        <div class="form-group row">
                                                       <label class="col-md-4 label-control" for="jafoiestagiario">Já foi estagiário da
                                                        Prefeitura Municipal de São Leopoldo?</label>

                                                       <div class="col-md-8" id="jafoiestagiario" >

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="jafoiestagiario" id="sim" value="sim"
                                                        <?php if (isset($profissional->jafoiestagiario) && $profissional->jafoiestagiario=="sim") echo "checked";?>
                                                        >
                                                        <label class="form-check-label" for="sim">Sim</label>
                                                    </div><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="jafoiestagiario" id="nao" value="nao"
                                                        <?php if (isset($profissional->jafoiestagiario) && $profissional->jafoiestagiario=="nao") echo "checked";?>
                                                        >
                                                        <label class="form-check-label" for="nao">Não</label>
                                                    </div>
                                                 </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="periodo">Período</label>
                                                    <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="text" id="inicioperiodo" class="form-control" placeholder="" name="inicioperiodo"
                                                        value="{{isset($profissional->inicioperiodo) ? $profissional->inicioperiodo : ''}}" name="inicioperiodo">
                                                    </div><span>a</span>
                                                    <div class="col-md-5">
                                                        <input type="text" id="fimperiodo" class="form-control" placeholder="" name="fimperiodo"
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
                                                        <input type="text" id="secretaria" class="form-control "
                                                            placeholder="" name="secretaria" value="{{isset($profissional->secretaria) ? $profissional->secretaria : ''}}">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                </div>

                                <div class="card-header">
                                    <h4 class="card-title text-center" id="bordered-layout-colored-controls">
                                        <strong>Redes sociais</strong></h4>
                                </div><br>

                                <div class="col-md-10">
                                    <div class="form-group row ">
                                        <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                            for="instagram">Instagram</label>
                                        <div class="col-md-9">
                                            <input type="text" id="instagram" class="form-control "
                                                placeholder="" name="instagram" value="{{isset($cursoExtra->instagram) ? $cursoExtra->instagram : ''}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group row ">
                                        <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                            for="facebook">Facebook</label>
                                        <div class="col-md-9">
                                            <input type="text" id="facebook" class="form-control "
                                                placeholder="" name="facebook" value="{{isset($cursoExtra->facebook) ? $cursoExtra->facebook : ''}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group row ">
                                        <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                            for="linkedin">Linkedin</label>
                                        <div class="col-md-9">
                                            <input type="text" id="linkedin" class="form-control "
                                                placeholder="" name="linkedin" value="{{isset($cursoExtra->linkedin) ? $cursoExtra->linkedin : ''}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group row ">
                                        <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                            for="outro">Outros</label>
                                        <div class="col-md-9">
                                            <input type="text" id="outro" class="form-control "
                                                placeholder="" name="outro" value="{{isset($cursoExtra->outro) ? $cursoExtra->outro : ''}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <h4 class="card-title text-center" id="bordered-layout-colored-controls">
                                        <strong>Links e anexos</strong></h4>
                                </div><br>
                                <h4 class="text-center">No campo abaixo você pode informar links para conteúdos de trabalhos já realizados (arquivos, sites, portifólio, etc). O campo é opcional.</h4>
                                <div class="col-md-10">
                                    <div class="form-group row">

                                        <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                            for="links">Links:</label>
                                        <div class="col-md-9">
                                            <textarea type="text" id="links" class="form-control "
                                                name="links" cols="50" rows="10" value="{{old('links')}}"><?php echo htmlspecialchars(isset($cursoExtra->links) ? $cursoExtra->links : ''); ?></textarea>

                                        </div>
                                    </div>
                                </div>
                                <h4 for="anexos" class="text-center">Você pode também nos enviar no espaço abaixo como anexos ao formulário de inscrição. O limite é de 5 arquivos de no máximo 3MB cada.</h4>
                                <div class="col-md-10">
                                    <div class="form-group row ">
                                        <div class="col-md-9">
                                            <h4>Arquivos:
                                            <input onchange="change_anexos()" type="file" id="anexos" name="anexos[]" multiple></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions text-left">

                                    <button type="submit" id="btnsubmithome" class="btn btn-primary bg-white rounded" style="margin-top: 12px;">
                                        <span class="oi oi-check"></span> Salvar
                                    </button>
                                </div>
                            </form>
                        </div>
                        </div>

                            {{--bug--}}
                        </div>
                    </div>
                </div>

                <script>
                    $("#select").change(function() {
                        $(".resetvalue").val("");
                    });
                </script>

<script>
     function display_payroll_div(e){
        currency_value=document.getElementById('cidade').value;
        //input
        document.getElementById('inputbairro').style.display = "none";
        if (currency_value != 'São Leopoldo') {
            document.getElementById('inputbairro').style.display = "block";

        }
        //select
        document.getElementById('select').style.display = "none";
        if (currency_value == 'São Leopoldo') {
            document.getElementById('select').style.display = "block";
        }
        else {
            document.getElementById('bairro2').selectedIndex = 0;
        }
    }

    </script>


                <script>
                    function onSubmit() {
                $('.btnsubmithome').attr('disabled', true);
                }
                </script>




            {{-- FORMAÇÃO --}}

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://rawcdn.githack.com/AmagiTech/amagibootstrapsearchmodalforselect/9c7fdf8903b3529ba54b2db46d8f15989abd1bd1/amagidropdown.js"></script>

            <script>
        amagiDropdown(
    {
        elementId: 'cidade',
        searchButtonInnerHtml: 'Clique aqui',
        closeButtonInnerHtml: 'Fechar',
        title: 'Pesquise e escolha',
        bodyMessage: 'Por favor, primeiro pesquise com a caixa de texto abaixo, depois clique duas vezes na opção que você escolheu.'
    });
            </script>

            <script>
                function handleCity(that)
{
    if (that.value != "São Leopoldo")
    {
        document.getElementById("input").style.display = "block";
    }
    else
    {
        document.getElementById("input").style.display = "none";
    }
    if (that.value == "São Leopoldo")
    {
        document.getElementById("select").style.display = "block";
    }
    else
    {
        document.getElementById("select").style.display = "none";
    }

}
            </script>





<script>
    const candidato = document.getElementById('candidato');
    const formacao = document.getElementById('formacao');
    const profissional = document.getElementById('profissional');
    const cursoextra = document.getElementById('cursoextra');
    const fill1 = document.getElementById('fill1');
    const fill2 = document.getElementById('fill2');
    const mask1 = document.getElementById('mask1');
    const mask2 = document.getElementById('mask2');
    const fill = document.querySelectorAll("div.fill");
    const mask = document.querySelectorAll("div.mask");
    const percent = document.getElementById('percent');
    const array = [];
    const button = document.getElementById('button');

    if (typeof candidato != 'undefined' && candidato != null) {
        array.push(candidato);
    }
    if (typeof formacao != 'undefined' && formacao != null) {
        array.push(formacao);
    }
    if (typeof profissional != 'undefined' && profissional != null) {
        array.push(profissional);
    }
    if (typeof cursoextra != 'undefined' && cursoextra != null) {
        array.push(cursoextra);
    }

    progressBar();

    function progressBar() {
        if (array.length === 0) {
            fill.forEach(fill => {
                fill.style.transform = 'rotate(0deg)';
            });
            percent.innerText = '0%';
        } else if (array.length === 1) {
            mask1.style.transform = 'none';
            fill2.style.transform = 'rotate(45deg)';
            fill1.style.transform = 'rotate(90deg)';
            fill.forEach(fill => {
                // fill.style.transform = 'rotate(90deg)';
                fill.style.backgroundColor = 'red';
            });
            percent.innerText = '25%';
        } else if (array.length === 2) {
            fill1.style.transform = 'rotate(45deg)';
            // fill1.style.clip = 'unset'
            fill2.style.transform = 'rotate(135deg)';
            fill.forEach(fill => {
                // fill.style.transform = 'rotate(90deg)';
                fill.style.backgroundColor = '#ffff00';
            });
            percent.innerText = '50%';
        } else if (array.length === 3) {
            // fill1.style.transform = 'rotate(0deg)';
            // fill1.style.clip = 'unset'
            // fill2.style.transform = 'rotate(90deg)';
            fill.forEach(fill => {
                // fill.style.transform = 'rotate(135deg)';
                fill.style.backgroundColor = '#66ff66';
            });
            percent.innerText = '75%';
        } else if (array.length === 4) {
            mask1.style.clip = 'unset';
            mask2.style.clip = 'unset';
            fill1.style.clip = 'unset';
            fill2.style.clip = 'unset';
            fill.forEach(fill => {
                // fill.style.transform = 'rotate(360deg)';
                fill.style.backgroundColor = 'green';
            });
            percent.innerText = '100%';
        } else {
            return;
        }
    }

    if (percent.innerText == '100%') {
        button.style.display = 'none';
    }

</script>



<script>
    const select = document.getElementById('escolaridade');
    const curso = document.getElementById('curso');

    function handleCursos() {

        if (select.value == 1) {
            curso.innerHTML =
                "<option value=''>Selecione uma opção</option> @foreach ($listaCursos as $listaCurso) @if($listaCurso->escolaridade_id == 1) <option value='{{$listaCurso->id}}'data-tokens='{{$listaCurso->curso}}'> {{$listaCurso->curso}}</option> @endif @endforeach";
        } else if (select.value == 2) {
            curso.innerHTML =
                "<option value=''>Selecione uma opção</option> @foreach ($listaCursos as $listaCurso) @if($listaCurso->escolaridade_id == 2) <option value='{{$listaCurso->id}}'data-tokens='{{$listaCurso->curso}}'> {{$listaCurso->curso}}</option> @endif @endforeach";
        } else if (select.value == 3) {
            curso.innerHTML =
                "<option value=''>Selecione uma opção</option> @foreach ($listaCursos as $listaCurso) @if($listaCurso->escolaridade_id == 3) <option value='{{$listaCurso->id}}'data-tokens='{{$listaCurso->curso}}'> {{$listaCurso->curso}}</option> @endif @endforeach";
        } else {
            curso.innerHTML = "<option value=''>Selecione uma opção</option>";
        }
    }
</script>

    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\HomeSanitizedRequest') !!}
    {!! JsValidator::formRequest('App\Http\Requests\FormacaoSanitizedRequest') !!}

    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="{{asset('js/validation/validation-pessoas/validation-pessoas-create.js')}}"></script>
    <script src="{{asset('js/messages_pt_BR.js')}}"></script>
    <script src='jquery.min.js'></script>

@endsection
