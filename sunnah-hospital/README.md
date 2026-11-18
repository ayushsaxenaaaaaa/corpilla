# Sunnah Hospital – Cancer Research Center (website design)

Static design for the hospital website: ten pages plus a doctor profile page.
No build step is needed to view it.

## View
- Open `index.html` in a browser, or run `python3 -m http.server 8000` in this folder.
- Online: enable GitHub Pages for the branch and open `/sunnah-hospital/`.

## Structure
- `*.html` – the pages (Home, About, Surgical Oncology, Medical Oncology, Research,
  Doctors, Doctor profile, Departments, Infrastructure, Patient Care, Contact)
- `assets/sunnah.css` – all styles
- `assets/app.js` – shared header, footer, menu, slider and photo loading
- `assets/doctors.js` – doctor list (sample data)
- `assets/img/` – photos
- `tools/build.py` – regenerates most pages: `python3 tools/build.py .`
  (`doctors.html` and `doctor.html` are edited by hand)

## Before launch
- `assets/img/sh-*.jpg` and `pmjay.png` come from the hospital presentation. Other photos in `assets/img/` are demo images from public templates with unknown
  licences. Replace them with hospital photos or licensed stock.
- Contact details come from the hospital presentation. WhatsApp uses +91 99235 42674 (confirm).
- Doctors are sample placeholders.
- Treatment lists, vision and mission are drafts for the hospital to confirm.
- The enquiry form does not send anywhere yet (WhatsApp links work).
- The client needs WordPress: this design is to be converted into a custom theme.

## WordPress theme (home page only)
- `wordpress/sunnah-crc.zip` – upload in WordPress: Appearance → Themes → Add New → Upload Theme.
- `wordpress/sunnah-crc/` – the same theme unzipped.
- Rebuild from `index.html` with `python3 tools/make_theme.py . <output-folder>`.
- Version 1 contains the home page only. Other menu links point to WordPress pages with these
  addresses, which still need to be created: /about-us/, /cancer-care/, /doctors/, /patient-care/,
  /infrastructure/, /research/, /contact/, /surgical-oncology/, /medical-oncology/.
