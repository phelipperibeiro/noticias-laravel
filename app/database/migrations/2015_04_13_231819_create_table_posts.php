<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_posts', function($tabela) {
            $tabela->increments('id');
            $tabela->string('post_titulo', 30);
            $tabela->integer('autor');
            $tabela->timestamp('data');
            $tabela->string('post_foto', 100);
            $tabela->text('post_tags');
            $tabela->integer('post_categoria');
            $tabela->string('post_slug', 30);
            $tabela->integer('post_visitas');
            $tabela->string('post_thumb', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_posts');
    }

}
