<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_turma', function(Blueprint $table){
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->
            references('id')->
            on('alunos');

            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->
            references('id')->
            on('turmas');

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
        Schema::dropIfExists('aluno_turma');
    }
}
