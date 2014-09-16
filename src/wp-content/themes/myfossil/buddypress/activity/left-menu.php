<?php
/**
 * BuddyPress - Activity Post Form
 *
 * @package myfossil
 * @subpackage theme
 */
?>
<div id="user-left" name="user-left">
	<div id="whats-new-avatar">
        <div class="row">
            <div class="col-lg-3">
                <a href="<?php echo bp_loggedin_user_domain(); ?>">
                    <?php bp_loggedin_user_avatar('width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height()); ?>
                </a>
            </div>
            <div class="col-lg-9">
                <h4 style="margin: 3px 0 3px 0"><?php echo bp_get_loggedin_user_fullname(); ?></h4>
                <span class="username">@<?=bp_get_loggedin_user_username(); ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-group">
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                    <li class="list-group-item"><a href="#">What's New</a></li>
                </ul>
            </div>
        </div>
	</div>
</div>
