<?php if ( have_posts() ) : ?>

<header class="page-header">
<h1><?php single_term_title(); echo " Students"; ?></h1>
</header><!-- .page-header -->

<?php
/* Start the Loop */
while ( have_posts() ) :
    the_post();

    echo '<article>';
    echo '<a href="' . get_permalink() . '">';
    echo '<h2>' . get_the_title() . '</h2>';
    the_post_thumbnail('medium');
    echo '</a>';
    echo '<p>';
    // ** To retrieve only text from the_content
    echo wp_strip_all_tags( get_the_content() );
    echo '</p>';
    echo '</article>';
    
    // ** Show birthday_date_picker ACF
	if (function_exists('get_field')) :
		if (get_field('birthday_date_picker')) :
			echo "<p><strong>Birthday: </strong>";
			the_field('birthday_date_picker');
			echo "</p>";
		endif;
	endif;


endwhile;

the_posts_navigation();

else :

get_template_part( 'template-parts/content', 'none' );

endif;
?>
