<?php
/**
 * Template Name: Newsletter
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
get_header ();
?>

<div id="newsletter_primary" class="content-area">
	<main id="newsletter_content" class="site-main" role="main">
				<h1 id="header-title"> </h1>
			


			<?php

			

			while ( have_posts () ) {
				the_post ();
				get_template_part ( 'content', 'page' );
				
				// If comments are open or we have at least one comment, load
				// up the comment template
				if (comments_open () || '0' != get_comments_number ())
					comments_template ();
			}
			?>

		</main>
	<!-- #main -->
</div>
<!-- #primary -->

<?php get_footer(); ?>

<script>
	jq( document ).ready(function() {
   
	var text =	jq(document).find("title").text();
	var splitted = text.split("|");
    jq('#header-title').text(splitted[0]);
});


</script>

