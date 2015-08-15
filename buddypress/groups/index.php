<?php do_action( 'bp_before_directory_groups_page' ); ?>
<div id="buddypress-header">

    <div id="item-header" role="complementary" class="container">

        <div class="row" id="groups-header">

            <div id="item-header-content" class="col-sm-12 col-md-9">
                <h1>Groups</h1>

                <?php do_action( 'template_notices' ); ?>

                <?php do_action( 'bp_before_directory_groups' ); ?>
                <?php do_action( 'bp_before_directory_groups_content' ); ?>
            </div><!-- #item-header-content -->

            <div class="col-sm-12 col-md-3">
                <?php echo bp_get_group_create_button(); ?>
            </div>
        </div>

    </div>

    <div id="item-nav" class="container">
        <form action="" method="post" id="groups-directory-form" class="dir-form form">
            <div class="item-list-tabs" role="navigation">
                <ul class="nav nav-tabs">
                    <li class="selected active" id="groups-all">
                        <a href="<?php bp_groups_directory_permalink(); ?>">
                            <?php printf( __( 'All Groups <span class="badge">%s</span>', 'buddypress' ), bp_get_total_group_count() ); ?>
                        </a>
                    </li>

                    <?php if ( is_user_logged_in() && bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>
                        <li id="groups-personal">
                            <a href="<?php echo bp_loggedin_user_domain() . bp_get_groups_slug() . '/my-groups/'; ?>">
                                <?php
                                    printf(
                                        __( 'My Groups <span class="badge">%s</span>', 'buddypress' ),
                                        bp_get_total_group_count_for_user( bp_loggedin_user_id() )
                                    );
                                ?>
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php do_action( 'bp_groups_directory_group_filter' ); ?>


                </ul>
            </div><!-- .item-list-tabs -->
        </form>
    </div>

</div>

<div id="buddypress" class="container container-no-padding page-styling no-border-top">

        <div class="col-md-4 sidebar sidebar-right page-padding pull-right">
            <div id="group-dir-search" class="dir-search section" role="search">
                <?php bp_directory_groups_search_form(); ?>
            </div><!-- #group-dir-search -->

            <div class="item-list-tabs section" id="subnav" role="navigation">
                <ul>
                    <?php do_action( 'bp_groups_directory_group_types' ); ?>

                    <li id="groups-order-select" class="last filter">

                        <form class="form-horizontal">
                            <label for="groups-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
                            <select id="groups-order-by" class="form-control">
                                <option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
                                <option value="popular"><?php _e( 'Most Members', 'buddypress' ); ?></option>
                                <option value="newest"><?php _e( 'Newly Created', 'buddypress' ); ?></option>
                                <option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>

                                <?php do_action( 'bp_groups_directory_order_options' ); ?>
                            </select>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-8 page-padding next-to-right-sidebar">
                <div id="groups-dir-list" class="groups dir-list">
                    <?php bp_get_template_part( 'groups/groups-loop' ); ?>
                </div><!-- #groups-dir-list -->

                <?php do_action( 'bp_directory_groups_content' ); ?>
                <?php wp_nonce_field( 'directory_groups', '_wpnonce-groups-filter' ); ?>
                <?php do_action( 'bp_after_directory_groups_content' ); ?>
        </div>

	<?php do_action( 'bp_after_directory_groups' ); ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_after_directory_groups_page' ); ?>
