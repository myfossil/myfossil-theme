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
$place_properties = array( 'title', 'content', 'type', 'country', 'state',
        'city', 'zip', 'address', 'latitude', 'longitude', 'url', 'map_url' );
?>
{{#each places}}
    <div class="panel panel-default col-xs-12 col-sm-12 col-md-6" 
            data-place-state="{{ state }}"
            data-place-type="{{ type }}">
        <div class="panel-body">
            <h5>{{ title }}</h5>
            <p>{{ content }}</p>
            <dl>
            <?php foreach ( $place_properties as $pp ): ?>
                {{#if <?=$pp ?>}}
                <dt><?=ucfirst( $pp ) ?></dt>
                <dd>{{ <?=$pp ?> }}</dd>
                {{/if}}
            <?php endforeach; ?>
            </dl>
        </div>
    </div>
{{/each}}
</script>

<div id="primary" class="container content-area">
    <main id="main" class="site-main" role="main">
        <h1>Find Fossils</h1>
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
