<?php do_action( 'bp_before_group_details_admin' ); ?>

<div class="form-group">
    <label class="label-control" for="group-name"><?php _e( 'Group Name (required)', 'buddypress' ); ?></label>
    <input class="form-control" type="text" name="group-name" id="group-name" value="<?php bp_group_name(); ?>" aria-required="true" />
</div>

<div class="form-group">
    <label class="label-control" for="group-desc"><?php _e( 'Group Description (required)', 'buddypress' ); ?></label>
    <textarea class="form-control" name="group-desc" id="group-desc" aria-required="true"><?php bp_group_description_editable(); ?></textarea>
</div>

<?php do_action( 'groups_custom_group_fields_editable' ); ?>

<div class="checkbox">
    <label>
        <input type="checkbox" name="group-notify-members" value="1" /> <?php _e( 'Notify group members of these changes via email', 'buddypress' ); ?>
    </label>
</div>

<?php do_action( 'bp_after_group_details_admin' ); ?>

<button type="submit" class="btn btn-default" id="save" name="save">
    <i class="fa fa-fw fa-save"></i>
    Save Changes
</button>

<?php wp_nonce_field( 'groups_edit_group_details' ); ?>
