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
$sunnah_slides = array(
	array( 'sh-building-side.jpg', 'Sunnah Hospital – Cancer Research Centre building, Ganga Nagar, Akola', 'Sunnah Hospital', 'A multispeciality hospital committed to providing comprehensive healthcare services to the people of Akola and surrounding regions.' ),
	array( 'sh-ward.jpg', 'Inpatient ward at Sunnah Hospital', 'Cancer Care', 'Medical oncology, surgical oncology, chemotherapy, cancer diagnosis and supportive care services.' ),
	array( 'sh-ot-suite.jpg', 'Operation theatre at Sunnah Hospital', 'Comprehensive Medical Services', 'Specialities, critical care, surgical services and diagnostic facilities under one institution.' ),
);
$sunnah_docs = sunnah_crc_get_doctors();
$sunnah_ha   = get_term_by( 'slug', 'health-articles', 'category' );
$sunnah_news = get_posts(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
		'category__not_in'    => $sunnah_ha ? array( (int) $sunnah_ha->term_id ) : array(),
	)
);
?>
<main id="content">
<section class="hslider hx" id="hslider" aria-roledescription="carousel" aria-label="Sunnah Hospital">
  <div class="hx-ph">
  <?php foreach ( $sunnah_slides as $i => $sl ) : ?>
    <div class="hs-slide<?php echo 0 === $i ? ' on' : ''; ?>" role="group" aria-roledescription="slide" aria-label="<?php echo esc_attr( ( $i + 1 ) . ' of ' . count( $sunnah_slides ) . ': ' . $sl[2] . '. ' . $sl[3] ); ?>"<?php echo 0 === $i ? '' : ' aria-hidden="true"'; ?>>
      <img src="<?php echo sunnah_img( $sl[0] ); ?>" alt="<?php echo esc_attr( $sl[1] ); ?>"<?php echo 0 === $i ? ' fetchpriority="high"' : ' loading="lazy"'; ?>>
    </div>
  <?php endforeach; ?>
    <div class="hs-ctl">
      <button type="button" class="hs-prev" aria-label="Previous slide">‹</button>
      <div class="hs-dots"><?php foreach ( $sunnah_slides as $i => $sl ) : ?><button type="button" aria-label="<?php echo esc_attr( 'Show slide ' . ( $i + 1 ) . ': ' . $sl[2] ); ?>"<?php echo 0 === $i ? ' aria-current="true"' : ''; ?>></button><?php endforeach; ?></div>
      <button type="button" class="hs-next" aria-label="Next slide">›</button>
      <button type="button" class="hs-pause" aria-label="Pause slideshow" aria-pressed="false"><span class="sr">Pause</span></button>
    </div>
  </div>
  <div class="w hx-in">
    <p class="hx-k">Sunnah Hospital · Since 2008</p>
    <h1>Comprehensive Healthcare. Compassionate Cancer Care.</h1>
    <span class="hx-bar" aria-hidden="true"></span>
    <p class="hx-l">A multispeciality healthcare institution in Akola, Maharashtra, providing medical, surgical and specialised cancer care services.</p>
    <div class="hx-acts"><a class="hb1" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>"><svg class="i"><use href="#i-cal"/></svg>Book an Appointment</a><a class="hb2" href="<?php echo sunnah_url( 'cancer-care' ); ?>">Explore Cancer Care →</a></div>
    <ul class="hx-feat">
      <li><svg><use href="#i-cell"/></svg>Cancer Research<br>Centre</li>
      <li><svg><use href="#i-ppl"/></svg>Full-time &amp; Visiting<br>Consultants</li>
      <li><svg><use href="#i-bed"/></svg><?php echo esc_html( sunnah_opt( 'stat_beds' ) ); ?> Beds &amp;<br><?php echo esc_html( sunnah_opt( 'stat_icu' ) ); ?>-Bed ICU</li>
      <li><svg><use href="#i-heart"/></svg>Patient-Centred<br>Care</li>
    </ul>
  </div>
  <div class="w hx-specw"><nav class="hx-spec" aria-label="Specialities">
    <a href="<?php echo sunnah_url( 'departments', 'general-medicine' ); ?>"><svg><use href="#i-steth"/></svg>General Medicine</a>
    <a href="<?php echo sunnah_url( 'departments', 'general-surgery' ); ?>"><svg><use href="#i-scalpel"/></svg>General Surgery</a>
    <a href="<?php echo sunnah_url( 'dental-care' ); ?>"><svg><use href="#i-tooth"/></svg>Dental</a>
    <a class="hl" href="<?php echo sunnah_url( 'cancer-care' ); ?>"><svg><use href="#i-cell"/></svg>Cancer Care</a>
    <a href="<?php echo sunnah_url( 'departments', 'orthopaedics' ); ?>"><svg><use href="#i-bone"/></svg>Orthopaedics</a>
    <a href="<?php echo sunnah_url( 'departments', 'critical-care' ); ?>"><svg><use href="#i-bed"/></svg>ICU &amp; Critical Care</a>
    <a href="<?php echo sunnah_url( 'infrastructure', 'diagnostics' ); ?>"><svg><use href="#i-vial"/></svg>Diagnostics</a>
    <a href="<?php echo sunnah_url( 'departments' ); ?>"><svg><use href="#i-ppl"/></svg>Other Specialities</a>
  </nav></div>
  <svg class="hx-wave" viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true"><path d="M0 70 C380 10 900 130 1440 40 L1440 120 L0 120Z" fill="#fff"/><path d="M0 70 C380 10 900 130 1440 40" fill="none" stroke="#16becf" stroke-width="4"/></svg>
</section>



<section class="sec" id="welcome"><div class="w split">
  <div class="ph"><img src="<?php echo sunnah_img( 'sh-building.jpg' ); ?>" alt="Sunnah Hospital building, Akola" loading="lazy"></div>
  <div>
    <p class="kick">Welcome to Sunnah Hospital</p>
    <h2>Serving Akola since 2008</h2>
    <p>Sunnah Hospital – Cancer Research Centre, established on 8 March 2008, is located in Ganga Nagar, Akola. Governed by Janta Multipurpose Society, the hospital began as a general healthcare institution and has developed into a multispeciality hospital with an expanding focus on cancer services.</p>
    <p style="margin-top:14px">Our objective is to provide patients with access to medical expertise, essential hospital facilities and continued care in a professional and supportive environment.</p>
    <div class="acts"><a class="sbtn navy" href="<?php echo sunnah_url( 'about-us' ); ?>">Discover Our Hospital</a></div>
  </div>
</div></section>

<section class="sec grey" id="cancer"><div class="w">
  <p class="kick c">Cancer Research Centre</p>
  <h2 class="c">Cancer Care at Sunnah Hospital</h2>
  <p class="c">Cancer diagnosis and treatment require coordinated medical care, careful planning and continued support. The hospital also provides inpatient support for patients who require continued medical supervision and recovery care following cancer treatment or surgery.</p>
  <div class="ccg">
    <?php
    $sunnah_cc = array(
		array( 'i-drop', 'Medical Oncology', 'medical-oncology' ),
		array( 'i-cell', 'Surgical Oncology', 'surgical-oncology' ),
		array( 'i-pill', 'Chemotherapy Administration', 'chemotherapy' ),
		array( 'i-scan', 'Cancer Screening', 'screening' ),
		array( 'i-vial', 'Biopsy & Diagnostic Support', 'screening' ),
		array( 'i-ppl', 'Cancer Counselling', 'counselling' ),
		array( 'i-heart', 'Palliative & Supportive Care', 'palliative' ),
		array( 'i-bed', 'Inpatient Cancer Support', 'continuing-care' ),
	);
	foreach ( $sunnah_cc as $c ) :
		?>
      <a href="<?php echo sunnah_url( 'cancer-care', $c[2] ); ?>"><svg><use href="#<?php echo esc_attr( $c[0] ); ?>"/></svg><b><?php echo esc_html( $c[1] ); ?></b></a>
    <?php endforeach; ?>
  </div>
  <p class="cbtn"><a class="sbtn navy" href="<?php echo sunnah_url( 'cancer-care' ); ?>">Explore Our Cancer Centre</a></p>
</div></section>

<section class="bred" id="continuing"><div class="w">
  <svg viewBox="0 0 48 48" aria-hidden="true"><use href="#i-bed"/></svg>
  <div><b>Treated for cancer in Mumbai, Delhi or another centre?</b><p>Continue your recovery, supportive treatment and inpatient care close to home in Akola. Admission enquiries: <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?>.</p></div>
  <a class="olbtn" href="<?php echo sunnah_url( 'cancer-care', 'continuing-care' ); ?>">Continuing cancer care</a>
</div></section>

<section class="sec" id="specialities"><div class="w">
  <h2 class="c">Our Specialities</h2>
  <p class="c">Sunnah Hospital provides services across multiple medical and surgical specialities.</p>
  <div class="spg">
    <?php foreach ( sunnah_crc_departments() as $anchor => $d ) : ?>
      <a href="<?php echo 'dental' === $anchor ? sunnah_url( 'dental-care' ) : ( in_array( $anchor, array( 'medical-oncology', 'surgical-oncology' ), true ) ? sunnah_url( 'cancer-care', $anchor ) : sunnah_url( 'departments', $anchor ) ); ?>"><span class="circ c<?php echo esc_attr( (string) ( 1 + ( crc32( $anchor ) % 3 ) ) ); ?>"><svg><use href="#<?php echo esc_attr( $d[1] ); ?>"/></svg></span><b><?php echo esc_html( $d[0] ); ?></b></a>
    <?php endforeach; ?>
  </div>
  <p class="cbtn"><a class="sbtn out" href="<?php echo sunnah_url( 'departments' ); ?>">View All Departments</a></p>
</div></section>

<section class="stats" aria-label="Hospital at a glance"><div class="w">
  <div><b><?php echo esc_html( sunnah_opt( 'stat_beds' ) ); ?></b><span>Hospital Beds</span></div>
  <div><b><?php echo esc_html( sunnah_opt( 'stat_icu' ) ); ?></b><span>ICU Beds</span></div>
  <div><b><?php echo esc_html( sunnah_opt( 'stat_ot' ) ); ?></b><span>Operation Theatres</span></div>
  <div><b><?php echo esc_html( sunnah_opt( 'stat_floors' ) ); ?></b><span>Hospital Floors</span></div>
</div></section>

<section class="w hl" id="facilities">
  <h2>Facilities &amp; Infrastructure</h2>
  <p class="c hlp">The hospital provides inpatient facilities, intensive care, operation theatres, diagnostic services and day-care treatment facilities.</p>
  <div class="cards">
    <a href="<?php echo sunnah_url( 'infrastructure', 'icu' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-icu.jpg' ); ?>" alt="" loading="lazy"></div><h3>Intensive Care Unit</h3><p><?php echo esc_html( sunnah_opt( 'stat_icu' ) ); ?> ICU beds for patients who need close monitoring.</p></a>
    <a href="<?php echo sunnah_url( 'infrastructure', 'theatres' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-ot.jpg' ); ?>" alt="" loading="lazy"></div><h3>Operation Theatres</h3><p>Two operation theatres for general and cancer surgery.</p></a>
    <a href="<?php echo sunnah_url( 'infrastructure', 'inpatient' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-ward-3.jpg' ); ?>" alt="" loading="lazy"></div><h3>Inpatient Care</h3><p><?php echo esc_html( sunnah_opt( 'stat_beds' ) ); ?> beds across three hospital floors.</p></a>
    <a href="<?php echo sunnah_url( 'infrastructure', 'diagnostics' ); ?>"><div class="im"><img src="<?php echo sunnah_img( 'sh-diagnostic.jpg' ); ?>" alt="" loading="lazy"></div><h3>Diagnostics</h3><p>Pathology, digital X-ray and sonography within the hospital.</p></a>
  </div>
  <p class="cbtn"><a class="sbtn out" href="<?php echo sunnah_url( 'infrastructure' ); ?>">Explore Our Facilities</a></p>
</section>

<section class="sec grey" id="doctors"><div class="w">
  <h2 class="c">Our Doctors</h2>
  <p class="c">Our medical team includes full-time and visiting consultants across different specialities. The doctor directory provides information about consultants, their qualifications, specialities and consultation availability.</p>
  <?php if ( $sunnah_docs ) : ?>
    <div class="docs"><?php foreach ( array_slice( $sunnah_docs, 0, 4 ) as $d ) { get_template_part( 'template-parts/doctor-card', null, array( 'doc' => $d ) ); } ?></div>
  <?php else : ?>
    <div class="empty"><h3>Doctor profiles are being added</h3><p>For consultation days and timings, please call <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?>.</p></div>
  <?php endif; ?>
  <p class="cbtn"><a class="sbtn navy" href="<?php echo sunnah_url( 'doctors' ); ?>">Meet Our Doctors</a></p>
</div></section>

<section class="sec" id="schemes"><div class="w split rev">
  <div class="schm">
    <?php echo sunnah_scheme_logos( 'big' ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in function. ?>
    <div><b>AB-PMJAY</b><span>Ayushman Bharat – Pradhan Mantri Jan Arogya Yojana</span></div>
    <div><b>MJPJAY</b><span>Mahatma Jyotirao Phule Jan Arogya Yojana</span></div>
  </div>
  <div>
    <p class="kick">Government Health Schemes</p>
    <h2>AB-PMJAY and MJPJAY enquiries</h2>
    <p>Patients can enquire with the hospital about treatment under Ayushman Bharat – Pradhan Mantri Jan Arogya Yojana and Mahatma Jyotirao Phule Jan Arogya Yojana, Maharashtra.</p>
    <p style="margin-top:14px">Treatment eligibility and benefits are subject to the applicable scheme rules, approved packages and hospital empanelment. Please speak to our staff before admission.</p>
    <div class="acts"><a class="sbtn navy" href="<?php echo sunnah_url( 'community', 'schemes' ); ?>">Scheme information</a><a class="sbtn out" href="<?php echo esc_attr( sunnah_tel() ); ?>">Call <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a></div>
  </div>
</div></section>

<section class="sec grey" id="news"><div class="w">
  <h2 class="c">News &amp; Updates</h2>
  <?php if ( $sunnah_news ) : ?>
    <div class="ncards"><?php foreach ( $sunnah_news as $n ) { get_template_part( 'template-parts/news-card', null, array( 'post' => $n ) ); } ?></div>
  <?php else : ?>
    <p class="c">Recent hospital announcements, medical activities, health awareness programmes and institutional developments will appear here.</p>
  <?php endif; ?>
  <p class="cbtn"><a class="sbtn out" href="<?php echo sunnah_url( 'news' ); ?>">View All Updates</a></p>
</div></section>

<section class="three-c"><div class="w">
  <div class="tc-txt"><h2>Contact Sunnah Hospital</h2><p>Sunnah Hospital – Cancer Research Centre, <?php echo esc_html( sunnah_opt( 'address' ) ); ?></p>
    <ul class="tcl">
      <li><small>Phone / WhatsApp</small><a href="<?php echo esc_attr( sunnah_tel() ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a></li>
      <li><small>Emergency contact</small><a href="<?php echo esc_attr( sunnah_tel( 'emergency_phone' ) ); ?>"><?php echo esc_html( sunnah_opt( 'emergency_phone' ) ); ?></a></li>
      <li><small>Email</small><a href="mailto:<?php echo esc_attr( sunnah_opt( 'email' ) ); ?>"><?php echo esc_html( sunnah_opt( 'email' ) ); ?></a></li>
    </ul>
  </div>
  <div class="three">
    <a href="<?php echo esc_attr( sunnah_tel() ); ?>"><span class="circ c1"><svg><use href="#i-ph"/></svg></span><h3>Call Now</h3><span class="sub"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></span></a>
    <a href="<?php echo esc_url( sunnah_opt( 'maps_url' ) ); ?>" target="_blank" rel="noopener"><span class="circ c2"><svg><use href="#i-pin"/></svg></span><h3>Get Directions</h3><span class="sub">Ganga Nagar, Akola 444002</span></a>
    <a href="<?php echo sunnah_url( 'contact' ); ?>"><span class="circ c3"><svg><use href="#i-q"/></svg></span><h3>Contact Us</h3><span class="sub">Appointments &amp; enquiries</span></a>
  </div>
</div></section>

<section class="kbar" id="enquiry"><div class="w">
  <span class="ic"><svg><use href="#i-ph"/></svg></span>
  <span class="lbl">Request a call back for an appointment</span>
  <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
    <input type="hidden" name="action" value="sunnah_enquiry"><?php wp_nonce_field( 'sunnah_enquiry', 'sunnah_enquiry_nonce' ); ?>
    <div class="hp" aria-hidden="true"><label for="cb-web">Leave this empty</label><input id="cb-web" type="text" name="website" tabindex="-1" autocomplete="off"></div>
    <input name="patient_name" placeholder="Patient name *" aria-label="Patient name" required maxlength="100" autocomplete="name">
    <input name="mobile" type="tel" placeholder="Contact number *" aria-label="Contact number" required maxlength="20" inputmode="tel" autocomplete="tel">
    <input type="hidden" name="department" value="Call back request">
    <button type="submit">Request call back</button>
    <?php sunnah_enquiry_notice(); ?>
  </form>
</div></section>
</main>
<?php
get_footer();
