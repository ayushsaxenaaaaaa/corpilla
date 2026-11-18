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
    <p>Call, WhatsApp or send a request and our team will call you back.</p>
    <a class="sbtn turq" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Request an appointment</a>
    <a class="sbtn line" href="<?php echo esc_attr( sunnah_tel() ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a>
    <a class="sbtn wa" href="<?php echo esc_url( sunnah_wa( 'Hello Sunnah Hospital, I would like to book an appointment.' ) ); ?>"><svg><use href="#i-wa"/></svg>WhatsApp</a>
  </div>
  <?php if ( $links ) : ?>
  <div class="sbx">
    <h2 class="small">Related</h2>
    <ul class="rel"><?php foreach ( $links as $l ) : ?><li><a href="<?php echo esc_url( $l[1] ); ?>"><?php echo esc_html( $l[0] ); ?></a></li><?php endforeach; ?></ul>
  </div>
  <?php endif; ?>
  <div class="sbx pmj">
    <img src="<?php echo sunnah_img( 'pmjay.png' ); ?>" alt="Ayushman Bharat PM-JAY" width="56" height="56" loading="lazy">
    <p><b>PM-JAY cashless treatment</b>Available for eligible patients under Ayushman Bharat.</p>
  </div>
</aside>
