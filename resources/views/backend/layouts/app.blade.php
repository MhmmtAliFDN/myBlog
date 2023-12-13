<!DOCTYPE html>
<html lang="tr" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('title')

	<!-- Global stylesheets -->
	<link href="{{asset('assets/backend/fonts/inter/inter.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/backend/icons/phosphor/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/backend/css/all.min.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backend/css/custom.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

    @stack('customCss')

	<!-- Core JS files -->
	<script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/demo_configurator.js')}}"></script>
	<script src="{{asset('assets/backend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/app.js')}}"></script>
	<!-- /core JS files -->
</head>

<body>
    <!-- Page Loader -->
    <div id="my-preloader"></div>
    <!-- /page loader -->

    @include('backend.inc.navigation')

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

                @include('backend.inc.header')

                @yield('content')

                @include('backend.inc.footer')

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

    @include('backend.inc.notifications')

    @include('backend.inc.config')

    @stack('customJs')

    <script>
        var loader = document.getElementById("my-preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none";
        })
    </script>

</body>
</html>
