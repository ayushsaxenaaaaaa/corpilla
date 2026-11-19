<?php
/**
 * Doctors & Specialists page (slug: doctors). Doctors are added under "Doctors" in the WordPress admin.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-ot-suite.jpg', 'title' => 'Doctors & Specialists', 'lead' => 'The oncologists and specialists who will care for you.' ) );
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
      <p>To find the right specialist for your diagnosis, call us or send a message and our team will guide you.</p>
      <div class="facts2" style="justify-content:center"><a class="sbtn navy" href="<?php echo esc_attr( sunnah_tel() ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a><a class="sbtn wa" href="<?php echo esc_url( sunnah_wa() ); ?>"><svg><use href="#i-wa"/></svg>WhatsApp</a></div>
    </div>
  <?php endif; ?>
</div></section>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
