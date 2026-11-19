<?php
/**
 * Diagnostics page (slug: diagnostics).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-diagnostic.jpg', 'title' => 'Diagnostics', 'lead' => 'Advanced Diagnostics. Trusted Results. Complete Care.' ) );
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="lede">Our advanced diagnostic facilities provide accurate and reliable detection for a wide range of medical conditions.</p>
    <p>An accurate diagnosis is the first step to the right treatment. Having tests done in the same hospital as your consultation saves travel and time, and lets your doctors plan treatment without delay.</p>

    <h2>Diagnostic services</h2>
    <div class="svcg">
      <div class="svcc"><svg><use href="#i-scan"/></svg><h3>Digital X-Ray</h3><p>Clear digital images that help doctors assess the chest, bones and other areas.</p></div>
      <div class="svcc"><svg><use href="#i-treat"/></svg><h3>Sonography</h3><p>Ultrasound imaging to examine organs and guide further tests where needed.</p></div>
      <div class="svcc"><svg><use href="#i-vial"/></svg><h3>Pathology</h3><p>Laboratory tests on blood and tissue samples that guide diagnosis and treatment.</p></div>
      <div class="svcc"><svg><use href="#i-flask"/></svg><h3>Other Diagnostic Facilities</h3><p>Additional tests as advised by your doctor. Ask our team what is available.</p></div>
    </div>

    <h2>Booking a test</h2>
    <ol class="steps">
      <li><b>Call or WhatsApp us</b><span>Tell us which test your doctor has advised, or ask our team for guidance.</span></li>
      <li><b>Visit the hospital</b><span>Bring your doctor's advice, previous reports and photo ID.</span></li>
      <li><b>Collect your report</b><span>Our team will tell you when your report will be ready, and our doctors can explain the results.</span></li>
    </ol>

    <h2>Frequently asked questions</h2>
    <div class="faq">
      <details><summary>Can I get tests done without seeing a doctor first?</summary><p>Please call us first. Our team will tell you whether the test needs a doctor's advice and help you book it.</p></details>
      <details><summary>Can your doctors review reports from another hospital?</summary><p>Yes. Bring or send your previous reports and our specialists will review them and explain their advice.</p></details>
      <details><summary>Are tests covered under Ayushman Bharat (PM-JAY)?</summary><p>Tests that are part of covered treatment can be included for eligible patients. Bring your card and our team will guide you.</p></details>
    </div>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Surgical Oncology', sunnah_url( 'surgical-oncology' ) ), array( 'Medical Oncology', sunnah_url( 'medical-oncology' ) ), array( 'Cancer Care', sunnah_url( 'cancer-care' ) ) ) ) ); ?>
</div>
<?php get_template_part( 'template-parts/team', null, array( 'speciality' => 'Diagnostics', 'heading' => 'Our Diagnostics Team' ) ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
