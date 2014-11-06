<?php
// @todo find a better solution
global $fossil;
?>

<h3>Lithostratigraphy</h3>
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
