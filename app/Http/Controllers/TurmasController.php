<?php

namespace App\Http\Controllers;

use App\Entities\Aluno;
use App\Entities\Avaliacoe;
use App\Entities\Curso;
use App\Entities\Professore;
use App\Entities\Turma;
use App\Entities\AlunoTurma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Repositories\TurmaRepository;
use App\Repositories\AlunoTurmaRepository;
use App\Repositories\AvaliacoeRepository;

class TurmasController extends Controller
{
    /**
     * @var TurmaRepository
     */
    protected $repository;

    /**
     * @var AlunoTurmaRepository
     */
    protected $alunoTurmaRepository;

    /**
     * @var AvaliacoeRepository
     */
    protected $avaliacaoRepository;

    public function __construct(TurmaRepository $repository,
                                AlunoTurmaRepository $alunoTurmaRepository,
                                AvaliacoeRepository $avaliacoeRepository
    )
    {
        $this->repository = $repository;
        $this->alunoTurmaRepository = $alunoTurmaRepository;
        $this->avaliacaoRepository = $avaliacoeRepository;
    }

    /**
     * @return TurmaRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    public function getAlunoTurmaRepository()
    {
        return $this->alunoTurmaRepository;
    }

    public function getAvaliacaoRepository()
    {
        return $this->avaliacaoRepository;
    }

    public function index()
    {
        $paginar = false;

        if (Turma::count() > 8) {
            $turmas = Turma::paginate(8);
            $paginar = true;
        } else {
            $turmas = Turma::get();
        }
        return view('turmas.lista', ['turmas' => $turmas, 'paginar' => $paginar]);
    }

    public function busca(Request $request)
    {
        $paginar = false;
        $count = Turma::where(function ($query) use ($request) {

            if ($request->has('nome'))
                $nome = $request->nome;
            $query->where('codigo', "like", "%{$nome}%");

        })
            ->count();

        if ($count > 8) {
            $turmas = Turma::where(function ($query) use ($request) {

                if ($request->has('nome'))
                    $nome = $request->nome;
                $query->where('codigo', "like", "%{$nome}%");

            })
                ->paginate(8);
            $paginar = true;
        } else {
            $turmas = Turma::where(function ($query) use ($request) {

                if ($request->has('nome'))
                    $nome = $request->nome;
                $query->where('codigo', "like", "%{$nome}%");

            })->get();
        }


        return view('turmas.lista', ['turmas' => $turmas, 'paginar' => $paginar]);
    }

    public function create()
    {

        $alunos = Aluno::orderBy('nome')->get();
        $cursos = Curso::orderBy('nome')->pluck('nome', 'id');
        $professores = Professore::orderBy('nome')->pluck('nome', 'id');

        if (strlen($alunos) < 3 || strlen($cursos) < 3 || strlen($professores) < 3) {
            \Session::flash('mensagem_info', 'É necessário cadastrar alunos, cursos e professores para formar turma');

            return Redirect::to('turmas/');
        } else

            return view('turmas.formulario', ['cursos' => $cursos, 'alunos' => $alunos, 'professores' => $professores]);
    }

    public function show($id)
    {
        $turma = Turma::findOrfail($id);
        $alunos = $turma->alunos()->orderBy('nome')->get();
        $avaliacoes = Avaliacoe::where('turma_id', $id)->orderBy('id')->get();
        return view('turmas.visualizar', ['turma' => $turma, 'alunos' => $alunos, 'avaliacoes' => $avaliacoes]); //, 'alunos' => $alunos
    }

    public function edit($id)
    {
        $turmas = Turma::findOrfail($id);
        $cursos = Curso::orderBy('nome')->pluck('nome', 'id');
        $professores = Professore::orderBy('nome')->pluck('nome', 'id');
        $alunos = Aluno::get();
        return view('turmas.formulario', ['turma' => $turmas, 'cursos' => $cursos, 'professores' => $professores, 'alunos' => $alunos]);
    }

    public function update($id, Request $request)
    {
        $turma = Turma::findOrfail($id);

        $turma->update($request->all());

        \Session::flash('mensagem_sucesso', 'Turma atualizada com sucesso!');

        return Redirect::to('turmas/' . $turma->id . '/edit');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $this->validate($request, [
            'codigo' => 'bail|required',
            'curso_id' => 'bail|required',
            'professor_id' => 'bail|required',
            'credito' => 'bail|required',
            'ano' => 'bail|required',
            'hr_aula' => 'bail|required'
        ]);

        $turma = $this->getRepository()->create($data);

        foreach ($data['alunos'] as $dados) {
            $data['aluno_id'] = $dados;
            $data['turma_id'] = $turma->id;
            $alunoturma = $this->getAlunoTurmaRepository()->create($data);

            $this->getAvaliacaoRepository()->create($data);

        }

        \Session::flash('mensagem_sucesso', 'Turma cadastrada com sucesso!');

        return Redirect::to('turmas/create');
    }

    public function salvarnotas(Request $request)
    {

        $max = sizeof($request->alunos);

        for ($i = 0; $i < $max; $i++) {

            if ($request->alunos[$i]['nota1'] != null) {
                DB::table('avaliacoes')->
                where('aluno_id', $request->alunos[$i]['id'])->
                where('turma_id', $request->alunos[$i]['turma_id'])->
                update(
                    [
                        'nota1' => $request->alunos[$i]['nota1'],
                        'media' => $request->alunos[$i]['media']
                    ]
                );
            }

            if ($request->alunos[$i]['nota2'] != null) {
                DB::table('avaliacoes')->
                where('aluno_id', $request->alunos[$i]['id'])->
                where('turma_id', $request->alunos[$i]['turma_id'])->
                update(
                    [
                        'nota2' => $request->alunos[$i]['nota2'],
                        'media' => $request->alunos[$i]['media']
                    ]
                );
            }

            if ($request->alunos[$i]['nota3'] != null) {
                DB::table('avaliacoes')->
                where('aluno_id', $request->alunos[$i]['id'])->
                where('turma_id', $request->alunos[$i]['turma_id'])->
                update(
                    [
                        'nota3' => $request->alunos[$i]['nota3'],
                        'media' => $request->alunos[$i]['media']
                    ]
                );
            }
        }

        \Session::flash('mensagem_sucesso', 'Notas Salvas!');

        return Redirect::to('turmas');
    }

    public function destroy($id)
    {
        $turma = Turma::findOrfail($id);

        $turma->delete();

        \Session::flash('mensagem_sucesso', 'Turma deletada com sucesso!');

        return Redirect::to('turmas');
    }
}
