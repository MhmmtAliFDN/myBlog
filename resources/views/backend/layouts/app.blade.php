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
	<!-- /global stylesheets -->

    @stack('customCss')

	<!-- Core JS files -->
	<script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/demo_configurator.js')}}"></script>
	<script src="{{asset('assets/backend/js/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('assets/backend/js/vendor/echarts.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/vendor/world.js')}}"></script>

	<script src="{{asset('assets/backend/js/app.js')}}"></script>
	<script src="{{asset('assets/backend/js/charts/area_gradient.js')}}"></script>
	<script src="{{asset('assets/backend/js/charts/map_europe_effect.js')}}"></script>
	<script src="{{asset('assets/backend/js/charts/progress_sortable.js')}}"></script>
	<script src="{{asset('assets/backend/js/charts/bars_grouped.js')}}"></script>
	<script src="{{asset('assets/backend/js/charts/line_label_marks.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

    @include('backend.inc.navigation')

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

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

</body>
</html>
