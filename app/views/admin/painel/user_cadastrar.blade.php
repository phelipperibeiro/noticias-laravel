@extends('admin.painel.layout')

@section('conteudoPainel')

<div id="page-wrapper">
    <div class="row">
        <h2>Cadastrar Administrador</h2>
        @if(Session::has('mensagem'))
        {{Session::get('mensagem')}}
        @endif
        <br />

        {{Form::open(['role' => 'form', 'method' => 'POST', 'route' => 'user.store' ])}}
        
            {{Form::label('Nome')}}
            {{Form::text('nome', Input::old('nome'),['class' => 'form-control']) }} {{ $errors->first('nome') }}
            <br />
            {{Form::label('E-mail')}}
            {{Form::text('email', Input::old('email'),['class' => 'form-control']) }} {{ $errors->first('email') }}
            <br />
            {{Form::label('Senha')}}
            {{Form::password('senha',['class' => 'form-control']) }} {{ $errors->first('senha') }}
            <br />
            {{Form::submit('Cadastrar', ['class' => 'btn btn-primary'])}}
                
        {{Form::close()}}
    </div>
</div>

@stop

