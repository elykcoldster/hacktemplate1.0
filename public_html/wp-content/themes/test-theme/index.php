<?php get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content">
	<?php if (have_posts()) : ?>
		<?php theme_content_nav( 'nav-above' ); ?>
    	<?php while (have_posts()) : the_post() ?>
    		<?php get_template_part('content-aside', get_post_format()); ?>
    	<?php endwhile; ?>
    	<?php theme_content_nav( 'nav-below' ); ?>
    <?php else : ?>
    		<?php get_template_part('no-results', 'index'); ?>
    <?php endif; ?>
    </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>