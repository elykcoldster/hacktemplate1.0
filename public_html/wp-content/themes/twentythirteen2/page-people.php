<?php
include ('research_functions.php');
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<div id="people-header">I-STARs</div>
			<div class="istar-wrapper" id="people-wrapper">
			<?php
			$args = array(
				'post_type' => 'page',
				'orderby' => 'menu_order',
				'order' => 'ASC',
			);
			$groupcount = 0;
			group_query ($args, $groupcount);
			?>
			<script type="text/javascript">
				$(".person-popup").hide();
				$(".person-popup").prependTo("#page"); // immune to bad z-index effects
			</script>
			</div></div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

?>