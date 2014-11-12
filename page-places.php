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



<!-- Modal -->
<div class="modal fade" id="placesModal" tabindex="-1" role="dialog" aria-labelledby="placesModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="placesModalLabel">Create New Place</h4>
      </div>
      <div class="modal-body">
  <form id="new-place-form" role="form">
       <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Name">
    </div>
       <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" placeholder="Description">
    </div>
    <label for="type">Type</label>
    <select class="form-control" id="type">
      <option value="City Park">City Park</option>
      <option value="State Park">State Park</option>
      <option value="National Park">National Park</option>
      <option value="Collecting Site">Collecting Site</option>
      <option value="Museum">Museum</option>
      <option value="Event Venue">Event Venue</option>
      <option value="Other">Other</option>
       </select>

    <div class="form-group">
      <label for="country">Country</label>
      <input type="text" class="form-control" id="country" placeholder="Country">
    </div>
       <div class="form-group">
      <label for="State">State</label>
      <input type="text" class="form-control" id="state" placeholder="State">
    </div>
       <div class="form-group">
      <label for="county">County</label>
      <input type="text" class="form-control" id="county" placeholder="County">
    </div>
       <div class="form-group">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" placeholder="City">
    </div>
       <div class="form-group">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" id="zip" placeholder="Zip">
    </div>
       <div class="form-group">
      <label for="address">Street Address</label>
      <input type="text" class="form-control" id="address" placeholder="Street Address">
    </div>
       <div class="form-group">
      <label for="latitude">Latitude</label>
      <input type="text" class="form-control" id="latitude" placeholder="Latitude">
    </div>
       <div class="form-group">
      <label for="longitude">Longitude</label>
      <input type="text" class="form-control" id="longitude" placeholder="Longitude">
    </div>
      <div class="form-group">
      <label for="url">URL</label>
      <input type="text" class="form-control" id="url" placeholder="URL">
    </div>

    <div class="form-group">
      <label for="map_url">Map URL</label>
      <input type="text" class="form-control" id="map_url" placeholder="Map URL">
    </div>
   </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="add-place-form-submit" class="btn btn-primary">Add place</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- END MODAL -->

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
                    <th>key</th>
                    <th>value</th>
                </tr>
                {{#if type}}
                <tr>
                    <td>type</td>
                    <td>{{ type }}</td>
                </tr>
                {{/if}}
                {{#if country}}
                <tr>
                    <td>country</td>
                    <td>{{ country }}</td>
                </tr>
                {{/if}}
                {{#if state}}
                <tr>
                    <td>state</td>
                    <td>{{ state }}</td>
                </tr>
                {{/if}}
                {{#if city}}
                <tr>
                    <td>city</td>
                    <td>{{ city }}</td>
                </tr>
                {{/if}}
                {{#if zip}}
                <tr>
                    <td>zip</td>
                    <td>{{ zip }}</td>
                </tr>
                {{/if}}
                {{#if address}}
                <tr>
                    <td>address</td>
                    <td>{{ address }}</td>
                </tr>
                {{/if}}
                {{#if latitude}}
                <tr>
                    <td>latitude</td>
                    <td>{{ latitude }}</td>
                </tr>
                {{/if}}
                {{#if longitude}}
                <tr>
                    <td>longitude</td>
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
        <h1>Places</h1>
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
                    <select class="form-control" id="state-filter">
                    </select>

                    <h4>Type</h4>
                    <div id="types-selected">
                    </div>
                </form>

                <button type="button" class="btn btn-default" id="clear-filters">
                    Reset Filters
                </button>

            </div>
            <?php wp_nonce_field( 'myfr_filter', 'myfr_filter_nonce' ); ?>
            <div class="col-sm-12 col-md-8 col-lg-9 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#placesModal">
                  Create Place
                </button>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9" id="places-list">
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
