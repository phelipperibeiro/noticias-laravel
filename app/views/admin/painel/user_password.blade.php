@extends('admin.painel.layout')

@section('conteudoPainel')

<div id="page-wrapper">
    <div class="row">
        <h2>Cadastrar Administrador</h2>
        @if(Session::has('mensagem'))
        {{Session::get('mensagem')}}
        @endif
        <br />

        {{Form::open(['role' => 'form', 'method' => 'PUT', 'route' => ['password.update', $idUser ]])}}
        
            {{Form::label('Senha Atual')}}
            {{Form::password('atual', ['class' => 'form-control']) }} {{ $errors->first('atual') }}
            <br />
            {{Form::label('Nova Senha')}}
            {{Form::password('nova', ['class' => 'form-control']) }} {{ $errors->first('nova') }}
            <br />
            {{Form::label('Confirmar Senha')}}
            {{Form::password('novamente', ['class' => 'form-control']) }} {{ $errors->first('novamente') }}
            <br />
            {{Form::submit('Alterar', ['class' => 'btn btn-primary'])}}
                
        {{Form::close()}}
    </div>
</div>

@stop


