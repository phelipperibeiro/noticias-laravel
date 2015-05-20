<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

/* login admin */
Route::resource('/admin', 'app\controllers\admin\LoginAdminController', ['only' => ['index']]);
Route::resource('/adminLogar', 'app\controllers\admin\LoginAdminController', ['only' => ['store']]);

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
