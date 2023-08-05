<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" href="{{ asset('assets/images/logo/logo.png') }}">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{ asset('assets//vendor/fix-footer.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('assets/css/material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/material-icons.rtl.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/fontawesome.rtl.css') }}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('assets/css/preloader.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/preloader.rtl.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">

</head>

<body class="layout-navbar-mini-fixed-bottom">
    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
            <div class="mdk-header__content">

                <div data-primary class="navbar navbar-expand-sm navbar-dark bg-dark p-0" id="default-navbar">
                    <div class="container">

                        <!-- Navbar Brand -->
                        <a href="{{ route('homepage') }}" class="navbar-brand">
                            <img class="navbar-brand-icon" src="assets/images/logo/logo.png" width="30" >
                            <span class="d-none d-md-block">STALK-INATOR</span>
                        </a>

                        <!-- Main Navigation -->
                        <ul class="nav navbar-nav ml-auto d-none d-sm-flex">
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                            <li class="nav-item active">
                                <a href="{{ route('login') }}" class="nav-link">Log In</a>
                            </li>
                        </ul>
                        <!-- // END Main Navigation -->

                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                    </div>
                </div>

            </div>
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content pb-0">
            <div class="bg-gradient-primary py-60pt">
                <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                    <!--<img src="assets/images/illustration/student/128/white.svg" class="mr-md-32pt mb-32pt mb-md-0" alt="student">-->
                    <div class="flex mb-32pt mb-md-0">
                        <h1 class="text-white mb-8pt">Log In</h1>
                    </div>
                </div>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="alert alert-danger alert-dismissible fade show"
                            :status="session('status')" />
            <!-- Validation Errors -->
            <x-auth-validation-errors class="alert alert-danger alert-dismissible fade show"
                :errors="$errors" />

            <div class="bg-white py-32pt py-sm-64pt pb-32pt">
                <div class="container page__container">
                    <form action="{{ route('login') }}" method="POST" class="col-md-5 p-0 mx-auto">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Your email" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Your password" required>
                            <!-- <p class="text-right"><a href="reset-password.html" class="small">Forgot your password?</a></p> -->
                        </div>
                        <div class="text-center">
                            <button class="btn btn-lg btn-accent" id="login-btn">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="js-fix-footer bg-white border-top-5 footer-h">
                <div class="bg-footer page-section py-lg-50pt">
					<p class="text-white-50 mb-0" style="text-align:center">&copy; 2023 Copyright: stalkinator.com</p>
                </div>
            </div>
        </div>
        <!-- // END Header Layout Content -->

    </div>
    <!-- // END Header Layout -->
	
	<!--Scripts-->
    <!-- jQuery -->
    <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert2.all.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

    <!-- Fix Footer -->
    <script src="{{ asset('assets/vendor/fix-footer.js') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Highlight.js -->
    <script src="{{ asset('assets/js/hljs.js') }}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('assets/js/app-settings.js') }}"></script>

    <!-- App Settings (safe to remove) -->
    <!-- <script src="assets/js/app-settings.js"></script> -->

   <!--  @section('script')
	<script>
        $(document).ready(function() {

            $('#login-btn').click(function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Logged in',
                    showConfirmButton: false,
                    timer: 1600
                })

            });
        });
    </script>
 -->


</body>

</html>
