# Sunnah Cancer Research Center – WordPress theme handover

## 1. Install
1. WordPress admin → **Appearance → Themes → Add New → Upload Theme** → choose `sunnah-crc.zip` → **Install Now** → **Activate**.
2. On activation the theme creates these pages automatically (if they don't already exist):
   About Us, Cancer Care, Surgical Oncology, Medical Oncology, Diagnostics, Doctors & Specialists,
   Patient Care & Support, Hospital Infrastructure, Cancer Research, Contact & Appointment, Privacy Policy.
   If the theme is uploaded over an older version that was already active, choose "Replace active with uploaded";
   any missing pages are then created on the first visit to the site.
3. **Settings → Permalinks** → choose **Post name** → **Save**. (Required so page addresses like `/about-us/` work.)
4. **Settings → Reading** → "Your homepage displays": either option works; the theme always shows the designed home page.

## 2. What the hospital still needs to provide
| Item | Where to add it |
|---|---|
| Doctors (name, speciality, designation, qualifications, experience, languages, OPD timing, profile text, photo) | Admin → **Doctors → Add New**. Name = title, photo = Featured Image (portrait, about 720 × 900 px). Use "Order" (Page Attributes) to control the order. |
| Hospital photos to replace stock images | Each inner page: edit the page → **Featured Image** replaces that page's banner. Photos inside page sections: replace the file with the same name in `assets/img/` (see list below). |
| OPD timings | Appearance → **Customize → Hospital Contact Details**. |
| Email address that receives enquiries | Same Customizer section ("Send enquiry form emails to"). |
| Privacy policy | A standard policy is built in. To use the hospital's own text instead, write it in Pages → Privacy Policy. |
| Browser-tab icon | Built in (Sunnah symbol). To change it: Appearance → Customize → Site Identity → Site Icon. |

Until doctors are added, the Doctors page shows a "Doctor profiles are being added" message with the phone and WhatsApp buttons, and department pages simply hide the team section.

### Photos
Real hospital photos are now used throughout: building, entrance, reception, operation theatres, X-ray room, ICU, HDU, wards, casualty and pharmacy.
Still illustrations from the presentation (replace when real photos are available):
- `sh-daycare.jpg` – chemotherapy day care (Medical Oncology banner and cards).
- `sh-lab.jpg` – pathology / research lab (Research banner, Cancer Care card).
There are no stock photos of people in the theme. Doctor photos are added per doctor in Doctors → Add New.
Keep the same file name and a similar shape (landscape) when replacing.

## 3. Contact details
All phone numbers, WhatsApp number, email, address and the Google Maps link are edited in one place:
**Appearance → Customize → Hospital Contact Details**. They update the header, footer, buttons and Contact page.

## 4. Enquiry form
- The forms on the Contact page and the home page email the request to the address set in the Customizer
  (or the WordPress admin email if left empty).
- Install an SMTP plugin (for example **WP Mail SMTP**) and connect it to the hospital's email account,
  otherwise many hosts silently drop emails sent by WordPress. Send a test enquiry after setup.
- Built-in protection: security token, hidden spam trap, a limit of 5 requests per visitor per 10 minutes.

## 5. SEO
- Each page has its own title and description. Google structured data (Hospital) is on the home and Contact pages.
- `robots.txt` and the sitemap (`/wp-sitemap.xml`) are generated automatically.
- After launch: add the site to **Google Search Console** and submit `/wp-sitemap.xml`; create or update the
  **Google Business Profile** with the same address and phone number.
