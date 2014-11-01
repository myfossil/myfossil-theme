<?php do_action( 'bp_before_group_header' ); ?>

<div id="item-actions">

	<?php if ( bp_group_is_visible() ) : ?>

        <?php
        /**
         * Hide Group admins (for now)
         */
        /*
		 * <h3><?php _e( 'Group Admins', 'buddypress' ); ?></h3>
		 * <?php bp_group_list_admins();
         */

		do_action( 'bp_after_group_menu_admins' );

        /**
         * Hide Group moderators (for now)
         */
        /*
		if ( bp_group_has_moderators() ) :
			do_action( 'bp_before_group_menu_mods' ); ?>

			<h3><?php _e( 'Group Mods' , 'buddypress' ); ?></h3>

			<?php bp_group_list_mods();

			do_action( 'bp_after_group_menu_mods' );

		endif;
        */

	endif; ?>

</div><!-- #item-actions -->

<div class="row" id="groups-header">
    <div id="item-header-avatar" class="col-md-2">
        <a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">
            <?php bp_group_avatar(); ?>
        </a>
    </div><!-- #item-header-avatar -->

    <div id="item-header-content" class="col-md-7">
        <?php
        /*
         * <span class="highlight">
         *   <?php bp_group_type(); ?>
         * </span>
         */
        ?>

        <?php do_action( 'bp_before_group_header_meta' ); ?>

		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div id="item-meta">
            <?php // bp_group_description(); ?>

            <div id="item-buttons">
                <?php do_action( 'bp_group_header_actions' ); ?>
            </div><!-- #item-buttons -->

            <?php do_action( 'bp_group_header_meta' ); ?>
        </div>
    </div><!-- #item-header-content -->

    <div class="col-md-3">
        <?php bp_group_join_button(); ?>
        <div class="activity">
            <?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?>
        </div>
    </div>
</div>

<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>
