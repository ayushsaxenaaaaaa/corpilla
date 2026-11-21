# Sunnah Hospital – Cancer Research Centre – WordPress theme handover

## 1. Install
1. WordPress admin → **Appearance → Themes → Add New → Upload Theme** → choose `sunnah-crc.zip` → **Install Now** → **Activate**.
   If an older version is already active, choose **Replace active with uploaded**.
2. The theme creates these pages automatically: About Us, Cancer Research Centre, Departments & Specialities,
   Sunnah Dental Care, Our Doctors, Facilities & Infrastructure, Contact & Appointments, News & Medical Achievements,
   Community Impact & Partnerships, Health Awareness & Resources, Privacy Policy, Terms & Conditions.
   It also creates the news categories: Hospital Announcements, Medical Achievements, Health Awareness Activities,
   Events & Programmes, Media Coverage, and Health Articles.
3. Pages from version 2 (Surgical Oncology, Medical Oncology, Diagnostics, Patient Care, Research) are merged into the
   new pages. If they were left empty they are switched to Draft, and their old addresses redirect to the new sections.
4. **Settings → Permalinks** → choose **Post name** → **Save**.

## 2. Where everything is edited
| What | Where |
|---|---|
| Phone, WhatsApp, emergency number, emergency hours, email, address, Google Maps link, OPD days and timings, social media links | Appearance → Customize → **Hospital Contact Details** |
| Figures (30+ beds, 9 ICU, 2 OT, 3 floors), surgeries performed, screening tests, inpatient packages, government scheme details, patient & visitor information, founder profile and photo, community initiatives, partnerships | Appearance → Customize → **Hospital Information** |
| Services of each department (one per line) | Appearance → Customize → **Department Services** |
| Doctors | Admin → **Doctors → Add New** (see section 3) |
| News, achievements, events, media coverage | Admin → **Posts → Add New**, choose a category. Add a custom field `source` for media coverage links. |
| Health awareness articles | Admin → **Posts → Add New**, category **Health Articles** (after approval by a doctor). |
| Page banner photo | Edit the page → **Featured Image**. |
| Privacy Policy / Terms | Standard text is built in. To use the hospital's own text, write it in the page. |

Any information box left empty shows a polite "please call 9923542674" line instead, so nothing unconfirmed is published.
Social media links appear in the footer only when filled in. Emergency hours (e.g. "24 hours") appear only when filled in.

## 3. How to add news (for hospital staff)
1. WordPress admin → **Posts → Add New**.
2. **Title** = headline. **Main box** = the full news. Photos can be added inside the text with the "+" button.
3. Right-hand panel:
   - **Categories**: tick one of Hospital Announcements, Medical Achievements, Health Awareness Activities,
     Events & Programmes, Media Coverage. (For doctor-approved health articles tick **Health Articles**.)
   - **Featured image**: the main photo shown on the news card.
   - **Excerpt** (optional): the 2–3 line introduction.
4. For media coverage, end the article with a line such as "Source: Lokmat, 12 March 2026".
5. Click **Publish**. The item appears automatically on the News page, the home page (latest 3), and, for
   awareness activities and events, on the Community page. If no category is ticked it still appears on the News page.
Only publish verified information (manuscript rule): no invented stories, statistics, awards or "first/largest" claims.

## 4. Doctors
Admin → Doctors → Add New:
- **Title**: full name (e.g. Dr. Firstname Surname). **Featured Image**: real photograph, portrait (about 720 × 900 px).
- **Main text box**: short professional biography.
- **Doctor Details** box: speciality, full-time or visiting consultant, designation, qualifications,
  years of experience (only if verified), clinical interests, consultation days, OPD timings, languages.
- **Order** (Page Attributes) controls the order on the Doctors page.
Each doctor gets a profile page with the appointment number. Doctors also appear automatically in their department
on the Departments and Cancer Research Centre pages. Do not add dummy names or stock photos.

## 5. Photos
Real hospital photos are used throughout, including the Director's photograph and four award photographs on the About page (`assets/img/director.jpg`, `award-1.jpg` to `award-4.jpg`). The Director's photo can be replaced in Customize → Hospital Information → Founder photograph.
Scheme logos: the AB-PMJAY logo is built in; upload the official MJPJAY logo in Customize → Hospital Information → MJPJAY scheme logo (until then a text badge is shown).
 Still needed: day-care / chemotherapy area (the Facilities page shows
"Photographs coming soon" for day-care), pathology lab, sonography room, dental clinic, founder photograph.
To replace a theme photo, replace the file with the same name in `assets/img/` (landscape).

## 6. Enquiry form
- Fields: patient name, contact number, department, preferred date, preferred time, reason (optional), email (optional).
- The visitor is told the enquiry was received and that the appointment is confirmed only when staff call back.
- Emails go to the address in the Customizer (or the WordPress admin email). Install **WP Mail SMTP** and connect the
  hospital's email account, then send a test enquiry.

## 7. Security
See `SECURITY.md`. The public REST API is closed, XML-RPC and comments are off, and Cloudflare is recommended
against attacks that try to bring the site down.

## 8. SEO
- Each page has its own description; Hospital structured data is on the home and Contact pages.
- After launch: add the site to **Google Search Console**, submit `/wp-sitemap.xml`, and update the
  **Google Business Profile** with the same name, address and phone number.
