<?php
// @todo find a better solution
global $fossil;

$location_keys = array( 'latitude', 'longitude', 'country', 'state', 'county',
        'city', 'zip', 'address', 'map_url' );
?>
<?php foreach ( $location_keys as $k ): ?>
    <input type="hidden" id="fossil-location-<?=$k ?>"
            value="<?=$fossil->location->{$k} ?>" />
<?php endforeach; ?>
