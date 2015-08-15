<?php if ( ! bp_is_item_admin() ) die(); ?>

<div class="item-list-tabs no-ajax" id="subnav" role="tablist">

	<ul class="nav nav-pills" id="nav-sub">
        <?php
        /*
         * Note that for the including of templates, we follow that the files
         * so make sure that file naming matches the keys
         */
        $admin_menu = array(
                'edit-details' => 'Details',
                'group-settings' => 'Settings',
                'group-avatar' => 'Photo',
                'manage-members' => 'Members',
                'membership-requests' => 'Requests',
                'delete-group' => 'Delete',
            );

        $current_tab = bp_get_group_current_admin_tab();
        $group = groups_get_current_group();

        foreach ( $admin_menu as $url_key => $name ) {
            if ( $group->status !== 'private' && $url_key == 'membership-requests' )
                continue;

            $url = trailingslashit( bp_get_group_permalink( $group ) ) . 'admin/' . $url_key;

            $tpl = ( $current_tab == $url_key ) ? "<li class=\"active\">" : "<li>";
            $tpl .= "<a href=\"%s\">%s</a>";
            $tpl .= "</li>";

            printf($tpl, $url, $name);
        }

        ?>
	</ul>

</div><!-- .item-list-tabs -->

<form action="<?php bp_group_admin_form_action(); ?>" name="group-settings-form" id="group-settings-form" class="form standard-form" method="post" enctype="multipart/form-data" role="main">

    <?php
    do_action( 'bp_before_group_admin_content' );

    foreach ( $admin_menu as $url_key => $name ) {
        if ( bp_is_group_admin_screen( $url_key ) ) {
            bp_get_template_part( 'groups/single/admin/' . $url_key );
            break;
        }
    }

    do_action( 'groups_custom_edit_steps' ); // Allow plugins to add custom group edit screens

    /* This is important, don't forget it */
    printf('<input type="hidden" name="group-id" id="group-id" value="%d" />', bp_get_group_id() );

    do_action( 'bp_after_group_admin_content' );

    ?>

</form><!-- #group-settings-form -->
