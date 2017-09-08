<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Professore extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'email',
        'login',
    ];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }

}
