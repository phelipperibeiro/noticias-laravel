@extends('admin.painel.layout')




@section('conteudoPainel')
<div id="page-wrapper">
    <div class="row">
        @if(Session::has('mensagem'))
        {{Session::get('mensagem')}}
        @endif
        <h2>Listar Categoria</h2>
        <a href="{{URL::to('categoria/create')}}" class="btn btn-primary">Cadastrar Categoria</a>
        <br />
        <br />
        <table  width="100%" class="table table-striped" cellspacing="0" id="tabela-categoria">
            <thead style="background-color: #269abc;color: #afd9ee;font-size: 18px;">
                <tr>
                    <th class="text-center">Cod</th>
                    <th class="text-center">Nome Categoria</th>
                    <th class="text-center">Alterar Categoria</th>
                    <th class="text-center">Deletar Categoria</th>         
                </tr>
            </thead>
            <tbody>

                @foreach($categorias as $categoria)
                    <tr class="">
                        <td class="text-center">{{$categoria->id}}</td>
                        <td class="text-center">{{$categoria->nome_categoria}}</td>
                    
                        <td class="text-center">
                            <a href="/categoria/{{$categoria->id}}/edit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                        <td class="text-center">
                            {{Form::open(['method' => 'delete', 'route' => ['categoria.destroy', $categoria->id]])}}
                                <a>
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </a>
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop