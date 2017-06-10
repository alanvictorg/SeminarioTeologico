<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professore extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'login',
    ];

    public function turmas()
    {
        return $this->hasMany('App\Turma', 'turma_id');
    }
}
