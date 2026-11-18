<?php
/**
 * Surgical Oncology page (slug: surgical-oncology).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-ot-suite.jpg', 'title' => 'Surgical Oncology', 'lead' => 'Precision Surgery. Compassionate Care. Better Outcomes.', 'crumbs' => array( array( 'Cancer Care', sunnah_url( 'cancer-care' ) ) ) ) );
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="lede">Our skilled surgical team provides advanced and safe surgical solutions for a wide range of cancers.</p>
    <p>For many cancers, surgery offers the best chance of cure. A surgical oncologist is a surgeon trained to operate on cancer: to remove the tumour with a safe margin, examine the nearby lymph nodes and preserve as much normal function as possible. At Sunnah Hospital, surgery is planned together with our medical oncology team, so it fits into one complete treatment plan.</p>

    <h2>Surgical services</h2>
    <div class="svcg">
      <div class="svcc"><svg><use href="#i-scalpel"/></svg><h3>Head &amp; Neck Cancer Surgery</h3><p>Surgery for cancers of the mouth, throat and thyroid.</p></div>
      <div class="svcc"><svg><use href="#i-scalpel"/></svg><h3>Breast Cancer Surgery</h3><p>Breast-conserving surgery where suitable, and mastectomy when needed.</p></div>
      <div class="svcc"><svg><use href="#i-scalpel"/></svg><h3>Gastrointestinal Cancer Surgery</h3><p>Surgery for cancers of the food pipe, stomach, intestine and related organs.</p></div>
      <div class="svcc"><svg><use href="#i-scalpel"/></svg><h3>Gynecological Cancer Surgery</h3><p>Surgery for cancers of the cervix, ovary and uterus.</p></div>
    </div>
    <p class="note">Operations are performed in our Modular Operation Theatre, with a Minor OT for procedures, and ICU and HDU support after surgery.</p>

    <h2>What to expect</h2>
    <ol class="steps">
      <li><b>Consultation</b><span>The surgeon reviews your reports, examines you and explains the options in plain language.</span></li>
      <li><b>Planning and fitness tests</b><span>Your plan is discussed by the team, and tests are done to make sure you are fit for surgery.</span></li>
      <li><b>Surgery</b><span>Your operation is carried out by the surgical oncology team, with anaesthesia and nursing staff experienced in cancer care.</span></li>
      <li><b>Recovery</b><span>We help you move, eat and manage pain as early as it is safe, with our dietitian guiding your nutrition.</span></li>
      <li><b>Follow-up</b><span>Your final report is explained to you, with any further treatment and a schedule of check-ups.</span></li>
    </ol>

    <h2>Support around your surgery</h2>
    <ul class="ticks">
      <li><b>Right guidance.</b> Clear advice on which tests and treatments you need, and which you do not.</li>
      <li><b>Counselling.</b> Emotional support for you and your family before and after the operation.</li>
      <li><b>Nutrition after surgery.</b> A personalised diet plan from our oncology dietitian.</li>
      <li><b>Recovery guidance.</b> Advice on wound care, activity and returning to daily life.</li>
    </ul>

    <h2>Frequently asked questions</h2>
    <div class="faq">
      <details><summary>Does every cancer patient need surgery?</summary><p>No. It depends on the type and stage of cancer. Some patients are treated with surgery alone, some with medicines, and many with a combination. Your doctors will explain what is right for you.</p></details>
      <details><summary>How long will I stay in hospital?</summary><p>This depends on the operation and your general health. Your surgeon will give you an estimate before admission.</p></details>
      <details><summary>Will I need chemotherapy after surgery?</summary><p>Sometimes. The decision is made after the removed tissue is examined in the laboratory, and your doctors will discuss it with you.</p></details>
      <details><summary>Is surgery covered under PM-JAY?</summary><p>Many cancer surgeries are covered for eligible patients under Ayushman Bharat (PM-JAY). Bring your card and our team will guide you.</p></details>
    </div>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Medical Oncology', sunnah_url( 'medical-oncology' ) ), array( 'Diagnostics', sunnah_url( 'cancer-care', 'diagnostics' ) ), array( 'Patient Support', sunnah_url( 'patient-care' ) ) ) ) ); ?>
</div>
<?php get_template_part( 'template-parts/team', null, array( 'speciality' => 'Surgical Oncology', 'heading' => 'Our Surgical Oncologists' ) ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
