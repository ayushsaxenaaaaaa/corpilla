<?php
/**
 * Sunnah Cancer Research Center theme functions.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sunnah_crc_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'sunnah_crc_setup' );

function sunnah_crc_assets() {
	$ver = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'sunnah-crc-fonts', 'https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;500&family=Barlow:wght@400;500;600&family=Barlow+Condensed:wght@500;600&display=swap', array(), null );
	wp_enqueue_style( 'sunnah-crc-home', get_theme_file_uri( 'assets/css/home.css' ), array( 'sunnah-crc-fonts' ), $ver );
	wp_enqueue_script( 'sunnah-crc-home', get_theme_file_uri( 'assets/js/home.js' ), array(), $ver, true );
	wp_add_inline_script( 'sunnah-crc-home', 'window.SUNNAH_CRC = ' . wp_json_encode( array( 'home' => trailingslashit( home_url( '/' ) ) ) ) . ';', 'before' );
}
add_action( 'wp_enqueue_scripts', 'sunnah_crc_assets' );

function sunnah_crc_preconnect( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'sunnah_crc_preconnect', 10, 2 );

function sunnah_crc_meta_description() {
	if ( is_front_page() ) {
		echo '<meta name="description" content="' . esc_attr__( 'Sunnah Hospital – Cancer Research Center, Akola: comprehensive, compassionate and affordable cancer care for Vidarbha. Surgical & medical oncology, chemotherapy day care, diagnostics, ICU, HDU and PM-JAY cashless treatment.', 'sunnah-crc' ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'sunnah_crc_meta_description', 1 );
