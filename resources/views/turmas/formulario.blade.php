@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row row-lista">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading form-cad" style="text-align: left;">Informe os dados da turma
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

                        @if(Request::is('*/edit'))
                            {!! Form::model($turma, ['method' => 'PATCH', 'url' => 'turmas/'.$turma->id]) !!}
                        @else
                            {!! Form::open(['action' => 'TurmasController@store']) !!}
                        @endif
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
                        {!! Form::select('curso_id',$cursos,null ,["class" => "form-control", 'id'=>'curso_id'
                        ,'required','placeholder'=>"Escolha um curso",'required'])  !!}

                        <div class="row perguntas">
                            {!! Form::label('professor_id','Professor responsável?') !!}
                        </div>
                        {!! Form::select('professor_id',$professores,null ,["class" => "form-control", 'id'=>'professor_id'
                             ,'required','placeholder'=>"Escolha um professor",'required'])  !!}

                        <div class="row perguntas">
                            {!! Form::label('aluno_id','Quais alunos deseja matricular nesta turma?') !!}
                        </div>
                        <div class="row">
                            @foreach($alunos as $aluno)
                                <?php $uri = $_SERVER['REQUEST_URI']; ?>
                                <div class="col-md-4 lista-nome">
                                    {!! Form::label('alunos[]', $aluno->nome) !!}
                                    @if($uri == '/turmas/create')
                                        {!! Form::checkbox('alunos[]', $aluno->id)  !!}
                                    @endif
                                </div>

                            @endforeach
                        </div>
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
