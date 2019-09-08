<?php
/**
 * The template for displaying Schedule Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wordpress_project_03
 */

get_header();
?>

	<div id="primary" class="site-content">
		<main id="main" class="site-main">

		<header class="page-header">
            <div id="site-header-banner">
                <img class="alignfull" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<h1 class="banner-title highlight-green">Schedule</h1>
            </div>
		</header><!-- .page-header -->

		<?php if( have_rows('schedule') ): ?>

		<ul class="slides">

		<?php while( have_rows('schedule') ): the_row(); 
			// vars
			$date = get_sub_field('date');
			$course = get_sub_field('course');
			$instructor = get_sub_field('instructor');
			?>
			<li class="slide">
				<?php 
				echo $date . ' | ';  
				echo 'Course: ' . $course . ' | '; 
				echo 'Instructor: ' . $instructor; 
				?>
			</li>
		<?php endwhile; ?>

		</ul>

<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
