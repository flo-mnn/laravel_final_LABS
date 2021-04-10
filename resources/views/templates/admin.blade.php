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
			<img src="text-success /storage/img/{{$images[0]->src}}" alt="" width="111">
			<h2>Loading.....</h2>
		</div>
	</div> --}}
    <main class="back-office-main  d-flex">
        <div class="sidebar bg-dark" id="sidebar-back">
            <div class="sidebar-inner">
                <div class="text-center mb-3 side-btn">
                    <button class="btn btn-transparent text-success" id="hide-nav">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                </div>
                <div class="text-center ">
                    <a href="/" class="btn btn-success text-primary font-weight-bold"><i class="text-primary fas fa-globe"></i><span class="side-span ml-3">TO the website</span></a>
                </div>
                <div class="accordion" id="linksAccordion">
                    @can('webmaster')
                    <div class="card bg-dark">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="text-success fas fa-users"></i> <span class="ml-3 nav-title">TEAM</span> 
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapse {{Str::contains(Route::getCurrentRoute()->uri(),"users") ? 'show' : null}}" aria-labelledby="headingOne" data-parent="#linksAccordion">
                        <div class="card-body py-4 pl-4 pr-2">
                            <a href="/admin/users/{{Auth::id()}}" class="side-link py-3"><i class="text-primary fas fa-user"></i><span class="side-span ml-3">My profile</span></a>
                            <div class="side-separator my-3"></div>
                            <a href="/admin/users/" class="side-link py-3"><i class="text-primary fas fa-list"></i><span class="side-span ml-3">Our Team</span></a>
                            @can('admin')
                            <div class="side-separator my-3"></div>
                            <a href="/admin/job_titles" class="side-link py-3"><i class="text-primary fas fa-users-cog"></i><span class="side-span ml-3">Job Titles</span></a>
                            <div class="side-separator my-3"></div>
                            <a href="/admin/users/create" class="side-link py-3"><i class="text-primary fas fa-user-plus"></i><span class="side-span ml-3">Add a Team Member</span></a>
                            @endcan
                        </div>
                      </div>
                    </div>
                    @else
                    <div class="card bg-dark">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <a class="btn btn-link btn-block text-left" href="/admin/users/{{Auth::id()}}" class="side-link py-3">
                            <i class="text-success fas fa-user"></i> <span class="ml-3 nav-title">MY PROFILE</span> 
                          </a>
                        </h2>
                      </div>
                    </div>
                    @endcan
                    @can('writer')
                    <div class="card bg-dark">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="text-success fas fa-newspaper"></i> <span class="ml-3 nav-title">BLOG</span> 
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse {{Str::contains(Route::getCurrentRoute()->uri(),"posts") ? 'show' : (Str::contains(Route::getCurrentRoute()->uri(),"comments") ? 'show' : (Str::contains(Route::getCurrentRoute()->uri(),"blog")? 'show': null ) )}}" aria-labelledby="headingTwo" data-parent="#linksAccordion">
                        <div class="card-body py-4 pl-4 pr-2 py-4 pl-4 pr-2">
                          <a href="/admin/posts/create/" class="side-link"><i class="text-primary fas fa-pen-fancy"></i><span class="side-span ml-3">Write a Blog Post</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/posts/" class="side-link"><i class="text-primary fas fa-list"></i><span class="side-span ml-3">Manage Blog Posts</span></a>
                          @can('webmaster')
                          <div class="side-separator my-3"></div>
                          <a href="/admin/comments/" class="side-link"><i class="text-primary fas fa-comment"></i><span class="side-span ml-3">Manage Blog Comments</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/blog" class="side-link"><i class="text-primary fas fa-shapes"></i><span class="side-span ml-3">Manage Blog Options</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/posts/archives" class="side-link"><i class="text-primary fas fa-archive"></i><span class="side-span ml-3">Manage Blog Archives</span></a>
                          @endcan
                        </div>
                      </div>
                    </div>
                    @endcan
                    @can('webmaster')
                    <div class="card bg-dark">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="text-success fas fa-concierge-bell"></i> <span class="ml-3 nav-title">SERVICES</span> 
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse {{Str::contains(Route::getCurrentRoute()->uri(),"services") ? 'show' : null}}" aria-labelledby="headingThree" data-parent="#linksAccordion">
                        <div class="card-body py-4 pl-4 pr-2 d-flex flex-column">
                          <a href="/admin/services/create" class="side-link "><i class="text-primary fas fa-plus"></i><span class="side-span ml-3">Add a service</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/services" class="side-link "><i class="text-primary fas fa-list"></i><span class="side-span ml-3">Manage Services</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="card bg-dark">
                      <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <i class="text-success fas fa-star"></i> <span class="ml-3 nav-title">TESTIMONIALS</span> 
                          </button>
                        </h2>
                      </div>
                      <div id="collapseFour" class="collapse {{Str::contains(Route::getCurrentRoute()->uri(),"testimonials") ? 'show' : null}}" aria-labelledby="headingFour" data-parent="#linksAccordion">
                        <div class="card-body py-4 pl-4 pr-2">
                          <a href="/admin/testimonials/create/" class="side-link"><i class="text-primary fas fa-plus"></i><span class="side-span ml-3">Add a testimonial</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/testimonials/" class="side-link"><i class="text-primary fas fa-list"></i><span class="side-span ml-3">Manage Testimonials</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="card bg-dark">
                        <div class="card-header" id="headingFive">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                              <i class="text-success fas fa-envelope"></i> <span class="ml-3 nav-title">CONTACT</span> 
                            </button>
                          </h2>
                        </div>
                    
                        <div id="collapseFive" class="collapse {{Str::contains(Route::getCurrentRoute()->uri(),"offices") ? 'show' : (Str::contains(Route::getCurrentRoute()->uri(),"newsletters") ? 'show' : (Str::contains(Route::getCurrentRoute()->uri(),"emails")? 'show': null ) )}}" aria-labelledby="headingFive" data-parent="#linksAccordion">
                          <div class="card-body py-4 pl-4 pr-2">
                            <a href="/admin/offices/" class="side-link"><i class="text-primary fas fa-at"></i><span class="side-span ml-3">Our Contact Info</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/newsletters/" class="side-link"><i class="text-primary fas fa-paper-plane"></i><span class="side-span ml-3">Newsletter</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/emails/" class="side-link"><i class="text-primary fas fa-mail-bulk"></i><span class="side-span ml-3">Contact Form</span></a>
                          </div>
                        </div>
                    </div>
                    <div class="card bg-dark">
                        <div class="card-header" id="headingSix">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                              <i class="text-success fas fa-cogs"></i> <span class="ml-3 nav-title">MANAGE CONTENT</span> 
                            </button>
                          </h2>
                        </div>
                    
                        <div id="collapseSix" class="collapse {{Str::contains(Route::getCurrentRoute()->uri(),"carousels") ? 'show' : (Str::contains(Route::getCurrentRoute()->uri(),"abouts") ? 'show' : (Str::contains(Route::getCurrentRoute()->uri(),"titles")? 'show': (Str::contains(Route::getCurrentRoute()->uri(),"footers")? 'show': null) ) )}}" aria-labelledby="headingSix" data-parent="#linksAccordion">
                          <div class="card-body py-4 pl-4 pr-2">
                            <a href="/admin/carousels/" class="side-link"><i class="text-primary fas fa-images"></i><span class="side-span ml-3">Slider Images</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/abouts/" class="side-link"><i class="text-primary fas fa-info"></i><span class="side-span ml-3">About Us</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/titles" class="side-link"><i class="text-primary fas fa-compass"></i><span class="side-span ml-3">Navigation & Titles</span></a>
                          <div class="side-separator my-3"></div>
                          <a href="/admin/footers" class="side-link"><i class="text-primary fas fa-copyright"></i><span class="side-span ml-3">Copyright</span></a>
                          </div>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
        <div class="main position-relative" id="main-back">
        <nav class="bo-nav navbar bg-dark px-5 fixed-top">
                @if (Auth::check())
                <div class="d-flex align-items-center">
                  <a href="/admin/users/{{Auth::id()}}" class="avatar-bo">
                    <div class="avatar" style="background-image: url('/storage/img/team/{{Auth::user()->src}}')"></div>
                  </a>
                    <a href="/admin/users/{{Auth::id()}}" class="nav-link mx-3">{{ Auth::user()->name }}</a>
                </div>
                @else
                <img src="text-success /storage/img/big-logo.png" alt="" width="111">
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
        @if (!Str::contains(Route::getCurrentRoute()->uri(),'create') && !Str::contains(Route::getCurrentRoute()->uri(),'edit') && Route::getCurrentRoute()->uri() != "admin");
            <!-- Page header -->
        <div class="page-top-section bg-success">
            <div class="overlay"></div>
            <div class="container text-right">
                <div class="page-info mr-5">
                    <h2 class="text-capitalize text-dark">{{$currentPage}}</h2>
                    <div class="page-links">
                        <a href="/admin" class="text-capitalize text-dark">Dashboard</a>
                        @if ($middlePage)
                        <a href="/" class="text-capitalize text-dark">{{$middlePage}}</a>
                        @endif
                        <span class="text-capitalize text-primary">{{$currentPage}}</span>
                    </div>
                </div>
            </div>
        </div>
        @else
        <style>
          #yield-admin{
            margin-top: 91px;
          }
        </style>
        @endif
        <div class="pt-5 pb-2 px-5" id="yield-admin">
            @yield('admin-content')
        </div>
        
        
        </div>
    </main>

	
    <script>
      let sidebar = document.getElementById('sidebar-back');
      let main = document.getElementById('main-back');
      let hideBtn = document.getElementById('hide-nav');
      let ichevron = hideBtn.querySelector('i');
      let sideSpans = sidebar.querySelectorAll('.side-span');
      let sideTitles = sidebar.querySelectorAll('.nav-title');
      function changeNav(){
        let toggle = sidebar.classList.toggle('closed')
        if (toggle) {
          sidebar.style.width = "fit-content";
          main.style.width = 'auto';
          main.style.marginLeft = '90px';
          for (let i = 0; i < sideSpans.length; i++) {
            const el = sideSpans[i];
            el.classList.add('d-none');
          }
          for (let i = 0; i < sideTitles.length; i++) {
            const el = sideTitles[i];
            el.classList.add('d-none');
          }
          ichevron.classList.replace('fa-chevron-left','fa-chevron-right');
        } else {
          for (let i = 0; i < sideSpans.length; i++) {
            const el = sideSpans[i];
            el.classList.remove('d-none');
          }
          for (let i = 0; i < sideTitles.length; i++) {
            const el = sideTitles[i];
            el.classList.remove('d-none');
          }
          sidebar.style.width = "20%";
          main.style.width = '80%';
          main.style.marginLeft = '20%';
          ichevron.classList.replace('fa-chevron-right','fa-chevron-left');

        };
      }
      sidebar.addEventListener('dblclick',changeNav)
      hideBtn.addEventListener('click',changeNav)
    </script>
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
