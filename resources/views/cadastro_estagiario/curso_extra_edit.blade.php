@extends('layouts.master')

@section('title', 'Cursos Extras')

@section('content-title', 'Meu Currículo')

@section('content')

@if(session('messageerror'))

<script>
    Swal.fire({
  position: 'mid-mid',
  icon: 'success',
  title: 'Arquivo excluído com sucesso!',

})
  </script>

 @endif

 @if(session('errorpdf'))

<script>
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'O máximo de arquivos por pessoa é 5!',
})
  </script>

 @endif

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">

            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Redes sociais</strong></h4>
            </div>
                <a class="heading-elements-toggle">
                    <i class="la la-ellipsis-v font-medium-3"></i>
                </a>

                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text"></div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text"></div>
                                <form class="form form-horizontal form-bordered"
                                    action="{{route('curriculo.curso_extra.update', $cursoExtra->id)}}" method="POST"
                                     id="formInscricao" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="col-md-10">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                    for="instagram">Instagram</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="instagram" class="form-control " placeholder=""
                                                        name="instagram"
                                                        value="{{isset($cursoExtra->instagram) ? $cursoExtra->instagram : ''}}">
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
                                                        value="{{isset($cursoExtra->facebook) ? $cursoExtra->facebook : ''}}">
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
                                                        value="{{isset($cursoExtra->linkedin) ? $cursoExtra->linkedin : ''}}">
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
                                                        value="{{isset($cursoExtra->outro) ? $cursoExtra->outro : ''}}">
                                                </div>
                                            </div>
                                        </div>

                                   <br> <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Links</strong></h4><br>

                                   <h4 class="text-center">No campo abaixo você pode informar links para conteúdos de trabalhos já realizados (arquivos, sites, portifólio, etc). O campo é opcional.</h4>
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                              <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                for="links">Links:</label>
                                            <div class="col-md-9">
                                                <textarea type="text" id="links" class="form-control"
                                                    name="links" cols="50" rows="10" value="{{old('links')}}"><?php echo htmlspecialchars($cursoExtra->links); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br> <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Adicionar PDFS</strong></h4><br>

                                   <div class="col-md-10">
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <h4>Arquivos:
                                                    <input onchange="change_anexos()" type="file" id="anexos" name="anexos[]" multiple></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <br> <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Arquivos Enviados</strong></h4><br>




                                    <table class="table table-striped" id="tabelaConsulta">
                                        <thead align="center">
                                            <tr>
                                                <th scope="col">teste ID</th>
                                                <th scope="col">Candidato ID</th>
                                                <th scope="col">Arquivo ID</th>
                                                <th scope="col">Nome do Arquivo</th>
                                                <th scope="col">Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                            @foreach($documentos as $documento)

                                            <tr>
                                                <td>{{ $limite }}</td>
                                                <td>{{ $documento->candidato_id }}</td>
                                                <td>{{ $documento->id }}</td>
                                                <td>{{ $documento->nomeanexo }}</td>

                                                <td>

                                                    <a class="btn btn-danger delete" onclick="deletepdfs(this)"  href="excluir/{{$documento->id}}">
                                                        Excluir <i class="fa-solid fa-download"></i></a>



                                               </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                        <div class="form-actions text-left">
                                        <button type="submit" id="btnsubmit" class="btn btn-primary" style="margin-top: 12px;">
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



    <script>
        $(document).ready(function () {
            $("#formInscricao").submit(function (e) {

                $("#btnsubmit").attr("disabled", true);

                return true;

            });
        });
    </script>

@foreach($documentos as $documento)
<script>
     function deletepdfs(){
    var deleteLinks = document.querySelectorAll('.delete');
    event.preventDefault();

    for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
         Swal.fire({
  title: '{{$documento->nomeanexo}}',
  text: "Você realmente deseja excluir este arquivo?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sim, excluir!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = this.getAttribute('href');
  }
});

    });
}
     }
</script>


@endforeach

{{--
<script>
    var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            window.location.href = this.getAttribute('href');
        }

    });
}
</script>
--}}
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="{{asset('js/validation/validation-pessoas/validation-pessoas-create.js')}}"></script>
    <script src="{{asset('js/messages_pt_BR.js')}}"></script>
    <script src='jquery.min.js'></script>
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CursoExtraSanitizedRequest') !!}

    @stop
