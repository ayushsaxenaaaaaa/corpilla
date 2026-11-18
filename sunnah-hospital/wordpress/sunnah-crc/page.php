<?php
/**
 * Default template for other pages (e.g. Privacy Policy). Content is edited in WordPress.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-corridor.jpg', 'title' => get_the_title() ) );
	?>
<main id="content"><div class="w lay">
  <div class="main entry"><?php the_content(); ?></div>
  <?php get_template_part( 'template-parts/aside' ); ?>
</div></main>
	<?php
endwhile;
get_footer();
