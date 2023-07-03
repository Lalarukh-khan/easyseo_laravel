<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--favicon-->
	{{-- <link rel="icon" href="{{asset('admin')}}/assets/images/favicon-32x32.png" type="image/png" /> --}}
	<!-- loader-->
	{{-- <link href="{{asset('admin')}}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('admin')}}/assets/js/pace.min.js"></script> --}}
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('admin')}}/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{asset('admin')}}/assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{asset('admin')}}/assets/css/app.css" />
    @yield('css')
</head>

<body class="login">

    @yield('content')
    {{-- <!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-{{$title}} d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15 overflow-hidden">
						@yield('content')
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- end wrapper -->
	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{asset('admin')}}/assets/js/jquery.min.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
    {{-- <script>
        function myFunction(__self) {
                var x = document.getElementById("inputPassword");

                if (x.type === "password") {
                    x.type = "text";
                    $(__self).addClass('fa-eye');
                    $(__self).removeClass('fa-eye-slash');
                } else {
                    x.type = "password";
                    $(__self).removeClass('fa-eye');
                    $(__self).addClass('fa-eye-slash');

                }
            }
            // $(document).ready(function () {
            //     const tz = (new Date().getTimezoneOffset() / 60); //console.log(tz);
            //     $("#user_time_zone").val(tz);
            //     $.ajax({
            //         type: "get",
            //         url: "{{}}",
            //         data: {
            //             'offset':tz,
            //         },
            //         dataType: "json",
            //         success: function (res) {

            //         }
            //     });
            // });

    </script> --}}
</body>

</html>
