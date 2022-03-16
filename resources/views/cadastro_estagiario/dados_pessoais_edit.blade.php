@extends('layouts.master')

@section('title', 'Dados Pessoais')

@section('content-title', 'Meu Currículo')

@section('content')

@if( @isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
        @foreach( $errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
        </div>
        @endif

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow bg-white rounded">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Dados Pessoais</strong></h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-text">
                    </div>
                    <form class="form form-horizontal form-bordered" method="post"
                        action="{{route('curriculo.dados_pessoais_update', $user->id)}}" id="form_dados_pessoais">
                        @csrf
                        <div class="form-body">

                        {{-- Formulário Nome --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="name">Nome</label>
                                        <div class="col-md-8">
                                            <input type="text" id="name" class="form-control" placeholder="" name="name"
                                                value="{{$user->name}}">
                                        </div>
                                    </div>
                                </div>

                                 {{-- Formulário Nome social --}}
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="nomesocial">Nome social</label>
                                        <div class="col-md-8">
                                            <input type="text" id="nomesocial" class="form-control" placeholder="" name="nomesocial"
                                                value="{{$candidato->nomesocial}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                             {{-- Formulário RG --}}

                            <div class="row">
                                {{-- Formulário CPF --}}

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="cpf">CPF</label>
                                        <div class="col-md-8">
                                            <input type="text" id="cpf" class="form-control" placeholder="" name="cpf"
                                                value="{{$user->cpf}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="rg">RG</label>
                                        <div class="col-md-8">
                                            <input type="text" id="rg" class="form-control " placeholder="" name="rg"
                                                value="{{isset($candidato->rg) ? $candidato->rg : old('rg')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                                 {{-- Formulário EMAIL --}}
                            <div class=row>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="email">Email</label>
                                        <div class="col-md-8">
                                            <input type="text" id="email" class="form-control" placeholder=""
                                                name="email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>

                                  {{-- Formulário Data de nascimento --}}
                                  <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="data_nascimento">Data de
                                            Nascimento</label>
                                        <div class="col-md-8">
                                            <input type="date" id="data_nascimento" class="form-control" placeholder=""
                                                name="data_nascimento"
                                                value="{{isset($candidato->data_nascimento) ? date('Y-m-d',strtotime($candidato->data_nascimento)) : old('data_nascimento')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                                 {{-- Formulário TELEFONE residencial --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="telefoneresidencial">Telefone residencial</label>
                                        <div class="col-md-8">
                                            <input type="text" id="telefoneresidencial" class="form-control phone_with_ddd"
                                                placeholder="" name="telefoneresidencial"
                                                value="{{isset($candidato->telefoneresidencial) ? $candidato->telefoneresidencial : old('telefoneresidencial')}}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Formulário TELEFONE celular --}}
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="telefonecelular">Telefone celular</label>
                                        <div class="col-md-8">
                                            <input type="text" id="telefonecelular" class="form-control phone_with_ddd"
                                                placeholder="" name="telefonecelular"
                                                value="{{isset($candidato->telefonecelular) ? $candidato->telefonecelular : old('telefonecelular')}}">
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
                                                name="nome_pai"
                                                value="{{isset($candidato->nome_pai) ? $candidato->nome_pai : old('nome_pai')}}">
                                        </div>
                                    </div>
                                </div>
                                 {{-- Formulário Nome da mãe --}}
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="nome_mae">Nome da Mãe</label>
                                        <div class="col-md-8">
                                            <input type="text" id="nome_mae" class="form-control" placeholder=""
                                                name="nome_mae"
                                                value="{{isset($candidato->nome_mae) ? $candidato->nome_mae : old('nome_mae')}}">
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
                                            <input type="checkbox"  class="form-check-input" name="deficiencia_fisica" id="deficiencia_fisica" value="S" @if($candidato->deficiencia_fisica=="S") checked @endif>
                                           <label class="form-check-label"  for="deficiencia_fisica"> Física (inclui deficiência visual e auditiva)</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox"  class="form-check-input" name="deficiencia_intelectual" id="deficiencia_intelectual" value="S" @if($candidato->deficiencia_intelectual=="S") checked @endif>
                                           <label class="form-check-label"  for="deficiencia_intelectual"> Intelectual</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox"  class="form-check-input" name="deficiencia_multipla" id="deficiencia_multipla" value="S" @if($candidato->deficiencia_multipla=="S") checked @endif>
                                           <label class="form-check-label"  for="deficiencia_multipla"> Múltipla</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox"  class="form-check-input" name="deficiencia_tea" id="deficiencia_tea" value="S" @if($candidato->deficiencia_tea=="S") checked @endif>
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
                                <input class="form-check-input" type="radio" name="raca" id="branca" value="b" {{ $candidato->raca=="b" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="branca">Branca</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="raca" id="negra" value="n" {{ $candidato->raca=="n" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="negra">Negra</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="raca" id="parda" value="p" {{ $candidato->raca=="p" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="parda">Parda</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="raca" id="amarela" value="a" {{ $candidato->raca=="a" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="amarela">Amarela</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="raca" id="indigena" value="i"  {{ $candidato->raca=="i" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="indigena">Indígena</label>
                            </div>

                                </div>
                                        </div>
                                    </div>
                             </div>



                             {{-- Formulário ENDEREÇO --}}
                            <h3 class="form-section" style="margin-top: 15px; margin-bottom: 15px; font-weight: bold;">
                                <i class="la la-eye"></i>Endereço:</h3>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="cidade">Cidade</label>
                                        <div class="col-md-8">
                                            <select class="form-control" id="cidade" name="cidade"
                                            onChange="display_payroll_div(this.selectedIndex);">
                                            <option value="">{{$candidato->cidade}}</option>
                                                @foreach ($listaCidades as $listaCidade)
                                                <option  value="{{$listaCidade->cidade}}">
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
                                               value="{{$candidato->numero_rua}}" name="numero_rua">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="bairro">Bairro</label>

                                        <div class="col-md-8">

                                            <label for="selector" id="labelbairro" class="form-control">{{$candidato->bairro}}</label>

                                        <div id="inputbairro" style="display: none;">
                                            <input type="text" id="bairro" name="bairro" placeholder="Substituir bairro acima" class="form-control resetvalue">
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
                                            value="{{$candidato->complemento}}"  name="complemento">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control" for="rua">Rua/Avenida</label>
                                        <div class="col-md-8">
                                            <input type="text" id="rua" class="form-control " placeholder="" name="rua"
                                            value="{{$candidato->rua}}"  >
                                        </div>
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
            </div>
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

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="{{asset('js/validation/validation-pessoas/validation-pessoas-create.js')}}"></script>
<script src="{{asset('js/messages_pt_BR.js')}}"></script>
<script src='jquery.min.js'></script>

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\DadosPessoaisSanitizedRequest') !!}

@endsection
