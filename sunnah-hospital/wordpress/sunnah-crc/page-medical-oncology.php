<?php
/**
 * Medical Oncology page (slug: medical-oncology).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-daycare.jpg', 'title' => 'Medical Oncology', 'lead' => 'Compassionate Care. Advanced Treatment. Better Outcomes.', 'crumbs' => array( array( 'Cancer Care', sunnah_url( 'cancer-care' ) ) ) ) );
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="lede">Our medical oncology department delivers safe and effective chemotherapy and targeted therapies for comprehensive cancer care.</p>
    <p>Medical oncology is the treatment of cancer with medicines. Depending on the type and stage of cancer, these may shrink a tumour before surgery, lower the chance of the cancer returning after surgery, or control the disease and relieve symptoms. Our oncologists explain the expected benefits and side effects before treatment begins.</p>

    <h2>Treatments</h2>
    <div class="svcg">
      <div class="svcc"><svg><use href="#i-vial"/></svg><h3>Chemotherapy (Day Care &amp; IPD)</h3><p>Given in planned cycles in day care, so you go home the same day, or as in-patient treatment when needed.</p></div>
      <div class="svcc"><svg><use href="#i-pill"/></svg><h3>Targeted Therapy</h3><p>Medicines that act on specific features of cancer cells, where tests show they will help.</p></div>
      <div class="svcc"><svg><use href="#i-shield"/></svg><h3>Immunotherapy</h3><p>Treatment that helps the body's own immune system fight the cancer.</p></div>
      <div class="svcc"><svg><use href="#i-heart"/></svg><h3>Supportive &amp; Palliative Care</h3><p>Relief of pain and other symptoms for a better quality of life.</p></div>
    </div>

    <h2>What to expect</h2>
    <ol class="steps">
      <li><b>Consultation</b><span>The oncologist reviews your reports and explains the diagnosis and treatment options.</span></li>
      <li><b>Treatment plan</b><span>You receive a clear plan with the medicines, the number of cycles and the likely costs.</span></li>
      <li><b>Day care or IPD</b><span>Most chemotherapy is given in day care. Some schedules need a short admission.</span></li>
      <li><b>Between cycles</b><span>Our team stays in touch about side effects, and the dietitian adjusts your diet as needed.</span></li>
      <li><b>Review</b><span>Tests show how well treatment is working, and the plan is adjusted if required.</span></li>
    </ol>

    <h2>Support during chemotherapy</h2>
    <ul class="ticks">
      <li><b>Specialised nutrition.</b> A dedicated oncology dietitian plans your diet during chemotherapy and recovery.</li>
      <li><b>Psychological support.</b> Professional counselling for patients and their families.</li>
      <li><b>Right guidance.</b> Honest advice that helps you avoid unnecessary investigations and expenses.</li>
      <li><b>Family education.</b> We teach caregivers how to help at home and when to call us.</li>
    </ul>

    <h2>Frequently asked questions</h2>
    <div class="faq">
      <details><summary>Will I need to be admitted for chemotherapy?</summary><p>Chemotherapy is available in day care and as in-patient (IPD) treatment. Your doctor will tell you in advance which suits your treatment.</p></details>
      <details><summary>What side effects should I expect?</summary><p>Side effects depend on the medicines used. Common ones include tiredness, nausea and a higher risk of infection. Most can be prevented or treated, and we explain what to watch for before each cycle.</p></details>
      <details><summary>What should I eat during treatment?</summary><p>Good nutrition helps you tolerate treatment and recover. Our oncology dietitian gives each patient a personal plan.</p></details>
      <details><summary>Can I continue working during treatment?</summary><p>Many patients do, with some adjustments. It depends on your treatment and how you feel, and your doctor can advise you.</p></details>
    </div>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Surgical Oncology', sunnah_url( 'surgical-oncology' ) ), array( 'Oncology Nutrition', sunnah_url( 'patient-care', 'nutrition' ) ), array( 'Patient Support', sunnah_url( 'patient-care' ) ) ) ) ); ?>
</div>
<?php get_template_part( 'template-parts/team', null, array( 'speciality' => 'Medical Oncology', 'heading' => 'Our Medical Oncologists' ) ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
