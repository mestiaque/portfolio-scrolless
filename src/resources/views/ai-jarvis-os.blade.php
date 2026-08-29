<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan | J.A.R.V.I.S OS — Full-Stack Laravel Developer</title>
<meta name="description" content="Portfolio of M. Estiaque Ahmed Khan, a full-stack Laravel developer, presented as a futuristic Jarvis-style AI operating system with a live skills dashboard, project archive, and scripted AI assistant." />
<meta name="theme-color" content="#040914" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* ============================================================
   0. RESET & ROOT TOKENS
   ============================================================ */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }
@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }
  *, *::before, *::after { animation-duration: 0.001ms !important; animation-iteration-count: 1 !important; transition-duration: 0.001ms !important; }
}

:root{
  --bg-void:#03060d;
  --bg-void-2:#060b17;
  --panel:rgba(11,22,40,.52);
  --panel-strong:rgba(9,18,34,.78);
  --glass-border:rgba(70,220,255,.22);
  --glass-border-strong:rgba(70,220,255,.45);
  --neon:#22e5ff;
  --neon-soft:#7df3ff;
  --neon-dim:#0891a8;
  --violet:#8b7dff;
  --pink:#ff5fd8;
  --green:#3dffa6;
  --amber:#ffc857;
  --danger:#ff4f70;
  --text-hi:#eef7ff;
  --text-mid:#9db3cc;
  --text-dim:#5d7188;
  --font-display:'Orbitron', sans-serif;
  --font-body:'Rajdhani', sans-serif;
  --font-mono:'Share Tech Mono', monospace;
  --s1:8px; --s2:16px; --s3:24px; --s4:32px; --s5:48px; --s6:64px; --s7:96px;
  --radius-lg:22px; --radius-md:14px; --radius-sm:8px;
  --ease:cubic-bezier(.19,1,.22,1);
}

body{
  font-family:var(--font-body);
  background:var(--bg-void);
  color:var(--text-hi);
  overflow-x:hidden;
  min-height:100vh;
  font-size:16px;
  line-height:1.5;
}

img,svg,canvas{display:block;max-width:100%;}
a{color:inherit;text-decoration:none;}
button{font-family:inherit;cursor:pointer;}
ul{list-style:none;}
input,textarea,button{font-family:inherit;color:inherit;}

::selection{background:rgba(34,229,255,.3);color:#fff;}
::-webkit-scrollbar{width:9px;}
::-webkit-scrollbar-track{background:var(--bg-void);}
::-webkit-scrollbar-thumb{background:linear-gradient(var(--neon-dim),var(--neon));border-radius:10px;}

:focus-visible{outline:2px solid var(--neon);outline-offset:3px;border-radius:4px;}

.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0;}

/* ============================================================
   1. BACKGROUND LAYERS
   ============================================================ */
.bg-fixed{position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden;}
.bg-grid{position:absolute;inset:-10%;
  background-image:linear-gradient(rgba(34,229,255,.06) 1px,transparent 1px),linear-gradient(90deg,rgba(34,229,255,.06) 1px,transparent 1px);
  background-size:52px 52px;
  mask-image:radial-gradient(ellipse 80% 60% at 50% 20%, #000 40%, transparent 90%);
  animation:gridDrift 60s linear infinite;
}
@keyframes gridDrift{0%{transform:translate(0,0);}100%{transform:translate(52px,52px);}}
.bg-glow{position:absolute;border-radius:50%;filter:blur(110px);opacity:.28;}
.glow-1{width:520px;height:520px;background:radial-gradient(circle,#0ea5c7,transparent 70%);top:-8%;left:-8%;}
.glow-2{width:480px;height:480px;background:radial-gradient(circle,#7c5cff,transparent 70%);bottom:0%;right:-6%;}
.glow-3{width:420px;height:420px;background:radial-gradient(circle,#ff5fd8,transparent 70%);top:45%;left:45%;opacity:.14;}
#starfield{position:fixed;inset:0;z-index:0;pointer-events:none;opacity:.65;}
.scanline{position:fixed;inset:0;z-index:1;pointer-events:none;background:repeating-linear-gradient(0deg,rgba(255,255,255,.015) 0px,rgba(255,255,255,.015) 1px,transparent 1px,transparent 3px);mix-blend-mode:overlay;}

/* ============================================================
   2. BOOT SCREEN
   ============================================================ */
.boot-screen{position:fixed;inset:0;z-index:9999;background:#03060d;display:flex;align-items:center;justify-content:center;transition:opacity .8s var(--ease),visibility .8s var(--ease);}
.boot-screen.hide{opacity:0;visibility:hidden;}
.boot-inner{width:min(520px,88vw);display:flex;flex-direction:column;align-items:center;gap:var(--s3);text-align:center;}
.boot-logo{font-size:2.6rem;color:var(--neon);text-shadow:0 0 24px rgba(34,229,255,.7);animation:bootSpin 3.5s linear infinite;}
@keyframes bootSpin{100%{transform:rotate(360deg);}}
.boot-title{font-family:var(--font-display);font-weight:800;letter-spacing:.35em;font-size:1.6rem;color:var(--text-hi);}
.boot-title span{color:var(--neon);}
.boot-log{font-family:var(--font-mono);font-size:.78rem;color:var(--neon-soft);min-height:110px;width:100%;text-align:left;background:rgba(6,12,22,.6);border:1px solid var(--glass-border);border-radius:var(--radius-sm);padding:var(--s2);letter-spacing:.02em;}
.boot-log div{opacity:0;animation:bootLineIn .4s forwards;}
@keyframes bootLineIn{to{opacity:1;}}
.boot-log .caret{display:inline-block;width:7px;height:12px;background:var(--neon);margin-left:3px;animation:caretBlink 1s steps(1) infinite;vertical-align:middle;}
@keyframes caretBlink{50%{opacity:0;}}
.boot-progress{width:100%;height:6px;border-radius:6px;background:rgba(255,255,255,.06);overflow:hidden;border:1px solid var(--glass-border);}
.boot-progress-fill{height:100%;width:0%;background:linear-gradient(90deg,var(--neon-dim),var(--neon));box-shadow:0 0 12px var(--neon);transition:width .25s linear;}
.boot-percent{font-family:var(--font-mono);color:var(--text-mid);font-size:.85rem;letter-spacing:.1em;}
.boot-skip{margin-top:var(--s1);background:transparent;border:1px solid var(--glass-border);color:var(--text-mid);padding:10px 22px;border-radius:30px;font-family:var(--font-mono);font-size:.72rem;letter-spacing:.15em;display:inline-flex;align-items:center;gap:8px;transition:all .25s var(--ease);}
.boot-skip:hover{border-color:var(--neon);color:var(--neon);box-shadow:0 0 18px rgba(34,229,255,.25);}

/* ============================================================
   3. NAVIGATION
   ============================================================ */
.navbar{position:fixed;top:0;left:0;right:0;z-index:500;display:flex;align-items:center;justify-content:space-between;padding:var(--s2) var(--s4);background:rgba(3,7,14,.55);backdrop-filter:blur(18px);-webkit-backdrop-filter:blur(18px);border-bottom:1px solid var(--glass-border);opacity:0;transform:translateY(-16px);transition:opacity .8s var(--ease),transform .8s var(--ease);}
body.booted .navbar{opacity:1;transform:translateY(0);}
.nav-brand{display:flex;align-items:center;gap:10px;font-family:var(--font-display);font-weight:800;letter-spacing:.08em;font-size:1.05rem;}
.nav-brand i{color:var(--neon);text-shadow:0 0 12px rgba(34,229,255,.7);}
.nav-brand small{display:block;font-family:var(--font-mono);font-weight:400;font-size:.58rem;color:var(--text-dim);letter-spacing:.2em;}
.nav-links{display:flex;align-items:center;gap:var(--s4);}
.nav-links a{font-size:.82rem;font-weight:600;letter-spacing:.06em;color:var(--text-mid);text-transform:uppercase;position:relative;padding:4px 0;transition:color .25s;}
.nav-links a::after{content:'';position:absolute;left:0;bottom:-4px;height:2px;width:0;background:var(--neon);box-shadow:0 0 8px var(--neon);transition:width .3s var(--ease);}
.nav-links a:hover,.nav-links a:focus-visible{color:var(--neon);}
.nav-links a:hover::after,.nav-links a:focus-visible::after{width:100%;}
.nav-status{display:flex;align-items:center;gap:10px;font-family:var(--font-mono);font-size:.68rem;letter-spacing:.1em;color:var(--green);padding:6px 14px;border:1px solid rgba(61,255,166,.35);border-radius:30px;background:rgba(61,255,166,.06);}
.nav-toggle{display:none;background:transparent;border:1px solid var(--glass-border);color:var(--neon);width:42px;height:42px;border-radius:10px;font-size:1.1rem;align-items:center;justify-content:center;}

.dot{width:8px;height:8px;border-radius:50%;display:inline-block;flex-shrink:0;}
.dot.pulse-green{background:var(--green);box-shadow:0 0 0 0 rgba(61,255,166,.6);animation:dotPulse 1.8s infinite;}
.dot.pulse-blue{background:var(--neon);box-shadow:0 0 0 0 rgba(34,229,255,.6);animation:dotPulse 1.8s infinite;}
.dot.sm{width:6px;height:6px;}
@keyframes dotPulse{0%{box-shadow:0 0 0 0 rgba(61,255,166,.55);}70%{box-shadow:0 0 0 8px rgba(61,255,166,0);}100%{box-shadow:0 0 0 0 rgba(61,255,166,0);}}

/* ============================================================
   4. LAYOUT / SHARED PRIMITIVES
   ============================================================ */
main{position:relative;z-index:5;}
section{position:relative;padding:var(--s7) var(--s4);}
.section-inner{max-width:1180px;margin:0 auto;}
.section-head{max-width:640px;margin-bottom:var(--s5);}
.section-tag{font-family:var(--font-mono);font-size:.72rem;letter-spacing:.3em;text-transform:uppercase;color:var(--neon);display:inline-flex;align-items:center;gap:8px;margin-bottom:var(--s2);}
.section-tag::before{content:'';width:22px;height:1px;background:var(--neon);box-shadow:0 0 6px var(--neon);}
.section-title{font-family:var(--font-display);font-weight:800;font-size:clamp(1.9rem,4.2vw,3rem);line-height:1.15;margin-bottom:var(--s2);}
.section-sub{color:var(--text-mid);font-size:1.05rem;font-weight:400;}
.gradient-text{background:linear-gradient(120deg,var(--neon) 10%,var(--violet) 60%,var(--pink) 100%);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;}

.glass-panel{background:var(--panel);border:1px solid var(--glass-border);border-radius:var(--radius-lg);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);box-shadow:0 10px 40px rgba(0,0,0,.35),inset 0 1px 0 rgba(255,255,255,.04);position:relative;transition:border-color .3s var(--ease),box-shadow .3s var(--ease),transform .3s var(--ease);}
.glass-panel::before{content:'';position:absolute;inset:0;border-radius:inherit;padding:1px;background:linear-gradient(135deg,rgba(34,229,255,.35),transparent 40%,transparent 60%,rgba(139,124,255,.3));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;pointer-events:none;opacity:.7;}
.glass-panel:hover{border-color:var(--glass-border-strong);box-shadow:0 14px 50px rgba(0,0,0,.45),0 0 34px rgba(34,229,255,.12);}

.corner{position:absolute;width:14px;height:14px;border:2px solid var(--neon);opacity:.55;}
.corner.tl{top:-1px;left:-1px;border-right:none;border-bottom:none;border-top-left-radius:6px;}
.corner.tr{top:-1px;right:-1px;border-left:none;border-bottom:none;border-top-right-radius:6px;}
.corner.bl{bottom:-1px;left:-1px;border-right:none;border-top:none;border-bottom-left-radius:6px;}
.corner.br{bottom:-1px;right:-1px;border-left:none;border-top:none;border-bottom-right-radius:6px;}

.btn{display:inline-flex;align-items:center;gap:10px;padding:14px 28px;border-radius:30px;font-weight:700;font-size:.85rem;letter-spacing:.08em;text-transform:uppercase;border:1px solid transparent;transition:all .3s var(--ease);}
.btn-primary{background:linear-gradient(120deg,var(--neon-dim),var(--neon));color:#02141c;box-shadow:0 0 24px rgba(34,229,255,.35);}
.btn-primary:hover{transform:translateY(-3px);box-shadow:0 8px 30px rgba(34,229,255,.5);}
.btn-ghost{border-color:var(--glass-border-strong);color:var(--neon-soft);background:rgba(34,229,255,.05);}
.btn-ghost:hover{background:rgba(34,229,255,.12);transform:translateY(-3px);}

.reveal{opacity:0;transform:translateY(26px);transition:opacity .8s var(--ease),transform .8s var(--ease);}
.reveal.in{opacity:1;transform:translateY(0);}

/* ============================================================
   5. HERO
   ============================================================ */
.hero{min-height:100vh;display:flex;align-items:center;justify-content:center;padding-top:calc(var(--s7) + 40px);overflow:hidden;}
.hero-inner{text-align:center;display:flex;flex-direction:column;align-items:center;position:relative;z-index:3;}
.hero-orb-wrap{position:absolute;top:52%;left:50%;transform:translate(-50%,-50%);width:min(720px,140vw);aspect-ratio:1;z-index:0;pointer-events:none;opacity:.85;}
.orb-ring{position:absolute;inset:0;border-radius:50%;border:1px solid rgba(34,229,255,.18);}
.orb-ring.r1{inset:6%;border-color:rgba(34,229,255,.28);animation:spin 26s linear infinite;border-style:dashed;}
.orb-ring.r2{inset:16%;border-color:rgba(139,124,255,.24);animation:spin 34s linear infinite reverse;}
.orb-ring.r3{inset:28%;border-color:rgba(255,95,216,.2);animation:spin 18s linear infinite;border-style:dotted;}
.orb-core{position:absolute;inset:38%;border-radius:50%;background:radial-gradient(circle at 40% 35%,rgba(125,243,255,.55),rgba(34,229,255,.08) 60%,transparent 75%);filter:blur(2px);animation:orbPulse 4s ease-in-out infinite;}
@keyframes spin{100%{transform:rotate(360deg);}}
@keyframes orbPulse{0%,100%{transform:scale(1);opacity:.9;}50%{transform:scale(1.08);opacity:1;}}

.status-line{font-family:var(--font-mono);font-size:.78rem;letter-spacing:.15em;color:var(--text-mid);display:flex;align-items:center;gap:10px;margin-bottom:var(--s3);text-transform:uppercase;}
.status-line .sep{color:var(--text-dim);}
.eyebrow{font-family:var(--font-mono);font-size:.85rem;letter-spacing:.4em;text-transform:uppercase;color:var(--neon);margin-bottom:var(--s2);}
.hero-title{font-family:var(--font-display);font-weight:900;font-size:clamp(2.4rem,7.5vw,5.2rem);line-height:1.05;letter-spacing:.01em;margin-bottom:var(--s3);text-shadow:0 0 40px rgba(34,229,255,.18);}
.hero-sub{max-width:640px;color:var(--text-mid);font-size:clamp(1rem,1.6vw,1.2rem);margin-bottom:var(--s4);}
.hero-waveform{display:flex;align-items:flex-end;gap:4px;height:46px;margin-bottom:var(--s4);}
.hero-waveform span{width:4px;border-radius:3px;background:linear-gradient(180deg,var(--neon),var(--neon-dim));box-shadow:0 0 8px rgba(34,229,255,.5);animation:waveBounce 1.2s ease-in-out infinite;}
@keyframes waveBounce{0%,100%{height:6px;}50%{height:38px;}}
.hero-cta{display:flex;gap:var(--s2);flex-wrap:wrap;justify-content:center;margin-bottom:var(--s6);}
.hero-stats{display:flex;gap:var(--s6);flex-wrap:wrap;justify-content:center;}
.hstat{display:flex;flex-direction:column;align-items:center;gap:4px;}
.hstat-num{font-family:var(--font-display);font-size:2.1rem;font-weight:800;color:var(--neon-soft);text-shadow:0 0 18px rgba(34,229,255,.4);}
.hstat-lbl{font-family:var(--font-mono);font-size:.68rem;letter-spacing:.12em;color:var(--text-dim);text-transform:uppercase;}
.scroll-indicator{position:absolute;bottom:var(--s3);left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:8px;font-family:var(--font-mono);font-size:.65rem;letter-spacing:.3em;color:var(--text-dim);z-index:3;}
.scroll-indicator span{width:1px;height:34px;background:linear-gradient(var(--neon),transparent);animation:scrollLine 1.8s ease-in-out infinite;}
@keyframes scrollLine{0%{transform:scaleY(0);transform-origin:top;}50%{transform:scaleY(1);transform-origin:top;}50.001%{transform-origin:bottom;}100%{transform:scaleY(0);transform-origin:bottom;}}

/* ============================================================
   6. AI ASSISTANT CHAT
   ============================================================ */
.assistant-grid{display:grid;grid-template-columns:1.5fr 1fr;gap:var(--s4);align-items:start;}
.assistant-chat{padding:0;overflow:hidden;display:flex;flex-direction:column;height:640px;}
.chat-header{display:flex;align-items:center;gap:var(--s2);padding:var(--s3);border-bottom:1px solid var(--glass-border);}
.chat-avatar{position:relative;width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:radial-gradient(circle,rgba(34,229,255,.22),rgba(34,229,255,.02));color:var(--neon);font-size:1.2rem;flex-shrink:0;}
.avatar-ring{position:absolute;inset:-4px;border-radius:50%;border:1px solid rgba(34,229,255,.4);border-top-color:var(--neon);animation:spin 3s linear infinite;}
.chat-id{flex:1;min-width:0;}
.chat-id strong{font-family:var(--font-display);letter-spacing:.08em;font-size:.95rem;display:block;}
.chat-id span{font-family:var(--font-mono);font-size:.68rem;color:var(--text-dim);display:flex;align-items:center;gap:6px;margin-top:2px;}
.chat-wave{display:flex;align-items:flex-end;gap:3px;height:26px;opacity:.5;transition:opacity .3s;}
.chat-wave.active{opacity:1;}
.chat-wave span{width:3px;background:var(--neon);border-radius:2px;animation:waveBounce 1s ease-in-out infinite;}
.chat-body{flex:1;overflow-y:auto;padding:var(--s3);display:flex;flex-direction:column;gap:var(--s2);scroll-behavior:smooth;}
.msg{max-width:82%;display:flex;flex-direction:column;gap:5px;animation:msgIn .35s var(--ease);}
@keyframes msgIn{from{opacity:0;transform:translateY(10px);}to{opacity:1;transform:translateY(0);}}
.msg.bot{align-self:flex-start;}
.msg.user{align-self:flex-end;align-items:flex-end;}
.msg-bubble{padding:12px 16px;border-radius:16px;font-size:.92rem;line-height:1.5;}
.msg.bot .msg-bubble{background:rgba(34,229,255,.08);border:1px solid var(--glass-border);border-bottom-left-radius:4px;color:var(--text-hi);}
.msg.user .msg-bubble{background:linear-gradient(120deg,rgba(139,124,255,.28),rgba(139,124,255,.12));border:1px solid rgba(139,124,255,.35);border-bottom-right-radius:4px;}
.msg-time{font-family:var(--font-mono);font-size:.62rem;color:var(--text-dim);letter-spacing:.05em;padding:0 4px;}
.typing-dots{display:inline-flex;gap:4px;padding:14px 16px;background:rgba(34,229,255,.08);border:1px solid var(--glass-border);border-radius:16px;border-bottom-left-radius:4px;align-self:flex-start;}
.typing-dots span{width:6px;height:6px;border-radius:50%;background:var(--neon-soft);animation:typingBounce 1.1s infinite;}
.typing-dots span:nth-child(2){animation-delay:.15s;}
.typing-dots span:nth-child(3){animation-delay:.3s;}
@keyframes typingBounce{0%,60%,100%{transform:translateY(0);opacity:.5;}30%{transform:translateY(-5px);opacity:1;}}
.chat-quick{display:flex;flex-wrap:wrap;gap:8px;padding:0 var(--s3) var(--s2);}
.chat-quick button{font-size:.76rem;font-weight:600;letter-spacing:.03em;padding:9px 14px;border-radius:20px;border:1px solid var(--glass-border);background:rgba(255,255,255,.02);color:var(--neon-soft);transition:all .25s var(--ease);}
.chat-quick button:hover,.chat-quick button:focus-visible{background:rgba(34,229,255,.14);border-color:var(--neon);transform:translateY(-2px);}
.chat-quick button:disabled{opacity:.35;cursor:not-allowed;transform:none;}
.chat-input-row{display:flex;gap:10px;padding:var(--s2) var(--s3);border-top:1px solid var(--glass-border);}
.chat-input-row input{flex:1;background:rgba(255,255,255,.03);border:1px solid var(--glass-border);border-radius:24px;padding:11px 18px;font-size:.9rem;color:var(--text-hi);}
.chat-input-row input:focus{border-color:var(--neon);}
.chat-input-row button{width:44px;height:44px;border-radius:50%;background:linear-gradient(120deg,var(--neon-dim),var(--neon));color:#02141c;border:none;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:transform .25s var(--ease);}
.chat-input-row button:hover{transform:scale(1.08);}
.chat-disclaimer{font-family:var(--font-mono);font-size:.64rem;color:var(--text-dim);padding:0 var(--s3) var(--s2);display:flex;gap:6px;align-items:flex-start;letter-spacing:.02em;}

.assistant-side{display:flex;flex-direction:column;gap:var(--s3);}
.profile-card{padding:var(--s3);}
.profile-card h3{font-family:var(--font-display);font-size:1rem;letter-spacing:.06em;margin-bottom:var(--s2);display:flex;align-items:center;gap:8px;color:var(--neon-soft);}
.profile-row{display:flex;justify-content:space-between;gap:var(--s2);padding:9px 0;border-bottom:1px dashed rgba(255,255,255,.08);font-size:.85rem;}
.profile-row:last-child{border-bottom:none;}
.profile-row span:first-child{color:var(--text-dim);font-family:var(--font-mono);font-size:.72rem;letter-spacing:.05em;text-transform:uppercase;}
.profile-row span:last-child{color:var(--text-hi);text-align:right;font-weight:600;}
.voice-viz{padding:var(--s3);text-align:center;}
.voice-viz h3{font-family:var(--font-display);font-size:.85rem;letter-spacing:.1em;color:var(--text-dim);margin-bottom:var(--s2);text-transform:uppercase;}
#voiceCanvas{width:100%;height:110px;}

/* ============================================================
   7. SKILLS DASHBOARD
   ============================================================ */
.skills-analytics{padding:var(--s3);margin-bottom:var(--s4);}
.skills-analytics-head{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:var(--s2);margin-bottom:var(--s2);}
.skills-analytics-head h3{font-family:var(--font-display);font-size:1rem;letter-spacing:.06em;}
.legend{display:flex;gap:var(--s3);font-family:var(--font-mono);font-size:.68rem;color:var(--text-dim);}
.legend span{display:inline-flex;align-items:center;gap:6px;}
.legend i{width:9px;height:9px;border-radius:2px;display:inline-block;}
#skillsGraph{width:100%;height:200px;}

.skills-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--s3);margin-bottom:var(--s4);}
.skill-category{padding:var(--s3);}
.skill-category h3{font-family:var(--font-display);font-size:.95rem;letter-spacing:.05em;margin-bottom:var(--s3);display:flex;align-items:center;gap:10px;color:var(--neon-soft);}
.skill-category h3 i{color:var(--neon);}
.skill-bar{margin-bottom:var(--s2);}
.skill-bar:last-child{margin-bottom:0;}
.skill-bar-head{display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:6px;color:var(--text-mid);font-weight:600;}
.skill-bar-head span:last-child{font-family:var(--font-mono);color:var(--neon-soft);}
.skill-track{height:7px;border-radius:6px;background:rgba(255,255,255,.06);overflow:hidden;}
.skill-fill{height:100%;width:0%;border-radius:6px;background:linear-gradient(90deg,var(--neon-dim),var(--neon));box-shadow:0 0 10px rgba(34,229,255,.5);transition:width 1.4s var(--ease);}

.radial-row{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--s3);}
.radial-card{padding:var(--s3) var(--s2);display:flex;flex-direction:column;align-items:center;gap:10px;text-align:center;}
.radial-gauge{position:relative;width:112px;height:112px;}
.radial-gauge svg{transform:rotate(-90deg);width:100%;height:100%;}
.radial-gauge circle{fill:none;stroke-width:9;}
.radial-gauge .track{stroke:rgba(255,255,255,.07);}
.radial-gauge .fill{stroke:var(--neon);stroke-linecap:round;stroke-dasharray:301;stroke-dashoffset:301;transition:stroke-dashoffset 1.6s var(--ease);filter:drop-shadow(0 0 6px rgba(34,229,255,.6));}
.radial-value{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-family:var(--font-display);font-weight:800;font-size:1.3rem;color:var(--text-hi);}
.radial-label{font-family:var(--font-mono);font-size:.68rem;letter-spacing:.08em;color:var(--text-dim);text-transform:uppercase;}

/* ============================================================
   8. PROJECTS
   ============================================================ */
.projects-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--s3);}
.project-card{padding:var(--s3);display:flex;flex-direction:column;gap:var(--s2);}
.project-top{display:flex;justify-content:space-between;align-items:flex-start;gap:var(--s2);}
.project-icon{width:52px;height:52px;border-radius:14px;background:radial-gradient(circle,rgba(34,229,255,.18),rgba(34,229,255,.02));display:flex;align-items:center;justify-content:center;font-size:1.4rem;color:var(--neon);flex-shrink:0;}
.project-tagnum{font-family:var(--font-mono);font-size:.68rem;color:var(--text-dim);letter-spacing:.1em;}
.project-card h3{font-family:var(--font-display);font-size:1.15rem;letter-spacing:.03em;}
.project-card p{color:var(--text-mid);font-size:.92rem;flex:1;}
.tech-chips{display:flex;flex-wrap:wrap;gap:7px;}
.tech-chips span{font-family:var(--font-mono);font-size:.68rem;padding:5px 11px;border-radius:14px;background:rgba(139,124,255,.1);border:1px solid rgba(139,124,255,.28);color:#c9c2ff;letter-spacing:.03em;}
.project-links{display:flex;gap:var(--s2);margin-top:4px;}
.project-links a{font-size:.78rem;font-weight:700;letter-spacing:.05em;display:inline-flex;align-items:center;gap:6px;color:var(--text-mid);transition:color .25s;text-transform:uppercase;}
.project-links a:hover{color:var(--neon);}

/* ============================================================
   9. EXPERIENCE (SYSTEM LOG)
   ============================================================ */
.log-list{position:relative;padding-left:var(--s5);}
.log-list::before{content:'';position:absolute;left:9px;top:8px;bottom:8px;width:1px;background:linear-gradient(var(--neon),transparent 95%);}
.log-item{position:relative;padding-bottom:var(--s5);}
.log-item:last-child{padding-bottom:0;}
.log-node{position:absolute;left:calc(-1 * var(--s5) + 3px);top:6px;width:14px;height:14px;border-radius:50%;background:var(--bg-void);border:2px solid var(--neon);box-shadow:0 0 12px rgba(34,229,255,.6);}
.log-item.active .log-node{background:var(--green);border-color:var(--green);box-shadow:0 0 14px rgba(61,255,166,.7);}
.log-card{padding:var(--s3);}
.log-meta{display:flex;justify-content:space-between;flex-wrap:wrap;gap:8px;margin-bottom:8px;align-items:center;}
.log-tag{font-family:var(--font-mono);font-size:.66rem;color:var(--text-dim);letter-spacing:.1em;}
.log-badge{font-family:var(--font-mono);font-size:.62rem;letter-spacing:.1em;padding:3px 10px;border-radius:12px;border:1px solid rgba(61,255,166,.4);color:var(--green);background:rgba(61,255,166,.06);}
.log-role{font-family:var(--font-display);font-size:1.1rem;font-weight:700;margin-bottom:2px;}
.log-org{font-size:.9rem;color:var(--neon-soft);font-weight:600;margin-bottom:8px;}
.log-desc{color:var(--text-mid);font-size:.9rem;}

/* ============================================================
   10. BLOG
   ============================================================ */
.blog-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--s3);}
.blog-card{padding:var(--s3);display:flex;flex-direction:column;gap:var(--s2);}
.blog-badge{align-self:flex-start;font-family:var(--font-mono);font-size:.62rem;letter-spacing:.12em;padding:4px 11px;border-radius:12px;background:rgba(34,229,255,.1);border:1px solid var(--glass-border);color:var(--neon);}
.blog-card h3{font-family:var(--font-display);font-size:1.05rem;line-height:1.35;}
.blog-card p{color:var(--text-mid);font-size:.88rem;flex:1;}
.blog-meta{display:flex;justify-content:space-between;align-items:center;font-family:var(--font-mono);font-size:.7rem;color:var(--text-dim);}
.blog-meta a{color:var(--neon-soft);font-weight:700;display:inline-flex;align-items:center;gap:5px;transition:gap .25s;}
.blog-meta a:hover{gap:9px;color:var(--neon);}

/* ============================================================
   11. CONTACT
   ============================================================ */
.contact-grid{display:grid;grid-template-columns:1fr 1.2fr;gap:var(--s4);align-items:start;}
.contact-info{display:flex;flex-direction:column;gap:var(--s2);}
.contact-link{display:flex;align-items:center;gap:var(--s2);padding:var(--s2);}
.contact-link i{width:44px;height:44px;border-radius:12px;background:rgba(34,229,255,.1);display:flex;align-items:center;justify-content:center;color:var(--neon);font-size:1.1rem;flex-shrink:0;}
.contact-link strong{display:block;font-size:.92rem;}
.contact-link span{font-family:var(--font-mono);font-size:.72rem;color:var(--text-dim);}
.contact-form-panel{padding:var(--s4);}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:var(--s2);margin-bottom:var(--s2);}
.field{display:flex;flex-direction:column;gap:6px;margin-bottom:var(--s2);}
.field label{font-family:var(--font-mono);font-size:.68rem;letter-spacing:.1em;color:var(--text-dim);text-transform:uppercase;}
.field input,.field textarea{background:rgba(255,255,255,.03);border:1px solid var(--glass-border);border-radius:var(--radius-sm);padding:12px 16px;font-size:.92rem;color:var(--text-hi);transition:border-color .25s,box-shadow .25s;resize:vertical;}
.field input:focus,.field textarea:focus{border-color:var(--neon);box-shadow:0 0 0 3px rgba(34,229,255,.12);}
.field textarea{min-height:120px;}
.console-submit{width:100%;justify-content:center;margin-top:6px;}
.form-status{margin-top:var(--s2);padding:12px 16px;border-radius:var(--radius-sm);font-family:var(--font-mono);font-size:.78rem;letter-spacing:.04em;display:none;align-items:center;gap:10px;}
.form-status.show{display:flex;}
.form-status.ok{background:rgba(61,255,166,.08);border:1px solid rgba(61,255,166,.4);color:var(--green);}
.form-status.err{background:rgba(255,79,112,.08);border:1px solid rgba(255,79,112,.4);color:var(--danger);}

/* ============================================================
   12. FOOTER
   ============================================================ */
footer{padding:var(--s5) var(--s4) var(--s4);border-top:1px solid var(--glass-border);position:relative;z-index:5;}
.footer-inner{max-width:1180px;margin:0 auto;display:flex;flex-wrap:wrap;justify-content:space-between;gap:var(--s4);}
.footer-brand{max-width:340px;}
.footer-brand .nav-brand{margin-bottom:var(--s2);}
.footer-brand p{color:var(--text-dim);font-size:.85rem;}
.footer-cols{display:flex;gap:var(--s6);flex-wrap:wrap;}
.footer-col h4{font-family:var(--font-mono);font-size:.7rem;letter-spacing:.15em;color:var(--text-dim);text-transform:uppercase;margin-bottom:var(--s2);}
.footer-col a{display:block;color:var(--text-mid);font-size:.88rem;padding:5px 0;transition:color .25s;}
.footer-col a:hover{color:var(--neon);}
.footer-bottom{max-width:1180px;margin:var(--s4) auto 0;padding-top:var(--s3);border-top:1px dashed rgba(255,255,255,.08);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:var(--s2);font-family:var(--font-mono);font-size:.7rem;color:var(--text-dim);}
.footer-socials{display:flex;gap:10px;}
.footer-socials a{width:38px;height:38px;border-radius:10px;border:1px solid var(--glass-border);display:flex;align-items:center;justify-content:center;transition:all .25s var(--ease);}
.footer-socials a:hover{border-color:var(--neon);color:var(--neon);transform:translateY(-3px);}
.back-top{width:38px;height:38px;border-radius:10px;border:1px solid var(--glass-border);display:flex;align-items:center;justify-content:center;color:var(--neon);}

/* ============================================================
   13. TOAST NOTIFICATION
   ============================================================ */
.toast{position:fixed;bottom:var(--s3);right:var(--s3);z-index:800;display:flex;align-items:center;gap:12px;padding:14px 18px;border-radius:var(--radius-md);background:rgba(9,18,34,.85);border:1px solid var(--glass-border-strong);backdrop-filter:blur(16px);box-shadow:0 10px 40px rgba(0,0,0,.5),0 0 24px rgba(34,229,255,.15);transform:translateY(140%);opacity:0;transition:transform .5s var(--ease),opacity .5s var(--ease);max-width:min(340px,88vw);}
.toast.show{transform:translateY(0);opacity:1;}
.toast i:first-child{color:var(--neon);font-size:1.1rem;}
.toast span{font-size:.85rem;color:var(--text-hi);flex:1;}
.toast button{background:transparent;border:none;color:var(--text-dim);font-size:1rem;line-height:1;}
.toast button:hover{color:var(--neon);}

/* ============================================================
   14. RESPONSIVE
   ============================================================ */
@media (max-width: 992px){
  .assistant-grid{grid-template-columns:1fr;}
  .skills-grid{grid-template-columns:1fr;}
  .radial-row{grid-template-columns:repeat(2,1fr);}
  .projects-grid{grid-template-columns:1fr;}
  .blog-grid{grid-template-columns:1fr;}
  .contact-grid{grid-template-columns:1fr;}
  .form-row{grid-template-columns:1fr;}
}
@media (max-width: 768px){
  .nav-links{position:fixed;top:0;right:0;height:100vh;width:min(300px,80vw);background:rgba(4,9,18,.97);backdrop-filter:blur(20px);flex-direction:column;align-items:flex-start;padding:calc(var(--s6) + var(--s2)) var(--s4);gap:var(--s3);border-left:1px solid var(--glass-border);transform:translateX(100%);transition:transform .4s var(--ease);z-index:600;}
  .nav-links.open{transform:translateX(0);}
  .nav-status{display:none;}
  .nav-toggle{display:flex;}
  section{padding:var(--s6) var(--s2);}
  .hero{padding-top:calc(var(--s6) + 20px);}
  .hero-stats{gap:var(--s4);}
  .assistant-chat{height:560px;}
}
@media (max-width: 480px){
  .hero-title{font-size:clamp(2rem,10vw,2.8rem);}
  .radial-row{grid-template-columns:1fr 1fr;}
  .chat-quick button{font-size:.7rem;padding:8px 11px;}
  .form-row{grid-template-columns:1fr;}
  section{padding:var(--s5) var(--s2);}
}
@media (max-width: 360px){
  .hstat-num{font-size:1.7rem;}
  .nav-brand small{display:none;}
  .radial-gauge{width:92px;height:92px;}
}
</style>
</head>
<body>

<!-- BACKDROP -->
<div class="bg-fixed" aria-hidden="true">
  <div class="bg-grid"></div>
  <div class="bg-glow glow-1"></div>
  <div class="bg-glow glow-2"></div>
  <div class="bg-glow glow-3"></div>
</div>
<canvas id="starfield" aria-hidden="true"></canvas>
<div class="scanline" aria-hidden="true"></div>

<!-- BOOT SCREEN -->
<div class="boot-screen" id="bootScreen" role="status" aria-live="polite">
  <div class="boot-inner">
    <div class="boot-logo" aria-hidden="true"><i class="fa-solid fa-circle-nodes"></i></div>
    <div class="boot-title">J.A.R.V.I.S <span>OS</span></div>
    <div class="boot-log" id="bootLog"></div>
    <div class="boot-progress"><div class="boot-progress-fill" id="bootProgressFill"></div></div>
    <div class="boot-percent" id="bootPercent">INITIALIZING… 0%</div>
    <button class="boot-skip" id="bootSkip" type="button">SKIP INITIALIZATION <i class="fa-solid fa-forward"></i></button>
  </div>
</div>

<!-- NAVBAR -->
<header>
<nav class="navbar" aria-label="Primary">
  <a href="#hero" class="nav-brand">
    <i class="fa-solid fa-circle-nodes" aria-hidden="true"></i>
    <span>M.E.A.K<small>JARVIS OPERATING SYSTEM</small></span>
  </a>
  <ul class="nav-links" id="navLinks">
    <li><a href="#hero">Home</a></li>
    <li><a href="#assistant">Assistant</a></li>
    <li><a href="#skills">Skills</a></li>
    <li><a href="#projects">Projects</a></li>
    <li><a href="#experience">Experience</a></li>
    <li><a href="#blog">Blog</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  <div class="nav-status"><span class="dot pulse-green"></span> SYSTEM ONLINE</div>
  <button class="nav-toggle" id="navToggle" type="button" aria-label="Toggle navigation menu" aria-controls="navLinks" aria-expanded="false">
    <i class="fa-solid fa-bars" id="navToggleIcon"></i>
  </button>
</nav>
</header>

<main>

  <!-- ============ HERO ============ -->
  <section id="hero" class="hero">
    <div class="hero-orb-wrap" aria-hidden="true">
      <div class="orb-ring r1"></div>
      <div class="orb-ring r2"></div>
      <div class="orb-ring r3"></div>
      <div class="orb-core"></div>
    </div>
    <div class="section-inner hero-inner">
      <p class="status-line"><span class="dot pulse-green"></span> SYSTEM ONLINE <span class="sep">•</span> <span id="heroClock">00:00:00</span> <span class="sep">•</span> UPTIME 04Y 02M</p>
      <p class="eyebrow">FULL-STACK LARAVEL DEVELOPER</p>
      <h1 class="hero-title">M. ESTIAQUE<br><span class="gradient-text">AHMED KHAN</span></h1>
      <p class="hero-sub">Full-stack developer engineering scalable Laravel systems, custom ERP integrations, and enterprise automation — turning complex business logic into fast, reliable software.</p>
      <div class="hero-waveform" id="heroWaveform" aria-hidden="true"></div>
      <div class="hero-cta">
        <a href="#projects" class="btn btn-primary">View Projects <i class="fa-solid fa-arrow-right"></i></a>
        <a href="#assistant" class="btn btn-ghost"><i class="fa-solid fa-microphone-lines"></i> Talk to J.A.R.V.I.S</a>
      </div>
      <div class="hero-stats">
        <div class="hstat"><span class="hstat-num" data-count="4">0</span><span class="hstat-lbl">Years Experience</span></div>
        <div class="hstat"><span class="hstat-num" data-count="18">0</span><span class="hstat-lbl">Core Technologies</span></div>
        <div class="hstat"><span class="hstat-num" data-count="3">0</span><span class="hstat-lbl">Organizations Served</span></div>
      </div>
    </div>
    <div class="scroll-indicator" aria-hidden="true"><span></span>SCROLL</div>
  </section>

  <!-- ============ AI ASSISTANT CHAT ============ -->
  <section id="assistant">
    <div class="section-inner">
      <div class="section-head reveal">
        <p class="section-tag">Voice Interface</p>
        <h2 class="section-title">Talk to <span class="gradient-text">J.A.R.V.I.S</span></h2>
        <p class="section-sub">A scripted, fully client-side assistant. Tap a quick action or type a keyword — every reply is pre-written, there is no live AI model behind this widget.</p>
      </div>
      <div class="assistant-grid">
        <div class="assistant-chat glass-panel reveal">
          <div class="chat-header">
            <div class="chat-avatar"><div class="avatar-ring" aria-hidden="true"></div><i class="fa-solid fa-brain" aria-hidden="true"></i></div>
            <div class="chat-id">
              <strong>J.A.R.V.I.S</strong>
              <span><span class="dot pulse-green sm"></span> Online — scripted demo assistant</span>
            </div>
            <div class="chat-wave" id="chatWave" aria-hidden="true">
              <span style="animation-delay:.0s"></span><span style="animation-delay:.1s"></span><span style="animation-delay:.2s"></span><span style="animation-delay:.3s"></span><span style="animation-delay:.15s"></span>
            </div>
          </div>
          <div class="chat-body" id="chatBody" role="log" aria-live="polite" aria-label="Conversation with J.A.R.V.I.S"></div>
          <div class="chat-quick" id="chatQuick">
            <button type="button" data-key="who">Who is he?</button>
            <button type="button" data-key="skills">Show skills</button>
            <button type="button" data-key="experience">Show experience</button>
            <button type="button" data-key="projects">Show projects</button>
            <button type="button" data-key="contact">Contact him</button>
          </div>
          <form class="chat-input-row" id="chatForm">
            <label for="chatInput" class="sr-only">Message J.A.R.V.I.S</label>
            <input type="text" id="chatInput" placeholder="Type a keyword… e.g. education, stack, availability" autocomplete="off" maxlength="120">
            <button type="submit" aria-label="Send message"><i class="fa-solid fa-paper-plane"></i></button>
          </form>
          <p class="chat-disclaimer"><i class="fa-solid fa-circle-info" aria-hidden="true"></i> Simulated assistant — scripted, deterministic client-side responses only. No external AI API is called.</p>
        </div>
        <div class="assistant-side">
          <div class="profile-card glass-panel reveal">
            <h3><i class="fa-solid fa-id-badge"></i> Operator Profile</h3>
            <div class="profile-row"><span>Name</span><span>M. Estiaque A. Khan</span></div>
            <div class="profile-row"><span>Role</span><span>Full-Stack Laravel Dev</span></div>
            <div class="profile-row"><span>MSc</span><span>CS — Uttara University '25</span></div>
            <div class="profile-row"><span>BSc</span><span>CSE — Uttara University '21</span></div>
            <div class="profile-row"><span>Status</span><span style="color:var(--green)">Available</span></div>
          </div>
          <div class="voice-viz glass-panel reveal">
            <h3>Voice Visualization</h3>
            <canvas id="voiceCanvas" aria-hidden="true"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ SKILLS DASHBOARD ============ -->
  <section id="skills">
    <div class="section-inner">
      <div class="section-head reveal">
        <p class="section-tag">System Diagnostics</p>
        <h2 class="section-title">Skills <span class="gradient-text">Dashboard</span></h2>
        <p class="section-sub">Live-style readout of core competencies across backend, frontend, data, and delivery tooling.</p>
      </div>

      <div class="skills-analytics glass-panel reveal">
        <div class="skills-analytics-head">
          <h3><i class="fa-solid fa-chart-line" aria-hidden="true"></i> Delivery Activity Index</h3>
          <div class="legend">
            <span><i style="background:var(--neon)"></i> Shipped Features</span>
            <span><i style="background:var(--violet)"></i> Code Reviews</span>
          </div>
        </div>
        <canvas id="skillsGraph" aria-hidden="true"></canvas>
      </div>

      <div class="skills-grid">
        <div class="skill-category glass-panel reveal">
          <h3><i class="fa-solid fa-server"></i> Backend &amp; API</h3>
          <div class="skill-bar" data-percent="97"><div class="skill-bar-head"><span>PHP 8</span><span>97%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="96"><div class="skill-bar-head"><span>Laravel</span><span>96%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="90"><div class="skill-bar-head"><span>JavaScript (ES6+)</span><span>90%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="92"><div class="skill-bar-head"><span>REST API Design</span><span>92%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
        </div>
        <div class="skill-category glass-panel reveal">
          <h3><i class="fa-solid fa-layer-group"></i> Frontend Frameworks</h3>
          <div class="skill-bar" data-percent="85"><div class="skill-bar-head"><span>Vue.js</span><span>85%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="88"><div class="skill-bar-head"><span>Alpine.js</span><span>88%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="91"><div class="skill-bar-head"><span>Livewire</span><span>91%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="89"><div class="skill-bar-head"><span>Tailwind CSS</span><span>89%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="87"><div class="skill-bar-head"><span>Bootstrap 5</span><span>87%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
        </div>
        <div class="skill-category glass-panel reveal">
          <h3><i class="fa-solid fa-database"></i> Data &amp; Infrastructure</h3>
          <div class="skill-bar" data-percent="94"><div class="skill-bar-head"><span>MySQL</span><span>94%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="86"><div class="skill-bar-head"><span>PostgreSQL</span><span>86%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="83"><div class="skill-bar-head"><span>Redis</span><span>83%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="93"><div class="skill-bar-head"><span>Database Optimization</span><span>93%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="90"><div class="skill-bar-head"><span>ERP Integration</span><span>90%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
        </div>
        <div class="skill-category glass-panel reveal">
          <h3><i class="fa-solid fa-gears"></i> DevOps &amp; Tooling</h3>
          <div class="skill-bar" data-percent="82"><div class="skill-bar-head"><span>Docker</span><span>82%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="95"><div class="skill-bar-head"><span>Git</span><span>95%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="78"><div class="skill-bar-head"><span>AWS</span><span>78%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
          <div class="skill-bar" data-percent="80"><div class="skill-bar-head"><span>CI/CD</span><span>80%</span></div><div class="skill-track"><div class="skill-fill"></div></div></div>
        </div>
      </div>

      <div class="radial-row">
        <div class="radial-card glass-panel reveal">
          <div class="radial-gauge" data-value="96">
            <svg viewBox="0 0 108 108"><circle class="track" cx="54" cy="54" r="48"></circle><circle class="fill" cx="54" cy="54" r="48"></circle></svg>
            <span class="radial-value">96%</span>
          </div>
          <span class="radial-label">Backend Engineering</span>
        </div>
        <div class="radial-card glass-panel reveal">
          <div class="radial-gauge" data-value="92">
            <svg viewBox="0 0 108 108"><circle class="track" cx="54" cy="54" r="48"></circle><circle class="fill" cx="54" cy="54" r="48"></circle></svg>
            <span class="radial-value">92%</span>
          </div>
          <span class="radial-label">Database Architecture</span>
        </div>
        <div class="radial-card glass-panel reveal">
          <div class="radial-gauge" data-value="88">
            <svg viewBox="0 0 108 108"><circle class="track" cx="54" cy="54" r="48"></circle><circle class="fill" cx="54" cy="54" r="48"></circle></svg>
            <span class="radial-value">88%</span>
          </div>
          <span class="radial-label">Frontend Delivery</span>
        </div>
        <div class="radial-card glass-panel reveal">
          <div class="radial-gauge" data-value="85">
            <svg viewBox="0 0 108 108"><circle class="track" cx="54" cy="54" r="48"></circle><circle class="fill" cx="54" cy="54" r="48"></circle></svg>
            <span class="radial-value">85%</span>
          </div>
          <span class="radial-label">DevOps Automation</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ PROJECTS ============ -->
  <section id="projects">
    <div class="section-inner">
      <div class="section-head reveal">
        <p class="section-tag">Deployed Systems</p>
        <h2 class="section-title">Project <span class="gradient-text">Archive</span></h2>
        <p class="section-sub">Four systems pulled from the deployment log — from packaged tooling to enterprise ERP automation.</p>
      </div>
      <div class="projects-grid">

        <article class="project-card glass-panel reveal">
          <div class="corner tl"></div><div class="corner br"></div>
          <div class="project-top">
            <div class="project-icon"><i class="fa-solid fa-box-archive"></i></div>
            <span class="project-tagnum">SYS//01</span>
          </div>
          <h3>Port3folio Package</h3>
          <p>A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
          <div class="tech-chips"><span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span></div>
          <div class="project-links">
            <a href="#"><i class="fa-brands fa-github"></i> Repository</a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Preview</a>
          </div>
        </article>

        <article class="project-card glass-panel reveal">
          <div class="corner tl"></div><div class="corner br"></div>
          <div class="project-top">
            <div class="project-icon"><i class="fa-solid fa-cart-shopping"></i></div>
            <span class="project-tagnum">SYS//02</span>
          </div>
          <h3>E-Commerce Platform</h3>
          <p>High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
          <div class="tech-chips"><span>Laravel</span><span>Vue.js</span><span>MySQL</span><span>Redis</span><span>Stripe</span></div>
          <div class="project-links">
            <a href="#"><i class="fa-brands fa-github"></i> Repository</a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Preview</a>
          </div>
        </article>

        <article class="project-card glass-panel reveal">
          <div class="corner tl"></div><div class="corner br"></div>
          <div class="project-top">
            <div class="project-icon"><i class="fa-solid fa-chart-pie"></i></div>
            <span class="project-tagnum">SYS//03</span>
          </div>
          <h3>SaaS Analytics Dashboard</h3>
          <p>Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
          <div class="tech-chips"><span>Laravel</span><span>Livewire</span><span>Alpine.js</span><span>PostgreSQL</span><span>Chart.js</span></div>
          <div class="project-links">
            <a href="#"><i class="fa-brands fa-github"></i> Repository</a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Preview</a>
          </div>
        </article>

        <article class="project-card glass-panel reveal">
          <div class="corner tl"></div><div class="corner br"></div>
          <div class="project-top">
            <div class="project-icon"><i class="fa-solid fa-warehouse"></i></div>
            <span class="project-tagnum">SYS//04</span>
          </div>
          <h3>Inventory Management System</h3>
          <p>Custom-built inventory &amp; ERP automation module for enterprise clients — stock tracking, procurement workflows, and reporting.</p>
          <div class="tech-chips"><span>PHP</span><span>Laravel</span><span>MySQL</span><span>REST API</span></div>
          <div class="project-links">
            <a href="#"><i class="fa-brands fa-github"></i> Repository</a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Preview</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ============ EXPERIENCE ============ -->
  <section id="experience">
    <div class="section-inner">
      <div class="section-head reveal">
        <p class="section-tag">Career Timeline</p>
        <h2 class="section-title">System <span class="gradient-text">Log</span></h2>
        <p class="section-sub">Deployment history, reverse-chronological — most recent entry first.</p>
      </div>
      <ol class="log-list">

        <li class="log-item active reveal">
          <span class="log-node" aria-hidden="true"></span>
          <div class="log-card glass-panel">
            <div class="log-meta">
              <span class="log-tag">[LOG // 003]  2025 — PRESENT</span>
              <span class="log-badge">ACTIVE PROCESS</span>
            </div>
            <div class="log-role">Software Engineer</div>
            <div class="log-org">Natore IT</div>
            <p class="log-desc">Frontend optimization and database management for local business clients.</p>
          </div>
        </li>

        <li class="log-item reveal">
          <span class="log-node" aria-hidden="true"></span>
          <div class="log-card glass-panel">
            <div class="log-meta">
              <span class="log-tag">[LOG // 002]  2023 — 2025</span>
              <span class="log-badge" style="border-color:var(--glass-border);color:var(--text-dim);background:transparent;">ARCHIVED</span>
            </div>
            <div class="log-role">Software Developer</div>
            <div class="log-org">Isotope IT</div>
            <p class="log-desc">Specialized in PHP/Laravel web applications and custom inventory management modules.</p>
          </div>
        </li>

        <li class="log-item reveal">
          <span class="log-node" aria-hidden="true"></span>
          <div class="log-card glass-panel">
            <div class="log-meta">
              <span class="log-tag">[LOG // 001]  2022 — 2023</span>
              <span class="log-badge" style="border-color:var(--glass-border);color:var(--text-dim);background:transparent;">ARCHIVED</span>
            </div>
            <div class="log-role">Software Engineer</div>
            <div class="log-org">Barcode Tech Automation Ltd</div>
            <p class="log-desc">Leading development of enterprise automation solutions and ERP systems integration.</p>
          </div>
        </li>

      </ol>
    </div>
  </section>

  <!-- ============ BLOG ============ -->
  <section id="blog">
    <div class="section-inner">
      <div class="section-head reveal">
        <p class="section-tag">Insight Feed</p>
        <h2 class="section-title">AI-Curated <span class="gradient-text">Blog</span></h2>
        <p class="section-sub">Notes from the field on Laravel performance, data architecture, and modern integration patterns.</p>
      </div>
      <div class="blog-grid">

        <article class="blog-card glass-panel reveal">
          <span class="blog-badge"><i class="fa-solid fa-sparkles"></i> AI CURATED</span>
          <h3>5 Laravel Performance Patterns That Actually Move the Needle</h3>
          <p>Eager loading, query caching, and queue offloading — the changes that cut real response times in production, not just in benchmarks.</p>
          <div class="blog-meta"><span>Jun 02, 2026</span><a href="#">Read More <i class="fa-solid fa-arrow-right"></i></a></div>
        </article>

        <article class="blog-card glass-panel reveal">
          <span class="blog-badge"><i class="fa-solid fa-sparkles"></i> AI CURATED</span>
          <h3>Designing Database Schemas for High-Volume ERP Systems</h3>
          <p>Lessons from building inventory and procurement modules that stay fast under heavy concurrent writes and years of historical data.</p>
          <div class="blog-meta"><span>May 14, 2026</span><a href="#">Read More <i class="fa-solid fa-arrow-right"></i></a></div>
        </article>

        <article class="blog-card glass-panel reveal">
          <span class="blog-badge"><i class="fa-solid fa-sparkles"></i> AI CURATED</span>
          <h3>Where AI-Assisted Development Fits in a Laravel Workflow</h3>
          <p>Using AI tooling for scaffolding, code review, and test generation without losing ownership of architecture decisions.</p>
          <div class="blog-meta"><span>Apr 27, 2026</span><a href="#">Read More <i class="fa-solid fa-arrow-right"></i></a></div>
        </article>

      </div>
    </div>
  </section>

  <!-- ============ CONTACT ============ -->
  <section id="contact">
    <div class="section-inner">
      <div class="section-head reveal">
        <p class="section-tag">Uplink Console</p>
        <h2 class="section-title">Open a <span class="gradient-text">Channel</span></h2>
        <p class="section-sub">Send a transmission directly — every field routes to a real inbox, no simulated backend.</p>
      </div>
      <div class="contact-grid">
        <div class="contact-info reveal">
          <a class="contact-link glass-panel" href="mailto:mrm.khan.1298@gmail.com">
            <i class="fa-solid fa-envelope"></i>
            <span><strong>Email</strong><span>mrm.khan.1298@gmail.com</span></span>
          </a>
          <a class="contact-link glass-panel" href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-github"></i>
            <span><strong>GitHub</strong><span>github.com/mestiaque</span></span>
          </a>
          <a class="contact-link glass-panel" href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-linkedin"></i>
            <span><strong>LinkedIn</strong><span>linkedin.com/in/mestiaque</span></span>
          </a>
        </div>
        <form class="contact-form-panel glass-panel reveal" id="contactForm" novalidate>
          <div class="corner tl"></div><div class="corner tr"></div>
          <div class="form-row">
            <div class="field">
              <label for="cf-name">Name</label>
              <input type="text" id="cf-name" name="name" required autocomplete="name" placeholder="Your name">
            </div>
            <div class="field">
              <label for="cf-email">Email</label>
              <input type="email" id="cf-email" name="email" required autocomplete="email" placeholder="you@example.com">
            </div>
          </div>
          <div class="field">
            <label for="cf-subject">Subject</label>
            <input type="text" id="cf-subject" name="subject" required placeholder="What's this about?">
          </div>
          <div class="field">
            <label for="cf-message">Message</label>
            <textarea id="cf-message" name="message" required placeholder="Transmit your message…"></textarea>
          </div>
          <button type="submit" class="btn btn-primary console-submit" id="cfSubmitBtn">
            <i class="fa-solid fa-tower-broadcast"></i> Transmit Message
          </button>
          <div class="form-status" id="cfStatus" role="status" aria-live="polite"></div>
        </form>
      </div>
    </div>
  </section>

</main>

<!-- ============ FOOTER ============ -->
<footer id="footer">
  <div class="footer-inner">
    <div class="footer-brand">
      <a href="#hero" class="nav-brand">
        <i class="fa-solid fa-circle-nodes" aria-hidden="true"></i>
        <span>M.E.A.K<small>JARVIS OPERATING SYSTEM</small></span>
      </a>
      <p>Full-stack Laravel developer building resilient backend systems, ERP integrations, and clean, modern interfaces.</p>
    </div>
    <div class="footer-cols">
      <div class="footer-col">
        <h4>Navigate</h4>
        <a href="#hero">Home</a>
        <a href="#skills">Skills</a>
        <a href="#projects">Projects</a>
        <a href="#experience">Experience</a>
      </div>
      <div class="footer-col">
        <h4>Connect</h4>
        <a href="mailto:mrm.khan.1298@gmail.com">Email</a>
        <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer">GitHub</a>
        <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer">LinkedIn</a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <span>&copy; <span id="footerYear">2026</span> M. Estiaque Ahmed Khan — All systems nominal.</span>
    <div class="footer-socials">
      <a href="mailto:mrm.khan.1298@gmail.com" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
      <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
      <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
      <a href="#hero" class="back-top" aria-label="Back to top"><i class="fa-solid fa-arrow-up"></i></a>
    </div>
  </div>
</footer>

<!-- TOAST -->
<div class="toast" id="toast" role="status" aria-live="polite">
  <i class="fa-solid fa-bolt" aria-hidden="true"></i>
  <span id="toastText">New message capability online</span>
  <button type="button" id="toastClose" aria-label="Dismiss notification">&times;</button>
</div>

<script>
(function(){
"use strict";

/* ============================================================
   UTILITIES
   ============================================================ */
function $(sel,ctx){ return (ctx||document).querySelector(sel); }
function $all(sel,ctx){ return Array.prototype.slice.call((ctx||document).querySelectorAll(sel)); }
function pad(n){ return n<10 ? "0"+n : ""+n; }

/* ============================================================
   1. STARFIELD BACKGROUND (canvas)
   ============================================================ */
(function starfield(){
  var canvas = $("#starfield");
  var ctx = canvas.getContext("2d");
  var stars = [];
  function resize(){
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }
  function build(){
    stars = [];
    var count = Math.min(140, Math.floor((canvas.width*canvas.height)/14000));
    for(var i=0;i<count;i++){
      stars.push({
        x: Math.random()*canvas.width,
        y: Math.random()*canvas.height,
        r: Math.random()*1.4+0.3,
        speed: Math.random()*0.15+0.02,
        tw: Math.random()*Math.PI*2
      });
    }
  }
  resize(); build();
  window.addEventListener("resize", function(){ resize(); build(); });
  function draw(){
    ctx.clearRect(0,0,canvas.width,canvas.height);
    for(var i=0;i<stars.length;i++){
      var s = stars[i];
      s.tw += 0.02;
      var alpha = 0.35 + Math.sin(s.tw)*0.35;
      ctx.beginPath();
      ctx.arc(s.x, s.y, s.r, 0, Math.PI*2);
      ctx.fillStyle = "rgba(148,225,255,"+Math.max(0,alpha)+")";
      ctx.fill();
      s.y += s.speed;
      if(s.y > canvas.height) s.y = 0;
    }
    requestAnimationFrame(draw);
  }
  draw();
})();

/* ============================================================
   2. HERO / CHAT WAVEFORM BARS (CSS-driven, built via JS)
   ============================================================ */
(function buildWaveform(){
  var wrap = $("#heroWaveform");
  var barCount = 46;
  for(var i=0;i<barCount;i++){
    var span = document.createElement("span");
    span.style.animationDelay = (Math.random()*1.2).toFixed(2)+"s";
    span.style.animationDuration = (0.8+Math.random()*0.8).toFixed(2)+"s";
    wrap.appendChild(span);
  }
})();

/* ============================================================
   3. VOICE VISUALIZATION CANVAS (equalizer)
   ============================================================ */
(function voiceViz(){
  var canvas = $("#voiceCanvas");
  if(!canvas) return;
  var ctx = canvas.getContext("2d");
  var bars = 28;
  var phase = 0;
  function resize(){
    var rect = canvas.getBoundingClientRect();
    canvas.width = rect.width * (window.devicePixelRatio||1);
    canvas.height = rect.height * (window.devicePixelRatio||1);
  }
  resize();
  window.addEventListener("resize", resize);
  function draw(){
    var w = canvas.width, h = canvas.height;
    ctx.clearRect(0,0,w,h);
    var gap = w/bars;
    for(var i=0;i<bars;i++){
      var amp = (Math.sin(phase + i*0.5) * 0.5 + 0.5) * 0.75 + 0.08;
      var barH = amp * h * 0.85;
      var x = i*gap + gap*0.25;
      var bw = gap*0.5;
      var grad = ctx.createLinearGradient(0, h, 0, h-barH);
      grad.addColorStop(0, "rgba(8,145,168,0.9)");
      grad.addColorStop(1, "rgba(34,229,255,0.95)");
      ctx.fillStyle = grad;
      ctx.beginPath();
      var r = Math.min(bw/2, 6);
      var y = h - barH;
      ctx.moveTo(x, h);
      ctx.lineTo(x, y+r);
      ctx.arcTo(x, y, x+r, y, r);
      ctx.lineTo(x+bw-r, y);
      ctx.arcTo(x+bw, y, x+bw, y+r, r);
      ctx.lineTo(x+bw, h);
      ctx.fill();
    }
    phase += 0.09;
    requestAnimationFrame(draw);
  }
  draw();
})();

/* ============================================================
   4. SKILLS ANALYTICS GRAPH (canvas line chart)
   ============================================================ */
(function skillsGraph(){
  var canvas = $("#skillsGraph");
  if(!canvas) return;
  var ctx = canvas.getContext("2d");
  var featuresData = [12,18,15,24,21,28,26,33,30,38,35,42];
  var reviewsData  = [6,9,8,13,11,15,14,18,16,20,19,23];
  var labels = ["W1","W2","W3","W4","W5","W6","W7","W8","W9","W10","W11","W12"];
  var drawn = false;

  function resize(){
    var rect = canvas.getBoundingClientRect();
    canvas.width = rect.width;
    canvas.height = rect.height;
  }

  function drawLine(data, color, glow, progress){
    var w = canvas.width, h = canvas.height;
    var padL = 34, padR = 12, padT = 16, padB = 24;
    var max = 45;
    var stepX = (w-padL-padR)/(data.length-1);
    ctx.beginPath();
    var pointCount = Math.max(2, Math.floor(data.length*progress));
    for(var i=0;i<pointCount;i++){
      var x = padL + stepX*i;
      var y = padT + (h-padT-padB) * (1 - data[i]/max);
      if(i===0) ctx.moveTo(x,y); else ctx.lineTo(x,y);
    }
    ctx.strokeStyle = color;
    ctx.lineWidth = 2.4;
    ctx.lineJoin = "round";
    ctx.shadowColor = glow;
    ctx.shadowBlur = 10;
    ctx.stroke();
    ctx.shadowBlur = 0;
    for(var j=0;j<pointCount;j++){
      var xx = padL + stepX*j;
      var yy = padT + (h-padT-padB) * (1 - data[j]/max);
      ctx.beginPath();
      ctx.arc(xx,yy,2.6,0,Math.PI*2);
      ctx.fillStyle = color;
      ctx.fill();
    }
  }

  function drawGrid(){
    var w = canvas.width, h = canvas.height;
    var padL = 34, padR = 12, padT = 16, padB = 24;
    ctx.strokeStyle = "rgba(255,255,255,0.06)";
    ctx.lineWidth = 1;
    for(var g=0;g<=4;g++){
      var y = padT + (h-padT-padB) * (g/4);
      ctx.beginPath();
      ctx.moveTo(padL, y);
      ctx.lineTo(w-padR, y);
      ctx.stroke();
    }
    ctx.fillStyle = "rgba(93,113,136,0.9)";
    ctx.font = "10px 'Share Tech Mono', monospace";
    ctx.fillText("45", 4, padT+4);
    ctx.fillText("0", 4, h-padB+2);
  }

  var progress = 0;
  var animating = false;
  function animate(){
    ctx.clearRect(0,0,canvas.width,canvas.height);
    drawGrid();
    drawLine(featuresData, "#22e5ff", "rgba(34,229,255,.7)", progress);
    drawLine(reviewsData, "#8b7dff", "rgba(139,124,255,.7)", progress);
    if(progress < 1){
      progress += 0.02;
      requestAnimationFrame(animate);
    } else {
      animating = false;
    }
  }

  resize();
  window.addEventListener("resize", function(){ resize(); if(drawn){ progress=1; animate(); } });

  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(entry.isIntersecting && !drawn){
        drawn = true;
        progress = 0;
        animate();
      }
    });
  }, {threshold:0.3});
  io.observe(canvas);
})();

/* ============================================================
   5. BOOT SEQUENCE
   ============================================================ */
(function boot(){
  var lines = [
    "INITIALIZING CORE SYSTEMS…",
    "LOADING NEURAL PATHWAYS…",
    "CALIBRATING HOLOGRAPHIC INTERFACE…",
    "MOUNTING PORTFOLIO DATABASE…",
    "AUTHENTICATING USER: M. ESTIAQUE AHMED KHAN…",
    "ESTABLISHING SECURE UPLINK…",
    "SYSTEM ONLINE."
  ];
  var bootLog = $("#bootLog");
  var progressFill = $("#bootProgressFill");
  var percentEl = $("#bootPercent");
  var bootScreen = $("#bootScreen");
  var skipBtn = $("#bootSkip");
  var finished = false;
  var lineIndex = 0;
  var timers = [];

  function finish(){
    if(finished) return;
    finished = true;
    timers.forEach(function(t){ clearTimeout(t); });
    progressFill.style.width = "100%";
    percentEl.textContent = "SYSTEM ONLINE — 100%";
    bootScreen.classList.add("hide");
    document.body.classList.add("booted");
    setTimeout(function(){
      bootScreen.style.display = "none";
      startPostBoot();
    }, 800);
  }

  function typeLine(text, cb){
    var div = document.createElement("div");
    bootLog.appendChild(div);
    var i = 0;
    var caret = document.createElement("span");
    caret.className = "caret";
    function step(){
      if(i <= text.length){
        div.textContent = text.slice(0,i);
        div.style.opacity = 1;
        div.appendChild(caret);
        i++;
        timers.push(setTimeout(step, 16));
      } else {
        caret.remove();
        bootLog.scrollTop = bootLog.scrollHeight;
        if(cb) cb();
      }
    }
    step();
  }

  function nextLine(){
    if(finished) return;
    if(lineIndex >= lines.length){
      timers.push(setTimeout(finish, 260));
      return;
    }
    typeLine(lines[lineIndex], function(){
      lineIndex++;
      var pct = Math.round((lineIndex/lines.length)*100);
      progressFill.style.width = pct+"%";
      percentEl.textContent = "INITIALIZING… " + pct + "%";
      timers.push(setTimeout(nextLine, 180));
    });
  }

  skipBtn.addEventListener("click", finish);
  timers.push(setTimeout(nextLine, 300));
})();

/* ============================================================
   6. POST-BOOT: hero counters, reveals, radial gauges, toast
   ============================================================ */
function startPostBoot(){
  animateHeroCounters();
  initRevealObserver();
  initSkillBarsObserver();
  initRadialGaugeObserver();
  scheduleToast();
  startChatIntro();
}

function animateHeroCounters(){
  $all(".hstat-num").forEach(function(el){
    var target = parseInt(el.getAttribute("data-count"),10) || 0;
    var current = 0;
    var duration = 1400;
    var startTime = null;
    function step(ts){
      if(!startTime) startTime = ts;
      var progress = Math.min(1, (ts-startTime)/duration);
      var eased = 1 - Math.pow(1-progress, 3);
      current = Math.round(target*eased);
      el.textContent = current;
      if(progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  });
}

function initRevealObserver(){
  var items = $all(".reveal");
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(entry.isIntersecting){
        entry.target.classList.add("in");
        io.unobserve(entry.target);
      }
    });
  }, {threshold:0.12, rootMargin:"0px 0px -40px 0px"});
  items.forEach(function(el){ io.observe(el); });
}

function initSkillBarsObserver(){
  var bars = $all(".skill-bar");
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(entry.isIntersecting){
        var bar = entry.target;
        var pct = bar.getAttribute("data-percent") || "0";
        var fill = bar.querySelector(".skill-fill");
        requestAnimationFrame(function(){ fill.style.width = pct+"%"; });
        io.unobserve(bar);
      }
    });
  }, {threshold:0.3});
  bars.forEach(function(el){ io.observe(el); });
}

function initRadialGaugeObserver(){
  var gauges = $all(".radial-gauge");
  var circumference = 2 * Math.PI * 48;
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(entry.isIntersecting){
        var gauge = entry.target;
        var value = parseInt(gauge.getAttribute("data-value"),10) || 0;
        var fillCircle = gauge.querySelector(".fill");
        var offset = circumference * (1 - value/100);
        fillCircle.style.strokeDasharray = circumference;
        requestAnimationFrame(function(){ fillCircle.style.strokeDashoffset = offset; });
        io.unobserve(gauge);
      }
    });
  }, {threshold:0.4});
  gauges.forEach(function(el){ io.observe(el); });
}

function scheduleToast(){
  var toast = $("#toast");
  var closeBtn = $("#toastClose");
  var shown = false;
  function show(){
    if(shown) return;
    shown = true;
    toast.classList.add("show");
    setTimeout(hide, 6500);
  }
  function hide(){
    toast.classList.remove("show");
  }
  closeBtn.addEventListener("click", hide);
  setTimeout(show, 2200);
}

/* ============================================================
   7. NAVBAR: mobile toggle + active link highlight
   ============================================================ */
(function nav(){
  var toggle = $("#navToggle");
  var toggleIcon = $("#navToggleIcon");
  var links = $("#navLinks");
  toggle.addEventListener("click", function(){
    var isOpen = links.classList.toggle("open");
    toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    toggleIcon.className = isOpen ? "fa-solid fa-xmark" : "fa-solid fa-bars";
  });
  $all("#navLinks a").forEach(function(a){
    a.addEventListener("click", function(){
      links.classList.remove("open");
      toggle.setAttribute("aria-expanded","false");
      toggleIcon.className = "fa-solid fa-bars";
    });
  });
})();

/* ============================================================
   8. LIVE CLOCK
   ============================================================ */
(function clock(){
  var el = $("#heroClock");
  function tick(){
    var now = new Date();
    el.textContent = pad(now.getHours())+":"+pad(now.getMinutes())+":"+pad(now.getSeconds());
  }
  tick();
  setInterval(tick, 1000);
})();
$("#footerYear").textContent = new Date().getFullYear();

/* ============================================================
   9. SCRIPTED AI ASSISTANT CHAT
   ============================================================ */
var chatBody = $("#chatBody");
var chatWave = $("#chatWave");
var quickButtons = $all("#chatQuick button");
var chatForm = $("#chatForm");
var chatInput = $("#chatInput");
var chatIntroStarted = false;

var RESPONSES = {
  greeting: [
    "Systems online. I am J.A.R.V.I.S — a scripted interface built for this portfolio.",
    "I can tell you about M. Estiaque Ahmed Khan: his background, skills, experience, or how to reach him.",
    "Tap a quick action below, or type a keyword like \"skills\", \"education\", or \"contact\"."
  ],
  who: [
    "M. Estiaque Ahmed Khan is a full-stack developer specializing in PHP 8 and Laravel.",
    "His work spans frontend optimization, database management, custom inventory modules, and enterprise ERP integrations.",
    "Education: MSc in Computer Science, Uttara University (2025) and BSc in Computer Science & Engineering, Uttara University (2021)."
  ],
  skills: [
    "Core stack: PHP 8, Laravel, JavaScript (ES6+), Vue.js, Alpine.js, and Livewire.",
    "Data layer: MySQL, PostgreSQL, Redis, plus deep experience in database optimization and ERP integration.",
    "Tooling: REST API design, Docker, Git, AWS, Tailwind CSS, Bootstrap 5, and CI/CD pipelines.",
    "Full breakdown with live gauges is in the Skills Dashboard section — try the nav link above."
  ],
  experience: [
    "Currently: Software Engineer at Natore IT (2025–Present) — frontend optimization and database management.",
    "Before that: Software Developer at Isotope IT (2023–2025) — PHP/Laravel apps and custom inventory modules.",
    "Earlier: Software Engineer at Barcode Tech Automation Ltd (2022–2023) — enterprise automation and ERP integration."
  ],
  projects: [
    "Four flagship builds: Port3folio Package, an E-Commerce Platform, a SaaS Analytics Dashboard, and an Inventory Management System.",
    "Each one is documented with tech stack and links in the Projects section — scroll down or use the nav."
  ],
  education: [
    "MSc in Computer Science — Uttara University, passing year 2025.",
    "BSc in Computer Science & Engineering — Uttara University, passing year 2021."
  ],
  contact: [
    "You can reach him directly at mrm.khan.1298@gmail.com.",
    "GitHub: github.com/mestiaque — LinkedIn: linkedin.com/in/mestiaque.",
    "Or scroll to the Contact section and use the transmission console — it sends a real message."
  ],
  stack: [
    "Primary stack: Laravel + PHP 8 on the backend, MySQL/PostgreSQL for data, Vue.js/Alpine.js/Livewire on the frontend, deployed with Docker and CI/CD on AWS."
  ],
  availability: [
    "Current status: available for new engagements. Best reached via the contact console below."
  ],
  default: [
    "I don't have a scripted line for that exact phrase — try \"skills\", \"experience\", \"projects\", \"education\", or \"contact\".",
    "Remember, I'm a deterministic demo assistant, not a live AI model — my vocabulary is intentionally limited."
  ]
};

var KEYWORD_MAP = [
  {key:"who", words:["who","about","bio","background"]},
  {key:"skills", words:["skill","stack","tech","technologies","language"]},
  {key:"experience", words:["experience","job","work","career","history"]},
  {key:"projects", words:["project","portfolio","work sample","build"]},
  {key:"education", words:["education","degree","university","msc","bsc","study"]},
  {key:"contact", words:["contact","email","reach","hire","linkedin","github"]},
  {key:"stack", words:["framework","database","devops"]},
  {key:"availability", words:["available","availability","freelance","hire me"]}
];

function timeNow(){
  var now = new Date();
  return pad(now.getHours())+":"+pad(now.getMinutes());
}

function scrollChatToBottom(){
  chatBody.scrollTop = chatBody.scrollHeight;
}

function appendMessage(sender, text){
  var msg = document.createElement("div");
  msg.className = "msg " + sender;
  var bubble = document.createElement("div");
  bubble.className = "msg-bubble";
  bubble.textContent = text;
  var time = document.createElement("span");
  time.className = "msg-time";
  time.textContent = (sender === "bot" ? "J.A.R.V.I.S · " : "You · ") + timeNow();
  msg.appendChild(bubble);
  msg.appendChild(time);
  chatBody.appendChild(msg);
  scrollChatToBottom();
}

function showTyping(){
  var typing = document.createElement("div");
  typing.className = "typing-dots";
  typing.id = "typingIndicator";
  typing.innerHTML = "<span></span><span></span><span></span>";
  chatBody.appendChild(typing);
  chatWave.classList.add("active");
  scrollChatToBottom();
}

function hideTyping(){
  var typing = $("#typingIndicator");
  if(typing) typing.remove();
  chatWave.classList.remove("active");
}

function setQuickButtonsDisabled(disabled){
  quickButtons.forEach(function(b){ b.disabled = disabled; });
}

function playBotLines(lines, onDone){
  var i = 0;
  setQuickButtonsDisabled(true);
  function playNext(){
    if(i >= lines.length){
      setQuickButtonsDisabled(false);
      if(onDone) onDone();
      return;
    }
    showTyping();
    var delay = Math.min(1500, 500 + lines[i].length * 14);
    setTimeout(function(){
      hideTyping();
      appendMessage("bot", lines[i]);
      i++;
      setTimeout(playNext, 350);
    }, delay);
  }
  playNext();
}

function matchKeyword(raw){
  var text = raw.toLowerCase().trim();
  if(!text) return "default";
  for(var i=0;i<KEYWORD_MAP.length;i++){
    var entry = KEYWORD_MAP[i];
    for(var j=0;j<entry.words.length;j++){
      if(text.indexOf(entry.words[j]) !== -1) return entry.key;
    }
  }
  return "default";
}

function respondTo(key){
  var lines = RESPONSES[key] || RESPONSES.default;
  playBotLines(lines);
}

function startChatIntro(){
  if(chatIntroStarted) return;
  chatIntroStarted = true;
  setTimeout(function(){
    playBotLines(RESPONSES.greeting);
  }, 500);
}

quickButtons.forEach(function(btn){
  btn.addEventListener("click", function(){
    var key = btn.getAttribute("data-key");
    var label = btn.textContent;
    appendMessage("user", label);
    setTimeout(function(){ respondTo(key); }, 250);
  });
});

chatForm.addEventListener("submit", function(e){
  e.preventDefault();
  var value = chatInput.value.trim();
  if(!value) return;
  appendMessage("user", value);
  var key = matchKeyword(value);
  chatInput.value = "";
  setTimeout(function(){ respondTo(key); }, 250);
});

/* ============================================================
   10. CONTACT FORM — real submission via fetch()
   ============================================================ */
(function contactForm(){
  var form = $("#contactForm");
  var status = $("#cfStatus");
  var submitBtn = $("#cfSubmitBtn");

  function setStatus(kind, text){
    status.className = "form-status show " + kind;
    status.innerHTML = (kind === "ok"
      ? '<i class="fa-solid fa-circle-check"></i> '
      : '<i class="fa-solid fa-triangle-exclamation"></i> ') + text;
  }

  form.addEventListener("submit", function(e){
    e.preventDefault();

    var name = $("#cf-name").value.trim();
    var email = $("#cf-email").value.trim();
    var subject = $("#cf-subject").value.trim();
    var message = $("#cf-message").value.trim();

    if(!name || !email || !subject || !message){
      setStatus("err", "ALL FIELDS REQUIRED — TRANSMISSION ABORTED.");
      return;
    }

    submitBtn.disabled = true;
    var originalHtml = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> TRANSMITTING…';

    fetch('/api/messages-store', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify({ name: name, email: email, subject: subject, message: message })
    })
    .then(function(response){
      if(!response.ok) throw new Error('Request failed with status ' + response.status);
      return response.json().catch(function(){ return {}; });
    })
    .then(function(){
      setStatus("ok", "MESSAGE TRANSMITTED TO M.E.A.K. — expect a reply shortly.");
      form.reset();
    })
    .catch(function(err){
      setStatus("err", "TRANSMISSION FAILED — please retry or email directly.");
      console.error("Contact form error:", err);
    })
    .finally(function(){
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalHtml;
    });
  });
})();

})();
</script>
</body>
</html>
