<?php
/**
 * Cancer Research Centre page (slug: cancer-care).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-ward.jpg', 'title' => 'Cancer Research Centre', 'lead' => 'Diagnosis, treatment, continuing care and support for cancer patients and their families.' ) );
?>
<main id="content">
<nav class="jump" aria-label="On this page"><div class="w">
  <a href="#medical-oncology">Medical Oncology</a><a href="#surgical-oncology">Surgical Oncology</a><a href="#chemotherapy">Chemotherapy</a><a href="#screening">Screening &amp; Biopsy</a><a href="#counselling">Counselling</a><a href="#continuing-care">Continuing Care</a><a href="#packages">Inpatient Packages</a><a href="#palliative">Palliative Care</a><a href="#cc-enquiry">Enquiries</a>
</div></nav>

<div class="w lay">
  <div class="main">
    <p class="lede">Cancer care requires more than an individual procedure or treatment session. It involves diagnosis, treatment planning, medical and surgical intervention, recovery, symptom management and continued support.</p>
    <p>Sunnah Hospital provides specialised cancer services through medical oncology, surgical oncology, chemotherapy administration, cancer screening, biopsy and diagnostic services, counselling, and palliative and supportive care. Our aim is to provide patients and their families with coordinated cancer-related services and continued hospital-based care.</p>

    <h2 id="medical-oncology">Medical oncology</h2>
    <p>Medical oncology focuses on the medical treatment and management of cancer.</p>
    <ul class="ticks two">
      <li>Medical assessment and treatment planning</li>
      <li>Chemotherapy administration</li>
      <li>Monitoring during treatment</li>
      <li>Management of treatment-related symptoms and complications</li>
      <li>Follow-up and supportive medical care</li>
    </ul>
    <?php get_template_part( 'template-parts/team', null, array( 'speciality' => 'Medical Oncology', 'heading' => 'Medical oncology team', 'compact' => true ) ); ?>

    <h2 id="surgical-oncology">Surgical oncology</h2>
    <p>Surgical oncology involves the surgical management of cancer. Patients are assessed and managed according to their diagnosis, clinical condition and treatment requirements, supported by the hospital's two operation theatres and ICU.</p>
    <?php
    $sunnah_s = sunnah_rich( 'surgery_list' );
    if ( $sunnah_s ) {
		echo '<h3>Procedures performed</h3>' . $sunnah_s; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post.
	} else {
		echo sunnah_ask_line( 'To find out whether a particular cancer surgery is performed at the hospital,' ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
	?>
    <?php get_template_part( 'template-parts/team', null, array( 'speciality' => 'Surgical Oncology', 'heading' => 'Surgical oncology team', 'compact' => true ) ); ?>

    <h2 id="chemotherapy">Chemotherapy &amp; day-care</h2>
    <p>The hospital provides chemotherapy administration and day-care services for patients requiring planned cancer treatment. Treatment is given according to the plan prescribed by the treating oncologist.</p>
    <ol class="steps">
      <li><b>Appointment</b><span>Call <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?> to schedule your treatment date. Bring your prescription and recent reports.</span></li>
      <li><b>Pre-treatment assessment</b><span>The doctor reviews your reports, blood tests and general condition before each cycle.</span></li>
            <li><b>Administration</b><span>Chemotherapy is given as prescribed, and you are observed during and after the treatment.</span></li>
      <li><b>Post-treatment instructions</b><span>You receive advice on side effects and warning signs, and the date of your next visit.</span></li>
    </ol>

    <h2 id="screening">Screening, biopsy &amp; diagnosis</h2>
    <p>Early evaluation and accurate diagnosis are important parts of cancer management.</p>
    <ul class="ticks two">
      <li>Cancer screening programmes</li>
      <li>Biopsy services</li>
      <li>Cancer diagnostic assessment</li>
      <li>Pathology support</li>
      <li>Medical evaluation and referral for further investigations where required</li>
    </ul>
    <?php
    $sunnah_sc = sunnah_rich( 'screening_list' );
    if ( $sunnah_sc ) {
		echo $sunnah_sc; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post.
	} else {
		echo sunnah_ask_line( 'For information on the screening tests and diagnostic procedures available,' ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
	?>

    <h2 id="counselling">Cancer counselling</h2>
    <p>A cancer diagnosis can create uncertainty and emotional difficulty for patients and their families. Counselling helps patients understand their diagnosis, treatment pathway, available services and the importance of follow-up. The hospital provides cancer counselling and guidance as part of its patient support services.</p>
  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Our Doctors', sunnah_url( 'doctors' ) ), array( 'Facilities', sunnah_url( 'infrastructure' ) ), array( 'Health awareness', sunnah_url( 'health-awareness' ) ) ) ) ); ?>
</div>

<section class="ccare" id="continuing-care"><div class="w split">
  <div class="ph"><img src="<?php echo sunnah_img( 'sh-ward-2.jpg' ); ?>" alt="Inpatient room at Sunnah Hospital" loading="lazy"></div>
  <div>
    <p class="kick">Continuing Cancer Care, Recovery &amp; Supportive Inpatient Services</p>
    <h2>Treated in Mumbai or Delhi? Continue your care close to home.</h2>
    <p>Some patients undergo cancer surgery or treatment at larger hospitals in cities such as Mumbai, Delhi and other metropolitan centres. After their primary treatment, they may still require continued medical supervision, nursing support, recovery care and assistance closer to home.</p>
    <p style="margin-top:14px">Sunnah Hospital provides inpatient support for patients who require continued hospital-based care following cancer treatment or surgery, for patients who may need:</p>
    <ul class="ticks">
      <li>Continued medical supervision after cancer surgery or treatment</li>
      <li>Nursing care and assistance during recovery</li>
      <li>Monitoring of symptoms and treatment-related complications</li>
      <li>Supportive medical management</li>
      <li>Hospital-based care for patients with advanced cancer who require ongoing clinical attention and comfort-focused support</li>
    </ul>
    <p class="note" style="margin-top:20px">Please bring the discharge summary, treatment plan and recent reports from your treating cancer centre.</p>
    <div class="acts"><a class="sbtn turq" href="<?php echo esc_attr( sunnah_tel() ); ?>">Admission enquiry: <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a></div>
  </div>
</div></section>

<section class="sec" id="packages"><div class="w narrow">
  <p class="kick">Inpatient Package-Based Care</p>
  <h2>Inpatient cancer-care packages</h2>
  <p>The hospital offers inpatient bed facilities and package-based care options for eligible patients, subject to clinical assessment and the actual package inclusions. <b>A package does not include every medicine, investigation or procedure.</b> What is included and what may be charged separately is explained before admission.</p>
  <?php
  $sunnah_pk = sunnah_rich( 'packages_info' );
  if ( $sunnah_pk ) {
		echo '<div class="entry pk">' . $sunnah_pk . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post.
  } else {
		?>
    <div class="pkg">
      <div><h3>What a package may include</h3><p>Details of the services included in each package (such as bed category, length of stay, nursing care and doctor visits) are provided by the hospital at the time of enquiry.</p></div>
      <div><h3>What may be charged separately</h3><p>Items outside the package (such as certain medicines, chemotherapy drugs, special investigations, blood products, procedures or an extended stay) are explained before admission.</p></div>
    </div>
		<?php
  }
  ?>
  <p class="note" style="margin-top:22px">Package details, inclusions, exclusions and charges are confirmed by the hospital before admission. Admission enquiries: <a href="<?php echo esc_attr( sunnah_tel() ); ?>"><b><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></b></a>.</p>
</div></section>

<section class="sec grey" id="palliative"><div class="w split rev">
  <div class="ph"><img src="<?php echo sunnah_img( 'sh-ward-3.jpg' ); ?>" alt="Ward at Sunnah Hospital" loading="lazy"></div>
  <div>
    <p class="kick">Palliative &amp; Supportive Care</p>
    <h2>Comfort, dignity and support</h2>
    <p>Palliative and supportive care focuses on improving comfort and quality of life for patients living with serious or advanced illness. Care may involve symptom management, medical supervision, supportive treatment and guidance for families.</p>
  </div>
</div></section>

<section class="sec" id="schemes"><div class="w narrow">
  <p class="kick">Government Health Schemes</p>
  <h2>AB-PMJAY and MJPJAY</h2>
  <?php echo sunnah_scheme_logos(); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in function. ?>
  <p>Patients can enquire about cancer treatment under Ayushman Bharat – Pradhan Mantri Jan Arogya Yojana (AB-PMJAY) and Mahatma Jyotirao Phule Jan Arogya Yojana (MJPJAY). Treatment eligibility and cashless benefits are subject to the applicable scheme rules, approved packages and hospital empanelment. Please speak to our staff before admission.</p>
  <p style="margin-top:12px"><a class="arw" href="<?php echo sunnah_url( 'community', 'schemes' ); ?>">Scheme information and documents</a></p>
</div></section>

<section class="sec grey" id="cc-enquiry"><div class="w narrow" style="text-align:center">
  <h2>Cancer care enquiries</h2>
  <p style="margin:12px auto 0;max-width:60ch">For cancer consultations, treatment enquiries and inpatient care information, call or WhatsApp <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?>, or send an enquiry and our staff will contact you.</p>
  <div class="acts" style="justify-content:center;display:flex;flex-wrap:wrap;gap:12px;margin-top:22px"><a class="sbtn navy" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Enquire About Cancer Care</a><a class="sbtn wa" href="<?php echo esc_url( sunnah_wa( 'Hello Sunnah Hospital, I have a cancer care enquiry.' ) ); ?>"><svg><use href="#i-wa"/></svg>WhatsApp</a></div>
  <p class="fsmall" style="margin-top:22px">Radiation therapy is not currently available at Sunnah Hospital. Patients who require radiation therapy are informed about appropriate referral arrangements following medical assessment.</p>
</div></section>
</main>
<?php
get_footer();
