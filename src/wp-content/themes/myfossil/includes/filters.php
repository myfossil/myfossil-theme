<?php
require get_template_directory() . '/buddypress/groups/filters.php';
require get_template_directory() . '/buddypress/members/filters.php';

/**
 * Fix BuddyPress directories.
 */
function filter_bp_get_theme_compat_dir( $_ ) {
    return get_template_directory_uri() . '/static/';
}
add_filter( 'bp_get_theme_compat_dir', 'filter_bp_get_theme_compat_dir' );

/**
 * Bootstrap-ify the way that notices are displayed
 */
function bootstrap_render_message() {
    $bp = BuddyPress();

    if ( !empty( $bp->template_message ) ) {
        $type = ( 'success' === $bp->template_message_type ) ? 'success' : 'danger';
        $content = apply_filters( 'bp_core_render_message_content', $bp->template_message, $type );
        
        $tpl  = "<div class=\"alert alert-%s\" role=\"alert\">%s</div>";

        printf($tpl, $type, $content);

        do_action( 'bp_core_render_message' );
    }
}
add_action( 'template_notices', 'bootstrap_render_message' );


/**
 * Remove default notices, sheesh
 */
function remove_core_render_message() {
    remove_action( 'template_notices', 'bp_core_render_message' );
}
add_action( 'bp_actions', 'remove_core_render_message' );


/**
 * Modifies Member nav list item
 * 
 * @see includes/extras.php
 * @param bp_tpl_contents the default contents of the nav item from BP core template
 * @param nav_item the nav item
 */
function filter_nav_item( $bp_tpl_contents, $nav_item ) {
    // Consider whether or not this is the current nav item
    if ( $nav_item['slug'] == bp_current_action() || 
            contains("current", $bp_tpl_contents) ||
            contains("selected", $bp_tpl_contents) ) {
        $selected = true;
    } else {
        $selected = false;
    }

    if ( !$selected ) {
        $tpl = "<li>";
    } else {
        $tpl = "<li class=\"current selected active\">";
    }

    // Consider whether there's a count of something involved
    $count = nav_item_count( $bp_tpl_contents );
    if ( $count > 0 ) {
        // Need to strip out HTML with the count in there
        $nav_item['name'] = strip_tags_contents( $nav_item['name'] );
        $nav_item['name'] .= " <span class=\"badge\">" . $count . "</span>";
    }

    // We use the word "Wall" instead of "Home"
    if ( $nav_item['name'] == 'Home' ) $nav_item['name'] = 'Wall';

    // Put it all back together
    return $tpl . "<a href=\"" . $nav_item['link'] . "\">" . $nav_item['name'] . "</a></li>";
}
add_filter( 'bp_get_options_nav_public', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_edit', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_change-avatar', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_just-me', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_activity-mentions', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_activity-favs', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_activity-friends', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_activity-groups', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_friends-my-friends', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_requests', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_groups-my-groups', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_invites', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_home', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_members', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_invite', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_admin', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_inbox', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_sentbox', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_compose', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_notices', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_notifications-my-notifications', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_read', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_general', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_notifications', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_profile', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_capabilities', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_options_nav_delete-account', 'filter_nav_item', 10, 2 );


/**
 * Modifies Activity link button
 *
 * @param html the html
 */
function filter_activity_link( $html ) {
    // Consider whether there's a count of something involved
    $html = str_replace('<span>' , '<span class="badge">', $html);
    return str_replace('button', 'btn btn-default button', $html);
}
add_filter( 'bp_get_activity_delete_link'         , 'filter_activity_link' );
add_filter( 'bp_activity_comment_delete_link'     , 'filter_activity_link' );
add_filter( 'bp_activity_comment_user_link'       , 'filter_activity_link' );
add_filter( 'bp_get_activities_member_rss_link'   , 'filter_activity_link' );
add_filter( 'bp_get_activity_comment_link'        , 'filter_activity_link' );
add_filter( 'bp_get_activity_comment_permalink'   , 'filter_activity_link' );
add_filter( 'bp_get_activity_delete_link'         , 'filter_activity_link' );
add_filter( 'bp_get_activity_directory_permalink' , 'filter_activity_link' );
add_filter( 'bp_get_activity_favorite_link'       , 'filter_activity_link' );
add_filter( 'bp_get_activity_feed_item_link'      , 'filter_activity_link' );
add_filter( 'bp_get_activity_filter_links'        , 'filter_activity_link' );
add_filter( 'bp_get_activity_load_more_link'      , 'filter_activity_link' );
add_filter( 'bp_get_activity_pagination_links'    , 'filter_activity_link' );
add_filter( 'bp_get_activity_permalink_id'        , 'filter_activity_link' );
add_filter( 'bp_get_activity_thread_permalink'    , 'filter_activity_link' );
add_filter( 'bp_get_activity_unfavorite_link'     , 'filter_activity_link' );
add_filter( 'bp_get_activity_user_link'           , 'filter_activity_link' );
add_filter( 'bp_get_send_public_message_link'     , 'filter_activity_link' );
add_filter( 'bp_get_sitewide_activity_feed_link'  , 'filter_activity_link' );


/**
 * Change comment list to media objects
 */
function filter_comment_list( $default ) {
    return $default == '<ul>' ? '<div class="media">' : '</div>';
}
add_filter( 'bp_activity_recurse_comments_start_ul', 'filter_comment_list' );
add_filter( 'bp_activity_recurse_comments_end_ul', 'filter_comment_list' );


/**
 * Add delete icon to delete button (seriously BuddyPress?)
 */
function filter_delete_button( $html ) {
    return str_replace('>Delete', '><i class="fa fa-fw fa-trash-o"></i> Delete', $html);
}
add_filter( 'bp_get_activity_delete_link', 'filter_delete_button' );


/**
 * Change appearance of BuddyPress generated buttons
 */
function filter_bp_button( $btn, $type = 'default' ) {
    if ( $btn ) {
        $btn['link_class'] .= " btn btn-$type";
    }
    return $btn;
}
add_filter( 'bp_get_send_public_message_button', 'filter_bp_button' );
add_filter( 'bp_get_blog_create_button', 'filter_bp_button' );
add_filter( 'bp_get_blogs_visit_blog_button', 'filter_bp_button' );
add_filter( 'bp_get_add_friend_button', 'filter_bp_button' );
add_filter( 'bp_get_group_new_topic_button', 'filter_bp_button' );
add_filter( 'bp_get_group_join_button', 'filter_bp_button' );
add_filter( 'bp_get_group_create_button', 'filter_bp_button' );
add_filter( 'bp_get_send_public_message_button', 'filter_bp_button' );
add_filter( 'bp_get_blog_create_button', 'filter_bp_button' );
add_filter( 'bp_get_blogs_visit_blog_button', 'filter_bp_button' );
add_filter( 'bp_get_add_friend_button', 'filter_bp_button' );
add_filter( 'bp_get_group_new_topic_button', 'filter_bp_button' );
add_filter( 'bp_get_group_join_button', 'filter_bp_button' );
add_filter( 'bp_get_group_create_button', 'filter_bp_button' );
add_filter( 'bp_get_send_message_button_args', 'filter_bp_button' );

/**
 * Make paginated links Bootstrap'd
 */
function bootstrapify_pagination_links( $html ) {
    $tpl = "<ul class=\"pagination\">";
    
    foreach( explode( PHP_EOL, $html ) as $link_html ) {
        $tpl .= sprintf( "<li>%s</li>", $link_html );
    }

    $tpl .= "</ul>";

    return $tpl;
}
add_filter( 'bp_get_activity_pagination_links', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_blogs_pagination_links', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_forum_pagination', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_the_topic_pagination', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_groups_pagination_links', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_group_member_pagination', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_group_requests_pagination_links', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_group_invite_pagination_links', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_members_pagination_links', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_messages_pagination', 'bootstrapify_pagination_links' );
add_filter( 'bp_get_notifications_pagination_links', 'bootstrapify_pagination_links' );
