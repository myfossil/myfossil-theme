<?php

/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_members_loop' ); ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

	<?php do_action( 'bp_before_directory_members_list' ); ?>

    <div class="table-responsive">
	<table id="members-list" class="table item-list" role="main">
        <tr>
            <th colspan="2">Name</th>
            <th>Fossils</th>
            <th>Location</th>
        </tr>

	<?php while ( bp_members() ) : bp_the_member(); ?>

		<tr>
			<td class="avatar">
				<div class="item-avatar">
					<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a>
				</div>
			</td>
			<td class="title">
				<div class="item-title">
					<a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
                    <div class="item-meta"><span class="activity"><?php bp_member_last_active(); ?></span></div>
				</div>

				<?php do_action( 'bp_directory_members_item' ); ?>

				<?php
				 /***
				  * If you want to show specific profile fields here you can,
				  * but it'll add an extra query for each member in the loop
				  * (only one regardless of the number of fields you show):
				  *
				  * bp_member_profile_data( 'field=the field name' );
				  */
				?>
			</td>

            <?php /*
			<td class="action">
				<?php do_action( 'bp_directory_members_actions' ); ?>
			</td> */ ?>

            <td>Fossils: <?php // function is in myfossil/functions.php
            echo mf_member_fossil_count( bp_get_member_user_id() ); ?></td>

			<?php 
			$location = bp_get_member_profile_data( 'field=Location' );

			if( $location == NULL || $location == false ) 
				$location = 'Unknown'; 
			?>
            <td><?php echo $location; ?></td>

		</tr>

	<?php endwhile; ?>

	</table>
    </div>

	<?php do_action( 'bp_after_directory_members_list' ); ?>

	<?php bp_member_hidden_fields(); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="member-dir-count-bottom">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_members_loop' ); ?>
