<?php
/**
 * The template part for displaying navigation.
 *
 * @package Colorskin
 */
?>

<?php
    if( is_archive() || is_home() || is_search() ) {
        /**
         * Checking WP-PageNaviplugin exist
         */
        if ( function_exists('wp_pagenavi' ) ) :
            wp_pagenavi();
        else:
            global $wp_query;
            if ( $wp_query->max_num_pages > 1 ) :
            ?>
            <nav class="navigation posts-navigation" role="navigation">
                <ul class="default-wp-page cf">
                    <li class="previous"><?php next_posts_link( __( '&larr; Previous', 'colorskin' ) ); ?></li>
                    <li class="next"><?php previous_posts_link( __( 'Next &rarr;', 'colorskin' ) ); ?></li>
                </ul>
            </nav>
            <?php
            endif;
        endif;
    }
    
    if ( is_single() ) {
        if( is_attachment() ) {
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <ul class="default-wp-page cf">
                <li class="previous"><?php previous_image_link( false, __( '&larr; Previous', 'colorskin' ) ); ?></li>
                <li class="next"><?php next_image_link( false, __( 'Next &rarr;', 'colorskin' ) ); ?></li>
            </ul>
        </nav>
        <?php
        } else {
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <ul class="default-wp-page cf">
                <li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'colorskin' ) . '</span> %title' ); ?></li>
                <li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'colorskin' ) . '</span>' ); ?></li>
            </ul>
        </nav>
        <?php
        }
    }
    
?>