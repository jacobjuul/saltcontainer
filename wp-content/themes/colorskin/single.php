<?php
/**
 * The template for displaying all single posts
 *
 * @package Colorskin
 */
get_header(); ?>

<div class="container">
    <div class="row">
        
        <div id="primary" class="content-area col-md-9">
            <main id="main" class="site-main cf" role="main">
                
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <?php get_template_part( 'template-parts/content', 'single' ); ?>
                    
                    <?php get_template_part( 'navigation', 'single' ); ?>
                    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                    
                <?php endwhile; // end of the loop. ?>
                
            </main><!-- #main -->
        </div><!-- #primary -->
        
        <?php get_sidebar(); ?>
        
    <?php get_footer(); ?>