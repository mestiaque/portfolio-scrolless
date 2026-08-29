<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
<title>Rayyan Khan — Cyber Nexus</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet"/>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{background:#04060e;overflow:hidden;font-family:'Inter',sans-serif;user-select:none}
canvas#c{display:block;width:100vw;height:100vh;cursor:none}

/* ── HUD ── */
#hud{position:fixed;inset:0;pointer-events:none;z-index:10}
#xhair{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:20px;height:20px;opacity:.65}
#xhair::before,#xhair::after{content:'';position:absolute;background:#00f5ff;border-radius:1px}
#xhair::before{width:1.5px;height:100%;left:50%;transform:translateX(-50%)}
#xhair::after{height:1.5px;width:100%;top:50%;transform:translateY(-50%)}
#xhair.near{opacity:1;filter:drop-shadow(0 0 4px #00f5ff)}
#zone-label{position:absolute;top:20px;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:3px;transition:opacity .4s}
#zone-name{font-size:9px;letter-spacing:6px;color:#00f5ff88;text-transform:uppercase;font-family:'JetBrains Mono',monospace;transition:color .4s}
#zone-desc{font-size:10px;color:#ffffff18;letter-spacing:2px}
#interact{position:absolute;bottom:110px;left:50%;transform:translateX(-50%);display:flex;align-items:center;gap:12px;padding:9px 22px;border-radius:6px;border:1px solid rgba(0,245,255,.3);background:rgba(0,245,255,.06);backdrop-filter:blur(8px);opacity:0;transition:opacity .3s;pointer-events:none}
#interact.show{opacity:1}
#interact kbd{font-size:12px;font-family:'JetBrains Mono',monospace;color:#00f5ff;border:1px solid #00f5ff44;border-radius:4px;padding:2px 8px;background:rgba(0,245,255,.1)}
#interact span{font-size:9px;letter-spacing:3px;color:#00f5ff99;text-transform:uppercase}
#skill-hud{position:absolute;top:20px;right:22px;display:flex;flex-direction:column;align-items:flex-end;gap:3px}
#skill-lbl{font-size:8px;letter-spacing:3px;color:#00ff8844;text-transform:uppercase;font-family:'JetBrains Mono',monospace}
#skill-count{font-size:26px;font-weight:700;color:#00ff88;text-shadow:0 0 12px #00ff88;font-family:'JetBrains Mono',monospace}
#mmap{position:absolute;bottom:22px;right:22px;border-radius:8px;border:1px solid rgba(0,245,255,.15);background:rgba(0,0,0,.5)}
#scan{position:absolute;bottom:95px;left:50%;transform:translateX(-50%);width:190px;height:4px;border-radius:2px;background:rgba(0,255,136,.1);border:1px solid rgba(0,255,136,.2);overflow:hidden;opacity:0;transition:opacity .3s}
#scan.show{opacity:1}
#scan-fill{height:100%;width:0%;background:linear-gradient(90deg,#00ff88,#00f5ff);box-shadow:0 0 8px #00ff88;transition:width .08s}
#scan-label{position:absolute;bottom:105px;left:50%;transform:translateX(-50%);font-size:8px;letter-spacing:3px;color:#00ff8888;text-transform:uppercase;opacity:0;transition:opacity .3s;white-space:nowrap;font-family:'JetBrains Mono',monospace}
#scan-label.show{opacity:1}
#visited{position:absolute;bottom:22px;left:50%;transform:translateX(-50%);display:flex;gap:10px}
.vdot{width:7px;height:7px;border-radius:50%;border:1px solid rgba(255,255,255,.15);transition:all .4s}
.vdot.done{box-shadow:0 0 7px currentColor}

/* ── ZONE MODAL ── */
#modal-overlay{position:fixed;inset:0;z-index:50;background:rgba(4,6,14,.55);backdrop-filter:blur(10px);opacity:0;pointer-events:none;transition:opacity .35s}
#modal-overlay.show{opacity:1;pointer-events:all}
#modal{position:fixed;top:50%;left:50%;transform:translate(-50%,-54%);z-index:51;width:min(680px,92vw);max-height:82vh;background:linear-gradient(135deg,rgba(10,18,40,.97),rgba(4,6,14,.99));border:1px solid rgba(0,245,255,.15);border-radius:16px;overflow:hidden;box-shadow:0 0 60px rgba(0,0,0,.6);display:flex;flex-direction:column;opacity:0;pointer-events:none;transition:transform .35s,opacity .35s}
#modal.show{transform:translate(-50%,-50%);opacity:1;pointer-events:all}
#modal-hdr{display:flex;align-items:center;gap:14px;padding:18px 24px 14px;border-bottom:1px solid rgba(255,255,255,.05);flex-shrink:0}
#modal-icon{width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0}
#modal-title{font-size:14px;font-weight:700;letter-spacing:4px;text-transform:uppercase;flex:1;font-family:'JetBrains Mono',monospace}
#modal-sub{font-size:9px;letter-spacing:2px;color:#334155;text-transform:uppercase;margin-top:2px}
#modal-close{width:32px;height:32px;border-radius:6px;border:1px solid rgba(255,255,255,.08);background:transparent;color:#475569;font-size:14px;cursor:pointer;display:flex;align-items:center;justify-content:center;pointer-events:all;transition:all .2s;font-family:inherit}
#modal-close:hover{background:rgba(255,64,96,.15);border-color:rgba(255,64,96,.4);color:#ff4060}
#modal-body{padding:22px 24px;overflow-y:auto;flex:1;scrollbar-width:thin;scrollbar-color:#00f5ff22 transparent}
#modal-body::-webkit-scrollbar{width:4px}
#modal-body::-webkit-scrollbar-thumb{background:#00f5ff22;border-radius:2px}

/* modal content */
.m-para{font-size:13px;color:#94a3b8;line-height:1.8;margin-bottom:14px}
.m-section{margin-bottom:20px}
.m-heading{font-size:8px;letter-spacing:4px;color:#00f5ff55;text-transform:uppercase;margin-bottom:10px;font-family:'JetBrains Mono',monospace;display:flex;align-items:center;gap:8px}
.m-heading::after{content:'';flex:1;height:1px;background:rgba(0,245,255,.08)}
.m-card{background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);border-radius:10px;padding:14px 16px;margin-bottom:10px}
.m-card-title{font-size:13px;font-weight:600;color:#e2e8f0;margin-bottom:3px}
.m-card-sub{font-size:10px;color:#475569;letter-spacing:1px;margin-bottom:7px;font-family:'JetBrains Mono',monospace}
.m-card-body{font-size:12px;color:#64748b;line-height:1.7}
.pill-row{display:flex;flex-wrap:wrap;gap:7px;margin-top:6px}
.pill{padding:3px 11px;border-radius:20px;font-size:10px;font-weight:600;letter-spacing:1px;border:1px solid;font-family:'JetBrains Mono',monospace}
.p-c{color:#00f5ff;border-color:rgba(0,245,255,.25);background:rgba(0,245,255,.05)}
.p-p{color:#a855f7;border-color:rgba(168,85,247,.25);background:rgba(168,85,247,.05)}
.p-k{color:#f0abfc;border-color:rgba(240,171,252,.25);background:rgba(240,171,252,.05)}
.p-g{color:#00ff88;border-color:rgba(0,255,136,.25);background:rgba(0,255,136,.05)}
.p-a{color:#fbbf24;border-color:rgba(251,191,36,.25);background:rgba(251,191,36,.05)}
.m-link{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:6px;border:1px solid rgba(0,245,255,.2);color:#00f5ff;font-size:10px;letter-spacing:2px;text-decoration:none;background:rgba(0,245,255,.04);transition:all .2s;font-family:'JetBrains Mono',monospace;cursor:pointer}
.m-link:hover{background:rgba(0,245,255,.12);border-color:rgba(0,245,255,.4)}
.xp-row{display:flex;gap:12px;margin-bottom:14px}
.xp-dot{width:10px;height:10px;border-radius:50%;flex-shrink:0;margin-top:4px}
.xp-role{font-size:13px;font-weight:600;color:#e2e8f0}
.xp-place{font-size:10px;color:#475569;font-family:'JetBrains Mono',monospace;margin-bottom:5px;letter-spacing:1px}
.xp-pts{font-size:12px;color:#64748b;line-height:1.8}
.xp-pts span{display:block}
.proj-img{height:80px;border-radius:8px;margin-bottom:10px;display:flex;align-items:center;justify-content:center;font-size:34px;background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.05)}
.tech{display:inline-block;font-size:9px;padding:2px 7px;border-radius:3px;background:rgba(255,255,255,.04);color:#475569;font-family:'JetBrains Mono',monospace;border:1px solid rgba(255,255,255,.06);margin:2px}
.cf-field{display:flex;flex-direction:column;gap:5px;margin-bottom:12px}
.cf-field label{font-size:8px;letter-spacing:3px;color:#475569;text-transform:uppercase;font-family:'JetBrains Mono',monospace}
.cf-field input,.cf-field textarea{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);border-radius:6px;padding:10px 14px;font-size:13px;color:#e2e8f0;font-family:'Inter',sans-serif;outline:none;resize:none;transition:border-color .2s;pointer-events:all}
.cf-field input:focus,.cf-field textarea:focus{border-color:rgba(0,245,255,.3)}
.send-btn{width:100%;padding:12px;border-radius:7px;border:1px solid rgba(0,245,255,.3);background:rgba(0,245,255,.07);color:#00f5ff;font-size:10px;letter-spacing:4px;text-transform:uppercase;font-family:'JetBrains Mono',monospace;cursor:pointer;transition:all .3s;pointer-events:all;margin-top:6px}
.send-btn:hover{background:rgba(0,245,255,.18);box-shadow:0 0 20px rgba(0,245,255,.2)}
.toast{display:none;text-align:center;padding:10px;border-radius:6px;background:rgba(0,255,136,.08);border:1px solid rgba(0,255,136,.25);color:#00ff88;font-size:10px;letter-spacing:2px;font-family:'JetBrains Mono',monospace;margin-top:10px}
.toast.show{display:block}

/* ── START SCREEN ── */
#start-scr{position:fixed;inset:0;z-index:80;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:24px;background:radial-gradient(ellipse at center,rgba(0,12,30,.97) 0%,rgba(4,6,14,1) 70%);transition:opacity .5s}
.s-logo{font-size:56px;font-weight:800;letter-spacing:6px;background:linear-gradient(135deg,#00f5ff,#a855f7,#f0abfc);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1.05;text-align:center}
.s-sub{font-size:11px;color:#334155;letter-spacing:4px;font-family:'JetBrains Mono',monospace}
.s-hints{display:flex;gap:28px;flex-wrap:wrap;justify-content:center}
.s-hint{font-size:9px;color:#1e293b;letter-spacing:1px;font-family:'JetBrains Mono',monospace;display:flex;align-items:center;gap:6px}
.s-hint kbd{padding:2px 7px;border:1px solid #1e293b;border-radius:3px;color:#334155;font-family:'JetBrains Mono',monospace}
.enter-btn{padding:14px 58px;border-radius:6px;font-size:11px;letter-spacing:6px;text-transform:uppercase;cursor:pointer;border:1px solid #00f5ff;color:#00f5ff;background:rgba(0,245,255,.06);font-family:'JetBrains Mono',monospace;transition:all .3s}
.enter-btn:hover{background:rgba(0,245,255,.18);box-shadow:0 0 30px rgba(0,245,255,.35)}
#lock-cue{position:fixed;inset:0;z-index:75;display:none;align-items:center;justify-content:center;background:rgba(4,6,14,.7);backdrop-filter:blur(4px)}
#lock-cue.show{display:flex}
#lock-cue p{font-size:11px;color:#00f5ff66;letter-spacing:4px;font-family:'JetBrains Mono',monospace}
</style>
</head>
<body>
<canvas id="c"></canvas>

<div id="hud">
  <div id="zone-label">
    <div id="zone-name">Cyber Nexus</div>
    <div id="zone-desc">Walk to explore · Press E to interact</div>
  </div>
  <div id="xhair"></div>
  <div id="interact"><kbd>E</kbd><span>Open Terminal</span></div>
  <div id="skill-hud">
    <div id="skill-lbl">Skills Scanned</div>
    <div id="skill-count">0 / 18</div>
  </div>
  <canvas id="mmap" width="120" height="120"></canvas>
  <div id="scan"><div id="scan-fill"></div></div>
  <div id="scan-label">SCANNING</div>
  <div id="visited">
    <div class="vdot" id="vd-0"></div><div class="vdot" id="vd-1"></div>
    <div class="vdot" id="vd-2"></div><div class="vdot" id="vd-3"></div>
    <div class="vdot" id="vd-4"></div><div class="vdot" id="vd-5"></div>
  </div>
</div>

<div id="modal-overlay"></div>
<div id="modal">
  <div id="modal-hdr">
    <div id="modal-icon"></div>
    <div><div id="modal-title"></div><div id="modal-sub"></div></div>
    <button id="modal-close">✕</button>
  </div>
  <div id="modal-body"></div>
</div>

<div id="start-scr">
  <div style="display:flex;flex-direction:column;align-items:center;gap:8px">
    <div style="font-size:10px;letter-spacing:6px;color:#1e293b;font-family:'JetBrains Mono',monospace">INTERACTIVE PORTFOLIO</div>
    <div class="s-logo">Cyber<br>Nexus</div>
    <div class="s-sub">M. Rayyan Khan — Full Stack Developer</div>
  </div>
  <div class="s-hints">
    <div class="s-hint"><kbd>WASD</kbd> Walk</div>
    <div class="s-hint"><kbd>Mouse</kbd> Look around</div>
    <div class="s-hint"><kbd>E</kbd> Open terminal</div>
    <div class="s-hint"><kbd>ESC</kbd> Close / exit</div>
  </div>
  <button class="enter-btn" id="enter-btn">Enter Nexus</button>
  <div style="font-size:9px;color:#0f172a;letter-spacing:2px;font-family:'JetBrains Mono',monospace">6 ZONES TO DISCOVER · SKILLS TO COLLECT · FULLY 3D</div>
</div>

<div id="lock-cue"><p>Click to recapture mouse</p></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
'use strict';

/* ══════════════════════
   ZONE CONFIG
══════════════════════ */
const ZONES=[
  {id:0,key:'hero',       name:'HOME',       icon:'◈',col:0x00f5ff,css:'#00f5ff',px:0,   pz:0,   r:7},
  {id:1,key:'about',      name:'ABOUT',      icon:'◉',col:0xa855f7,css:'#a855f7',px:-24, pz:-22, r:6},
  {id:2,key:'experience', name:'EXPERIENCE', icon:'◆',col:0xf0abfc,css:'#f0abfc',px:24,  pz:-22, r:6},
  {id:3,key:'skills',     name:'SKILLS LAB', icon:'◎',col:0x00ff88,css:'#00ff88',px:0,   pz:-42, r:10},
  {id:4,key:'projects',   name:'PROJECTS',   icon:'◇',col:0xfbbf24,css:'#fbbf24',px:-24, pz:22,  r:6},
  {id:5,key:'contact',    name:'CONTACT',    icon:'⊡',col:0xff00ff,css:'#ff00ff',px:24,  pz:22,  r:6},
];

/* ══════════════════════
   MODAL CONTENT
══════════════════════ */
const CONTENT={
hero:`<div class="m-section" style="text-align:center;padding:10px 0 18px">
  <div style="font-size:44px;font-weight:800;background:linear-gradient(135deg,#00f5ff,#a855f7,#f0abfc);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1.1">M. Rayyan<br>M. Khan</div>
  <div style="font-size:10px;letter-spacing:5px;color:#475569;margin-top:10px;font-family:'JetBrains Mono',monospace">FULL STACK DEVELOPER</div>
  <p class="m-para" style="margin:16px auto 0;max-width:400px">Building immersive, scalable web experiences at the intersection of design and technology.</p>
</div>
<div class="m-section">
  <div class="m-heading">Links</div>
  <div style="display:flex;gap:10px;flex-wrap:wrap">
    <a class="m-link" href="mailto:mrm.khan.1298@gmail.com">✉ Email</a>
    <a class="m-link" href="https://github.com/khan1998" target="_blank">⌥ GitHub</a>
    <a class="m-link" href="#" target="_blank">◈ LinkedIn</a>
  </div>
</div>
<div class="m-section">
  <div class="m-heading">Explore the Nexus</div>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
    <div class="m-card"><b style="color:#a855f7">◉ ABOUT</b><br><span style="font-size:11px;color:#475569">Bio & Education</span></div>
    <div class="m-card"><b style="color:#f0abfc">◆ EXPERIENCE</b><br><span style="font-size:11px;color:#475569">Work History</span></div>
    <div class="m-card"><b style="color:#00ff88">◎ SKILLS LAB</b><br><span style="font-size:11px;color:#475569">18 Skills to collect</span></div>
    <div class="m-card"><b style="color:#fbbf24">◇ PROJECTS</b><br><span style="font-size:11px;color:#475569">Featured Work</span></div>
    <div class="m-card" style="grid-column:span 2"><b style="color:#ff00ff">⊡ CONTACT</b><br><span style="font-size:11px;color:#475569">Send a message</span></div>
  </div>
</div>`,

about:`<div class="m-section">
  <div class="m-heading">About Me</div>
  <p class="m-para">Hi! I'm Rayyan Khan, a Full Stack Developer passionate about crafting modern, performant web applications. I love combining clean backend architecture with expressive frontend experiences — from Laravel APIs to Three.js 3D worlds.</p>
  <div class="pill-row">
    <span class="pill p-c">Problem Solver</span><span class="pill p-p">UI/UX Enthusiast</span>
    <span class="pill p-k">3D Graphics</span><span class="pill p-g">Open Source</span>
  </div>
</div>
<div class="m-section">
  <div class="m-heading">Education</div>
  <div class="m-card">
    <div class="m-card-title">B.Sc. Computer Science &amp; Engineering</div>
    <div class="m-card-sub">University · 2020 — 2024</div>
    <div class="m-card-body">Algorithms, data structures, web systems, software engineering. Graduated with honours.</div>
  </div>
  <div class="m-card">
    <div class="m-card-title">Higher Secondary Certificate (HSC)</div>
    <div class="m-card-sub">Science Group · 2018 — 2020</div>
    <div class="m-card-body">Mathematics, Physics, Chemistry — strong analytical foundation.</div>
  </div>
</div>`,

experience:`<div class="m-section">
  <div class="m-heading">Work Experience</div>
  <div class="xp-row">
    <div class="xp-dot" style="background:#00f5ff;box-shadow:0 0 5px #00f5ff"></div>
    <div>
      <div class="xp-role">Full Stack Developer</div>
      <div class="xp-place">Tech Company · 2023 – Present</div>
      <div class="xp-pts">
        <span>→ Built scalable web apps with Laravel &amp; Vue.js</span>
        <span>→ Architected REST APIs serving 50K+ daily requests</span>
        <span>→ Reduced DB query time by 45% via optimization</span>
        <span>→ Led frontend migration from jQuery to Vue 3</span>
      </div>
    </div>
  </div>
  <div class="xp-row">
    <div class="xp-dot" style="background:#a855f7;box-shadow:0 0 5px #a855f7"></div>
    <div>
      <div class="xp-role">Web Developer (Freelance)</div>
      <div class="xp-place">Self-Employed · 2022 – 2023</div>
      <div class="xp-pts">
        <span>→ Delivered 12+ client projects: e-commerce, CMS, portfolios</span>
        <span>→ PHP, Laravel, React, MySQL, WordPress</span>
        <span>→ Integrated Stripe &amp; SSLCommerz payment gateways</span>
      </div>
    </div>
  </div>
  <div class="xp-row">
    <div class="xp-dot" style="background:#f0abfc;box-shadow:0 0 5px #f0abfc"></div>
    <div>
      <div class="xp-role">Junior Developer (Intern)</div>
      <div class="xp-place">Startup · Summer 2021</div>
      <div class="xp-pts">
        <span>→ Built internal dashboard tools for operations team</span>
        <span>→ Node.js, Express, MongoDB stack</span>
        <span>→ Improved team workflow efficiency by 30%</span>
      </div>
    </div>
  </div>
</div>`,

skills:`<div class="m-section">
  <p class="m-para" style="text-align:center;color:#475569">Walk through the glowing orbs in the Skills Lab to scan each skill interactively. Full list:</p>
</div>
<div class="m-section">
  <div class="m-heading">Languages</div>
  <div class="pill-row"><span class="pill p-c">PHP</span><span class="pill p-c">JavaScript</span><span class="pill p-c">TypeScript</span><span class="pill p-c">Python</span><span class="pill p-c">SQL</span><span class="pill p-c">HTML5</span><span class="pill p-c">CSS3</span></div>
</div>
<div class="m-section">
  <div class="m-heading">Frameworks &amp; Libraries</div>
  <div class="pill-row"><span class="pill p-p">Laravel</span><span class="pill p-p">Vue.js</span><span class="pill p-p">React</span><span class="pill p-p">Node.js</span><span class="pill p-p">Express</span><span class="pill p-p">Three.js</span><span class="pill p-p">Tailwind CSS</span></div>
</div>
<div class="m-section">
  <div class="m-heading">Databases &amp; Tools</div>
  <div class="pill-row"><span class="pill p-g">MySQL</span><span class="pill p-g">PostgreSQL</span><span class="pill p-g">MongoDB</span><span class="pill p-g">Redis</span><span class="pill p-a">Git</span><span class="pill p-a">Docker</span><span class="pill p-a">Linux</span><span class="pill p-a">Figma</span></div>
</div>`,

projects:`<div class="m-section">
  <div class="m-heading">Featured Projects</div>
  <div class="m-card">
    <div class="proj-img">🌐</div>
    <div class="m-card-title">Cyber Nexus Portfolio</div>
    <div class="m-card-sub">2024 · Personal Project</div>
    <div class="m-card-body">This very portfolio — a first-person 3D world built in Three.js. 6 interactive zones, collectible skill orbs, Web Audio, physics particles.</div>
    <div style="margin-top:8px"><span class="tech">Three.js</span><span class="tech">WebGL</span><span class="tech">Web Audio</span><span class="tech">Laravel</span></div>
  </div>
  <div class="m-card">
    <div class="proj-img">🛒</div>
    <div class="m-card-title">NexCart — E-Commerce Platform</div>
    <div class="m-card-sub">2023 · Client Project</div>
    <div class="m-card-body">Full-featured online store: product management, cart, Stripe &amp; SSLCommerz payments, order tracking, admin dashboard.</div>
    <div style="margin-top:8px"><span class="tech">Laravel</span><span class="tech">Vue.js</span><span class="tech">MySQL</span><span class="tech">Redis</span></div>
  </div>
  <div class="m-card">
    <div class="proj-img">📋</div>
    <div class="m-card-title">TaskFlow — Project Management</div>
    <div class="m-card-sub">2023 · Team Project</div>
    <div class="m-card-body">Kanban-style task manager with real-time WebSocket updates, team collaboration, file attachments, deadline tracking.</div>
    <div style="margin-top:8px"><span class="tech">React</span><span class="tech">Node.js</span><span class="tech">PostgreSQL</span><span class="tech">Socket.io</span></div>
  </div>
  <div class="m-card">
    <div class="proj-img">✍</div>
    <div class="m-card-title">BladePress — Blog CMS</div>
    <div class="m-card-sub">2022 · Open Source</div>
    <div class="m-card-body">Custom CMS with Markdown editor, tag system, SEO tools, comment moderation, multi-author support.</div>
    <div style="margin-top:8px"><span class="tech">PHP</span><span class="tech">Laravel</span><span class="tech">Alpine.js</span><span class="tech">MySQL</span></div>
  </div>
</div>`,

contact:`<div class="m-section">
  <div class="m-heading">Links</div>
  <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px">
    <a class="m-link" href="mailto:mrm.khan.1298@gmail.com">✉ mrm.khan.1298@gmail.com</a>
    <a class="m-link" href="https://github.com/khan1998" target="_blank">⌥ github.com/khan1998</a>
  </div>
</div>
<div class="m-section">
  <div class="m-heading">Send a Message</div>
  <div class="cf-field"><label>Name</label><input type="text" id="cf-name" placeholder="Your name"/></div>
  <div class="cf-field"><label>Email</label><input type="email" id="cf-email" placeholder="your@email.com"/></div>
  <div class="cf-field"><label>Message</label><textarea id="cf-msg" rows="4" placeholder="What's on your mind?"></textarea></div>
  <button class="send-btn" id="send-btn">Transmit Message</button>
  <div class="toast" id="toast">Message transmitted successfully ✓</div>
</div>`,
};

/* ══════════════════════
   THREE.JS SETUP
══════════════════════ */
const canvas=document.getElementById('c');
const renderer=new THREE.WebGLRenderer({canvas,antialias:true});
renderer.setPixelRatio(Math.min(devicePixelRatio,1.8));
renderer.setSize(innerWidth,innerHeight);
renderer.shadowMap.enabled=true;
renderer.shadowMap.type=THREE.PCFSoftShadowMap;
renderer.toneMapping=THREE.ACESFilmicToneMapping;
renderer.toneMappingExposure=1.05;
const scene=new THREE.Scene();
scene.background=new THREE.Color(0x04060e);
scene.fog=new THREE.FogExp2(0x04060e,.02);
const camera=new THREE.PerspectiveCamera(75,innerWidth/innerHeight,.1,180);
camera.position.set(0,1.7,6);
const clock=new THREE.Clock();
window.addEventListener('resize',()=>{camera.aspect=innerWidth/innerHeight;camera.updateProjectionMatrix();renderer.setSize(innerWidth,innerHeight);});

/* ══════════════════════
   AUDIO
══════════════════════ */
let aC;
function ga(){if(!aC)aC=new(window.AudioContext||window.webkitAudioContext)();if(aC.state==='suspended')aC.resume();return aC;}
function tone(f,tp,d,g=.12,dl=0){try{const c=ga(),at=c.currentTime+dl,o=c.createOscillator(),e=c.createGain();o.connect(e);e.connect(c.destination);o.type=tp;o.frequency.value=f;e.gain.setValueAtTime(0,at);e.gain.linearRampToValueAtTime(g,at+.01);e.gain.exponentialRampToValueAtTime(.0001,at+d);o.start(at);o.stop(at+d+.05);}catch(e){}}
const SFX={
  enter:()=>{[440,554,659].forEach((f,i)=>tone(f,'sine',.15,.1,i*.07));},
  collect:()=>{tone(660,'sine',.1,.14);tone(880,'sine',.08,.1,.08);},
  open:()=>{[220,330,440,554].forEach((f,i)=>tone(f,'sine',.12,.1,i*.06));},
  close:()=>tone(220,'sine',.1,.08),
  send:()=>{[440,660,880,1100].forEach((f,i)=>tone(f,'sine',.1,.12,i*.07));},
};
function startAmbient(){
  try{const c=ga();[[55,.06],[82,.04],[110,.025]].forEach(([f,g])=>{const o=c.createOscillator(),gn=c.createGain(),bf=c.createBiquadFilter();bf.type='lowpass';bf.frequency.value=280;o.connect(bf);bf.connect(gn);gn.connect(c.destination);o.type='sine';o.frequency.value=f;gn.gain.value=g;o.start();});}catch(e){}
}

/* ══════════════════════
   LIGHTS
══════════════════════ */
scene.add(new THREE.AmbientLight(0x08121e,5));
const sun=new THREE.DirectionalLight(0x6688cc,.5);
sun.position.set(10,30,10);sun.castShadow=true;
sun.shadow.mapSize.set(1024,1024);sun.shadow.camera.near=1;sun.shadow.camera.far=100;
[-50,50].forEach(v=>{sun.shadow.camera.left=sun.shadow.camera.bottom=v;sun.shadow.camera.right=sun.shadow.camera.top=-v;});
scene.add(sun);
const zoneLights=ZONES.map(z=>{const l=new THREE.PointLight(z.col,2,22);l.position.set(z.px,3,z.pz);scene.add(l);return l;});

/* ══════════════════════
   FLOOR
══════════════════════ */
(()=>{
  const cv=document.createElement('canvas');cv.width=cv.height=512;const c=cv.getContext('2d');
  c.fillStyle='#04080f';c.fillRect(0,0,512,512);
  c.strokeStyle='rgba(0,245,255,.07)';c.lineWidth=1;
  for(let i=0;i<=24;i++){const s=512/24,p=i*s;c.beginPath();c.moveTo(p,0);c.lineTo(p,512);c.stroke();c.beginPath();c.moveTo(0,p);c.lineTo(512,p);c.stroke();}
  c.fillStyle='rgba(0,245,255,.2)';
  for(let i=0;i<=24;i++)for(let j=0;j<=24;j++){c.beginPath();c.arc(i*512/24,j*512/24,1.1,0,Math.PI*2);c.fill();}
  const t=new THREE.CanvasTexture(cv);t.wrapS=t.wrapT=THREE.RepeatWrapping;t.repeat.set(5,5);
  const m=new THREE.Mesh(new THREE.PlaneGeometry(120,120),new THREE.MeshStandardMaterial({map:t,roughness:.95,metalness:.1,color:0x0a1525}));
  m.rotation.x=-Math.PI/2;m.receiveShadow=true;scene.add(m);
})();

/* ══════════════════════
   BOUNDARY WALLS
══════════════════════ */
const WALL=52;
const wm=new THREE.MeshStandardMaterial({color:0x060c1a,roughness:.9,metalness:.5,emissive:0x001122,emissiveIntensity:.4});
const em=new THREE.MeshBasicMaterial({color:0x00f5ff,transparent:true,opacity:.3});
[[true,WALL],[true,-WALL],[false,WALL],[false,-WALL]].forEach(([isZ,pos])=>{
  const w=new THREE.Mesh(new THREE.BoxGeometry(isZ?120:1,4,isZ?.5:120),wm);
  w.position.set(isZ?0:pos,2,isZ?pos:0);w.castShadow=true;scene.add(w);
  const e=new THREE.Mesh(new THREE.BoxGeometry(isZ?120:.05,0.05,isZ?.05:120),em);
  e.position.set(isZ?0:pos,.02,isZ?pos:0);scene.add(e);
});

/* ══════════════════════
   ZONE STRUCTURES
══════════════════════ */
function makeLabel(txt,col){
  const cv=document.createElement('canvas');cv.width=200;cv.height=48;
  const c=cv.getContext('2d');const hc=new THREE.Color(col);
  c.clearRect(0,0,200,48);
  c.font='bold 18px JetBrains Mono, monospace';c.textAlign='center';c.textBaseline='middle';
  c.fillStyle=`rgb(${Math.round(hc.r*255)},${Math.round(hc.g*255)},${Math.round(hc.b*255)})`;
  c.fillText(txt,100,24);
  const t=new THREE.CanvasTexture(cv);t.minFilter=THREE.LinearFilter;t.generateMipmaps=false;
  const m=new THREE.Mesh(new THREE.PlaneGeometry(2.5,.6),new THREE.MeshBasicMaterial({map:t,transparent:true,side:THREE.DoubleSide,depthWrite:false}));
  return m;
}

function makeBeacon(z){
  const g=new THREE.Group();
  const shaft=new THREE.Mesh(new THREE.CylinderGeometry(.04,.04,9,8),new THREE.MeshBasicMaterial({color:z.col,transparent:true,opacity:.65}));
  shaft.position.y=4.5;g.add(shaft);
  const orb=new THREE.Mesh(new THREE.SphereGeometry(.22,12,12),new THREE.MeshBasicMaterial({color:z.col}));
  orb.position.y=9.2;g.userData.orb=orb;g.add(orb);
  const ring=new THREE.Mesh(new THREE.TorusGeometry(.5,.04,8,32),new THREE.MeshBasicMaterial({color:z.col,transparent:true,opacity:.5}));
  ring.rotation.x=Math.PI/2;ring.position.y=9.2;g.userData.ring=ring;g.add(ring);
  const gl=new THREE.PointLight(z.col,2,8);gl.position.y=9;g.add(gl);
  return g;
}

// Hero zone
function buildHero(){
  const g=new THREE.Group();
  const ob=new THREE.Mesh(new THREE.BoxGeometry(2.2,7.5,2.2),new THREE.MeshStandardMaterial({color:0x0a1530,roughness:.3,metalness:.95,emissive:0x001133,emissiveIntensity:.6}));
  ob.position.y=3.75;ob.castShadow=true;g.add(ob);
  const ed=new THREE.LineSegments(new THREE.EdgesGeometry(new THREE.BoxGeometry(2.2,7.5,2.2)),new THREE.LineBasicMaterial({color:0x00f5ff,transparent:true,opacity:.6}));
  ed.position.y=3.75;g.add(ed);
  [4.5,7].forEach((r,i)=>{
    const rg=new THREE.Mesh(new THREE.TorusGeometry(r,.05,8,64),new THREE.MeshBasicMaterial({color:0x00f5ff,transparent:true,opacity:.35-i*.1}));
    rg.rotation.x=Math.PI/2;rg.position.y=.05;g.userData['ring'+i]=rg;g.add(rg);
  });
  // Name canvas
  const cv=document.createElement('canvas');cv.width=512;cv.height=150;const c=cv.getContext('2d');
  const gr=c.createLinearGradient(0,0,512,0);gr.addColorStop(0,'#00f5ff');gr.addColorStop(.5,'#a855f7');gr.addColorStop(1,'#f0abfc');
  c.fillStyle=gr;c.font='bold 52px Inter, sans-serif';c.textAlign='center';c.textBaseline='middle';c.fillText('RAYYAN KHAN',256,55);
  c.font='300 16px JetBrains Mono, monospace';c.fillStyle='rgba(71,85,105,.9)';c.letterSpacing='5px';c.fillText('FULL STACK DEVELOPER',256,105);
  const t=new THREE.CanvasTexture(cv);t.minFilter=THREE.LinearFilter;t.generateMipmaps=false;
  const p=new THREE.Mesh(new THREE.PlaneGeometry(6.5,1.95),new THREE.MeshBasicMaterial({map:t,transparent:true,side:THREE.DoubleSide,depthWrite:false}));
  p.position.set(0,9.5,-3.5);g.add(p);
  g.position.set(0,0,0);scene.add(g);return g;
}

// About zone
function buildAbout(){
  const g=new THREE.Group();
  const dk=new THREE.Mesh(new THREE.BoxGeometry(5.5,.25,2.2),new THREE.MeshStandardMaterial({color:0x0a1530,roughness:.5,metalness:.8,emissive:0x001133,emissiveIntensity:.3}));
  dk.position.y=1.1;g.add(dk);
  [-1.4,1.4].forEach(x=>{
    const mn=new THREE.Mesh(new THREE.BoxGeometry(1.9,1.35,.08),new THREE.MeshStandardMaterial({color:0x050d1f,roughness:.3,metalness:.9,emissive:0xa855f7,emissiveIntensity:.25}));
    mn.position.set(x,2.1,-.4);mn.rotation.x=-.18;g.add(mn);
  });
  for(let i=0;i<4;i++){
    const bk=new THREE.Mesh(new THREE.BoxGeometry(.35,.06,.28),new THREE.MeshStandardMaterial({color:[0xa855f7,0x00f5ff,0xf0abfc,0x00ff88][i],emissive:[0xa855f7,0x00f5ff,0xf0abfc,0x00ff88][i],emissiveIntensity:.5,roughness:.5}));
    bk.position.set(Math.sin(i/4*Math.PI*2)*2.5,2.6,Math.cos(i/4*Math.PI*2)*2.5);
    bk.userData={fi:i,by:bk.position.y};g.userData['bk'+i]=bk;g.add(bk);
  }
  const lb=makeLabel('ABOUT',0xa855f7);lb.position.set(0,5.5,0);g.add(lb);
  g.position.set(-24,0,-22);scene.add(g);return g;
}

// Experience zone
function buildExperience(){
  const g=new THREE.Group();
  const hs=[3.5,5,2.8,4.2];
  const cs=[0x00f5ff,0xa855f7,0xf0abfc,0x334155];
  hs.forEach((h,i)=>{
    const x=(i-1.5)*1.8;
    const p=new THREE.Mesh(new THREE.CylinderGeometry(.3,.38,h,8),new THREE.MeshStandardMaterial({color:0x0a1530,roughness:.4,metalness:.9,emissive:0x001133,emissiveIntensity:.3}));
    p.position.set(x,h/2,0);g.add(p);
    const cp=new THREE.Mesh(new THREE.CylinderGeometry(.36,.36,.1,8),new THREE.MeshBasicMaterial({color:cs[i]}));
    cp.position.set(x,h,0);g.add(cp);
    const gl=new THREE.PointLight(cs[i],.8,4);gl.position.set(x,h+.5,0);g.add(gl);
  });
  const pts=[new THREE.Vector3(-2.7,.1,0),new THREE.Vector3(-0.9,.1,0),new THREE.Vector3(.9,.1,0),new THREE.Vector3(2.7,.1,0)];
  const ln=new THREE.Line(new THREE.BufferGeometry().setFromPoints(pts),new THREE.LineBasicMaterial({color:0xf0abfc,transparent:true,opacity:.4}));
  g.add(ln);
  const lb=makeLabel('EXPERIENCE',0xf0abfc);lb.position.set(0,7,0);g.add(lb);
  g.position.set(24,0,-22);scene.add(g);return g;
}

// Skills zone
const skillOrbs=[],SKILL_NAMES=['PHP','Laravel','JavaScript','Vue.js','React','Node.js','TypeScript','MySQL','PostgreSQL','MongoDB','Docker','Git','Linux','REST API','Three.js','Tailwind','Redis','Python'];
function buildSkills(){
  const g=new THREE.Group();
  const core=new THREE.Mesh(new THREE.IcosahedronGeometry(1.1,1),new THREE.MeshBasicMaterial({color:0x00ff88,transparent:true,opacity:.12,wireframe:true}));
  g.add(core);g.userData.core=core;
  const cgl=new THREE.PointLight(0x00ff88,3,14);g.add(cgl);g.userData.cgl=cgl;
  SKILL_NAMES.forEach((sk,i)=>{
    const a=i/SKILL_NAMES.length*Math.PI*2;
    const r=i<9?5.5:9;const y=i<9?1.9:.9;
    const col=[0x00f5ff,0xa855f7,0xf0abfc,0x00ff88,0xfbbf24][i%5];
    const og=new THREE.Group();
    const orb=new THREE.Mesh(new THREE.SphereGeometry(.36,12,12),new THREE.MeshStandardMaterial({color:col,emissive:col,emissiveIntensity:.75,roughness:.2,metalness:.6}));
    og.add(orb);
    const ogl=new THREE.PointLight(col,.7,3);og.add(ogl);
    const cv=document.createElement('canvas');cv.width=128;cv.height=40;const c=cv.getContext('2d');
    const hc=new THREE.Color(col);c.fillStyle=`rgb(${Math.round(hc.r*255)},${Math.round(hc.g*255)},${Math.round(hc.b*255)})`;
    c.font='bold 12px JetBrains Mono, monospace';c.textAlign='center';c.textBaseline='middle';c.fillText(sk,64,20);
    const t=new THREE.CanvasTexture(cv);t.minFilter=THREE.LinearFilter;t.generateMipmaps=false;
    const lp=new THREE.Mesh(new THREE.PlaneGeometry(1.1,.34),new THREE.MeshBasicMaterial({map:t,transparent:true,side:THREE.DoubleSide,depthWrite:false}));
    lp.position.y=.62;og.add(lp);
    og.position.set(Math.cos(a)*r,y,Math.sin(a)*r);
    og.userData={sk,col,collected:false,ba:a,r,y,ring:i<9?0:1};
    g.add(og);skillOrbs.push(og);
  });
  const lb=makeLabel('SKILLS LAB',0x00ff88);lb.position.set(0,7,0);g.add(lb);
  g.position.set(0,0,-42);scene.add(g);return g;
}

// Projects zone
function buildProjects(){
  const g=new THREE.Group();
  [{x:-2.5,z:-.3,ry:.35,t:'NexCart',ic:'🛒'},{x:0,z:-1.3,ry:0,t:'TaskFlow',ic:'📋'},{x:2.5,z:-.3,ry:-.35,t:'BladePress',ic:'✍'}].forEach(({x,z,ry,t,ic})=>{
    const fr=new THREE.Mesh(new THREE.BoxGeometry(2.8,3.6,.1),new THREE.MeshStandardMaterial({color:0x060d1a,roughness:.3,metalness:.9,emissive:0xfbbf24,emissiveIntensity:.07}));
    fr.position.set(x,1.8,z);fr.rotation.y=ry;fr.castShadow=true;g.add(fr);
    const ed=new THREE.LineSegments(new THREE.EdgesGeometry(new THREE.BoxGeometry(2.8,3.6,.1)),new THREE.LineBasicMaterial({color:0xfbbf24,transparent:true,opacity:.4}));
    ed.position.set(x,1.8,z);ed.rotation.y=ry;g.add(ed);
    const cv=document.createElement('canvas');cv.width=210;cv.height=290;const c=cv.getContext('2d');
    c.fillStyle='rgba(6,13,26,.95)';c.fillRect(0,0,210,290);
    c.font='36px Arial';c.textAlign='center';c.fillText(ic,105,65);
    c.font='bold 15px JetBrains Mono, monospace';c.fillStyle='#fbbf24';c.fillText(t,105,105);
    c.font='10px Inter, sans-serif';c.fillStyle='rgba(100,116,139,.8)';c.fillText('Press E for details',105,132);
    const tx=new THREE.CanvasTexture(cv);tx.minFilter=THREE.LinearFilter;tx.generateMipmaps=false;
    const pn=new THREE.Mesh(new THREE.PlaneGeometry(2.55,3.3),new THREE.MeshBasicMaterial({map:tx,transparent:true}));
    pn.position.set(x,1.8,z+.06);pn.rotation.y=ry;g.add(pn);
  });
  const lb=makeLabel('PROJECTS',0xfbbf24);lb.position.set(0,5.8,0);g.add(lb);
  g.position.set(-24,0,22);scene.add(g);return g;
}

// Contact zone
function buildContact(){
  const g=new THREE.Group();
  const bd=new THREE.Mesh(new THREE.BoxGeometry(3.2,3.8,.42),new THREE.MeshStandardMaterial({color:0x060d1a,roughness:.35,metalness:.92,emissive:0xff00ff,emissiveIntensity:.07}));
  bd.position.set(0,1.9,0);g.add(bd);
  const ed=new THREE.LineSegments(new THREE.EdgesGeometry(new THREE.BoxGeometry(3.2,3.8,.42)),new THREE.LineBasicMaterial({color:0xff00ff,transparent:true,opacity:.45}));
  ed.position.set(0,1.9,0);g.add(ed);
  const cv=document.createElement('canvas');cv.width=256;cv.height=320;const c=cv.getContext('2d');
  c.fillStyle='rgba(4,6,14,.92)';c.fillRect(0,0,256,320);
  c.font='bold 13px JetBrains Mono, monospace';c.fillStyle='#ff00ff';c.textAlign='center';c.fillText('>> COMMS TERMINAL <<',128,36);
  c.font='10px JetBrains Mono, monospace';c.fillStyle='rgba(168,85,247,.8)';
  ['mrm.khan.1298@gmail.com','github.com/khan1998','','PRESS E TO TRANSMIT'].forEach((l,i)=>c.fillText(l,128,80+i*28));
  const t=new THREE.CanvasTexture(cv);t.minFilter=THREE.LinearFilter;t.generateMipmaps=false;
  const sc=new THREE.Mesh(new THREE.PlaneGeometry(2.9,3.3),new THREE.MeshBasicMaterial({map:t,transparent:true}));
  sc.position.set(0,1.9,.22);g.add(sc);
  const kb=new THREE.Mesh(new THREE.BoxGeometry(2.4,.07,1),new THREE.MeshStandardMaterial({color:0x0a1530,roughness:.5,metalness:.8,emissive:0xff00ff,emissiveIntensity:.1}));
  kb.position.set(0,.03,.9);g.add(kb);
  const gl=new THREE.PointLight(0xff00ff,1.5,8);gl.position.set(0,3,.5);g.add(gl);
  const lb=makeLabel('CONTACT',0xff00ff);lb.position.set(0,5.8,0);g.add(lb);
  g.position.set(24,0,22);scene.add(g);return g;
}

/* ══════════════════════
   AMBIENT DECOR
══════════════════════ */
const ambMeshes=[];
function buildAmbient(){
  const gs=[new THREE.IcosahedronGeometry(.4,0),new THREE.OctahedronGeometry(.35,0),new THREE.TetrahedronGeometry(.32,0)];
  const mat=new THREE.MeshStandardMaterial({color:0x0a1530,roughness:.5,metalness:.8,emissive:0x001133,emissiveIntensity:.25});
  for(let i=0;i<20;i++){
    const m=new THREE.Mesh(gs[i%3],mat.clone());
    const a=Math.random()*Math.PI*2,r=22+Math.random()*24;
    m.position.set(Math.cos(a)*r,5+Math.random()*6,Math.sin(a)*r);
    m.userData={ry:(Math.random()-.5)*.8,rx:(Math.random()-.5)*.3,fp:Math.random()*Math.PI*2,by:m.position.y};
    scene.add(m);ambMeshes.push(m);
  }
  ZONES.slice(1).forEach(z=>{
    const pts=[new THREE.Vector3(0,.01,0),new THREE.Vector3(z.px*.5,.01,z.pz*.5),new THREE.Vector3(z.px,.01,z.pz)];
    const curve=new THREE.CatmullRomCurve3(pts);
    const l=new THREE.Line(new THREE.BufferGeometry().setFromPoints(curve.getPoints(30)),new THREE.LineBasicMaterial({color:z.col,transparent:true,opacity:.1}));
    scene.add(l);
  });
}

/* ══════════════════════
   PARTICLES
══════════════════════ */
const MP=400,pp=new Float32Array(MP*3),pc=new Float32Array(MP*3),pv=[],pl=new Float32Array(MP);
for(let i=0;i<MP;i++){pp[i*3]=9999;pv.push(new THREE.Vector3());}
const pGeo=new THREE.BufferGeometry();
pGeo.setAttribute('position',new THREE.BufferAttribute(pp,3));
pGeo.setAttribute('color',   new THREE.BufferAttribute(pc,3));
const pPts=new THREE.Points(pGeo,new THREE.PointsMaterial({size:.17,vertexColors:true,transparent:true,opacity:.8,blending:THREE.AdditiveBlending,depthWrite:false,sizeAttenuation:true}));
scene.add(pPts);

function burst(x,y,z,col,n=20,spd=2){
  const c=new THREE.Color(col);let s=0;
  for(let i=0;i<MP&&s<n;i++){
    if(pl[i]<=0){
      pp[i*3]=x;pp[i*3+1]=y;pp[i*3+2]=z;
      pc[i*3]=c.r*.8;pc[i*3+1]=c.g*.8;pc[i*3+2]=c.b*.8;
      const sp=spd*(1+Math.random()),th=Math.random()*Math.PI*2,ph=Math.random()*Math.PI;
      pv[i].set(Math.sin(ph)*Math.cos(th)*sp,Math.cos(ph)*sp*.5+.2,Math.sin(ph)*Math.sin(th)*sp);
      pl[i]=.5+Math.random()*.7;s++;
    }
  }
}

function updateParticles(dt){
  for(let i=0;i<MP;i++){
    if(pl[i]>0){pl[i]-=dt;if(pl[i]<=0)pp[i*3]=9999;else{pp[i*3]+=pv[i].x*dt;pp[i*3+1]+=pv[i].y*dt;pp[i*3+2]+=pv[i].z*dt;pv[i].y-=.5*dt;}}
  }
  pGeo.attributes.position.needsUpdate=true;
}

let ambPT=0;
function ambientParticles(t){
  ambPT+=1;if(ambPT%8!==0) return;
  const z=ZONES[Math.floor(Math.random()*ZONES.length)];
  for(let i=0;i<MP;i++){
    if(pl[i]<=0){
      pp[i*3]=z.px+(Math.random()-.5)*5;pp[i*3+1]=.1;pp[i*3+2]=z.pz+(Math.random()-.5)*5;
      const c=new THREE.Color(z.col);pc[i*3]=c.r*.25;pc[i*3+1]=c.g*.25;pc[i*3+2]=c.b*.25;
      pv[i].set((Math.random()-.5)*.2,.4+Math.random()*.4,(Math.random()-.5)*.2);
      pl[i]=1.5+Math.random()*2;break;
    }
  }
}

/* ══════════════════════
   PLAYER + CONTROLS
══════════════════════ */
const player={pos:new THREE.Vector3(0,1.7,6),yaw:0,pitch:0,spd:6.5};
const keys={w:false,a:false,s:false,d:false};
let locked=false,inModal=false,started=false,nearZone=null;
const visited=new Set();
const scannedSkills=new Set();

canvas.addEventListener('click',()=>{if(started&&!inModal)canvas.requestPointerLock();});
document.addEventListener('pointerlockchange',()=>{
  locked=document.pointerLockElement===canvas;
  document.getElementById('lock-cue').classList.toggle('show',!locked&&started&&!inModal);
});
document.addEventListener('mousemove',e=>{
  if(!locked||inModal) return;
  player.yaw-=e.movementX*.0022;
  player.pitch=Math.max(-Math.PI*.32,Math.min(Math.PI*.32,player.pitch-e.movementY*.0022));
});
document.addEventListener('keydown',e=>{
  if(e.code==='KeyW'||e.code==='ArrowUp')   keys.w=true;
  if(e.code==='KeyS'||e.code==='ArrowDown') keys.s=true;
  if(e.code==='KeyA'||e.code==='ArrowLeft') keys.a=true;
  if(e.code==='KeyD'||e.code==='ArrowRight')keys.d=true;
  if(e.code==='KeyE'&&!inModal) tryInteract();
  if(e.code==='Escape'&&inModal) closeModal();
});
document.addEventListener('keyup',e=>{
  if(e.code==='KeyW'||e.code==='ArrowUp')   keys.w=false;
  if(e.code==='KeyS'||e.code==='ArrowDown') keys.s=false;
  if(e.code==='KeyA'||e.code==='ArrowLeft') keys.a=false;
  if(e.code==='KeyD'||e.code==='ArrowRight')keys.d=false;
});

function movePlayer(dt){
  if(inModal) return;
  const fwd=new THREE.Vector3(-Math.sin(player.yaw),0,-Math.cos(player.yaw));
  const rgt=new THREE.Vector3(fwd.z,0,-fwd.x);
  const vel=new THREE.Vector3();
  if(keys.w) vel.addScaledVector(fwd,1);
  if(keys.s) vel.addScaledVector(fwd,-1);
  if(keys.a) vel.addScaledVector(rgt,-1);
  if(keys.d) vel.addScaledVector(rgt,1);
  if(vel.lengthSq()>0) vel.normalize().multiplyScalar(player.spd*dt);
  player.pos.add(vel);
  const W=WALL-1.5;
  player.pos.x=Math.max(-W,Math.min(W,player.pos.x));
  player.pos.z=Math.max(-W,Math.min(W,player.pos.z));
  camera.position.copy(player.pos);
  camera.quaternion.setFromEuler(new THREE.Euler(player.pitch,player.yaw,0,'YXZ'));
}

/* ══════════════════════
   ZONE DETECTION
══════════════════════ */
function detectZone(){
  let best=null,bestD=Infinity;
  ZONES.forEach(z=>{
    const d=Math.hypot(player.pos.x-z.px,player.pos.z-z.pz);
    if(d<bestD){bestD=d;best=z;}
  });
  return{zone:best,dist:bestD};
}

function updateZoneHUD(zone,dist){
  if(!nearZone||nearZone.id!==zone.id){
    nearZone=zone;
    document.getElementById('zone-name').textContent=zone.name;
    document.getElementById('zone-name').style.color=zone.css;
    document.getElementById('zone-desc').textContent=zone.id===3?'Walk through orbs to scan skills':'Approach · Press E to open terminal';
    SFX.enter();
    if(!visited.has(zone.id)){
      visited.add(zone.id);
      const dot=document.getElementById('vd-'+zone.id);
      if(dot){dot.classList.add('done');dot.style.background=zone.css;dot.style.borderColor=zone.css;dot.style.color=zone.css;}
    }
  }
  const canInt=dist<zone.r&&zone.id!==3;
  document.getElementById('interact').classList.toggle('show',canInt&&!inModal);
}

/* ══════════════════════
   MODAL
══════════════════════ */
function openModal(zone){
  inModal=true;
  document.exitPointerLock();
  document.getElementById('lock-cue').classList.remove('show');
  document.getElementById('interact').classList.remove('show');
  const ic=document.getElementById('modal-icon');
  ic.textContent=zone.icon;ic.style.background=zone.css+'22';ic.style.border=`1px solid ${zone.css}44`;ic.style.color=zone.css;
  document.getElementById('modal-title').textContent=zone.name;document.getElementById('modal-title').style.color=zone.css;
  document.getElementById('modal-sub').textContent='Zone '+String(zone.id+1).padStart(2,'0')+' / 06';
  document.getElementById('modal-body').innerHTML=CONTENT[zone.key]||'';
  document.getElementById('modal-overlay').classList.add('show');
  document.getElementById('modal').classList.add('show');
  SFX.open();burst(zone.px,1.5,zone.pz,zone.col,35,2.5);
  if(zone.key==='contact'){
    setTimeout(()=>{
      const btn=document.getElementById('send-btn');
      if(btn) btn.onclick=()=>{
        const n=document.getElementById('cf-name')?.value;
        const e=document.getElementById('cf-email')?.value;
        const m=document.getElementById('cf-msg')?.value;
        if(n&&e&&m){SFX.send();burst(zone.px,1.5,zone.pz,zone.col,50,3);document.getElementById('toast').classList.add('show');document.getElementById('cf-name').value='';document.getElementById('cf-email').value='';document.getElementById('cf-msg').value='';}
      };
    },80);
  }
}

function closeModal(){
  inModal=false;
  document.getElementById('modal-overlay').classList.remove('show');
  document.getElementById('modal').classList.remove('show');
  SFX.close();
  setTimeout(()=>{if(!inModal&&started)canvas.requestPointerLock();},200);
}

document.getElementById('modal-overlay').addEventListener('click',closeModal);
document.getElementById('modal-close').addEventListener('click',closeModal);

/* ══════════════════════
   INTERACT
══════════════════════ */
function tryInteract(){
  if(!nearZone||nearZone.id===3) return;
  const d=Math.hypot(player.pos.x-nearZone.px,player.pos.z-nearZone.pz);
  if(d>nearZone.r) return;
  openModal(nearZone);
}

/* ══════════════════════
   SKILL COLLECTION
══════════════════════ */
let scanningOrb=null,scanProg=0;
function updateSkillOrbs(t,dt){
  const sz=ZONES[3];
  const inSZ=Math.hypot(player.pos.x-sz.px,player.pos.z-sz.pz)<sz.r+4;
  skillOrbs.forEach(og=>{
    const a=og.userData.ba+t*(og.userData.ring===0?.42:.26);
    og.position.x=Math.cos(a)*og.userData.r;
    og.position.z=Math.sin(a)*og.userData.r;
    og.position.y=og.userData.y+Math.sin(t*1.5+og.userData.ba)*.3;
    og.children[0].rotation.y+=dt*1.6;
    const wp=new THREE.Vector3();og.getWorldPosition(wp);
    const d=player.pos.distanceTo(wp);
    if(d<2.2&&!og.userData.collected&&inSZ){
      if(scanningOrb!==og){scanningOrb=og;scanProg=0;document.getElementById('scan').classList.add('show');document.getElementById('scan-label').classList.add('show');document.getElementById('scan-label').textContent='SCANNING '+og.userData.sk;}
      scanProg=Math.min(1,scanProg+dt*1.4);
      document.getElementById('scan-fill').style.width=(scanProg*100)+'%';
      if(scanProg>=1){
        og.userData.collected=true;scannedSkills.add(og.userData.sk);
        og.children[0].material.opacity=.2;og.children[0].material.transparent=true;
        burst(wp.x,wp.y,wp.z,og.userData.col,28,2.5);SFX.collect();
        document.getElementById('skill-count').textContent=scannedSkills.size+' / '+SKILL_NAMES.length;
        scanningOrb=null;scanProg=0;document.getElementById('scan').classList.remove('show');document.getElementById('scan-label').classList.remove('show');
      }
    } else if(scanningOrb===og&&d>=2.2){scanningOrb=null;scanProg=0;document.getElementById('scan').classList.remove('show');document.getElementById('scan-label').classList.remove('show');}
  });
}

/* ══════════════════════
   MINIMAP
══════════════════════ */
const mmCv=document.getElementById('mmap');
const mmCtx=mmCv.getContext('2d');
function drawMinimap(){
  mmCtx.clearRect(0,0,120,120);
  const S=120/105,OX=60,OZ=60;
  const toMM=(x,z)=>[OX+x*S,OZ+z*S];
  mmCtx.fillStyle='rgba(4,8,18,.85)';mmCtx.fillRect(0,0,120,120);
  ZONES.forEach(z=>{
    const[mx,mz]=toMM(z.px,z.pz);
    mmCtx.fillStyle=z.css+'55';mmCtx.beginPath();mmCtx.arc(mx,mz,z.r*.4,0,Math.PI*2);mmCtx.fill();
    mmCtx.fillStyle=z.css+'aa';mmCtx.beginPath();mmCtx.arc(mx,mz,3.5,0,Math.PI*2);mmCtx.fill();
  });
  const[px,pz]=toMM(player.pos.x,player.pos.z);
  mmCtx.fillStyle='#ffffff';mmCtx.beginPath();mmCtx.arc(px,pz,3,0,Math.PI*2);mmCtx.fill();
  const dx=-Math.sin(player.yaw)*7,dz=-Math.cos(player.yaw)*7;
  mmCtx.strokeStyle='#ffffff77';mmCtx.lineWidth=1.5;mmCtx.beginPath();mmCtx.moveTo(px,pz);mmCtx.lineTo(px+dx,pz+dz);mmCtx.stroke();
  mmCtx.strokeStyle='rgba(0,245,255,.1)';mmCtx.lineWidth=1;mmCtx.strokeRect(.5,.5,119,119);
}

/* ══════════════════════
   INIT + LOOP
══════════════════════ */
document.getElementById('enter-btn').addEventListener('click',()=>{
  ga();startAmbient();
  const ss=document.getElementById('start-scr');
  ss.style.opacity='0';ss.style.transition='opacity .5s';
  setTimeout(()=>ss.style.display='none',500);
  started=true;
  setTimeout(()=>canvas.requestPointerLock(),600);
});

document.fonts.ready.then(()=>{
  buildHero();buildAbout();buildExperience();buildSkills();buildProjects();buildContact();
  ZONES.forEach(z=>{const b=makeBeacon(z);b.position.set(z.px,0,z.pz);scene.add(b);});
  buildAmbient();
});

camera.position.copy(player.pos);
let frameN=0;
function loop(){
  requestAnimationFrame(loop);
  const dt=Math.min(clock.getDelta(),.04);
  const t=clock.elapsedTime;
  frameN++;
  if(!started){renderer.render(scene,camera);return;}
  movePlayer(dt);
  updateParticles(dt);ambientParticles(t);
  const{zone,dist}=detectZone();
  if(zone) updateZoneHUD(zone,dist);
  updateSkillOrbs(t,dt);
  ambMeshes.forEach(m=>{m.rotation.y+=m.userData.ry*dt;m.rotation.x+=m.userData.rx*dt;m.position.y=m.userData.by+Math.sin(t*.7+m.userData.fp)*.5;});
  zoneLights.forEach((l,i)=>{l.intensity=1.6+Math.sin(t*1.1+i*.9)*.5;});
  if(frameN%3===0) drawMinimap();
  renderer.render(scene,camera);
}
loop();
</script>
</body>
</html>
