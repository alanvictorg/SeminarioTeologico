<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Seminário Teologia') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/css/form-elements.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="/img/idb-icon.png"/>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app" style="margin-top: 50px;">
    <nav class="navbar navbar-default navbar-fixed-top nav">
        <div class="container-fluid">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <a class="navbar-brand titulo-nav" href="{{ url('/home') }}">
                    {{ config('app.name') }}
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>


                <ul class="nav navbar-nav navbar-right" style="padding-right: 20px;">

                    @if (Auth::guest())
                        {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ route('register') }}">Register</a></li> --}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if (!Auth::guest())
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <aside id="sidebar">
                    <ul id="sidemenu" class="sidebar-nav">
                        <li>
                            <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse"
                               href="#submenu-1">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-user"></i></span>
                                <span class="sidebar-title">Alunos</span>
                                <b class="caret"></b>
                            </a>
                            <ul id="submenu-1" class="panel-collapse collapse panel-switch" role="menu">

                                    <li><a href="{{ url('alunos') }}">@if (!Auth::guest())
                                                <i class="fa fa-caret-right"></i>Curso Básico</a></li>
                                    @endif

                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse"
                               href="#submenu-2">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <span class="sidebar-title">Notas</span>
                                <b class="caret"></b>
                            </a>
                            <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                                <li><a href="#"><i class="fa fa-caret-right"></i>Users</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Roles</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse"
                               href="#submenu-3">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <span class="sidebar-title">Faltas</span>
                                <b class="caret"></b>
                            </a>
                            <ul id="submenu-3" class="panel-collapse collapse panel-switch" role="menu">
                                <li><a href="#"><i class="fa fa-caret-right"></i>Posts</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i>Comments</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('disciplinas') }}">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-file"></i></span>
                                <span class="sidebar-title">Disciplinas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('cursos') }}">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-file"></i></span>
                                <span class="sidebar-title">Cursos</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
            <main id="page-content-wrapper" role="main">
            </main>
        </div>
    @endif
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
