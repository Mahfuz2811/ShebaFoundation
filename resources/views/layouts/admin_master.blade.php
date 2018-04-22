<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ url('admin/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/core/libraries/bootstrap.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Plugins -->
    <script type="text/javascript" src="{{ url('admin/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <!-- /plugins -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ url('admin/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/ui/ripple.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/pages/gallery.js') }}"></script>
    <!-- /theme JS files -->

    <!-- Custom JS files -->
    <script type="text/javascript" src="{{ url('admin/js/pages/form_validation.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/pages/datatables_basic.js') }}"></script>
    {{--<script type="text/javascript" src="{{ url('admin/js/pages/picker_date.js') }}"></script>--}}

    <!-- Animate.css files -->
    <link rel="stylesheet" href="{{ url('bower_components/animate.css/animate.min.css') }}">
    <!-- /animate.css files -->

    <!-- Sweet Alert files -->
    <link rel="stylesheet" href="{{ url('bower_components/sweetalert2/dist/sweetalert2.min.css') }}">
    <script type="text/javascript" src="{{ url('bower_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <!-- /sweet alert files -->

    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

    @yield('style')

    @yield('script')

</head>

<body class="navbar-top">

@include('inc.alert')

<div class="navbar navbar-inverse navbar-fixed-top bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('admin/images/lo_light.png') }}" alt="Logo" />
        </a>
        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li>
                <a data-toggle="collapse" data-target="#navbar-mobile">
                    <i class="icon-tree5"></i>
                </a>
            </li>
            <li>
                <a class="sidebar-mobile-main-toggle">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li>
                <a class="sidebar-control sidebar-main-toggle hidden-xs">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ url('admin/images/image.png') }}" alt="">
                    <span>{{ Auth::user()->name }}</span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="page-container">
    <div class="page-content">
        <div class="sidebar sidebar-main sidebar-default">
            <div class="sidebar-content">
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            <li class="navigation-header">
                                <span>Main Navigation</span>
                                <i class="icon-menu" title="Main pages"></i>
                            </li>
                            <li class="{{ $link == 1 ? 'active' : '' }}">
                                <a href="{{ route('admin_dashboard_index') }}">
                                    <i class="icon-home4"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="{{ $link == 2 ? 'active' : '' }}">
                                <a href="{{ route('admin_post_index') }}">
                                    <i class="icon-home4"></i>
                                    <span>Post</span>
                                </a>
                            </li>
                            <li class="{{ $link == 3 || $link == 4 ? 'active' : '' }}">
                                <a href="{{ route('admin_people_index') }}">
                                    <i class="icon-stack"></i>
                                    <span>Peoples</span>
                                </a>
                            </li>
                            <li class="{{ $link == 7 ? 'active' : '' }}">
                                <a href="{{ route('admin_gallery_category_index') }}">
                                    <i class="icon-home4"></i>
                                    <span>Gallery</span>
                                </a>
                            </li>
                            <li class="{{ $link == 8 ? 'active' : '' }}">
                                <a href="{{ route('admin_news_index') }}">
                                    <i class="icon-home4"></i>
                                    <span>News</span>
                                </a>
                            </li>
                            <li class="{{ $link >= 9 && $link <= 11 ? 'active' : '' }}">
                                <a href="#">
                                    <i class="icon-stack"></i>
                                    <span>Setting</span>
                                </a>
                                <ul>
                                    <li class="{{ $link == 9 ? 'active' : '' }}">
                                        <a href="{{ route('admin_slider_index') }}">Slider</a>
                                    </li>
                                    <li class="{{ $link == 10 ? 'active' : '' }}">
                                        <a href="{{ route('admin_contact_index') }}">Contact</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-wrapper">

            @yield('page_header')

            <div class="content">

                @yield('content')

                <div class="footer text-muted">
                    &copy; 2017. <a href="#">Laravel Starter</a> by <a href="http://proximio.net" target="_blank">Proximio</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
