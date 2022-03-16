@extends('layouts.masterfilter')

@section('title', 'Consultar Solicitações')

@section('content-title', 'Consulta de Filtros')

@section('content')

{{--<link rel="stylesheet" href="{{asset('/assets/js/easySelectStyle.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer src="{{asset('/assets/js/easySelect.js')}}"></script>--}}

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

<p>
     <div class="text-center">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Filtro <i class="fa-solid fa-angle-down"></i>
    </button>
    </div>
</p>


<ul class="collapse" id="collapseExample">
<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">
            <div class="card-header row">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Filtros</strong></h4>
            </div>

            <section class="section">
            <form action="{{route('consulta_candidato')}}" method="GET">
                @csrf

                {{-- Filtro Cidade --}}


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">

                            <label  class="col-md-4 label-control" style="font-size: 16px!important;"
                             for="cidade">Cidades</label>

                            <div class="col-md-8">
                                <div class="dropdown-advanced">
                                    <div class="options-selected dropdown-advanced-fire-action form-control dropdown">
                                        Selecionar Cidades <i class="fa-solid fa-angle-down icon"></i>
                                    </div>
                                    <div class="closed container-elements scroll">

                                        <input type="text" value="" placeholder="Pesquisar" class="search-button input-field">

                                        <ul class="ulcity">
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Filtro Bairro --}}
                    <div class="col-md-6">
                        <div class="form-group row">

                            <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                for="bairro">Bairros</label>
                                <div class="col-md-8">
                                <div class="dropdown-advanced2">
                                    <div class="options-selected dropdown-advanced-fire-action2 form-control dropdown">
                                        Selecionar Bairros <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <div class="closed container-elements scroll">
                                        <input type="text" value="" placeholder="Pesquisar" class="search-button2 input-field">
                                        <ul class="ulbairro">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                 {{-- Filtro Curso --}}

                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control"  style="font-size: 16px!important;"
                             for="curso">Cursos</label>
                             <div class="col-md-8">
                             <div class="dropdown-advanced3">
                                 <div class="options-selected dropdown-advanced-fire-action3 form-control dropdown">
                                     Selecionar Cursos <i class="fa-solid fa-angle-down"></i>
                                 </div>
                                 <div class="closed container-elements scroll">
                                     <input type="text" value="" placeholder="Pesquisar" class="search-button3 input-field">
                                     <ul class="ulcurso">
                                     </ul>
                                 </div>
                             </div>
                         </div>
                        </div>
                    </div>

                    {{-- Filtro Semestre --}}
                    <div class="col-md-6">
                        <div class="form-group row ">
                            <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                for="semestre">Semestres</label>
                            <div class="col-md-8">
                                <select class="form-control dropdown" id="semestre" name="semestre"
                                    data-dropup-auto="false">
                                    <option value="">Selecione uma opção</option>
                                    @for($i = 1; $i < 11; $i++) <option value="{{$i}}">
                                        {{$i . 'º'}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                 {{-- Filtro turno --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row ">
                            <label class="col-md-4 label-control" style="font-size: 16px!important;"
                                for="turno">Turnos</label>
                            <div class="col-md-8">
                                <select class="form-control dropdown" id="turno" name="turno"
                                data-dropup-auto="false">
                                    <option value="">Selecione uma opção</option>
                                    <option value="Manhã">Manhã</option>
                                    <option value="Tarde">Tarde</option>
                                    <option value="Noite">Noite</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Filtro Deficiência --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 label-control"  style="font-size: 16px!important;"
                             for="campos_deficiencia">Deficiências</label>
                            <div class="col-md-8" id="campos_deficiencia">

                            <div class="form-check" >
                                <input type="checkbox"  class="form-check-input" name="deficiencia_fisica" id="deficiencia_fisica" value="S">
                               <label class="form-check-label"  for="deficiencia_fisica"> Física (inclui deficiência visual e auditiva)</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox"  class="form-check-input" name="deficiencia_intelectual" id="deficiencia_intelectual" value="S">
                               <label class="form-check-label"  for="deficiencia_intelectual"> Intelectual</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox"  class="form-check-input" name="deficiencia_multipla" id="deficiencia_multipla" value="S" >
                               <label class="form-check-label"  for="deficiencia_multipla"> Múltipla</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox"  class="form-check-input" name="deficiencia_tea" id="deficiencia_tea" value="S" >
                               <label class="form-check-label"  for="deficiencia_tea"> TEA (Transtorno do Espectro Autista e Psicose)</label>
                            </div>
                               </div>
                        </div>
                    </div>

                   {{-- Filtro Raça --}}
                   <div class="col-md-6">
                    <div class="form-group row">
                   <label class="col-md-4 label-control"  style="font-size: 16px!important;"
                    for="raca">Raças</label>

                   <div class="col-md-8" id="raca" >

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="raca" id="branca" value="b" >
                    <label class="form-check-label" for="branca">Branca</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="raca" id="negra" value="n" >
                    <label class="form-check-label" for="negra">Negra</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="raca" id="parda" value="p" >
                    <label class="form-check-label" for="parda">Parda</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="raca" id="amarela" value="a" >
                    <label class="form-check-label" for="amarela">Amarela</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="raca" id="indigena" value="i" >
                    <label class="form-check-label" for="indigena">Indígena</label>
                </div>

                    </div>
                            </div>
                        </div>

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary bg-white rounded" style="margin-right: 30px;">
                        <i class="fa-solid fa-magnifying-glass"></i> Pesquisar
                    </button>

                <a href="{{route('consulta')}}" class="btn btn-danger bg-white rounded">
                    <i class="fa-solid fa-x"></i>
                    Resetar Filtros
                </a>
                </div>






            </ul>

            </section>


            <div class="card-content collpase show card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tabelaConsulta">
                        <thead align="center">
                            <tr>

                                <th scope="col">Nome</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Bairro</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Cor</th>
                                <th scope="col">Deficiência</th>
                                <th scope="col">Semestre</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Visualizar</th>


                            </tr>
                        </thead>
                        <tbody align="center">



                            @foreach ($formacao as $form)

                            <tr>

                                <td>{{$form->candidato->user->name}}</td>
                                <td>{{$form->candidato->cidade}}</td>
                                <td>{{$form->candidato->bairro}}</td>
                                <td>{{$form->listaCursos->curso}}</td>
                                <td>

                                 @if($form->candidato->raca === "b")
                               {{$form->candidato->raca = "Branca"}}
                                @elseif($form->candidato->raca === "n")
                                {{$form->candidato->raca = "Negra"}}
                                @elseif($form->candidato->raca === "p")
                                {{$form->candidato->raca = "Parda"}}
                                @elseif($form->candidato->raca === "a")
                               {{$form->candidato->raca = "Amarela"}}
                                @elseif($form->candidato->raca === "i")
                                {{$form->candidato->raca = "Indígena"}}
                                @endif
                                </td>
                                <td>
                                    @if($form->candidato->deficiencia_fisica === "S")
                                    {{$form->candidato->deficiencia_fisica = "Física"}}
                                    @endif
                                    @if($form->candidato->deficiencia_intelectual === "S")
                                    {{$form->candidato->deficiencia_intelectual = "Intelectual"}}
                                    @endif
                                    @if($form->candidato->deficiencia_multipla === "S")
                                    {{$form->candidato->deficiencia_multipla = "Múltipla"}}<br>
                                    @endif
                                    @if($form->candidato->deficiencia_tea === "S")
                                    {{$form->candidato->deficiencia_tea = "Tea"}}
                                    @endif
                                </td>
                                <td>{{$form->semestre}}</td>
                                <td>{{$form->turno}}</td>
                                <td><a href="{{route('visualizar', $form->candidato->id)}}" class="btn btn-info">
                                   <i class="fa-regular fa-eye"></i>
                                </a></td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    @if (isset($filters))
                    {{ $formacao->appends($filters)->links() }}
                    @else
                    {{ $formacao->links() }}
                    @endif
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    let expanded = false;

const showCheckboxes = () => {
  const checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

const selectBox = document.querySelector('.selectBox')
selectBox.addEventListener('click', showCheckboxes)
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<script>
try {
fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
return true;
}).catch(function(e) {
var carbonScript = document.createElement("script");
carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
carbonScript.id = "_carbonads_js";
document.getElementById("carbon-block").appendChild(carbonScript);
});
} catch (error) {
console.log(error);
}
</script>

<script>

    $("#demo1").easySelect({
        buttons: true,
        search: true,
        placeholder: 'Escolha as cidades',
        placeholderColor: 'violet',
        selectColor: 'lila',
        itemTitle: 'Color selected',
        showEachItem: true,
        width: '50%',
        dropdownMaxHeight: '450px',
    });

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
@endsection
