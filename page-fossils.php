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

if ( $page ):
    include_once( 'content-fossils-single.php' );
else:
    include_once( 'content-fossils-list.php' );
endif;

get_footer();
