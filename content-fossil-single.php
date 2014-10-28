<?php
use myFOSSIL\Plugin\Specimen\Fossil;
$fossil = new Fossil( $page );
?>
<div id="primary" class="content-area container">
    <main id="main" class="site-main" role="main">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                <img class="img-responsive" src="http://placehold.it/1024x1024" />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                <h1>Fossil <?=sprintf( "%06d", $fossil->id ) ?></h1>
                <ul class="list-inline">
                    <li>Author: <?=$fossil->author ?></li>
                    <li>Updated: <?=$fossil->updated_at ?></li>
                    <li>Location: <?=$fossil->location ?></li>
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
                <span class="sr-only" id="taxon-name"><?=$fossil->taxon->name ?></span>

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
                            <?php if ( 1 == 2 && $v = $fossil->{ $k }->name ): ?>
                                <td><?=$v ?></td>
                            <?php else: ?>
                                <td id="taxon-<?=$k ?>">
                                    <span class="text-muted">Unknown</span>
                                </td>
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
                    foreach ( array( 'country', 'state', 'county', 'latitude',
                                'longitude', 'notes' ) as $k ) {
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
                <span id="geochronology"><?=$fossil->time_interval->name ?></span>
                <table class="table table-hover table-condensed">
                    <?php
                    foreach ( array( 'era', 'period', 'epoch', 'age' ) as $n => $k ):
                        ?>
                        <tr>
                            <td><?=ucwords( $k ) ?></td>
                            <td id="geochronology-<?=($n + 1) ?>">
                                <span class="text-muted">Unknown</span>
                            </td>
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
<script>
( function( $ ) {
    'use strict';

    function load_taxa() {
        var url = "http://paleobiodb.org/data1.1/taxa/list.json?name=";

        url += $( '#taxon-name' ).text() + "&rel=all_parents&vocab=pbdb";

        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function( resp ) {
                resp.records.forEach( 
                    function( taxon ) {
                        $( '#taxon-' + taxon.rank ).text( taxon.taxon_name );
                    }
                );
            },
            error: function( err ) {
                console.log( err );
            }
        });
    }

    function load_geochronology() {
        var url = "http://paleobiodb.org/data1.1/intervals/list.json?scale=1&vocab=pbdb";

        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            success: function( resp ) {
                /* @todo clean this up, sheesh */

                // reorganize records
                var intervals = [], match;
                resp.records.forEach(
                    function( interval ) {
                        intervals[interval.interval_no] = interval;
                        if ( $( '#geochronology' ).text() == interval.interval_name )
                            match = interval.interval_no;
                    }
                );

                var current_interval = intervals[match];

                while ( current_interval ) {
                    $( '#geochronology-' + current_interval.level ).text( current_interval.interval_name );
                    current_interval = intervals[current_interval.parent_no];
                }
            },

            error: function( err ) {
                console.log( err );
            }
        });

    }

    $( function() {
        load_taxa();
        load_geochronology();
    } );

}( jQuery ) );
</script>
