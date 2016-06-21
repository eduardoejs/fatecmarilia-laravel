<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModalidadesIdInCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->integer('modalidade_id')->unsigned()->after('tipo_curso_id');
            $table->foreign('modalidade_id')->references('id')->on('modalidades');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {            
            $table->dropForeign('cursos_modalidade_id_foreign');
        });
    }
}
