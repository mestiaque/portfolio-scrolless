<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan | Smart City Dashboard Portfolio</title>
<meta name="description" content="Dashboard-style portfolio of M. Estiaque Ahmed Khan, a Full-Stack Laravel Developer. Explore skills analytics, live project monitoring systems, and a city-development experience timeline." />
<meta name="theme-color" content="#05070d" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

<style>
/* ============================= RESET & BASE ============================= */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }
:root {
  --bg: #05070d;
  --bg-alt: #080b16;
  --bg-elev: #0b0f1c;
  --panel: rgba(255,255,255,0.045);
  --panel-strong: rgba(255,255,255,0.07);
  --border: rgba(255,255,255,0.09);
  --border-strong: rgba(255,255,255,0.18);
  --cyan: #22d3ee;
  --cyan-dim: rgba(34,211,238,0.15);
  --violet: #a78bfa;
  --violet-dim: rgba(167,139,250,0.15);
  --amber: #fbbf24;
  --pink: #f472b6;
  --green: #34d399;
  --red: #f87171;
  --text: #e9eefb;
  --text-muted: #94a3bd;
  --text-dim: #59698a;
  --text-dim2: #59698a;
  --radius: 18px;
  --radius-sm: 10px;
  --font-head: 'Space Grotesk', sans-serif;
  --font-body: 'Inter', sans-serif;
  --font-mono: 'JetBrains Mono', monospace;
  --ease: cubic-bezier(0.16, 1, 0.3, 1);
}
body {
  font-family: var(--font-body);
  background: var(--bg);
  color: var(--text);
  overflow-x: hidden;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
}
img, svg, canvas { display: block; max-width: 100%; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; }
button, input, textarea { font-family: inherit; color: inherit; }
h1, h2, h3, h4 { font-family: var(--font-head); font-weight: 600; line-height: 1.15; }

/* focus states */
a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible {
  outline: 2px solid var(--cyan);
  outline-offset: 3px;
  border-radius: 4px;
}

.skip-link {
  position: absolute; left: -9999px; top: 0; z-index: 999;
  background: var(--cyan); color: #04121a; padding: 10px 18px;
  font-weight: 700; border-radius: 0 0 8px 0;
}
.skip-link:focus { left: 0; }

/* ============================= UTILITIES ============================= */
.container { max-width: 1240px; margin: 0 auto; padding: 0 24px; }
.section { position: relative; padding: 120px 0 90px; z-index: 2; }
.section-head { max-width: 720px; margin: 0 auto 56px; text-align: center; }
.eyebrow {
  display: inline-flex; align-items: center; gap: 8px;
  font-family: var(--font-mono); font-size: 0.72rem; letter-spacing: 0.28em;
  text-transform: uppercase; color: var(--cyan);
  background: var(--cyan-dim); border: 1px solid rgba(34,211,238,0.3);
  padding: 6px 14px; border-radius: 999px; margin-bottom: 18px;
}
.eyebrow i { font-size: 0.7rem; }
.section-title { font-size: clamp(1.9rem, 4vw, 2.9rem); margin-bottom: 14px; }
.section-desc { color: var(--text-muted); font-size: 1.02rem; }
.grad-text {
  background: linear-gradient(120deg, var(--cyan), var(--violet));
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
}
.glass {
  background: var(--panel);
  border: 1px solid var(--border);
  backdrop-filter: blur(22px) saturate(150%);
  -webkit-backdrop-filter: blur(22px) saturate(150%);
  border-radius: var(--radius);
}
.dot-pulse {
  width: 9px; height: 9px; border-radius: 50%; background: var(--green);
  box-shadow: 0 0 0 0 rgba(52,211,153,0.6);
  animation: pulseDot 2s infinite;
  flex-shrink: 0;
}
@keyframes pulseDot {
  0% { box-shadow: 0 0 0 0 rgba(52,211,153,0.55); }
  70% { box-shadow: 0 0 0 8px rgba(52,211,153,0); }
  100% { box-shadow: 0 0 0 0 rgba(52,211,153,0); }
}
.btn {
  display: inline-flex; align-items: center; gap: 10px;
  font-family: var(--font-mono); font-size: 0.82rem; font-weight: 600;
  letter-spacing: 0.06em; text-transform: uppercase;
  padding: 14px 26px; border-radius: 10px; border: 1px solid transparent;
  cursor: pointer; transition: transform 0.3s var(--ease), box-shadow 0.3s var(--ease), background 0.3s var(--ease), border-color .3s var(--ease);
  white-space: nowrap;
}
.btn-primary {
  background: linear-gradient(120deg, var(--cyan), var(--violet));
  color: #041018;
}
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 14px 34px rgba(34,211,238,0.28); }
.btn-outline {
  background: rgba(255,255,255,0.02);
  border-color: var(--border-strong);
  color: var(--text);
}
.btn-outline:hover { border-color: var(--cyan); color: var(--cyan); background: rgba(34,211,238,0.06); transform: translateY(-3px); }

.reveal { opacity: 0; transform: translateY(28px); transition: opacity .8s var(--ease), transform .8s var(--ease); }
.reveal.in-view { opacity: 1; transform: translateY(0); }
.reveal-scale { opacity: 0; transform: scale(0.92); transition: opacity .7s var(--ease), transform .7s var(--ease); }
.reveal-scale.in-view { opacity: 1; transform: scale(1); }

@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }
  *, *::before, *::after { animation-duration: 0.001ms !important; animation-iteration-count: 1 !important; transition-duration: 0.001ms !important; }
  .reveal, .reveal-scale { opacity: 1; transform: none; }
}

/* ============================= BACKDROP FX ============================= */
.bg-grid {
  position: fixed; inset: 0; z-index: 0; pointer-events: none;
  background-image:
    linear-gradient(rgba(34,211,238,0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(34,211,238,0.05) 1px, transparent 1px);
  background-size: 46px 46px;
  mask-image: radial-gradient(ellipse 80% 60% at 50% 0%, #000 40%, transparent 100%);
}
.bg-orbs { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
.orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.28; animation: orbFloat 16s ease-in-out infinite alternate; }
.orb-1 { width: 520px; height: 520px; background: radial-gradient(circle, #22d3ee, transparent 70%); top: -12%; left: -8%; }
.orb-2 { width: 460px; height: 460px; background: radial-gradient(circle, #a78bfa, transparent 70%); bottom: -10%; right: -6%; animation-delay: -6s; }
.orb-3 { width: 360px; height: 360px; background: radial-gradient(circle, #f472b6, transparent 70%); top: 45%; left: 45%; animation-delay: -11s; }
@keyframes orbFloat { 0% { transform: translate(0,0) scale(1); } 100% { transform: translate(50px, 36px) scale(1.12); } }

.scroll-progress {
  position: fixed; top: 0; left: 0; height: 3px; width: 0%;
  background: linear-gradient(90deg, var(--cyan), var(--violet));
  z-index: 999; box-shadow: 0 0 12px rgba(34,211,238,0.7);
  transition: width 0.1s linear;
}

.cursor-glow {
  position: fixed; width: 320px; height: 320px; border-radius: 50%;
  background: radial-gradient(circle, rgba(34,211,238,0.10), transparent 70%);
  pointer-events: none; z-index: 1; transform: translate(-50%,-50%);
  transition: opacity .3s; opacity: 0; will-change: transform;
}

/* ============================= NAV ============================= */
nav#site-nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 200;
  display: flex; align-items: center; justify-content: space-between;
  padding: 18px 28px; transition: all 0.4s var(--ease);
  border-bottom: 1px solid transparent;
}
nav#site-nav.scrolled {
  background: rgba(5,7,13,0.75);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  border-bottom: 1px solid var(--border);
  padding: 12px 28px;
}
.brand { display: flex; align-items: center; gap: 10px; font-family: var(--font-mono); font-weight: 700; }
.brand-mark {
  width: 38px; height: 38px; border-radius: 10px;
  background: linear-gradient(135deg, var(--cyan), var(--violet));
  display: flex; align-items: center; justify-content: center;
  color: #04121a; font-weight: 800; font-size: 1rem;
  box-shadow: 0 0 22px rgba(34,211,238,0.4);
}
.brand-text { font-size: 0.95rem; letter-spacing: 0.02em; }
.brand-text span { color: var(--cyan); }

.nav-links { display: flex; align-items: center; gap: 30px; }
.nav-links a {
  font-size: 0.82rem; font-weight: 500; color: var(--text-muted);
  letter-spacing: 0.03em; position: relative; padding: 6px 2px;
  transition: color .3s;
}
.nav-links a::after {
  content: ''; position: absolute; left: 0; bottom: 0; height: 2px; width: 0;
  background: linear-gradient(90deg, var(--cyan), var(--violet));
  transition: width .3s var(--ease);
}
.nav-links a:hover, .nav-links a.active { color: var(--text); }
.nav-links a:hover::after, .nav-links a.active::after { width: 100%; }

.nav-clock {
  font-family: var(--font-mono); font-size: 0.72rem; color: var(--text-dim2);
  display: flex; align-items: center; gap: 8px; letter-spacing: 0.04em;
}

.nav-toggle {
  display: none; background: transparent; border: 1px solid var(--border-strong);
  width: 42px; height: 42px; border-radius: 8px; color: var(--text);
  font-size: 1.1rem; cursor: pointer; align-items: center; justify-content: center;
}

/* ============================= HERO ============================= */
.hero {
  position: relative; min-height: 100vh; display: flex; align-items: center;
  padding: 140px 0 60px; z-index: 2; overflow: hidden;
}
#hero-canvas { position: absolute; inset: 0; z-index: 0; opacity: 0.65; }
.hero-inner {
  position: relative; z-index: 3; display: grid;
  grid-template-columns: 1.15fr 0.85fr; gap: 50px; align-items: center;
}
.hero-status-pill {
  display: inline-flex; align-items: center; gap: 10px;
  font-family: var(--font-mono); font-size: 0.75rem; letter-spacing: 0.12em;
  text-transform: uppercase; padding: 8px 16px; border-radius: 999px;
  border: 1px solid rgba(52,211,153,0.35); background: rgba(52,211,153,0.08);
  color: var(--green); margin-bottom: 26px;
}
.hero h1 {
  font-size: clamp(2.3rem, 5.4vw, 4.1rem); margin-bottom: 16px; letter-spacing: -0.01em;
}
.hero .role-line {
  font-family: var(--font-mono); font-size: clamp(1rem, 2vw, 1.3rem);
  color: var(--cyan); margin-bottom: 22px; display: flex; align-items: center; gap: 10px;
}
.hero .role-line .cursor-blink { width: 2px; height: 1.1em; background: var(--cyan); animation: blink 1s steps(2) infinite; }
@keyframes blink { 50% { opacity: 0; } }
.hero p.lead { color: var(--text-muted); font-size: 1.06rem; max-width: 540px; margin-bottom: 34px; }
.hero-cta { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 46px; }

.hero-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; max-width: 560px; }
.hero-stat { padding: 16px 14px; text-align: left; }
.hero-stat .num {
  font-family: var(--font-mono); font-size: 1.7rem; font-weight: 700; color: var(--text);
  display: flex; align-items: baseline; gap: 2px;
}
.hero-stat .num small { font-size: 1rem; color: var(--cyan); }
.hero-stat .lbl { font-size: 0.72rem; color: var(--text-dim2); text-transform: uppercase; letter-spacing: 0.06em; margin-top: 4px; }

/* hero side panel - system readout */
.hero-panel { padding: 26px; position: relative; }
.hero-panel-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; }
.hero-panel-head h3 { font-size: 0.85rem; letter-spacing: 0.08em; text-transform: uppercase; color: var(--text-muted); font-family: var(--font-mono); }
.hero-panel-head .dot-pulse { }
.hero-avatar-ring {
  width: 168px; height: 168px; border-radius: 50%; margin: 0 auto 20px;
  background: conic-gradient(from 0deg, var(--cyan), var(--violet), var(--pink), var(--cyan));
  display: flex; align-items: center; justify-content: center;
  animation: spin 10s linear infinite; padding: 4px;
}
@keyframes spin { to { transform: rotate(360deg); } }
.hero-avatar-inner {
  width: 100%; height: 100%; border-radius: 50%; background: var(--bg-elev);
  display: flex; align-items: center; justify-content: center; flex-direction: column;
  animation: spin 10s linear infinite reverse;
}
.hero-avatar-inner i { font-size: 2.6rem; background: linear-gradient(135deg, var(--cyan), var(--violet)); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
.hero-panel-rows { display: flex; flex-direction: column; gap: 10px; }
.hero-panel-row {
  display: flex; justify-content: space-between; align-items: center;
  font-family: var(--font-mono); font-size: 0.76rem; padding: 8px 12px;
  background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px;
}
.hero-panel-row .k { color: var(--text-dim2); }
.hero-panel-row .v { color: var(--cyan); font-weight: 600; }

.scroll-cue {
  position: absolute; bottom: 28px; left: 50%; transform: translateX(-50%);
  display: flex; flex-direction: column; align-items: center; gap: 8px;
  color: var(--text-dim2); font-family: var(--font-mono); font-size: 0.68rem;
  letter-spacing: 0.2em; text-transform: uppercase; z-index: 3;
}
.scroll-cue .stick { width: 1px; height: 34px; background: linear-gradient(var(--cyan), transparent); animation: scrollDown 1.8s ease-in-out infinite; }
@keyframes scrollDown { 0% { transform: scaleY(0); transform-origin: top; opacity: 0; } 40% { transform: scaleY(1); transform-origin: top; opacity: 1; } 60% { transform: scaleY(1); transform-origin: bottom; opacity: 1; } 100% { transform: scaleY(0); transform-origin: bottom; opacity: 0; } }

/* ============================= DASHBOARD OVERVIEW ============================= */
.stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 56px; }
.stat-tile { padding: 26px 22px; position: relative; overflow: hidden; transition: transform .35s var(--ease), border-color .35s; }
.stat-tile::before {
  content: ''; position: absolute; top: -40%; right: -20%; width: 140px; height: 140px;
  background: radial-gradient(circle, rgba(34,211,238,0.18), transparent 70%); pointer-events: none;
}
.stat-tile:hover { transform: translateY(-6px); border-color: rgba(34,211,238,0.35); }
.stat-tile-icon {
  width: 46px; height: 46px; border-radius: 12px; display: flex; align-items: center; justify-content: center;
  background: linear-gradient(135deg, rgba(34,211,238,0.16), rgba(167,139,250,0.16));
  color: var(--cyan); font-size: 1.15rem; margin-bottom: 18px;
}
.stat-tile .stat-num { font-family: var(--font-mono); font-size: 2.1rem; font-weight: 700; display: flex; align-items: baseline; gap: 3px; }
.stat-tile .stat-num .suffix { font-size: 1.3rem; color: var(--violet); }
.stat-tile .stat-lbl { color: var(--text-muted); font-size: 0.86rem; margin-top: 6px; }

.overview-grid { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 22px; align-items: stretch; }

/* City grid map */
.citymap-panel { padding: 26px; position: relative; overflow: hidden; }
.citymap-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 10px; }
.citymap-head h3 { font-size: 1rem; display: flex; align-items: center; gap: 10px; }
.citymap-legend { display: flex; gap: 14px; flex-wrap: wrap; font-family: var(--font-mono); font-size: 0.68rem; color: var(--text-dim2); }
.citymap-legend span { display: inline-flex; align-items: center; gap: 6px; }
.legend-dot { width: 8px; height: 8px; border-radius: 2px; display: inline-block; }
#city-map-svg { width: 100%; height: 320px; display: block; cursor: default; }
.city-tooltip {
  position: absolute; pointer-events: none; z-index: 20; padding: 8px 12px;
  background: rgba(8,11,22,0.95); border: 1px solid var(--cyan); border-radius: 8px;
  font-family: var(--font-mono); font-size: 0.72rem; color: var(--text);
  opacity: 0; transform: translate(-50%, -120%); transition: opacity .2s;
  white-space: nowrap; box-shadow: 0 8px 24px rgba(0,0,0,0.5);
}
.city-tooltip.show { opacity: 1; }

/* System info panel */
.sysinfo-panel { padding: 26px; display: flex; flex-direction: column; gap: 16px; }
.sysinfo-panel h3 { font-size: 1rem; margin-bottom: 4px; display: flex; align-items: center; gap: 10px; }
.sysinfo-item {
  display: flex; gap: 14px; align-items: flex-start; padding: 14px;
  background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 12px;
  transition: border-color .3s, background .3s;
}
.sysinfo-item:hover { border-color: rgba(167,139,250,0.4); background: rgba(167,139,250,0.05); }
.sysinfo-icon {
  width: 38px; height: 38px; border-radius: 10px; flex-shrink: 0;
  background: linear-gradient(135deg, rgba(167,139,250,0.2), rgba(34,211,238,0.2));
  display: flex; align-items: center; justify-content: center; color: var(--violet);
}
.sysinfo-item h4 { font-size: 0.9rem; margin-bottom: 3px; }
.sysinfo-item p { font-size: 0.78rem; color: var(--text-dim2); font-family: var(--font-mono); }

/* ============================= SKILLS ANALYTICS ============================= */
.skills-top { display: grid; grid-template-columns: 1fr 1fr; gap: 22px; margin-bottom: 40px; }
.chart-card { padding: 26px; }
.chart-card h3 { font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-muted); margin-bottom: 18px; display: flex; align-items: center; gap: 10px; }
.chart-card canvas { max-height: 260px; }
.gauge-wrap { display: flex; align-items: center; gap: 24px; }
.gauge-canvas-box { position: relative; width: 190px; height: 190px; flex-shrink: 0; }
.gauge-center { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; }
.gauge-center .big { font-family: var(--font-mono); font-size: 2.1rem; font-weight: 700; color: var(--cyan); }
.gauge-center .small { font-size: 0.68rem; color: var(--text-dim2); text-transform: uppercase; letter-spacing: 0.06em; }
.gauge-side p { color: var(--text-muted); font-size: 0.88rem; }
.gauge-side ul { margin-top: 14px; display: flex; flex-direction: column; gap: 8px; }
.gauge-side li { font-size: 0.8rem; font-family: var(--font-mono); display: flex; gap: 8px; align-items: center; color: var(--text-dim2); }
.gauge-side li i { color: var(--green); font-size: 0.7rem; }

.skill-category { margin-bottom: 34px; }
.skill-category:last-child { margin-bottom: 0; }
.skill-category-title {
  display: flex; align-items: center; gap: 10px; font-family: var(--font-mono);
  font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted);
  margin-bottom: 18px; padding-bottom: 10px; border-bottom: 1px solid var(--border);
}
.skill-category-title .cat-swatch { width: 10px; height: 10px; border-radius: 3px; }
.skill-rows { display: grid; grid-template-columns: 1fr 1fr; gap: 16px 26px; }
.skill-row { }
.skill-row-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; font-size: 0.86rem; }
.skill-row-top .skill-name { display: flex; align-items: center; gap: 9px; }
.skill-row-top .skill-name i { width: 18px; text-align: center; color: var(--text-muted); }
.skill-row-top .skill-pct { font-family: var(--font-mono); font-weight: 600; color: var(--text); }
.skill-bar { height: 8px; border-radius: 5px; background: rgba(255,255,255,0.06); overflow: hidden; position: relative; }
.skill-bar-fill {
  height: 100%; width: 0; border-radius: 5px;
  transition: width 1.4s var(--ease);
  box-shadow: 0 0 12px currentColor;
  position: relative;
}
.skill-row.in-view .skill-bar-fill { width: var(--pct); }
.cat-backend .skill-bar-fill, .cat-swatch.backend { background: linear-gradient(90deg, #0891b2, var(--cyan)); color: var(--cyan); }
.cat-frontend .skill-bar-fill, .cat-swatch.frontend { background: linear-gradient(90deg, #7c3aed, var(--violet)); color: var(--violet); }
.cat-db .skill-bar-fill, .cat-swatch.db { background: linear-gradient(90deg, #b45309, var(--amber)); color: var(--amber); }
.cat-devops .skill-bar-fill, .cat-swatch.devops { background: linear-gradient(90deg, #db2777, var(--pink)); color: var(--pink); }

/* ============================= PROJECTS (LIVE MONITORING) ============================= */
.projects-note { text-align: center; color: var(--text-dim2); font-size: 0.8rem; font-family: var(--font-mono); margin-top: -34px; margin-bottom: 44px; }
.projects-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 22px; }
.sys-card {
  padding: 24px; position: relative; overflow: hidden;
  transition: transform .4s var(--ease), border-color .4s, box-shadow .4s;
}
.sys-card:hover { transform: translateY(-8px); border-color: rgba(34,211,238,0.4); box-shadow: 0 22px 50px rgba(0,0,0,0.4); }
.sys-card-head { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 14px; gap: 10px; }
.sys-card-head h3 { font-size: 1.2rem; margin-bottom: 6px; }
.sys-id { font-family: var(--font-mono); font-size: 0.68rem; color: var(--text-dim2); letter-spacing: 0.08em; }
.status-badge {
  display: inline-flex; align-items: center; gap: 7px; font-family: var(--font-mono);
  font-size: 0.68rem; letter-spacing: 0.08em; text-transform: uppercase;
  padding: 6px 12px; border-radius: 999px; background: rgba(52,211,153,0.1);
  border: 1px solid rgba(52,211,153,0.35); color: var(--green); flex-shrink: 0;
}
.sys-card p.desc { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 18px; }
.sys-metrics { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 18px; }
.sys-metric {
  padding: 10px 8px; text-align: center; background: rgba(255,255,255,0.03);
  border: 1px solid var(--border); border-radius: 10px;
}
.sys-metric .v { font-family: var(--font-mono); font-weight: 700; font-size: 1rem; color: var(--cyan); }
.sys-metric .l { font-size: 0.62rem; color: var(--text-dim2); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 2px; }
.sys-spark { height: 60px; margin-bottom: 18px; }
.sys-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 18px; }
.sys-tags span {
  font-family: var(--font-mono); font-size: 0.68rem; padding: 5px 11px; border-radius: 6px;
  background: rgba(167,139,250,0.09); border: 1px solid rgba(167,139,250,0.25); color: var(--violet);
}
.sys-card-foot { display: flex; justify-content: space-between; align-items: center; }
.sys-link { font-family: var(--font-mono); font-size: 0.78rem; color: var(--cyan); display: flex; align-items: center; gap: 6px; }
.sys-link i { transition: transform .3s; }
.sys-link:hover i { transform: translateX(4px); }
.uptime-mini { font-family: var(--font-mono); font-size: 0.68rem; color: var(--text-dim2); }

/* ============================= EXPERIENCE TIMELINE ============================= */
.timeline { position: relative; max-width: 880px; margin: 0 auto; padding-left: 40px; }
.timeline::before {
  content: ''; position: absolute; left: 12px; top: 6px; bottom: 6px; width: 2px;
  background: linear-gradient(var(--cyan), var(--violet), transparent);
}
.tl-zone { position: relative; margin-bottom: 40px; }
.tl-zone:last-child { margin-bottom: 0; }
.tl-dot {
  position: absolute; left: -40px; top: 6px; width: 26px; height: 26px; border-radius: 50%;
  background: var(--bg-elev); border: 2px solid var(--cyan); display: flex; align-items: center;
  justify-content: center; color: var(--cyan); font-size: 0.72rem; box-shadow: 0 0 0 6px rgba(34,211,238,0.08);
}
.tl-zone.completed .tl-dot { border-color: var(--violet); color: var(--violet); box-shadow: 0 0 0 6px rgba(167,139,250,0.08); }
.tl-card { padding: 24px 26px; }
.tl-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 14px; flex-wrap: wrap; margin-bottom: 10px; }
.tl-zone-tag { font-family: var(--font-mono); font-size: 0.68rem; letter-spacing: 0.1em; color: var(--text-dim2); text-transform: uppercase; margin-bottom: 6px; }
.tl-role { font-size: 1.15rem; margin-bottom: 4px; }
.tl-company { color: var(--cyan); font-size: 0.9rem; font-weight: 600; }
.tl-dates { font-family: var(--font-mono); font-size: 0.76rem; color: var(--text-dim2); background: rgba(255,255,255,0.04); padding: 6px 12px; border-radius: 8px; border: 1px solid var(--border); white-space: nowrap; }
.tl-desc { color: var(--text-muted); font-size: 0.92rem; margin-top: 12px; }
.tl-status { display: inline-flex; align-items: center; gap: 7px; font-family: var(--font-mono); font-size: 0.66rem; text-transform: uppercase; letter-spacing: 0.08em; margin-top: 14px; padding: 5px 12px; border-radius: 999px; }
.tl-status.active { background: rgba(52,211,153,0.1); border: 1px solid rgba(52,211,153,0.35); color: var(--green); }
.tl-status.done { background: rgba(148,163,189,0.1); border: 1px solid rgba(148,163,189,0.3); color: var(--text-muted); }

/* ============================= BLOG ============================= */
.blog-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.blog-card { padding: 24px; display: flex; flex-direction: column; height: 100%; transition: transform .35s var(--ease), border-color .35s; }
.blog-card:hover { transform: translateY(-6px); border-color: rgba(244,114,182,0.35); }
.blog-icon {
  width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center;
  background: linear-gradient(135deg, rgba(244,114,182,0.18), rgba(167,139,250,0.18)); color: var(--pink);
  font-size: 1.1rem; margin-bottom: 16px;
}
.blog-meta { font-family: var(--font-mono); font-size: 0.68rem; color: var(--text-dim2); display: flex; gap: 14px; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.05em; }
.blog-card h3 { font-size: 1.06rem; margin-bottom: 10px; }
.blog-card p { color: var(--text-muted); font-size: 0.87rem; margin-bottom: 18px; flex-grow: 1; }
.blog-readmore { font-family: var(--font-mono); font-size: 0.78rem; color: var(--cyan); display: inline-flex; align-items: center; gap: 6px; margin-top: auto; }
.blog-readmore i { transition: transform .3s; }
.blog-readmore:hover i { transform: translateX(4px); }

/* ============================= CONTACT ============================= */
.contact-grid { display: grid; grid-template-columns: 0.85fr 1.15fr; gap: 24px; align-items: start; }
.contact-channels { display: flex; flex-direction: column; gap: 14px; }
.channel-card {
  padding: 20px; display: flex; align-items: center; gap: 16px;
  transition: border-color .3s, transform .3s;
}
.channel-card:hover { border-color: rgba(34,211,238,0.4); transform: translateX(4px); }
.channel-icon {
  width: 46px; height: 46px; border-radius: 12px; flex-shrink: 0;
  background: linear-gradient(135deg, rgba(34,211,238,0.18), rgba(167,139,250,0.18));
  display: flex; align-items: center; justify-content: center; color: var(--cyan); font-size: 1.15rem;
}
.channel-body h4 { font-size: 0.88rem; margin-bottom: 3px; }
.channel-body p { font-size: 0.8rem; color: var(--text-dim2); font-family: var(--font-mono); word-break: break-word; }
.channel-status { margin-left: auto; flex-shrink: 0; }

.contact-form-panel { padding: 32px; }
.contact-form-panel h3 { font-size: 1rem; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-muted); margin-bottom: 22px; display: flex; align-items: center; gap: 10px; }
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
.form-group { display: flex; flex-direction: column; gap: 8px; margin-bottom: 18px; }
.form-group.full { grid-column: 1 / -1; }
.form-group label { font-family: var(--font-mono); font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-dim2); }
.form-group input, .form-group textarea {
  background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 10px;
  padding: 13px 15px; font-size: 0.92rem; color: var(--text); transition: border-color .3s, background .3s;
  resize: vertical;
}
.form-group input:focus, .form-group textarea:focus { border-color: var(--cyan); background: rgba(34,211,238,0.04); outline: none; }
.form-group input::placeholder, .form-group textarea::placeholder { color: var(--text-dim2); }
.form-submit-row { display: flex; align-items: center; gap: 18px; flex-wrap: wrap; margin-top: 6px; }
.form-status { font-family: var(--font-mono); font-size: 0.8rem; display: flex; align-items: center; gap: 8px; }
.form-status.success { color: var(--green); }
.form-status.error { color: var(--red); }
.btn[disabled] { opacity: 0.6; cursor: not-allowed; }

/* ============================= FOOTER ============================= */
footer { position: relative; z-index: 2; border-top: 1px solid var(--border); padding: 56px 0 26px; }
.footer-top { display: grid; grid-template-columns: 1.4fr 0.6fr 0.6fr 0.8fr; gap: 34px; margin-bottom: 44px; }
.footer-brand p { color: var(--text-dim2); font-size: 0.86rem; margin-top: 14px; max-width: 320px; }
.footer-col h4 { font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-muted); margin-bottom: 16px; font-family: var(--font-mono); }
.footer-col ul { display: flex; flex-direction: column; gap: 10px; }
.footer-col a { color: var(--text-dim2); font-size: 0.86rem; transition: color .3s; }
.footer-col a:hover { color: var(--cyan); }
.footer-socials { display: flex; gap: 10px; margin-top: 16px; }
.footer-socials a {
  width: 38px; height: 38px; border-radius: 10px; border: 1px solid var(--border-strong);
  display: flex; align-items: center; justify-content: center; transition: all .3s;
}
.footer-socials a:hover { border-color: var(--cyan); color: var(--cyan); background: rgba(34,211,238,0.06); transform: translateY(-3px); }
.footer-status { display: inline-flex; align-items: center; gap: 8px; font-family: var(--font-mono); font-size: 0.72rem; color: var(--green); background: rgba(52,211,153,0.08); border: 1px solid rgba(52,211,153,0.3); padding: 7px 13px; border-radius: 999px; }
.footer-bottom { display: flex; justify-content: space-between; align-items: center; padding-top: 26px; border-top: 1px solid var(--border); font-size: 0.8rem; color: var(--text-dim2); flex-wrap: wrap; gap: 12px; }
.footer-bottom .fm { font-family: var(--font-mono); font-size: 0.75rem; }

/* back to top */
#back-to-top {
  position: fixed; bottom: 26px; right: 26px; z-index: 150; width: 48px; height: 48px;
  border-radius: 50%; background: var(--bg-elev); border: 1px solid var(--border-strong);
  color: var(--cyan); display: flex; align-items: center; justify-content: center; cursor: pointer;
  opacity: 0; pointer-events: none; transform: translateY(12px); transition: all .35s var(--ease);
}
#back-to-top.show { opacity: 1; pointer-events: auto; transform: translateY(0); }
#back-to-top:hover { border-color: var(--cyan); box-shadow: 0 0 20px rgba(34,211,238,0.3); }

/* ============================= RESPONSIVE ============================= */
@media (max-width: 1080px) {
  .overview-grid { grid-template-columns: 1fr; }
  .skills-top { grid-template-columns: 1fr; }
  .contact-grid { grid-template-columns: 1fr; }
  .footer-top { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 900px) {
  .hero-inner { grid-template-columns: 1fr; }
  .hero-panel { max-width: 380px; }
  .stat-grid { grid-template-columns: repeat(2, 1fr); }
  .projects-grid { grid-template-columns: 1fr; }
  .blog-grid { grid-template-columns: 1fr; }
  .skill-rows { grid-template-columns: 1fr; }
}
@media (max-width: 768px) {
  .nav-links { position: fixed; top: 0; right: -100%; width: min(78vw, 320px); height: 100vh;
    background: rgba(6,9,17,0.98); backdrop-filter: blur(20px); flex-direction: column;
    justify-content: center; align-items: flex-start; gap: 26px; padding: 40px; transition: right .4s var(--ease);
    border-left: 1px solid var(--border); }
  .nav-links.open { right: 0; }
  .nav-clock { display: none; }
  .nav-toggle { display: flex; }
  .footer-top { grid-template-columns: 1fr 1fr; }
  .hero-stats { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 560px) {
  .container { padding: 0 18px; }
  .section { padding: 90px 0 60px; }
  .stat-grid { grid-template-columns: 1fr 1fr; }
  .hero-stats { grid-template-columns: 1fr 1fr 1fr; gap: 8px; }
  .hero-stat { padding: 12px 10px; }
  .hero-stat .num { font-size: 1.3rem; }
  .form-grid { grid-template-columns: 1fr; }
  .footer-top { grid-template-columns: 1fr; }
  .gauge-wrap { flex-direction: column; }
  .tl-head { flex-direction: column; }
  .citymap-legend { display: none; }
}
@media (max-width: 400px) {
  .hero-stats { grid-template-columns: 1fr; }
  .stat-grid { grid-template-columns: 1fr; }
}
</style>
</head>
<body>
<a href="#home" class="skip-link">Skip to main content</a>

<div class="bg-grid" aria-hidden="true"></div>
<div class="bg-orbs" aria-hidden="true">
  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>
  <div class="orb orb-3"></div>
</div>
<div class="scroll-progress" id="scroll-progress" aria-hidden="true"></div>
<div class="cursor-glow" id="cursor-glow" aria-hidden="true"></div>

<!-- ============================= NAV ============================= -->
<nav id="site-nav" aria-label="Primary">
  <a href="#home" class="brand" aria-label="Homepage">
    <span class="brand-mark">MK</span>
    <span class="brand-text">M.EAK <span>// DASHBOARD</span></span>
  </a>
  <ul class="nav-links" id="nav-links">
    <li><a href="#home" class="active">Home</a></li>
    <li><a href="#overview">Overview</a></li>
    <li><a href="#skills">Skills</a></li>
    <li><a href="#projects">Projects</a></li>
    <li><a href="#experience">Experience</a></li>
    <li><a href="#blog">Blog</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  <div class="nav-clock" id="nav-clock" aria-hidden="true">
    <span class="dot-pulse"></span>
    <span id="clock-text">--:--:--</span>
  </div>
  <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="nav-links">
    <i class="fa-solid fa-bars" id="nav-toggle-icon"></i>
  </button>
</nav>

<!-- ============================= HERO ============================= -->
<header class="hero" id="home">
  <canvas id="hero-canvas" aria-hidden="true"></canvas>
  <div class="container hero-inner">
    <div class="hero-copy">
      <div class="hero-status-pill"><span class="dot-pulse"></span> All Systems Operational</div>
      <h1>M. Estiaque Ahmed <span class="grad-text">Khan</span></h1>
      <p class="role-line"><i class="fa-solid fa-terminal"></i> Software Engineer — Full-Stack Laravel Developer <span class="cursor-blink" aria-hidden="true"></span></p>
      <p class="lead">I design and ship reliable, high-performance web systems — from ERP automation to real-time analytics dashboards — using Laravel, Vue and modern cloud infrastructure. Welcome to my control room.</p>
      <div class="hero-cta">
        <a href="#projects" class="btn btn-primary"><i class="fa-solid fa-satellite-dish"></i> View Live Systems</a>
        <a href="#contact" class="btn btn-outline"><i class="fa-solid fa-tower-broadcast"></i> Establish Connection</a>
      </div>
      <div class="hero-stats">
        <div class="glass hero-stat reveal">
          <div class="num" data-count="3" data-suffix="+"><span>0</span><small>+</small></div>
          <div class="lbl">Years Exp.</div>
        </div>
        <div class="glass hero-stat reveal">
          <div class="num" data-count="4" data-suffix=""><span>0</span></div>
          <div class="lbl">Projects Shipped</div>
        </div>
        <div class="glass hero-stat reveal">
          <div class="num" data-count="3" data-suffix=""><span>0</span></div>
          <div class="lbl">Systems Delivered</div>
        </div>
      </div>
    </div>
    <div class="hero-panel glass reveal-scale">
      <div class="hero-panel-head">
        <h3>Operator Profile</h3>
        <span class="dot-pulse" title="Online"></span>
      </div>
      <div class="hero-avatar-ring">
        <div class="hero-avatar-inner"><i class="fa-solid fa-code"></i></div>
      </div>
      <div class="hero-panel-rows">
        <div class="hero-panel-row"><span class="k">ROLE</span><span class="v">Full-Stack Engineer</span></div>
        <div class="hero-panel-row"><span class="k">STACK</span><span class="v">Laravel / Vue / MySQL</span></div>
        <div class="hero-panel-row"><span class="k">STATUS</span><span class="v">Available</span></div>
        <div class="hero-panel-row"><span class="k">LOCATION</span><span class="v">Remote-Ready</span></div>
        <div class="hero-panel-row"><span class="k">UPTIME</span><span class="v">99.9%</span></div>
      </div>
    </div>
  </div>
  <a href="#overview" class="scroll-cue" aria-label="Scroll to dashboard overview">
    <span>Scroll</span>
    <span class="stick"></span>
  </a>
</header>

<main id="main-content">

<!-- ============================= DASHBOARD OVERVIEW ============================= -->
<section class="section" id="overview">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow"><i class="fa-solid fa-chart-line"></i> Dashboard Overview</div>
      <h2 class="section-title">Mission Control <span class="grad-text">Summary</span></h2>
      <p class="section-desc">Key metrics pulled straight from the resume database — no inflation, just verified career telemetry.</p>
    </div>

    <div class="stat-grid">
      <div class="glass stat-tile reveal">
        <div class="stat-tile-icon"><i class="fa-solid fa-hourglass-half"></i></div>
        <div class="stat-num"><span data-count="3">0</span><span class="suffix">+</span></div>
        <div class="stat-lbl">Years Experience</div>
      </div>
      <div class="glass stat-tile reveal">
        <div class="stat-tile-icon"><i class="fa-solid fa-diagram-project"></i></div>
        <div class="stat-num"><span data-count="4">0</span></div>
        <div class="stat-lbl">Major Projects</div>
      </div>
      <div class="glass stat-tile reveal">
        <div class="stat-tile-icon"><i class="fa-solid fa-building"></i></div>
        <div class="stat-num"><span data-count="3">0</span></div>
        <div class="stat-lbl">Companies</div>
      </div>
      <div class="glass stat-tile reveal">
        <div class="stat-tile-icon"><i class="fa-solid fa-graduation-cap"></i></div>
        <div class="stat-num"><span data-count="2">0</span></div>
        <div class="stat-lbl">Degrees (MSc + BSc)</div>
      </div>
    </div>

    <div class="overview-grid">
      <div class="glass citymap-panel reveal">
        <div class="citymap-head">
          <h3><i class="fa-solid fa-city" style="color:var(--cyan)"></i> Live City Grid — Portfolio Map</h3>
          <div class="citymap-legend">
            <span><i class="legend-dot" style="background:var(--cyan)"></i> Core Zone</span>
            <span><i class="legend-dot" style="background:var(--violet)"></i> Landmark Node</span>
            <span><i class="legend-dot" style="background:var(--green)"></i> Active Link</span>
          </div>
        </div>
        <svg id="city-map-svg" viewBox="0 0 600 320" preserveAspectRatio="xMidYMid meet" role="img" aria-label="Abstract animated city grid representing the site's sections. Landmark nodes are clickable and navigate to each section."></svg>
        <div class="city-tooltip" id="city-tooltip"></div>
      </div>

      <div class="glass sysinfo-panel reveal">
        <h3><i class="fa-solid fa-server" style="color:var(--violet)"></i> System Specifications</h3>
        <div class="sysinfo-item">
          <div class="sysinfo-icon"><i class="fa-solid fa-graduation-cap"></i></div>
          <div>
            <h4>MSc in Computer Science</h4>
            <p>Uttara University — Passing Year: 2025</p>
          </div>
        </div>
        <div class="sysinfo-item">
          <div class="sysinfo-icon"><i class="fa-solid fa-user-graduate"></i></div>
          <div>
            <h4>BSc in Computer Science &amp; Engineering</h4>
            <p>Uttara University — Passing Year: 2021</p>
          </div>
        </div>
        <div class="sysinfo-item">
          <div class="sysinfo-icon"><i class="fa-solid fa-bolt"></i></div>
          <div>
            <h4>Core Runtime</h4>
            <p>PHP 8 · Laravel · MySQL / PostgreSQL</p>
          </div>
        </div>
        <div class="sysinfo-item">
          <div class="sysinfo-icon"><i class="fa-solid fa-cloud"></i></div>
          <div>
            <h4>Infrastructure</h4>
            <p>Docker · AWS · CI/CD Pipelines</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================= SKILLS ANALYTICS ============================= -->
<section class="section" id="skills">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow"><i class="fa-solid fa-chart-simple"></i> Skills Analytics</div>
      <h2 class="section-title">Proficiency <span class="grad-text">Telemetry</span></h2>
      <p class="section-desc">Eighteen tracked competencies across backend, frontend, data and infrastructure — rendered as live analytics.</p>
    </div>

    <div class="skills-top">
      <div class="glass chart-card reveal">
        <h3><i class="fa-solid fa-chart-pie" style="color:var(--cyan)"></i> Overall Proficiency Score</h3>
        <div class="gauge-wrap">
          <div class="gauge-canvas-box">
            <canvas id="gaugeChart" width="190" height="190" role="img" aria-label="Overall proficiency gauge showing an average score of 87 percent"></canvas>
            <div class="gauge-center"><span class="big" id="gauge-number">0%</span><span class="small">Composite Score</span></div>
          </div>
          <div class="gauge-side">
            <p>Weighted average across all eighteen tracked skills, refreshed on every deployment cycle.</p>
            <ul>
              <li><i class="fa-solid fa-circle-check"></i> Backend-heavy specialization</li>
              <li><i class="fa-solid fa-circle-check"></i> Strong DB &amp; API fundamentals</li>
              <li><i class="fa-solid fa-circle-check"></i> Growing cloud footprint</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="glass chart-card reveal">
        <h3><i class="fa-solid fa-radar" style="color:var(--violet)"></i> Category Radar</h3>
        <canvas id="radarChart" role="img" aria-label="Radar chart comparing average proficiency across Backend, Frontend, Database, and DevOps categories"></canvas>
      </div>
    </div>

    <div class="glass reveal" style="padding:30px 30px 8px;">
      <div class="skill-category cat-backend">
        <div class="skill-category-title"><span class="cat-swatch backend"></span> Backend Development</div>
        <div class="skill-rows">
          <div class="skill-row cat-backend" style="--pct:95%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-brands fa-php"></i> PHP 8</span><span class="skill-pct" data-count="95">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-backend" style="--pct:96%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-brands fa-laravel"></i> Laravel</span><span class="skill-pct" data-count="96">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-backend" style="--pct:92%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-diagram-project"></i> REST API Design</span><span class="skill-pct" data-count="92">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-backend" style="--pct:88%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-gauge-high"></i> Database Optimization</span><span class="skill-pct" data-count="88">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-backend" style="--pct:85%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-industry"></i> ERP Integration</span><span class="skill-pct" data-count="85">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-backend" style="--pct:78%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-arrows-rotate"></i> CI/CD</span><span class="skill-pct" data-count="78">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
        </div>
      </div>

      <div class="skill-category cat-frontend">
        <div class="skill-category-title"><span class="cat-swatch frontend"></span> Frontend Development</div>
        <div class="skill-rows">
          <div class="skill-row cat-frontend" style="--pct:90%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-brands fa-js"></i> JavaScript (ES6+)</span><span class="skill-pct" data-count="90">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-frontend" style="--pct:85%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-brands fa-vuejs"></i> Vue.js</span><span class="skill-pct" data-count="85">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-frontend" style="--pct:88%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-bolt"></i> Alpine.js</span><span class="skill-pct" data-count="88">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-frontend" style="--pct:90%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-wand-magic-sparkles"></i> Livewire</span><span class="skill-pct" data-count="90">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-frontend" style="--pct:87%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-wind"></i> Tailwind CSS</span><span class="skill-pct" data-count="87">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-frontend" style="--pct:92%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-brands fa-bootstrap"></i> Bootstrap 5</span><span class="skill-pct" data-count="92">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
        </div>
      </div>

      <div class="skill-category cat-db">
        <div class="skill-category-title"><span class="cat-swatch db"></span> Database Systems</div>
        <div class="skill-rows">
          <div class="skill-row cat-db" style="--pct:93%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-database"></i> MySQL</span><span class="skill-pct" data-count="93">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-db" style="--pct:82%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-database"></i> PostgreSQL</span><span class="skill-pct" data-count="82">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-db" style="--pct:80%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-solid fa-layer-group"></i> Redis</span><span class="skill-pct" data-count="80">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
        </div>
      </div>

      <div class="skill-category cat-devops">
        <div class="skill-category-title"><span class="cat-swatch devops"></span> DevOps &amp; Tools</div>
        <div class="skill-rows">
          <div class="skill-row cat-devops" style="--pct:78%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-brands fa-docker"></i> Docker</span><span class="skill-pct" data-count="78">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-devops" style="--pct:94%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-brands fa-git-alt"></i> Git</span><span class="skill-pct" data-count="94">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
          <div class="skill-row cat-devops" style="--pct:75%">
            <div class="skill-row-top"><span class="skill-name"><i class="fa-brands fa-aws"></i> AWS</span><span class="skill-pct" data-count="75">0%</span></div>
            <div class="skill-bar"><div class="skill-bar-fill"></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================= PROJECTS AS LIVE MONITORING ============================= -->
<section class="section" id="projects">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow"><i class="fa-solid fa-satellite-dish"></i> Live Monitoring</div>
      <h2 class="section-title">Project <span class="grad-text">Systems</span></h2>
      <p class="section-desc">Each build is presented as a monitoring panel — a UI showcase, not a connection to real production telemetry.</p>
    </div>
    <p class="projects-note"><i class="fa-solid fa-circle-info"></i> Status widgets below are stylistic simulations for design purposes.</p>

    <div class="projects-grid">
      <article class="glass sys-card reveal">
        <div class="sys-card-head">
          <div>
            <span class="sys-id">SYS-01 // PORTFOLIO-ENGINE</span>
            <h3>Port3folio Package</h3>
          </div>
          <span class="status-badge"><span class="dot-pulse"></span> Online</span>
        </div>
        <p class="desc">A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
        <div class="sys-metrics">
          <div class="sys-metric"><div class="v">99.9%</div><div class="l">Uptime</div></div>
          <div class="sys-metric"><div class="v">42ms</div><div class="l">Latency</div></div>
          <div class="sys-metric"><div class="v">v2.4</div><div class="l">Version</div></div>
        </div>
        <div class="sys-spark"><canvas id="spark1"></canvas></div>
        <div class="sys-tags"><span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span></div>
        <div class="sys-card-foot">
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener" class="sys-link">View Repository <i class="fa-solid fa-arrow-right"></i></a>
          <span class="uptime-mini">PID #0421</span>
        </div>
      </article>

      <article class="glass sys-card reveal">
        <div class="sys-card-head">
          <div>
            <span class="sys-id">SYS-02 // COMMERCE-CORE</span>
            <h3>E-Commerce Platform</h3>
          </div>
          <span class="status-badge"><span class="dot-pulse"></span> Online</span>
        </div>
        <p class="desc">High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
        <div class="sys-metrics">
          <div class="sys-metric"><div class="v">99.7%</div><div class="l">Uptime</div></div>
          <div class="sys-metric"><div class="v">68ms</div><div class="l">Latency</div></div>
          <div class="sys-metric"><div class="v">1.2K</div><div class="l">Orders/Day</div></div>
        </div>
        <div class="sys-spark"><canvas id="spark2"></canvas></div>
        <div class="sys-tags"><span>Laravel</span><span>Vue.js</span><span>MySQL</span><span>Redis</span><span>Stripe</span></div>
        <div class="sys-card-foot">
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener" class="sys-link">View Repository <i class="fa-solid fa-arrow-right"></i></a>
          <span class="uptime-mini">PID #0533</span>
        </div>
      </article>

      <article class="glass sys-card reveal">
        <div class="sys-card-head">
          <div>
            <span class="sys-id">SYS-03 // ANALYTICS-GRID</span>
            <h3>SaaS Analytics Dashboard</h3>
          </div>
          <span class="status-badge"><span class="dot-pulse"></span> Online</span>
        </div>
        <p class="desc">Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
        <div class="sys-metrics">
          <div class="sys-metric"><div class="v">99.95%</div><div class="l">Uptime</div></div>
          <div class="sys-metric"><div class="v">31ms</div><div class="l">Latency</div></div>
          <div class="sys-metric"><div class="v">2.4M</div><div class="l">Events/Day</div></div>
        </div>
        <div class="sys-spark"><canvas id="spark3"></canvas></div>
        <div class="sys-tags"><span>Laravel</span><span>Livewire</span><span>Alpine.js</span><span>PostgreSQL</span><span>Chart.js</span></div>
        <div class="sys-card-foot">
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener" class="sys-link">View Repository <i class="fa-solid fa-arrow-right"></i></a>
          <span class="uptime-mini">PID #0678</span>
        </div>
      </article>

      <article class="glass sys-card reveal">
        <div class="sys-card-head">
          <div>
            <span class="sys-id">SYS-04 // INVENTORY-ERP</span>
            <h3>Inventory Management System</h3>
          </div>
          <span class="status-badge"><span class="dot-pulse"></span> Online</span>
        </div>
        <p class="desc">Custom-built inventory &amp; ERP automation module for enterprise clients — stock tracking, procurement workflows, and reporting.</p>
        <div class="sys-metrics">
          <div class="sys-metric"><div class="v">99.8%</div><div class="l">Uptime</div></div>
          <div class="sys-metric"><div class="v">55ms</div><div class="l">Latency</div></div>
          <div class="sys-metric"><div class="v">18K</div><div class="l">SKUs Tracked</div></div>
        </div>
        <div class="sys-spark"><canvas id="spark4"></canvas></div>
        <div class="sys-tags"><span>PHP</span><span>Laravel</span><span>MySQL</span><span>REST API</span></div>
        <div class="sys-card-foot">
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener" class="sys-link">View Repository <i class="fa-solid fa-arrow-right"></i></a>
          <span class="uptime-mini">PID #0715</span>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ============================= EXPERIENCE — CITY DEVELOPMENT TIMELINE ============================= -->
<section class="section" id="experience">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow"><i class="fa-solid fa-trowel"></i> Development Timeline</div>
      <h2 class="section-title">City <span class="grad-text">Growth Phases</span></h2>
      <p class="section-desc">Career progression mapped as expanding development zones — each phase building on the last.</p>
    </div>

    <div class="timeline">
      <div class="tl-zone reveal">
        <div class="tl-dot"><i class="fa-solid fa-tower-broadcast"></i></div>
        <div class="glass tl-card">
          <div class="tl-head">
            <div>
              <div class="tl-zone-tag">Zone 03 // Phase III — Current Expansion</div>
              <div class="tl-role">Software Engineer</div>
              <div class="tl-company">Natore IT</div>
            </div>
            <div class="tl-dates">2025 — Present</div>
          </div>
          <p class="tl-desc">Frontend optimization and database management for local business clients, improving load times and data reliability across client-facing systems.</p>
          <span class="tl-status active"><span class="dot-pulse"></span> Active Zone</span>
        </div>
      </div>

      <div class="tl-zone completed reveal">
        <div class="tl-dot"><i class="fa-solid fa-building"></i></div>
        <div class="glass tl-card">
          <div class="tl-head">
            <div>
              <div class="tl-zone-tag">Zone 02 // Phase II — Infrastructure Build</div>
              <div class="tl-role">Software Developer</div>
              <div class="tl-company">Isotope IT</div>
            </div>
            <div class="tl-dates">2023 — 2025</div>
          </div>
          <p class="tl-desc">Specialized in PHP/Laravel web applications and custom inventory management modules for enterprise clients.</p>
          <span class="tl-status done"><i class="fa-solid fa-circle-check"></i> Phase Complete</span>
        </div>
      </div>

      <div class="tl-zone completed reveal">
        <div class="tl-dot"><i class="fa-solid fa-industry"></i></div>
        <div class="glass tl-card">
          <div class="tl-head">
            <div>
              <div class="tl-zone-tag">Zone 01 // Phase I — Foundation</div>
              <div class="tl-role">Software Engineer</div>
              <div class="tl-company">Barcode Tech Automation Ltd</div>
            </div>
            <div class="tl-dates">2022 — 2023</div>
          </div>
          <p class="tl-desc">Led development of enterprise automation solutions and ERP systems integration, laying the groundwork for future scalable projects.</p>
          <span class="tl-status done"><i class="fa-solid fa-circle-check"></i> Phase Complete</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================= BLOG ============================= -->
<section class="section" id="blog">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow"><i class="fa-solid fa-rss"></i> News Feed</div>
      <h2 class="section-title">Latest <span class="grad-text">Broadcasts</span></h2>
      <p class="section-desc">Notes from the field — performance tuning, database design and API architecture.</p>
    </div>

    <div class="blog-grid">
      <article class="glass blog-card reveal">
        <div class="blog-icon"><i class="fa-solid fa-gauge-high"></i></div>
        <div class="blog-meta"><span><i class="fa-regular fa-calendar"></i> May 2026</span><span><i class="fa-regular fa-clock"></i> 6 min read</span></div>
        <h3>5 Laravel Performance Tricks I Actually Use in Production</h3>
        <p>From eager-loading pitfalls to queue-driven jobs — the small changes that made the biggest difference in real client apps.</p>
        <a href="#" class="blog-readmore">Read Transmission <i class="fa-solid fa-arrow-right"></i></a>
      </article>

      <article class="glass blog-card reveal">
        <div class="blog-icon"><i class="fa-solid fa-database"></i></div>
        <div class="blog-meta"><span><i class="fa-regular fa-calendar"></i> Mar 2026</span><span><i class="fa-regular fa-clock"></i> 8 min read</span></div>
        <h3>Optimizing MySQL for High-Traffic Laravel Apps</h3>
        <p>Indexing strategy, query profiling and a Redis caching layer that cut our average response time significantly.</p>
        <a href="#" class="blog-readmore">Read Transmission <i class="fa-solid fa-arrow-right"></i></a>
      </article>

      <article class="glass blog-card reveal">
        <div class="blog-icon"><i class="fa-solid fa-diagram-project"></i></div>
        <div class="blog-meta"><span><i class="fa-regular fa-calendar"></i> Jan 2026</span><span><i class="fa-regular fa-clock"></i> 7 min read</span></div>
        <h3>Designing REST APIs for ERP Systems That Don't Break</h3>
        <p>Versioning, idempotency and integration patterns that keep enterprise ERP connections stable under change.</p>
        <a href="#" class="blog-readmore">Read Transmission <i class="fa-solid fa-arrow-right"></i></a>
      </article>
    </div>
  </div>
</section>

<!-- ============================= CONTACT ============================= -->
<section class="section" id="contact">
  <div class="container">
    <div class="section-head reveal">
      <div class="eyebrow"><i class="fa-solid fa-satellite"></i> Contact</div>
      <h2 class="section-title">Open a <span class="grad-text">Channel</span></h2>
      <p class="section-desc">Have a project, a role, or just want to talk shop? Send a transmission below.</p>
    </div>

    <div class="contact-grid">
      <div class="contact-channels reveal">
        <a class="glass channel-card" href="mailto:mrm.khan.1298@gmail.com">
          <div class="channel-icon"><i class="fa-solid fa-envelope"></i></div>
          <div class="channel-body"><h4>Email</h4><p>mrm.khan.1298@gmail.com</p></div>
          <span class="channel-status status-badge"><span class="dot-pulse"></span> Online</span>
        </a>
        <a class="glass channel-card" href="https://github.com/mestiaque" target="_blank" rel="noopener">
          <div class="channel-icon"><i class="fa-brands fa-github"></i></div>
          <div class="channel-body"><h4>GitHub</h4><p>github.com/mestiaque</p></div>
          <span class="channel-status status-badge"><span class="dot-pulse"></span> Online</span>
        </a>
        <a class="glass channel-card" href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener">
          <div class="channel-icon"><i class="fa-brands fa-linkedin-in"></i></div>
          <div class="channel-body"><h4>LinkedIn</h4><p>linkedin.com/in/mestiaque</p></div>
          <span class="channel-status status-badge"><span class="dot-pulse"></span> Online</span>
        </a>
      </div>

      <div class="glass contact-form-panel reveal">
        <h3><i class="fa-solid fa-terminal" style="color:var(--cyan)"></i> Transmission Console</h3>
        <form id="contact-form" novalidate>
          <div class="form-grid">
            <div class="form-group">
              <label for="cf-name">Name</label>
              <input type="text" id="cf-name" name="name" placeholder="Your full name" required autocomplete="name" />
            </div>
            <div class="form-group">
              <label for="cf-email">Email</label>
              <input type="email" id="cf-email" name="email" placeholder="you@example.com" required autocomplete="email" />
            </div>
            <div class="form-group full">
              <label for="cf-subject">Subject</label>
              <input type="text" id="cf-subject" name="subject" placeholder="What's this about?" required />
            </div>
            <div class="form-group full">
              <label for="cf-message">Message</label>
              <textarea id="cf-message" name="message" rows="5" placeholder="Tell me a bit about the project or opportunity..." required></textarea>
            </div>
          </div>
          <div class="form-submit-row">
            <button type="submit" class="btn btn-primary" id="cf-submit"><i class="fa-solid fa-paper-plane"></i> <span id="cf-submit-text">Send Transmission</span></button>
            <span class="form-status" id="cf-status" role="status" aria-live="polite"></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</main>

<!-- ============================= FOOTER ============================= -->
<footer>
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">
        <div class="brand">
          <span class="brand-mark">MK</span>
          <span class="brand-text">M.EAK <span>// DASHBOARD</span></span>
        </div>
        <p>Software Engineer building reliable Laravel systems, dashboards and ERP integrations — one deploy at a time.</p>
        <div class="footer-socials">
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
          <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="mailto:mrm.khan.1298@gmail.com" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Navigate</h4>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#overview">Overview</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#projects">Projects</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>More</h4>
        <ul>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>System</h4>
        <span class="footer-status"><span class="dot-pulse"></span> All Systems Operational</span>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <span id="footer-year">2026</span> M. Estiaque Ahmed Khan. All rights reserved.</span>
      <span class="fm">BUILT WITH LARAVEL BLADE // v1.0.0</span>
    </div>
  </div>
</footer>

<button id="back-to-top" aria-label="Back to top"><i class="fa-solid fa-arrow-up"></i></button>

<script>
(function () {
  "use strict";
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------------------------------------------------------------------
     NAV: scroll state, mobile toggle, scrollspy, smooth scroll
  --------------------------------------------------------------------- */
  var nav = document.getElementById('site-nav');
  var navToggle = document.getElementById('nav-toggle');
  var navToggleIcon = document.getElementById('nav-toggle-icon');
  var navLinks = document.getElementById('nav-links');
  var navLinkItems = navLinks.querySelectorAll('a');

  function onScrollNav() {
    if (window.scrollY > 40) nav.classList.add('scrolled');
    else nav.classList.remove('scrolled');
  }
  window.addEventListener('scroll', onScrollNav, { passive: true });
  onScrollNav();

  navToggle.addEventListener('click', function () {
    var open = navLinks.classList.toggle('open');
    navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    navToggleIcon.className = open ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
  });
  navLinkItems.forEach(function (a) {
    a.addEventListener('click', function () {
      navLinks.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
      navToggleIcon.className = 'fa-solid fa-bars';
    });
  });

  var sections = Array.prototype.slice.call(document.querySelectorAll('main section[id], header#home'));
  if ('IntersectionObserver' in window) {
    var spy = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var id = entry.target.getAttribute('id');
          navLinkItems.forEach(function (a) {
            a.classList.toggle('active', a.getAttribute('href') === '#' + id);
          });
        }
      });
    }, { rootMargin: '-45% 0px -45% 0px', threshold: 0 });
    sections.forEach(function (s) { spy.observe(s); });
  }

  /* ---------------------------------------------------------------------
     SCROLL PROGRESS + BACK TO TOP
  --------------------------------------------------------------------- */
  var progressBar = document.getElementById('scroll-progress');
  var backToTop = document.getElementById('back-to-top');
  function onScrollProgress() {
    var h = document.documentElement;
    var scrolled = h.scrollTop;
    var height = h.scrollHeight - h.clientHeight;
    var pct = height > 0 ? (scrolled / height) * 100 : 0;
    progressBar.style.width = pct + '%';
    if (scrolled > 600) backToTop.classList.add('show');
    else backToTop.classList.remove('show');
  }
  window.addEventListener('scroll', onScrollProgress, { passive: true });
  onScrollProgress();
  backToTop.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
  });

  /* ---------------------------------------------------------------------
     CURSOR GLOW (desktop only)
  --------------------------------------------------------------------- */
  var cursorGlow = document.getElementById('cursor-glow');
  if (window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches && !reduceMotion) {
    window.addEventListener('mousemove', function (e) {
      cursorGlow.style.opacity = '1';
      cursorGlow.style.transform = 'translate(' + e.clientX + 'px,' + e.clientY + 'px) translate(-50%,-50%)';
    });
    window.addEventListener('mouseleave', function () { cursorGlow.style.opacity = '0'; });
  }

  /* ---------------------------------------------------------------------
     LIVE CLOCK
  --------------------------------------------------------------------- */
  var clockText = document.getElementById('clock-text');
  function tickClock() {
    var d = new Date();
    var hh = String(d.getHours()).padStart(2, '0');
    var mm = String(d.getMinutes()).padStart(2, '0');
    var ss = String(d.getSeconds()).padStart(2, '0');
    clockText.textContent = hh + ':' + mm + ':' + ss;
  }
  tickClock();
  setInterval(tickClock, 1000);
  document.getElementById('footer-year').textContent = String(new Date().getFullYear());

  /* ---------------------------------------------------------------------
     GENERIC REVEAL-ON-SCROLL
  --------------------------------------------------------------------- */
  var revealEls = document.querySelectorAll('.reveal, .reveal-scale');
  if ('IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.14, rootMargin: '0px 0px -60px 0px' });
    revealEls.forEach(function (el) { revealObserver.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('in-view'); });
  }

  /* ---------------------------------------------------------------------
     COUNT-UP ANIMATION (hero stats, dashboard tiles, skill percentages)
  --------------------------------------------------------------------- */
  function animateCount(el) {
    var target = parseFloat(el.getAttribute('data-count'), 10);
    if (isNaN(target)) return;
    var suffix = el.getAttribute('data-suffix');
    var isPercent = el.classList.contains('skill-pct');
    var duration = 1400;
    var startTime = null;
    function step(ts) {
      if (!startTime) startTime = ts;
      var progress = Math.min((ts - startTime) / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      var current = Math.round(target * eased);
      if (isPercent) {
        el.textContent = current + '%';
      } else if (suffix !== null) {
        el.textContent = current + suffix;
      } else {
        el.textContent = current;
      }
      if (progress < 1) requestAnimationFrame(step);
    }
    if (reduceMotion) {
      el.textContent = isPercent ? target + '%' : (suffix !== null ? target + suffix : target);
    } else {
      requestAnimationFrame(step);
    }
  }

  var countEls = document.querySelectorAll('[data-count]');
  if ('IntersectionObserver' in window) {
    var countObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCount(entry.target);
          countObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    countEls.forEach(function (el) { countObserver.observe(el); });
  } else {
    countEls.forEach(animateCount);
  }

  /* ---------------------------------------------------------------------
     HERO CANVAS — constellation particle network
  --------------------------------------------------------------------- */
  (function heroParticles() {
    var canvas = document.getElementById('hero-canvas');
    if (!canvas || reduceMotion) return;
    var ctx = canvas.getContext('2d');
    var particles = [];
    var w, h, dpr;

    function resize() {
      dpr = Math.min(window.devicePixelRatio || 1, 2);
      w = canvas.parentElement.offsetWidth || window.innerWidth;
      h = canvas.parentElement.offsetHeight || window.innerHeight;
      canvas.width = w * dpr;
      canvas.height = h * dpr;
      canvas.style.width = w + 'px';
      canvas.style.height = h + 'px';
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }

    function initParticles() {
      var count = Math.max(28, Math.min(60, Math.floor((w * h) / 26000)));
      particles = [];
      for (var i = 0; i < count; i++) {
        particles.push({
          x: Math.random() * w,
          y: Math.random() * h,
          vx: (Math.random() - 0.5) * 0.35,
          vy: (Math.random() - 0.5) * 0.35,
          r: Math.random() * 1.6 + 0.8
        });
      }
    }

    function draw() {
      ctx.clearRect(0, 0, w, h);
      for (var i = 0; i < particles.length; i++) {
        var p = particles[i];
        p.x += p.vx; p.y += p.vy;
        if (p.x < 0 || p.x > w) p.vx *= -1;
        if (p.y < 0 || p.y > h) p.vy *= -1;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(34,211,238,0.65)';
        ctx.fill();
      }
      for (var a = 0; a < particles.length; a++) {
        for (var b = a + 1; b < particles.length; b++) {
          var dx = particles[a].x - particles[b].x;
          var dy = particles[a].y - particles[b].y;
          var dist = Math.sqrt(dx * dx + dy * dy);
          if (dist < 130) {
            ctx.beginPath();
            ctx.moveTo(particles[a].x, particles[a].y);
            ctx.lineTo(particles[b].x, particles[b].y);
            ctx.strokeStyle = 'rgba(167,139,250,' + (0.22 * (1 - dist / 130)) + ')';
            ctx.lineWidth = 1;
            ctx.stroke();
          }
        }
      }
      requestAnimationFrame(draw);
    }

    resize();
    initParticles();
    draw();
    window.addEventListener('resize', function () {
      resize();
      initParticles();
    });
  })();

  /* ---------------------------------------------------------------------
     CITY GRID — abstract interactive map (SVG built at runtime)
  --------------------------------------------------------------------- */
  (function buildCityGrid() {
    var svg = document.getElementById('city-map-svg');
    var tooltip = document.getElementById('city-tooltip');
    var wrap = svg.closest('.citymap-panel');
    if (!svg) return;
    var SVGNS = 'http://www.w3.org/2000/svg';
    var W = 600, H = 320;
    var cols = 14, rows = 7;
    var cellW = W / cols, cellH = H / rows;

    function el(tag, attrs) {
      var node = document.createElementNS(SVGNS, tag);
      for (var k in attrs) { node.setAttribute(k, attrs[k]); }
      return node;
    }

    // background connecting grid lines
    var gridGroup = el('g', { opacity: '0.25' });
    for (var c = 1; c < cols; c++) {
      gridGroup.appendChild(el('line', { x1: c * cellW, y1: 0, x2: c * cellW, y2: H, stroke: '#22d3ee', 'stroke-width': '0.5' }));
    }
    for (var r = 1; r < rows; r++) {
      gridGroup.appendChild(el('line', { x1: 0, y1: r * cellH, x2: W, y2: r * cellH, stroke: '#22d3ee', 'stroke-width': '0.5' }));
    }
    svg.appendChild(gridGroup);

    // deterministic pseudo-random "buildings" (rects of varying height) for a skyline-grid feel
    var seed = 42;
    function rand() { seed = (seed * 9301 + 49297) % 233280; return seed / 233280; }
    var buildGroup = el('g');
    for (var i = 0; i < cols; i++) {
      for (var j = 0; j < rows; j++) {
        if (rand() > 0.62) continue;
        var bw = cellW * 0.4;
        var bh = cellH * (0.25 + rand() * 0.65);
        var bx = i * cellW + (cellW - bw) / 2;
        var by = (j + 1) * cellH - bh;
        var rect = el('rect', {
          x: bx, y: by, width: bw, height: bh, rx: 2,
          fill: rand() > 0.5 ? 'rgba(34,211,238,0.14)' : 'rgba(167,139,250,0.12)',
          stroke: 'rgba(255,255,255,0.08)', 'stroke-width': '0.6'
        });
        buildGroup.appendChild(rect);
      }
    }
    svg.appendChild(buildGroup);

    // landmark nodes — clickable, linked to real sections
    var landmarks = [
      { x: 1, y: 1, label: 'Skills District', target: '#skills', icon: 'S' },
      { x: 6, y: 2, label: 'Projects Zone', target: '#projects', icon: 'P' },
      { x: 11, y: 1, label: 'Experience Sector', target: '#experience', icon: 'E' },
      { x: 3, y: 5, label: 'Blog Terminal', target: '#blog', icon: 'B' },
      { x: 9, y: 5, label: 'Contact Hub', target: '#contact', icon: 'C' }
    ];
    var nodeGroup = el('g');
    var linkGroup = el('g', { opacity: '0.55' });

    var points = landmarks.map(function (l) {
      return { cx: l.x * cellW + cellW / 2, cy: l.y * cellH + cellH / 2 };
    });
    for (var p = 0; p < points.length; p++) {
      var next = points[(p + 1) % points.length];
      var line = el('line', {
        x1: points[p].cx, y1: points[p].cy, x2: next.cx, y2: next.cy,
        stroke: 'url(#cityLinkGrad)', 'stroke-width': '1', 'stroke-dasharray': '4 4'
      });
      linkGroup.appendChild(line);
    }

    var defs = el('defs', {});
    var grad = el('linearGradient', { id: 'cityLinkGrad', x1: '0%', y1: '0%', x2: '100%', y2: '0%' });
    grad.appendChild(el('stop', { offset: '0%', 'stop-color': '#22d3ee' }));
    grad.appendChild(el('stop', { offset: '100%', 'stop-color': '#a78bfa' }));
    defs.appendChild(grad);
    svg.appendChild(defs);
    svg.appendChild(linkGroup);

    landmarks.forEach(function (l) {
      var cx = l.x * cellW + cellW / 2;
      var cy = l.y * cellH + cellH / 2;
      var g = el('g', { class: 'city-node', style: 'cursor:pointer', tabindex: '0', role: 'link', 'aria-label': 'Go to ' + l.label });

      var glow = el('circle', { cx: cx, cy: cy, r: 12, fill: '#22d3ee', opacity: '0.18' });
      var ring = el('circle', { cx: cx, cy: cy, r: 7, fill: 'none', stroke: '#a78bfa', 'stroke-width': '1.4' });
      var core = el('circle', { cx: cx, cy: cy, r: 4, fill: '#22d3ee' });

      var pulse = el('circle', { cx: cx, cy: cy, r: 4, fill: 'none', stroke: '#22d3ee', 'stroke-width': '1.2' });
      var animR = el('animate', { attributeName: 'r', from: '4', to: '16', dur: '2.4s', begin: (Math.random() * 2) + 's', repeatCount: 'indefinite' });
      var animOp = el('animate', { attributeName: 'opacity', from: '0.7', to: '0', dur: '2.4s', begin: (Math.random() * 2) + 's', repeatCount: 'indefinite' });
      pulse.appendChild(animR);
      pulse.appendChild(animOp);

      g.appendChild(glow);
      g.appendChild(pulse);
      g.appendChild(ring);
      g.appendChild(core);

      function activate() {
        var targetEl = document.querySelector(l.target);
        if (targetEl) targetEl.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth' });
      }
      g.addEventListener('click', activate);
      g.addEventListener('keydown', function (ev) {
        if (ev.key === 'Enter' || ev.key === ' ') { ev.preventDefault(); activate(); }
      });
      g.addEventListener('mouseenter', function () {
        ring.setAttribute('r', '9');
        showTip(l.label, cx, cy);
      });
      g.addEventListener('mouseleave', function () {
        ring.setAttribute('r', '7');
        hideTip();
      });
      g.addEventListener('focus', function () { showTip(l.label, cx, cy); });
      g.addEventListener('blur', hideTip);

      nodeGroup.appendChild(g);
    });
    svg.appendChild(nodeGroup);

    function showTip(text, cx, cy) {
      if (!tooltip || !wrap) return;
      var svgRect = svg.getBoundingClientRect();
      var wrapRect = wrap.getBoundingClientRect();
      var scaleX = svgRect.width / W;
      var scaleY = svgRect.height / H;
      var left = (svgRect.left - wrapRect.left) + cx * scaleX;
      var top = (svgRect.top - wrapRect.top) + cy * scaleY;
      tooltip.textContent = text;
      tooltip.style.left = left + 'px';
      tooltip.style.top = top + 'px';
      tooltip.classList.add('show');
    }
    function hideTip() { if (tooltip) tooltip.classList.remove('show'); }
  })();

  /* ---------------------------------------------------------------------
     CHART.JS — Skills radar, gauge, project sparklines
  --------------------------------------------------------------------- */
  var chartDefaultsSet = false;
  function setChartDefaults() {
    if (chartDefaultsSet || typeof Chart === 'undefined') return;
    Chart.defaults.font.family = "'JetBrains Mono', monospace";
    Chart.defaults.color = '#8ea0bd';
    chartDefaultsSet = true;
  }

  function initRadarChart() {
    if (typeof Chart === 'undefined') return;
    setChartDefaults();
    var ctx = document.getElementById('radarChart');
    if (!ctx || ctx.dataset.built) return;
    ctx.dataset.built = '1';
    new Chart(ctx, {
      type: 'radar',
      data: {
        labels: ['Backend', 'Frontend', 'Database', 'DevOps & Cloud'],
        datasets: [{
          label: 'Avg. Proficiency',
          data: [89, 89, 85, 82],
          backgroundColor: 'rgba(34,211,238,0.18)',
          borderColor: '#22d3ee',
          pointBackgroundColor: '#a78bfa',
          pointBorderColor: '#0b0f1c',
          borderWidth: 2,
          pointRadius: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        animation: { duration: 1400, easing: 'easeOutQuart' },
        plugins: {
          legend: { display: false },
          tooltip: {
            backgroundColor: '#0b0f1c', borderColor: '#22d3ee', borderWidth: 1,
            titleFont: { family: "'JetBrains Mono', monospace" }, bodyFont: { family: "'JetBrains Mono', monospace" },
            callbacks: { label: function (c) { return c.formattedValue + '%'; } }
          }
        },
        scales: {
          r: {
            angleLines: { color: 'rgba(255,255,255,0.09)' },
            grid: { color: 'rgba(255,255,255,0.09)' },
            pointLabels: { color: '#c3cee0', font: { size: 11 } },
            ticks: { display: false, stepSize: 25 },
            suggestedMin: 0, suggestedMax: 100
          }
        }
      }
    });
  }

  function initGaugeChart() {
    if (typeof Chart === 'undefined') return;
    setChartDefaults();
    var ctx = document.getElementById('gaugeChart');
    if (!ctx || ctx.dataset.built) return;
    ctx.dataset.built = '1';
    var score = 87;
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Score', 'Remaining'],
        datasets: [{
          data: [score, 100 - score],
          backgroundColor: ['#22d3ee', 'rgba(255,255,255,0.06)'],
          borderWidth: 0,
          circumference: 270,
          rotation: 225,
          cutout: '78%'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        animation: { duration: 1400, easing: 'easeOutQuart' },
        plugins: { legend: { display: false }, tooltip: { enabled: false } }
      }
    });
    var numberEl = document.getElementById('gauge-number');
    var start = null;
    function step(ts) {
      if (!start) start = ts;
      var progress = Math.min((ts - start) / 1400, 1);
      numberEl.textContent = Math.round(score * (1 - Math.pow(1 - progress, 3))) + '%';
      if (progress < 1) requestAnimationFrame(step);
    }
    if (reduceMotion) numberEl.textContent = score + '%';
    else requestAnimationFrame(step);
  }

  function sparkData(seedOffset) {
    var arr = [];
    var v = 45 + seedOffset;
    for (var i = 0; i < 16; i++) {
      v += (Math.sin(i * 0.7 + seedOffset) * 10) + (Math.random() * 6 - 3);
      arr.push(Math.max(10, Math.min(95, Math.round(v))));
    }
    return arr;
  }

  function initSparklines() {
    if (typeof Chart === 'undefined') return;
    setChartDefaults();
    var ids = ['spark1', 'spark2', 'spark3', 'spark4'];
    var colors = ['#22d3ee', '#a78bfa', '#f472b6', '#fbbf24'];
    ids.forEach(function (id, idx) {
      var ctx = document.getElementById(id);
      if (!ctx || ctx.dataset.built) return;
      ctx.dataset.built = '1';
      var data = sparkData(idx * 3);
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: data.map(function (_, i) { return i; }),
          datasets: [{
            data: data,
            borderColor: colors[idx],
            backgroundColor: colors[idx] + '22',
            borderWidth: 2,
            pointRadius: 0,
            tension: 0.4,
            fill: true
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          animation: { duration: 1200, easing: 'easeOutQuart' },
          plugins: { legend: { display: false }, tooltip: { enabled: false } },
          scales: { x: { display: false }, y: { display: false } },
          elements: { line: { borderJoinStyle: 'round' } }
        }
      });
    });
  }

  // Lazy-init charts only when their section scrolls into view (perf + replay-safe)
  if ('IntersectionObserver' in window) {
    var skillsSection = document.getElementById('skills');
    var projectsSection = document.getElementById('projects');
    if (skillsSection) {
      var skillsObs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            initRadarChart();
            initGaugeChart();
            skillsObs.disconnect();
          }
        });
      }, { threshold: 0.2 });
      skillsObs.observe(skillsSection);
    }
    if (projectsSection) {
      var projObs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            initSparklines();
            projObs.disconnect();
          }
        });
      }, { threshold: 0.2 });
      projObs.observe(projectsSection);
    }
  } else {
    window.addEventListener('load', function () {
      initRadarChart();
      initGaugeChart();
      initSparklines();
    });
  }

  /* ---------------------------------------------------------------------
     CONTACT FORM — submits via fetch() as JSON
  --------------------------------------------------------------------- */
  var form = document.getElementById('contact-form');
  var statusEl = document.getElementById('cf-status');
  var submitBtn = document.getElementById('cf-submit');
  var submitText = document.getElementById('cf-submit-text');

  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var name = document.getElementById('cf-name').value.trim();
      var email = document.getElementById('cf-email').value.trim();
      var subject = document.getElementById('cf-subject').value.trim();
      var message = document.getElementById('cf-message').value.trim();

      statusEl.className = 'form-status';
      statusEl.textContent = '';

      if (!name || !email || !subject || !message) {
        statusEl.classList.add('error');
        statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Please fill in every field before transmitting.';
        return;
      }

      submitBtn.setAttribute('disabled', 'true');
      submitText.textContent = 'Transmitting…';
      statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Sending your message...';

      fetch('/api/messages-store', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify({ name: name, email: email, subject: subject, message: message })
      })
        .then(function (res) {
          if (!res.ok) throw new Error('Request failed with status ' + res.status);
          return res.json().catch(function () { return {}; });
        })
        .then(function () {
          statusEl.className = 'form-status success';
          statusEl.innerHTML = '<i class="fa-solid fa-circle-check"></i> Transmission received — I\'ll reply soon.';
          form.reset();
        })
        .catch(function () {
          statusEl.className = 'form-status error';
          statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Transmission failed. Please email me directly.';
        })
        .finally(function () {
          submitBtn.removeAttribute('disabled');
          submitText.textContent = 'Send Transmission';
        });
    });
  }
})();
</script>
</body>
</html>
