<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Turma;
use Illuminate\Http\Request;

class MatriculasController extends Controller
{
    public function index()
    {
        $turmas = Turma::get();
        $alunos = Aluno::get();
        return view('matriculas.formulario', ['alunos' => $alunos, 'turmas' => $turmas]);
    }

    public function salvar(Request $request)
    {
        foreach  ($request->alunos as $id_key => $turma) {
            Aluno::where(['id' => $id_key])->update($turma);
        }
    }
}
