<?php
/**
 * Home page template.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<main>
<section class="hero">
  <img src="<?php echo sunnah_img( 'sh-reception.jpg' ); ?>" alt="Doctors at Sunnah Hospital discussing a patient’s care" fetchpriority="high">
  <div class="w"><div class="hq">
    <h1>“We don’t just treat cancer.”</h1>
    <p class="who">Our Promise<span>Sunnah Cancer Research Center</span></p>
    <a href="<?php echo sunnah_url( 'patient-care' ); ?>">How we support the patient and strengthen the family</a>
  </div></div>
</section>

<div class="bblue"><b>Let’s get started.</b> <a href="<?php echo sunnah_url( 'contact' ); ?>">Request an appointment online.</a></div>

<section class="bred"><div class="w">
  <svg viewBox="0 0 48 48" aria-hidden="true"><use href="#i-drop"/></svg>
  <div><b>Newly diagnosed? Send us your reports.</b><p>Share your biopsy, scans and prescriptions on WhatsApp. Our team will guide you to the right treatment and help you avoid unnecessary tests and expenses.</p></div>
  <a class="olbtn" href="<?php echo esc_url( sunnah_wa() ); ?>">Send reports on WhatsApp</a>
</div></section>

<div class="w two">
  <div>
    <div class="sblock">
      <span class="circ c1"><svg><use href="#i-cell"/></svg></span>
      <h2>Search Cancer Types</h2>
      <label class="sbox" for="q"><svg><use href="#i-s"/></svg><input id="q" type="search" placeholder="Search by type of cancer" autocomplete="off"></label>
      <div class="sres" id="sres" hidden></div>
      <a class="arw" href="<?php echo sunnah_url( 'cancer-care', 'types' ); ?>">Browse cancer types</a>
    </div>
    <div class="sblock">
      <span class="circ c2"><svg><use href="#i-treat"/></svg></span>
      <h2>Our Treatments</h2>
      <label class="sbox" for="q2"><svg><use href="#i-s"/></svg><input id="q2" type="search" placeholder="Surgery, chemotherapy, diagnostics…" autocomplete="off"></label>
      <div class="sres" id="sres2" hidden></div>
      <a class="arw" href="<?php echo sunnah_url( 'cancer-care' ); ?>">Browse treatments</a>
    </div>
  </div>
  <div class="plan">
    <span class="circ c3"><svg><use href="#i-plan"/></svg></span>
    <h2>Plan Your Care</h2>
    <ul>
      <li><a href="<?php echo sunnah_url( 'patient-care' ); ?>"><b>Prepare for your first visit</b><span>Bring your reports, scans and prescriptions, and a family member if possible.</span><i>›</i></a></li>
      <li><a href="<?php echo sunnah_url( 'patient-care', 'faqs' ); ?>"><b>Check PM-JAY coverage</b><span>Cashless treatment is available for eligible patients under Ayushman Bharat.</span><i>›</i></a></li>
      <li><a href="<?php echo sunnah_url( 'contact' ); ?>"><b>Plan your travel to Akola</b><span><?php echo esc_html( sunnah_opt( 'address' ) ); ?>. Get directions and contact details.</span><i>›</i></a></li>
      <li><a href="<?php echo sunnah_url( 'medical-oncology' ); ?>"><b>Chemotherapy day care</b><span>Treatment without an overnight stay, or as in-patient care when needed.</span><i>›</i></a></li>
    </ul>
    <a class="arw" href="<?php echo sunnah_url( 'patient-care' ); ?>">View planning resources</a>
  </div>
</div>

<section class="why"><div class="w">
  <div class="dbox">
    <div class="ribbon"><b>24x7</b><span>Casualty</span></div>
    <h3>Emergency care, day and night</h3>
    <p>With ICU, HDU and a 24x7 pharmacy</p>
  </div>
  <div>
    <h2>Why Choose Sunnah Hospital</h2>
    <p class="lead">Sunnah Cancer Research Center is a dedicated unit of Sunnah Hospital, committed to comprehensive, compassionate and affordable cancer care for the people of Vidarbha. Our approach combines advanced medical science, skilled oncology specialists and deep human compassion, because every patient deserves not just treatment, but emotional strength, dignity and support.</p>
    <a class="lnk" href="<?php echo sunnah_url( 'about-us' ); ?>">Learn more about Sunnah Hospital</a>
  </div>
</div></section>

<section class="stmt">
  <img src="<?php echo sunnah_img( 'sh-ot.jpg' ); ?>" alt="" loading="lazy">
  <div class="in">
    <h2>Precision Surgery. Compassionate Care. Better Outcomes.</h2>
    <hr>
    <a href="<?php echo sunnah_url( 'surgical-oncology' ); ?>">Explore surgical oncology →</a>
  </div>
</section>

<section class="w hl">
  <h2>Sunnah Hospital Highlights</h2>
  <div class="cards">
    <a href="<?php echo sunnah_url( 'surgical-oncology' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-ot-suite.jpg' ); ?>" alt="" loading="lazy"></div><h3>Surgical Oncology</h3><p>Head &amp; neck, breast, gastrointestinal and gynecological cancer surgery</p></a>
    <a href="<?php echo sunnah_url( 'medical-oncology' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-daycare.jpg' ); ?>" alt="" loading="lazy"></div><h3>Medical Oncology</h3><p>Chemotherapy in day care and IPD, targeted therapy and immunotherapy</p></a>
    <a href="<?php echo sunnah_url( 'diagnostics' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-diagnostic.jpg' ); ?>" alt="" loading="lazy"></div><h3>Diagnostics</h3><p>Digital X-Ray, sonography and pathology for accurate detection</p></a>
    <a href="<?php echo sunnah_url( 'infrastructure' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-ward-3.jpg' ); ?>" alt="" loading="lazy"></div><h3>ICU &amp; HDU</h3><p>Advanced critical care and a high dependency unit after surgery</p></a>
  </div>
</section>

<section class="tiles"><div class="w tg">
  <div class="tile t-navy"><svg><use href="#i-ppl"/></svg><h3>Psychological Support</h3><p>Professional counselling and emotional support for patients and their families.</p><a class="olbtn" href="<?php echo sunnah_url( 'patient-care', 'counselling' ); ?>">Talk to a counsellor</a></div>
  <div class="tile t-teal"><svg><use href="#i-leaf"/></svg><h3>Specialized Nutrition</h3><p>A dedicated oncology dietitian during chemotherapy, after surgery and through recovery.</p><a class="olbtn" href="<?php echo sunnah_url( 'patient-care', 'nutrition' ); ?>">Meet our dietitian</a></div>
</div></section>

<div class="w three">
  <a href="<?php echo sunnah_url( 'contact' ); ?>"><span class="circ c1"><svg><use href="#i-pin"/></svg></span><h3>Find Our Location</h3></a>
  <a href="<?php echo sunnah_url( 'infrastructure' ); ?>"><span class="circ c2"><svg><use href="#i-bld"/></svg></span><h3>See Our Facilities</h3></a>
  <a href="<?php echo esc_url( sunnah_wa() ); ?>"><span class="circ c3"><svg><use href="#i-q"/></svg></span><h3>Ask a Question</h3></a>
</div>

<section class="dentb"><div class="w">
  <img src="<?php echo sunnah_img( 'dental-logo.jpg' ); ?>" alt="Sunnah Dental Care" width="380" height="70" loading="lazy">
  <p>Complete dental care for the whole family, including oral cancer screening, within Sunnah Hospital.</p>
  <a class="olbtn" href="<?php echo sunnah_url( 'dental-care' ); ?>">Visit Sunnah Dental Care</a>
</div></section>

<section class="dark">
  <img class="emb" src="<?php echo sunnah_img( 'emblem-white.png' ); ?>" alt="" aria-hidden="true">
  <div class="w"><div class="txt">
    <h2>Together for a cancer-free tomorrow</h2>
    <p>Advanced research, compassionate care every step, and better outcomes. Our Cancer Research Center works to improve how cancer is understood, detected and treated in Vidarbha.</p>
    <a href="<?php echo sunnah_url( 'research' ); ?>">Discover our research →</a>
  </div></div>
</section>

<section class="help"><div class="w">
  <h2>Hope. Health. Humanity.</h2>
  <div class="hg">
    <div class="tile t-navy"><h3>Hope</h3><p>Giving strength in difficult times.</p><a class="olbtn" href="<?php echo sunnah_url( 'contact' ); ?>">Book an appointment</a></div>
    <div class="tile t-black"><h3>Health</h3><p>Providing the best possible treatment.</p><a class="olbtn" href="<?php echo sunnah_url( 'cancer-care' ); ?>">Our treatments</a></div>
    <div class="tile t-turq"><h3>Humanity</h3><p>Standing with patients beyond medicine.</p><a class="olbtn" href="<?php echo sunnah_url( 'patient-care' ); ?>">Patient support</a></div>
  </div>
</div></section>

<section class="kbar" id="enquiry"><div class="w">
  <span class="ic"><svg><use href="#i-ph"/></svg></span>
  <span class="lbl">Request a call back from our care team</span>
  <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
    <input type="hidden" name="action" value="sunnah_enquiry"><?php wp_nonce_field( 'sunnah_enquiry', 'sunnah_enquiry_nonce' ); ?>
    <div class="hp" aria-hidden="true"><label for="cb-web">Leave this empty</label><input id="cb-web" type="text" name="website" tabindex="-1" autocomplete="off"></div>
    <input name="patient_name" placeholder="Patient name *" aria-label="Patient name" required maxlength="100" autocomplete="name">
    <input name="mobile" type="tel" placeholder="Mobile number *" aria-label="Mobile number" required maxlength="20" inputmode="tel" autocomplete="tel">
    <input type="hidden" name="department" value="Call back request">
    <button type="submit">Get started</button>
    <?php sunnah_enquiry_notice(); ?>
  </form>
</div></section>
</main>
<?php
get_footer();
