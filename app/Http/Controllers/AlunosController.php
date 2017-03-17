<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AlunosController extends Controller
{
    public function index ()
    {
        $alunos = Aluno::get();
        return view('alunos.lista', ['alunos' => $alunos]);
    }

    public function novo ()
    {
        return view('alunos.formulario');
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

        \Session::flash('mensagem_sucesso', 'Aluno autalizado com sucesso!');

        return Redirect::to('alunos/'.$aluno->id.'/editar');

    }

    public function deletar()
    {

    }
}
