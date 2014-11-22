<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<?php ob_start(); ?>
<div class="bbp-reply-header">

	<div class="bbp-meta">

		<?php if ( bbp_is_user_keymaster() ) : ?>

			<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

			<div class="bbp-reply-ip hidden-xs"><?php bbp_author_ip( bbp_get_reply_id() ); ?> &nbsp;</div>

			<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

		<?php endif; ?>

		<a href="<?php bbp_reply_url(); ?>" title="<?php bbp_reply_title(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>

		<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>

		<?php if ( bbp_is_single_user_replies() ) : ?>

			<span class="bbp-header">
				<?php _e( 'in reply to: ', 'myfossil' ); ?>
				<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
			</span>

		<?php endif; ?>

		<div>
		<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

		<?php bbp_reply_admin_links(); ?>

		<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>
        </div>

	</div><!-- .bbp-meta -->

</div><!-- .bbp-reply-header -->
<?php $reply_manage = ob_get_contents(); ob_end_clean(); ?>

<div id="post-<?php bbp_reply_id(); ?>" <?php bbp_reply_class(bbp_get_reply_id(), array("no-margin-bot")); ?>>
    <div class="forum-entry no-margin-bot">
        <div class="forum-heading">
            <?php bbp_reply_author_link( array( 'show_role' => false, 'type' => 'name' ) ); ?>
            replied to this topic at
            <i class="fa fa-fw fa-clock-o"></i>
            <?=bbp_get_reply_post_date(); ?>
        </div>
        <div class="forum-body">
            <div class="col-xs-3 col-sm-2 col-md-1 bbp-reply-author text-muted fs-content-thumbnail">
                <?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
                
                <?php bbp_reply_author_link( array( 'show_role' => false, 'type' => 'avatar' ) ); ?>

                <?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

            </div><!-- .bbp-reply-author -->

            <div class="col-xs-9 col-sm-10 col-md-11 bbp-reply-content fs-have-thumbnail">

                <?php do_action( 'bbp_theme_before_reply_content' ); ?>

                <?php bbp_reply_content(); ?>

                <?php do_action( 'bbp_theme_after_reply_content' ); ?>
            </div><!-- .bbp-reply-content -->
        </div>
    </div>
</div><!-- #post-<?php bbp_reply_id(); ?> -->
