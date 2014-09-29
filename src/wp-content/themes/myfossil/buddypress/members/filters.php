<?php
// disable directory search form
add_filter( 'bp_directory_members_search_form', '__return_null' );

// Displayed member in member navigation Bootstrap-ify
add_filter( 'bp_get_displayed_user_nav_activity', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_xprofile', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_notifications', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_messages', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_friends', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_groups', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_displayed_user_nav_settings', 'filter_nav_item', 10, 2 );

// Logged in member navigation Bootstrap-ify
add_filter( 'bp_get_loggedin_user_nav_activity', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_loggedin_user_nav_xprofile', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_loggedin_user_nav_notifications', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_loggedin_user_nav_messages', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_loggedin_user_nav_friends', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_loggedin_user_nav_groups', 'filter_nav_item', 10, 2 );
add_filter( 'bp_get_loggedin_user_nav_settings', 'filter_nav_item', 10, 2 );
