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
		'intro' => 'A multispeciality hospital in Akola, established in 2008 and governed by Janta Multipurpose Society.',
		'links' => array(
			array( 'About Sunnah Hospital', 'about-us', '', 'Who we are' ),
			array( 'Our History', 'about-us', 'history', 'From 2008 to today' ),
			array( 'Director\'s Message', 'about-us', 'founder', 'Dr. Hakimuddin Shaikh' ),
			array( 'Awards & Recognition', 'about-us', 'awards', 'Honours received by our founder' ),
			array( 'Guiding Principle', 'about-us', 'principle', 'The value behind our service' ),
			array( 'Vision, Mission & Values', 'about-us', 'vision', 'What we work towards' ),
		),
		'feature' => array( 'sh-building.jpg', 'Sunnah Hospital, Akola', 'Ganga Nagar, Akola 444002', 'contact', 'location' ),
	),
	'cancer-care'    => array(
		'label' => 'Cancer Research Centre',
		'short' => 'Cancer Centre',
		'intro' => 'Diagnosis, treatment, continuing care and support for cancer patients, close to home.',
		'links' => array(
			array( 'Medical Oncology', 'cancer-care', 'medical-oncology', 'Assessment, chemotherapy and follow-up' ),
			array( 'Surgical Oncology', 'cancer-care', 'surgical-oncology', 'Cancer surgery by surgical oncologists' ),
			array( 'Chemotherapy & Day-Care', 'cancer-care', 'chemotherapy', 'Planned, monitored treatment' ),
			array( 'Screening, Biopsy & Diagnosis', 'cancer-care', 'screening', 'Finding and confirming cancer' ),
			array( 'Continuing Cancer Care', 'cancer-care', 'continuing-care', 'Treated in Mumbai or Delhi? Continue here' ),
			array( 'Inpatient Packages', 'cancer-care', 'packages', 'Package-based inpatient care' ),
		),
		'feature' => array( 'sh-ward.jpg', 'Continue your care close to home', 'Inpatient and supportive care for patients treated at other cancer centres.', 'cancer-care', 'continuing-care' ),
	),
	'departments'    => array(
		'label' => 'Departments',
		'intro' => 'Medical, surgical, oncology and specialist departments, with ICU and diagnostic support.',
		'links' => array(
			array( 'General Medicine', 'departments', 'general-medicine', 'Diagnosis and treatment of medical conditions' ),
			array( 'General Surgery', 'departments', 'general-surgery', 'Surgical care and treatment' ),
			array( 'Sunnah Dental Care', 'dental-care', '', 'Dental and oral health' ),
			array( 'Orthopaedics', 'departments', 'orthopaedics', 'Bones, joints and fractures' ),
			array( 'Urology, Neurology & ENT', 'departments', 'urology', 'Specialist consultations' ),
			array( 'ICU, Diagnostics & Emergency', 'departments', 'critical-care', 'Critical care and supporting services' ),
		),
		'feature' => array( 'sh-ot-suite.jpg', 'Two operation theatres', 'Surgical care across specialities.', 'infrastructure', 'theatres' ),
	),
	'doctors'        => array(
		'label' => 'Our Doctors',
		'intro' => 'Full-time and visiting consultants across our departments.',
		'links' => array(
			array( 'All Doctors', 'doctors', '', 'Qualifications and consultation timings' ),
			array( 'Book an Appointment', 'contact', 'enquiry', 'Send an appointment enquiry' ),
			array( 'OPD Timings', 'contact', 'opd', 'Days and timings' ),
		),
		'feature' => array( 'sh-reception.jpg', 'Book an appointment', 'Call, WhatsApp or send an enquiry online.', 'contact', 'enquiry' ),
	),
	'infrastructure' => array(
		'label' => 'Facilities',
		'intro' => 'A three-floor hospital with 30+ beds, a 9-bed ICU, two operation theatres and diagnostics.',
		'links' => array(
			array( 'Hospital Building', 'infrastructure', 'building', 'Three floors in Ganga Nagar' ),
			array( 'Inpatient Facilities', 'infrastructure', 'inpatient', '30+ beds' ),
			array( 'Intensive Care Unit', 'infrastructure', 'icu', '9 ICU beds' ),
			array( 'Operation Theatres', 'infrastructure', 'theatres', 'Two operation theatres' ),
			array( 'Diagnostics', 'infrastructure', 'diagnostics', 'Pathology, X-ray, sonography' ),
			array( 'Day-Care', 'infrastructure', 'daycare', 'Including chemotherapy' ),
		),
		'feature' => array( 'sh-icu.jpg', 'Intensive Care Unit', '9 ICU beds for critical care.', 'infrastructure', 'icu' ),
	),
	'news'           => array(
		'label' => 'News & Resources',
		'short' => 'News',
		'intro' => 'Hospital news, community work and health information for patients and families.',
		'links' => array(
			array( 'News & Medical Achievements', 'news', '', 'Announcements, events and achievements' ),
			array( 'Health Awareness & Resources', 'health-awareness', '', 'Cancer awareness and patient education' ),
			array( 'Community Impact & Partnerships', 'community', '', 'Community health and schemes' ),
			array( 'Government Health Schemes', 'community', 'schemes', 'AB-PMJAY and MJPJAY enquiries' ),
		),
		'feature' => array( 'sh-entrance.jpg', 'Health awareness', 'Information about cancer warning signs, screening and treatment.', 'health-awareness', '' ),
	),
	'contact'        => array(
		'label' => 'Contact',
		'intro' => 'Appointments, OPD information, emergency contact and directions.',
		'links' => array(
			array( 'Book an Appointment', 'contact', 'enquiry', 'Send an appointment enquiry' ),
			array( 'Emergency Contact', 'contact', 'emergency', 'For urgent medical help' ),
			array( 'Patient & Visitor Information', 'contact', 'patient-info', 'Admission, visitors, billing, discharge' ),
			array( 'Location & Directions', 'contact', 'location', 'Ganga Nagar, Akola' ),
		),
		'feature' => array( 'sh-building-side.jpg', 'Find us', 'Ganga Nagar, Akola 444002, Maharashtra', 'contact', 'location' ),
	),
);
