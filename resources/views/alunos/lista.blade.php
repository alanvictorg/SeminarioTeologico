@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Alunos
                        <a class="pull-right" href="{{ url('alunos/novo') }}">Novo Aluno</a>
                    </div>

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
                                <td>RG</td>
                                <td>Opções</td>
                                </thead>
                                @foreach($alunos as $aluno)
                                    <tr>
                                        <td>{{$aluno->nome}}
                                        </td>
                                        <td>{{$aluno->rg}}</td>
                                        <td>
                                            <a href="/alunos/{{ $aluno->id }}/editar"
                                               class="btn btn-default btn-sm">Editar</a>
                                            <a href="/alunos/{{ $aluno->id }}/historico"
                                               class="btn btn-default btn-sm">Gerar Histórico</a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => '/alunos/'.$aluno->id, 'style' => 'display: inline;']) !!}
                                            <button type="submit" onClick="return confirm('Deseja deletar o registro?')"
                                                    href="/alunos/{{ $aluno->id }}"
                                                    class="btn btn-default btn-sm">Excluir
                                            </button>
                                            {!! Form::close()    !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </thead>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
