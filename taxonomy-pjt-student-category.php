<?php
/**
 * Taxonomy pjt-student-category-designer modified from archive.php
 */

get_header();
?>


<div id="primary" class="content-area">
	<main id="main" class="site-main">
			
		<?php get_template_part('template-parts/student', 'by-category'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
