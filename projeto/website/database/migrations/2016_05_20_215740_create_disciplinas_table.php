<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('cargaHoraria');
            $table->integer('semestre');
            $table->string('codigoDoSiga',10);

            //foreig key
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->integer('grade_disciplina_id')->unsigned();
            $table->foreign('grade_disciplina_id')->references('id')->on('grade_disciplinas');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('disciplinas');
    }
}
