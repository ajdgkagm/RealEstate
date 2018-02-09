<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Real Estate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
     
	 /*
inspired from http://codepen.io/Rowno/pen/Afykb
& https://jsfiddle.net/q0rgL8ws/
*/
.carousel-fade .carousel-inner .item {
  opacity: 0;
  transition-property: opacity;
    overflow:hidden;
}
.item.active img {
    transition: transform 5000ms linear 0s;
    /* This should be based on your carousel setting. For bs, it should be 5second*/
    transform: scale(1.05, 1.05);
}
.carousel-fade .carousel-inner .active {
  opacity: 1;
}

.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {

  opacity: 0;
  z-index: 1;
}

.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}

.carousel-fade .carousel-control {
  z-index: 2;
}

/*
WHAT IS NEW IN 3.3: "Added transforms to improve carousel performance in modern browsers."
now override the 3.3 new styles for modern browsers & apply opacity
*/
@media all and (transform-3d), (-webkit-transform-3d) {
    .carousel-fade .carousel-inner > .item.next,
    .carousel-fade .carousel-inner > .item.active.right {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.prev,
    .carousel-fade .carousel-inner > .item.active.left {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.next.left,
    .carousel-fade .carousel-inner > .item.prev.right,
    .carousel-fade .carousel-inner > .item.active {
      opacity: 1;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
}

	 
        </style>
    </head>
    <body>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="lesser/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="lesser/css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="lesser/css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="lesser/css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="lesser/css/style.css">

	<!-- Modernizr JS -->
	<script src="lesser/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	
	
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><i class="sl-icon-home"></i><a href="index.html">MC Realty</a></h1>
				<nav role="navigation">
					<ul>
					        
           
						<li><a href="index.html">Home</a></li>
						<li><a href="blog.html">About Us</a></li>
						<li><a href="portfolio.html">Projects</a></li>
						<li><a href="services.html">Guides</a></li>
						<li><a href="about.html">News & Events</a></li>
						<li><a href="contact.html">Contact Us</a></li>
							<nav role="navigation">
					
					      
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if(Auth::user()->hasRole('admin'))
                            <a href="{{ url('/admin') }}">Home</a>
                        @else
                            <a href="{{ url('/home') }}">Home</a>
                        @endif
                        <a href="{{ route('property.index') }}">Properties</a>
                    @else
                        <li><a href="{{ route('property.index') }}">Properties</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                
            @endif
			
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div id="fh5co-intro-section">
		<div class="container">
			<div class="row">
				
				<div class="container">
<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner carousel-zoom">
        <div class="active item"><img class="img-responsive" src="lesser/images/model1.jpg" width="100%" height="50%">
          <div class="carousel-caption">
            <h2>Title</h2>
            <p>Description</p>
          </div>
        </div>
        <div class="item"><img class="img-responsive" src="lesser/images/model2.jpg" width="100%" height="50%">
          <div class="carousel-caption">
            <h2>Title</h2>
            <p>Description</p>
          </div>
        </div>
        <div class="item"><img class="img-responsive" src="lesser/images/model3.jpg" width="100%" height="50%">
          <div class="carousel-caption">
            <h2>Title</h2>
            <p>Description</p>
          </div>
        </div>
       </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#carousel" data-slide="prev">‹</a>
    <a class="carousel-control right" href="#carousel" data-slide="next">›</a>
</div>
</div>
				
				</div>
			</div>
		</div>

				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Check out our houses</h2>
					<p>HOUSE CATEGORIES</p>
				</div>
	<div id="fh5co-featured-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<a href="#" class="featured-grid" style="background-image: url(lesser/images/model1.jpg);">
						<div class="desc">
							<h3>Clustered Bungalow</h3>
							<span>Web Design</span>
						</div>
					</a>
				</div>
				<div class="col-md-6">
					<a href="#" class="featured-grid featured-grid-2" style="background-image: url(lesser/images/model2.jpg);">
						<div class="desc">
							<h3>Bungalow</h3>
							<span>Application</span>
						</div>
					</a>
					<div class="row">
						<div class="col-md-6">
							<a href="#" class="featured-grid featured-grid-2" style="background-image: url(lesser/images/model3.jpg);">
								<div class="desc">
									<h3>Townhouse</h3>
									<span>Illustration</span>
								</div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="#" class="featured-grid featured-grid-2" style="background-image: url(lesser/images/model4.jpg);">
								<div class="desc">
									<h3>Captured</h3>
									<span>Photo</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-services-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Our Awesome Services</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 services-inner text-center">
					<span><i class="sl-icon-graph"></i></span>
					<h3>Finance Dashboard</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				</div>
				<div class="col-md-4 services-inner text-center">
					<span><i class="sl-icon-heart"></i></span>
					<h3>Made with Love</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				</div>
				<div class="col-md-4 services-inner text-center">
					<span><i class="sl-icon-key"></i></span>
					<h3>Help &amp; Support</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				</div>

			</div>
		</div>
	</div>
	<div id="fh5co-blog-section" class="fh5co-grey-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Our Recent Blog</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="blog-inner">
						<a href="#"><img class="img-responsive" src="images/image_4.jpg" alt="Blog"></a>
						<div class="desc">
							<h3><a href="#">New iPhone 6 Released</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<p><a href="#" class="btn btn-primary btn-outline with-arrow">Read More<i class="icon-arrow-right"></i></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="blog-inner">
						<a href="#"><img class="img-responsive" src="images/image_5.jpg" alt="Blog"></a>
						<div class="desc">
							<h3><a href="#">Start your day with a beautiful appearance</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<p><a href="#" class="btn btn-primary btn-outline with-arrow">Read More<i class="icon-arrow-right"></i></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="blog-inner">
						<a href="#"><img class="img-responsive" src="images/image_6.jpg" alt="Blog"></a>
						<div class="desc">
							<h3><a href="#">Bookmarksgrove right</a></h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<p><a href="#" class="btn btn-primary btn-outline with-arrow">Read More<i class="icon-arrow-right"></i></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-client-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Our Happy Clients</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 text-center">
					<div class="testimony">
						<span class="quote"><i class="icon-quote-right"></i></span>
						<blockquote>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<span>Athan Smith, via <a href="#" class="icon-twitter twitter-color"></a></span>
						</blockquote>
					</div>
				</div>
				<div class="col-md-6 text-center">
					<div class="testimony">
						<span class="quote"><i class="icon-quote-right"></i></span>
						<blockquote>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<span>Athan Smith, via <a href="#" class="icon-google-plus googleplus-color"></a></span>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<footer id="fh5co-footer" role="contentinfo">
	
		<div class="container">
			<div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>CONTACT DETAILS</h3>
				<p>09152911239 - Marc Celemin</p>
				<p>092821543934</p>
			</div>
			<div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Our Location</h3>
				<ul class="float">
					<li><a href="#">Batangas</a></li>
					<li><a href="#">Lipa</a></li>
					<li><a href="#">Tanauan</a></li>
					<li><a href="#">Sto Tomas</a></li>
				</ul>
				<ul class="float">
					<li><a href="#">Calamba</a></li>
					<li><a href="#">Laguna</a></li>
					<li><a href="#">Quezon</a></li>
					<li><a href="#">Rizal</a></li>
				</ul>

			</div>

			<div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Follow Us</h3>
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i> Twitter</a></li>
					<li><a href="#"><i class="icon-facebook"></i> Facebook</a></li>
					<li><a href="#"><i class="icon-google-plus"></i> Google Plus</a></li>
					<li><a href="#"><i class="icon-instagram"></i> Instagram</a></li>
				</ul>
			</div>
			
			
			<div class="col-md-12 fh5co-copyright text-center">
				<p>&copy; 2018 MC Realty & Services </p>	
			</div>
			
		</div>
	</footer>
	</div>
	
	<script>
	
	
	</script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

    </body>
</html>
