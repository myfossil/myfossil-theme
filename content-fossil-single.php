<?php
use myFOSSIL\Plugin\Specimen\Fossil;

$fossil = new Fossil( $page );

?>
<div id="fossil" class="content-area">
    <div id="buddypress-header" class="dark">
        <div id="item-header" class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <img class="avatar img-responsive" src="<?=$fossil->image ?>" />
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                    <h1>Fossil <?=sprintf( "%06d", $fossil->id ) ?></h1>
                    <dl class="inline fossil-header">
                        <dt>Author</dt>
                        <dd>
                            <a href="<?=bp_core_get_user_domain( $fossil->author->ID ) ?>">
                                <?=trim( $fossil->author->display_name ) ?>
                            </a>
                        </dd>
                        <dt>Updated</dt><dd><?=$fossil->updated_at ?></dd>
                        <dt>Location</dt><dd><?=$fossil->location ?></dd>
                    </dl>
                </div>
                <?php /*
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                    <button class="btn btn-primary btn-block">Follow</button>
                </div>
                */ ?>
            </div>
        </div>

        <div id="item-nav" class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a>Information</a></li>
                <li class="inactive disabled"><a>History</a></li>
                <li class="inactive disabled"><a>Contributors</a></li>
            </ul>
        </div>
    </div>

    <div id="buddypress" class="container page-styling site-main" role="main">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                <h2>Classification</h2>

                <button class="btn btn-default edit-fossil-taxon_open" data-popup-ordinal="1">
                    <i class="fa fa-fw fa-edit"></i>
                    Edit Classification
                </button>

                <div id="edit-fossil-taxon" class="edit-fossil-popup">
                    <div class="edit-fossil">
                        <div class="edit-fossil-body">
                            <form class="form">
                                <div class="form-group">
                                    <label class="control-label">Edit Taxon:</label>
                                    <input class="form-control" type="text" 
                                            id="edit-fossil-taxon-name"
                                            placeholder="Begin typing your Taxon" />
                                </div>
                            </form>
                        </div>
                        <div class="edit-fossil-footer">
                            <ul id="edit-fossil-taxon-results">
                            </ul>
                        </div>
                    </div>
                </div>

                <h3>Common Name</h3>
                <p style="font-style: italic">
                    <?=@$fossil->taxon->common_name ? $fossil->taxon->common_name : $fossil->taxon->name ?>
                </p>

                <input type="hidden" id="taxon-name" value="<?=$fossil->taxon->name ?>" />

                <table class="table table-hover table-condensed">
                    <tr class="sr-only">
                        <th>Taxonomy Level</th>
                        <th>Value</th>
                    </tr>
                    <?php foreach ( array( 'phylum', 'class', 'order', 'family', 'genus', 'species' ) as $k ): ?>
                        <tr>
                            <td><?=ucwords( $k ) ?></td>
                            <?php if ( 1 == 2 && $v = $fossil->{ $k }->name ): ?>
                                <td><?=$v ?></td>
                            <?php else: ?>
                                <td id="taxon-<?=$k ?>">
                                    <span class="text-muted">Unknown</span>
                                </td>
                            <?php endif; ?>
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
                <img class="img-responsive" src="<?=$fossil->image ?>" />
            </div>
        </div>

        <h2>Location</h2>
        <div class="row">
            <?php if ( $fossil->location->latitude && $fossil->location->longitude ): ?>
                <div id="map-container" class="hidden-xs hidden-sm col-md-6 col-lg-6" style="height: 300px">
                </div>
            <?php else: ?>
                <div id="map-container" class="hidden-xs hidden-sm col-md-6 col-lg-6" style="height: 300px; background-color: #eee;">
                    <p class="text-muted" style="position: absolute; top: 45%; width: 100%; text-align: center">Insufficient information available to create map</p>
                </div>
            <?php endif; ?>
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
                <span id="geochronology" class="sr-only"><?=$fossil->time_interval->name ?></span>
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
                    foreach ( array( 'group', 'formation', 'member', 'notes' ) as $n => $k ):
                        ?>
                        <tr>
                            <td><?=ucwords( $k ) ?></td>
                            <td id="lithostratigraphy-<?=($n + 1 ) ?>">
                            <?php if ( $fossil->stratum->level == $k ): ?>
                                <span><?=$fossil->stratum->name ?></span>
                            <?php else: ?>
                                <span class="text-muted">Unknown</span>
                            <?php endif; ?> 
                            </td>
                        </tr>
                        <?php
                    endforeach; ?>
                </table>
            </div>
        </div>

        <?php if ( comments_open() || '0' != get_comments_number() ): ?>
        <div class="row">
            <div class="col-lg-12">
                <h2>Comments</h2>
				<?php bp_activity_comments() ?>
            </div>
        </div>
        <?php endif; ?>
     
    </div><!-- #main -->
</div><!-- #primary -->

<script src="http://vast-engineering.github.io/jquery-popup-overlay/jquery.popupoverlay.js"></script>
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

        url += $( '#taxon-name' ).val() + "&rel=all_parents&vocab=pbdb";

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

    function get_taxon_img( taxon_no ) {
        var url = "http://paleobiodb.org/data1.1/taxa/single.json?show=img&vocab=pbdb&id=" + taxon_no;
        var img_url = "http://paleobiodb.org/data1.1/taxa/thumb.png?id=";
        var img = $( '<img />' );
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function( data ) {
                if ( data.records && data.records[0].image_no > 0 ) 
                    img.attr( 'src', img_url + data.records[0].image_no ).addClass( 'phylopic' );
            }
        });

        return img;
    }

    function autocomplete_taxon() {
        if ( parseInt( $( this ).val().length ) < 3 )
            return;

        var ul = $( 'ul#edit-fossil-taxon-results' );
        var url = "http://paleobiodb.org/data1.1/taxa/auto.json?limit=5&vocab=pbdb&name=";
        url += $( this ).val();

        console.log( ul );

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function( data ) {
                ul.empty();
                $.map( data.records, function( taxon ) {
                    var taxon_li = $( '<li></li>' );
                    var taxon_label = $( '<span></span>')
                        .addClass( 'label label-taxon-rank' )
                        .addClass( 'label-taxon-rank-' + taxon.taxon_rank )
                        .text( taxon.taxon_rank );

                    ul.append( 
                            taxon_li
                                .append( get_taxon_img( taxon.taxon_no ) )
                                .append( ' ' + taxon.taxon_name ) 
                        );
                });
            },
            error: function( err ) { console.log( err ) }
        });
    }

    $( function() {
        load_taxa();
        load_geochronology();
        $( '#edit-fossil-taxon' ).popup(
                {
                    type: 'tooltip',
                    opacity: 1,
                    background: false,
                    transition: 'all 0.2s',
                }
            );

        $( '#edit-fossil-taxon-name' ).keyup( autocomplete_taxon );
    } );

}( jQuery ) );
</script>
