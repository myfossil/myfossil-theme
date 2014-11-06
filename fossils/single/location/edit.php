<div id="edit-fossil-location" class="edit-fossil-popup">
    <div class="edit-fossil">
        <div class="edit-fossil-heading">
            <h4>Location</h4>
        </div>
        <div class="edit-fossil-body">
            <form class="form">
                <?php $loc_keys = array( 'latitude', 'longitude', 'country',
                        'state', 'county', 'city', ); ?>
                <?php foreach ( $loc_keys as $k ): ?>
                    <div class="form-group">
                        <label for="edit-fossil-location-<?=$k ?>">
                            <?=ucfirst( $k ) ?>
                        </label>
                        <input type="text" 
                                class="form-control" 
                                id="edit-fossil-location-<?=$k ?>" />
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
        <div class="edit-fossil-footer">
        </div>
    </div>
</div>
