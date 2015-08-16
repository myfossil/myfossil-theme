<?php
use myFOSSIL\Plugin\Specimen\Fossil;

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$fossil_search_query = array_key_exists("fossil_search", $_REQUEST)
    && $_REQUEST["fossil_search"] ? $_REQUEST["fossil_search"] : null;

$wp_query_args = array(
        'post_type' => Fossil::POST_TYPE,
        'posts_per_page' => $fossil_search_query ? -1 : 10,
        'paged' => $paged,
    );

if ( bp_displayed_user_id() ) {
    $wp_query_args['author'] = bp_displayed_user_id();
    if ( bp_displayed_user_id() == bp_loggedin_user_id() )
        $wp_query_args['post_status'] = 'any';
}

$fossils = new WP_Query( $wp_query_args );

?>

<?php if ( ! bp_displayed_user_id() ): ?>
<div id="buddypress-header">

    <div id="item-header" role="complementary" class="container">

        <div class="row" id="groups-header">

            <div id="item-header-content" class="col-md-9">
                <h1>Fossils</h1>

                <?php do_action( 'template_notices' ); ?>

            </div><!-- #item-header-content -->

            <div class="col-sm-12 col-md-3">
                <?php myfossil_fossil_create_button() ?>
            </div>
        </div>

    </div>

    <div id="item-nav" class="container">
        <div class="item-list-tabs" role="navigation">
            <ul class="nav nav-tabs">
                <li class="selected current active">
                    <a>
                        <?php printf( __( 'All Fossils', 'buddypress' ) ); ?>
                    </a>
                </li>
            </ul>
        </div><!-- .item-list-tabs -->
    </div>
</div>
<?php endif; ?>

<?php if ( ! bp_displayed_user_id() ): ?>
<div id="buddypress" class="container page-styling no-border-top">
<?php endif; ?>

        <div class="row" style="margin-bottom: 10px">
            <div class="col-sm-12 col-md-6 col-md-offset-6 text-right">
                <form action="" method="get" class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="fossils_search">Search Fossils</label>
                        <input
                            type="text"
                            name="fossil_search"
                            id="fossils_search"
                            class="form-control input-sm"
                            value="<?=$fossil_search_query ?>"
                            placeholder="By name, species, etc."
                        />
                    </div>
                    <button class="btn btn-default btn-sm" type="submit">
                        Search Fossils
                    </button>
                </form>
            </div>
        </div>

    <main id="main" class="site-main" role="main">
        <?php myfossil_list_fossils_table( $fossils, $fossil_search_query ); ?>

        <div class="row-centered">
            <?=myfossil_paginate_links( $fossils ) ?>
        </div>
    </main><!-- #main -->

<?php if ( ! bp_displayed_user_id() ): ?>
</div><!-- #primary -->
<?php endif; ?>

<?php
wp_reset_query();
