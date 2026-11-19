<?php
/**
 * Privacy Policy page (slug: privacy-policy).
 * Shows the text written in WordPress if the page has content; otherwise a standard policy
 * that matches how this website works.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-corridor.jpg', 'title' => 'Privacy Policy', 'lead' => 'How this website handles your information.' ) );
$custom = '';
while ( have_posts() ) {
	the_post();
	$custom = trim( wp_strip_all_tags( get_the_content() ) );
}
$is_placeholder = ( '' === $custom || false !== strpos( $custom, 'Add the hospital' ) );
?>
<main id="content"><div class="w lay">
  <div class="main entry">
  <?php if ( ! $is_placeholder ) : ?>
    <?php the_content(); ?>
  <?php else : ?>
    <p class="lede">Sunnah Hospital – Cancer Research Center ("we", "us") respects your privacy. This policy explains what information this website collects and how it is used.</p>
    <h2>Information you give us</h2>
    <p>When you send an appointment request or call-back request through this website, we receive the details you enter: the patient's name, mobile number, and if you choose to give them, your email address, preferred department and message. These details are sent by email to our hospital team so that we can contact you. They are not stored on the website.</p>
    <p>Please do not send medical reports or other sensitive medical documents through the website form. You can share them with our team on WhatsApp or bring them to your visit.</p>
    <h2>How we use your information</h2>
    <ul>
      <li>To call or message you about the appointment or question you asked about.</li>
      <li>To guide you to the right department or specialist.</li>
    </ul>
    <p>We do not sell or rent your information, and we do not use it for advertising.</p>
    <h2>Patient medical records</h2>
    <p>Medical records created during your treatment at the hospital are handled under the hospital's medical confidentiality practices and applicable Indian law. This policy covers only this website.</p>
    <h2>Cookies and third-party services</h2>
    <p>This website does not use advertising or tracking cookies. To display the site, your browser loads fonts from Google Fonts, and the Contact page shows a map from Google Maps. These services may receive your device's IP address under their own privacy policies. Links to WhatsApp open WhatsApp, which is governed by WhatsApp's privacy policy.</p>
    <h2>Security</h2>
    <p>The website uses security measures to protect the information you send. No method of sending information over the internet is completely secure, so please share only what is needed to contact you.</p>
    <h2>Your choices</h2>
    <p>You can ask us to update or delete the contact details you sent through this website by calling <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?> or emailing <?php echo esc_html( sunnah_opt( 'email' ) ); ?>.</p>
    <h2>Contact</h2>
    <p>Sunnah Hospital – Cancer Research Center, <?php echo esc_html( sunnah_opt( 'address' ) ); ?>. Phone: <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?>. Email: <?php echo esc_html( sunnah_opt( 'email' ) ); ?>.</p>
    <p class="fsmall">Last updated: <?php echo esc_html( date_i18n( 'F Y', strtotime( '2026-11-01' ) ) ); ?></p>
  <?php endif; ?>
  </div>
  <?php get_template_part( 'template-parts/aside' ); ?>
</div></main>
<?php
get_footer();
