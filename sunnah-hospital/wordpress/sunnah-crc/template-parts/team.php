<?php
/**
 * Doctors for one speciality. Shows nothing if none are added yet.
 * Args: speciality (string|array), heading, compact (true = plain block inside page content).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$docs = sunnah_crc_get_doctors( isset( $args['speciality'] ) ? $args['speciality'] : '' );
if ( ! $docs ) {
	return;
}
$heading = isset( $args['heading'] ) ? $args['heading'] : 'Our Specialists';
if ( ! empty( $args['compact'] ) ) :
	?>
<div class="tmini"><h3><?php echo esc_html( $heading ); ?></h3><div class="docs"><?php foreach ( $docs as $d ) { get_template_part( 'template-parts/doctor-card', null, array( 'doc' => $d ) ); } ?></div></div>
	<?php
	return;
endif;
?>
<section class="sec grey"><div class="w">
  <h2 class="c"><?php echo esc_html( $heading ); ?></h2>
  <p class="c"><a class="arw" style="display:inline-flex" href="<?php echo sunnah_url( 'doctors' ); ?>">View all doctors</a></p>
  <div class="docs"><?php foreach ( $docs as $d ) { get_template_part( 'template-parts/doctor-card', null, array( 'doc' => $d ) ); } ?></div>
</div></section>
