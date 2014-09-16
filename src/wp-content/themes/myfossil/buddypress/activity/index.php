<?php
/* vim: set expandtab ts=2 sw=2 autoindent smartindent: */
/**
 * BuddyPress, Activity Homepage
 *
 * @see http://codex.buddypress.org/themes/theme-compatibility-1-7/template-hierarchy/
 */
?>

  <div class="user-container">
    <?=bp_loggedin_user_avatar(); ?>
    <h5><?=bp_get_loggedin_user_fullname(); ?></h5>

    <ul>
      <li class="active"><a href="#">What's New</a></li>
      <li><a href="#">Wall</a></li>
      <li><a href="#">Messages</a></li>
      <li><a href="#">Notifications</a></li>
    </ul>

    <ul>
      <li><a href="#">My Fossils</a></li>
      <li><a href="#">My Activities</a></li>
      <li><a href="#">My Resources</a></li>
      <li><a href="#">My Events</a></li>
      <li><a href="#">My Organizations</a></li>
    </ul>

    <ul>
      <li><a href="#">Following</a></li>
      <li><a href="#">Followers</a></li>
      <li><a href="#">Edit Profile</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </div>
 

  <div class="updates-container">
    <h1>What's New</h1>
    
    <h3>ANNOUNCEMENTS</h3>
    <h3>STATUS UPDATE</h3>
  </div>
  

  <div class="externals-container">
    <h4>FOLLOWING</h4>
    <h4>ORGANIZATIONS</h4>
    <h4>RESOURCES</h4>
  </div>
