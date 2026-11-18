<?php
/**
 * Patient Care & Support page (slug: patient-care).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'consult.jpg', 'title' => 'Patient Care & Support', 'lead' => 'We support the patient, strengthen the family and guide them through every step of the journey.' ) );
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="kick">Our Unique Approach</p>
    <p class="lede">At Sunnah Hospital, we believe cancer care goes beyond medical treatment.</p>
    <p>A cancer diagnosis can bring fear, confusion and emotional stress to both patients and their families. Our commitment is to provide the right guidance, compassionate support and comprehensive care throughout their cancer journey. Along with specialised surgical and medical oncology, our patient-support approach focuses on five areas.</p>
    <div class="svcg">
      <div class="svcc" id="guidance"><svg><use href="#i-plan"/></svg><h3>Right Guidance</h3><p>Treatment navigation, informed decisions and guidance to avoid unnecessary investigations and expenses.</p></div>
      <div class="svcc" id="counselling"><svg><use href="#i-ppl"/></svg><h3>Psychological Support</h3><p>Professional counselling and emotional support for patients and their families.</p></div>
      <div class="svcc" id="nutrition"><svg><use href="#i-leaf"/></svg><h3>Specialized Nutrition</h3><p>A dedicated oncology dietitian for personalised nutrition during chemotherapy, after surgery and throughout recovery.</p></div>
      <div class="svcc" id="rehab"><svg><use href="#i-bed"/></svg><h3>Recovery &amp; Rehabilitation</h3><p>Post-treatment recovery guidance and supportive care.</p></div>
      <div class="svcc" id="wellness"><svg><use href="#i-heart"/></svg><h3>Lifestyle &amp; Wellness</h3><p>Long-term nutrition, lifestyle guidance and family education.</p></div>
      <div class="svcc" id="pain"><svg><use href="#i-shield"/></svg><h3>Pain Management</h3><p>Advanced pain relief and palliative care for a better quality of life.</p></div>
    </div>

    <h2>Your first visit</h2>
    <ol class="steps">
      <li><b>Before you come</b><span>Collect all reports, scans, biopsy slides and prescriptions. Book by phone, WhatsApp or the enquiry form.</span></li>
      <li><b>At the consultation</b><span>The doctor examines you, reviews your reports and explains the diagnosis and options.</span></li>
      <li><b>Your plan</b><span>You receive a clear treatment plan and an estimate of costs. Only the tests that are needed are advised.</span></li>
      <li><b>Support begins</b><span>You meet our counsellor and dietitian, and you know whom to call with questions.</span></li>
    </ol>

    <h2>What to bring</h2>
    <ul class="ticks two">
      <li>Photo ID and Ayushman Bharat (PM-JAY) card, if you have one</li>
      <li>All previous reports, scans and biopsy slides</li>
      <li>A list of the medicines you take</li>
      <li>A family member, if possible</li>
    </ul>

    <h2 id="faqs">Frequently asked questions</h2>
    <div class="faq">
      <details><summary>Do I need a referral to see a doctor?</summary><p>No. You can book an appointment directly.</p></details>
      <details><summary>Can I get a second opinion?</summary><p>Yes. Bring or send your reports and our specialists will review them and explain their advice.</p></details>
      <details><summary>Is treatment available under Ayushman Bharat (PM-JAY)?</summary><p>Yes. Cashless treatment is available for eligible patients under the PM-JAY scheme. Bring your card and our team will guide you.</p></details>
      <details><summary>How do you help with the cost of treatment?</summary><p>We aim to keep quality cancer care affordable. We explain the expected costs before treatment begins and advise only the investigations that are needed.</p></details>
      <details><summary>Is chemotherapy given in day care?</summary><p>Yes. Chemotherapy is given in day care, and as in-patient (IPD) treatment when needed.</p></details>
      <details><summary>Is counselling available for family members?</summary><p>Yes. Our counselling support is for patients and their families.</p></details>
      <details><summary>Who will plan my diet during treatment?</summary><p>A dedicated oncology dietitian plans personalised nutrition during chemotherapy, after surgery and throughout recovery.</p></details>
      <details><summary>Is there emergency care at night?</summary><p>Yes. Casualty and emergency care and the pharmacy are open 24x7, with ICU and HDU support.</p></details>
    </div>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Cancer Care', sunnah_url( 'cancer-care' ) ), array( 'Our Doctors', sunnah_url( 'doctors' ) ), array( 'Contact & Location', sunnah_url( 'contact' ) ) ) ) ); ?>
</div>
<section class="tiles"><div class="w tg">
  <div class="tile t-navy"><svg><use href="#i-ppl"/></svg><h3>For Families &amp; Caregivers</h3><p>We teach caregivers how to help with food, medicines and daily care at home, and when to contact the hospital.</p></div>
  <div class="tile t-teal"><svg><use href="#i-heart"/></svg><h3>After Treatment</h3><p>Recovery guidance, regular check-ups and long-term lifestyle advice help you return to normal life.</p></div>
</div></section>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
