/* Sunnah Cancer Research Center – site behaviour (menu, search boxes, doctor filter). */
(function () {
  var B = (window.SUNNAH_CRC && window.SUNNAH_CRC.home) || '/';

  // Mobile menu
  var btn = document.getElementById('burger'), drawer = document.getElementById('drawer');
  if (btn && drawer) {
    btn.addEventListener('click', function () {
      drawer.hidden = !drawer.hidden;
      btn.setAttribute('aria-expanded', String(!drawer.hidden));
    });
  }

  // Search-as-you-type boxes
  var types = [['Breast Cancer','surgical-oncology/'],['Oral (Mouth) Cancer','surgical-oncology/'],['Throat Cancer','surgical-oncology/'],['Thyroid Cancer','surgical-oncology/'],['Oesophageal (Food Pipe) Cancer','cancer-care/#types'],['Stomach Cancer','surgical-oncology/'],['Colon & Rectal Cancer','surgical-oncology/'],['Liver Cancer','cancer-care/#types'],['Pancreatic Cancer','cancer-care/#types'],['Gallbladder Cancer','cancer-care/#types'],['Cervical Cancer','surgical-oncology/'],['Ovarian Cancer','surgical-oncology/'],['Uterine Cancer','surgical-oncology/'],['Lung Cancer','medical-oncology/'],['Lymphoma','medical-oncology/'],['Leukaemia','medical-oncology/'],['Prostate Cancer','cancer-care/#types'],['Kidney & Bladder Cancer','cancer-care/#types']];
  var treats = [['Head & Neck Cancer Surgery','surgical-oncology/'],['Breast Cancer Surgery','surgical-oncology/'],['Gastrointestinal Cancer Surgery','surgical-oncology/'],['Gynecological Cancer Surgery','surgical-oncology/'],['Chemotherapy (Day Care & IPD)','medical-oncology/'],['Targeted Therapy','medical-oncology/'],['Immunotherapy','medical-oncology/'],['Supportive & Palliative Care','medical-oncology/'],['Digital X-Ray','cancer-care/#diagnostics'],['Sonography','cancer-care/#diagnostics'],['Pathology','cancer-care/#diagnostics'],['Pain Management','patient-care/#pain'],['Counselling','patient-care/#counselling'],['Nutrition','patient-care/#nutrition']];
  function esc(s) { return s.replace(/&/g, '&amp;').replace(/</g, '&lt;'); }
  function hook(inputId, boxId, list) {
    var i = document.getElementById(inputId), r = document.getElementById(boxId);
    if (!i || !r) return;
    i.addEventListener('input', function () {
      var t = i.value.trim().toLowerCase();
      if (!t) { r.hidden = true; return; }
      var m = list.filter(function (x) { return x[0].toLowerCase().indexOf(t) > -1; }).slice(0, 6);
      r.innerHTML = m.length
        ? m.map(function (x) { return '<a href="' + B + x[1] + '">' + esc(x[0]) + '</a>'; }).join('')
        : '<a href="' + B + 'contact/#enquiry">No match. Ask our care team →</a>';
      r.hidden = false;
    });
  }
  hook('q', 'sres', types);
  hook('q2', 'sres2', treats);

  // Cancer types list filter (Cancer Care page)
  var tf = document.getElementById('typefilter'), tl = document.getElementById('typelist'), tn = document.getElementById('typenone');
  if (tf && tl) {
    tf.addEventListener('input', function () {
      var t = tf.value.trim().toLowerCase(), shown = 0;
      Array.prototype.forEach.call(tl.children, function (li) {
        var ok = !t || li.textContent.toLowerCase().indexOf(t) > -1;
        li.hidden = !ok; if (ok) shown++;
      });
      if (tn) tn.hidden = shown > 0;
    });
  }

  // Doctor speciality filter (Doctors page)
  var chips = document.querySelectorAll('[data-filter]'), docs = document.querySelectorAll('[data-spec]');
  Array.prototype.forEach.call(chips, function (c) {
    c.addEventListener('click', function () {
      var f = c.getAttribute('data-filter');
      Array.prototype.forEach.call(chips, function (o) { o.setAttribute('aria-pressed', String(o === c)); });
      Array.prototype.forEach.call(docs, function (d) { d.hidden = f !== 'all' && d.getAttribute('data-spec') !== f; });
    });
  });
})();
