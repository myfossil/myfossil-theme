<?php
// @todo find a better solution
global $fossil;
?>
<input type="hidden" id="fossil-taxon-name" value="<?=$fossil->taxon->name ?>" />
<input type="hidden" id="fossil-taxon-rank" value="<?=$fossil->taxon->rank ?>" />
<input type="hidden" id="fossil-taxon-wpid" value="<?=$fossil->taxon->id ?>" />
<input type="hidden" id="fossil-taxon-pbdbid" value="<?=$fossil->taxon->pbdbid ?>" />
