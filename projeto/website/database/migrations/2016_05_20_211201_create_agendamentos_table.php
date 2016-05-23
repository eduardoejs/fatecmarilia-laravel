<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->integer('termo');
            $table->tinyInteger('aula1')->nullable();
            $table->tinyInteger('aula2')->nullable();
            $table->tinyInteger('aula3')->nullable();
            $table->tinyInteger('aula4')->nullable();
            $table->tinyInteger('aula5')->nullable();
            $table->time('horarioInicial')->nullable();
            $table->time('horarioFinal')->nullable();
            $table->string('comentarios')->nullable();

            //foreign key
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('agenda_id')->unsigned();
            $table->foreign('agenda_id')->references('id')->on('agendas');
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
        Schema::drop('agendamentos');
    }
}
