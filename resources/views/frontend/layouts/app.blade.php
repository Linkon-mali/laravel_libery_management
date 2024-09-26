<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:03:33 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS Users</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/') }}assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/') }}assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}assets/favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="{{ asset('/') }}assets/vendor/pace/pace.min.js"></script>
    <link href="{{ asset('/') }}assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/toastr/toastr.min.css">
    <!--dataTable-->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/stylesheets/css/style.css">

</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.html" class="on-click">
                        <h3>LMS</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>
                <!--NOCITE HEADERBOX-->
                <div class="header-section hidden-xs" id="notice-headerbox">
                    <!--check list-->
                    <!--messages-->
                    <!--alerts notices-->
                    <div class="notice" id="alerts-notice">
                        <i class="fa fa-bell-o" aria-hidden="true"> @yield('notificationA')</i>
                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                <span class="badge x-danger b-rounded">@yield('notificationB')</span>

                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element list-sm">
                                    <ul>
                                        <li>
                                            <a href="{{ url('/browed_book') }}">
                                                <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                <div class="text">
                                                    <span class="title">@yield('notificationB') Book</span>
                                                    <span class="subtitle">Return Today</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a>See all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <span>
                                @if(Auth::user()->image)
                                <img style="width: 30px;" alt="profile photo" src="{{ asset('/') }}assets/images/user/{{Auth::user()->image}}" />
                                @else
                                <img style="width: 30px" alt=" profile photo" src="{{ asset('/') }}assets/images/user/people.png" />
                                @endif
                            </span>
                        </div>
                        <div class="user-info">
                            <span class="user-name"> {{ Auth::user()->name }}</span>
                            <span class="user-profile">{{ ucfirst(Auth::user()->status) }}</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="{{ url('/student_profile') }}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="{{ url('/student_update') }}"><i class="fa fa-lock" aria-hidden="true"></i> Update Profile</a></li>
                                <li><a href="{{ url('/student_delte') }}"><i class="fa fa-cog" aria-hidden="true"></i> Delete Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="left" title="Logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out log-out" aria-hidden="true"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="active-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <!--UI ELEMENTENTS-->
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Student</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{ url('/all_student') }}">All Student</a></li>
                                    </ul>
                                </li>
                                @if((Auth::user()->status == 'active'))
                                <li class="has-child-item close-item">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Books</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="{{ url('/all_book') }}">All Books</a></li>
                                        <li><a href="{{ url('/browed_book') }}">Browed Book</a></li>
                                        <li><a href="{{ url('/return_book') }}">Return Book</a></li>
                                    </ul>
                                </li>
                                @endif
                                <!--CHARTS-->

                                <!--DOCUMENTATION-->
                                <li><a target="_blank" href="http://myiideveloper.com/helsinki/last-version/documentation/index.html"><i class="fa fa-book" aria-hidden="true"></i><span>Online Documentation</span></a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            @yield('content')
            <!-- RIGHT SIDEBAR -->
            <!-- ========================================================= -->
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('/') }}assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('/') }}assets/javascripts/template-script.min.js"></script>
    <script src="{{ asset('/') }}assets/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <script src="{{ asset('/') }}assets/vendor/toastr/toastr.min.js"></script>
    <!--dataTable-->
    <script src="{{ asset('/') }}assets/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
    <!--Examples-->
    <script src="{{ asset('/') }}assets/javascripts/examples/tables/data-tables.js"></script>
    <!--Examples-->
    <script src="{{ asset('/') }}assets/javascripts/examples/dashboard.js"></script>

</body>
<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:07 GMT -->

</html>