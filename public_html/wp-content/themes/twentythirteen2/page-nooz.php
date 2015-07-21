<?php
include ('research_functions.php');
get_sidebar('nooz');
get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<div id="news-header">I-STAR News</div>
			<div class="istar-wrapper" id="news-wrapper">
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			$args = array(
				'category_name' => 'uncategorized', // uncat = news post
				'posts_per_page' => '5',
				'paged' => $paged,
			);
			$query = new WP_Query($args);
			$page_args = array (
				'format' => '?paged=%#%',
				'current' => max(1, get_query_var('paged')),
				'next_text' => 'Next',
				'prev_text' => 'Previous',
				'total' => $query->max_num_pages,
			);
			?>
			<div class="page_nav">
				<?php echo paginate_links($page_args); ?>
			</div>
			<?php
			// Da roop
			if ($query->have_posts()) {
				while ($query->have_posts()) : $query->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" class="news-post">
						<header class="news-header">
							<h1 class="news-title"><?php the_title(); ?></h1>
							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="news-img">
								<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_post()->ID)); ?>
								<img src="<?php echo $feat_image; ?>">
							</div>
							<?php endif; ?>

						</header><!-- .entry-header -->
						<div class="news-content">
							<?php the_content(); ?>
						</div>
					</article>
				<?php
				endwhile;
			}
			?>
				<div class="page_nav">
					<?php echo paginate_links($page_args); ?>
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_footer('nooz');

?>