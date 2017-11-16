<?php
/**
 * didi-lite Theme Customizer
 *
 * @package Didi Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function didi_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/***** Register Custom Controls *****/

	class Didi_Lite_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="didi-upgrade-thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</p>
			<p class="customize-control-title didi-upgrade-title">
				<?php esc_html_e('Didi Pro', 'didi-lite'); ?>
			</p>
			<p class="textfield didi-upgrade-text">
				<?php esc_html_e('Full version of this theme includes additional features; additional page templates, custom widgets, additional front page widgetized areas, different blog options, different theme options, WooCommerce support, color options & premium theme support.', 'didi-lite'); ?>
			</p>
			<p class="customize-control-title didi-upgrade-title">
				<?php esc_html_e('Additional Features:', 'didi-lite'); ?>
			</p>
			<ul class="didi-upgrade-features">
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Additional Page Templates', 'didi-lite'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Custom Widgets', 'didi-lite'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Several additional widget areas', 'didi-lite'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Different Blog Options & Layouts', 'didi-lite'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Different Theme Options', 'didi-lite'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('WooCommerce Support', 'didi-lite'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Color Options', 'didi-lite'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Premium Theme Support', 'didi-lite'); ?>
				</li>
			</ul>
			<p class="didi-upgrade-button">
				<a href="http://www.anarieldesign.com/themes/fashion-blog-wordpress-theme/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Read more about Didi', 'didi-lite'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('didi_lite_upgrade', array(
		'title' => esc_html__('Pro Features', 'didi-lite'),
		'priority' => 300
	) );

	/***** Add Settings *****/

	$wp_customize->add_setting('didi_lite_options[premium_version_upgrade]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	) );

	/***** Add Controls *****/

	$wp_customize->add_control(new Didi_Lite_Upgrade($wp_customize, 'premium_version_upgrade', array(
		'section' => 'didi_lite_upgrade',
		'settings' => 'didi_lite_options[premium_version_upgrade]',
		'priority' => 1
	) ) );
}
add_action( 'customize_register', 'didi_lite_customize_register' );

/**
 * Sanitization
 */
//Integers
function didi_lite_sanitize_int( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}
//Text
function didi_lite_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}
//Radio Buttons and Select Lists
function didi_lite_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function didi_lite_customize_preview_js() {
	wp_enqueue_script( 'didi_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20150908', true );
}
add_action( 'customize_preview_init', 'didi_lite_customize_preview_js' );
/***** Enqueue Customizer CSS *****/

function didi_lite_customizer_css() {
	wp_enqueue_style('didi-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'didi_lite_customizer_css');
