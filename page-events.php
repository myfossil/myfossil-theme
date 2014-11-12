<?php
/**
 * Template Name: Events
 *
 * The template for displaying all Places.
 *
 * @package myFOSSIL
 */
get_header(); 

myfossil_events_template();
?>

<div id="primary" class="container content-area">
    <main id="main" class="site-main" role="main">
        <h1>Events</h1>
        <div class="row">
            <?php myfossil_resources_map(); ?>
        </div>
	
        <div class="row">
	    <div class="col-sm-12 col-md-4 col-lg-3">
            <h3>Filters</h3>
            <?php myfossil_events_filter_form(); ?>
        </div>
          
        <div class="col-sm-12 col-md-8 col-lg-9">
            <?php myfossil_events_list(); ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
