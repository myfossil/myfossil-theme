<?php
/**
 * BuddyPress - Activity Post Form
 *
 * @package myfossil
 * @subpackage theme
 */
?>
<div id="user-left" name="user-left" class="sidebar sidebar-left">
	<div id="whats-new-avatar">

        <div id="user-info" class="row section hidden-xs hidden-sm">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <a href="<?php echo bp_loggedin_user_domain(); ?>">
                    <?php bp_loggedin_user_avatar('width=150&height=150' ); ?>
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12" style="text-align: center">
                <h4 style="font-size: 1.4em"><?php echo bp_get_loggedin_user_fullname(); ?></h4>
                <span class="username text-muted">@<?=bp_get_loggedin_user_username(); ?></span>
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
                            <ul class="list-lines" id="nav-user">
                                <?php bp_get_loggedin_user_nav(); ?>
                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </div>
	</div>
</div>
