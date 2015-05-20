<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    //
});


App::after(function($request, $response)
{
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

//Route::filter('auth', function()
//{
//	if (Auth::guest())
//	{
//		if (Request::ajax())
//		{
//			return Response::make('Unauthorized', 401);
//		}
//		return Redirect::guest('login');
//	}
//});

Route::filter('authAdmin', function()
{
    if (Auth::guest())
    {
            if (Request::ajax())
            {
                    return Response::make('Unauthorized', 401);
            }
            return Redirect::guest('/admin');
    }
});


Route::filter('auth.basic', function()
{
    return Auth::basic();
});

/*verifica se o usuario e um admin*/
Route::filter('blockAcessNotAdmin', function()
{
    if(!isset(Auth::user()->user_is_admin) || Auth::user()->user_is_admin != 1){
        return Redirect::guest('/admin');
    }
});
/*verifica se o usuario e author se for bloqueia*/
Route::filter('blockAcessoAuthor', function()
{
    if(isset(Auth::user()->user_is_admin) && Auth::user()->user_is_admin == 1 && Auth::user()->user_is_autor == 1){
        return Redirect::guest('/painel');
    }
});
/*verifica se o usuario e author se nao for bloqueia*/
Route::filter('blockAcessoNotAuthor', function()
{
    if(isset(Auth::user()->user_is_admin) && Auth::user()->user_is_admin == 1 && Auth::user()->user_is_autor == 0){
        return Redirect::guest('/painel');
    }
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|   
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
