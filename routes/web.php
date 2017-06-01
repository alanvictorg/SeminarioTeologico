<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        if (Auth::guest()) {
            return view('auth/login');
        } else {
            return view('home');
        }
    });

    Route::get('alunos', 'AlunosController@index');
    Route::get('alunos/novo', 'AlunosController@novo');
    Route::get('alunos/{aluno}/editar', 'AlunosController@editar');
    Route::get('alunos/{aluno}/historico', 'AlunosController@historico');
    Route::post('alunos/salvar', 'AlunosController@salvar');
    Route::patch('alunos/{aluno}', 'AlunosController@atualizar');
    Route::delete('alunos/{aluno}', 'AlunosController@deletar');

    Route::get('disciplinas', 'DisciplinasController@index');
    Route::get('disciplinas/novo', 'DisciplinasController@novo');
    Route::get('disciplinas/{disciplina}/editar', 'DisciplinasController@editar');
    Route::post('disciplinas/salvar', 'DisciplinasController@salvar');
    Route::patch('disciplinas/{disciplina}', 'DisciplinasController@atualizar');
    Route::delete('disciplinas/{disciplina}', 'DisciplinasController@deletar');

    Route::get('cursos', 'CursosController@index');
    Route::get('cursos/novo', 'CursosController@novo');
    Route::get('cursos/{curso}/editar', 'CursosController@editar');
    Route::post('cursos/salvar', 'CursosController@salvar');
    Route::delete('cursos/{curso}', 'CursosController@deletar');

    Route::get('turmas', 'TurmasController@index');
    Route::get('turmas/novo', 'TurmasController@novo');
    Route::get('turmas/{turma}/visualizar', 'TurmasController@visualizar');
    Route::post('turmas/salvar', 'TurmasController@salvar');
    Route::post('turmas/salvarnotas', 'TurmasController@salvarnotas');
    Route::delete('turmas/{turma}', 'TurmasController@deletar');

    Route::get('/errors', function () {
        abort(404);
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index');
});