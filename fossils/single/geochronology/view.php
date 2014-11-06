<?php
// @todo find a better solution
global $fossil;
?>

<h3>Geochronology</h3>
<table class="table">
    <?php foreach ( array( 'era', 'period', 'epoch', 'age' ) as $n => $k ): ?>
        <tr>
            <td class="fossil-property"><?=ucwords( $k ) ?></td>
            <td class="fossil-property-value" id="geochronology-<?=($n + 1) ?>">
                <span class="unknown">Unknown</span>
            </td>
            <td class="fossil-property-options">
                <a class="edit-fossil-geochronology_open" data-popup-ordinal="1">
                    <i class="ion-compose"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
