<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="topic-<?php bbp_topic_id(); ?>" class="panel panel-default">

    <div class="bbp-topic-title panel-heading">
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

		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>" title="<?php bbp_topic_title(); ?>">
            <?php bbp_topic_title(); ?>
        </a>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

        <?php echo myfossil_social_bbp_get_topic_pagination(); ?>
        <?php bbp_topic_row_actions(); ?>
	</div>


  <div class="panel-body">
		<?php do_action( 'bbp_theme_before_topic_meta' ); ?>

		<div class="bbp-topic-meta">

			<div><span class="bbp-topic-reply-count badge"><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></span> <?php bbp_show_lead_topic() ? _e( 'Replies', 'myfossil' ) : _e( 'Posts', 'myfossil' ); ?></div>
			
			<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>

			<div class="bbp-topic-started-by">
                <?php printf( __( 'Started by: %1$s', 'myfossil' ), bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?>
            </div>

			<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

			<div class="bbp-topic-freshness">
				 &nbsp;<?php _e( 'Freshness', 'myfossil' ); ?>:
				 
				<?php do_action( 'bbp_theme_before_topic_freshness_author' ); ?>

				<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 14 ) ); ?></span>

				<?php do_action( 'bbp_theme_after_topic_freshness_author' ); ?>

				<?php do_action( 'bbp_theme_before_topic_freshness_link' ); ?>
		
				<?php echo myfossil_social_bbp_get_topic_freshness_link(); ?>
		
				<?php do_action( 'bbp_theme_after_topic_freshness_link' ); ?>
		
			</div>
			
			<?php if ( !bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>

				<?php do_action( 'bbp_theme_before_topic_started_in' ); ?>

				<div class="bbp-topic-started-in">
                    <?php 
                    printf( __( 'in: <a href="%1$s">%2$s</a>', 'myfossil' ), 
                            bbp_get_forum_permalink( bbp_get_topic_forum_id() ), 
                            bbp_get_forum_title( bbp_get_topic_forum_id() ) ); 
                    ?>
                </div>

				<?php do_action( 'bbp_theme_after_topic_started_in' ); ?>
			<?php endif; ?>
		</div>

		<?php do_action( 'bbp_theme_after_topic_meta' ); ?>

  </div>
</div><!-- #topic-<?php bbp_topic_id(); ?> -->
