	</div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <img 
                        src="<?=get_template_directory_uri() ?>/static/img/myfossil-logo-white-small.png" 
                        alt="myFOSSIL Logo" />

                    <ul class="nav navbar-nav" id="nav-footer">
                        <?php $items = wp_get_nav_menu_items('primary'); ?>
                        <?php foreach ($items as $item): ?>
                            <li>
                                <?php 
                                $page_array = get_option( 'bp-pages' );
                                if ( $post->post_title == "Site-Wide Activity" ) {
                                    $post->post_title = 'Activity';
                                    $post->title = 'Activity';
                                }

                                if ( array_key_exists( strtolower( $item->title ), $page_array ) )
                                    $item->object_id = $page_array[strtolower( $item->title )];

                                $class = ( $item->object_id == $post->ID ||
                                        strtolower( $item->title ) ==
                                        strtolower( $post->post_title ) ) 
                                        ? 'class="selected"' : null;
                                ?>
                                <a href="<?php echo $item->url; ?>"<?=$class ?>>
                                <span><?php echo $item->title; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- .col-sm-12 .col-lg-6 -->

                <div class="col-sm-12 col-lg-offset-2 col-lg-4" id="footer-logos">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="http://ufl.edu" rel="nofollow">
                                <img src="<?=get_template_directory_uri() ?>/static/img/logos/uf.png" />
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="https://www.flmnh.ufl.edu/" rel="nofollow">
                                <img src="<?=get_template_directory_uri() ?>/static/img/logos/flmnh.png" />
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="http://www.nsf.gov/" rel="nofollow">
                                <img src="<?=get_template_directory_uri() ?>/static/img/logos/nsf.png" />
                            </a>
                        </div>
                    </div>
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
