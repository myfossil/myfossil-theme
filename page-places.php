<?php
/**
 * Template Name: Places
 *
 * The template for displaying all Places.
 *
 * @package myFOSSIL
 */
get_header(); 

?>

<script id="tpl-places" type="text/x-handlebars-template">
<?php
/* @todo redesign/refactor such that PHP not required for template */
$place_properties = array( 'type', 'country', 'state', 'city', 'zip',
        'address', 'latitude', 'longitude' );
?>
{{#each places}}
    <div class="panel panel-default col-xs-12 col-sm-12 col-md-6" 
            data-place-state="{{ state }}"
            data-place-type="{{ type }}">
        <div class="panel-body">
            <h5>{{ title }}</h5>
            <p>{{ content }}</p>
            <table class="table">
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>
                <?php foreach ( $place_properties as $pp ): ?>
                {{#if <?=$pp ?>}}
                <tr>
                    <td><?=ucfirst( $pp ) ?></td>
                    <td>{{ <?=$pp ?> }}</td>
                </tr>
                {{/if}}
                <?php endforeach; ?>
            </table>
        </div>
    </div>
{{/each}}
</script>

<div id="primary" class="container content-area">
    <main id="main" class="site-main" role="main">
        <h1>Find Fossils</h1>
        <div class="row">
            <div class="hidden-xs hidden-sm col-md-12" style="margin: 0 0 20px 0; height:600px;" id="map-canvas"></div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">
                <h3>Filters</h3>
                <form role="form" id="filters">
                    <?php wp_nonce_field( 'myfr_filter', 'myfr_filter_nonce' ); ?>
                    <h4>State</h4>
                    <select class="form-control" id="state">
                    </select>

                    <h4>Type</h4>
                    <div id="types-selected">
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9" id="places-list">
            </div>
    </main>
</div>

<?php get_footer(); ?>
