<?php
/**
 * Template part for displaying single posts | work
 *
 * @package Mindset
 */

// ** Add Taxology Category
$terms = get_terms( 
	array(
	'taxonomy' => 'pjt-student-category'
	) 
);

if( $terms && ! is_wp_error( $terms )) {
	echo '<section class="widget">';


		// ** Archive-ms-work-category 
		// ** by term slug (designer, developer)
		$args = array(
			'post_type' 	  => 'pjt-student',
            'posts_per_page'  => -1,
            'orderby'         => 'title',
            'order'           => 'ASC'
		 );
		 
		 $student = new WP_Query( $args );

		 if ( $student -> have_posts() ) {
			echo "<div class='student-grid-container'>";
			 while ( $student -> have_posts() ){
                $student -> the_post();
                echo '<div class="student-one" >';
                echo "<h2>";
				echo '<a href = "' . get_permalink() . '">';
                the_title();
                echo '</a>';
                echo "</h2>";
                // the_content();
                the_post_thumbnail('medium');
                echo "<p>";
                the_excerpt();
				echo "</p>";
				echo get_the_term_list( 
					$post->ID, 
					'pjt-student-category', 
					'Specialty: '
				); 
                echo '</div>';
			 }
			 echo "</div>";
			 wp_reset_postdata();
		 }
	
	echo '</section>';
}
?>