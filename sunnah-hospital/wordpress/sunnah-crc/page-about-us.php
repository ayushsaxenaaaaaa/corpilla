<?php
/**
 * About Us page (slug: about-us).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-building.jpg', 'title' => 'About Us', 'lead' => 'A dedicated cancer center for the people of Vidarbha.' ) );
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="kick">Sunnah Cancer Research Center</p>
    <p class="lede">Sunnah Cancer Research Center is a dedicated unit of Sunnah Hospital, Akola, committed to providing comprehensive, compassionate and affordable cancer care to the people of Vidarbha.</p>
    <p>We believe that every patient deserves not just treatment, but emotional strength, dignity and support throughout their journey. A cancer diagnosis affects the whole family, so our care includes honest guidance, counselling, nutrition and help with recovery, alongside surgical and medical oncology.</p>
    <h2 id="approach">Our approach combines</h2>
    <div class="svcg">
      <div class="svcc"><svg><use href="#i-flask"/></svg><h3>Advanced medical science</h3><p>Evidence-based surgery, chemotherapy and targeted treatment, supported by in-house diagnostics.</p></div>
      <div class="svcc"><svg><use href="#i-ppl"/></svg><h3>Skilled oncology specialists</h3><p>Surgical and medical oncologists who plan each patient's treatment together.</p></div>
      <div class="svcc"><svg><use href="#i-heart"/></svg><h3>Deep human compassion</h3><p>Care that treats every patient and family with respect and dignity.</p></div>
      <div class="svcc"><svg><use href="#i-shield"/></svg><h3>Affordable treatment</h3><p>Quality care that is accessible, with cashless treatment under Ayushman Bharat (PM-JAY) for eligible patients.</p></div>
    </div>
    <h2 id="why">Why choose us</h2>
    <ul class="ticks two">
      <li><b>Experienced oncology team.</b> Highly qualified specialists with years of expertise in cancer care.</li>
      <li><b>Affordable treatment options.</b> Quality cancer care that is accessible and affordable for all.</li>
      <li><b>PM-JAY support.</b> Cashless treatment facility under the Ayushman Bharat (PM-JAY) scheme.</li>
      <li><b>Patient-centred care.</b> Personalised treatment and compassionate care at every step.</li>
      <li><b>Emotional and family support.</b> Counselling and support for patients and their families.</li>
      <li><b>Modern infrastructure.</b> Modular OT, ICU, HDU and 24x7 casualty for better outcomes.</li>
    </ul>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Cancer Care', sunnah_url( 'cancer-care' ) ), array( 'Our Doctors', sunnah_url( 'doctors' ) ), array( 'Hospital Facilities', sunnah_url( 'infrastructure' ) ) ) ) ); ?>
</div>

<section class="help" id="philosophy"><div class="w">
  <h2>Our Philosophy: Hope. Health. Humanity.</h2>
  <div class="hg">
    <div class="tile t-navy"><h3>Hope</h3><p>Giving strength in difficult times.</p></div>
    <div class="tile t-black"><h3>Health</h3><p>Providing the best possible treatment.</p></div>
    <div class="tile t-turq"><h3>Humanity</h3><p>Standing with patients beyond medicine.</p></div>
  </div>
</div></section>

<section class="sec" id="promise"><div class="w split">
  <div class="ph"><img src="<?php echo sunnah_img( 'sh-ot.jpg' ); ?>" alt="Modular operation theatre at Sunnah Hospital" loading="lazy"></div>
  <div>
    <p class="kick">Our Promise</p>
    <h2>We don't just treat cancer.</h2>
    <p>We support the patient, strengthen the family and guide them through every step of the journey. Right Treatment. Right Guidance. Compassionate Care.</p>
    <div class="acts"><a class="sbtn navy" href="<?php echo sunnah_url( 'patient-care' ); ?>">How we support patients</a><a class="sbtn out" href="<?php echo sunnah_url( 'contact' ); ?>">Contact us</a></div>
  </div>
</div></section>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
