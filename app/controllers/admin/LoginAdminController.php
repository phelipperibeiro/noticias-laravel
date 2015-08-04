<?php

namespace app\controllers\admin;

class LoginAdminController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return \View::make('admin.loginAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $message = [
            'required' => '<span class="text-danger">O Campo :attribute é obrigatório</span>',
            'email' => '<span class="text-danger">Digite um e-mail válido</span>'
        ];
        $validator = \Validator::make(\Input::all(), $rules, $message);


        if ($validator->fails()) {
            return \Redirect::to('/admin')->withErrors($validator->messages())->withInput(\Input::except(['password']));
        } else {
            $credentials = [
                'username' => \Input::get('email'),
                'password' => \Input::get('password')
            ];

            if (\Auth::attempt($credentials, true)) {
                return \Redirect::to('/painel');
            } else {
                return \Redirect::to('/admin')->with('mensagem', '<span class="text-danger">Ocorreu um erro ao logar, tente novamente</span>')->withInput(\Input::except(['password']));;
            }
        }
    }
    
    public function destroy($param){
        \Auth::logout();
        return \Redirect::to('/admin');
    }
    //Session::flash('mensagem', 'cliente ja existe');
    //return Redirect::to('/')->withInput(Input::except(['nome']));

}















