{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div>
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
</div>

<!-- Select Option Rol type -->
<div class="mt-4">
    <x-label for="role_id" value="{{ __('Register as:') }}" />
    <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
        <option value="user">User</option>
        <option value="blogwriter">Blog Writer</option>
    </select>
</div>

<div class="flex items-center justify-end mt-4">
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>

    <x-button class="ml-4">
        {{ __('Register') }}
    </x-button>
</div>
</form>
</x-auth-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
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
                            <img class="navbar-brand-icon" src="{{ asset('assets/images/logo/logo.png') }}" width="30">
                            <span class="d-none d-md-block">Stalk-INATOR</span>
                        </a>

                        <!-- Main Navigation -->
                        <ul class="nav navbar-nav ml-auto d-none d-sm-flex">
                            <li class="nav-item active">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                            <li class="nav-item">
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
            <div class="py-60pt bg-gradient-primary">
                <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                    <div class="flex mb-32pt mb-md-0">
                        <h1 class="text-white mb-8pt">Register</h1>
                    </div>
                </div>
            </div>
            <div class="bg-white py-32pt pt-lg-64pt">
                <div class="container page__container">
                    <div class="col-lg-10 p-0 mx-auto">
                        <div class="row">
                            <div class="col-md-6 mb-24pt mb-md-0">
                                <x-auth-validation-errors class="alert alert-danger alert-dismissible fade show" :errors="$errors" />
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Username:</label>
                                        <input id="name" type="text" name="name" class="form-control" placeholder="Brood99" required=" Username must be a mixed of characters and numbers">
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your email:</label>
                                        <input id="email" type="email" name="email" class="form-control" placeholder="example@gmail.com" required="">
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="form-group mb-24pt">
                                        <label for="password">Password: (8 or more characters)</label>
                                        <input id="password" type="password" name="password" class="form-control" placeholder="Your password" required="password must be 8 to 12 characters long with combination
                                        of alphanumeric and symbols">
                                    </div>
                                    <div class="form-group mb-24pt">
                                        <label for="password_confirmation">Confirm Password:</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Retype password" required="password must be 8 to 12  characters long with combination">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="role-select">Select your role:</label>
                                        <select id="role_id" name="role_id" class="form-control custom-select" required>
                                            <option value="lecturer">Lecturer</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-lg btn-accent" type="submit" id="register-btn">Register Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-fix-footer bg-white border-top-5 footer-h">
                <div class="bg-footer page-section py-lg-50pt">
                    <p class="text-white-50 mb-0" style="text-align:center">&copy; 2022 Copyright: Stalk-INATOR.com</p>
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

    <!-- @section('script')
	<script>
        $(document).ready(function() {

            $('#register-btn').click(function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Account Created',
                    showConfirmButton: false,
                    timer: 1600
                })

            });
        });
    </script> -->
</body>

</html>