<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComentarios extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_comentarios', function($tabela) {
            $tabela->increments('id');
            $tabela->string('nome', 50);
            $tabela->integer('post');
            $tabela->string('foto',100);
            $tabela->string('email',50);
            $tabela->timestamp('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_comentarios');
    }

}
