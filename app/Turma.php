<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected  $fillable = [
        'codigo',
        'curso_id',
        'turno',
        'credito',
        'ano',
        'hr_aula'
    ];

    public function cursos()
    {
        return $this->belongsTo('App\Curso', 'curso_id');
    }

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno');
    }

    public function avaliacoes()
    {
        return $this->hasManyThrough('App\Avaliacoe', 'App\Aluno', 'turma_id', 'aluno_id');
    }
}
