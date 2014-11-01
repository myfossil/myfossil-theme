<?php do_action( 'bp_before_group_manage_members_admin' ); ?>

<div class="row">

    <?php if ( bp_has_members( '&include='. bp_group_admin_ids() ) ) : ?>

        <div class="col-lg-6 col-md-6 col-sm-12">

            <h4><?php _e( 'Administrators', 'buddypress' ); ?></h4>

            <table id="admins-list" class="table item-list single-line">

                <?php while ( bp_members() ) : bp_the_member(); ?>
                <tr>
                    <td>
                        <?php echo bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id(), 'type' => 'thumb', 'width' => 30, 'height' => 30, 'alt' => sprintf( __( 'Profile picture of %s', 'buddypress' ), bp_get_member_name() ) ) ); ?>
                            <a href="<?php bp_member_permalink(); ?>"> <?php bp_member_name(); ?></a>
                    </td>
                    <td>
                        <?php if ( count( bp_group_admin_ids( false, 'array' ) ) > 1 ) : ?>
                            <a class="btn btn-default btn-sm button confirm admin-demote-to-member" href="<?php bp_group_member_demote_link( bp_get_member_user_id() ); ?>">
                                <i class="fa fa-fw fa-angle-double-down"></i>
                                <?php _e( 'Make Member', 'buddypress' ); ?>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>

            </table>
        </div>

    <?php endif; ?>

    <?php if ( bp_group_has_moderators() ) : ?>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <h4><?php _e( 'Moderators', 'buddypress' ); ?></h4>

            <?php if ( bp_has_members( '&include=' . bp_group_mod_ids() ) ) : ?>

                <table id="mods-list" class="table item-list single-line">

                    <?php while ( bp_members() ) : bp_the_member(); ?>
                    <tr>
                        <td>
                            <?php echo bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id(), 'type' => 'thumb', 'width' => 30, 'height' => 30, 'alt' => sprintf( __( 'Profile picture of %s', 'buddypress' ), bp_get_member_name() ) ) ); ?>
                            <a href="<?php bp_member_permalink(); ?>">
                                <?php bp_member_name(); ?>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-default button confirm mod-promote-to-admin" 
                                    href="<?php bp_group_member_promote_admin_link( array( 'user_id' => bp_get_member_user_id() ) ); ?>" 
                                    title="<?php esc_attr_e( 'Promote to Admin', 'buddypress' ); ?>">
                                <i class="fa fa-fw fa-angle-double-up"></i>
                                <?php _e( 'Make Admin', 'buddypress' ); ?>
                            </a>
                            <a class="btn btn-sm btn-default button confirm mod-demote-to-member" 
                                    href="<?php bp_group_member_demote_link( bp_get_member_user_id() ); ?>">
                                <i class="fa fa-fw fa-angle-down"></i>
                                <?php _e( 'Make Member', 'buddypress' ); ?>
                            </a>
                        </td>
                    </li>
                    <?php endwhile; ?>
                </table>

            <?php endif; ?>
        </div>
    <?php endif ?>


    <?php if ( bp_group_has_members( 'per_page=15&exclude_banned=false' ) ) : ?>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4><?php _e("Members", "buddypress"); ?></h4>

            <?php if ( bp_group_member_needs_pagination() ) : ?>

                <div class="pagination no-ajax">

                    <div id="member-count" class="pag-count">
                        <?php bp_group_member_pagination_count(); ?>
                    </div>

                    <div id="member-admin-pagination" class="pagination-links">
                        <?php bp_group_member_admin_pagination(); ?>
                    </div>

                </div>

            <?php endif; ?>

            <table id="members-list" class="table item-list single-line">

                <?php while ( bp_group_members() ) : bp_group_the_member(); ?>

                    <tr class="<?php bp_group_member_css_class(); ?>">
                        <td>
                            <?php bp_group_member_avatar_mini(); ?>
                            <?php bp_group_member_link(); ?>
                            <?php if ( bp_get_group_member_is_banned() ) _e( '(banned)', 'buddypress' ); ?>
                        </td>
                        <td>
                            <?php if ( bp_get_group_member_is_banned() ) : ?>
                                <a href="<?php bp_group_member_unban_link(); ?>" 
                                        class="btn btn-sm btn-default button confirm member-unban" 
                                        title="<?php esc_attr_e( 'Unban this member', 'buddypress' ); ?>">
                                    <i class="fa fa-fw fa-circle-o"></i>
                                    <?php _e( 'Unban', 'buddypress' ); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php bp_group_member_remove_link(); ?>" 
                                        class="btn btn-sm btn-default button confirm" 
                                        title="<?php esc_attr_e( 'Remove this member', 'buddypress' ); ?>">
                                    <i class="fa fa-fw fa-trash-o"></i>
                                    <?php _e( 'Kick', 'buddypress' ); ?>
                                </a>
                                <a href="<?php bp_group_member_ban_link(); ?>" 
                                        class="btn btn-sm btn-default button confirm member-ban" 
                                        title="<?php esc_attr_e( 'Kick and ban this member', 'buddypress' ); ?>">
                                    <i class="fa fa-fw fa-ban"></i>
                                    <?php _e( 'Ban', 'buddypress' ); ?>
                                </a>
                                <a href="<?php bp_group_member_promote_admin_link(); ?>" 
                                        class="btn btn-sm btn-default button confirm member-promote-to-admin" 
                                        title="<?php esc_attr_e( 'Promote to Admin', 'buddypress' ); ?>">
                                    <i class="fa fa-fw fa-angle-double-up"></i>
                                    <?php _e( 'Make Admin', 'buddypress' ); ?>
                                </a>
                                <a href="<?php bp_group_member_promote_mod_link(); ?>" 
                                        class="btn btn-sm btn-default button confirm member-promote-to-mod" 
                                        title="<?php esc_attr_e( 'Promote to Mod', 'buddypress' ); ?>">
                                    <i class="fa fa-fw fa-angle-up"></i>
                                    <?php _e( 'Make Mod', 'buddypress' ); ?>
                                </a>
                            <?php endif; ?>

                            <?php do_action( 'bp_group_manage_members_admin_item' ); ?>
                        </td>
                    </tr>

                <?php endwhile; ?>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php do_action( 'bp_after_group_manage_members_admin' ); ?>
