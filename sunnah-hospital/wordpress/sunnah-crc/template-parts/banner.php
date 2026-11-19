<?php
/**
 * Inner page banner: photo, title and intro line.
 * Uses the page's Featured Image when one is set.
 *
 * Args: image (theme default file), title, lead.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$a = wp_parse_args( $args, array( 'image' => 'sh-building.jpg', 'title' => get_the_title(), 'lead' => '' ) );
?>
<section class="pban">
  <img src="<?php echo sunnah_banner( $a['image'] ); ?>" alt="" fetchpriority="high">
  <div class="w">
    <h1><?php echo esc_html( $a['title'] ); ?></h1>
    <?php if ( $a['lead'] ) : ?><p><?php echo esc_html( $a['lead'] ); ?></p><?php endif; ?>
  </div>
</section>
