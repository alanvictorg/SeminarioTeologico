<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected  $fillable = [
        'codigo',
        'curso_id',
        'turno'
    ];

    public function cursos()
    {
        return $this->belongsTo('App\Curso');
    }

    public function alunos()
    {
        return $this->belongsToMany('App\Turma', 'turma_aluno', 'aluno_id', 'turma_id');
    }
}
