<?php
/**
 * BuddyPress - Activity Stream (Single Item)
 *
 * This template is used by activity-loop.php and AJAX functions to show
 * each activity.
 *
 * @package myfossil
 * @subpackage theme
 */
?>

<?php 
do_action('bp_before_activity_entry'); 

global $activities_template;
?>

<li class="<?php bp_activity_css_class(); ?>" id="activity-<?php bp_activity_id(); ?>">
    <div class="panel panel-default activity">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-8">
                    <?=$activities_template->activity->action; ?>
                </div>
                <div class="col-md-4 time-since">
                    <i class="fa fa-fw fa-clock-o"></i>
                    <?=bp_core_time_since( $activities_template->activity->date_recorded ); ?>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="activity-content">
                <?php if (bp_activity_has_content()): ?>
                    <div class="activity-inner">
                        <?php bp_activity_content_body(); ?>
                    </div>
                <?php endif; ?>

                <?php do_action('bp_activity_entry_content'); ?>

                <div class="activity-meta">
                    <?php if (bp_get_activity_type() == 'activity_comment'): ?>
                        <a href="<?php bp_activity_thread_permalink(); ?>" class="btn btn-default button view bp-secondary-action" title="<?php esc_attr_e('View Conversation', 'buddypress'); ?>">
                            <?php _e('View Conversation', 'buddypress'); ?></a>
                    <?php endif; ?>

                    <?php if (is_user_logged_in()): ?>
                        <?php if (bp_activity_can_comment()): ?>
                            <a href="<?php bp_activity_comment_link(); ?>" class="btn btn-default button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>">
                                <?php if ($c = bp_activity_get_comment_count()): ?>
                                    <i class="fa fa-fw fa-comments-o"></i>
                                    <?php printf(__('Comment <span class="badge">%s</span>', 'buddypress') , $c); ?>
                                <?php else: ?>
                                    <i class="fa fa-fw fa-comment-o"></i>
                                    <?php printf(__('Comment', 'buddypress') , $c); ?>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>

                        <?php if (bp_activity_can_favorite()): ?>
                            <?php if (!bp_get_activity_is_favorite()): ?>
                                <a href="<?php bp_activity_favorite_link(); ?>" class="btn btn-default button fav bp-secondary-action" title="<?php esc_attr_e('Mark as Favorite', 'buddypress'); ?>">
                                    <i class="fa fa-fw fa-star-o"></i>
                                    <?php _e('Favorite', 'buddypress'); ?>
                                </a>
                            <?php else: ?>
                                <a href="<?php bp_activity_unfavorite_link(); ?>" class="btn btn-default button unfav bp-secondary-action" title="<?php esc_attr_e('Remove Favorite', 'buddypress'); ?>">
                                    <i class="fa fa-fw fa-star"></i>
                                    <?php _e('Remove Favorite', 'buddypress'); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (bp_activity_user_can_delete()) bp_activity_delete_link(); ?>
                        <?php do_action('bp_activity_entry_meta'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php do_action('bp_before_activity_entry_comments'); ?>
        </div><!-- end panel-body -->

        <div class="panel-footer">
            <?php if ((bp_activity_get_comment_count() || bp_activity_can_comment()) || bp_is_single_activity()): ?>
                <div class="activity-comments">
                    <?php bp_activity_comments(); ?>
                    <?php if (is_user_logged_in() && bp_activity_can_comment()): ?>

                        <form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form form"<?php bp_activity_comment_form_nojs_display(); ?>>
                            <div class="media comment-reply-form">
                                <div class="ac-reply-avatar pull-left">
                                    <?php bp_loggedin_user_avatar('width=' . BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT); ?>
                                </div>
                                <div class="ac-reply-content media-body">
                                    <div class="ac-textarea">
                                        <textarea id="ac-input-<?php bp_activity_id(); ?>" class="ac-input bp-suggestions form-control" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
                                    </div>
                                    <button type="submit" name="ac_form_submit" class="btn btn-default">
                                        <i class="fa fa-fw fa-send"></i>
                                        <?php esc_attr_e('Post', 'buddypress'); ?>
                                    </button>
                                    <a href="#" class="ac-reply-cancel btn btn-danger">
                                        <i class="fa fa-fw fa-trash"></i>
                                        <?php _e('Cancel', 'buddypress'); ?></a>
                                    <input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
                                </div>

                                <?php do_action('bp_activity_entry_comments'); ?>

                                <?php wp_nonce_field('new_activity_comment', '_wpnonce_new_activity_comment'); ?>
                            </div>
                        </form>

                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php do_action('bp_after_activity_entry_comments'); ?>
        </div>
    </div>
</li>

<?php do_action('bp_after_activity_entry'); ?>
