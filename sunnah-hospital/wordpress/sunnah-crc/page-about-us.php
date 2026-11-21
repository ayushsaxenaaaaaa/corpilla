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
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-building.jpg', 'title' => 'About Us', 'lead' => 'A multispeciality hospital serving Akola since 2008.' ) );
$sunnah_founder_photo = sunnah_opt( 'founder_photo' ) ? sunnah_opt( 'founder_photo' ) : get_theme_file_uri( 'assets/img/director.jpg' );
$sunnah_awards = sunnah_crc_awards();
?>
<main id="content">
<div class="w lay">
  <div class="main">
    <p class="kick">Sunnah Hospital – Cancer Research Centre</p>
    <p class="lede">Sunnah Hospital – Cancer Research Centre is a multispeciality healthcare institution located in Ganga Nagar, Akola, Maharashtra. Established on 8 March 2008 under the management of Janta Multipurpose Society, the hospital was founded with the objective of serving the healthcare needs of the local community and surrounding regions.</p>
    <p>The institution was founded by Dr. Hakimuddin Shaikh, who serves as the President of Janta Multipurpose Society and Director of Sunnah Hospital.</p>
    <div class="pill3">
      <div><b>2008</b><span>Established on 8 March</span></div>
      <div><b><?php echo esc_html( sunnah_opt( 'stat_beds' ) ); ?> beds</b><span>Including <?php echo esc_html( sunnah_opt( 'stat_icu' ) ); ?> ICU beds</span></div>
      <div><b><?php echo esc_html( sunnah_opt( 'stat_ot' ) ); ?> theatres</b><span>Across <?php echo esc_html( sunnah_opt( 'stat_floors' ) ); ?> hospital floors</span></div>
    </div>

    <h2 id="history">Our history</h2>
    <p>Beginning as a general hospital, Sunnah Hospital has progressively developed its medical and surgical services. Over the years, the institution has expanded its facilities and specialities, with a growing emphasis on cancer diagnosis, medical oncology, surgical oncology and supportive cancer care.</p>
    <p>Today, Sunnah Hospital combines multispeciality healthcare services with dedicated cancer treatment and inpatient support facilities.</p>
    <h3>Our journey</h3>
    <ol class="journey">
      <li><b>2008</b><span>Establishment</span><p>Sunnah Hospital was established on 8 March 2008 in Akola, Maharashtra, under Janta Multipurpose Society.</p></li>
      <li><b>Growth</b><span>Multispeciality services</span><p>The hospital expanded beyond its initial general healthcare services to develop additional medical and surgical specialities.</p></li>
      <li><b>Cancer care</b><span>Development of cancer services</span><p>The institution developed specialised cancer services, including medical oncology, surgical oncology, chemotherapy administration, cancer diagnosis and supportive care.</p></li>
      <?php foreach ( sunnah_lines( 'milestones' ) as $m ) : ?>
      <li><b><?php echo esc_html( $m[0] ); ?></b><?php if ( ! empty( $m[1] ) ) : ?><span><?php echo esc_html( $m[1] ); ?></span><?php endif; ?><?php if ( ! empty( $m[2] ) ) : ?><p><?php echo esc_html( $m[2] ); ?></p><?php endif; ?></li>
      <?php endforeach; ?>
      <li><b>Today</b><span>Present</span><p>Sunnah Hospital continues to strengthen its multispeciality services and cancer care facilities, with the objective of improving access to organised healthcare in the region.</p></li>
    </ol>

  </div>
  <?php get_template_part( 'template-parts/aside', null, array( 'links' => array( array( 'Cancer Research Centre', sunnah_url( 'cancer-care' ) ), array( 'Departments & Specialities', sunnah_url( 'departments' ) ), array( 'Facilities & Infrastructure', sunnah_url( 'infrastructure' ) ) ) ) ); ?>
</div>

<section class="dirb" id="founder"><div class="w">
  <div class="dir">
    <figure class="dph"><img src="<?php echo esc_url( $sunnah_founder_photo ); ?>" alt="Dr. Hakimuddin Shaikh, Founder and Director of Sunnah Hospital" loading="lazy"></figure>
    <div class="dtx">
      <p class="kick">Founder &amp; Leadership · Director's Message</p>
      <blockquote>
        <p>At Sunnah Hospital, our vision is to make quality healthcare accessible, affordable, and compassionate for everyone. We believe that serving humanity is one of the noblest responsibilities, and we strive to uphold this belief through dedicated medical care, ethical practices, and a patient-first approach.</p>
        <p>Our commitment is to serve every individual with dignity, honesty, and compassion.</p>
      </blockquote>
      <p class="dsig"><b>Dr. Hakimuddin Shaikh</b>Founder &amp; Director, Sunnah Hospital<br>President, Janta Multipurpose Society</p>
      <?php
      $sunnah_fp = sunnah_rich( 'founder_profile' );
      if ( $sunnah_fp ) {
			echo '<div class="dprofile">' . $sunnah_fp . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised with wp_kses_post.
		}
		?>
    </div>
  </div>
  <h2 class="c awh" id="awards">Awards &amp; Recognition</h2>
  <p class="c awp">Honours received by Dr. Hakimuddin Shaikh for his work in healthcare, education and social development.</p>
  <div class="awg">
    <?php foreach ( $sunnah_awards as $aw ) : ?>
      <figure><img src="<?php echo sunnah_img( $aw[0] ); ?>" alt="<?php echo esc_attr( $aw[1] . ' presented to Dr. Hakimuddin Shaikh' ); ?>" loading="lazy"><figcaption><b><?php echo esc_html( $aw[1] ); ?></b><?php echo esc_html( $aw[2] ); ?></figcaption></figure>
    <?php endforeach; ?>
  </div>
</div></section>

<section class="prin" id="principle"><div class="w">
  <p class="kick">Our Guiding Principle</p>
  <blockquote>
    <p lang="ur-Latn">“Tum Zameen Walo Ki Madad Karo, Aasman Wala Tumhari Madad Karega.”</p>
    <footer>“Help those on earth, and the One above the heavens will help you.”</footer>
  </blockquote>
  <p class="pt">This principle reflects the spirit of service that guides the institution: helping people with sincerity, responsibility and compassion.</p>
</div></section>

<section class="sec" id="vision"><div class="w">
  <div class="vm">
    <div><p class="kick">Our Vision</p><p class="vtxt">To develop Sunnah Hospital into a trusted healthcare institution recognised for comprehensive medical services, specialised cancer care, professional standards and compassionate patient support.</p></div>
    <div><p class="kick">Our Mission</p><p class="vtxt">To provide accessible and organised healthcare services through qualified medical professionals, appropriate infrastructure, continuous improvement and a patient-centred approach.</p></div>
  </div>
  <h2 class="c" style="margin-top:56px">Our Values</h2>
  <div class="vals">
    <div><svg><use href="#i-heart"/></svg><b>Compassion and respect for every patient</b></div>
    <div><svg><use href="#i-shield"/></svg><b>Professional responsibility and ethical medical practice</b></div>
    <div><svg><use href="#i-plan"/></svg><b>Commitment to quality and continuous improvement</b></div>
    <div><svg><use href="#i-bed"/></svg><b>Dignity, privacy and confidentiality</b></div>
    <div><svg><use href="#i-bld"/></svg><b>Service to the community</b></div>
    <div><svg><use href="#i-ppl"/></svg><b>Teamwork and collaboration across medical specialities</b></div>
  </div>
</div></section>

<section class="help"><div class="w">
  <h2>Hope. Health. Humanity.</h2>
  <div class="hg">
    <div class="tile t-navy"><h3>Hope</h3><p>Giving strength in difficult times.</p></div>
    <div class="tile t-black"><h3>Health</h3><p>Providing the best possible treatment.</p></div>
    <div class="tile t-turq"><h3>Humanity</h3><p>Standing with patients beyond medicine.</p></div>
  </div>
</div></section>
<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
