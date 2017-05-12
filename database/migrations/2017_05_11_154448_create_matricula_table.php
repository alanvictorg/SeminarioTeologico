<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function(Blueprint $table){
            $table->increments('id');

            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->
            references('id')->
            on('alunos');

            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->
            references('id')->
            on('turmas');

            $table->string('codigo');
            $table->date('data_matricula');

            $table->date('created_at');
            $table->date('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
