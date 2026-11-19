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
  <div class="hp" aria-hidden="true"><label for="ef-web">Leave this empty</label><input id="ef-web" type="text" name="website" tabindex="-1" autocomplete="off"></div>
  <div class="frow">
    <label for="ef-name"><span class="lt">Patient name <em>*</em></span><input id="ef-name" name="patient_name" type="text" required maxlength="100" autocomplete="name"></label>
    <label for="ef-mobile"><span class="lt">Mobile number <em>*</em></span><input id="ef-mobile" name="mobile" type="tel" required maxlength="20" inputmode="tel" autocomplete="tel" placeholder="+91"></label>
  </div>
  <div class="frow">
    <label for="ef-email"><span class="lt">Email (optional)</span><input id="ef-email" name="email" type="email" maxlength="120" autocomplete="email"></label>
    <label for="ef-dept"><span class="lt">Department</span><select id="ef-dept" name="department">
      <?php foreach ( array( 'Not sure', 'Surgical Oncology', 'Medical Oncology', 'Diagnostics', 'Pain & Palliative Care', 'Psychological Support', 'Oncology Nutrition', 'Dental Care', 'Second Opinion' ) as $o ) : ?>
        <option<?php selected( $dept, $o ); ?>><?php echo esc_html( $o ); ?></option>
      <?php endforeach; ?>
    </select></label>
  </div>
  <label for="ef-msg"><span class="lt">Message (optional)</span><textarea id="ef-msg" name="message" rows="4" maxlength="2000" placeholder="Tell us briefly about the diagnosis or your question"></textarea></label>
  <p class="fsmall">Please do not send medical reports through this form. Share them on WhatsApp or bring them to your visit.</p>
  <div class="facts2"><button type="submit" class="sbtn navy">Send request</button><a class="sbtn wa" href="<?php echo esc_url( sunnah_wa( 'Hello Sunnah Hospital, I would like to book an appointment.' ) ); ?>"><svg><use href="#i-wa"/></svg>Send on WhatsApp instead</a></div>
</form>
