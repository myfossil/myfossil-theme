<?php

/**
 * Edit Topic Tag
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( current_user_can( 'edit_topic_tags' ) ) : ?>

	<div id="edit-topic-tag-<?php bbp_topic_tag_id(); ?>" class="bbp-topic-tag-form well">

		<fieldset class="bbp-form" id="bbp-edit-topic-tag">

			<legend><?php printf( __( 'Manage Tag: "%s"', 'myfossil' ), bbp_get_topic_tag_name() ); ?></legend>

			<fieldset class="bbp-form" id="tag-rename">

				<legend><?php _e( 'Rename', 'myfossil' ); ?></legend>

				<div class="bbp-template-notice alert alert-info info">
					<p><?php _e( 'Leave the slug empty to have one automatically generated.', 'myfossil' ); ?></p>
				</div>

				<div class="bbp-template-notice alert alert-info">
					<p><?php _e( 'Changing the slug affects its permalink. Any links to the old slug will stop working.', 'myfossil' ); ?></p>
				</div>

				<form id="rename_tag" name="rename_tag" method="post" action="<?php the_permalink(); ?>">

					<div>
						<label for="tag-name"><?php _e( 'Name:', 'myfossil' ); ?></label>
						<input type="text" id="tag-name" name="tag-name" size="20" maxlength="40" tabindex="<?php bbp_tab_index(); ?>" value="<?php echo esc_attr( bbp_get_topic_tag_name() ); ?>" />
					</div>

					<div>
						<label for="tag-slug"><?php _e( 'Slug:', 'myfossil' ); ?></label>
						<input type="text" id="tag-slug" name="tag-slug" size="20" maxlength="40" tabindex="<?php bbp_tab_index(); ?>" value="<?php echo esc_attr( apply_filters( 'editable_slug', bbp_get_topic_tag_slug() ) ); ?>" />
					</div>

					<div class="bbp-submit-wrapper">
						<button type="submit" class="btn btn-primary" tabindex="<?php bbp_tab_index(); ?>" class="button submit"><?php esc_attr_e( 'Update', 'myfossil' ); ?></button>

						<input type="hidden" name="tag-id" value="<?php bbp_topic_tag_id(); ?>" />
						<input type="hidden" name="action" value="bbp-update-topic-tag" />

						<?php wp_nonce_field( 'update-tag_' . bbp_get_topic_tag_id() ); ?>

					</div>
				</form>

			</fieldset>

			<fieldset class="bbp-form" id="tag-merge">

				<legend><?php _e( 'Merge', 'myfossil' ); ?></legend>

				<div class="bbp-template-notice alert alert-info">
					<p><?php _e( 'Merging tags together cannot be undone.', 'myfossil' ); ?></p>
				</div>

				<form id="merge_tag" name="merge_tag" method="post" action="<?php the_permalink(); ?>">

					<div>
						<label for="tag-existing-name"><?php _e( 'Existing tag:', 'myfossil' ); ?></label>
						<input type="text" id="tag-existing-name" name="tag-existing-name" size="22" tabindex="<?php bbp_tab_index(); ?>" maxlength="40" />
					</div>

					<div class="bbp-submit-wrapper">
						<button type="submit" class="btn btn-primary" tabindex="<?php bbp_tab_index(); ?>" class="button submit" onclick="return confirm('<?php echo esc_js( sprintf( __( 'Are you sure you want to merge the "%s" tag into the tag you specified?', 'myfossil' ), bbp_get_topic_tag_name() ) ); ?>');"><?php esc_attr_e( 'Merge', 'myfossil' ); ?></button>

						<input type="hidden" name="tag-id" value="<?php bbp_topic_tag_id(); ?>" />
						<input type="hidden" name="action" value="bbp-merge-topic-tag" />

						<?php wp_nonce_field( 'merge-tag_' . bbp_get_topic_tag_id() ); ?>
					</div>
				</form>

			</fieldset>

			<?php if ( current_user_can( 'delete_topic_tags' ) ) : ?>

				<fieldset class="bbp-form" id="delete-tag">

					<legend><?php _e( 'Delete', 'myfossil' ); ?></legend>

					<div class="bbp-template-notice alert alert-info info">
						<p><?php _e( 'This does not delete your topics. Only the tag itself is deleted.', 'myfossil' ); ?></p>
					</div>
					<div class="bbp-template-notice alert alert-info">
						<p><?php _e( 'Deleting a tag cannot be undone.', 'myfossil' ); ?></p>
						<p><?php _e( 'Any links to this tag will no longer function.', 'myfossil' ); ?></p>
					</div>

					<form id="delete_tag" name="delete_tag" method="post" action="<?php the_permalink(); ?>">

						<div class="bbp-submit-wrapper">
							<button type="submit" class="btn btn-primary" tabindex="<?php bbp_tab_index(); ?>" class="button submit" onclick="return confirm('<?php echo esc_js( sprintf( __( 'Are you sure you want to delete the "%s" tag? This is permanent and cannot be undone.', 'myfossil' ), bbp_get_topic_tag_name() ) ); ?>');"><?php esc_attr_e( 'Delete', 'myfossil' ); ?></button>

							<input type="hidden" name="tag-id" value="<?php bbp_topic_tag_id(); ?>" />
							<input type="hidden" name="action" value="bbp-delete-topic-tag" />

							<?php wp_nonce_field( 'delete-tag_' . bbp_get_topic_tag_id() ); ?>
						</div>
					</form>

				</fieldset>

			<?php endif; ?>

		</fieldset>
	</div>

<?php endif; ?>
