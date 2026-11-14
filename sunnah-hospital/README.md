# Sunnah Hospital – Cancer Research Center (website design)

Static design for the hospital website: ten pages plus a doctor profile page.
No build step is needed to view it.

## View
- Open `index.html` in a browser, or run `python3 -m http.server 8000` in this folder.
- Online: enable GitHub Pages for the branch and open `/sunnah-hospital/`.

## Structure
- `*.html` – the pages (Home, About, Surgical Oncology, Medical Oncology, Research,
  Doctors, Doctor profile, Departments, Infrastructure, Patient Care, Contact)
- `assets/site.css` – all styles
- `assets/site.js` – shared header, footer, menu and photo loading
- `assets/doctors.js` – doctor list (sample data)
- `assets/img/` – photos
- `tools/build.py` – regenerates most pages: `python3 tools/build.py .`
  (`doctors.html` and `doctor.html` are edited by hand)

## Before launch
- Photos in `assets/img/` are demo images from public templates with unknown
  licences. Replace them with hospital photos or licensed stock.
- Doctors, phone/WhatsApp (`910000000000`), email, address and timings are placeholders.
- Treatment lists, vision and mission are drafts for the hospital to confirm.
- The enquiry form does not send anywhere yet (WhatsApp links work).
- The client needs WordPress: this design is to be converted into a custom theme.
