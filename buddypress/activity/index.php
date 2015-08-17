<?php do_action('bp_before_directory_activity'); ?>

<div class="container">

	<?php do_action('bp_before_directory_activity_content'); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
            <?php if (is_user_logged_in()): ?>
                <?php bp_get_template_part('activity/left-menu'); ?>
            <?php endif; ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10" style="border-left: 1px solid #eee;">
            <div id="announcements" class="separate">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 pull-right">
          <ul class="pull-right activity-search-dropdown" style="width:100%">
            <li class="dropdown">
            <a class="btn btn-primary active" role="button" data-toggle="dropdown" href="#"><span class="fa-stack">                        
                                <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                            </span>Search <span class="caret"></span></a>
            <ul id="menu1" class="dropdown-menu" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="/fossils?mfs=1">Fossils</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/members?mfs=1">Members</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="/groups?mfs=1">Groups</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="/forums?mfs=1">Forums</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="/documents?mfs=1">Documents</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 pull-left">
                <h4>Announcements</h4>
      </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10" style="border-left: 1px solid #eee;">
      <ul>
                    <li>
                        <span class="fa-stack">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-info fa-stack-1x fa-inverse"></i>
                        </span>
                        Welcome to the myFOSSIL development site. Breaking changes, data loss and downtime <strong>will</strong> happen!
                    </li>
                </ul>
  </div>
  </div>
</div>
            <div>
                <?php if (is_user_logged_in()): ?>
                    <?php bp_get_template_part('activity/post-form'); ?>
                <?php endif; ?>
            </div>
            <div>
                <?php do_action('template_notices'); ?>
            </div>

            <div>
            <!--
                <div class="item-list-tabs no-ajax pull-right" id="subnav" role="navigation">
                    <ul>
                        <li id="activity-filter-select" class="last">
                            <form class="form-inline">
                                <label for="activity-filter-by"><?php //_e('Showing...', 'buddypress'); ?></label>
                                <select id="activity-filter-by" class="form-control">
                                    <option value="-1"><?php //_e('Everything', 'buddypress'); ?></option>
                                    <?php //bp_activity_show_filters(); ?>
                                    <?php //do_action('bp_activity_filter_options'); ?>
                                </select>
                            </form>
                        </li>
                    </ul>
                </div>--><!-- .item-list-tabs -->
                

                <div class="clearfix"></div>

                <?php do_action('bp_before_directory_activity_list'); ?>

                <div class="activity" role="main">
                    <?php bp_get_template_part('activity/activity-loop'); ?>
                </div><!-- .activity -->

                <?php do_action('bp_after_directory_activity_list'); ?>
                <?php do_action('bp_directory_activity_content'); ?>
                <?php do_action('bp_after_directory_activity_content'); ?>
                <?php do_action('bp_after_directory_activity'); ?>
            </div>
        </div>
    </div>
</div>
