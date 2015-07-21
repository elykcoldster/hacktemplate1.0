<?php function construct_description ($posts) {
	$i = 0;
	foreach ($posts as $post) { ?>
		<?php $id = $post->ID; ?>
		<?php echo '<div class="istar-panel" id="post-' . $id . '">';?>
			<?php if ($post-> post_title == 'Research') : ?>
				<?php echo '<h1 class="title"><div class = "large">' . $post -> post_title . '</div></h1>'; ?>
			<?php else : ?>
				<?php echo '<h2 class="title">' . $post -> post_title . '</h2>'; ?>
			<?php endif; ?>
			<?php echo $post -> post_content; ?>
		</div>
		<?php if ($i % 2 == 1) {
			// add background-color to every other block of text
			echo '<script type="text/javascript">$("#post-' . $id . '").addClass("bgc")</script>';
		}?>
		<?php $i += 1; ?>
	<?php
	}?>
<?php
} ?>