<?php
include ('research_functions.php');
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			

			<div class="istar-wrapper">
			<?php
			$args = array(
				'post_type' => 'page',
				'orderby' => 'menu_order',
				'order' => 'ASC',
			);
			group_query ($args);
			?>

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

?>