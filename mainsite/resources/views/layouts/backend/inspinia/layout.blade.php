<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/backend/inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/plugins/font-awesomex/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/backend/inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/inspinia/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/inspinia/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    @yield('pgStyles')
</head>

<body class="">

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle"
                                src="{{ asset('assets/backend/inspinia/img/profile_small.jpg') }}" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">David Williams</span>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>

                    <li>
                        <a href="layouts.html"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Dashboard</span></a>
                    </li>
                    @can('user_management_menu')
                        <li class="@if (Route::is('admin.usermanagement.permission') ||
                                Route::is('admin.usermanagement.role') ||
                                Route::is('admin.usermanagement.user')) active @endif">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span class="nav-label">User Management</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse">
                                @if (Route::has('admin.usermanagement.permission'))
                                    <li class="@if (Route::is('admin.usermanagement.permission')) active @endif"><a
                                            href="{{ route('admin.usermanagement.permission') }}">Permissions</a></li>
                                @endif
                                @if (Route::has('admin.usermanagement.role'))
                                    <li class="@if (Route::is('admin.usermanagement.role')) active @endif"><a
                                            href="{{ route('admin.usermanagement.role') }}">Roles</a></li>
                                @endif
                                @if (Route::has('admin.usermanagement.user'))
                                    <li class="@if (Route::is('admin.usermanagement.user')) active @endif"><a
                                            href="{{ route('admin.usermanagement.user') }}">Users</a></li>
                                @endif

                            </ul>
                        </li>
                    @endcan
                    @can('course_menu')
                        <li class="@if (Route::is('admin.course.category')) active @endif">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span class="nav-label">Courses</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse">
                                @if (Route::has('admin.course'))
                                    <li class="@if (Route::is('admin.course')) active @endif"><a
                                            href="{{ route('admin.course') }}">Courses</a>
                                    </li>
                                @endif
                                @can('course_category_menu')

                                    @if (Route::has('admin.course.category'))
                                        <li class="@if (Route::is('admin.course.category')) active @endif"><a
                                                href="{{ route('admin.course.category') }}">Category</a>
                                        </li>
                                    @endif
                                @endcan

                            </ul>
                        </li>
                    @endcan

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="graph_flot.html">Flot Charts</a></li>
                            <li><a href="graph_morris.html">Morris.js Charts</a></li>
                            <li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                            <li><a href="graph_chartjs.html">Chart.js</a></li>
                            <li><a href="graph_chartist.html">Chartist</a></li>
                            <li><a href="c3.html">c3 charts</a></li>
                            <li><a href="graph_peity.html">Peity Charts</a></li>
                            <li><a href="graph_sparkline.html">Sparkline Charts</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{{ asset('assets/backend/inspinia/img/a7.jpg') }}">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{{ asset('assets/backend/inspinia/img/a4.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{{ asset('assets/backend/inspinia/img/profile.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="login.html">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            @yield('breadcrumb')

            <div class="wrapper wrapper-content">
                @yield('main')
            </div>
            @yield('footer')

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('assets/backend/inspinia/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/backend/inspinia/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/inspinia/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/backend/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    @yield('pgScripts')
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('assets/backend/inspinia/js/inspinia.js') }}"></script>
    <script src="{{ asset('assets/backend/inspinia/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/backend/inspinia/js/plugins/toastr/toastr.min.js') }}"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "preventDuplicates": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "17000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if (session()->has('alert_type'))
            toastr['{{ session()->get('alert_type') }}']('{!! session()->get('message') !!}', '{{ session()->get('title') }}')
        @endif
    </script>

</body>

</html>
