<?php
include ('research_functions.php');
get_header(); ?>

	<div id="primary" class="content-area">
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
				construct_owl_carousel($desc_index);
				construct_description($posts);
			endif; ?>

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

?>