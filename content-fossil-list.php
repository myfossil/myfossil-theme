<?php
use myFOSSIL\Plugin\Specimen\Fossil;

$fossils = new WP_Query( 
        array( 
            'post_type' => 'myfs_fossil', 
            'posts_per_page' => -1 
        ) 
    );

?>

<div id="buddypress-header">

    <div id="item-header" role="complementary" class="container">

        <div class="row" id="groups-header">

            <div id="item-header-content" class="col-md-9">
                <h1>Fossils</h1>

                <?php do_action( 'template_notices' ); ?>

            </div><!-- #item-header-content -->
        </div>

    </div>

    <div id="item-nav" class="container">
        <div class="item-list-tabs" role="navigation">
            <ul class="nav nav-tabs">
                <li class="selected active">
                    <a>
                        <?php printf( __( 'All Fossils', 'buddypress' ) ); ?>
                    </a>
                </li>
            </ul>
        </div><!-- .item-list-tabs -->
    </div>
</div>

<div id="buddypress" class="container container-no-padding page-styling no-border-top">
    <main id="main" class="site-main" role="main">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Thumbnail</th>
                    <th>Location</th>
                    <th>Taxon</th>
                    <th>Geochronology</th>
                    <th>Lithostratigraphy</th>
                </tr>
            </thead>
            <tbody>
            <?php while ( $fossils->have_posts() ) : $fossils->the_post(); ?>
            <?php $fossil = new Fossil( get_the_id() ); ?>
                <tr data-href="<?=get_the_id() ?>">
                    <td>
                        <?=get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                    </td>
                    <td>
                        <img style="max-width: 75px" src="<?=$fossil->image ?>" class="img-responsive" />
                    </td>
                    <td>
                        <?=$fossil->location ?>
                    </td>
                    <td>
                        <?=$fossil->taxon ?>
                    </td>
                    <td>
                        <?=$fossil->time_interval ?>
                    </td>
                    <td>
                        <?=$fossil->stratum ?>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </main><!-- #main -->
</div><!-- #primary -->
<script type="text/javascript">
    jQuery( function() {
        jQuery( 'tr' ).on( 'click', function() {
                if( jQuery( this ).data( 'href' ) !== undefined ) 
                    document.location = jQuery( this ).data( 'href' );
            }
        );
    });
</script>
<?php
wp_reset_query(); 
