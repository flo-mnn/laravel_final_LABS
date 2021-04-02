<!DOCTYPE html>
<html lang="en">
<head>
	<title>Labs - Design Studio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{asset('/storage/img/favicon.ico')}}" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

	<!-- Stylesheets -->
    {{-- new bootstrap and style sheet --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
	{{-- old bootstrap - priority --}}
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/> --}}
	{{-- <link rel="stylesheet" href="css/font-awesome.min.css"/> --}}
	<link rel="stylesheet" href="{{asset('css/flaticon.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<style>
        /*   */
		.overlay {
			background-image: url("{{asset('/storage/img/overlay.png')}}");
		}
	</style>
	{{-- <!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="/storage/img/{{$images[0]->src}}" alt="" width="111">
			<h2>Loading.....</h2>
		</div>
	</div> --}}
    <main class="back-office-main  d-flex">
        <div class="sidebar bg-dark">
            <div class="sidebar-inner">
                <div class="text-center ">
                    <a href="/" class="btn btn-success text-primary font-weight-bold"> > TO the website</a>
                </div>
                <div class="accordion" id="linksAccordion">
                    <div class="card bg-dark">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left text-uppercase" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Team
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#linksAccordion">
                        <div class="card-body py-4 pl-4 pr-2">
                            <a href="" class="side-link py-3">My profile</a>
                            <div class="side-separator my-3"></div>
                            <a href="" class="side-link py-3">Our Team</a>
                            <div class="side-separator my-3"></div>
                            <a href="" class="side-link py-3">Add a Team Member</a>
                        </div>
                      </div>
                    </div>
                    <div class="card bg-dark">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            HOME
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#linksAccordion">
                        <div class="card-body">
                          links
                        </div>
                      </div>
                    </div>
                    <div class="card bg-dark">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            SERVICES
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#linksAccordion">
                        <div class="card-body">
                          links
                        </div>
                      </div>
                    </div>
                    <div class="card bg-dark">
                      <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            BLOG
                          </button>
                        </h2>
                      </div>
                      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#linksAccordion">
                        <div class="card-body">
                          links
                        </div>
                      </div>
                    </div>
                    <div class="card bg-dark">
                        <div class="card-header" id="headingFive">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                              CONTACT
                            </button>
                          </h2>
                        </div>
                    
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#linksAccordion">
                          <div class="card-body">
                            links
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="main position-relative">
        <nav class="bo-nav navbar bg-dark px-5 fixed-top">
                @if (Auth::check())
                <div class="d-flex align-items-center">
                    <div class="avatar" style="background-image: url('/storage/img/team/{{Auth::user()->src}}')"></div>
                    <a href="" class="nav-link mx-3">{{ Auth::user()->name }}</a>
                </div>
                @else
                <img src="/storage/img/big-logo.png" alt="" width="111">
                @endif
                <ul class="navbar-nav ml-auto">
                 <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                <li class="nav-item bg-dark">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-nFive">
                        @csrf
                    </form>
                        
                </li>
                @endguest
                </ul>
        </nav>
            <!-- Page header -->
        <div class="page-top-section bg-success">
            <div class="overlay"></div>
            <div class="container text-right">
                <div class="page-info mr-5">
                    <h2 class="text-capitalize text-dark">Page</h2>
                    <div class="page-links">
                        <a href="/" class="text-capitalize text-dark">Main</a>
                        <span class="text-capitalize text-primary">Page</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5 pb-2 px-5">
            @yield('admin-content')
        </div>
        
        
        </div>
    </main>

	

	<!--====== Javascripts & Jquery ======-->
	{{-- <script src="js/jquery-2.1.4.min.js"></script> --}}
	{{-- <script src="js/bootstrap.min.js"></script> --}}
    <script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/circle-progress.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
