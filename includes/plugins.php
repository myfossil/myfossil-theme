<?php
/**
 * @package myfossil
 */
define('MYFOSSIL_COMBINE_JS', false);

add_filter("myfossil_nav_below", "myfossil_plugins_nav_below_fix");
function myfossil_plugins_nav_below_fix($nav_below){
	if ( class_exists( 'bbPress' ) && is_bbpress() ) 
		return;
	if ( class_exists( 'BuddyPress' ) && is_buddypress() ) 
		return;
		
	return $nav_below;
}

// Redirecting forum profiles to buddypress ones
if ( class_exists( 'bbPress' ) && class_exists( 'BuddyPress' ) ) 
	add_filter('template_redirect','myfossil_buddypress_bbpress_redirect_profile');
	function myfossil_buddypress_bbpress_redirect_profile(){
		global $bp;
		if (bbp_is_single_user_profile()){
			global $wp_query;
			$author_page_link = trailingslashit(bp_core_get_user_domain($wp_query->query_vars["bbp_user_id"]) . 'forums');
			wp_redirect( $author_page_link, 301 );
			exit();
		}
	}



if (MYFOSSIL_COMBINE_JS) {
	add_action( 'myfossil_combine_js_before', "myfossil_js_plugins_init_combine",2);
} else {
	add_action( 'wp_footer', "myfossil_js_plugins_init");
}	
function myfossil_js_plugins_init() {
  ?>
  <script type="text/javascript">	
	  <?php echo myfossil_js_plugins_init_combine(); ?>
  </script>
  <?php
}
function myfossil_js_plugins_init_combine() {?> 
	/* jQuery Easing Plugin, v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/ */
	jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,f,a,h,g){return jQuery.easing[jQuery.easing.def](e,f,a,h,g)},easeInQuad:function(e,f,a,h,g){return h*(f/=g)*f+a},easeOutQuad:function(e,f,a,h,g){return -h*(f/=g)*(f-2)+a},easeInOutQuad:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f+a}return -h/2*((--f)*(f-2)-1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a},easeInQuart:function(e,f,a,h,g){return h*(f/=g)*f*f*f+a},easeOutQuart:function(e,f,a,h,g){return -h*((f=f/g-1)*f*f*f-1)+a},easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a},easeInQuint:function(e,f,a,h,g){return h*(f/=g)*f*f*f*f+a},easeOutQuint:function(e,f,a,h,g){return h*((f=f/g-1)*f*f*f*f+1)+a},easeInOutQuint:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f*f+a}return h/2*((f-=2)*f*f*f*f+2)+a},easeInSine:function(e,f,a,h,g){return -h*Math.cos(f/g*(Math.PI/2))+h+a},easeOutSine:function(e,f,a,h,g){return h*Math.sin(f/g*(Math.PI/2))+a},easeInOutSine:function(e,f,a,h,g){return -h/2*(Math.cos(Math.PI*f/g)-1)+a},easeInExpo:function(e,f,a,h,g){return(f==0)?a:h*Math.pow(2,10*(f/g-1))+a},easeOutExpo:function(e,f,a,h,g){return(f==g)?a+h:h*(-Math.pow(2,-10*f/g)+1)+a},easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeInCirc:function(e,f,a,h,g){return -h*(Math.sqrt(1-(f/=g)*f)-1)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeInOutCirc:function(e,f,a,h,g){if((f/=g/2)<1){return -h/2*(Math.sqrt(1-f*f)-1)+a}return h/2*(Math.sqrt(1-(f-=2)*f)+1)+a},easeInElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return -(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e},easeOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return g*Math.pow(2,-10*h)*Math.sin((h*k-i)*(2*Math.PI)/j)+l+e},easeInOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k/2)==2){return e+l}if(!j){j=k*(0.3*1.5)}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}if(h<1){return -0.5*(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e}return g*Math.pow(2,-10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j)*0.5+l+e},easeInBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*(f/=h)*f*((g+1)*f-g)+a},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a},easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a},easeInBounce:function(e,f,a,h,g){return h-jQuery.easing.easeOutBounce(e,g-f,0,h,g)+a},easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeInOutBounce:function(e,f,a,h,g){if(f<g/2){return jQuery.easing.easeInBounce(e,f*2,0,h,g)*0.5+a}return jQuery.easing.easeOutBounce(e,f*2-g,0,h,g)*0.5+h*0.5+a}});
	<?php if ( !class_exists( 'BuddyPress' ) ) {?>
	/*!
     * jQuery Cookie Plugin v1.4.1
     * https://github.com/carhartl/jquery-cookie
     *
     * Copyright 2006, 2014 Klaus Hartl
     * Released under the MIT license
     */
	(function(c){"function"===typeof define&&define.amd?define(["jquery"],c):"object"===typeof exports?c(require("jquery")):c(jQuery)})(function(c){function p(a){a=e.json?JSON.stringify(a):String(a);return e.raw?a:encodeURIComponent(a)}function n(a,g){var b;if(e.raw)b=a;else a:{var d=a;0===d.indexOf('"')&&(d=d.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{d=decodeURIComponent(d.replace(l," "));b=e.json?JSON.parse(d):d;break a}catch(h){}b=void 0}return c.isFunction(g)?g(b):b}var l=/\+/g,e=
c.cookie=function(a,g,b){if(1<arguments.length&&!c.isFunction(g)){b=c.extend({},e.defaults,b);if("number"===typeof b.expires){var d=b.expires,h=b.expires=new Date;h.setTime(+h+864E5*d)}return document.cookie=[e.raw?a:encodeURIComponent(a),"=",p(g),b.expires?"; expires="+b.expires.toUTCString():"",b.path?"; path="+b.path:"",b.domain?"; domain="+b.domain:"",b.secure?"; secure":""].join("")}for(var d=a?void 0:{},h=document.cookie?document.cookie.split("; "):[],m=0,l=h.length;m<l;m++){var f=h[m].split("="),
k;k=f.shift();k=e.raw?k:decodeURIComponent(k);f=f.join("=");if(a&&a===k){d=n(f,g);break}a||void 0===(f=n(f))||(d[k]=f)}return d};e.defaults={};c.removeCookie=function(a,e){if(void 0===c.cookie(a))return!1;c.cookie(a,"",c.extend({},e,{expires:-1}));return!c.cookie(a)}});
<?php
	}
}

if ( class_exists( 'bbPress' ) || class_exists( 'BuddyPress' ) ) {
	if (MYFOSSIL_COMBINE_JS) {
		add_action( 'myfossil_combine_js', "myfossil_social_footer_scripts_combine");
	} else {
		add_action( 'wp_footer', "myfossil_social_footer_scripts");
	}
	function myfossil_social_footer_scripts(){
	  ?>
	  <script type="text/javascript">	
		(function ($) {
			<?php echo myfossil_social_footer_scripts_combine(); ?>
		})(jQuery);	
	  </script>
	  <?php
	}
	function myfossil_social_footer_scripts_combine() { ?>
	$(document).ready(function() {
		myfossil_social_edits();	

		$(".makeit-pag-small").find("ul.pagination-lg").addClass("pagination-sm").removeClass("pagination-lg");
       
	});
	$(document).on("DOMNodeInserted", throttle(function(){
          myfossil_social_edits();
    },250));
	
	function myfossil_social_edits(){
		//$("img.avatar").parent("a").addClass("thumbnail pull-left");
		/* pull-left fixes */
		//$("#wpadminbar").find("a").removeClass("thumbnail pull-left");
        
		$("#message").addClass("alert alert-info");
        
		$("div[role=search]").addClass("pull-right"); // search boxes
		$("#main [role=navigation]").find("span").addClass("badge");
		
		$("div#item-actions").find("ul").addClass("list-unstyled"); 		
		$(".pagination-links").addClass("pager lead").children("span").wrap('<li class="disabled" />').parent().parent().children("a").wrap("<li>");
	}
<?php	
	}
}


function myfossil_highlight_search_results(){
	/* modified..replaced:
	className="highlight"
	to 
	className="highlight label label-warning"
	
	replaced:
	.find("span.highlight")
	to
	.find("span.highlight.label.label-warning")
	*/
	?>
  <script type="text/javascript">	
	/*
	highlight v4
	
	Highlights arbitrary terms.
	
	<http://johannburkard.de/blog/programming/javascript/highlight-javascript-text-higlighting-jquery-plugin.html>
	
	MIT license.
	
	Johann Burkard
	<http://johannburkard.de>
	<mailto:jb@eaio.com>
	
	*/
	jQuery.fn.highlight=function(c){function e(b,c){var d=0;if(3==b.nodeType){var a=b.data.toUpperCase().indexOf(c);if(0<=a){d=document.createElement("span");d.className="highlight label label-warning";a=b.splitText(a);a.splitText(c.length);var f=a.cloneNode(!0);d.appendChild(f);a.parentNode.replaceChild(d,a);d=1}}else if(1==b.nodeType&&b.childNodes&&!/(script|style)/i.test(b.tagName))for(a=0;a<b.childNodes.length;++a)a+=e(b.childNodes[a],c);return d}return this.length&&c&&c.length?this.each(function(){e(this,c.toUpperCase())}): this};jQuery.fn.removeHighlight=function(){return this.find("span.highlight.label.label-warning").each(function(){this.parentNode.firstChild.nodeName;with(this.parentNode)replaceChild(this.firstChild,this),normalize()}).end()};
	</script>
	<?php
}
add_action( 'bbp_template_after_search_results', "myfossil_bbpress_highlight_search_results");

function myfossil_bbpress_highlight_search_results(){
	myfossil_highlight_search_results();
	// Get search terms
	$search_terms = bbp_get_search_terms();
	echo "<script>jQuery('#bbp-search-results').highlight('" . $search_terms . "');</script>";
	
}

function myfossil_bp_register_wall_action() {
    $component_id = 'activity';
    $type         = 'wall_post';
    $description  = 'Wall post';
    $label        = 'Wall post';
    $format_cb    = null; // 'bp_activity_format_activity_action_activity_update';

    bp_activity_set_action( $component_id, $type, $description, $format_cb,
            $label );
}
add_action( 'bp_register_activity_actions', 'myfossil_bp_register_wall_action' );

function bp_are_friends( $other_id, $user_id ) {
    $friend_status = friends_check_friendship_status( $user_id, $other_id );
    return ( $friend_status == 'is_friend' );
}

function myfossil_bp_wall_ajax_handler() {
    // -- begin buddypress code --
    $bp = buddypress();

    // Bail if not a POST action
    if ('POST' !== strtoupper($_SERVER['REQUEST_METHOD'])) return;

    // Check the nonce
    check_admin_referer('post_update', '_wpnonce_post_update');
    if (!is_user_logged_in()) exit('-1');
    if (empty($_POST['content'])) exit('-1<div id="message" class="error"><p>' . __('Please enter some content to post.', 'buddypress') . '</p></div>');

    // -- end buddypress code --

    $wall_user_id = bp_displayed_user_id();
    $logged_in_user_id = bp_loggedin_user_id();

    // Check if posting user is friend of the wall owner...
    if ( ! bp_are_friends( $wall_user_id, $logged_in_user_id ) ) {
        // User should not be able to post to wall, bail out!
        exit( '-1' );
    }

    // Setup Activity post...
    $action = sprintf( "%s posted on %s's wall", 
            bp_core_get_userlink( $logged_in_user_id ), 
            bp_core_get_userlink( $wall_user_id ) );
    $content = $_POST['content'];
    $component = 'activity';
    $type = 'wall_post';
    $item_id = $logged_in_user_id;
    $secondary_item_id = $wall_user_id;
    $hide_sitewide = true;
    $activity_args = array(
        'type' => $type,
        'action' => $action,
        'content' => $content,
        'component' => $component,
        'user_id' => $wall_user_id,
        'item_id' => $logged_in_user_id 
    );

    $activity_id = bp_activity_add( $activity_args );

    // -- begin buddypress code --
    if ( empty( $activity_id ) ) 
        exit('-1<div id="message" class="error"><p>' . __('There was a problem posting your update; please try again.', 'buddypress') . '</p></div>');

    $last_recorded = !empty($_POST['since']) ? date('Y-m-d H:i:s', intval($_POST['since'])) : 0;
    if ($last_recorded) {
        $activity_args = array(
            'since' => $last_recorded
        );
        $bp->activity->last_recorded = $last_recorded;
        add_filter('bp_get_activity_css_class', 'bp_activity_newest_class', 10, 1);
    }
    else {
        $activity_args = array(
            'include' => $activity_id
        );
    }
    if (bp_has_activities($activity_args)) {
        while (bp_activities()) {
            bp_the_activity();
            bp_get_template_part('activity/entry');
        }
    }
    if (!empty($last_recorded)) {
        remove_filter('bp_get_activity_css_class', 'bp_activity_newest_class', 10, 1);
    }
    exit;

}
add_action( 'wp_ajax_post_to_wall', 'myfossil_bp_wall_ajax_handler' );

function myfossil_member_wall() {
    bp_core_load_template('member/single/wall');
}

function bp_add_member_wall_nav_items()
{
    global $bp;

    bp_core_new_nav_item(
        array(
            'name' => 'Wall',
            'slug' => 'wall',
            'default_subnav_slug' => 'wall',
            'parent_url' => bp_displayed_user_domain(),
            'parent_slug' => $bp->members->slug . bp_displayed_user_id(),
            'position' => 0,
            'show_for_displayed_user' => true,
            'screen_function' => 'myfossil_member_wall'
        )
    );
}
add_action( 'bp_setup_nav', 'bp_add_member_wall_nav_items', 10 );
