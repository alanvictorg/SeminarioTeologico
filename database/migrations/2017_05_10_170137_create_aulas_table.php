<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table){
            $table->increments('id');

            $table->integer('professor_id')->unsigned();
            $table->foreign('professor_id')->
            references('id')->
            on('professores');

            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->
            references('id')->
            on('turmas');

            $table->integer('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->
            references('id')->
            on('disciplinas');

            $table->time('inicio');
            $table->time('termino');
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
        Schema::dropIfExists('aulas');
    }
}
