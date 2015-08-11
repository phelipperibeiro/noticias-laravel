<?php

namespace app\controllers\admin;

class CategoriaController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $categorias = \app\models\admin\CategoriaModel::all();
        $data = ['categorias' => $categorias];
        return \View::make('admin.painel.categoria')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return \View::make('admin.painel.categoria_cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $rules = [
            'nome' => 'required|unique:tb_categorias,nome_categoria'
        ];

        $message = [
            'required' => '<span class="text-danger">O Campo :attribute é obrigatório</span>',
            'unique' => '<span class="text-danger">O nome :attribute já é existente</span>'
        ];

        $validator = \Validator::make(\Input::all(), $rules, $message);

        if ($validator->fails()) {
            return \Redirect::back()->withInput(\Input::all())->withErrors($validator->messages());
        } else {

            $attributes = [
                'nome_categoria' => \Input::get('nome')
            ];

            $cadastrado = \app\models\admin\CategoriaModel::create($attributes);

            if ($cadastrado) {
                return \Redirect::back()->with('mensagem', '<div class="text-success">Post cadastrado com sucesso</div>');
            } else {
                return \Redirect::back()->with('mensagem', '<div class="text-danger">Error ao Cadastrar Post</div>');
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
        $dadosCategoria = \app\models\admin\CategoriaModel::find($id);

        if (!$dadosCategoria) {
            \Session::flash('mensagem', '<span class="text-danger">Categoria nao encontrada</span>');
            return \Redirect::to('categoria');
        }
        return \View::make('admin.painel.categoria_editar')->with(['categoria' => $dadosCategoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules = [
            'nome' => 'required|unique:tb_categorias,nome_categoria',
        ];

        $message = [
            'required' => '<span class="text-danger">O Campo :attribute é obrigatório</span>',
            'unique' => '<span class="text-danger">O nome :attribute ja e existente</span>'
        ];

        $validator = \Validator::make(\Input::all(), $rules, $message);

        if ($validator->fails()) {
            return \Redirect::back()->withInput(\Input::all())->withErrors($validator->messages());
        } else {

            $attributes = [
                'nome_categoria' => \Input::get('nome')
            ];

            $atualizado = \app\models\admin\CategoriaModel::where('id', $id)->update($attributes);

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
        $delete = \app\models\admin\CategoriaModel::find($id);
        $delete->delete();
        return \Redirect::to('/lista/categoria');
    }

}
