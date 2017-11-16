<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Colorskin
 */
?>
            </div>
        </div>
	</div><!-- #content -->
    
	<footer id="colophon" class="site-footer cf" role="contentinfo">

        <?php
        if ( is_active_sidebar( 'footer-widget-1' )
            || is_active_sidebar( 'footer-widget-2' )
            || is_active_sidebar( 'footer-widget-3' )
            || is_active_sidebar( 'footer-widget-4' )) :
            $count = 0;
            if ( is_active_sidebar( 'footer-widget-1' ) ) $count++;
            if ( is_active_sidebar( 'footer-widget-2' ) ) $count++;
            if ( is_active_sidebar( 'footer-widget-3' ) ) $count++;
            if ( is_active_sidebar( 'footer-widget-4' ) ) $count++;
            if ( $count == 1 ) $count = 'col-md-12';
            if ( $count == 2 ) $count = 'col-md-6';
            if ( $count == 3 ) $count = 'col-md-4';
            if ( $count == 4 ) $count = 'col-md-3';
        ?>
            <div id="footer-sidebar" class="footer-widget-area cf" role="complementary">
                <div class="container">
                    <div class="row">
                        <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                            <div class="<?php echo $count; ?>">
                                <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                            </div>
                        <?php endif;
                        if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                            <div class="<?php echo $count; ?>">
                                <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                            </div>
                        <?php endif;
                        if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                            <div class="<?php echo $count; ?>">
                                <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                            </div>
                        <?php endif;
                        if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                            <div class="<?php echo $count; ?>">
                                <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
		<div class="site-info container">
            <div class="row">
                <?php do_action( 'colorskin_footer_copyright' ); ?>
            </div>
		</div><!-- .site-info -->
        
	</footer><!-- #colophon -->
    
    <?php if ( get_theme_mod('colorskin_show_go_to_top', '0') == '1' ) : ?>
        <a class="go-top"><i class="fa fa-angle-up"></i></a>
    <?php endif; ?>
    
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
