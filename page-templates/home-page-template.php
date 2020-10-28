<?php
 /**
* Template Name: Home Page
*
* @package WordPress
* @subpackage Ruth_Chafin_Interior_Design
* @since Ruth Chafin Interior Design 0.0.0
*/

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'home');

		endwhile; // End of the loop.
		?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();