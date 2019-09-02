<?php

/**
 * The template for displaying archive pages | pjt-student
 */

get_header();
?>

<div id="primary" class="site-content">
	<main id="main" class="site-main">

		<header class="page-header">
            <h1>The Class</h1>
		</header><!-- .page-header -->

        <?php 
            get_template_part('template-parts/content', 'list-student');
        ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
