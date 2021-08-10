<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Админ-панель - @yield('title')</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   {{-- <link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css"> --}}
   <!-- Theme style -->
   <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__shake" src="admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>


      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="index3.html" class="brand-link">
            <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
            <span class="brand-text font-weight-light">Админ-панель</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
               </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                     <a href="{{ route('homeAdmin') }}" class=" nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                           Главная

                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class=" nav-link">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>
                           Места
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="#" class="nav-link {{ (request()->is('admin_panel/allplace')) ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Все места</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="nav-link {{ (request()->is('admin_panel/adplace')) ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Добавить место</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>
                           Категории
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="#" class="nav-link {{ (request()->is('admin_panel/allplace')) ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Все категории</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="nav-link {{ (request()->is('admin_panel/adplace')) ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Добавить категорию</p>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </nav>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         @yield('content')
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
         <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
         All rights reserved.
         <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
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
   <script src="admin/plugins/jquery/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- ChartJS -->
   {{-- <script src="admin/plugins/chart.js/Chart.min.js"></script> --}}
   <!-- Sparkline -->
   <script src="admin/plugins/sparklines/sparkline.js"></script>
   <!-- JQVMap -->
   {{-- <script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script> --}}
   {{-- <script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
   <!-- jQuery Knob Chart -->
   {{-- <script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script> --}}
   <!-- daterangepicker -->
   <script src="admin/plugins/moment/moment.min.js"></script>
   <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
   <!-- Summernote -->
   <script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="admin/dist/js/adminlte.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="admin/dist/js/demo.js"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="admin/dist/js/pages/dashboard.js"></script>
   <!-- Подсветка меню и прочее -->
   <script src="admin/admin.js"></script>
</body>

</html>