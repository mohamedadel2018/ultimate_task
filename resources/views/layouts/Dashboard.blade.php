<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- title --}}
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  {{-- my css style --}}
  <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  {{-- for arabic direct --}}
  @if(app()->getLocale() == 'ar')
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
  @endif
  {{-- <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css"> --}}

    @yield('title')
</head>

<?php
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
//start Notification
if(Auth::check() == true){
 foreach (Auth::user()->unreadNotifications as $notification) {
            $time = $notification->created_at;
            $dt = Carbon::create($time->year,  $time->month, $time->day , $time->hour, $time->minute);
            $dt->toDateTimeString();
            $dt->diffInMinutes();

            if($dt->diffInMinutes() >=  7200){
            $notification->markAsRead();
            }
        }
//End Notification
        $notifications =  Auth::user()->unreadNotifications;
// dd($notifications);
}
?>
<body class="hold-transition sidebar-mini layout-fixed " >
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/structureCase')}}" class="nav-link">@lang('app.home')</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3"  action="{{ route('search.index') }}" method="GET">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="words" value="<?php if(isset($words)) echo $words   ?> " placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->

      @if(Auth::check() == true)
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{count($notifications)}}</span>
        </a>

        {{-- {{$notifications}} --}}
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> @lang('app.Notifications') {{count($notifications)}}</span>
          <div class="dropdown-divider"></div>
            @if(count($notifications) > 0)
            @foreach ($notifications as $notification)
                 @if($notification->type == "App\Notifications\ProjectsNotify")
                    <a href="{{$notification->data['link']}}" class="dropdown-item p-3 text-md" style="white-space: normal;">
                                <i class="far fa-address-card mr-1 "></i>
                                {{$notification->data['talk']}}  @lang('app.Code'): ( {{$notification->data['add_project']}} )
                                @lang('app.By'):  {{$notification->data['createBy']['first_name']}} {{$notification->data['createBy']['last_name']}}
                                <span class="float-right text-muted text-sm">
                                <i class="far fa-clock"></i> {{$notification->created_at->format('m/d H:i')}}</span>
                        </a>

                    @endif

                    @endforeach
                      {{-- <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item dropdown-footer" style="font-size:13px !important;"> @lang('app.Notification_limit'):</a> --}}
                    @else
                     <a href="#" class="dropdown-item p-3" >
                         @lang('app.Not_found_Notification')

                        </a>
               @endif

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer"> @lang('app.Notification_limit')</a>
        </div>
      </li>
        @endif
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-indigo elevation-4" >
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
        <h5>
        @if(Auth::check() == true)

           <a href="#" class="d-block">    <span style="color:blueviolet;">@lang('app.Welcome'), </span>{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</a>
       @endif

       <div class="custom-control custom-switch mt-2 mb-0  d-flex justify-content-center">
          <input type="checkbox" class="custom-control-input darkMode text-lg" id="customSwitch1">
          <label class="custom-control-label" for="customSwitch1"><i class="fas fa-adjust"></i></label>
        </div>





        </h5>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column  nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            <li class="nav-item mb-2">
            <a href="{{route('structureCase.index')}}" class="nav-link" style="background-color: #49489326;">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                  @lang('app.counts')
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>


    @if(Auth::check() == true)

               @if(Auth::user()->hasPermission('users_read'))


            <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="fas fa-users"></i>
              <p>
                @lang('app.Supervisors')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link active">
                  <i class="fas fa-user-cog"></i>
                  <p>@lang('app.Supervisors_registration')</p>
                </a>
              </li>

              @if(Auth::user()->hasPermission('users_create'))
              <li class="nav-item">
                <a href="{{route('users.create')}}" class="nav-link">
                  <i class="fas fa-user-plus"></i>
                  <p>@lang('app.add_Supervisors')</p>
                </a>
              </li>
              @endif
              @endif
            </ul>
          </li>

          @if(Auth::user()->hasPermission('project_read'))
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                    <i class="far fa-address-card"></i>
              <p>
                @lang('app.projects')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

                  @if(Auth::user()->hasPermission('project_read'))
              <li class="nav-item">
              <a href="{{route('projects.index')}}" class="nav-link ">
                    <i class="far fa-copy"></i>
                  <p>@lang('app.projects')</p>
                </a>
              </li>
              @endif

            </ul>
          </li>
          @endif



<hr>
         @endif

          <li class="nav-item">

              <p>
                 <a  href="{{ route('logout') }}" class="nav-link"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                             <i class="fas fa-sign-out-alt "></i>    @lang('Logout')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <div id="app">

      @yield('content')

    </div>
  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;  @Lang('app.All_rights_reserved')  <a href="https://mishkatnour.org/" target="_blank"> @Lang('app.mishkat_nour') </a>.</strong>

    <div class="float-right d-none d-sm-inline-block">

      <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a> |
      <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">العربية</a>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>


<script src="{{ asset('js/app.js') }}"></script>
  <!-- import Vue before Element -->
<script src="https://unpkg.com/vue/dist/vue.js"></script>



</body>
</html>
