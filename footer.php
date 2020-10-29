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

  <div class="footer-widgets">
    <div class=footer-widget-1>
      <?php if ( is_active_sidebar( 'footer-one' ) ) { ?>
      <?php dynamic_sidebar('footer-one'); ?>
      <?php } ?>
    </div>
    <div class=footer-widget-2>
      <?php if ( is_active_sidebar( 'footer-two' ) ) { ?>
      <?php dynamic_sidebar('footer-two'); ?>
      <?php } ?>
    </div>
    <div class=footer-widget-3>
      <?php if ( is_active_sidebar( 'footer-three' ) ) { ?>
      <?php dynamic_sidebar('footer-three'); ?>
      <?php } ?>
    </div>
  </div>
  <!-- //TODO #10 USE ACF for this content -->
  <div class="site-info">
    <div class="address-social">
      <div class="address-social-left">
        <ul class="rcid-address">
          <li>Ruth Chafin Interior Design</li>
          <li>CL# 123456789</li>
          <li>721 Nevada St, Redlands, CA, 92373</li>
          <li>(909) 796-9422</li>
        </ul>
      </div>
      <div class="address-social-right">
        <ul class="social">
          <li>facebook</li>
          <li>instagram</li>
          <li>twitter</li>
          <li>linked-in</li>
          <li>houzz</li>
        </ul>
      </div>
    </div>
    <div class="copyright"><span>Copyright © 2011&ndash;<?php echo date("Y");?></span></div>
  </div>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>