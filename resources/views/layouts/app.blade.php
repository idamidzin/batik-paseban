<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Bootstrap Admin App" />
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="logo.png" />

    <title>Batik Paseban</title>

    <!-- =============== VENDOR STYLES ===============-->
    <link rel="stylesheet" href="{{ mix('/css/vendor.css') }}" />
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{ mix('/css/bootstrap.css') }}" data-rtl="{{ mix('/css/bootstrap-rtl.css') }}" id="bscss" />
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" data-rtl="{{ mix('/css/app-rtl.css') }}" id="maincss" /> 
    @yield('styles')
    <link rel="stylesheet" href="{{ mix('/css/theme-f.css') }}">
    <style type="text/css">
      #list-tahun-pelajaran .list-group-item {
        cursor: pointer;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
         -khtml-user-select: none;
           -moz-user-select: none;
            -ms-user-select: none;
                user-select: none;
      }
      #dropdown-user .dropdown-item .list-group a{text-decoration: none;}
      @media (max-width: 576px) {
        .topnavbar .navbar-header .brand-logo {font-size: 0.8rem;}
      }
      .bg-blue-grey {
          background-color: #607D8B !important;
          color: #fff;
      }
      .btn.bg-blue-grey:hover,
      .btn.bg-blue-grey:active,
      .btn.bg-blue-grey:focus{
        color: #fff;
        background-color: #4D646F !important;
      }
      ul.sidebar-nav span {white-space: normal;}
    </style>
  </head>

  <body>
    <div class="wrapper">
      <!-- top navbar-->
      @include('layouts.includes.header')
      <!-- sidebar-->
      @include('layouts.includes.sidebar')
      <!-- offsidebar-->
      @include('layouts.includes.offsidebar')
      <!-- Main section-->
      <section class="section-container">
        <!-- Page content-->
        <div class="content-wrapper">
          @yield('content')
        </div>
      </section>
      <!-- Page footer-->
      @include('layouts.includes.footer')
    </div>
    @yield('body-area')
    <!-- =============== VENDOR SCRIPTS ===============-->
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <!-- =============== APP SCRIPTS ===============-->
    <script src="{{ mix('/js/app.js') }}"></script>
    <!-- =============== CUSTOM PAGE SCRIPTS ===============-->
    @yield('scripts')
    <script type="text/javascript">
      $(document).ready(function(){
        if ($(".alert-remove").length > 0) {
          let delay = $(".alert-remove").data('delay');
          setTimeout(function(){
            $(".alert-remove").slideUp(500);
          },typeof delay !== 'undefined' ? parseInt(delay) : 6000);
        }

      })
    </script>
  </body>

</html>