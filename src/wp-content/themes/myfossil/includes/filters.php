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
