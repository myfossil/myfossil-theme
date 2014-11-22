<?php do_action( 'bp_before_group_delete_admin' ); ?>

<div id="message" class="alert alert-warning">
    <p>
        <strong>Warning:</strong> Deleting this group will completely remove
        <strong>all</strong> content associated with it. There is no way back,
        please be careful with this option.
    </p>
</div>

<div class="checkbox">
    <label>
        <input type="checkbox" name="delete-group-understand" id="delete-group-understand" value="1" onclick="if(this.checked) { document.getElementById('delete-group-button').disabled = ''; } else { document.getElementById('delete-group-button').disabled = 'disabled'; }" /> 
        <?php _e( 'I understand the consequences of deleting this group.', 'buddypress' ); ?>
    </label>
</div>

<?php do_action( 'bp_after_group_delete_admin' ); ?>

<div class="submit">
    <button type="submit" class="btn btn-danger" disabled="disabled" id="delete-group-button" name="delete-group-button">
        <i class="fa fa-fw fa-trash-o"></i>
        <?php esc_attr_e( 'Delete Group', 'buddypress' ); ?>
    </button>
</div>

<?php wp_nonce_field( 'groups_delete_group' ); ?>
