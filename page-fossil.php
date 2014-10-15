<?php
/**
 * Template Name: Fossil
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
get_header(); 

use \myFOSSIL\Plugin\Specimen\FossilOccurence;

$fossil = new FossilOccurence;
$fossil->id = 1;
$fossil->load();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <h1>Fossil atmoapps/<?=sprintf( "%04d", $fossil->id ) ?></h1>
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                    <h2>Classification</h2>

                    <h4>Common Name</h3>
                    <p style="font-style: italic">
                        <?=$fossil->taxon->common_name ? $fossil->taxon->common_name : $fossil->taxon->name ?>
                    </p>

                    <table class="table table-hover table-condensed">
                        <tr class="sr-only">
                            <th>Taxonomy Level</th>
                            <th>Value</th>
                            <th>Options</th>
                        </tr>
                        <?php
                        foreach ( array( 'phylum', 'class', 'order', 'family', 'genus', 'species' ) as $k ):
                        ?>
                            <tr>
                                <td><?=ucwords( $k ) ?></td>
                                <?php if ( $v = @$fossil->{ $k }->name ): ?>
                                    <td><?=$v ?></td>
                                <?php else: ?>
                                    <td><span class="text-muted">Unknown</span></td>
                                <?php endif; ?>
                                <td>
                                    <a class="disabled">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <h2>Dimensions</h2>
                    <table class="table table-hover table-condensed">
                        <tr class="sr-only">
                            <th>Dimension</th>
                            <th>Value</th>
                        </tr>
                        <?php foreach ( array( 'length', 'width', 'height' ) as $k ) { ?>
                            <tr>
                                <td><?=ucwords( $k ) ?></td>
                                <?php if ( $v = $fossil->{ $k } ): ?>
                                    <td><?=$v ?></td>
                                <?php else: ?>
                                    <td><span class="text-muted">Unknown</span></td>
                                <?php endif; ?>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <h2>Images</h2>
                    <img class="img-responsive" src="http://placehold.it/350x350" />
                </div>
            </div>

            <h2>Location</h2>
            <div class="row">
                <div id="map-container" class="hidden-xs hidden-sm col-md-6 col-lg-6" style="height: 300px">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <table class="table table-hover table-condensed">
                        <?php
                        foreach ( array( 'country', 'state', 'county',
                                'latitude', 'longitude', 'notes' ) as $k ) {
                            if ( $v = $fossil->location->{ $k } ) { ?>
                                <tr>
                                    <td><?=ucwords( $k ) ?></td>
                                    <td><?=$v ?></td>
                                </tr>
                                <?php
                            }
                        } ?>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h2>Geochronology</h2>
                    <table class="table table-hover table-condensed">
                        <?php
                        foreach ( array( 'era', 'period', 'epoch', 'age' ) as $k ):
                            ?>
                            <tr>
                                <td><?=ucwords( $k ) ?></td>
                                <td><span class="text-muted">Unknown</span></td>
                            </tr>
                            <?php
                        endforeach; 
                        ?>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h2>Lithostratigraphy</h2>
                    <table class="table table-hover table-condensed">
                        <?php
                        foreach ( array( 'group', 'formation', 'member', 'notes' ) as $k ):
                            ?>
                            <tr>
                                <td><?=ucwords( $k ) ?></td>
                                <td><span class="text-muted">Unknown</span></td>
                            </tr>
                            <?php
                        endforeach; ?>
                    </table>
                </div>
            </div>
         
		</main><!-- #main -->
	</div><!-- #primary -->

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>    
        function init_map() {
            var var_location = new google.maps.LatLng( 
                    <?=$fossil->location->latitude ?>, 
                    <?=$fossil->location->longitude ?> 
                );

            var var_mapoptions = {
                    center: var_location,
                    zoom: 14
                };

            var var_marker = new google.maps.Marker(
                    {
                        position: var_location,
                        map: var_map,
                        title: "<?=$fossil->taxon->name ?>"
                    }
                );

            var var_map = new google.maps.Map( 
                    document.getElementById("map-container"), var_mapoptions
                );

            var_marker.setMap(var_map); 
        }

        google.maps.event.addDomListener(window, 'load', init_map);
    </script>

<?php get_footer(); ?>
