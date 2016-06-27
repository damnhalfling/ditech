<!DOCTYPE html>
<!--[if IE 8]> 
  <html lang="br" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
  <html lang="br">
<!--<![endif]-->

  <head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} Admin | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="/assets/admin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/admin/css/animate.min.css" rel="stylesheet" />
    <link href="/assets/admin/css/style.min.css" rel="stylesheet" />
    <link href="/assets/admin/css/style-responsive.min.css" rel="stylesheet" />
    <link href="/assets/admin/css/theme/default.css" rel="stylesheet" id="theme" />
       <!-- ================== END BASE CSS STYLE ================== -->

        <style> 
        .modal-backdrop{
                display:none;
        }
        </style>

    @yield('style')
   
    <link href="/assets/admin/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" media='print' />
    <link href="/assets/admin/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
 
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/admin/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
  </head>

  @if(!Auth::check())
    <body class="pace-top bg-white">
  @else
    <body>
  @endif
    
    @if(!Auth::check())
      
      <div id="page-container" class="fade">

    @else

      <div id="page-loader" class="fade in hidden"><span class="spinner"></span></div>
      <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

    @endif

    @if(Auth::check())
        @include('admin.navbar')
        @include('admin.menu')
    @endif
      
    @yield('conteudo')


    </div>
  <!-- end page container -->
  
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="/assets/admin/plugins/jquery/jquery-1.9.1.min.js"></script>
  <script src="/assets/admin/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
  <script src="/assets/admin/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
  <script src="/assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

  <!--[if lt IE 9]>
    <script src="/assets/admin/crossbrowserjs/html5shiv.js"></script>
    <script src="/assets/admin/crossbrowserjs/respond.min.js"></script>
    <script src="/assets/admin/crossbrowserjs/excanvas.min.js"></script>
  <![endif]-->

  <script src="/assets/admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="/assets/admin/plugins/jquery-cookie/jquery.cookie.js"></script>
  <!-- ================== END BASE JS ================== -->
  

  @yield('script')
<script src="/assets/admin/plugins/fullcalendar/lib/moment.min.js"></script> 
<script src="/assets/admin/plugins/fullcalendar/fullcalendar.min.js"></script>
  <script src="/assets/admin/js/calendar.demo.js"></script>
  <script src="/assets/admin/js/form-plugins.demo.js"></script>
  <script src="/assets/admin/js/apps.js"></script>
    
  <script>
      $(document).ready(function() {
          App.init();
          Calendar.init();
          FormPlugins.init();
      });
  </script>
  
</body>
</html>
