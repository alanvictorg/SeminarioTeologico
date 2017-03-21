<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'curso_id',
        'nome',
        'filiacao',
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
        'curso'
        

    ];
}
