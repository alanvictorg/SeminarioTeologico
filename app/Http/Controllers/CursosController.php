<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::get();
        return view('cursos.lista', ['cursos' => $cursos]);
    }



    public function create()
    {
        $cursos = Curso::get();
        return view('cursos.formulario', ['cursos' => $cursos]);
    }

    public function store(Request $request)
    {
        $curso = new Curso();

        $this->validate($request,[
            'nome' => 'bail|required',
            'descricao' => 'bail|required'
        ]);

        $curso = $curso->create($request->all());

        \Session::flash('mensagem_sucesso', 'Curso cadastrado com sucesso!');

        return Redirect::to('cursos/create');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrfail($id);

        $curso->delete();

        \Session::flash('mensagem_sucesso', 'Curso deletado!');

        return Redirect::to('cursos');
    }
}
