@extends('admin.painel.layout')

@section('conteudoPainel')

<div id="page-wrapper">
    <div class="row">
        <h2>Cadastrar Novo Post</h2>
        @if(Session::has('mensagem'))
        {{Session::get('mensagem')}}
        @endif
        <br />

        {{Form::open(['role' => 'form', 'method' => 'POST', 'route' => 'post.store' ])}}
        
            {{Form::label('Titulo')}}
            {{Form::text('titulo', Input::old('titulo'),['class' => 'form-control']) }} {{ $errors->first('titulo') }}
            <br />
            {{Form::label('Tags')}}
            {{Form::text('tags', Input::old('tags'),['class' => 'form-control']) }} {{ $errors->first('tags') }}
            <br />
            {{Form::label('Categorias')}}
            {{Form::select('categorias', $categorias, Input::old('categorias'), ['class' => 'form-control']);}} {{ $errors->first('categorias') }}
            
            <br />
            {{Form::label('Slug')}}
            {{Form::text('slug', Input::old('slug'),['class' => 'form-control']) }} {{ $errors->first('slug') }}
            <br />
            {{Form::submit('Cadastrar', ['class' => 'btn btn-primary'])}}
                
        {{Form::close()}}
    </div>
</div>

@stop

