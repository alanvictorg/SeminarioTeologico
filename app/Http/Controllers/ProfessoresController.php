<?php

namespace App\Http\Controllers;

use App\Professore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ProfessoresController extends Controller
{
    public function index()
    {
        $paginar = false;
        if (Professore::count() > 8) {
            $professores = Professore::paginate(8);
            $paginar = true;
        } else {
            $professores = Professore::get();
        }

        return view('professores.lista', ['professores' => $professores, 'paginar' => $paginar]);
    }

    public function create()
    {
        return view('professores/formulario');
    }

    public function store(Request $request)
    {
        $professor = new Professore();

        $this->validate($request, [
            'nome' => 'bail|required',
            'email' => 'bail|required',
            'login' => 'bail|required',

        ]);

        $professor = $professor->create($request->all());

        \Session::flash('mensagem_sucesso', 'Professor cadastrado com sucesso!');

        return Redirect::to('professores/create');
    }

    public function destroy($id)
    {
        $professor = Professore::findOrfail($id);

        $professor->delete();

        \Session::flash('mensagem_sucesso', 'Professor deletado com sucesso!');

        return Redirect::to('professores');
    }
}
