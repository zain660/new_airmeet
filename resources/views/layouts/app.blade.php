@php
$setting = App\Models\Setting::find(1);
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->app_name }} - {{ $title ?? '' }}</title>
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/vector-map.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('/front/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/assets/css/responsive.css') }}">
    <!-- Styles -->
    <style type="text/css">
        :root {
            --primary-color: {{ getSetting('PRIMARY_COLOR') }};
            --primary-color-disabled: {{ getSetting('PRIMARY_COLOR_DISABLED') }};
            --secondary-color: {{ getSetting('SECONDARY_COLOR') }};
        }

    </style>
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fa.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('/front/assets/images') }}/{{ $setting->app_logo }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vector-map.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/responsive.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> {{-- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}



    @yield('style')
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start       -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper">
                        <a href="index.php">
                            <img class="img-fluid" src="../assets/images/logo/logo.png" alt="">
                        </a>
                    </div>
                    <div class="dark-logo-wrapper">
                        <a href="index.php">
                            <img class="img-fluid" src="../assets/images/logo/dark-logo.png" alt="">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i>
                    </div>
                </div>
                <div class="left-menu-header col">
                    <ul>
                        <li>
                            <form class="form-inline search-form">
                                <div class="search-bg"><i class="fa fa-search"></i>
                                    <input class="form-control-plaintext" placeholder="Search here.....">
                                </div>
                            </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus"> 
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="bell"></i><span
                                    class="dot-animated"></span></div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <p class="f-w-700 mb-0">You have 3 Notifications<span
                                            class="pull-right badge badge-primary badge-pill">4</span></p>
                                </li>
                                <li class="noti-primary">
                                    <div class="media"><span class="notification-bg bg-light-primary"><i
                                                data-feather="activity">
                                            </i></span>
                                        <div class="media-body">
                                            <p>Delivery processing </p><span>10 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="noti-secondary">
                                    <div class="media"><span class="notification-bg bg-light-secondary"><i
                                                data-feather="check-circle">
                                            </i></span>
                                        <div class="media-body">
                                            <p>Order Complete</p><span>1 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="noti-success">
                                    <div class="media"><span class="notification-bg bg-light-success"><i
                                                data-feather="file-text">
                                            </i></span>
                                        <div class="media-body">
                                            <p>Tickets Generated</p><span>3 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="noti-danger">
                                    <div class="media"><span class="notification-bg bg-light-danger"><i
                                                data-feather="user-check">
                                            </i></span>
                                        <div class="media-body">
                                            <p>Delivery Complete</p><span>6 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>
                        <li class="onhover-dropdown">
                            @if (Auth::user()->is_social_avatar == 1)
                                <img class="img-fluid rounded-circle me-3" style="width: 34px;"
                                    src="{{ Auth::user()->avatar }}" alt="">
                            @else
                                <img class="img-fluid rounded-circle me-3" style="width: 34px;"
                                    src="{{ asset('/assets/images/user') }}/{{ Auth::user()->avatar }}" alt="">
                            @endif
                            <ul class="chat-dropdown onhover-show-div">
                                <li>
                                    <div class="media">
                                        <div class="media-body"><span><a href="profile.php">Profile</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body"><span><a href="index.php">Dashboard</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body"><span><a href="{{route('user.privacy_policy')}}">Privacy</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body"><span>
                                            <a href="#"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </a></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <!-- Page Header Ends -->
        @php
            $subscribed = App\Models\SubscribedUser::where('user_id',Auth::user()->id)->first();
        @endphp
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            <header class="main-nav">
                <div class="sidebar-user text-center">
                    <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a>
                    @if (Auth::user()->is_social_avatar == 1)
                        <img class="img-90 rounded-circle" src="{{ Auth::user()->avatar }}" alt="">
                    @else
                        <img class="img-90 rounded-circle"
                            src="{{ asset('/assets/images/user') }}/{{ Auth::user()->avatar }}" alt="">
                    @endif
                    @if($subscribed != null)
                    <div class="badge-bottom"><span class="badge badge-primary">Premium</span></div>
                    @else 
                    <div class="badge-bottom"><span class="badge badge-danger">Free</span></div>
                    @endif
                    <a href="profile.php">
                        <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
                    </a>
                    <a href="user-profile.php">
                        <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->email }} Community</h6>
                    </a>
                    <p class="mb-0 font-roboto">You are a community manager</p>
                    <!-- <ul>
                <li><span><span class="counter">19.8</span>k</span>
                  <p>Follow</p>
                </li>
                <li><span>2 year</span>
                  <p>Experince</p>
                </li>
                <li><span><span class="counter">95.2</span>k</span>
                  <p>Follower </p>
                </li>
              </ul> -->
                </div>
                <nav>
                    <div class="main-navbar">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="mainnav">
                            <ul class="nav-menu">
                                <li class="back-btn">
                                    <div class="mobile-back text-end"><span>Back</span>
                                        <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                                    </div>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Manage your organization:</h6>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link menu-title link-nav active" href="index.php">
                                        <i data-feather="home"></i><span>Getting Start</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link menu-title link-nav" href="{{route('user.events')}}">
                                        <i data-feather="file-text"></i><span>Events</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link menu-title link-nav" href="video.php">
                                        <i data-feather="video"></i><span>Video Library</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link menu-title link-nav" href="{{route('user.team')}}">
                                      <i data-feather="users"></i><span>Team</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link menu-title link-nav" href="integration.php">
                                        <i class="icon-plug"></i><span>Integrations</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link menu-title link-nav" href="{{route('user.packages')}}">
                                        <i data-feather="life-buoy"></i><span>Billing Plans</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </div>
                </nav>
            </header>
            <!-- Page Sidebar Ends-->
            <main class="py-4">
                @yield('content')
            </main>

        </div>

        @include('layouts.footer')
        <script>
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.warning("{{ session('warning') }}");
            @endif
        </script>
        <!-- Scripts -->
        {{-- <script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script> --}}
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @yield('script')
</body>

</html>
