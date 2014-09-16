<?php
/* vim: set expandtab ts=2 sw=2: */
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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'myfossil'); ?></a>
  
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">myFossil</a>
      </div>

      <!-- nav links themselves -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <?php $items = wp_get_nav_menu_items('primary'); ?>
          <?php foreach ($items as $item): ?>
            <li>
              <a href="<?=$item->url; ?>"><?=$item->title; ?></a>
            </li>
          <?php
endforeach; ?>
        </ul>
        
        <!-- right nav -->
        <ul class="nav navbar-nav navbar-right">
          <?php if (is_user_logged_in()): ?>
            <!-- user logged in, show messages and info -->
              <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdown-menu-user" data-toggle="dropdown">
                  <?=bp_get_loggedin_user_fullname(); ?>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-user">
                  <li role="presentation"><a role="menuitem" href="#">Action</a></li>
                </ul>
              </li>
          <?php
else: ?>
            <!-- anonymous user, show login -->
            <li>
                <a href="#">Login</a>
            </li>
          <?php
endif; ?>
        </ul>
      </div> 
    </div>
  </nav>

  <div id="content" class="site-content">
