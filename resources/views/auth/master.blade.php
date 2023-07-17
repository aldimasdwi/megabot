<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon"
        href="{{ isset($theme->favic_icon) ? url(\App\Helpers\Helpers::media($theme->favic_icon)->url) : asset('favicon.png') }}"
        type="image/x-icon">

    <link rel="shortcut icon"
        href="{{ isset($theme->favic_icon) ? url(\App\Helpers\Helpers::media($theme->favic_icon)->url) : asset('favicon.png') }}"
        type="image/x-icon">
    <title>@yield('title')</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendors/fontawesome.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendors/bootstrap.css') }}">
    <!-- Animated css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendors/animate.css') }}">
    <!-- Color1 css-->
    @vite(['resources/assets/frontend/scss/color1.scss'])

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/remixicon/remixicon.css') }}">

    <link href="{{ asset('admin/css/vendors/bootstrap-4.0.css') }}" rel="stylesheet">

    <script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/toastr.min.css') }}">
</head>

<body>

    <div class="page-wrapper">
        @include('admin.inc.alerts')
        @yield('content')
    </div>

    <!-- Latest jquery -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    @stack('js')
</body>

</html>
