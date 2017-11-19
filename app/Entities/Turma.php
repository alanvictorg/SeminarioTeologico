<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Turma extends Model implements Transformable
{
    use TransformableTrait;

    protected  $fillable = [
        'codigo',
        'curso_id',
        'professor_id',
        'turno',
        'credito',
        'ano',
        'hr_aula'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professore::class);
    }

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class);
    }

    public function avaliacoes()
    {
        return $this->hasManyThrough('App\Entities\Avaliacoe', 'App\Entities\Aluno', 'turma_id', 'aluno_id');
    }

}
