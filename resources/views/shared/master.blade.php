<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from laravel.spruko.com/spruha/ltr/index by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Feb 2021 18:28:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
	<meta name="author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">
	<!-- Favicon -->
	<link rel="icon" href="{{asset('/dashboard/img/brand/favicon.ico')}}" type="image/x-icon" />
	<!-- Title -->
	<title>Ethical Research Solutions | @yield('title')</title>
	<!-- Bootstrap css-->
	<link href="{{asset('/dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
	<!-- Icons css-->
	<link href="{{asset('/dashboard/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
	<link href="{{asset('/dashboard/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('/dashboard/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />
	<!-- Style css-->
	<link href="{{asset('/dashboard/css/style/style.css')}}" rel="stylesheet">
	<link href="{{asset('/dashboard/css/skins.css')}}" rel="stylesheet">
	<link href="{{asset('/dashboard/css/dark-style.css')}}" rel="stylesheet">
	<link href="{{asset('/dashboard/css/colors/default.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/dashboard/plugins/model-datepicker/css/datepicker.css')}}">
	<!-- Color css-->
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('/dashboard/css/colors/color.css')}}">
	<!-- Select2 css-->
	<link href="{{asset('/dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
	<!-- Mutipleselect css-->
	<link rel="stylesheet" href="{{asset('/dashboard/plugins/multipleselect/multiple-select.css')}}">
	<!-- Sidemenu css-->
	<link href="{{asset('/dashboard/css/sidemenu/sidemenu.css')}}" rel="stylesheet">
	<!-- Switcher css-->
	<link href="{{asset('/dashboard/switcher/css/switcher.css')}}" rel="stylesheet">
	<link href="{{asset('/dashboard/switcher/demo.css')}}" rel="stylesheet">@yield('css')</head>

<body class="main-body leftmenu">
	<!-- Switcher -->@include('shared.switcher')
	<!-- End Switcher -->
	<!-- Loader -->
	<div id="global-loader">
		<img src="{{asset('/dashboard/img/loader.svg')}}" class="loader-img" alt="Loader">
	</div>
	<!-- End Loader -->
	<!-- Page -->
	<div class="page">
		<!-- Sidemenu -->@include('shared.side-menu')
		<!-- End Sidemenu -->
		<!-- Main Header-->@include('shared.mainheader')
		<!-- End Main Header-->
		<!-- Mobile-header -->@include('shared.mobileheader')
		<!-- Mobile-header closed -->
		<!-- Main Content-->
		<div class="main-content side-content pt-0">
			<div class="container-fluid">
				<div class="inner-body">
					<!--Row-->@yield('content')</div>
			</div>
			<!-- End Main Content-->
			<!-- Main Footer-->@include('shared.footer')
			<!--End Footer-->
			<!-- Sidebar -->@include('shared.sidebar')
			<!-- End Sidebar -->
		</div>
		<!-- End Page -->
		<!-- Back-to-top -->	<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
		<!-- Jquery js-->

</body>
		<script src="{{asset('/dashboard/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap js-->
		<script src="{{asset('/dashboard/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
		<!-- Select2 js-->
		<script src="{{asset('/dashboard/plugins/select2/js/select2.min.js')}}"></script>
		<!-- Perfect-scrollbar js -->
		<script src="{{asset('/dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<!-- Sidemenu js -->
		<script src="{{asset('/dashboard/plugins/sidemenu/sidemenu.js')}}"></script>
		<!-- Sidebar js -->
		<script src="{{asset('/dashboard/plugins/sidebar/sidebar.js')}}"></script>
		<!-- Internal Chart.Bundle js-->
		<script src="{{asset('/dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
		<!-- Peity js-->
		<script src="{{asset('/dashboard/plugins/peity/jquery.peity.min.js')}}"></script>
		<!-- Internal Morris js -->
		<script src="{{asset('/dashboard/plugins/raphael/raphael.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/morris.js/morris.min.js')}}"></script>
		<!-- Circle Progress js-->
		<script src="{{asset('/dashboard/js/circle-progress.min.js')}}"></script>
			<script src="{{asset('/dashboard/js/chart-circle.js')}}"></script>
		<!-- Internal Dashboard js-->
		<script src="{{asset('/dashboard/js/index.js')}}"></script>
		<!-- Sticky js -->
		<script src="{{asset('/dashboard/js/sticky.js')}}"></script>
		<!-- Custom js -->
		<script src="{{asset('/dashboard/js/custom.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{asset('/dashboard/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
		<!-- Switcher js -->
		<script src="{{asset('/dashboard/switcher/js/switcher.js')}}"></script>
		<script src="{{ asset('js/bootbox.min.js') }}" ></script>
		@yield('scripts')
</html>