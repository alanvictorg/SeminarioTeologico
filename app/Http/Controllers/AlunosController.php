<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AlunosController extends Controller
{
    public function index()
    {
        $alunos = Aluno::get();
        return view('alunos.lista', ['alunos' => $alunos]);
    }

    public function novo()
    {
        $cursos = Curso::get();
        return view('alunos.formulario', ['cursos' => $cursos]);
    }

    public function salvar(Request $request)
    {
        $aluno = new Aluno();
        $aluno = $aluno->create($request->all());

        \Session::flash('mensagem_sucesso', 'Aluno cadastrado com sucesso!');

        return Redirect::to('alunos/novo');
    }

    public function editar($id)
    {
        $aluno = Aluno::findOrfail($id);
        return view('alunos.formulario', ['aluno' => $aluno]);
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
