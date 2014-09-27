<?php do_action( 'bp_before_group_settings_admin' ); ?>

<?php if ( bp_is_active( 'forums' ) ) : ?>

    <?php if ( bp_forums_is_installed_correctly() ) : ?>

        <div class="checkbox">
            <label><input type="checkbox" name="group-show-forum" id="group-show-forum" value="1"<?php bp_group_show_forum_setting(); ?> /> <?php _e( 'Enable discussion forum', 'buddypress' ); ?></label>
        </div>

        <hr />

    <?php endif; ?>

<?php endif; ?>

<h4><?php _e( 'Privacy Options', 'buddypress' ); ?></h4>

<div class="radio">
    <label>
        <input type="radio" name="group-status" value="public"<?php bp_group_show_status_setting( 'public' ); ?> />
        <strong><?php _e( 'This is a public group', 'buddypress' ); ?></strong>
        <ul>
            <li><?php _e( 'Any site member can join this group.', 'buddypress' ); ?></li>
            <li><?php _e( 'This group will be listed in the groups directory and in search results.', 'buddypress' ); ?></li>
            <li><?php _e( 'Group content and activity will be visible to any site member.', 'buddypress' ); ?></li>
        </ul>
    </label>
</div>
<div class="radio">
    <label>
        <input type="radio" name="group-status" value="private"<?php bp_group_show_status_setting( 'private' ); ?> />
        <strong><?php _e( 'This is a private group', 'buddypress' ); ?></strong>
        <ul>
            <li><?php _e( 'Only users who request membership and are accepted can join the group.', 'buddypress' ); ?></li>
            <li><?php _e( 'This group will be listed in the groups directory and in search results.', 'buddypress' ); ?></li>
            <li><?php _e( 'Group content and activity will only be visible to members of the group.', 'buddypress' ); ?></li>
        </ul>
    </label>

</div>
<div class="radio">
    <label>
        <input type="radio" name="group-status" value="hidden"<?php bp_group_show_status_setting( 'hidden' ); ?> />
        <strong><?php _e( 'This is a hidden group', 'buddypress' ); ?></strong>
        <ul>
            <li><?php _e( 'Only users who are invited can join the group.', 'buddypress' ); ?></li>
            <li><?php _e( 'This group will not be listed in the groups directory or search results.', 'buddypress' ); ?></li>
            <li><?php _e( 'Group content and activity will only be visible to members of the group.', 'buddypress' ); ?></li>
        </ul>
    </label>
</div>

<hr />

<h4><?php _e( 'Group Invitations', 'buddypress' ); ?></h4>

<p><?php _e( 'Which members of this group are allowed to invite others?', 'buddypress' ); ?></p>

<div class="radio">
    <label>
        <input type="radio" name="group-invite-status" value="members"<?php bp_group_show_invite_status_setting( 'members' ); ?> />
        <?php _e( 'All group members', 'buddypress' ); ?>
    </label>
</div>

<div class="radio">
    <label>
        <input type="radio" name="group-invite-status" value="mods"<?php bp_group_show_invite_status_setting( 'mods' ); ?> />
        <?php _e( 'Group admins and mods only', 'buddypress' ); ?>
    </label>
</div>

<div class="radio">
    <label>
        <input type="radio" name="group-invite-status" value="admins"<?php bp_group_show_invite_status_setting( 'admins' ); ?> />
        <?php _e( 'Group admins only', 'buddypress' ); ?>
    </label>
</div>

<hr />

<?php do_action( 'bp_after_group_settings_admin' ); ?>

<button type="submit" class="btn btn-default" id="save" name="save">
    <i class="fa fa-fw fa-save"></i>
    Save Changes
</button>

<?php wp_nonce_field( 'groups_edit_group_settings' ); ?>
