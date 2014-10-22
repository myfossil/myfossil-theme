<?php
/**
 * Template Name: Places
 *
 * The template for displaying all Places.
 *
 * @package myFOSSIL
 */
get_header(); 

use \myFOSSIL\Plugin\Resources;

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
    $fields = get_fields( $pl->ID );

    // Country
    $country = $fields[ 'country' ];
    if ( !$country ) $country = '__MYFOSSIL__';
    if ( !array_key_exists( $country, $pl_array ) )
        $pl_array[ $country ] = array();

    // State
    $state = $fields[ 'state' ];
    if ( !$state ) $state = '__MYFOSSIL__';
    if ( !array_key_exists( $state, $pl_array ) )
        $pl_array[ $country ][ $state ] = array();

    // Type
    $type = $fields[ 'type' ];
    if ( !$type ) $type = 'Other';
    if ( !array_key_exists( $type, $pl_array ) )
        $pl_array[ $country ][ $state ][ $type ] = array();

    // Fix array if we changed the values
    foreach ( array( 'country', 'state', 'type' ) as $k )
        $fields[ $k ] = ${ $k };

    $pl_array[ $country ][ $state ][ $type ][] = $fields;
}

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <pre>
            <?php print_r( $pl_array ); ?>
            </pre>
        </main>
    </div>

<?php get_footer(); ?>
