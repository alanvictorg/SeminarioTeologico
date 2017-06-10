@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Detalhes
                        <a class="pull-right" href="{{ url("turmas") }}">Listagem Turmas</a>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        {!! Form::open(['url' => 'turmas/salvarnotas']) !!}

                        <h2>{{ $turma->codigo }}</h2>

                        {!! Form::hidden('turma_id', $turma->id)!!}

                        <div class="row">
                            <h4>{!! Form::label('alunos', 'Alunos Matriculados:') !!}</h4>

                            <table class="table">
                                <thead>
                                <td>Nome</td>
                                <td>N1</td>
                                <td>N2</td>
                                <td>N3</td>
                                <td>Média</td>
                                </thead>
                                <?php $key = 0; ?>
                                @foreach ($turma->alunos as $aluno)


                                    <tr>
                                        <td>
                                            {{$aluno->nome}}

                                            {!! Form::hidden("alunos[$key][id]", $aluno->id)!!}
                                            {!! Form::hidden("alunos[$key][turma_id]", $aluno->pivot->turma_id)!!}

                                        </td>
                                        <td>
                                            {!! Form::input('text', "alunos[$key][nota1]", null, ['style' => 'width: 40px; border:none; text-align:center;', 'placeholder' => $avaliacoes[$key]->nota1] ) !!}
                                        </td>
                                        <td>
                                            {!! Form::input('text', "alunos[$key][nota2]", null, ['style' => 'width: 40px; border:none; text-align:center;', 'placeholder' => $avaliacoes[$key]->nota2]) !!}
                                        </td>
                                        <td>
                                            {!! Form::input('text', "alunos[$key][nota3]", null, ['style' => 'width: 40px; border:none; text-align:center;', 'placeholder' => $avaliacoes[$key]->nota3]) !!}

                                        </td>
                                        <td>
                                            <?php
                                            $media = ($avaliacoes[$key]->nota1 + $avaliacoes[$key]->nota2 + $avaliacoes[$key]->nota3) / 3;
                                            $media1 = number_format($media, 2);
                                            ?>

                                            {{$media1}}

                                            {!! Form::hidden("alunos[$key][media]", $media) !!}
                                        </td>


                                    </tr>
                                    <?php $key++; ?>
                                @endforeach

                            </table>
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
