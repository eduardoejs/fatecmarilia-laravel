<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tituloDestaque');
            $table->longText('conteudo');
            $table->string('imagemCapa', 60); //nome do arquivo de imagem
            $table->string('siglaIdentificadora'); //sigla que identifica a página para possivel passagem de parametro. Ex: instituicao, cursoalimentos, etx
            $table->boolean('exibirPagina');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('paginas');
    }
}
