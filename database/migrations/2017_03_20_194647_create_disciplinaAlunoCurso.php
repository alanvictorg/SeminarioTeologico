<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinaAlunoCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinaAlunoCurso', function (Blueprint $table) {
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->
            references('id')->
            on('alunos');

            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->
            references('id')->
            on('cursos');

            $table->integer('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->
            references('id')->
            on('disciplinas');

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
        Schema::dropIfExists('disciplinaAlunoCurso');
    }
}
