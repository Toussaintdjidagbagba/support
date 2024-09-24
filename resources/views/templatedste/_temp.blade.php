<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{config('app.name')}}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/png" sizes="16x16" href="logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="cssdste/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="cssdste/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="cssdste/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="cssdste/css/style.css" rel="stylesheet">

    <link href="cssdste/css/themes/all-themes.css" rel="stylesheet" />

    @yield('css')

</head>

<body class="theme-deep-blue" >
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Patienté...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="">{{config('app.name')}}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    
                    
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info"  style="background-image : url('fondprofil.png'); background-repeat: no-repeat; background-size: cover; -webkit-background-size: cover;
            -moz-background-size: cover; -o-background-size: cover;">
                <div class="image">
                    @if(session('utilisateur')->image != "")
                        <img src="{{ asset('images/' . session('utilisateur')->image) }}" alt="Image de profil" width="58" height="58" style="border-radius: 50%">
                    @else
                        <img src="cssdste/images/user.png" width="48" height="48" alt="User" />
                    @endif
                </div>
                <div class="info-container">
                    <div style="color:#001e60" class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('utilisateur')->nom }} {{ session('utilisateur')->prenom }}</div>
                    <div style="color:#001e60" class="email">{{ session('utilisateur')->mail }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i style="color:#001e60" class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}"><i class="material-icons">input</i>Déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    @php($p=0)
                    @php($pr=0)
                    @if(count(session('auto_menu')) != 0)
                    @for($i=0; $i < count(session('auto_menu')); $i++) 
                        @php( $libelle = App\Providers\InterfaceServiceProvider::infomenu(session('auto_menu')[$i]) )
                        @php( $chv = App\Providers\InterfaceServiceProvider::verifie_ss(session('auto_menu')[$i]) )
                        

                        @if($libelle->element_menu == 500)
                            @if($p == 0)
                                <li class="header">Principal</li>
                                @php($p=1)
                            @endif
                            <li>
                                @if($libelle->route != "#")
                                    <a href="{{route($libelle->route)}}"><i class="large material-icons" style="color:#001e60">home</i><span>{{$libelle->libelleMenu}}</span></a>
                               @endif
                            </li>
                        
                        @endif

                        
                    @endfor
                    @for($i=0; $i < count(session('auto_menu')); $i++) 
                        @php( $libelle = App\Providers\InterfaceServiceProvider::infomenu(session('auto_menu')[$i]) )
                        @php( $chv = App\Providers\InterfaceServiceProvider::verifie_ss(session('auto_menu')[$i]) )
                        

                        @if($libelle->element_menu == 600)
                           
                            @if($pr == 0)
                                <li class="header">Paramètres</li>
                                @php($pr=1)
                            @endif
                            <li>
                                @if($libelle->route != "#")
                                    <a href="{{route($libelle->route)}}"><i class="large material-icons" style="color:#001e60">insert_chart</i><span>{{$libelle->libelleMenu}}</span></a>
                               @endif
                            </li>
                        @endif

                        
                    @endfor
                    @endif
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; {{strtoupper(strftime('%B %Y'))}} <a href="javascript:void(0);">{{config('app.name')}}</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.2
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

        
    </section>

    <section class="content" >
        @yield('content')
    </section>

    @yield("model")
        

    @yield('js')

    <!-- Jquery Core Js -->
    <script src="cssdste/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="cssdste/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="cssdste/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="cssdste/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="cssdste/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="cssdste/js/admin.js"></script>

    <script src="cssdste/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="cssdste/js/demo.js"></script>
</body>

</html>
