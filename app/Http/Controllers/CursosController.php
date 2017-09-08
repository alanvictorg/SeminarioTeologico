<?php

namespace App\Http\Controllers;

use App\Entities\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Repositories\CursoRepository;

class CursosController extends Controller
{
    /**
     * @var CursoRepository
     */
    protected $repository;

    public function __construct(CursoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return CursoRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
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
        $this->validate($request,[
            'nome' => 'bail|required',
            'descricao' => 'bail|required'
        ]);

        $curso = $this->getRepository()->create($request->all());

        \Session::flash('mensagem_sucesso', 'Curso cadastrado com sucesso!');

        return Redirect::to('cursos/create');
    }

    public function destroy($id)
    {
        $this->getRepository()->delete($id);

        \Session::flash('mensagem_sucesso', 'Curso deletado!');

        return Redirect::to('cursos');
    }
}
