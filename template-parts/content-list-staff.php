<?php
/**
 * Template part for displaying single posts | staff list
 *
 * @package Mindset
 */



        // ** Add Taxology Category

        $taxonomy = 'pjt-staff-type';
        $terms = get_terms(
            array(
                'taxonomy' => $taxonomy
            )
        );

        if( $terms && ! is_wp_error( $terms )) {
            echo '<section class="widget">';
            foreach($terms as $term) {
                echo "<h1>";
                echo $term->name;
                echo "</h1>";

                // ** Archive-ms-partner-links 
                // ** $term->slug is updating by looping
                $args = array(
                    'post_type' 	  => 'pjt-staff',
                    'posts_per_page'  => -1,
                    'tax_query' 	  => array(
                        array(
                            'taxonomy' => 'pjt-staff-type', 
                            'field'	   => 'slug',
                            'terms'	   => $term->slug
                        )
                    )
                );
                
                $partnerType = new WP_Query( $args );

                if ( $partnerType -> have_posts() ) {
                    while ( $partnerType -> have_posts() ){
                        $partnerType -> the_post();
                        echo '<h2>';
                        the_title();
                        echo '</h2>';
                        the_post_thumbnail('thumbnail');
                        // ** To retrieve only text from the_content
                        echo '<p>';
                        echo wp_strip_all_tags( get_the_content() );
                        echo '</p>';

                        // ** Show ACF 
                        if($term->name === 'Faculty' && function_exists('get_field')){
                            if (get_field('courses')) {
                                echo "<p>Courses: ";
                                the_field('courses');
                                echo "</p>";
                            }
                            if (get_field('url_links')) {
                                echo '<a href = "';
                                the_field('url_links');
                                echo '" target="_blank">';
                                echo "Instructor Website";
                                echo '</a>';
                            }
                        }
                    }
                    wp_reset_postdata();
                }
            }
            echo '</section>';
        }
?>
