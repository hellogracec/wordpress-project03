<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wordpress_project_03
 */

get_header();
?>

	<div id="primary" class="site-content">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();


			get_template_part('template-parts/content', 'student');
						
			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
