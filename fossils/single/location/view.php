<?php
// @todo find a better solution
global $fossil;
?>
<h3>
    Location
    <i style="display: none" class="fa fa-fw fa-circle-o-notch fa-spin"
            id="fossil-location-loading"></i>
    <i style="display: none" class="fa fa-fw fa-check"
            id="fossil-location-success"></i>
    <i style="display: none" class="fa fa-fw fa-warning"
            id="fossil-location-error"></i>
</h3>

<?php if ( $fossil->location->latitude && $fossil->location->longitude ): ?>
    <div id="map-container" class="hidden-xs hidden-sm col-md-6 col-lg-6" style="height: 300px">
    </div>
<?php else: ?>
    <div id="map-container" class="hidden-xs hidden-sm col-md-6 col-lg-6" style="height: 300px; background-color: #eee;">
        <p class="unknown" style="position: absolute; top: 45%; width: 100%; text-align: center">Insufficient information available to create map</p>
    </div>
<?php endif; ?>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <table class="table">
        <?php
        foreach ( array( 'country', 'state', 'county', 'latitude',
                    'longitude', 'notes' ) as $k ) {
            if ( $v = $fossil->location->{ $k } ) { ?>
                <tr>
                    <td class="fossil-property"><?=ucwords( $k ) ?></td>
                    <td class="fossil-property-value"><?=$v ?></td>
                    <td class="fossil-property-options">
                        <a class="edit-fossil-location_open" data-popup-ordinal="1">
                            <i class="ion-compose"></i>
                        </a>
                    </td>
                </tr>
                <?php
            }
        } ?>
    </table>
</div>
