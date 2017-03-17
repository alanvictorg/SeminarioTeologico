<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('filiacao');
            $table->string('dt_nasc');
            $table->string('natural');
            $table->string('cpf');
            $table->string('rg');
            $table->string('org_exp');
            $table->string('est_civil');
            $table->string('escolaridade');
            $table->string('endereco');
            $table->string('local_trabalho');
            $table->string('data_conversao');
            $table->string('batismo');
            $table->string('membro');
            $table->string('batismo_espirito');
            $table->string('nome_igreja');
            $table->string('end_igreja');
            $table->string('nome_pastor');
            $table->string('tel_pastor');
            $table->string('chamado_ministerial');
            $table->string('comunhao_igreja');
            $table->string('curso');
            $table->date('updated_at');
            $table->date('created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
