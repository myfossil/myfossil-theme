<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>
<div class="row">
  <?php if ( has_post_thumbnail()){?>
  <div class="col-xs-12 col-md-3">
	   <?php the_post_thumbnail('medium'); ?>
  </div>
  <div class="col-xs-12 col-md-9">
  <?php } else { ?>
  <div class="col-xs-12 col-md-12">
  <?php } ?>
	<div class="bbp-forum-info pull-left">


		<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

			<span class="bbp-row-actions">

				<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

				<ul class="pager">
					<li class="next">
					<?php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>
                    </li>
                 </ul>

				<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

			</span>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>" title="<?php bbp_forum_title(); ?>"><h3><?php bbp_forum_title(); ?></h3></a>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

		<?php bbp_list_forums(array('before' => '<ul class="bbp-forums-list list-unstyled inline">','after' => '</ul>')); ?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		<?php bbp_forum_row_actions(); ?>

	</div>


	<div class="bbp-forum-freshness pull-right text-muted">
      <small>
        <div class="bbp-forum-topic-count"><span class="badge"><?php bbp_forum_topic_count(); ?></span> <?php _e( 'Topics', 'myfossil' ); ?></div>
    
        <div class="bbp-forum-reply-count"><span class="badge"><?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?></span> <?php bbp_show_lead_topic() ? _e( 'Replies', 'myfossil' ) : _e( 'Posts', 'myfossil' ); ?></div>

        <div class="clearfix">
		<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>

		<?php echo myfossil_social_bbp_get_forum_freshness_link(); ?>

		<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?>
		</div>
        <div class="clearfix">
			<?php do_action( 'bbp_theme_before_topic_author' ); ?>

			<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 14 ) ); ?></span>

			<?php do_action( 'bbp_theme_after_topic_author' ); ?>
		</div>
      </small>
	</div>
  </div>
</div>
</div><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
