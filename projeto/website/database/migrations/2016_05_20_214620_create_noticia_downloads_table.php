<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia_downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('noticia_id')->unsigned();
            $table->foreign('noticia_id')->references('id')->on('noticias');
            $table->integer('download_id')->unsigned();
            $table->foreign('download_id')->references('id')->on('downloads');
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
        Schema::drop('noticia_downloads');
    }
}
