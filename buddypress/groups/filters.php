<?php
/**
 * Modifies leave/join group button template
 *
 * @see myfossil/includes/filters.php
 */
function filter_bp_group_join_button( $btn ) {
    $btn_txt_leave = 'Leave Group';
    $btn_txt_join = 'Join Group';
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
        <div id="group-dir-search" class="dir-search section pull-right" role="search">
            <form action="" method="get" id="search-groups-form" _lpchecked="1" class="form">
                <div class="form-group">
                    <label><input type="text" name="s" id="groups_search" placeholder="Search Groups..." class="form-control"></label>
                    

                     <button class="btn btn-primary btn-search" role="button" ><span class="fa-stack">                        
                                <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                            </span>Search groups</button>

                </div>
            </form>
        </div>
EOT;
}
add_filter( 'bp_directory_groups_search_form', 'filter_bp_directory_groups_search_form');
