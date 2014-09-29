<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_member_header' ); ?>

<div class="row" id="members-header">
    <div id="item-header-avatar" class="col-md-2">
        <a href="<?php bp_displayed_user_link(); ?>">
            <?php bp_displayed_user_avatar( 'type=full' ); ?>
        </a>
    </div><!-- #item-header-avatar -->

    <div id="item-header-content" class="col-md-6">

        <?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
            <h2 class="user-fullname">
                <?php bp_displayed_user_fullname(); ?>
                <small>@<?php bp_displayed_user_mentionname(); ?></small>
            </h2>
        <?php endif; ?>

        <?php do_action( 'bp_before_member_header_meta' ); ?>

        <div id="item-meta">

            <?php if ( bp_is_active( 'activity' ) ) : ?>
                <div id="latest-update">
                    <?php bp_activity_latest_update( bp_displayed_user_id() ); ?>
                </div>
            <?php endif; ?>

            <div id="item-buttons">
                <?php do_action( 'bp_member_header_actions' ); ?>
            </div><!-- #item-buttons -->

            <?php
            /**
             * If you'd like to show specific profile fields here use:
             * bp_member_profile_data( 'field=About Me' ); -- Pass the name of the field
             */
             do_action( 'bp_profile_header_meta' );
             ?>

        </div><!-- #item-meta -->

    </div><!-- #item-header-content -->

    <div id="item-header-actions" class="col-md-4">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <button class="btn btn-block btn-default">
                    <i class="fa fa-fw fa-user"></i>
                    Follow
                </button>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <button class="btn btn-block btn-default">
                    <i class="fa fa-fw fa-comments-o"></i>
                    Direct Messsage
                </button>
            </div>
        </div>
        <div class="row activity time-since">
            <div class="col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
                <?php bp_last_activity( bp_displayed_user_id() ); ?>
            </div>
        </div>
    </div>

    <?php do_action( 'bp_after_member_header' ); ?>

    <?php do_action( 'template_notices' ); ?>
