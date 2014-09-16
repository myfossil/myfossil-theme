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
            <div class="col-lg-3 col-lg-offset-1">
                <a href="<?php echo bp_loggedin_user_domain(); ?>">
                    <?php bp_loggedin_user_avatar('width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height()); ?>
                </a>
            </div>
            <div class="col-lg-8">
                <h4 style="margin: 3px 0 3px 0"><?php echo bp_get_loggedin_user_fullname(); ?></h4>
                <span class="username">@<?=bp_get_loggedin_user_username(); ?></span>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-lines">
                    <li><a href="#">What's New</a></li>
                    <li><a href="#">Wall</a></li>
                    <li>
                        <a href="#">
                            Messages
                            <span class="badge pull-right"><?php echo bp_total_unread_messages_count(); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Notifications 
                            <span class="badge pull-right"><?php echo bp_total_unread_messages_count(); ?></span>
                        </a>
                    </li>
                    <li><a href="#">My Fossils</a></li>
                    <li><a href="#">My Activities</a></li>
                    <li><a href="#">My Resources</a></li>
                    <li><a href="#">My Events</a></li>
                    <li><a href="#">My Organizations</a></li>
                    <li><a href="#">Following</a></li>
                    <li><a href="#">Followers</a></li>
                    <li><a href="#">Edit Profile</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </div>
        </div>
	</div>
</div>
