@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row row-lista">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Professores
                        <a class="pull-right" href="{{ url('professores/create') }}">Cadastrar Profº</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        @if(strlen($professores) < 3)
                            <div class="alert alert-info">Não há professores cadastrados!</div>
                        @else

                            <table class="table">
                                <thead>
                                <td>Nome</td>
                                <td>Opções</td>

                                </thead>
                                <tbody>

                                @foreach($professores as $professor)
                                    <tr>
                                        <td>{{$professor->nome}}</td>

                                        <td>
                                            {!! Form::open(['method' => 'DELETE', 'url' => '/professores/'.$professor->id, 'style' => 'display: inline;']) !!}
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
                            @if($paginar)
                                {{ $professores->render() }}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
