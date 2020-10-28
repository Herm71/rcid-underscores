<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ruth_Chafin_Interior_Design
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text"
      href="#content"><?php esc_html_e( 'Skip to content', 'ruth-chafin-interior-design' ); ?></a>

    <header id="masthead" class="site-header">

      <div class="wrap">
        <section id="top-bar" class="header-bar">
          <nav class="secondary-navigation" role="navigation" aria-label="Secondary Menu">
            <?php rcid_top_menu(); ?>

          </nav>

          <?php if ( is_active_sidebar( 'top-sidebar' ) ) { ?>
          <div id="site-search" class="widget">
            <?php dynamic_sidebar('top-sidebar'); ?>

            <?php } ?>
          </div>

        </section>
        <div class="site-branding">
          <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
          <h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
              rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php
			else :
				?>
          <p class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
              rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php
			endif;
			$ruth_chafin_interior_design_description = get_bloginfo( 'description', 'display' );
			if ( $ruth_chafin_interior_design_description || is_customize_preview() ) :
				?>
          <p class="site-description screen-reader-text">
            <?php echo $ruth_chafin_interior_design_description; /* WPCS: xss ok. */ ?></p>
          <?php endif; ?>
        </div><!-- .site-branding -->
        <section class="primary-navigation">
          <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu"
              aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ruth-chafin-interior-design' ); ?></button>
            <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
          </nav><!-- #site-navigation -->
        </section><!-- .primary-navigation -->
      </div><!-- #wrap -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">