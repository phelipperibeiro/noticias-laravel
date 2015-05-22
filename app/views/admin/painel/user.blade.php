@extends('admin.painel.layout')




@section('conteudoPainel')
<div id="page-wrapper">
    <div class="row">
        @if(Session::has('mensagem'))
        {{Session::get('mensagem')}}
        @endif
        <h2>Lista do ADM</h2>
        <a href="{{URL::to('user/create')}}" class="btn btn-primary">Cadastrar Administrador</a>
        <br />
        <br />
        <table  width="100%" class="table table-striped" cellspacing="0" id="tabela-administradores">
            <thead style="background-color: #269abc;color: #afd9ee;font-size: 18px;">
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Alterar Dados</th>
                    <th class="text-center">Deletar Foto</th>
                    <th class="text-center">Alterar Senha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($administradores as $administrador)
                    @if( $administrador->id)
                    <tr class="">
                        <td class="text-center">{{$administrador->nome}}</td>
                        <td class="text-center">
                            @if(empty($administrador->user_foto))
                            <a href="/foto/create" class="btn btn-primary">Adicionar Foto</a>
                            @else
                            <a href="/foto/create"><img src="{{asset($administrador->user_foto)}}" width="40" heigh="20" ></a>    
                            @endif
                        </td>
                    
                        <td class="text-center">
                            <a href="/user/{{$administrador->id}}/edit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                        <td class="text-center">
                            <a data-id="{{$administrador->id}}" class="btn btn-danger btn-deletar-administrador"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                        <td class="text-center">
                            <a href="/password/{{$administrador->id}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span></a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-center">{{ $links }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop