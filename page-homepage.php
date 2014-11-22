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

if ( is_user_logged_in() && is_front_page() )
    wp_redirect( '/activity' );
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
		<script src="/wp-content/themes/myfossil/static/js/landing/jquery.dropotron.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/landing/jquery.scrollgress.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/landing/skel.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/landing/skel-layers.min.js"></script>
		<script src="/wp-content/themes/myfossil/static/js/landing/init.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="/wp-content/themes/myfossil/static/css/skel.min.css" />
			<link rel="stylesheet" href="/wp-content/themes/myfossil/static/css/style-homepage.min.css" />
			<link rel="stylesheet" href="/wp-content/themes/myfossil/static/css/style-wide.min.css" />
		</noscript>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lte IE 8]><link rel="stylesheet" href="/wp-content/themes/myfossil/static/css/ie/v8.css" /><![endif]-->
        <style>
        .avatar {
            border-radius: 100px;
        }
        </style>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1>
                    <a href="/">
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
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
                <h2>Social Paleontology</h2>
                <p>Building connections in the paleontological community.</p>
				<ul class="actions">
                    <li><a href="<?=wp_login_url( '/activity' ) ?>" class="button">Sign In</a></li>
					<li><a href="#learn-more" class="button">Learn More</a></li>
				</ul>
			</section>

		<!-- Main -->
			<section id="main" class="container">
		
				<section class="box special">
					<header class="major">
						<h2>We're building a community of
						<br />
						amateur and professional paleontologists.</h2>
                        <p>
                        Meet fossil enthusiasts and paleontologists. Share your
                        fossil collection and contribute to science.
                        </p>
					</header>
					<span class="featured"></span>
                    <div class="flexible-container">
                        <div id="map-canvas" style="width: 100%; height: 600px;" />
                    </div>
				</section>
						
                <a name="learn-more"></a>
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
			    <section class="special">
                    <div class="row uniform half collapse-at-2">
                        <div class="6u">
                            <h3>Sign in</h3>
                            <div class="box">
                                <?php wp_login_form(); ?>
                            </div>
                        </div>
                        <div class="6u">
                            <div class="updates">
                                <h3>Recent Activity</h3>
                                <ul>
                                <?php if ( bp_has_activities( 'display_comments=false&per_page=8' ) ) : ?>
                                    <?php while ( bp_activities() ) : bp_the_activity(); ?>
                                        <li class="box">
                                            <?php bp_activity_avatar(); ?>
                                            <span class="update">
                                                <?=$activities_template->activity->action; ?>
                                            </span>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                </ul>
                            </div>
                        </div>
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

        <!-- Google Maps -->
        <script type="text/javascript"
              src="https://maps.googleapis.com/maps/api/js"></script>

        <script type="text/javascript">
            // {{{ init_map
            function init_map() {
                var mapOptions = {
                        center: { 
                            lat: 39.50, 
                            lng: -98.35
                        },
                        zoom: 4
                    };

                var map = new google.maps.Map(
                        document.getElementById("map-canvas"), mapOptions );

                <?php
                    // get fossil listing
                    /*
                    global $wpdb;
                    use \myFOSSIL\Plugin\Specimen\FossilOccurence;

                    $tpl = "SELECT * FROM %s;";
                    $sql = sprintf( $tpl, FossilOccurence::get_table_name() );

                    $fossils = array();
                    foreach ( $wpdb->get_results( $sql ) as $fp ) {
                        $fossil = new FossilOccurence;
                        $fossil->id = $fp->id;
                        $fossil->taxon_id = $fp->taxon_id;
                        $fossil->location_id = $fp->location_id;

                        $fossils[] = ( 
                                array(
                                    'name' => $fossil->taxon->name,
                                    'latitude' =>  $fossil->location->latitude,
                                    'longitude' =>  $fossil->location->longitude,
                                )
                            );
                    }

                    printf( 'fossils = %s', json_encode( $fossils ) );
                    */
                ?>

                // Add a marker for each place on the map.
                /*
                fossils.forEach(
                    function( fossil ) {
                        // Produce the marker on the map.
                        var marker = new google.maps.Marker(
                                {
                                    position: new google.maps.LatLng(
                                        fossil.latitude,
                                        fossil.longitude
                                    ),
                                    map: map,
                                    icon: '/wp-content/themes/myfossil/static/img/mine-map-icon.png'
                                }
                            );

                        // Create an info pop-up window for the marker.
                        var info = new google.maps.InfoWindow(
                                { content: fossil.name }
                            );

                        // Show additional information when clicked.
                        ( function( marker, fossil ) {
                            google.maps.event.addListener( marker, 'click', 
                                    function() {
                                        info.setContent( 
                                            '<h3>' + fossil.name + '</h3>'
                                        ),
                                        info.open( map, marker );
                                    }
                                );
                        } )( marker, fossil );
                    }
                );
                */
            }
            // }}}

            // Load up Google map with markers.
            $( function() {
                google.maps.event.addDomListener( window, 'load', init_map );
            });
        </script>
	</body>
</html>
