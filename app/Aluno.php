<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
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
        return $this->belongsToMany('App\Turma', 'aluno_turma', 'aluno_id', 'turma_id');
    }

    public function avaliacoes()
    {
        return $this->hasMany('App\Avaliacoe');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($aluno) { // before delete() method call this
            $aluno->avaliacoes()->delete();
            $aluno->turmas()->delete();

            // do the rest of the cleanup...
        });
    }
}
