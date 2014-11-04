<?php
/**
 * BuddyPress - Users Activity
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */
?>

<div class="row">

    <div class="item-list-tabs no-ajax" id="subnav" role="navigation">
        <ul class="nav nav-pills" id="nav-member-activity">
            <?php bp_get_options_nav(); ?>
        </ul>
    </div><!-- .item-list-tabs -->

</div>

<div class="row">

    <div class="activity" role="main">
        <?php 
        do_action( 'bp_before_member_activity_post_form' );

        if ( is_user_logged_in() && bp_is_my_profile() && 
                ( !bp_current_action() || bp_is_current_action( 'just-me' ) ) )
            bp_get_template_part( 'activity/post-form' );

        do_action( 'bp_after_member_activity_post_form' );

        do_action( 'bp_before_member_activity_content' ); 

        bp_get_template_part( 'activity/activity-loop' ); 

        ?>
    </div><!-- .activity -->

</div>

<?php do_action( 'bp_after_member_activity_content' ); ?>
