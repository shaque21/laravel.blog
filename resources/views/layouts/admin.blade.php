<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<title>@yield('page_title','Admin Dashboard')</title>
    <link rel="icon" href="{{asset('contents/admin')}}/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('contents/admin')}}/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{asset('contents/admin')}}/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/azzara.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="/admin" class="logo">
					<span style="color: #fff; letter-spacing:2px; font-weight:600;">
						MY BLOG
					</span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>


						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{asset('contents/admin')}}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="{{asset('contents/admin')}}/assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>{{ Auth::user()->name }}</h4>
											<p class="text-muted">{{ Auth::user()->email }}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">My Profile</a>
									<div class="dropdown-divider"></div>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
			
										<x-dropdown-link :href="route('logout')"
												onclick="event.preventDefault();
															this.closest('form').submit();">
											{{ __('Log out') }}
										</x-dropdown-link>
									</form>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('contents/admin')}}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->name }}
									<span class="user-level">Administrator</span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav">
                        <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">NAVBAR</h4>
						</li>
						<li class="nav-item active">
							<a href="/admin">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="{{ url('/admin/all_post') }}">
								<i class="fas fa-table"></i>
								<p>Posts</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/admin/all_page') }}">
								<i class="fas fa-file"></i>
								<p>Pages</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('/admin/contact_page') }}">
								<i class="fas fa-phone"></i>
								<p>Contact Us</p>
							</a>
						</li>
						{{-- <li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Forms</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="forms/forms.html">
											<span class="sub-item">Basic Form</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Tables</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="tables/tables.html">
											<span class="sub-item">Basic Table</span>
										</a>
									</li>
									<li>
										<a href="tables/datatables.html">
											<span class="sub-item">Datatables</span>
										</a>
									</li>
								</ul>
							</div>
						</li> --}}
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
					</div>
                    {{-- add main content part here --}}
					@yield('content')
				</div>
			</div>
			
		</div>
		
	</div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('contents/admin')}}/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/core/popper.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Datatables -->
<script src="{{asset('contents/admin')}}/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('contents/admin')}}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="{{asset('contents/admin')}}/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>


<!-- Sweet Alert -->
<script src="{{asset('contents/admin')}}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="{{asset('contents/admin')}}/assets/js/ready.min.js"></script>
@yield('script')
</body>
</html>