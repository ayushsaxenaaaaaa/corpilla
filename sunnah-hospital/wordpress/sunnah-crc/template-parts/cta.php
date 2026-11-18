<?php
/**
 * Navy call-to-action band used at the end of inner pages.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="bred"><div class="w">
  <svg viewBox="0 0 48 48" aria-hidden="true"><use href="#i-cal"/></svg>
  <div><b>Talk to our cancer care team.</b><p>Right Treatment. Right Guidance. Compassionate Care. Call <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?> or send us a message on WhatsApp.</p></div>
  <a class="olbtn" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Request an appointment</a>
</div></section>
