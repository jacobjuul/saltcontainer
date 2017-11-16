<?php
/**
 * The template for displaying search results pages.
 *
 * @package Colorskin
 */
get_header(); ?>

<header class="page-header cf">
    <div class="container">
        <h1 class="page-title">
            <?php printf( __( 'Search Results for: %s', 'colorskin' ), '<span>' . get_search_query() . '</span>' ); ?>
        </h1>
    </div>
</header><!-- .page-header -->

<div class="container">
    <div class="row">
        
        <div id="primary" class="content-area col-md-9">
            <main id="main" class="site-main cf" role="main">
                
                <?php if ( have_posts() ) : ?>
                    
                    <?php while ( have_posts() ) : the_post(); ?>
                        
                        <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );
                        ?>
                        
                    <?php endwhile; ?>
                    
                    <?php get_template_part( 'navigation', 'archive' ); ?>
                    
                <?php else : ?>
                    
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                    
                <?php endif; ?>
                
            </main><!-- #main -->
        </div><!-- #primary -->
        
        <?php get_sidebar(); ?>
        
    <?php get_footer(); ?>