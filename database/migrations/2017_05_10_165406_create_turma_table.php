<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function(Blueprint $table){
            $table->increments('id');

            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->
            references('id')->
            on('cursos');

            $table->string('codigo');
            $table->string('turno');
            $table->string('credito');
            $table->string('hr_aula');
            $table->string('ano');
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
        Schema::dropIfExists('turmas');
    }
}
