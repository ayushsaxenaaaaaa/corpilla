/* Shared header, footer and behaviour for every page */
(function(){
  document.documentElement.classList.add('js');
  const U = id => `https://images.unsplash.com/${id}?auto=format&fit=crop&w=900&q=75`;
  window.SH = { U, WA: '910000000000', PHONE: '+91 00000 00000' };
  const page = document.body.dataset.page || '';
  const cur = p => page === p ? ' aria-current="page"' : '';

  const icons = `<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-wa" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8s-.4-.1-.6.1-.7.8-.8 1-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.3-.4.3-.4.7-1.3.1-.2 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 3 3 0 0 0-.9 2.2 5.2 5.2 0 0 0 1.1 2.7 11.8 11.8 0 0 0 4.5 4c1.7.7 2.3.8 3.2.6a2.7 2.7 0 0 0 1.8-1.2 2.2 2.2 0 0 0 .1-1.2c0-.1-.2-.2-.4-.3z"/></symbol>
  <symbol id="i-ph" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/></symbol>
  <symbol id="i-cal" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="16" rx="1"/><path d="M3 10h18M8 3v4M16 3v4"/></g></symbol>
  </svg>`;

  const mega = `
  <div class="mega"><div class="wrap">
    <div class="intro"><h5>Cancer Care</h5><h3 class="h-m">Surgical &amp; Medical Cancer Center</h3><p>Specialised surgery, chemotherapy and supportive care, planned together for each patient.</p><a class="arrow" href="departments.html">All departments</a></div>
    <div><h5>Specialities</h5><ul><li><a href="surgical-oncology.html">Surgical Oncology</a></li><li><a href="medical-oncology.html">Medical Oncology</a></li><li><a href="research.html">Cancer Research</a></li><li><a href="departments.html">Departments</a></li></ul></div>
    <div><h5>Support</h5><ul><li><a href="patient-care.html#guidance">Treatment Guidance</a></li><li><a href="patient-care.html#counselling">Counselling</a></li><li><a href="patient-care.html#nutrition">Oncology Nutrition</a></li><li><a href="patient-care.html#rehab">Recovery &amp; Rehabilitation</a></li></ul></div>
    <a class="feat" href="patient-care.html"><div class="ph"><img src="${U('photo-1576091160399-112ba8d25d1d')}" alt="" loading="lazy" onerror="this.remove()"></div><span>Beyond cancer treatment: how we support patients and families →</span></a>
  </div></div>`;

  const header = `${icons}
  <div class="util"><div class="wrap">
    <span class="em">Appointments &amp; Enquiries <b>${SH.PHONE}</b></span>
    <nav aria-label="Utility"><a href="about.html">About Us</a><a href="patient-care.html#faqs">FAQs</a><a href="contact.html">Contact</a></nav>
  </div></div>
  <header class="hdr" id="hdr"><div class="wrap">
    <a class="logo" href="index.html"><img src="assets/logo-header.png" alt="Sunnah Hospital – Cancer Research Center" width="151" height="52"></a>
    <nav class="mnav" aria-label="Main"><ul>
      <li><a href="about.html"${cur('about')}>About Us</a></li>
      <li><a href="departments.html"${cur('care')}>Cancer Care</a>${mega}</li>
      <li><a href="doctors.html"${cur('doctors')}>Doctors</a></li>
      <li><a href="research.html"${cur('research')}>Research</a></li>
      <li><a href="infrastructure.html"${cur('infrastructure')}>Infrastructure</a></li>
      <li><a href="patient-care.html"${cur('patient')}>Patient Care</a></li>
    </ul></nav>
    <div class="hdr-r">
      <a class="btn btn-p" href="contact.html">Book Appointment</a>
      <button class="burger" id="burger" aria-label="Open menu" aria-controls="drawer" aria-expanded="false"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 7h18M3 12h18M3 17h18"/></svg></button>
    </div>
  </div></header>
  <div class="drawer" id="drawer" hidden>
    <div class="top"><img src="assets/logo-header.png" alt="Sunnah Hospital"><button class="burger" id="close" aria-label="Close menu"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 6l12 12M18 6 6 18"/></svg></button></div>
    <nav aria-label="Mobile">
      <a href="index.html">Home</a>
      <a href="about.html">About Us</a>
      <details><summary>Cancer Care</summary><div><a href="surgical-oncology.html">Surgical Oncology</a><a href="medical-oncology.html">Medical Oncology</a><a href="departments.html">Departments</a></div></details>
      <a href="research.html">Cancer Research</a>
      <a href="doctors.html">Doctors &amp; Specialists</a>
      <a href="infrastructure.html">Hospital Infrastructure</a>
      <a href="patient-care.html">Patient Care &amp; Support</a>
      <a href="contact.html">Contact &amp; Appointment</a>
    </nav>
    <div class="cta"><a class="btn btn-n" href="contact.html">Book Appointment</a><a class="btn btn-w" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp Us</a></div>
  </div>`;

  const footer = `
  <section class="prefoot"><div class="wrap">
    <h3>Right Treatment. Right Guidance. Compassionate Care.</h3>
    <div class="btns"><a class="btn btn-n" href="contact.html"><svg><use href="#i-cal"/></svg>Book Appointment</a><a class="btn btn-w" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp</a></div>
  </div></section>
  <footer>
    <div class="wrap main">
      <div><img src="assets/logo-white.png" alt="Sunnah Hospital – Cancer Research Center"><p class="fm">HOPE • HEALING • HUMANITY</p><p style="margin-top:14px;max-width:34ch">Surgical &amp; Medical Cancer Center</p></div>
      <div><h5>Cancer Care</h5><ul><li><a href="surgical-oncology.html">Surgical Oncology</a></li><li><a href="medical-oncology.html">Medical Oncology</a></li><li><a href="research.html">Cancer Research</a></li><li><a href="departments.html">Departments</a></li></ul></div>
      <div><h5>Hospital</h5><ul><li><a href="about.html">About Us</a></li><li><a href="doctors.html">Doctors &amp; Specialists</a></li><li><a href="infrastructure.html">Infrastructure</a></li></ul></div>
      <div><h5>Patients</h5><ul><li><a href="patient-care.html">Patient Care &amp; Support</a></li><li><a href="patient-care.html#faqs">FAQs</a></li><li><a href="contact.html">Appointment</a></li></ul></div>
      <div><h5>Contact</h5><ul><li>${SH.PHONE}</li><li>Address line,<br>City, State</li><li><a href="https://wa.me/${SH.WA}" target="_blank" rel="noopener">WhatsApp Chat</a></li></ul></div>
    </div>
    <div class="base"><div class="wrap"><span>© 2026 Sunnah Hospital – Cancer Research Center. All rights reserved.</span><span>Privacy Policy · Terms of Use</span></div></div>
  </footer>
  <nav class="mbar" aria-label="Quick actions">
    <a href="tel:+910000000000"><svg><use href="#i-ph"/></svg>Call</a>
    <a class="bk" href="contact.html"><svg><use href="#i-cal"/></svg>Book Appointment</a>
    <a class="wa" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp</a>
  </nav>
  <a class="wafab" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp us</a>`;

  document.body.insertAdjacentHTML('afterbegin', header);
  document.body.insertAdjacentHTML('beforeend', footer);

  // images: data-img="photoId" -> real <img>; broken ones fall back to brand panel
  document.querySelectorAll('[data-img]').forEach(el => {
    const i = new Image(); i.alt = el.dataset.alt || ''; i.loading = el.dataset.eager ? 'eager' : 'lazy';
    i.src = U(el.dataset.img).replace('w=900', 'w=' + (el.dataset.w || 900));
    i.onerror = () => i.remove(); el.appendChild(i);
  });

  const hdr = document.getElementById('hdr');
  addEventListener('scroll', () => hdr.classList.toggle('scrolled', scrollY > 10), { passive: true });
  const dr = document.getElementById('drawer'), bu = document.getElementById('burger');
  bu.onclick = () => { dr.hidden = false; bu.setAttribute('aria-expanded', 'true'); document.body.style.overflow = 'hidden'; };
  const close = () => { dr.hidden = true; bu.setAttribute('aria-expanded', 'false'); document.body.style.overflow = ''; };
  document.getElementById('close').onclick = close;
  dr.addEventListener('click', e => { if (e.target.closest('a')) close(); });

  // gentle reveal on scroll (content stays visible without JS or with reduced motion)
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), { rootMargin: '0px 0px -8% 0px' });
  document.querySelectorAll('.rv').forEach(el => io.observe(el));
  setTimeout(() => document.querySelectorAll('.rv').forEach(el => el.classList.add('in')), 2500);
})();
