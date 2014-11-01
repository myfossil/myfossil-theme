<?php

/**
 * BuddyPress - Groups Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_groups_loop' ); ?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<?php do_action( 'bp_before_directory_groups_list' ); ?>

	<table id="groups-list" class="table item-list" role="main">
        <tr>
            <th colspan="2">Name</th>
            <th>Fossils</th>
            <th>Members</th>
            <th>&nbsp;</th>
        </tr>

	<?php while ( bp_groups() ) : bp_the_group(); ?>

		<tr <?php bp_group_class(); ?>>

            <td class="avatar">
                <div class="item-avatar">
                    <a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar( 'type=thumb&width=50&height=50' ); ?></a>
                </div>
            </td>

            <td class="title">
                <div class="item-title">
                    <a href="<?php bp_group_permalink(); ?>">
                        <?php bp_group_name(); ?>
                    </a>
                    <div class="item-meta">
                        <span class="activity">
                            <?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?>
                        </span>
                    </div>
                </div>
            </td>

            <td>
                <?php do_action( 'bp_directory_groups_item' ); ?>
            </td>

            <td>
                <?php bp_group_member_count(); ?>
            </td>

            <td class="action">
                <?php do_action( 'bp_directory_groups_actions' ); ?>
            </td>
            

		</tr>

	<?php endwhile; ?>

	</table>

	<?php do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="group-dir-count-bottom">
			<?php bp_groups_pagination_count(); ?>
		</div>

		<div class="pagination-links" id="group-dir-pag-bottom">
			<?php bp_groups_pagination_links(); ?>
		</div>

	</div>

<?php else: ?>

	<div id="message" class="alert alert-info">
		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
