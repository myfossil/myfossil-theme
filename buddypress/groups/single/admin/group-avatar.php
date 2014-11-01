<?php if ( 'upload-image' == bp_get_avatar_admin_step() ) : ?>

        <p>
            <?php _e("Upload an image to use as a profile photo for this group. The image will be shown on the main group page, and in search results.", 'buddypress' ); ?>
        </p>

        <div class="form-group">
            <span class="file-input btn btn-default btn-file">
                Browse <input type="file" name="file" id="file" />
            </span>

            <input type="hidden" name="action" id="action" value="bp_avatar_upload" />

            <button type="submit" class="btn btn-default" name="upload" id="upload">
                <i class="fa fa-fw fa-upload"></i>
                Upload Image
            </button>
        </div>

        <?php if ( bp_get_group_has_avatar() ) : ?>

            <p><?php _e( "If you'd like to remove the existing group profile photo but not upload a new one, please use the delete group profile photo button.", 'buddypress' ); ?></p>

            <?php bp_button( array( 'id' => 'delete_group_avatar', 'component' => 'groups', 'wrapper_id' => 'delete-group-avatar-button', 'link_class' => 'edit', 'link_href' => bp_get_group_avatar_delete_link(), 'link_title' => __( 'Delete Group Profile Photo', 'buddypress' ), 'link_text' => __( 'Delete Group Profile Photo', 'buddypress' ) ) ); ?>

        <?php endif; ?>

        <?php wp_nonce_field( 'bp_avatar_upload' ); ?>

<?php endif; ?>

<?php if ( 'crop-image' == bp_get_avatar_admin_step() ) : ?>

    <h4><?php _e( 'Crop Profile Photo', 'buddypress' ); ?></h4>

    <img src="<?php bp_avatar_to_crop(); ?>" id="avatar-to-crop" class="avatar" alt="<?php esc_attr_e( 'Profile photo to crop', 'buddypress' ); ?>" />

    <div id="avatar-crop-pane">
        <img src="<?php bp_avatar_to_crop(); ?>" id="avatar-crop-preview" class="avatar" alt="<?php esc_attr_e( 'Profile photo preview', 'buddypress' ); ?>" />
    </div>

    <input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php esc_attr_e( 'Crop Image', 'buddypress' ); ?>" />

    <input type="hidden" name="image_src" id="image_src" value="<?php bp_avatar_to_crop_src(); ?>" />
    <input type="hidden" id="x" name="x" />
    <input type="hidden" id="y" name="y" />
    <input type="hidden" id="w" name="w" />
    <input type="hidden" id="h" name="h" />

    <?php wp_nonce_field( 'bp_avatar_cropstore' ); ?>

<?php endif; ?>
