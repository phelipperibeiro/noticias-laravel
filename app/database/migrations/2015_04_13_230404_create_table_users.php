<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_users', function($tabela) {
            $tabela->increments('id');
            $tabela->string('nome', 50);
            $tabela->string('username',50);
            $tabela->string('password',100);
            $tabela->integer('user_is_admin');
            $tabela->string('remember_token',100);
            $tabela->string('user_foto',100);
            $tabela->integer('user_is_autor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_users');
    }

}
