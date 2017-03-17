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

                        <table class="table">
                            <tbody>
                            @foreach($alunos as $aluno)
                                <tr>
                                    <td>{{$aluno->nome}}</td>
                                    <td>
                                        <a href="/alunos/{{ $aluno->id }}/editar"
                                           class="btn btn-default btn-sm">Editar</a>

                                        <button type="submit" href="/alunos/{{ $aluno->id }}"
                                                class="btn btn-default btn-sm">Excluir
                                        </button>
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
