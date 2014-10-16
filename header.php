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
          <ul class="nav navbar-nav navbar-right" id="nav-loggedin">
            <?php if (is_user_logged_in()): ?>
              <!-- user logged in, show messages and info -->
                <li><a href="#" id="notifications"><i class="fa fa-bell-o"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" id="dropdown-menu-user" data-toggle="dropdown">
                    <?php bp_loggedin_user_avatar('width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height()); ?>
                    <!-- <?php echo bp_get_loggedin_user_fullname(); ?> -->
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-user">
                    <li role="presentation"><a role="menuitem" href="#">Action</a></li>
                  </ul>
                </li>
            <?php else: ?>
              <!-- anonymous user, show login -->
              <li>
                  <a href="/admin">Login</a>
              </li>
            <?php endif; ?>
          </ul>

        <!-- nav links themselves -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right" id="nav-main">
            <?php $items = wp_get_nav_menu_items('primary'); ?>
            <?php foreach ($items as $item): ?>
              <li>
                <a href="<?php echo $item->url; ?>"><span><?php echo $item->title; ?></span></a>
              </li>
            <?php endforeach; ?>
          </ul>
          
          

        </div> 
      </div>
    </div>
  </nav>

  <div id="content" class="site-content">
