<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaEstagiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_estagios', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('descricao');
            $table->longText('conteudo');
            $table->dateTime('dataCadastro');
            $table->string('codigoVaga',10);
            $table->string('emailContato',150)->nullable();
            $table->boolean('exibeEmailContato')->nullable();
            $table->date('exibirAteData');
            
            //foreign key
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
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
        Schema::drop('empresa_estagios');
    }
}
