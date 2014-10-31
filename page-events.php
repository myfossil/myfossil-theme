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

<!-- {{{ events template -->
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
	  <div class="hidden-xs hidden-sm col-md-12" 
	       style="margin: 0 0 20px 0; height: 600px;"
	       id="map-canvas" />
	</div>
	
        <div class="row">
	    <div class="col-sm-12 col-md-4 col-lg-3">
              <h3>Filters</h3>
              
              <form role="form" id="filters">
                <?php wp_nonce_field( 'myfr_filter', 'myfr_filter_nonce' ); ?>
                <h4>State</h4>
                <select class="form-control" id="state"></select>

                <h4>When</h4>
                <select class="form-control" id="month-year"> </select>

                <h4>Type</h4>
                <div id="types-selected"></div>

              </form>
            </div>
          
            <div class="col-sm-12 col-md-8 col-lg-9" id="events-list" />
        </div>
    </main>
</div>
<?php get_footer(); ?>
