<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

?>
<div class="istar-sidebar" id="istar-sidebar">
	<h2>Archive</h2>
	<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
</div><!-- .widget-area -->