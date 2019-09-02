<?php

/**
 * The template for displaying the home page
 *
 * This is the template that displays all pages by default.
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		while (have_posts()) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );

			echo "<h1>Any Post???</h1>";
		endwhile; // End of the loop.
		?>

		<section class="intro">
		</section>
		
		<section class="front-slider">
		<?php 
		// ** Gallery Image Slider
		$images = get_field('image_slider');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)

		if( $images ): ?>
		<div class="slider slick-slider">
			<?php foreach( $images as $image ): ?>
			<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		</section>

		<?php
		// TODO - On the home page, show the title and featured image of the 3 most recent blog posts. Make each item clickable to open a modal window that shows the title and content which is pulled in using the WordPress REST API. Use the following example or create it yourself.

		?>
		<div id="modal-window" class="modal-window">
			<button id="close-modal" class="close-modal">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<title><?php _e( 'Close' ); ?></title>
					<path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"></path>
				</svg>
			</button>
			<div id="modal-window-content"></div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
