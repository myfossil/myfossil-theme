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

<?php 
if ( is_user_logged_in() && is_front_page() ) {

	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	
	            <?php bp_get_template_part( 'activity/index' ); ?>
	
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer(); ?>
	
<?php } 
else {  ?>
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
                        <img id="fossil-logo" src="/wp-content/themes/myfossil/static/img/myfossil-logo-white.png" alt="myFOSSIL" />
                    </a>
                </h1>
                <nav id="nav">
                    <ul>
                        <li><a href="/activity"><span class="icon major fa-share fa-fw accent3"></span>
                        <div class="description">
                            <span>Community</span>
                            <p class="test"> Digitize your personal fossil collection and discuss with the community. </p>
                        </div></a></li>
                       <li><a href="/fossils"><span class="icon major fa-map-marker fa-fw accent2"></span>
                        <div class="description">
                            <span>Fossils</span>
                            <p> Find out whats in your backyard or just start digging.</p>
                        </div></a></li>
                        <li><a href="/members"><span class="icon major fa-group fa-fw accent4"></span>
                        <div class="description">
                            <span>Collaborate</span>
                            <p> Opportunities to improve our understanding of natural history.</p>
                        </div></a></li>
                          <li><a id="resources" href="#"><span class="icon major fa-graduation-cap fa-fw accent5"></span>
                        <div class="description">
                            <span>Resources</span>
                            <p> Expand your knowledge with our educational resources, workshops, and events.</p>
                        </div></a>
                            <ul class="resources-menu">
                                <li><a href="http://www.myfossil.org/resources/find-fossils/">Find Fossils</a></li>
                                <li><a href="http://www.myfossil.org/fossil-parks/">Fossil Parks</a></li>
                                <li><a href="http://www.myfossil.org/resources/workshops/">Workshops</a></li>
                                <li><a href="http://www.myfossil.org/resources/field-opportunities/">Field Opportunities</a></li>
                                <li><a href="http://www.myfossil.org/resources/national-fossil-day/">National Fossil Day</a></li>
                            </ul>
                        </li>
                       
                    </ul>
                </nav>
                <nav style="display:none" id="left_nav">
                    <ul>
                        <li><a href="/activity">Community</a></li>
                        <li><a href="/fossils">Fossils</a></li>
                        <li><a href="/members">Collaborate</a></li>
                        <li><a href="#">Resources</a>
                            <ul>
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
                <p id="statement">Building connections in the paleontological community.</p>
                <div class="sign-in">
                    <a href="<?=wp_login_url() ?>" class="button">Sign In</a>
                </div>

                <p style="background:#000;opacity:0.75;padding:25px;">We are currently in the beta-testing phase of website development.  If you would like to help us with beta-testing, please contact the FOSSIL Project Coordinator, Eleanor Gardner, at <a href="mailto:fossil@flmnh.ufl.edu">fossil@flmnh.ufl.edu</a></p>


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
                    <!--<div class="flexible-container">
                        <div id="map-canvas" style="width: 100%; height: 600px;" />
                    </div>-->
                </section>

                <a name="learn-more"></a>
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
            <div class="row">
                <div id="footer-disclaimer" class="col-xs-12 col-lg-12" style="margin:35px 35px">
                    <p style="font-size:12px;line-height:1.8em">
                    Development of myFOSSIL is based upon work largely
                    supported by the National Science Foundation under Grant
                    No. DRL-1322725. Any opinions, findings, and conclusions or
                    recommendations expressed in this material are those of the
                    authors and do not necessarily reflect the views of the
                    National Science Foundation.
                    </p>
                </div><!-- column -->
            </div><!-- .row --> 
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
<?php } ?>
