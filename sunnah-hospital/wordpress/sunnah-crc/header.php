<?php
/**
 * Site header: top strip, logo header and main menu bar.
 *
 * @package sunnah-crc
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#content">Skip to content</a>
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-s" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2.4"><circle cx="10" cy="10" r="6.5"/><path d="m15 15 6 6"/></g></symbol>
  <symbol id="i-drop" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M14 6h14l8 8v28H14z"/><path d="M28 6v8h8M20 24h10M20 30h10M20 36h6"/></g></symbol>
  <symbol id="i-cell" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="24" cy="24" r="11"/><circle cx="21" cy="21" r="3"/><circle cx="28" cy="27" r="2"/><path d="M24 6v6M24 36v6M6 24h6M36 24h6M11 11l4 4M33 33l4 4M11 37l4-4M33 15l4-4"/></g></symbol>
  <symbol id="i-plan" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><rect x="10" y="8" width="26" height="34" rx="2"/><path d="M36 14h4v24h-4M16 18h14M16 25h14M16 32h9"/></g></symbol>
  <symbol id="i-treat" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><rect x="8" y="10" width="32" height="22"/><path d="M24 32v8M16 40h16M15 26v-6M21 26v-9M27 26v-4M33 26v-11"/></g></symbol>
  <symbol id="i-heart" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M24 40S8 30 8 18a8 8 0 0 1 16-3 8 8 0 0 1 16 3c0 12-16 22-16 22z"/><path d="M8 24h8l3-5 4 9 3-4h6"/></g></symbol>
  <symbol id="i-ppl" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="18" cy="16" r="6"/><circle cx="32" cy="18" r="5"/><path d="M6 38c0-7 5-12 12-12s12 5 12 12M28 38c0-5 2-9 6-10 5 0 8 4 8 10"/></g></symbol>
  <symbol id="i-leaf" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 38c0-16 10-26 28-28 0 18-10 28-26 28"/><path d="M10 38c6-10 12-16 20-20"/></g></symbol>
  <symbol id="i-pin" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2"><path d="M24 42S12 29 12 19a12 12 0 0 1 24 0c0 10-12 23-12 23z"/><circle cx="24" cy="19" r="4.5"/></g></symbol>
  <symbol id="i-bld" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M8 42V14l16-8 16 8v28M8 42h32M20 42V32h8v10M24 13v8M20 17h8"/></g></symbol>
  <symbol id="i-q" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="24" cy="24" r="16"/><path d="M19 19a5 5 0 1 1 6 5c-1 .5-1 1.3-1 2.5M24 32v.5"/></g></symbol>
  <symbol id="i-scalpel" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 40 30 18l6 6-22 22H8z"/><path d="m30 18 6-6a4 4 0 0 1 6 6l-6 6M22 26l6 6"/></g></symbol>
  <symbol id="i-vial" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6h8M22 6v6h4V6M16 12h16v6l-3 4v18a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2V22l-3-4z"/><path d="M19 28h10M19 34h10"/></g></symbol>
  <symbol id="i-scan" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="20" cy="20" r="12"/><path d="m29 29 12 12M14 20h3l2-4 3 8 2-4h3"/></g></symbol>
  <symbol id="i-flask" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6h12M20 6v12L8 38a3 3 0 0 0 3 4h26a3 3 0 0 0 3-4L28 18V6"/><path d="M13 30h22"/></g></symbol>
  <symbol id="i-shield" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M24 6 39 12v11c0 9-6.5 15.5-15 19-8.5-3.5-15-10-15-19V12z"/><path d="m17 24 5 5 9-10"/></g></symbol>
  <symbol id="i-bed" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 38V12M6 28h36v10M42 28v-4a6 6 0 0 0-6-6H22v10"/><circle cx="14" cy="22" r="4"/></g></symbol>
  <symbol id="i-pill" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="17" width="36" height="14" rx="7" transform="rotate(-45 24 24)"/><path d="m19 19 10 10"/></g></symbol>
  <symbol id="i-cal" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="7" y="10" width="34" height="31" rx="2"/><path d="M7 19h34M16 6v8M32 6v8M18 30l4 4 8-8"/></g></symbol>
  <symbol id="i-ph" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.9" stroke-linejoin="round" d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.9"><rect x="3" y="5" width="18" height="14" rx="1"/><path d="m3 7 9 6 9-6"/></g></symbol>
  <symbol id="i-clock" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></g></symbol>
  <symbol id="i-loc" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.9"><path d="M12 21s-7-7.6-7-12a7 7 0 0 1 14 0c0 4.4-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/></g></symbol>
  <symbol id="i-wa" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8s-.4-.1-.6.1-.7.8-.8 1-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.3-.4.3-.4.7-1.3.1-.2 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 3 3 0 0 0-.9 2.2 5.2 5.2 0 0 0 1.1 2.7 11.8 11.8 0 0 0 4.5 4c1.7.7 2.3.8 3.2.6a2.7 2.7 0 0 0 1.8-1.2 2.2 2.2 0 0 0 .1-1.2c0-.1-.2-.2-.4-.3z"/></symbol>
</svg>

<div class="topk"><div class="w">
  <a class="t1" href="<?php echo esc_url( sunnah_wa() ); ?>"><svg class="i" style="width:15px;height:15px;color:#25d366"><use href="#i-wa"/></svg>WhatsApp</a>
  <a class="t2" href="<?php echo sunnah_url( 'contact', 'enquiry' ); ?>">Request an Appointment</a>
  <a class="t3" href="<?php echo esc_attr( sunnah_tel() ); ?>">24x7 Emergency</a>
</div></div>

<header class="hdr"><div class="w">
  <a class="logo" href="<?php echo sunnah_url(); ?>"><img src="<?php echo sunnah_img( 'logo-header.png' ); ?>" alt="Sunnah Hospital – Cancer Research Center" width="171" height="58"></a>
  <nav class="util" aria-label="Utility"><a href="<?php echo sunnah_url( 'doctors' ); ?>">Our Doctors</a><a href="<?php echo sunnah_url( 'contact', 'location' ); ?>">Location</a><a href="<?php echo sunnah_url( 'infrastructure' ); ?>">Facilities</a><a href="<?php echo sunnah_url( 'contact' ); ?>">Contact Us</a><a href="<?php echo sunnah_url( 'patient-care', 'faqs' ); ?>">FAQs</a><a class="srch" href="<?php echo sunnah_url( 'cancer-care', 'types' ); ?>"><svg><use href="#i-s"/></svg>Search</a></nav>
  <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false" aria-controls="drawer"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7h18M3 12h18M3 17h18"/></svg></button>
</div></header>
<?php
$sunnah_menu = include get_theme_file_path( 'template-parts/menu-data.php' );
$sunnah_cur  = array(
	'cancer-care' => array( 'cancer-care', 'surgical-oncology', 'medical-oncology' ),
);
?>
<nav class="nbar" aria-label="Main"><div class="w" style="padding:0"><ul class="dd-list">
<?php foreach ( $sunnah_menu as $slug => $m ) : $pid = 'dd-' . $slug; ?>
  <li class="dd">
    <a class="dd-top" href="<?php echo sunnah_url( $slug ); ?>"<?php echo sunnah_nav_current( isset( $sunnah_cur[ $slug ] ) ? $sunnah_cur[ $slug ] : $slug ); ?>><?php echo esc_html( $m['label'] ); ?></a>
    <button class="dd-btn" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $pid ); ?>"><span class="sr"><?php echo esc_html( 'Show ' . $m['label'] . ' menu' ); ?></span></button>
    <div class="dd-panel" id="<?php echo esc_attr( $pid ); ?>"><div class="dd-in">
      <div class="dd-intro"><p class="dd-h"><?php echo esc_html( $m['label'] ); ?></p><p><?php echo esc_html( $m['intro'] ); ?></p><a class="arw" href="<?php echo sunnah_url( $slug ); ?>"><?php echo esc_html( 'Go to ' . $m['label'] ); ?></a></div>
      <ul class="dd-links">
        <?php foreach ( $m['links'] as $l ) : ?>
          <li><a href="<?php echo sunnah_url( $l[1], $l[2] ); ?>"><b><?php echo esc_html( $l[0] ); ?></b><span><?php echo esc_html( $l[3] ); ?></span></a></li>
        <?php endforeach; ?>
      </ul>
      <?php $f = $m['feature']; ?>
      <a class="dd-feat" href="<?php echo sunnah_url( $f[3], $f[4] ); ?>"><img src="<?php echo sunnah_img( $f[0] ); ?>" alt="" loading="lazy" width="320" height="200"><b><?php echo esc_html( $f[1] ); ?></b><span><?php echo esc_html( $f[2] ); ?></span></a>
    </div></div>
  </li>
<?php endforeach; ?>
</ul></div>
<div class="drawer" id="drawer" hidden>
  <a class="dr-home" href="<?php echo sunnah_url(); ?>">Home</a>
  <?php foreach ( $sunnah_menu as $slug => $m ) : ?>
  <details class="dr-sec">
    <summary><?php echo esc_html( $m['label'] ); ?></summary>
    <div class="dr-links">
      <a href="<?php echo sunnah_url( $slug ); ?>"><?php echo esc_html( 'All of ' . $m['label'] ); ?></a>
      <?php foreach ( $m['links'] as $l ) : ?><a href="<?php echo sunnah_url( $l[1], $l[2] ); ?>"><?php echo esc_html( $l[0] ); ?></a><?php endforeach; ?>
    </div>
  </details>
  <?php endforeach; ?>
  <div class="dr-acts"><a href="<?php echo esc_attr( sunnah_tel() ); ?>"><?php echo esc_html( 'Call ' . sunnah_opt( 'phone_1' ) ); ?></a><a class="wa" href="<?php echo esc_url( sunnah_wa() ); ?>">WhatsApp</a></div>
</div>
</nav>
