<?php
// @todo find a better solution
global $fossil;
?>
<h3>
    Dimensions
    <i style="display: none" class="fa fa-fw fa-circle-o-notch fa-spin"
            id="fossil-dimensions-loading"></i>
    <i style="display: none" class="fa fa-fw fa-check"
            id="fossil-dimensions-success"></i>
    <i style="display: none" class="fa fa-fw fa-warning"
            id="fossil-dimensions-error"></i>
</h3>

<table class="table">
    <tr class="sr-only">
        <th>Dimension</th>
        <th>Value</th>
    </tr>
    <?php foreach ( array( 'length', 'width', 'height' ) as $k ) { ?>
        <tr>
            <td class="fossil-property"><?=ucwords( $k ) ?></td>
            <td class="fossil-property-value" id="fossil-dimension-<?=$k ?>">
                <?php if ( $v = $fossil->dimension->{ $k } * 100 ): ?>
                    <?=$v ?> cm
                <?php else: ?>
                    <span class="unknown">Unknown</span>
                <?php endif; ?>
            </td>
            <td class="fossil-property-options">
                <a class="edit-fossil-dimensions_open" data-popup-ordinal="1">
                    <i class="ion-compose"></i>
                </a>
            </td>
        </tr>
    <?php } ?>
</table>
