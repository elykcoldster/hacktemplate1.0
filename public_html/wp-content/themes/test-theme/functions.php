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

function theme_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

if ( ! function_exists( 'theme_posted_on' ) ) :

function theme_posted_on() {
    printf( __( 'Posted on <a href="%1$s" title="%2$s"rel="bookmark">
    		<time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>
    		<span class="byline"> by <span class="author vcard">
    		<a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'test-theme' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'shape' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );
}
endif;
 
function theme_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
        // Create an array of all the categories that are attached to posts
        $all_the_cool_cats = get_categories( array(
            'hide_empty' => 1,
        ) );
 
        // Count the number of categories that are attached to the posts
        $all_the_cool_cats = count( $all_the_cool_cats );
 
        set_transient( 'all_the_cool_cats', $all_the_cool_cats );
    }
 
    if ( '1' != $all_the_cool_cats ) {
        // This blog has more than 1 category so shape_categorized_blog should return true
        return true;
    } else {
        // This blog has only 1 category so shape_categorized_blog should return false
        return false;
    }
}
 
function theme_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'theme_category_transient_flusher' );
add_action( 'save_post', 'theme_category_transient_flusher' );