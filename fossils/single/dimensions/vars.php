<?php
// @todo find a better solution
global $fossil;
?>
<?php if ( $fossil->dim ): ?>
    <input type="hidden" 
            id="fossil-dimension-length" 
            value="<?=$fossil->dim->length ?>" />
    <input type="hidden" 
            id="fossil-dimension-length" 
            value="<?=$fossil->dim->width ?>" />
    <input type="hidden" 
            id="fossil-dimension-length" 
            value="<?=$fossil->dim->height ?>" />
<?php endif; ?>
