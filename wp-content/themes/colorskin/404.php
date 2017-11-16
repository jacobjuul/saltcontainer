<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Colorskin
 */
get_header(); ?>

<header class="page-header cf">
    <div class="container">
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'colorskin' ); ?></h1>
    </div>
</header><!-- .page-header -->

<div class="container">
    <div class="row">
        
        <div id="primary" class="content-area col-md-12">
            
            <main id="main" class="site-main cf" role="main">
                
                <section class="error-404 not-found">
                    
                    <div class="page-content">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'colorskin' ); ?></p>
                        
                        <?php get_search_form(); ?>
                        <br>
                        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
                        
                        <?php if ( colorskin_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'colorskin' ); ?></h2>
                            <ul>
                            <?php
                                wp_list_categories( array(
                                    'orderby'    => 'count',
                                    'order'      => 'DESC',
                                    'show_count' => 1,
                                    'title_li'   => '',
                                    'number'     => 10,
                                ) );
                            ?>
                            </ul>
                        </div><!-- .widget -->
                        <?php endif; ?>
                        
                        <?php
                            /* translators: %1$s: smiley */
                            $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'colorskin' ), convert_smilies( ':)' ) ) . '</p>';
                            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                        ?>
                        
                        <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
                        
                    </div><!-- .page-content -->
                    
                </section><!-- .error-404 -->
                
            </main><!-- #main -->
            
        </div><!-- #primary -->
        
    <?php get_footer(); ?>