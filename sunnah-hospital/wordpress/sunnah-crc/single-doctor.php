<?php
/**
 * Single doctor profile.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
while ( have_posts() ) :
	the_post();
	$id    = get_the_ID();
	$spec  = sunnah_doc( $id, 'speciality' );
	$exp   = sunnah_doc( $id, 'experience' );
	$facts = array_filter(
		array(
			'Speciality'          => $spec,
			'Designation'         => sunnah_doc( $id, 'role' ),
			'Qualifications'      => sunnah_doc( $id, 'qualification' ),
			'Consultant'          => sunnah_doc( $id, 'type' ),
			'Experience'          => $exp ? ( is_numeric( $exp ) ? $exp . ' years' : $exp ) : '',
			'Languages'           => sunnah_doc( $id, 'languages' ),
			'Consultation days'   => sunnah_doc( $id, 'days' ),
			'OPD timings'         => sunnah_doc( $id, 'opd' ),
		)
	);
	$interests = sunnah_doc( $id, 'interests' );
	?>
<main id="content">
<div class="dtop"><div class="w"><a class="arw back" href="<?php echo sunnah_url( 'doctors' ); ?>">All doctors</a></div></div>
<div class="w dprof">
  <div>
    <div class="im"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'sunnah-portrait', array( 'alt' => get_the_title() ) ); } else { echo '<span class="ini" style="font-family:var(--serif);font-size:4rem;color:#9fb3ba" aria-hidden="true">Dr</span>'; } ?></div>
    <div class="sbx navyb" style="margin-top:16px">
      <h2 class="small" style="color:#fff">Appointments</h2>
      <p>Call or WhatsApp <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?> to book a consultation.</p>
      <a class="sbtn turq" href="<?php echo esc_attr( sunnah_tel() ); ?>">Call <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a>
      <a class="sbtn wa" href="<?php echo esc_url( sunnah_wa( 'Hello, I would like an appointment with ' . get_the_title() . '.' ) ); ?>"><svg><use href="#i-wa"/></svg>WhatsApp</a>
      <a class="sbtn line" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Send an enquiry</a>
    </div>
  </div>
  <div class="main">
    <?php if ( $spec ) : ?><p class="kick"><?php echo esc_html( $spec ); ?></p><?php endif; ?>
    <h1 style="font-size:clamp(2.2rem,4vw,3.2rem)"><?php echo esc_html( get_the_title() ); ?></h1>
    <?php if ( $facts ) : ?>
    <div class="dfacts"><?php foreach ( $facts as $k => $v ) : ?><div><small><?php echo esc_html( $k ); ?></small><b><?php echo esc_html( $v ); ?></b></div><?php endforeach; ?></div>
    <?php endif; ?>
    <?php if ( '' !== trim( get_the_content() ) ) : ?>
      <h2>Profile</h2>
      <div class="entry"><?php the_content(); ?></div>
    <?php endif; ?>
    <?php if ( $interests ) : ?>
      <h2>Clinical interests</h2>
      <p><?php echo esc_html( $interests ); ?></p>
    <?php endif; ?>
    <h2>Consultation</h2>
    <p><?php echo esc_html( sunnah_doc( $id, 'days' ) || sunnah_doc( $id, 'opd' ) ? 'Consultations are available on the days and timings shown above. Please call before visiting, as timings may change.' : 'Please call the hospital for consultation days and timings.' ); ?> Appointment contact: <a href="<?php echo esc_attr( sunnah_tel() ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a>.</p>
  </div>
</div>
</main>
	<?php
endwhile;
get_footer();
