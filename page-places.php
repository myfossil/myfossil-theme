<?php
/**
 * Template Name: Places
 *
 * The template for displaying all Places.
 *
 * @package myFOSSIL
 */
get_header(); 

/**
 * Retrieve all places from WordPress
 *
 * @todo    Add AJAX filters
 */
$places = get_posts( array( 'post_type' => 'place', 'posts_per_page' => -1 ) );

/**
 * Maneuver everything into an array that we can work with.
 *
 * - Country
 *   - State
 *     - Type
 */
$pl_array = array();
foreach ( $places as $pl ) {
    $fields = parse_meta( get_post_meta( $pl->ID ) );
    $fields[ 'title' ] = $pl->post_title;
    $fields[ 'content' ] = $pl->post_content;

    // Country
    $country = $fields[ 'country' ];
    if ( !array_key_exists( $country, $pl_array ) )
        $pl_array[ $country ] = array();

    // State
    $state = $fields[ 'state' ];
    if ( !array_key_exists( $state, $pl_array[ $country ] ) )
        $pl_array[ $country ][ $state ] = array();

    // Type
    $type = $fields[ 'type' ];
    if ( !array_key_exists( $type, $pl_array[ $country ][ $state ] ) )
        $pl_array[ $country ][ $state ][ $type ] = array();

    array_push( $pl_array[ $country ][ $state ][ $type ], $fields );
}

function rksort( &$array ) {
    foreach ( $array as &$value ) {
        if ( is_array( $value ) ) 
            rksort( $value );
    }
    return ksort( $array );
}
rksort( $pl_array );

?>
	<div id="primary" class="container content-area">
		<main id="main" class="site-main" role="main">
            <h1>Find Fossils</h1>
            <?php
            foreach ( $pl_array as $country_name => $state ) {
                printf( "<h2 class=\"sr-only\">%s</h2>\n", $country_name );
                printf( "<div class=\"container\">\n" );
                foreach ( $state as $state_name => $type ) {
                    printf( "<h3>%s</h3>\n", $state_name );
                    printf( "<div class=\"container\">\n" );
                    foreach ( $type as $type_name => $places ) {
                        printf( "<h4>%s</h4>\n", $type_name );
                        printf( "<div class=\"container row\">\n" );
                        foreach ( $places as $place ) {
                            ?>
                            <div class="panel panel-default col-xs-12 col-sm-12 col-md-6">
                                <div class="panel-body">
                                    <h5><?=$place[ 'title' ] ?></h5>
                                    <p><?=$place[ 'content' ] ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        printf( "</div>" );
                    }
                    printf( "</div>" );
                }
                printf( "</div>" );
            }
            ?>
        </main>
    </div>

<?php get_footer(); ?>
