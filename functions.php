<?php

/* vim: set expandtab ts=4 sw=4 autoindent smartindent: */

/**
 * myfossil functions and definitions
 *
 * @package myfossil
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 640; /* pixels */

}
if (!function_exists('myfossil_setup')):

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function myfossil_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on myfossil, use a find and replace
         * to change 'myfossil' to the name of your theme in all the template files
        */
        load_theme_textdomain('myfossil', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        */
        //add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location (for now).
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'myfossil') ,
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
        */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('myfossil_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_theme_support( 'post-thumbnails' );

        /*
         * Disable the admin bar
         */
        add_filter('show_admin_bar', '__return_false');
    }
endif; // myfossil_setup

add_action('after_setup_theme', 'myfossil_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function myfossil_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'myfossil') ,
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}
add_action('widgets_init', 'myfossil_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function myfossil_scripts()
{
    /* Styles */
    wp_enqueue_style('myfossil-style', get_template_directory_uri() .
            '/static/css/style.css');
    wp_enqueue_style('font-awesome',
            "//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");
    wp_enqueue_style('jquery-ui-theme', get_template_directory_uri() .
            '/static/css/jquery-ui.theme.min.css');
    wp_enqueue_style('jquery-ui-structure', get_template_directory_uri() .
            '/static/css/jquery-ui.structure.min.css');
    wp_enqueue_style('ionicons',
            '//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css' );
    wp_enqueue_style('mentions', get_template_directory_uri() .
            '/static/css/bp-activity-mentions.min.css');       
            

    /* Scripts */
    /*
    wp_enqueue_script( 'bbpress-reply', get_template_directory_uri() .
            '/static/js/bbpress-reply.min.js' );
    */
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() .
            '/static/js/bootstrap.min.js' );
    wp_enqueue_script( 'myfossil', get_template_directory_uri() .
            '/static/js/myfossil.min.js' );
    wp_enqueue_script( 'comment-reply', get_template_directory_uri() .
            '/static/js/comment-reply.min.js' );
    wp_enqueue_script( 'html5', get_template_directory_uri() .
            '/static/js/html5.min.js' );
    wp_enqueue_script( 'respond', get_template_directory_uri() .
            '/static/js/respond.min.js' );
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri() .
            '/static/js/jquery-ui.min.js' );
    wp_enqueue_script( 'jquery-popup-overlay', get_template_directory_uri() .
            '/static/js/jquery.popupoverlay.min.js' );

	//wp_enqueue_script ( 'buddypress', get_template_directory_uri () . '/static/js/buddypress.min.js' );

    if ( is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
    
    wp_enqueue_script ( 'buddypress', get_template_directory_uri() . '/static/js/jquery.atwho.min.js' );    
    wp_enqueue_script ( 'bpcar', get_template_directory_uri() . '/static/js/jquery.caret.min.js' );
    wp_enqueue_script ( 'bpmen', get_template_directory_uri() . '/static/js/mentions.min.js' );
}
add_action('wp_enqueue_scripts', 'myfossil_scripts');

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom WordPress/BuddyPress filter hooks
 */
require get_template_directory() . '/includes/filters.php';

/**
 * Load plugins compatibility file.
 */
require get_template_directory() . '/includes/plugins.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load bbPress compatibility file.
 */
// require get_template_directory() . '/includes/bbpress.php';


function parse_meta( $meta ) {
    if ( ! $meta ) return array();

    $parsed_meta = array();
    foreach ( $meta as $k => $v )
        if ( !( strpos( $k, '_', 0) === 0 ) )
            $parsed_meta[ $k ] = $v[0];
    return $parsed_meta;
}


// change Notification labels
function mf_gettext_with_context( $translated, $text, $context, $domain ) {

	if ( 'buddypress' !== $domain )  
        return $translated; 
        
	switch ( $text ) {

        case 'Read':
            if( $context == 'Notification screen nav' )
                return 'Viewed';
			elseif( $context == 'Notification screen action' )
				return 'Mark as Viewed';
			else
                return 'Read';		
	
        case 'Unread':
            if( $context == 'Notification screen nav' )
                return 'Not Viewed';
			elseif( $context == 'Notification screen action' )
				return 'Mark as Not Viewed';
			else
				return 'Unread';
			
        default:
            return $translated;
    }

    return $translated;
}
add_filter( 'gettext_with_context', 'mf_gettext_with_context', 20, 4 );

// change Notification feedback messages
function mf_gettext( $translated_text, $text, $domain ) {
	
	if ( 'buddypress' !== $domain )  
        return $translated_text; 
        
	switch ( $text ) {
	
		case 'Notification successfully marked read.':
			return 'Notification successfully marked as Viewed.';
	
		case 'Notification successfully marked unread.':
			return 'Notification successfully marked as Not Viewed.';		
		
        default:
            return $translated_text;	
	
	}
}
add_filter( 'gettext', 'mf_gettext', 21, 3 );

// even more change Notification labels -required because BP is inconsistent re gettext usage
function mf_change_notification_mark_link( $retval ) {
	$retval = str_replace('Read', 'Mark as Viewed', $retval);
	return $retval;
}
add_filter('bp_get_the_notification_mark_link', 'mf_change_notification_mark_link', 22, 1);

function mf_remove_xprofile_links() {
    remove_filter( 'bp_get_the_profile_field_value', 'xprofile_filter_link_profile_data', 9, 2 );
}
add_action('bp_setup_globals', 'mf_remove_xprofile_links'); 


// return an int of the number of Fossils for a specific member
// called in \myfossil-theme\buddypress\members\members-loop.php
function mf_member_fossil_count( $user_id ) {
	global $wpdb; 
	
	$fossil_count = $wpdb->get_var( "SELECT COUNT(ID) FROM $wpdb->posts WHERE post_type = 'myfossil_fossil' AND post_author = $user_id AND post_status = 'publish'" );	
	
	if( $fossil_count == NULL )
		$fossil_count = 0;
	
	return $fossil_count; 
	
}


//enable visual editor in forums
function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );


//limit access to wp-admin to admins only
add_action( 'init', 'blockusers_init' );
function blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( home_url() );
        exit;
    }
}


function mf_joined_group_action( $action, $activity ) {
    
    $action = str_replace ( 'joined the group', 'followed the group', $action );

    return $action;
    
}
add_filter( 'bp_groups_format_activity_action_joined_group', 'mf_joined_group_action', 25, 2 );
