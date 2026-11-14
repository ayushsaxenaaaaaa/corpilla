/* Doctor directory (sample data — replace with real doctors) */
window.SHD = {
  list: [
    { id: 'd1', n: 'Dr. Name Surname', s: 'Surgical Oncology', r: 'Head of Department', q: 'MS, MCh (Surgical Oncology)', y: 16, f: 'Breast & GI cancer surgery', img: 'doc1' },
    { id: 'd2', n: 'Dr. Name Surname', s: 'Medical Oncology', r: 'Senior Consultant', q: 'MD, DM (Medical Oncology)', y: 12, f: 'Chemotherapy & immunotherapy', img: 'doc2' },
    { id: 'd3', n: 'Dr. Name Surname', s: 'Surgical Oncology', r: 'Consultant', q: 'MS, DNB (Head & Neck)', y: 10, f: 'Head & neck cancer surgery', img: 'doc5' },
    { id: 'd4', n: 'Name Surname', s: 'Oncology Nutrition', r: 'Oncology Dietitian', q: 'MSc (Clinical Nutrition)', y: 8, f: 'Nutrition during chemotherapy and recovery', img: 'doc7' },
    { id: 'd5', n: 'Dr. Name Surname', s: 'Medical Oncology', r: 'Consultant', q: 'MD, DM (Medical Oncology)', y: 9, f: 'Blood cancers', img: 'doc3' },
    { id: 'd6', n: 'Dr. Name Surname', s: 'Cancer Research', r: 'Head, Research', q: 'PhD (Cancer Biology)', y: 18, f: 'Clinical research', img: 'doc4' },
    { id: 'd7', n: 'Dr. Name Surname', s: 'Surgical Oncology', r: 'Consultant', q: 'MS, MCh (Gynae-Oncology)', y: 8, f: 'Gynaecological cancer surgery', img: 'doc8' },
    { id: 'd8', n: 'Name Surname', s: 'Counselling', r: 'Psycho-Oncology Counsellor', q: 'MA (Clinical Psychology)', y: 7, f: 'Counselling for patients and families', img: 'doc6' }
  ],
  card(d) {
    return `<a class="dcard" href="doctor.html?id=${d.id}"><span class="sp">${d.s}</span><span class="go" aria-hidden="true"></span><div class="ph"><img loading="lazy" src="${SH.U(d.img)}" alt="${d.n}" onerror="this.remove()"></div><div class="dc"><b>${d.n}</b><span>${d.r}</span><span>${d.q}</span></div></a>`;
  },
  render(el, arr) { el.innerHTML = arr.map(this.card).join(''); }
};
