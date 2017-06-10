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
        $turmas = Turma::get(); // $this->curso->turmas; //
        return view('turmas.lista', ['turmas' => $turmas]);
    }

    public function novo()
    {
        $alunos = Aluno::get();
        $cursos = Curso::get();
        $professores = Professore::get();
        return view('turmas.formulario', ['cursos' => $cursos, 'alunos' => $alunos, 'professores' => $professores]);
    }

    public function visualizar($id)
    {
        $turma = Turma::findOrfail($id);
        $avaliacoes = Avaliacoe::where('turma_id', $id)->orderBy('id')->get();
        return view('turmas.visualizar', ['turma' => $turma, 'avaliacoes' => $avaliacoes]); //, 'alunos' => $alunos
    }

    public function salvar(Request $request)
    {
        $next_sequence = \DB::select("select nextval('turmas_id_seq')");
        $next_seq = intval($next_sequence['0']->nextval);

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

        return Redirect::to('turmas/novo');
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

    public function deletar($id)
    {
        $turma = Turma::findOrfail($id);

        $turma->delete();

        \Session::flash('mensagem_sucesso', 'Turma deletada com sucesso!');

        return Redirect::to('turmas');
    }
}
