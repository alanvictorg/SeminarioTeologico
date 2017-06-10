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
        $professor = $professor->create($request->all());

        \Session::flash('mensagem_sucesso', 'Aluno cadastrado com sucesso!');

        return Redirect::to('professores/novo');
    }
}
