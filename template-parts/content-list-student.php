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

if( $terms && ! is_wp_error( $terms )) : ?>
<?php 
// TODO Search by Category ... 
foreach ( $terms as $term ) {	
	echo '<a href="' . get_term_link($term) . '">';
	echo $term->name;
	echo '</a>';
}
?>
<section class="widget">
<?php 
// ** Archive-ms-work-category 
// ** by term slug (designer, developer)
	$args = array(
		'post_type' 	  => 'pjt-student',
		'posts_per_page'  => -1,
		'orderby'         => 'title',
		'order'           => 'ASC'
		);
		
		$student = new WP_Query( $args );

		if ( $student -> have_posts() ) :?> 
		<div class='student-grid-container'>
			<?php 
			while ( $student -> have_posts() ) :
			$student -> the_post(); ?>
			<div class="student-one" >
				<h2>
					<span class='highlight-yellow'>
					<a href = "<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>
				</h2>
				<?php the_post_thumbnail('medium'); ?>
				<?php the_excerpt(); ?>
				<?php 

			if ( 'pjt-student' === get_post_type() )  {
				echo '<div class="specialty">' . get_the_term_list(
					$post->ID, 
					'pjt-student-category', 
					'Specialty: '
				) . '</div>'; 
			}
			// ** Social Media Links ... Reference
			if (function_exists('get_field')) :
				if (get_field('social_media_link')) : ?>
				<p><a class="social-meida-link" href = "<?php the_field('social_media_link'); ?>" target="_blank">Instagram</a></p>
				<?php endif;
			endif; 
	
			 ?>
			</div>
		<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); 
	 endif;?>

</section>
<?php endif;?>