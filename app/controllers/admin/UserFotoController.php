<?php

namespace app\controllers\admin;

use Intervention\Image\ImageManagerStatic as Image;

class UserFotoController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $data = ['dadosAdministrador' => \app\models\admin\UserModel::find(\Auth::user()->id)];

        return \View::make('admin.painel.user_foto')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $file = \Input::file('foto');

        $rule = ['foto' => 'required|image'];

        $messages = ['required' => '<span class="text-danger">O campo :attribute é obrigatório</span>'];

        $validator = \Validator::make(\Input::all(), $rule, $messages);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator->messages());
        } else {
            
            $extensoesAceitas = ['jpeg', 'jpg', 'png'];

            if (!in_array($file->getClientOriginalExtension(), $extensoesAceitas)) {
                return \Redirect::back()->with(['mensagem' => '<span class="text-danger">Extensao nao aceita</span>']);
            } else {
                /* pegando imagem files */
                $image = Image::make($file)->resize(300, 300);

                /* renomear foto */
                $nomeArquivo = 'foto_user_' . md5(uniqid()) . '.' . $file->getClientOriginalExtension();

                /* pegando dados do usuario logado */
                $dadosAdministrador = \app\models\admin\UserModel::find(\Auth::user()->id);
                              
                @unlink(base_path('public/' . $dadosAdministrador->user_foto));
                /* salva a foto na pagina */
                $image->save('upload/user/' . $nomeArquivo);

                /* salvando dados no banco */
                $dadosUpdate = ['user_foto' => 'upload/user/' . $nomeArquivo];
                $atualizado = \app\models\admin\UserModel::where('id', $dadosAdministrador->id)->update($dadosUpdate);

                if ($atualizado) {
                    return \Redirect::back()->with(['mensagem' => '<span class="text-success">Foto alterada com sucesso</span>']);
                } else {
                    return \Redirect::back()->with(['mensagem' => '<span class="text-danger">Erro ao tentar alterar a foto</span>']);
                }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        return

                'update foto';
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

        //
    }

}
