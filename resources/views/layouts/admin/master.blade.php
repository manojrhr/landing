<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kiuki | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.cs') }}s">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kiu</b>ki</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{auth()->user()->unreadNotifications()->groupBy('notifiable_type')->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{auth()->user()->unreadNotifications()->groupBy('notifiable_type')->count()
}} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                @foreach (Auth::user()->unreadNotifications as $notification)
                  <li>
                    <a href="{{ $notification->data['link'] }}">
                      <i class="{{ $notification->data['icon'] }}"></i> {{ $notification->data['message'] }}
                    </a>
                  </li>
                @endforeach
                </ul>
              </li>
              <li class="footer"><a href="{{ route('admin.markAllasRead') }}">Mark all as read</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"> -->

                <p>
                  Admin
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="{{ route('admin.getUpdateEmailForm') }}">Change Email Address</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('admin.getChangePassword') }}" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <!-- <a  class="btn btn-default btn-flat" href="http://sms.ihmshimla.org/logout"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form> -->
                  <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ request()->is('admin') ? 'active' : '' }}" {{ request()->is('dashboard') ? 'active' : ''}}><a href="{{ route('admin.dashboard') }}"><i class="fa fa-book"></i><span>Dashboard</span></a></li>
        <li class=""><a href="{{ route('admin.category') }}" {{ request()->is('admin/category') ? 'active' : ''}}><i class="fa fa-list"></i><span>Category</span></a></li>
        <li class=""><a href="{{ route('admin.subcategory') }}"><i class="fa fa-list"></i><span>Subcategory</span></a></li>
        {{-- <li class=""><a href="{{ route('admin.tour') }}"><i class="fa fa-list"></i><span>Tours</span></a></li> --}}
        <li class="treeview">
          <a href="{{ route('admin.tour') }}">
            <i class="fa fa-plane"></i>
            <span>Tours</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.tour') }}"><i class="fa fa-plane"></i> Tours</a></li>
            <li><a href="{{ route('admin.location') }}"><i class="fa fa-circle-o"></i> Tour Locations</a></li>
            {{-- <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Tours Attributes</a></li> --}}
          </ul>
        </li>
        <li class="treeview">
          <a href="{{ route('admin.blog') }}">
            <i class="fa fa-comment"></i>
            <span>Blog Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.blog') }}"><i class="fa fa-comment"></i> Blog Posts</a></li>
            <li><a href="{{ route('admin.blogcategory') }}"><i class="fa fa-circle-o"></i> Blog Category</a></li>
            {{-- <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Tours Attributes</a></li> --}}
          </ul>
        </li>
        <li class=""><a href="{{ route('admin.bookings') }}"><i class="fa fa-globe "></i><span>Bookings</span></a></li>
        {{-- <li class=""><a href="{{ route('admin.blog') }}"><i class="fa fa-list"></i><span>Blog Post</span></a></li> --}}
        {{-- <li class="{{ request()->is('admin/users') ? 'active' : '' }}"><a href="{{ route('admin.users') }}"><i class="fa fa-user"></i><span>Customer</span></a></li> --}}
        <!-- <li><a href=""><i class="fa fa-ship"></i><span>Jet Ski</span></a></li>
        <li><a href=""><i class="fa fa-ship"></i><span>Bookings</span></a></li>
        <li><a href=""><i class="fa fa-list"></i><span>Makes</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
        <small>@yield('subtitle')</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">@yield('title')</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved. -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <!-- <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">

      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="{{ asset('assets/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" ></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
<!-- Alertify -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
@yield('scripts')
@include('includes.flash-message')
</body>
</html>
