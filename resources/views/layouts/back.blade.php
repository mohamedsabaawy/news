<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="icon" href="{{asset('plugins/eg.svg')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @trixassets
{{--    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">الرئسية</a>
            </li>
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="#" class="nav-link">Contact</a>--}}
            {{--            </li>--}}
        </ul>

        <!-- SEARCH FORM -->
    {{--        <form class="form-inline ml-3">--}}
    {{--            <div class="input-group input-group-sm">--}}
    {{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
    {{--                <div class="input-group-append">--}}
    {{--                    <button class="btn btn-navbar" type="submit">--}}
    {{--                        <i class="fas fa-search"></i>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}

    <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">

            </li>
            <!-- Notifications Dropdown Menu -->
            {{--            <li class="nav-item dropdown">--}}
            {{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
            {{--                    <i class="far fa-bell"></i>--}}
            {{--                    <span class="badge badge-warning navbar-badge">3</span>--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item">--}}
            {{--                        <i class="fas fa-file mr-2"></i> 3 new reports--}}
            {{--                        <span class="float-right text-muted text-sm">2 days</span>--}}
            {{--                    </a>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
            {{--                </div>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
            {{--                    <i class="fas fa-th-large"></i>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="{{asset('dist/img/AdminLTELogo.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Al-Akhbarya</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
                <ul class="navbar-nav mr-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="caret">{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-group-vertical">{{__('Logout')}}</button>
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                {{--                end user--}}
            </div>
        </div>
        @auth()

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('category show')
                    <li class="nav-item">
                        <a href="{{url(route('category.index'))}}" class="nav-link">
                            <i class="nav-icon fas fa-city"></i>
                            <p>الاقسام</p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{url(route('post.index'))}}" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>المقالات</p>
                    </a>
                </li>
                @can('user show')
                    <li class="nav-item">
                        <a href="{{url(route('user.index'))}}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>مستخدمين</p>
                        </a>
                    </li>
                @endcan
                @can('role show')
                    <li class="nav-item">
                        <a href="{{url(route('role.index'))}}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>الصلاحيات</p>
                        </a>
                    </li>
                @endcan

            </ul>
    @endauth
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 text-right">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        {{--                        <ol class="breadcrumb float-sm-right">--}}
                        {{--                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
                        {{--                            <li class="breadcrumb-item active">@yield('page')</li>--}}
                        {{--                        </ol>--}}
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('tiny/tinymce.min.js')}}"></script>
@yield('script')
</body>
</html>
