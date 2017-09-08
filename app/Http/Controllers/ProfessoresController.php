<?php

namespace App\Http\Controllers;

use App\Entities\Professore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\ProfessoreRepository;

class ProfessoresController extends Controller
{
    /**
     * @var ProfessoreRepository
     */
    protected $repository;

    public function __construct(ProfessoreRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return ProfessoreRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

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
        $this->validate($request, [
            'nome' => 'bail|required',
            'email' => 'bail|required',
            'login' => 'bail|required',

        ]);

        $professor = $this->getRepository()->create($request->all());

        \Session::flash('mensagem_sucesso', 'Professor cadastrado com sucesso!');

        return Redirect::to('professores/create');
    }

    public function destroy($id)
    {
        $this->getRepository()->delete($id);

        \Session::flash('mensagem_sucesso', 'Professor deletado com sucesso!');

        return Redirect::to('professores');
    }
}
