<?php
/**
 * Colorskin Theme Customizer
 *
 * @package Colorskin
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function colorskin_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'title_tagline' )->title        = __( 'Site title/tagline/logo', 'colorskin' );
    $wp_customize->get_section( 'colors' )->title               = __( 'General Colors', 'colorskin' );
    
    // Site Identity
    $wp_customize->add_setting( 'colorskin_header_logo_text', array(
        'default'           => 'text',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'colorskin_radio_sanitize'
    ));
    $wp_customize->add_control( 'colorskin_header_logo_text', array(
        'type'    => 'radio',
        'label'   => __('Choose the option that you want.', 'colorskin'),
        'section' => 'title_tagline',
        'choices' => array(
            'logo'    => __('Header Logo', 'colorskin'),
            'text'    => __('Header Text', 'colorskin'),
            'both'    => __('Both', 'colorskin'),
            'disable' => __('Disable', 'colorskin')
        )
    ));
    
    // Show Header Image in all pages
    $wp_customize->add_setting( 'colorskin_show_pages_image', array(
        'default'           => 0,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'colorskin_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'colorskin_show_pages_image', array(
        'type'    => 'checkbox',
        'label'   => __('Check to show Header Image in all pages.', 'colorskin'),
        'section' => 'header_image'
    ));
    
    // Change General Colors
    $wp_customize->add_setting('colorskin_color_skin', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'colorskin_radio_sanitize'
    ));
    $wp_customize->add_control( 'colorskin_color_skin', array(
        'type'     => 'radio',
        'label'    => __('Choose the general color skin for this theme.', 'colorskin'),
        'section'  => 'colors',
        'settings' => 'colorskin_color_skin',
        'choices'  => array(
            'default' => __('Gold', 'colorskin'),
            'blue'    => __('Blue', 'colorskin'),
            'green'   => __('Green', 'colorskin'),
            'red'     => __('Red', 'colorskin'),
        )
    ));
    
    /* General Options
    ---------------------------------------------------*/
    $wp_customize->add_section( 'colorskin_general_options', array(
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'title'      => __('General Options', 'colorskin')
    ) );
        
        // Sticky Header
        $wp_customize->add_setting( 'colorskin_sticky_header', array(
            'default'           => 'sticky',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'colorskin_radio_sanitize',
        ));
        $wp_customize->add_control( 'colorskin_sticky_header', array(
            'type'    => 'radio',
            'label'   => __('Sticky header', 'colorskin'),
            'section' => 'colorskin_general_options',
            'choices' => array(
                'sticky' => __('Sticky', 'colorskin'),
                'static' => __('Static', 'colorskin'),
            ),
        ));
        
        // Excerpt - Full Content
        $wp_customize->add_setting( 'colorskin_full_content', array(
            'default'           => 'excerpt',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'colorskin_radio_sanitize'
        ));
        $wp_customize->add_control( 'colorskin_full_content', array(
            'type'    => 'radio',
            'label'   => __('Choose the display type for the latests posts view or posts page view (static front page).', 'colorskin'),
            'choices' => array(
                'excerpt'      => __( 'Excerpt', 'colorskin' ),
                'full_content' => __( 'Full Content', 'colorskin' ),
            ),
            'section' => 'colorskin_general_options'
        )); 
        
        // Show go to top button
        $wp_customize->add_setting( 'colorskin_show_go_to_top', array(
            'default'           => 0,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'colorskin_sanitize_checkbox'
        ));
        $wp_customize->add_control( 'colorskin_show_go_to_top', array(
            'type'    => 'checkbox',
            'label'   => __('Check to show go to top', 'colorskin'),
            'section' => 'colorskin_general_options'
        ));
        
    /*---------------------------------------------------*/
    /* Top Bar
    /*---------------------------------------------------*/
    $wp_customize->add_panel( 'colorskin_top_bar', array(
        'capability'  => 'edit_theme_options',
        'priority'    => 50,
        'title'       => __('Top Bar', 'colorskin'),
        'description' => __('If hide Info, Search Form and Social, top bar will disabled.', 'colorskin'),
	));
    
        /* Top Info
        ---------------------------------------------------*/
        $wp_customize->add_section( 'colorskin_top_info', array(
            'priority' => 1,
            'title'    => __('Top Info', 'colorskin'),
            'panel'    => 'colorskin_top_bar'
        ));
            
            // Show Top Info
            $wp_customize->add_setting( 'colorskin_top_info_active', array(
                'default'           => 0,
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'colorskin_sanitize_checkbox'
            ));
            $wp_customize->add_control( 'colorskin_top_info_active', array(
                'type'    => 'checkbox',
                'label'   => __('Check to show Emai/Phone on header top bar', 'colorskin'),
                'section' => 'colorskin_top_info'
            ));
            
            // Phone
            $wp_customize->add_setting( 'colorskin_top_bar_phone', array(
                'sanitize_callback' => 'sanitize_text_field',
                'capability'        => 'edit_theme_options',
                'default'           => ''
            ) );
            $wp_customize->add_control( 'colorskin_top_bar_phone', array(
                'label'   => __('Phone Number', 'colorskin'),
                'section' => 'colorskin_top_info'
            ) );
            
            // Email
            $wp_customize->add_setting( 'colorskin_top_bar_email', array(
                'sanitize_callback' => 'sanitize_email',
                'capability'        => 'edit_theme_options',
                'default'           => ''
            ) );
            $wp_customize->add_control( 'colorskin_top_bar_email', array(
                'label'   => __('Email', 'colorskin'),
                'section' => 'colorskin_top_info'
            ) );
        
        /* Top Search Form
        ---------------------------------------------------*/
       $wp_customize->add_section( 'colorskin_top_search', array(
            'priority' => 2,
            'title'    => __('Search Icon/Form', 'colorskin'),
            'panel'    => 'colorskin_top_bar'
        ));
            
            // Show Search Form
            $wp_customize->add_setting( 'colorskin_top_search_active', array(
                'default'           => 0,
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'colorskin_sanitize_checkbox'
            ));
            $wp_customize->add_control( 'colorskin_top_search_active', array(
                'type'    => 'checkbox',
                'label'   => __('Check to show search icon on header top bar', 'colorskin'),
                'section' => 'colorskin_top_search'
            ));
            
        /* Social Icons
        ---------------------------------------------------*/
        $wp_customize->add_section( 'colorskin_social_link_activate_settings', array(
            'priority' => 3,
            'title'    => __('Social links area', 'colorskin'),
            'panel'    => 'colorskin_top_bar'
        ));
            
            // Show Social icons
            $wp_customize->add_setting( 'colorskin_social_link_activate', array(
                'default'           => 0,
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'colorskin_sanitize_checkbox'
            ));
            $wp_customize->add_control( 'colorskin_social_link_activate', array(
                'type'    => 'checkbox',
                'label'   => __('Check to activate social links area', 'colorskin'),
                'section' => 'colorskin_social_link_activate_settings'
            ));
            
            $social_links = array(
                'social_facebook' => array(
                    'id'      => 'social_facebook',
                    'title'   => __('Facebook', 'colorskin'),
                    'default' => ''
                ),
                'social_twitter' => array(
                    'id'      => 'social_twitter',
                    'title'   => __('Twitter', 'colorskin'),
                    'default' => ''
                ),
                'social_googleplus' => array(
                    'id'      => 'social_googleplus',
                    'title'   => __('Google-Plus', 'colorskin'),
                    'default' => ''
                ),
            );
            
            $i = 20;
            foreach($social_links as $social_link) {
                
                $wp_customize->add_setting($social_link['id'], array(
                    'default'           => $social_link['default'],
                    'capability'        => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw'
                ));
                $wp_customize->add_control($social_link['id'], array(
                    'label'    => $social_link['title'],
                    'section'  => 'colorskin_social_link_activate_settings',
                    'settings' => $social_link['id'],
                    'priority' => $i
                ));
                
                $wp_customize->add_setting($social_link['id'].'_checkbox', array(
                    'default'           => 0,
                    'capability'        => 'edit_theme_options',
                    'sanitize_callback' => 'colorskin_sanitize_checkbox'
                ));
                $wp_customize->add_control($social_link['id'].'_checkbox', array(
                    'type'     => 'checkbox',
                    'label'    => __('Check to open in new window', 'colorskin'),
                    'section'  => 'colorskin_social_link_activate_settings',
                    'settings' => $social_link['id'].'_checkbox',
                    'priority' => $i
                ));
                
                $i++;
                
            }
    
}
add_action( 'customize_register', 'colorskin_customize_register' );

// Radio/Select sanitization
function colorskin_radio_sanitize( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}  

// Checkboxes
function colorskin_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// Dynamic styles
function colorskin_custom_styles($custom) {
    
	$custom = '';
    
	// Header style
	$sticky_menu = get_theme_mod( 'colorskin_sticky_header', 'sticky' );
	if ($sticky_menu == 'static') {
		$custom .= ".site-header { position: relative;}"."\n";
		$custom .= ".header-clone { display:none;}"."\n";
	}
    
	// Output styles
	wp_add_inline_style( 'colorskin-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'colorskin_custom_styles' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function colorskin_customize_preview_js() {
	wp_enqueue_script( 'colorskin_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'colorskin_customize_preview_js' );