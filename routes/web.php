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

    Route::resource('alunos', 'AlunosController');

    Route::get('pdf/{aluno}', 'AlunosController@pdf');

    Route::post('alunos/busca', 'AlunosController@busca');

    Route::resource('cursos', 'CursosController');

    Route::resource('turmas', 'TurmasController');

    Route::post('turmas/salvarnotas', 'TurmasController@salvarnotas');

    Route::post('turmas/busca', 'TurmasController@busca');

    Route::resource('professores', 'ProfessoresController');

    Route::get('/errors', function () {
        abort(404);

    });

    Auth::routes();

    Route::get('/home', 'HomeController@index');
});