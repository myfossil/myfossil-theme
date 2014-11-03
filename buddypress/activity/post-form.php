<?php

/**
 * BuddyPress - Activity Post Form
 *
 * @package myfossil
 * @subpackage theme
 */
?>
<form action="<?php bp_activity_post_form_action(); ?>" method="post" id="whats-new-form" name="whats-new-form" role="complementary" class="clearfix">

	<?php do_action('bp_before_activity_post_form'); ?>

	<div id="whats-new-content">

		<div class="panel panel-default">
            <div class="panel-heading">

                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <h5>Status Update</h5>
                    </div>

                    <?php if ( bp_is_active( 'groups' ) && ! bp_is_my_profile() && ! bp_is_group() ): ?>
                        <div id="whats-new-post-in-box" class="col-sm-12 col-lg-offset-2 col-lg-4 form-inline">
                            <div class="form-group">
                                <label for="whats-new-post-in" class="control-label">
                                    <?php _e('Post in...', 'buddypress'); ?>
                                </label>
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
                        <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
                    <?php elseif (bp_is_group_home()): ?>
                        <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
                        <input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php bp_group_id(); ?>" />
                    <?php endif; ?>
                </div>
            </div>

            <div class="panel-body">
                <div id="whats-new-textarea" class="form-group col-md-10">
                    <textarea 
                            class="form-control bp-suggestions" 
                            name="whats-new" id="whats-new" rows="3"><?php if (isset($_GET['r'])): ?> @<?php echo esc_textarea($_GET['r']); ?> <?php endif; ?></textarea>
                </div>

                <div id="whats-new-options" class="col-md-2">
                    <div id="whats-new-submit">
                        <button type="submit" class="btn btn-default" name="aw-whats-new-submit" id="aw-whats-new-submit">
                            <?php esc_attr_e('Post Update', 'buddypress'); ?>
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
