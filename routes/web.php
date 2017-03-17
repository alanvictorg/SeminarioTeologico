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



Route::group(['middleware' => 'web'], function (){
    Route::get('/', function () {
        return view('auth/login');
    });

    Route::get('alunos', 'AlunosController@index' );
    Route::get('alunos/novo', 'AlunosController@novo' );
    Route::get('alunos/{cliente}/editar', 'AlunosController@editar' );
    Route::post('alunos/salvar', 'AlunosController@salvar' );
    Route::patch('alunos/{aluno}', 'AlunosController@atualizar' );
    Route::delete('alunos/{aluno}', 'AlunosController@deletar' );

    Auth::routes();

    Route::get('/home', 'HomeController@index');
});