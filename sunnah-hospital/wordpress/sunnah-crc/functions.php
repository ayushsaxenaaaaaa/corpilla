<?php
/**
 * Sunnah Hospital – Cancer Research Centre theme functions.
 *
 * - Contact details, OPD timings and hospital information are edited in
 *   Appearance → Customize → "Hospital Contact Details" and "Hospital Information".
 * - Doctors are added in the WordPress admin under "Doctors".
 * - News and health articles are normal WordPress Posts (categories are created automatically).
 * - All site pages are created automatically when the theme is activated or updated.
 * - Each page's banner photo can be changed by setting the page's Featured Image.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SUNNAH_CRC_VERSION', '3.2.0' );

/* -------------------------------------------------------------------------
 * Setup and assets
 * ---------------------------------------------------------------------- */
function sunnah_crc_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_image_size( 'sunnah-banner', 1920, 760, true );
	add_image_size( 'sunnah-portrait', 720, 900, true );
	add_image_size( 'sunnah-card', 800, 500, true );
}
add_action( 'after_setup_theme', 'sunnah_crc_setup' );

function sunnah_crc_assets() {
	wp_enqueue_style( 'sunnah-crc-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Source+Serif+4:opsz,wght@8..60,600;8..60,700&display=swap', array(), null );
	wp_enqueue_style( 'sunnah-crc-home', get_theme_file_uri( 'assets/css/home.css' ), array( 'sunnah-crc-fonts' ), SUNNAH_CRC_VERSION );
	wp_enqueue_style( 'sunnah-crc-pages', get_theme_file_uri( 'assets/css/pages.css' ), array( 'sunnah-crc-home' ), SUNNAH_CRC_VERSION );
	wp_enqueue_script( 'sunnah-crc-site', get_theme_file_uri( 'assets/js/site.js' ), array(), SUNNAH_CRC_VERSION, true );
	$pages = array();
	foreach ( array( 'cancer-care', 'departments', 'dental-care', 'infrastructure', 'doctors', 'contact', 'health-awareness' ) as $slug ) {
		$pages[ $slug ] = html_entity_decode( sunnah_url( $slug ) );
	}
	wp_add_inline_script( 'sunnah-crc-site', 'window.SUNNAH_CRC = ' . wp_json_encode( array( 'home' => trailingslashit( home_url( '/' ) ), 'pages' => $pages ) ) . ';', 'before' );
}
add_action( 'wp_enqueue_scripts', 'sunnah_crc_assets' );

function sunnah_crc_preconnect( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'sunnah_crc_preconnect', 10, 2 );

/* -------------------------------------------------------------------------
 * Settings (Customizer)
 * ---------------------------------------------------------------------- */
function sunnah_crc_defaults() {
	return array(
		// Contact.
		'phone_1'         => '+91 99235 42674',
		'phone_2'         => '',
		'whatsapp'        => '919923542674',
		'emergency_phone' => '+91 99235 42674',
		'email'           => 'drhakimakola@gmail.com',
		'address'         => 'Ganga Nagar, Akola 444002, Maharashtra, India',
		'address_short'   => 'Ganga Nagar, Akola',
		'maps_url'        => 'https://www.google.com/maps/search/?api=1&query=Sunnah+Hospital+Ganga+Nagar+Akola',
		'maps_query'      => 'Sunnah Hospital, Ganga Nagar, Akola, Maharashtra',
		'opd_days'        => '',
		'opd_hours'       => '',
		'emergency_hours' => '',
		'enquiry_email'   => '',
		// Hospital at a glance.
		'stat_beds'       => '30+',
		'stat_icu'        => '9',
		'stat_ot'         => '2',
		'stat_floors'     => '3',
		// Hospital information (paragraphs; empty = a "contact us" line is shown instead).
		'surgery_list'      => '',
		'screening_list'    => '',
		'packages_info'     => '',
		'scheme_info'       => '',
		'patient_info'      => '',
		'partnerships'      => '',
		'initiatives'       => '',
		'founder_profile'   => '',
		'founder_photo'     => '',
		'opd_info'          => '',
		'milestones'        => '',
		'extra_facilities'  => '',
		'social_facebook'   => '',
		'social_instagram'  => '',
		'social_youtube'    => '',
	);
}

/**
 * Get a setting.
 *
 * @param string $key Setting key.
 * @return string
 */
function sunnah_opt( $key ) {
	$defaults = sunnah_crc_defaults();
	$value    = get_theme_mod( 'sunnah_' . $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
	return is_string( $value ) ? trim( $value ) : '';
}

/** Rich-text setting, safe to print (paragraphs and lists allowed). */
function sunnah_rich( $key ) {
	$v = sunnah_opt( $key );
	return '' === $v ? '' : wpautop( wp_kses_post( $v ) );
}

/** Lines of a "a | b | c" setting, split into parts. */
function sunnah_lines( $key ) {
	$out = array();
	foreach ( preg_split( '/\r?\n/', sunnah_opt( $key ) ) as $line ) {
		$line = trim( wp_strip_all_tags( $line ) );
		if ( '' !== $line ) {
			$out[] = array_map( 'trim', explode( '|', $line ) );
		}
	}
	return $out;
}

/** AB-PMJAY and MJPJAY logo badges. */
function sunnah_scheme_logos( $class = '' ) {
	$mj  = sunnah_opt( 'mjpjay_logo' );
	$out = '<div class="slogos ' . esc_attr( $class ) . '">';
	$out .= '<figure><img src="' . sunnah_img( 'pmjay.png' ) . '" alt="Ayushman Bharat – Pradhan Mantri Jan Arogya Yojana (AB-PMJAY) logo" width="80" height="80" loading="lazy"><figcaption>AB-PMJAY</figcaption></figure>';
	$out .= '<figure>' . ( $mj ? '<img src="' . esc_url( $mj ) . '" alt="Mahatma Jyotirao Phule Jan Arogya Yojana (MJPJAY) logo" width="80" height="80" loading="lazy">' : '<span class="slt" aria-hidden="true">MJPJAY</span>' ) . '<figcaption>MJPJAY</figcaption></figure>';
	return $out . '</div>';
}

/** Phone number as a tel: link value. */
function sunnah_tel( $key = 'phone_1' ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', sunnah_opt( $key ) );
}

/** WhatsApp link, optionally with a pre-filled message. */
function sunnah_wa( $text = '' ) {
	$url = 'https://wa.me/' . preg_replace( '/[^0-9]/', '', sunnah_opt( 'whatsapp' ) );
	return $text ? $url . '?text=' . rawurlencode( $text ) : $url;
}

/** "Please call" line used where the hospital has not yet supplied details. */
function sunnah_ask_line( $what ) {
	return '<p class="ask">' . esc_html( $what ) . ' Please call or WhatsApp <a href="' . esc_attr( sunnah_tel() ) . '">' . esc_html( sunnah_opt( 'phone_1' ) ) . '</a>.</p>';
}

function sunnah_crc_customize( $wp_customize ) {
	$defaults = sunnah_crc_defaults();

	$wp_customize->add_section(
		'sunnah_contact',
		array(
			'title'       => __( 'Hospital Contact Details', 'sunnah-crc' ),
			'description' => __( 'Used in the header, footer, contact page and buttons across the site.', 'sunnah-crc' ),
			'priority'    => 30,
		)
	);
	$contact = array(
		'phone_1'         => array( __( 'Phone number (main)', 'sunnah-crc' ), 'text' ),
		'phone_2'         => array( __( 'Second phone number (optional)', 'sunnah-crc' ), 'text' ),
		'whatsapp'        => array( __( 'WhatsApp number (digits with country code, e.g. 919923542674)', 'sunnah-crc' ), 'text' ),
		'emergency_phone' => array( __( 'Emergency contact number', 'sunnah-crc' ), 'text' ),
		'emergency_hours' => array( __( 'Emergency hours (leave empty until confirmed, e.g. "24 hours, 7 days")', 'sunnah-crc' ), 'text' ),
		'email'           => array( __( 'Email shown on the site', 'sunnah-crc' ), 'email' ),
		'address'         => array( __( 'Full address', 'sunnah-crc' ), 'text' ),
		'address_short'   => array( __( 'Short address', 'sunnah-crc' ), 'text' ),
		'maps_url'        => array( __( 'Google Maps link (Get Directions button)', 'sunnah-crc' ), 'url' ),
		'maps_query'      => array( __( 'Map search text for the embedded map', 'sunnah-crc' ), 'text' ),
		'opd_days'        => array( __( 'OPD days (e.g. Monday to Saturday)', 'sunnah-crc' ), 'text' ),
		'opd_hours'       => array( __( 'OPD timings (e.g. 10:00 am – 2:00 pm, 5:00 – 8:00 pm)', 'sunnah-crc' ), 'text' ),
		'enquiry_email'   => array( __( 'Send appointment requests to this email (empty = site admin email)', 'sunnah-crc' ), 'email' ),
		'social_facebook' => array( __( 'Official Facebook page link (optional)', 'sunnah-crc' ), 'url' ),
		'social_instagram'=> array( __( 'Official Instagram link (optional)', 'sunnah-crc' ), 'url' ),
		'social_youtube'  => array( __( 'Official YouTube link (optional)', 'sunnah-crc' ), 'url' ),
	);
	foreach ( $contact as $key => $c ) {
		$san = 'sanitize_text_field';
		if ( 'url' === $c[1] ) {
			$san = 'esc_url_raw';
		} elseif ( 'email' === $c[1] ) {
			$san = 'sanitize_email';
		}
		$wp_customize->add_setting( 'sunnah_' . $key, array( 'default' => $defaults[ $key ], 'sanitize_callback' => $san ) );
		$wp_customize->add_control( 'sunnah_' . $key, array( 'label' => $c[0], 'section' => 'sunnah_contact', 'type' => 'url' === $c[1] ? 'url' : 'text' ) );
	}

	$wp_customize->add_section(
		'sunnah_info',
		array(
			'title'       => __( 'Hospital Information', 'sunnah-crc' ),
			'description' => __( 'Confirmed details shown on the website. Leave a box empty until the hospital has confirmed it; the site then shows a "please call us" line instead. Simple formatting (paragraphs, bullet lists using <ul><li>) is allowed.', 'sunnah-crc' ),
			'priority'    => 31,
		)
	);
	$info = array(
		'stat_beds'       => array( __( 'Hospital at a glance: beds (e.g. 30+)', 'sunnah-crc' ), 'text' ),
		'stat_icu'        => array( __( 'Hospital at a glance: ICU beds', 'sunnah-crc' ), 'text' ),
		'stat_ot'         => array( __( 'Hospital at a glance: operation theatres', 'sunnah-crc' ), 'text' ),
		'stat_floors'     => array( __( 'Hospital at a glance: floors', 'sunnah-crc' ), 'text' ),
		'surgery_list'    => array( __( 'Cancer surgeries performed (confirmed list)', 'sunnah-crc' ), 'textarea' ),
		'screening_list'  => array( __( 'Cancer screening tests and diagnostic procedures available', 'sunnah-crc' ), 'textarea' ),
		'packages_info'   => array( __( 'Inpatient cancer-care packages (names, duration, bed category, inclusions, exclusions, pricing)', 'sunnah-crc' ), 'textarea' ),
		'scheme_info'     => array( __( 'Government schemes: empanelment status, approved packages, eligibility, documents, helpdesk', 'sunnah-crc' ), 'textarea' ),
		'patient_info'    => array( __( 'Patient & visitor information (admission, documents, visitors, billing, discharge, visiting hours)', 'sunnah-crc' ), 'textarea' ),
		'opd_info'        => array( __( 'OPD: appointment instructions', 'sunnah-crc' ), 'textarea' ),
		'founder_profile' => array( __( 'Founder: approved short profile', 'sunnah-crc' ), 'textarea' ),
		'milestones'      => array( __( 'About Us: extra history milestones, one per line as "Year | Title | Description" (verified only)', 'sunnah-crc' ), 'textarea' ),
		'extra_facilities'=> array( __( 'Facilities: extra confirmed facilities, one per line as "Name | Description"', 'sunnah-crc' ), 'textarea' ),
		'initiatives'     => array( __( 'Community: institutional development & healthcare initiatives (verified)', 'sunnah-crc' ), 'textarea' ),
		'partnerships'    => array( __( 'Community: institutional partnerships (verified; section is hidden while empty)', 'sunnah-crc' ), 'textarea' ),
	);
	foreach ( $info as $key => $c ) {
		$wp_customize->add_setting( 'sunnah_' . $key, array( 'default' => $defaults[ $key ], 'sanitize_callback' => 'textarea' === $c[1] ? 'wp_kses_post' : 'sanitize_text_field' ) );
		$wp_customize->add_control( 'sunnah_' . $key, array( 'label' => $c[0], 'section' => 'sunnah_info', 'type' => $c[1] ) );
	}
	$wp_customize->add_section(
		'sunnah_dept',
		array(
			'title'       => __( 'Department Services', 'sunnah-crc' ),
			'description' => __( 'Confirmed services for each department, shown on the Departments page. One service per line. Leave empty until confirmed.', 'sunnah-crc' ),
			'priority'    => 32,
		)
	);
	foreach ( sunnah_crc_service_keys() as $key => $label ) {
		$wp_customize->add_setting( 'sunnah_svc_' . $key, array( 'default' => '', 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( 'sunnah_svc_' . $key, array( 'label' => $label, 'section' => 'sunnah_dept', 'type' => 'textarea' ) );
	}
	$wp_customize->add_setting( 'sunnah_mjpjay_logo', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sunnah_mjpjay_logo', array( 'label' => __( 'MJPJAY scheme logo (official file)', 'sunnah-crc' ), 'section' => 'sunnah_info' ) ) );
	$wp_customize->add_setting( 'sunnah_founder_photo', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sunnah_founder_photo', array( 'label' => __( 'Founder photograph', 'sunnah-crc' ), 'section' => 'sunnah_info' ) ) );
}
add_action( 'customize_register', 'sunnah_crc_customize' );

/* -------------------------------------------------------------------------
 * Departments and doctors
 * ---------------------------------------------------------------------- */
function sunnah_crc_specialities() {
	return array(
		'General Medicine',
		'General Surgery',
		'Medical Oncology',
		'Surgical Oncology',
		'Orthopaedics',
		'Urology',
		'Neurology',
		'ENT',
		'Dental',
		'Anaesthesia & Critical Care',
		'Pathology',
		'Radiology & Imaging',
		'Palliative & Supportive Care',
		'Cancer Counselling',
	);
}

function sunnah_crc_register_doctor() {
	register_post_type(
		'doctor',
		array(
			'labels'        => array(
				'name'          => __( 'Doctors', 'sunnah-crc' ),
				'singular_name' => __( 'Doctor', 'sunnah-crc' ),
				'add_new_item'  => __( 'Add New Doctor', 'sunnah-crc' ),
				'edit_item'     => __( 'Edit Doctor', 'sunnah-crc' ),
				'all_items'     => __( 'All Doctors', 'sunnah-crc' ),
			),
			'public'        => true,
			'has_archive'   => false,
			'menu_icon'     => 'dashicons-groups',
			'menu_position' => 21,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'rewrite'       => array( 'slug' => 'doctor' ),
			'show_in_rest'  => true, // Needed by the WordPress editor; the REST API is closed to visitors below.
		)
	);
}
add_action( 'init', 'sunnah_crc_register_doctor' );

function sunnah_crc_doctor_fields() {
	return array(
		'speciality'    => __( 'Medical speciality', 'sunnah-crc' ),
		'type'          => __( 'Full-time or visiting consultant', 'sunnah-crc' ),
		'role'          => __( 'Designation (e.g. Consultant, Head of Department)', 'sunnah-crc' ),
		'qualification' => __( 'Qualifications (e.g. MBBS, MS, MCh)', 'sunnah-crc' ),
		'experience'    => __( 'Years of experience (only if verified)', 'sunnah-crc' ),
		'interests'     => __( 'Clinical interests', 'sunnah-crc' ),
		'days'          => __( 'Consultation days', 'sunnah-crc' ),
		'opd'           => __( 'OPD timings', 'sunnah-crc' ),
		'languages'     => __( 'Languages spoken (optional)', 'sunnah-crc' ),
	);
}

function sunnah_crc_doctor_metabox() {
	add_meta_box( 'sunnah_doctor_details', __( 'Doctor Details', 'sunnah-crc' ), 'sunnah_crc_doctor_metabox_html', 'doctor', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'sunnah_crc_doctor_metabox' );

function sunnah_crc_doctor_metabox_html( $post ) {
	wp_nonce_field( 'sunnah_doctor_save', 'sunnah_doctor_nonce' );
	echo '<p>' . esc_html__( 'Doctor name goes in the title above (e.g. Dr. Firstname Surname). The photograph is the Featured Image (portrait, about 720 × 900 px). The main text box is the short professional biography.', 'sunnah-crc' ) . '</p>';
	echo '<table class="form-table">';
	foreach ( sunnah_crc_doctor_fields() as $key => $label ) {
		$value = get_post_meta( $post->ID, '_sunnah_' . $key, true );
		echo '<tr><th><label for="sunnah_' . esc_attr( $key ) . '">' . esc_html( $label ) . '</label></th><td>';
		if ( 'speciality' === $key || 'type' === $key ) {
			$opts = 'speciality' === $key ? sunnah_crc_specialities() : array( 'Full-time Consultant', 'Visiting Consultant' );
			echo '<select id="sunnah_' . esc_attr( $key ) . '" name="sunnah_' . esc_attr( $key ) . '">';
			foreach ( $opts as $s ) {
				echo '<option value="' . esc_attr( $s ) . '"' . selected( $value, $s, false ) . '>' . esc_html( $s ) . '</option>';
			}
			echo '</select>';
		} else {
			echo '<input class="regular-text" type="text" id="sunnah_' . esc_attr( $key ) . '" name="sunnah_' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '">';
		}
		echo '</td></tr>';
	}
	echo '</table>';
}

function sunnah_crc_doctor_save( $post_id ) {
	if ( ! isset( $_POST['sunnah_doctor_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sunnah_doctor_nonce'] ) ), 'sunnah_doctor_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	foreach ( array_keys( sunnah_crc_doctor_fields() ) as $key ) {
		if ( isset( $_POST[ 'sunnah_' . $key ] ) ) {
			update_post_meta( $post_id, '_sunnah_' . $key, sanitize_text_field( wp_unslash( $_POST[ 'sunnah_' . $key ] ) ) );
		}
	}
}
add_action( 'save_post_doctor', 'sunnah_crc_doctor_save' );

/**
 * Get doctors, optionally for one or more specialities.
 *
 * @param string|array $speciality Speciality name(s) or empty for all.
 * @return WP_Post[]
 */
function sunnah_crc_get_doctors( $speciality = '' ) {
	$args = array(
		'post_type'      => 'doctor',
		'posts_per_page' => 100,
		'orderby'        => array( 'menu_order' => 'ASC', 'title' => 'ASC' ),
		'no_found_rows'  => true,
	);
	if ( $speciality ) {
		$args['meta_query'] = array(
			array(
				'key'     => '_sunnah_speciality',
				'value'   => (array) $speciality,
				'compare' => 'IN',
			),
		);
	}
	return get_posts( $args );
}

/**
 * Departments shown on the home page and the Departments page.
 * anchor => [name, icon, short description, doctor speciality].
 */
function sunnah_crc_departments() {
	return array(
		'general-medicine'  => array( 'General Medicine', 'i-steth', 'Diagnosis and treatment of a wide range of medical conditions in adults.', 'General Medicine' ),
		'general-surgery'   => array( 'General Surgery', 'i-scalpel', 'Planned and emergency surgical care, with two operation theatres and post-operative support.', 'General Surgery' ),
		'dental'            => array( 'Dental', 'i-tooth', 'Dental and oral health care at Sunnah Dental Care.', 'Dental' ),
		'medical-oncology'  => array( 'Medical Oncology', 'i-drop', 'Cancer assessment, chemotherapy, treatment monitoring and follow-up.', 'Medical Oncology' ),
		'surgical-oncology' => array( 'Surgical Oncology', 'i-cell', 'Surgical evaluation and treatment of cancer by surgical oncologists.', 'Surgical Oncology' ),
		'orthopaedics'      => array( 'Orthopaedics', 'i-bone', 'Care for bones, joints, fractures and musculoskeletal conditions.', 'Orthopaedics' ),
		'urology'           => array( 'Urology', 'i-kid', 'Assessment and treatment of kidney, bladder, prostate and urinary tract conditions.', 'Urology' ),
		'neurology'         => array( 'Neurology', 'i-brain', 'Consultation for conditions of the brain, spine, nerves and muscles.', 'Neurology' ),
		'ent'               => array( 'ENT', 'i-ear', 'Care for conditions of the ear, nose and throat.', 'ENT' ),
	);
}

/** Departments that have a confirmed-services box in the Customizer. */
function sunnah_crc_service_keys() {
	$keys = array();
	foreach ( sunnah_crc_departments() as $k => $d ) {
		$keys[ $k ] = $d[0];
	}
	$keys['icu']       = 'Intensive Care Unit (equipment and capabilities)';
	$keys['pathology'] = 'Pathology (available tests)';
	$keys['imaging']   = 'Digital X-ray and sonography';
	return $keys;
}

/** Confirmed services list for a department as an HTML list, or ''. */
function sunnah_services( $key ) {
	$lines = array_filter( array_map( 'trim', explode( "\n", (string) get_theme_mod( 'sunnah_svc_' . $key, '' ) ) ) );
	if ( ! $lines ) {
		return '';
	}
	$out = '<ul class="ticks two">';
	foreach ( $lines as $l ) {
		$out .= '<li>' . esc_html( ltrim( $l, "-•* \t" ) ) . '</li>';
	}
	return $out . '</ul>';
}

/** Doctor meta helper. */
function sunnah_doc( $post_id, $key ) {
	return (string) get_post_meta( $post_id, '_sunnah_' . $key, true );
}

/* -------------------------------------------------------------------------
 * Pages and news categories created on activation / update
 * ---------------------------------------------------------------------- */
function sunnah_crc_pages() {
	return array(
		'about-us'             => __( 'About Us', 'sunnah-crc' ),
		'cancer-care'          => __( 'Cancer Research Centre', 'sunnah-crc' ),
		'departments'          => __( 'Departments & Specialities', 'sunnah-crc' ),
		'dental-care'          => __( 'Sunnah Dental Care', 'sunnah-crc' ),
		'doctors'              => __( 'Our Doctors', 'sunnah-crc' ),
		'infrastructure'       => __( 'Facilities & Infrastructure', 'sunnah-crc' ),
		'contact'              => __( 'Contact & Appointments', 'sunnah-crc' ),
		'news'                 => __( 'News & Medical Achievements', 'sunnah-crc' ),
		'community'            => __( 'Community Impact & Partnerships', 'sunnah-crc' ),
		'health-awareness'     => __( 'Health Awareness & Resources', 'sunnah-crc' ),
		'privacy-policy'       => __( 'Privacy Policy', 'sunnah-crc' ),
		'terms-and-conditions' => __( 'Terms & Conditions', 'sunnah-crc' ),
	);
}

/** Pages from earlier theme versions, now merged into other pages. */
function sunnah_crc_retired_pages() {
	return array(
		'surgical-oncology' => array( 'cancer-care', 'surgical-oncology' ),
		'medical-oncology'  => array( 'cancer-care', 'medical-oncology' ),
		'diagnostics'       => array( 'departments', 'critical-care' ),
		'patient-care'      => array( 'contact', 'patient-info' ),
		'research'          => array( 'cancer-care', '' ),
	);
}

function sunnah_crc_news_categories() {
	return array(
		'hospital-announcements' => 'Hospital Announcements',
		'medical-achievements'   => 'Medical Achievements',
		'awareness-activities'   => 'Health Awareness Activities',
		'events-programmes'      => 'Events & Programmes',
		'media-coverage'         => 'Media Coverage',
		'health-articles'        => 'Health Articles',
	);
}

function sunnah_crc_activate() {
	$titles = sunnah_crc_pages();
	foreach ( $titles as $slug => $title ) {
		$page = get_page_by_path( $slug );
		if ( ! $page ) {
			wp_insert_post(
				array(
					'post_type'   => 'page',
					'post_status' => 'publish',
					'post_title'  => $title,
					'post_name'   => $slug,
				)
			);
		} elseif ( in_array( $page->post_title, array( 'Cancer Care', 'Doctors & Specialists', 'Hospital Infrastructure', 'Contact & Appointment' ), true ) ) {
			// Rename pages created by earlier theme versions.
			wp_update_post( array( 'ID' => $page->ID, 'post_title' => $title ) );
		}
	}
	// Retire pages from earlier versions (only if they were left empty, i.e. created by the theme).
	foreach ( array_keys( sunnah_crc_retired_pages() ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page && 'publish' === $page->post_status && '' === trim( $page->post_content ) ) {
			wp_update_post( array( 'ID' => $page->ID, 'post_status' => 'draft' ) );
		}
	}
	foreach ( sunnah_crc_news_categories() as $slug => $name ) {
		if ( ! term_exists( $slug, 'category' ) ) {
			wp_insert_term( $name, 'category', array( 'slug' => $slug ) );
		}
	}
	sunnah_crc_register_doctor();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'sunnah_crc_activate' );

/**
 * Also create missing pages after the theme is updated while already active
 * (WordPress does not run "after_switch_theme" in that case).
 */
function sunnah_crc_maybe_setup() {
	if ( get_option( 'sunnah_crc_setup_version' ) === SUNNAH_CRC_VERSION ) {
		return;
	}
	sunnah_crc_activate();
	update_option( 'sunnah_crc_setup_version', SUNNAH_CRC_VERSION );
}
add_action( 'init', 'sunnah_crc_maybe_setup', 20 );

/** Send visitors of retired page addresses to the section that replaced them. */
function sunnah_crc_redirect_retired() {
	if ( is_admin() ) {
		return;
	}
	$path = trim( (string) wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '', PHP_URL_PATH ), '/' );
	$slug = basename( $path );
	$map  = sunnah_crc_retired_pages();
	if ( isset( $map[ $slug ] ) && ( is_404() || is_page( $slug ) ) ) {
		wp_safe_redirect( html_entity_decode( sunnah_url( $map[ $slug ][0], $map[ $slug ][1] ) ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'sunnah_crc_redirect_retired', 5 );

/**
 * Link to one of the theme's pages. Uses the real page address, so links work with any
 * permalink setting (including "Plain").
 */
function sunnah_url( $slug = '', $anchor = '' ) {
	static $cache = array();
	if ( '' === $slug ) {
		$url = home_url( '/' );
	} elseif ( isset( $cache[ $slug ] ) ) {
		$url = $cache[ $slug ];
	} else {
		$page = get_page_by_path( $slug );
		$url  = ( $page && 'publish' === $page->post_status ) ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
		$cache[ $slug ] = $url;
	}
	return esc_url( $url ) . ( $anchor ? '#' . $anchor : '' );
}

/** Theme image URL. */
function sunnah_img( $file ) {
	return esc_url( get_theme_file_uri( 'assets/img/' . $file ) );
}

/** Banner image: the page's featured image if set, otherwise the theme default. */
function sunnah_banner( $default ) {
	if ( is_singular() && has_post_thumbnail() ) {
		$src = get_the_post_thumbnail_url( null, 'sunnah-banner' );
		if ( $src ) {
			return esc_url( $src );
		}
	}
	return sunnah_img( $default );
}

/** Latest posts, optionally from given category slugs. */
function sunnah_crc_posts( $cats = array(), $n = 3 ) {
	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => $n,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);
	if ( $cats ) {
		$args['category_name'] = implode( ',', (array) $cats );
	}
	return get_posts( $args );
}

/* -------------------------------------------------------------------------
 * Appointment enquiry form
 * ---------------------------------------------------------------------- */
function sunnah_crc_handle_enquiry() {
	$back = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$back = remove_query_arg( 'enquiry', $back );
	$back = strtok( $back, '#' );

	if ( ! isset( $_POST['sunnah_enquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sunnah_enquiry_nonce'] ) ), 'sunnah_enquiry' ) ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'error', $back ) . '#enquiry' );
		exit;
	}
	if ( ! sunnah_crc_enquiry_rate_ok() ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'failed', $back ) . '#enquiry' );
		exit;
	}
	// Spam trap: real visitors never fill this hidden field.
	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'sent', $back ) . '#enquiry' );
		exit;
	}

	$f = array();
	foreach ( array( 'patient_name', 'mobile', 'department', 'pref_date', 'pref_time' ) as $k ) {
		$f[ $k ] = isset( $_POST[ $k ] ) ? wp_html_excerpt( sanitize_text_field( wp_unslash( $_POST[ $k ] ) ), 120 ) : '';
	}
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$message = isset( $_POST['message'] ) ? wp_html_excerpt( sanitize_textarea_field( wp_unslash( $_POST['message'] ) ), 2000 ) : '';

	if ( '' === $f['patient_name'] || strlen( preg_replace( '/\D/', '', $f['mobile'] ) ) < 10 ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'missing', $back ) . '#enquiry' );
		exit;
	}

	$to      = sunnah_opt( 'enquiry_email' ) ? sunnah_opt( 'enquiry_email' ) : get_option( 'admin_email' );
	$subject = sprintf( 'Appointment enquiry: %s', wp_html_excerpt( $f['patient_name'], 60 ) );
	$body    = "Patient name: {$f['patient_name']}\nContact number: {$f['mobile']}\nEmail: " . ( $email ? $email : '-' )
		. "\nDepartment / speciality: " . ( $f['department'] ? $f['department'] : '-' )
		. "\nPreferred date: " . ( $f['pref_date'] ? $f['pref_date'] : '-' )
		. "\nPreferred time: " . ( $f['pref_time'] ? $f['pref_time'] : '-' )
		. "\n\nReason for appointment:\n" . ( $message ? $message : '-' )
		. "\n\nPlease call the patient to confirm the appointment.\nSent from: {$back}\n";
	$headers = ( $email && is_email( $email ) ) ? array( 'Reply-To: ' . $email ) : array();
	$ok      = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'enquiry', $ok ? 'sent' : 'failed', $back ) . '#enquiry' );
	exit;
}
add_action( 'admin_post_nopriv_sunnah_enquiry', 'sunnah_crc_handle_enquiry' );
add_action( 'admin_post_sunnah_enquiry', 'sunnah_crc_handle_enquiry' );

/** Status message after an enquiry was submitted. */
function sunnah_enquiry_notice() {
	$state = isset( $_GET['enquiry'] ) ? sanitize_key( wp_unslash( $_GET['enquiry'] ) ) : '';
	$msgs  = array(
		'sent'    => __( 'Thank you. Your enquiry has been received. Our staff will call you to confirm the appointment; it is not confirmed until they do.', 'sunnah-crc' ),
		'missing' => __( 'Please enter the patient name and a 10-digit contact number.', 'sunnah-crc' ),
		'failed'  => __( 'Sorry, your enquiry could not be sent. Please call or WhatsApp us instead.', 'sunnah-crc' ),
		'error'   => __( 'Sorry, something went wrong. Please try again, or call or WhatsApp us.', 'sunnah-crc' ),
	);
	if ( isset( $msgs[ $state ] ) ) {
		printf( '<p class="fnote %s" role="status">%s</p>', 'sent' === $state ? 'ok' : 'err', esc_html( $msgs[ $state ] ) );
	}
}

/* -------------------------------------------------------------------------
 * SEO basics
 * ---------------------------------------------------------------------- */
function sunnah_crc_meta_description() {
	$desc = '';
	if ( is_front_page() ) {
		$desc = 'Sunnah Hospital – Cancer Research Centre, Ganga Nagar, Akola: a multispeciality hospital established in 2008, providing medical, surgical and specialised cancer care services.';
	} elseif ( is_page() ) {
		$map  = array(
			'about-us'             => 'About Sunnah Hospital – Cancer Research Centre, Akola: established 8 March 2008 under Janta Multipurpose Society, founded by Dr. Hakimuddin Shaikh.',
			'cancer-care'          => 'Cancer care at Sunnah Hospital, Akola: medical oncology, surgical oncology, chemotherapy, screening and biopsy, counselling, continuing inpatient care and palliative care.',
			'departments'          => 'Departments at Sunnah Hospital, Akola: general medicine, general surgery, oncology, orthopaedics, urology, neurology, ENT, dental, ICU, pathology, digital X-ray and sonography.',
			'dental-care'          => 'Sunnah Dental Care at Sunnah Hospital, Akola: oral health assessment and dental care.',
			'doctors'              => 'Doctors at Sunnah Hospital – Cancer Research Centre, Akola: full-time and visiting consultants, qualifications and consultation timings.',
			'infrastructure'       => 'Facilities at Sunnah Hospital, Akola: 30+ beds, 9-bed ICU, two operation theatres, diagnostics and day-care facilities.',
			'contact'              => 'Contact Sunnah Hospital – Cancer Research Centre, Ganga Nagar, Akola. Appointments, OPD information, emergency contact and directions.',
			'news'                 => 'News, announcements and medical achievements from Sunnah Hospital – Cancer Research Centre, Akola.',
			'community'            => 'Community health initiatives, government health schemes and partnerships of Sunnah Hospital, Akola.',
			'health-awareness'     => 'Health awareness and patient education from Sunnah Hospital, Akola: cancer awareness, warning signs and patient resources.',
		);
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		$desc = isset( $map[ $slug ] ) ? $map[ $slug ] : '';
	} elseif ( is_singular( 'doctor' ) ) {
		$desc = get_the_title() . ' – ' . sunnah_doc( get_the_ID(), 'speciality' ) . ' at Sunnah Hospital – Cancer Research Centre, Akola.';
	} elseif ( is_singular( 'post' ) ) {
		$desc = wp_html_excerpt( wp_strip_all_tags( get_the_excerpt() ), 155 );
	}
	if ( $desc ) {
		echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'sunnah_crc_meta_description', 1 );

function sunnah_crc_schema() {
	if ( ! is_front_page() && ! is_page( 'contact' ) ) {
		return;
	}
	$data = array(
		'@context'      => 'https://schema.org',
		'@type'         => 'Hospital',
		'name'          => 'Sunnah Hospital – Cancer Research Centre',
		'url'           => home_url( '/' ),
		'telephone'     => sunnah_opt( 'phone_1' ),
		'email'         => sunnah_opt( 'email' ),
		'foundingDate'  => '2008-03-08',
		'parentOrganization' => array( '@type' => 'Organization', 'name' => 'Janta Multipurpose Society' ),
		'address'       => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => 'Ganga Nagar',
			'addressLocality' => 'Akola',
			'addressRegion'   => 'Maharashtra',
			'postalCode'      => '444002',
			'addressCountry'  => 'IN',
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $data ) . '</script>' . "\n";
}
add_action( 'wp_head', 'sunnah_crc_schema' );

/** Mark the current section in the main menu. */
function sunnah_nav_current( $slugs ) {
	$slugs = (array) $slugs;
	foreach ( $slugs as $slug ) {
		if ( is_page( $slug ) ) {
			return ' aria-current="page"';
		}
	}
	if ( in_array( 'doctors', $slugs, true ) && is_singular( 'doctor' ) ) {
		return ' aria-current="page"';
	}
	if ( in_array( 'news', $slugs, true ) && ( is_singular( 'post' ) || is_category() ) ) {
		return ' aria-current="page"';
	}
	return '';
}

/* -------------------------------------------------------------------------
 * Security hardening (theme-level)
 * Site-level steps (hosting, wp-config, passwords, backups, firewall) are in SECURITY.md.
 * ---------------------------------------------------------------------- */

// No code editing from the WordPress admin (stops an attacker with a stolen login from editing PHP).
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

// Do not advertise the WordPress version.
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// Remove discovery links that are not needed.
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Turn off XML-RPC (a common target for password-guessing attacks). The site does not use it.
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter(
	'wp_headers',
	function ( $headers ) {
		unset( $headers['X-Pingback'] );
		return $headers;
	}
);

/*
 * Close the REST API to visitors who are not logged in.
 * The public website does not use it (the enquiry form uses a normal form post).
 * Logged-in staff still need it for the WordPress editor, so it stays available to them.
 */
add_filter(
	'rest_authentication_errors',
	function ( $result ) {
		if ( ! empty( $result ) ) {
			return $result;
		}
		if ( ! is_user_logged_in() ) {
			return new WP_Error( 'rest_not_logged_in', __( 'The API is not available.', 'sunnah-crc' ), array( 'status' => 401 ) );
		}
		return $result;
	}
);
// Application passwords allow API logins from outside the site; not needed here.
add_filter( 'wp_is_application_passwords_available', '__return_false' );

// Comments are not used on a hospital site (they attract spam and links).
add_filter( 'comments_open', '__return_false', 20 );
add_filter( 'pings_open', '__return_false', 20 );
add_filter( 'comments_array', '__return_empty_array', 10 );
add_action(
	'init',
	function () {
		remove_post_type_support( 'post', 'comments' );
		remove_post_type_support( 'page', 'comments' );
		remove_post_type_support( 'post', 'trackbacks' );
	},
	100
);
add_action(
	'admin_menu',
	function () {
		remove_menu_page( 'edit-comments.php' );
	}
);

// Security headers on public pages.
function sunnah_crc_security_headers() {
	if ( is_admin() || headers_sent() ) {
		return;
	}
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=()' );
	if ( is_ssl() ) {
		header( 'Strict-Transport-Security: max-age=31536000' );
	}
}
add_action( 'send_headers', 'sunnah_crc_security_headers' );

// Stop visitors listing usernames via ?author=1 links and author pages.
function sunnah_crc_block_author_scan() {
	if ( is_admin() ) {
		return;
	}
	if ( isset( $_GET['author'] ) || is_author() ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'sunnah_crc_block_author_scan', 1 );
add_filter( 'wp_sitemaps_add_provider', function ( $provider, $name ) { return 'users' === $name ? false : $provider; }, 10, 2 );

// Same message for wrong username and wrong password, so attackers cannot tell which was right.
add_filter( 'login_errors', function () { return __( 'The login details are incorrect.', 'sunnah-crc' ); } );

// Flood protection for the enquiry form: max 5 submissions per visitor per 10 minutes.
function sunnah_crc_enquiry_rate_ok() {
	$ip  = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
	$key = 'sunnah_enq_' . md5( $ip );
	$n   = (int) get_transient( $key );
	if ( $n >= 5 ) {
		return false;
	}
	set_transient( $key, $n + 1, 10 * MINUTE_IN_SECONDS );
	return true;
}

/* -------------------------------------------------------------------------
 * robots.txt (WordPress serves this automatically at /robots.txt)
 * ---------------------------------------------------------------------- */
function sunnah_crc_robots( $output, $public ) {
	if ( '0' === (string) $public ) {
		return $output; // "Discourage search engines" is ticked in Settings → Reading.
	}
	$lines = array(
		'User-agent: *',
		'Disallow: /wp-admin/',
		'Allow: /wp-admin/admin-ajax.php',
		'Disallow: /wp-login.php',
		'Disallow: /wp-json/',
		'Disallow: /?s=',
		'Disallow: /search/',
		'',
		'Sitemap: ' . home_url( '/wp-sitemap.xml' ),
	);
	return implode( "\n", $lines ) . "\n";
}
add_filter( 'robots_txt', 'sunnah_crc_robots', 10, 2 );

/* -------------------------------------------------------------------------
 * Browser-tab icon and link previews (WhatsApp, Facebook)
 * ---------------------------------------------------------------------- */
function sunnah_crc_icon_and_og() {
	if ( ! has_site_icon() ) {
		echo '<link rel="icon" type="image/png" href="' . sunnah_img( 'favicon.png' ) . '">' . "\n";
		echo '<link rel="apple-touch-icon" href="' . sunnah_img( 'favicon.png' ) . '">' . "\n";
	}
	$title = wp_get_document_title();
	$url   = is_singular() ? get_permalink() : home_url( '/' );
	$img   = ( is_singular() && has_post_thumbnail() ) ? get_the_post_thumbnail_url( null, 'large' ) : get_theme_file_uri( 'assets/img/og-image.jpg' );
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:site_name" content="Sunnah Hospital – Cancer Research Centre">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $img ) . '">' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	echo '<meta name="theme-color" content="#00354e">' . "\n";
}
add_action( 'wp_head', 'sunnah_crc_icon_and_og', 2 );
