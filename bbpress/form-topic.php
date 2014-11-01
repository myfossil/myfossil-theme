<?php

/**
 * New/Edit Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( !bbp_is_single_forum() ) : ?>

<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

<?php endif; ?>

<?php if ( bbp_is_topic_edit() ) : ?>

	<?php bbp_topic_tag_list( bbp_get_topic_id() ); ?>

	<?php bbp_single_topic_description( array( 'topic_id' => bbp_get_topic_id() ) ); ?>

<?php endif; ?>

<?php if ( bbp_current_user_can_access_create_topic_form() ) : ?>

	<div id="new-topic-<?php bbp_topic_id(); ?>" class="bbp-topic-form well well-sm">

		<form id="new-post" name="new-post" method="post" action="<?php the_permalink(); ?>">

			<?php do_action( 'bbp_theme_before_topic_form' ); ?>

			<fieldset class="bbp-form">
				<legend>

					<?php
						if ( bbp_is_topic_edit() )
							printf( __( 'Now Editing &ldquo;%s&rdquo;', 'myfossil' ), bbp_get_topic_title() );
						else
							bbp_is_single_forum() ? printf( __( 'Create New Topic in &ldquo;%s&rdquo;', 'myfossil' ), bbp_get_forum_title() ) : _e( 'Create New Topic', 'myfossil' );
					?>

				</legend>

				<?php do_action( 'bbp_theme_before_topic_form_notices' ); ?>

				<?php if ( !bbp_is_topic_edit() && bbp_is_forum_closed() ) : ?>

					<div class="bbp-template-notice alert alert-info">
						<p><?php _e( 'This forum is marked as closed to new topics, however your posting capabilities still allow you to do so.', 'myfossil' ); ?></p>
					</div>

				<?php endif; ?>

				<?php if ( current_user_can( 'unfiltered_html' ) ) : ?>

					<div class="bbp-template-notice alert alert-info">
						<p><?php _e( 'Your account has the ability to post unrestricted HTML content.', 'myfossil' ); ?></p>
					</div>

				<?php endif; ?>

				<?php do_action( 'bbp_template_notices' ); ?>

				<div>

					<?php bbp_get_template_part( 'form', 'anonymous' ); ?>

					<?php do_action( 'bbp_theme_before_topic_form_title' ); ?>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-comments"></i></span>
                            <input type="text" class="form-control" id="bbp_topic_title" placeholder="<?php printf( __( 'Topic Title (Maximum Length: %d):', 'myfossil' ), bbp_get_title_max_length() ); ?>" value="<?php bbp_form_topic_title(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_title" maxlength="<?php bbp_title_max_length(); ?>" />
                        </div>
                    </div>

					<?php do_action( 'bbp_theme_after_topic_form_title' ); ?>

					<?php if ( bbp_is_anonymous() || ( bbp_is_topic_edit() && bbp_is_topic_anonymous() ) || ( bbp_is_reply_edit() && bbp_is_reply_anonymous() ) ) { ?>
					    </div>
						<div class="col-xs-12 col-sm-7 col-md-7">
                    <?php } ?>
                    
					<?php do_action( 'bbp_theme_before_topic_form_content' ); ?>

					<?php bbp_the_content( array( 'context' => 'topic', 'tinymce' => true ) ); ?>


					<?php do_action( 'bbp_theme_after_topic_form_content' ); ?>

					<?php if ( bbp_is_anonymous() || ( bbp_is_topic_edit() && bbp_is_topic_anonymous() ) || ( bbp_is_reply_edit() && bbp_is_reply_anonymous() ) ) { ?>
                            </div><!-- col-xs-12 col-sm-8 col-md-8 -->
                          </div><!-- row -->
                    <?php } ?>

					<?php /*if ( ! ( bbp_use_wp_editor() || current_user_can( 'unfiltered_html' ) ) ) : ?>

						<p class="form-allowed-tags">
							<label><?php _e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'myfossil' ); ?></label><br />
							<pre><?php bbp_allowed_tags(); ?></pre>
						</p>

					<?php endif;*/ ?>

					<?php if ( bbp_allow_topic_tags() && current_user_can( 'assign_topic_tags' ) ) : ?>

						<?php do_action( 'bbp_theme_before_topic_form_tags' ); ?>

						<p>
							<label for="bbp_topic_tags"><?php _e( 'Topic Tags:', 'myfossil' ); ?></label><br />
							<input type="text" value="<?php bbp_form_topic_tags(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_tags" id="bbp_topic_tags" <?php disabled( bbp_is_topic_spam() ); ?> />
						</p>

						<?php do_action( 'bbp_theme_after_topic_form_tags' ); ?>

					<?php endif; ?>

					<?php if ( !bbp_is_single_forum() ) : ?>

						<?php do_action( 'bbp_theme_before_topic_form_forum' ); ?>

						<p>
							<label for="bbp_forum_id"><?php _e( 'Forum:', 'myfossil' ); ?></label><br />
							<?php
								bbp_dropdown( array(
									'show_none' => __( '(No Forum)', 'myfossil' ),
									'selected'  => bbp_get_form_topic_forum()
								) );
                            ?>
						</p>

						<?php do_action( 'bbp_theme_after_topic_form_forum' ); ?>

					<?php endif; ?>

					<?php if ( class_exists( 'BBP_Walker_Reply' ) && current_user_can( 'moderate' ) ) : ?>

						<?php do_action( 'bbp_theme_before_topic_form_type' ); ?>

						<p>

							<label for="bbp_stick_topic"><?php _e( 'Topic Type:', 'myfossil' ); ?></label><br />

							<?php bbp_form_topic_type_dropdown(); ?>

						</p>

						<?php do_action( 'bbp_theme_after_topic_form_type' ); ?>

						<?php do_action( 'bbp_theme_before_topic_form_status' ); ?>

						<p>

							<label for="bbp_topic_status"><?php _e( 'Topic Status:', 'myfossil' ); ?></label><br />

							<?php bbp_form_topic_status_dropdown(); ?>

						</p>

						<?php do_action( 'bbp_theme_after_topic_form_status' ); ?>

					<?php endif; ?>

					<?php if ( bbp_is_subscriptions_active() && !bbp_is_anonymous() && ( !bbp_is_topic_edit() || ( bbp_is_topic_edit() && !bbp_is_topic_anonymous() ) ) ) : ?>

						<?php do_action( 'bbp_theme_before_topic_form_subscriptions' ); ?>

						<p>
							<input name="bbp_topic_subscription" id="bbp_topic_subscription" type="checkbox" value="bbp_subscribe" <?php bbp_form_topic_subscribed(); ?> tabindex="<?php bbp_tab_index(); ?>" />

							<?php if ( bbp_is_topic_edit() && ( bbp_get_topic_author_id() !== bbp_get_current_user_id() ) ) : ?>

								<label for="bbp_topic_subscription"><?php _e( 'Notify the author of follow-up replies via email', 'myfossil' ); ?></label>

							<?php else : ?>

								<label for="bbp_topic_subscription"><?php _e( 'Notify me of follow-up replies via email', 'myfossil' ); ?></label>

							<?php endif; ?>
						</p>

						<?php do_action( 'bbp_theme_after_topic_form_subscriptions' ); ?>

					<?php endif; ?>

					<?php if ( bbp_allow_revisions() && bbp_is_topic_edit() ) : ?>

						<?php do_action( 'bbp_theme_before_topic_form_revisions' ); ?>

						<fieldset class="bbp-form">

							<legend>
								<input name="bbp_log_topic_edit" id="bbp_log_topic_edit" type="checkbox" value="1" <?php bbp_form_topic_log_edit(); ?> tabindex="<?php bbp_tab_index(); ?>" />
								<label for="bbp_log_topic_edit"><?php _e( 'Keep a log of this edit:', 'myfossil' ); ?></label><br />
							</legend>

							<div>
								<label for="bbp_topic_edit_reason"><?php printf( __( 'Optional reason for editing:', 'myfossil' ), bbp_get_current_user_name() ); ?></label><br />
								<input type="text" value="<?php bbp_form_topic_edit_reason(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_edit_reason" id="bbp_topic_edit_reason" />
							</div>
						</fieldset>

						<?php do_action( 'bbp_theme_after_topic_form_revisions' ); ?>

					<?php endif; ?>

					<?php do_action( 'bbp_theme_before_topic_form_submit_wrapper' ); ?>

					<div class="bbp-submit-wrapper">

						<?php do_action( 'bbp_theme_before_topic_form_submit_button' ); ?>

						<button type="submit" class="btn btn-primary" tabindex="<?php bbp_tab_index(); ?>" id="bbp_topic_submit" name="bbp_topic_submit" class="button submit"><?php _e( 'Submit', 'myfossil' ); ?></button>

						<?php do_action( 'bbp_theme_after_topic_form_submit_button' ); ?>

					</div>

					<?php do_action( 'bbp_theme_after_topic_form_submit_wrapper' ); ?>

				</div>

				<?php bbp_topic_form_fields(); ?>

			</fieldset>

			<?php do_action( 'bbp_theme_after_topic_form' ); ?>

		</form>
	</div>

<?php elseif ( bbp_is_forum_closed() ) : ?>

	<div id="no-topic-<?php bbp_topic_id(); ?>" class="bbp-no-topic">
		<div class="bbp-template-notice alert alert-info">
			<p><?php printf( __( 'The forum &#8216;%s&#8217; is closed to new topics and replies.', 'myfossil' ), bbp_get_forum_title() ); ?></p>
		</div>
	</div>

<?php else : ?>

	<div id="no-topic-<?php bbp_topic_id(); ?>" class="bbp-no-topic">
		<div class="bbp-template-notice alert alert-info">
			<p><?php is_user_logged_in() ? _e( 'You cannot create new topics.', 'myfossil' ) : _e( 'You must be logged in to create new topics.', 'myfossil' ); ?></p>
		</div>
	</div>

<?php endif; ?>

<?php if ( !bbp_is_single_forum() ) : ?>

</div>

<?php endif; ?>
