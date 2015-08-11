<?php

namespace app\controllers\admin;

class PasswordController extends \BaseController {

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        if (\Auth::user()->id != $id) {
            $msg = '<span class="text-danger">Voce nao pode alterar a senha de outro usuario</span>';
            return \Redirect::to('/lista/administrador')->with('mensagem', $msg);
        }
        return \View::make('admin.painel.user_password')->with(['idUser' => \Auth::user()->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules = [
            'atual' => 'required',
            'nova' => 'required|unique:tb_users,password',
            'novamente' => 'required'
        ];

        $message = [
            'required' => '<span class="text-danger">O Campo :attribute é obrigatório</span>',
            'email' => '<span class="text-danger">Digite um e-mail válido</span>',
            'unique' => '<span class="text-danger">O :attribute ja e existente</span>'
        ];

        $validator = \Validator::make(\Input::all(), $rules, $message);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator->message());
        } else {
            if (\Hash::check(\Input::get('atual'), \Auth::user()->password)) {

                $attributes = [
                    'password' => \Hash::make(\Input::get('nova'))
                ];

                $atualizado = \app\models\admin\UserModel::where('id', $id)->update($attributes);

                $msgSuccess = '<span class="text-success">Atualizado com sucesso</span>';
                $msgDanger = '<span class="text-danger">Erro ao tentar atualizar senha</span>';

                if ($atualizado) {
                    return \Redirect::back()->with('mensagem', $msgSuccess);
                } else {
                    return \Redirect::back()->with('mensagem', $msgDanger);
                }
            } else {
                $msg = '<span class="text-danger">A senha atual nao combina com a que foi informada</span>';
                return \Redirect::back()->withInput(\Input::all())->with('mensagem', $msg);
            }
        }
    }

}
