@extends('admin.painel.layout')

@section('conteudoPainel')

<div id="page-wrapper">
    <div class="row">
        <h2>Editar Administrador</h2>
        @if(Session::has('mensagem'))
        {{Session::get('mensagem')}}
        @endif
        <br />

        {{Form::open(['role' => 'form', 'method' => 'PUT', 'route' => ['user.update', $user->id ]])}}
        
            {{Form::label('Nome')}}
            {{Form::text('nome',  $user->nome,['class' => 'form-control']) }} {{ $errors->first('nome') }}
            <br />
            {{Form::label('E-mail')}}
            {{Form::text('email', $user->username,['class' => 'form-control']) }} {{ $errors->first('email') }}
            <br />
            <br />
            {{Form::submit('Editar', ['class' => 'btn btn-primary'])}}
                
        {{Form::close()}}
    </div>
</div>

@stop

