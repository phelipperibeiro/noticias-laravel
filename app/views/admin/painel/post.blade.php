@extends('admin.painel.layout')

@section('conteudoPainel')

<div id="page-wrapper">
    <div class="row">
        <h2>Posts Cadastrados({{count($posts)}})</h2>
        <a href="{{URL::to('post/create')}}" class="btn btn-primary">Cadastrar Post</a>
        <br />
        <br />
        <table  width="100%" class="table table-striped" cellspacing="0">
            <thead style="background-color: #269abc;color: #afd9ee;font-size: 18px;">
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Visitas</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->post_titulo }}</td>
                    <td>{{ $post->nome }}</td>
                    <td>{{ $post->nome_categoria }}</td>
                    <td>{{ $post->post_visitas }}</td>
                    <td> Alterar </td>
                    <td> Deletar </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6"class="text-center" >{{ $links }}</td>
                </tr>
                
            </tfoot>
        </table>
    
       
    </div>
</div>

@stop


