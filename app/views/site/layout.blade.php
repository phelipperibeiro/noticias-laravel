<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $titulo }}</title>
         <!-- Core CSS - Include with every page -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <link href="{{ URL::asset('css/site/framework/addons/camera/css/camera.css" rel="stylesheet') }}" />


        <link href="{{ URL::asset('css/site/social-icons.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('css/site/style.css') }}" rel="stylesheet">

        <link href="{{ URL::asset('css/site/theme-color.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('css/site/responsive.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('css/site/firefox.css') }}" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <script src="framework/js/html5shiv.js"></script>
            <script src="framework/js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
<body>
    <!--<canvas id="snowfall"></canvas>-->

    <div class="header-background">
            @include('partials/site/header')
    </div>

    <!-- Main Container -->
    <div class="container main-site-container" itemscope itemtype="http://schema.org/CreativeWork">
        <div class="row">
            <div class="col-md-8">

                <!-- Opposite Posts Category -->
                <section class="cat-widget wdg-cat-opposite clearfix">
                    @yield('conteudo')
                </section>

            </div>

            <section class="col-md-4">
                 @include('partials/site/sidebar')
            </section>


        </div>
        <footer class="container footer-container">
            @include('partials/site/footer')
        </footer>


    </div>

    <div class="btn-goto-top border-radius-2px">
        <i class="icon-arrow-up7"></i>
    </div>

           Modal para fazer o login
       <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                <h4 class="modal-title" id="myModalLabel">Faça o Login baixo</h4>
              </div>
              <div class="modal-body">
                  
                <div id="status-login"></div>
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="btn-login-user" class="btn btn-primary">Logar</button>
              </div>
            </div>
          </div>
        </div>
    

    <!-- Body Scripts -->
    <script src="{{ URL::asset('js/site/jquery-1.10.2.js') }}"></script>
    <script src="{{ URL::asset('js/site/framework/js/modernizr.js') }}"></script>
    <script src="{{ URL::asset('js/site/framework/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/site/framework/js/jquery.easing.1.3.js') }} "></script>

    <script src="{{ URL::asset('js/site/framework/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Slider -->
    <script src="{{ URL::asset('js/site/framework/addons/camera/js/camera.min.js') }}"></script>

    <!-- OWL Carousel -->
    <script src="{{ URL::asset('js/site/framework/addons/owl/owl.carousel.min.js') }}"></script>

    <!-- Breaking News Ticker -->
    <script src="{{ URL::asset('js/site/framework/addons/breaking-news-ticker/jquery.ticker.js') }}"></script>

    <!-- Mobile Menu -->
    <script src="{{ URL::asset('js/site/framework/addons/mobile-menu/pushy.js') }}"></script>

    <!-- Show On Scroll -->
    <script src="{{ URL::asset('js/site/framework/addons/show-on-scroll/jquery.appear.js') }}"></script>

    <script src="{{ URL::asset('js/site/framework/js/serpentsoft-scripts.js') }}"></script>

    <script src="{{ URL::asset('js/site/slide.js') }}"></script>
    <script src="{{ URL::asset('js/site/login.js') }}"></script>


    </body>
</html>