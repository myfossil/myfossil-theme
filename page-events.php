<?php
/**
 * Template Name: Events
 *
 * The template for displaying all Places.
 *
 * @package myFOSSIL
 */
get_header(); 
?>

<!-- {{{ places template -->
<script id="tpl-events" type="text/x-handlebars-template">
{{#each events}}
    <div class="panel panel-default col-xs-12 col-sm-12 col-md-6" 
            data-place-state="{{ state }}"
            data-place-type="{{ type }}">
        <div class="panel-body">
            <h5 class="pull-left">{{ title }}</h5>
            <p class="pull-right">
                <i class="fa fa-fw fa-clock-o"></i> 
                {{ starts_at }} to {{ ends_at }}
            </p>
            <div class="clearfix" />
            <p>{{ content }}</p>
        </div>
    </div>
{{/each}}
</script>
<!-- }}} -->

<div id="primary" class="container content-area">
    <main id="main" class="site-main" role="main">
        <h1>Events</h1>
        <div class="row">
            <?php wp_nonce_field( 'myfr_filter', 'myfr_filter_nonce' ); ?>
            <div class="col-lg-12" id="events-list" />
        </div>
    </main>
</div>

<?php get_footer(); ?>
