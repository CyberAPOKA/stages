@extends('layouts.master')

@section('title', 'Configurar Conta')

@section('content')

<div class="card card-fullscreen shadow">
    <div class="card-header text-center">
        <h4 class="card-title"> <strong>Configurar conta</strong>
        </h4>
    </div>
    <div class="card-content collpase show">
        <div class="card-body">

            <form action=" {{action('HomeController@updateConfigs')}} " method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <label class="col-md-3 label-control" for="name">Nome</label>
                            <div class="col-md-9 row">
                                <input type="text" class="form-control col-md-9" name="name" id="name"
                                    value="{{$user->name}}" readonly>
                                <a id="edit-single" onclick="edit('name', 'edit-name-span', 'save-name-span')"
                                    class="edit-icon">
                                    <span id="edit-name-span" style="padding-left: 4px" class="oi oi-pencil"></span>
                                    <span hidden id="save-name-span" class="oi oi-check"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <label class="col-md-3 label-control" for="email">Email</label>
                            <div class="col-md-9 row">
                                <input type="text" class="form-control col-md-9" name="email" id="email"
                                    value="{{$user->email}}" readonly>
                                <a id="edit-single" onclick="edit('email', 'edit-email-span', 'save-email-span')"
                                    class="edit-icon">
                                    <span id="edit-email-span" style="padding-left: 4px" class="oi oi-pencil"></span>
                                    <span hidden id="save-email-span" class="oi oi-check"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

<div hidden id="div-password" class="row">

    <div class="col-md-6">
        <div class="input-group form-group">
            <label class="col-md-3 label-control" for="password">Senha</label>
            <div class="col-md-9 row">
                <input type="password" class="form-control col-md-9" name="password" id="password" value="" readonly>
                <a id="edit-single" onclick="edit('password', 'edit-password-span', 'save-password-span')"
                    class="edit-icon">
                    <span id="edit-password-span" style="padding-left: 4px" class="oi oi-pencil"></span>
                    <span hidden id="save-password-span" class="oi oi-check"></span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-group form-group">
            <label class="col-md-3 label-control" for="password">Confirmar senha</label>
            <div class="col-md-7">
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" value=""
                    readonly>
            </div>
        </div>
    </div>
</div>


{{-- <a id="edit" onclick="edit()" class="btn btn-primary" style="margin-top: 12px;">
                    <span class="oi oi-pencil"></span> Editar
                </a> --}}
{{-- <div id="change-password" class="row"> --}}
<div>
    <a id="change-password" onclick="editPassword()" class="btn btn-primary" style="margin-top: 12px;">
        <span class="oi oi-lock-locked"></span> Trocar senha
    </a>
</div>


<button hidden id="save" type="submit" class="btn btn-primary bg-white rounded" style="margin-top: 12px;">
    <span class="oi oi-check"></span> Salvar
</button>
</form>
</div>
</div>
</div>

<script>
    function edit(inputName, editSpan, saveSpan) {
        const input = document.getElementById(inputName);
        const editIcon = document.getElementById(editSpan);
        const saveIcon = document.getElementById(saveSpan);
        const save = document.getElementById('save');

        if (input.id == 'password') {
            document.getElementById('password-confirm').readOnly = false;
        }

        if (editIcon.hidden == true) {
            saveIcon.hidden = true;
            editIcon.hidden = false;
            input.readOnly = true;
            document.getElementById('password-confirm').readOnly = true;
            return;
        }

        input.readOnly = false;
        editIcon.hidden = true;
        saveIcon.hidden = false;
        save.hidden = false

    }

    function editPassword() {
        const div = document.getElementById('div-password');
        const changePasswordBtn = document.getElementById('change-password');

        div.hidden = false;
        // changePasswordBtn.hidden = true;
    }

</script>


@endsection
