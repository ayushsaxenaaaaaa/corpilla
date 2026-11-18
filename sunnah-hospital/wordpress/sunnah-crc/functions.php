<?php
/**
 * Sunnah Cancer Research Center theme functions.
 *
 * - Contact details are edited in Appearance → Customize → Hospital Contact Details.
 * - Doctors are added in the WordPress admin under "Doctors".
 * - All site pages are created automatically when the theme is activated.
 * - Each page's banner photo can be changed by setting the page's Featured Image.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SUNNAH_CRC_VERSION', '2.0.0' );

/* -------------------------------------------------------------------------
 * Setup and assets
 * ---------------------------------------------------------------------- */
function sunnah_crc_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_image_size( 'sunnah-banner', 1920, 760, true );
	add_image_size( 'sunnah-portrait', 720, 900, true );
}
add_action( 'after_setup_theme', 'sunnah_crc_setup' );

function sunnah_crc_assets() {
	wp_enqueue_style( 'sunnah-crc-fonts', 'https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;500&family=Barlow:wght@400;500;600&family=Barlow+Condensed:wght@500;600&display=swap', array(), null );
	wp_enqueue_style( 'sunnah-crc-home', get_theme_file_uri( 'assets/css/home.css' ), array( 'sunnah-crc-fonts' ), SUNNAH_CRC_VERSION );
	wp_enqueue_style( 'sunnah-crc-pages', get_theme_file_uri( 'assets/css/pages.css' ), array( 'sunnah-crc-home' ), SUNNAH_CRC_VERSION );
	wp_enqueue_script( 'sunnah-crc-site', get_theme_file_uri( 'assets/js/site.js' ), array(), SUNNAH_CRC_VERSION, true );
	wp_add_inline_script( 'sunnah-crc-site', 'window.SUNNAH_CRC = ' . wp_json_encode( array( 'home' => trailingslashit( home_url( '/' ) ) ) ) . ';', 'before' );
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
 * Contact details (Customizer)
 * ---------------------------------------------------------------------- */
function sunnah_crc_defaults() {
	return array(
		'phone_1'       => '+91 99235 42674',
		'phone_2'       => '+91 98507 60773',
		'whatsapp'      => '919923542674',
		'email'         => 'drhakimakola@gmail.com',
		'address'       => 'Ganga Nagar, Washim Bypass, Akola, Maharashtra 444002',
		'address_short' => 'Ganga Nagar, Washim Bypass, Akola',
		'maps_url'      => 'https://www.google.com/maps/search/?api=1&query=Sunnah+Hospital+Ganga+Nagar+Washim+Bypass+Akola',
		'opd_hours'     => 'Please call to confirm OPD timings',
		'enquiry_email' => '',
	);
}

/**
 * Get a contact detail.
 *
 * @param string $key Setting key.
 * @return string
 */
function sunnah_opt( $key ) {
	$defaults = sunnah_crc_defaults();
	$value    = get_theme_mod( 'sunnah_' . $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
	return is_string( $value ) ? $value : '';
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

function sunnah_crc_customize( $wp_customize ) {
	$wp_customize->add_section(
		'sunnah_contact',
		array(
			'title'       => __( 'Hospital Contact Details', 'sunnah-crc' ),
			'description' => __( 'These details are used in the header, footer, contact page and buttons across the site.', 'sunnah-crc' ),
			'priority'    => 30,
		)
	);
	$fields = array(
		'phone_1'       => __( 'Phone number 1 (main)', 'sunnah-crc' ),
		'phone_2'       => __( 'Phone number 2', 'sunnah-crc' ),
		'whatsapp'      => __( 'WhatsApp number (digits with country code, e.g. 919923542674)', 'sunnah-crc' ),
		'email'         => __( 'Email shown on the site', 'sunnah-crc' ),
		'address'       => __( 'Full address', 'sunnah-crc' ),
		'address_short' => __( 'Short address (top bar)', 'sunnah-crc' ),
		'maps_url'      => __( 'Google Maps link', 'sunnah-crc' ),
		'opd_hours'     => __( 'OPD timings', 'sunnah-crc' ),
		'enquiry_email' => __( 'Send enquiry form emails to (leave empty to use the site admin email)', 'sunnah-crc' ),
	);
	$defaults = sunnah_crc_defaults();
	foreach ( $fields as $key => $label ) {
		$sanitize = 'sanitize_text_field';
		if ( 'maps_url' === $key ) {
			$sanitize = 'esc_url_raw';
		} elseif ( in_array( $key, array( 'email', 'enquiry_email' ), true ) ) {
			$sanitize = 'sanitize_email';
		}
		$wp_customize->add_setting(
			'sunnah_' . $key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $sanitize,
			)
		);
		$wp_customize->add_control(
			'sunnah_' . $key,
			array(
				'label'   => $label,
				'section' => 'sunnah_contact',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'sunnah_crc_customize' );

/* -------------------------------------------------------------------------
 * Doctors
 * ---------------------------------------------------------------------- */
function sunnah_crc_specialities() {
	return array(
		'Surgical Oncology',
		'Medical Oncology',
		'Diagnostics',
		'Anaesthesia & Critical Care',
		'Pain & Palliative Care',
		'Psychological Support',
		'Oncology Nutrition',
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
			'show_in_rest'  => true,
		)
	);
}
add_action( 'init', 'sunnah_crc_register_doctor' );

function sunnah_crc_doctor_fields() {
	return array(
		'speciality'    => __( 'Speciality', 'sunnah-crc' ),
		'role'          => __( 'Designation (e.g. Head of Department, Consultant)', 'sunnah-crc' ),
		'qualification' => __( 'Qualifications (e.g. MS, MCh)', 'sunnah-crc' ),
		'experience'    => __( 'Years of experience (number)', 'sunnah-crc' ),
		'languages'     => __( 'Languages spoken', 'sunnah-crc' ),
		'opd'           => __( 'OPD days and time', 'sunnah-crc' ),
	);
}

function sunnah_crc_doctor_metabox() {
	add_meta_box( 'sunnah_doctor_details', __( 'Doctor Details', 'sunnah-crc' ), 'sunnah_crc_doctor_metabox_html', 'doctor', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'sunnah_crc_doctor_metabox' );

function sunnah_crc_doctor_metabox_html( $post ) {
	wp_nonce_field( 'sunnah_doctor_save', 'sunnah_doctor_nonce' );
	echo '<p>' . esc_html__( 'Doctor name goes in the title above. The photo is the Featured Image (portrait, ideally 720 × 900 px). The main text box is the doctor\'s profile.', 'sunnah-crc' ) . '</p>';
	echo '<table class="form-table">';
	foreach ( sunnah_crc_doctor_fields() as $key => $label ) {
		$value = get_post_meta( $post->ID, '_sunnah_' . $key, true );
		echo '<tr><th><label for="sunnah_' . esc_attr( $key ) . '">' . esc_html( $label ) . '</label></th><td>';
		if ( 'speciality' === $key ) {
			echo '<select id="sunnah_speciality" name="sunnah_speciality">';
			foreach ( sunnah_crc_specialities() as $s ) {
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
 * Get doctors, optionally for one speciality.
 *
 * @param string $speciality Speciality name or empty for all.
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
				'key'   => '_sunnah_speciality',
				'value' => $speciality,
			),
		);
	}
	return get_posts( $args );
}

/** Doctor meta helper. */
function sunnah_doc( $post_id, $key ) {
	return (string) get_post_meta( $post_id, '_sunnah_' . $key, true );
}

/* -------------------------------------------------------------------------
 * Pages created on activation
 * ---------------------------------------------------------------------- */
function sunnah_crc_pages() {
	return array(
		'about-us'          => __( 'About Us', 'sunnah-crc' ),
		'cancer-care'       => __( 'Cancer Care', 'sunnah-crc' ),
		'surgical-oncology' => __( 'Surgical Oncology', 'sunnah-crc' ),
		'medical-oncology'  => __( 'Medical Oncology', 'sunnah-crc' ),
		'doctors'           => __( 'Doctors & Specialists', 'sunnah-crc' ),
		'patient-care'      => __( 'Patient Care & Support', 'sunnah-crc' ),
		'infrastructure'    => __( 'Hospital Infrastructure', 'sunnah-crc' ),
		'research'          => __( 'Cancer Research', 'sunnah-crc' ),
		'contact'           => __( 'Contact & Appointment', 'sunnah-crc' ),
		'privacy-policy'    => __( 'Privacy Policy', 'sunnah-crc' ),
	);
}

function sunnah_crc_activate() {
	foreach ( sunnah_crc_pages() as $slug => $title ) {
		if ( ! get_page_by_path( $slug ) ) {
			wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_title'   => $title,
					'post_name'    => $slug,
					'post_content' => 'privacy-policy' === $slug ? '<p>' . esc_html__( 'Add the hospital\'s privacy policy here.', 'sunnah-crc' ) . '</p>' : '',
				)
			);
		}
	}
	sunnah_crc_register_doctor();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'sunnah_crc_activate' );

/** Link to one of the theme's pages. */
function sunnah_url( $slug = '', $anchor = '' ) {
	return esc_url( home_url( $slug ? '/' . $slug . '/' : '/' ) ) . ( $anchor ? '#' . $anchor : '' );
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

/* -------------------------------------------------------------------------
 * Enquiry form
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

	$name    = isset( $_POST['patient_name'] ) ? sanitize_text_field( wp_unslash( $_POST['patient_name'] ) ) : '';
	$phone   = isset( $_POST['mobile'] ) ? sanitize_text_field( wp_unslash( $_POST['mobile'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$dept    = isset( $_POST['department'] ) ? sanitize_text_field( wp_unslash( $_POST['department'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || strlen( preg_replace( '/\D/', '', $phone ) ) < 10 ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'missing', $back ) . '#enquiry' );
		exit;
	}

	$to      = sunnah_opt( 'enquiry_email' ) ? sunnah_opt( 'enquiry_email' ) : get_option( 'admin_email' );
	$subject = sprintf( 'New appointment enquiry: %s', wp_html_excerpt( $name, 60 ) );
	$body    = "Patient name: {$name}\nMobile: {$phone}\nEmail: " . ( $email ? $email : '-' ) . "\nDepartment: " . ( $dept ? $dept : '-' ) . "\n\nMessage:\n" . ( $message ? $message : '-' ) . "\n\nSent from: {$back}\n";
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
		'sent'    => __( 'Thank you. Your request has been received and our team will call you back.', 'sunnah-crc' ),
		'missing' => __( 'Please enter the patient name and a 10-digit mobile number.', 'sunnah-crc' ),
		'failed'  => __( 'Sorry, your request could not be sent. Please call or WhatsApp us instead.', 'sunnah-crc' ),
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
		$desc = 'Sunnah Hospital – Cancer Research Center, Akola: comprehensive, compassionate and affordable cancer care for Vidarbha. Surgical & medical oncology, chemotherapy day care, diagnostics, ICU, HDU and PM-JAY cashless treatment.';
	} elseif ( is_page() ) {
		$map  = array(
			'about-us'          => 'About Sunnah Cancer Research Center, a dedicated unit of Sunnah Hospital, Akola, providing comprehensive, compassionate and affordable cancer care to Vidarbha.',
			'cancer-care'       => 'Cancer care at Sunnah Hospital, Akola: surgical oncology, medical oncology, diagnostics, pain management, nutrition and psychological support.',
			'surgical-oncology' => 'Surgical oncology at Sunnah Hospital, Akola: head & neck, breast, gastrointestinal and gynecological cancer surgery.',
			'medical-oncology'  => 'Medical oncology at Sunnah Hospital, Akola: chemotherapy in day care and IPD, targeted therapy, immunotherapy, supportive and palliative care.',
			'doctors'           => 'Meet the oncologists and specialists at Sunnah Hospital – Cancer Research Center, Akola.',
			'patient-care'      => 'Patient care and support at Sunnah Hospital, Akola: treatment guidance, counselling, oncology nutrition, rehabilitation and FAQs.',
			'infrastructure'    => 'Facilities at Sunnah Hospital, Akola: modular OT, minor OT, ICU, HDU, 24x7 casualty, 24x7 pharmacy and dedicated wards.',
			'research'          => 'The Cancer Research Center at Sunnah Hospital, Akola: clinical research, cancer data and community awareness.',
			'contact'           => 'Contact Sunnah Hospital – Cancer Research Center, Ganga Nagar, Washim Bypass, Akola. Call, WhatsApp or request an appointment.',
		);
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		$desc = isset( $map[ $slug ] ) ? $map[ $slug ] : '';
	} elseif ( is_singular( 'doctor' ) ) {
		$desc = get_the_title() . ' – ' . sunnah_doc( get_the_ID(), 'speciality' ) . ' at Sunnah Hospital – Cancer Research Center, Akola.';
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
		'@context'  => 'https://schema.org',
		'@type'     => 'Hospital',
		'name'      => 'Sunnah Hospital – Cancer Research Center',
		'url'       => home_url( '/' ),
		'telephone' => sunnah_opt( 'phone_1' ),
		'email'     => sunnah_opt( 'email' ),
		'address'   => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => 'Ganga Nagar, Washim Bypass',
			'addressLocality' => 'Akola',
			'addressRegion'   => 'Maharashtra',
			'postalCode'      => '444002',
			'addressCountry'  => 'IN',
		),
		'medicalSpecialty' => array( 'Oncologic', 'Surgical' ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $data ) . '</script>' . "\n";
}
add_action( 'wp_head', 'sunnah_crc_schema' );

/** Mark the current section in the main menu. */
function sunnah_nav_current( $slugs ) {
	foreach ( (array) $slugs as $slug ) {
		if ( is_page( $slug ) ) {
			return ' aria-current="page"';
		}
	}
	if ( in_array( 'doctors', (array) $slugs, true ) && is_singular( 'doctor' ) ) {
		return ' aria-current="page"';
	}
	return '';
}

/* -------------------------------------------------------------------------
 * Security hardening (theme-level)
 * Site-level steps (hosting, wp-config, passwords, backups) are listed in SECURITY.md.
 * ---------------------------------------------------------------------- */

// Do not advertise the WordPress version.
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// Remove legacy discovery links that are not needed.
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

// Turn off XML-RPC (a common target for password-guessing attacks). The site does not use it.
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter(
	'wp_headers',
	function ( $headers ) {
		unset( $headers['X-Pingback'] );
		return $headers;
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

// Hide the user list from the public REST API (still available to logged-in editors).
add_filter(
	'rest_endpoints',
	function ( $endpoints ) {
		if ( ! is_user_logged_in() ) {
			unset( $endpoints['/wp/v2/users'], $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
		}
		return $endpoints;
	}
);
add_filter( 'wp_sitemaps_add_provider', function ( $provider, $name ) { return 'users' === $name ? false : $provider; }, 10, 2 );

// Same message for wrong username and wrong password, so attackers cannot tell which was right.
add_filter( 'login_errors', function () { return __( 'The login details are incorrect.', 'sunnah-crc' ); } );

// Simple flood protection for the enquiry form: max 5 submissions per visitor per 10 minutes.
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
	$lines   = array(
		'User-agent: *',
		'Disallow: /wp-admin/',
		'Allow: /wp-admin/admin-ajax.php',
		'Disallow: /wp-login.php',
		'Disallow: /?s=',
		'Disallow: /search/',
		'',
		'Sitemap: ' . home_url( '/wp-sitemap.xml' ),
	);
	return implode( "\n", $lines ) . "\n";
}
add_filter( 'robots_txt', 'sunnah_crc_robots', 10, 2 );
