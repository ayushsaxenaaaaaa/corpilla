<?php
/**
 * Doctors for one speciality (used on department pages). Shows nothing if none are added yet.
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
?>
<section class="sec grey"><div class="w">
  <h2 class="c"><?php echo esc_html( isset( $args['heading'] ) ? $args['heading'] : 'Our Specialists' ); ?></h2>
  <p class="c"><a class="arw" style="display:inline-flex" href="<?php echo sunnah_url( 'doctors' ); ?>">View all doctors</a></p>
  <div class="docs"><?php foreach ( $docs as $d ) { get_template_part( 'template-parts/doctor-card', null, array( 'doc' => $d ) ); } ?></div>
</div></section>
