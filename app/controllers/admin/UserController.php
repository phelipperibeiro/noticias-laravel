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
            'email' => 'required|unique:tb_users,username|email',
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
  
        $dadosUser = \app\models\admin\UserModel::find($id);
        
        if(\Auth::user()->id != $id){
          \Session::flash('mensagem', '<span class="text-danger">acesso negado</span>');
          return \Redirect::to('lista/administrador');
        }
        return \View::make('admin.painel.user_editar')->with(['user' => $dadosUser]);   
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules = [
            'nome' => 'required',
            'email' => 'required|unique:tb_users,username|email',
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
                'username' => \Input::get('email')
            ];

            $atualizado = \app\models\admin\UserModel::where('id', $id)->update($attributes);

            $msgSuccess = '<span class="text-success">Atualizado com sucesso</span>';
            $msgDanger = '<span class="text-danger">Erro ao tentar atualizar os dados</span>';

            if ($atualizado) {
                return \Redirect::back()->with('mensagem', $msgSuccess);
            } else {
                return \Redirect::back()->with('mensagem', $msgDanger);
            }          
        }
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
