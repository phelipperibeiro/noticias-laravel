<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--    <meta name="csrf-token" content="{{ csrf_token() }}" />-->

        <title>Painel Administrativo</title>

        <!-- Core CSS - Include with every page -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="{{ URL::asset('css/admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

        <link href="{{ URL::asset('css/admin/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">

        <!-- SB Admin CSS - Include with every page -->
        <link href="{{ URL::asset('css/admin/sb-admin.css') }}" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>

    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Painel Administrativo curso de Laravel
                    - Você está logado como <span style="color:#900;">{{ Auth::user()->nome }}</span>
                    </span></b></a>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                @if(empty(Auth::user()->user_foto))
                <a href="/foto/create">Adicione uma foto</a> 
                @else   
                <img src="{{ asset(Auth::user()->user_foto) }}" width="40" height="30">
                @endif
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/logoutAdmin">
                                <i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="/painel">Início</a></li>
                        <li><a href="/lista/administrador">Administrador</a></li>
                        <li>
                            <a href="#">Cadastrar/Alterar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="/lista/post">Post</a></li>
                                <li><a href="/lista/categoria">Categoria</a></li>
                                <li><a href="/lista/autor">Autor</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="wrapper">
            @yield('conteudoPainel')
        </div>
        <!-- /#wrapper -->

        <!-- Core Scripts - Include with every page -->
        <script src="{{ URL::asset('js/admin/jquery-1.10.2.js') }}"></script>
        <script src="{{ URL::asset('js/admin/user.js') }}"></script>
        <script src="{{ URL::asset('tinymce/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ URL::asset('js/admin/tinymce.js') }}"></script>
        <script src="{{ URL::asset('js/admin/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/admin/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

        <!-- SB Admin Scripts - Include with every page -->
        <script src="{{ URL::asset('js/admin/sb-admin.js') }}"></script>

    </body>

</html>










































