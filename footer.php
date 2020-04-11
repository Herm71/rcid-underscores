<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Empire_Cities_Direct
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer wrap">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'empire-cities-direct' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'empire-cities-direct' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'empire-cities-direct' ), 'empire-cities-direct', '<a href="http://@Herm71">Jason Chafin</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
