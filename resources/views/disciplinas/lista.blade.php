@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Disciplinas
                        <a class="pull-right" href="{{ url('disciplinas/novo') }}">Nova Disciplina</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        <table class="table">
                            <thead>
                                    <td>Descrição</td>
                                    <td>Curso</td>

                            </thead>
                            <tbody>

                            @foreach($disciplinas as $disciplina)
                                <tr>
                                    <td>{{$disciplina->descricao}}</td>
                                    <td>{{$disciplina->curso}}</td>
                                    <td>
                                        {{--<a href="/disciplinas/{{ $disciplina->id }}/editar"--}}
                                           {{--class="btn btn-default btn-sm">Editar</a>--}}
                                        {!! Form::open(['method' => 'DELETE', 'url' => '/disciplinas/'.$disciplina->id, 'style' => 'display: inline;']) !!}
                                        <button type="submit" onClick="return confirm('Deseja deletar o registro?')"
                                                href="/alunos/{{ $disciplina->id }}"
                                                class="btn btn-default btn-sm">Excluir
                                        </button>
                                        {!! Form::close()    !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
