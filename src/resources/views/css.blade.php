<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --ff-d: 'Playfair Display', serif;
  --ff-b: 'DM Sans', sans-serif;
  --ink:   #06060a;
  --chalk: #f0eee8;
  --gold:  #d4a843;
  --rose:  #c05060;
  --cyan:  #40c8c0;
  --violet:#8860e0;
  --mist:  #7080a0;
}

/*
  KEY FIX: html is the scroll container.
  body gets a tall height set by JS so window.scrollY works.
  Sections are position:fixed — they never move in DOM flow,
  only GSAP scales/fades them.
*/
html {
  height: 100%;
  overflow-x: hidden;
  background: var(--ink);
  scrollbar-width: none;
}
html::-webkit-scrollbar { display: none; }

body {
  font-family: var(--ff-b);
  color: var(--chalk);
  cursor: none;
  min-height: 100vh;
  /* JS sets: body.style.height = TOTAL_H + 'px' */
}

/* canvas behind everything */
#tunnel-canvas {
  position: fixed; inset: 0;
  width: 100%; height: 100%;
  z-index: 0; pointer-events: none;
}

/* sections — all fixed, stacked by z-index */
.scene {
  position: fixed; inset: 0;
  display: flex; align-items: center; justify-content: center;
  z-index: 10; pointer-events: none;
}
.scene.active { pointer-events: all; }

/* the portal card that zooms in/out */
.portal-frame {
  position: absolute; inset: 0;
  transform-origin: 50% 50%;
  will-change: transform, opacity;
  overflow: hidden; border-radius: 0;
}

/* dark vignette overlay */
.portal-frame::after {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse 72% 72% at 50% 50%,
    transparent 38%, rgba(0,0,0,.72) 100%);
  pointer-events: none; z-index: 20;
}

/* section backgrounds */
.bg-s1 { background: radial-gradient(ellipse 110% 110% at 62% 38%, #180a28 0%, #06060a 68%); }
.bg-s2 { background: radial-gradient(ellipse 110% 110% at 28% 62%, #180810 0%, #060408 68%); }
.bg-s3 { background: radial-gradient(ellipse 110% 110% at 72% 28%, #04161c 0%, #020c10 68%); }
.bg-s4 { background: radial-gradient(ellipse 110% 110% at 50% 50%, #160808 0%, #080404 68%); }
.bg-s5 { background: radial-gradient(ellipse 110% 110% at 50% 50%, #160808 0%, #080404 68%); }
.bg-s6 { background: radial-gradient(ellipse 110% 110% at 50% 50%, #160808 0%, #080404 68%); }

/* CSS 3D ring tunnel */
.ring-tunnel {
  position: absolute; inset: 0;
  perspective: 550px; perspective-origin: 50% 50%;
  overflow: hidden; pointer-events: none; z-index: 1;
}
.ring {
  position: absolute; top: 50%; left: 50%;
  border-radius: 50%; border: 1px solid rgba(255,255,255,.06);
  transform-origin: 50% 50%; will-change: transform, opacity;
}

/* content layer */
.scene-content {
  position: relative; z-index: 30; padding: 0 6vw;
  /* max-width: 1200px;  */
  width: 100%;
}

/* typography */
.eyebrow { font-size:.68rem; letter-spacing:.22em; text-transform:uppercase; color:var(--mist); margin-bottom:1rem; }
.d-xl { font-family:var(--ff-d); font-size:clamp(3rem,8vw,8.5rem); font-weight:900; line-height:.92; letter-spacing:-.03em; }
.d-lg { font-family:var(--ff-d); font-size:clamp(2.4rem,6vw,6.5rem); font-weight:900; line-height:.94; letter-spacing:-.025em; }
.d-md { font-family:var(--ff-d); font-size:clamp(1.8rem,4vw,4.5rem); font-weight:900; line-height:.96; letter-spacing:-.02em; }
em.g { font-style:italic; color:var(--gold); }
em.r { font-style:italic; color:var(--rose); }
em.c { font-style:italic; color:var(--cyan); }
.body-t { font-size:clamp(.85rem,1.4vw,1rem); line-height:1.75; font-weight:300; color:var(--mist); max-width:36ch; }
.rule { display:block; width:40px; height:1.5px; background:var(--gold); margin-bottom:1.25rem; }

/* work list */
.project-list { margin-top:2.5rem; }
.proj { display:flex; align-items:baseline; gap:1.5rem; padding:1.1rem 0; border-bottom:1px solid rgba(255,255,255,.06); cursor:pointer; transition:border-color .3s; }
.proj:hover { border-color:rgba(212,168,67,.35); }
.proj-num  { font-size:.68rem; letter-spacing:.2em; color:var(--gold); min-width:2ch; }
.proj-name { font-family:var(--ff-d); font-size:clamp(1rem,2.5vw,1.85rem); font-weight:900; flex:1; }
.proj-year { font-size:.72rem; letter-spacing:.1em; color:var(--mist); }
.proj-arr  { color:var(--gold); opacity:0; transform:translateX(-8px); transition:opacity .2s,transform .2s; }
.proj:hover .proj-arr { opacity:1; transform:translateX(0); }

/* about */
.about-grid { display:grid; grid-template-columns:1fr 1fr; gap:5rem; align-items:center; }
.stat-block { display:grid; grid-template-columns:1fr 1fr; gap:1.5rem; margin-top:2.5rem; }
.stat-n { font-family:var(--ff-d); font-size:clamp(1.8rem,3.2vw,3rem); font-weight:900; }
.stat-l { font-size:.64rem; letter-spacing:.15em; text-transform:uppercase; color:var(--mist); margin-top:.2rem; }


/* services */
.svc-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:1.25rem; margin-top:2.5rem; }
.svc { border:1px solid rgba(255,255,255,.07); border-radius:6px; padding:1.6rem 1.4rem; transition:border-color .3s,background .3s; }
.svc:hover { border-color:rgba(192,80,96,.4); background:rgba(192,80,96,.04); }
.svc-icon { font-size:1.4rem; margin-bottom:.9rem; }
.svc-name { font-family:var(--ff-d); font-size:1.1rem; font-weight:900; margin-bottom:.5rem; }
.svc-desc { font-size:.8rem; line-height:1.6; color:var(--mist); }

/* contact */
.contact-wrap { text-align:center; }
.contact-email { font-family:var(--ff-d); font-size:clamp(1.3rem,3vw,2.8rem); font-weight:900; color:#8b3040; margin:1.5rem 0; letter-spacing:-.02em; text-decoration:none; display:block; transition:color .2s; }
.contact-email:hover { color:var(--rose); }
.bg-s5 .body-t { color:#7a7060; max-width:42ch; margin:0 auto; }
.bg-s5 .rule   { background:#c05060; }
.bg-s5 .eyebrow{ color:#9a9080; }

.socials { display:flex; justify-content:center; gap:2.5rem; margin-top:2rem; }
.socials a { font-size:.7rem; letter-spacing:.14em; text-transform:uppercase; color:#8a8070; text-decoration:none; transition:color .2s; }
.socials a:hover { color:#c05060; }

/* scroll hint */
.scroll-hint { position:absolute; bottom:2.5rem; left:50%; transform:translateX(-50%); display:flex; flex-direction:column; align-items:center; gap:.6rem; font-size:.64rem; letter-spacing:.2em; text-transform:uppercase; color:var(--mist); z-index:40; }
.scroll-hint .bar { width:1px; height:34px; background:var(--gold); animation:scrollpulse 2s ease-in-out infinite; }
@keyframes scrollpulse { 0%,100%{transform:scaleY(.3);opacity:.3;transform-origin:top} 50%{transform:scaleY(1);opacity:1;transform-origin:top} }

/* progress + dots */
#progress-bar { position:fixed; top:0; left:0; height:2px; background:linear-gradient(90deg,var(--gold),var(--rose)); width:0%; z-index:1000; }
#dots { position:fixed; right:2rem; top:50%; transform:translateY(-50%); display:flex; flex-direction:column; gap:9px; z-index:1000; }
.dot { width:5px; height:5px; border-radius:50%; background:rgba(255,255,255,.2); transition:background .3s,transform .3s,height .3s; cursor:pointer; }
.dot.active { background:var(--gold); height:16px; border-radius:3px; }

/* nav */
#nav { position:fixed; top:0; left:0; right:0; padding:1.75rem 3rem; display:flex; justify-content:space-between; align-items:center; z-index:500; mix-blend-mode:difference; }
.nav-logo { font-family:var(--ff-d); font-size:1.05rem; font-weight:900; color:#fff; }
.nav-links { display:flex; gap:2.5rem; list-style:none; }
.nav-links a { font-size:.7rem; letter-spacing:.16em; text-transform:uppercase; color:#fff; text-decoration:none; opacity:.6; transition:opacity .2s; }
.nav-links a:hover { opacity:1; }

/* cursor */
#cur-dot,#cur-ring { position:fixed; border-radius:50%; pointer-events:none; z-index:9000; transform:translate(-50%,-50%); }
#cur-dot  { width:6px; height:6px; background:var(--gold); }
#cur-ring { width:38px; height:38px; border:1.5px solid rgba(212,168,67,.6); }

/* ghost letters */
.ghost { position:absolute; font-family:var(--ff-d); font-weight:900; font-size:clamp(12rem,24vw,22rem); line-height:1; color:rgba(255, 238, 0, 0.089); pointer-events:none; user-select:none; }
.bg-s5 .ghost { color:rgba(0,0,0,.04); }

@media(max-width:860px){
  #nav{padding:1.25rem 1.5rem;} .nav-links{display:none;}
  .scene-content{padding:0 1.5rem;}
  .job-wrap{margin-top:1rem;}
  .job-head{font-size:1.85rem;margin-bottom:1rem;}
  .job-timeline{padding-left:1.4rem;gap:.82rem;}
  .job-timeline::before{left:.34rem;}
  .job-item::before{left:-1.16rem;top:.9rem;width:9px;height:9px;}
  .job-card{padding:.95rem .95rem 1rem;border-radius:18px;}
  .job-top h4{font-size:1.22rem;}
  .job-badge{font-size:.55rem;padding:.24rem .5rem;}
  .job-company{font-size:.92rem;}
  .job-desc{font-size:.84rem;line-height:1.55;}
  .job-year{font-size:.62rem;}
  .about-grid{grid-template-columns:1fr;gap:2rem;}
  .about-intro{max-width:100%;}
  .about-card{padding:.9rem .9rem 1rem;}
  .card-title{font-size:1.12rem;}
  .about-list li{font-size:.92rem;}
  .about-timeline p{font-size:.9rem;}
  .about-cta p{font-size:.9rem;}
  .about-cta a{font-size:.72rem;}
  .about-timeline div{grid-template-columns:52px 1fr;}
  .about-badges span{font-size:.58rem;padding:.42rem .72rem;}
  .edu-card{grid-template-columns:58px 1fr;border-radius:14px;padding:.78rem .8rem;}
  .edu-icon{width:52px;height:52px;border-radius:12px;}
  .edu-icon svg{width:23px;height:23px;}
  .edu-content h4{font-size:1.22rem;margin:.38rem 0 .2rem;}
  .edu-content p{font-size:.92rem;}
  .edu-content small{font-size:.7rem;}
  .edu-badge{font-size:.58rem;padding:.22rem .45rem;}
  .about-bottom-fill{grid-template-columns:1fr;gap:.75rem;margin-top:1rem;}
  .about-mini-card{padding:.85rem .85rem .92rem;}
  .mini-title{font-size:.95rem;}
  .about-mini-card p{font-size:.84rem;}
  .svc-grid{grid-template-columns:1fr;}
}


.hero-head-title {
  font-family: Nosifer, cursive;
  font-size: clamp(1.8rem, 5vw, 5.5rem) !important;
  font-weight: 900;
  line-height: 1.3;
  letter-spacing: 0.1em;
  padding-bottom: 0.2em;
}

/* ==========================================
   ১. SLIDE IN ANIMATIONS (স্ক্রিনে আসার জন্য)
   ========================================== */

/* নিচ থেকে ওপরে আসবে */
@keyframes slideInUp {
    0% { transform: translateY(100%); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}
/* উপর থেকে নিচে আসবে */
@keyframes slideInDown {
    0% { transform: translateY(-100%); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}
/* বাম থেকে ডানে আসবে */
@keyframes slideInLeft {
    0% { transform: translateX(-100%); opacity: 0; }
    100% { transform: translateX(0); opacity: 1; }
}
/* ডান থেকে বামে আসবে */
@keyframes slideInRight {
    0% { transform: translateX(100%); opacity: 0; }
    100% { transform: translateX(0); opacity: 1; }
}

/* ==========================================
   ২. SLIDE OUT ANIMATIONS (স্ক্রিন থেকে যাওয়ার জন্য)
   ========================================== */

/* ওপরের দিকে চলে যাবে */
@keyframes slideOutUp {
    0% { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(-100%); opacity: 0; }
}
/* নিচের দিকে চলে যাবে */
@keyframes slideOutDown {
    0% { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(100%); opacity: 0; }
}
/* বাম দিকে চলে যাবে */
@keyframes slideOutLeft {
    0% { transform: translateX(0); opacity: 1; }
    100% { transform: translateX(-100%); opacity: 0; }
}
/* ডান দিকে চলে যাবে */
@keyframes slideOutRight {
    0% { transform: translateX(0); opacity: 1; }
    100% { transform: translateX(100%); opacity: 0; }
}

.slide-in-up { animation: slideInUp 1s ease-out forwards; }
.slide-in-down { animation: slideInDown 1s ease-out forwards; }
.slide-in-left { animation: slideInLeft 1s ease-out forwards; }
.slide-in-right { animation: slideInRight 1s ease-out forwards; }
.slide-out-up { animation: slideOutUp 1s ease-out forwards; }
.slide-out-down { animation: slideOutDown 1s ease-out forwards; }
.slide-out-left { animation: slideOutLeft 1s ease-out forwards; }
.slide-out-right { animation: slideOutRight 1s ease-out forwards; }

</style>