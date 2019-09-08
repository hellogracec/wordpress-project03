<?php

/**
 * The template for displaying archive pages | pjt-student
 */

get_header();
?>

<div id="primary" class="site-content">
	<main id="main" class="site-main">

		<header class="page-header">
            <div id="site-header-banner">
                <img class="alignfull" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<h1 class="banner-title highlight-green">Our Staff</h1>
            </div>
		</header><!-- .page-header -->

        <?php 
            get_template_part('template-parts/content', 'list-staff');

        ?>


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
