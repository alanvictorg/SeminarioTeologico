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
        Schema::create('avaliacoes', function (Blueprint $table){
            $table->increments('id');

            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->
                references('id')->
                on('alunos');

            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->
                references('id')->
                on('turmas');

            $table->decimal('nota1')->nullable();
            $table->decimal('nota2')->nullable();
            $table->decimal('nota3')->nullable();
            $table->decimal('media')->nullable();
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
        Schema::dropIfExists('avaliacoes');
    }
}
