<?php

namespace app\controllers\admin;

class PostController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $idUser = \Auth::user()->id;

        /*query*/
        /*
           select * from tb_posts  p 
           inner join tb_users u on (p.autor = u.id)
           inner join tb_categorias c on (p.post_categoria = c.id)         
        */
        $posts = \app\models\admin\PostModel::select('*', 'tb_posts.id as idPost')
                ->join('tb_users', 'tb_posts.autor', '=', 'tb_users.id')
                ->join('tb_categorias', 'tb_posts.post_categoria', '=', 'tb_categorias.id')
                ->groupBy('tb_posts.id')
                ->paginate(10);
        
        
        $postsUser = \app\models\admin\PostModel::where('autor',$idUser)->get();
        
        //dd($posts->getCollection());
 
        $data = [
            'posts' => $posts->getCollection(),
            'links' => $posts->links(),
            'idUser' => $idUser,
            'postsUser' => $postsUser,
        ];
        
        return \View::make('admin.painel.post')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
       
        $categorias = \app\models\admin\CategoriaModel::all()->lists('nome_categoria', 'id');
        
        $data = ['categorias' => $categorias];
        return \View::make('admin.painel.post_cadastrar')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $rules = [
            'titulo'    => 'required|unique:tb_posts,post_titulo',
            'tags'      => 'required',
            'categorias' => 'required',
            'slug'      => 'required',
        ];

        $message = [
            'required' => '<span class="text-danger">O Campo :attribute é obrigatório</span>',
            'unique' => '<span class="text-danger">O :attribute ja e existente</span>'
        ];
        
        $validator = \Validator::make(\Input::all(), $rules, $message);
        
        if ($validator->fails()) {
            return \Redirect::back()->withInput(\Input::all())->withErrors($validator->messages());  
        } else {
            
            $attributes = [
                'post_titulo' => \Input::get('titulo'),
                'post_tags' => \Input::get('tags'),
                'post_categoria' => \Input::get('categorias'),
                'post_slug' => \Input::get('slug'),
                'autor' => \Auth::user()->id
            ];

            $cadastrado = \app\models\admin\PostModel::create($attributes);

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
        
        $delete = \app\models\admin\PostModel::find($id);
        $delete->delete();
        return \Redirect::to('/lista/post');
    }

}
