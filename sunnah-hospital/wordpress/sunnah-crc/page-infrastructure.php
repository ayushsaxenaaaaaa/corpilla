<?php
/**
 * Facilities & Infrastructure page (slug: infrastructure).
 * Each facility has its own photograph and description, alternating sides.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-corridor.jpg', 'title' => 'Facilities & Infrastructure', 'lead' => 'Inpatient, critical-care, surgical and diagnostic facilities supporting our multispeciality services and cancer care.' ) );

// id => [kicker, heading, text, photo (empty = none yet), alt, extra list].
$sunnah_fac = array(
	'building'    => array( 'Hospital Building', 'Three floors in Ganga Nagar, Akola', 'Sunnah Hospital is located in Ganga Nagar, Akola, Maharashtra. The hospital operates across ' . sunnah_opt( 'stat_floors' ) . ' floors and provides facilities supporting its medical, surgical and inpatient services.', 'sh-building.jpg', 'Sunnah Hospital building, Ganga Nagar, Akola', array() ),
	'inpatient'   => array( 'Inpatient Facilities', sunnah_opt( 'stat_beds' ) . ' hospital beds', 'The hospital has more than 30 beds for patients requiring admission, medical observation, treatment and recovery.', 'sh-ward.jpg', 'Inpatient ward at Sunnah Hospital', array() ),
	'icu'         => array( 'Intensive Care Unit', sunnah_opt( 'stat_icu' ) . '-bed ICU', 'The hospital has a ' . sunnah_opt( 'stat_icu' ) . '-bed Intensive Care Unit for patients requiring closer monitoring and intensive medical care.', 'sh-icu.jpg', 'Intensive care unit at Sunnah Hospital', array() ),
	'theatres'    => array( 'Operation Theatres', 'Two operation theatres', 'The hospital has two operation theatres supporting its surgical services, including general surgery and surgical oncology.', 'sh-ot.jpg', 'Operation theatre at Sunnah Hospital', array() ),
	'diagnostics' => array( 'Diagnostic Facilities', 'Pathology, digital X-ray and sonography', 'The hospital provides diagnostic support through pathology, digital X-ray and sonography services.', 'sh-diagnostic.jpg', 'Digital X-ray room at Sunnah Hospital', array( 'Pathology', 'Digital X-ray', 'Sonography' ) ),
	'daycare'     => array( 'Day-Care Facilities', 'Planned treatment without an overnight stay', 'Day-care facilities support planned treatments and services that can be provided without an overnight admission, including chemotherapy administration.', '', '', array() ),
);
$sunnah_n    = 0;
$sunnah_meta = array(
	'building'    => array( 'i-bld', sunnah_opt( 'stat_floors' ) . ' floors' ),
	'inpatient'   => array( 'i-bed', sunnah_opt( 'stat_beds' ) . ' beds' ),
	'icu'         => array( 'i-heart', sunnah_opt( 'stat_icu' ) . ' ICU beds' ),
	'theatres'    => array( 'i-scalpel', sunnah_opt( 'stat_ot' ) . ' theatres' ),
	'diagnostics' => array( 'i-scan', 'In-house diagnostics' ),
	'daycare'     => array( 'i-sun', 'Same-day treatment' ),
);
?>
<main id="content">
<section class="fstats"><div class="w">
  <p class="fsl">Sunnah Hospital provides inpatient, critical-care, surgical and diagnostic facilities to support its multispeciality services and cancer care.</p>
  <div class="fsg">
    <a href="#inpatient"><svg><use href="#i-bed"/></svg><b><?php echo esc_html( sunnah_opt( 'stat_beds' ) ); ?></b><span>Hospital Beds</span></a>
    <a href="#icu"><svg><use href="#i-heart"/></svg><b><?php echo esc_html( sunnah_opt( 'stat_icu' ) ); ?></b><span>ICU Beds</span></a>
    <a href="#theatres"><svg><use href="#i-scalpel"/></svg><b><?php echo esc_html( sunnah_opt( 'stat_ot' ) ); ?></b><span>Operation Theatres</span></a>
    <a href="#building"><svg><use href="#i-bld"/></svg><b><?php echo esc_html( sunnah_opt( 'stat_floors' ) ); ?></b><span>Hospital Floors</span></a>
  </div>
</div></section>

<?php foreach ( $sunnah_fac as $id => $f ) : ?>
<section class="sec fac<?php echo ( $sunnah_n % 2 ) ? ' grey' : ''; ?><?php echo 3 === $sunnah_n ? ' navyf' : ''; ?>" id="<?php echo esc_attr( $id ); ?>"><div class="w split<?php echo ( $sunnah_n % 2 ) ? ' rev' : ''; ?>">
  <?php if ( $f[3] ) : ?>
    <div class="ph big"><span class="fnum" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $sunnah_n + 1 ) ); ?></span><img src="<?php echo sunnah_img( $f[3] ); ?>" alt="<?php echo esc_attr( $f[4] ); ?>" loading="lazy"></div>
  <?php else : ?>
    <div class="ph big noph"><svg><use href="#i-sun"/></svg><span>Photographs coming soon</span></div>
  <?php endif; ?>
  <div>
    <p class="fhead"><span class="fic"><svg><use href="#<?php echo esc_attr( $sunnah_meta[ $id ][0] ); ?>"/></svg></span><span class="kick"><?php echo esc_html( $f[0] ); ?></span></p>
    <h2><?php echo esc_html( $f[1] ); ?></h2>
    <p><?php echo esc_html( $f[2] ); ?></p>
    <p class="fchip"><?php echo esc_html( $sunnah_meta[ $id ][1] ); ?></p>
    <?php if ( $f[5] ) : ?><ul class="ticks"><?php foreach ( $f[5] as $li ) : ?><li><?php echo esc_html( $li ); ?></li><?php endforeach; ?></ul><?php endif; ?>
  </div>
</div></section>
	<?php
	++$sunnah_n;
endforeach;
?>

<section class="sec<?php echo ( $sunnah_n % 2 ) ? ' grey' : ''; ?>" id="additional"><div class="w">
  <h2 class="c">Additional facilities</h2>
  <p class="c">Other areas of the hospital that support patients and families.</p>
  <div class="cards">
    <div><div class="im"><img src="<?php echo sunnah_img( 'sh-casualty.jpg' ); ?>" alt="Casualty area" loading="lazy"></div><h3>Casualty</h3><p>Initial assessment and care for urgent medical conditions.</p></div>
    <div><div class="im"><img src="<?php echo sunnah_img( 'sh-minor-ot.jpg' ); ?>" alt="Minor procedure room" loading="lazy"></div><h3>Minor Procedure Room</h3><p>For minor procedures that do not need the main operation theatre.</p></div>
    <div><div class="im"><img src="<?php echo sunnah_img( 'sh-pharmacy.jpg' ); ?>" alt="Hospital pharmacy" loading="lazy"></div><h3>Pharmacy</h3><p>Medicines available within the hospital.</p></div>
    <div><div class="im"><img src="<?php echo sunnah_img( 'sh-reception.jpg' ); ?>" alt="Reception area" loading="lazy"></div><h3>Reception</h3><p>Help with appointments, admission and enquiries.</p></div>
  </div>
  <?php $sunnah_extra = sunnah_lines( 'extra_facilities' ); if ( $sunnah_extra ) : ?>
  <ul class="ticks two" style="margin-top:34px"><?php foreach ( $sunnah_extra as $x ) : ?><li><b><?php echo esc_html( $x[0] ); ?></b><?php echo ! empty( $x[1] ) ? ' – ' . esc_html( $x[1] ) : ''; ?></li><?php endforeach; ?></ul>
  <?php endif; ?>
</div></section>

<section class="sec" id="gallery"><div class="w">
  <h2 class="c">Photo gallery</h2>
  <p class="c">Photographs from Sunnah Hospital, Akola.</p>
  <div class="gal gal-sm">
    <figure><img src="<?php echo sunnah_img( 'sh-entrance.jpg' ); ?>" alt="Hospital entrance" loading="lazy"><figcaption>Entrance</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-building-side.jpg' ); ?>" alt="Hospital building, side view" loading="lazy"><figcaption>Hospital Building</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-ot-suite.jpg' ); ?>" alt="Operation theatre" loading="lazy"><figcaption>Operation Theatre</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-hdu.jpg' ); ?>" alt="Critical care area" loading="lazy"><figcaption>Critical Care</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-ward-2.jpg' ); ?>" alt="Patient room" loading="lazy"><figcaption>Patient Room</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-ward-3.jpg' ); ?>" alt="Ward" loading="lazy"><figcaption>Ward</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-corridor.jpg' ); ?>" alt="Operation theatre corridor" loading="lazy"><figcaption>OT Corridor</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-icu.jpg' ); ?>" alt="Intensive care unit" loading="lazy"><figcaption>ICU</figcaption></figure>
  </div>
</div></section>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
