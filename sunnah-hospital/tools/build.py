import sys, pathlib
out = pathlib.Path(sys.argv[1])

def page(fn, title, desc, key, body, script=''):
    html = f'''<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>{title}</title>
<meta name="description" content="{desc}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap">
<link rel="stylesheet" href="assets/sunnah.css">
</head>
<body data-page="{key}">
<main>
{body}
</main>
<script src="assets/app.js"></script>
{script}
</body>
</html>
'''
    (out / fn).write_text(html)

def phero(img, crumbs, h1, lead, extra=''):
    c = '/'.join(f'<a href="{u}">{t}</a>' if u else f'<span>{t}</span>' for t, u in crumbs)
    return f'''  <section class="phero">
    <div class="ph" data-img="{img}" data-w="1800" data-eager="1"></div>
    <div class="wrap">
      <nav class="crumbs" aria-label="Breadcrumb">{c}</nav>
      <h1>{h1}</h1>
      <p class="lead">{lead}</p>{extra}
    </div>
  </section>'''

BOOKBOX = '''<div class="box navy"><h4>Book a consultation</h4><p>Share your details and our team will call you back.</p><a class="btn btn-p" href="contact.html">Book Appointment</a><a class="btn btn-w" href="https://wa.me/919923542674" target="_blank" rel="noopener">WhatsApp Us</a></div>'''

PILLARS = '''<div class="pillars">
      <div class="pillar rv" id="guidance"><span class="pi"><svg><use href="#i-compass"/></svg></span><div><h3>Right Guidance</h3><p>Treatment navigation and help with informed decisions, including guidance to avoid unnecessary investigations and expenses.</p></div></div>
      <div class="pillar rv" id="counselling"><span class="pi"><svg><use href="#i-heart"/></svg></span><div><h3>Psychological Support</h3><p>Professional counselling and emotional support for patients and their families.</p></div></div>
      <div class="pillar rv" id="nutrition"><span class="pi"><svg><use href="#i-leaf"/></svg></span><div><h3>Specialized Nutrition</h3><p>A dedicated oncology dietitian for personalised nutrition during chemotherapy, after surgery and throughout recovery.</p></div></div>
      <div class="pillar rv" id="rehab"><span class="pi"><svg><use href="#i-pulse"/></svg></span><div><h3>Recovery &amp; Rehabilitation</h3><p>Post-treatment recovery guidance and supportive care.</p></div></div>
      <div class="pillar rv" id="wellness"><span class="pi"><svg><use href="#i-sun"/></svg></span><div><h3>Lifestyle &amp; Wellness</h3><p>Long-term nutrition, lifestyle guidance and family education.</p></div></div>
    </div>'''
PILLARS2 = PILLARS.replace('class="pillars"', 'class="pillars grid2"')

PROMISE = '''  <section class="inset promise" style="margin-block:12px"><div class="bgp"></div><div class="wrap">
    <svg class="qm"><use href="#i-quote"/></svg>
    <span class="over onDark">Our Promise</span>
    <p class="line">We don't just treat cancer. We <b>support the patient</b>, <b>strengthen the family</b> and guide them through every step of the journey.</p>
    <div class="tri"><span>Right Treatment</span><span>Right Guidance</span><span>Compassionate Care</span></div>
  </div></section>'''

BADGE = '''<div class="badge"><svg viewBox="0 0 120 120" aria-hidden="true"><defs><path id="cp" d="M60 60m-46 0a46 46 0 1 1 92 0a46 46 0 1 1-92 0"/></defs><text><textPath href="#cp" textLength="284">HOPE • HEALING • HUMANITY •</textPath></text></svg><img src="assets/emblem.png" alt=""></div>'''

DEPT_OPTS = '<option>Surgical Oncology</option><option>Medical Oncology</option><option>Counselling</option><option>Oncology Nutrition</option><option>Not sure</option>'

# ---------------- HOME ----------------
# index.html is now hand-written (Cleveland Clinic style); not generated here.
SKIP_HOME = True
if False:
  page('index.html', 'Sunnah Hospital – Cancer Research Center | Surgical & Medical Cancer Center',
   'Sunnah Hospital – Cancer Research Center, Akola: comprehensive, compassionate and affordable cancer care for Vidarbha. Surgical & medical oncology, chemotherapy day care, diagnostics, ICU, HDU and PM-JAY cashless treatment.', 'home', f'''
    <section class="hero3">
      <div class="frame">
        <div class="slide on"><div class="ph" data-img="hero-surgery" data-eager="1" data-alt="Cancer surgeons operating at Sunnah Hospital"></div></div>
        <div class="slide"><div class="ph" data-img="sh-daycare" data-eager="1" data-alt="Chemotherapy day care"></div></div>
        <div class="slide"><div class="ph" data-img="sh-building" data-eager="1" data-alt="Sunnah Hospital building, Akola"></div></div>
        <div class="shade"></div><span class="ring"></span>
        <div class="wrap inner">
          <div>
            <div class="copies">
              <div class="on"><span class="over onDark">Surgical &amp; Medical Cancer Center</span><h1>Cancer care that goes <span class="hl">beyond</span> treatment.</h1><p>We treat the disease, and we guide and support patients and their families through every step of the journey.</p><div class="ctas"><a class="btn btn-p" href="contact.html">Book an Appointment</a><a class="btn btn-o" href="https://wa.me/919923542674" target="_blank" rel="noopener"><svg><use href="#i-wa"/></svg>WhatsApp Us</a></div></div>
              <div><span class="over onDark">Medical Oncology</span><h1>Chemotherapy in <span class="hl">day care</span> and IPD.</h1><p>Safe and effective chemotherapy, targeted therapy and immunotherapy, with supportive and palliative care.</p><div class="ctas"><a class="btn btn-p" href="medical-oncology.html">Medical Oncology</a><a class="btn btn-o" href="contact.html">Book an Appointment</a></div></div>
              <div><span class="over onDark">Akola • Vidarbha</span><h1>Affordable cancer care for <span class="hl">Vidarbha.</span></h1><p>Comprehensive, compassionate cancer treatment close to home, with cashless care under Ayushman Bharat (PM-JAY).</p><div class="ctas"><a class="btn btn-p" href="about.html">About the Hospital</a><a class="btn btn-o" href="contact.html">Contact Us</a></div></div>
            </div>
            <div class="ctrl"><button class="pv" type="button" aria-label="Previous slide"><svg><use href="#i-prev"/></svg></button><span class="num">01 / 03</span><span class="bars"><span></span><span></span><span></span></span><button class="nx" type="button" aria-label="Next slide"><svg><use href="#i-next"/></svg></button></div>
          </div>
          <aside class="glass">
            <span class="over onDark">Our Promise</span>
            <h3>We don't just treat cancer. We guide you through every step.</h3>
            <ul><li><svg><use href="#i-check"/></svg>Right Treatment</li><li><svg><use href="#i-check"/></svg>Right Guidance</li><li><svg><use href="#i-check"/></svg>Compassionate Care</li></ul>
            <a class="meet" href="doctors.html"><span class="avs"><span><img src="assets/img/doc1.jpg" alt=""></span><span><img src="assets/img/doc2.jpg" alt=""></span><span><img src="assets/img/doc3.jpg" alt=""></span></span><span>Meet our doctors<br>and specialists →</span></a>
          </aside>
        </div>
      </div>
      <div class="wrap"><form class="qbar" id="qbar" novalidate>
        <div class="t"><b>Request a callback</b><span>Our team will call you back</span></div>
        <input id="qn" placeholder="Patient name" aria-label="Patient name" autocomplete="name">
        <input id="qp" type="tel" placeholder="Mobile number" aria-label="Mobile number" autocomplete="tel">
        <select id="qd" aria-label="Department">{DEPT_OPTS}</select>
        <button class="btn btn-n" type="submit">Request Callback</button>
        <p class="ok" id="qok" hidden></p>
      </form></div>
    </section>

    <section class="sec"><div class="wrap about">
      <div class="collage rv"><div class="ph a" data-img="sh-building" data-alt="Sunnah Hospital, Akola"></div><div class="ph b" data-img="team3" data-alt="Doctors discussing a patient's care"></div></div>
      <div class="stack rv">
        <span class="over">Welcome to Sunnah Hospital</span>
        <h2 class="h-l">Comprehensive, compassionate and <span class="hl">affordable cancer care</span></h2>
        <p class="lead">Sunnah Cancer Research Center is a dedicated unit of Sunnah Hospital, Akola, committed to providing comprehensive, compassionate and affordable cancer care to the people of Vidarbha. We believe every patient deserves not just treatment, but emotional strength, dignity and support throughout their journey.</p>
        <div class="mini">
          <div><span class="chip"><svg><use href="#i-shield"/></svg></span><span><b>Surgical Oncology</b><span>Cancer surgery planned around the whole patient</span></span></div>
          <div><span class="chip"><svg><use href="#i-drop"/></svg></span><span><b>Medical Oncology</b><span>Chemotherapy with close monitoring and support</span></span></div>
        </div>
        <ul class="checks">
          <li><span><b>Advanced medical science</b></span></li>
          <li><span><b>Skilled oncology specialists</b></span></li>
          <li><span><b>Deep human compassion</b></span></li>
        </ul>
        <div class="callrow"><a class="btn btn-n" href="about.html">About the Hospital</a><a class="callchip" href="tel:+919923542674"><i><svg><use href="#i-ph"/></svg></i><span><small>Call for appointments</small><b>+91 99235 42674</b></span></a></div>
      </div>
    </div></section>

    <section class="sec mist decor"><div class="wrap">
      <div class="shead"><div class="stack rv"><span class="over">Cancer Care</span><h2 class="h-l">Specialised care <span class="hl">under one roof</span></h2></div><p class="lead rv">Surgery, medical treatment and diagnostics work side by side, so every patient receives one clear plan.</p></div>
      <div class="prog">
        <a class="pcard rv" href="surgical-oncology.html"><div class="ph" data-img="sh-ot-suite" data-alt="Operation theatre"></div><div class="chipwrap"><span class="chip"><svg><use href="#i-shield"/></svg></span></div><h3>Surgical Oncology</h3><p>Advanced and safe surgical solutions for a wide range of cancers.</p><div class="tags"><span>Breast</span><span>Head &amp; Neck</span><span>Gastrointestinal</span><span>Gynaecological</span></div><span class="arrow">Explore Surgical Oncology</span></a>
        <a class="pcard rv" href="medical-oncology.html"><div class="ph" data-img="sh-daycare" data-alt="Chemotherapy day care"></div><div class="chipwrap"><span class="chip"><svg><use href="#i-drop"/></svg></span></div><h3>Medical Oncology</h3><p>Safe and effective chemotherapy and targeted therapies for comprehensive cancer care.</p><div class="tags"><span>Chemotherapy</span><span>Targeted Therapy</span><span>Immunotherapy</span><span>Palliative Care</span></div><span class="arrow">Explore Medical Oncology</span></a>
        <a class="pcard rv" href="departments.html#diagnostics"><div class="ph" data-img="sh-diagnostic" data-alt="Diagnostic imaging room"></div><div class="chipwrap"><span class="chip"><svg><use href="#i-flask"/></svg></span></div><h3>Diagnostics</h3><p>Accurate and reliable detection with in-house diagnostic facilities.</p><div class="tags"><span>Digital X-Ray</span><span>Sonography</span><span>Pathology</span></div><span class="arrow">Explore Diagnostics</span></a>
      </div>
    </div></section>

    <section class="sec inset beyond" style="margin-top:12px"><div class="wrap grid">
      <div class="side rv">
        <span class="over onDark">Our Unique Approach</span>
        <h2 class="h-l">Beyond cancer <span class="hl">treatment</span></h2>
        <p>At Sunnah Hospital, we believe cancer care goes beyond medical treatment. Along with specialised Surgical &amp; Medical Oncology, our integrated patient-support approach focuses on five areas.</p>
        <a class="btn btn-p" href="patient-care.html">Patient Care &amp; Support</a>
        <div class="ph" data-img="care-hands" data-alt="Hands holding a heart"></div>
      </div>
      <div>{PILLARS}</div>
    </div></section>

    <section class="sec"><div class="wrap">
      <div class="shead c"><div class="stack rv" style="justify-items:center"><span class="over">Your First Visit</span><h2 class="h-l">Four steps to <span class="hl">the right care</span></h2><p class="lead">From the first phone call, you will know what happens next.</p></div></div>
      <div class="journey">
        <div class="jstep rv"><span class="jc"><svg><use href="#i-cal"/></svg></span><h3>Book your visit</h3><p>Call, WhatsApp or send an enquiry. Collect your reports, scans and prescriptions.</p></div>
        <div class="jstep rv"><span class="jc"><svg><use href="#i-chat"/></svg></span><h3>Meet the doctor</h3><p>The doctor examines you, reviews your reports and explains the options.</p></div>
        <div class="jstep rv"><span class="jc"><svg><use href="#i-file"/></svg></span><h3>Get your plan</h3><p>A clear treatment plan and cost estimate. Only the tests you need are advised.</p></div>
        <div class="jstep rv"><span class="jc"><svg><use href="#i-heart"/></svg></span><h3>Support begins</h3><p>You meet our counsellor and dietitian, and you know whom to call.</p></div>
      </div>
    </div></section>

    <section class="sec"><div class="wrap">
      <div class="shead"><div class="stack rv"><span class="over">Why Choose Us</span><h2 class="h-l">Committed to excellence, compassion and <span class="hl">comprehensive cancer care</span></h2></div>
        <div class="pmj rv"><img src="assets/img/pmjay.png" alt="Ayushman Bharat PM-JAY" width="72" height="72"><span><b>PM-JAY empanelled</b>Cashless treatment under Ayushman Bharat</span></div></div>
      <div class="why">
        <div class="rv"><span class="chip"><svg><use href="#i-user"/></svg></span><h3>Experienced Oncology Team</h3><p>Highly qualified specialists with years of expertise in cancer care.</p></div>
        <div class="rv"><span class="chip"><svg><use href="#i-shield"/></svg></span><h3>Affordable Treatment Options</h3><p>Quality cancer care that is accessible and affordable for all.</p></div>
        <div class="rv"><span class="chip"><svg><use href="#i-file"/></svg></span><h3>PM-JAY Support</h3><p>Cashless treatment facility under the Ayushman Bharat (PM-JAY) scheme.</p></div>
        <div class="rv"><span class="chip"><svg><use href="#i-heart"/></svg></span><h3>Patient-Centered Care</h3><p>Personalised treatment and compassionate care at every step.</p></div>
        <div class="rv"><span class="chip"><svg><use href="#i-chat"/></svg></span><h3>Emotional &amp; Family Support</h3><p>Counselling and support for patients and their families.</p></div>
        <div class="rv"><span class="chip"><svg><use href="#i-pulse"/></svg></span><h3>Modern Infrastructure</h3><p>Modular OT, ICU, HDU and 24x7 casualty for safer treatment.</p></div>
      </div>
    </div></section>

    <section class="sec mist decor"><div class="wrap">
      <div class="shead"><div class="stack rv"><span class="over">Doctors &amp; Specialists</span><h2 class="h-l">The team that will <span class="hl">care for you</span></h2></div>
        <div class="navbtns rv"><button type="button" data-track="docTrack" data-dir="prev" aria-label="Previous doctors"><svg><use href="#i-prev"/></svg></button><button type="button" data-track="docTrack" data-dir="next" aria-label="Next doctors"><svg><use href="#i-next"/></svg></button></div></div>
      <div class="track" id="docTrack"></div>
      <div style="text-align:center;margin-top:8px"><a class="btn btn-n" href="doctors.html">View All Doctors</a></div>
    </div></section>

  {PROMISE}

    <section class="sec"><div class="wrap">
      <div class="shead"><div class="stack rv"><span class="over">Hospital Infrastructure</span><h2 class="h-l">Better facilities. <span class="hl">Better care.</span></h2></div><div class="rv"><a class="btn btn-n" href="infrastructure.html">See All Facilities</a></div></div>
      <div class="gal rv">
        <figure class="w2 h2"><div class="ph" data-img="sh-ot" data-alt="Modular operation theatre at Sunnah Hospital"></div><figcaption>Modular Operation Theatre<small>For cancer surgery</small></figcaption></figure>
        <figure><div class="ph" data-img="sh-icu" data-alt="ICU at Sunnah Hospital"></div><figcaption>Advanced ICU Support<small>Round-the-clock monitoring</small></figcaption></figure>
        <figure><div class="ph" data-img="sh-hdu" data-alt="High dependency unit"></div><figcaption>High Dependency Unit<small>HDU care after surgery</small></figcaption></figure>
        <figure><div class="ph" data-img="sh-casualty" data-alt="Casualty"></div><figcaption>24x7 Casualty<small>Emergency care</small></figcaption></figure>
        <figure><div class="ph" data-img="sh-pharmacy" data-alt="Hospital pharmacy"></div><figcaption>Pharmacy 24x7<small>Medicines on site</small></figcaption></figure>
      </div>
    </div></section>

    <section class="sec mist"><div class="wrap faqform">
      <div>
        <div class="stack rv" style="margin-bottom:30px"><span class="over">FAQs</span><h2 class="h-l">Questions patients <span class="hl">ask us</span></h2></div>
        <details class="faq" open><summary>Do I need a referral to see a doctor?</summary><p>No. You can book an appointment directly.</p></details>
        <details class="faq"><summary>What should I bring to my first appointment?</summary><p>All medical reports, scans and biopsy slides if available, a list of current medicines, and a family member if possible.</p></details>
        <details class="faq"><summary>Can I get a second opinion?</summary><p>Yes. Bring or send your reports and our specialists will review them and explain their advice.</p></details>
        <details class="faq"><summary>Is treatment available under Ayushman Bharat (PM-JAY)?</summary><p>Yes. Cashless treatment is available for eligible patients under the Ayushman Bharat (PM-JAY) scheme. Bring your card and our team will guide you.</p></details>
        <details class="faq"><summary>Is chemotherapy given in day care?</summary><p>Yes. Chemotherapy is given in day care, and as in-patient (IPD) treatment when needed.</p></details>
        <a class="arrow" href="patient-care.html#faqs" style="margin-top:14px">More questions</a>
      </div>
      <div class="fcard rv">
        <h3>Request an appointment</h3>
        <p>Share your details and our team will call you back.</p>
        <form class="form" id="hf" novalidate>
          <div class="row"><label for="n">Patient name<input id="n" autocomplete="name" placeholder="Full name"></label><label for="p">Mobile number<input id="p" type="tel" autocomplete="tel" placeholder="+91"></label></div>
          <label for="d">Preferred department<select id="d">{DEPT_OPTS}</select></label>
          <label for="m">Message (optional)<textarea id="m" rows="3" placeholder="Tell us briefly about the diagnosis or your question"></textarea></label>
          <div class="acts"><button class="btn btn-p" type="submit">Send Enquiry</button><a class="btn btn-w" id="wa" target="_blank" rel="noopener" href="https://wa.me/919923542674"><svg><use href="#i-wa"/></svg>WhatsApp</a></div>
          <p class="note" id="msg" hidden></p>
        </form>
      </div>
    </div></section>''',
   '''<script src="assets/doctors.js"></script>
  <script>
  SHD.render(document.getElementById('docTrack'), SHD.list);
  const $=i=>document.getElementById(i),v=i=>$(i).value.trim();
  $('qbar').onsubmit=e=>{e.preventDefault();const o=$('qok');o.hidden=false;o.textContent=(!v('qn')||!v('qp'))?'Please enter the patient name and mobile number.':`Thank you, ${v('qn')}. On the live site this request goes to the hospital team, who will call ${v('qp')}.`;};
  function upd(){$('wa').href='https://wa.me/919923542674?text='+encodeURIComponent(`Hello Sunnah Hospital, I would like an appointment.\\nPatient: ${v('n')||'-'}\\nMobile: ${v('p')||'-'}\\nDepartment: ${v('d')}\\nMessage: ${v('m')||'-'}`);}
  $('hf').addEventListener('input',upd);upd();
  $('hf').onsubmit=e=>{e.preventDefault();const m=$('msg');m.hidden=false;m.textContent=(!v('n')||!v('p'))?'Please enter the patient name and mobile number.':`Thank you, ${v('n')}. On the live site this enquiry will be emailed to the hospital. For now, use WhatsApp.`;};
  </script>''')


# ---------------- ABOUT ----------------
page('about.html', 'About Us – Sunnah Hospital Cancer Research Center',
 'About Sunnah Hospital – Cancer Research Center: our profile, vision, mission and values of Hope, Healing and Humanity.', 'about',
 phero('sh-building', [('Home','index.html'),('About Us','')], 'About Us', 'Sunnah Cancer Research Center: a dedicated unit of Sunnah Hospital, Akola.') + f'''
  <section class="sec"><div class="wrap about">
    <div class="collage rv"><div class="ph a" data-img="sh-building" data-alt="Sunnah Hospital, Akola"></div><div class="ph b" data-img="sh-ot" data-alt="Operation theatre"></div></div>
    <div class="stack rv">
      <span class="over">Hospital Profile</span>
      <h2 class="h-l">Cancer care for the people of <span class="hl">Vidarbha</span></h2>
      <p class="lead">Sunnah Cancer Research Center is a dedicated unit of Sunnah Hospital, committed to providing comprehensive, compassionate and affordable cancer care to the people of Vidarbha.</p>
      <div class="prose">
        <p>We believe that every patient deserves not just treatment, but emotional strength, dignity and support throughout their journey.</p>
        <p><b>Our approach combines:</b></p>
      </div>
      <ul class="checks"><li><span>Advanced medical science</span></li><li><span>Skilled oncology specialists</span></li><li><span>Deep human compassion</span></li></ul>
      <a class="btn btn-n" href="doctors.html">Meet Our Doctors</a>
    </div>
  </div></section>

  <section class="sec mist decor"><div class="wrap">
    <div class="vm">
      <div class="v rv"><span class="over onDark">Our Vision</span><h3>To be a trusted centre for cancer care and research, where every patient is treated with skill and dignity.</h3></div>
      <div class="m rv"><span class="over">Our Mission</span>
        <ul class="checks">
          <li><span>To provide specialised surgical and medical cancer treatment based on sound medical evidence.</span></li>
          <li><span>To guide patients and families honestly, and to help them avoid unnecessary investigations and expenses.</span></li>
          <li><span>To care for the whole person through counselling, nutrition, rehabilitation and family education.</span></li>
          <li><span>To contribute to cancer research and awareness in the community we serve.</span></li>
        </ul>
      </div>
    </div>
  </div></section>

  <section class="sec"><div class="wrap">
    <div class="shead c"><div class="stack rv" style="justify-items:center"><span class="over">Our Philosophy</span><h2 class="h-l">Hope. Healing. <span class="hl">Humanity.</span></h2></div></div>
    <div class="values3">
      <div class="rv"><span class="chip"><svg><use href="#i-sun"/></svg></span><h3>HOPE</h3><p>Giving strength in difficult times.</p></div>
      <div class="rv"><span class="chip"><svg><use href="#i-pulse"/></svg></span><h3>HEALING</h3><p>Providing the best possible treatment.</p></div>
      <div class="rv"><span class="chip"><svg><use href="#i-heart"/></svg></span><h3>HUMANITY</h3><p>Standing with patients beyond medicine.</p></div>
    </div>
  </div></section>

  <section class="sec mist"><div class="wrap">
    <div class="shead"><div class="stack rv"><span class="over">Why Choose Us</span><h2 class="h-l">Committed to excellence, compassion and <span class="hl">comprehensive cancer care</span></h2></div>
      <div class="pmj rv"><img src="assets/img/pmjay.png" alt="Ayushman Bharat PM-JAY" width="72" height="72"><span><b>PM-JAY empanelled</b>Cashless treatment under Ayushman Bharat</span></div></div>
    <div class="why">
      <div class="rv"><span class="chip"><svg><use href="#i-user"/></svg></span><h3>Experienced Oncology Team</h3><p>Highly qualified specialists with years of expertise in cancer care.</p></div>
      <div class="rv"><span class="chip"><svg><use href="#i-shield"/></svg></span><h3>Affordable Treatment Options</h3><p>Quality cancer care that is accessible and affordable for all.</p></div>
      <div class="rv"><span class="chip"><svg><use href="#i-file"/></svg></span><h3>PM-JAY Support</h3><p>Cashless treatment facility under the Ayushman Bharat (PM-JAY) scheme.</p></div>
      <div class="rv"><span class="chip"><svg><use href="#i-heart"/></svg></span><h3>Patient-Centered Care</h3><p>Personalised treatment and compassionate care at every step.</p></div>
      <div class="rv"><span class="chip"><svg><use href="#i-chat"/></svg></span><h3>Emotional &amp; Family Support</h3><p>Counselling and support for patients and their families.</p></div>
      <div class="rv"><span class="chip"><svg><use href="#i-pulse"/></svg></span><h3>Modern Infrastructure</h3><p>Modular OT, ICU, HDU and 24x7 casualty for safer treatment.</p></div>
    </div>
  </div></section>
{PROMISE}''')


# ---------------- SURGICAL ----------------
SUBNAV_JS = '''<script src="assets/doctors.js"></script>
<script>
const td=document.getElementById('team-docs');if(td)SHD.render(td,SHD.list.filter(d=>d.s===td.dataset.s));
const links=[...document.querySelectorAll('.subnav a')];
const so=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)links.forEach(a=>a.classList.toggle('on',a.getAttribute('href')==='#'+e.target.id));}),{rootMargin:'-40% 0px -55% 0px'});
links.forEach(a=>{const t=document.querySelector(a.getAttribute('href'));if(t)so.observe(t);});
</script>'''

page('surgical-oncology.html', 'Surgical Oncology – Sunnah Hospital',
 'Surgical Oncology at Sunnah Hospital – Cancer Research Center: cancer surgery, what to expect before and after an operation, and how to book a consultation.', 'care',
 phero('sh-ot-suite', [('Home','index.html'),('Cancer Care','departments.html'),('Surgical Oncology','')], 'Surgical Oncology', 'Precision Surgery. Compassionate Care. Better Outcomes.',
  '\n      <div style="display:flex;flex-wrap:wrap;gap:12px"><a class="btn btn-p" href="contact.html">Book a Consultation</a><a class="btn btn-o" href="https://wa.me/919923542674" target="_blank" rel="noopener">WhatsApp Your Reports</a></div>') + f'''
  <nav class="subnav" aria-label="On this page"><div class="wrap">
    <a href="#overview" class="on">Overview</a><a href="#services">Services</a><a href="#journey">What to Expect</a><a href="#support">Support</a><a href="#faq">FAQs</a>
  </div></nav>
  <section class="sec"><div class="wrap two-col">
    <div class="prose">
      <span class="over" id="overview">Overview</span>
      <h2 class="h-l" style="margin:0">Surgery planned around the whole patient</h2>
      <p class="big" style="font-size:clamp(1.15rem,2vw,1.4rem);color:var(--navy)">Our skilled surgical team provides advanced and safe surgical solutions for a wide range of cancers.</p>
      <p>For many cancers, surgery offers the best chance of cure. A surgical oncologist is a surgeon specially trained to operate on cancer: to remove the tumour with a safe margin, to examine the nearby lymph nodes, and to preserve as much normal function as possible.</p>
      <p>At Sunnah Hospital, surgery is never planned alone. Our surgical and medical oncology teams decide together whether surgery should come first, or after chemotherapy, and what further treatment may be needed.</p>

      <h2 class="h-m" id="services">Surgical services</h2>
      <div class="cols3">
        <div class="tcard"><h4>Head &amp; Neck Cancer Surgery</h4><p>Surgery for cancers of the mouth, throat and thyroid.</p></div>
        <div class="tcard"><h4>Breast Cancer Surgery</h4><p>Breast-conserving surgery where suitable, and mastectomy when needed.</p></div>
        <div class="tcard"><h4>Gastrointestinal Cancer Surgery</h4><p>Surgery for cancers of the stomach, intestine and related organs.</p></div>
        <div class="tcard"><h4>Gynecological Cancer Surgery</h4><p>Surgery for cancers of the cervix, ovary and uterus.</p></div>
      </div>
      <p>Operations are performed in our <b>Modular Operation Theatre</b>, with a <b>Minor OT</b> for procedures and <b>ICU</b> and <b>HDU</b> support after surgery.</p>

      <h2 class="h-m" id="journey">What to expect</h2>
      <div class="tl">
        <div><b>Consultation</b><span>The surgeon reviews your reports, examines you and explains the options in plain language.</span></div>
        <div><b>Planning &amp; fitness tests</b><span>Your treatment plan is discussed by the team, and tests are done to make sure you are fit for surgery.</span></div>
        <div><b>Surgery</b><span>Your operation is carried out by the surgical oncology team, with anaesthesia and nursing staff experienced in cancer care.</span></div>
        <div><b>Recovery in hospital</b><span>We help you move, eat and manage pain as early as it is safe, with our dietitian guiding your nutrition.</span></div>
        <div><b>Follow-up</b><span>Your final report is explained to you, along with any further treatment and a schedule of check-ups.</span></div>
      </div>

      <h2 class="h-m" id="support">Support around your surgery</h2>
      <ul class="checks">
        <li><span><b>Right guidance.</b> Clear advice on which tests and treatments you need, and which you do not.</span></li>
        <li><span><b>Counselling.</b> Emotional support for you and your family before and after the operation.</span></li>
        <li><span><b>Nutrition after surgery.</b> A personalised diet plan from our oncology dietitian.</span></li>
        <li><span><b>Recovery guidance.</b> Advice on wound care, activity and returning to daily life.</span></li>
      </ul>

      <h2 class="h-m" id="faq">Frequently asked questions</h2>
      <div>
        <details class="faq"><summary>Does every cancer patient need surgery?</summary><p>No. It depends on the type and stage of cancer. Some patients are treated with surgery alone, some with medicines, and many with a combination. Your doctors will explain what is right for you.</p></details>
        <details class="faq"><summary>How long will I stay in hospital?</summary><p>This depends on the operation and on your general health. Your surgeon will give you an estimate before admission.</p></details>
        <details class="faq"><summary>Will I need chemotherapy after surgery?</summary><p>Sometimes. The decision is made after the removed tissue has been examined in the laboratory, and your doctors will discuss it with you.</p></details>
        <details class="faq"><summary>What should I bring to the first consultation?</summary><p>All your reports, scans and biopsy slides if you have them, a list of your medicines, and a family member if possible.</p></details>
      </div>
    </div>
    <aside class="aside">{BOOKBOX}
      <div class="box"><h4 style="font-size:1rem">Related</h4><ul><li><a href="medical-oncology.html">Medical Oncology</a><span>→</span></li><li><a href="patient-care.html">Patient Support</a><span>→</span></li><li><a href="doctors.html">Our Doctors</a><span>→</span></li></ul></div>
    </aside>
  </div></section>
  <section class="sec mist"><div class="wrap">
    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:end;gap:20px;margin-bottom:40px"><div class="stack"><span class="over">Our Surgeons</span><h2 class="h-l">Surgical oncology team</h2></div><a class="arrow" href="doctors.html">All doctors</a></div>
    <div class="docs" id="team-docs" data-s="Surgical Oncology"></div>
  </div></section>''', SUBNAV_JS)

# ---------------- MEDICAL ----------------
page('medical-oncology.html', 'Medical Oncology – Sunnah Hospital',
 'Medical Oncology at Sunnah Hospital – Cancer Research Center: chemotherapy and medical cancer treatment with nutrition and counselling support.', 'care',
 phero('sh-daycare', [('Home','index.html'),('Cancer Care','departments.html'),('Medical Oncology','')], 'Medical Oncology', 'Compassionate Care. Advanced Treatment. Better Outcomes.',
  '\n      <div style="display:flex;flex-wrap:wrap;gap:12px"><a class="btn btn-p" href="contact.html">Book a Consultation</a><a class="btn btn-o" href="https://wa.me/919923542674" target="_blank" rel="noopener">WhatsApp Your Reports</a></div>') + f'''
  <nav class="subnav" aria-label="On this page"><div class="wrap">
    <a href="#overview" class="on">Overview</a><a href="#services">Treatments</a><a href="#journey">What to Expect</a><a href="#support">Support</a><a href="#faq">FAQs</a>
  </div></nav>
  <section class="sec"><div class="wrap two-col">
    <div class="prose">
      <span class="over" id="overview">Overview</span>
      <h2 class="h-l" style="margin:0">Treatment with medicines, chosen for you</h2>
      <p class="big" style="font-size:clamp(1.15rem,2vw,1.4rem);color:var(--navy)">Our medical oncology department delivers safe and effective chemotherapy and targeted therapies for comprehensive cancer care.</p>
      <p>Medical oncology is the treatment of cancer with medicines. Depending on the type and stage of cancer, these may be used to shrink a tumour before surgery, to lower the chance of the cancer returning after surgery, or to control the disease and relieve symptoms.</p>
      <p>Our medical oncologists choose the treatment based on your diagnosis, your general health and your own wishes, and they explain the expected benefits and side effects before anything begins.</p>

      <h2 class="h-m" id="services">Available treatments</h2>
      <div class="cols3">
        <div class="tcard"><h4>Chemotherapy (Day Care &amp; IPD)</h4><p>Medicines that destroy cancer cells, given in planned cycles in day care or as in-patient treatment.</p></div>
        <div class="tcard"><h4>Targeted Therapy</h4><p>Medicines that act on specific features of cancer cells, where tests show they will help.</p></div>
        <div class="tcard"><h4>Immunotherapy</h4><p>Treatment that helps the body's own immune system fight the cancer.</p></div>
        <div class="tcard"><h4>Supportive &amp; Palliative Care</h4><p>Relief of pain and other symptoms for a better quality of life.</p></div>
      </div>

      <h2 class="h-m" id="journey">What to expect</h2>
      <div class="tl">
        <div><b>Consultation</b><span>The oncologist reviews your reports and explains the diagnosis and the treatment options.</span></div>
        <div><b>Treatment plan</b><span>You receive a written plan with the medicines, the number of cycles and the likely costs.</span></div>
        <div><b>Day care or IPD</b><span>Chemotherapy is given in day care, so you go home the same day, or as in-patient treatment when needed.</span></div>
        <div><b>Between cycles</b><span>Our team stays in touch about side effects, and the dietitian adjusts your diet as needed.</span></div>
        <div><b>Review</b><span>Scans and tests show how well the treatment is working, and the plan is adjusted if required.</span></div>
      </div>

      <h2 class="h-m" id="support">Support during chemotherapy</h2>
      <ul class="checks">
        <li><span><b>Specialised nutrition.</b> A dedicated oncology dietitian plans your diet during chemotherapy and recovery.</span></li>
        <li><span><b>Psychological support.</b> Professional counselling for patients and their families.</span></li>
        <li><span><b>Right guidance.</b> Honest advice that helps you avoid unnecessary investigations and expenses.</span></li>
        <li><span><b>Family education.</b> We teach caregivers how to help at home and when to call us.</span></li>
      </ul>

      <h2 class="h-m" id="faq">Frequently asked questions</h2>
      <div>
        <details class="faq"><summary>Will I need to be admitted for chemotherapy?</summary><p>Chemotherapy is available in day care and as in-patient (IPD) treatment. Your doctor will tell you in advance which suits your treatment.</p></details>
        <details class="faq"><summary>What side effects should I expect?</summary><p>Side effects depend on the medicines used. Common ones include tiredness, nausea and a higher risk of infection. Most can be prevented or treated, and we explain what to watch for before each cycle.</p></details>
        <details class="faq"><summary>What should I eat during treatment?</summary><p>Good nutrition helps you tolerate treatment and recover. Our oncology dietitian gives each patient a personal plan.</p></details>
        <details class="faq"><summary>Can I continue working during treatment?</summary><p>Many patients do, with some adjustments. It depends on your treatment and how you feel, and your doctor can advise you.</p></details>
      </div>
    </div>
    <aside class="aside">{BOOKBOX}
      <div class="box"><h4 style="font-size:1rem">Related</h4><ul><li><a href="surgical-oncology.html">Surgical Oncology</a><span>→</span></li><li><a href="patient-care.html#nutrition">Oncology Nutrition</a><span>→</span></li><li><a href="doctors.html">Our Doctors</a><span>→</span></li></ul></div>
    </aside>
  </div></section>
  <section class="sec mist"><div class="wrap">
    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:end;gap:20px;margin-bottom:40px"><div class="stack"><span class="over">Our Oncologists</span><h2 class="h-l">Medical oncology team</h2></div><a class="arrow" href="doctors.html">All doctors</a></div>
    <div class="docs" id="team-docs" data-s="Medical Oncology"></div>
  </div></section>''', SUBNAV_JS)

# ---------------- RESEARCH ----------------
page('research.html', 'Cancer Research – Sunnah Hospital Cancer Research Center',
 'The Cancer Research Center at Sunnah Hospital: our research focus, initiatives and community cancer awareness.', 'research',
 phero('sh-lab', [('Home','index.html'),('Cancer Research','')], 'Cancer Research Center', 'Learning from every patient we treat, so that the next patient can be treated better.') + '''
  <section class="sec"><div class="wrap statement">
    <div class="stack rv"><span class="over">Introduction</span><h2 class="h-l">Research that begins at the bedside</h2></div>
    <div class="prose rv">
      <p class="big" style="font-size:clamp(1.3rem,2.6vw,1.8rem)">Research is part of our name because it is part of how we care. The questions our doctors study come from the <b>patients they see every day</b>.</p>
      <p>The Cancer Research Center at Sunnah Hospital supports careful record-keeping, review of treatment results and studies approved by the appropriate ethics committee. The aim is practical: earlier detection, better treatment decisions and better support for patients and families.</p>
    </div>
  </div></section>

  <section class="sec mist"><div class="wrap">
    <div class="stack rv" style="margin-bottom:44px"><span class="over">Initiatives</span><h2 class="h-l">Where we focus</h2></div>
    <div class="prog">
      <div class="pcard rv"><div class="ph" data-img="sh-lab"></div><h3>Clinical research</h3><p>Studying the results of surgical and medical cancer treatment, so that our own practice keeps improving.</p></div>
      <div class="pcard rv"><div class="ph" data-img="lab4"></div><h3>Cancer data &amp; registry</h3><p>Recording the types and stages of cancer we see, to understand the needs of our region.</p></div>
      <div class="pcard rv"><div class="ph" data-img="nurse-family"></div><h3>Awareness &amp; early detection</h3><p>Educating the community about warning signs and screening, because cancer found early is easier to treat.</p></div>
    </div>
    <p class="quiet" style="margin-top:28px">Details of approved research projects will be added once provided by the hospital.</p>
  </div></section>

  <section class="sec"><div class="wrap feature">
    <div class="ph rv" data-img="lab3"></div>
    <div class="stack rv">
      <span class="over">Ethics &amp; Patients</span>
      <h2 class="h-l">Patients come first in every study</h2>
      <ul class="checks">
        <li><span><b>Approved research only.</b> Every study is reviewed and approved before it begins.</span></li>
        <li><span><b>Consent is always yours.</b> Taking part is voluntary, and your treatment is never affected if you decline.</span></li>
        <li><span><b>Privacy is protected.</b> Patient information used in research is kept confidential.</span></li>
      </ul>
      <a class="btn btn-n" href="contact.html" style="justify-self:start">Contact the research team</a>
    </div>
  </div></section>''')

# ---------------- DEPARTMENTS ----------------
page('departments.html', 'Departments – Sunnah Hospital Cancer Research Center',
 'Departments at Sunnah Hospital – Cancer Research Center: surgical oncology, medical oncology, counselling, oncology nutrition, rehabilitation and cancer types treated.', 'care',
 phero('sh-corridor', [('Home','index.html'),('Departments','')], 'Departments', 'Clinical departments, diagnostics and support services that work together on every patient.') + '''
  <section class="sec"><div class="wrap">
    <div class="stack rv" style="margin-bottom:48px;max-width:720px"><span class="over">Clinical Departments</span><h2 class="h-l">Cancer treatment</h2></div>
    <div class="prog">
      <a class="pcard rv" href="surgical-oncology.html"><div class="ph" data-img="sh-ot-suite"></div><h3>Surgical Oncology</h3><p>Head &amp; neck, breast, gastrointestinal and gynecological cancer surgery.</p><span class="arrow">View department</span></a>
      <a class="pcard rv" href="medical-oncology.html"><div class="ph" data-img="sh-daycare"></div><h3>Medical Oncology</h3><p>Chemotherapy (day care &amp; IPD), targeted therapy, immunotherapy and palliative care.</p><span class="arrow">View department</span></a>
      <a class="pcard rv" href="research.html"><div class="ph" data-img="sh-lab"></div><h3>Cancer Research</h3><p>Clinical research, cancer data and community awareness.</p><span class="arrow">View department</span></a>
    </div>
  </div></section>

  <section class="sec mist" id="diagnostics"><div class="wrap feature">
    <div class="ph rv" data-img="sh-diagnostic" data-alt="Diagnostic imaging room"></div>
    <div class="stack rv">
      <span class="over">Diagnostics</span>
      <h2 class="h-l">Advanced diagnostics. <span class="hl">Trusted results.</span></h2>
      <p class="lead">Our diagnostic facilities provide accurate and reliable detection for a wide range of medical conditions.</p>
      <ul class="checks"><li><span><b>Digital X-Ray</b></span></li><li><span><b>Sonography</b></span></li><li><span><b>Pathology</b></span></li><li><span><b>Other diagnostic facilities</b></span></li></ul>
      <a class="btn btn-n" href="contact.html">Book a Test</a>
    </div>
  </div></section>

  <section class="sec"><div class="wrap">
    <div class="stack rv" style="margin-bottom:40px;max-width:720px"><span class="over">Comprehensive Cancer Care</span><h2 class="h-l">Compassionate care. <span class="hl">Stronger together.</span></h2></div>
    <div class="lgrid rv">
      <a href="patient-care.html#guidance"><span>Diagnosis to Recovery Support<small>From accurate diagnosis to treatment and recovery, we stand with you</small></span></a>
      <a href="patient-care.html#pain"><span>Pain Management<small>Advanced pain relief and palliative care for a better quality of life</small></span></a>
      <a href="patient-care.html#nutrition"><span>Nutritional Support<small>Personalised nutrition guidance for you and your family</small></span></a>
      <a href="patient-care.html#counselling"><span>Psychological Support<small>Emotional well-being for patients and their families</small></span></a>
      <a href="patient-care.html#rehab"><span>Recovery &amp; Rehabilitation<small>Post-treatment guidance and supportive care</small></span></a>
      <a href="infrastructure.html"><span>Day Care &amp; In-Patient Services<small>Dedicated male and female wards</small></span></a>
    </div>
  </div></section>

  <section class="sec mist" id="types"><div class="wrap">
    <div class="stack rv" style="margin-bottom:32px;max-width:720px"><span class="over">Cancer Types</span><h2 class="h-l">Conditions we see</h2><p class="lead">Search for a cancer type. If yours is not listed, our team will still guide you.</p></div>
    <div class="filter"><label for="q" style="position:absolute;left:-9999px">Search cancer types</label><input id="q" type="search" placeholder="Search, e.g. breast, mouth, stomach"></div>
    <div class="lgrid" id="az"></div>
    <p id="none" hidden style="color:var(--muted);padding:20px 0">No match found. <a href="contact.html">Ask our care team</a> for guidance.</p>
    <p class="quiet" style="margin-top:20px">The final list will be confirmed with the hospital.</p>
  </div></section>''',
 '''<script>
const types=[['Breast Cancer','Surgery and medical treatment'],['Oral (Mouth) Cancer','Head & neck'],['Throat Cancer','Head & neck'],['Thyroid Cancer','Head & neck'],['Lung Cancer','Medical oncology'],['Oesophageal (Food Pipe) Cancer','Gastrointestinal'],['Stomach Cancer','Gastrointestinal'],['Colon & Rectal Cancer','Gastrointestinal'],['Liver Cancer','Gastrointestinal'],['Pancreatic Cancer','Gastrointestinal'],['Gallbladder Cancer','Gastrointestinal'],['Cervical Cancer','Gynaecological'],['Ovarian Cancer','Gynaecological'],['Uterine Cancer','Gynaecological'],['Prostate Cancer','Urological'],['Kidney & Bladder Cancer','Urological'],['Lymphoma','Blood cancers'],['Leukaemia','Blood cancers'],['Skin Cancer','Surgery'],['Soft Tissue Tumours','Surgery']];
const az=document.getElementById('az'),q=document.getElementById('q'),none=document.getElementById('none');
function draw(){const t=q.value.toLowerCase().trim();const r=types.filter(([n,d])=>!t||(n+' '+d).toLowerCase().includes(t));az.innerHTML=r.map(([n,d])=>`<a href="contact.html"><span>${n}<small>${d}</small></span></a>`).join('');none.hidden=r.length>0;}
q.oninput=draw;draw();
</script>''')

# ---------------- INFRASTRUCTURE ----------------
page('infrastructure.html', 'Hospital Infrastructure – Sunnah Hospital',
 'Facilities and treatment spaces at Sunnah Hospital – Cancer Research Center: operation theatres, day-care chemotherapy, patient rooms and support services.', 'infrastructure',
 phero('sh-building', [('Home','index.html'),('Hospital Infrastructure','')], 'Hospital Infrastructure', 'Better Facilities. Better Care. Better Outcomes.') + '''
  <section class="sec"><div class="wrap statement">
    <div class="stack rv"><span class="over">Facilities Available</span><h2 class="h-l">Advanced infrastructure and compassionate care</h2></div>
    <div class="rv"><p class="lead">Everything needed for safe cancer treatment and comfortable recovery, in one hospital.</p>
      <ul class="checks fac"><li><span>Advanced ICU Support</span></li><li><span>High Dependency Unit (HDU)</span></li><li><span>Modular Operation Theatre (OT)</span></li><li><span>Minor OT for Procedures</span></li><li><span>24x7 Casualty &amp; Emergency Care</span></li><li><span>Pharmacy 24x7</span></li><li><span>Dedicated Male &amp; Female Wards</span></li></ul></div>
  </div></section>

  <section class="sec mist" style="padding-top:clamp(56px,8vw,90px)"><div class="wrap">
    <div class="stack rv" style="margin-bottom:40px"><span class="over">Hospital Gallery</span><h2 class="h-l">Inside Sunnah Hospital</h2></div>
    <div class="gal rv">
      <figure class="w2 h2"><div class="ph" data-img="sh-ot" data-alt="Modular operation theatre"></div><figcaption>Modular Operation Theatre<small>For cancer surgery</small></figcaption></figure>
      <figure><div class="ph" data-img="sh-minor-ot" data-alt="Minor OT"></div><figcaption>Minor OT<small>For procedures</small></figcaption></figure>
      <figure><div class="ph" data-img="sh-icu" data-alt="ICU"></div><figcaption>I.C.U<small>Advanced ICU support</small></figcaption></figure>
      <figure><div class="ph" data-img="sh-hdu" data-alt="HDU"></div><figcaption>H.D.U<small>High dependency unit</small></figcaption></figure>
      <figure><div class="ph" data-img="sh-casualty" data-alt="Casualty"></div><figcaption>Casualty<small>24x7 emergency care</small></figcaption></figure>
      <figure class="w2"><div class="ph" data-img="sh-pharmacy" data-alt="Pharmacy"></div><figcaption>Pharmacy<small>Open 24x7</small></figcaption></figure>
      <figure class="w2"><div class="ph" data-img="sh-building" data-alt="Hospital building"></div><figcaption>Sunnah Hospital<small>Ganga Nagar, Washim Bypass, Akola</small></figcaption></figure>
    </div>
  </div></section>

  <section class="sec"><div class="wrap feature">
    <div class="ph rv" data-img="sh-corridor"></div>
    <div class="stack rv">
      <span class="over">Patient Comfort</span>
      <h2 class="h-l">A calm place to heal</h2>
      <ul class="checks">
        <li><span><b>Dedicated male &amp; female wards.</b> Privacy and comfort during admission.</span></li>
        <li><span><b>Space for family.</b> An attendant can stay with the patient.</span></li>
        <li><span><b>Diet from our dietitian.</b> Personalised nutrition for patients in cancer treatment.</span></li>
        <li><span><b>Pharmacy 24x7.</b> Medicines available within the hospital at any hour.</span></li>
      </ul>
      <a class="btn btn-n" href="contact.html" style="justify-self:start">Plan your visit</a>
    </div>
  </div></section>''')

# ---------------- PATIENT CARE ----------------
page('patient-care.html', 'Patient Care & Support – Sunnah Hospital',
 'Patient care and support at Sunnah Hospital: treatment guidance, counselling, oncology nutrition, rehabilitation, lifestyle guidance and FAQs.', 'patient',
 phero('sh-corridor', [('Home','index.html'),('Patient Care & Support','')], 'Beyond cancer treatment', 'We support the patient, strengthen the family and guide them through every step of the journey.') + f'''
  <section class="sec"><div class="wrap statement">
    <div class="stack rv"><span class="over">Our Unique Approach</span><h2 class="h-l">Care for the patient and the family</h2></div>
    <div class="prose rv">
      <p class="big" style="font-size:clamp(1.3rem,2.6vw,1.8rem)">At Sunnah Hospital, we believe cancer care goes <b>beyond medical treatment</b>.</p>
      <p>A cancer diagnosis can bring fear, confusion and emotional stress to both patients and their families. Our commitment is to provide the right guidance, compassionate support and comprehensive care throughout their cancer journey.</p>
    </div>
  </div></section>

  <section class="sec mist"><div class="wrap">
    <div class="stack rv" style="margin-bottom:44px;max-width:760px"><span class="over">Integrated Patient Support</span><h2 class="h-l">Five ways we <span class="hl">support you</span></h2></div>
    {PILLARS2}
  </div></section>

  <section class="sec"><div class="wrap feature">
    <div class="ph tall rv" data-img="team3"></div>
    <div class="stack rv">
      <span class="over">Patient Guidance</span>
      <h2 class="h-l">Your first visit</h2>
      <div class="tl" style="margin-top:8px">
        <div><b>Before you come</b><span>Collect all reports, scans, biopsy slides and prescriptions. Book by phone, WhatsApp or the enquiry form.</span></div>
        <div><b>At the consultation</b><span>The doctor examines you, reviews your reports and explains the diagnosis and the options.</span></div>
        <div><b>Your plan</b><span>You receive a clear treatment plan and an estimate of costs. Only the tests that are needed are advised.</span></div>
        <div><b>Support begins</b><span>You meet our counsellor and dietitian, and you know whom to call with questions.</span></div>
      </div>
    </div>
  </div></section>

  <section class="sec mist" id="pain"><div class="wrap">
    <div class="stack rv" style="margin-bottom:34px"><span class="over">Comprehensive Cancer Care</span><h2 class="h-l">Compassionate care. Better every day.</h2></div>
    <div class="cols3 four">
      <div class="tcard rv"><h4>Diagnosis to Recovery Support</h4><p>From accurate diagnosis to treatment and recovery, we stand with you.</p></div>
      <div class="tcard rv"><h4>Pain Management</h4><p>Advanced pain relief and palliative care for a better quality of life.</p></div>
      <div class="tcard rv"><h4>Nutritional Support</h4><p>Personalised nutrition guidance and emotional support for you and your family.</p></div>
      <div class="tcard rv"><h4>Psychological Support</h4><p>Dedicated psychological care focused on emotional well-being for patients and their families.</p></div>
    </div>
  </div></section>

  <section class="sec"><div class="wrap">
    <div class="cols3">
      <div class="tcard rv"><h4>For families and caregivers</h4><p>We teach caregivers how to help with food, medicines and daily care at home, and when to contact the hospital.</p></div>
      <div class="tcard rv"><h4>During chemotherapy</h4><p>Our dietitian plans your nutrition, and our team advises on managing side effects between cycles.</p></div>
      <div class="tcard rv"><h4>After treatment</h4><p>Recovery guidance, regular check-ups and long-term lifestyle advice help you return to normal life.</p></div>
    </div>
  </div></section>

  <section class="sec" id="faqs"><div class="wrap narrow" style="margin-inline:auto">
    <div class="stack" style="margin-bottom:24px"><span class="over">FAQs</span><h2 class="h-l">Questions patients ask us</h2></div>
    <details class="faq"><summary>Do I need a referral to see a doctor?</summary><p>No. You can book an appointment directly.</p></details>
    <details class="faq"><summary>What should I bring to my first appointment?</summary><p>All medical reports, scans and biopsy slides if available, a list of current medicines, and a family member if possible.</p></details>
    <details class="faq"><summary>Can I get a second opinion?</summary><p>Yes. Bring or send your reports and our specialists will review them and explain their advice.</p></details>
    <details class="faq"><summary>How do you help with the cost of treatment?</summary><p>We aim to keep quality cancer care affordable. We explain the expected costs before treatment begins and advise only the investigations that are needed.</p></details>
    <details class="faq"><summary>Is treatment available under Ayushman Bharat (PM-JAY)?</summary><p>Yes. Cashless treatment is available for eligible patients under the Ayushman Bharat (PM-JAY) scheme. Bring your card and our team will guide you.</p></details>
    <details class="faq"><summary>Is counselling available for family members?</summary><p>Yes. Our counselling support is for patients and their families.</p></details>
    <details class="faq"><summary>Who will plan my diet during treatment?</summary><p>A dedicated oncology dietitian plans personalised nutrition during chemotherapy, after surgery and throughout recovery.</p></details>
  </div></section>
{PROMISE}''')

# ---------------- CONTACT ----------------
page('contact.html', 'Contact & Appointment – Sunnah Hospital',
 'Contact Sunnah Hospital – Cancer Research Center: appointment enquiry form, phone, WhatsApp, address and map.', 'contact',
 phero('sh-building', [('Home','index.html'),('Contact & Appointment','')], 'Contact &amp; Appointment', 'Send us an enquiry and our team will call you back. You can also reach us by phone or WhatsApp.') + '''
  <section class="sec"><div class="wrap two-col">
    <div>
      <div class="fcard"><h3>Request an appointment</h3><p>Share your details and our team will call you back.</p>
      <form class="form" id="f" novalidate>
        <div class="row"><label for="n">Patient name<input id="n" autocomplete="name" required></label><label for="p">Mobile number<input id="p" type="tel" autocomplete="tel" placeholder="+91" required></label></div>
        <div class="row"><label for="e">Email (optional)<input id="e" type="email" autocomplete="email"></label><label for="d">Preferred department<select id="d"><option>Not sure</option><option>Surgical Oncology</option><option>Medical Oncology</option><option>Counselling</option><option>Oncology Nutrition</option></select></label></div>
        <label for="m">Message (optional)<textarea id="m" rows="4" placeholder="Tell us briefly about the diagnosis or your question"></textarea></label>
        <div class="acts"><button class="btn btn-p" type="submit">Send Enquiry</button><a class="btn btn-w" id="wa" target="_blank" rel="noopener" href="https://wa.me/919923542674">Send on WhatsApp</a></div>
        <p class="note" id="msg" hidden></p>
      </form></div>
    </div>
    <aside class="aside" style="position:static">
      <div class="cinfo">
        <div><i><svg><use href="#i-ph"/></svg></i><small>Phone</small><b>+91 99235 42674<br>+91 98507 60773</b></div>
        <div><i><svg><use href="#i-wa"/></svg></i><small>WhatsApp</small><b>+91 99235 42674</b></div>
        <div><i><svg><use href="#i-mail"/></svg></i><small>Email</small><b>drhakimakola@gmail.com</b></div>
        <div><i><svg><use href="#i-pin"/></svg></i><small>Address</small><span>Sunnah Hospital – Cancer Research Center, Ganga Nagar, Washim Bypass, Akola, Maharashtra 444002</span></div>
        <div><i><svg><use href="#i-clock"/></svg></i><small>Emergency</small><span>24x7 Casualty &amp; Emergency Care</span></div>
      </div>
    </aside>
  </div></section>
  <section class="sec mist" style="padding-top:clamp(48px,7vw,80px)"><div class="wrap">
    <div class="stack" style="margin-bottom:26px"><span class="over">Location</span><h2 class="h-l">Find us</h2></div>
    <div class="map" style="background-image:linear-gradient(rgba(0,37,54,.35),rgba(0,37,54,.35)),url('assets/img/sh-building.jpg');background-size:cover;background-position:center"><div><b>Sunnah Hospital – Cancer Research Center</b><span style="color:var(--muted);font-size:.9rem">Ganga Nagar, Washim Bypass, Akola 444002</span><a class="btn btn-n" href="https://www.google.com/maps/search/?api=1&query=Sunnah+Hospital+Ganga+Nagar+Washim+Bypass+Akola" target="_blank" rel="noopener">Get Directions</a></div></div>
  </div></section>''',
 '''<script>
const $=i=>document.getElementById(i),v=i=>$(i).value.trim();
function upd(){$('wa').href='https://wa.me/919923542674?text='+encodeURIComponent(`Hello Sunnah Hospital, I would like an appointment.\\nPatient: ${v('n')||'-'}\\nMobile: ${v('p')||'-'}\\nDepartment: ${v('d')}\\nMessage: ${v('m')||'-'}`);}
$('f').addEventListener('input',upd);upd();
$('f').onsubmit=e=>{e.preventDefault();const m=$('msg');m.hidden=false;m.textContent=(!v('n')||!v('p'))?'Please enter the patient name and mobile number.':`Thank you, ${v('n')}. On the live WordPress site this enquiry will be emailed to the hospital. For now, use "Send on WhatsApp".`;};
</script>''')
print('built')
