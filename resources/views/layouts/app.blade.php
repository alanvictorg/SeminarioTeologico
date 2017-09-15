<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'STID') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/css/form-elements.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}"
          rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="/img/stid.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.8.0/sweetalert2.css" type="text/css">
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <link href="{{ asset("css/sweetalert.css") }}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style type="text/css">
        #img {
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }
       
        .lista {
            text-align: left;
        }
    </style>
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
                    Seminário Teológico
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>


                <ul class="nav navbar-nav navbar-right" style="padding-right: 20px;">

                    @if (Auth::guest())
                        {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
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
                     <div id="img" class="sidebar-header">
                    
                    <img src="{{ asset('/img/icone.png') }}" alt="" class="">
       
                 </div>
                        <li>
                            <a class="lista" href="{{ url('alunos') }}">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-user"></i></span>
                                <span class="sidebar-title">Alunos</span>
                            </a>

                        </li>

                        <li>
                            <a class="lista" href="{{ url('professores') }}">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-blackboard"></i></span>
                                <span class="sidebar-title">Professores</span>
                            </a>

                        </li>

                        <li>
                            <a class="lista" href="{{ url('cursos') }}">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-file"></i></span>
                                <span class="sidebar-title">Cursos</span>

                            </a>

                        </li>

                        <li>
                            <a class="lista" href="{{ url('turmas') }}">
                                <span class="sidebar-icon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <span class="sidebar-title">Turmas</span>
                            </a>

                        </li>


                        {{--<li>--}}
                        {{--<a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse"--}}
                        {{--href="#submenu-3">--}}
                        {{--<span class="sidebar-icon"><i class="glyphicon glyphicon-calendar"></i></span>--}}
                        {{--<span class="sidebar-title">Faltas</span>--}}
                        {{--<b class="caret"></b>--}}
                        {{--</a>--}}
                        {{--<ul id="submenu-3" class="panel-collapse collapse panel-switch" role="menu">--}}
                        {{--<li><a href="#"><i class="fa fa-caret-right"></i>Posts</a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-caret-right"></i>Comments</a></li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{ url('matriculas') }}">--}}
                        {{--<span class="sidebar-icon"><i class="glyphicon glyphicon-file"></i></span>--}}
                        {{--<span class="sidebar-title">Matricular aluno</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{ url('cursos') }}">--}}
                        {{--<span class="sidebar-icon"><i class="glyphicon glyphicon-file"></i></span>--}}
                        {{--<span class="sidebar-title">Cursos</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
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

</body>
</html>
