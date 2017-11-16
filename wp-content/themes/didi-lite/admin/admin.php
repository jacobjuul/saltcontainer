<?php

if (!defined('ABSPATH')) {
	exit;
}

/***** Welcome Notice in WordPress Dashboard *****/

if (!function_exists('didi_lite_admin_notice')) {
	function didi_lite_admin_notice() {
		global $pagenow, $didi_lite_version;
		if (current_user_can('edit_theme_options') && 'index.php' === $pagenow && !get_option('didi_lite_notice_welcome') || current_user_can('edit_theme_options') && 'themes.php' === $pagenow && isset($_GET['activated']) && !get_option('didi_lite_notice_welcome')) {
			wp_enqueue_style('didi-lite-admin-notice', get_template_directory_uri() . '/admin/admin-notice.css', array(), $didi_lite_version);
			didi_lite_welcome_notice();
		}
	}
}
add_action('admin_notices', 'didi_lite_admin_notice');

/***** Hide Welcome Notice in WordPress Dashboard *****/

if (!function_exists('didi_lite_hide_notice')) {
	function didi_lite_hide_notice() {
		if (isset($_GET['didi-lite-hide-notice']) && isset($_GET['_didi_lite_notice_nonce'])) {
			if (!wp_verify_nonce($_GET['_didi_lite_notice_nonce'], 'didi_lite_hide_notices_nonce')) {
				wp_die(esc_html__('Action failed. Please refresh the page and retry.', 'didi-lite'));
			}
			if (!current_user_can('edit_theme_options')) {
				wp_die(esc_html__('You do not have the necessary permission to perform this action.', 'didi-lite'));
			}
			$hide_notice = sanitize_text_field($_GET['didi-lite-hide-notice']);
			update_option('didi_lite_notice_' . $hide_notice, 1);
		}
	}
}
add_action('wp_loaded', 'didi_lite_hide_notice');

/***** Content of Welcome Notice in WordPress Dashboard *****/

if (!function_exists('didi_lite_welcome_notice')) {
	function didi_lite_welcome_notice() {
		global $didi_lite_data; ?>
		<div class="notice notice-success didi-welcome-notice">
			<a class="notice-dismiss didi-welcome-notice-hide" href="<?php echo esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('didi-lite-hide-notice', 'welcome')), 'didi_lite_hide_notices_nonce', '_didi_lite_notice_nonce')); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__('Dismiss this notice.', 'didi-lite'); ?>
				</span>
			</a>
			<p><?php printf(esc_html__('Thanks for choosing Didi Lite! To get started please make sure you visit our %2$swelcome page%3$s.', 'didi-lite'), $didi_lite_data['Name'], '<a href="' . esc_url(admin_url('themes.php?page=blog')) . '">', '</a>'); ?></p>
			<p><?php printf(esc_html__('Didi Lite is proudly brought to you by Anariel Design. If you like the theme do us a favor and give it a 5-star rating on WordPress to help us spread the word.', 'didi-lite')); ?><a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/didi-lite?filter=5'); ?>">
				<?php esc_html_e('Rate This Theme', 'didi-lite'); ?></a></p>
			<p class="didi-welcome-notice-button">
				<a class="button" href="<?php echo esc_url(admin_url('themes.php?page=blog')); ?>">
					<?php printf(esc_html__('Get Started with Didi Lite', 'didi-lite'), $didi_lite_data['Name']); ?>
				</a>
				<a class="button-primary" href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/didi-lite?filter=5'); ?>">
					<?php printf(esc_html__('Rate This Theme', 'didi-lite'), $didi_lite_data['Name']); ?>
				</a>
			</p>
		</div><?php
	}
}

/***** Theme Info Page *****/

if (!function_exists('didi_lite_theme_info_page')) {
	function didi_lite_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Didi Lite', 'didi-lite'), esc_html__('Theme Info', 'didi-lite'), 'edit_theme_options', 'blog', 'didi_lite_display_theme_page');
	}
}
add_action('admin_menu', 'didi_lite_theme_info_page');

if (!function_exists('didi_lite_display_theme_page')) {
	function didi_lite_display_theme_page() {
		global $didi_lite_data; ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to Didi Lite', 'didi-lite')); ?>
			</h1>
			<div class="didi-row theme-intro clearfix">
				<div class="didi-col-1-4">
					<img class="theme-screenshot" src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'didi-lite'); ?>" />
				</div>
				<div class="didi-col-3-4 theme-description">
					<p class="about">
						<?php printf(esc_html__('Didi Lite is a modern responsive theme whose sole focus is to present your content in the best possible way on any screen size. Beautiful typography combined with clean layout draws and keeps readers attention to the most important, your content. Didi is a perfect match for fashion, lifestyle and magazine style sites.', 'didi-lite')); ?>
					</p>
				</div>
			</div>

			<hr>
			<div class="theme-links clearfix">
				<p>
					<strong><?php esc_html_e('Important Links:', 'didi-lite'); ?></strong>
					<a href="<?php echo esc_url('http://www.anarieldesign.com/free-fashion-wordpress-theme/'); ?>">
						<?php esc_html_e('Theme Info Page', 'didi-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/didi-lite'); ?>">
						<?php esc_html_e('Free Support Forum', 'didi-lite'); ?>
					</a>
					<a href="<?php echo esc_url('http://www.anarieldesign.com/support/'); ?>">
						<?php esc_html_e('Membership Support Center', 'didi-lite'); ?>
					</a>
					<a href="<?php echo esc_url('http://www.anarieldesign.com/showcase/'); ?>">
						<?php esc_html_e('Anariel Design Themes Showcase', 'didi-lite'); ?>
					</a>
				</p>
			</div>
			<hr>
			<div id="getting-started" class="bg">
				<h3>
					<?php printf(esc_html__('Get Started with %s', 'didi-lite'), $didi_lite_data['Name']); ?>
				</h3>
				<div class="didi-row clearfix">
					<div class="didi-col-1-2">
						<div class="section">
							<h4>
								<span class="dashicons dashicons-welcome-learn-more"></span>
								<?php esc_html_e('Theme Documentation', 'didi-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Please check the documentation to get better overview of how the theme is structured.', 'didi-lite'), $didi_lite_data['Name']); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/didilite/'); ?>" class="button button-secondary">
									<?php esc_html_e('Theme Documentation', 'didi-lite'); ?>
								</a>
								<a href="<?php echo esc_url('https://wordpress.org/support/theme/didi-lite'); ?>" class="button button-secondary">
									<?php esc_html_e('Support Forum', 'didi-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<span class="dashicons dashicons-admin-appearance"></span>
								<?php esc_html_e('Theme Options', 'didi-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Click "Customize" to open the Customizer.',  'didi-lite'), $didi_lite_data['Name']); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary">
									<?php esc_html_e('Customize Theme', 'didi-lite'); ?>
								</a>
							</p>
						</div>
					</div>
					<div class="didi-col-1-2">
						<div class="section">
							<h4>
								<span class="dashicons dashicons-cart"></span>
								<?php esc_html_e('Didi Pro', 'didi-lite'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('Full version of this theme includes additional features; additional page templates, custom widgets, additional front page widgetized areas, different blog options, different theme options, WooCommerce support, color options & premium theme support.', 'didi-lite'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/fashion-blog-wordpress-theme/'); ?>" class="button button-primary">
									<?php esc_html_e('Upgrade to Didi Pro', 'didi-lite'); ?>
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="theme-comparison">
				<h3 class="theme-comparison-intro">
					<?php esc_html_e('Upgrade to Didi for more awesome features:', 'didi-lite'); ?>
				</h3>
				<table>
					<thead class="theme-comparison-header">
						<tr>
							<th class="table-feature-title"><h3><?php esc_html_e('Features', 'didi-lite'); ?></h3></th>
							<th><h3><?php esc_html_e('Didi Lite', 'didi-lite'); ?></h3></th>
							<th><h3><?php esc_html_e('Didi', 'didi-lite'); ?></h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><h3><?php esc_html_e('Theme Price', 'didi-lite'); ?></h3></td>
							<td><?php esc_html_e('Free', 'didi-lite'); ?></td>
							<td>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/pricing/'); ?>">
									<?php esc_html_e('View Pricing', 'didi-lite'); ?>
								</a>
							</td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Responsive Layout', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Page Templates', 'didi-lite'); ?></h3></td>
							<td><?php esc_html_e('4', 'didi-lite'); ?></td>
							<td><?php esc_html_e('6', 'didi-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Front Page Widgetized Areas', 'didi-lite'); ?></h3></td>
							<td><?php esc_html_e('1', 'didi-lite'); ?></td>
							<td><?php esc_html_e('3', 'didi-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Menus', 'didi-lite'); ?></h3></td>
							<td><?php esc_html_e('1', 'didi-lite'); ?></td>
							<td><?php esc_html_e('2', 'didi-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Widgets', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Different Blog Layouts', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Different Theme Options', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Different Blog Options', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Premium Slider', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('WooCommerce Support', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Plugins', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Color Options', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Extended Features', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Support', 'didi-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><?php esc_html_e('Help Desk Ticketing System', 'didi-lite'); ?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/fashion-blog-wordpress-theme/'); ?>" class="upgrade-button">
									<?php esc_html_e('Upgrade to Didi Pro', 'didi-lite'); ?>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>
			<div class="section bg1">
				<h3>
					<?php esc_html_e('More Themes by Anariel Design', 'didi-lite'); ?>
				</h3>
				<p class="about">
					<?php printf(esc_html__('Build Your Dream WordPress Site with Premium Niche Themes for Bloggers & Charities',  'didi-lite'), $didi_lite_data['Name']); ?>
				</p>
				<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/anarieldesign-themes.jpg" alt="<?php esc_html_e('Theme Screenshot', 'didi-lite'); ?>" /></a>
				<p>
					<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>" class="button button-primary advertising">
						<?php esc_html_e('More Themes', 'didi-lite'); ?>
					</a>
				</p>
			</div>
			<hr>
			<div id="theme-author">
				<p>
					<?php printf(esc_html__('%1$1s is proudly brought to you by %2$2s. If you like %3$3s: %4$4s.', 'didi-lite'), $didi_lite_data['Name'], '<a href="http://www.anarieldesign.com/" title="Anariel Design Themes">Anariel Design Themes</a>', $didi_lite_data['Name'], '<a href="https://wordpress.org/support/view/theme-reviews/didi-lite?filter=5" title="Didi Lite Review">' . esc_html__('Rate this theme', 'didi-lite') . '</a>'); ?>
				</p>
			</div>
		</div><?php
	}
}

?>