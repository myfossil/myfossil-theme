<?php
/**
 * BuddyPress - Activity Stream Comment
 *
 * This template is used by bp_activity_comments() functions to show
 * each activity.
 *
 * @package myfossil
 * @subpackage theme
 */
do_action('bp_before_activity_comment'); ?>

<div id="acomment-<?php bp_activity_comment_id(); ?>" class="acomment">

    <div class="acomment-avatar pull-left media-object">
        <a href="<?php bp_activity_comment_user_link(); ?>">
            <?php bp_activity_avatar('class=avatar&type=thumb&user_id=' . bp_get_activity_comment_user_id()); ?>
        </a>
    </div>

    <div class="media-body">
        <div class="acomment-meta media-heading">
            <?php
            /* translators: 1: user profile link, 2: user name, 3: activity permalink, 4: activity timestamp */
            printf(
                    __('<a href="%1$s">%2$s</a> replied <a href="%3$s" class="activity-time-since"><span class="time-since">%4$s</span></a>', 'buddypress') , 
                    bp_get_activity_comment_user_link() , 
                    bp_get_activity_comment_name() , 
                    bp_get_activity_comment_permalink() , 
                    bp_get_activity_comment_date_recorded()
                );
            ?>
        </div>

        <div class="acomment-content">
            <?php bp_activity_comment_content(); ?>
        </div>

        <div class="acomment-options"> 
            <?php if (is_user_logged_in() && bp_activity_can_comment_reply(bp_activity_current_comment())): ?>
                <a href="#acomment-<?php bp_activity_comment_id(); ?>" class="btn btn-primary acomment-reply bp-primary-action" id="acomment-reply-<?php bp_activity_id(); ?>-from-<?php bp_activity_comment_id(); ?>">
                    <i class="fa fa-fw fa-reply"></i>
                    <?php _e('Reply', 'buddypress'); ?>
                </a>
            <?php endif; ?>

            <?php if (bp_activity_user_can_delete()): ?>
                <a href="<?php bp_activity_comment_delete_link(); ?>" class="btn btn-danger delete acomment-delete confirm bp-secondary-action" rel="nofollow">
                    <i class="fa fa-fw fa-trash-o"></i>
                    <?php _e('Delete', 'buddypress'); ?>
                </a>
            <?php endif; ?>

            <?php do_action('bp_activity_comment_options'); ?>
        </div>

        <?php bp_activity_recurse_comments(bp_activity_current_comment()); ?>
        
    </div>

</div>

<?php do_action('bp_after_activity_comment'); ?>