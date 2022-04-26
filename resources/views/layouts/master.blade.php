@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
@include('sweet::alert')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<main>
    @include('layouts.main')
</main>

<!-- Javascript Requirements -->

<script defer src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script src="{{asset('js/messages_pt_BR.js')}}"></script>
<script defer type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\DadosPessoaisSanitizedRequest') !!}

</body>

</html>
