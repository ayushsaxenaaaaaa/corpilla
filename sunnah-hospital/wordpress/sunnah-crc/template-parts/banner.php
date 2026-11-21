<?php
/**
 * Inner page banner: photo, title and intro line.
 * Uses the page's Featured Image when one is set.
 *
 * Args: image (theme default file), title, lead.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$a = wp_parse_args( $args, array( 'image' => 'sh-building.jpg', 'title' => get_the_title(), 'lead' => '', 'kicker' => '' ) );
if ( '' === $a['kicker'] ) {
	$sunnah_kickers = array(
		'about-us'             => 'About Us',
		'cancer-care'          => 'Cancer Care',
		'departments'          => 'Our Specialities',
		'dental-care'          => 'Departments',
		'doctors'              => 'Meet Our Medical Team',
		'infrastructure'       => 'Hospital Facilities',
		'contact'              => 'Contact Sunnah Hospital',
		'news'                 => 'News & Resources',
		'community'            => 'Serving the Community',
		'health-awareness'     => 'News & Resources',
		'privacy-policy'       => 'Legal',
		'terms-and-conditions' => 'Legal',
	);
	$sunnah_slug  = is_page() ? (string) get_post_field( 'post_name', get_queried_object_id() ) : '';
	$a['kicker']  = isset( $sunnah_kickers[ $sunnah_slug ] ) ? $sunnah_kickers[ $sunnah_slug ] : 'Sunnah Hospital – Cancer Research Centre';
}
?>
<section class="pban">
  <img src="<?php echo sunnah_banner( $a['image'] ); ?>" alt="" fetchpriority="high">
  <div class="w">
    <p class="pkick"><?php echo esc_html( $a['kicker'] ); ?></p>
    <h1><?php echo esc_html( $a['title'] ); ?></h1>
    <?php if ( $a['lead'] ) : ?><p><?php echo esc_html( $a['lead'] ); ?></p><?php endif; ?>
  </div>
</section>
