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

<div id="primary">
	<main id="main" class="site-main">

	<header class="page-header">
		<div id="site-header-banner">
			<img class="alignfull" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			<h1 class="banner-title highlight-green">Schedule</h1>
		</div>
	</header><!-- .page-header -->

	<?php if( have_rows('schedule') ): ?>

	<table class="schedule-table">
	<thead>
		<tr>
			<th>Date</th>
			<th>Course</th>
			<th>Instructor</th>
		</tr>
	</thead>
	<tbody>
		<?php while( have_rows('schedule') ): the_row(); 
		// vars
		$date = get_sub_field('date');
		$course = get_sub_field('course');
		$instructors = get_sub_field('instructor');
		?>
		<tr class="one-day">
			<td><?php echo $date ?></td>
			<td><?php echo $course ?></td>
			<td><?php 
			if( $instructors ): ?>
			<ul>
				<?php foreach( $instructors as $instructor ): ?>
					<li><?php echo $instructor; ?></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
			</td>
		</tr>
		<?php endwhile; ?>
	</tbody>
	</table>

<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
