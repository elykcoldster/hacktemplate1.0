<?php
/**
 * Test Theme functions and definitions
 *
 * @package test-theme
 * @since test-theme 1.0
 */

if (!isset ($content_width))
	$content_width = 640;

if (!function_exists('theme_setup')) :
function theme_setup() {
	require (get_template_directory() . '/inc/template-tags.php');
	require (get_template_directory() . '/inc/tweaks.php');
	load_theme_textdomain('test-theme', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array ('aside'));
	register_nav_menus (array (
		'primary' => __('Primary Menu', 'test-theme'),
	));
}
endif;
add_action('after_setup_theme', 'theme_setup');