<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD | {{ Auth::user()->name }}</title>


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" type="text/css" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>

    <link rel="stylesheet" type="text/css" href={{
        url("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css") }}>

    <link rel="stylesheet" type="text/css" href={{
        asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href={{ asset('plugins/jqvmap/jqvmap.min.css') }}>


    <link rel="stylesheet" href={{ asset('dist/css/adminlte.min.css?v=3.2.0') }}>

    <link rel="stylesheet" type="text/css" href={{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>

    <link rel="stylesheet" src={{ asset('plugins/daterangepicker/daterangepicker.css') }}s>


    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <script nonce="46403448-f04d-44e7-b9f4-aebf38773f83">
        (function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                  
                </ul>

                <!-- Right navbar links -->
                <div class="dropdown ml-auto">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        logout
                    </button>
                    <div class="btn btn-secondary dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </div>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('utamadsn') }}" class="brand-link">
                    <img src="images/amik.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light" style="margin-right:20%">STMIK AMIKBANDUNG</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ \Auth::user()->image }}" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        </div>
                    </div>
                    <a href="{{ route('profiledsn') }}" class="nav-link">
                        <p>
                            <i class="nav-icon fas fa-user"></i>
                            <i class="nav-icon fas brand-text font-weight-light" style="margin-right:20%"> Profile Dosen</i>
                        </p>
                    <a href="{{ route('lihatmhs') }}" class="nav-link">
                        <p>
                            <i class="nav-icon fas fa-eye"></i>
                            <i class="nav-icon fas brand-text font-weight-light" style="margin-right:20%"> Lihat Mahasiswa</i>
                        </p>
                                @csrf
                            </a>
                            <!-- SidebarSearch Form -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="10000">
                <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom">
                </div>
                <div class="tab-content">
                    <main class="py-4">
                        @yield('isi')


                </div>
                </main>
            </div>
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- ./wrapper -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

        <!-- jQuery UI 1.11.4 -->

        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
    </body>

</html>