<?php
/**
 * Site footer and mobile action bar.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$sunnah_quick = array(
	array( 'Home', '' ),
	array( 'About Us', 'about-us' ),
	array( 'Cancer Research Centre', 'cancer-care' ),
	array( 'Departments & Specialities', 'departments' ),
	array( 'Our Doctors', 'doctors' ),
	array( 'Facilities & Infrastructure', 'infrastructure' ),
	array( 'Contact & Appointments', 'contact' ),
	array( 'News & Medical Achievements', 'news' ),
	array( 'Community Impact & Partnerships', 'community' ),
	array( 'Health Awareness & Resources', 'health-awareness' ),
);
$sunnah_social = array_filter(
	array(
		'Facebook'  => sunnah_opt( 'social_facebook' ),
		'Instagram' => sunnah_opt( 'social_instagram' ),
		'YouTube'   => sunnah_opt( 'social_youtube' ),
	)
);
?>
<footer>
  <div class="w fm">
    <div class="fabout">
      <img src="<?php echo sunnah_img( 'logo-header.png' ); ?>" alt="Sunnah Hospital – Cancer Research Centre" width="153" height="52" loading="lazy">
      <p><b>Sunnah Hospital – Cancer Research Centre</b><?php echo esc_html( sunnah_opt( 'address' ) ); ?></p>
      <p class="gov">Governing Organisation: Janta Multipurpose Society</p>
    </div>
    <div class="fquick"><h4>Quick Links</h4><ul>
      <?php foreach ( $sunnah_quick as $q ) : ?><li><a href="<?php echo sunnah_url( $q[1] ); ?>"><?php echo esc_html( $q[0] ); ?></a></li><?php endforeach; ?>
    </ul></div>
    <div><h4>Contact</h4><div class="git">
      <a href="<?php echo esc_attr( sunnah_tel() ); ?>"><i><svg><use href="#i-ph"/></svg></i><span>Phone &amp; appointments<b><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></b></span></a>
      <a href="<?php echo esc_url( sunnah_wa() ); ?>"><i><svg><use href="#i-wa"/></svg></i><span>WhatsApp<b><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></b></span></a>
      <a href="<?php echo esc_attr( sunnah_tel( 'emergency_phone' ) ); ?>"><i><svg><use href="#i-clock"/></svg></i><span>Emergency<b><?php echo esc_html( sunnah_opt( 'emergency_phone' ) ); ?></b></span></a>
      <a href="mailto:<?php echo esc_attr( sunnah_opt( 'email' ) ); ?>"><i><svg><use href="#i-mail"/></svg></i><span>Email<b class="em"><?php echo esc_html( sunnah_opt( 'email' ) ); ?></b></span></a>
    </div>
    <?php if ( $sunnah_social ) : ?>
      <p class="social"><?php foreach ( $sunnah_social as $name => $link ) : ?><a href="<?php echo esc_url( $link ); ?>" rel="noopener" target="_blank"><?php echo esc_html( $name ); ?></a><?php endforeach; ?></p>
    <?php endif; ?>
    </div>
  </div>
  <div class="legal"><div class="w"><a href="<?php echo sunnah_url( 'privacy-policy' ); ?>">Privacy Policy</a><a href="<?php echo sunnah_url( 'terms-and-conditions' ); ?>">Terms &amp; Conditions</a><a href="<?php echo esc_url( sunnah_opt( 'maps_url' ) ); ?>" rel="noopener" target="_blank">Get Directions</a></div></div>
  <div class="mission"><div class="w">
    <h3>Hope • Health • Humanity</h3>
    <div><p>Sunnah Hospital – Cancer Research Centre is a multispeciality hospital in Akola, established in 2008, providing medical, surgical and specialised cancer care services.</p><small>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Sunnah Hospital – Cancer Research Centre, Akola. All rights reserved.</small></div>
  </div></div>
</footer>

<nav class="mbar" aria-label="Quick actions"><a href="<?php echo esc_attr( sunnah_tel() ); ?>">Call</a><a href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Appointment</a><a href="<?php echo esc_url( sunnah_wa() ); ?>">WhatsApp</a></nav>
<?php wp_footer(); ?>
</body>
</html>
