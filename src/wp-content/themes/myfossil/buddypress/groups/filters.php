<?php
/**
 * Modifies leave/join group button template
 * 
 * @see myfossil/includes/filters.php
 */
function filter_bp_group_join_button( $btn ) {
    $btn_txt_leave = 'Leave Organization';
    $btn_txt_join = 'Join Organization';
    $is_member = $btn['link_text'] == 'Leave Group';

    $btn['must_be_logged_in'] = true;
    $btn['link_text'] = $is_member ? $btn_txt_leave : $btn_txt_join;
    $btn['link_id'] = "join";

    return $btn;
}
add_filter( 'bp_get_group_join_button', 'filter_bp_button' );
add_filter( 'bp_get_group_join_button', 'filter_bp_group_join_button' );
