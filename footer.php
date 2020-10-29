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

      </div>
      <div class="address-social-right">


        <?php
$rows = get_field('social_media_property', 'option');

if ($rows) {
              echo '<ul class="social">';
              foreach ($rows as $row) {
                  if ($row['social_media_site'] == 'Facebook') :
                      $iconClass = "fa-facebook";
                  elseif ($row['social_media_site'] == 'Twitter') :
                          $iconClass = "fa-twitter";
                  elseif ($row['social_media_site'] == 'Instagram') :
                          $iconClass = "fa-instagram";
                  elseif ($row['social_media_site'] == 'Pinterest') :
                          $iconClass = "fa-pinterest-p";
                  elseif ($row['social_media_site'] == 'LinkedIn') :
                          $iconClass = "fa-linkedin";
                  elseif ($row['social_media_site'] == 'YouTube') :
                          $iconClass = "fa-youtube-play";
                  elseif ($row['social_media_site'] == 'Vimeo') :
                          $iconClass = "fa-vimeo";
                  elseif ($row['social_media_site'] == 'Flickr') :
                          $iconClass = "fa-flickr";
                  elseif ($row['social_media_site'] == 'Medium') :
                          $iconClass = "fa-medium";
                  elseif ($row['social_media_site'] == 'Tumblr') :
                          $iconClass = "fa-tumblr";
                  elseif ($row['social_media_site'] == 'Snapchat') :
                          $iconClass = "fa-snapchat-ghost";
                  elseif ($row['social_media_site'] == 'Houzz') :
                          $iconClass = "fa-houzz";
                  elseif ($row['social_media_site'] == 'Choose one') :
                          $iconClass = "";
                  endif; 
                  echo '<li><a href="'.$row['social_media_link'].'" title="'.$row['social_media_site'].'"><i class="fab '.$iconClass.'" aria-hidden="true"></i></a></li>';
                }
                echo '</ul>';
              };      
?>
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