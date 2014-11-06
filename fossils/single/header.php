<?php
// @todo find a better solution
global $fossil;
?>

<div id="buddypress-header" class="dark">
    <div id="item-header" class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                <img class="avatar img-responsive" src="<?=$fossil->image ?>" />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                <h1>Fossil <?=sprintf( "%06d", $fossil->id ) ?></h1>
                <input type="hidden" id="post_id" value="<?=$fossil->id ?>" />
                <input type="hidden" id="myfossil_specimen_nonce" 
                        value="<?=wp_create_nonce( 'myfossil_specimen' ) ?>" />
                <dl class="inline fossil-header">
                    <dt>Author</dt>
                    <dd>
                        <a href="<?=bp_core_get_user_domain( $fossil->author->ID ) ?>">
                            <?=trim( $fossil->author->display_name ) ?>
                        </a>
                    </dd>
                    <dt>Updated</dt><dd><?=$fossil->updated_at ?></dd>
                    <dt>Location</dt><dd><?=$fossil->location ?></dd>
                </dl>
            </div>
        </div>
    </div>

    <div id="item-nav" class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a>Information</a></li>
            <li class="inactive disabled"><a>History</a></li>
            <li class="inactive disabled"><a>Contributors</a></li>
        </ul>
    </div>
</div>
