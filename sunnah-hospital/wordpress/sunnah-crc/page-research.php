<?php
/**
 * Cancer Research page (slug: research).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-lab.jpg', 'title' => 'Cancer Research Center', 'lead' => 'Together for a cancer-free tomorrow.' ) );
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="kick">Advanced Research. Better Outcomes.</p>
    <p class="lede">Research is part of our name because it is part of how we care. The questions our doctors study come from the patients they see every day.</p>
    <p>The Cancer Research Center at Sunnah Hospital supports careful record-keeping, review of treatment results and studies approved by the appropriate ethics committee. The aim is practical: earlier detection, better treatment decisions and better support for patients and families in Vidarbha.</p>
    <h2 id="focus">Where we focus</h2>
    <div class="svcg">
      <div class="svcc"><svg><use href="#i-flask"/></svg><h3>Clinical research</h3><p>Studying the results of surgical and medical cancer treatment, so our own practice keeps improving.</p></div>
      <div class="svcc"><svg><use href="#i-treat"/></svg><h3>Cancer data</h3><p>Recording the types and stages of cancer we see, to understand the needs of our region.</p></div>
      <div class="svcc"><svg><use href="#i-ppl"/></svg><h3>Awareness and early detection</h3><p>Educating the community about warning signs and screening, because cancer found early is easier to treat.</p></div>
      <div class="svcc"><svg><use href="#i-shield"/></svg><h3>Ethics and consent</h3><p>Every study is approved before it begins. Taking part is voluntary and patient information is kept confidential.</p></div>
    </div>
    <h2 id="for-patients">For patients</h2>
    <ul class="ticks">
      <li><b>Your treatment comes first.</b> Declining to take part in a study never affects your care.</li>
      <li><b>Your privacy is protected.</b> Information used in research is kept confidential.</li>
      <li><b>You can ask questions.</b> Our doctors will explain any study before you decide.</li>
    </ul>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'About Us', sunnah_url( 'about-us' ) ), array( 'Cancer Care', sunnah_url( 'cancer-care' ) ), array( 'Contact the research team', sunnah_url( 'contact', 'enquiry' ) ) ) ) ); ?>
</div>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
