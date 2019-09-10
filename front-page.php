<?php

/**
 * The template for displaying the home page
 *
 * This is the template that displays all pages by default.
 */

get_header();
?>
<div id="primary" class="home content-area">
	<div class="front-slider">
		<?php 
		// ** Gallery Image Slider
		$images = get_field('image_slider');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)`

		if( $images ): ?>
		<div class="slider slick-slider alignfull">
			<?php foreach( $images as $image ): ?>
			<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<h1 class="banner-title highlight-green">Empowering dogs</h1>
	</div>
	<!-- End of Slider -->
	<main id="main" class="site-main">
		<section class="intro">
			<?php
			$args = array('page_id' => 6); 
			$intro_query = new WP_Query($args);

			if ($intro_query->have_posts()) :
				while ($intro_query->have_posts()) :
					$intro_query->the_post(); ?>
					<h1><span class="highlight-green"><?php the_title(); ?></span></h1>
					<?php the_content();
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</section>
		<!-- End of Intro -->
		<section class="who">
			<?php if (function_exists('get_field')) {
				$field = get_field_object('who_we_are');
				if ( $field ) { ?>
					<h2 class="highlight-yellow"><?php echo $field[ 'label' ]; ?></h2>
					<p><?php echo $field[ 'value' ]; ?></p>
				<?php }
			}?>	
		</section>
		<!-- End of who we are -->
		<section class="what">
			<?php if (function_exists('get_field')) {
				$field = get_field_object('what_we_offer');
				if ( $field ) { ?>
					<h2 class="highlight-yellow"><?php echo $field[ 'label' ]; ?></h2>
					<p><?php echo $field[ 'value' ]; ?></p>
				<?php }
			}?>	
		</section>
		<!-- End of what we offer -->
		<section class="banner">
			<?php if (function_exists('get_field')) {
			$image = get_field('banner');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			?>
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			<?php }	?>		
		</section>
		<!-- End of banner image -->
		<section class="featured-student">
			<?php
			$post_object = get_field('featured_student');
			if( $post_object ): 
				// override $post
				$post = $post_object;
				setup_postdata( $post ); 
				?>
				<h2 class="highlight-yellow">Meet <?php the_title(); ?></h2>
				<div class="student-content">
					<a href="<?php the_permalink(); ?>">
						<span><?php the_post_thumbnail('thumbnail'); ?></span>
					</a>
					<span><?php the_excerpt(); ?>
					<h4 class="highlight-green students-link"><a href="<?php echo get_post_type_archive_link( 'pjt-student' ); ?>">Link to all student page</a></h4>
					</span>
				</div>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
		</section>
		<!-- End of Featured Student -->
		<section class="recent-posts">
			<!-- Define our WP Query Parameters -->
			<h2 class="highlight-yellow">Recet Blog Posts</h2>
			<div class="posts-container">
				<?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
				<!-- Start our WP Query -->
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
				<!-- Display the Post Title with Hyperlink -->
				<a href="<?php the_permalink() ?>" class="open-modal" data-id="<?php echo get_the_ID(); ?>"><h3><?php the_title(); ?></h3><?php the_post_thumbnail('medium'); ?></a>
				<!-- Repeat the process and reset once it hits the limit -->
				<?php 
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<div id="modal-window" class="modal-window">
				<button id="close-modal" class="close-modal">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<title><?php _e( 'Close' ); ?></title>
						<path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"></path>
					</svg>
				</button>
				<div id="modal-window-content"></div>
			</div>
		</section>
		<!-- End of Recent Posts -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
