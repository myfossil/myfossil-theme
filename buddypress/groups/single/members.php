<?php if ( bp_group_has_members( bp_ajax_querystring( 'group_members' ) ) ) : ?>

	<?php do_action( 'bp_before_group_members_content' ); ?>

	<?php do_action( 'bp_before_group_members_list' ); ?>

    <h3>Members</h3>

    <table class="table">
        <tr>
            <th colspan="2">Name</th>
            <th>Member Since</th>
        </tr>

		<?php while ( bp_group_members() ) : bp_group_the_member(); ?>

        <tr>
            <td class="avatar">
				<a href="<?php bp_group_member_domain(); ?>">
					<?php bp_group_member_avatar_thumb(); ?>
				</a>
			</td>
			<td class="title">
				<div class="item-title">
	                <?php bp_group_member_link(); ?>
	            </div>
            </td>
            <td>
                <?php bp_group_member_joined_since(); ?>
            </td>
        </tr>

		<?php endwhile; ?>

	</table>

	<?php do_action( 'bp_after_group_members_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="member-count-bottom">
			<?php bp_members_pagination_count(); ?>
		</div>

		<div class="pagination-links" id="member-pag-bottom">
			<?php bp_members_pagination_links(); ?>
		</div>

	</div>

	<?php do_action( 'bp_after_group_members_content' ); ?>

<?php else: ?>

	<div id="message" class="alert alert-info">
		<p><?php _e( 'This group has no members.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>
