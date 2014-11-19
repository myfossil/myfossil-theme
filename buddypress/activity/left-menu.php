<?php
/**
 * BuddyPress - Activity Post Form
 *
 * @package     myfossil
 * @subpackage  theme
 */
?>
<div id="user-left" name="user-left" class="sidebar sidebar-left">

    <div id="user-info" class="row section hidden-xs hidden-sm">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <a href="<?php echo bp_loggedin_user_domain(); ?>">
                <?php bp_loggedin_user_avatar('width=150&height=150' ); ?>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-12" style="text-align: center">
            <h4 style="font-size: 1.4em"><?php echo bp_get_loggedin_user_fullname(); ?></h4>
            <span class="username">@<?=bp_get_loggedin_user_username(); ?></span>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <nav class="nav" role="navigation">
                <div class="row">
                    <div class="navbar-header panel hidden-md hidden-lg" style="background-color: #fff; text-align: center">
                        <h4 class="no-margin">
                            <a class="collapsed" data-toggle="collapse" data-target="#navbar-user">
                                What's New
                                <i class="fa fa-caret-down"></i>
                            </a>
                        </h4>
                    </div>

                    <!-- nav links themselves -->
                    <div class="collapse navbar-collapse" id="navbar-user">

                        <ul id="nav-user">
                            <li>
                                <a href="/activity">
                                    What's New
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo bp_loggedin_user_domain(); ?>">
                                    Wall
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo bp_loggedin_user_domain(); ?>messages">
                                    Messages
                                </a>
                                <?php 
                                if ( $nm = bp_get_total_unread_messages_count( bp_loggedin_user_id() ) ):
                                    printf( '<span class="badge">%d</span>', $nm );
                                endif; 
                                ?>
                            </li>
                            <li> 
                                <a href="<?php echo bp_loggedin_user_domain(); ?>notifications">
                                    Notifications
                                </a>
                                <?php 
                                if ( $nn = bp_notifications_get_unread_notification_count( bp_loggedin_user_id() ) ):
                                    printf( '<span class="badge">%d</span>', $nn );
                                endif; 
                                ?>
                            </li>

                            <li class="separator"></li>

                            <li>
                                <a href="<?=bp_loggedin_user_domain(); ?>/fossils">
                                    My Fossils
                                </a>
                            </li>
                            <li>
                                <a href="#" class="disabled">
                                    My Resources
                                </a>
                            </li>
                            
                            <li class="separator"></li>

                            <li>
                                <a href="<?php echo bp_loggedin_user_domain(); ?>/groups">
                                    My Organizations
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo bp_loggedin_user_domain(); ?>/friends">
                                    My Friends
                                </a>
                            </li>

                            <li class="separator"></li>

                            <li>
                                <a href="<?php echo bp_loggedin_user_domain(); ?>/profile">
                                    Edit Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo bp_loggedin_user_domain(); ?>/settings">
                                    Settings
                                </a>
                            </li>

                        </ul>

                    </div> 
                </div>
            </nav>
        </div>
    </div>

</div>
