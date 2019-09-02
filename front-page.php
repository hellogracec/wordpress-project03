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

			get_template_part('template-parts/content', 'page');

		endwhile; // End of the loop.
		?>

		<section class="intro">
		</section>
		
		<section class="front-slider">
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
