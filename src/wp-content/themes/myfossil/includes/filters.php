<?php
/**
 * Modifies Member nav list item
 * 
 * @see includes/extras.php
 * @param bp_tpl_contents the default contents of the nav item from BP core template
 * @param nav_item the nav item
 */
function filter_nav_item( $bp_tpl_contents, $nav_item ) {
    // Consider whether or not this is the current nav item
    $selected = contains('class="', $bp_tpl_contents);
    if ( !$selected )
        $tpl = "<li>";
    else 
        $tpl = "<li class=\"active\">";

    // Consider whether there's a count of something involved
    $count = nav_item_count( $bp_tpl_contents );
    if ( $count > 0 ) {
        // Need to strip out HTML with the count in there
        $nav_item['name'] = strip_tags_contents( $nav_item['name'] );
        $nav_item['name'] .= " <span class=\"badge\">" . $count . "</span>";
    }

    // Put it all back together
    return $tpl . "<a href=\"" . $nav_item['link'] . "\">" . $nav_item['name'] . "</a></li>";
}
add_filter( 'bp_get_options_nav_groups', 'filter_nav_item', null, 2 );
add_filter( 'bp_get_options_nav_members', 'filter_nav_item', null, 2 );
add_filter( 'bp_get_options_nav_invite', 'filter_nav_item', null, 2 );
add_filter( 'bp_get_options_nav_admin', 'filter_nav_item', null, 2 ); 


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
