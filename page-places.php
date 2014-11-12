<?php
/**
 * Template Name: Places
 *
 * The template for displaying all Places.
 *
 * @package myFOSSIL
 */
get_header();

// Add modal
myfossil_places_modal();

// Add handlebars.js template
myfossil_places_template();

?>
<div id="primary" class="container content-area">
    <main id="main" class="site-main" role="main">
        <h1>Places</h1>
        <div class="row">
            <?php myfossil_resources_map(); ?>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">
                <h3>Filters</h3>
                <?php myfossil_places_filter_form(); ?>
            </div>
            <?php wp_nonce_field( 'myfr_filter', 'myfr_filter_nonce' ); ?>
            <div class="col-sm-12 col-md-8 col-lg-9 text-right">
                <?php myfossil_places_create_button(); ?>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9"> 
                <?php myfossil_places_list(); ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
