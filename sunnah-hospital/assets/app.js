/* Sunnah Hospital – shared header, footer and behaviour (theme v4) */
(function(){
  document.documentElement.classList.add('js');
  const U = id => `assets/img/${id}.jpg`;
  window.SH = { U, WA: '919923542674', PHONE: '+91 99235 42674' };
  const page = document.body.dataset.page || '';
  const cur = p => page === p ? ' aria-current="page"' : '';
  const S = (id, d) => `<symbol id="i-${id}" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">${d}</g></symbol>`;

  const icons = `<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-wa" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8s-.4-.1-.6.1-.7.8-.8 1-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.3-.4.3-.4.7-1.3.1-.2 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 3 3 0 0 0-.9 2.2 5.2 5.2 0 0 0 1.1 2.7 11.8 11.8 0 0 0 4.5 4c1.7.7 2.3.8 3.2.6a2.7 2.7 0 0 0 1.8-1.2 2.2 2.2 0 0 0 .1-1.2c0-.1-.2-.2-.4-.3z"/></symbol>
  <symbol id="i-quote" viewBox="0 0 24 24"><path fill="currentColor" d="M4 6h6v6c0 3.5-2 6-5.500 7v-2.600c1.500-.700 2.300-2 2.400-3.400H4zM14 6h6v6c0 3.500-2 6-5.500 7v-2.600c1.500-.700 2.300-2 2.400-3.400H14z"/></symbol>
  ${S('ph','<path d="M5 4h4l2 5-2.500 1.500a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/>')}
  ${S('mail','<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>')}
  ${S('clock','<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>')}
  ${S('pin','<path d="M12 21s-7-7.600-7-12a7 7 0 0 1 14 0c0 4.400-7 12-7 12z"/><circle cx="12" cy="9" r="2.500"/>')}
  ${S('cal','<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/>')}
  ${S('check','<path d="m5 12 5 5 9-10"/>')}
  ${S('compass','<circle cx="12" cy="12" r="9"/><path d="m15.500 8.500-2 5-5 2 2-5z"/>')}
  ${S('heart','<path d="M12 20s-7-4.500-7-10a4 4 0 0 1 7-2.500A4 4 0 0 1 19 10c0 5.500-7 10-7 10z"/>')}
  ${S('leaf','<path d="M5 19c0-8 5-13 14-14 0 9-5 14-13 14M5 19c3-5 6-8 10-10"/>')}
  ${S('pulse','<path d="M3 12h4l2-6 4 12 2-6h6"/>')}
  ${S('sun','<circle cx="12" cy="12" r="4"/><path d="M12 3v2M12 19v2M3 12h2M19 12h2M5.600 5.600 7 7M17 17l1.400 1.400M5.600 18.400 7 17M17 7l1.400-1.400"/>')}
  ${S('shield','<path d="M12 3l8 3v6c0 5-3.500 8-8 9-4.500-1-8-4-8-9V6z"/><path d="M12 9v6M9 12h6"/>')}
  ${S('drop','<path d="M12 3s6 6.500 6 11a6 6 0 0 1-12 0c0-4.500 6-11 6-11z"/><path d="M9.500 14.500a2.500 2.500 0 0 0 2.500 2.500"/>')}
  ${S('flask','<path d="M9 3h6M10 3v6L4.500 19A1.500 1.500 0 0 0 6 21h12a1.500 1.500 0 0 0 1.500-2L14 9V3M7 15h10"/>')}
  ${S('user','<circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7"/>')}
  ${S('file','<path d="M7 3h7l5 5v13H7z"/><path d="M14 3v5h5M10 13h6M10 17h6"/>')}
  ${S('chat','<path d="M21 12a8 8 0 0 1-12 7l-5 1 1.500-4.500A8 8 0 1 1 21 12z"/>')}
  ${S('prev','<path d="m14 6-6 6 6 6"/>')}
  ${S('next','<path d="m10 6 6 6-6 6"/>')}
  </svg>`;

  const mega = `
  <div class="mega">
    <div class="intro"><h5>Cancer Care</h5><h3 class="h-m">Surgical &amp; Medical Cancer Center</h3><p>Specialised surgery, chemotherapy and supportive care, planned together for each patient.</p><a class="arrow" href="departments.html">All departments</a></div>
    <div><h5>Specialities</h5><ul><li><a href="surgical-oncology.html">Surgical Oncology</a></li><li><a href="medical-oncology.html">Medical Oncology</a></li><li><a href="research.html">Cancer Research</a></li><li><a href="departments.html#diagnostics">Diagnostics</a></li></ul></div>
    <div><h5>Patient Support</h5><ul><li><a href="patient-care.html#guidance">Right Guidance</a></li><li><a href="patient-care.html#counselling">Counselling</a></li><li><a href="patient-care.html#nutrition">Oncology Nutrition</a></li><li><a href="patient-care.html#rehab">Recovery &amp; Rehabilitation</a></li></ul></div>
    <a class="feat" href="patient-care.html"><div class="ph"><img src="${U('team3')}" alt="" loading="lazy" onerror="this.remove()"></div><span>Beyond cancer treatment: how we support patients and families</span></a>
  </div>`;

  const header = `${icons}
  <div class="topbar"><div class="wrap">
    <div class="tb-l"><a href="tel:+919923542674"><svg><use href="#i-ph"/></svg><b>${SH.PHONE}</b></a><span><svg><use href="#i-mail"/></svg>drhakimakola@gmail.com</span><span><svg><use href="#i-pin"/></svg>Washim Bypass, Akola</span><span><svg><use href="#i-clock"/></svg>24x7 Casualty &amp; Emergency</span></div>
    <div class="tb-r">HOPE <i></i> HEALING <i></i> HUMANITY</div>
  </div></div>
  <header class="hdr" id="hdr"><div class="wrap" style="position:relative">
    <a class="logo" href="index.html"><img src="assets/logo-header.png" alt="Sunnah Hospital – Cancer Research Center" width="157" height="54"></a>
    <nav class="mnav" aria-label="Main"><ul>
      <li><a href="about.html"${cur('about')}>About Us</a></li>
      <li class="has"><a href="departments.html"${cur('care')}>Cancer Care</a>${mega}</li>
      <li><a href="doctors.html"${cur('doctors')}>Doctors</a></li>
      <li><a href="research.html"${cur('research')}>Research</a></li>
      <li><a href="infrastructure.html"${cur('infrastructure')}>Infrastructure</a></li>
      <li><a href="patient-care.html"${cur('patient')}>Patient Care</a></li>
      <li><a href="contact.html"${cur('contact')}>Contact</a></li>
    </ul></nav>
    <div class="hdr-r">
      <a class="btn btn-p" href="contact.html">Book Appointment</a>
      <button class="burger" id="burger" aria-label="Open menu" aria-controls="drawer" aria-expanded="false"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h10"/></svg></button>
    </div>
  </div></header>
  <div class="drawer" id="drawer" hidden>
    <div class="top"><img src="assets/logo-header.png" alt="Sunnah Hospital"><button class="burger" id="close" aria-label="Close menu"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"><path d="M6 6l12 12M18 6 6 18"/></svg></button></div>
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
  <section class="prefoot"><div class="wrap"><div class="pf">
    <div><h3>Talk to our cancer care team today.</h3><p>Right Treatment. Right Guidance. Compassionate Care.</p></div>
    <div class="btns"><a class="btn btn-n" href="contact.html">Book Appointment</a><a class="btn btn-w" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp</a></div>
  </div></div></section>
  <footer>
    <div class="wrap main">
      <div><img src="assets/logo-white.png" alt="Sunnah Hospital – Cancer Research Center"><p class="fm">HOPE • HEALING • HUMANITY</p><p style="margin-top:16px;max-width:36ch">A dedicated unit of Sunnah Hospital, Akola, providing comprehensive, compassionate and affordable cancer care to the people of Vidarbha.</p></div>
      <div><h5>Cancer Care</h5><ul><li><a href="surgical-oncology.html">Surgical Oncology</a></li><li><a href="medical-oncology.html">Medical Oncology</a></li><li><a href="research.html">Cancer Research</a></li><li><a href="departments.html">Departments</a></li><li><a href="departments.html#diagnostics">Diagnostics</a></li></ul></div>
      <div><h5>Hospital</h5><ul><li><a href="about.html">About Us</a></li><li><a href="doctors.html">Doctors &amp; Specialists</a></li><li><a href="infrastructure.html">Infrastructure</a></li><li><a href="patient-care.html#faqs">FAQs</a></li><li><a href="contact.html">Contact &amp; Appointment</a></li></ul></div>
      <div class="fc"><h5>Get in Touch</h5><ul><li><svg><use href="#i-ph"/></svg><span>+91 99235 42674<br>+91 98507 60773</span></li><li><svg><use href="#i-mail"/></svg><span>drhakimakola@gmail.com</span></li><li><svg><use href="#i-pin"/></svg><span>Ganga Nagar, Washim Bypass, Akola, Maharashtra 444002</span></li><li><svg><use href="#i-clock"/></svg><span>24x7 Casualty &amp; Emergency</span></li></ul></div>
    </div>
    <div class="base"><div class="wrap"><span>© 2026 Sunnah Hospital – Cancer Research Center, Akola. All rights reserved. · sunnahhospital.com</span><span>Privacy Policy · Terms of Use</span></div></div>
  </footer>
  <nav class="mbar" aria-label="Quick actions">
    <a class="c" href="tel:+919923542674" aria-label="Call"><svg><use href="#i-ph"/></svg></a>
    <a class="bk" href="contact.html"><svg><use href="#i-cal"/></svg>Book Appointment</a>
    <a class="wa" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener" aria-label="WhatsApp"><svg><use href="#i-wa"/></svg></a>
  </nav>
  <a class="wafab" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp us</a>`;

  document.body.insertAdjacentHTML('afterbegin', header);
  document.body.insertAdjacentHTML('beforeend', footer);

  // photos: data-img="name" -> <img>
  document.querySelectorAll('[data-img]').forEach(el => {
    const i = new Image(); i.alt = el.dataset.alt || ''; i.loading = el.dataset.eager ? 'eager' : 'lazy';
    i.src = U(el.dataset.img); i.onerror = () => i.remove(); el.appendChild(i);
  });

  // header + drawer
  const hdr = document.getElementById('hdr');
  addEventListener('scroll', () => hdr.classList.toggle('scrolled', scrollY > 30), { passive: true });
  const dr = document.getElementById('drawer'), bu = document.getElementById('burger');
  bu.onclick = () => { dr.hidden = false; bu.setAttribute('aria-expanded', 'true'); document.body.style.overflow = 'hidden'; };
  const close = () => { dr.hidden = true; bu.setAttribute('aria-expanded', 'false'); document.body.style.overflow = ''; };
  document.getElementById('close').onclick = close;
  dr.addEventListener('click', e => { if (e.target.closest('a')) close(); });

  // reveal on scroll, staggered among siblings
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), { rootMargin: '0px 0px -8% 0px' });
  document.querySelectorAll('.rv').forEach(el => {
    const sib = [...el.parentElement.children].filter(c => c.classList.contains('rv'));
    el.style.setProperty('--d', Math.min(sib.indexOf(el), 5) * 90 + 'ms'); io.observe(el);
  });
  setTimeout(() => document.querySelectorAll('.rv').forEach(el => el.classList.add('in')), 3000);

  // counters
  const co = new IntersectionObserver(es => es.forEach(e => {
    if (!e.isIntersecting) return; const el = e.target, n = +el.dataset.count; let t0;
    const step = t => { t0 ??= t; const p = Math.min((t - t0) / 1500, 1);
      el.firstChild.nodeValue = Math.round(n * (1 - Math.pow(1 - p, 3))); if (p < 1) requestAnimationFrame(step); };
    requestAnimationFrame(step); co.unobserve(el);
  }), { threshold: .5 });
  document.querySelectorAll('[data-count]').forEach(el => co.observe(el));

  // hero slider
  const hero = document.querySelector('.hero3');
  if (hero) {
    const slides = [...hero.querySelectorAll('.slide')], copies = [...hero.querySelectorAll('.copies>div')], bars = [...hero.querySelectorAll('.bars span')], num = hero.querySelector('.num');
    let k = 0, timer;
    const go = n => { k = (n + slides.length) % slides.length;
      [slides, copies, bars].forEach(a => a.forEach((x, i) => x.classList.toggle('on', i === k)));
      num.textContent = '0' + (k + 1) + ' / 0' + slides.length; };
    const auto = () => { clearInterval(timer); if (!matchMedia('(prefers-reduced-motion: reduce)').matches) timer = setInterval(() => go(k + 1), 6500); };
    hero.querySelector('.pv').onclick = () => { go(k - 1); auto(); };
    hero.querySelector('.nx').onclick = () => { go(k + 1); auto(); };
    go(0); auto();
  }

  // horizontal tracks
  document.querySelectorAll('[data-track]').forEach(b => {
    b.onclick = () => { const t = document.getElementById(b.dataset.track); t.scrollBy({ left: (b.dataset.dir === 'prev' ? -1 : 1) * t.clientWidth * .8, behavior: 'smooth' }); };
  });
})();
