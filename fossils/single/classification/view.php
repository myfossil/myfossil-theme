<?php
// @todo find a better solution
global $fossil;
?>
<input type="hidden" id="fossil-taxon-name" value="<?=$fossil->taxon->name ?>" />
<input type="hidden" id="fossil-taxon-rank" value="<?=$fossil->taxon->rank ?>" />
<input type="hidden" id="fossil-taxon-pbdb" value="<?=$fossil->taxon->pbdbid ?>" />

<h3>
    Classification
    <i style="display: none" class="fa fa-fw fa-circle-o-notch fa-spin"
            id="fossil-taxon-loading"></i>
    <i style="display: none" class="fa fa-fw fa-check"
            id="fossil-taxon-success"></i>
    <i style="display: none" class="fa fa-fw fa-warning"
            id="fossil-taxon-error"></i>
</h3>
<table id="fossil-taxon" class="table">
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
