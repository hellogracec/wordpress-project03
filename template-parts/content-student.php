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
	if ( 'pjt-student' === get_post_type() )  {
		echo get_the_term_list(
			$post->ID, 
			'pjt-student-category', 
			'Specialty: '
		);

	
		$terms = get_the_terms( get_the_ID(), 'pjt-student-category');

		// ** Links to other students in their taxonomy term using get_the_terms() 
		$exclude_ids = array( get_The_ID() );

		echo "<h1>" . $current_post . "</h1>";

		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$args = array(
					'post_type' 	  => 'pjt-student',
					'posts_per_page'  => -1,
					'orderby'         => 'title',
					'order'           => 'ASC',
					'post__not_in'	  => $exclude_ids,
					'tax_query' 	  => array(
						array(
							'taxonomy' => 'pjt-student-category',
							'field'	   => 'slug',
							'terms'    => $term->name
						)
					)
				);

				$others = new WP_Query( $args );
				?>
				<h3>Meet Other <?php echo $term->name; ?> Students: </h3>
				<?php 
				while ( $others -> have_posts() ){
					$others -> the_post(); ?>
					<p><a href=" <?php the_permalink(); ?> "><?php the_title(); ?></a></p>
				<?php }
				wp_reset_postdata();
			}
		}
		}
	?>

	
	<footer class="entry-footer">
		<?php wordpress_project_03_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->