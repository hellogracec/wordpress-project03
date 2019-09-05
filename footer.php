<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wordpress_project_03
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
		<div class="site-info">
			<p>Location: 555 Seymour St. Vancouver, BC</p>
			<p>Phone: 000.000.0909</p>
			<p>email: info@hellogracecho.com</p>
			<p>Hours: Monday - Friday, 9:00AM - 5:00PM</p>
		</div>
		<div class="site-map">
			<div class="site-map-title">Site Map</div>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</div>
		<div class="site-footer-info">
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			// printf( esc_html__( '%1$s | %2$s.', 'wordpress_project_03' ), 'BCIT Education Purpose Only', '<a href="https://hellogracecho.com">&copy; 2019 Grace Cho</a>' );
			echo '<a href="https://hellogracecho.com">&copy; 2019 Grace Cho</a>';

			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php get_template_part( 'template-parts/scroll', 'to-top' );
 ?>
<div id="dimmer"></div>

</body>
</html>
