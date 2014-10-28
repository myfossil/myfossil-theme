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

<!-- {{{ places template -->
<script id="tpl-places" type="text/x-handlebars-template">
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
                {{#if type}}
                <tr>
                    <td>Type</td>
                    <td>{{ type }}</td>
                </tr>
                {{/if}}
                {{#if country}}
                <tr>
                    <td>Country</td>
                    <td>{{ country }}</td>
                </tr>
                {{/if}}
                {{#if state}}
                <tr>
                    <td>State</td>
                    <td>{{ state }}</td>
                </tr>
                {{/if}}
                {{#if city}}
                <tr>
                    <td>City</td>
                    <td>{{ city }}</td>
                </tr>
                {{/if}}
                {{#if zip}}
                <tr>
                    <td>Zip</td>
                    <td>{{ zip }}</td>
                </tr>
                {{/if}}
                {{#if address}}
                <tr>
                    <td>Address</td>
                    <td>{{ address }}</td>
                </tr>
                {{/if}}
                {{#if latitude}}
                <tr>
                    <td>Latitude</td>
                    <td>{{ latitude }}</td>
                </tr>
                {{/if}}
                {{#if longitude}}
                <tr>
                    <td>Longitude</td>
                    <td>{{ longitude }}</td>
                </tr>
                {{/if}}
            </table>
        </div>
    </div>
{{/each}}
</script>
<!-- // }}} -->

<div id="primary" class="container content-area">
    <main id="main" class="site-main" role="main">
        <h1>Find Fossils</h1>
        <div class="row">
            <div class="hidden-xs hidden-sm col-md-12" 
                    style="margin: 0 0 20px 0; height:600px;" 
                    id="map-canvas" />
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
            <?php wp_nonce_field( 'myfr_filter', 'myfr_filter_nonce' ); ?>
            <div class="col-sm-12 col-md-8 col-lg-9" id="places-list" />
        </div>
    </main>
</div>

<?php get_footer(); ?>
