<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao', function (Blueprint $table){
            $table->increments('id');

            $table->integer('professor_id')->unsigned();
            $table->foreign('professor_id')->
                references('id')->
                on('professores');

            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->
                references('id')->
                on('alunos');

            $table->integer('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->
                references('id')->
                on('disciplinas');

            $table->decimal('nota');
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
        Schema::dropIfExists('avaliacao');
    }
}
