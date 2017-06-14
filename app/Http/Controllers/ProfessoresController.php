<?php

namespace App\Http\Controllers;

use App\Professore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ProfessoresController extends Controller
{
    public function index()
    {
        $professores = Professore::get();
        return view('professores.lista', ['professores' => $professores]);
    }

    public function novo()
    {
        return view('professores/formulario');
    }

    public function salvar(Request $request)
    {
        $professor = new Professore();

        $this->validate($request, [
            'nome' => 'bail|required',
            'email' => 'bail|required',
            'login' => 'bail|required',

        ]);

        $professor = $professor->create($request->all());

        \Session::flash('mensagem_sucesso', 'Professor cadastrado com sucesso!');

        return Redirect::to('professores/novo');
    }
}
