<?php
/**
 * Appointment enquiry form. Sends an email to the address set in the Customizer.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$dept = isset( $args['department'] ) ? $args['department'] : '';
?>
<form class="eform" id="enquiry" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
  <?php sunnah_enquiry_notice(); ?>
  <input type="hidden" name="action" value="sunnah_enquiry">
  <?php wp_nonce_field( 'sunnah_enquiry', 'sunnah_enquiry_nonce' ); ?>
  <?php sunnah_enquiry_stamp(); ?>
  <div class="hp" aria-hidden="true"><label for="ef-web">Leave this empty</label><input id="ef-web" type="text" name="website" tabindex="-1" autocomplete="off"></div>
  <div class="frow">
    <label for="ef-name"><span class="lt">Patient name <em>*</em></span><input id="ef-name" name="patient_name" type="text" required maxlength="100" autocomplete="name"></label>
    <label for="ef-mobile"><span class="lt">Contact number <em>*</em></span><input id="ef-mobile" name="mobile" type="tel" required maxlength="20" inputmode="tel" autocomplete="tel" placeholder="+91"></label>
  </div>
  <div class="frow">
    <label for="ef-dept"><span class="lt">Department</span><select id="ef-dept" name="department">
      <?php foreach ( array_diff( sunnah_crc_enquiry_departments(), array( 'Call back request' ) ) as $o ) : ?>
        <option<?php selected( $dept, $o ); ?>><?php echo esc_html( $o ); ?></option>
      <?php endforeach; ?>
    </select></label>
    <label for="ef-email"><span class="lt">Email (optional)</span><input id="ef-email" name="email" type="email" maxlength="120" autocomplete="email"></label>
  </div>
  <div class="frow">
    <label for="ef-date"><span class="lt">Preferred date</span><input id="ef-date" name="pref_date" type="date" min="<?php echo esc_attr( wp_date( 'Y-m-d' ) ); ?>" max="<?php echo esc_attr( wp_date( 'Y-m-d', strtotime( '+1 year' ) ) ); ?>"></label>
    <label for="ef-time"><span class="lt">Preferred consultation time</span><select id="ef-time" name="pref_time"><?php foreach ( sunnah_crc_enquiry_times() as $o ) : ?><option><?php echo esc_html( $o ); ?></option><?php endforeach; ?></select></label>
  </div>
  <label for="ef-msg"><span class="lt">Reason for appointment (optional)</span><textarea id="ef-msg" name="message" rows="4" maxlength="2000"></textarea></label>
  <p class="fsmall">This is an appointment enquiry. Your appointment is confirmed only when our staff call you back. Please do not send medical reports through this form; bring them to your visit. <b>For an emergency, call <?php echo esc_html( sunnah_opt( 'emergency_phone' ) ); ?>, do not use this form.</b></p>
  <div class="facts2"><button type="submit" class="sbtn navy">Send enquiry</button><a class="sbtn wa" href="<?php echo esc_url( sunnah_wa( 'Hello Sunnah Hospital, I would like to book an appointment.' ) ); ?>"><svg><use href="#i-wa"/></svg>Send on WhatsApp instead</a></div>
</form>
