	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="/storage/img/{{$images[0]->src}}" height="32" alt="logo"><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
				<li class="{{Route::getCurrentRoute()->uri() == '/' ? 'active' : null}}"><a href="/" class="text-capitalize">{{$navlinks[0]->link}}</a></li>
				<li class="{{Route::getCurrentRoute()->uri() == 'services' ? 'active' : null}}"><a href="/services" class="text-capitalize">{{$navlinks[1]->link}}</a></li>
				<li class="{{Route::getCurrentRoute()->uri() == 'blog' ? 'active' : null}}"><a href="/blog" class="text-capitalize">{{$navlinks[2]->link}}</a></li>
				<li class="{{Route::getCurrentRoute()->uri() == 'contact' ? 'active' : null}}"><a href="/contact" class="text-capitalize">{{$navlinks[3]->link}}</a></li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->