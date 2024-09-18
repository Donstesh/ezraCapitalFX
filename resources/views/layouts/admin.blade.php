<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> System Admin|| Site Store</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="admin/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="admin/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="admin/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="admin/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="admin/plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="admin/plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="admin/plugins/c3/c3.min.css">
        <link rel="stylesheet" href="admin/plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="admin/plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="admin/dist/css/theme.min.css">
        <script src="admin/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                                </div>
                            </div>
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                                <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                    <h4 class="header">Notifications</h4>
                                    <div class="notifications-wrap">
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">Invitation accepted</span> 
                                                <span class="media-content">Your have been Invited ...</span>
                                            </span>
                                        </a>
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <img src="admin/img/users/1.jpg" class="rounded-circle" alt="">
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">Steve Smith</span> 
                                                <span class="media-content">I slowly updated projects</span>
                                            </span>
                                        </a>
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-calendar"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">To Do</span> 
                                                <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="admin/img/user.jpg" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="{{ url('site-setup') }}"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="ik ik-power dropdown-icon"></i> Logout
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="{{url('adminHome')}}">
                            <span class="text">Admin Panel</span>
                        </a>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Navigation</div>
                                <div class="nav-item active">
                                    <a href="{{url('adminHome')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{url('view-products')}}"><i class="ik ik-menu"></i><span>Products</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{url('user-deposits')}}"><i class="ik ik-dollar-sign"></i><span>User Deposits</span></a>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Orders</span></a>
                                    <div class="submenu-content">
                                        <a href="{{url('new-orders')}}" class="menu-item">New Orders<span class="badge badge-success">New</span></a>
                                        <a href="{{url('complete-orders')}}" class="menu-item">Complete Orders</a>
                                    </div>
                                </div>
                                <div class="nav-item">
                                    <a href="{{url('view-users')}}"><i class="ik ik-users"></i><span>Registered Users</span></a>
                                </div>
                                <div class="nav-lavel">Setup</div>
                                <div class="nav-item has-sub">
                                    <a href="#"><i class="ik ik-box"></i><span>Category Setup</span></a>
                                    <div class="submenu-content">
                                        <a href="{{url('category-setup')}}" class="menu-item">Main Category</a>
                                        <a href="{{url('category-setup')}}" class="menu-item">Category</a>
                                    </div>
                                </div>
                                <div class="nav-item">
                                    <a href="{{url('view-wallets')}}"><i class="ik ik-command"></i><span>Wallet Address</span></a>
                                </div>
                                <div class="nav-lavel">Support</div>
                                <div class="nav-item">
                                    <a href="{{url('site-setup')}}"><i class="ik ik-monitor"></i><span>Site Setup</span></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="admin/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="admin/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="admin/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="admin/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="admin/plugins/screenfull/dist/screenfull.js"></script>
        <script src="admin/plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script src="admin/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="admin/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="admin/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="admin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="admin/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="admin/plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="admin/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="admin/plugins/moment/moment.js"></script>
        <script src="admin/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="admin/plugins/d3/dist/d3.min.js"></script>
        <script src="admin/plugins/c3/c3.min.js"></script>
        <script src="admin/js/tables.js"></script>
        <script src="admin/js/datatables.js"></script>
        <script src="admin/js/form-components.js"></script>
        <script src="admin/js/widgets.js"></script>
        <script src="admin/js/charts.js"></script>
        <script src="admin/dist/js/theme.min.js"></script>
        <script src="admin/js/layouts.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>