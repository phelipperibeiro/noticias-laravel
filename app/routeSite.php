<?php

Route::resource('/', 'app\controller\site\homeController',['only' => ['index']]);