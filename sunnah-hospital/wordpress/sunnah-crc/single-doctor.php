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
	$id   = get_the_ID();
	$spec = sunnah_doc( $id, 'speciality' );
	$exp  = sunnah_doc( $id, 'experience' );
	$facts = array_filter(
		array(
			'Speciality'     => $spec,
			'Qualifications' => sunnah_doc( $id, 'qualification' ),
			'Experience'     => $exp ? $exp . '+ years' : '',
			'Languages'      => sunnah_doc( $id, 'languages' ),
			'OPD'            => sunnah_doc( $id, 'opd' ),
			'Designation'    => sunnah_doc( $id, 'role' ),
		)
	);
	?>
<main id="content">
<div class="dtop"><div class="w"><a class="arw back" href="<?php echo sunnah_url( 'doctors' ); ?>">All doctors</a></div></div>
<div class="w dprof">
  <div>
    <div class="im"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'sunnah-portrait', array( 'alt' => get_the_title() ) ); } else { echo '<span class="ini" style="font-family:var(--serif);font-size:4rem;color:#9fb3ba" aria-hidden="true">Dr</span>'; } ?></div>
    <div class="facts2" style="margin-top:16px"><a class="sbtn navy" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Request an appointment</a><a class="sbtn wa" href="<?php echo esc_url( sunnah_wa( 'Hello, I would like an appointment with ' . get_the_title() . '.' ) ); ?>"><svg><use href="#i-wa"/></svg>WhatsApp</a></div>
  </div>
  <div class="main">
    <?php if ( $spec ) : ?><p class="kick"><?php echo esc_html( $spec ); ?></p><?php endif; ?>
    <h1 style="font-size:clamp(2.2rem,4vw,3.2rem)"><?php echo esc_html( get_the_title() ); ?></h1>
    <?php if ( $facts ) : ?>
    <div class="dfacts"><?php foreach ( $facts as $k => $v ) : ?><div><small><?php echo esc_html( $k ); ?></small><b><?php echo esc_html( $v ); ?></b></div><?php endforeach; ?></div>
    <?php endif; ?>
    <div class="entry" style="margin-top:28px"><?php the_content(); ?></div>
  </div>
</div>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
	<?php
endwhile;
get_footer();
