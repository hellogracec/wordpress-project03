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
		?>
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wordpress_project_03' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wordpress_project_03' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php

	// TODO  - (Optional) Links to other students in their taxonomy term using get_the_terms() 
	// $term_obj_list = get_the_terms( $post->ID, 'pjt-student-category' );
	// $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
	// echo $terms_string;

	// ** Add Taxonomy template to template
	if ( 'pjt-student' === get_post_type() )  {
		echo get_the_term_list(
			$post->ID, 
			'pjt-student-category', 
			'Specialty: '
		);

		$the_category = get_the_term_list($post->ID, 'pjt-student-category');
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
					'terms'    => $the_category
				)
			)
		);

		$featured_work = new WP_Query( $args );
		print_r($featured_work);
		if ( $featured_work->have_posts() ){
			echo '<h3>Meet Other '. $the_category . ' Students: </h3>'; 
			// TODO Only other names.. not the current student name
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