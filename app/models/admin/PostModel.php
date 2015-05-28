<?php

namespace app\models\admin;

class PostModel extends \Eloquent {

    protected $table = 'tb_posts';
    protected $guarded = [];
    public $timestamps = false;

}