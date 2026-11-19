<?php
/**
 * Main menu structure, shared by the desktop dropdowns and the mobile menu.
 * Each section: page slug => [label, intro, links [label, slug, anchor, description], feature [image, title, text, slug, anchor]].
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	'about-us'       => array(
		'label' => 'About Us',
		'intro' => 'A dedicated unit of Sunnah Hospital, Akola, providing comprehensive, compassionate and affordable cancer care to Vidarbha.',
		'links' => array(
			array( 'About Sunnah Hospital', 'about-us', '', 'Who we are and how we care' ),
			array( 'Our Approach', 'about-us', 'approach', 'Science, specialists and compassion' ),
			array( 'Why Choose Us', 'about-us', 'why', 'Experienced team, affordable care, PM-JAY' ),
			array( 'Our Philosophy', 'about-us', 'philosophy', 'Hope. Health. Humanity.' ),
			array( 'Our Promise', 'about-us', 'promise', 'Right Treatment. Right Guidance. Compassionate Care.' ),
		),
		'feature' => array( 'sh-building.jpg', 'Sunnah Hospital, Akola', 'Ganga Nagar, Washim Bypass', 'contact', 'location' ),
	),
	'cancer-care'    => array(
		'label' => 'Cancer Care',
		'intro' => 'Surgery, medical treatment, diagnostics and supportive care, planned together for each patient.',
		'links' => array(
			array( 'Surgical Oncology', 'surgical-oncology', '', 'Head & neck, breast, GI and gynecological surgery' ),
			array( 'Medical Oncology', 'medical-oncology', '', 'Chemotherapy, targeted therapy, immunotherapy' ),
			array( 'Diagnostics', 'cancer-care', 'diagnostics', 'Digital X-Ray, sonography, pathology' ),
			array( 'Comprehensive Cancer Care', 'cancer-care', 'comprehensive', 'Pain management, nutrition, counselling' ),
			array( 'Cancer Types We Treat', 'cancer-care', 'types', 'Search by type of cancer' ),
		),
		'feature' => array( 'sh-ot-suite.jpg', 'Newly diagnosed?', 'Send your reports and our team will guide you.', 'contact', 'enquiry' ),
	),
	'doctors'        => array(
		'label' => 'Doctors',
		'intro' => 'Surgical and medical oncologists and support specialists who plan your care together.',
		'links' => array(
			array( 'All Doctors & Specialists', 'doctors', '', 'Meet the team' ),
			array( 'Surgical Oncology Team', 'surgical-oncology', '', 'Our cancer surgeons' ),
			array( 'Medical Oncology Team', 'medical-oncology', '', 'Our medical oncologists' ),
			array( 'Book with a Doctor', 'contact', 'enquiry', 'Request an appointment' ),
		),
		'feature' => array( 'team3.jpg', 'Request an appointment', 'Call, WhatsApp or send a request online.', 'contact', 'enquiry' ),
	),
	'patient-care'   => array(
		'label' => 'Patients & Family',
		'intro' => 'Guidance, counselling, nutrition and recovery support for patients and their families.',
		'links' => array(
			array( 'Patient Care & Support', 'patient-care', '', 'Beyond cancer treatment' ),
			array( 'Your First Visit', 'patient-care', 'first-visit', 'What happens, step by step' ),
			array( 'What to Bring', 'patient-care', 'bring', 'Reports, ID and PM-JAY card' ),
			array( 'Psychological Support', 'patient-care', 'counselling', 'Counselling for patients and families' ),
			array( 'Specialized Nutrition', 'patient-care', 'nutrition', 'A dedicated oncology dietitian' ),
			array( 'FAQs & PM-JAY', 'patient-care', 'faqs', 'Common questions and cashless treatment' ),
		),
		'feature' => array( 'consult.jpg', 'For families & caregivers', 'How to help at home and when to call us.', 'patient-care', 'families' ),
	),
	'infrastructure' => array(
		'label' => 'Facilities',
		'intro' => 'Modular OT, ICU, HDU, 24x7 casualty and pharmacy, all in one hospital.',
		'links' => array(
			array( 'Facilities Available', 'infrastructure', 'available', 'ICU, HDU, OT, wards and more' ),
			array( 'Photo Gallery', 'infrastructure', 'gallery', 'Inside Sunnah Hospital' ),
			array( 'Patient Comfort', 'infrastructure', 'comfort', 'Wards, diet and 24x7 pharmacy' ),
		),
		'feature' => array( 'sh-ot.jpg', 'Modular Operation Theatre', 'See our facilities', 'infrastructure', 'gallery' ),
	),
	'research'       => array(
		'label' => 'Research',
		'intro' => 'Our Cancer Research Center works to improve how cancer is understood, detected and treated in Vidarbha.',
		'links' => array(
			array( 'Cancer Research Center', 'research', '', 'Research that begins at the bedside' ),
			array( 'Where We Focus', 'research', 'focus', 'Clinical research, cancer data, awareness' ),
			array( 'For Patients', 'research', 'for-patients', 'Consent, privacy and your care' ),
		),
		'feature' => array( 'sh-lab.jpg', 'Together for a cancer-free tomorrow', 'Advanced research. Better outcomes.', 'research', '' ),
	),
	'contact'        => array(
		'label' => 'Contact',
		'intro' => 'Call, WhatsApp or send a request and our team will call you back.',
		'links' => array(
			array( 'Request an Appointment', 'contact', 'enquiry', 'Send a request online' ),
			array( 'Location & Directions', 'contact', 'location', 'Ganga Nagar, Washim Bypass, Akola' ),
			array( 'Contact Details', 'contact', '', 'Phone, WhatsApp and email' ),
		),
		'feature' => array( 'sh-building.jpg', '24x7 Casualty & Emergency', 'Call us any time', 'contact', '' ),
	),
);
