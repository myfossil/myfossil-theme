<?php
/**
 * BuddyPress - Activity Post Form
 *
 * @package myfossil
 * @subpackage theme
 */
?>
<div id="user-left" name="user-left" class="sidebar sidebar-left">
	<div id="whats-new-avatar">

        <div id="user-info" class="row section">
            <div class="col-lg-12">
                <a href="<?php echo bp_loggedin_user_domain(); ?>">
                    <?php bp_loggedin_user_avatar('width=150&height=150' ); ?>
                </a>
            </div>
            <div class="col-lg-12" style="text-align: center">
                <h4 style="font-size: 1.4em"><?php echo bp_get_loggedin_user_fullname(); ?></h4>
                <span class="username text-muted">@<?=bp_get_loggedin_user_username(); ?></span>
            </div>
        </div>
        
        <div class="row section">
            <div class="col-lg-12">
                <ul class="list-lines">
                    <li><a href="/">What's New</a></li>
                    <?php bp_get_loggedin_user_nav(); ?>
                    <?php do_action( 'bp_member_options_nav' ); ?>
                    <li>My Fossils</li>
                    <li>My Resources</li>
                    <li>My Events</li>
                </ul>
            </div>
        </div>
	</div>
</div>
