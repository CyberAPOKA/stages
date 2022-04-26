<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            {{-- <div class="user">
                        <div class="info">
                            <a aria-expanded="true" style="cursor: default !important;">
                                <span class="oi oi-person"></span>
                                <span>

                    </span>
                    </a>
                </div>
            </div> --}}
            <ul class="nav nav-primary">
                <li class="nav-item custom-nav-item">
                    <a class="custom-user" style="margin-top: 4px;">
                        <span class="oi oi-person" title="home" aria-hidden="true"></span>
                        <p class="sidebar-item">{{Auth::user()->name}}</p>
                    </a>
                </li>
                <hr class="custom-hr">
                <li class="nav-item {{ (request()->is('home/*')) || (request()->is('home'))  ? 'active' : '' }}">
                    <a href="{{route('home')}}">
                        <span class="oi oi-home" title="home" aria-hidden="true"></span>
                        <p class="sidebar-item">Página Inicial</p>
                    </a>
                </li>
                @role('super-admin')
                <li class="nav-item {{ (request()->is('users/*')) || (request()->is('users'))  ? 'active' : '' }}">
                    <a href="{{route('users.create')}}">
                        <span class="oi oi-people"></span>
                        <p class="sidebar-item">Criar Usuários</p>
                    </a>
                </li>
                @endrole

                @role('super-admin|recrutador-demandante')
                <li
                    class="nav-item {{ (request()->is('solicitacao/*')) || (request()->is('solicitacao'))  ? 'active' : '' }}">
                    <a href="{{route('solicitacao.create')}}">
                        <span class="oi oi-document"></span>
                        <p class="sidebar-item">Criar Solicitação</p>
                    </a>
                </li>
                @endrole

                @role('super-admin|recrutador-demandante|admin-demandante|secretario')
                <li
                    class="nav-item {{ (request()->is('consulta/*')) || (request()->is('consulta'))  ? 'active' : '' }}">
                    <a href="{{route('consulta')}}">
                        <span class="oi oi-clipboard"></span>
                        <p class="sidebar-item">Filtro</p>
                    </a>
                </li>
                @endrole

                @role('super-admin|candidato')
                <li
                    class="nav-item {{ (request()->is('curriculo/*')) || (request()->is('curriculo'))  ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-controls="collapseOne" href="#base">
                        <span class="oi oi-person"></span>
                        <p class="sidebar-item">Meu Currículo</p>
                        <span class="caret"></span>
                    </a>

                    <div class="expandable collapse" aria-controls="collapseOne" id="base">
                        <ul class="nav nav-collapse ">
                            <li>
                                <a href="{{route('curriculo.dados_pessoais')}}">
                                    <span class="sub-item">Dados Pessoais</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('curriculo.formacao')}}">
                                    <span class="sub-item">Formação</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('curriculo.profissional')}}">
                                    <span class="sub-item">Experiência e conhecimentos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('curriculo.curso_extra')}}">
                                    <span class="sub-item">Links</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <span class="oi oi-clipboard"></span>
                        <p>Vagas</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="">
                                    <span class="sub-item">Painel de Vagas</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="sub-item">Histórico</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole
                <li
                    class="nav-item {{ (request()->is('configuracoes/conta/*')) || (request()->is('configuracoes/conta'))  ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#submenu">
                        <span class="oi oi-cog"></span>
                        <p>Configurações</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('conta')}} ">
                                    <span class="sub-item">Conta</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <span class="oi oi-account-logout"></span>
                        <p>{{ __('Sair') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- End Sidebar -->
