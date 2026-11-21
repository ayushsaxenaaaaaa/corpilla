/* Sunnah Hospital – Cancer Research Centre: site behaviour (menu, home slider, department finder, doctor filter). */
(function () {
  // Mobile menu
  var btn = document.getElementById('burger'), drawer = document.getElementById('drawer');
  if (btn && drawer) {
    btn.addEventListener('click', function () {
      drawer.hidden = !drawer.hidden;
      btn.setAttribute('aria-expanded', String(!drawer.hidden));
    });
  }

  // Main menu dropdowns: open on hover (CSS) or by the arrow button (click / keyboard)
  var dds = document.querySelectorAll('.dd');
  function closeAll(except) {
    Array.prototype.forEach.call(dds, function (li) {
      if (li !== except) { li.classList.remove('open'); var b = li.querySelector('.dd-btn'); if (b) b.setAttribute('aria-expanded', 'false'); }
    });
  }
  Array.prototype.forEach.call(dds, function (li) {
    var b = li.querySelector('.dd-btn');
    if (!b) return;
    b.addEventListener('click', function (e) {
      e.stopPropagation();
      var open = !li.classList.contains('open');
      closeAll(li);
      li.classList.toggle('open', open);
      b.setAttribute('aria-expanded', String(open));
    });
    li.addEventListener('mouseleave', function () {
      if (li.classList.contains('open') && !li.contains(document.activeElement)) { li.classList.remove('open'); b.setAttribute('aria-expanded', 'false'); }
    });
    li.addEventListener('focusout', function (e) {
      if (!li.contains(e.relatedTarget)) { li.classList.remove('open'); b.setAttribute('aria-expanded', 'false'); }
    });
  });
  document.addEventListener('click', function (e) { if (!e.target.closest || !e.target.closest('.dd')) closeAll(null); });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      var openLi = document.querySelector('.dd.open');
      closeAll(null);
      if (openLi) { var b = openLi.querySelector('.dd-btn'); if (b) b.focus(); }
    }
  });

  // Home page slider: arrows, indicators, pause; changes every 6 seconds
  var hs = document.getElementById('hslider');
  if (hs) {
    var slides = hs.querySelectorAll('.hs-slide'), dots = hs.querySelectorAll('.hs-dots button');
    var pause = hs.querySelector('.hs-pause'), cur = 0, timer = null;
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var paused = reduce;
    function show(n) {
      cur = (n + slides.length) % slides.length;
      Array.prototype.forEach.call(slides, function (s, i) {
        s.classList.toggle('on', i === cur);
        if (i === cur) { s.removeAttribute('aria-hidden'); } else { s.setAttribute('aria-hidden', 'true'); }
        var im = s.querySelector('img'); if (im && i === cur) im.loading = 'eager';
      });
      Array.prototype.forEach.call(dots, function (d, i) { if (i === cur) { d.setAttribute('aria-current', 'true'); } else { d.removeAttribute('aria-current'); } });
    }
    function start() { stop(); if (!paused) timer = setInterval(function () { show(cur + 1); }, 6000); }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }
    function setPaused(p) {
      paused = p;
      if (pause) { pause.setAttribute('aria-pressed', String(p)); pause.setAttribute('aria-label', p ? 'Play slideshow' : 'Pause slideshow'); }
      start();
    }
    hs.querySelector('.hs-prev').addEventListener('click', function () { show(cur - 1); start(); });
    hs.querySelector('.hs-next').addEventListener('click', function () { show(cur + 1); start(); });
    Array.prototype.forEach.call(dots, function (d, i) { d.addEventListener('click', function () { show(i); start(); }); });
    if (pause) pause.addEventListener('click', function () { setPaused(!paused); });
    hs.addEventListener('focusin', stop);
    hs.addEventListener('focusout', function (e) { if (!hs.contains(e.relatedTarget)) start(); });
    setPaused(paused);
  }

  // Department finder filter (Departments page)
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
