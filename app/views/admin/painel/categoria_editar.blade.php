@extends('admin.painel.layout')

@section('conteudoPainel')

<div id="page-wrapper">
    <div class="row">
        <h2>Editar Administrador</h2>
        @if(Session::has('mensagem'))
        {{Session::get('mensagem')}}
        @endif
        <br />

        {{Form::open(['role' => 'form', 'method' => 'PUT', 'route' => ['categoria.update', $categoria->id ]])}}
        
            {{Form::label('Nome')}}
            {{Form::text('nome',  $categoria->nome_categoria,['class' => 'form-control']) }} {{ $errors->first('nome') }}
            <br />
            
            <br />
            {{Form::submit('Editar', ['class' => 'btn btn-primary'])}}
                
        {{Form::close()}}
    </div>
</div>

@stop

