<?php
/**
 * Template part for Top bar in header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ruth_Chafin_Interior_Design
 */

?>
<section id="top-bar" class="rcid-header-bar">

    <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
    <nav class="secondary-navigation top-navigation" role="navigation" aria-label="Secondary Menu">


    </nav>
    <div class="rcid-header-bar-widget site-search">
    <?php if ( is_active_sidebar( 'top-sidebar' ) ) { ?>
     <div id="site-search" class="widget woocommerce widget_product_search">
         <?php dynamic_sidebar('top-sidebar'); ?>
     </div>
    <?php } ?>
    </div>

    </section>