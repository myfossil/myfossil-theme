<?php

 /**
 * Template for displaying a single Document
 * You can copy this file to your theme
 * and then edit the layout.
 */

get_header();
?>

<div id="buddypress" class="container documents-container page-styling site-main" role="main">


	<?php while ( have_posts() ) : the_post(); ?>

		<div class="">
			<br/>

			<div class="">
			<nav class="nav-single">
				<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bp-simple_events' ) . '</span> %title' ); ?></span>
				&nbsp; &nbsp;
				<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bp-simple_events' ) . '</span>' ); ?></span>
			</nav><!-- .nav-single -->
		</div>

			<h2 class="entry-title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<?php the_title(); ?></a>
			</h2>
			<p class="category">
<strong>	Category: </strong> <?php the_category(', ') ?>
</p>


			

			<?php
			if ( has_post_thumbnail() ) {
				echo '<br/>';
				the_post_thumbnail( 'large' );
				echo '<br/>';
			}
			?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
			<br/>
		

		</div>

		<br/>
		
		<?php comments_template( '', true ); ?>

	<?php endwhile; ?>


</div><!-- #primary -->

<?php get_footer(); ?>
