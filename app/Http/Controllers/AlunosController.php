<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AlunosController extends Controller
{
    public function index()
    {
        $cursos = Curso::get();
        $alunos = Aluno::get();

        return view('alunos.lista', ['alunos' => $alunos, 'cursos' => $cursos]);

    }

    public function novo()
    {
        $cursos = Curso::get();
        return view('alunos.formulario', ['cursos' => $cursos]);
    }

    public function salvar(Request $request)
    {
        $aluno = new Aluno();

        $this->validate($request, [
            'nome' => 'bail|required',
            'filiacao' => 'bail|required',
            'matricula' => 'bail|required',
            'dt_nasc' => 'bail|required',
            'natural' => 'bail|required',
            'cpf' => 'bail|required',
            'rg' => 'bail|required',
            'endereco' => 'bail|required',
        ]);

        $aluno = $aluno->create($request->all());

        \Session::flash('mensagem_sucesso', 'Aluno cadastrado com sucesso!');

        return Redirect::to('alunos/novo');
    }

    public function editar($id)
    {
        $aluno = Aluno::findOrfail($id);
        return view('alunos.formulario', ['aluno' => $aluno]);
    }

    public function historico($id)
    {
        $turmas = new Turma();
        $aluno = Aluno::findOrfail($id);
        $turmas = $aluno->turmas;

        foreach ($turmas as $turma) {
            $id = $turma->curso_id;
        }
        $curso = Curso::find($id);

        if (empty($turma)) {
            \Session::flash('mensagem_info', 'O aluno ainda não possui matrícula');
            return Redirect::to('alunos/');
        } else {
            return view('alunos.historico', ['aluno' => $aluno, 'turma' => $curso]);
        }
    }

    public function atualizar($id, Request $request)
    {
        $aluno = Aluno::findOrfail($id);

        $aluno->update($request->all());

        \Session::flash('mensagem_sucesso', 'Aluno atualizado com sucesso!');

        return Redirect::to('alunos/' . $aluno->id . '/editar');

    }

    public function deletar($id)
    {
        $aluno = Aluno::findOrfail($id);

        $aluno->delete();

        \Session::flash('mensagem_sucesso', 'Aluno deletado com sucesso!');

        return Redirect::to('alunos');
    }
}
