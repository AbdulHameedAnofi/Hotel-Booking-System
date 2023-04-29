@include('front.layouts.header')

<div class="banner-top">
    <div class="social-bnr-agileits">
        <ul class="social-icons3">
        <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
        <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
        <li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
        <li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
            </ul>
    </div>
    <div class="contact-bnr-w3-agile">
        <ul>
            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">{{ getSystemSettings('company_email') }}</a></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i>{{ getSystemSettings('phone') }}</li>	
            <li class="s-bar">
                <div class="search">
                    <input class="search_box" type="checkbox" id="search_box">
                    <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                    <div class="search_form">
                        <form action="#" method="post">
                            <input type="search" name="Search" placeholder=" " required=" " />
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
	<div class="w3_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1><a class="navbar-brand" href="{{ route('welcome') }}">Resort <span>Inn</span><p class="logo_w3l_agile_caption">Your Dreamy Resort</p></a></h1>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item menu__item--current"><a href="{{ route('welcome') }}" class="menu__link">Home</a></li>
							<li class="menu__item"><a href="#rooms" class="menu__link scroll">Rooms</a></li>
							<li class="menu__item"><a href="#contact" class="menu__link scroll">Contact Us</a></li>
							@guest 
							<li class="menu__item">
								<a href="{{ route('front.login') }}" class="menu__link scroll">Login</a>
							</li>
							<li class="menu__item">
								<a href="{{ route('front.register') }}" class="menu__link scroll">Register</a>
							</li>
							@endguest
							@auth
							<li class="menu__item">
								<a href="{{ route('logout') }}" class="menu__link scroll">Logout</a>
							</li>
							<li class="menu__item">
								<a href="{{ route('myBooking') }}" class="menu__link scroll">My Booking</a>
							</li>
							@endauth
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>

	<div id="home" class="w3ls-banner">
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="w3layouts-banner-top">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>Star Hotel</h4>
									<h3>We know what you love</h3>
										<p>Welcome to our hotels</p>
									<div class="agileits_w3layouts_more menu__item">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
			</div>
								</div>	
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--banner Slider starts Here-->
		</div>
		    <div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
			</div>
	</div>	

    <!-- content section -->
    
    @yield('centent')

    @include('front.layouts.footer')