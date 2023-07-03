<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('admin_assets')}}/assets/"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

	<title>{{ @$title }} | {{config('app.name')}}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('admin_assets')}}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/vendor/libs/apex-charts/apex-charts.css" />
	<link href="{{ asset('oldadmin') }}/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('admin_assets')}}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('admin_assets')}}/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('admin_assets')}}/assets/js/config.js"></script>

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
	<!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      	<div class="layout-container">
			<!--sidebar-wrapper-->
			@include('components.admin_sidebar')
			<!--end sidebar-wrapper-->
			<!--header-->
			@include('components.admin_navbar')
			<!--end header-->
			<!--page-wrapper-->
			<div class="page-wrapper">
            <!-- Content wrapper -->
			<div class="content-wrapper">
            <!-- Content -->
            	<div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')

					<!--footer-->
					@include('components.admin_footer')
					<!--end footer-->
            		<div class="content-backdrop fade"></div>
          		</div>
          <!-- Content wrapper -->
        	</div>
			<!-- / Layout page -->
			</div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->

	{{-- Start logout form --}}
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
	<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('admin_assets')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('admin_assets')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('admin_assets')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{asset('admin_assets')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{asset('admin_assets')}}/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{asset('admin_assets')}}/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{asset('admin_assets')}}/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{asset('admin_assets')}}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    
    <script src="{{asset('admin_assets')}}/assets/vendor/libs/sortablejs/sortable.js"></script>

    <!-- Vendors JS -->
    <script src="{{asset('admin_assets')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{asset('admin_assets')}}/assets/js/main.js"></script>
	<script src="{{ asset('oldadmin') }}/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{asset('oldadmin')}}/assets/js/app.js"></script>
    <script src="{{ asset('oldadmin') }}/assets/js/danidev.js"></script>

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
