<?php
/**
 * Template Name: Landing
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package myfossil
 */
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>myFOSSIL</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="/wp-content/themes/myfossil/static/css/ie/html5shiv.js"></script><![endif]-->
		<script src="/wp-content/themes/myfossil/static/js/jquery.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/jquery.dropotron.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/jquery.scrollgress.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/skel.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/skel-layers.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/init.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="/wp-content/themes/myfossil/static/css/skel.min.css" />
			<link rel="stylesheet" href="/wp-content/themes/myfossil/static/css/style-homepage.min.css" />
			<link rel="stylesheet" href="/wp-content/themes/myfossil/static/css/style-wide.min.css" />
		</noscript>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lte IE 8]><link rel="stylesheet" href="/wp-content/themes/myfossil/static/css/ie/v8.css" /><![endif]-->
        <style>
        </style>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1>
                    <a href="index.html">
                        <img src="/wp-content/themes/myfossil/static/img/myfossil-logo-white-small.png" alt="myFOSSIL" />
                    </a>
                </h1>
				<nav id="nav">
					<ul>
                        <li><a href="/activity">Community</a></li>
                        <li><a href="/fossils">Fossils</a></li>
                        <li><a href="/members">Collaborate</a></li>
                        <li><a href="#">Resources</a>
                            <ul class="dropdown-menu">
                                <li><a href="http://www.myfossil.org/resources/find-fossils/">Find Fossils</a></li>
                                <li><a href="http://www.myfossil.org/fossil-parks/">Fossil Parks</a></li>
                                <li><a href="http://www.myfossil.org/resources/workshops/">Workshops</a></li>
                                <li><a href="http://www.myfossil.org/resources/field-opportunities/">Field Opportunities</a></li>
                                <li><a href="http://www.myfossil.org/resources/national-fossil-day/">National Fossil Day</a></li>
                            </ul>
                        </li>
						<li><a href="<?=wp_login_url( "/activity" ) ?>" class="button">Sign In</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
                <h2>Social Paleontology</h2>
                <p>Building connections in the paleontological community.</p>
				<ul class="actions">
					<li><a href="<?=wp_login_url( "/activity" ) ?>" class="button special">Sign In</a></li>
					<li><a href="#" class="button">Learn More</a></li>
				</ul>
			</section>

		<!-- Main -->
			<section id="main" class="container">
		
				<section class="box special">
					<header class="major">
						<h2>We're building a community of
						<br />
						amateur and professional paleontologists.</h2>
                        <h3>Come meet us at GSA 2014!</h3>
                        <p>
                        Meet fossil enthusiasts and paleontologists. Share your
                        fossil collection and contribute to science.
                        <br />
                        FOSSIL will be at the the Geological Society of America
                        Annual Meeting in Vancouver (Oct. 19-22, 2014). We'll
                        get you connected!
                        </p>
					</header>
					<span class="featured"></span>
                    <div class="flexible-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d83328.79048033235!2d-123.123904!3d49.25697769999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1413404509753" width="600" height="450" frameborder="0" style="border:0"></iframe>
                    </div>
				</section>
						
				<section class="box special features">
					<div class="features-row">
						<section>
							<span class="icon major fa-map-marker fa-fw accent2"></span>
							<h3>Explore</h3>
							<p>Find out whats in your backyard or just start digging.</p>
						</section>
						<section>
							<span class="icon major fa-share fa-fw accent3"></span>
							<h3>Share</h3>
							<p>Digitize your personal fossil collection and discuss with the community.</p>
						</section>
					</div>
					<div class="features-row">
						<section>
							<span class="icon major fa-group fa-fw accent4"></span>
							<h3>Collaborate</h3>
							<p>Opportunities to improve our understanding of natural history.</p>
						</section>
						<section>
							<span class="icon major fa-graduation-cap fa-fw accent5"></span>
							<h3>Learn</h3>
							<p>Expand your knowledge with our educational resources, workshops, and events.</p>
						</section>
					</div>
				</section>
					
			</section>
			
		<!-- CTA -->
			<section id="cta" style="display: none">
				
				<h2>Sign up for our newsletter</h2>
				<p>We'll keep you posted.</p>
				
				<form>
					<div class="row uniform half collapse-at-2">
						<div class="8u">
							<input type="email" name="email" id="email" placeholder="Email Address" />
						</div>
						<div class="4u">
							<input type="submit" value="Sign Up" class="fit" />
						</div>
					</div>
				</form>
				
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="https://www.facebook.com/TheFossilProject" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="https://twitter.com/projectFOSSIL" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://github.com/myfossil" class="icon fa-github"><span class="label">Github</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; myFOSSIL. All rights reserved.</li>
				</ul>
			</footer>

	</body>
</html>
