<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/fontawesome.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/flatpickr/flatpickr.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="dashboard"><img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->segment(1) == 'destination' ? 'active' : '' }}">
                            <a href="{{ route('destination.index') }}" class='sidebar-link'>
                                <i class="bi bi-airplane-fill"></i>
                                <span>Destination</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->segment(1) == 'packages' ? 'active' : '' }}">
                            <a href="{{ route('packages.index') }}" class='sidebar-link'>
                                <i class="bi bi-box-fill"></i>
                                <span>Packages</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->segment(1) == 'booking-admin' ? 'active' : '' }}">
                            <a href="{{ route('booking-admin') }}" class='sidebar-link'>
                                <i class="bi bi-bookmark-fill"></i>
                                <span>Booking</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class="layout-navbar">
            @yield('navbar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')

            <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
            <script src="{{ asset('assets/js/app.js') }}"></script>

            <!-- Need: Apexcharts -->
            <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
            <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

            {{-- datatables --}}
            <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
            <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
            <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>

            {{-- Image Uploader --}}
            <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
            <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
            <script src="{{ asset('assets/js/pages/filepond.js') }}"></script>

            {{-- Date Picker --}}
            <script src="{{ asset('assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
            <script src="{{ asset('assets/static/js/pages/date-picker.js') }}"></script>
            <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
            <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
            <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

            {{-- Sweet Alert --}}
            <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
            <script src="{{ asset('assets/js/pages/sweetalert2.js') }}"></script>
</body>

</html>
