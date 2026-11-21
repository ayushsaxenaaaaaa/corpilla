<?php
/**
 * Sunnah Dental Care page (slug: dental-care).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-building-side.jpg', 'title' => 'Sunnah Dental Care', 'lead' => 'Healthy smiles for the whole family, within Sunnah Hospital.' ) );
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <div class="dlogo"><img src="<?php echo sunnah_img( 'dental-logo.jpg' ); ?>" alt="Sunnah Dental Care" width="760" height="141"></div>
    <p class="lede">Sunnah Dental Care provides complete dental treatment for children and adults, with the support of a full hospital behind it.</p>
    <p>Good oral health matters at every age, and it matters even more for people having cancer treatment. Our dental team works closely with the hospital's doctors, so patients can have dental problems checked and treated before and during chemotherapy or surgery.</p>

    <h2 id="treatments">Dental treatments</h2>
    <div class="svcg">
      <div class="svcc"><svg><use href="#i-shield"/></svg><h3>Check-ups &amp; Cleaning</h3><p>Regular dental check-ups, scaling and polishing to keep teeth and gums healthy.</p></div>
      <div class="svcc"><svg><use href="#i-plan"/></svg><h3>Fillings</h3><p>Tooth-coloured fillings to repair cavities and small breaks.</p></div>
      <div class="svcc"><svg><use href="#i-heart"/></svg><h3>Root Canal Treatment</h3><p>Treatment that relieves tooth pain and saves an infected tooth.</p></div>
      <div class="svcc"><svg><use href="#i-scalpel"/></svg><h3>Extractions</h3><p>Safe removal of damaged teeth, including wisdom teeth.</p></div>
      <div class="svcc"><svg><use href="#i-ppl"/></svg><h3>Crowns, Bridges &amp; Dentures</h3><p>Replacing missing or badly damaged teeth so you can eat and smile with confidence.</p></div>
      <div class="svcc"><svg><use href="#i-sun"/></svg><h3>Children's Dentistry</h3><p>Gentle dental care for children, and advice for parents on protecting young teeth.</p></div>
    </div>

    <h2 id="oral-screening">Oral cancer screening</h2>
    <p>Mouth cancer is common in our region, often linked to tobacco and gutkha use, and it is easier to treat when found early. A dental check-up includes a careful look at the mouth, tongue and gums. If anything needs attention, our dentists can refer you to the cancer specialists at the hospital for further evaluation.</p>
    <ul class="ticks two">
      <li>White or red patches in the mouth</li>
      <li>A mouth ulcer that does not heal in 2 weeks</li>
      <li>A lump or thickening in the cheek or neck</li>
      <li>Difficulty opening the mouth or swallowing</li>
    </ul>
    <p class="note">If you notice any of these signs, book a check-up without delay. This information is for awareness and does not replace a consultation.</p>

    <h2>Frequently asked questions</h2>
    <div class="faq">
      <details><summary>How often should I have a dental check-up?</summary><p>Most people should have a check-up every six months, or as advised by your dentist.</p></details>
      <details><summary>I am having cancer treatment. Should I see a dentist first?</summary><p>Yes. Treating dental problems before chemotherapy, or surgery can prevent infections and complications. Our dental and cancer teams work together on this.</p></details>
      <details><summary>Is root canal treatment painful?</summary><p>The procedure is done under local anaesthesia, so most patients feel little discomfort. It usually relieves the pain caused by the infected tooth.</p></details>
    </div>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Cancer screening & biopsy', sunnah_url( 'cancer-care', 'screening' ) ), array( 'All departments', sunnah_url( 'departments' ) ), array( 'Contact & location', sunnah_url( 'contact' ) ) ) ) ); ?>
</div>
<?php get_template_part( 'template-parts/team', null, array( 'speciality' => array( 'Dental', 'Dental Care' ), 'heading' => 'Our Dental Team' ) ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
