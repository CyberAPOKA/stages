@extends('layouts.master')

@section('title', 'Cursos extras')

@section('content-title', 'Meu Currículo')

@section('content')

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
        <div class="card card-fullscreen shadow p-3 mb-5 bg-white rounded">

            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Redes sociais</strong></h4>
            </div>


            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-text"></div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            @foreach ($candidato->cursoextra as $cursoextra)

                                <div class="form-body">
                                    <br>
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
                                    <br> <h4 class="card-title" id="bordered-layout-colored-controls"> <strong>Links</strong></h4><br>

                                   <h4 class="text-center">No campo abaixo você pode informar links para conteúdos de trabalhos já realizados (arquivos, sites, portifólio, etc). O campo é opcional.</h4>
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                              <label class="col-md-3 label-control" style="font-size: 16px!important;"
                                                for="links">Links:</label>
                                            <div class="col-md-9">
                                                <textarea type="text" id="links" class="form-control" readonly
                                                    name="links" cols="50" rows="10" value="{{old('links')}}"><?php echo htmlspecialchars($cursoextra->links); ?></textarea>
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                </div>
                                <div class="form-actions text-left">
                                    <a href="{{route ('curriculo.curso_extra.edit', $cursoextra->id) }}"
                                        class="btn btn-primary" style="margin-top: 12px;">
                                        <span class="oi oi-pencil"></span> Editar
                                    </a>

                                </div>
                                @endforeach
                            <hr size="50">

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection

@section('destroyCursoExtra')
<script>
    function destroy(id) {
        swal({
                title: "Tem certeza que deseja deletar?",
                text: "Ao deletar, não será possível recuperar a informação",
                icon: "warning",
                buttons: ["Cancelar", true],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    url = "{{ route('curriculo.curso_extra.delete', ':id')}}";
                    url = url.replace(':id', id);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                        success: function () {
                            swal({
                                title: "Sucesso!",
                                text: "Informação deletada",
                                icon: "success",
                                buttons: false,
                                timer: '1500',
                            }).then(function () {
                                location.reload();
                            });
                        },
                        error: function () {
                            swal({
                                title: 'Opps...',
                                text: "Erro inesperado",
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    })
                }
            })
    };

</script>
@endsection
