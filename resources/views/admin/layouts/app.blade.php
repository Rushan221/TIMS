
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>TIMS | Dashboard</title>

  <link rel="stylesheet" href="/css/app.css">
  {{-- icons --}}
  <script src="https://kit.fontawesome.com/51b78c2475.js"></script> 

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Header -->
  @include('admin.layouts.header')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('/img/logo.jpg') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">      
      <span class="brand-text font-weight-light">TIMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">      
      <!-- Sidebar Menu -->
      @include('admin.layouts.menu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <div class="content mt-4">
      <div class="container-fluid">
          @include('admin.partials.alerts')
          @yield('content')        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->
<script src="/js/app.js"></script>
<script>
  $(document).ready(function(){
      $('#alert-message').delay(3000).fadeOut('slow');
  });
</script>
</body>
</html>
