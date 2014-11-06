<?php
use myFOSSIL\Plugin\Specimen\Fossil;

global $fossil;
$fossil = new Fossil( $page );

?>
<div id="fossil" class="content-area">

    <?php get_template_part( 'fossils/single/header' ); ?>

    <div id="buddypress" class="container page-styling site-main" role="main">
        <div class="row clearfix">

            <!-- Classification -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                <?php get_template_part( 'fossils/single/classification/view' ) ?>
            </div>

            <!-- Image(s) -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <h3>Images</h3>
                <img class="img-responsive" src="<?=$fossil->image ?>" />
            </div>

            <!-- Dimensions -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                <?php get_template_part( 'fossils/single/dimensions/view' ) ?>
            </div>

        </div>


        <div class="row">
        
            <!-- Location -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php get_template_part( 'fossils/single/location/view' ) ?>
            </div>

        </div>


        <div class="row">
        
            <!-- Geochronology -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php get_template_part( 'fossils/single/geochronology/view' ) ?>
            </div>

            <!-- Lithostratigraphy -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php get_template_part( 'fossils/single/lithostratigraphy/view' ) ?>
            </div>

        </div>


        <?php if ( comments_open() || '0' != get_comments_number() ): ?>
        <div class="row">

            <!-- Comments -->
            <div class="col-lg-12">
                <?php get_template_part( 'fossils/single/comments/view' ) ?>
            </div>
        </div>
        <?php endif; ?>
     
    </div><!-- #main -->
</div><!-- #primary -->

<!-- Edit Templates -->
<?php get_template_part( 'fossils/single/classification/edit' ) ?>
<?php get_template_part( 'fossils/single/dimensions/edit' ) ?>
<?php get_template_part( 'fossils/single/location/edit' ) ?>
<?php get_template_part( 'fossils/single/geochronology/edit' ) ?>
<?php get_template_part( 'fossils/single/lithostratigraphy/edit' ) ?>

<!-- Variables -->
<?php get_template_part( 'fossils/single/classification/vars' ) ?>
<?php get_template_part( 'fossils/single/dimensions/vars' ) ?>
<?php get_template_part( 'fossils/single/location/vars' ) ?>
<?php get_template_part( 'fossils/single/geochronology/vars' ) ?>
<?php get_template_part( 'fossils/single/lithostratigraphy/vars' ) ?>
