<?php do_action( 'bp_before_profile_edit_content' );

if ( bp_has_profile( 'profile_group_id=' . bp_get_current_profile_group_id() ) ) :
	while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

<form action="<?php bp_the_profile_group_edit_form_action(); ?>" method="post" id="profile-edit-form" class="form-horizontal standard-form <?php bp_the_profile_group_slug(); ?>">

	<?php do_action( 'bp_before_profile_field_content' ); ?>

		<?php //<h4><?php printf( __( "Editing '%s' Profile Group", "buddypress" ), bp_get_the_profile_group_name() ); </h4> ?>
        <h4>Edit Profile</h4>

		<?php if ( bp_profile_has_multiple_groups() > 1 ) : ?>
			<ul class="nav nav-pills button-nav">
				<?php bp_profile_group_tabs(); ?>
			</ul>
		<?php endif ;?>

		<div class="clearfix"></div>

		<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

            <div class="row form-group">
                <div<?php bp_field_css_class( 'editfield' ); ?>>

                    <div class="col-sm-12 col-md-6">
                        <?php
                        $field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
                        $field_type->edit_field_html();

                        do_action( 'bp_custom_profile_edit_fields_pre_visibility' );
                        ?>

                        <p class="description"><?php bp_the_profile_field_description(); ?></p>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <?php
                            $privacy_tpl = __( '<span class="sr-only">This field can be seen by</span><i class="fa fa-fw fa-lg fa-eye"></i> Seen by... <span class="current-visibility-level">%s</span>', 'buddypress' );
                        ?>
                        <?php if ( bp_current_user_can( 'bp_xprofile_change_field_visibility' ) ) : ?>
                            <div class="field-visibility-settings-toggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
                                <?php printf( $privacy_tpl, bp_get_the_profile_field_visibility_level_label() ) ?>
                                <a href="#" class="btn btn-primary visibility-toggle-link"><?php _e( 'Change', 'buddypress' ); ?></a>
                            </div>

                            <div class="field-visibility-settings" id="field-visibility-settings-<?php bp_the_profile_field_id() ?>">
                                <fieldset>
                                    <legend><?php _e( 'Who can see this field?', 'buddypress' ) ?></legend>
                                    <?php bp_profile_visibility_radio_buttons() ?>
                                </fieldset>
                                <a class="btn btn-primary field-visibility-settings-close" href="#"><?php _e( 'Close', 'buddypress' ) ?></a>
                            </div>
                        <?php else : ?>
                            <div class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
                                <?php printf( $privacy_tpl, bp_get_the_profile_field_visibility_level_label() ) ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <?php do_action( 'bp_custom_profile_edit_fields' ); ?>

                </div>
			</div>

		<?php endwhile; ?>

	<?php do_action( 'bp_after_profile_field_content' ); ?>

	<div class="submit">
		<input class="btn btn-default" type="submit" name="profile-group-edit-submit" id="profile-group-edit-submit" value="<?php esc_attr_e( 'Save Changes', 'buddypress' ); ?> " />
	</div>

	<input type="hidden" name="field_ids" id="field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

	<?php wp_nonce_field( 'bp_xprofile_edit' ); ?>

</form>

<?php endwhile; endif; ?>

<?php do_action( 'bp_after_profile_edit_content' ); ?>
