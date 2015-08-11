<?php

/* login admin */
Route::resource('/admin', 'app\controllers\admin\LoginAdminController', ['only' => ['index']]);
Route::resource('/adminLogar', 'app\controllers\admin\LoginAdminController', ['only' => ['store']]);

Route::resource('/lista/post', 'app\controllers\admin\PostController');
Route::resource('/post', 'app\controllers\admin\PostController');

Route::group(['before' => 'blockAcessNotAdmin'], function() {

    Route::group(['before' => 'blockAcessoAuthor'], function() {
        
        /* listar usuarios */
        Route::resource('/lista/administrador', 'app\controllers\admin\UserController');
        /* mostra formulario para cadastrar a foto */
        Route::resource('/foto', 'app\controllers\admin\UserFotoController', ['only' => ['create', 'store']]);
        /* crud usuarios */
        Route::resource('/user', 'app\controllers\admin\UserController');
        /* altera os password do usuario */
        Route::resource('/password', 'app\controllers\admin\PasswordController');
        
        Route::resource('/lista/categoria', 'app\controllers\admin\CategoriaController');
        Route::resource('/categoria', 'app\controllers\admin\CategoriaController');
    });
    /* painel */
    Route::resource('/painel', 'app\controllers\admin\PainelController');
    /* logout do sistema */
    //Route::resource('/logoutAdmin', 'app\controllers\admin\LoginAdminController', ['only' => ['index', 'destroy']]);
    Route::get('/logoutAdmin', function() {
        Auth::logout();
        return Redirect::to('/admin');
    });
});
