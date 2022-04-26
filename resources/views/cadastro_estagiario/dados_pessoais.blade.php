@extends('layouts.master')

@section('title', 'Dados Pessoais')

@section('content-title', 'Meu Currículo')

@section('content')

@if(session('messagehome'))
  <script>
    Swal.fire({
  position: 'mid-mid',
  icon: 'success',
  title: 'Dados salvos com sucesso!',
  text: 'Você pode editá-los a qualquer momento na aba Meu Currículo.',
})
  </script>
 @endif

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
        <div class="card card-fullscreen shadow bg-white rounded">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Dados Pessoais</strong></h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-bordered">
                        <div class="form-body">
                            <br>

                            {{-- Formulario Nome --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="name">Nome <span style="color: red;"> *</span></label>
                                        <div class="col-md-8">
                                            <input type="text" id="name" class="form-control" placeholder="" name="name"
                                                readonly value="{{$user->name}}">
                                        </div>
                                    </div>
                                </div>

                                {{-- Formulario Nome social--}}
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="nomesocial">Nome social</label>
                                        <div class="col-md-8">
                                            <input type="text" id="nomesocial" class="form-control" placeholder="" name="nomesocial"
                                                readonly value="{{$candidato->nomesocial}}">
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
                                                readonly value="{{isset($candidato->rg) ? $candidato->rg : old('rg')}}">
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
                                            value="{{isset($candidato->data_nascimento) ? date('Y-m-d',strtotime($candidato->data_nascimento)) : old('data_nascimento')}}">
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
                                                    value="{{isset($candidato->telefoneresidencial) ? $candidato->telefoneresidencial : old('telefoneresidencial')}}">
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
                                                    value="{{isset($candidato->telefonecelular) ? $candidato->telefonecelular : old('telefonecelular')}}">
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
                                                value="{{isset($candidato->nome_pai) ? $candidato->nome_pai : old('nome_pai')}}">
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
                                                value="{{isset($candidato->nome_mae) ? $candidato->nome_mae : old('nome_mae')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Formulario Deficiência  --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="campos_deficiencia">Deficiência</label
                                        value="{{isset($candidato->campos_deficiencia) ? $candidato->campos_deficiencia : old('campos_deficiencia')}}">
                                        <div class="col-md-8">





                                        <div class="form-check" id="campos_deficiencia">
                                            <input type="checkbox" onclick="return false;" class="form-check-input" id="deficiencia_fisica"
                                            @if($candidato->deficiencia_fisica=="S") checked @endif>

                                           <label class="form-check-label"  for="deficiencia_fisica"> Física (inclui deficiência visual e auditiva)</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" onclick="return false;" class="form-check-input" id="deficiencia_intelectual" @if($candidato->deficiencia_intelectual=="S") checked @endif>
                                           <label class="form-check-label"  for="deficiencia_intelectual"> Intelectual</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" onclick="return false;" class="form-check-input" id="deficiencia_multipla" @if($candidato->deficiencia_multipla=="S") checked @endif>
                                           <label class="form-check-label"  for="deficiencia_multipla"> Múltipla</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" onclick="return false;" class="form-check-input" id="deficiencia_tea" @if($candidato->deficiencia_tea=="S") checked @endif>
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
                                <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="branca" readonly {{ $candidato->raca=="b" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="branca">Branca</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="negra" readonly {{ $candidato->raca=="n" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="negra">Negra</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="parda" readonly {{ $candidato->raca=="p" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="parda">Parda</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="amarela" readonly {{ $candidato->raca=="a" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="amarela">Amarela</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" onclick="return false;" type="radio" name="raca" id="indigena" readonly {{ $candidato->raca=="i" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="indigena">Indígena</label>
                            </div>

                                </div>
                                        </div>
                                    </div>
                             </div>





                            {{-- Formulario ENDEREÇO  --}}

                            <h3 class="form-section" style="margin-top: 15px; margin-bottom: 15px; font-weight: bold;">
                                Endereço</h3>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="cidade">Cidade</label>
                                        <div class="col-md-8">
                                            <input type="text" id="cidade" class="form-control" placeholder=""
                                                name="cidade" readonly
                                                value="{{isset($candidato->cidade) ? $candidato->cidade : old('cidade')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="numero_rua">Número</label>
                                        <div class="col-md-8">
                                            <input type="text" id="numero_rua" class="form-control" placeholder=""
                                                name="numero_rua" readonly
                                                value="{{isset($candidato->numero_rua) ? $candidato->numero_rua : old('numero_rua')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="bairro">Bairro</label>
                                        <div class="col-md-8">
                                            <input type="text" id="bairro" class="form-control " placeholder=""
                                                name="bairro" readonly
                                                value="{{isset($candidato->bairro) ? $candidato->bairro : old('bairro')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="cep">CEP</label>
                                        <div class="col-md-8">
                                            <input type="text" id="cep" class="form-control" placeholder="" name="cep"
                                                readonly
                                                value="{{isset($candidato->cep) ? $candidato->cep : old('cep')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="complemento">Complemento</label>
                                        <div class="col-md-8">
                                            <input type="text" id="complemento" class="form-control " placeholder=""
                                                name="complemento" readonly
                                                value="{{isset($candidato->complemento) ? $candidato->complemento : old('complemento')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="rua">Rua/Avenida</label>
                                        <div class="col-md-8">
                                            <input type="text" id="rua" class="form-control " placeholder="" name="rua"
                                                readonly
                                                value="{{isset($candidato->rua) ? $candidato->rua : old('rua')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-actions text-left">
                            <a href="{{route ('curriculo.dados_pessoais_edit', Auth::user()->id) }}"
                                class="btn btn-primary bg-white rounded" style="margin-top: 12px;">
                                <span class="oi oi-pencil"></span> Editar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
