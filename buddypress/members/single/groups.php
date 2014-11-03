<?php

/**
 * BuddyPress - Users Groups
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul class="nav nav-tabs">
		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); ?>

		<?php if ( ! bp_is_current_action( 'invites' ) ) : ?>

            <?php /*
			<li id="groups-order-select" class="last filter">

                <div class="form-horizontal form-group">
                    <label for="groups-sort-by" class="control-label"><?php _e( 'Order By:', 'buddypress' ); ?></label>
                    <select id="groups-sort-by" class="form-control">
                        <option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
                        <option value="popular"><?php _e( 'Most Members', 'buddypress' ); ?></option>
                        <option value="newest"><?php _e( 'Newly Created', 'buddypress' ); ?></option>
                        <option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>
					<?php do_action( 'bp_member_group_order_options' ); ?>
                    </select>
                </div>
			</li>
            */ ?>

		<?php endif; ?>

	</ul>
</div><!-- .item-list-tabs -->

<?php

switch ( bp_current_action() ) :

	// Home/My Groups
	case 'my-groups' :
		do_action( 'bp_before_member_groups_content' ); ?>

		<div class="groups mygroups">

			<?php bp_get_template_part( 'groups/groups-loop' ); ?>

		</div>

		<?php do_action( 'bp_after_member_groups_content' );
		break;

	// Group Invitations
	case 'invites' :
		bp_get_template_part( 'members/single/groups/invites' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;