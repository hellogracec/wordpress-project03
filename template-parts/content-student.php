<?php
/**
 * Template part for displaying single posts | student
 *
 * @package Mindset
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

		<div class="entry-meta">
			<?php wordpress_project_03_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		the_post_thumbnail('student-featured');
		// ** To retrieve only text from the_content  
		echo '<p>' . wp_strip_all_tags( get_the_content() ) . '</p>';
		?>

		<?php
		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'wordpress_project_03'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .entry-content -->
	<?php
	// ** Show birthday_date_picker ACF
	if (function_exists('get_field')) :
		if (get_field('birthday_date_picker')) :
			echo "<p><strong>Birthday: </strong>";
			the_field('birthday_date_picker');
			echo "</p>";
		endif;
	endif;

	// TODO  - (Optional) Links to other students in their taxonomy term using get_the_terms() 
	
	// ** Add Taxonomy template to template
	if ( 'pjt-student' === get_post_type() )  {
		echo get_the_term_list(
			$post->ID, 
			'pjt-student-category', 
			'Specialty: '
		);

		// ** Add Taxology Category
		$args = array(
			'post_type' 	  => 'pjt-student',
			'posts_per_page'  => -1,
			'orderby'         => 'title',
			'order'           => 'ASC',
			'tax_query' 	  => array(
				array(
					'taxonomy' => 'pjt-student-category', 
					'field'	   => 'slug',
					'terms'    => get_the_term_list($post->ID, 'pjt-student-category')
				)
			)
		);

		$featured_work = new WP_Query( $args );
		if ( $featured_work->have_posts() ){
			echo '<h3>Meet Other '. get_the_term_list($post->ID, 'pjt-student-category') . ' Students: </h3>'; 
			while ( $featured_work -> have_posts() ){
				$featured_work -> the_post();
				echo "<p>";
				echo '<a href="'; 
				the_permalink();
				echo '">';
				the_title();			
				echo '</a>';
				echo "</p>";
			}
			wp_reset_postdata();
		}

		}
	?>

	
	<footer class="entry-footer">
		<?php wordpress_project_03_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->