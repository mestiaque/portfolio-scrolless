<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan — Retro Y2K Portfolio | Full-Stack Laravel Developer</title>
<meta name="description" content="The nostalgic Windows-98-inspired portfolio of M. Estiaque Ahmed Khan, a full-stack Laravel developer. Chrome buttons, CRT scanlines, floppy disks and real projects — powered by 100% Y2K energy." />
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E%F0%9F%92%BE%3C/text%3E%3C/svg%3E" />

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" referrerpolicy="no-referrer" />

<style>
/* ============ RESET & BASE ============ */
*,*::before,*::after{ margin:0; padding:0; box-sizing:border-box; }
:root{
  --magenta:#ff2e88;
  --magenta-dark:#c2006b;
  --cyan:#00e5ff;
  --purple:#8b2fd6;
  --purple-deep:#5a2f8a;
  --yellow:#ffe600;
  --lime:#7CFF00;
  --ink:#1a0a33;
  --ink-soft:#3a2a5a;
  --panel:#dcd4f0;
  --panel-dark:#c8c2e0;
  --page-text:#e6e0ff;
  --page-text-dim:#d8c9f5;
  --dark-card:#151027;
}
html{ scroll-behavior:smooth; }
body{
  font-family:'VT323', 'Verdana', 'Tahoma', sans-serif;
  font-size:1.15rem;
  background:#0d0322;
  color:var(--page-text);
  overflow-x:hidden;
  padding-bottom:64px;
  position:relative;
}
img,svg{ max-width:100%; display:block; }
a{ color:inherit; }
button{ font:inherit; }
h1,h2,h3{ line-height:1.25; }
ul{ list-style:none; }

/* ============ FOCUS STATES ============ */
a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible{
  outline:3px solid var(--cyan);
  outline-offset:2px;
}

/* ============ SKIP LINK ============ */
.skip-link{
  position:absolute; left:-9999px; top:0;
  background:var(--yellow); color:var(--ink);
  padding:10px 18px; z-index:10100;
  font-family:'VT323',monospace; font-size:1.1rem;
  border-radius:0 0 6px 0;
}
.skip-link:focus{ left:0; top:0; }

/* ============ BACKGROUND LAYERS ============ */
.bg-fixed{
  position:fixed; inset:0; z-index:-3;
  background:linear-gradient(135deg,#1a0638,#3d0a5c 25%,#6a0f8f 45%,#0d3b66 70%,#072140);
  background-size:400% 400%;
  animation:bgShift 24s ease-in-out infinite;
}
@keyframes bgShift{ 0%,100%{background-position:0% 50%;} 50%{background-position:100% 50%;} }
.bg-grid{
  position:fixed; inset:0; z-index:-2; opacity:0.14; pointer-events:none;
  background-image:
    repeating-linear-gradient(0deg, rgba(0,229,255,0.5) 0px, rgba(0,229,255,0.5) 1px, transparent 1px, transparent 64px),
    repeating-linear-gradient(90deg, rgba(255,46,136,0.5) 0px, rgba(255,46,136,0.5) 1px, transparent 1px, transparent 64px);
}
.bg-stars{
  position:fixed; inset:0; z-index:-1; pointer-events:none;
  background-image:
    radial-gradient(2px 2px at 20% 30%, #fff, transparent),
    radial-gradient(2px 2px at 70% 65%, #fff, transparent),
    radial-gradient(1.5px 1.5px at 40% 80%, #ffe600, transparent),
    radial-gradient(1.5px 1.5px at 85% 20%, #00e5ff, transparent),
    radial-gradient(1.5px 1.5px at 55% 45%, #fff, transparent),
    radial-gradient(1.5px 1.5px at 10% 90%, #ff2e88, transparent),
    radial-gradient(1.5px 1.5px at 92% 75%, #fff, transparent);
  background-size:600px 600px;
  animation:starTwinkle 5s ease-in-out infinite alternate;
}
@keyframes starTwinkle{ 0%{opacity:0.5;} 100%{opacity:0.95;} }

/* ============ CRT OVERLAY ============ */
.crt-overlay{
  position:fixed; inset:0; z-index:9990; pointer-events:none;
  background:repeating-linear-gradient(0deg, rgba(0,0,0,0.16) 0px, rgba(0,0,0,0.16) 1px, transparent 2px, transparent 3px);
  mix-blend-mode:multiply;
  animation:crtFlicker 6s ease-in-out infinite;
}
.crt-overlay::after{
  content:''; position:absolute; inset:0;
  background:radial-gradient(ellipse at center, transparent 55%, rgba(0,0,0,0.5) 100%);
}
@keyframes crtFlicker{ 0%,100%{opacity:0.42;} 50%{opacity:0.5;} }
@media (prefers-reduced-motion: reduce){ .crt-overlay{ animation:none; opacity:0.4; } .bg-stars{ animation:none; opacity:0.75; } }

/* ============ CUSTOM CURSOR ============ */
.cursor-dot, .cursor-ring{
  position:fixed; top:0; left:0; pointer-events:none; z-index:10000;
  transform:translate(-50%,-50%);
  opacity:0;
}
.cursor-dot{
  width:8px; height:8px; border-radius:50%;
  background:var(--yellow);
  box-shadow:0 0 6px var(--yellow), 0 0 12px var(--magenta);
}
.cursor-ring{
  width:28px; height:28px; border-radius:50%;
  border:2px solid var(--cyan);
  box-shadow:0 0 0 1px rgba(255,46,136,0.5);
  transition:width .2s, height .2s, border-color .2s, opacity .2s, transform .1s;
  z-index:9999;
}
.cursor-ring.hover{ width:46px; height:46px; border-color:var(--magenta); box-shadow:0 0 0 2px rgba(0,229,255,0.6), 0 0 18px rgba(255,46,136,0.55); }
.cursor-ring.click{ transform:translate(-50%,-50%) scale(0.8); }
body.has-fine-pointer .cursor-dot, body.has-fine-pointer .cursor-ring{ opacity:1; }
body.has-fine-pointer, body.has-fine-pointer a, body.has-fine-pointer button, body.has-fine-pointer label,
body.has-fine-pointer .win-btn, body.has-fine-pointer .task-item, body.has-fine-pointer .start-btn{ cursor:none; }
body.has-fine-pointer input, body.has-fine-pointer textarea{ cursor:text; }

.trail-star{
  position:fixed; top:0; left:0; z-index:9998; pointer-events:none;
  transform:translate(-50%,-50%);
  animation:trailFade .7s ease-out forwards;
}
@keyframes trailFade{
  0%{ opacity:1; transform:translate(-50%,-50%) scale(1) rotate(0deg); }
  100%{ opacity:0; transform:translate(-50%,-50%) scale(0.2) translateY(-24px) rotate(90deg); }
}

/* ============ SCROLLBAR ============ */
::-webkit-scrollbar{ width:14px; height:14px; }
::-webkit-scrollbar-track{ background:#1a0a33; }
::-webkit-scrollbar-thumb{ background:linear-gradient(180deg,var(--magenta),var(--purple),var(--cyan)); border:2px solid #1a0a33; border-radius:2px; }

/* ============ TYPOGRAPHY HELPERS ============ */
.section{ position:relative; z-index:2; padding:5rem 1.25rem; scroll-margin-top:16px; }
.section-inner{ max-width:1180px; margin:0 auto; }
.section-title{
  font-family:'Press Start 2P', monospace;
  font-size:clamp(1.05rem, 3vw, 1.7rem);
  color:#fff;
  text-shadow:3px 3px 0 var(--magenta), 6px 6px 0 rgba(0,0,0,0.3);
  margin-bottom:0.6rem;
}
.section-title.center{ text-align:center; }
.section-sub{
  font-family:'VT323', monospace;
  font-size:1.25rem;
  color:var(--page-text-dim);
  text-align:center;
  margin-bottom:2.4rem;
}
.win-body .section-title{ color:var(--ink); text-shadow:2px 2px 0 rgba(255,46,136,0.4); }
.win-body .section-sub{ color:#4b3a7a; }
.win-body p a{ color:var(--purple); text-decoration:underline; font-weight:600; }
.win-body p a:hover{ color:var(--magenta-dark); }
.eyebrow{ font-family:'VT323',monospace; color:var(--magenta-dark); font-size:1.05rem; margin-bottom:0.6rem; letter-spacing:0.5px; }

.blink-soft{ animation:blinkSoft 1.4s ease-in-out infinite; }
@keyframes blinkSoft{ 0%,100%{opacity:1;} 50%{opacity:0.35;} }
@media (prefers-reduced-motion: reduce){ .blink-soft{ animation:none; opacity:0.75; } }

.chrome-text{
  font-family:'Press Start 2P', monospace;
  font-size:clamp(1.5rem, 6vw, 3rem);
  line-height:1.35;
  display:inline-block;
  background:linear-gradient(180deg,#fff 0%,#cfd3ff 35%,#8b8fd0 55%,#fff 60%,#5a4a9a 100%);
  -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
  text-shadow:0 2px 0 rgba(0,0,0,0.4);
  -webkit-text-stroke:0.5px rgba(26,10,51,0.35);
}
.chrome-text.grad-text{
  background:linear-gradient(90deg,var(--magenta),var(--yellow),var(--cyan),var(--purple));
  -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
  background-size:300% 100%;
  animation:gradFlow 8s ease infinite;
}
@keyframes gradFlow{ 0%,100%{background-position:0% 50%;} 50%{background-position:100% 50%;} }

/* ============ GLITCH / VHS HOVER ============ */
.glitch-hover{ position:relative; display:inline-block; }
.glitch-hover:hover{ animation:glitchShift .4s steps(2) infinite; }
.glitch-hover::before, .glitch-hover::after{ content:''; position:absolute; inset:0; opacity:0; }
.glitch-hover:hover::before{
  content:attr(data-text); color:var(--cyan); transform:translate(-2px,0);
  mix-blend-mode:screen; clip-path:inset(0 0 50% 0); opacity:0.8;
}
.glitch-hover:hover::after{
  content:attr(data-text); color:var(--magenta); transform:translate(2px,0);
  mix-blend-mode:screen; clip-path:inset(50% 0 0 0); opacity:0.8;
}
@keyframes glitchShift{ 0%{transform:translate(0,0);} 50%{transform:translate(-1px,1px);} 100%{transform:translate(1px,-1px);} }

/* ============ MARQUEE ============ */
.marquee-banner{
  overflow:hidden; white-space:nowrap;
  border:2px solid var(--ink); border-radius:4px;
  background:#000; padding:8px 0; margin-bottom:1.4rem;
}
.marquee-track{ display:inline-flex; animation:marqueeScroll 20s linear infinite; }
.marquee-track span{ padding-right:3rem; font-family:'VT323',monospace; font-size:1.15rem; color:var(--yellow); letter-spacing:1px; }
@keyframes marqueeScroll{ from{ transform:translateX(0); } to{ transform:translateX(-50%); } }
@media (prefers-reduced-motion: reduce){ .marquee-track{ animation-duration:60s; } }

/* ============ CHROME / BEVEL BUTTONS ============ */
.chrome-btn{
  display:inline-flex; align-items:center; gap:8px;
  padding:10px 18px;
  font-family:'VT323',monospace; font-size:1.1rem; letter-spacing:0.4px;
  color:var(--ink);
  background:linear-gradient(180deg,#ffffff,#d6d6e6 45%,#a3a3c2);
  border:2px solid; border-color:#fff #333 #333 #fff;
  border-radius:4px;
  cursor:pointer;
  text-decoration:none;
  box-shadow:2px 2px 0 rgba(0,0,0,0.25);
  transition:transform .12s ease, background .12s ease;
}
.chrome-btn:hover{ background:linear-gradient(180deg,#fff,#e7e7fb 45%,#b9b9de); transform:translateY(-1px); }
.chrome-btn:active{ border-color:#333 #fff #fff #333; transform:translateY(1px); box-shadow:none; }
.chrome-btn.primary{ background:linear-gradient(180deg,#ff8fd0,var(--magenta) 45%,#c2006b); color:#fff; text-shadow:0 1px 1px rgba(0,0,0,0.4); }
.chrome-btn.primary:hover{ background:linear-gradient(180deg,#ffa8dc,#ff4b9c 45%,#d61b81); }
.chrome-btn.small{ padding:6px 12px; font-size:1rem; }
.chrome-btn:disabled{ opacity:0.65; cursor:default; transform:none; }

/* ============ WINDOWS-98 WINDOW COMPONENT ============ */
.win98-window{
  background:linear-gradient(180deg, rgba(235,230,255,0.98), rgba(215,205,245,0.98));
  border-radius:6px;
  border:2px solid var(--ink);
  box-shadow:4px 4px 0 rgba(0,0,0,0.35), 8px 8px 24px rgba(0,0,0,0.35);
  overflow:hidden;
  color:var(--ink);
  transition:transform .15s ease;
}
.win98-window.win-zoom{ transform:scale(1.015); box-shadow:0 0 0 3px var(--cyan), 6px 6px 0 rgba(0,0,0,0.4); position:relative; z-index:5; }
.win98-window.win-collapsed .win-body,
.win98-window.win-collapsed .win-statusbar,
.win98-window.win-collapsed .browser-toolbar{ display:none; }
@keyframes shakeWin{ 0%,100%{transform:translateX(0);} 20%{transform:translateX(-6px);} 40%{transform:translateX(6px);} 60%{transform:translateX(-4px);} 80%{transform:translateX(4px);} }
.win98-window.shake{ animation:shakeWin .4s ease; }

.win-titlebar{
  display:flex; align-items:center; justify-content:space-between; gap:0.6rem;
  padding:7px 8px;
  background:linear-gradient(90deg, var(--magenta), var(--purple) 55%, var(--cyan));
  color:#fff;
  font-family:'Press Start 2P', monospace;
  font-size:0.62rem;
  letter-spacing:0.5px;
  border-bottom:2px solid var(--ink);
}
.win-title{ display:flex; align-items:center; gap:6px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.win-controls{ display:flex; gap:4px; flex-shrink:0; }
.win-btn{
  width:22px; height:20px;
  background:linear-gradient(180deg,#fdfdfd,#c8c8c8 45%,#8f8f8f);
  border:1px solid; border-color:#fff #4a4a4a #4a4a4a #fff;
  border-radius:2px;
  font-family:'VT323',monospace; font-size:0.95rem; line-height:1; color:#222;
  cursor:pointer; display:flex; align-items:center; justify-content:center;
}
.win-btn:active{ border-color:#4a4a4a #fff #fff #4a4a4a; }
.win-close:hover{ background:linear-gradient(180deg,#ff7a7a,#e02222 60%,#a10000); color:#fff; }

.win-body{ padding:1.5rem 1.6rem; }
.win-statusbar{
  display:flex; justify-content:space-between; gap:0.5rem; flex-wrap:wrap;
  padding:5px 12px; background:#d8d0f0; border-top:1px solid #a89fd0;
  font-family:'VT323',monospace; font-size:1rem; color:#4b3a7a;
}

/* ============ FORM ELEMENTS ============ */
.retro-form{ display:flex; flex-direction:column; gap:1.1rem; margin-top:1rem; }
.form-row{ display:flex; flex-direction:column; gap:0.35rem; }
.form-row label{ font-family:'VT323',monospace; font-size:1.1rem; color:#2a1750; }
.form-row input, .form-row textarea{
  font-family:'VT323',monospace; font-size:1.1rem;
  padding:0.6rem 0.7rem;
  border:2px solid; border-color:#333 #fff #fff #333;
  border-radius:2px; background:#fff; color:#111; resize:vertical;
}
.inline-status{ font-family:'VT323',monospace; font-size:1.1rem; min-height:1.4em; margin-top:0.2rem; }
.inline-status.success{ color:#0a7a3c; font-weight:700; }
.inline-status.error{ color:#c81e3a; font-weight:700; }

/* ============ LOADING BARS ============ */
.loadbar{
  width:100%; height:18px;
  border:2px solid; border-color:#333 #fff #fff #333;
  border-radius:2px;
  background:repeating-linear-gradient(45deg,#e4defa,#e4defa 6px,#cfc6ec 6px,#cfc6ec 12px);
  overflow:hidden;
}
.loadbar.big{ height:26px; border-color:#fff; }
.loadbar-fill{
  height:100%; width:0%;
  background:linear-gradient(90deg,var(--magenta),var(--purple),var(--cyan));
  background-size:200% 100%;
  animation:fillShimmer 1.5s linear infinite;
  transition:width 1.1s cubic-bezier(.2,.8,.3,1);
}
@keyframes fillShimmer{ from{background-position:0% 0;} to{background-position:200% 0;} }

/* ============ LOADING SCREEN ============ */
.loading-screen{
  position:fixed; inset:0; z-index:10050;
  display:flex; align-items:center; justify-content:center;
  background:radial-gradient(circle at center, #2a1250, #0b0220 75%);
  transition:opacity .6s ease, visibility .6s;
}
.loading-screen.hidden{ opacity:0; visibility:hidden; pointer-events:none; }
.loading-box{ text-align:center; color:#fff; padding:1rem; }
.loading-logo{
  font-family:'Press Start 2P', monospace; font-size:clamp(1rem,4vw,1.5rem);
  margin-bottom:1.6rem;
  background:linear-gradient(90deg,var(--magenta),var(--cyan));
  -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
}
.loading-logo span{ color:var(--yellow); -webkit-text-fill-color:var(--yellow); }
.loading-box .loadbar{ width:280px; max-width:70vw; margin:0 auto; }
.loading-pct{ margin-top:0.9rem; font-size:1.25rem; letter-spacing:1px; font-family:'VT323',monospace; }

/* ============ DIALOG / POPUP ============ */
.dialog-overlay{
  position:fixed; inset:0; z-index:10060;
  background:rgba(10,2,25,0.62);
  backdrop-filter:blur(3px);
  display:flex; align-items:center; justify-content:center;
  padding:1rem;
  transition:opacity .2s ease, visibility .2s;
}
.dialog-overlay.hidden{ opacity:0; visibility:hidden; pointer-events:none; }
.dialog-box{
  width:380px; max-width:100%;
  background:linear-gradient(180deg,#f2eeff,#dcd4f5);
  border:2px solid var(--ink); border-radius:6px;
  box-shadow:6px 6px 0 rgba(0,0,0,0.4);
  overflow:hidden;
  animation:dialogPop .25s ease;
}
@keyframes dialogPop{ from{ transform:scale(0.85); opacity:0; } to{ transform:scale(1); opacity:1; } }
.dialog-body{ display:flex; gap:1rem; align-items:flex-start; padding:1.4rem; color:var(--ink); }
.dialog-icon{ font-size:2rem; flex-shrink:0; color:#1a9850; }
.dialog-icon.error{ color:#e0304f; }
.dialog-actions{ display:flex; justify-content:center; padding:0 1.4rem 1.4rem; }

/* ============ TASKBAR NAV ============ */
.taskbar{
  position:fixed; left:0; right:0; bottom:0; z-index:9000;
  height:52px; display:flex; align-items:center; gap:0.6rem;
  padding:0 0.6rem;
  background:linear-gradient(180deg,#2d1b55,#1a0a33);
  border-top:2px solid #6a2fd6;
  box-shadow:0 -4px 20px rgba(0,0,0,0.5);
}
.start-wrap{ position:relative; flex-shrink:0; }
.start-btn{
  display:flex; align-items:center; gap:0.5rem; height:38px; padding:0 0.9rem;
  background:linear-gradient(180deg,#3fdc7a,#1a8f4a);
  border:2px solid; border-color:#7dffb0 #0a5a2a #0a5a2a #7dffb0;
  border-radius:4px;
  font-family:'Press Start 2P', monospace; font-size:0.62rem; color:#fff;
  cursor:pointer;
}
.start-logo{ display:grid; grid-template-columns:1fr 1fr; grid-template-rows:1fr 1fr; width:15px; height:15px; gap:1px; flex-shrink:0; }
.start-logo span:nth-child(1){ background:#ff2e55; }
.start-logo span:nth-child(2){ background:#ffe600; }
.start-logo span:nth-child(3){ background:#00e5ff; }
.start-logo span:nth-child(4){ background:#7CFF00; }

.start-menu{
  position:absolute; bottom:56px; left:0; width:260px;
  display:flex; overflow:hidden;
  background:linear-gradient(180deg,#f2eeff,#dcd4f5);
  border:2px solid var(--ink); border-radius:6px 6px 0 0;
  box-shadow:4px 4px 0 rgba(0,0,0,0.4);
  opacity:0; visibility:hidden; transform:translateY(10px);
  transition:opacity .18s ease, transform .18s ease, visibility .18s;
}
.start-menu.open{ opacity:1; visibility:visible; transform:translateY(0); }
.start-menu-banner{
  writing-mode:vertical-rl; transform:rotate(180deg);
  background:linear-gradient(180deg,var(--magenta),var(--purple),var(--cyan));
  color:#fff; font-family:'Press Start 2P',monospace; font-size:0.68rem; letter-spacing:2px;
  display:flex; align-items:center; justify-content:center; padding:0.8rem 0.45rem;
}
.start-menu ul{ flex:1; padding:0.4rem; }
.start-menu li a{
  display:flex; align-items:center; gap:0.6rem;
  padding:0.55rem 0.6rem; border-radius:3px;
  font-family:'VT323',monospace; font-size:1.1rem; color:var(--ink); text-decoration:none;
}
.start-menu li a:hover, .start-menu li a:focus-visible{ background:linear-gradient(90deg,var(--magenta),var(--purple)); color:#fff; outline:none; }
.start-menu-divider{ height:1px; background:#a89fd0; margin:0.4rem 0.6rem; }

.taskbar-items{ display:flex; gap:0.4rem; flex:1; overflow-x:auto; scrollbar-width:none; }
.taskbar-items::-webkit-scrollbar{ display:none; }
.task-item{
  display:flex; align-items:center; gap:0.4rem; height:38px; padding:0 0.7rem; flex-shrink:0;
  background:linear-gradient(180deg,#4a3a80,#2d1f55);
  border:1px solid #6a4fb0; border-radius:3px;
  color:var(--page-text); text-decoration:none;
  font-family:'VT323',monospace; font-size:1rem; white-space:nowrap;
}
.task-item.active{ background:linear-gradient(180deg,#1a1030,#0d0820); border-color:var(--cyan); box-shadow:inset 0 0 0 1px rgba(0,229,255,0.5); }
.tray{ display:flex; align-items:center; gap:0.9rem; padding:0 0.4rem 0 0.9rem; border-left:1px solid #6a4fb0; height:38px; color:var(--page-text); flex-shrink:0; }
.tray-icon{ font-size:0.95rem; opacity:0.85; }
.tray-clock{ font-family:'VT323',monospace; font-size:1.05rem; min-width:64px; text-align:center; }
@media (max-width:700px){ .taskbar-items{ display:none; } }

/* ============ HERO ============ */
.hero-section{ padding-top:3.5rem; }
.hero-inner{ display:grid; grid-template-columns:1fr 220px; gap:2.4rem; align-items:start; }
.hero-role{ color:var(--purple-deep); font-family:'VT323',monospace; font-size:1.35rem; margin:0.5rem 0 1rem; }
.dot-sep{ color:var(--magenta-dark); }
.hero-desc{ color:var(--ink-soft); line-height:1.7; margin-bottom:1.6rem; max-width:60ch; }
.hero-cta{ display:flex; gap:0.9rem; flex-wrap:wrap; }
.hero-side{ display:flex; flex-direction:column; gap:1.6rem; align-items:center; }
.badge-stack{ display:flex; flex-direction:column; gap:0.8rem; }
.webbadge{
  width:150px; padding:0.6rem; text-align:center;
  font-family:'VT323',monospace; font-size:1rem; color:#111;
  background:linear-gradient(135deg,var(--yellow),#ff9900);
  border:2px solid var(--ink); border-radius:4px;
  box-shadow:3px 3px 0 rgba(0,0,0,0.3);
}
.webbadge.alt{ background:linear-gradient(135deg,var(--cyan),var(--purple)); color:#fff; }
.webbadge.small{ width:auto; padding:0.5rem 0.9rem; font-size:0.95rem; }
.floppy-spin svg{ width:70px; height:70px; animation:floppySpin 6s linear infinite; filter:drop-shadow(0 0 10px rgba(0,229,255,0.5)); }
@keyframes floppySpin{ from{ transform:rotateY(0deg); } to{ transform:rotateY(360deg); } }
.scroll-cue{
  display:flex; align-items:center; justify-content:center;
  width:40px; height:40px; border-radius:50%;
  border:2px solid var(--cyan); color:var(--cyan);
  animation:bounceCue 1.8s ease-in-out infinite;
  text-decoration:none;
}
@keyframes bounceCue{ 0%,100%{ transform:translateY(0); } 50%{ transform:translateY(6px); } }
@media (max-width:900px){
  .hero-inner{ grid-template-columns:1fr; }
  .hero-side{ flex-direction:row; flex-wrap:wrap; justify-content:center; }
  .badge-stack{ flex-direction:row; flex-wrap:wrap; justify-content:center; }
  .scroll-cue{ display:none; }
}

/* ============ ABOUT ============ */
.about-body{ display:flex; gap:2rem; align-items:flex-start; }
.about-avatar{ flex-shrink:0; width:150px; display:flex; justify-content:center; padding-top:0.5rem; }
.pixel-avatar{
  width:8px; height:8px; transform:scale(12); image-rendering:pixelated;
  box-shadow:
    2px 0 0 #8b2fd6, 3px 0 0 #8b2fd6, 4px 0 0 #8b2fd6, 5px 0 0 #8b2fd6,
    1px 1px 0 #8b2fd6, 2px 1px 0 #8b2fd6, 3px 1px 0 #8b2fd6, 4px 1px 0 #8b2fd6, 5px 1px 0 #8b2fd6, 6px 1px 0 #8b2fd6,
    0px 2px 0 #8b2fd6, 1px 2px 0 #8b2fd6, 2px 2px 0 #00c2e0, 3px 2px 0 #8b2fd6, 4px 2px 0 #8b2fd6, 5px 2px 0 #00c2e0, 6px 2px 0 #8b2fd6, 7px 2px 0 #8b2fd6,
    0px 3px 0 #8b2fd6, 1px 3px 0 #8b2fd6, 2px 3px 0 #8b2fd6, 3px 3px 0 #8b2fd6, 4px 3px 0 #8b2fd6, 5px 3px 0 #8b2fd6, 6px 3px 0 #8b2fd6, 7px 3px 0 #8b2fd6,
    0px 4px 0 #8b2fd6, 1px 4px 0 #e0007a, 2px 4px 0 #8b2fd6, 3px 4px 0 #8b2fd6, 4px 4px 0 #8b2fd6, 5px 4px 0 #8b2fd6, 6px 4px 0 #e0007a, 7px 4px 0 #8b2fd6,
    0px 5px 0 #8b2fd6, 1px 5px 0 #8b2fd6, 2px 5px 0 #e0007a, 3px 5px 0 #e0007a, 4px 5px 0 #e0007a, 5px 5px 0 #e0007a, 6px 5px 0 #8b2fd6, 7px 5px 0 #8b2fd6,
    1px 6px 0 #8b2fd6, 2px 6px 0 #8b2fd6, 3px 6px 0 #8b2fd6, 4px 6px 0 #8b2fd6, 5px 6px 0 #8b2fd6, 6px 6px 0 #8b2fd6,
    2px 7px 0 #8b2fd6, 3px 7px 0 #8b2fd6, 4px 7px 0 #8b2fd6, 5px 7px 0 #8b2fd6;
}
.about-content p{ line-height:1.75; }
.edu-list{ display:flex; flex-direction:column; gap:1rem; margin-top:1.4rem; }
.edu-item{ display:flex; gap:0.8rem; align-items:flex-start; background:rgba(26,10,51,0.06); border:1px solid rgba(26,10,51,0.18); border-radius:6px; padding:0.8rem 1rem; }
.edu-item i{ color:var(--magenta-dark); font-size:1.3rem; margin-top:0.2rem; }
.edu-item strong{ display:block; color:var(--ink); font-family:'VT323',monospace; font-size:1.2rem; }
.edu-item span{ color:#4b3a7a; font-size:1rem; }
@media (max-width:700px){ .about-body{ flex-direction:column; align-items:center; text-align:center; } }

/* ============ PROJECTS ============ */
.projects-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:2rem; }
.browser-window{ background:var(--dark-card); color:var(--page-text); }
.browser-toolbar{
  display:flex; align-items:center; gap:0.6rem; padding:6px 10px;
  background:#dcd4f0; border-bottom:1px solid #a89fd0;
}
.browser-btns{ display:flex; gap:8px; color:#5a4a8a; font-size:0.85rem; }
.browser-address{
  flex:1; background:#fff; border:1px solid #a89fd0; border-radius:10px; padding:3px 10px;
  font-family:'VT323',monospace; font-size:1rem; color:#333;
  display:flex; align-items:center; gap:6px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;
}
.browser-window .win-body{ position:relative; }
.ribbon{
  position:absolute; top:-2px; right:14px;
  background:var(--yellow); color:#3a2a00; font-family:'VT323',monospace;
  padding:2px 10px; font-size:0.95rem; border-radius:0 0 4px 4px;
  box-shadow:2px 2px 0 rgba(0,0,0,0.3);
}
.browser-window h3{ font-family:'Press Start 2P', monospace; font-size:0.95rem; margin-bottom:0.8rem; color:#fff; }
.browser-window p{ line-height:1.6; color:var(--page-text-dim); }
.stack-pills{ display:flex; flex-wrap:wrap; gap:0.5rem; margin-top:1.1rem; }
.stack-pills span{
  font-family:'VT323',monospace; font-size:1rem;
  background:linear-gradient(180deg,#fff,#cfd3ff); color:var(--ink);
  padding:3px 11px; border-radius:12px; border:1px solid var(--ink);
}

/* ============ SKILLS ============ */
.skill-bars{ display:flex; flex-direction:column; gap:1rem; }
.skill-bar-row{ display:grid; grid-template-columns:170px 1fr 52px; align-items:center; gap:1rem; font-size:1.1rem; }
.skill-name{ display:flex; align-items:center; gap:0.5rem; }
.skill-name i{ color:var(--magenta-dark); width:1.1em; text-align:center; }
.skill-pct{ text-align:right; font-weight:700; }
.floppy-grid{ display:grid; grid-template-columns:repeat(auto-fill,minmax(118px,1fr)); gap:1rem; margin-top:2.2rem; }
.floppy-badge{
  display:flex; flex-direction:column; align-items:center; gap:0.45rem;
  background:rgba(26,10,51,0.05); border:1px solid rgba(26,10,51,0.18); border-radius:6px;
  padding:0.9rem 0.5rem; transition:transform .2s, background .2s;
}
.floppy-badge:hover{ transform:translateY(-4px) rotate(-2deg); background:rgba(26,10,51,0.12); }
.floppy-badge svg{ width:34px; height:34px; }
.floppy-badge span{ font-family:'VT323',monospace; font-size:1rem; color:var(--ink); text-align:center; }
@media (max-width:520px){ .skill-bar-row{ grid-template-columns:1fr; row-gap:0.35rem; } .skill-pct{ text-align:left; } }

/* ============ EXPERIENCE (FORUM) ============ */
.forum-thread{ display:flex; flex-direction:column; gap:1.4rem; }
.forum-post{
  display:grid; grid-template-columns:140px 1fr;
  background:var(--dark-card); border:2px solid var(--ink); border-radius:6px; overflow:hidden;
}
.post-sidebar{
  background:#1e1440; padding:1rem; display:flex; flex-direction:column; align-items:center; gap:0.5rem;
  border-right:2px solid var(--ink); text-align:center;
}
.post-sidebar svg{ width:48px; height:48px; }
.post-user{ font-family:'VT323',monospace; color:var(--cyan); font-size:1.1rem; }
.post-rank{ font-size:0.78rem; color:var(--yellow); }
.post-main{ padding:1.1rem 1.3rem; }
.post-header{ display:flex; align-items:center; gap:0.7rem; flex-wrap:wrap; }
.post-subject{ font-family:'Press Start 2P', monospace; font-size:0.82rem; color:#fff; }
.post-badge{ background:#ff2e55; color:#fff; font-family:'VT323',monospace; padding:1px 9px; border-radius:3px; font-size:0.9rem; }
.forum-post.is-new .post-badge{ animation:blinkSoft 1.4s ease-in-out infinite; }
.post-meta{ font-family:'VT323',monospace; color:#a89fd0; margin:0.5rem 0 0.7rem; font-size:1rem; }
.online-dot{ display:inline-block; width:8px; height:8px; border-radius:50%; background:#22ff88; box-shadow:0 0 6px #22ff88; margin-right:2px; }
.post-body{ color:var(--page-text-dim); line-height:1.65; }
@media (max-width:560px){ .forum-post{ grid-template-columns:1fr; } .post-sidebar{ flex-direction:row; justify-content:center; border-right:none; border-bottom:2px solid var(--ink); } }

/* ============ GUESTBOOK ============ */
.guestbook-list{ display:flex; flex-direction:column; gap:1rem; margin:1.6rem 0; max-height:420px; overflow-y:auto; padding-right:0.4rem; }
.gb-entry{
  display:flex; gap:0.9rem;
  background:rgba(26,10,51,0.05); border:1px solid rgba(26,10,51,0.16); border-radius:6px;
  padding:0.9rem 1rem;
}
.gb-avatar{ width:38px; height:38px; flex-shrink:0; }
.gb-top{ display:flex; justify-content:space-between; gap:0.6rem; flex-wrap:wrap; }
.gb-top strong{ color:var(--purple); font-family:'VT323',monospace; font-size:1.15rem; }
.gb-date{ color:#5a4a8a; font-family:'VT323',monospace; font-size:0.95rem; }
.gb-stars{ color:#a8790a; font-size:0.95rem; margin:0.15rem 0; }
.gb-entry p{ color:#2a1750; line-height:1.55; }
.gb-entry.new-entry{ animation:gbPop .5s ease; }
@keyframes gbPop{ from{ transform:scale(0.92); opacity:0; } to{ transform:scale(1); opacity:1; } }

/* ============ CONTACT ============ */
.contact-body{ display:grid; grid-template-columns:1fr 1.1fr; gap:2.4rem; }
.contact-info p{ line-height:1.7; margin-bottom:1.2rem; }
.contact-links{ display:flex; flex-direction:column; gap:0.7rem; align-items:flex-start; }
@media (max-width:800px){ .contact-body{ grid-template-columns:1fr; } }

/* ============ FOOTER ============ */
.site-footer{ position:relative; z-index:2; padding:3rem 1.25rem 2.5rem; }
.footer-inner{ max-width:1000px; margin:0 auto; text-align:center; }
.footer-marquee{ margin-bottom:2rem; }
.webring{
  display:flex; align-items:center; justify-content:center; gap:1rem; flex-wrap:wrap;
  margin-bottom:1.6rem; font-family:'VT323',monospace; font-size:1.1rem;
}
.webring-btn{
  padding:8px 14px; border:2px solid; border-color:#fff #333 #333 #fff;
  background:linear-gradient(180deg,#fff,#c8c8e0); color:var(--ink); border-radius:4px;
}
.webring-center{ display:flex; align-items:center; gap:0.5rem; color:var(--yellow); flex-direction:column; }
.webring-count{ font-size:0.9rem; color:var(--page-text-dim); }
.footer-badges{ display:flex; justify-content:center; gap:0.8rem; flex-wrap:wrap; margin-bottom:1.6rem; }
.footer-copy{ color:var(--page-text-dim); font-size:1.05rem; margin-bottom:1.4rem; }
#backToTop{ margin:0 auto; }
</style>
</head>
<body>

<a class="skip-link" href="#main-content">Skip to main content</a>

<svg style="display:none" aria-hidden="true">
  <symbol id="icon-floppy" viewBox="0 0 32 32">
    <rect x="2" y="2" width="28" height="28" rx="2" fill="#2b2b6b" stroke="#0d0d33" stroke-width="1"/>
    <rect x="6" y="2" width="16" height="10" fill="#c7c7e8"/>
    <rect x="9" y="4" width="7" height="6" fill="#8a8ad0"/>
    <rect x="5" y="16" width="22" height="12" fill="#f2f2ff" stroke="#9a9ad0" stroke-width="1"/>
    <rect x="8" y="19" width="16" height="2" fill="#8a8ad0"/>
    <rect x="8" y="23" width="10" height="2" fill="#8a8ad0"/>
    <circle cx="24" cy="6" r="1.4" fill="#ff2e88"/>
  </symbol>
  <symbol id="icon-star" viewBox="0 0 24 24">
    <path d="M12 2 L14.5 9 L22 9.5 L16 14.5 L18 22 L12 17.5 L6 22 L8 14.5 L2 9.5 L9.5 9 Z" fill="currentColor"/>
  </symbol>
  <symbol id="icon-computer" viewBox="0 0 32 32">
    <rect x="2" y="4" width="28" height="18" rx="1" fill="#dcdcf5" stroke="#4b4b8a" stroke-width="1.5"/>
    <rect x="5" y="7" width="22" height="12" fill="#1b1040"/>
    <rect x="10" y="24" width="12" height="3" fill="#9a9ad0"/>
    <rect x="7" y="27" width="18" height="2" fill="#4b4b8a"/>
  </symbol>
  <symbol id="icon-smiley" viewBox="0 0 24 24">
    <circle cx="12" cy="12" r="10" fill="#ffe600" stroke="#8a6d00" stroke-width="1"/>
    <circle cx="8.5" cy="10" r="1.5" fill="#2b1a00"/>
    <circle cx="15.5" cy="10" r="1.5" fill="#2b1a00"/>
    <path d="M7 15 Q12 19 17 15" stroke="#2b1a00" stroke-width="1.6" fill="none" stroke-linecap="round"/>
  </symbol>
  <symbol id="icon-heart" viewBox="0 0 24 24">
    <path d="M12 21s-8-5.2-8-11.2C4 6 6.5 4 9.2 4c1.6 0 3 .8 2.8 2.6C12.8 4.8 14.4 4 16 4c2.7 0 5.2 2 5.2 5.8C21.2 15.8 12 21 12 21z" fill="currentColor"/>
  </symbol>
  <symbol id="icon-alien" viewBox="0 0 24 24">
    <ellipse cx="12" cy="11" rx="7" ry="9" fill="#7CFF00" stroke="#3c7a00" stroke-width="1"/>
    <ellipse cx="8.5" cy="10" rx="2" ry="3" fill="#111"/>
    <ellipse cx="15.5" cy="10" rx="2" ry="3" fill="#111"/>
    <path d="M9 17q3 2 6 0" stroke="#111" stroke-width="1.2" fill="none"/>
  </symbol>
</svg>

<div class="bg-fixed" aria-hidden="true"></div>
<div class="bg-grid" aria-hidden="true"></div>
<div class="bg-stars" aria-hidden="true"></div>
<div class="crt-overlay" aria-hidden="true"></div>
<div id="cursorRing" class="cursor-ring" aria-hidden="true"></div>
<div id="cursorDot" class="cursor-dot" aria-hidden="true"></div>

<div id="loadingScreen" class="loading-screen" role="status" aria-live="polite">
  <div class="loading-box">
    <div class="loading-logo">ESTIAQUE<span>98</span></div>
    <div class="loadbar big"><div class="loadbar-fill" id="bootBarFill"></div></div>
    <div class="loading-pct" id="bootPct">Loading... 0%</div>
  </div>
</div>

<header id="hero" class="section hero-section">
  <div class="section-inner hero-inner">
    <div class="hero-text">
      <div class="marquee-banner" aria-hidden="true">
        <div class="marquee-track">
          <span>★ WELCOME TO MY HOMEPAGE ★ BEST VIEWED AT 1024x768 ★ NOW WITH 100% MORE JAVASCRIPT ★ THANKS FOR STOPPING BY ★</span>
          <span>★ WELCOME TO MY HOMEPAGE ★ BEST VIEWED AT 1024x768 ★ NOW WITH 100% MORE JAVASCRIPT ★ THANKS FOR STOPPING BY ★</span>
        </div>
      </div>

      <div class="win98-window hero-window">
        <div class="win-titlebar">
          <span class="win-title"><i class="fa-solid fa-globe" aria-hidden="true"></i> welcome.exe</span>
          <div class="win-controls">
            <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
            <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
            <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
          </div>
        </div>
        <div class="win-body">
          <p class="eyebrow blink-soft">&lt; Under Construction — always shipping! &gt;</p>
          <h1 class="hero-title">
            <span class="chrome-text">M. ESTIAQUE</span><br>
            <span class="chrome-text grad-text">AHMED KHAN</span>
          </h1>
          <p class="hero-role">Software Engineer <span class="dot-sep">&bull;</span> Full-Stack Laravel Developer</p>
          <p class="hero-desc">Building web experiences since forever, powered by PHP, way too much coffee, and a healthy respect for the year 1999. Full-stack developer specializing in Laravel, ERP integrations, and making databases behave.</p>
          <div class="hero-cta">
            <a href="#projects" class="chrome-btn primary">View My Work <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            <a href="#guestbook" class="chrome-btn">Sign Guestbook <i class="fa-solid fa-pen" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="win-statusbar">
          <span><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Ready</span>
          <span id="visitCounter">Visitors: 000000</span>
        </div>
      </div>
    </div>

    <div class="hero-side">
      <div class="badge-stack">
        <div class="webbadge">Best viewed in<br><strong>NETSCAPE</strong></div>
        <div class="webbadge alt">Made with<br><strong>100% CSS</strong></div>
        <div class="webbadge">Powered by<br><strong>LARAVEL</strong></div>
      </div>
      <div class="floppy-spin" aria-hidden="true"><svg class="floppy-icon" width="80" height="80"><use href="#icon-floppy"></use></svg></div>
      <a href="#about" class="scroll-cue" aria-label="Scroll down to About section"><i class="fa-solid fa-chevron-down" aria-hidden="true"></i></a>
    </div>
  </div>
</header>

<main id="main-content">

  <section id="about" class="section">
    <div class="section-inner">
      <div class="win98-window">
        <div class="win-titlebar">
          <span class="win-title"><i class="fa-solid fa-user" aria-hidden="true"></i> about_me.txt - Notepad</span>
          <div class="win-controls">
            <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
            <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
            <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
          </div>
        </div>
        <div class="win-body about-body">
          <div class="about-avatar" aria-hidden="true"><div class="pixel-avatar"></div></div>
          <div class="about-content">
            <h2 class="section-title">&gt; About Me_</h2>
            <p>Full-stack developer with hands-on experience across frontend optimization, database management, PHP/Laravel web application development, custom inventory management modules, enterprise automation solutions, and ERP systems integration.</p>
            <div class="edu-list">
              <div class="edu-item">
                <i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>
                <div><strong>MSc in Computer Science</strong><span>Uttara University — Passing Year: 2025</span></div>
              </div>
              <div class="edu-item">
                <i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>
                <div><strong>BSc in Computer Science &amp; Engineering</strong><span>Uttara University — Passing Year: 2021</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="projects" class="section">
    <div class="section-inner">
      <h2 class="section-title center">&gt; My_Projects <span class="blink-soft">_</span></h2>
      <p class="section-sub">A few programs I've compiled over the years</p>

      <div class="projects-grid">
        <article class="win98-window browser-window">
          <div class="win-titlebar">
            <span class="win-title"><i class="fa-solid fa-window-restore" aria-hidden="true"></i> port3folio.exe</span>
            <div class="win-controls">
              <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
              <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
              <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
            </div>
          </div>
          <div class="browser-toolbar">
            <div class="browser-btns" aria-hidden="true"><i class="fa-solid fa-arrow-left"></i><i class="fa-solid fa-arrow-right"></i><i class="fa-solid fa-rotate-right"></i></div>
            <div class="browser-address"><i class="fa-solid fa-lock" aria-hidden="true"></i> www.estiaque.dev/projects/port3folio.html</div>
          </div>
          <div class="win-body">
            <span class="ribbon">&#9733; FEATURED</span>
            <h3 class="glitch-hover" data-text="Port3folio Package">Port3folio Package</h3>
            <p>A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
            <div class="stack-pills">
              <span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span>
            </div>
          </div>
        </article>

        <article class="win98-window browser-window">
          <div class="win-titlebar">
            <span class="win-title"><i class="fa-solid fa-window-restore" aria-hidden="true"></i> shopcart.exe</span>
            <div class="win-controls">
              <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
              <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
              <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
            </div>
          </div>
          <div class="browser-toolbar">
            <div class="browser-btns" aria-hidden="true"><i class="fa-solid fa-arrow-left"></i><i class="fa-solid fa-arrow-right"></i><i class="fa-solid fa-rotate-right"></i></div>
            <div class="browser-address"><i class="fa-solid fa-lock" aria-hidden="true"></i> www.estiaque.dev/projects/ecommerce.html</div>
          </div>
          <div class="win-body">
            <h3 class="glitch-hover" data-text="E-Commerce Platform">E-Commerce Platform</h3>
            <p>High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
            <div class="stack-pills">
              <span>Laravel</span><span>Vue.js</span><span>MySQL</span><span>Redis</span><span>Stripe</span>
            </div>
          </div>
        </article>

        <article class="win98-window browser-window">
          <div class="win-titlebar">
            <span class="win-title"><i class="fa-solid fa-window-restore" aria-hidden="true"></i> dashboard.exe</span>
            <div class="win-controls">
              <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
              <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
              <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
            </div>
          </div>
          <div class="browser-toolbar">
            <div class="browser-btns" aria-hidden="true"><i class="fa-solid fa-arrow-left"></i><i class="fa-solid fa-arrow-right"></i><i class="fa-solid fa-rotate-right"></i></div>
            <div class="browser-address"><i class="fa-solid fa-lock" aria-hidden="true"></i> www.estiaque.dev/projects/saas-analytics.html</div>
          </div>
          <div class="win-body">
            <h3 class="glitch-hover" data-text="SaaS Analytics Dashboard">SaaS Analytics Dashboard</h3>
            <p>Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
            <div class="stack-pills">
              <span>Laravel</span><span>Livewire</span><span>Alpine.js</span><span>PostgreSQL</span><span>Chart.js</span>
            </div>
          </div>
        </article>

        <article class="win98-window browser-window">
          <div class="win-titlebar">
            <span class="win-title"><i class="fa-solid fa-window-restore" aria-hidden="true"></i> inventory.exe</span>
            <div class="win-controls">
              <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
              <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
              <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
            </div>
          </div>
          <div class="browser-toolbar">
            <div class="browser-btns" aria-hidden="true"><i class="fa-solid fa-arrow-left"></i><i class="fa-solid fa-arrow-right"></i><i class="fa-solid fa-rotate-right"></i></div>
            <div class="browser-address"><i class="fa-solid fa-lock" aria-hidden="true"></i> www.estiaque.dev/projects/inventory-erp.html</div>
          </div>
          <div class="win-body">
            <h3 class="glitch-hover" data-text="Inventory Management System">Inventory Management System</h3>
            <p>Custom-built inventory &amp; ERP automation module for enterprise clients, covering stock tracking, procurement workflows, and reporting.</p>
            <div class="stack-pills">
              <span>PHP</span><span>Laravel</span><span>MySQL</span><span>REST API</span>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section id="skills" class="section">
    <div class="section-inner">
      <h2 class="section-title center">&gt; Skills.exe</h2>
      <p class="section-sub">Installed components (hover a diskette to reinstall)</p>

      <div class="win98-window skills-window">
        <div class="win-titlebar">
          <span class="win-title"><i class="fa-solid fa-toolbox" aria-hidden="true"></i> Add/Remove Programs</span>
          <div class="win-controls">
            <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
            <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
            <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
          </div>
        </div>
        <div class="win-body">
          <div class="skill-bars">
            <div class="skill-bar-row" data-percent="96">
              <span class="skill-name"><i class="fa-brands fa-php" aria-hidden="true"></i> PHP 8</span>
              <div class="loadbar"><div class="loadbar-fill"></div></div>
              <span class="skill-pct">0%</span>
            </div>
            <div class="skill-bar-row" data-percent="97">
              <span class="skill-name"><i class="fa-solid fa-layer-group" aria-hidden="true"></i> Laravel</span>
              <div class="loadbar"><div class="loadbar-fill"></div></div>
              <span class="skill-pct">0%</span>
            </div>
            <div class="skill-bar-row" data-percent="90">
              <span class="skill-name"><i class="fa-brands fa-js" aria-hidden="true"></i> JavaScript (ES6+)</span>
              <div class="loadbar"><div class="loadbar-fill"></div></div>
              <span class="skill-pct">0%</span>
            </div>
            <div class="skill-bar-row" data-percent="85">
              <span class="skill-name"><i class="fa-brands fa-vuejs" aria-hidden="true"></i> Vue.js</span>
              <div class="loadbar"><div class="loadbar-fill"></div></div>
              <span class="skill-pct">0%</span>
            </div>
            <div class="skill-bar-row" data-percent="92">
              <span class="skill-name"><i class="fa-solid fa-database" aria-hidden="true"></i> MySQL</span>
              <div class="loadbar"><div class="loadbar-fill"></div></div>
              <span class="skill-pct">0%</span>
            </div>
            <div class="skill-bar-row" data-percent="80">
              <span class="skill-name"><i class="fa-brands fa-docker" aria-hidden="true"></i> Docker</span>
              <div class="loadbar"><div class="loadbar-fill"></div></div>
              <span class="skill-pct">0%</span>
            </div>
            <div class="skill-bar-row" data-percent="74">
              <span class="skill-name"><i class="fa-brands fa-aws" aria-hidden="true"></i> AWS</span>
              <div class="loadbar"><div class="loadbar-fill"></div></div>
              <span class="skill-pct">0%</span>
            </div>
            <div class="skill-bar-row" data-percent="94">
              <span class="skill-name"><i class="fa-solid fa-gauge-high" aria-hidden="true"></i> Database Optimization</span>
              <div class="loadbar"><div class="loadbar-fill"></div></div>
              <span class="skill-pct">0%</span>
            </div>
          </div>

          <div class="floppy-grid">
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>Alpine.js</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>Livewire</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>PostgreSQL</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>Redis</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>REST API Design</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>Git</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>Tailwind CSS</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>Bootstrap 5</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>CI/CD</span></div>
            <div class="floppy-badge"><svg width="34" height="34" aria-hidden="true"><use href="#icon-floppy"></use></svg><span>ERP Integration</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="experience" class="section">
    <div class="section-inner">
      <h2 class="section-title center">&gt; Experience_Board</h2>
      <p class="section-sub">forum.estiaque.dev/career — 3 topics, sorted newest first</p>

      <div class="forum-thread">
        <article class="forum-post is-new">
          <div class="post-sidebar">
            <svg aria-hidden="true"><use href="#icon-alien"></use></svg>
            <div class="post-user">estiaque98</div>
            <div class="post-rank">&#9733;&#9733;&#9733;&#9733;&#9733; Senior Member</div>
          </div>
          <div class="post-main">
            <div class="post-header">
              <span class="post-subject">Software Engineer @ Natore IT</span>
              <span class="post-badge">NEW</span>
            </div>
            <div class="post-meta">Posted: 2025 &ndash; Present &nbsp;|&nbsp; Status: <span class="online-dot" aria-hidden="true"></span>Online now</div>
            <p class="post-body">Frontend optimization and database management for local business clients.</p>
          </div>
        </article>

        <article class="forum-post">
          <div class="post-sidebar">
            <svg aria-hidden="true"><use href="#icon-computer"></use></svg>
            <div class="post-user">estiaque98</div>
            <div class="post-rank">&#9733;&#9733;&#9733;&#9733; Member</div>
          </div>
          <div class="post-main">
            <div class="post-header">
              <span class="post-subject">Software Developer @ Isotope IT</span>
            </div>
            <div class="post-meta">Posted: 2023 &ndash; 2025 &nbsp;|&nbsp; Status: Archived thread</div>
            <p class="post-body">Specialized in PHP/Laravel web applications and custom inventory management modules.</p>
          </div>
        </article>

        <article class="forum-post">
          <div class="post-sidebar">
            <svg aria-hidden="true"><use href="#icon-computer"></use></svg>
            <div class="post-user">estiaque98</div>
            <div class="post-rank">&#9733;&#9733;&#9733; Member</div>
          </div>
          <div class="post-main">
            <div class="post-header">
              <span class="post-subject">Software Engineer @ Barcode Tech Automation Ltd</span>
            </div>
            <div class="post-meta">Posted: 2022 &ndash; 2023 &nbsp;|&nbsp; Status: Archived thread</div>
            <p class="post-body">Leading development of enterprise automation solutions and ERP systems integration.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section id="guestbook" class="section">
    <div class="section-inner">
      <div class="win98-window">
        <div class="win-titlebar">
          <span class="win-title"><i class="fa-solid fa-book" aria-hidden="true"></i> guestbook.exe</span>
          <div class="win-controls">
            <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
            <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
            <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
          </div>
        </div>
        <div class="win-body">
          <h2 class="section-title">&gt; Sign My Guestbook!</h2>
          <p class="section-sub" style="text-align:left;margin-bottom:1rem;">Leave a lil' message — this is purely for fun and doesn't go anywhere real. Got an actual message for me? Use the <a href="#contact">Contact form</a> below instead!</p>

          <ul id="guestbookList" class="guestbook-list">
            <li class="gb-entry">
              <svg class="gb-avatar" aria-hidden="true"><use href="#icon-smiley"></use></svg>
              <div>
                <div class="gb-top"><strong>visitor99</strong><span class="gb-date">03/14/1999</span></div>
                <div class="gb-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>Great site! 10/10, way better than my geocities page lol</p>
              </div>
            </li>
            <li class="gb-entry">
              <svg class="gb-avatar" aria-hidden="true"><use href="#icon-star"></use></svg>
              <div>
                <div class="gb-top"><strong>pixelpioneer</strong><span class="gb-date">07/22/1999</span></div>
                <div class="gb-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>Love the CRT effect, very authentic! Reminds me of my old monitor.</p>
              </div>
            </li>
            <li class="gb-entry">
              <svg class="gb-avatar" aria-hidden="true"><use href="#icon-heart"></use></svg>
              <div>
                <div class="gb-top"><strong>byteBuddy2000</strong><span class="gb-date">01/05/2000</span></div>
                <div class="gb-stars">&#9733;&#9733;&#9733;&#9733;</div>
                <p>Your guestbook inspired me to make my own! Adding you to my bookmarks.</p>
              </div>
            </li>
            <li class="gb-entry">
              <svg class="gb-avatar" aria-hidden="true"><use href="#icon-alien"></use></svg>
              <div>
                <div class="gb-top"><strong>retroRanger</strong><span class="gb-date">11/30/1999</span></div>
                <div class="gb-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p>Webring approved. Adding you to my favorites list right now!</p>
              </div>
            </li>
          </ul>

          <form id="guestbookForm" class="retro-form">
            <div class="form-row">
              <label for="gbName">Name</label>
              <input id="gbName" name="gbName" type="text" maxlength="30" placeholder="CoolUser2000" />
            </div>
            <div class="form-row">
              <label for="gbMsg">Message</label>
              <textarea id="gbMsg" name="gbMsg" required maxlength="140" rows="3" placeholder="Nice page!"></textarea>
            </div>
            <button type="submit" class="chrome-btn primary">Sign Guestbook <i class="fa-solid fa-feather" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="section">
    <div class="section-inner">
      <div class="win98-window">
        <div class="win-titlebar">
          <span class="win-title"><i class="fa-solid fa-envelope" aria-hidden="true"></i> contact_me.exe</span>
          <div class="win-controls">
            <button class="win-btn" type="button" data-action="min" aria-label="Minimize window">_</button>
            <button class="win-btn" type="button" data-action="max" aria-label="Maximize window">&#9633;</button>
            <button class="win-btn win-close" type="button" data-action="close" aria-label="Close window">&times;</button>
          </div>
        </div>
        <div class="win-body contact-body">
          <div class="contact-info">
            <h2 class="section-title">&gt; Get In Touch</h2>
            <p>Got a project, a job offer, or just want to say hi? Drop a line using the form, or hit me up directly through any of these:</p>
            <div class="contact-links">
              <a class="chrome-btn" href="mailto:mrm.khan.1298@gmail.com"><i class="fa-solid fa-envelope" aria-hidden="true"></i> mrm.khan.1298@gmail.com</a>
              <a class="chrome-btn" href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github" aria-hidden="true"></i> github.com/mestiaque</a>
              <a class="chrome-btn" href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin" aria-hidden="true"></i> linkedin.com/in/mestiaque</a>
            </div>
          </div>

          <form id="contactForm" class="retro-form" novalidate>
            <div class="form-row">
              <label for="cName">Name</label>
              <input id="cName" name="name" type="text" required />
            </div>
            <div class="form-row">
              <label for="cEmail">Email</label>
              <input id="cEmail" name="email" type="email" required />
            </div>
            <div class="form-row">
              <label for="cSubject">Subject</label>
              <input id="cSubject" name="subject" type="text" required />
            </div>
            <div class="form-row">
              <label for="cMessage">Message</label>
              <textarea id="cMessage" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="chrome-btn primary" id="contactSubmitBtn"><i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Send Message</button>
            <p id="contactInlineStatus" class="inline-status" role="status" aria-live="polite"></p>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>

<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-marquee marquee-banner" aria-hidden="true">
      <div class="marquee-track">
        <span>★ THANKS FOR VISITING ★ COME BACK SOON ★ BEST VIEWED AT 1024&times;768 ★ NO COOKIES, JUST VIBES ★</span>
        <span>★ THANKS FOR VISITING ★ COME BACK SOON ★ BEST VIEWED AT 1024&times;768 ★ NO COOKIES, JUST VIBES ★</span>
      </div>
    </div>

    <div class="webring">
      <span class="webring-btn">&larr; Prev Site</span>
      <div class="webring-center"><span><i class="fa-solid fa-ring" aria-hidden="true"></i> Y2K WEBRING</span><span class="webring-count">Member #042</span></div>
      <span class="webring-btn">Next Site &rarr;</span>
    </div>

    <div class="footer-badges">
      <span class="webbadge small">HTML5<br>Valid?</span>
      <span class="webbadge alt small">CSS3<br>Powered</span>
      <span class="webbadge small">No AI<br>Just Coffee</span>
    </div>

    <p class="footer-copy">&copy; 1999&ndash;2026 M. Estiaque Ahmed Khan. All rights reserved. Built with <i class="fa-solid fa-heart" style="color:#ff2e88" aria-hidden="true"></i> and way too much nostalgia.</p>

    <button id="backToTop" class="chrome-btn small" type="button" aria-label="Back to top"><i class="fa-solid fa-arrow-up" aria-hidden="true"></i> Top</button>
  </div>
</footer>

<nav class="taskbar" aria-label="Primary">
  <div class="start-wrap">
    <button id="startBtn" class="start-btn" type="button" aria-haspopup="true" aria-expanded="false">
      <span class="start-logo" aria-hidden="true"><span></span><span></span><span></span><span></span></span>
      <span class="start-label">Start</span>
    </button>
    <div id="startMenu" class="start-menu" role="menu">
      <div class="start-menu-banner"><span>ESTIAQUE&nbsp;98</span></div>
      <ul>
        <li role="none"><a href="#hero" role="menuitem"><i class="fa-solid fa-house" aria-hidden="true"></i> Home</a></li>
        <li role="none"><a href="#about" role="menuitem"><i class="fa-solid fa-id-card" aria-hidden="true"></i> About Me</a></li>
        <li role="none"><a href="#projects" role="menuitem"><i class="fa-solid fa-folder-open" aria-hidden="true"></i> My Projects</a></li>
        <li role="none"><a href="#skills" role="menuitem"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> Skills.exe</a></li>
        <li role="none"><a href="#experience" role="menuitem"><i class="fa-solid fa-briefcase" aria-hidden="true"></i> Experience</a></li>
        <li role="none"><a href="#guestbook" role="menuitem"><i class="fa-solid fa-book" aria-hidden="true"></i> Guestbook</a></li>
        <li role="none"><a href="#contact" role="menuitem"><i class="fa-solid fa-envelope" aria-hidden="true"></i> Contact Me</a></li>
        <li class="start-menu-divider" role="separator"></li>
        <li role="none"><a href="mailto:mrm.khan.1298@gmail.com" role="menuitem"><i class="fa-solid fa-power-off" aria-hidden="true"></i> Say Hi...</a></li>
      </ul>
    </div>
  </div>

  <ul class="taskbar-items">
    <li><a href="#hero" class="task-item" data-section="hero"><i class="fa-solid fa-house" aria-hidden="true"></i><span>Home</span></a></li>
    <li><a href="#about" class="task-item" data-section="about"><i class="fa-solid fa-id-card" aria-hidden="true"></i><span>About</span></a></li>
    <li><a href="#projects" class="task-item" data-section="projects"><i class="fa-solid fa-folder-open" aria-hidden="true"></i><span>Projects</span></a></li>
    <li><a href="#skills" class="task-item" data-section="skills"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i><span>Skills</span></a></li>
    <li><a href="#experience" class="task-item" data-section="experience"><i class="fa-solid fa-briefcase" aria-hidden="true"></i><span>Work</span></a></li>
    <li><a href="#guestbook" class="task-item" data-section="guestbook"><i class="fa-solid fa-book" aria-hidden="true"></i><span>Guestbook</span></a></li>
    <li><a href="#contact" class="task-item" data-section="contact"><i class="fa-solid fa-envelope" aria-hidden="true"></i><span>Contact</span></a></li>
  </ul>

  <div class="tray">
    <i class="fa-solid fa-volume-high tray-icon" aria-hidden="true" title="Volume"></i>
    <i class="fa-solid fa-wifi tray-icon" aria-hidden="true" title="Connected at 56k"></i>
    <div class="tray-clock" id="trayClock">12:00 PM</div>
  </div>
</nav>

<div id="win98Dialog" class="dialog-overlay hidden" role="dialog" aria-modal="true" aria-labelledby="dialogTitle">
  <div class="dialog-box">
    <div class="win-titlebar">
      <span class="win-title" id="dialogTitle"><i class="fa-solid fa-message" aria-hidden="true"></i> System Message</span>
      <div class="win-controls">
        <button class="win-btn win-close" type="button" id="dialogCloseX" aria-label="Close dialog">&times;</button>
      </div>
    </div>
    <div class="dialog-body">
      <i id="dialogIcon" class="fa-solid fa-circle-check dialog-icon success" aria-hidden="true"></i>
      <p id="dialogMessage">Your message has been sent!</p>
    </div>
    <div class="dialog-actions"><button id="dialogOk" class="chrome-btn primary" type="button">OK</button></div>
  </div>
</div>

<div id="welcomeDialog" class="dialog-overlay hidden" role="dialog" aria-modal="true" aria-labelledby="welcomeTitle">
  <div class="dialog-box">
    <div class="win-titlebar">
      <span class="win-title" id="welcomeTitle"><i class="fa-solid fa-star" aria-hidden="true"></i> Welcome.exe</span>
      <div class="win-controls">
        <button class="win-btn win-close" type="button" id="welcomeCloseX" aria-label="Close dialog">&times;</button>
      </div>
    </div>
    <div class="dialog-body">
      <i class="fa-solid fa-face-laugh-beam dialog-icon" style="color:#c98a00" aria-hidden="true"></i>
      <p>Hey, thanks for stopping by my little corner of the web! Feel free to look around, sign the guestbook, and say hi in the contact form.</p>
    </div>
    <div class="dialog-actions"><button id="welcomeOk" class="chrome-btn primary" type="button">OK</button></div>
  </div>
</div>

