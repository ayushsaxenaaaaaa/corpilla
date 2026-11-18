<?php
/**
 * Inner page banner: photo, breadcrumb, title and intro line.
 * Uses the page's Featured Image when one is set.
 *
 * Args: image (theme default file), title, lead, crumbs (array of [label, url]).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$a = wp_parse_args( $args, array( 'image' => 'sh-building.jpg', 'title' => get_the_title(), 'lead' => '', 'crumbs' => array() ) );
?>
<section class="pban">
  <img src="<?php echo sunnah_banner( $a['image'] ); ?>" alt="" fetchpriority="high">
  <div class="w">
    <nav class="crumb" aria-label="Breadcrumb"><a href="<?php echo sunnah_url(); ?>">Home</a>
      <?php foreach ( $a['crumbs'] as $c ) : ?><span aria-hidden="true">/</span><a href="<?php echo esc_url( $c[1] ); ?>"><?php echo esc_html( $c[0] ); ?></a><?php endforeach; ?>
      <span aria-hidden="true">/</span><span aria-current="page"><?php echo esc_html( $a['title'] ); ?></span></nav>
    <h1><?php echo esc_html( $a['title'] ); ?></h1>
    <?php if ( $a['lead'] ) : ?><p><?php echo esc_html( $a['lead'] ); ?></p><?php endif; ?>
  </div>
</section>
