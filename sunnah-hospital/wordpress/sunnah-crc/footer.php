<?php
/**
 * Site footer, mobile action bar.
 */
?>
<footer>
  <div class="w fm">
    <div><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo-header.png' ) ); ?>" alt="Sunnah Hospital – Cancer Research Center"></div>
    <div><h4>Explore</h4><ul><li><a href="<?php echo esc_url( home_url( '/cancer-care/' ) ); ?>">Cancer Care</a></li><li><a href="<?php echo esc_url( home_url( '/surgical-oncology/' ) ); ?>">Surgical Oncology</a></li><li><a href="<?php echo esc_url( home_url( '/medical-oncology/' ) ); ?>">Medical Oncology</a></li><li><a href="<?php echo esc_url( home_url( '/cancer-care/' ) ); ?>#diagnostics">Diagnostics</a></li><li><a href="<?php echo esc_url( home_url( '/research/' ) ); ?>">Research</a></li></ul></div>
    <div><h4>About</h4><ul><li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Sunnah Hospital</a></li><li><a href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>">Our Doctors</a></li><li><a href="<?php echo esc_url( home_url( '/infrastructure/' ) ); ?>">Facilities</a></li><li><a href="<?php echo esc_url( home_url( '/patient-care/' ) ); ?>">Patients &amp; Family</a></li></ul></div>
    <div><h4>Finding Your Way</h4><ul><li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Location</a></li><li><a href="https://www.google.com/maps/search/?api=1&amp;query=Sunnah+Hospital+Ganga+Nagar+Washim+Bypass+Akola">Directions</a></li><li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a></li><li><a href="<?php echo esc_url( home_url( '/patient-care/' ) ); ?>#faqs">FAQs</a></li></ul></div>
    <div><h4>Get in Touch</h4><div class="git">
      <a href="tel:+919923542674"><i><svg><use href="#i-ph"/></svg></i><span>Call<b>+91 99235 42674</b></span></a>
      <a href="https://wa.me/919923542674"><i><svg><use href="#i-wa"/></svg></i><span>WhatsApp us</span></a>
    </div></div>
  </div>
  <div class="legal"><div class="w"><a href="#">Privacy Policy</a><a href="#">Terms of Use</a><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">drhakimakola@gmail.com</a><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Ganga Nagar, Washim Bypass, Akola 444002</a></div></div>
  <div class="mission"><div class="w">
    <h3>Hope • Healing • Humanity</h3>
    <div><p>Sunnah Cancer Research Center is a dedicated unit of Sunnah Hospital, committed to providing comprehensive, compassionate and affordable cancer care to the people of Vidarbha.</p><small>© 2026 Sunnah Hospital – Cancer Research Center, Akola. All rights reserved.</small></div>
  </div></div>
</footer>

<nav class="mbar" aria-label="Quick actions"><a href="tel:+919923542674">Call</a><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Appointment</a><a href="https://wa.me/919923542674">WhatsApp</a></nav>
<?php wp_footer(); ?>
</body>
</html>
