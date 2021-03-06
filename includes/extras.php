<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package myfossil
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function myfossil_page_menu_args($args)
{
    $args['show_home'] = true;
    return $args;
}
add_filter('wp_page_menu_args', 'myfossil_page_menu_args');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function myfossil_body_classes($classes)
{

    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }
    return $classes;
}
add_filter('body_class', 'myfossil_body_classes');

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function myfossil_wp_title($title, $sep)
{
    if (is_feed()) {
        return $title;
    }
    global $page, $paged;

    // Add the blog name
    $title.= get_bloginfo('name', 'display');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title.= " $sep $site_description";
    }

    // Add a page number if necessary:
    if (($paged >= 2 || $page >= 2) && !is_404()) {
        $title.= " $sep " . sprintf(__('Page %s', 'myfossil') , max($paged, $page));
    }
    return $title;
}
add_filter('wp_title', 'myfossil_wp_title', 10, 2);

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function myfossil_setup_author()
{
    global $wp_query;
    if ($wp_query->is_author() && isset($wp_query->post)) {
        $GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);
    }
}
add_action('wp', 'myfossil_setup_author');

/**
 * Returns true if $needle is a substring of $haystack
 */
function contains($needle, $haystack) {
    return strpos($haystack, $needle) !== false;
}

/**
 * Returns contents of <span>'s in a given string as an integer, or zero.
 */
function nav_item_count( $html ) {
    preg_match('/<span.*>(.*?)<\/span>/s', $html, $m);
    if ( count( $m ) > 0 )
        return (int) $m[1];
    return 0;
}

/**
 * Strips count from given HTML in BP template string
 */
function strip_tags_contents( $html ) {
    $regex = '/<[^>]*>[^<]*<[^>]*>/s';
    return preg_replace($regex, '', $html);
}

/**
 * Custom link pagination
 */
function myfossil_paginate_links( $wp_query ) {
    $return_str = '';
    $prev_text = '<span class="sr-only">Previous</span><i class="fa fa-fw fa-caret-left"></i>';
    $next_text = '<i class="fa fa-fw fa-caret-right"></i><span class="sr-only">Next</span>';
    $big = 9999999;
    $pages = paginate_links(
            array(
                'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'       => '?paged=%#%',
                'total'        => $wp_query->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'prev_text'    => $prev_text,
                'next_text'    => $next_text,
                'type'         => 'array',
            )
        );

    if ( is_array( $pages ) ) {
        $paged = get_query_var( 'paged' ) ? 1 : get_query_var( 'paged' );
        $return_str .= sprintf( '<ul class="pagination">' );
        foreach ( $pages as $page ) {
            if ( strpos( $page, 'current' ) === false )
                $return_str .= sprintf( "\n\t<li>%s</li>", $page );
            else
                $return_str .= sprintf( "\n\t<li class=\"active\">%s</li>", $page );
        }
        $return_str .= sprintf( "\n</ul>" );
    }

    return $return_str;
}
