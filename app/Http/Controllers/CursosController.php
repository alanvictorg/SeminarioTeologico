<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::get();
        return view('cursos.lista', ['cursos' => $cursos]);
    }



    public function novo()
    {
        return view('cursos.formulario');
    }

    public function salvar(Request $request)
    {
        $curso = new Curso();
        $curso = $curso->create($request->all());

        \Session::flash('mensagem_sucesso', 'Curso cadastrado com sucesso!');

        return Redirect::to('cursos/novo');
    }
}
