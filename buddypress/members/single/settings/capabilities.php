<?php do_action( 'bp_before_member_settings_template' ); ?>

<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/capabilities/'; ?>" name="account-capabilities-form" id="account-capabilities-form" class="standard-form form" method="post">

	<?php do_action( 'bp_members_capabilities_account_before_submit' ); ?>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="user-spammer" id="user-spammer" value="1" <?php checked( bp_is_user_spammer( bp_displayed_user_id() ) ); ?> />
             <?php _e( 'This user is a spammer.', 'buddypress' ); ?>
        </label>
    </div>

	<div class="submit">
		<input type="submit" value="<?php esc_attr_e( 'Save', 'buddypress' ); ?>" id="capabilities-submit" name="capabilities-submit btn btn-default" />
	</div>

	<?php do_action( 'bp_members_capabilities_account_after_submit' ); ?>

	<?php wp_nonce_field( 'capabilities' ); ?>

</form>

<?php do_action( 'bp_after_member_settings_template' ); ?>
