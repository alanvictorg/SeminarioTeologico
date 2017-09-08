<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Avaliacoe extends Model implements Transformable
{
    use TransformableTrait;

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
        return $this->belongsTo(Aluno::class);
    }

    public function turmas()
    {
        return $this->belongsTo(Turma::class);
    }

}
