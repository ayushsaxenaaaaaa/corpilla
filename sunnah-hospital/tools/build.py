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
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
<link rel="stylesheet" href="assets/site.css">
</head>
<body data-page="{key}">
<main>
{body}
</main>
<script src="assets/site.js"></script>
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

PILLARS = '''<div class="pillars">
      <div class="pillar" id="guidance"><h3>Right Guidance</h3><p>Treatment navigation and help with informed decisions, including guidance to avoid unnecessary investigations and expenses.</p></div>
      <div class="pillar" id="counselling"><h3>Psychological Support</h3><p>Professional counselling and emotional support for patients and their families.</p></div>
      <div class="pillar" id="nutrition"><h3>Specialized Nutrition</h3><p>A dedicated oncology dietitian for personalised nutrition during chemotherapy, after surgery and throughout recovery.</p></div>
      <div class="pillar" id="rehab"><h3>Recovery &amp; Rehabilitation</h3><p>Post-treatment recovery guidance and supportive care.</p></div>
      <div class="pillar" id="wellness"><h3>Lifestyle &amp; Wellness</h3><p>Long-term nutrition, lifestyle guidance and family education.</p></div>
    </div>'''

PROMISE = '''  <section class="promise"><div class="wrap">
    <span class="over">Our Promise</span>
    <p class="line">We don't just treat cancer. We <b>support the patient</b>, <b>strengthen the family</b> and guide them through every step of the journey.</p>
    <div class="tri"><span>Right Treatment</span><span>Right Guidance</span><span>Compassionate Care</span></div>
  </div></section>'''

BOOKBOX = '''<div class="box navy"><h4>Book a consultation</h4><p>Share your details and our team will call you back.</p><a class="btn btn-p" href="contact.html">Book Appointment</a><a class="btn btn-w" href="https://wa.me/910000000000" target="_blank" rel="noopener">WhatsApp Us</a></div>'''

# ---------------- HOME ----------------
page('index.html', 'Sunnah Hospital – Cancer Research Center | Surgical & Medical Cancer Center',
 'Sunnah Hospital – Cancer Research Center is a Surgical & Medical Cancer Center offering cancer surgery, chemotherapy, counselling, oncology nutrition and recovery support. Hope, Healing, Humanity.', 'home', f'''
  <section class="hero2">
    <div class="ph" data-img="hero-surgery" data-eager="1" data-alt="Cancer surgeons operating at Sunnah Hospital"></div>
    <div class="wrap"><div class="card">
      <div class="motto">HOPE <i></i> HEALING <i></i> HUMANITY</div>
      <h1>Cancer care that goes <em>beyond</em> treatment.</h1>
      <p>Sunnah Hospital is a Surgical &amp; Medical Cancer Center. We treat the disease, and we guide and support patients and their families through every step of the journey.</p>
      <div class="ctas"><a class="btn btn-p" href="contact.html">Book an Appointment</a><a class="btn btn-w" href="https://wa.me/910000000000" target="_blank" rel="noopener">WhatsApp Us</a></div>
    </div></div>
  </section>
  <div class="tiles"><div class="wrap">
    <a href="contact.html"><b>Request an Appointment</b><span>Our team will call you back</span></a>
    <a href="doctors.html"><b>Find a Doctor</b><span>Surgeons, oncologists and specialists</span></a>
    <a href="patient-care.html"><b>Patient Support</b><span>Guidance, counselling and nutrition</span></a>
    <a href="departments.html#types"><b>Cancer Types</b><span>Conditions we treat</span></a>
  </div></div>

  <section class="sec"><div class="wrap statement">
    <div class="stack rv"><span class="over">Welcome to Sunnah Hospital</span><h2 class="h-l">A cancer diagnosis changes everything. The right care makes the difference.</h2></div>
    <div class="stack rv">
      <p class="big">A cancer diagnosis can bring <b>fear, confusion and emotional stress</b> to patients and to their families. Our commitment is to provide the <span>right guidance, compassionate support and comprehensive care</span> throughout the cancer journey.</p>
      <a class="arrow" href="about.html">About Sunnah Hospital</a>
    </div>
  </div></section>

  <section class="sec mist"><div class="wrap">
    <div class="stack rv" style="margin-bottom:48px;max-width:720px"><span class="over">Cancer Care</span><h2 class="h-l">Specialised care under one roof</h2></div>
    <div class="prog">
      <a class="pcard rv" href="surgical-oncology.html"><div class="ph" data-img="ot-team" data-alt="Cancer surgery in progress"></div><h3>Surgical Oncology</h3><p>Cancer surgery planned with care, aimed at removing the disease while protecting the patient's quality of life.</p><span class="arrow">Surgical Oncology</span></a>
      <a class="pcard rv" href="medical-oncology.html"><div class="ph" data-img="consult" data-alt="Nurse caring for a patient"></div><h3>Medical Oncology</h3><p>Chemotherapy and other medical cancer treatments, given with close monitoring and nutritional support.</p><span class="arrow">Medical Oncology</span></a>
      <a class="pcard rv" href="research.html"><div class="ph" data-img="lab1" data-alt="Laboratory research"></div><h3>Cancer Research</h3><p>Our research centre works to improve how cancer is understood, detected and treated in our community.</p><span class="arrow">Cancer Research</span></a>
    </div>
  </div></section>

  <section class="sec"><div class="wrap">
    <div class="statement" style="margin-bottom:48px">
      <div class="stack rv"><span class="over">Our Unique Approach</span><h2 class="h-l">Beyond cancer treatment</h2></div>
      <p class="lead rv" style="align-self:end">At Sunnah Hospital, we believe cancer care goes beyond medical treatment. Along with specialised Surgical &amp; Medical Oncology, our integrated patient-support approach focuses on five areas.</p>
    </div>
    <div class="rv">{PILLARS}</div>
    <div style="margin-top:36px"><a class="arrow" href="patient-care.html">Patient Care &amp; Support</a></div>
  </div></section>

{PROMISE}

  <section class="sec"><div class="wrap">
    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:end;gap:20px;margin-bottom:44px" class="rv">
      <div class="stack" style="max-width:640px"><span class="over">Doctors &amp; Specialists</span><h2 class="h-l">The team that will care for you</h2></div>
      <a class="arrow" href="doctors.html">All doctors</a>
    </div>
    <div class="docs" id="homeDocs"></div>
  </div></section>

  <section class="sec mist"><div class="wrap feature">
    <div class="ph rv" data-img="building" data-alt="Sunnah Hospital building"></div>
    <div class="stack rv">
      <span class="over">Hospital Infrastructure</span>
      <h2 class="h-l">Facilities designed around cancer care</h2>
      <p class="lead">Operation theatres, a day-care chemotherapy unit, in-patient rooms and support services, all in one place, so patients are not sent from one centre to another.</p>
      <a class="btn btn-n" href="infrastructure.html" style="justify-self:start">See our facilities</a>
    </div>
  </div></section>

  <section class="sec"><div class="wrap feature rev">
    <div class="ph tall rv" data-img="consult" data-alt="Doctor speaking with a patient"></div>
    <div class="stack rv">
      <span class="over">Appointments</span>
      <h2 class="h-l">Talk to our cancer care team</h2>
      <p class="lead">Whether you have just been diagnosed, are looking for a second opinion or are already in treatment, we will guide you to the right specialist.</p>
      <ul class="checks">
        <li><span><b>Bring your reports.</b> Biopsy, scans and prescriptions help the doctor advise you in the first visit.</span></li>
        <li><span><b>Bring a family member.</b> Decisions are easier when the family hears the plan together.</span></li>
        <li><span><b>Ask every question.</b> We take the time to explain the options and the costs.</span></li>
      </ul>
      <div style="display:flex;flex-wrap:wrap;gap:12px"><a class="btn btn-n" href="contact.html">Book an Appointment</a><a class="btn btn-w" href="https://wa.me/910000000000" target="_blank" rel="noopener">WhatsApp Us</a></div>
    </div>
  </div></section>''',
 '<script src="assets/doctors.js"></script>\n<script>SHD.render(document.getElementById(\'homeDocs\'), SHD.list.slice(0,4));</script>')

# ---------------- ABOUT ----------------
page('about.html', 'About Us – Sunnah Hospital Cancer Research Center',
 'About Sunnah Hospital – Cancer Research Center: our profile, vision, mission and values of Hope, Healing and Humanity.', 'about',
 phero('team1', [('Home','index.html'),('About Us','')], 'About Sunnah Hospital', 'A Surgical &amp; Medical Cancer Center built on three values: Hope, Healing and Humanity.') + f'''
  <section class="sec"><div class="wrap statement">
    <div class="stack rv"><span class="over">Hospital Profile</span><h2 class="h-l">Who we are</h2></div>
    <div class="prose rv">
      <p class="big" style="font-size:clamp(1.3rem,2.6vw,1.8rem)">Sunnah Hospital – Cancer Research Center is dedicated to the care of people with cancer, bringing <b>Surgical Oncology</b>, <b>Medical Oncology</b> and <b>cancer research</b> together in one hospital.</p>
      <p>We know that a cancer diagnosis affects the whole family. Patients need skilled treatment, and they also need honest guidance, emotional support, the right nutrition and help with recovery. Our hospital is organised to provide all of these together.</p>
      <p>Every patient is treated as an individual. Our doctors take time to explain the diagnosis and the choices available, so that families can decide with confidence.</p>
    </div>
  </div></section>

  <section class="sec mist"><div class="wrap">
    <div class="cols3" style="gap:40px">
      <div class="tcard rv" style="grid-column:span 1"><span class="over">Vision</span><h3 class="h-m">To be a trusted centre for cancer care and research, where every patient is treated with skill and dignity.</h3></div>
      <div class="tcard rv" style="grid-column:1/-1;max-width:none"><span class="over">Mission</span>
        <ul class="checks" style="margin-top:6px">
          <li><span>To provide specialised surgical and medical cancer treatment based on sound medical evidence.</span></li>
          <li><span>To guide patients and families honestly, and to help them avoid unnecessary investigations and expenses.</span></li>
          <li><span>To care for the whole person through counselling, nutrition, rehabilitation and family education.</span></li>
          <li><span>To contribute to cancer research and awareness in the community we serve.</span></li>
        </ul>
      </div>
    </div>
  </div></section>

  <section class="sec"><div class="wrap">
    <div class="stack rv" style="margin-bottom:40px"><span class="over">Our Values</span><h2 class="h-l">Hope. Healing. Humanity.</h2></div>
    <div class="values3 rv">
      <div><h3>HOPE</h3><p>We meet every patient with honesty and optimism. Whatever the stage of illness, there is always something we can do to help.</p></div>
      <div><h3>HEALING</h3><p>Healing means more than treating a tumour. It includes the body, the mind and the family around the patient.</p></div>
      <div><h3>HUMANITY</h3><p>Every person who comes to us is treated with respect, compassion and dignity.</p></div>
    </div>
  </div></section>

  <section class="sec mist"><div class="wrap">
    <div class="statement" style="margin-bottom:48px">
      <div class="stack rv"><span class="over">Our Unique Approach</span><h2 class="h-l">Beyond cancer treatment</h2></div>
      <p class="lead rv" style="align-self:end">Along with specialised Surgical &amp; Medical Oncology, our integrated patient-support approach focuses on five areas.</p>
    </div>
    <div class="rv">{PILLARS}</div>
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
 phero('ot-team', [('Home','index.html'),('Cancer Care','departments.html'),('Surgical Oncology','')], 'Surgical Oncology', 'Cancer surgery that aims to remove the disease completely while protecting how you live afterwards.',
  '\n      <div style="display:flex;flex-wrap:wrap;gap:12px"><a class="btn btn-p" href="contact.html">Book a Consultation</a><a class="btn btn-o" href="https://wa.me/910000000000" target="_blank" rel="noopener">WhatsApp Your Reports</a></div>') + f'''
  <nav class="subnav" aria-label="On this page"><div class="wrap">
    <a href="#overview" class="on">Overview</a><a href="#services">Services</a><a href="#journey">What to Expect</a><a href="#support">Support</a><a href="#faq">FAQs</a>
  </div></nav>
  <section class="sec"><div class="wrap two-col">
    <div class="prose">
      <span class="over" id="overview">Overview</span>
      <h2 class="h-l" style="margin:0">Surgery planned around the whole patient</h2>
      <p>For many cancers, surgery offers the best chance of cure. A surgical oncologist is a surgeon specially trained to operate on cancer: to remove the tumour with a safe margin, to examine the nearby lymph nodes, and to preserve as much normal function as possible.</p>
      <p>At Sunnah Hospital, surgery is never planned alone. Our surgical and medical oncology teams decide together whether surgery should come first, or after chemotherapy, and what further treatment may be needed.</p>

      <h2 class="h-m" id="services">Surgical services</h2>
      <div class="cols3">
        <div class="tcard"><h4>Breast cancer surgery</h4><p>Breast-conserving surgery where suitable, and mastectomy when needed.</p></div>
        <div class="tcard"><h4>Head &amp; neck cancer surgery</h4><p>Surgery for cancers of the mouth, throat and thyroid.</p></div>
        <div class="tcard"><h4>Gastrointestinal cancer surgery</h4><p>Surgery for cancers of the stomach, colon, rectum and related organs.</p></div>
        <div class="tcard"><h4>Gynaecological cancer surgery</h4><p>Surgery for cancers of the cervix, ovary and uterus.</p></div>
        <div class="tcard"><h4>Biopsies &amp; diagnostic procedures</h4><p>Tissue sampling to confirm the diagnosis and plan treatment.</p></div>
        <div class="tcard"><h4>Supportive procedures</h4><p>Procedures that relieve symptoms and make treatment easier.</p></div>
      </div>
      <p class="quiet">The list of procedures will be confirmed with the hospital's surgical team.</p>

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
 phero('consult', [('Home','index.html'),('Cancer Care','departments.html'),('Medical Oncology','')], 'Medical Oncology', 'Chemotherapy and other medical cancer treatments, given with close monitoring and steady support.',
  '\n      <div style="display:flex;flex-wrap:wrap;gap:12px"><a class="btn btn-p" href="contact.html">Book a Consultation</a><a class="btn btn-o" href="https://wa.me/910000000000" target="_blank" rel="noopener">WhatsApp Your Reports</a></div>') + f'''
  <nav class="subnav" aria-label="On this page"><div class="wrap">
    <a href="#overview" class="on">Overview</a><a href="#services">Treatments</a><a href="#journey">What to Expect</a><a href="#support">Support</a><a href="#faq">FAQs</a>
  </div></nav>
  <section class="sec"><div class="wrap two-col">
    <div class="prose">
      <span class="over" id="overview">Overview</span>
      <h2 class="h-l" style="margin:0">Treatment with medicines, chosen for you</h2>
      <p>Medical oncology is the treatment of cancer with medicines. Depending on the type and stage of cancer, these may be used to shrink a tumour before surgery, to lower the chance of the cancer returning after surgery, or to control the disease and relieve symptoms.</p>
      <p>Our medical oncologists choose the treatment based on your diagnosis, your general health and your own wishes, and they explain the expected benefits and side effects before anything begins.</p>

      <h2 class="h-m" id="services">Available treatments</h2>
      <div class="cols3">
        <div class="tcard"><h4>Chemotherapy</h4><p>Medicines that destroy cancer cells, given in planned cycles in our day-care unit.</p></div>
        <div class="tcard"><h4>Targeted therapy</h4><p>Medicines that act on specific features of cancer cells, where tests show they will help.</p></div>
        <div class="tcard"><h4>Immunotherapy</h4><p>Treatment that helps the body's own immune system fight the cancer.</p></div>
        <div class="tcard"><h4>Hormone therapy</h4><p>Used for cancers such as breast and prostate cancer that respond to hormones.</p></div>
        <div class="tcard"><h4>Supportive care</h4><p>Treatment of pain, nausea, infection and other symptoms during therapy.</p></div>
        <div class="tcard"><h4>Follow-up care</h4><p>Regular reviews after treatment to monitor recovery and detect problems early.</p></div>
      </div>
      <p class="quiet">The list of treatments will be confirmed with the hospital's medical oncology team.</p>

      <h2 class="h-m" id="journey">What to expect</h2>
      <div class="tl">
        <div><b>Consultation</b><span>The oncologist reviews your reports and explains the diagnosis and the treatment options.</span></div>
        <div><b>Treatment plan</b><span>You receive a written plan with the medicines, the number of cycles and the likely costs.</span></div>
        <div><b>Day-care treatment</b><span>Most chemotherapy is given in our day-care unit, and you go home the same day.</span></div>
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
        <details class="faq"><summary>Will I need to be admitted for chemotherapy?</summary><p>Most chemotherapy is given as a day-care treatment. Some schedules need a short admission, and your doctor will tell you in advance.</p></details>
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
 phero('lab1', [('Home','index.html'),('Cancer Research','')], 'Cancer Research Center', 'Learning from every patient we treat, so that the next patient can be treated better.') + '''
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
      <div class="pcard rv"><div class="ph" data-img="lab2"></div><h3>Clinical research</h3><p>Studying the results of surgical and medical cancer treatment, so that our own practice keeps improving.</p></div>
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
 phero('team2', [('Home','index.html'),('Departments','')], 'Departments', 'Clinical departments and support services that work together on every patient.') + '''
  <section class="sec"><div class="wrap">
    <div class="stack rv" style="margin-bottom:48px;max-width:720px"><span class="over">Clinical Departments</span><h2 class="h-l">Cancer treatment</h2></div>
    <div class="prog">
      <a class="pcard rv" href="surgical-oncology.html"><div class="ph" data-img="ot-team"></div><h3>Surgical Oncology</h3><p>Cancer surgery, biopsies and supportive procedures.</p><span class="arrow">View department</span></a>
      <a class="pcard rv" href="medical-oncology.html"><div class="ph" data-img="consult"></div><h3>Medical Oncology</h3><p>Chemotherapy, targeted therapy, immunotherapy and supportive care.</p><span class="arrow">View department</span></a>
      <a class="pcard rv" href="research.html"><div class="ph" data-img="lab1"></div><h3>Cancer Research</h3><p>Clinical research, cancer data and community awareness.</p><span class="arrow">View department</span></a>
    </div>
  </div></section>

  <section class="sec mist"><div class="wrap">
    <div class="stack rv" style="margin-bottom:40px;max-width:720px"><span class="over">Support Services</span><h2 class="h-l">Care around the treatment</h2></div>
    <div class="lgrid rv">
      <a href="patient-care.html#guidance"><span>Patient Guidance<small>Treatment navigation and informed decisions</small></span></a>
      <a href="patient-care.html#counselling"><span>Psycho-Oncology &amp; Counselling<small>Support for patients and families</small></span></a>
      <a href="patient-care.html#nutrition"><span>Oncology Nutrition<small>Dedicated oncology dietitian</small></span></a>
      <a href="patient-care.html#rehab"><span>Recovery &amp; Rehabilitation<small>Post-treatment guidance</small></span></a>
      <a href="patient-care.html#wellness"><span>Lifestyle &amp; Wellness<small>Long-term health and family education</small></span></a>
      <a href="infrastructure.html"><span>Day-Care &amp; In-Patient Services<small>Chemotherapy unit and patient rooms</small></span></a>
    </div>
  </div></section>

  <section class="sec" id="types"><div class="wrap">
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
 phero('building', [('Home','index.html'),('Hospital Infrastructure','')], 'Hospital Infrastructure', 'Treatment spaces designed for cancer care, and for the comfort of patients and their families.') + '''
  <section class="sec"><div class="wrap statement">
    <div class="stack rv"><span class="over">Facilities</span><h2 class="h-l">Everything a cancer patient needs, in one place</h2></div>
    <p class="lead rv" style="align-self:end">Consultation, surgery, chemotherapy, in-patient care and support services are located together, so that patients and families do not have to travel between centres during treatment.</p>
  </div></section>

  <section class="sec mist" style="padding-top:clamp(56px,8vw,90px)"><div class="wrap">
    <div class="stack rv" style="margin-bottom:40px"><span class="over">Hospital Gallery</span><h2 class="h-l">Inside Sunnah Hospital</h2></div>
    <div class="gal rv">
      <figure class="w2 h2"><div class="ph" data-img="ot-team" data-w="1200"></div><figcaption>Operation Theatres<small>Equipped for cancer surgery</small></figcaption></figure>
      <figure><div class="ph" data-img="mri"></div><figcaption>Imaging &amp; Diagnostics<small>Comfortable treatment bays</small></figcaption></figure>
      <figure><div class="ph" data-img="otroom"></div><figcaption>Patient Rooms<small>With space for an attendant</small></figcaption></figure>
      <figure><div class="ph" data-img="monitor"></div><figcaption>Intensive Care<small>Round-the-clock monitoring</small></figcaption></figure>
      <figure><div class="ph" data-img="team3"></div><figcaption>Consultation Rooms<small>Private out-patient clinics</small></figcaption></figure>
      <figure class="w2"><div class="ph" data-img="lab1" data-w="1200"></div><figcaption>Laboratory &amp; Diagnostics<small>Tests that guide treatment</small></figcaption></figure>
      <figure class="w2"><div class="ph" data-img="care-hands" data-w="1200"></div><figcaption>Counselling &amp; Nutrition Clinic<small>Support for patients and families</small></figcaption></figure>
    </div>
    <p class="quiet" style="margin-top:20px">Sample images. They will be replaced with photographs of the hospital, and the facility list confirmed.</p>
  </div></section>

  <section class="sec"><div class="wrap feature">
    <div class="ph rv" data-img="otroom"></div>
    <div class="stack rv">
      <span class="over">Patient Comfort</span>
      <h2 class="h-l">A calm place to heal</h2>
      <ul class="checks">
        <li><span><b>Clean, safe wards.</b> Infection prevention is a priority for patients in treatment.</span></li>
        <li><span><b>Space for family.</b> An attendant can stay with the patient.</span></li>
        <li><span><b>Diet from our dietitian.</b> Meals planned for patients in cancer treatment.</span></li>
        <li><span><b>Pharmacy on site.</b> Cancer medicines available within the hospital.</span></li>
      </ul>
      <a class="btn btn-n" href="contact.html" style="justify-self:start">Plan your visit</a>
    </div>
  </div></section>''')

# ---------------- PATIENT CARE ----------------
page('patient-care.html', 'Patient Care & Support – Sunnah Hospital',
 'Patient care and support at Sunnah Hospital: treatment guidance, counselling, oncology nutrition, rehabilitation, lifestyle guidance and FAQs.', 'patient',
 phero('team4', [('Home','index.html'),('Patient Care & Support','')], 'Beyond cancer treatment', 'We support the patient, strengthen the family and guide them through every step of the journey.') + f'''
  <section class="sec"><div class="wrap statement">
    <div class="stack rv"><span class="over">Our Unique Approach</span><h2 class="h-l">Care for the patient and the family</h2></div>
    <div class="prose rv">
      <p class="big" style="font-size:clamp(1.3rem,2.6vw,1.8rem)">At Sunnah Hospital, we believe cancer care goes <b>beyond medical treatment</b>.</p>
      <p>A cancer diagnosis can bring fear, confusion and emotional stress to both patients and their families. Our commitment is to provide the right guidance, compassionate support and comprehensive care throughout their cancer journey.</p>
    </div>
  </div></section>

  <section class="sec mist"><div class="wrap">
    <div class="stack rv" style="margin-bottom:44px;max-width:760px"><span class="over">Integrated Patient Support</span><h2 class="h-l">Five ways we support you</h2></div>
    <div class="rv">{PILLARS}</div>
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

  <section class="sec mist"><div class="wrap">
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
    <details class="faq"><summary>How do you help with the cost of treatment?</summary><p>We explain the expected costs before treatment begins, and we advise only the investigations that are needed.</p></details>
    <details class="faq"><summary>Is counselling available for family members?</summary><p>Yes. Our counselling support is for patients and their families.</p></details>
    <details class="faq"><summary>Who will plan my diet during treatment?</summary><p>A dedicated oncology dietitian plans personalised nutrition during chemotherapy, after surgery and throughout recovery.</p></details>
  </div></section>
{PROMISE}''')

# ---------------- CONTACT ----------------
page('contact.html', 'Contact & Appointment – Sunnah Hospital',
 'Contact Sunnah Hospital – Cancer Research Center: appointment enquiry form, phone, WhatsApp, address and map.', 'contact',
 phero('team2', [('Home','index.html'),('Contact & Appointment','')], 'Contact &amp; Appointment', 'Send us an enquiry and our team will call you back. You can also reach us by phone or WhatsApp.') + '''
  <section class="sec"><div class="wrap two-col">
    <div>
      <div class="stack" style="margin-bottom:26px"><span class="over">Appointment Enquiry</span><h2 class="h-l">Request an appointment</h2></div>
      <form class="form" id="f" novalidate>
        <div class="row"><label for="n">Patient name<input id="n" autocomplete="name" required></label><label for="p">Mobile number<input id="p" type="tel" autocomplete="tel" placeholder="+91" required></label></div>
        <div class="row"><label for="e">Email (optional)<input id="e" type="email" autocomplete="email"></label><label for="d">Preferred department<select id="d"><option>Not sure</option><option>Surgical Oncology</option><option>Medical Oncology</option><option>Counselling</option><option>Oncology Nutrition</option></select></label></div>
        <label for="m">Message (optional)<textarea id="m" rows="4" placeholder="Tell us briefly about the diagnosis or your question"></textarea></label>
        <div class="acts"><button class="btn btn-n" type="submit">Send Enquiry</button><a class="btn btn-w" id="wa" target="_blank" rel="noopener" href="https://wa.me/910000000000">Send on WhatsApp</a></div>
        <p class="note" id="msg" hidden></p>
      </form>
    </div>
    <aside class="aside" style="position:static">
      <div class="cinfo">
        <div><small>Phone</small><b>+91 00000 00000</b></div>
        <div><small>WhatsApp</small><b>+91 00000 00000</b></div>
        <div><small>Email</small><b>info@example.com</b></div>
        <div><small>Address</small><span>Sunnah Hospital – Cancer Research Center<br>Address line, City, State – PIN</span></div>
        <div><small>OPD Timings</small><span>Monday to Saturday, 9:00 am – 5:00 pm</span></div>
      </div>
    </aside>
  </div></section>
  <section class="sec mist" style="padding-top:clamp(48px,7vw,80px)"><div class="wrap">
    <div class="stack" style="margin-bottom:26px"><span class="over">Location</span><h2 class="h-l">Find us</h2></div>
    <div class="map"><div><b>Sunnah Hospital – Cancer Research Center</b><span style="color:var(--muted);font-size:.9rem">Address line, City, State</span><a class="btn btn-n" href="https://www.google.com/maps" target="_blank" rel="noopener">Open in Google Maps</a></div></div>
    <p class="quiet" style="margin-top:14px">The live Google Map will be embedded here once the address is confirmed.</p>
  </div></section>''',
 '''<script>
const $=i=>document.getElementById(i),v=i=>$(i).value.trim();
function upd(){$('wa').href='https://wa.me/910000000000?text='+encodeURIComponent(`Hello Sunnah Hospital, I would like an appointment.\\nPatient: ${v('n')||'-'}\\nMobile: ${v('p')||'-'}\\nDepartment: ${v('d')}\\nMessage: ${v('m')||'-'}`);}
$('f').addEventListener('input',upd);upd();
$('f').onsubmit=e=>{e.preventDefault();const m=$('msg');m.hidden=false;m.textContent=(!v('n')||!v('p'))?'Please enter the patient name and mobile number.':`Thank you, ${v('n')}. On the live WordPress site this enquiry will be emailed to the hospital. For now, use "Send on WhatsApp".`;};
</script>''')
print('built')
