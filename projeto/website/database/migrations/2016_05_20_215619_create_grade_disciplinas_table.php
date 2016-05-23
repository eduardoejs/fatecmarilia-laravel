<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoDoSiga', 45);
            $table->string('descricao', 150);

            //foreig key
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->integer('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grade_disciplinas');
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
        Schema::drop('grade_disciplinas');
    }
}
