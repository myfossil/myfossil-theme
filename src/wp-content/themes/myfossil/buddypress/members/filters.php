<?php
// Disable directory search form
add_filter( 'bp_directory_members_search_form', '__return_null' );

/*
// Displayed member in member navigation Bootstrap-ify
add_filter( 'bp_get_displayed_user_nav_activity', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_xprofile', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_notifications', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_messages', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_friends', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_groups', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_settings', 'filter_nav_item', 10, 2 );

// Logged in member navigation Bootstrap-ify
add_filter( 'bp_get_loggedin_user_nav_activity', 'filter_nav_item', 999, 2 );
add_filter( 'bp_get_loggedin_user_nav_xprofile', 'filter_nav_item', 999, 2 );
add_filter( 'bp_get_loggedin_user_nav_notifications', 'filter_nav_item', 999, 2 );
add_filter( 'bp_get_loggedin_user_nav_messages', 'filter_nav_item', 999, 2 );
add_filter( 'bp_get_loggedin_user_nav_friends', 'filter_nav_item', 999, 2 );
add_filter( 'bp_get_loggedin_user_nav_groups', 'filter_nav_item', 999, 2 );
add_filter( 'bp_get_loggedin_user_nav_settings', 'filter_nav_item', 999, 2 );
*/

/**
 * Style User profile buttons appropriately
 */
function filter_bp_button_members( $btn ) {
    $map_btn_link_text = array(
            'pending' => "Cancel Friending",
            'awaiting_response' => "Pending",
            'is_friend' => "Unfriend",
            'not_friends' => "Request Friend",
            'private_message' => "Direct Message",
            'public_message' => "Message"
        );

    $map_btn_link_text_icons = array(
            'pending' => "fa-stop",
            'awaiting_response' => "fa-circle-o-notch fa-spin",
            'is_friend' => "fa-remove",
            'not_friends' => "fa-child",
            'private_message' => "fa-comment",
            'public_message' => "fa-comment-o"
        );

    $btn['link_text'] = sprintf( '<i class="fa fa-fw %s"></i> %s', 
            $map_btn_link_text_icons[$btn['id']],
            $map_btn_link_text[$btn['id']] 
        );

    $btn['link_class'] .= " btn-block";

    $btn['wrapper_class'] = "col-sm-12 col-md-6";

    return $btn;
}
add_filter( 'bp_get_add_friend_button', 'filter_bp_button_members' );
add_filter( 'bp_get_send_public_message_button', '__return_null' );
add_filter( 'bp_get_send_message_button_args', 'filter_bp_button_members' );


/**
 * Style profile editing form (seriously, this needs a filter?)
 */
function filter_bp_profile_edit_fields( $r, $class ) {
    $classes = "form-control col-sm-10";
    if ( array_key_exists( 'class', $r ) ) 
        $r['class'] .= " " . $classes;
    else
        $r['class'] = $classes;
    return $r;
}
add_filter( 'bp_xprofile_field_edit_html_elements', 'filter_bp_profile_edit_fields', null, 2 );
