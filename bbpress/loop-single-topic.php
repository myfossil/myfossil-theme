<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="topic-<?php bbp_topic_id(); ?>" class="forum-entry">

    <div class="bbp-topic-title forum-body">
		<?php if ( bbp_is_user_home() ) : ?>
			<?php if ( bbp_is_favorites() ) : ?>
				<span class="bbp-row-actions">
					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>
					<?php bbp_topic_favorite_link( array( 'mid' => '+', 'post' => '' ), array( 'pre' => '', 'mid' => '&times;', 'post' => '' ) ); ?>
					<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>
				</span>
			<?php elseif ( bbp_is_subscriptions() ) : ?>
				<span class="bbp-row-actions">
					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>
					<?php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>
					<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>
				</span>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>

        <h4 class="pull-left" style="border: 0; margin: 0">
            <a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>" title="<?php bbp_topic_title(); ?>">
                <?php bbp_topic_title(); ?>
            </a>
        </h4>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

        <?php echo myfossil_social_bbp_get_topic_pagination(); ?>
        <?php bbp_topic_row_actions(); ?>

		<?php do_action( 'bbp_theme_before_topic_meta' ); ?>

		<div class="bbp-topic-meta">

			<div class="pull-right">
                <h4 style="border: 0; margin: 0">
                    <?php bbp_show_lead_topic() ? 
                        bbp_topic_reply_count() : bbp_topic_post_count(); 
                    ?>
                    <?php bbp_show_lead_topic() ? 
                        _e( 'Replies', 'myfossil' ) : _e( 'Posts', 'myfossil' ); 
                    ?>
                </h4>
            </div>
			
			<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>

        </div>
    </div>
    <div class="forum-footer">
        <div class="bbp-topic-started-by pull-left">
            Started by <?=bbp_get_topic_author_link( array( 'size' => '25' ) ) ?>
        <?php if ( ! bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>

            <?php do_action( 'bbp_theme_before_topic_started_in' ); ?>

                <?php 
                printf( __( 'in <a href="%1$s">%2$s</a>', 'myfossil' ), 
                        bbp_get_forum_permalink( bbp_get_topic_forum_id() ), 
                        bbp_get_forum_title( bbp_get_topic_forum_id() ) ); 
                ?>

            <?php do_action( 'bbp_theme_after_topic_started_in' ); ?>
        <?php endif; ?>
        </div>
        <div class="pull-right">
            <i class="fa fa-fw fa-clock-o"></i>
            <?=bbp_get_reply_post_date(); ?>
        </div>

        <?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

        <?php do_action( 'bbp_theme_after_topic_meta' ); ?>
    </div>
</div><!-- #topic-<?php bbp_topic_id(); ?> -->
