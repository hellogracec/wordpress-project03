<?php
/**
 * Template part for displaying single posts | student
 *
 * @package Mindset
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
		<div id="site-header-banner">
			<img class="alignfull" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			<h1 class="banner-title highlight-green"><?php the_title(); ?></h1>
		</div> 
	</header><!-- .page-header -->

	<div class="entry-content">
		<?php 
		the_post_thumbnail('student-featured');
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

		// ** Social Media Links ... Reference
		if (function_exists('get_field')) :
			if (get_field('social_media_link')) : ?>
			<p><a class="social-meida-link" href = "<?php the_field('social_media_link'); ?>" target="_blank">Instagram</a></p>
			<?php endif;
		endif; 
		?>
	</div><!-- .entry-content -->
	<div class="related-students">
	<?php 
	$terms = get_the_terms( get_the_ID(), 'pjt-student-category');

	// ** Links to other students in their taxonomy term using get_the_terms() 
	$exclude_ids = array( get_The_ID() );

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
			<h3><span class="highlight-green">Meet Other <?php echo $term->name; ?> Students</span></h3>
			<?php 
			while ( $others -> have_posts() ){
				$others -> the_post(); ?>
				<p><a href=" <?php the_permalink(); ?> "><?php the_title(); ?></a></p>
			<?php }
			wp_reset_postdata();
		}
	}
	?>
	</div>
	
	<footer class="entry-footer">
		<?php wordpress_project_03_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->