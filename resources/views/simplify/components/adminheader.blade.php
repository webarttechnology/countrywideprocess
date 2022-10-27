<html lang="en">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Webart Technology Pvt Ltd</title>
		<link rel="icon" href="{{asset('/favicon.ico')}}" type="image/x-icon">
		<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/toggle-menu/sidemenu.css') }}">
		<link href="{{ asset('assets/plugins/horizontal-menu/dropdown-effects/fade-down.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/horizontal-menu/webslidemenu.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('assets/plugins/sumoselect/sumoselect.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/multi/multi.min.css') }}">
		<style type="text/css">
			@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
		</style>

		<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
 		</style>		
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
	</head>

    <body class="app sidebar-mini"><div class="horizontalMenucontainer">	
		<div class="wave -three"></div>		
		<div id="spinner" style="display: none;"></div>
		<div id="app" class="page">
			<div class="main-wrapper">
				<nav class="navbar navbar-expand-lg main-navbar">
					<a class="header-brand" href="">
						<img src="{{ asset('assets/logo.png') }}" class="header-brand-img" alt="Splite-Admin  logo">
					</a>
					<form class="form-inline mr-auto">
						<ul class="navbar-nav mr-2">
							<li><a href="#" data-toggle="sidebar" class="nav-link nav-link toggle"><i class="fa fa-reorder"></i></a></li>
							<li><a href="#" data-toggle="search" class="nav-link nav-link d-md-none navsearch"><i class="fa fa-search"></i></a></li>
						</ul>
					</form>
					<ul class="navbar-nav navbar-right">					
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg d-flex">
								<span class="mr-3 mt-2 d-none d-lg-block ">
									<span class="text-white">Hello,<span class="ml-1">{{ Session::get('name')}}</span></span>
								</span>
							 <span><img src="{{ asset('assets/avtar.jpg') }}" alt="profile-user" class="rounded-circle w-32 mr-2"></span> 
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class=" dropdown-header noti-title text-center border-bottom pb-3">
									<h5 class="text-capitalize text-dark mb-1">Admin Dashboard</h5>
									<small class="text-overflow m-0"> Admin</small>
								</div>
								<div class="dropdown-divider"></div><a class="dropdown-item" href="{{ URL::to('author/logout') }}"><i class="mdi  mdi-logout-variant mr-2"></i> <span>Logout</span></a>
							</div>
						</li>
					</ul>
				</nav>