<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Avaliacoe;
use App\Curso;
use App\Professore;
use App\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TurmasController extends Controller
{
    private $turma;
    private $aluno;

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

    public function create()
    {
        $alunos = Aluno::get();
        $cursos = Curso::get();
        $professores = Professore::get();

        if (strlen($alunos) < 3 || strlen($cursos) < 3 || strlen($professores) < 3) {
            \Session::flash('mensagem_info', 'É necessário cadastrar alunos, cursos e professores para formar turma');

            return Redirect::to('turmas/');
        } else

            return view('turmas.formulario', ['cursos' => $cursos, 'alunos' => $alunos, 'professores' => $professores]);
    }

    public function show($id)
    {
        $turma = Turma::findOrfail($id);
        $avaliacoes = Avaliacoe::where('turma_id', $id)->orderBy('id')->get();
        return view('turmas.visualizar', ['turma' => $turma, 'avaliacoes' => $avaliacoes]); //, 'alunos' => $alunos
    }

    public function edit($id)
    {
        $turma = Turma::findOrfail($id);
        $cursos = Curso::get();
        $professores = Professore::get();
        $alunos = Aluno::get();
        return view('turmas.formulario', ['turma' => $turma, 'cursos' => $cursos, 'professores' => $professores, 'alunos' => $alunos]);
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
        $next_sequence = \DB::select("select nextval('turmas_id_seq')");
        $next_seq = intval($next_sequence['0']->nextval);

        $this->validate($request, [
            'codigo' => 'bail|required',
            'curso_id' => 'bail|required',
            'professor_id' => 'bail|required',
            'credito' => 'bail|required',
            'ano' => 'bail|required',
            'hr_aula' => 'bail|required'
        ]);

        DB::table('turmas')->insert(
            ['id' => $next_seq, 'curso_id' => $request->curso_id, 'professor_id' => $request->professor_id, 'codigo' => $request->codigo, 'turno' => $request->turno,
                'credito' => $request->credito, 'hr_aula' => $request->hr_aula, 'ano' => $request->ano,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()]
        );


        foreach ($request->alunos as $dados) {

            DB::table('aluno_turma')->insert(
                ['aluno_id' => $dados,
                    'turma_id' => $next_seq,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()]
            );

            DB::table('avaliacoes')->insert(
                ['aluno_id' => $dados,
                    'turma_id' => $next_seq,
                    'nota1' => 0,
                    'nota2' => 0,
                    'nota3' => 0,
                    'media' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
            );
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
