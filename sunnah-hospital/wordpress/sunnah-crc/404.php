<?php
/**
 * Page not found.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-corridor.jpg', 'title' => 'Page not found', 'lead' => 'The page you are looking for may have moved.' ) );
?>
<main id="content"><div class="w three">
  <a href="<?php echo sunnah_url(); ?>"><span class="circ c1"><svg><use href="#i-bld"/></svg></span><h3>Home page</h3></a>
  <a href="<?php echo sunnah_url( 'cancer-care' ); ?>"><span class="circ c2"><svg><use href="#i-cell"/></svg></span><h3>Cancer Research Centre</h3></a>
  <a href="<?php echo sunnah_url( 'contact' ); ?>"><span class="circ c3"><svg><use href="#i-q"/></svg></span><h3>Contact Us</h3></a>
</div></main>
<?php
get_footer();
