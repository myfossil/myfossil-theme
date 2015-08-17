<?php
/**
 * The header for the myFOSSIL theme.
 *
 * Displays all of the <head> section and everything up to <div id="content">
 *
 * @package myfossil
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
  <a class="skip-link screen-reader-text sr-only" href="#content">
    <?php _e('Skip to content', 'myfossil'); ?>
  </a>

  <nav class="nav navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="row">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="/">myFOSSIL</a>
        </div>

        <!-- right nav -->
        <?php if (is_user_logged_in()): ?>
          <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs" id="nav-loggedin">
              <!-- user logged in, show messages and info -->
                <?php
                if ( $nn = bp_notifications_get_unread_notification_count( bp_loggedin_user_id() ) ): ?>
                    <li>
                        <a href="<?=bp_core_get_user_domain( bp_loggedin_user_id() ); ?>/notifications"
                                id="notifications">
                            <i class="fa fa-bell-o"></i>
                            <div class="unread">
                                <span class="badge"><?=$nn ?></span>
                            </div>
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?=bp_core_get_user_domain( bp_loggedin_user_id() ); ?>/notifications"
                                id="notifications">
                            <div>
                                <i class="fa fa-bell-o"></i>
                            </div>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" id="dropdown-menu-user" data-toggle="dropdown">
                    <?php bp_loggedin_user_avatar('width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height()); ?>
                    <!-- <?php echo bp_get_loggedin_user_fullname(); ?> -->
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-user">
                    <?php bp_get_loggedin_user_nav(); ?>
                  </ul>
                </li>
          </ul>
        <?php endif; ?>

        <!-- nav links themselves -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right" id="nav-main">
            <?php
                $menu_items = array();
                foreach ( wp_get_nav_menu_items( 'primary' ) as $item ) {
                    if ( $item->menu_item_parent ) {
                        if ( ! property_exists( $menu_items[$item->menu_item_parent], 'sub' ) ) {
                            $menu_items[$item->menu_item_parent]->sub = array();
                        }
                        $menu_items[$item->menu_item_parent]->sub[] = $item;
                    } else {
                        $menu_items[$item->ID] = $item;
                    }
                }
            ?>
            <?php foreach ( $menu_items as $item ) : ?>
              <li>
                <?php
                $page_array = get_option( 'bp-pages' );
                if ( $post->post_title == "Site-Wide Activity" ) {
                    $post->post_title = 'Activity';
                    $post->title = 'Activity';
                }

                if ( array_key_exists( strtolower( $item->title ), $page_array ) ) {
                    $item->object_id = $page_array[strtolower( $item->title )];
                }

                $class = ( $item->object_id == $post->ID || strtolower( $item->title ) == strtolower( $post->post_title ) ) ? ' class="selected"' : null;

                ?>
                <?php if ( $item->sub ) : ?>
                        <a href="#" id="dropdown<?=$item->ID ?>" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <?=$item->title ?>
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown<?=$item->ID ?>">
                            <?php foreach ( $item->sub as $sub_item ) : ?>
                                <li>
                                    <a href="<?php echo $sub_item->url; ?>"<?=$class ?>><span><?php echo $sub_item->title; ?></span></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                <?php else: ?>
                    <a href="<?php echo $item->url; ?>"<?=$class ?>><span><?php echo $item->title; ?></span></a>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
 
<?php if ( ! is_user_logged_in() ): ?>
                <!-- anonymous user, show login -->
							<li><a href="<?=wp_login_url( get_permalink() ); ?>"><span>Login</span></a>
							</li>
			<?php else: ?>
              <!-- logged user, show logout (mobile devices) -->
							<li><a class="logout-mobile" href="<?=wp_logout_url( bp_get_root_domain() ); ?>"><span>Log out</span></a>
							</li>
            <?php endif; ?>



          </ul>



        </div>
      </div>
    </div>
  </nav>

  <div id="content" class="site-content">
