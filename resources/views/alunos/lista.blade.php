@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row row-lista">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Alunos
                        <a class="pull-right" href="{{ url('alunos/create') }}">Novo Aluno</a>
                    </div>

                    @if(strlen($alunos) > 3)
                    <div class="campo-busca">
                        {!! Form::open(['action' => 'AlunosController@busca']) !!}
                        {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Buscar pelo nome...' ])  !!}
                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary margem-top']) !!}
                        {!! Form::close() !!}
                    </div>
                    @endif

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        @if(Session::has('mensagem_info'))
                            <div class="alert alert-info">{{Session::get('mensagem_info')}}</div>
                        @endif

                        @if(strlen($alunos) < 3)
                            <div class="alert alert-info">Não há alunos cadastrados!</div>
                        @else
                            <table class="table">
                                <thead>
                                <td>Nome</td>
                                <td>Matrícula</td>
                                <td>Opções</td>
                                </thead>
                                @foreach($alunos as $aluno)
                                    <tr>
                                        <td>{{$aluno->nome}}
                                        </td>
                                        <td>{{$aluno->matricula}}</td>
                                        <td>
                                            <a href="/alunos/{{ $aluno->id }}/edit"
                                               class="btn btn-default btn-sm">Editar</a>
                                            <a href="/alunos/{{ $aluno->id }}"
                                               class="btn btn-default btn-sm">Gerar Histórico</a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => '/alunos/'.$aluno->id, 'style' => 'display: inline;']) !!}
                                            <button type="submit" onClick="return confirm('Deseja deletar o registro?')"
                                                    href="/alunos/{{ $aluno->id }}"
                                                    class="btn btn-default btn-sm">Excluir
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </thead>
                            </table>

                            @if($paginar)
                                {{ $alunos->render() }}
                            @endif

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
