<?php
// @todo find a better solution
global $fossil;
?>
<input type="hidden" id="fossil-taxon-name" value="<?=$fossil->taxon->name ?>" />

<h3>Classification</h3>

<table class="table">
    <tr class="sr-only">
        <th>Taxonomy Level</th>
        <th>Value</th>
        <th>Options</th>
    </tr>
    <?php foreach ( array( 'phylum', 'class', 'order', 'family', 'genus', 'species' ) as $k ): ?>
        <tr>
            <td class="fossil-property"><?=ucwords( $k ) ?></td>
            <td class="fossil-property-value" id="fossil-taxon-<?=$k ?>">
                <?php if ( ( $fossil->taxon->{ $k } ) && ( $v = $fossil->taxon->{ $k }->name ) ): ?>
                    <?=$v ?>
                <?php else: ?>
                    <span class="unknown">Unknown</span>
                <?php endif; ?>
            </td>
            <td class="fossil-property-options">
                <a class="edit-fossil-taxon_open" data-popup-ordinal="1">
                    <i class="ion-compose"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
