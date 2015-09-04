	</div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">

        <div class="container">
            <div class="row" id="nav">
              
                    <div class="row top">
                        <img id="fossil-logo" src="<?=get_template_directory_uri() ?>/static/img/myfossil-logo-white-small.png"
                            alt="myFOSSIL Logo" />

                             <div class="hidden-xs hidden-sm hidden-md col-md-6 col-lg-4" id="footer-logos">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <a href="http://ufl.edu" rel="nofollow">
                                <img src="<?=get_template_directory_uri() ?>/static/img/logos/uf.png" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <a href="https://www.flmnh.ufl.edu/" rel="nofollow">
                                <img src="<?=get_template_directory_uri() ?>/static/img/logos/flmnh.png" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <a href="http://www.nsf.gov/" rel="nofollow">
                                <img src="<?=get_template_directory_uri() ?>/static/img/logos/nsf.png" />
                            </a>
                        </div>
                    </div>
                </div>


                    </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-left" id="nav-main">
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
                //var_dump( $menu_items );
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
                        <a id="dropdown<?=$item->ID ?>" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <?=$item->title ?>
                        </a>
                        <ul class="footer-submenu" role="menu" aria-labelledby="dropdown<?=$item->ID ?>">
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
 

          </ul>

                    </div>
              

               
            </div><!-- .row -->

            <div class="row">
                <div id="footer-disclaimer" class="col-xs-12 col-lg-12">
                    <p>
                    Development of myFOSSIL is based upon work largely
                    supported by the National Science Foundation under Grant
                    No. DRL-1322725. Any opinions, findings, and conclusions or
                    recommendations expressed in this material are those of the
                    authors and do not necessarily reflect the views of the
                    National Science Foundation.
                    </p>
                </div><!-- column -->
            </div><!-- .row -->
        </div><!-- .container -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
