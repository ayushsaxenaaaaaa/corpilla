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
    <div class="intro"><h5>Cancer Care</h5><h3 class="h-m">Every type of cancer, one expert team</h3><p>Diagnosis, surgery, chemotherapy, radiation and research in one place.</p><a class="arrow" href="departments.html">All departments</a></div>
    <div><h5>Departments</h5><ul><li><a href="surgical-oncology.html">Surgical Oncology</a></li><li><a href="departments.html#medical">Medical Oncology</a></li><li><a href="departments.html#radiation">Radiation Oncology</a></li><li><a href="departments.html#hemato">Hemato-Oncology</a></li><li><a href="departments.html#palliative">Palliative Care</a></li></ul></div>
    <div><h5>Cancer Types</h5><ul><li><a href="departments.html#types">Breast Cancer</a></li><li><a href="departments.html#types">Head &amp; Neck Cancer</a></li><li><a href="departments.html#types">Lung Cancer</a></li><li><a href="departments.html#types">Gastrointestinal Cancers</a></li><li><a href="departments.html#types">View A–Z</a></li></ul></div>
    <a class="feat" href="contact.html#second-opinion"><div class="ph"><img src="${U('photo-1576091160399-112ba8d25d1d')}" alt="" loading="lazy" onerror="this.remove()"></div><span>Get a second opinion in 48 hours →</span></a>
  </div></div>`;

  const header = `${icons}
  <div class="util"><div class="wrap">
    <span class="em">24/7 Cancer Emergency <b>${SH.PHONE}</b></span>
    <nav aria-label="Utility"><a href="contact.html#international">International Patients</a><a href="contact.html#insurance">Insurance &amp; TPA</a><a href="research.html#trials">Clinical Trials</a><a href="contact.html">Careers</a></nav>
  </div></div>
  <header class="hdr" id="hdr"><div class="wrap">
    <a class="logo" href="index.html"><img src="assets/logo-header.png" alt="Sunnah Hospital – Cancer Research Center" width="151" height="52"></a>
    <nav class="mnav" aria-label="Main"><ul>
      <li><a href="departments.html"${cur('departments')}>Cancer Care</a>${mega}</li>
      <li><a href="doctors.html"${cur('doctors')}>Find a Doctor</a></li>
      <li><a href="research.html"${cur('research')}>Research</a></li>
      <li><a href="infrastructure.html"${cur('infrastructure')}>Our Hospital</a></li>
      <li><a href="contact.html"${cur('contact')}>Patients &amp; Visitors</a></li>
    </ul></nav>
    <div class="hdr-r">
      <a class="btn btn-on" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp</a>
      <a class="btn btn-p" href="contact.html">Request Appointment</a>
      <button class="burger" id="burger" aria-label="Open menu" aria-controls="drawer" aria-expanded="false"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 7h18M3 12h18M3 17h18"/></svg></button>
    </div>
  </div></header>
  <div class="drawer" id="drawer" hidden>
    <div class="top"><img src="assets/logo-header.png" alt="Sunnah Hospital"><button class="burger" id="close" aria-label="Close menu"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 6l12 12M18 6 6 18"/></svg></button></div>
    <nav aria-label="Mobile">
      <details><summary>Cancer Care</summary><div><a href="departments.html">All Departments</a><a href="surgical-oncology.html">Surgical Oncology</a><a href="departments.html#medical">Medical Oncology</a><a href="departments.html#radiation">Radiation Oncology</a><a href="departments.html#types">Cancer Types A–Z</a></div></details>
      <a href="doctors.html">Find a Doctor</a>
      <a href="research.html">Research &amp; Clinical Trials</a>
      <a href="infrastructure.html">Our Hospital</a>
      <a href="contact.html">Patients &amp; Visitors</a>
    </nav>
    <div class="cta"><a class="btn btn-n" href="contact.html">Request Appointment</a><a class="btn btn-w" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp Us</a></div>
  </div>`;

  const footer = `
  <section class="prefoot"><div class="wrap">
    <h3>Talk to a cancer specialist today.</h3>
    <div class="btns"><a class="btn btn-n" href="contact.html"><svg><use href="#i-cal"/></svg>Request Appointment</a><a class="btn btn-w" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp</a></div>
  </div></section>
  <footer>
    <div class="wrap main">
      <div><img src="assets/logo-white.png" alt="Sunnah Hospital – Cancer Research Center"><p class="fm">HOPE • HEALING • HUMANITY</p><p style="margin-top:14px;max-width:34ch">A Surgical &amp; Medical Cancer Center with a dedicated Cancer Research Center.</p></div>
      <div><h5>Cancer Care</h5><ul><li><a href="surgical-oncology.html">Surgical Oncology</a></li><li><a href="departments.html#medical">Medical Oncology</a></li><li><a href="departments.html#radiation">Radiation Oncology</a></li><li><a href="departments.html#types">Cancer Types</a></li></ul></div>
      <div><h5>Patients</h5><ul><li><a href="contact.html">Request Appointment</a></li><li><a href="contact.html#second-opinion">Second Opinion</a></li><li><a href="contact.html#insurance">Insurance</a></li><li><a href="contact.html#international">International Patients</a></li></ul></div>
      <div><h5>Institute</h5><ul><li><a href="doctors.html">Our Doctors</a></li><li><a href="research.html">Research</a></li><li><a href="infrastructure.html">Infrastructure</a></li><li><a href="contact.html">Careers</a></li></ul></div>
      <div><h5>Contact</h5><ul><li>${SH.PHONE}</li><li>Address line,<br>City, State</li><li><a href="https://wa.me/${SH.WA}" target="_blank" rel="noopener">WhatsApp Chat</a></li></ul></div>
    </div>
    <div class="base"><div class="wrap"><span>© 2026 Sunnah Hospital – Cancer Research Center. All rights reserved.</span><span>Privacy Policy · Terms of Use · Patient Rights</span></div></div>
  </footer>
  <nav class="mbar" aria-label="Quick actions">
    <a href="tel:+910000000000"><svg><use href="#i-ph"/></svg>Call</a>
    <a class="bk" href="contact.html"><svg><use href="#i-cal"/></svg>Book Appointment</a>
    <a class="wa" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp</a>
  </nav>
  <a class="wafab" href="https://wa.me/${SH.WA}" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>Chat with our care team</a>`;

  document.body.insertAdjacentHTML('afterbegin', header);
  document.body.insertAdjacentHTML('beforeend', footer);

  // images: data-img="photoId" -> real <img>; broken ones fall back to brand panel
  document.querySelectorAll('[data-img]').forEach(el => {
    const i = new Image(); i.alt = el.dataset.alt || ''; i.loading = el.dataset.eager ? 'eager' : 'lazy';
    i.src = U(el.dataset.img).replace('w=900', 'w=' + (el.dataset.w || 900));
    i.onerror = () => i.remove(); el.appendChild(i);
  });

  // header shadow
  const hdr = document.getElementById('hdr');
  addEventListener('scroll', () => hdr.classList.toggle('scrolled', scrollY > 10), { passive: true });
  // drawer
  const dr = document.getElementById('drawer'), bu = document.getElementById('burger');
  bu.onclick = () => { dr.hidden = false; bu.setAttribute('aria-expanded', 'true'); document.body.style.overflow = 'hidden'; };
  const close = () => { dr.hidden = true; bu.setAttribute('aria-expanded', 'false'); document.body.style.overflow = ''; };
  document.getElementById('close').onclick = close;
  dr.addEventListener('click', e => { if (e.target.closest('a')) close(); });

  // reveal on scroll (content is visible without JS / reduced motion)
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), { rootMargin: '0px 0px -8% 0px' });
  document.querySelectorAll('.rv').forEach(el => io.observe(el));
  setTimeout(() => document.querySelectorAll('.rv').forEach(el => el.classList.add('in')), 2500);

  // counters
  const co = new IntersectionObserver(es => es.forEach(e => {
    if (!e.isIntersecting) return; const el = e.target, n = +el.dataset.count; let t0;
    const step = t => { t0 ??= t; const p = Math.min((t - t0) / 1600, 1), v = Math.round(n * (1 - Math.pow(1 - p, 3)));
      el.firstChild.nodeValue = v.toLocaleString('en-IN'); if (p < 1) requestAnimationFrame(step); };
    requestAnimationFrame(step); co.unobserve(el);
  }), { threshold: .5 });
  document.querySelectorAll('[data-count]').forEach(el => co.observe(el));
})();
