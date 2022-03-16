<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">@yield('content-title')</h4>

                @if(request()->is('curriculo/*'))

                <ul class=" list-group-horizontal breadcrumbs">
                    <li
                        class="list-group-item {{ (request()->is('curriculo/dados_pessoais/*')) || (request()->is('curriculo/dados_pessoais'))  ? 'list-group-item-active' : '' }}">
                        <a href="{{route('curriculo.dados_pessoais')}}"> Dados Pessoais </a>
                    </li>
                    <li
                        class="list-group-item {{ (request()->is('curriculo/formacao/*')) || (request()->is('curriculo/formacao'))  ? 'list-group-item-active' : '' }}">
                        <a href="{{route('curriculo.formacao')}}"> Formação </a>
                    </li>
                    <li
                        class="list-group-item {{ (request()->is('curriculo/profissional/*')) || (request()->is('curriculo/profissional'))  ? 'list-group-item-active' : '' }}">
                        <a href="{{route('curriculo.profissional')}}"> Experiência e Conhecimentos </a>
                    </li>
                    <li
                        class="list-group-item {{ (request()->is('curriculo/curso_extra/*')) || (request()->is('curriculo/curso_extra'))  ? 'list-group-item-active' : '' }}">
                        <a href="{{route('curriculo.curso_extra')}}">Links </a>
                    </li>
                </ul>

                @endif


            </div>

            @yield('content')

        </div>
    </div>
    @include('layouts.footerfilter')
</div>
