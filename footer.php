<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ruth_Chafin_Interior_Design
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer wrap">
  <div class="wrap">
    <div class="footer-widgets">
      <div class=footer-widget-1></div>
      <div class=footer-widget-2></div>
      <div class=footer-widget-3></div>
    </div>
  </div>
  <div class="site-info">
    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ruth-chafin-interior-design' ) ); ?>">
      <?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'ruth-chafin-interior-design' ), 'WordPress' );
				?>
    </a>
    <span class="sep"> | </span>
    <?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'ruth-chafin-interior-design' ), 'ruth-chafin-interior-design', '<a href="http://@Herm71">Jason Chafin</a>' );
				?>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>