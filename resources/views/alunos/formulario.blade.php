@extends('layouts.app')

@section('content')
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <aside id="sidebar">
                <ul id="sidemenu" class="sidebar-nav">
                    <li>
                        <a href="#">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-user"></i></span>
                            <span class="sidebar-title">@if (!Auth::guest())
                                    <a href="{{ url('/alunos') }}">
                                        Alunos
                                    </a>
                                @endif</span>
                        </a>
                    </li>
                    <li>
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
                            <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                            <span class="sidebar-title">Management</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="#"><i class="fa fa-caret-right"></i>Users</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i>Roles</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-3">
                            <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
                            <span class="sidebar-title">Blog</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-3" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="#"><i class="fa fa-caret-right"></i>Posts</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i>Comments</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="sidebar-icon"><i class="fa fa-database"></i></span>
                            <span class="sidebar-title">Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="sidebar-icon"><i class="fa fa-terminal"></i></span>
                            <span class="sidebar-title">Console</span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>
        <main id="page-content-wrapper" role="main">
        </main>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Informe os dados do Aluno
                        <a class="pull-right" href="{{ url("alunos") }}">Listagem Alunos</a>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($aluno, ['method' => 'PATCH', 'url' => 'alunos/'.$aluno->id]) !!}
                        @else
                            {!! Form::open(['url' => 'alunos/salvar']) !!}
                        @endif

                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome' ])  !!}
                        {!! Form::input('text', 'filiacao', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Filiação' ])  !!}
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::input('text', 'dt_nasc', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Data de Nascimento' ])  !!}
                            </div>
                            <div class="col-lg-6">
                                {!! Form::input('text', 'natural', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Naturalidade' ])  !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::input('text', 'cpf', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'CPF' ])  !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::input('text', 'rg', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'RG' ])  !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::input('text', 'org_exp', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Órgão Expedidor' ])  !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::input('text', 'est_civil', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Estado Civil' ])  !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::input('text', 'escolaridade', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Escolaridade' ])  !!}
                            </div>
                        </div>
                        {!! Form::input('text', 'endereco', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Endereço' ])  !!}
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::input('text', 'local_trabalho', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Local de Trabalho' ])  !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::input('text', 'data_conversao', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Data da Conversão' ])  !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::input('text', 'batismo', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Batismo nas águas' ])  !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::input('text', 'membro', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Membro desde' ])  !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::input('text', 'batismo_espirito', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Batismo com Espírito Santo?' ])  !!}
                            </div>
                        </div>

                        {!! Form::input('text', 'nome_igreja', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Nome da Igreja' ])  !!}
                        {!! Form::input('text', 'end_igreja', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Endereço da Igreja' ])  !!}

                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::input('text', 'nome_pastor', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Nome do Pastor' ])  !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::input('text', 'tel_pastor', null, ['class' => 'form-control margem-top', 'autofocus', 'placeholder' => 'Telefone' ])  !!}
                            </div>
                        </div>

                        {!! Form::label('chamado_ministerial','O referido irmão tem demonstrado chamado ministerial, através de sua atuação na Igreja Local?') !!}
                        {!! Form::label('sim','Sim') !!}
                        {!! Form::checkbox('chamado_ministerial', 'sim')  !!}
                        {!! Form::label('nao','Não') !!}
                        {!! Form::checkbox('chamado_ministerial', 'nao')  !!}

                        {!! Form::label('comunhao_igreja','Ele está em plena comunhão com a igreja e você como pastor o recomenda moral e espiritualmente ao ministério?') !!}
                        {!! Form::label('sim','Sim') !!}
                        {!! Form::checkbox('comunhao_igreja', 'sim')  !!}
                        {!! Form::label('nao','Não') !!}
                        {!! Form::checkbox('comunhao_igreja', 'nao')  !!}
                        <div class="row">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary margem-top']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
