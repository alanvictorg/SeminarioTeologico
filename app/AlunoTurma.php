<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoTurma extends Model
{
    protected  $fillable = [
        'aluno_id',
        'turma_id',
        'created_at',
        'updated_at'
    ];

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno');
    }

}
