<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function turmas()
    {
        return $this->hasMany('App\Turma');
    }
}
