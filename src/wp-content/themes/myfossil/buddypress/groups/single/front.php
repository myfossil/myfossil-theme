<?php
/**
 * Disable filter, for now
 */
/*
<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul class="nav nav-tabs">
		<?php do_action( 'bp_group_activity_syndication_options' ); ?>

		<li id="activity-filter-select" class="last">
            <form class="form-inline">
                <label for="activity-filter-by" class="label-control">
                    <?php _e( 'Showing...', 'buddypress' ); ?>
                </label>
                <select id="activity-filter-by" class="form-control">
                    <option value="-1"><?php _e( 'Everything!', 'buddypress' ); ?></option>
                    <?php bp_activity_show_filters( 'group' ); ?>
                    <?php do_action( 'bp_group_activity_filter_options' ); ?>
                </select>
            </form>
		</li>
	</ul>
</div><!-- .item-list-tabs -->
*/
?>

<div class="row">

    <div class="col-md-8">

        <?php do_action( 'bp_before_group_activity_post_form' ); ?>

        <?php if ( is_user_logged_in() && bp_group_is_member() ) : ?>

            <?php bp_get_template_part( 'activity/post-form' ); ?>

        <?php endif; ?>

        <?php do_action( 'bp_after_group_activity_post_form' ); ?>
        <?php do_action( 'bp_before_group_activity_content' ); ?>

        <div class="activity single-group" role="main">

            <?php bp_get_template_part( 'activity/activity-loop' ); ?>

        </div><!-- .activity.single-group -->

        <?php do_action( 'bp_after_group_activity_content' ); ?>

    </div>

    <div class="col-md-4">
            <?php bp_get_template_part( 'groups/single/front/members' ); ?>
    </div>

</div>
