<?php
/**
 * Cancer Care overview page (slug: cancer-care).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-corridor.jpg', 'title' => 'Cancer Care', 'lead' => 'From accurate diagnosis to treatment and recovery, we stand with you.' ) );
$types = array(
	array( 'Breast Cancer', 'Surgery and medical treatment', 'surgical-oncology' ),
	array( 'Oral (Mouth) Cancer', 'Head & neck', 'surgical-oncology' ),
	array( 'Throat Cancer', 'Head & neck', 'surgical-oncology' ),
	array( 'Thyroid Cancer', 'Head & neck', 'surgical-oncology' ),
	array( 'Oesophageal (Food Pipe) Cancer', 'Gastrointestinal', 'surgical-oncology' ),
	array( 'Stomach Cancer', 'Gastrointestinal', 'surgical-oncology' ),
	array( 'Colon & Rectal Cancer', 'Gastrointestinal', 'surgical-oncology' ),
	array( 'Liver & Gallbladder Cancer', 'Gastrointestinal', 'surgical-oncology' ),
	array( 'Pancreatic Cancer', 'Gastrointestinal', 'surgical-oncology' ),
	array( 'Cervical Cancer', 'Gynecological', 'surgical-oncology' ),
	array( 'Ovarian Cancer', 'Gynecological', 'surgical-oncology' ),
	array( 'Uterine Cancer', 'Gynecological', 'surgical-oncology' ),
	array( 'Lung Cancer', 'Medical oncology', 'medical-oncology' ),
	array( 'Lymphoma', 'Medical oncology', 'medical-oncology' ),
	array( 'Leukaemia', 'Medical oncology', 'medical-oncology' ),
	array( 'Prostate Cancer', 'Medical oncology', 'medical-oncology' ),
	array( 'Kidney & Bladder Cancer', 'Medical oncology', 'medical-oncology' ),
	array( 'Other cancers', 'Ask our care team', 'contact' ),
);
?>
<main id="content">
<section class="w hl" style="padding-bottom:20px">
  <h2>Our Departments</h2>
  <div class="cards">
    <a href="<?php echo sunnah_url( 'surgical-oncology' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-ot-suite.jpg' ); ?>" alt="" loading="lazy"></div><h3>Surgical Oncology</h3><p>Head &amp; neck, breast, gastrointestinal and gynecological cancer surgery.</p></a>
    <a href="<?php echo sunnah_url( 'medical-oncology' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-daycare.jpg' ); ?>" alt="" loading="lazy"></div><h3>Medical Oncology</h3><p>Chemotherapy in day care and IPD, targeted therapy, immunotherapy and palliative care.</p></a>
    <a href="#diagnostics"><div class="im"><img src="<?php echo sunnah_img( 'sh-diagnostic.jpg' ); ?>" alt="" loading="lazy"></div><h3>Diagnostics</h3><p>Digital X-Ray, sonography and pathology for accurate, reliable detection.</p></a>
    <a href="<?php echo sunnah_url( 'research' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-lab.jpg' ); ?>" alt="" loading="lazy"></div><h3>Cancer Research</h3><p>Clinical research, cancer data and community awareness.</p></a>
  </div>
</section>

<section class="sec grey" id="diagnostics"><div class="w split">
  <div class="ph"><img src="<?php echo sunnah_img( 'sh-diagnostic.jpg' ); ?>" alt="Diagnostic imaging room" loading="lazy"></div>
  <div>
    <p class="kick">Diagnostics</p>
    <h2>Advanced Diagnostics. Trusted Results.</h2>
    <p>Our diagnostic facilities provide accurate and reliable detection for a wide range of medical conditions, so treatment can be planned without delay.</p>
    <ul class="ticks two"><li>Digital X-Ray</li><li>Sonography</li><li>Pathology</li><li>Other diagnostic facilities</li></ul>
    <div class="acts"><a class="sbtn navy" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Book a test</a></div>
  </div>
</div></section>

<section class="sec"><div class="w">
  <h2 class="c">Comprehensive Cancer Care</h2>
  <p class="c">Compassionate care. Stronger together. Better every day.</p>
  <div class="svcg" style="grid-template-columns:repeat(auto-fit,minmax(240px,1fr))">
    <div class="svcc"><svg><use href="#i-plan"/></svg><h3>Diagnosis to Recovery</h3><p>From accurate diagnosis to treatment and recovery, we stand with you.</p></div>
    <div class="svcc"><svg><use href="#i-heart"/></svg><h3>Pain Management</h3><p>Advanced pain relief and palliative care for a better quality of life.</p></div>
    <div class="svcc"><svg><use href="#i-leaf"/></svg><h3>Nutritional Support</h3><p>Personalised nutrition guidance for you and your family.</p></div>
    <div class="svcc"><svg><use href="#i-ppl"/></svg><h3>Psychological Support</h3><p>Dedicated care for the emotional well-being of patients and families.</p></div>
  </div>
</div></section>

<section class="sec grey" id="types"><div class="w">
  <h2 class="c">Cancer Types We Treat</h2>
  <p class="c">Search for a cancer type. If yours is not listed, our team will still guide you.</p>
  <label class="sbox" for="typefilter" style="max-width:560px;margin:0 auto 28px"><svg><use href="#i-s"/></svg><input id="typefilter" type="search" placeholder="Search, e.g. breast, mouth, stomach" autocomplete="off"></label>
  <ul class="tlist" id="typelist">
    <?php foreach ( $types as $t ) : ?>
      <li><a href="<?php echo 'contact' === $t[2] ? sunnah_url( 'contact', 'enquiry' ) : sunnah_url( $t[2] ); ?>"><span><?php echo esc_html( $t[0] ); ?><small><?php echo esc_html( $t[1] ); ?></small></span></a></li>
    <?php endforeach; ?>
  </ul>
  <p id="typenone" hidden style="text-align:center;margin-top:20px">No match found. <a class="arw" style="display:inline-flex" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Ask our care team</a></p>
</div></section>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
