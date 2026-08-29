<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan — Full-Stack Laravel Developer | Cyberpunk Terminal</title>
<meta name="description" content="M. Estiaque Ahmed Khan — Software Engineer & Full-Stack Laravel Developer. PHP, Laravel, Vue.js, ERP integrations, database optimization and enterprise automation, presented as a cyberpunk hacker terminal portfolio." />
<meta name="theme-color" content="#05060d" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800;900&family=Share+Tech+Mono&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<!-- GSAP (used for a few reveal/scroll flourishes) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<style>
/* ============================================================
   RESET & BASE
   ============================================================ */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

:root{
  --black:#020204;
  --bg:#05060d;
  --bg-alt:#090c16;
  --panel: rgba(9,13,23,0.82);
  --panel-solid:#0b0f1a;
  --cyan:#00fff2;
  --cyan-dim:#0aa8a0;
  --cyan-soft: rgba(0,255,242,0.14);
  --pink:#ff2ee6;
  --pink-dim:#a3159a;
  --pink-soft: rgba(255,46,230,0.14);
  --green:#39ff88;
  --yellow:#f8f32b;
  --red:#ff3860;
  --text:#dcf3f7;
  --text-dim:#84a0ac;
  --text-dimmer:#4b5c66;
  --border: rgba(0,255,242,0.22);
  --border-pink: rgba(255,46,230,0.22);
  --font-display:'Orbitron', sans-serif;
  --font-mono:'Share Tech Mono', monospace;
  --font-body:'Rajdhani', sans-serif;
  --s1:8px; --s2:16px; --s3:24px; --s4:32px; --s5:48px; --s6:64px; --s7:96px;
  --radius:3px;
  --nav-h:72px;
}

html{ scroll-behavior:smooth; }

body{
  background:var(--bg);
  color:var(--text);
  font-family:var(--font-body);
  font-size:16px;
  line-height:1.6;
  overflow-x:hidden;
  position:relative;
  -webkit-font-smoothing:antialiased;
}

img,svg,canvas{ display:block; max-width:100%; }

a{ color:inherit; text-decoration:none; }

ul{ list-style:none; }

button{ font-family:inherit; cursor:pointer; background:none; border:none; color:inherit; }

input, textarea{ font-family:inherit; }

h1,h2,h3,h4{ font-family:var(--font-display); font-weight:700; letter-spacing:0.02em; }

::selection{ background:var(--pink); color:var(--black); }

::-webkit-scrollbar{ width:10px; }
::-webkit-scrollbar-track{ background:var(--bg); }
::-webkit-scrollbar-thumb{ background:linear-gradient(var(--cyan),var(--pink)); border-radius:10px; }

:focus-visible{
  outline: 2px solid var(--cyan);
  outline-offset: 3px;
  box-shadow: 0 0 0 4px rgba(0,255,242,0.2);
}

.skip-link{
  position:absolute; left:-999px; top:0; z-index:9999;
  background:var(--cyan); color:var(--black); padding:12px 20px;
  font-family:var(--font-mono); font-weight:700; border-radius:0 0 6px 0;
}
.skip-link:focus{ left:0; }

.sr-only{
  position:absolute; width:1px; height:1px; padding:0; margin:-1px;
  overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0;
}

/* ============================================================
   BACKGROUND LAYERS — grid / scanlines / noise / particles
   ============================================================ */
.bg-grid{
  position:fixed; inset:0; z-index:0; pointer-events:none;
  background-image:
    linear-gradient(rgba(0,255,242,0.06) 1px, transparent 1px),
    linear-gradient(90deg, rgba(0,255,242,0.06) 1px, transparent 1px);
  background-size:42px 42px;
  -webkit-mask-image: radial-gradient(ellipse 90% 70% at 50% 0%, #000 40%, transparent 100%);
  mask-image: radial-gradient(ellipse 90% 70% at 50% 0%, #000 40%, transparent 100%);
  animation: gridDrift 22s linear infinite;
}
@keyframes gridDrift{
  0%{ background-position:0 0, 0 0; }
  100%{ background-position:42px 84px, 42px 84px; }
}

#particles{
  position:fixed; inset:0; z-index:0; pointer-events:none; width:100%; height:100%;
}

.scanlines{
  position:fixed; inset:0; z-index:3; pointer-events:none;
  background: repeating-linear-gradient(
    to bottom,
    rgba(0,0,0,0) 0px,
    rgba(0,0,0,0) 2px,
    rgba(0,0,0,0.28) 3px,
    rgba(0,0,0,0) 4px
  );
  opacity:0.5;
}
.scanlines::after{
  content:'';
  position:absolute; left:0; right:0; height:120px;
  background:linear-gradient(to bottom, rgba(0,255,242,0) 0%, rgba(0,255,242,0.05) 50%, rgba(0,255,242,0) 100%);
  animation: scanSweep 7s linear infinite;
}
@keyframes scanSweep{
  0%{ top:-120px; }
  100%{ top:100%; }
}

.vignette{
  position:fixed; inset:0; z-index:2; pointer-events:none;
  background: radial-gradient(ellipse at center, rgba(0,0,0,0) 45%, rgba(0,0,0,0.75) 100%);
}

/* corner HUD widgets */
.hud-corner{
  position:fixed; z-index:5; font-family:var(--font-mono); font-size:10px;
  color: var(--cyan-dim); letter-spacing:0.08em; pointer-events:none;
  display:flex; flex-direction:column; gap:2px; opacity:0.55;
}
.hud-tl{ top:calc(var(--nav-h) + 14px); left:14px; }
.hud-br{ bottom:14px; right:14px; text-align:right; }
.hud-corner span b{ color:var(--pink); font-weight:400; }
@media (max-width: 900px){ .hud-corner{ display:none; } }

/* ============================================================
   NAVBAR
   ============================================================ */
.navbar{
  position:fixed; top:0; left:0; right:0; z-index:200;
  height:var(--nav-h);
  display:flex; align-items:center;
  border-bottom:1px solid transparent;
  transition: background .35s ease, border-color .35s ease, backdrop-filter .35s ease;
}
.navbar.scrolled{
  background:rgba(4,5,10,0.86);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border-bottom-color: var(--border);
}
.nav-inner{
  width:100%; max-width:1320px; margin:0 auto; padding:0 var(--s3);
  display:flex; align-items:center; justify-content:space-between;
}
.logo{
  font-family:var(--font-display); font-weight:900; font-size:1.3rem;
  color:var(--cyan); letter-spacing:0.12em; position:relative;
  text-shadow:0 0 10px rgba(0,255,242,0.6);
}
.logo-blink{ color:var(--pink); animation: blink 1s steps(1) infinite; }

.nav-links{ display:flex; align-items:center; gap:var(--s4); }
.nav-link{
  font-family:var(--font-mono); font-size:0.78rem; letter-spacing:0.14em;
  text-transform:uppercase; color:var(--text-dim); position:relative; padding:6px 2px;
  transition:color .25s ease;
}
.nav-link::before{ content:'>'; margin-right:5px; color:var(--pink); opacity:0; transition:opacity .2s ease; }
.nav-link::after{
  content:''; position:absolute; left:0; bottom:0; height:1px; width:0;
  background:linear-gradient(90deg,var(--cyan),var(--pink)); transition:width .25s ease;
}
.nav-link:hover, .nav-link:focus-visible{ color:var(--cyan); }
.nav-link:hover::before, .nav-link:focus-visible::before{ opacity:1; }
.nav-link:hover::after, .nav-link:focus-visible::after{ width:100%; }
.nav-link.active{ color:var(--cyan); }
.nav-link.active::after{ width:100%; }
.nav-cta{
  border:1px solid var(--border); padding:8px 16px !important; border-radius:var(--radius);
  color:var(--cyan) !important;
}
.nav-cta:hover{ background:var(--cyan-soft); box-shadow:0 0 16px rgba(0,255,242,0.35); }

.nav-toggle{
  display:none; flex-direction:column; gap:5px; width:32px; height:26px; z-index:210;
}
.nav-toggle span{
  display:block; height:2px; width:100%; background:var(--cyan);
  box-shadow:0 0 6px rgba(0,255,242,0.7); transition:transform .3s ease, opacity .3s ease;
}
.nav-toggle.open span:nth-child(1){ transform:translateY(7px) rotate(45deg); }
.nav-toggle.open span:nth-child(2){ opacity:0; }
.nav-toggle.open span:nth-child(3){ transform:translateY(-7px) rotate(-45deg); }

@media (max-width: 880px){
  .nav-toggle{ display:flex; }
  .nav-links{
    position:fixed; top:var(--nav-h); left:0; right:0; bottom:0;
    background:rgba(3,4,9,0.98); backdrop-filter:blur(10px);
    flex-direction:column; justify-content:center; gap:var(--s5);
    transform:translateX(100%); transition:transform .35s ease;
    border-top:1px solid var(--border);
  }
  .nav-links.open{ transform:translateX(0); }
  .nav-link{ font-size:1.1rem; }
}

/* ============================================================
   LAYOUT HELPERS
   ============================================================ */
main{ position:relative; z-index:2; }
.section{ position:relative; padding:var(--s7) var(--s3); max-width:1320px; margin:0 auto; }
.section-head{ margin-bottom:var(--s5); max-width:760px; }
.section-tag{
  display:inline-flex; align-items:center; gap:8px;
  font-family:var(--font-mono); font-size:0.75rem; letter-spacing:0.32em;
  color:var(--pink); text-transform:uppercase; margin-bottom:var(--s2);
}
.section-tag::before{ content:'//'; color:var(--cyan); }
.section-title{
  font-size:clamp(1.9rem, 4.4vw, 3rem); color:var(--text); line-height:1.15; margin-bottom:var(--s2);
}
.section-title .accent{ color:var(--cyan); text-shadow:0 0 18px rgba(0,255,242,0.5); }
.section-desc{ color:var(--text-dim); font-size:1.05rem; max-width:640px; }

.glitch{ position:relative; display:inline-block; }
.glitch::before, .glitch::after{
  content: attr(data-text); position:absolute; top:0; left:0; width:100%; height:100%;
  background:transparent; overflow:hidden; opacity:0;
}
.glitch:hover::before, .glitch:hover::after, .glitch.auto-glitch::before, .glitch.auto-glitch::after{ opacity:1; }
.glitch::before{ color:var(--cyan); left:2px; text-shadow:-2px 0 var(--pink); clip-path: polygon(0 0,100% 0,100% 45%,0 45%); animation: glitchTop 2.2s infinite linear alternate-reverse; }
.glitch::after{ color:var(--pink); left:-2px; text-shadow:2px 0 var(--cyan); clip-path: polygon(0 55%,100% 55%,100% 100%,0 100%); animation: glitchBottom 2.6s infinite linear alternate-reverse; }
@keyframes glitchTop{ 0%{transform:translate(0,0);} 20%{transform:translate(-2px,-1px);} 40%{transform:translate(2px,1px);} 60%{transform:translate(-1px,1px);} 80%{transform:translate(1px,-1px);} 100%{transform:translate(0,0);} }
@keyframes glitchBottom{ 0%{transform:translate(0,0);} 25%{transform:translate(2px,0);} 50%{transform:translate(-2px,1px);} 75%{transform:translate(1px,-1px);} 100%{transform:translate(0,0);} }

.reveal{ opacity:0; transform:translateY(28px); transition: opacity .7s ease, transform .7s ease; }
.reveal.in{ opacity:1; transform:translateY(0); }

.btn{
  font-family:var(--font-mono); font-size:0.82rem; letter-spacing:0.14em; text-transform:uppercase;
  padding:14px 28px; border-radius:var(--radius); border:1px solid var(--cyan);
  color:var(--cyan); position:relative; display:inline-flex; align-items:center; gap:10px;
  background:rgba(0,255,242,0.04); transition:all .25s ease; overflow:hidden;
}
.btn::before{
  content:''; position:absolute; inset:0; background:var(--cyan); opacity:0;
  transition:opacity .25s ease; z-index:-1;
}
.btn:hover{ color:var(--black); box-shadow:0 0 26px rgba(0,255,242,0.55); transform:translateY(-2px); }
.btn:hover::before{ opacity:1; }
.btn.pink{ border-color:var(--pink); color:var(--pink); background:rgba(255,46,230,0.04); }
.btn.pink::before{ background:var(--pink); }
.btn.pink:hover{ box-shadow:0 0 26px rgba(255,46,230,0.55); }
.btn.ghost{ border-color:var(--text-dimmer); color:var(--text-dim); background:transparent; }
.btn.ghost:hover{ border-color:var(--cyan); color:var(--cyan); box-shadow:0 0 16px rgba(0,255,242,0.25); }
.btn.ghost::before{ display:none; }

.tag-chip{
  font-family:var(--font-mono); font-size:0.7rem; letter-spacing:0.06em; color:var(--cyan);
  border:1px solid var(--border); padding:4px 10px; border-radius:20px; background:rgba(0,255,242,0.05);
  white-space:nowrap;
}

/* ============================================================
   HERO
   ============================================================ */
.hero{
  min-height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center;
  padding:calc(var(--nav-h) + var(--s5)) var(--s3) var(--s6); text-align:center; position:relative;
}
.hero-eyebrow{
  font-family:var(--font-mono); font-size:0.8rem; letter-spacing:0.4em; text-transform:uppercase;
  color:var(--text-dim); margin-bottom:var(--s3); display:flex; align-items:center; gap:10px;
}
.hero-eyebrow .dot{ width:7px; height:7px; border-radius:50%; background:var(--green); box-shadow:0 0 8px var(--green); animation:pulseDot 1.6s ease-in-out infinite; }
@keyframes pulseDot{ 0%,100%{ opacity:1; } 50%{ opacity:0.3; } }

.hero-title{
  font-size:clamp(2.4rem, 7vw, 5.2rem); line-height:1.05; color:var(--text);
  text-transform:uppercase; margin-bottom:var(--s2);
}
.hero-title .line2{ color:var(--cyan); text-shadow:0 0 26px rgba(0,255,242,0.55); }

.hero-role{
  font-family:var(--font-mono); font-size:clamp(1rem, 2.4vw, 1.35rem); color:var(--pink);
  letter-spacing:0.06em; margin-bottom:var(--s5); text-shadow:0 0 14px rgba(255,46,230,0.4);
}

.terminal{
  width:min(680px, 92vw); text-align:left; background:var(--panel); border:1px solid var(--border);
  border-radius:8px; box-shadow:0 0 0 1px rgba(0,255,242,0.06), 0 25px 60px rgba(0,0,0,0.55), 0 0 40px rgba(0,255,242,0.08);
  overflow:hidden; margin:0 auto var(--s5);
}
.terminal-bar{
  display:flex; align-items:center; gap:8px; padding:10px 14px; background:rgba(255,255,255,0.03);
  border-bottom:1px solid var(--border);
}
.terminal-dot{ width:10px; height:10px; border-radius:50%; }
.terminal-dot.r{ background:var(--red); box-shadow:0 0 6px var(--red); }
.terminal-dot.y{ background:var(--yellow); box-shadow:0 0 6px var(--yellow); }
.terminal-dot.g{ background:var(--green); box-shadow:0 0 6px var(--green); }
.terminal-path{ margin-left:12px; font-family:var(--font-mono); font-size:0.75rem; color:var(--text-dim); }
.terminal-body{
  font-family:var(--font-mono); font-size:0.95rem; padding:var(--s3); min-height:158px;
  color:var(--green); line-height:1.9;
}
.terminal-body .prompt{ color:var(--cyan); }
.terminal-body .out{ color:var(--text); display:block; }
.terminal-body .muted{ color:var(--text-dim); }
#typedLine1, #typedLine2, #typedLine3, #typedLine4{ white-space:pre-wrap; word-break:break-word; }
.cursor{
  display:inline-block; width:9px; height:1.1em; background:var(--cyan); margin-left:2px;
  vertical-align:text-bottom; animation:blink 1s steps(1) infinite;
  box-shadow:0 0 8px var(--cyan);
}
@keyframes blink{ 50%{ opacity:0; } }

.hero-actions{ display:flex; flex-wrap:wrap; gap:var(--s2); justify-content:center; margin-bottom:var(--s5); }

.hero-socials{ display:flex; gap:var(--s3); justify-content:center; }
.social-btn{
  width:44px; height:44px; border-radius:50%; border:1px solid var(--border); display:flex;
  align-items:center; justify-content:center; color:var(--text-dim); font-size:1.05rem; transition:all .25s ease;
}
.social-btn:hover{ color:var(--cyan); border-color:var(--cyan); box-shadow:0 0 16px rgba(0,255,242,0.4); transform:translateY(-3px); }

.scroll-cue{
  position:absolute; bottom:var(--s3); left:50%; transform:translateX(-50%);
  display:flex; flex-direction:column; align-items:center; gap:6px; color:var(--text-dimmer);
  font-family:var(--font-mono); font-size:0.65rem; letter-spacing:0.3em; text-transform:uppercase;
}
.scroll-cue i{ animation:scrollBounce 1.8s ease-in-out infinite; color:var(--cyan); }
@keyframes scrollBounce{ 0%,100%{ transform:translateY(0); opacity:.4; } 50%{ transform:translateY(8px); opacity:1; } }

/* ============================================================
   ABOUT
   ============================================================ */
.about-grid{ display:grid; grid-template-columns: 1.1fr 0.9fr; gap:var(--s6); align-items:start; }
.about-bio p{ color:var(--text-dim); font-size:1.08rem; margin-bottom:var(--s3); }
.about-bio p strong{ color:var(--cyan); font-weight:600; }

.stat-row{ display:grid; grid-template-columns:repeat(3,1fr); gap:var(--s2); margin-top:var(--s4); }
.stat-box{
  border:1px solid var(--border); border-radius:6px; padding:var(--s3) var(--s2); text-align:center;
  background:rgba(0,255,242,0.03);
}
.stat-num{ font-family:var(--font-display); font-size:1.9rem; color:var(--cyan); text-shadow:0 0 14px rgba(0,255,242,0.5); }
.stat-label{ font-family:var(--font-mono); font-size:0.68rem; letter-spacing:0.12em; color:var(--text-dim); text-transform:uppercase; margin-top:4px; }

.edu-panel{
  border:1px solid var(--border-pink); border-radius:8px; padding:var(--s4); background:var(--panel);
  box-shadow:0 0 30px rgba(255,46,230,0.06);
}
.edu-panel-title{
  font-family:var(--font-mono); font-size:0.78rem; letter-spacing:0.24em; text-transform:uppercase;
  color:var(--pink); margin-bottom:var(--s3); display:flex; align-items:center; gap:8px;
}
.edu-item{ position:relative; padding:var(--s2) 0 var(--s2) var(--s3); border-left:2px solid var(--border); margin-left:6px; }
.edu-item::before{
  content:''; position:absolute; left:-7px; top:22px; width:11px; height:11px; border-radius:50%;
  background:var(--cyan); box-shadow:0 0 10px var(--cyan);
}
.edu-item:last-child{ border-left-color:transparent; }
.edu-degree{ font-weight:700; color:var(--text); font-size:1.02rem; }
.edu-school{ color:var(--text-dim); font-size:0.92rem; margin-top:2px; }
.edu-year{ font-family:var(--font-mono); font-size:0.75rem; color:var(--cyan-dim); margin-top:4px; }

/* ============================================================
   SKILLS
   ============================================================ */
.skills-grid{ display:grid; grid-template-columns:repeat(2, 1fr); gap:var(--s5) var(--s6); }
.skill-cat-title{
  font-family:var(--font-mono); font-size:0.8rem; letter-spacing:0.2em; text-transform:uppercase;
  color:var(--cyan); margin-bottom:var(--s3); display:flex; align-items:center; gap:8px;
}
.skill-cat-title i{ color:var(--pink); }
.skill-item{ margin-bottom:var(--s3); }
.skill-item:last-child{ margin-bottom:0; }
.skill-top{ display:flex; justify-content:space-between; font-family:var(--font-mono); font-size:0.82rem; margin-bottom:6px; }
.skill-top .name{ color:var(--text); }
.skill-top .pct{ color:var(--text-dim); }
.skill-track{ height:8px; border-radius:6px; background:rgba(255,255,255,0.06); overflow:hidden; position:relative; border:1px solid rgba(255,255,255,0.05); }
.skill-fill{
  height:100%; width:0%; border-radius:6px; background:linear-gradient(90deg, var(--cyan), var(--pink));
  box-shadow:0 0 12px rgba(0,255,242,0.5); transition:width 1.4s cubic-bezier(.19,1,.22,1);
  position:relative;
}
.skill-fill::after{
  content:''; position:absolute; inset:0; background:linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
  width:30px; animation:skillShine 2.2s ease-in-out infinite;
}
@keyframes skillShine{ 0%{ transform:translateX(-40px); } 100%{ transform:translateX(220px); } }

.chip-cloud{ display:flex; flex-wrap:wrap; gap:10px; margin-top:var(--s5); }
.chip-cloud .tag-chip{ font-size:0.76rem; padding:7px 14px; }
.chip-cloud .tag-chip:hover{ color:var(--black); background:var(--cyan); box-shadow:0 0 16px rgba(0,255,242,0.5); }

/* ============================================================
   PROJECTS — holographic cards
   ============================================================ */
.projects-grid{ display:grid; grid-template-columns:repeat(2, 1fr); gap:var(--s4); }
.holo-card{
  position:relative; border-radius:10px; padding:1px; background:linear-gradient(135deg, rgba(0,255,242,0.5), rgba(255,46,230,0.5), rgba(0,255,242,0.5));
  background-size:220% 220%; animation:holoShift 6s ease infinite;
}
@keyframes holoShift{ 0%{ background-position:0% 50%; } 50%{ background-position:100% 50%; } 100%{ background-position:0% 50%; } }
.holo-inner{
  background:var(--panel-solid); border-radius:9px; padding:var(--s4); height:100%;
  display:flex; flex-direction:column; position:relative; overflow:hidden; transition:transform .35s ease;
}
.holo-inner::before{
  content:''; position:absolute; inset:0; opacity:0; transition:opacity .35s ease; pointer-events:none;
  background:radial-gradient(circle at 30% 20%, rgba(0,255,242,0.14), transparent 55%);
}
.holo-card:hover .holo-inner{ transform:translateY(-6px); }
.holo-card:hover .holo-inner::before{ opacity:1; }
.holo-index{ font-family:var(--font-mono); font-size:0.72rem; color:var(--text-dimmer); letter-spacing:0.2em; margin-bottom:var(--s2); }
.holo-icon{
  width:52px; height:52px; border-radius:8px; border:1px solid var(--border); display:flex;
  align-items:center; justify-content:center; font-size:1.3rem; color:var(--cyan); margin-bottom:var(--s3);
  background:rgba(0,255,242,0.05);
}
.holo-title{ font-size:1.28rem; color:var(--text); margin-bottom:var(--s1); }
.holo-desc{ color:var(--text-dim); font-size:0.96rem; margin-bottom:var(--s3); flex-grow:1; }
.holo-stack{ display:flex; flex-wrap:wrap; gap:8px; margin-bottom:var(--s3); }
.holo-links{ display:flex; gap:var(--s3); margin-top:auto; }
.holo-links a{
  font-family:var(--font-mono); font-size:0.76rem; letter-spacing:0.08em; color:var(--pink);
  display:inline-flex; align-items:center; gap:6px; text-transform:uppercase; transition:color .2s ease;
}
.holo-links a:hover{ color:var(--cyan); text-shadow:0 0 8px rgba(0,255,242,0.6); }

/* ============================================================
   EXPERIENCE — terminal log timeline
   ============================================================ */
.exp-log{
  border:1px solid var(--border); border-radius:8px; background:var(--panel-solid); overflow:hidden;
}
.exp-log-bar{
  padding:10px 18px; background:rgba(255,255,255,0.03); border-bottom:1px solid var(--border);
  font-family:var(--font-mono); font-size:0.75rem; color:var(--text-dim); display:flex; justify-content:space-between;
}
.exp-log-bar span.g{ color:var(--green); }
.exp-entries{ padding:var(--s4); }
.exp-entry{
  position:relative; padding:var(--s3) 0 var(--s3) var(--s5); border-left:2px solid rgba(0,255,242,0.18);
  margin-left:8px;
}
.exp-entry:last-child{ padding-bottom:0; }
.exp-entry::before{
  content:''; position:absolute; left:-9px; top:26px; width:16px; height:16px; border-radius:50%;
  background:var(--bg); border:2px solid var(--cyan); box-shadow:0 0 12px rgba(0,255,242,0.6);
}
.exp-entry.current::before{ border-color:var(--pink); box-shadow:0 0 14px rgba(255,46,230,0.7); }
.exp-tag{
  font-family:var(--font-mono); font-size:0.68rem; letter-spacing:0.1em; padding:2px 9px; border-radius:12px;
  border:1px solid var(--green); color:var(--green); display:inline-block; margin-bottom:8px; text-transform:uppercase;
}
.exp-entry:not(.current) .exp-tag{ border-color:var(--text-dimmer); color:var(--text-dim); }
.exp-role{ font-size:1.15rem; color:var(--text); font-weight:700; }
.exp-role .accent{ color:var(--cyan); }
.exp-meta{ font-family:var(--font-mono); font-size:0.8rem; color:var(--text-dim); margin:4px 0 8px; }
.exp-desc{ color:var(--text-dim); font-size:0.95rem; max-width:640px; }

/* ============================================================
   CERTIFICATIONS
   ============================================================ */
.certs-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:var(--s4); }
.cert-card{
  border:1px solid var(--border); border-radius:8px; padding:var(--s4); background:var(--panel);
  text-align:center; transition:all .3s ease; position:relative;
}
.cert-card:hover{ border-color:var(--pink); box-shadow:0 0 28px rgba(255,46,230,0.2); transform:translateY(-4px); }
.cert-badge{
  width:64px; height:64px; margin:0 auto var(--s3); border-radius:50%; border:1px solid var(--cyan);
  display:flex; align-items:center; justify-content:center; font-size:1.5rem; color:var(--cyan);
  box-shadow:0 0 20px rgba(0,255,242,0.25), inset 0 0 12px rgba(0,255,242,0.15);
}
.cert-name{ font-size:1.05rem; color:var(--text); margin-bottom:6px; }
.cert-issuer{ font-family:var(--font-mono); font-size:0.82rem; color:var(--pink); margin-bottom:4px; }
.cert-year{ font-family:var(--font-mono); font-size:0.75rem; color:var(--text-dimmer); }

/* ============================================================
   BLOG — classified terminal files
   ============================================================ */
.blog-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:var(--s4); }
.blog-card{
  border:1px solid var(--border); border-radius:8px; overflow:hidden; background:var(--panel-solid);
  display:flex; flex-direction:column; transition:all .3s ease;
}
.blog-card:hover{ border-color:var(--cyan); box-shadow:0 0 26px rgba(0,255,242,0.18); transform:translateY(-4px); }
.blog-head{
  padding:12px 16px; background:rgba(255,46,230,0.06); border-bottom:1px dashed var(--border-pink);
  display:flex; justify-content:space-between; align-items:center;
}
.blog-stamp{
  font-family:var(--font-mono); font-size:0.65rem; letter-spacing:0.14em; color:var(--pink);
  border:1px solid var(--pink); padding:2px 8px; border-radius:3px; text-transform:uppercase;
}
.blog-date{ font-family:var(--font-mono); font-size:0.72rem; color:var(--text-dimmer); }
.blog-body{ padding:var(--s3); flex-grow:1; display:flex; flex-direction:column; }
.blog-title{ font-size:1.08rem; color:var(--text); margin-bottom:8px; font-family:var(--font-display); }
.blog-excerpt{ color:var(--text-dim); font-size:0.92rem; margin-bottom:var(--s3); flex-grow:1; }
.blog-read{
  font-family:var(--font-mono); font-size:0.76rem; color:var(--cyan); text-transform:uppercase;
  letter-spacing:0.08em; display:inline-flex; align-items:center; gap:6px;
}
.blog-read:hover{ color:var(--pink); }

/* ============================================================
   CONTACT
   ============================================================ */
.contact-grid{ display:grid; grid-template-columns:0.85fr 1.15fr; gap:var(--s6); align-items:start; }
.contact-info-item{ display:flex; align-items:flex-start; gap:var(--s2); margin-bottom:var(--s4); }
.contact-info-icon{
  width:44px; height:44px; border-radius:8px; border:1px solid var(--border); flex-shrink:0;
  display:flex; align-items:center; justify-content:center; color:var(--cyan); font-size:1.05rem;
}
.contact-info-label{ font-family:var(--font-mono); font-size:0.7rem; letter-spacing:0.14em; color:var(--text-dimmer); text-transform:uppercase; }
.contact-info-value{ color:var(--text); font-size:1rem; margin-top:2px; word-break:break-word; }
.contact-info-value a:hover{ color:var(--cyan); }

.terminal-form{
  border:1px solid var(--border); border-radius:8px; background:var(--panel-solid); overflow:hidden;
}
.terminal-form-bar{
  padding:10px 16px; background:rgba(255,255,255,0.03); border-bottom:1px solid var(--border);
  font-family:var(--font-mono); font-size:0.75rem; color:var(--text-dim); display:flex; align-items:center; gap:8px;
}
.form-body{ padding:var(--s4); }
.field{ margin-bottom:var(--s3); }
.field label{
  display:block; font-family:var(--font-mono); font-size:0.75rem; color:var(--cyan); margin-bottom:8px;
  letter-spacing:0.06em;
}
.field label::before{ content:'$ '; color:var(--pink); }
.field input, .field textarea{
  width:100%; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.12); border-radius:4px;
  padding:12px 14px; color:var(--text); font-family:var(--font-mono); font-size:0.92rem; transition:all .25s ease;
}
.field input::placeholder, .field textarea::placeholder{ color:var(--text-dimmer); }
.field input:focus, .field textarea:focus{
  border-color:var(--cyan); box-shadow:0 0 0 3px rgba(0,255,242,0.12); outline:none;
}
.field textarea{ resize:vertical; min-height:120px; }
.field-row{ display:grid; grid-template-columns:1fr 1fr; gap:var(--s2); }
.form-submit{
  width:100%; justify-content:center; margin-top:var(--s1);
}
.form-status{
  margin-top:var(--s3); padding:12px 14px; border-radius:4px; font-family:var(--font-mono); font-size:0.85rem;
  display:none; align-items:center; gap:10px;
}
.form-status.show{ display:flex; }
.form-status.ok{ background:rgba(57,255,136,0.08); border:1px solid var(--green); color:var(--green); }
.form-status.err{ background:rgba(255,56,96,0.08); border:1px solid var(--red); color:var(--red); }
.form-status.pending{ background:rgba(0,255,242,0.06); border:1px solid var(--cyan); color:var(--cyan); }

/* ============================================================
   FOOTER
   ============================================================ */
.footer{
  position:relative; z-index:2; border-top:1px solid var(--border); padding:var(--s5) var(--s3) var(--s4);
  background:rgba(3,4,9,0.7);
}
.footer-inner{
  max-width:1320px; margin:0 auto; display:flex; flex-wrap:wrap; justify-content:space-between;
  align-items:center; gap:var(--s3);
}
.footer-logo{ font-family:var(--font-display); color:var(--cyan); font-size:1.1rem; letter-spacing:0.1em; }
.footer-tag{ font-family:var(--font-mono); font-size:0.75rem; color:var(--text-dimmer); margin-top:6px; }
.footer-links{ display:flex; gap:var(--s3); flex-wrap:wrap; }
.footer-links a{ font-family:var(--font-mono); font-size:0.78rem; color:var(--text-dim); }
.footer-links a:hover{ color:var(--cyan); }
.footer-socials{ display:flex; gap:var(--s2); }
.footer-bottom{
  max-width:1320px; margin:var(--s4) auto 0; padding-top:var(--s3); border-top:1px solid rgba(255,255,255,0.06);
  display:flex; justify-content:space-between; flex-wrap:wrap; gap:8px;
  font-family:var(--font-mono); font-size:0.72rem; color:var(--text-dimmer);
}

.back-to-top{
  position:fixed; bottom:24px; right:24px; z-index:150; width:46px; height:46px; border-radius:50%;
  border:1px solid var(--cyan); background:rgba(5,6,13,0.85); color:var(--cyan); display:flex;
  align-items:center; justify-content:center; opacity:0; pointer-events:none; transform:translateY(10px);
  transition:all .3s ease; box-shadow:0 0 16px rgba(0,255,242,0.3);
}
.back-to-top.show{ opacity:1; pointer-events:auto; transform:translateY(0); }
.back-to-top:hover{ background:var(--cyan); color:var(--black); }

/* ============================================================
   RESPONSIVE
   ============================================================ */
@media (max-width: 980px){
  .about-grid, .contact-grid{ grid-template-columns:1fr; gap:var(--s5); }
  .skills-grid{ grid-template-columns:1fr; }
  .projects-grid{ grid-template-columns:1fr; }
  .certs-grid{ grid-template-columns:1fr 1fr; }
  .blog-grid{ grid-template-columns:1fr 1fr; }
}
@media (max-width: 620px){
  .section{ padding:var(--s6) var(--s2); }
  .stat-row{ grid-template-columns:1fr 1fr 1fr; gap:8px; }
  .stat-num{ font-size:1.4rem; }
  .certs-grid{ grid-template-columns:1fr; }
  .blog-grid{ grid-template-columns:1fr; }
  .field-row{ grid-template-columns:1fr; }
  .hero-actions{ flex-direction:column; align-items:stretch; }
  .hero-actions .btn{ justify-content:center; }
}
@media (max-width: 400px){
  .terminal-body{ font-size:0.8rem; padding:var(--s2); }
  .hero-title{ font-size:2.1rem; }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce){
  html{ scroll-behavior:auto; }
  *, *::before, *::after{
    animation-duration:0.001ms !important; animation-iteration-count:1 !important;
    transition-duration:0.001ms !important; scroll-behavior:auto !important;
  }
}
</style>
</head>
<body>

<a class="skip-link" href="#main">Skip to content</a>

<div class="bg-grid" aria-hidden="true"></div>
<canvas id="particles" aria-hidden="true"></canvas>
<div class="vignette" aria-hidden="true"></div>
<div class="scanlines" aria-hidden="true"></div>

<div class="hud-corner hud-tl" aria-hidden="true">
  <span>SYS.STATUS: <b>ONLINE</b></span>
  <span>NODE: <b>PORTFOLIO_v3</b></span>
  <span id="hudClock">00:00:00</span>
</div>
<div class="hud-corner hud-br" aria-hidden="true">
  <span>SEC: <b id="hudSec">ENCRYPTED</b></span>
  <span>PING: <b id="hudPing">14ms</b></span>
  <span>LAT: 23.94N / LON: 89.02E</span>
</div>

<header class="navbar" id="navbar">
  <div class="nav-inner">
    <a href="#home" class="logo glitch" data-text="EAK">EAK<span class="logo-blink">_</span></a>
    <nav class="nav-links" id="navLinks" aria-label="Primary">
      <a href="#home" class="nav-link active">Home</a>
      <a href="#about" class="nav-link">About</a>
      <a href="#skills" class="nav-link">Skills</a>
      <a href="#projects" class="nav-link">Projects</a>
      <a href="#experience" class="nav-link">Experience</a>
      <a href="#certifications" class="nav-link">Certs</a>
      <a href="#blog" class="nav-link">Blog</a>
      <a href="#contact" class="nav-link nav-cta">Contact</a>
    </nav>
    <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="navLinks">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main id="main">

  <!-- ============ HERO ============ -->
  <section id="home" class="hero">
    <p class="hero-eyebrow"><span class="dot" aria-hidden="true"></span> SYSTEM BREACH SUCCESSFUL — IDENTITY DECRYPTED</p>

    <h1 class="hero-title">
      <span class="line1">M. ESTIAQUE AHMED</span><br>
      <span class="line2 glitch" data-text="KHAN">KHAN</span>
    </h1>
    <p class="hero-role">// SOFTWARE ENGINEER — FULL-STACK LARAVEL DEVELOPER</p>

    <div class="terminal" role="group" aria-label="Terminal identity readout">
      <div class="terminal-bar">
        <span class="terminal-dot r"></span>
        <span class="terminal-dot y"></span>
        <span class="terminal-dot g"></span>
        <span class="terminal-path">root@estiaque:~$ /usr/bin/identity.sh</span>
      </div>
      <div class="terminal-body" id="terminalBody" aria-live="polite">
        <div><span class="prompt">guest@root:~$</span> <span id="typedLine1"></span></div>
        <div class="out"><span id="typedLine2"></span></div>
        <div><span class="prompt">guest@root:~$</span> <span id="typedLine3"></span></div>
        <div class="out"><span id="typedLine4"></span><span class="cursor" id="typeCursor"></span></div>
      </div>
    </div>

    <div class="hero-actions">
      <a href="#projects" class="btn"><i class="fa-solid fa-folder-open"></i> View Projects</a>
      <a href="#contact" class="btn pink"><i class="fa-solid fa-satellite-dish"></i> Initiate Contact</a>
      <a href="#experience" class="btn ghost"><i class="fa-solid fa-file-lines"></i> Resume Log</a>
    </div>

    <div class="hero-socials">
      <a class="social-btn" href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="GitHub profile"><i class="fa-brands fa-github"></i></a>
      <a class="social-btn" href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn profile"><i class="fa-brands fa-linkedin-in"></i></a>
      <a class="social-btn" href="mailto:mrm.khan.1298@gmail.com" aria-label="Send email"><i class="fa-solid fa-envelope"></i></a>
    </div>

    <div class="scroll-cue" aria-hidden="true">Scroll<i class="fa-solid fa-chevron-down"></i></div>
  </section>

  <!-- ============ ABOUT ============ -->
  <section id="about" class="section about">
    <div class="section-head reveal">
      <p class="section-tag">01 // ABOUT.SYS</p>
      <h2 class="section-title">Decrypted <span class="accent">Profile Data</span></h2>
      <p class="section-desc">Personal file recovered from the mainframe. Access level: public.</p>
    </div>

    <div class="about-grid">
      <div class="about-bio reveal">
        <p><strong>&gt; cat bio.txt</strong></p>
        <p>Full-stack developer with hands-on experience across <strong>frontend optimization</strong>, <strong>database management</strong>, <strong>PHP/Laravel</strong> web application development, custom inventory management modules, enterprise automation solutions, and ERP systems integration.</p>
        <p>I build resilient systems that sit at the intersection of clean UI and rock-solid backend architecture — shipping features that survive production traffic, not just demos.</p>

        <div class="stat-row" aria-label="Career statistics">
          <div class="stat-box">
            <div class="stat-num" data-count="3">0</div>
            <div class="stat-label">Companies</div>
          </div>
          <div class="stat-box">
            <div class="stat-num" data-count="4">0</div>
            <div class="stat-label">Core Projects</div>
          </div>
          <div class="stat-box">
            <div class="stat-num" data-count="18">0</div>
            <div class="stat-label">Technologies</div>
          </div>
        </div>
      </div>

      <div class="edu-panel reveal">
        <p class="edu-panel-title"><i class="fa-solid fa-graduation-cap"></i> education_log.dat</p>
        <div class="edu-item">
          <div class="edu-degree">MSc in Computer Science</div>
          <div class="edu-school">Uttara University</div>
          <div class="edu-year">PASSING YEAR :: 2025</div>
        </div>
        <div class="edu-item">
          <div class="edu-degree">BSc in Computer Science &amp; Engineering</div>
          <div class="edu-school">Uttara University</div>
          <div class="edu-year">PASSING YEAR :: 2021</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ SKILLS ============ -->
  <section id="skills" class="section skills">
    <div class="section-head reveal">
      <p class="section-tag">02 // SKILL_MATRIX</p>
      <h2 class="section-title">Loaded <span class="accent">Tech Stack</span></h2>
      <p class="section-desc">Live readout of core competencies. Values represent operational proficiency, not confidence.</p>
    </div>

    <div class="skills-grid">
      <div class="reveal">
        <p class="skill-cat-title"><i class="fa-solid fa-code"></i> Core Stack</p>
        <div class="skill-item">
          <div class="skill-top"><span class="name">PHP 8</span><span class="pct">96%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="96"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Laravel</span><span class="pct">96%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="96"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">JavaScript (ES6+)</span><span class="pct">86%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="86"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">REST API Design</span><span class="pct">92%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="92"></div></div>
        </div>
      </div>

      <div class="reveal">
        <p class="skill-cat-title"><i class="fa-solid fa-display"></i> Frontend &amp; UI</p>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Vue.js</span><span class="pct">80%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="80"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Livewire</span><span class="pct">86%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="86"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Alpine.js</span><span class="pct">84%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="84"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Tailwind CSS</span><span class="pct">88%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="88"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Bootstrap 5</span><span class="pct">85%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="85"></div></div>
        </div>
      </div>

      <div class="reveal">
        <p class="skill-cat-title"><i class="fa-solid fa-database"></i> Data &amp; Infra</p>
        <div class="skill-item">
          <div class="skill-top"><span class="name">MySQL</span><span class="pct">92%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="92"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Database Optimization</span><span class="pct">90%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="90"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">PostgreSQL</span><span class="pct">78%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="78"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Redis</span><span class="pct">75%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="75"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">AWS</span><span class="pct">72%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="72"></div></div>
        </div>
      </div>

      <div class="reveal">
        <p class="skill-cat-title"><i class="fa-solid fa-terminal"></i> Tools &amp; Practices</p>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Git</span><span class="pct">94%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="94"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">Docker</span><span class="pct">78%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="78"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">CI/CD</span><span class="pct">76%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="76"></div></div>
        </div>
        <div class="skill-item">
          <div class="skill-top"><span class="name">ERP Integration</span><span class="pct">88%</span></div>
          <div class="skill-track"><div class="skill-fill" data-level="88"></div></div>
        </div>
      </div>
    </div>

    <div class="chip-cloud reveal" aria-label="Full technology list">
      <span class="tag-chip">PHP 8</span><span class="tag-chip">Laravel</span><span class="tag-chip">JavaScript ES6+</span>
      <span class="tag-chip">Vue.js</span><span class="tag-chip">Alpine.js</span><span class="tag-chip">Livewire</span>
      <span class="tag-chip">MySQL</span><span class="tag-chip">PostgreSQL</span><span class="tag-chip">Redis</span>
      <span class="tag-chip">REST API Design</span><span class="tag-chip">Docker</span><span class="tag-chip">Git</span>
      <span class="tag-chip">AWS</span><span class="tag-chip">Tailwind CSS</span><span class="tag-chip">Bootstrap 5</span>
      <span class="tag-chip">CI/CD</span><span class="tag-chip">Database Optimization</span><span class="tag-chip">ERP Integration</span>
    </div>
  </section>

  <!-- ============ PROJECTS ============ -->
  <section id="projects" class="section projects">
    <div class="section-head reveal">
      <p class="section-tag">03 // MISSION_ARCHIVE</p>
      <h2 class="section-title">Deployed <span class="accent">Projects</span></h2>
      <p class="section-desc">Holographic case files on production systems built and shipped.</p>
    </div>

    <div class="projects-grid">
      <div class="holo-card reveal">
        <div class="holo-inner">
          <p class="holo-index">FILE_001 // ACTIVE</p>
          <div class="holo-icon"><i class="fa-solid fa-layer-group"></i></div>
          <h3 class="holo-title">Port3folio Package</h3>
          <p class="holo-desc">A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
          <div class="holo-stack">
            <span class="tag-chip">Laravel 11</span><span class="tag-chip">Blade</span>
            <span class="tag-chip">Bootstrap 5</span><span class="tag-chip">jQuery</span>
          </div>
          <div class="holo-links">
            <a href="#"><i class="fa-brands fa-github"></i> Source</a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Demo</a>
          </div>
        </div>
      </div>

      <div class="holo-card reveal">
        <div class="holo-inner">
          <p class="holo-index">FILE_002 // ACTIVE</p>
          <div class="holo-icon"><i class="fa-solid fa-cart-shopping"></i></div>
          <h3 class="holo-title">E-Commerce Platform</h3>
          <p class="holo-desc">High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
          <div class="holo-stack">
            <span class="tag-chip">Laravel</span><span class="tag-chip">Vue.js</span>
            <span class="tag-chip">MySQL</span><span class="tag-chip">Redis</span><span class="tag-chip">Stripe</span>
          </div>
          <div class="holo-links">
            <a href="#"><i class="fa-brands fa-github"></i> Source</a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Demo</a>
          </div>
        </div>
      </div>

      <div class="holo-card reveal">
        <div class="holo-inner">
          <p class="holo-index">FILE_003 // ACTIVE</p>
          <div class="holo-icon"><i class="fa-solid fa-chart-line"></i></div>
          <h3 class="holo-title">SaaS Analytics Dashboard</h3>
          <p class="holo-desc">Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
          <div class="holo-stack">
            <span class="tag-chip">Laravel</span><span class="tag-chip">Livewire</span>
            <span class="tag-chip">Alpine.js</span><span class="tag-chip">PostgreSQL</span><span class="tag-chip">Chart.js</span>
          </div>
          <div class="holo-links">
            <a href="#"><i class="fa-brands fa-github"></i> Source</a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Demo</a>
          </div>
        </div>
      </div>

      <div class="holo-card reveal">
        <div class="holo-inner">
          <p class="holo-index">FILE_004 // ACTIVE</p>
          <div class="holo-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
          <h3 class="holo-title">Inventory Management System</h3>
          <p class="holo-desc">Custom-built inventory &amp; ERP automation module for enterprise clients — stock tracking, procurement workflows, and reporting.</p>
          <div class="holo-stack">
            <span class="tag-chip">PHP</span><span class="tag-chip">Laravel</span>
            <span class="tag-chip">MySQL</span><span class="tag-chip">REST API</span>
          </div>
          <div class="holo-links">
            <a href="#"><i class="fa-brands fa-github"></i> Source</a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Demo</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ EXPERIENCE ============ -->
  <section id="experience" class="section experience">
    <div class="section-head reveal">
      <p class="section-tag">04 // ACCESS_LOG</p>
      <h2 class="section-title">Employment <span class="accent">History Dump</span></h2>
      <p class="section-desc">Chronological access record, most recent session first.</p>
    </div>

    <div class="exp-log reveal">
      <div class="exp-log-bar">
        <span>tail -f /var/log/career.log</span>
        <span class="g">● LIVE</span>
      </div>
      <div class="exp-entries">
        <div class="exp-entry current">
          <span class="exp-tag">[ACCESS GRANTED]</span>
          <div class="exp-role">Software Engineer <span class="accent">// Natore IT</span></div>
          <div class="exp-meta">2025 — PRESENT</div>
          <p class="exp-desc">Frontend optimization and database management for local business clients.</p>
        </div>
        <div class="exp-entry">
          <span class="exp-tag">[ARCHIVED]</span>
          <div class="exp-role">Software Developer <span class="accent">// Isotope IT</span></div>
          <div class="exp-meta">2023 — 2025</div>
          <p class="exp-desc">Specialized in PHP/Laravel web applications and custom inventory management modules.</p>
        </div>
        <div class="exp-entry">
          <span class="exp-tag">[ARCHIVED]</span>
          <div class="exp-role">Software Engineer <span class="accent">// Barcode Tech Automation Ltd</span></div>
          <div class="exp-meta">2022 — 2023</div>
          <p class="exp-desc">Leading development of enterprise automation solutions and ERP systems integration.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ CERTIFICATIONS ============ -->
  <section id="certifications" class="section certifications">
    <div class="section-head reveal">
      <p class="section-tag">05 // VERIFIED_CREDENTIALS</p>
      <h2 class="section-title">Certification <span class="accent">Keychain</span></h2>
      <p class="section-desc">Signed and verified credentials stored in the encrypted keychain.</p>
    </div>

    <div class="certs-grid">
      <div class="cert-card reveal">
        <div class="cert-badge"><i class="fa-solid fa-cloud"></i></div>
        <div class="cert-name">AWS Certified Solutions Architect – Associate</div>
        <div class="cert-issuer">Amazon Web Services</div>
        <div class="cert-year">ISSUED :: 2023</div>
      </div>
      <div class="cert-card reveal">
        <div class="cert-badge"><i class="fa-brands fa-laravel"></i></div>
        <div class="cert-name">Laravel Certified Developer</div>
        <div class="cert-issuer">Laravel Certification Program</div>
        <div class="cert-year">ISSUED :: 2022</div>
      </div>
      <div class="cert-card reveal">
        <div class="cert-badge"><i class="fa-solid fa-database"></i></div>
        <div class="cert-name">MySQL Database Administration Certificate</div>
        <div class="cert-issuer">Oracle Corporation</div>
        <div class="cert-year">ISSUED :: 2024</div>
      </div>
    </div>
  </section>

  <!-- ============ BLOG ============ -->
  <section id="blog" class="section blog">
    <div class="section-head reveal">
      <p class="section-tag">06 // DECLASSIFIED_FILES</p>
      <h2 class="section-title">Field <span class="accent">Notes &amp; Dispatches</span></h2>
      <p class="section-desc">Leaked transmissions on engineering practice. Clearance level: public.</p>
    </div>

    <div class="blog-grid">
      <article class="blog-card reveal">
        <div class="blog-head">
          <span class="blog-stamp">Declassified</span>
          <span class="blog-date">Jun 02, 2026</span>
        </div>
        <div class="blog-body">
          <h3 class="blog-title">Optimizing Laravel Queries at Scale</h3>
          <p class="blog-excerpt">Eager loading, chunked processing, and index-first schema design — how a handful of query patterns cut response times on a million-row dataset.</p>
          <a href="#" class="blog-read">Decrypt File <i class="fa-solid fa-chevron-right"></i></a>
        </div>
      </article>

      <article class="blog-card reveal">
        <div class="blog-head">
          <span class="blog-stamp">Declassified</span>
          <span class="blog-date">Apr 18, 2026</span>
        </div>
        <div class="blog-body">
          <h3 class="blog-title">Designing Resilient REST APIs for ERP Systems</h3>
          <p class="blog-excerpt">Idempotency keys, versioned contracts, and graceful degradation — lessons from wiring a Laravel API into a legacy ERP without breaking production.</p>
          <a href="#" class="blog-read">Decrypt File <i class="fa-solid fa-chevron-right"></i></a>
        </div>
      </article>

      <article class="blog-card reveal">
        <div class="blog-head">
          <span class="blog-stamp">Declassified</span>
          <span class="blog-date">Feb 09, 2026</span>
        </div>
        <div class="blog-body">
          <h3 class="blog-title">Redis Caching Patterns That Actually Move the Needle</h3>
          <p class="blog-excerpt">Cache stampedes, TTL jitter, and write-through strategies — the caching patterns that held up under real traffic, and the ones that quietly failed.</p>
          <a href="#" class="blog-read">Decrypt File <i class="fa-solid fa-chevron-right"></i></a>
        </div>
      </article>
    </div>
  </section>

  <!-- ============ CONTACT ============ -->
  <section id="contact" class="section contact">
    <div class="section-head reveal">
      <p class="section-tag">07 // OPEN_CHANNEL</p>
      <h2 class="section-title">Establish <span class="accent">Secure Uplink</span></h2>
      <p class="section-desc">Transmit a message directly to the mainframe. All fields required for successful handshake.</p>
    </div>

    <div class="contact-grid">
      <div class="reveal">
        <div class="contact-info-item">
          <div class="contact-info-icon"><i class="fa-solid fa-envelope"></i></div>
          <div>
            <div class="contact-info-label">Email</div>
            <div class="contact-info-value"><a href="mailto:mrm.khan.1298@gmail.com">mrm.khan.1298@gmail.com</a></div>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="contact-info-icon"><i class="fa-brands fa-github"></i></div>
          <div>
            <div class="contact-info-label">GitHub</div>
            <div class="contact-info-value"><a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer">github.com/mestiaque</a></div>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="contact-info-icon"><i class="fa-brands fa-linkedin-in"></i></div>
          <div>
            <div class="contact-info-label">LinkedIn</div>
            <div class="contact-info-value"><a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer">linkedin.com/in/mestiaque</a></div>
          </div>
        </div>
        <div class="contact-info-item">
          <div class="contact-info-icon"><i class="fa-solid fa-location-dot"></i></div>
          <div>
            <div class="contact-info-label">Base of Operations</div>
            <div class="contact-info-value">Bangladesh (Remote-Ready)</div>
          </div>
        </div>
      </div>

      <div class="terminal-form reveal">
        <div class="terminal-form-bar">
          <span class="terminal-dot r"></span><span class="terminal-dot y"></span><span class="terminal-dot g"></span>
          <span style="margin-left:10px;">transmit.exe</span>
        </div>
        <div class="form-body">
          <form id="contactForm" novalidate>
            <div class="field-row">
              <div class="field">
                <label for="cf-name">name</label>
                <input type="text" id="cf-name" name="name" placeholder="John Doe" autocomplete="name" required />
              </div>
              <div class="field">
                <label for="cf-email">email</label>
                <input type="email" id="cf-email" name="email" placeholder="you@domain.com" autocomplete="email" required />
              </div>
            </div>
            <div class="field">
              <label for="cf-subject">subject</label>
              <input type="text" id="cf-subject" name="subject" placeholder="Project inquiry" required />
            </div>
            <div class="field">
              <label for="cf-message">message</label>
              <textarea id="cf-message" name="message" placeholder="Transmit your message payload here..." required></textarea>
            </div>
            <button type="submit" class="btn form-submit" id="cf-submit">
              <i class="fa-solid fa-paper-plane"></i> <span id="cf-submit-text">Send Transmission</span>
            </button>
            <div class="form-status" id="formStatus" role="status" aria-live="polite"></div>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>

<footer class="footer">
  <div class="footer-inner">
    <div>
      <div class="footer-logo">M. ESTIAQUE AHMED KHAN</div>
      <div class="footer-tag">// Full-Stack Laravel Developer — Built with terminal precision</div>
    </div>
    <nav class="footer-links" aria-label="Footer">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#projects">Projects</a>
      <a href="#experience">Experience</a>
      <a href="#contact">Contact</a>
    </nav>
    <div class="footer-socials">
      <a class="social-btn" href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
      <a class="social-btn" href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
      <a class="social-btn" href="mailto:mrm.khan.1298@gmail.com" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© <span id="footerYear">2026</span> M. Estiaque Ahmed Khan. All rights reserved.</span>
    <span>STATUS: <span style="color:var(--green)">CONNECTION SECURE</span> :: EOF</span>
  </div>
</footer>

<button id="backToTop" class="back-to-top" aria-label="Back to top"><i class="fa-solid fa-chevron-up"></i></button>

<script>
(function(){
  'use strict';

  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------------------------------------------------------
     Footer year
  --------------------------------------------------------- */
  var fy = document.getElementById('footerYear');
  if (fy) fy.textContent = new Date().getFullYear();

  /* ---------------------------------------------------------
     Navbar scroll state + mobile toggle
  --------------------------------------------------------- */
  var navbar = document.getElementById('navbar');
  var navToggle = document.getElementById('navToggle');
  var navLinks = document.getElementById('navLinks');
  var backToTop = document.getElementById('backToTop');

  function onScroll(){
    var y = window.scrollY || window.pageYOffset;
    if (y > 24) { navbar.classList.add('scrolled'); } else { navbar.classList.remove('scrolled'); }
    if (y > 480) { backToTop.classList.add('show'); } else { backToTop.classList.remove('show'); }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  navToggle.addEventListener('click', function(){
    var open = navLinks.classList.toggle('open');
    navToggle.classList.toggle('open', open);
    navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
  });

  document.querySelectorAll('.nav-links a').forEach(function(link){
    link.addEventListener('click', function(){
      navLinks.classList.remove('open');
      navToggle.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
    });
  });

  backToTop.addEventListener('click', function(){
    window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
  });

  /* ---------------------------------------------------------
     Scrollspy — highlight active nav link
  --------------------------------------------------------- */
  var sections = Array.prototype.slice.call(document.querySelectorAll('main section[id]'));
  var navItems = Array.prototype.slice.call(document.querySelectorAll('.nav-link'));

  function setActive(id){
    navItems.forEach(function(a){
      var match = a.getAttribute('href') === '#' + id;
      a.classList.toggle('active', match);
    });
  }

  if ('IntersectionObserver' in window) {
    var spy = new IntersectionObserver(function(entries){
      entries.forEach(function(entry){
        if (entry.isIntersecting) { setActive(entry.target.id); }
      });
    }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });
    sections.forEach(function(s){ spy.observe(s); });
  }

  /* ---------------------------------------------------------
     Reveal-on-scroll
  --------------------------------------------------------- */
  var revealEls = Array.prototype.slice.call(document.querySelectorAll('.reveal'));
  if ('IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function(entries, obs){
      entries.forEach(function(entry){
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    revealEls.forEach(function(el){ revealObserver.observe(el); });
  } else {
    revealEls.forEach(function(el){ el.classList.add('in'); });
  }

  /* ---------------------------------------------------------
     Skill bars fill on scroll
  --------------------------------------------------------- */
  var skillFills = Array.prototype.slice.call(document.querySelectorAll('.skill-fill'));
  if ('IntersectionObserver' in window) {
    var skillObserver = new IntersectionObserver(function(entries, obs){
      entries.forEach(function(entry){
        if (entry.isIntersecting) {
          var el = entry.target;
          var level = el.getAttribute('data-level') || '0';
          requestAnimationFrame(function(){ el.style.width = level + '%'; });
          obs.unobserve(el);
        }
      });
    }, { threshold: 0.4 });
    skillFills.forEach(function(el){ skillObserver.observe(el); });
  } else {
    skillFills.forEach(function(el){ el.style.width = (el.getAttribute('data-level') || '0') + '%'; });
  }

  /* ---------------------------------------------------------
     Animated stat counters
  --------------------------------------------------------- */
  var statEls = Array.prototype.slice.call(document.querySelectorAll('.stat-num'));
  function animateCount(el){
    var target = parseInt(el.getAttribute('data-count'), 10) || 0;
    if (reduceMotion) { el.textContent = target; return; }
    var start = 0;
    var duration = 1200;
    var startTime = null;
    function step(ts){
      if (!startTime) startTime = ts;
      var progress = Math.min((ts - startTime) / duration, 1);
      var value = Math.floor(progress * (target - start) + start);
      el.textContent = value;
      if (progress < 1) requestAnimationFrame(step); else el.textContent = target;
    }
    requestAnimationFrame(step);
  }
  if ('IntersectionObserver' in window) {
    var statObserver = new IntersectionObserver(function(entries, obs){
      entries.forEach(function(entry){
        if (entry.isIntersecting) { animateCount(entry.target); obs.unobserve(entry.target); }
      });
    }, { threshold: 0.6 });
    statEls.forEach(function(el){ statObserver.observe(el); });
  } else {
    statEls.forEach(animateCount);
  }

  /* ---------------------------------------------------------
     Hero terminal typing sequence
  --------------------------------------------------------- */
  var typeLines = [
    { el: document.getElementById('typedLine1'), text: 'whoami', speed: 70 },
    { el: document.getElementById('typedLine2'), text: 'M. Estiaque Ahmed Khan — Software Engineer', speed: 32 },
    { el: document.getElementById('typedLine3'), text: 'role --current --verbose', speed: 55 },
    { el: document.getElementById('typedLine4'), text: 'Full-Stack Laravel Developer :: STATUS OK', speed: 30 }
  ];

  function typeSequence(index){
    if (index >= typeLines.length) return;
    var line = typeLines[index];
    if (!line.el) { typeSequence(index + 1); return; }
    if (reduceMotion) {
      line.el.textContent = line.text;
      typeSequence(index + 1);
      return;
    }
    var i = 0;
    (function tick(){
      if (i <= line.text.length) {
        line.el.textContent = line.text.slice(0, i);
        i++;
        setTimeout(tick, line.speed);
      } else {
        setTimeout(function(){ typeSequence(index + 1); }, 260);
      }
    })();
  }
  typeSequence(0);

  /* ---------------------------------------------------------
     Hero title periodic auto-glitch
  --------------------------------------------------------- */
  if (!reduceMotion) {
    var glitchTargets = document.querySelectorAll('.glitch');
    setInterval(function(){
      glitchTargets.forEach(function(g){
        g.classList.add('auto-glitch');
        setTimeout(function(){ g.classList.remove('auto-glitch'); }, 260);
      });
    }, 4200);
  }

  /* ---------------------------------------------------------
     HUD corner — fake clock / ping readout
  --------------------------------------------------------- */
  var hudClock = document.getElementById('hudClock');
  var hudPing = document.getElementById('hudPing');
  function pad(n){ return n < 10 ? '0' + n : '' + n; }
  function tickClock(){
    var d = new Date();
    if (hudClock) hudClock.textContent = pad(d.getHours()) + ':' + pad(d.getMinutes()) + ':' + pad(d.getSeconds());
  }
  tickClock();
  setInterval(tickClock, 1000);
  if (hudPing && !reduceMotion) {
    setInterval(function(){
      hudPing.textContent = (10 + Math.floor(Math.random() * 22)) + 'ms';
    }, 2400);
  }

  /* ---------------------------------------------------------
     Particle network canvas background
  --------------------------------------------------------- */
  var canvas = document.getElementById('particles');
  if (canvas && canvas.getContext) {
    var ctx = canvas.getContext('2d');
    var particles = [];
    var W, H;
    var COUNT = reduceMotion ? 0 : (window.innerWidth < 700 ? 35 : 70);

    function resize(){
      W = canvas.width = window.innerWidth;
      H = canvas.height = window.innerHeight;
    }
    window.addEventListener('resize', resize);
    resize();

    function makeParticle(){
      return {
        x: Math.random() * W,
        y: Math.random() * H,
        vx: (Math.random() - 0.5) * 0.35,
        vy: (Math.random() - 0.5) * 0.35,
        r: Math.random() * 1.6 + 0.6
      };
    }
    for (var i = 0; i < COUNT; i++) particles.push(makeParticle());

    var linkDist = 130;

    function draw(){
      ctx.clearRect(0, 0, W, H);
      for (var a = 0; a < particles.length; a++) {
        var p = particles[a];
        p.x += p.vx; p.y += p.vy;
        if (p.x < 0 || p.x > W) p.vx *= -1;
        if (p.y < 0 || p.y > H) p.vy *= -1;

        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(0,255,242,0.65)';
        ctx.fill();

        for (var b = a + 1; b < particles.length; b++) {
          var q = particles[b];
          var dx = p.x - q.x, dy = p.y - q.y;
          var dist = Math.sqrt(dx * dx + dy * dy);
          if (dist < linkDist) {
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(q.x, q.y);
            var alpha = (1 - dist / linkDist) * 0.18;
            ctx.strokeStyle = 'rgba(255,46,230,' + alpha + ')';
            ctx.lineWidth = 1;
            ctx.stroke();
          }
        }
      }
      if (!reduceMotion) requestAnimationFrame(draw);
    }
    if (!reduceMotion && COUNT > 0) { requestAnimationFrame(draw); }
  }

  /* ---------------------------------------------------------
     GSAP scroll flourishes (progressive enhancement)
  --------------------------------------------------------- */
  if (window.gsap && window.ScrollTrigger && !reduceMotion) {
    gsap.registerPlugin(ScrollTrigger);
    gsap.utils.toArray('.holo-card').forEach(function(card, i){
      gsap.from(card, {
        scrollTrigger: { trigger: card, start: 'top 88%' },
        y: 24, opacity: 0, duration: 0.6, delay: (i % 2) * 0.08, ease: 'power2.out'
      });
    });
  }

  /* ---------------------------------------------------------
     Contact form — real fetch() submission
  --------------------------------------------------------- */
  var form = document.getElementById('contactForm');
  var statusBox = document.getElementById('formStatus');
  var submitBtn = document.getElementById('cf-submit');
  var submitText = document.getElementById('cf-submit-text');

  function setStatus(kind, message){
    statusBox.className = 'form-status show ' + kind;
    statusBox.innerHTML = message;
  }

  if (form) {
    form.addEventListener('submit', function(e){
      e.preventDefault();

      var name = document.getElementById('cf-name').value.trim();
      var email = document.getElementById('cf-email').value.trim();
      var subject = document.getElementById('cf-subject').value.trim();
      var message = document.getElementById('cf-message').value.trim();

      if (!name || !email || !subject || !message) {
        setStatus('err', '<i class="fa-solid fa-triangle-exclamation"></i> ERROR :: All fields are required to complete the handshake.');
        return;
      }

      submitBtn.setAttribute('disabled', 'true');
      submitText.textContent = 'Transmitting...';
      setStatus('pending', '<i class="fa-solid fa-satellite-dish"></i> ESTABLISHING UPLINK... please stand by.');

      fetch('/api/messages-store', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify({ name: name, email: email, subject: subject, message: message })
      })
      .then(function(res){
        if (!res.ok) { throw new Error('Server responded with status ' + res.status); }
        return res.json().catch(function(){ return {}; });
      })
      .then(function(){
        setStatus('ok', '<i class="fa-solid fa-circle-check"></i> TRANSMISSION SENT :: message received, will respond shortly.');
        form.reset();
      })
      .catch(function(){
        setStatus('err', '<i class="fa-solid fa-triangle-exclamation"></i> TRANSMISSION FAILED :: connection lost, please retry or email directly.');
      })
      .finally(function(){
        submitBtn.removeAttribute('disabled');
        submitText.textContent = 'Send Transmission';
      });
    });
  }

})();
</script>

</body>
</html>
