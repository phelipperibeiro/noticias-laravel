@extends('admin.painel.layout')

@section('conteudoPainel')

<div id="page-wrapper">
    <div class="row">
        <h2>Editar Post</h2>
        @if(Session::has('mensagem'))
        {{Session::get('mensagem')}}
        @endif
        <br />

        {{Form::open(['role' => 'form', 'method' => 'PUT', 'route' => ['post.update', $post->id ]])}}
         
            {{Form::label('Titulo')}}
            {{Form::text('titulo', $post->post_titulo,['class' => 'form-control']) }} {{ $errors->first('titulo') }}
            <br />
            {{Form::label('Tags')}}
            {{Form::text('tags', $post->post_tags,['class' => 'form-control']) }} {{ $errors->first('tags') }}
            <br />
            {{Form::label('Categorias')}}
            {{Form::select('categorias', $categorias, $post->post_categoria, ['class' => 'form-control']);}} {{ $errors->first('categorias') }}
            <br />
            {{Form::label('Slug')}}
            {{Form::text('slug', $post->post_slug,['class' => 'form-control']) }} {{ $errors->first('slug') }}
            <br />         
            {{Form::label('Post')}}
            {{Form::textarea('post', $post->post_texto,['class' => 'form-control']) }} {{ $errors->first('post') }}
            <br />
            {{Form::submit('Editar', ['class' => 'btn btn-primary'])}}
                
        {{Form::close()}}
    </div>
</div>

@stop

