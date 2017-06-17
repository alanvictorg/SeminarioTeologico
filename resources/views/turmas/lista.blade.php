@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row row-lista">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Turmas
                        <a class="pull-right" href="{{ url('turmas/create') }}">Nova Turma</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        @if(Session::has('mensagem_info'))
                            <div class="alert alert-info">{{Session::get('mensagem_info')}}</div>
                        @endif

                        @if(strlen($turmas) < 3)
                            <div class="alert alert-info">Não há turmas formadas!</div>
                        @else

                            <table class="table">
                                <thead>
                                <td>Turma</td>
                                <td>Curso</td>
                                <td>Professor</td>
                                <td>Opções</td>

                                </thead>
                                <tbody>

                                @foreach($turmas as $turma)
                                    <tr>
                                        <td>{{$turma->codigo}}</td>
                                        <td>{{$turma->curso->nome}}</td>
                                        <td>{{$turma->professore->nome}}</td>
                                        <td>
                                            <a href="/turmas/{{ $turma->id }}/edit"
                                               class="btn btn-default btn-sm">Editar</a>
                                            <a href="/turmas/{{ $turma->id }}"
                                               class="btn btn-default btn-sm">Visualizar</a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => '/turmas/'.$turma->id, 'style' => 'display: inline;']) !!}
                                            <button type="submit" onClick="return confirm('Deseja deletar o registro?')"
                                                    href=""
                                                    class="btn btn-default btn-sm">Excluir
                                            </button>
                                            {!! Form::close()    !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
