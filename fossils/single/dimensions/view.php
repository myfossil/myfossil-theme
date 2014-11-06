<?php
// @todo find a better solution
global $fossil;
?>
<h3>Dimensions</h3>
<table class="table">
    <tr class="sr-only">
        <th>Dimension</th>
        <th>Value</th>
    </tr>
    <?php foreach ( array( 'length', 'width', 'height' ) as $k ) { ?>
        <tr>
            <td class="fossil-property"><?=ucwords( $k ) ?></td>
            <?php if ( $v = $fossil->{ $k } ): ?>
                <td class="fossil-property-value"><?=$v ?></td>
            <?php else: ?>
                <td class="fossil-property-value">
                    <span class="unknown">Unknown</span>
                </td>
            <?php endif; ?>
            <td class="fossil-property-options">
                <a class="edit-fossil-dimensions_open" data-popup-ordinal="1">
                    <i class="ion-compose"></i>
                </a>
            </td>
        </tr>
    <?php } ?>
</table>
