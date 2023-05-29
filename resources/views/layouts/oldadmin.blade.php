<!DOCTYPE html>
<html lang="en" class="dark-sidebar ColorLessIcons">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>{{ @$title }} | {{config('app.name')}}</title>
    {{-- <link rel="icon" href="{{asset('admin')}}/assets/images/favicon-32x32.png" type="image/png" /> --}}
    <!--plugins-->
    <link href="{{asset('admin')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{asset('admin')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{asset('admin')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    {{-- <link href="{{asset('admin')}}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{asset('admin')}}/assets/js/pace.min.js"></script> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/app.css" />
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/dark-sidebar.css" />
	<link rel="stylesheet" href="{{asset('admin')}}/assets/css/dark-theme.css" />
    <link href="{{ asset('admin') }}/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    @yield('after-css')
    <style>
        input[type=range] {
            -webkit-appearance: none;
        }

        input[type=range] {
            padding: 0 0 0 0;
            margin-top: 5px;
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 300px;
            height: 5px;
            background: #ddd;
            border: none;
            border-radius: 3px;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            border: none;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            background: #9200FF;
            margin-top: -4px;
        }

        input[type=range]:focus {
            outline: none;
        }

        input[type=range]:focus::-webkit-slider-runnable-track {
            background: #ccc;
        }
    </style>
    <style>
        .error {
            color: red;
        }

        .btn-check:focus+.btn, .btn:focus {
            outline: none !important;
            box-shadow: none !important;
        }

        #eq-loader {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: block;
            opacity: 1;
            background-color: #fff;
            z-index: 999999;
            text-align: center;
            opacity: 0.7;
        }

        .eq-loader-div {
            position: absolute;
            top: 50%;
            left: 240px;
            z-index: 999999;
            bottom: 50%;
            left: 0;
            right: 0;
        }

        .eq-loading {
            border: 3px solid #fff;
            border-radius: 50%;
            border-top: 3px solid #1f212d;
            width: 75px;
            height: 75px;
            -webkit-animation: spin 1s linear infinite;
            animation: spin 1s linear infinite;
        }

        .eq-loading.dual-loader {
            border-bottom: 3px solid #1f212d;
        }
    </style>
</head>

<body>
    <div id="eq-loader">
        <div class="eq-loader-div">
            <div class="eq-loading dual-loader mx-auto mb-5"></div>
        </div>
    </div>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        @include('components.admin_sidebar')
        <!--end sidebar-wrapper-->
        <!--header-->
        @include('components.admin_navbar')
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>
    <!-- end wrapper -->


    {{-- Start logout form --}}
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <script src="{{asset('admin')}}/assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="{{asset('admin')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('admin')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{asset('admin')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>

    <script src="{{ asset('admin') }}/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- App JS -->
    <script src="{{asset('admin')}}/assets/js/app.js"></script>


    <script src="{{ asset('admin') }}/assets/js/danidev.js"></script>

    @yield('page-scripts')

    <script>
        $(document).ready(function () {
            $("#success-alert").fadeTo(2000, 1000).slideUp(1000, function() {
                $("#success-alert").slideUp(1000);
            });

            setTimeout(function () {
                page_loader('hide');
            }, 1000);
        });
    </script>
</body>
</html>
