<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Jatake Batteries - Responsive Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    {{-- load newest css --}}
    <link href="{{ asset('/plugins/bootstrapv3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/bootstrapv3/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/plugins/update/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/swal2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen" />

    <link href="{{ asset('/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" media="screen" >
    <link href="{{ asset('/plugins/datatables/datatables/css/datatables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" media="screen" >
    <link href="{{ asset('/plugins/datatables/responsive/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" media="screen" >
    <link href="{{ asset('/plugins/mdb/css/mdb.min.css') }}" rel="stylesheet" type="text/css" media="screen" >
    <link href="{{ asset('/plugins/mdb/css/style.css') }}" rel="stylesheet" type="text/css" media="screen" >

    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('/plugins/select2/select2-bootstrap4.min.css') }}" rel="stylesheet" type="text/css" media="screen" />

    <link href="{{ asset('/plugins/animate.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" />

    <!-- END PLUGIN CSS -->
    {{-- <link href="/css/main.css" rel="stylesheet" type="text/css" media="screen" > --}}
    {{-- <link href="/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" /> --}}

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="{{ asset('/webarch/css/webarch.css') }}" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BEGIN JS DEPENDECENCIES-->

    <script src="{{ asset('modules/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/plugins/pace/pace.min.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/bootstrapv3/js/bootstrap.min.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/update/popper.min.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/update/bootstrap.min.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/jquery-block-ui/jqueryblockui.min.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript" async></script>
    <script src="{{ asset('/plugins/jquery-autonumeric/autonumeric.min.js') }}" type="text/javascript" async></script>

    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ asset('/webarch/js/webarch.js') }}" type="text/javascript" async></script>
    {{-- <script src="/js/chat.js" type="text/javascript"></script> --}}
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{-- <script src="{{ asset('/plugins/bootstrap-select2/select2.min.js') }}" type="text/javascript" async></script> --}}
    {{-- <script src="/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script> --}}
    {{-- <script src="/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script> --}}
    {{-- <script type="text/javascript" src="/plugins/datatables-responsive/js/datatables.responsive.js"></script> --}}
    {{-- <script type="text/javascript" src="/plugins/datatables-responsive/js/lodash.min.js"></script> --}}
    <!-- END PAGE LEVEL JS INIT -->
    {{-- <script src="/js/datatables.js" type="text/javascript"></script> --}}
    <!-- END JAVASCRIPTS -->

    <script src="{{ asset('/plugins/datatables/datatables.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('/plugins/datatables/datatables/js/datatables.bootstrap4.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('/plugins/datatables/responsive/js/responsive.bootstrap4.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('/plugins/toastr/toastr.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('/plugins/swal2/sweetalert2.min.js') }}" type="text/javascript" defer></script>

    <script src="{{ asset('/plugins/select2/select2.min.js') }}" type="text/javascript" defer></script>

  </head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse ">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
        <div class="header-seperation">
          <ul class="nav pull-left notifcation-center visible-xs visible-sm">
            <li class="dropdown">
              <a href="#main-menu" data-webarch="toggle-left-side">
                <i class="material-icons">menu</i>
              </a>
            </li>
          </ul>
          <!-- BEGIN LOGO -->
          <a href="index.html">
            <img src="/img/logo.png" class="logo" alt="" data-src="/img/logo_white.png" data-src-retina="/img/logo2x.png" width="106" height="40" />
          </a>
          <!-- END LOGO -->
          <ul class="nav pull-right notifcation-center">
            <li class="dropdown hidden-xs hidden-sm">
              <a href="index.html" class="dropdown-toggle active" data-toggle="">
                <i class="material-icons">home</i>
              </a>
            </li>
          </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">
          <!-- BEGIN TOP NAVIGATION MENU -->
          <div class="pull-left">
            <ul class="nav quick-section">
              <li class="quicklinks">
                <a href="#" class="" id="layout-condensed-toggle">
                  <i class="material-icons">menu</i>
                </a>
              </li>
            </ul>
            <ul class="nav quick-section">
              <li class="quicklinks  m-r-10">
                <a href="#" class="">
                  <i class="material-icons">refresh</i>
                </a>
              </li>
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <li class="quicklinks">
                <a href="#" class="" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Notifications">
                  <i class="material-icons">notifications_none</i>
                  <span class="badge badge-important bubble-only"></span>
                </a>
              </li>
            </ul>
          </div>

          <div id="notification-list" style="display:none">
            <div style="width:300px">
              <div class="notification-messages info">
                <div class="user-profile">
                  <img src="/img/profiles/d.jpg" alt="" data-src="/img/profiles/d.jpg" data-src-retina="/img/profiles/d2x.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    David Nester - Commented on your wall
                  </div>
                  <div class="description">
                    Meeting postponed to tomorrow
                  </div>
                  <div class="date pull-left">
                    A min ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages danger">
                <div class="iconholder">
                  <i class="icon-warning-sign"></i>
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    Server load limited
                  </div>
                  <div class="description">
                    Database server has reached its daily capicity
                  </div>
                  <div class="date pull-left">
                    2 mins ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages success">
                <div class="user-profile">
                  <img src="/img/profiles/h.jpg" alt="" data-src="/img/profiles/h.jpg" data-src-retina="/img/profiles/h2x.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    You haveve got 150 messages
                  </div>
                  <div class="description">
                    150 newly unread messages in your inbox
                  </div>
                  <div class="date pull-left">
                    An hour ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <!-- END TOP NAVIGATION MENU -->
          <!-- BEGIN CHAT TOGGLER -->
          <div class="pull-right">
            <div class="chat-toggler sm">
              <div class="profile-pic">
                <img src="/img/profiles/avatar_small.jpg" alt="" data-src="/img/profiles/avatar_small.jpg" data-src-retina="/img/profiles/avatar_small2x.jpg" width="35" height="35" />
                <div class="availability-bubble online"></div>
              </div>
            </div>
            <ul class="nav quick-section ">
              <li class="quicklinks">
                <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                  <i class="material-icons">tune</i>
                </a>
                <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                  <li>
                    <a href="user-profile.html"> My Account</a>
                  </li>
                  <li>
                    <a href="calender.html">My Calendar</a>
                  </li>
                  <li>
                    <a href="email.html"> My Inbox&nbsp;&nbsp;
                  		<span class="badge badge-important animated bounceIn">2</span>
                  	</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="login.html"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
          <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
              <img src="/img/profiles/avatar.jpg" alt="" data-src="/img/profiles/avatar.jpg" data-src-retina="/img/profiles/avatar2x.jpg" width="69" height="69" />
              <div class="availability-bubble online"></div>
            </div>

            {{-- UserName --}}
            <div class="user-info sm">
              <div class="username">Fred <span class="semi-bold">Smith</span></div>
              <div class="status">Life goes on...</div>
            </div>
          </div>
          <!-- END MINI-PROFILE -->
          <!-- BEGIN SIDEBAR MENU -->
          <p class="menu-title sm">BROWSE <span class="pull-right"><a href="javascript:;"><i class="material-icons">refresh</i></a></span></p>
          <ul>
            <li class="start">
                <a href="/admin">
                    <i class="material-icons">home</i> <span class="title">Dashboard</span> <span class="selected"></span>
                </a>
            </li>

            <li class="{{ stripos($page,'brand')!==false?"active":null }}">
                <a href="/admin/brands"> <i class="material-icons">store</i> <span class="title">Brands</span> </a>
            </li>

            <li class="{{ stripos($page,'product')!==false?"active":null }}">
                <a href="/admin/products"> <i class="material-icons">archive</i> <span class="title">Products</span> </a>
            </li>

          </ul>
          <div class="clearfix"></div>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="progress transparent progress-small no-radius no-margin">
          <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
        </div>
        <div class="pull-right">
          <div class="details-status"> <span class="animate-number" data-value="86" data-animation-duration="560">86</span>% </div>
          <a href="lockscreen.html"><i class="material-icons">power_settings_new</i></a></div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="clearfix"></div>
        <div class="content">
          <ul class="breadcrumb">
            <li>
              <p>YOU ARE HERE</p>
            </li>
            <li><a href="#" class="active">{{ $page }}</a> </li>
          </ul>
          <div class="page-title">
            <h3>Jatake - <span class="semi-bold">{{ $page }}</span></h3>
          </div>

          @yield('content')

        </div>

        <div class="addNewRow"></div>
      </div>

    </div>
  </body>
    <footer>

    </footer>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('script')

</html>
