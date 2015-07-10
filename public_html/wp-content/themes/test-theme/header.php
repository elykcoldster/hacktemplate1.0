<!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>
<![endif]-->
<!--[if !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	global $page, $paged;
	wp_title('|', true, 'right');
	bloginfo('name');
	if ($site_description && (is_home() || is_front_page()))
		echo " | $site_description";
	if ($paged >= 2 || $page >= 2)
		echo ' | ' . sprintf(__('Page %s', 'test-theme'), max($paged, $page));
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
     <header id="masthead" class="site-header" role="banner">
        <hgroup>
		    <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
      	<nav role="navigation" class="site-navigation main-navigation"></nav><!-- .site-navigation .main-navigation -->
      	<h1 class="assistive-text"><?php _e( 'Menu', 'test-theme' ); ?></h1>
		<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', '_s' ); ?>"><?php _e( 'Skip to content', 'test-theme' ); ?></a></div>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

     </header><!-- #masthead .site-header -->
     
     <div id="main" class="site-main">