<?php
// We are adding thumbnail support for forums
add_action('init', 'myfossil_social_bbpress_init');
function myfossil_social_bbpress_init() {
	add_post_type_support( 'forum', 'thumbnail' );

}

// We are adding bbpress support for theme special systems
/*add_filter('myfossil_pre_get_posts_ekle', 'myfossil_bbpress_pre_get_posts_ekle');
function myfossil_bbpress_pre_get_posts_ekle($array) {
	$array[] = "forum";
	$array[] = "topic";
	return $array;
}*/

// http://bbpress.org/forums/topic/make-notification-of-new-replies-auto-checked/
add_filter( 'bbp_get_form_topic_subscribed', 'myfossil_auto_check_subscribe', 10, 2 );
function myfossil_auto_check_subscribe( $checked, $topic_subscribed  ) {
    if( $topic_subscribed == 0 )
        $topic_subscribed = true;

    return checked( $topic_subscribed, true, false );
}


// removing default plugin css.. bootstrap is enough :)
add_action( 'bbp_theme_compat_actions', 'myfossil_social_remove_default_style' );
function myfossil_social_remove_default_style( $BBP_Default ) {
    remove_action( 'bbp_enqueue_scripts', array( $BBP_Default, 'enqueue_styles'  ) );
}


// bootstrapped bbPress breadcrumbs 
add_filter( 'bbp_before_get_breadcrumb_parse_args', "myfossil_bbp_get_breadcrumb", 10, 1);
function myfossil_bbp_get_breadcrumb($r){
	
	// HTML
	$r['before'] = '<ul class="bbp-breadcrumb breadcrumb">';
	$r['after' ] = '</ul>';
	
	// Separator
	$r['sep_before'] = '<span class="hide">';
	$r['sep_after'] = '</span>';
	
	// Crumbs
	$r['crumb_before'] = '<li>';
	$r['crumb_after'] = '</li>';

	// Current
	$r['current_before'] = '<span class="bbp-breadcrumb-current text-muted">';
	$r['current_after'] = '</span>';

	return $r;
}



add_filter ( 'bbp_get_topic_class', 'myfossil_social_bbp_get_topic_class', 10, 2);
function myfossil_social_bbp_get_topic_class ($classes, $topic_id) {
	$bbp       = bbpress();
	$count     = isset( $bbp->topic_query->current_post ) ? $bbp->topic_query->current_post : 1;
	if(bbp_is_topic_sticky( $topic_id, false )) {
		$classes[] = 'alert alert-warning panel-body';		
	} else if(bbp_is_topic_super_sticky( $topic_id  )) {
		$classes[] = 'alert alert-danger panel-body';		
	} else {
		$classes[] = ( (int) $count % 2 ) ? 'panel-footer' : 'panel-body';
	}
	$classes[] = "clearfix";
	return $classes;
}


add_filter( 'bbp_get_forum_class', "myfossil_social_bbp_get_forum_class" );
function myfossil_social_bbp_get_forum_class ($classes) {
	$classes[] = " well well-sm";
	return $classes;
}


add_filter( 'bbp_replies_pagination', "myfossil_social_bbp_replies_pagination");
add_filter( 'bbp_topic_pagination', "myfossil_social_bbp_replies_pagination");
function myfossil_social_bbp_replies_pagination($array){
	$array['type'] = 'list';
	
	return $array;
}


function myfossil_social_bbp_get_reply_class_modal($reply_id = 0) {
/*	$bbp       = bbpress();
	$reply_id  = bbp_get_reply_id( $reply_id );
	$count     = isset( $bbp->reply_query->current_post ) ? $bbp->reply_query->current_post : 1;*/
	global $myfossil_bbpress_count;
	$myfossil_bbpress_count++;
	$class = 	( (int) $myfossil_bbpress_count % 2 ) ? 'panel-footer' : 'panel-body';
	
	return $class;
}


// we re-created function for adding bootstrap tooltip. re-creating function was better solution then others
function myfossil_social_bbp_get_topic_freshness_link( $topic_id = 0 ) {
	$topic_id   = bbp_get_topic_id( $topic_id );
	$link_url   = bbp_get_topic_last_reply_url( $topic_id );
	$title      = bbp_get_topic_last_reply_title( $topic_id );
	$time_since = bbp_get_topic_last_active_time( $topic_id );

	if ( !empty( $time_since ) )
		$anchor = '<a href="' . $link_url . '" data-toggle="popover" data-rel="popover" data-placement="left" data-trigger="hover" data-html="true" data-original-title="'. __( 'Freshness', 'myfossil' ) . '" data-content="' . esc_attr( $time_since ) . '"><i class="icon-time"></i></a>';
	else
		$anchor = __( 'No Replies', 'myfossil' );

	return apply_filters( 'bbp_get_topic_freshness_link', $anchor, $topic_id );
}


// we re-created function for adding bootstrap tooltip. re-creating function was better solution then others
function myfossil_social_bbp_get_forum_freshness_link( $forum_id = 0 ) {
	$forum_id  = bbp_get_forum_id( $forum_id );
	$active_id = bbp_get_forum_last_active_id( $forum_id );

	if ( empty( $active_id ) )
		$active_id = bbp_get_forum_last_reply_id( $forum_id );

	if ( empty( $active_id ) )
		$active_id = bbp_get_forum_last_topic_id( $forum_id );

	if ( bbp_is_topic( $active_id ) ) {
		$link_url = bbp_get_forum_last_topic_permalink( $forum_id );
		$title    = bbp_get_forum_last_topic_title( $forum_id );
	} elseif ( bbp_is_reply( $active_id ) ) {
		$link_url = bbp_get_forum_last_reply_url( $forum_id );
		$title    = bbp_get_forum_last_reply_title( $forum_id );
	}

	$time_since = bbp_get_forum_last_active_time( $forum_id );

	if ( !empty( $time_since ) && !empty( $link_url ) )
		$anchor = '<a href="' . $link_url . '" data-toggle="popover" data-rel="popover" data-placement="left" data-trigger="hover" data-html="true" data-original-title="'. __( 'Freshness', 'myfossil' ) .'" data-content="' . esc_attr( $time_since ) . '"><i class="icon-time"></i></a>&nbsp;'. __( 'Freshness', 'myfossil' ) . ':';
	else
		$anchor = __( 'No Topics', 'myfossil' );

	return apply_filters( 'bbp_get_forum_freshness_link', $anchor, $forum_id );
}


// Sadly we needed to re-create bbp_get_topic_pagination just because to add 'type' => 'list' to $pagination args -.-'
function myfossil_social_bbp_get_topic_pagination( $args = '' ) {
	global $wp_rewrite;

	$defaults = array(
		'topic_id' => bbp_get_topic_id(),
		'before'   => '<div class="makeit-pag-small">',
		'after'    => '</div>',
	);
	$r = bbp_parse_args( $args, $defaults, 'get_topic_pagination' );
	extract( $r );

	// If pretty permalinks are enabled, make our pagination pretty
	if ( $wp_rewrite->using_permalinks() )
		$base = trailingslashit( get_permalink( $topic_id ) ) . user_trailingslashit( $wp_rewrite->pagination_base . '/%#%/' );
	else
		$base = add_query_arg( 'paged', '%#%', get_permalink( $topic_id ) );

	// Get total and add 1 if topic is included in the reply loop
	$total = bbp_get_topic_reply_count( $topic_id, true );

	// Bump if topic is in loop
	if ( !bbp_show_lead_topic() )
		$total++;

	// Pagination settings
	$pagination = array(
		'type'      => 'list', // yes.. this little bastard is reason to re-create that function
		'base'      => $base,
		'format'    => '',
		'total'     => ceil( (int) $total / (int) bbp_get_replies_per_page() ),
		'current'   => 0,
		'prev_next' => false,
		'mid_size'  => 2,
		'end_size'  => 3,
		'add_args'  => ( bbp_get_view_all() ) ? array( 'view' => 'all' ) : false
	);

	// Add pagination to query object
	$pagination_links = paginate_links( $pagination );
	if ( !empty( $pagination_links ) ) {

		// Remove first page from pagination
		if ( $wp_rewrite->using_permalinks() ) {
			$pagination_links = str_replace( $wp_rewrite->pagination_base . '/1/', '', $pagination_links );
		} else {
			$pagination_links = str_replace( '&#038;paged=1', '', $pagination_links );
		}

		// Add before and after to pagination links
		$pagination_links = $before . $pagination_links . $after;
	}

	return apply_filters( 'bbp_get_topic_pagination', $pagination_links, $args );
}


add_action('wp_enqueue_scripts', "myfossil_bbpress_enqueue_script" );
function myfossil_bbpress_enqueue_script() {
	// Deregister WordPress comment-reply script
    wp_deregister_script('bbpress-reply');

    // Register our own comment-reply script for wysiwyg support
    wp_register_script('bbpress-reply', get_template_directory_uri() .'/static/js/bbpress-reply.min.js');
}


/**
 * List replies
 *
 * @since bbPress (r4944)
 */
function myfossil_bbp_list_replies( $args = array() ) {

	// Reset the reply depth
	bbpress()->reply_query->reply_depth = 0;

	// In reply loop
	bbpress()->reply_query->in_the_loop = true;

	$r = bbp_parse_args( $args, array(
		'walker'       => null,
		'max_depth'    => bbp_thread_replies_depth(),
		'style'        => 'ul',
		'callback'     => null,
		'end_callback' => null,
		'page'         => 1,
		'per_page'     => -1
	), 'list_replies' );

	// Get replies to loop through in $_replies
	$walker = new myfossil_BBP_Walker_Reply;
	$walker->paged_walk( bbpress()->reply_query->posts, $r['max_depth'], $r['page'], $r['per_page'], $r );

	bbpress()->max_num_pages            = $walker->max_pages;
	bbpress()->reply_query->in_the_loop = false;
}


/**
 * Create hierarchical list of bbPress replies.
 *
 * @package bbPress
 * @subpackage Classes
 *
 * @since bbPress (r4944)
 */
if ( class_exists( 'BBP_Walker_Reply' ) ) {
	class myfossil_BBP_Walker_Reply extends BBP_Walker_Reply {

		/**
		 * @see Walker:start_el()
		 *
		 * @since bbPress (r4944)
		 */
		public function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {

			// Set up reply
			$depth++;
			bbpress()->reply_query->reply_depth = $depth;
			bbpress()->reply_query->post        = $object;
			bbpress()->current_reply_id         = $object->ID;

			// Check for a callback and use it if specified
			if ( !empty( $args['callback'] ) ) {
				call_user_func( $args['callback'], $object, $args, $depth );
				return;
			}

			// Style for div or list element
			if ( 'div' === $args['style'] ) {
				$tag = 'div';
			} else if ($depth>1)  {
				$tag = 'li class="list-unstyled panel panel-default"';
			} else {
				$tag = 'li class="list-unstyled"';
			}?>

			<<?php echo $tag ?>>
				<?php if ($depth>1) { ?>
				<?php bbp_get_template_part( 'loop', 'single-reply-threaded' ); ?>
				<?php } else { ?>
				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>
				<?php } ?>

			</<?php echo $tag ?>>

			<?php
		}

	}
}
