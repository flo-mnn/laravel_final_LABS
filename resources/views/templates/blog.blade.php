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
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
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
		.overlay {
			background-image: url("{{asset('/storage/img/overlay.png')}}");
		}
	</style>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="/storage/img/{{$images[0]->src}}" alt="" width="111">
			<h2>Loading.....</h2>
		</div>
	</div>

	@include('partials.header')
	@include('partials.page_header')
    <!-- page section -->
	<div class="page-section spad position-relative">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
                    @yield('blog-content')

				</div>
				<!-- Sidebar area -->
				<div class="col-md-4 col-sm-5 sidebar" style="position: sticky !important; top: 0; height: fit-content;">
					<!-- Single widget -->
					<div class="widget-item">
						<form action="{{ route('search') }}" class="search-form" method="GET">
							<input type="text" placeholder="Search" name="search" required>
							<button class="search-btn" type="submit"><i class="flaticon-026-search"></i></button>
						</form>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Categories</h2>
						<ul>
							@foreach ($categories as $category)
							@if ($category->posts->where('validated',1)->isNotEmpty())
							<li><a class="{{Str::contains(url()->current(),'categories') ? ($category_active->id == $category->id ? 'text-success' : null) : null}}" href="/blog/categories/{{$category->id}}">{{$category->category}}</a></li>
							@endif
							@endforeach
						</ul>
					</div>
					<!-- Single widget -->
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Tags</h2>
						<ul class="tag">
							@foreach ($tags as $tag)
							@if ($tag->posts->where('validated',1)->isNotEmpty())
							<li class="{{Str::contains(url()->current(),'tags') ? ($tag_active->id == $tag->id ? 'bg-primary text-success' : null) : null}}"><a href="/blog/tags/{{$tag->id}}" class="{{Str::contains(url()->current(),'tags') ? ($tag_active->id == $tag->id ? 'text-success' : null) : null}}">{{$tag->tag}}</a></li>
							@endif
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- page section end-->
    @include('partials.newsletter')
    @include('partials.footer')
	


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
