<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- All Plugin Css --> 
		<link rel="stylesheet" href="{{ asset('job-asset/css/plugins.css') }}">
		<!-- Style & Common Css --> 
		<link rel="stylesheet" href="{{ asset('job-asset/css/common.css') }}">
		<link rel="stylesheet" href="{{ asset('job-asset/css/main.css') }}">
		<link rel="stylesheet" href="{{ asset('job-asset/css/custom.css') }}">
		<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('job-asset/img/favicon1.png') }}">

<!-- Include CSS for Summernote -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">


		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
	
    <body>
	<div id="app">
		<!-- Navigation Start  -->
		<nav class="navbar navbar-default navbar-sticky bootsnav">

			<div class="container">      
				<!-- Start Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="/"><img src="{{ asset('job-asset/img/logo2.png') }}" class="logo" alt="Resolve Logo"></a>
				</div>
				<!-- End Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a href="/">Home</a></li> 
							<li><a href="{{ route('partner') }}" >Become A Professional</a></li> 							
							<li><a href="{{ route('invitation') }}" >Create Invitation</a></li> 							
							<!-- <li><a href="{{ url('auth/google') }}" >Register with google</a></li> 							 -->
							@if (Route::has('login'))
								@auth
								<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle btn btn-danger" data-toggle="dropdown">{{ Auth::user()->name }}</a>
								<ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
									<li><a class="nav-link" href="{{ route('uprofile') }}">
													My Profile&nbsp;<i class="nav-icon fa fa-user blue"></i>
											</a>
									</li>
									<li><a class="nav-link" href="{{ route('myevent') }}">
													My Events&nbsp;<i class="nav-icon fa fa-calendar green"></i>
											</a>
									</li>
									<li><a class="nav-link" href="{{ route('logout') }}">
													Logout&nbsp;<i class="nav-icon fa fa-power-off red"></i>
											</a>
									</li> 
								</ul>
								</li>
								@else
								<li><a href="javascript:;" data-toggle="modal" data-target="#loginModal" class="btn btn-danger">Login/ Sign Up</a></li>
								@endauth
							@endif
						</ul>
				</div><!-- /.navbar-collapse -->
			</div>   
		</nav>
		<!-- Navigation End  -->