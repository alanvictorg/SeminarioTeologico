<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorDisciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_disciplina', function (Blueprint $table){
            $table->integer('professor_id')->unsigned();
            $table->foreign('professor_id')->
                references('id')->
                on('professores');

            $table->integer('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->
                references('id')->
                on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_disciplina');
    }
}
