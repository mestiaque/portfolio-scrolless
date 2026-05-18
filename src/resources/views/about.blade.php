@include('pordfolio::content.desk.about')


<style>
.about-grid-rich { align-items:flex-start; margin-top: 5vh; }
.about-grid-rich > div,
.edu-content,
.about-mini-card { min-width:0; }
.about-intro { margin-top:1.1rem; max-width:50ch; }
.about-badges { display:flex; flex-wrap:wrap; gap:.55rem; margin-top:1.5rem; }
.about-badges span {
  font-size:.62rem;
  letter-spacing:.12em;
  text-transform:uppercase;
  color:#cfd9f2;
  border:1px solid rgba(255,255,255,.14);
  border-radius:999px;
  padding:.45rem .8rem;
  background:rgba(64,200,192,.08);
}
.about-card {
  border:1px solid rgba(255,255,255,.09);
  border-radius:10px;
  background:linear-gradient(160deg, rgba(255,255,255,.04), rgba(255,255,255,.015));
  padding:1.2rem 1.2rem 1.25rem;
}
.card-title {
  font-family:var(--ff-d);
  font-size:1.24rem;
  font-weight:900;
  margin-bottom:.82rem;
  color:#d9dfef;
}
.about-list { list-style:none; display:grid; gap:.55rem; }
.about-list li {
  font-size:.98rem;
  line-height:1.62;
  color:var(--mist);
  padding-left:1rem;
  position:relative;
}
.about-list li::before {
  content:'';
  position:absolute;
  left:0;
  top:.53rem;
  width:6px;
  height:6px;
  border-radius:50%;
  background:var(--gold);
  box-shadow:0 0 0 3px rgba(212,168,67,.16);
}
.about-timeline { display:grid; gap:.65rem; }
.about-timeline div {
  display:grid;
  grid-template-columns:56px 1fr;
  gap:.65rem;
  align-items:flex-start;
}
.about-timeline span {
  font-size:.64rem;
  letter-spacing:.14em;
  text-transform:uppercase;
  color:var(--gold);
  margin-top:.2rem;
}
.about-timeline p {
  font-size:.96rem;
  line-height:1.58;
  color:#95a3bf;
}
.about-cta {
  border:1px solid rgba(64,200,192,.25);
  border-radius:10px;
  margin-top:1rem;
  padding:1rem;
  background:rgba(64,200,192,.08);
}
.about-cta p {
  font-size:.95rem;
  line-height:1.6;
  color:#b4c7d4;
}
.about-cta a {
  display:inline-block;
  margin-top:.55rem;
  font-size:.78rem;
  letter-spacing:.14em;
  text-transform:uppercase;
  text-decoration:none;
  color:var(--gold);
  transition:opacity .2s;
}
.about-cta a:hover { opacity:.8; }
.edu-stack { display:grid; gap:1rem; }
.edu-card {
  display:grid;
  grid-template-columns:72px 1fr;
  gap:1rem;
  align-items:center;
  border:1px solid rgba(214,226,255,.65);
  border-radius:18px;
  padding:1rem 1.15rem;
  background:linear-gradient(150deg, rgba(255,255,255,.06), rgba(255,255,255,.01));
  box-shadow:inset 0 1px 0 rgba(255,255,255,.06);
}
.edu-icon {
  width:62px;
  height:62px;
  border-radius:14px;
  border:1px solid rgba(0,170,255,.35);
  background:rgba(10,30,54,.75);
  display:flex;
  align-items:center;
  justify-content:center;
}
.edu-icon svg {
  width:28px;
  height:28px;
  fill:none;
  stroke:#00d3ff;
  stroke-width:1.7;
  stroke-linecap:round;
  stroke-linejoin:round;
}
.edu-content h4 {
  font-family:var(--ff-b);
  font-size:2rem;
  font-weight:800;
  line-height:1.2;
  color:#f3f8ff;
  margin:.5rem 0 .22rem;
}
.edu-content p {
  font-size:1.1rem;
  color:#a8bdd5;
}
.edu-content small {
  display:block;
  margin-top:.42rem;
  font-size:.86rem;
  color:#d8e7ff;
  letter-spacing:.06em;
  text-transform:uppercase;
}
.edu-badge {
  display:inline-block;
  font-size:.68rem;
  letter-spacing:.1em;
  text-transform:uppercase;
  color:#b7d8ff;
  border:1px solid rgba(128,176,255,.45);
  background:rgba(52,95,170,.42);
  border-radius:8px;
  padding:.28rem .54rem;
  font-weight:700;
}
.edu-badge.done {
  color:#d5e9ff;
  border-color:rgba(177,208,255,.48);
  background:rgba(73,112,184,.48);
}
.about-bottom-fill {
  margin-top:1.4rem;
  display:grid;
  grid-template-columns:repeat(3, 1fr);
  gap:1rem;
}
.about-mini-card {
  border:1px solid rgba(255,255,255,.1);
  border-radius:10px;
  padding:1rem 1rem 1.05rem;
  background:linear-gradient(150deg, rgba(255,255,255,.04), rgba(255,255,255,.01));
}
.mini-title {
  font-family:var(--ff-d);
  font-size:1rem;
  font-weight:900;
  color:#d8dff0;
  margin-bottom:.45rem;
}
.about-mini-card p {
  font-size:.9rem;
  line-height:1.58;
  color:#9caec4;
}

@media (max-width:1200px), (max-height:820px) {
  #s2 .scene-content { padding:0 4vw; }
  .about-grid-rich {
    margin-top:2vh;
    gap:2.4rem;
  }
  #s2 .d-md {
    font-size:clamp(2rem, 3.25vw, 3.45rem);
    line-height:1;
  }
  .about-intro {
    margin-top:.85rem;
    font-size:.9rem;
    line-height:1.62;
    max-width:48ch;
  }
  .stat-block {
    gap:.95rem 1.2rem;
    margin-top:1.5rem;
  }
  .stat-l {
    font-size:.58rem;
    letter-spacing:.12em;
  }
  .about-badges {
    gap:.42rem;
    margin-top:1.1rem;
  }
  .about-badges span {
    font-size:.56rem;
    padding:.38rem .66rem;
  }
  .edu-stack {
    gap:.75rem;
    margin-top:1.4rem !important;
  }
  .edu-card {
    grid-template-columns:58px 1fr;
    gap:.8rem;
    border-radius:14px;
    padding:.75rem .85rem;
  }
  .edu-icon {
    width:52px;
    height:52px;
    border-radius:12px;
  }
  .edu-icon svg {
    width:23px;
    height:23px;
  }
  .edu-content h4 {
    font-size:clamp(1.18rem, 1.75vw, 1.55rem);
    line-height:1.18;
    margin:.28rem 0 .16rem;
  }
  .edu-content p {
    font-size:.95rem;
  }
  .edu-content small {
    margin-top:.3rem;
    font-size:.72rem;
    letter-spacing:.045em;
  }
  .about-bottom-fill {
    gap:.72rem;
    margin-top:.9rem;
  }
  .about-mini-card {
    padding:.78rem .82rem .85rem;
  }
  .mini-title {
    font-size:.9rem;
    margin-bottom:.32rem;
  }
  .about-mini-card p {
    font-size:.8rem;
    line-height:1.48;
  }
}

@media (max-width:980px) {
  #s2 .scene-content { padding:0 3.5vw; }
  .about-grid-rich {
    grid-template-columns:minmax(0, 1fr) minmax(0, 1fr);
    gap:1.6rem;
  }
  #s2 .d-md { font-size:clamp(1.75rem, 3.8vw, 2.6rem); }
  .about-intro {
    font-size:.84rem;
    line-height:1.55;
  }
  .stat-block {
    grid-template-columns:repeat(4, minmax(0, 1fr));
    gap:.75rem;
    margin-top:1.1rem;
  }
  .stat-n { font-size:clamp(1.45rem, 2.6vw, 2.1rem); }
  .stat-l {
    font-size:.52rem;
    line-height:1.35;
  }
  .about-badges span {
    font-size:.5rem;
    padding:.34rem .54rem;
  }
  .edu-card {
    grid-template-columns:48px 1fr;
    padding:.65rem .7rem;
  }
  .edu-icon {
    width:44px;
    height:44px;
  }
  .edu-content h4 {
    font-size:1.05rem;
  }
  .edu-content p {
    font-size:.84rem;
  }
  .edu-content small {
    font-size:.64rem;
  }
  .about-bottom-fill {
    grid-template-columns:repeat(3, minmax(0, 1fr));
  }
}

@media (min-width:740px) and (max-width:860px) {
  .about-grid-rich {
    grid-template-columns:minmax(0, 1fr) minmax(0, 1fr);
    gap:1.2rem;
  }
  .about-bottom-fill {
    grid-template-columns:repeat(3, minmax(0, 1fr));
  }
}
</style>
