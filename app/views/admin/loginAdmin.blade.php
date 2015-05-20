<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Administrativo</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/admin/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    @if(Session::has('mensagem'))
                        <div class="panel-heading">
                        {{Session::get('mensagem')}}
                        </div>
                    @endif      
                    <div class="panel-heading">
                       
                        <h3 class="panel-title">Área Restrita, faça o login abaixo  </h3>
                    </div>
                    <div class="panel-body">
                    @include('partials/admin/login/formLoginAdmin')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/admin/jquery-1.10.2.js"></script>
    <script src="js/admin/bootstrap.min.js"></script>
    <script src="js/admin/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/admin/sb-admin.js"></script>

</body>

</html>
