<?php
/**
 * Template Name: Page Builder Template
 *
 * @package Didi
 * @since Didi 1.0.9
 */

get_header(); ?>

	<div class="builder-content">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page-blank' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
<?php get_footer(); ?>