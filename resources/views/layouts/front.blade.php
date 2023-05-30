<!DOCTYPE html>
<html lang="en" class="dark-sidebar ColorLessIcons">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>{{ @$title }} | {{config('app.name')}}</title>
    {{-- <link rel="icon" href="{{asset('oldadmin')}}/assets/images/favicon-32x32.png" type="image/png" /> --}}

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TKDKR7EQ7G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-TKDKR7EQ7G');
</script>

    <!--plugins-->
    <link href="{{asset('oldadmin')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{asset('oldadmin')}}/assets/plugins/perfec t-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{asset('oldadmin')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="{{asset('oldadmin')}}/assets/css/style.css" rel="stylesheet" />
    <!-- loader-->
    {{-- <link href="{{asset('oldadmin')}}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{asset('oldadmin')}}/assets/js/pace.min.js"></script> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('oldadmin')}}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('oldadmin')}}/assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('oldadmin')}}/assets/css/app.css" />
    <link rel="stylesheet" href="{{asset('oldadmin')}}/assets/css/dark-sidebar.css" />
	<link rel="stylesheet" href="{{asset('oldadmin')}}/assets/css/dark-theme.css" />
    <link href="{{ asset('oldadmin') }}/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Outer Bootstrap For modal in Help Desk -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P57DBTR');
    </script>
    <!-- End Google Tag Manager -->
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
        /* width */
        ::-webkit-scrollbar {
        width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: linear-gradient(0deg, rgba(146, 0, 255, 0.25), rgba(146, 0, 255, 0.25)), rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            transform: rotate(90deg); 
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(90.04deg, #FFA200 0.68%, #F47300 99.99%);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            transform: rotate(90deg); 
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90.04deg, #e89402 0.68%, #e06900 99.99%); 
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
		@include('components.front_sidebar')
		<!--end sidebar-wrapper-->
		<!--header-->
		@include('components.front_navbar')
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
                    <div class="row ">
                        <div class="col-lg-12">
                            @include('components.trial_end')
                        </div>
                    </div>
                    @yield('content')
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		{{-- <div class="footer">
			<p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent" target="_blank">codervent</a>
			</p>
		</div> --}}
		<!-- end footer -->
	</div>
	<!-- end wrapper -->


    {{-- Start logout form --}}
    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <script src="{{asset('oldadmin')}}/assets/js/bootstrap.bundle.min.js"></script>

	<!--plugins-->
	<script src="{{asset('oldadmin')}}/assets/js/jquery.min.js"></script>
	<script src="{{asset('oldadmin')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('oldadmin')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('oldadmin')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- Vector map JavaScript -->
    <script src="{{asset('oldadmin')}}/assets/js/app.js"></script>

    <script src="{{ asset('oldadmin') }}/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="{{ asset('oldadmin') }}/assets/js/danidev.js"></script>
    <script>
        $(document).ready(function () {
            $("#nwtoggle").click(function(){
                $("#nwmainlogo").toggle();
                $(".nwsidebar-footer-top").toggle();
            });

            $("#success-alert").fadeTo(2000, 1000).slideUp(1000, function() {
                $("#success-alert").slideUp(1000);
            });

            setTimeout(function () {
                page_loader('hide');
            }, 1000);
        });
    </script>
    @yield('page-scripts')
</body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P57DBTR"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
</html>
