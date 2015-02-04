<?php

/**
 * BuddyPress - Activity Post Form
 *
 * @package myfossil
 * @subpackage theme
 */
?>
<form action="<?php bp_activity_post_form_action(); ?>" method="post" id="whats-new-form" name="whats-new-form" role="complementary" class="form">

	<?php do_action('bp_before_activity_post_form'); ?>

	<div id="whats-new-content">

		<div class="status-update">
            <?php /* 
            <div class="status-update-heading">
                <?php if ( bp_is_my_profile() ): ?><h4>Update Status</h4><?php endif; ?>
                    if ( bp_is_active( 'groups' ) && ! bp_is_my_profile() && ! bp_is_group() ): ?>
                    <div id="whats-new-post-in-box" class="post-in">
                        <div class="form-group">
                            <label for="whats-new-post-in"><?php _e('Post in...', 'buddypress'); ?></label>
                            <select id="whats-new-post-in" name="whats-new-post-in" class="form-control">
                                <option selected="selected" value="0"><?php _e('My Profile', 'buddypress'); ?></option>
                                <?php if (bp_has_groups('user_id=' . bp_loggedin_user_id() . '&type=alphabetical&max=100&per_page=100&populate_extras=0&update_meta_cache=0')): ?>
                                    <?php while (bp_groups()): ?>
                                        <?php bp_the_group(); ?>
                                        <option value="<?php bp_group_id(); ?>"><?php bp_group_name(); ?></option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="0" />
                    <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
            </div>
            */
            ?>

            <div class="status-update-body">
                <?php if (bp_is_group_home()): ?>
                    <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
                    <input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php bp_group_id(); ?>" />
                <?php endif; ?>
                <?php if ( bp_displayed_user_id() ) : ?>
                    <input type="hidden" id="whats-new-action" name="whats-new-action" value="post_to_wall" />
                    <input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php echo bp_displayed_user_id() ?>" />
                <?php endif; ?>
                <div id="whats-new-user-avatar">
                    <?php bp_loggedin_user_avatar('width=50&height=50' ); ?>
                </div>
                <div id="whats-new-textarea" class="form-group">
                    <textarea 
                            class="form-control bp-suggestions" 
                            name="whats-new" id="whats-new"><?php if (isset($_GET['r'])): ?> @<?php echo esc_textarea($_GET['r']); ?> <?php endif; ?></textarea>
                </div>

                <div id="whats-new-options">
                    <div id="whats-new-submit">
                        <button type="submit" class="btn btn-default" name="aw-whats-new-submit" id="aw-whats-new-submit">
                            <?php esc_attr_e('Post', 'buddypress'); ?>
                        </button>
                    </div>
                </div><!-- #whats-new-options -->

                <?php do_action('bp_activity_post_form_options'); ?>
            </div>
		</div>

	</div><!-- #whats-new-content -->

	<?php wp_nonce_field('post_update', '_wpnonce_post_update'); ?>
	<?php do_action('bp_after_activity_post_form'); ?>

</form><!-- #whats-new-form -->
