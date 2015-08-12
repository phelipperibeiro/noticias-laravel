<?php

Route::resource('/', 'app\controllers\site\HomeController',['only' => ['index']]);
