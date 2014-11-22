<?php
/**
 * List members for the side-bar on the Organizations page
 */
$n_members_to_show = 5;
$n_members_shown = 0;

if ( bp_group_has_members( bp_ajax_querystring( 'group_members' ) ) ) 
{
    printf('<h5 class="side-header">Members</h5>');
	printf('<ul id="member-list" class="item-list">'); 

    while ( bp_group_members() ) 
    {
        bp_group_the_member(); 

        // limit number of members to show in the list
        if ( $n_members_shown < $n_members_to_show ) {
            printf("<li><a href=\"%s\">%s</a></li>\n", bp_get_group_member_domain(), bp_get_group_member_avatar_thumb());
        }

        $n_members_shown++;
    } 

    $n_members = $n_members_shown + 1;

    printf('</ul>');

    if ( $n_members > $n_members_to_show ) {
        printf("<div class=\"pull-right clearfix\"><a href=\"members\">Sell all %d</a></div>", $n_members );
    }

} 
