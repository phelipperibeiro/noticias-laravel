<?php

namespace app\controllers\admin;

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $dadosAdministradores = \app\models\admin\UserModel::where('user_is_admin', '=', 1)->where('user_is_autor', '!=', 1)->paginate(7);

        $data = [
            'administradores' => $dadosAdministradores->getCollection(),
            'links' => $dadosAdministradores->links(),
            'idUser' => \Auth::user()->id
        ];

        return \View::make('admin.painel.user')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return \View::make('admin.painel.user_cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $rules = [
            'nome' => 'required|unique:tb_users,nome',
            'email' => 'required|unique:tb_users,username',
            'senha' => 'required'
        ];

        $message = [
            'required' => '<span class="text-danger">O Campo :attribute é obrigatório</span>',
            'email' => '<span class="text-danger">Digite um e-mail válido</span>',
            'unique' => '<span class="text-danger">O :attribute ja e existente</span>'
        ];

        $validator = \Validator::make(\Input::all(), $rules, $message);

        if ($validator->fails()) {
            return \Redirect::back()->withInput(\Input::all())->withErrors($validator->messages());
        } else {
            $attributes = [
                'nome' => \Input::get('nome'),
                'username' => \Input::get('email'),
                'password' => \Hash::make(\Input::get('senha')),
                'user_is_admin' => 1,
                'user_is_autor' => 0
            ];

            $cadastrado = \app\models\admin\UserModel::create($attributes);

            if ($cadastrado) {
                return \Redirect::back()->with('mensagem', '<div class="text-success">Cadastrado com sucesso</div>');
            } else {
                return \Redirect::back()->with('mensagem', '<div class="text-danger">Error ao Cadastrar</div>');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
            //echo 'dsdvsdvsdvsdvsdvdvsvsd_____'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {

        if (\Request::ajax()) {
            $administrador = \app\models\admin\UserModel::find($id);
            $administrador->delete();
            return 'deletado';
        } else {
            return 'erro';
        }
    }

}
