<?php

/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package myfossil
 */
get_header(); ?>


<?php 

$backup_query = $wp_query;
$wp_query = new WP_Query(array('post_type' => 'post'));



 register_nav_menus(array(
            'primary' => __('Primary Menu', 'myfossil') ,
        ));

$wp_query = $backup_query;



?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="container documents-container archives-container container-no-padding page-styling no-border-top">
		<?php if (have_posts()): ?>

			<header class="page-header">
				<h2 class="page-title">
					<?php
                        if (is_category()):
                            single_cat_title();
                        elseif (is_tag()):
                            single_tag_title();
                        elseif (is_author()):
                            printf(__('Author: %s', 'myfossil') , '<span class="vcard">' . get_the_author() . '</span>');
                        elseif (is_day()):
                            printf(__('Day: %s', 'myfossil') , '<span>' . get_the_date() . '</span>');
                        elseif (is_month()):
                            printf(__('Month: %s', 'myfossil') , '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'myfossil')) . '</span>');
                        elseif (is_year()):
                            printf(__('Year: %s', 'myfossil') , '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'myfossil')) . '</span>');
                        elseif (is_tax('post_format', 'post-format-aside')):
                            _e('Asides', 'myfossil');
                        elseif (is_tax('post_format', 'post-format-gallery')):
                            _e('Galleries', 'myfossil');
                        elseif (is_tax('post_format', 'post-format-image')):
                            _e('Images', 'myfossil');
                        elseif (is_tax('post_format', 'post-format-video')):
                            _e('Videos', 'myfossil');
                        elseif (is_tax('post_format', 'post-format-quote')):
                            _e('Quotes', 'myfossil');
                        elseif (is_tax('post_format', 'post-format-link')):
                            _e('Links', 'myfossil');
                        elseif (is_tax('post_format', 'post-format-status')):
                            _e('Statuses', 'myfossil');
                        elseif (is_tax('post_format', 'post-format-audio')):
                            _e('Audios', 'myfossil');
                        elseif (is_tax('post_format', 'post-format-chat')):
                            _e('Chats', 'myfossil');
                        else:
                            _e('Archives', 'myfossil');
                        endif;
                    ?>
				</h2>
				<?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if (!empty($term_description)):
                        printf('<div class="taxonomy-description">%s</div>', $term_description);
                    endif;
                ?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */  ?>
			<?php while (have_posts()): the_post(); ?>
				<?php
                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                */
                get_template_part('content', get_post_format());
                ?>
			<?php endwhile; ?>

			<?php myfossil_paging_nav(); ?>

		<?php else: ?>

			<?php get_template_part('content', 'none'); ?>

		<?php endif; ?>
    </div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
