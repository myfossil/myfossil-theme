<?php

/**
 * BuddyPress - Activity Post Form
 *
 * @package myfossil
 * @subpackage theme
 */
?>
<form action="<?php bp_activity_post_form_action(); ?>" method="post" id="whats-new-form" name="whats-new-form" role="complementary">

	<?php do_action('bp_before_activity_post_form'); ?>

	<p>
        <?php 
        if (bp_is_group()) {
            //printf(__("What's new in %s, %s?", 'buddypress') , bp_get_group_name() , bp_get_user_firstname(bp_get_loggedin_user_fullname()));
        } else {
            //printf(__("What's new, %s?", 'buddypress') , bp_get_user_firstname(bp_get_loggedin_user_fullname()));
        }
        ?>
    </p>

	<div id="whats-new-content">
		<div id="whats-new-textarea" class="form-group">
			<textarea class="form-control bp-suggestions" name="whats-new" id="whats-new" rows="5"><?php if (isset($_GET['r'])): ?>@<?php echo esc_textarea($_GET['r']); ?><?php endif; ?></textarea>
		</div>

		<div id="whats-new-options row">
			<div id="whats-new-submit" class="col-md-6"> 
				<button type="submit" class="btn btn-default" name="aw-whats-new-submit" id="aw-whats-new-submit_"><?php esc_attr_e('Post Update', 'buddypress'); ?></button>
			</div>

			<?php if (bp_is_active('groups') && !bp_is_my_profile() && !bp_is_group()): ?>
				<div id="whats-new-post-in-box" class="col-md-6">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="whats-new-post-in" class="control-label"><?php _e('Post in', 'buddypress'); ?>...</label>
                        </div>
                        <div class="col-md-9">
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
				</div>
				<input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
			<?php elseif (bp_is_group_home()): ?>
				<input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
				<input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php bp_group_id(); ?>" />
			<?php endif; ?>

			<?php do_action('bp_activity_post_form_options'); ?>

		</div><!-- #whats-new-options -->
	</div><!-- #whats-new-content -->

	<?php wp_nonce_field('post_update', '_wpnonce_post_update'); ?>
	<?php do_action('bp_after_activity_post_form'); ?>

</form><!-- #whats-new-form -->
