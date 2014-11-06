<?php
// @todo find a better solution
global $fossil;
?>

<h3>
    Lithostratigraphy
    <i style="display: none" class="fa fa-fw fa-circle-o-notch fa-spin"
            id="fossil-lithostratigraphy-loading"></i>
    <i style="display: none" class="fa fa-fw fa-check"
            id="fossil-lithostratigraphy-success"></i>
    <i style="display: none" class="fa fa-fw fa-warning"
            id="fossil-lithostratigraphy-error"></i>
</h3>

<table class="table">
    <?php
    foreach ( array( 'group', 'formation', 'member', 'notes' ) as $n => $k ):
        ?>
        <tr>
            <td class="fossil-property"><?=ucwords( $k ) ?></td>
            <td class="fossil-property-value" 
                    id="lithostratigraphy-<?=($n + 1 ) ?>">
                <?php if ( $fossil->stratum->level == $k ): ?>
                    <?=$fossil->stratum->name ?>
                <?php else: ?>
                    <span class="unknown">Unknown</span>
                <?php endif; ?> 
            </td>
            <td class="fossil-property-options">
                <a class="edit-fossil-lithostratigraphy_open" data-popup-ordinal="1">
                    <i class="ion-compose"></i>
                </a>
            </td>
        </tr>
        <?php
    endforeach; ?>
</table>
