<?php do_action('bp_before_directory_activity'); ?>

<div id="buddypress" class="container">

	<?php do_action('bp_before_directory_activity_content'); ?>
    
    <div class="row">
        <div class="col-md-2">
            <?php if (is_user_logged_in()): ?>
                <?php bp_get_template_part('activity/left-menu'); ?>
            <?php endif; ?>
        </div>

        <div class="col-md-10 no-padding">
            <h2 class="no-padding">What's New</h2>
        </div>

        <div class="col-md-10 page-styling separate">
            <h5 class="no-margin">Announcements</h5>
            <div class="row">
                <div class="col-sm-1" style="padding-top: 10px; padding-left: 25px">
                    <i class="fa fa-fw fa-circle fa-info"></i>
                </div>
                <div class="col-sm-11">
                    Morbi pretium dapibus diam, quis fringilla felis vehicula non.
                    Quisque id elit nisi. In vel facilisis lorem, ut blandit
                    magna.
                </div>
            </div>
        </div>
        <div class="col-md-10 page-styling">
            <?php if (is_user_logged_in()): ?>
                <?php bp_get_template_part('activity/post-form'); ?>
            <?php endif; ?>
        </div>
        <div class="col-md-10">
            <?php do_action('template_notices'); ?>
        </div>

        <div class="col-md-10 col-no-padding separate-top">

            <div class="item-list-tabs activity-type-tabs" role="navigation">
                <ul class="nav nav-tabs" role="tablist">
                    <?php do_action('bp_before_activity_type_tab_all'); ?>

                    <li id="activity-all" class="selected active">
                        <a href="<?php bp_activity_directory_permalink(); ?>" title="<?php esc_attr_e('The public activity for everyone on this site.', 'buddypress'); ?>">
                            <?php printf(__('All Members <span class="badge">%s</span>', 'buddypress') , bp_get_total_member_count()); ?>
                        </a>
                    </li>

                    <?php if (is_user_logged_in()): ?>
                        <?php do_action('bp_before_activity_type_tab_friends'); ?>
                        <?php if (bp_is_active('friends')): ?>
                            <?php if (bp_get_total_friend_count(bp_loggedin_user_id())): ?>
                                <li id="activity-friends">
                                    <a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_friends_slug() . '/'; ?>" title="<?php esc_attr_e('The activity of my friends only.', 'buddypress'); ?>">
                                        <?php printf(__('My Friends <span class="badge">%s</span>', 'buddypress') , bp_get_total_friend_count(bp_loggedin_user_id())); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php do_action('bp_before_activity_type_tab_groups'); ?>

                        <?php if (bp_is_active('groups')): ?>
                            <?php if (bp_get_total_group_count_for_user(bp_loggedin_user_id())): ?>
                                <li id="activity-groups">
                                    <a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_groups_slug() . '/'; ?>" title="<?php esc_attr_e('The activity of groups I am a member of.', 'buddypress'); ?>">
                                        <?php printf(__('My Groups <span class="badge">%s</span>', 'buddypress') , bp_get_total_group_count_for_user(bp_loggedin_user_id())); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php do_action('bp_before_activity_type_tab_favorites'); ?>

                        <?php if(bp_get_total_favorite_count_for_user(bp_loggedin_user_id())): ?>
                            <li id="activity-favorites">
                                <a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/favorites/'; ?>" title="<?php esc_attr_e("The activity I've marked as a favorite.", 'buddypress'); ?>">
                                    <?php printf(__('My Favorites <span class="badge">%s</span>', 'buddypress') , bp_get_total_favorite_count_for_user(bp_loggedin_user_id())); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (bp_activity_do_mentions()): ?>
                            <?php do_action('bp_before_activity_type_tab_mentions'); ?>
                            <li id="activity-mentions">
                                <a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/mentions/'; ?>" title="<?php esc_attr_e('Activity that I have been mentioned in.', 'buddypress'); ?>">
                                    <?php _e('Mentions', 'buddypress'); ?>
                                    <?php if (bp_get_total_mention_count_for_user(bp_loggedin_user_id())): ?> 
                                        <strong>
                                            <span>
                                                <?php printf(_nx('%s new', '%s new', bp_get_total_mention_count_for_user(bp_loggedin_user_id()) , 'Number of new activity mentions', 'buddypress') , bp_get_total_mention_count_for_user(bp_loggedin_user_id())); ?>
                                            </span>
                                        </strong>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endif; ?>

                    <?php endif; ?>

                    <?php do_action('bp_activity_type_tabs'); ?>
                </ul>
            </div><!-- .item-list-tabs -->
        </div>
        <div class="col-md-10 page-styling">

            <div class="item-list-tabs no-ajax pull-right" id="subnav" role="navigation">
                <ul style="margin-top: 10px;">
                    <?php
                    /* 
                     * <li class="feed">
                     *   <a href="<?php bp_sitewide_activity_feed_link(); ?>" title="<?php esc_attr_e('RSS Feed', 'buddypress'); ?>">
                     *     <?php _e('RSS', 'buddypress'); ?>
                     *    </a>
                     * </li>
                     *
                     * <?php do_action('bp_activity_syndication_options'); ?>
                     */
                    ?>
                    <li id="activity-filter-select" class="last">
                        <form class="form-inline">
                            <label for="activity-filter-by"><?php _e('Showing...', 'buddypress'); ?></label>
                            <select id="activity-filter-by" class="form-control">
                                <option value="-1"><?php _e('Everything', 'buddypress'); ?></option>
                                <?php bp_activity_show_filters(); ?>
                                <?php do_action('bp_activity_filter_options'); ?>
                            </select>
                        </form>
                    </li>
                </ul>
            </div><!-- .item-list-tabs -->

            <div class="clearfix"></div>

            <?php do_action('bp_before_directory_activity_list'); ?>

            <div class="activity" role="main">
                <?php bp_get_template_part('activity/activity-loop'); ?>
            </div><!-- .activity -->

            <?php do_action('bp_after_directory_activity_list'); ?>
            <?php do_action('bp_directory_activity_content'); ?>
            <?php do_action('bp_after_directory_activity_content'); ?>
            <?php do_action('bp_after_directory_activity'); ?>
        </div>
    </div>
</div>
