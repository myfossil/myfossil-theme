<?php
/**
 * Template Name: Fossil
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package myfossil
 */
get_header(); 

use myFOSSIL\Plugin\Specimen;

/**
 * Return human friendly location given a post ID.
 */
function get_location( $post_id ) {
    $state = get_post_meta( $post_id, 'state_us', true );
    $state = $state ? $state : get_post_meta( $post_id, 'state_ca', true );
    $state = $state ? $state : get_post_meta( $post_id, 'state_general', true );
    $state = $state ? $state : get_post_meta( $post_id, 'country', true );
    $county = get_post_meta( $post_id, 'county', true );

    if ( $state && $county )
        printf( "%s, %s\n", $county, $state ); 
    else
        printf( "%s\n", $state );
}

function get_taxon( $post_id ) {
    $taxon = get_post_meta( $post_id, 'taxon', true );

    /* Get Taxon post object */
    $taxon_post_id = is_array( $taxon ) ? array_pop( $taxon ) : $taxon;
    $taxon_post = get_post( $taxon_post_id );

    /* Grab custom fields for post */
    $meta_keys = array( 'pbdb_id', 'parent_pbdb_id', 'common_name', 'reference' );
    $meta_data = array();
    foreach ( $meta_keys as $meta_key )
        $meta_data[$meta_key] = get_post_meta( $taxon_post_id, $meta_key, true );
    $meta_data['name'] = $taxon_post->post_title;
    $rank = wp_get_post_terms( $taxon_post_id, 'myfs_taxa' );
    if ( is_array( $rank ) )
        $meta_data['rank'] = array_pop( $rank )->name;
    else
        $meta_data['rank'] = $rank->name;

    return new Specimen\Taxon( $meta_data );
}

function get_geochronology( $post_id ) {
    $geochron = array();
    $geochron_keys = array( 'geochron_era', 'geochron_period',
            'geochron_epoch', 'geochron_age' );
    foreach ( $geochron_keys as $geoc_key ) {
        $g_post_id = get_post_meta( $post_id, $geoc_key, true );
        $g_post_id = is_array( $g_post_id ) ? array_pop( $g_post_id ) : $g_post_id;
        $g = get_post( $g_post_id );
        $geochron[$geoc_key] = $g;
    }
    
    return $geochron;    
}

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
                <tr>
                    <td>
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                    </td>
                    <td>
                        <?php get_location( get_the_id() ); ?>
                    </td>
                    <td>
                        <?php $taxon = get_taxon( get_the_id() ); ?>
                        <span class="label label-default"><?=$taxon->rank ?></span>
                        <?=$taxon->name ?>
                    </td>
                    <td>
                        <pre><?php print_r( get_geochronology( get_the_id() ) ); ?></pre>
                    </td>
                    <td>
                        <?php
                        // {{{ Lithostratigraphy
                        // }}}
                        ?>
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
<?php
wp_reset_query(); 
get_footer();
