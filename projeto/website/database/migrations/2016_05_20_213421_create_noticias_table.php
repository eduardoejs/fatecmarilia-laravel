<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->longText('conteudo')->nullable();
            $table->text('textoDestaque')->nullable();
            $table->string('imagemDestaque', 60)->nullable(); //nome do arquivo de imagem de destaque
            $table->string('imagemMiniatura', 60)->nullable();
            $table->string('urlRedirecionamento')->nullable();
            $table->dateTime('dataPublicacao');
            $table->date('exibirAteData');
            $table->char('tipo', 1); //N -> noticia ou D -> destaque
            $table->boolean('status'); //ativo ou inativo
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
        Schema::drop('noticias');
    }
}
