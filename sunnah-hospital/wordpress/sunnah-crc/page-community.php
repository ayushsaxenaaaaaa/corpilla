<?php
/**
 * Community Impact & Institutional Partnerships page (slug: community).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-building-side.jpg', 'title' => 'Community Impact & Partnerships', 'lead' => 'Serving the healthcare needs of people in Akola and surrounding areas.' ) );
$sunnah_activities = sunnah_crc_posts( array( 'awareness-activities', 'events-programmes' ), 3 );
$sunnah_part       = sunnah_rich( 'partnerships' );
$sunnah_init       = sunnah_rich( 'initiatives' );
$sunnah_scheme     = sunnah_rich( 'scheme_info' );
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="kick">Serving the Community</p>
    <p class="lede">Sunnah Hospital was established with a commitment to serving the healthcare needs of people in Akola and surrounding areas.</p>
    <p>Alongside its regular medical services, this page documents the hospital's community-oriented activities, institutional initiatives and verified collaborations.</p>

    <h2 id="initiatives">Community health initiatives</h2>
    <p>Health awareness activities, screening programmes, medical camps and other community health initiatives conducted by the hospital.</p>
    <?php if ( $sunnah_activities ) : ?>
      <div class="ncards two"><?php foreach ( $sunnah_activities as $n ) { get_template_part( 'template-parts/news-card', null, array( 'post' => $n ) ); } ?></div>
    <?php else : ?>
      <p class="ask">Details of programmes will be published here with dates, locations and photographs.</p>
    <?php endif; ?>

    <h2 id="schemes">Government healthcare schemes</h2>
    <div class="schm inline">
      <div><b>AB-PMJAY</b><span>Ayushman Bharat – Pradhan Mantri Jan Arogya Yojana</span></div>
      <div><b>MJPJAY</b><span>Mahatma Jyotirao Phule Jan Arogya Yojana, Maharashtra</span></div>
    </div>
    <p>These schemes are relevant to the hospital's cancer and general surgery services. Patients can enquire with the hospital about treatment under these schemes.</p>
    <?php
    if ( $sunnah_scheme ) {
		echo '<div class="entry">' . $sunnah_scheme . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post.
	} else {
		echo sunnah_ask_line( 'For empanelment status, approved treatment packages, eligibility and required documents,' ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
	?>
    <p class="note">Not all patients are eligible and not every treatment is covered. Scheme benefits depend on the applicable rules, approved packages and hospital empanelment.</p>

    <?php if ( $sunnah_part ) : ?>
      <h2 id="partnerships">Institutional partnerships</h2>
      <div class="entry"><?php echo $sunnah_part; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post. ?></div>
    <?php endif; ?>

    <?php if ( $sunnah_init ) : ?>
      <h2 id="development">Institutional development &amp; healthcare initiatives</h2>
      <div class="entry"><?php echo $sunnah_init; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post. ?></div>
    <?php endif; ?>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'News & Medical Achievements', sunnah_url( 'news' ) ), array( 'Health Awareness & Resources', sunnah_url( 'health-awareness' ) ), array( 'About Us', sunnah_url( 'about-us' ) ) ) ) ); ?>
</div>
</main>
<?php
get_footer();
