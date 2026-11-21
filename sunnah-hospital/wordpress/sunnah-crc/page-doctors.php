<?php
/**
 * Our Doctors page (slug: doctors). Doctors are added under "Doctors" in the WordPress admin.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-ot-suite.jpg', 'title' => 'Our Doctors', 'lead' => 'Full-time and visiting consultants at Sunnah Hospital – Cancer Research Centre.' ) );
$docs  = sunnah_crc_get_doctors();
$specs = array();
foreach ( $docs as $d ) {
	$s = sunnah_doc( $d->ID, 'speciality' );
	if ( $s ) {
		$specs[ sanitize_title( $s ) ] = $s;
	}
}
?>
<main id="content">
<section class="sec"><div class="w">
  <?php if ( $docs ) : ?>
    <?php if ( count( $specs ) > 1 ) : ?>
    <div class="chips" role="group" aria-label="Filter by speciality">
      <button type="button" data-filter="all" aria-pressed="true">All</button>
      <?php foreach ( $specs as $k => $s ) : ?><button type="button" data-filter="<?php echo esc_attr( $k ); ?>" aria-pressed="false"><?php echo esc_html( $s ); ?></button><?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="docs"><?php foreach ( $docs as $d ) { get_template_part( 'template-parts/doctor-card', null, array( 'doc' => $d ) ); } ?></div>
  <?php else : ?>
    <div class="empty">
      <h3>Doctor profiles are being added</h3>
      <p>Profiles of our full-time and visiting consultants, with qualifications and consultation timings, will appear here. Until then, please call us for consultation days and timings.</p>
      <div class="facts2" style="justify-content:center"><a class="sbtn navy" href="<?php echo esc_attr( sunnah_tel() ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a><a class="sbtn wa" href="<?php echo esc_url( sunnah_wa() ); ?>"><svg><use href="#i-wa"/></svg>WhatsApp</a></div>
    </div>
  <?php endif; ?>
</div></section>
<section class="sec grey"><div class="w split">
  <div>
    <p class="kick">Appointments</p>
    <h2>Booking a consultation</h2>
    <p>Call or WhatsApp <a href="<?php echo esc_attr( sunnah_tel() ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a>, or send an enquiry online. Visiting consultants are available on fixed days, so please call before you travel.</p>
    <div class="acts"><a class="sbtn navy" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Book an Appointment</a><a class="sbtn out" href="<?php echo sunnah_url( 'contact', 'opd' ); ?>">OPD timings</a></div>
  </div>
  <div class="ph"><img src="<?php echo sunnah_img( 'sh-reception.jpg' ); ?>" alt="Reception at Sunnah Hospital" loading="lazy"></div>
</div></section>
</main>
<?php
get_footer();
