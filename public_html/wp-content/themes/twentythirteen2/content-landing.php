<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 */
?>

<?php
include ('research_functions.php'); ?>
	<div id="research-carousel" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="istar-wrapper">
			<?php
			$args = array(
				'category_name' => 'research-post',
				'meta_key' => 'post-order',
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
			);
			$query = new WP_Query( $args );
			if ($query -> have_posts()) :
				$posts = array();
				while ( $query->have_posts()) :
					$query->the_post();
					$post = get_post();
					$posts[] = $post;
				endwhile;
				$desc_index = get_post_ids($posts, 'research');
				construct_owl_carousel($desc_index, 'research/');
			endif; ?>

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->