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
        $paginar = false;
        $cursos = Curso::get();
        if (Aluno::count() > 8) {
            $alunos = Aluno::orderBy('matricula')->paginate(8);
            $paginar = true;
        } else {
            $alunos = Aluno::orderBy('matricula')->get();
        }
        return view('alunos.lista', ['alunos' => $alunos, 'cursos' => $cursos, 'paginar' => $paginar]);

    }

    public function busca(Request $request)
    {
        $paginar = false;
        $count = Aluno::where(function ($query) use ($request) {

            if ($request->has('nome'))
                $nome = $request->nome;
            $query->where('nome', "like", "%{$nome}%");

        })
            ->count();

        if ($count > 8) {
            $alunos = Aluno::where(function ($query) use ($request) {

                if ($request->has('nome'))
                    $nome = $request->nome;
                $query->where('nome', "like", "%{$nome}%");

            })
                ->paginate(8);
            $paginar = true;
        } else {
            $alunos = Aluno::where(function ($query) use ($request) {

                if ($request->has('nome'))
                    $nome = $request->nome;
                $query->where('nome', "like", "%{$nome}%");

            })->get();
        }


        return view('alunos.lista', ['alunos' => $alunos, 'paginar' => $paginar]);
    }

    public function create()
    {
        $cursos = Curso::get();
        return view('alunos.formulario', ['cursos' => $cursos]);
    }

    public function store(Request $request)
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

        return Redirect::to('alunos/create');
    }

    public function edit($id)
    {
        $aluno = Aluno::findOrfail($id);
        return view('alunos.formulario', ['aluno' => $aluno]);
    }

    public function show($id)
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

    public function update($id, Request $request)
    {
        $aluno = Aluno::findOrfail($id);

        $aluno->update($request->all());

        \Session::flash('mensagem_sucesso', 'Aluno atualizado com sucesso!');

        return Redirect::to('alunos/' . $aluno->id . '/edit');

    }

    public function destroy($id)
    {
        $aluno = Aluno::findOrfail($id);

        $aluno->delete();

        \Session::flash('mensagem_sucesso', 'Aluno deletado com sucesso!');

        return Redirect::to('alunos');
    }



//    public function pdf($id)
//    {
//        $turmas = new Turma();
//        $aluno = Aluno::findOrfail($id);
//        $turmas = $aluno->turmas;
//
//        foreach ($turmas as $turma) {
//            $id = $turma->curso_id;
//        }
//        $curso = Curso::find($id);
//
//        $pdf = \PDF::loadview('alunos/pdf', ['aluno' => $aluno, 'turma' => $curso]);
//        return $pdf->download('historico.pdf');
//    }
}
