<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('admin/megabot-favicon.svg') }}"type="image/x-icon">

    <link rel="shortcut icon" href="{{ asset('admin/megabot-favicon.svg') }}" type="image/x-icon">
    <title>@yield('title') - {{ __('Megabot Admin Panel') }}</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/fontawesome.css') }}">
    <!-- Themify-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/themify-icons.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/bootstrap.css') }}">
    <!-- Datatable css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/datatables.css') }}">
    <!-- Select2 css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/remixicon/remixicon.css') }}">

    @stack('style')

    <!-- DataTable Select cdn CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/datatables.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/toastr.min.css') }}">

    <script src="{{ asset('admin/js/admin-cart.min.js') }}"></script>

    <!-- Admin css-->
    @vite(['resources/assets/admin/scss/admin.scss'])
</head>

<body>

    <div class="page-wrapper">

        @includeIf('admin.layouts.partials.header')

        <div class="page-body-wrapper">

            @includeIf('admin.layouts.partials.sidebar')

            <div class="page-body">

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

            @includeIf('admin.layouts.partials.footer')

            @includeIf('admin.inc.files')

        </div>

    </div>

    <!-- Latest jquery -->

    <script src="{{ asset('admin/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <!-- Feather icon js -->
    <script src="{{ asset('admin/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/feather-icon.js') }}"></script>

    <!-- Height equal js -->
    <script src="{{ asset('admin/js/height-equal.js') }}"></script>

    <!-- Datatable js -->
    <script src="{{ asset('admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/buttons.server-side.js') }}"></script>

    <!-- Nprogress js -->
    <script src="{{ asset('admin/js/nprogress.js') }}"></script>
    <!-- Sidebar jquery -->
    <script src="{{ asset('admin/js/sidebar-menu.js') }}"></script>
    <!-- Tinymce Editor -->
    <script src="{{ asset('admin/js/tinymce/tinymce.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('admin/js/dropzone.js') }}"></script>
    <!-- Toast -->
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>

    @includeIf('admin.inc.alerts')
    @stack('js')

    <script src="{{ asset('admin/js/dropzone.js') }}"></script>

    <!-- DataTable Select cdn -->
    <script src="{{ asset('admin/js/dataTables.select.min.js') }}"></script>

    @includeIf('admin.layouts.partials.script')
    <!-- Script admin -->
    <script src="{{ asset('admin/js/admin-script.js') }}"></script>

</body>

</html>
