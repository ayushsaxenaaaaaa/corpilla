<?php
/**
 * Contact & Appointments page (slug: contact). Includes OPD, emergency and patient & visitor information.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-building.jpg', 'title' => 'Contact & Appointments', 'lead' => 'For appointments, medical enquiries, department information and hospital-related assistance.' ) );
$sunnah_opd_days  = sunnah_opt( 'opd_days' );
$sunnah_opd_hours = sunnah_opt( 'opd_hours' );
?>
<main id="content">
<section class="emgb" id="emergency"><div class="w">
  <div><b>Emergency?</b><p>For urgent medical assistance, call the emergency contact. Do not use the appointment form for emergencies.<?php echo sunnah_opt( 'emergency_hours' ) ? ' ' . esc_html( sunnah_opt( 'emergency_hours' ) ) . '.' : ''; ?></p></div>
  <a href="<?php echo esc_attr( sunnah_tel( 'emergency_phone' ) ); ?>"><svg><use href="#i-ph"/></svg><?php echo esc_html( sunnah_opt( 'emergency_phone' ) ); ?></a>
</div></section>

<div class="w cgrid">
  <div>
    <h2 class="h2s">Book an Appointment</h2>
    <p style="margin-bottom:18px;color:var(--text)">Send an enquiry about consultations and appointment availability. Our staff will call you to confirm.</p>
    <?php get_template_part( 'template-parts/enquiry-form' ); ?>
  </div>
  <div>
    <h2 class="h2s">Contact details</h2>
    <ul class="clist">
      <li><i><svg><use href="#i-loc"/></svg></i><small>Address</small><b>Sunnah Hospital – Cancer Research Centre, <?php echo esc_html( sunnah_opt( 'address' ) ); ?></b></li>
      <li><i><svg><use href="#i-ph"/></svg></i><small>Telephone</small><span><a href="<?php echo esc_attr( sunnah_tel( 'phone_1' ) ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a><?php if ( sunnah_opt( 'phone_2' ) ) : ?> · <a href="<?php echo esc_attr( sunnah_tel( 'phone_2' ) ); ?>"><?php echo esc_html( sunnah_opt( 'phone_2' ) ); ?></a><?php endif; ?></span></li>
      <li><i><svg><use href="#i-wa"/></svg></i><small>WhatsApp</small><a href="<?php echo esc_url( sunnah_wa() ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a></li>
      <li><i><svg><use href="#i-mail"/></svg></i><small>Email</small><a href="mailto:<?php echo esc_attr( sunnah_opt( 'email' ) ); ?>"><?php echo esc_html( sunnah_opt( 'email' ) ); ?></a></li>
    </ul>

    <h2 class="h2s" id="opd" style="margin-top:36px">OPD information</h2>
    <ul class="clist">
      <li><i><svg><use href="#i-cal"/></svg></i><small>OPD days</small><b><?php echo esc_html( $sunnah_opd_days ? $sunnah_opd_days : 'Please call to confirm' ); ?></b></li>
      <li><i><svg><use href="#i-clock"/></svg></i><small>OPD timings</small><b><?php echo esc_html( $sunnah_opd_hours ? $sunnah_opd_hours : 'Please call to confirm' ); ?></b></li>
    </ul>
    <?php
    $sunnah_oi = sunnah_rich( 'opd_info' );
    if ( $sunnah_oi ) {
		echo '<div class="entry" style="margin-top:14px">' . $sunnah_oi . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post.
	}
	?>
    <p class="fsmall" style="margin-top:10px">Consultation days of visiting consultants are shown on each doctor's profile. Please call before visiting, as timings may change.</p>
  </div>
</div>

<section class="sec grey" id="patient-info"><div class="w narrow">
  <h2 class="c">Patient &amp; visitor information</h2>
  <?php
  $sunnah_pi = sunnah_rich( 'patient_info' );
  if ( $sunnah_pi ) :
		echo '<div class="entry pinfo">' . $sunnah_pi . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post.
  else :
		?>
    <div class="faq">
      <details><summary>Admission</summary><p>For admission enquiries and the admission procedure, please call <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?>.</p></details>
      <details><summary>Documents to bring</summary><p>Please bring a photo ID, your previous medical reports, prescriptions and discharge summaries, and your government scheme or insurance card if you have one. Our staff will tell you if anything else is needed.</p></details>
      <details><summary>Attendants and visitors</summary><p>Please ask at the reception about attendant arrangements and visiting rules for the ward or ICU.</p></details>
      <details><summary>Billing and payment</summary><p>Please speak to our billing desk for estimates, payment and package information before admission.</p></details>
      <details><summary>Discharge</summary><p>At discharge you will receive a discharge summary with instructions on medicines, follow-up and warning signs.</p></details>
      <details><summary>Insurance and government schemes</summary><p>For enquiries about health insurance, AB-PMJAY or MJPJAY, please speak to our staff before admission. Benefits are subject to the applicable scheme or policy rules.</p></details>
      <details><summary>Visiting hours</summary><p>Please call the hospital for current visiting hours.</p></details>
    </div>
  <?php endif; ?>
</div></section>

<section class="sec" id="location"><div class="w">
  <h2 class="c">Find us</h2>
  <p class="c">Sunnah Hospital – Cancer Research Centre, <?php echo esc_html( sunnah_opt( 'address' ) ); ?></p>
  <div class="gmap"><iframe title="Map showing Sunnah Hospital, Akola" src="<?php echo esc_url( 'https://www.google.com/maps?q=' . rawurlencode( sunnah_opt( 'maps_query' ) ) . '&output=embed' ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
  <div class="facts2" style="margin-top:16px;justify-content:center"><a class="sbtn navy" href="<?php echo esc_url( sunnah_opt( 'maps_url' ) ); ?>" target="_blank" rel="noopener">Get Directions</a><a class="sbtn out" href="<?php echo esc_attr( sunnah_tel() ); ?>">Call <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a></div>
</div></section>
</main>
<?php
get_footer();
