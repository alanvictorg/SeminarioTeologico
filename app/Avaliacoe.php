<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacoe extends Model
{
    protected $fillable = [
        'aluno_id',
        'turma_id',
        'nota1',
        'nota2',
        'nota3',
        'media',
    ];

    public function alunos()
    {
        return $this->belongsTo('App\Aluno', 'aluno_id');
    }

    public function turmas()
    {
        return $this->belongsTo('App\Turma', 'turma_id');
    }
}
