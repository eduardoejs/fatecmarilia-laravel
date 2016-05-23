<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginaDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagina_downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_id')->unsigned();
            $table->foreign('pagina_id')->references('id')->on('paginas');
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
        Schema::drop('pagina_downloads');
    }
}
