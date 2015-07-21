<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 */
?>

<?php
include ('research_functions.php'); ?>
	
	<div id="content" class="site-content" role="main">
		<div class="istar-wrapper">	
			<div id="research-carousel" class="content-area">
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
			<div class="bgc" id="news-papers">
				<ul id="news-papers-horizontal">
					<li class="istar-panel" id="istar-panel-left">
						<h2>Recent News</h2>
					</li>
					<li class="istar-panel" id="istar-panel-right">
						<h2>Recent Papers and Talks</h2>
					</li>
				</ul>
			</div>
			<div class="bgc" id="about">
				<div class="istar-panel">
					<h2>About I-STAR</h2>
					<p> 
					  The I-STAR Lab is a collaborative research endeavor based in the Department of Biomedical Engineering at Johns Hopkins University.
					  <a href="<?php echo get_home_url(); ?>/research/">Research</a> areas include: 
					</p>
					<ul>
					  <li>
					    <span class="research-area"> Imaging Physics</span>: Mathematical models of imaging performance in advanced modalities, including cone-beam CT and spectral / dual-energy imaging.
					  </li>
					  <li>
					    <span class="research-area"> 3D Image Reconstruction</span>: Advanced 3D image reconstruction based on statistical models of the imaging chain and prior information. 
					  </li>
					  <li>
					    <span class="research-area"> Novel Imaging Systems</span>: Preclinical prototypes translated from the laboratory to first application in diagnostic and interventional procedures. 
					  </li>
					  <li>
					    <span class="research-area">Image-Guided Interventions and Diagnostic Radiology</span>: High-precision interventional guidance systems (for surgery, interventional radiology, and radiation therapy) and new technologies for high-quality diagnostic imaging.
					  </li>
					</ul>
				</div>
			</div>
		</div><!-- wrapper -->
	</div><!-- #content -->