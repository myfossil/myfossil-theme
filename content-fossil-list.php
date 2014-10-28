<?php
use myFOSSIL\Plugin\Specimen\Fossil;

$fossils = new WP_Query( 
        array( 
            'post_type' => 'myfs_fossil', 
            'posts_per_page' => -1 
        ) 
    );

?>
<div id="primary" class="content-area container">
    <main id="main" class="site-main" role="main">
        <table class="table">
            <thead>
                <tr>
                    <th>Author</th>
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
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                    </td>
                    <td>
                        <?=$fossil->location ?>
                    </td>
                    <td>
                        <?=$fossil->taxon ?>
                    </td>
                    <td>
                        <?=$fossil->stratum ?>
                    </td>
                    <td>
                        <?=$fossil->time_interval ?>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Author</th>
                    <th>Location</th>
                    <th>Taxon</th>
                    <th>Geochronology</th>
                    <th>Lithostratigraphy</th>
                </tr>
            </tfoot>
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
