<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Aluno extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'filiacao',
        'matricula',
        'dt_nasc',
        'natural',
        'cpf',
        'rg',
        'org_exp',
        'est_civil',
        'escolaridade',
        'endereco',
        'local_trabalho',
        'data_conversao',
        'batismo',
        'membro',
        'batismo_espirito',
        'nome_igreja',
        'end_igreja',
        'nome_pastor',
        'tel_pastor',
        'chamado_ministerial',
        'comunhao_igreja',


    ];

    public function turmas()
    {
        return $this->belongsToMany('App\Entities\Turma', 'aluno_turmas', 'aluno_id', 'turma_id');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacoe::class);
    }


}
