<?php
/**
 * One news / article card.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$n    = $args['post'];
$cats = get_the_category( $n->ID );
?>
<a class="ncard" href="<?php echo esc_url( get_permalink( $n ) ); ?>">
  <div class="im"><?php if ( has_post_thumbnail( $n ) ) { echo get_the_post_thumbnail( $n, 'sunnah-card', array( 'loading' => 'lazy', 'alt' => '' ) ); } else { echo '<img src="' . sunnah_img( 'sh-building-side.jpg' ) . '" alt="" loading="lazy">'; } ?></div>
  <span class="sp"><?php echo esc_html( $cats ? $cats[0]->name : 'News' ); ?> · <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d', $n ) ); ?>"><?php echo esc_html( get_the_date( 'j M Y', $n ) ); ?></time></span>
  <h3><?php echo esc_html( get_the_title( $n ) ); ?></h3>
  <p><?php echo esc_html( wp_html_excerpt( wp_strip_all_tags( get_the_excerpt( $n ) ), 150, '…' ) ); ?></p>
</a>
