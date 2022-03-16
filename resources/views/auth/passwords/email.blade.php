@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Resetar Senha') }}</div>
        <div class="form">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <button type="submit">
                        {{ __('Enviar link para meu email') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
