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
        ); ?>

        <section class="widget staff">
        <?php if( $terms && ! is_wp_error( $terms )) {
            foreach($terms as $term) { ?>
                <div class="staff-category">
                <h1><span class="highlight-green"><?php echo $term->name; ?></span></h1>
                <?php 
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
                        $partnerType -> the_post();?>
                        <h2><span class="highlight-yellow"><?php the_title(); ?></span></h2>
                        <div class="staff-container">
                            <?php the_post_thumbnail('large'); ?>
                            <div class="staff-content">
                                <p><?php echo wp_strip_all_tags( get_the_content() ); ?></p>

                                <?php if($term->name === 'Faculty' && function_exists('get_field')){ ?>
                                <?php if (get_field('courses')) { ?>
                               <div class="faculty-more">
                                <p>Courses: <?php the_field('courses'); ?></p>
                                <?php }
                                if (get_field('url_links')) { ?>
                                <p><a href = "<?php the_field('url_links'); ?>" target="_blank">🐾 Instructor Website</a></p>
                                </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    <?php }
                    wp_reset_postdata();
                } ?>
                </div>
            <?php }
        }
        ?>
    </section>
