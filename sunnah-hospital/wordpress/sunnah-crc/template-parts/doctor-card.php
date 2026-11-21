<?php
/**
 * One doctor card.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$d    = $args['doc'];
$spec = sunnah_doc( $d->ID, 'speciality' );
$type = sunnah_doc( $d->ID, 'type' );
$role = trim( sunnah_doc( $d->ID, 'role' ) . ( sunnah_doc( $d->ID, 'qualification' ) ? ' · ' . sunnah_doc( $d->ID, 'qualification' ) : '' ), ' ·' );
$ini  = '';
foreach ( preg_split( '/\s+/', preg_replace( '/^Dr\.?\s+/i', '', $d->post_title ) ) as $p ) {
	$ini .= $p ? mb_substr( $p, 0, 1 ) : '';
}
?>
<a class="doc" href="<?php echo esc_url( get_permalink( $d ) ); ?>" data-spec="<?php echo esc_attr( sanitize_title( $spec ) ); ?>">
  <div class="im"><?php if ( has_post_thumbnail( $d ) ) { echo get_the_post_thumbnail( $d, 'sunnah-portrait', array( 'loading' => 'lazy', 'alt' => esc_attr( $d->post_title ) ) ); } else { echo '<span class="ini" aria-hidden="true">' . esc_html( mb_substr( $ini, 0, 2 ) ) . '</span>'; } ?></div>
  <span class="sp"><?php echo esc_html( $spec ); ?></span>
  <h3><?php echo esc_html( $d->post_title ); ?></h3>
  <?php if ( $role ) : ?><p><?php echo esc_html( $role ); ?></p><?php endif; ?>
  <?php if ( $type ) : ?><p class="dtype"><?php echo esc_html( $type ); ?></p><?php endif; ?>
</a>
