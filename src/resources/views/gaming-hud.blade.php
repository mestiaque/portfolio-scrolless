<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan | Full-Stack Engineer — Player HUD Portfolio</title>
<meta name="description" content="Gaming HUD-themed portfolio of M. Estiaque Ahmed Khan, a full-stack Laravel engineer specializing in PHP, Vue.js, ERP integration and enterprise automation systems. Explore missions, abilities, quest log and achievements." />
<meta name="theme-color" content="#050810" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;600;700;800;900&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<style>
/* ============================================================
   RESET & ROOT
============================================================ */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root{
  --bg:#050810;
  --bg-alt:#080d1c;
  --panel:rgba(10,16,32,.72);
  --panel-solid:#0a1020;
  --border:rgba(0,245,255,.22);
  --border-soft:rgba(255,255,255,.08);
  --cyan:#00f5ff;
  --cyan-dim:#00b8c4;
  --purple:#a855f7;
  --pink:#f0abfc;
  --red:#ff3860;
  --green:#00ff9d;
  --gold:#ffd166;
  --text:#e7f1ff;
  --text-dim:#8ea0c4;
  --text-mute:#54628a;

  --sp-1:.5rem;   /* 8px  */
  --sp-2:1rem;    /* 16px */
  --sp-3:1.5rem;  /* 24px */
  --sp-4:2rem;    /* 32px */
  --sp-5:3rem;    /* 48px */
  --sp-6:4rem;    /* 64px */
  --sp-7:6rem;    /* 96px */

  --radius:14px;
  --radius-sm:8px;
  --ff-head:'Orbitron', sans-serif;
  --ff-body:'Rajdhani', sans-serif;
}

@media (prefers-reduced-motion: reduce){
  html{ scroll-behavior:auto; }
  *,*::before,*::after{
    animation-duration:.001ms !important;
    animation-iteration-count:1 !important;
    transition-duration:.001ms !important;
    scroll-behavior:auto !important;
  }
}

html{ scroll-behavior:smooth; scrollbar-color:var(--cyan) var(--bg-alt); scrollbar-width:thin; }

body{
  font-family:var(--ff-body);
  background:var(--bg);
  color:var(--text);
  line-height:1.6;
  overflow-x:hidden;
  position:relative;
  font-size:16px;
  font-weight:500;
}

::-webkit-scrollbar{ width:10px; height:10px; }
::-webkit-scrollbar-track{ background:var(--bg-alt); }
::-webkit-scrollbar-thumb{ background:linear-gradient(var(--cyan),var(--purple)); border-radius:5px; }

body::before{
  content:'';
  position:fixed; inset:0; z-index:0; pointer-events:none;
  background-image:
    linear-gradient(rgba(0,245,255,.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(0,245,255,.05) 1px, transparent 1px);
  background-size:48px 48px;
  -webkit-mask-image:radial-gradient(ellipse at center, black 0%, transparent 78%);
  mask-image:radial-gradient(ellipse at center, black 0%, transparent 78%);
}
body::after{
  content:'';
  position:fixed; inset:0; z-index:0; pointer-events:none;
  background:
    radial-gradient(ellipse 60% 40% at 15% -5%, rgba(168,85,247,.16), transparent 60%),
    radial-gradient(ellipse 60% 40% at 90% 105%, rgba(0,245,255,.13), transparent 55%);
}

img,svg{ display:block; max-width:100%; }
a{ color:inherit; text-decoration:none; }
button{ font-family:inherit; cursor:pointer; background:none; border:none; color:inherit; }
ul,ol{ list-style:none; }
input,textarea{ font-family:inherit; }

:focus-visible{ outline:2px solid var(--cyan); outline-offset:3px; border-radius:4px; }

.container{ width:min(1180px, 92%); margin-inline:auto; position:relative; z-index:1; }

.skip-link{
  position:absolute; left:-9999px; top:0; z-index:10000;
  background:var(--cyan); color:#03060c; font-weight:700;
  padding:.85rem 1.4rem; border-radius:0 0 8px 0; letter-spacing:1px;
}
.skip-link:focus{ left:0; top:0; }

/* ============================================================
   HUD FRAME / PANEL / CORNERS
============================================================ */
.panel{
  background:var(--panel);
  border:1px solid var(--border-soft);
  border-radius:var(--radius);
  backdrop-filter:blur(14px);
  -webkit-backdrop-filter:blur(14px);
  padding:var(--sp-4);
  position:relative;
}
.hud-frame{ position:relative; }
.hud-frame::before, .hud-frame::after{ content:''; }
.corner{ position:absolute; width:16px; height:16px; z-index:2; pointer-events:none; }
.corner.tl{ top:-1px; left:-1px; border-top:2px solid var(--cyan); border-left:2px solid var(--cyan); border-radius:3px 0 0 0; }
.corner.tr{ top:-1px; right:-1px; border-top:2px solid var(--cyan); border-right:2px solid var(--cyan); border-radius:0 3px 0 0; }
.corner.bl{ bottom:-1px; left:-1px; border-bottom:2px solid var(--purple); border-left:2px solid var(--purple); border-radius:0 0 0 3px; }
.corner.br{ bottom:-1px; right:-1px; border-bottom:2px solid var(--purple); border-right:2px solid var(--purple); border-radius:0 0 3px 0; }

/* ============================================================
   REVEAL ON SCROLL
============================================================ */
.reveal{ opacity:0; transform:translateY(28px); transition:opacity .7s ease, transform .7s ease; }
.reveal.in-view{ opacity:1; transform:none; }

/* ============================================================
   SFX PULSE (visual click/hover feedback)
============================================================ */
.sfx{ position:relative; }
.sfx.pulse::after{
  content:'';
  position:absolute; inset:-6px; border-radius:inherit;
  box-shadow:0 0 0 2px var(--cyan), 0 0 28px 6px rgba(0,245,255,.55);
  opacity:.95; pointer-events:none;
  animation:pulseFlash .55s ease-out forwards;
}
@keyframes pulseFlash{ 0%{ opacity:.9; transform:scale(1);} 100%{ opacity:0; transform:scale(1.08);} }

/* ============================================================
   BUTTONS
============================================================ */
.btn-primary, .btn-ghost{
  display:inline-flex; align-items:center; gap:.6rem;
  font-family:var(--ff-head); font-size:.78rem; font-weight:700;
  letter-spacing:2px; text-transform:uppercase;
  padding:.95rem 1.8rem; border-radius:var(--radius-sm);
  transition:all .25s ease; white-space:nowrap;
}
.btn-primary{
  background:linear-gradient(135deg, rgba(0,245,255,.18), rgba(168,85,247,.18));
  border:1px solid var(--cyan); color:var(--cyan);
}
.btn-primary:hover{ background:rgba(0,245,255,.28); box-shadow:0 0 26px rgba(0,245,255,.45); transform:translateY(-2px); }
.btn-ghost{ border:1px solid var(--border-soft); color:var(--text); background:rgba(255,255,255,.03); }
.btn-ghost:hover{ border-color:var(--purple); color:var(--pink); box-shadow:0 0 22px rgba(168,85,247,.3); transform:translateY(-2px); }
.btn-primary:disabled{ opacity:.55; cursor:not-allowed; transform:none; box-shadow:none; }

/* ============================================================
   BOOT SCREEN
============================================================ */
#boot-screen{
  position:fixed; inset:0; z-index:9999;
  background:var(--bg);
  display:flex; align-items:center; justify-content:center;
  transition:opacity .6s ease, visibility .6s ease;
}
#boot-screen.hidden{ opacity:0; visibility:hidden; pointer-events:none; }
.boot-inner{ text-align:center; width:min(360px,86vw); }
.boot-logo{
  font-family:var(--ff-head); font-weight:900; font-size:1.4rem; letter-spacing:4px;
  color:var(--text); margin-bottom:var(--sp-3);
}
.boot-logo span{ color:var(--cyan); text-shadow:0 0 16px var(--cyan); }
.boot-bar{ height:6px; border-radius:4px; background:rgba(255,255,255,.08); overflow:hidden; border:1px solid var(--border-soft); }
.boot-fill{ height:100%; width:0%; background:linear-gradient(90deg,var(--cyan),var(--purple)); box-shadow:0 0 12px var(--cyan); transition:width 1.1s cubic-bezier(.4,0,.2,1); }
.boot-text{ margin-top:var(--sp-2); font-size:.72rem; letter-spacing:3px; color:var(--text-mute); text-transform:uppercase; font-family:var(--ff-head); }

/* ============================================================
   NAVIGATION
============================================================ */
.site-nav{
  position:fixed; top:0; left:0; right:0; z-index:500;
  background:rgba(5,8,16,.72);
  backdrop-filter:blur(16px); -webkit-backdrop-filter:blur(16px);
  border-bottom:1px solid var(--border-soft);
}
.nav-inner{
  width:min(1180px,92%); margin-inline:auto;
  display:flex; align-items:center; justify-content:space-between;
  padding:.9rem 0;
}
.brand{ font-family:var(--ff-head); font-weight:800; font-size:1.05rem; letter-spacing:2px; display:flex; align-items:center; gap:.5rem; }
.brand-mark{ color:var(--cyan); text-shadow:0 0 12px var(--cyan); font-size:1.2rem; }
.brand span{ color:var(--purple); }

.nav-links{ display:none; align-items:center; gap:1.9rem; }
.nav-links a{
  font-family:var(--ff-head); font-size:.68rem; letter-spacing:1.5px; text-transform:uppercase;
  color:var(--text-dim); padding:.4rem .1rem; position:relative; transition:color .25s ease;
}
.nav-links a::after{
  content:''; position:absolute; left:0; bottom:-4px; height:2px; width:0;
  background:linear-gradient(90deg,var(--cyan),var(--purple));
  transition:width .25s ease; box-shadow:0 0 8px var(--cyan);
}
.nav-links a:hover, .nav-links a.active{ color:var(--cyan); }
.nav-links a:hover::after, .nav-links a.active::after{ width:100%; }

.nav-status{ display:none; align-items:center; gap:.9rem; font-family:var(--ff-head); font-size:.68rem; letter-spacing:1.5px; color:var(--text-mute); }
.status-dot{ width:7px; height:7px; border-radius:50%; background:var(--green); box-shadow:0 0 8px var(--green); animation:blipPulse 2s ease-in-out infinite; }
@keyframes blipPulse{ 0%,100%{ opacity:1; } 50%{ opacity:.35; } }

.nav-toggle{
  display:flex; flex-direction:column; gap:5px; padding:.5rem; z-index:20;
}
.nav-toggle span{ width:22px; height:2px; background:var(--cyan); transition:all .3s ease; border-radius:2px; }
.nav-toggle.open span:nth-child(1){ transform:translateY(7px) rotate(45deg); }
.nav-toggle.open span:nth-child(2){ opacity:0; }
.nav-toggle.open span:nth-child(3){ transform:translateY(-7px) rotate(-45deg); }

.mobile-panel{
  position:fixed; inset:0 0 auto 0; top:60px; z-index:400;
  background:rgba(5,8,16,.97); backdrop-filter:blur(18px);
  border-bottom:1px solid var(--border-soft);
  display:flex; flex-direction:column; padding:var(--sp-3) var(--sp-3) var(--sp-4);
  transform:translateY(-12px); opacity:0; pointer-events:none;
  transition:all .3s ease;
}
.mobile-panel.open{ transform:translateY(0); opacity:1; pointer-events:auto; }
.mobile-panel a{
  font-family:var(--ff-head); font-size:.85rem; letter-spacing:1.5px; text-transform:uppercase;
  color:var(--text-dim); padding:.9rem 0; border-bottom:1px solid var(--border-soft);
}
.mobile-panel a:hover{ color:var(--cyan); }

@media (min-width:900px){
  .nav-links{ display:flex; }
  .nav-status{ display:flex; }
  .nav-toggle{ display:none; }
  .mobile-panel{ display:none; }
}

/* ============================================================
   HERO / PLAYER PROFILE
============================================================ */
.hero{
  position:relative; min-height:100vh;
  display:flex; align-items:center; justify-content:center;
  padding:calc(var(--sp-7) + 60px) 0 var(--sp-6);
  overflow:hidden;
}
.hero-bg{ position:absolute; inset:0; z-index:0; pointer-events:none; }
.hero-glow{ position:absolute; border-radius:50%; filter:blur(90px); opacity:.4; animation:floatGlow 10s ease-in-out infinite alternate; }
.g1{ width:420px; height:420px; background:radial-gradient(circle,var(--cyan),transparent 70%); top:-8%; left:-8%; }
.g2{ width:380px; height:380px; background:radial-gradient(circle,var(--purple),transparent 70%); bottom:-10%; right:-6%; animation-delay:-4s; }
@keyframes floatGlow{ 0%{ transform:translate(0,0) scale(1); } 100%{ transform:translate(30px,20px) scale(1.12); } }

.hero-inner{ position:relative; z-index:1; width:min(920px,92%); margin-inline:auto; }

.profile-card{ padding:var(--sp-5); border-radius:20px; }
.profile-top{ display:flex; flex-direction:column; align-items:center; gap:var(--sp-3); text-align:center; }

@media (min-width:720px){
  .profile-top{ flex-direction:row; align-items:center; text-align:left; }
}

.avatar-wrap{ position:relative; width:132px; height:132px; flex-shrink:0; margin-inline:auto; }
@media (min-width:720px){ .avatar-wrap{ margin-inline:0; } }

.avatar-ring{ position:absolute; inset:0; border-radius:50%; border:1.5px dashed rgba(0,245,255,.35); animation:spinSlow 18s linear infinite; }
.avatar-ring.ring-mid{ inset:12px; border-color:rgba(168,85,247,.4); animation-duration:14s; animation-direction:reverse; }
@keyframes spinSlow{ to{ transform:rotate(360deg); } }

.avatar-hex{
  position:absolute; inset:22px; border-radius:50%;
  background:radial-gradient(circle at 35% 30%, rgba(0,245,255,.18), rgba(10,16,32,.9));
  border:2px solid var(--cyan); box-shadow:0 0 30px rgba(0,245,255,.35), inset 0 0 20px rgba(0,245,255,.15);
  display:flex; align-items:center; justify-content:center;
}
.avatar-core i{ font-size:2.1rem; color:var(--cyan); text-shadow:0 0 16px var(--cyan); }

.level-badge{
  position:absolute; bottom:-4px; right:-4px;
  background:linear-gradient(135deg,var(--purple),var(--pink));
  color:#0a0414; font-family:var(--ff-head); font-weight:800; font-size:.72rem;
  padding:.3rem .55rem; border-radius:8px; box-shadow:0 0 16px rgba(168,85,247,.6);
  border:1px solid rgba(255,255,255,.4);
}

.profile-id{ flex:1; min-width:0; }
.tag-online{
  display:inline-flex; align-items:center; gap:.4rem; font-family:var(--ff-head);
  font-size:.62rem; letter-spacing:2px; color:var(--green); text-transform:uppercase;
  border:1px solid rgba(0,255,157,.35); background:rgba(0,255,157,.08);
  padding:.25rem .7rem; border-radius:20px; margin-bottom:var(--sp-2);
}
.tag-online .dot{ width:6px; height:6px; border-radius:50%; background:var(--green); box-shadow:0 0 8px var(--green); animation:blipPulse 2s ease-in-out infinite; }

.player-name{
  font-family:var(--ff-head); font-weight:800;
  font-size:clamp(1.6rem, 4.6vw, 2.7rem); letter-spacing:1px; line-height:1.15;
  background:linear-gradient(135deg,#fff,var(--cyan) 60%,var(--purple));
  -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent;
  margin-bottom:.5rem;
}
.player-class{ font-size:1.02rem; color:var(--text-dim); margin-bottom:var(--sp-3); font-weight:600; }
.player-class strong{ color:var(--cyan); font-weight:700; }
.player-class .sep{ color:var(--text-mute); margin:0 .3rem; }

.quick-stats{ display:flex; flex-wrap:wrap; gap:.6rem .9rem; justify-content:center; }
@media (min-width:720px){ .quick-stats{ justify-content:flex-start; } }
.qstat{
  display:inline-flex; align-items:center; gap:.45rem; font-size:.8rem;
  color:var(--text-dim); background:rgba(255,255,255,.04); border:1px solid var(--border-soft);
  padding:.35rem .75rem; border-radius:20px;
}
.qstat i{ color:var(--purple); }

.xp-block{ margin-top:var(--sp-4); }
.xp-label{ display:flex; justify-content:space-between; font-family:var(--ff-head); font-size:.68rem; letter-spacing:1.5px; color:var(--text-mute); text-transform:uppercase; margin-bottom:.45rem; }
.xp-label span:last-child{ color:var(--cyan); }
.xp-bar{ height:14px; border-radius:8px; background:rgba(255,255,255,.06); border:1px solid var(--border-soft); overflow:hidden; position:relative; }
.xp-fill{
  height:100%; width:0%; border-radius:8px;
  background:linear-gradient(90deg,var(--cyan),var(--purple));
  box-shadow:0 0 14px rgba(0,245,255,.6);
  transition:width 1.4s cubic-bezier(.16,1,.3,1);
  position:relative;
}
.xp-fill::after{
  content:''; position:absolute; inset:0;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.5),transparent);
  width:40px; animation:xpShine 2.4s ease-in-out infinite;
}
@keyframes xpShine{ 0%{ transform:translateX(-60px);} 100%{ transform:translateX(220px);} }
.xp-next{ margin-top:.45rem; font-size:.75rem; color:var(--text-mute); letter-spacing:.5px; }

.hero-actions{ display:flex; flex-wrap:wrap; gap:var(--sp-2); margin-top:var(--sp-4); justify-content:center; }
@media (min-width:720px){ .hero-actions{ justify-content:flex-start; } }

.scroll-cue{
  position:absolute; bottom:var(--sp-3); left:50%; transform:translateX(-50%);
  font-family:var(--ff-head); font-size:.65rem; letter-spacing:3px; color:var(--text-mute);
  display:flex; flex-direction:column; align-items:center; gap:.35rem; z-index:1;
  animation:bounceCue 2.2s ease-in-out infinite;
}
@keyframes bounceCue{ 0%,100%{ transform:translate(-50%,0);} 50%{ transform:translate(-50%,8px);} }

/* ============================================================
   SECTION HEAD
============================================================ */
.section{ position:relative; z-index:1; padding:var(--sp-7) 0; scroll-margin-top:76px; }
.section.alt{ background:linear-gradient(180deg, rgba(0,245,255,.025), rgba(168,85,247,.025)); border-top:1px solid rgba(255,255,255,.05); border-bottom:1px solid rgba(255,255,255,.05); }
.section-head{ text-align:center; max-width:640px; margin:0 auto var(--sp-5); }
.eyebrow{
  display:inline-block; font-family:var(--ff-head); font-size:.68rem; letter-spacing:3px;
  color:var(--cyan); text-transform:uppercase; margin-bottom:var(--sp-2);
  border:1px solid var(--border); padding:.3rem .9rem; border-radius:20px; background:rgba(0,245,255,.06);
}
.title{ font-family:var(--ff-head); font-weight:800; font-size:clamp(1.7rem,4vw,2.5rem); margin-bottom:.7rem; letter-spacing:.5px; }
.title .accent{ color:var(--purple); }
.sub{ color:var(--text-dim); font-size:1rem; }

/* ============================================================
   BIO SECTION
============================================================ */
.bio-grid{ display:grid; gap:var(--sp-4); grid-template-columns:1fr; }
@media (min-width:860px){ .bio-grid{ grid-template-columns:1.4fr 1fr; align-items:start; } }
.bio-panel, .cert-panel{ border-radius:var(--radius); }
.bio-icon{ font-size:1.6rem; color:var(--purple); margin-bottom:var(--sp-2); text-shadow:0 0 14px rgba(168,85,247,.5); }
.bio-text{ font-size:1.12rem; line-height:1.75; color:var(--text); font-weight:500; }
.trait-tags{ display:flex; flex-wrap:wrap; gap:.5rem; margin-top:var(--sp-3); }
.trait-tags span{
  font-size:.72rem; letter-spacing:.5px; font-family:var(--ff-head); text-transform:uppercase;
  color:var(--cyan); border:1px solid var(--border); background:rgba(0,245,255,.06);
  padding:.35rem .7rem; border-radius:6px;
}
.cert-heading{ font-family:var(--ff-head); font-size:1rem; letter-spacing:1px; margin-bottom:var(--sp-3); display:flex; align-items:center; gap:.6rem; color:var(--text); }
.cert-heading i{ color:var(--gold); }
.cert-list{ display:flex; flex-direction:column; gap:var(--sp-3); }
.cert-list li{ display:flex; gap:.9rem; align-items:flex-start; }
.cert-icon{
  flex-shrink:0; width:38px; height:38px; border-radius:10px;
  background:rgba(255,209,102,.1); border:1px solid rgba(255,209,102,.35);
  display:flex; align-items:center; justify-content:center; color:var(--gold);
}
.cert-name{ font-weight:700; color:var(--text); }
.cert-meta{ font-size:.82rem; color:var(--text-mute); margin-top:.15rem; }

/* ============================================================
   ABILITIES
============================================================ */
.ability-tabs{ display:flex; flex-wrap:wrap; justify-content:center; gap:.7rem; margin-bottom:var(--sp-5); }
.tab-btn{
  font-family:var(--ff-head); font-size:.7rem; letter-spacing:1.5px; text-transform:uppercase;
  padding:.6rem 1.2rem; border-radius:20px; border:1px solid var(--border-soft); color:var(--text-dim);
  background:rgba(255,255,255,.03); transition:all .25s ease;
}
.tab-btn:hover{ color:var(--cyan); border-color:var(--border); }
.tab-btn.active{ color:#03141a; background:var(--cyan); border-color:var(--cyan); box-shadow:0 0 20px rgba(0,245,255,.45); }

.ability-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(148px,1fr)); gap:var(--sp-3); }
.ability-card{
  background:var(--panel); border:1px solid var(--border-soft); border-radius:var(--radius);
  padding:var(--sp-3) var(--sp-2); text-align:center; transition:transform .3s ease, border-color .3s ease, box-shadow .3s ease;
}
.ability-card:hover{ transform:translateY(-6px); border-color:var(--border); box-shadow:0 12px 28px rgba(0,245,255,.15); }
.ability-card.is-hidden{ display:none; }
.ability-ring{ position:relative; width:88px; height:88px; margin:0 auto var(--sp-2); }
.ring-svg{ width:100%; height:100%; transform:rotate(-90deg); }
.ring-bg{ fill:none; stroke:rgba(255,255,255,.08); stroke-width:7; }
.ring-fill{ fill:none; stroke:url(#ringGrad); stroke-width:7; stroke-linecap:round; transition:stroke-dashoffset 1.3s cubic-bezier(.16,1,.3,1); }
.ability-icon{ position:absolute; inset:0; display:flex; align-items:center; justify-content:center; font-size:1.5rem; color:var(--cyan); }
.ability-name{ font-family:var(--ff-head); font-size:.82rem; font-weight:700; letter-spacing:.5px; margin-bottom:.3rem; color:var(--text); }
.ability-lvl{ font-size:.72rem; color:var(--purple); font-weight:700; letter-spacing:1px; }

/* ============================================================
   QUEST LOG (EXPERIENCE)
============================================================ */
.quest-log{ position:relative; max-width:760px; margin:0 auto; padding-left:32px; }
.quest-log::before{
  content:''; position:absolute; left:9px; top:6px; bottom:6px; width:2px;
  background:linear-gradient(180deg,var(--cyan),var(--purple),transparent);
}
.quest{ position:relative; padding-bottom:var(--sp-5); }
.quest:last-child{ padding-bottom:0; }
.quest-marker{
  position:absolute; left:-32px; top:4px; width:20px; height:20px; border-radius:50%;
  background:var(--bg-alt); border:2px solid var(--cyan); display:flex; align-items:center; justify-content:center;
  font-size:.6rem; color:var(--cyan); box-shadow:0 0 12px rgba(0,245,255,.5); z-index:1;
}
.quest.active .quest-marker{ background:var(--cyan); color:#03141a; animation:blipPulse 1.8s ease-in-out infinite; }
.quest-card{ border-radius:var(--radius); }
.quest-status{
  display:inline-flex; align-items:center; gap:.4rem; font-family:var(--ff-head); font-size:.62rem;
  letter-spacing:2px; text-transform:uppercase; padding:.3rem .7rem; border-radius:20px; margin-bottom:var(--sp-2);
  border:1px solid var(--border-soft); color:var(--text-mute);
}
.quest-status.active{ color:var(--green); border-color:rgba(0,255,157,.4); background:rgba(0,255,157,.08); }
.quest-status.done{ color:var(--cyan); border-color:var(--border); background:rgba(0,245,255,.06); }
.quest-card h3{ font-family:var(--ff-head); font-size:1.15rem; margin-bottom:.35rem; color:var(--text); }
.quest-meta{ display:flex; flex-wrap:wrap; gap:.4rem 1rem; font-size:.85rem; color:var(--text-dim); margin-bottom:.7rem; }
.quest-meta .guild{ color:var(--purple); font-weight:700; }
.quest-meta .guild i{ margin-right:.35rem; }
.quest-card p{ color:var(--text-dim); font-size:.98rem; margin-bottom:var(--sp-2); }
.quest-tags{ display:flex; flex-wrap:wrap; gap:.5rem; }
.quest-tags span{
  font-size:.68rem; font-family:var(--ff-head); letter-spacing:.5px; color:var(--pink);
  border:1px solid rgba(240,171,252,.35); background:rgba(240,171,252,.07);
  padding:.3rem .6rem; border-radius:6px;
}

/* ============================================================
   MISSIONS (PROJECTS)
============================================================ */
.mission-grid{ display:grid; grid-template-columns:1fr; gap:var(--sp-4); }
@media (min-width:720px){ .mission-grid{ grid-template-columns:repeat(2,1fr); } }
.mission-card{
  border-radius:var(--radius); display:flex; flex-direction:column; height:100%;
  transition:transform .12s ease, box-shadow .3s ease, border-color .3s ease; will-change:transform;
}
.mission-card:hover{ box-shadow:0 18px 40px rgba(0,245,255,.18); border-color:var(--border); }
.mission-top{ display:flex; align-items:center; justify-content:space-between; margin-bottom:var(--sp-2); flex-wrap:wrap; gap:.5rem; }
.rank{
  font-family:var(--ff-head); font-size:.68rem; font-weight:800; letter-spacing:1.5px;
  padding:.3rem .65rem; border-radius:6px; text-shadow:0 0 8px currentColor;
}
.rank-s{ color:var(--gold); background:rgba(255,209,102,.1); border:1px solid rgba(255,209,102,.4); }
.rank-a{ color:var(--cyan); background:rgba(0,245,255,.08); border:1px solid var(--border); }
.status-complete{
  display:inline-flex; align-items:center; gap:.35rem; font-family:var(--ff-head); font-size:.65rem;
  letter-spacing:1px; color:var(--green); text-transform:uppercase;
}
.mission-title{ font-family:var(--ff-head); font-size:1.2rem; margin-bottom:.5rem; color:var(--text); }
.mission-brief{ color:var(--text-dim); font-size:.95rem; margin-bottom:var(--sp-3); flex:1; }
.mission-loadout{ margin-top:auto; }
.loadout-label{ display:block; font-family:var(--ff-head); font-size:.62rem; letter-spacing:2px; color:var(--text-mute); text-transform:uppercase; margin-bottom:.5rem; }
.loadout-tags{ display:flex; flex-wrap:wrap; gap:.45rem; }
.loadout-tags span{
  font-size:.72rem; font-weight:700; color:var(--purple); border:1px solid rgba(168,85,247,.35);
  background:rgba(168,85,247,.08); padding:.3rem .6rem; border-radius:6px;
}

/* ============================================================
   ACHIEVEMENTS
============================================================ */
.badge-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(230px,1fr)); gap:var(--sp-4); }
.badge-card{
  border-radius:var(--radius); text-align:center; transition:transform .3s ease, box-shadow .3s ease;
  display:flex; flex-direction:column; align-items:center;
}
.badge-card:hover{ transform:translateY(-6px) scale(1.02); box-shadow:0 16px 34px rgba(255,209,102,.15); }
.badge-icon{
  width:64px; height:64px; border-radius:50%; margin-bottom:var(--sp-2);
  display:flex; align-items:center; justify-content:center; font-size:1.6rem;
  background:radial-gradient(circle at 35% 30%, rgba(255,209,102,.22), rgba(10,16,32,.9));
  border:2px solid var(--gold); color:var(--gold); box-shadow:0 0 22px rgba(255,209,102,.35);
}
.badge-title{ font-family:var(--ff-head); font-size:1rem; margin-bottom:.4rem; color:var(--text); }
.badge-desc{ font-size:.85rem; color:var(--text-dim); margin-bottom:var(--sp-2); }
.badge-unlocked{
  display:inline-flex; align-items:center; gap:.35rem; font-family:var(--ff-head); font-size:.62rem;
  letter-spacing:1.5px; color:var(--green); text-transform:uppercase;
  border:1px solid rgba(0,255,157,.35); background:rgba(0,255,157,.08); padding:.3rem .7rem; border-radius:20px;
}

/* ============================================================
   CONTACT
============================================================ */
.contact-grid{ display:grid; grid-template-columns:1fr; gap:var(--sp-4); }
@media (min-width:860px){ .contact-grid{ grid-template-columns:.85fr 1.15fr; align-items:start; } }
.contact-info, .contact-form-panel{ border-radius:var(--radius); }
.contact-info h3, .contact-form-panel h3{ font-family:var(--ff-head); font-size:1.1rem; margin-bottom:var(--sp-3); color:var(--text); }
.contact-link{
  display:flex; align-items:center; gap:.8rem; padding:.85rem 1rem; border-radius:var(--radius-sm);
  border:1px solid var(--border-soft); background:rgba(255,255,255,.03); margin-bottom:.7rem;
  transition:all .25s ease; font-weight:600; word-break:break-word;
}
.contact-link i{ color:var(--cyan); font-size:1.1rem; width:20px; text-align:center; flex-shrink:0; }
.contact-link:hover{ border-color:var(--border); background:rgba(0,245,255,.07); transform:translateX(4px); }
.status-line{ display:flex; align-items:center; gap:.5rem; font-size:.85rem; color:var(--text-dim); margin-top:var(--sp-2); }
.dot.green{ width:8px; height:8px; border-radius:50%; background:var(--green); box-shadow:0 0 8px var(--green); display:inline-block; animation:blipPulse 2s ease-in-out infinite; }

.field{ margin-bottom:var(--sp-3); }
.field label{ display:block; font-family:var(--ff-head); font-size:.68rem; letter-spacing:1.5px; text-transform:uppercase; color:var(--text-mute); margin-bottom:.5rem; }
.field input, .field textarea{
  width:100%; background:rgba(255,255,255,.04); border:1px solid var(--border-soft); border-radius:var(--radius-sm);
  padding:.85rem 1rem; color:var(--text); font-size:1rem; transition:all .25s ease; resize:vertical;
}
.field input:focus, .field textarea:focus{ border-color:var(--cyan); box-shadow:0 0 0 3px rgba(0,245,255,.15); outline:none; }
.field input::placeholder, .field textarea::placeholder{ color:var(--text-mute); }

.form-status{ margin-top:var(--sp-3); font-family:var(--ff-head); font-size:.78rem; letter-spacing:1px; min-height:1.4em; }
.form-status.ok{ color:var(--green); }
.form-status.err{ color:var(--red); }
.form-status.pending{ color:var(--cyan); }

/* ============================================================
   FOOTER
============================================================ */
.site-footer{ position:relative; z-index:1; border-top:1px solid var(--border-soft); padding:var(--sp-5) 0 var(--sp-3); }
.footer-inner{ display:flex; flex-wrap:wrap; gap:var(--sp-4); align-items:center; justify-content:space-between; margin-bottom:var(--sp-4); }
.footer-brand{ font-family:var(--ff-head); font-weight:800; letter-spacing:2px; font-size:1.1rem; }
.footer-brand span{ color:var(--purple); }
.footer-nav{ display:flex; flex-wrap:wrap; gap:1.2rem; }
.footer-nav a{ font-size:.85rem; color:var(--text-dim); transition:color .2s ease; }
.footer-nav a:hover{ color:var(--cyan); }
.footer-social{ display:flex; gap:.7rem; }
.footer-social a{
  width:38px; height:38px; border-radius:8px; display:flex; align-items:center; justify-content:center;
  border:1px solid var(--border-soft); color:var(--text-dim); transition:all .25s ease;
}
.footer-social a:hover{ color:var(--cyan); border-color:var(--border); box-shadow:0 0 16px rgba(0,245,255,.3); transform:translateY(-3px); }
.footer-bottom{
  display:flex; flex-wrap:wrap; gap:.7rem; justify-content:space-between; padding-top:var(--sp-3);
  border-top:1px solid var(--border-soft); font-size:.78rem; color:var(--text-mute);
}
.sys-status{ display:flex; align-items:center; gap:.5rem; font-family:var(--ff-head); letter-spacing:1px; }

/* ============================================================
   BACK TO TOP
============================================================ */
.back-to-top{
  position:fixed; bottom:24px; right:24px; z-index:300;
  width:48px; height:48px; border-radius:50%;
  background:rgba(5,8,16,.85); border:1px solid var(--border); color:var(--cyan);
  display:flex; align-items:center; justify-content:center; font-size:1.1rem;
  backdrop-filter:blur(10px); box-shadow:0 0 20px rgba(0,245,255,.2);
  opacity:0; visibility:hidden; transform:translateY(10px);
  transition:all .3s ease;
}
.back-to-top.show{ opacity:1; visibility:visible; transform:translateY(0); }
.back-to-top:hover{ box-shadow:0 0 28px rgba(0,245,255,.5); transform:translateY(-3px); }

/* ============================================================
   RESPONSIVE TWEAKS
============================================================ */
@media (max-width:480px){
  .panel{ padding:var(--sp-3); }
  .profile-card{ padding:var(--sp-3); }
  .section{ padding:var(--sp-6) 0; }
}
</style>
</head>
<body>

<a href="#main" class="skip-link">Skip to main content</a>

<!-- SVG defs for ring gradient (shared) -->
<svg width="0" height="0" style="position:absolute">
  <defs>
    <linearGradient id="ringGrad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#00f5ff" />
      <stop offset="100%" stop-color="#a855f7" />
    </linearGradient>
  </defs>
</svg>

<!-- BOOT SCREEN -->
<noscript><style>#boot-screen{ display:none !important; }</style></noscript>
<div id="boot-screen">
  <div class="boot-inner">
    <div class="boot-logo">M.E.A.<span>KHAN</span></div>
    <div class="boot-bar"><div class="boot-fill" id="boot-fill"></div></div>
    <div class="boot-text" id="boot-text">Initializing player profile…</div>
  </div>
</div>

<!-- NAV -->
<header class="site-nav">
  <div class="nav-inner">
    <a href="#home" class="brand sfx"><span class="brand-mark">◈</span>ESTIAQUE<span>.KHAN</span></a>
    <nav class="nav-links" aria-label="Primary">
      <a href="#home" class="sfx">Home</a>
      <a href="#bio" class="sfx">Bio</a>
      <a href="#abilities" class="sfx">Abilities</a>
      <a href="#questlog" class="sfx">Quest Log</a>
      <a href="#missions" class="sfx">Missions</a>
      <a href="#achievements" class="sfx">Badges</a>
      <a href="#contact" class="sfx">Transmit</a>
    </nav>
    <div class="nav-status">
      <span><span class="status-dot"></span> ONLINE</span>
      <span id="nav-clock">00:00:00</span>
    </div>
    <button class="nav-toggle sfx" id="nav-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-panel">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>
<nav class="mobile-panel" id="mobile-panel" aria-label="Mobile">
  <a href="#home">Home</a>
  <a href="#bio">Bio</a>
  <a href="#abilities">Abilities</a>
  <a href="#questlog">Quest Log</a>
  <a href="#missions">Missions</a>
  <a href="#achievements">Badges</a>
  <a href="#contact">Transmit</a>
</nav>

<main id="main">

  <!-- ============================================================
       HERO — PLAYER PROFILE
  ============================================================ -->
  <section id="home" class="hero">
    <div class="hero-bg" aria-hidden="true">
      <div class="hero-glow g1"></div>
      <div class="hero-glow g2"></div>
    </div>
    <div class="hero-inner">
      <div class="profile-card panel hud-frame reveal">
        <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
        <div class="profile-top">
          <div class="avatar-wrap" aria-hidden="true">
            <div class="avatar-ring ring-outer"></div>
            <div class="avatar-ring ring-mid"></div>
            <div class="avatar-hex">
              <div class="avatar-core"><i class="fa-solid fa-user-gear"></i></div>
            </div>
            <div class="level-badge">LV <span id="hero-level">24</span></div>
          </div>
          <div class="profile-id">
            <span class="tag-online"><span class="dot"></span> Player Online</span>
            <h1 class="player-name">M. Estiaque Ahmed Khan</h1>
            <div class="player-class">Class: <strong>Full-Stack Engineer</strong><span class="sep">/</span>Software Engineer</div>
            <div class="quick-stats">
              <span class="qstat"><i class="fa-solid fa-building"></i> 3 Guilds Joined</span>
              <span class="qstat"><i class="fa-solid fa-flag-checkered"></i> 4 Missions Completed</span>
              <span class="qstat"><i class="fa-solid fa-graduation-cap"></i> MSc Computer Science</span>
            </div>
          </div>
        </div>

        <div class="xp-block">
          <div class="xp-label"><span>Experience Points</span><span>8,400 / 10,000 XP</span></div>
          <div class="xp-bar"><div class="xp-fill" id="hero-xp" data-target="84"></div></div>
          <div class="xp-next">Next Rank: Senior Software Architect</div>
        </div>

        <div class="hero-actions">
          <a href="#missions" class="btn-primary sfx"><i class="fa-solid fa-crosshairs"></i> View Missions</a>
          <a href="#contact" class="btn-ghost sfx"><i class="fa-solid fa-satellite-dish"></i> Send Transmission</a>
        </div>
      </div>
    </div>
    <div class="scroll-cue" aria-hidden="true">Scroll <i class="fa-solid fa-chevron-down"></i></div>
  </section>

  <!-- ============================================================
       CHARACTER BIO
  ============================================================ -->
  <section id="bio" class="section">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">// 01 — character_bio.dat</span>
        <h2 class="title">Character <span class="accent">Bio</span></h2>
        <p class="sub">Player background, origin story, and unlocked education certifications.</p>
      </div>

      <div class="bio-grid">
        <div class="panel hud-frame bio-panel reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="bio-icon"><i class="fa-solid fa-scroll"></i></div>
          <p class="bio-text">Full-stack developer with hands-on experience across frontend optimization, database management, PHP/Laravel web application development, custom inventory management modules, enterprise automation solutions, and ERP systems integration.</p>
          <div class="trait-tags">
            <span>Frontend Optimization</span>
            <span>Database Management</span>
            <span>Laravel Development</span>
            <span>Inventory Modules</span>
            <span>Enterprise Automation</span>
            <span>ERP Integration</span>
          </div>
        </div>

        <div class="panel hud-frame cert-panel reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <h3 class="cert-heading"><i class="fa-solid fa-graduation-cap"></i> Certifications Unlocked</h3>
          <ul class="cert-list">
            <li>
              <div class="cert-icon"><i class="fa-solid fa-award"></i></div>
              <div>
                <div class="cert-name">MSc in Computer Science</div>
                <div class="cert-meta">Uttara University · Class of 2025</div>
              </div>
            </li>
            <li>
              <div class="cert-icon"><i class="fa-solid fa-award"></i></div>
              <div>
                <div class="cert-name">BSc in Computer Science &amp; Engineering</div>
                <div class="cert-meta">Uttara University · Class of 2021</div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       ABILITIES (SKILLS)
  ============================================================ -->
  <section id="abilities" class="section alt">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">// 02 — ability_tree.sys</span>
        <h2 class="title">Abilities <span class="accent">Unlocked</span></h2>
        <p class="sub">Passive and active skills mastered across the stack. Mastery rings fill as they enter view.</p>
      </div>

      <div class="ability-tabs" role="tablist" aria-label="Filter abilities by category">
        <button class="tab-btn sfx active" data-group="all" role="tab" aria-selected="true">All Abilities</button>
        <button class="tab-btn sfx" data-group="backend" role="tab" aria-selected="false">Backend</button>
        <button class="tab-btn sfx" data-group="frontend" role="tab" aria-selected="false">Frontend</button>
        <button class="tab-btn sfx" data-group="devops" role="tab" aria-selected="false">DevOps &amp; Tools</button>
      </div>

      <div class="ability-grid" id="ability-grid">
        <!-- Backend -->
        <div class="ability-card reveal" data-group="backend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="95"/></svg><div class="ability-icon"><i class="fa-brands fa-php"></i></div></div>
          <h3 class="ability-name">PHP 8</h3><div class="ability-lvl">95% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="backend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="96"/></svg><div class="ability-icon"><i class="fa-solid fa-layer-group"></i></div></div>
          <h3 class="ability-name">Laravel</h3><div class="ability-lvl">96% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="backend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="90"/></svg><div class="ability-icon"><i class="fa-solid fa-database"></i></div></div>
          <h3 class="ability-name">MySQL</h3><div class="ability-lvl">90% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="backend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="82"/></svg><div class="ability-icon"><i class="fa-solid fa-server"></i></div></div>
          <h3 class="ability-name">PostgreSQL</h3><div class="ability-lvl">82% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="backend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="80"/></svg><div class="ability-icon"><i class="fa-solid fa-bolt"></i></div></div>
          <h3 class="ability-name">Redis</h3><div class="ability-lvl">80% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="backend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="88"/></svg><div class="ability-icon"><i class="fa-solid fa-diagram-project"></i></div></div>
          <h3 class="ability-name">REST API Design</h3><div class="ability-lvl">88% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="backend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="87"/></svg><div class="ability-icon"><i class="fa-solid fa-gauge-high"></i></div></div>
          <h3 class="ability-name">DB Optimization</h3><div class="ability-lvl">87% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="backend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="85"/></svg><div class="ability-icon"><i class="fa-solid fa-industry"></i></div></div>
          <h3 class="ability-name">ERP Integration</h3><div class="ability-lvl">85% Mastery</div>
        </div>

        <!-- Frontend -->
        <div class="ability-card reveal" data-group="frontend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="90"/></svg><div class="ability-icon"><i class="fa-brands fa-js"></i></div></div>
          <h3 class="ability-name">JavaScript ES6+</h3><div class="ability-lvl">90% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="frontend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="84"/></svg><div class="ability-icon"><i class="fa-brands fa-vuejs"></i></div></div>
          <h3 class="ability-name">Vue.js</h3><div class="ability-lvl">84% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="frontend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="86"/></svg><div class="ability-icon"><i class="fa-solid fa-bolt-lightning"></i></div></div>
          <h3 class="ability-name">Alpine.js</h3><div class="ability-lvl">86% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="frontend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="89"/></svg><div class="ability-icon"><i class="fa-solid fa-wave-square"></i></div></div>
          <h3 class="ability-name">Livewire</h3><div class="ability-lvl">89% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="frontend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="92"/></svg><div class="ability-icon"><i class="fa-solid fa-wind"></i></div></div>
          <h3 class="ability-name">Tailwind CSS</h3><div class="ability-lvl">92% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="frontend">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="88"/></svg><div class="ability-icon"><i class="fa-brands fa-bootstrap"></i></div></div>
          <h3 class="ability-name">Bootstrap 5</h3><div class="ability-lvl">88% Mastery</div>
        </div>

        <!-- DevOps & Tools -->
        <div class="ability-card reveal" data-group="devops">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="83"/></svg><div class="ability-icon"><i class="fa-brands fa-docker"></i></div></div>
          <h3 class="ability-name">Docker</h3><div class="ability-lvl">83% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="devops">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="93"/></svg><div class="ability-icon"><i class="fa-brands fa-git-alt"></i></div></div>
          <h3 class="ability-name">Git</h3><div class="ability-lvl">93% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="devops">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="78"/></svg><div class="ability-icon"><i class="fa-brands fa-aws"></i></div></div>
          <h3 class="ability-name">AWS</h3><div class="ability-lvl">78% Mastery</div>
        </div>
        <div class="ability-card reveal" data-group="devops">
          <div class="ability-ring"><svg class="ring-svg" viewBox="0 0 100 100"><circle class="ring-bg" cx="50" cy="50" r="42"/><circle class="ring-fill" cx="50" cy="50" r="42" data-pct="81"/></svg><div class="ability-icon"><i class="fa-solid fa-infinity"></i></div></div>
          <h3 class="ability-name">CI/CD</h3><div class="ability-lvl">81% Mastery</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CAREER PROGRESSION / QUEST LOG
  ============================================================ -->
  <section id="questlog" class="section">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">// 03 — quest_log.exe</span>
        <h2 class="title">Career <span class="accent">Progression</span></h2>
        <p class="sub">A chronological log of guilds joined and quests undertaken.</p>
      </div>

      <ol class="quest-log">
        <li class="quest active reveal">
          <div class="quest-marker"><i class="fa-solid fa-star"></i></div>
          <div class="quest-card panel hud-frame">
            <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
            <span class="quest-status active">Active Quest</span>
            <h3>Software Engineer</h3>
            <div class="quest-meta"><span class="guild"><i class="fa-solid fa-shield-halved"></i>Natore IT</span><span class="dates"><i class="fa-regular fa-calendar"></i> 2025 — Present</span></div>
            <p>Frontend optimization and database management for local business clients.</p>
            <div class="quest-tags"><span>+ Frontend Optimization</span><span>+ Database Management</span></div>
          </div>
        </li>
        <li class="quest reveal">
          <div class="quest-marker"><i class="fa-solid fa-check"></i></div>
          <div class="quest-card panel hud-frame">
            <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
            <span class="quest-status done">Quest Completed</span>
            <h3>Software Developer</h3>
            <div class="quest-meta"><span class="guild"><i class="fa-solid fa-shield-halved"></i>Isotope IT</span><span class="dates"><i class="fa-regular fa-calendar"></i> 2023 — 2025</span></div>
            <p>Specialized in PHP/Laravel web applications and custom inventory management modules.</p>
            <div class="quest-tags"><span>+ Laravel Applications</span><span>+ Inventory Modules</span></div>
          </div>
        </li>
        <li class="quest reveal">
          <div class="quest-marker"><i class="fa-solid fa-check"></i></div>
          <div class="quest-card panel hud-frame">
            <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
            <span class="quest-status done">Quest Completed</span>
            <h3>Software Engineer</h3>
            <div class="quest-meta"><span class="guild"><i class="fa-solid fa-shield-halved"></i>Barcode Tech Automation Ltd</span><span class="dates"><i class="fa-regular fa-calendar"></i> 2022 — 2023</span></div>
            <p>Leading development of enterprise automation solutions and ERP systems integration.</p>
            <div class="quest-tags"><span>+ Enterprise Automation</span><span>+ ERP Integration</span></div>
          </div>
        </li>
      </ol>
    </div>
  </section>

  <!-- ============================================================
       MISSIONS (PROJECTS)
  ============================================================ -->
  <section id="missions" class="section alt">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">// 04 — mission_control.log</span>
        <h2 class="title">Completed <span class="accent">Missions</span></h2>
        <p class="sub">Field-tested deployments, ranked by difficulty. All objectives cleared.</p>
      </div>

      <div class="mission-grid">
        <article class="mission-card panel hud-frame reveal" tabindex="0">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="mission-top">
            <span class="rank rank-s">S-Rank</span>
            <span class="status-complete"><i class="fa-solid fa-circle-check"></i> Completed</span>
          </div>
          <h3 class="mission-title">Port3folio Package</h3>
          <p class="mission-brief">A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
          <div class="mission-loadout">
            <span class="loadout-label">Loadout</span>
            <div class="loadout-tags"><span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span></div>
          </div>
        </article>

        <article class="mission-card panel hud-frame reveal" tabindex="0">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="mission-top">
            <span class="rank rank-s">S-Rank</span>
            <span class="status-complete"><i class="fa-solid fa-circle-check"></i> Completed</span>
          </div>
          <h3 class="mission-title">E-Commerce Platform</h3>
          <p class="mission-brief">High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
          <div class="mission-loadout">
            <span class="loadout-label">Loadout</span>
            <div class="loadout-tags"><span>Laravel</span><span>Vue.js</span><span>MySQL</span><span>Redis</span><span>Stripe</span></div>
          </div>
        </article>

        <article class="mission-card panel hud-frame reveal" tabindex="0">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="mission-top">
            <span class="rank rank-a">A-Rank</span>
            <span class="status-complete"><i class="fa-solid fa-circle-check"></i> Completed</span>
          </div>
          <h3 class="mission-title">SaaS Analytics Dashboard</h3>
          <p class="mission-brief">Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
          <div class="mission-loadout">
            <span class="loadout-label">Loadout</span>
            <div class="loadout-tags"><span>Laravel</span><span>Livewire</span><span>Alpine.js</span><span>PostgreSQL</span><span>Chart.js</span></div>
          </div>
        </article>

        <article class="mission-card panel hud-frame reveal" tabindex="0">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="mission-top">
            <span class="rank rank-a">A-Rank</span>
            <span class="status-complete"><i class="fa-solid fa-circle-check"></i> Completed</span>
          </div>
          <h3 class="mission-title">Inventory Management System</h3>
          <p class="mission-brief">Custom-built inventory &amp; ERP automation module for enterprise clients, covering stock tracking, procurement workflows, and reporting.</p>
          <div class="mission-loadout">
            <span class="loadout-label">Loadout</span>
            <div class="loadout-tags"><span>PHP</span><span>Laravel</span><span>MySQL</span><span>REST API</span></div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ============================================================
       ACHIEVEMENTS
  ============================================================ -->
  <section id="achievements" class="section">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">// 05 — trophy_case.dat</span>
        <h2 class="title">Achievements <span class="accent">Unlocked</span></h2>
        <p class="sub">Badges earned through real missions completed in the field.</p>
      </div>

      <div class="badge-grid">
        <div class="badge-card panel hud-frame reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="badge-icon"><i class="fa-solid fa-code"></i></div>
          <h3 class="badge-title">Full-Stack Master</h3>
          <p class="badge-desc">Shipped 4+ production Laravel systems end-to-end.</p>
          <span class="badge-unlocked"><i class="fa-solid fa-lock-open"></i> Unlocked</span>
        </div>
        <div class="badge-card panel hud-frame reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="badge-icon"><i class="fa-solid fa-industry"></i></div>
          <h3 class="badge-title">ERP Architect</h3>
          <p class="badge-desc">Delivered enterprise automation &amp; ERP systems integration.</p>
          <span class="badge-unlocked"><i class="fa-solid fa-lock-open"></i> Unlocked</span>
        </div>
        <div class="badge-card panel hud-frame reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="badge-icon"><i class="fa-solid fa-shield-halved"></i></div>
          <h3 class="badge-title">Veteran Engineer</h3>
          <p class="badge-desc">Years of field experience across three engineering guilds.</p>
          <span class="badge-unlocked"><i class="fa-solid fa-lock-open"></i> Unlocked</span>
        </div>
        <div class="badge-card panel hud-frame reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="badge-icon"><i class="fa-solid fa-gauge-high"></i></div>
          <h3 class="badge-title">Database Optimizer</h3>
          <p class="badge-desc">Tuned queries and schemas for high-performance data systems.</p>
          <span class="badge-unlocked"><i class="fa-solid fa-lock-open"></i> Unlocked</span>
        </div>
        <div class="badge-card panel hud-frame reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="badge-icon"><i class="fa-solid fa-graduation-cap"></i></div>
          <h3 class="badge-title">MSc Graduate</h3>
          <p class="badge-desc">Master's Degree in Computer Science, Uttara University.</p>
          <span class="badge-unlocked"><i class="fa-solid fa-lock-open"></i> Unlocked</span>
        </div>
        <div class="badge-card panel hud-frame reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="badge-icon"><i class="fa-solid fa-cart-shopping"></i></div>
          <h3 class="badge-title">Marketplace Builder</h3>
          <p class="badge-desc">Shipped a real-time multi-vendor e-commerce platform.</p>
          <span class="badge-unlocked"><i class="fa-solid fa-lock-open"></i> Unlocked</span>
        </div>
        <div class="badge-card panel hud-frame reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="badge-icon"><i class="fa-brands fa-github"></i></div>
          <h3 class="badge-title">Open Source Contributor</h3>
          <p class="badge-desc">Built Port3folio, a zero-config Laravel portfolio package.</p>
          <span class="badge-unlocked"><i class="fa-solid fa-lock-open"></i> Unlocked</span>
        </div>
        <div class="badge-card panel hud-frame reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <div class="badge-icon"><i class="fa-solid fa-chart-line"></i></div>
          <h3 class="badge-title">Realtime Analyst</h3>
          <p class="badge-desc">Engineered a dashboard processing millions of events per day.</p>
          <span class="badge-unlocked"><i class="fa-solid fa-lock-open"></i> Unlocked</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CONTACT — SEND TRANSMISSION
  ============================================================ -->
  <section id="contact" class="section alt">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">// 06 — comms_terminal.io</span>
        <h2 class="title">Send <span class="accent">Transmission</span></h2>
        <p class="sub">Open a channel. All frequencies monitored — replies typically within 24 hours.</p>
      </div>

      <div class="contact-grid">
        <div class="panel hud-frame contact-info reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <h3>Comm Channels</h3>
          <a href="mailto:mrm.khan.1298@gmail.com" class="contact-link sfx">
            <i class="fa-solid fa-envelope"></i><span>mrm.khan.1298@gmail.com</span>
          </a>
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" class="contact-link sfx">
            <i class="fa-brands fa-github"></i><span>github.com/mestiaque</span>
          </a>
          <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" class="contact-link sfx">
            <i class="fa-brands fa-linkedin"></i><span>linkedin.com/in/mestiaque</span>
          </a>
          <div class="status-line"><span class="dot green"></span> Status: Open to new missions</div>
        </div>

        <div class="panel hud-frame contact-form-panel reveal">
          <span class="corner tl"></span><span class="corner tr"></span><span class="corner bl"></span><span class="corner br"></span>
          <h3>Message Composer</h3>
          <form id="transmission-form" novalidate>
            <div class="field">
              <label for="f-name">Callsign (Name)</label>
              <input id="f-name" name="name" type="text" placeholder="Your name" required autocomplete="name" />
            </div>
            <div class="field">
              <label for="f-email">Comm Frequency (Email)</label>
              <input id="f-email" name="email" type="email" placeholder="you@example.com" required autocomplete="email" />
            </div>
            <div class="field">
              <label for="f-subject">Subject</label>
              <input id="f-subject" name="subject" type="text" placeholder="Mission briefing subject" required />
            </div>
            <div class="field">
              <label for="f-message">Message</label>
              <textarea id="f-message" name="message" rows="5" placeholder="Transmit your message…" required></textarea>
            </div>
            <button type="submit" class="btn-primary sfx" id="transmit-btn">
              <i class="fa-solid fa-satellite-dish"></i> <span id="transmit-btn-text">Send Transmission</span>
            </button>
            <div class="form-status" id="form-status" role="status" aria-live="polite"></div>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-inner">
      <div class="footer-brand">M.E.A.<span>KHAN</span></div>
      <nav class="footer-nav" aria-label="Footer">
        <a href="#home">Home</a>
        <a href="#bio">Bio</a>
        <a href="#abilities">Abilities</a>
        <a href="#missions">Missions</a>
        <a href="#contact">Transmit</a>
      </nav>
      <div class="footer-social">
        <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" class="sfx" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
        <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" class="sfx" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
        <a href="mailto:mrm.khan.1298@gmail.com" class="sfx" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <span id="year"></span> M. Estiaque Ahmed Khan. All systems nominal.</span>
      <span class="sys-status"><span class="status-dot"></span> System Online</span>
    </div>
  </div>
</footer>

<button class="back-to-top sfx" id="back-to-top" aria-label="Back to top"><i class="fa-solid fa-chevron-up"></i></button>

<script>
'use strict';

/* ============================================================
   BOOT SEQUENCE
============================================================ */
(function boot(){
  const screen = document.getElementById('boot-screen');
  const fill = document.getElementById('boot-fill');
  const text = document.getElementById('boot-text');
  if(!screen) return;

  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const messages = ['Initializing player profile…','Loading ability tree…','Syncing quest log…','Ready.'];
  let done = false;

  function dismiss(){
    if(done) return;
    done = true;
    screen.classList.add('hidden');
    document.body.style.overflow = '';
    setTimeout(()=>{ if(screen.parentNode) screen.setAttribute('aria-hidden','true'); }, 650);
  }

  if(reduced){ dismiss(); return; }

  document.body.style.overflow = 'hidden';
  screen.addEventListener('click', dismiss);

  requestAnimationFrame(()=>{ if(fill) fill.style.width = '100%'; });

  let i = 0;
  const msgTimer = setInterval(()=>{
    i++;
    if(text && messages[i]) text.textContent = messages[i];
    if(i >= messages.length - 1) clearInterval(msgTimer);
  }, 320);

  setTimeout(dismiss, 1500);
  // Safety net in case anything above fails silently
  setTimeout(dismiss, 4000);
})();

/* ============================================================
   MOBILE NAV
============================================================ */
(function mobileNav(){
  const toggle = document.getElementById('nav-toggle');
  const panel = document.getElementById('mobile-panel');
  if(!toggle || !panel) return;

  function close(){
    toggle.classList.remove('open');
    panel.classList.remove('open');
    toggle.setAttribute('aria-expanded','false');
  }
  function open(){
    toggle.classList.add('open');
    panel.classList.add('open');
    toggle.setAttribute('aria-expanded','true');
  }

  toggle.addEventListener('click', ()=>{
    const isOpen = panel.classList.contains('open');
    isOpen ? close() : open();
  });
  panel.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
  document.addEventListener('keydown', e => { if(e.key === 'Escape') close(); });
})();

/* ============================================================
   LIVE CLOCK
============================================================ */
(function clock(){
  const el = document.getElementById('nav-clock');
  if(!el) return;
  function tick(){
    const now = new Date();
    const h = String(now.getHours()).padStart(2,'0');
    const m = String(now.getMinutes()).padStart(2,'0');
    const s = String(now.getSeconds()).padStart(2,'0');
    el.textContent = h + ':' + m + ':' + s;
  }
  tick();
  setInterval(tick, 1000);
})();

/* ============================================================
   FOOTER YEAR
============================================================ */
(function footerYear(){
  const el = document.getElementById('year');
  if(el) el.textContent = new Date().getFullYear();
})();

/* ============================================================
   SFX PULSE (visual click feedback)
============================================================ */
(function sfxPulse(){
  document.addEventListener('pointerdown', e => {
    const target = e.target.closest ? e.target.closest('.sfx') : null;
    if(!target) return;
    target.classList.remove('pulse');
    // force reflow so the animation restarts on rapid re-clicks
    void target.offsetWidth;
    target.classList.add('pulse');
    setTimeout(()=> target.classList.remove('pulse'), 550);
  });
})();

/* ============================================================
   ACTIVE NAV LINK ON SCROLL
============================================================ */
(function activeNav(){
  const sections = Array.from(document.querySelectorAll('main section[id]'));
  const navLinks = Array.from(document.querySelectorAll('.nav-links a, .mobile-panel a'));
  if(!sections.length || !navLinks.length || !('IntersectionObserver' in window)) return;

  const io = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting){
        const id = entry.target.getAttribute('id');
        navLinks.forEach(link=>{
          const match = link.getAttribute('href') === '#' + id;
          link.classList.toggle('active', match);
        });
      }
    });
  }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });

  sections.forEach(sec => io.observe(sec));
})();

/* ============================================================
   REVEAL ON SCROLL + BAR / RING FILLS
============================================================ */
(function revealAndFills(){
  const revealEls = Array.from(document.querySelectorAll('.reveal'));
  const heroXp = document.getElementById('hero-xp');
  const rings = Array.from(document.querySelectorAll('.ring-fill'));

  // Prep ring circumferences upfront
  rings.forEach(circle=>{
    const r = circle.r.baseVal.value;
    const c = 2 * Math.PI * r;
    circle.style.strokeDasharray = c;
    circle.style.strokeDashoffset = c;
  });

  if(!('IntersectionObserver' in window)){
    // Fallback: reveal everything immediately, fill bars instantly
    revealEls.forEach(el => el.classList.add('in-view'));
    if(heroXp) heroXp.style.width = (heroXp.dataset.target || 0) + '%';
    rings.forEach(circle=>{
      const c = parseFloat(circle.style.strokeDasharray);
      const pct = parseFloat(circle.dataset.pct || '0');
      circle.style.strokeDashoffset = c - (c * pct / 100);
    });
    return;
  }

  const revealIO = new IntersectionObserver((entries, obs)=>{
    entries.forEach((entry, idx)=>{
      if(entry.isIntersecting){
        entry.target.style.transitionDelay = Math.min(idx * 60, 300) + 'ms';
        entry.target.classList.add('in-view');
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
  revealEls.forEach(el => revealIO.observe(el));

  const ringIO = new IntersectionObserver((entries, obs)=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting){
        const circle = entry.target;
        const c = parseFloat(circle.style.strokeDasharray);
        const pct = parseFloat(circle.dataset.pct || '0');
        circle.style.strokeDashoffset = c - (c * pct / 100);
        obs.unobserve(circle);
      }
    });
  }, { threshold: 0.4 });
  rings.forEach(circle => ringIO.observe(circle));

  if(heroXp){
    const xpIO = new IntersectionObserver((entries, obs)=>{
      entries.forEach(entry=>{
        if(entry.isIntersecting){
          heroXp.style.width = (heroXp.dataset.target || 0) + '%';
          obs.unobserve(heroXp);
        }
      });
    }, { threshold: 0.3 });
    xpIO.observe(heroXp);
  }
})();

/* ============================================================
   ABILITY TAB FILTER
============================================================ */
(function abilityTabs(){
  const tabs = Array.from(document.querySelectorAll('.tab-btn'));
  const cards = Array.from(document.querySelectorAll('#ability-grid .ability-card'));
  if(!tabs.length) return;

  tabs.forEach(tab=>{
    tab.addEventListener('click', ()=>{
      const group = tab.dataset.group;
      tabs.forEach(t=>{ t.classList.remove('active'); t.setAttribute('aria-selected','false'); });
      tab.classList.add('active');
      tab.setAttribute('aria-selected','true');

      cards.forEach(card=>{
        const show = group === 'all' || card.dataset.group === group;
        card.classList.toggle('is-hidden', !show);
      });
    });
  });
})();

/* ============================================================
   MISSION CARD TILT (desktop pointer devices only)
============================================================ */
(function missionTilt(){
  const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if(!canHover || reduced) return;

  document.querySelectorAll('.mission-card').forEach(card=>{
    card.addEventListener('mousemove', e=>{
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const rotX = ((y / rect.height) - 0.5) * -8;
      const rotY = ((x / rect.width) - 0.5) * 8;
      card.style.transform = 'perspective(700px) rotateX(' + rotX + 'deg) rotateY(' + rotY + 'deg) translateY(-4px)';
    });
    card.addEventListener('mouseleave', ()=>{
      card.style.transform = '';
    });
  });
})();

/* ============================================================
   BACK TO TOP
============================================================ */
(function backToTop(){
  const btn = document.getElementById('back-to-top');
  if(!btn) return;
  window.addEventListener('scroll', ()=>{
    btn.classList.toggle('show', window.scrollY > 600);
  }, { passive: true });
  btn.addEventListener('click', ()=>{
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
})();

/* ============================================================
   CONTACT FORM — SEND TRANSMISSION
============================================================ */
(function transmissionForm(){
  const form = document.getElementById('transmission-form');
  const status = document.getElementById('form-status');
  const btn = document.getElementById('transmit-btn');
  const btnText = document.getElementById('transmit-btn-text');
  if(!form) return;

  form.addEventListener('submit', async (e)=>{
    e.preventDefault();

    const name = document.getElementById('f-name').value.trim();
    const email = document.getElementById('f-email').value.trim();
    const subject = document.getElementById('f-subject').value.trim();
    const message = document.getElementById('f-message').value.trim();

    if(!name || !email || !subject || !message){
      status.textContent = 'ALL FIELDS REQUIRED TO OPEN CHANNEL.';
      status.className = 'form-status err';
      return;
    }

    btn.disabled = true;
    const originalText = btnText.textContent;
    btnText.textContent = 'Transmitting…';
    status.textContent = 'Establishing uplink…';
    status.className = 'form-status pending';

    try {
      const res = await fetch('/api/messages-store', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({ name, email, subject, message })
      });

      if(res.ok){
        status.textContent = 'MESSAGE TRANSMITTED — SIGNAL RECEIVED.';
        status.className = 'form-status ok';
        form.reset();
      } else {
        let msg = 'TRANSMISSION FAILED — CHANNEL REJECTED (' + res.status + ').';
        try {
          const data = await res.json();
          if(data && data.message) msg = 'TRANSMISSION FAILED — ' + data.message.toUpperCase();
        } catch(_){ /* ignore parse errors, use default message */ }
        status.textContent = msg;
        status.className = 'form-status err';
      }
    } catch(err){
      status.textContent = 'TRANSMISSION FAILED — NO SIGNAL. CHECK CONNECTION AND RETRY.';
      status.className = 'form-status err';
    } finally {
      btn.disabled = false;
      btnText.textContent = originalText;
    }
  });
})();
</script>
</body>
</html>
