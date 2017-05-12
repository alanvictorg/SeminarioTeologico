<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Turma;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TurmasController extends Controller
{
    private $turma;
    private $curso;

//    public function __construct(Turma $turma)
//    {
//        $this->turma = $turma;
//        $this->curso = Curso::find(1);
//    }

    public function index()
    {
        $turmas = Turma::get(); // $this->curso->turmas; //
        return view('turmas.lista', ['turmas' => $turmas]);
    }

    public function novo()
    {
        $alunos = Aluno::get();
        $cursos = Curso::get();
        return view('turmas.formulario', ['cursos' => $cursos, 'alunos' => $alunos]);
    }

    public function salvar(Request $request)
    {
        $turma = new Turma();
        $turma = $turma->create($request->all());

        \Session::flash('mensagem_sucesso', 'Turma cadastrada com sucesso!');

        return Redirect::to('turmas/novo');
    }

    public function deletar($id)
    {
        $turma = Turma::findOrfail($id);

        $turma->delete();

        \Session::flash('mensagem_sucesso', 'Turma deletada com sucesso!');

        return Redirect::to('turmas');
    }
}
