<?php
/**
 * Departments & Specialities page (slug: departments).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-ot-suite.jpg', 'title' => 'Departments & Specialities', 'lead' => 'Medical and surgical services across multiple specialities.' ) );

$sunnah_text = array(
	'general-medicine'  => 'General Medicine provides evaluation and management of a wide range of adult medical conditions. The department supports diagnosis, treatment planning, inpatient medical care and coordination with other specialities.',
	'general-surgery'   => 'General Surgery provides surgical evaluation and treatment for conditions requiring operative or related medical management.',
	'medical-oncology'  => 'Medical Oncology provides medical evaluation and cancer treatment, including chemotherapy administration and treatment monitoring.',
	'surgical-oncology' => 'Surgical Oncology provides surgical assessment and management for patients diagnosed with cancer.',
	'orthopaedics'      => 'The Orthopaedics department evaluates and manages conditions affecting bones, joints, muscles and the musculoskeletal system.',
	'urology'           => 'Urology provides evaluation and treatment for conditions affecting the urinary tract and male reproductive system.',
	'neurology'         => 'Neurology provides assessment and management of disorders affecting the brain, spinal cord, nerves and nervous system.',
	'ent'               => 'The ENT department provides evaluation and treatment for conditions affecting the ear, nose and throat.',
	'dental'            => 'The Dental department provides oral health assessment and dental care at Sunnah Dental Care.',
);
$sunnah_support = array(
	'icu'       => array( 'Intensive Care Unit (ICU)', 'i-bed', 'The hospital has a ' . sunnah_opt( 'stat_icu' ) . '-bed ICU facility for patients requiring intensive medical monitoring and care.', 'icu' ),
	'pathology' => array( 'Pathology', 'i-vial', 'Pathology services support laboratory investigation and diagnostic evaluation.', 'pathology' ),
	'xray'      => array( 'Digital X-ray', 'i-scan', 'Digital X-ray services support diagnostic imaging for a range of medical conditions.', 'imaging' ),
	'sonography'=> array( 'Sonography', 'i-scan', 'Sonography services support diagnostic evaluation through ultrasound imaging.', '' ),
	'daycare'   => array( 'Day-Care Services', 'i-sun', 'Day-care facilities support planned medical treatments and procedures that do not necessarily require an overnight hospital stay.', '' ),
);
?>
<main id="content">
<section class="sec grey" id="find"><div class="w">
  <h2 class="c">Find a department</h2>
  <label class="sbox" for="typefilter" style="max-width:560px;margin:0 auto 24px"><svg><use href="#i-s"/></svg><input id="typefilter" type="search" placeholder="Search, e.g. surgery, bones, ear" autocomplete="off"></label>
  <ul class="tlist" id="typelist">
    <?php foreach ( sunnah_crc_departments() as $k => $d ) : ?>
      <li><a href="#<?php echo esc_attr( $k ); ?>"><span><?php echo esc_html( $d[0] ); ?><small><?php echo esc_html( $d[2] ); ?></small></span></a></li>
    <?php endforeach; ?>
    <?php foreach ( $sunnah_support as $k => $d ) : ?>
      <li><a href="#<?php echo esc_attr( 'icu' === $k ? 'critical-care' : $k ); ?>"><span><?php echo esc_html( $d[0] ); ?><small><?php echo esc_html( $d[2] ); ?></small></span></a></li>
    <?php endforeach; ?>
    <li><a href="#emergency"><span>Emergency Services<small>Initial assessment and care for urgent medical conditions.</small></span></a></li>
  </ul>
  <p id="typenone" hidden style="text-align:center;margin-top:20px">No match found. <a class="arw" style="display:inline-flex" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Ask our staff</a></p>
</div></section>

<div class="w lay">
  <div class="main">
    <p class="lede">Sunnah Hospital provides medical and surgical services across multiple specialities, supported by intensive care, operation theatres and diagnostic services.</p>
    <?php foreach ( sunnah_crc_departments() as $k => $d ) : ?>
      <section class="dept" id="<?php echo esc_attr( $k ); ?>">
        <div class="dh"><span class="circ c1"><svg><use href="#<?php echo esc_attr( $d[1] ); ?>"/></svg></span><h2><?php echo esc_html( $d[0] ); ?></h2></div>
        <p><?php echo esc_html( $sunnah_text[ $k ] ); ?></p>
        <?php
        $svc = sunnah_services( $k );
        if ( $svc ) {
			echo '<h3>Services</h3>' . $svc; // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in sunnah_services().
		}
		if ( 'medical-oncology' === $k || 'surgical-oncology' === $k ) {
			echo '<p><a class="arw" href="' . sunnah_url( 'cancer-care', $k ) . '">More about ' . esc_html( $d[0] ) . ' at the Cancer Research Centre</a></p>'; // phpcs:ignore WordPress.Security.EscapeOutput
		} elseif ( 'dental' === $k ) {
			echo '<p><a class="arw" href="' . sunnah_url( 'dental-care' ) . '">Visit Sunnah Dental Care</a></p>'; // phpcs:ignore WordPress.Security.EscapeOutput
		} elseif ( ! $svc ) {
			echo sunnah_ask_line( 'For information on the services available in this department,' ); // phpcs:ignore WordPress.Security.EscapeOutput
		}
		if ( 'general-surgery' === $k ) {
			echo sunnah_scheme_logos( 'small' ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in function.
			echo '<p class="note">Government scheme packages for General Surgery (AB-PMJAY and MJPJAY) are subject to scheme rules, approved packages and hospital empanelment. <a href="' . sunnah_url( 'community', 'schemes' ) . '">Scheme information</a>.</p>'; // phpcs:ignore WordPress.Security.EscapeOutput
		}
		get_template_part( 'template-parts/team', null, array( 'speciality' => 'dental' === $k ? array( 'Dental', 'Dental Care' ) : $d[3], 'heading' => 'Consultants', 'compact' => true ) );
		?>
      </section>
    <?php endforeach; ?>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Cancer Research Centre', sunnah_url( 'cancer-care' ) ), array( 'Our Doctors', sunnah_url( 'doctors' ) ), array( 'Facilities', sunnah_url( 'infrastructure' ) ) ) ) ); ?>
</div>

<section class="sec grey" id="critical-care"><div class="w">
  <h2 class="c">Critical Care &amp; Supporting Departments</h2>
  <p class="c">Intensive care, diagnostics, day-care and emergency services that support every speciality.</p>
  <div class="svcg sup">
    <?php foreach ( $sunnah_support as $k => $d ) : ?>
      <div class="svcc" id="<?php echo esc_attr( 'icu' === $k ? 'icu' : $k ); ?>"><svg><use href="#<?php echo esc_attr( $d[1] ); ?>"/></svg><h3><?php echo esc_html( $d[0] ); ?></h3><p><?php echo esc_html( $d[2] ); ?></p><?php echo $d[3] ? sunnah_services( $d[3] ) : ''; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
    <?php endforeach; ?>
    <div class="svcc emg" id="emergency"><svg><use href="#i-heart"/></svg><h3>Emergency Services</h3><p>Emergency services provide initial medical assessment and care for urgent medical conditions.</p><p class="big"><a href="<?php echo esc_attr( sunnah_tel( 'emergency_phone' ) ); ?>"><?php echo esc_html( sunnah_opt( 'emergency_phone' ) ); ?></a></p><?php if ( sunnah_opt( 'emergency_hours' ) ) : ?><p><?php echo esc_html( sunnah_opt( 'emergency_hours' ) ); ?></p><?php endif; ?></div>
  </div>
</div></section>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
