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
<div class="choose-specialty">
	<?php foreach ( $terms as $term ) { ?>
	<h1 class='highlight-green'><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></h1>
	<?php } ?>
</div>
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
				<a href = "<?php echo get_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
				<?php the_excerpt(); ?>
				<div class="specialty">
					<?php 
					if ( 'pjt-student' === get_post_type() )  {
						echo "<p>" . get_the_term_list(
							$post->ID, 
							'pjt-student-category', 
							'Specialty: '
						) . "</p>"; 
					}
					// ** Social Media Links ... Reference
					if (function_exists('get_field')) :
						if (get_field('social_media_link')) : ?>
						<p><a class="social-meida-link" href = "<?php the_field('social_media_link'); ?>" target="_blank">️⚡️ Instagram</a></p>
						<?php endif;
					endif; 
					?>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); 
	 endif;?>

</section>
<?php endif;?>