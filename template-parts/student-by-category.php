<?php if ( have_posts() ) : ?>

<header class="page-header">
    <div id="site-header-banner">
        <img class="alignfull" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        <h1 class="banner-title highlight-green"><?php single_term_title(); echo " Students"; ?></h1>
    </div> 
</header><!-- .page-header -->


<div class='student-grid-container'>
    <?php
    while ( have_posts() ) :
        the_post(); ?>
    <div class="student-one" >
        <a href="<?php echo get_permalink(); ?>">
        <h2><span class="highlight-yellow"><?php echo get_the_title(); ?></span></h2>    
        <?php the_post_thumbnail('medium'); ?></a>
        <?php  the_excerpt();

        if (function_exists('get_field')) :
            if (get_field('birthday_date_picker')) : ?>
            <p><strong>Birthday: </strong><?php the_field('birthday_date_picker'); ?></p>
            <?php endif;
            // ** Social Media Links ... Reference
            if (get_field('social_media_link')) : ?>
            <a class="social-meida-link" href = "<?php the_field('social_media_link');?>" target="_blank">⚡️ Instagram</a>
            <?php endif;
        endif; ?>
    </div>
    <?php endwhile; ?>
</div>
<?php the_posts_navigation();
else :
get_template_part( 'template-parts/content', 'none' );
endif;
?>
