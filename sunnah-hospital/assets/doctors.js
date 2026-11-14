/* Doctor directory (sample data — replace with real doctors) */
window.SHD = {
  list: [
    { id: 'd1', n: 'Dr. Name Surname', s: 'Surgical Oncology', r: 'Head of Department', q: 'MS, MCh (Surgical Oncology)', y: 16, f: 'Breast & GI cancer surgery', img: 'photo-1612349317150-e413f6a5b16d' },
    { id: 'd2', n: 'Dr. Name Surname', s: 'Medical Oncology', r: 'Senior Consultant', q: 'MD, DM (Medical Oncology)', y: 12, f: 'Immunotherapy & solid tumors', img: 'photo-1559839734-2b71ea197ec2' },
    { id: 'd3', n: 'Dr. Name Surname', s: 'Surgical Oncology', r: 'Consultant', q: 'MS, DNB, Fellowship (Head & Neck)', y: 10, f: 'Head & neck reconstruction', img: 'photo-1622253692010-333f2da6031d' },
    { id: 'd4', n: 'Dr. Name Surname', s: 'Oncology Nutrition', r: 'Oncology Dietitian', q: 'MSc (Clinical Nutrition)', y: 8, f: 'Nutrition during chemotherapy and recovery', img: 'photo-1594824476967-48c8b964273f' },
    { id: 'd5', n: 'Dr. Name Surname', s: 'Medical Oncology', r: 'Consultant', q: 'MD, DM (Clinical Hematology)', y: 9, f: 'Leukaemia & lymphoma', img: 'photo-1537368910025-700350fe46c7' },
    { id: 'd6', n: 'Dr. Name Surname', s: "Cancer Research", r: "Head, Research", q: 'PhD (Cancer Biology)', y: 18, f: 'Genomics & clinical trials', img: 'photo-1582750433449-648ed127bb54' },
    { id: 'd7', n: 'Dr. Name Surname', s: 'Surgical Oncology', r: 'Consultant', q: 'MS, MCh (Gynae-Oncology)', y: 8, f: 'Gynaecologic cancer surgery', img: 'photo-1651008376811-b90baee60c1f' },
    { id: 'd8', n: 'Name Surname', s: 'Counselling', r: 'Psycho-Oncology Counsellor', q: 'MA (Clinical Psychology)', y: 7, f: 'Counselling for patients and families', img: 'photo-1638202993928-7267aad84c31' }
  ],
  card(d) {
    return `<a class="dcard rv in" href="doctor.html?id=${d.id}"><div class="ph"><img loading="lazy" src="${SH.U(d.img).replace('w=900','w=600')}" alt="${d.n}" onerror="this.remove()"></div><span class="sp">${d.s}</span><b>${d.n}</b><span>${d.r} · ${d.q}</span><span>${d.y}+ years experience</span></a>`;
  },
  render(el, arr) { el.innerHTML = arr.map(this.card).join(''); }
};
