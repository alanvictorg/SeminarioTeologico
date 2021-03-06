@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row row-lista">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading form-cad" style="text-align: left;">Informe os dados do curso
                        <a class="pull-right" href="{{ url("cursos") }}">Listagem Cursos</a>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        {{--@if(Request::is('*/editar'))--}}
                        {{--{!! Form::model($aluno, ['method' => 'PATCH', 'url' => 'alunos/'.$aluno->id]) !!}--}}
                        {{--@else--}}
                        {!! Form::open(['action' => 'CursosController@store']) !!}
                        {{--@endif--}}

                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome' ])  !!}
                        {!! Form::input('text', 'descricao', null, ['class' => 'form-control perguntas', 'autofocus', 'placeholder' => 'Descrição' ])  !!}
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
