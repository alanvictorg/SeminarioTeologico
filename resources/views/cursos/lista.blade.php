@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row row-lista">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Cursos
                        <a class="pull-right" href="{{ url('cursos/create') }}">Novo Curso</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        @if(strlen($cursos) < 3)
                            <div class="alert alert-info">Não há cursos cadastrados!</div>
                        @else

                            <table class="table">
                                <thead>
                                <td>Nome</td>
                                <td>Opções</td>

                                </thead>
                                <tbody>

                                @foreach($cursos as $curso)
                                    <tr>
                                        <td>{{$curso->nome}}</td>

                                        <td>
                                            {!! Form::open(['method' => 'DELETE', 'url' => '/cursos/'.$curso->id, 'style' => 'display: inline;']) !!}
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
