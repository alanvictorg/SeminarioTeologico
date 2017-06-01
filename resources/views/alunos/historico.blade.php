@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default panel-sis">
                    <div class="panel-heading" style="text-align: left;">Histórico Escolar
                        <a class="pull-right" href="{{ url('alunos') }}">Voltar</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        <div class="row" style="text-align: center">IDENTIFICAÇÃO DO DISCENTE</div>
                        <div class="row">
                            <div class="col-xs-6 col-md-4 historico">Nome: {{$aluno->nome}}</div>
                            <div class="col-xs-6 col-md-4 historico"> RG: {{$aluno->rg}}</div>
                            <div class="col-xs-6 col-md-4 historico"> CPF: {{$aluno->cpf}}</div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 historico"> Naturalidade: {{$aluno->natural}}</div>
                            <div class="col-xs-6 historico">Data de Nascimento: {{$aluno->dt_nasc}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 historico"> Filiação: {{$aluno->filiacao}}</div>
                        </div>
                        <div class="row historico">
                            <div class="col-xs-6 historico"> Curso: {{$turma->nome}}</div>
                            <div class="col-xs-6 historico"> Matrícula: {{$aluno->matricula}}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">Créd.</div>
                            <div class="col-md-1">HS</div>
                            <div class="col-md-6">DISCIPLINA</div>
                            <div class="col-md-2">MÉDIA</div>
                            <div class="col-md-1">ANO</div>
                        </div>
                        <?php $key = 0; ?>
                        @foreach($aluno->turmas as $turma)

                            <div class="row">
                                <div class="col-md-1">{{$turma->credito}}</div>
                                <div class="col-md-1">{{$turma->hr_aula}}</div>
                                <div class="col-md-6">{{$turma->codigo}}</div>
                                <div class="col-md-2">{{$aluno->avaliacoes[$key]->media}}</div>
                                <div class="col-md-1">{{$turma->ano}}</div>
                            </div>
                            <?php $key++; ?>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
