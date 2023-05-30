<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TKDKR7EQ7G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-TKDKR7EQ7G');
</script>

    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/auth/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/auth/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/auth/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/auth/css/iofrm-theme29.css">
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P57DBTR');
        </script>
        <!-- End Google Tag Manager -->
    @yield('css')
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="javascript:void(0);">
                <div class="logo">
                    <img class="logo-size" src="{{asset('front')}}/images/logo.svg" alt="Logo.svg">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset('front') }}/auth/images/graphic3.svg" alt="graphic3.svg">
                </div>
            </div>
            @yield('content')

        </div>
    </div>
<script src="{{ asset('front') }}/auth/js/jquery.min.js"></script>
<script src="{{ asset('front') }}/auth/js/popper.min.js"></script>
<script src="{{ asset('front') }}/auth/js/bootstrap.min.js"></script>
<script src="{{ asset('front') }}/auth/js/main.js"></script>

@yield('js')

</body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P57DBTR"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
</html>
