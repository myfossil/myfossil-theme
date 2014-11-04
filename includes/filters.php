<?php
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
function filter_nav_item( $bp_tpl_contents ) {
    $tpl = "<li>";

    $doc = new DOMDocument();
    $doc->loadHTML( $bp_tpl_contents );

    $nav_item_link_elements = $doc->getElementsByTagName('a');
    foreach ( $nav_item_link_elements as $el ) {
        $nav_item_name = $el->nodeValue;
        $nav_item_link = $el->getAttribute('href');
    }

    $nav_item_li = $doc->getElementsByTagName('li');
    foreach ( $nav_item_li as $el ) {
        foreach ( $el->attributes as $attr ) {
            if ( contains( 'selected', $attr->nodeValue ) )
                $tpl = "<li class=\"current selected active\">";
        }
    }

    // Consider whether there's a count of something involved
    $count = nav_item_count( $bp_tpl_contents );

    // Need to strip out HTML with the count in there
    $nav_item_exploded = explode( " ", $nav_item_name );
    if ( $count > 0 || end( $nav_item_exploded ) == '0' ) {
        // Trim off the number, so ridiculous...
        $nav_item_name = implode( " ", array_slice( explode( " ", $nav_item_name ), 0, -1 ) );

        if ( $count > 0 )
            $nav_item_name = sprintf( "%s <span class=\"badge\">%d</span>", $nav_item_name, $count );
        else
            $nav_item_name = $nav_item_name;
    }

    // We use the word "Wall" instead of "Home"
    if ( $nav_item_name == 'Home' || $nav_item_name == 'Activity' ) 
        $nav_item_name = 'Wall';

    // Put it all back together
    return $tpl . "<a href=\"" . $nav_item_link . "\">" . $nav_item_name . "</a></li>";
}

function filter_nav_item_no_count( $bp_tpl_contents ) {
    $tpl = "<li>";

    $doc = new DOMDocument();
    $doc->loadHTML( $bp_tpl_contents );

    $nav_item_link_elements = $doc->getElementsByTagName('a');
    foreach ( $nav_item_link_elements as $el ) {
        $nav_item_name = $el->nodeValue;
        $nav_item_link = $el->getAttribute('href');
    }

    $nav_item_li = $doc->getElementsByTagName('li');
    foreach ( $nav_item_li as $el ) {
        foreach ( $el->attributes as $attr ) {
            if ( contains( 'selected', $attr->nodeValue ) )
                $tpl = "<li class=\"current selected active\">";
        }
    }

    // Consider whether there's a count of something involved
    $count = nav_item_count( $bp_tpl_contents );

    // Need to strip out HTML with the count in there
    if ( $count > 0 )
        $nav_item_name = implode( " ", array_slice( explode( " ", $nav_item_name ), 0, -1 ) );

    // Put it all back together
    return $tpl . "<a href=\"" . $nav_item_link . "\">" . $nav_item_name . "</a></li>";
}

add_filter( 'bp_get_options_nav_public', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_edit', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_change-avatar', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_just-me', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_activity-mentions', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_activity-favs', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_activity-friends', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_activity-groups', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_friends-my-friends', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_requests', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_groups-my-groups', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_invites', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_home', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_members', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_invite', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_admin', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_inbox', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_sentbox', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_compose', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_notices', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_notifications-my-notifications', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_read', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_general', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_notifications', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_profile', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_capabilities', 'filter_nav_item', 10, 1 );
add_filter( 'bp_get_options_nav_delete-account', 'filter_nav_item', 10, 1 );


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
/*
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
*/
add_filter( 'bp_get_send_public_message_link'     , 'filter_activity_link' );
add_filter( 'bp_get_sitewide_activity_feed_link'  , 'filter_activity_link' );


/**
 * Change comment list to media objects
 */
function filter_comment_list( $default ) {
    return null;
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

/**
 * Login Form
 */
function myfossil_login_logo() {
    ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: none;
            padding-bottom: 30px;
        }
    </style>
    <?php
}
add_action( 'login_headertitle', 'myfossil_login_logo' );

function myfossil_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'myfossil_login_logo_url' );

function myfossil_login_logo_url_title() {
    return 'myFOSSIL';
}
add_filter( 'login_headertitle', 'myfossil_login_logo_url_title' );

function myfossil_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() .
            '/static/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'myfossil_login_stylesheet' );

function myfossil_login_message() {
    return sprintf( "<img src=\"%s/%s\" />", get_template_directory_uri(),
            '/static/img/myfossil-login-logo.png' );
}
add_filter( 'login_message', 'myfossil_login_message' );

function myfossil_login_remove_styles() {
    wp_dequeue_style( 'buttons' );
    wp_deregister_style( 'buttons' );
}
add_action( 'login_enqueue_scripts', 'myfossil_login_remove_styles', 0 );
add_action( 'wp_enqueue_scripts', 'myfossil_login_remove_styles', 0 );

/**
 * Includes
 */
require get_template_directory() . '/buddypress/groups/filters.php';
require get_template_directory() . '/buddypress/members/filters.php';
