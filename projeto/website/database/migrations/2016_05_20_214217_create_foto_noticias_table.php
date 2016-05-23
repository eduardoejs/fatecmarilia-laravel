<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('arquivoHash', 60);
            $table->integer('tamanhoArquivo');
            $table->integer('noticia_id')->unsigned();
            $table->foreign('noticia_id')->references('id')->on('noticias');
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
        Schema::drop('foto_noticias');
    }
}
