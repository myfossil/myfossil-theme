<?php
/**
 * BuddyPress - Users Activity
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */
?>

<div class="row">

    <div class="activity" role="main">
        <h1>Wall</h1>

        <?php 
        do_action( 'bp_before_member_activity_post_form' );

        if ( bp_are_friends( bp_displayed_user_id(), bp_loggedin_user_id() ) )
            bp_get_template_part( 'activity/post-form' );

        do_action( 'bp_after_member_activity_post_form' );

        ?>

        <?php if ( bp_has_activities( array( 
                            'scope' => 'activity', 
                            'action' => 'wall_post' ) ) ) : ?>
            <?php if ( empty( $_POST['page'] ) ) : ?>
                <ul id="activity-stream" class="activity-list item-list">
            <?php endif; ?>

            <?php while ( bp_activities() ) : ?>
                <?php bp_the_activity(); ?>
                <?php bp_get_template_part('activity/entry'); ?>
            <?php endwhile; ?>

            <?php if (bp_activity_has_more_items()): ?>
                <li class="load-more">
                    <a href="<?php bp_activity_load_more_link() ?>"><?php _e('Load More', 'buddypress'); ?></a>
                </li>
            <?php endif; ?>

            <?php if (empty($_POST['page'])): ?>
                </ul>
            <?php endif; ?>
        <?php else: ?>
            <div id="message" class="info">
                <p><?php _e('Sorry, there was no activity found. Please try a different filter.', 'buddypress'); ?></p>
            </div>
        <?php endif; ?>

        <?php do_action('bp_after_activity_loop'); ?>

        <?php if (empty($_POST['page'])): ?>
            <form action="" name="activity-loop-form" id="activity-loop-form" method="post">
                <?php wp_nonce_field('activity_filter', '_wpnonce_activity_filter'); ?>
            </form>
        <?php endif; ?>

    </div><!-- .activity -->

</div>

<?php do_action( 'bp_after_member_activity_content' ); ?>
