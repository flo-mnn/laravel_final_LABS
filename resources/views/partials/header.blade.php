	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="{{asset('/storage/img/logo.png')}}" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
				<li class="{{Route::getCurrentRoute()->uri() == '/' ? 'active' : null}}"><a href="/">Home</a></li>
				<li class="{{Route::getCurrentRoute()->uri() == 'services' ? 'active' : null}}"><a href="/services">Services</a></li>
				<li class="{{Route::getCurrentRoute()->uri() == 'blog' ? 'active' : null}}"><a href="/blog">Blog</a></li>
				<li class="{{Route::getCurrentRoute()->uri() == 'contact' ? 'active' : null}}"><a href="/contact">Contact</a></li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->