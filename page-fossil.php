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
$fossil->id = $wp_query->query_vars['page'];

if ( $fossil->id ):
$fossil->load();
?>
	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <img class="img-responsive" src="http://placehold.it/1024x1024" />
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                    <h1>Fossil atmoapps/<?=sprintf( "%04d", $fossil->id ) ?></h1>
            
                    <ul class="list-inline">
                        <li>Author: <a>Jane Doe</a></li>
                        <li>Updated: <?=$fossil->created_at ?></li>
                        <li>Location: <?=$fossil->location->country ?></li>
                        <?php if ( $fossil->pbdbid ): ?>
                            <li>PBDB: <a href="<?=$fossil->pbdb->url(); ?>&show=phylo"><?=$fossil->pbdbid ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <button class="btn btn-primary btn-block">Follow</button>
                </div>
            </div>

            <hr />
            
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a>Information</a></li>
                        <li class="inactive disabled"><a>History</a></li>
                        <li class="inactive disabled"><a>Contributors</a></li>
                    </ul>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                    <h2>Classification</h2>

                    <h4>Name</h3>
                    <p style="font-style: italic">
                        <?=@$fossil->taxon->common_name ? $fossil->taxon->common_name : $fossil->taxon->name ?>
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
                                <?php if ( $v = $fossil->{ $k }->name ): ?>
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

<?php
else:
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <h1>Fossils</h1>
        <hr />

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Taxon</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tpl = "SELECT * FROM %s;";
                $sql = sprintf( $tpl, FossilOccurence::get_table_name() );

                foreach ( $wpdb->get_results( $sql ) as $fp ) {
                    $fossil = new FossilOccurence;
                    $fossil->id = $fp->id;
                    $fossil->taxon_id = $fp->taxon_id;
                    $fossil->location_id = $fp->location_id;
                ?>
                <tr>
                    <td><a href="/fossils/<?=$fossil->id ?>">myfossil/<?=sprintf( "%04d", $fossil->id ) ?></a></td>
                    <td><?=$fossil->taxon->name ?></td>
                    <td><?=$fossil->location->country ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
endif;
?>
<?php get_footer(); ?>