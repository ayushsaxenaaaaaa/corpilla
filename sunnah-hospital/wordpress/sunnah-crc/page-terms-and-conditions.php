<?php
/**
 * Terms & Conditions page (slug: terms-and-conditions).
 * Shows the text written in WordPress if the page has content; otherwise standard website terms.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-corridor.jpg', 'title' => 'Terms & Conditions', 'lead' => 'Terms for using this website.' ) );
$custom = '';
while ( have_posts() ) {
	the_post();
	$custom = trim( wp_strip_all_tags( get_the_content() ) );
}
?>
<main id="content"><div class="w lay">
  <div class="main entry">
  <?php if ( '' !== $custom ) : ?>
    <?php the_content(); ?>
  <?php else : ?>
    <p class="lede">This website is operated by Sunnah Hospital – Cancer Research Centre, governed by Janta Multipurpose Society, <?php echo esc_html( sunnah_opt( 'address' ) ); ?>. By using this website you agree to these terms.</p>
    <h2>Medical information</h2>
    <p>Information on this website is for general education and information only. It does not replace individual medical consultation, diagnosis or treatment. Always consult a qualified doctor about your own health. Do not delay seeking medical advice because of something you read on this website.</p>
    <h2>Emergencies</h2>
    <p>Do not use the website form or email for medical emergencies. For urgent medical assistance call <?php echo esc_html( sunnah_opt( 'emergency_phone' ) ); ?> or go to the nearest hospital.</p>
    <h2>Appointments</h2>
    <p>Submitting an enquiry through this website does not confirm an appointment. An appointment is confirmed only when hospital staff contact you. Consultation days and timings may change.</p>
    <h2>Services, packages and schemes</h2>
    <p>Information about services, inpatient packages and government health schemes is given in good faith and may change. Package inclusions, exclusions and charges, and eligibility under any government scheme or insurance, are confirmed by the hospital before admission and are subject to the applicable rules.</p>
    <h2>Accuracy of information</h2>
    <p>We try to keep the information on this website accurate and up to date, but we do not guarantee that it is complete or current. We may change the website at any time.</p>
    <h2>Use of the website</h2>
    <p>You must not misuse this website, attempt to gain unauthorised access to it, or interfere with its operation. Text and photographs on this website belong to Sunnah Hospital and may not be copied for commercial use without permission.</p>
    <h2>Links to other websites</h2>
    <p>Links to other websites, such as maps or messaging services, are provided for convenience. We are not responsible for their content or privacy practices.</p>
    <h2>Privacy</h2>
    <p>How we handle information you send through this website is explained in our <a href="<?php echo sunnah_url( 'privacy-policy' ); ?>">Privacy Policy</a>.</p>
    <h2>Governing law</h2>
    <p>These terms are governed by the laws of India, and disputes are subject to the jurisdiction of the courts at Akola, Maharashtra.</p>
    <h2>Contact</h2>
    <p>Phone: <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?>. Email: <?php echo esc_html( sunnah_opt( 'email' ) ); ?>.</p>
  <?php endif; ?>
  </div>
  <?php get_template_part( 'template-parts/aside' ); ?>
</div></main>
<?php
get_footer();
