<?php do_action('bp_before_activity_loop'); ?>
<?php /*
            '&object=activity,bbpress,groups,friends,profile,status,blogs,myfossil&action=
            new_member,new_avatar,updated_profile,activity_comment,
            activity_update,new_blog_post,new_blog_comment,
            friendship_created,friendship_accepted,group_details_updated,
            joined_group,created_group,bbp_reply_create,bbp_topic_create,
            uploaded_image' ) ) : ?>
    */ ?>

<?php if ( bp_has_activities() ) : ?>

	<?php if (empty($_POST['page'])): ?>
		<ul id="activity-stream" class="activity-list item-list">
	<?php endif; ?>

	<?php while (bp_activities()): ?>
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
