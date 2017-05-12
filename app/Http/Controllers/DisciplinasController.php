<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::get();
        $disciplinas = Disciplina::get();
        return view('disciplinas.lista', ['disciplinas' => $disciplinas, 'cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
        $cursos = Curso::get();
        return view('disciplinas.formulario', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $disciplina = new Disciplina();
        $disciplina = $disciplina->create($request->all());

        \Session::flash('mensagem_sucesso', 'Disciplina cadastrada!');

        return Redirect::to('disciplinas/novo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */

    public function editar($id)
    {
        $disciplina = Disciplina::findOrfail($id);
        return view('disciplinas.formulario', ['disciplina' => $disciplina]);
    }

    public function atualizar($id, Request $request)
    {
        $disciplina = Disciplina::findOrfail($id);

        $disciplina->update($request->all());

        \Session::flash('mensagem_sucesso', 'Aluno atualizado com sucesso!');

        return Redirect::to('disciplinas/' . $disciplina->id . '/editar');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        $disciplina = Disciplina::findOrfail($id);

        $disciplina->delete();

        \Session::flash('mensagem_sucesso', 'Disciplina deletada com sucesso!');

        return Redirect::to('disciplinas');
    }
}
