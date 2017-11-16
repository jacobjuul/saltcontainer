<?php
/**
 * Template Name: Front Template
 * The template for displaying a front page.
 *
 * @package Didi Lite
 */

get_header(); ?>
	<div id="primary" class="content-area frontpage alternative">
		<main id="main" class="site-main" role="main">
			<div class="main-content">
				<?php if ($post->post_content == '') : { }?>
				<?php else: ?>
				<div class="content-block">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'front-page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>
				</div>
				<?php endif; // End of the loop. ?>

			</div><!-- .main-content -->

			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="top alternative">
				<div class="widgetized-content">
					<div class="widget-area-front" role="complementary">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div><!-- #secondary -->
				</div><!-- .block-four -->
			</div>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>