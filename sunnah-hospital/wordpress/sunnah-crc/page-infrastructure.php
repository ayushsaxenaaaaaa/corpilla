<?php
/**
 * Hospital Infrastructure page (slug: infrastructure).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-ot.jpg', 'title' => 'Hospital Infrastructure', 'lead' => 'Better Facilities. Better Care. Better Outcomes.' ) );
?>
<main id="content">
<section class="sec"><div class="w split">
  <div>
    <p class="kick">Facilities Available</p>
    <h2>Advanced infrastructure and compassionate care</h2>
    <p>Everything needed for safe cancer treatment and comfortable recovery is in one hospital, so patients and families do not have to travel between centres during treatment.</p>
    <ul class="ticks two" style="margin-top:20px">
      <li>Advanced ICU Support</li><li>High Dependency Unit (HDU)</li><li>Modular Operation Theatre (OT)</li><li>Minor OT for Procedures</li><li>24x7 Casualty &amp; Emergency Care</li><li>Pharmacy 24x7</li><li>Dedicated Male &amp; Female Wards</li><li>Day Care Chemotherapy</li>
    </ul>
  </div>
  <div class="ph"><img src="<?php echo sunnah_img( 'sh-building.jpg' ); ?>" alt="Sunnah Hospital building, Akola" loading="lazy"></div>
</div></section>
<section class="sec grey"><div class="w">
  <h2 class="c">Inside Sunnah Hospital</h2>
  <p class="c">Photographs from our hospital in Akola.</p>
  <div class="gal">
    <figure class="w2 h2"><img src="<?php echo sunnah_img( 'sh-ot.jpg' ); ?>" alt="Modular operation theatre" loading="lazy"><figcaption>Modular OT</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-minor-ot.jpg' ); ?>" alt="Minor operation theatre" loading="lazy"><figcaption>Minor OT</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-icu.jpg' ); ?>" alt="Intensive care unit" loading="lazy"><figcaption>ICU</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-hdu.jpg' ); ?>" alt="High dependency unit" loading="lazy"><figcaption>HDU</figcaption></figure>
    <figure><img src="<?php echo sunnah_img( 'sh-casualty.jpg' ); ?>" alt="Casualty" loading="lazy"><figcaption>Casualty 24x7</figcaption></figure>
    <figure class="w2"><img src="<?php echo sunnah_img( 'sh-pharmacy.jpg' ); ?>" alt="Hospital pharmacy" loading="lazy"><figcaption>Pharmacy 24x7</figcaption></figure>
    <figure class="w2"><img src="<?php echo sunnah_img( 'sh-building.jpg' ); ?>" alt="Hospital building" loading="lazy"><figcaption>Sunnah Hospital</figcaption></figure>
  </div>
</div></section>
<section class="sec"><div class="w split rev">
  <div class="ph"><img src="<?php echo sunnah_img( 'sh-daycare.jpg' ); ?>" alt="Chemotherapy day care" loading="lazy"></div>
  <div>
    <p class="kick">Patient Comfort</p>
    <h2>A calm place to heal</h2>
    <ul class="ticks">
      <li><b>Dedicated male and female wards.</b> Privacy and comfort during admission.</li>
      <li><b>Space for family.</b> An attendant can stay with the patient.</li>
      <li><b>Diet from our dietitian.</b> Personalised nutrition for patients in cancer treatment.</li>
      <li><b>Pharmacy 24x7.</b> Medicines available within the hospital at any hour.</li>
    </ul>
    <div class="acts"><a class="sbtn navy" href="<?php echo sunnah_url( 'contact', 'location' ); ?>">Plan your visit</a></div>
  </div>
</div></section>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
