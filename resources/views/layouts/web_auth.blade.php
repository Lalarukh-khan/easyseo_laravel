<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="" />

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('front') }}/images/favicon.ico" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TKDKR7EQ7G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-TKDKR7EQ7G');
</script>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
/>

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
<!-- Vendor -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
<link href="{{ asset('admin_assets') }}/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- Page CSS -->
<!-- Page -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/vendor/css/pages/page-auth.css" />
<!-- Helpers -->
<script src="{{ asset('admin_assets') }}/assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="{{ asset('admin_assets') }}/assets/vendor/js/template-customizer.js"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('admin_assets') }}/assets/js/config.js"></script>
<style>
    .nwwbauthbtn{
        background: linear-gradient(90.04deg, #9200FF 0.68%, #1519FF 99.99%);
        box-shadow: -2px -2px 24px rgba(89, 11, 255, 0.25), 2px 2px 24px rgba(146, 0, 255, 0.25);
        border-radius: 8px;
        font-weight: 800;
        font-size: 20px;
        text-transform: capitalize;
        color: #FFFFFF;
    }
    .nwwbauthbtn:hover{
        background: linear-gradient(90.04deg, #FFA200 0.68%, #F47300 99.99%);
        color: #FFFFFF;
    }
</style>
</head>
<body>
    @yield('content')
<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {{-- Start logout form --}}
    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <script src="{{ asset('admin_assets') }}/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/danidev.js"></script>

    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('admin_assets') }}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin_assets') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin_assets') }}/assets/js/pages-auth.js"></script>
    <script>
        function eyeiconpass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

@yield('js')

</body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P57DBTR"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
</html>
