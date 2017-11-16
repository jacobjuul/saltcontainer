<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="site-content">
 *
 * @package Colorskin
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'colorskin' ); ?></a>
    
	<header id="masthead" class="site-header" role="banner">
        
        <?php if ( get_theme_mod( 'colorskin_top_info_active', '0' ) == '1' || get_theme_mod( 'colorskin_top_search_active', '0' ) == '1' || get_theme_mod( 'colorskin_social_link_activate', '0' ) == '1' ) : ?>
        <div class="header-top-bar cf">
            <div class="container">
                <?php if( get_theme_mod( 'colorskin_top_info_active', '0' ) == '1' ) :
                    $top_bar_phone = get_theme_mod( 'colorskin_top_bar_phone', '');
                    $top_bar_email = get_theme_mod( 'colorskin_top_bar_email', '');
                ?>
                <ul class="top-info">
                    <?php if ( $top_bar_phone != '' ) echo '<li><i class="fa fa-phone"></i> ' . esc_html( $top_bar_phone ) . '</li>'; ?>
                    <?php if ( $top_bar_email != '' ) { ?>
                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo antispambot($top_bar_email); ?>"><?php echo antispambot($top_bar_email); ?></a></li>
                    <?php } ?>
                </ul>
                <?php endif; ?>
                <?php if( get_theme_mod( 'colorskin_top_search_active', '0' ) == '1' ) : ?>
                <div class="search-wrap">
					<div class="search-icon">
						<i class="fa fa-search"></i>
					</div>
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
                <?php endif; ?>
                <?php
					if( get_theme_mod( 'colorskin_social_link_activate', '0' ) == '1' ) {
						colorskin_social_links();
					}
				?>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="container">
            <div class="site-branding cf">
                <?php if( ( get_theme_mod( 'colorskin_header_logo_text', 'text' ) == 'both' || get_theme_mod( 'colorskin_header_logo_text', 'text' ) == 'logo' ) ) { ?>
                    
                    <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php endif;
                    
                    if( get_theme_mod( 'colorskin_header_logo_text', 'text' ) != 'logo' ) : ?>
                    
                    <div class="header-text-title">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p><!-- #site-description -->
                        <?php endif; ?>
                    </div>
                    
                    <?php endif;
                    
                } ?>
                
                <?php if( get_theme_mod( 'colorskin_header_logo_text', 'text' ) == 'text' ) : ?>
                    <div class="header-text-title">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p><!-- #site-description -->
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div><!-- .site-branding -->
            
            <nav id="site-navigation" class="main-navigation cf" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav><!-- #site-navigation -->
            <nav class="mobile-nav"></nav>
        </div>
        
	</header><!-- #masthead -->
    <div class="header-clone"></div>
    
    <?php if ( get_theme_mod('colorskin_show_pages_image', '0') == '1' && get_header_image() ) : ?>
        <img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    <?php elseif( is_front_page() && get_header_image() ) : ?>
        <img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    <?php endif; ?>
    
	<div id="content" class="site-content">