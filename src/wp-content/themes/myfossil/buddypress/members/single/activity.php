<?php
/**
 * BuddyPress - Users Activity
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */
?>

<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul class="nav nav-tabs">
		<?php bp_get_options_nav(); ?>
    
        <?php 
        /*
		<li id="activity-filter-select" class="last">
			<label for="activity-filter-by"><?php _e( 'Show:', 'buddypress' ); ?></label>
			<select id="activity-filter-by">
				<option value="-1"><?php _e( '&mdash; Everything &mdash;', 'buddypress' ); ?></option>

				<?php bp_activity_show_filters(); ?>

				<?php do_action( 'bp_member_activity_filter_options' ); ?>

			</select>
		</li>
        */
        ?>
	</ul>
</div><!-- .item-list-tabs -->


<div class="row">

    <div class="activity col-sm-12 col-md-8" role="main">
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

    <div id="right-side" class="col-md-4">
        <?php 
        /*
         * Display some of the User's friends, if they have any
         */
        bp_get_template_part( 'members/single/partials/members' );

        /*
         * Display some of the User's organizations that they belong to, if any
         */
        bp_get_template_part( 'members/single/partials/groups' );

        /*
         * Display some of the User's resources, if they have any
         */
        bp_get_template_part( 'members/single/partials/resources' );

        ?>
    </div>
</div>

<?php do_action( 'bp_after_member_activity_content' ); ?>
