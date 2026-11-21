<?php
/**
 * Sticky side panel with appointment and contact details.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$links = isset( $args['links'] ) ? $args['links'] : array();
?>
<aside class="side">
  <div class="sbx navyb">
    <h2>Request an Appointment</h2>
    <p>Call, WhatsApp or send an enquiry and our staff will call you to confirm.</p>
    <a class="sbtn turq" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Book an Appointment</a>
    <a class="sbtn line" href="<?php echo esc_attr( sunnah_tel() ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a>
    <a class="sbtn wa" href="<?php echo esc_url( sunnah_wa( 'Hello Sunnah Hospital, I would like to book an appointment.' ) ); ?>"><svg><use href="#i-wa"/></svg>WhatsApp</a>
  </div>
  <?php if ( $links ) : ?>
  <div class="sbx">
    <h2 class="small">Related</h2>
    <ul class="rel"><?php foreach ( $links as $l ) : ?><li><a href="<?php echo esc_url( $l[1] ); ?>"><?php echo esc_html( $l[0] ); ?></a></li><?php endforeach; ?></ul>
  </div>
  <?php endif; ?>
  <div class="sbx">
    <h2 class="small">Emergency</h2>
    <p>For urgent medical help call <a href="<?php echo esc_attr( sunnah_tel( 'emergency_phone' ) ); ?>"><b><?php echo esc_html( sunnah_opt( 'emergency_phone' ) ); ?></b></a><?php echo sunnah_opt( 'emergency_hours' ) ? esc_html( ' (' . sunnah_opt( 'emergency_hours' ) . ')' ) : ''; ?>.</p>
  </div>
  <div class="sbx">
    <h2 class="small">Government schemes</h2>
    <p>Enquire about AB-PMJAY and MJPJAY before admission. Coverage depends on scheme rules and the treatment.</p>
    <a class="arw" href="<?php echo sunnah_url( 'community', 'schemes' ); ?>">Scheme information</a>
  </div>
</aside>
