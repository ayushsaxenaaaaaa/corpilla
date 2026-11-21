<?php
/**
 * Health Awareness & Resources page (slug: health-awareness).
 * Articles are Posts in the "Health Articles" category, approved by the hospital's doctors.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-reception.jpg', 'title' => 'Health Awareness & Resources', 'lead' => 'Reliable health information for patients and families.' ) );
$sunnah_articles = sunnah_crc_posts( array( 'health-articles' ), 12 );
$sunnah_topics   = array(
	'Understanding cancer',
	'Common warning signs and symptoms',
	'The importance of timely medical evaluation',
	'Cancer screening and early diagnosis',
	'Understanding biopsy and diagnostic reports',
	'Preparing for cancer treatment',
	'Follow-up after cancer surgery or treatment',
	'Supportive care for patients and families',
);
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="lede">Sunnah Hospital believes that access to reliable health information is an important part of healthcare.</p>
    <p>This section provides educational information to help patients and families understand common health conditions, prevention, screening, treatment and follow-up.</p>
    <p class="note"><b>Important:</b> Information on this website is educational and does not replace individual medical consultation, diagnosis or treatment. If you have symptoms or questions about your health, please consult a doctor.</p>

    <h2 id="articles">Articles</h2>
    <?php if ( $sunnah_articles ) : ?>
      <div class="ncards two"><?php foreach ( $sunnah_articles as $n ) { get_template_part( 'template-parts/news-card', null, array( 'post' => $n ) ); } ?></div>
    <?php else : ?>
      <p class="ask">Articles reviewed by our doctors will be published here.</p>
    <?php endif; ?>

    <h2 id="cancer">Cancer awareness</h2>
    <p>Topics covered in our cancer awareness articles:</p>
    <ul class="ticks two"><?php foreach ( $sunnah_topics as $t ) : ?><li><?php echo esc_html( $t ); ?></li><?php endforeach; ?></ul>

    <h2 id="general">General health awareness</h2>
    <p>Information on common medical conditions, preventive health, healthy lifestyle practices and the importance of appropriate medical consultation.</p>

    <h2 id="resources">Patient education resources</h2>
    <ul class="ticks two">
      <li><a href="<?php echo sunnah_url( 'contact', 'patient-info' ); ?>">General admission guidance</a></li>
      <li><a href="<?php echo sunnah_url( 'cancer-care', 'chemotherapy' ); ?>">Preparing for chemotherapy</a></li>
      <li><a href="<?php echo sunnah_url( 'cancer-care', 'continuing-care' ); ?>">Continuing care after treatment</a></li>
      <li><a href="<?php echo sunnah_url( 'contact', 'opd' ); ?>">OPD and appointment information</a></li>
    </ul>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Cancer Research Centre', sunnah_url( 'cancer-care' ) ), array( 'Departments', sunnah_url( 'departments' ) ), array( 'News', sunnah_url( 'news' ) ) ) ) ); ?>
</div>
</main>
<?php
get_footer();
