<?php
/**
 * Contact & Appointment page (slug: contact).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-building.jpg', 'title' => 'Contact & Appointment', 'lead' => 'Call, WhatsApp or send a request and our team will call you back.' ) );
?>
<main id="content">
<div class="w cgrid">
  <div>
    <h2 style="font-size:clamp(1.8rem,2.8vw,2.3rem);margin-bottom:18px">Request an appointment</h2>
    <?php get_template_part( 'template-parts/enquiry-form' ); ?>
  </div>
  <div>
    <h2 style="font-size:clamp(1.8rem,2.8vw,2.3rem);margin-bottom:18px">Contact details</h2>
    <ul class="clist">
      <li><i><svg><use href="#i-ph"/></svg></i><small>Phone</small><span><a href="<?php echo esc_attr( sunnah_tel( 'phone_1' ) ); ?>"><?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a><?php if ( sunnah_opt( 'phone_2' ) ) : ?> · <a href="<?php echo esc_attr( sunnah_tel( 'phone_2' ) ); ?>"><?php echo esc_html( sunnah_opt( 'phone_2' ) ); ?></a><?php endif; ?></span></li>
      <li><i><svg><use href="#i-wa"/></svg></i><small>WhatsApp</small><a href="<?php echo esc_url( sunnah_wa() ); ?>">Message us on WhatsApp</a></li>
      <li><i><svg><use href="#i-mail"/></svg></i><small>Email</small><a href="mailto:<?php echo esc_attr( sunnah_opt( 'email' ) ); ?>"><?php echo esc_html( sunnah_opt( 'email' ) ); ?></a></li>
      <li><i><svg><use href="#i-clock"/></svg></i><small>Emergency</small><b>24x7 Casualty &amp; Emergency Care</b></li>
      <li><i><svg><use href="#i-cal"/></svg></i><small>OPD</small><b><?php echo esc_html( sunnah_opt( 'opd_hours' ) ); ?></b></li>
    </ul>
    <div class="gmap" id="location"><iframe title="Map showing Sunnah Hospital, Akola" src="<?php echo esc_url( 'https://www.google.com/maps?q=' . rawurlencode( 'Sunnah Hospital, ' . sunnah_opt( 'address' ) ) . '&output=embed' ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    <div class="facts2" style="margin-top:14px"><a class="sbtn navy" href="<?php echo esc_url( sunnah_opt( 'maps_url' ) ); ?>" target="_blank" rel="noopener">Get directions</a><a class="sbtn out" href="<?php echo esc_attr( sunnah_tel() ); ?>">Call <?php echo esc_html( sunnah_opt( 'phone_1' ) ); ?></a></div>
  </div>
</div>
</main>
<?php
get_footer();
