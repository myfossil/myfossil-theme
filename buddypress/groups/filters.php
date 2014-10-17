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


/**
 * Customize the search form for group listing...
 */
function filter_bp_directory_groups_search_form( $html ) {
    return <<<EOT
        <form action="" method="get" id="search-groups-form" _lpchecked="1" class="form">
            <label class="sr-only">
                Search query
            </label>
            <div class="input-group">
                <input type="text" name="s" id="groups_search" class="form-control" placeholder="Search Groups..." />
                <span class="input-group-btn">
                    <button type="submit" id="groups_search_submit" name="groups_search_submit" class="btn btn-default">
                        <i class="fa fa-fw fa-search"></i>
                        <span class="sr-only">Search</span>
                    </button>
                </span>
            </div>
        </form>
EOT;
}
add_filter( 'bp_directory_groups_search_form', 'filter_bp_directory_groups_search_form');
