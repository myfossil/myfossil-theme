<?php
/**
 * Template Name: Fossil
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package myfossil
 */
get_header(); 

$req = array_key_exists( 'fossil_id', $wp_query->query_vars ) ? 'single' : 'list';

if ( $req == 'single' ):
    $fossil_id = $wp_query->query_vars['fossil_id'];
    $view = $wp_query->query_vars['fossil_view'];
    
    myfossil_fossil_render_single( $fossil_id, $view );
else:
    include_once( 'content-fossils-list.php' );
endif;

get_footer();
