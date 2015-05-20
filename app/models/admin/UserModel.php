<?php

namespace app\models\admin;

class UserModel extends \Eloquent {

    protected $table = 'tb_users';
    protected $guarded = [];
    public $timestamps = false;

}
