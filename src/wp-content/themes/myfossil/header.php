<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package myfossil
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'myfossil' ); ?></a>
  
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

      <!-- Nav links themselves -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">COMMUNITY</a></li>
          <li><a href="#">FOSSILS</a></li>
          <li><a href="#">COLLABORATE</a></li>
          <li><a href="#">RESOURCES</a></li>
          <li><a href="#">EVENTS</a></li>
        </ul>
        
        <!-- to the right nav -->
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">John Doe <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
            </ul>
          </li>
        </ul>
      </div> 
    </div>
  </nav>



  <header id="masthead" class="site-header" role="banner">
    <div class="site-branding">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    </div>

    <nav id="site-navigation" class="main-navigation" role="navigation">
      <button class="menu-toggle"><?php _e( 'Primary Menu', 'myfossil' ); ?></button>
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav><!-- #site-navigation -->
  </header><!-- #masthead -->

  <div id="content" class="site-content">
