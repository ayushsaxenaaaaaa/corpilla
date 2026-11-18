<?php
/**
 * Site footer and mobile action bar.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<footer>
  <div class="w fm">
    <div><img src="<?php echo sunnah_img( 'logo-header.png' ); ?>" alt="Sunnah Hospital – Cancer Research Center" width="153" height="52" loading="lazy"></div>
    <div><h4>Cancer Care</h4><ul><li><a href="<?php echo sunnah_url( 'cancer-care' ); ?>">All Services</a></li><li><a href="<?php echo sunnah_url( 'surgical-oncology' ); ?>">Surgical Oncology</a></li><li><a href="<?php echo sunnah_url( 'medical-oncology' ); ?>">Medical Oncology</a></li><li><a href="<?php echo sunnah_url( 'cancer-care', 'diagnostics' ); ?>">Diagnostics</a></li><li><a href="<?php echo sunnah_url( 'research' ); ?>">Research</a></li></ul></div>
    <div><h4>About</h4><ul><li><a href="<?php echo sunnah_url( 'about-us' ); ?>">About Sunnah Hospital</a></li><li><a href="<?php echo sunnah_url( 'doctors' ); ?>">Our Doctors</a></li><li><a href="<?php echo sunnah_url( 'infrastructure' ); ?>">Facilities</a></li><li><a href="<?php echo sunnah_url( 'patient-care' ); ?>">Patients &amp; Family</a></li></ul></div>
    <div><h4>Finding Your Way</h4><ul><li><a href="<?php echo sunnah_url( 'contact', 'location' ); ?>">Location</a></li><li><a href="<?php echo esc_url( sunnah_opt( 'maps_url' ) ); ?>" rel="noopener" target="_blank">Directions</a></li><li><a href="<?php echo sunnah_url( 'contact' ); ?>">Contact Us</a></li><li><a href="<?php echo sunnah_url( 'patient-care', 'faqs' ); ?>">FAQs</a></li></ul></div>
    <div><h4>Get in Touch</h4><div class="git">
      <a href="<?php echo esc_attr( sunnah_tel() ); ?>"><i><svg><use href="#i-ph"/></svg></i><span>Call<b><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></b></span></a>
      <a href="<?php echo esc_url( sunnah_wa() ); ?>"><i><svg><use href="#i-wa"/></svg></i><span>WhatsApp us</span></a>
    </div></div>
  </div>
  <div class="legal"><div class="w"><a href="<?php echo sunnah_url( 'privacy-policy' ); ?>">Privacy Policy</a><a href="mailto:<?php echo esc_attr( sunnah_opt( 'email' ) ); ?>"><?php echo esc_html( sunnah_opt( 'email' ) ); ?></a><a href="<?php echo esc_url( sunnah_opt( 'maps_url' ) ); ?>" rel="noopener" target="_blank"><?php echo esc_html( sunnah_opt( 'address' ) ); ?></a></div></div>
  <div class="mission"><div class="w">
    <h3>Hope • Healing • Humanity</h3>
    <div><p>Sunnah Cancer Research Center is a dedicated unit of Sunnah Hospital, committed to providing comprehensive, compassionate and affordable cancer care to the people of Vidarbha.</p><small>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Sunnah Hospital – Cancer Research Center, Akola. All rights reserved.</small></div>
  </div></div>
</footer>

<nav class="mbar" aria-label="Quick actions"><a href="<?php echo esc_attr( sunnah_tel() ); ?>">Call</a><a href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Appointment</a><a href="<?php echo esc_url( sunnah_wa() ); ?>">WhatsApp</a></nav>
<?php wp_footer(); ?>
</body>
</html>
