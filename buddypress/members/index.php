<?php do_action( 'bp_before_directory_members_page' ); ?>

<div id="buddypress-header">

    <div id="item-header" role="complementary" class="container">

        <div class="row" id="groups-header">

            <div id="item-header-content" class="col-md-9">
                <h1>Members</h1>
            </div><!-- #item-header-content -->

            <div class="col-md-3">
                <!-- Button -->
            </div>
        </div>

    </div>
    <div id="item-nav" class="container">
        <div class="item-list-tabs" role="navigation">
			<ul class="nav nav-tabs">
				<li class="selected active" id="members-all">
                    <a href="<?php bp_members_directory_permalink(); ?>">
                        <?php printf( __( 'All Members', 'buddypress' ) ); ?>
                    </a>
                </li>

				<?php if ( is_user_logged_in() && bp_is_active( 'friends' ) && bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>
					<li id="members-personal">
                        <a href="<?php echo bp_loggedin_user_domain() . bp_get_friends_slug() . '/my-friends/'; ?>">
                            <?php printf( __( 'My Friends', 'buddypress' ) ); ?>
                        </a>
                    </li>
				<?php endif; ?>

				<?php do_action( 'bp_members_directory_member_types' ); ?>

			</ul>
		</div><!-- .item-list-tabs -->
    </div>

</div>

<div class="container container-no-padding page-styling no-border-top">

	<?php do_action( 'bp_before_directory_members' ); ?>
	<?php do_action( 'bp_before_directory_members_content' ); ?>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 sidebar sidebar-right page-padding pull-right">
		<div id="members-dir-search" class="dir-search section" role="search">
			<?php bp_directory_members_search_form(); ?>
		</div><!-- #members-dir-search -->

		<?php do_action( 'bp_before_directory_members_tabs' ); ?>

		

	        <!-- Member Listing Filters -->
			<div class="item-list-tabs section" id="subnav" role="navigation">
				<form action="" method="post" id="members-directory-form" class="form-horizontal dir-form">
				<ul>
					<?php do_action( 'bp_members_directory_member_sub_types' ); ?>

					<li id="members-order-select" class="last filter">
						<label for="members-order-by" class="label-control"><?php _e( 'Order By:', 'buddypress' ); ?></label>
						<select id="members-order-by" class="form-control">
							<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
							<option value="newest"><?php _e( 'Newest Registered', 'buddypress' ); ?></option>

							<?php if ( bp_is_active( 'xprofile' ) ) : ?>
								<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>
							<?php endif; ?>

							<?php do_action( 'bp_members_directory_order_options' ); ?>
						</select>
					</li>
				</ul>
				</form><!-- #members-directory-form -->
			</div>


		<?php do_action( 'bp_after_directory_members' ); ?>
	</div>


	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 page-padding next-to-right-sidebar">
		<!-- Member Listing --> 
		<div id="members-dir-list" class="members dir-list">
			<?php bp_get_template_part( 'members/members-loop' ); ?>
		</div><!-- #members-dir-list -->

		<?php do_action( 'bp_directory_members_content' ); ?>

		<?php wp_nonce_field( 'directory_members', '_wpnonce-member-filter' ); ?>

		<?php do_action( 'bp_after_directory_members_content' ); ?>
	</div>

</div><!-- #buddypress -->

<?php do_action( 'bp_after_directory_members_page' ); ?>
