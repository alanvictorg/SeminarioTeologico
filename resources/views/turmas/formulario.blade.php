@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Informe os dados da turma
                        <a class="pull-right" href="{{ url("turmas") }}">Listagem Turmas</a>
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
                        {!! Form::open(['url' => 'turmas/salvar']) !!}
                        {{--@endif--}}
                        <div class="row">
                            {!! Form::label('codigo','Qual o nome da turma?') !!}
                        </div>
                        {!! Form::input('text', 'codigo', null, ['class' => 'form-control', 'autofocus','style' => 'text-align: center;' ])  !!}

                        <div class="row perguntas">
                            {!! Form::label('turno','Qual o turno?') !!}
                        </div>

                        {!! Form::label('turno', 'Manhã') !!}
                        {!! Form::radio('turno', 'manha')  !!}

                        {!! Form::label('turno', 'Tarde') !!}
                        {!! Form::radio('turno', 'tarde')  !!}

                        {!! Form::label('turno', 'Noite') !!}
                        {!! Form::radio('turno', 'noite')  !!}

                        <div class="row perguntas">
                            {!! Form::label('credito','Quantos créditos possui?') !!}
                        </div>
                        {!! Form::input('text', 'credito',null, ['class' => 'form-control', 'autofocus', 'style' => ' text-align: center;' ] ) !!}

                        <div class="row perguntas">
                            {!! Form::label('hr_aula','Quantas horas/aula?') !!}
                        </div>
                        {!! Form::input('text', 'hr_aula',null, ['class' => 'form-control', 'autofocus', 'style' => ' text-align: center;' ] ) !!}


                        <div class="row perguntas">
                            {!! Form::label('ano','Qual o ano/semestre?') !!}
                        </div>
                        {!! Form::input('text', 'ano',null, ['class' => 'form-control', 'autofocus', 'style' => ' text-align: center;' ] ) !!}


                        <div class="row perguntas">
                            {!! Form::label('curso_id','Qual o curso?') !!}
                        </div>
                        @foreach($cursos as $curso)
                            {!! Form::label('curso_id', $curso->nome) !!}
                            {!! Form::radio('curso_id', $curso->id)  !!}
                        @endforeach

                        <div class="row perguntas">
                            {!! Form::label('professor_id','Professor responsável?') !!}
                        </div>
                        @foreach($professores as $professor)
                            {!! Form::label('professor_id', $professor->nome) !!}
                            {!! Form::radio('professor_id', $professor->id)  !!}
                        @endforeach

                        <div class="row perguntas">
                            {!! Form::label('aluno_id','Quais alunos deseja matricular nesta turma?') !!}
                        </div>

                        @foreach($alunos as $aluno)
                            <div class="row">
                                {!! Form::label('alunos[]', $aluno->nome) !!}
                                {!! Form::checkbox('alunos[]', $aluno->id)  !!}
                            </div>
                        @endforeach


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
