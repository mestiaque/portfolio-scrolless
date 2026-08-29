<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
<title>M. Estiaque Ahmed Khan | Space Explorer Portfolio — Full-Stack Laravel Developer</title>
<meta name="description" content="Portfolio of M. Estiaque Ahmed Khan, a full-stack software engineer specializing in PHP, Laravel, Vue.js and ERP systems integration — presented as an immersive space exploration experience." />
<meta name="theme-color" content="#0a0e27" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- GSAP + ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<style>
/* ============================================================
   RESET & BASE
   ============================================================ */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

:root {
  --bg-deep: #05060f;
  --bg-navy: #0a0e27;
  --bg-navy-2: #0d1230;
  --purple: #a855f7;
  --purple-2: #7c3aed;
  --cyan: #22d3ee;
  --cyan-2: #06b6d4;
  --white: #f8fafc;
  --muted: #94a3b8;
  --muted-dim: #64748b;
  --glass-bg: rgba(255, 255, 255, 0.045);
  --glass-bg-2: rgba(255, 255, 255, 0.08);
  --glass-border: rgba(255, 255, 255, 0.12);
  --glass-shadow: rgba(0, 0, 0, 0.45);
  --space-1: 8px;
  --space-2: 16px;
  --space-3: 24px;
  --space-4: 32px;
  --space-5: 48px;
  --space-6: 64px;
  --space-7: 96px;
  --radius-sm: 10px;
  --radius-md: 18px;
  --radius-lg: 28px;
  --ease: cubic-bezier(0.16, 1, 0.3, 1);
}

html {
  scroll-behavior: smooth;
  scroll-padding-top: 90px;
}

@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }
  *, *::before, *::after {
    animation-duration: 0.001ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.001ms !important;
    scroll-behavior: auto !important;
  }
}

body {
  font-family: 'Inter', sans-serif;
  background: var(--bg-deep);
  color: var(--white);
  overflow-x: hidden;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
}

img, svg { max-width: 100%; display: block; }
a { color: inherit; text-decoration: none; }
ul, ol { list-style: none; }
button { font: inherit; cursor: pointer; }
input, textarea { font: inherit; }

::selection { background: var(--purple); color: #fff; }

::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: var(--bg-deep); }
::-webkit-scrollbar-thumb { background: linear-gradient(var(--purple), var(--cyan)); border-radius: 10px; }

/* Focus states for accessibility */
a:focus-visible,
button:focus-visible,
input:focus-visible,
textarea:focus-visible,
[tabindex]:focus-visible {
  outline: 2px solid var(--cyan);
  outline-offset: 3px;
  border-radius: 4px;
}

.skip-link {
  position: absolute;
  top: -60px;
  left: 12px;
  background: var(--cyan);
  color: #041016;
  padding: 10px 18px;
  border-radius: 8px;
  font-weight: 700;
  z-index: 999;
  transition: top 0.25s var(--ease);
}
.skip-link:focus { top: 12px; }

/* ============================================================
   PRELOADER
   ============================================================ */
#preloader {
  position: fixed;
  inset: 0;
  z-index: 9999;
  background: var(--bg-deep);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 18px;
  animation: preloaderOut 0.6s ease 1.3s forwards;
}
.preloader-rocket {
  font-size: 2.4rem;
  color: var(--cyan);
  text-shadow: 0 0 25px var(--cyan);
  animation: rocketPulse 1s ease-in-out infinite;
}
.preloader-text {
  font-family: 'Orbitron', sans-serif;
  font-size: 0.7rem;
  letter-spacing: 0.35em;
  color: var(--muted);
  text-transform: uppercase;
}
.preloader-bar {
  width: 180px;
  height: 3px;
  background: rgba(255,255,255,0.08);
  border-radius: 3px;
  overflow: hidden;
}
.preloader-bar::after {
  content: '';
  display: block;
  height: 100%;
  width: 40%;
  background: linear-gradient(90deg, var(--purple), var(--cyan));
  animation: barSlide 1.1s ease-in-out infinite;
}
@keyframes barSlide { 0% { transform: translateX(-100%);} 100% { transform: translateX(350%);} }
@keyframes rocketPulse { 0%,100% { transform: translateY(0) rotate(-45deg); } 50% { transform: translateY(-10px) rotate(-45deg); } }
@keyframes preloaderOut { to { opacity: 0; visibility: hidden; pointer-events: none; } }

/* ============================================================
   STARFIELD / BACKGROUND LAYERS
   ============================================================ */
#starfield-canvas {
  position: fixed;
  inset: 0;
  z-index: 0;
  pointer-events: none;
  width: 100%;
  height: 100%;
}

.bg-nebula {
  position: fixed;
  inset: 0;
  z-index: 0;
  pointer-events: none;
  overflow: hidden;
}
.nebula-blob {
  position: absolute;
  border-radius: 50%;
  filter: blur(110px);
  opacity: 0.32;
  will-change: transform;
  animation: nebulaFloat 16s ease-in-out infinite alternate;
}
.nebula-1 { width: 560px; height: 560px; background: radial-gradient(circle, var(--purple-2), transparent 70%); top: -12%; left: -10%; }
.nebula-2 { width: 480px; height: 480px; background: radial-gradient(circle, var(--cyan-2), transparent 70%); bottom: -8%; right: -8%; animation-delay: -6s; }
.nebula-3 { width: 420px; height: 420px; background: radial-gradient(circle, #c026d3, transparent 70%); top: 45%; left: 55%; animation-delay: -11s; }
@keyframes nebulaFloat { 0% { transform: translate(0,0) scale(1); } 100% { transform: translate(50px, 35px) scale(1.12); } }

.shooting-star {
  position: fixed;
  top: 0; left: 0;
  width: 3px; height: 3px;
  background: #fff;
  border-radius: 50%;
  box-shadow: 0 0 0 1px rgba(255,255,255,.1), 0 0 12px 2px #fff, -40px 0 12px rgba(255,255,255,.4);
  z-index: 1;
  pointer-events: none;
  animation: shootAcross linear forwards;
}
.shooting-star::before {
  content: '';
  position: absolute;
  top: 50%; right: 0;
  width: 120px; height: 1px;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,.8));
  transform: translateY(-50%);
}
@keyframes shootAcross {
  0% { transform: translate(0,0) rotate(215deg); opacity: 1; }
  85% { opacity: 1; }
  100% { transform: translate(-820px, 560px) rotate(215deg); opacity: 0; }
}

.cursor-glow {
  position: fixed;
  width: 420px;
  height: 420px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(168,85,247,0.10), transparent 70%);
  pointer-events: none;
  z-index: 1;
  transform: translate(-50%, -50%);
  transition: opacity 0.4s ease;
  will-change: left, top;
}

/* ============================================================
   LAYOUT HELPERS
   ============================================================ */
.wrap { max-width: 1200px; margin: 0 auto; padding-inline: var(--space-4); }
section { position: relative; z-index: 5; padding: var(--space-7) 0; }
.section-head { max-width: 680px; margin: 0 auto var(--space-6); text-align: center; }
.section-tag {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-family: 'Orbitron', sans-serif;
  font-size: 0.7rem;
  letter-spacing: 0.32em;
  color: var(--cyan);
  text-transform: uppercase;
  margin-bottom: var(--space-2);
}
.section-tag::before, .section-tag::after {
  content: '';
  width: 22px; height: 1px;
  background: var(--cyan);
  opacity: 0.6;
}
.section-title {
  font-family: 'Orbitron', sans-serif;
  font-size: clamp(1.9rem, 4.4vw, 3rem);
  font-weight: 800;
  line-height: 1.2;
  margin-bottom: var(--space-2);
}
.section-sub { color: var(--muted); font-size: 1.02rem; max-width: 560px; margin: 0 auto; }

.gradient-text {
  background: linear-gradient(135deg, var(--purple), var(--cyan) 65%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.glass {
  background: var(--glass-bg);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  border-radius: var(--radius-md);
  box-shadow: 0 20px 50px var(--glass-shadow);
}

.btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 15px 30px;
  border-radius: 999px;
  font-weight: 600;
  font-size: 0.92rem;
  letter-spacing: 0.02em;
  border: 1px solid transparent;
  transition: transform 0.35s var(--ease), box-shadow 0.35s var(--ease), background 0.35s var(--ease), border-color .35s var(--ease);
  white-space: nowrap;
}
.btn-primary {
  background: linear-gradient(135deg, var(--purple), var(--cyan-2));
  color: #04070f;
  box-shadow: 0 12px 30px rgba(168,85,247,.35);
}
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 18px 40px rgba(34,211,238,.4); }
.btn-outline {
  background: rgba(255,255,255,0.04);
  border-color: var(--glass-border);
  color: var(--white);
}
.btn-outline:hover { border-color: var(--cyan); background: rgba(34,211,238,0.08); transform: translateY(-3px); }

[data-reveal] { opacity: 0; transform: translateY(36px); transition: opacity 0.9s var(--ease), transform 0.9s var(--ease); }
[data-reveal].in-view { opacity: 1; transform: translateY(0); }
[data-reveal="left"] { transform: translateX(-44px); }
[data-reveal="left"].in-view { transform: translateX(0); }
[data-reveal="right"] { transform: translateX(44px); }
[data-reveal="right"].in-view { transform: translateX(0); }
[data-reveal="scale"] { transform: scale(0.9); }
[data-reveal="scale"].in-view { transform: scale(1); }

/* ============================================================
   NAVBAR
   ============================================================ */
#navbar {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 200;
  padding: 18px var(--space-4);
  display: flex;
  align-items: center;
  justify-content: space-between;
  transition: background 0.4s var(--ease), padding 0.4s var(--ease), border-color .4s var(--ease);
  border-bottom: 1px solid transparent;
}
#navbar.scrolled {
  background: rgba(5, 6, 15, 0.72);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  padding: 12px var(--space-4);
  border-bottom: 1px solid var(--glass-border);
}
.nav-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-family: 'Orbitron', sans-serif;
  font-weight: 800;
  font-size: 1.15rem;
  letter-spacing: 0.02em;
}
.nav-logo i { color: var(--cyan); text-shadow: 0 0 14px var(--cyan); }
.nav-links { display: flex; gap: 2rem; align-items: center; }
.nav-links a {
  font-size: 0.85rem;
  font-weight: 500;
  color: var(--muted);
  letter-spacing: 0.03em;
  position: relative;
  padding: 4px 2px;
  transition: color 0.3s;
}
.nav-links a::after {
  content: '';
  position: absolute;
  left: 0; bottom: -4px;
  width: 0; height: 2px;
  background: linear-gradient(90deg, var(--purple), var(--cyan));
  transition: width 0.3s var(--ease);
}
.nav-links a:hover, .nav-links a.active { color: var(--white); }
.nav-links a:hover::after, .nav-links a.active::after { width: 100%; }

.nav-toggle {
  display: none;
  flex-direction: column;
  gap: 5px;
  background: transparent;
  border: 1px solid var(--glass-border);
  border-radius: 10px;
  padding: 10px 12px;
  z-index: 210;
}
.nav-toggle span { width: 20px; height: 2px; background: var(--white); border-radius: 2px; transition: all 0.3s var(--ease); }
.nav-toggle.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-toggle.open span:nth-child(2) { opacity: 0; }
.nav-toggle.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

/* ============================================================
   HERO
   ============================================================ */
#home {
  min-height: 100vh;
  display: flex;
  align-items: center;
  padding-top: 120px;
  overflow: hidden;
}
.hero-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  align-items: center;
  gap: var(--space-6);
}
.hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-family: 'Orbitron', sans-serif;
  font-size: 0.72rem;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--cyan);
  background: rgba(34,211,238,0.08);
  border: 1px solid rgba(34,211,238,0.25);
  padding: 8px 16px;
  border-radius: 999px;
  margin-bottom: var(--space-3);
}
.hero-eyebrow .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--cyan); box-shadow: 0 0 10px var(--cyan); animation: blinkDot 1.6s infinite; }
@keyframes blinkDot { 0%,100% { opacity: 1;} 50% { opacity: 0.25; } }

.hero-title {
  font-family: 'Orbitron', sans-serif;
  font-weight: 900;
  font-size: clamp(2.3rem, 5.6vw, 4.2rem);
  line-height: 1.12;
  margin-bottom: var(--space-3);
}
.hero-role {
  font-size: clamp(1.05rem, 2vw, 1.35rem);
  color: var(--muted);
  font-weight: 500;
  margin-bottom: var(--space-3);
  min-height: 1.6em;
}
.hero-role .caret { display: inline-block; width: 2px; height: 1.1em; background: var(--cyan); margin-left: 3px; vertical-align: -0.15em; animation: caretBlink 1s steps(2) infinite; }
@keyframes caretBlink { 50% { opacity: 0; } }

.hero-desc { color: var(--muted); max-width: 520px; margin-bottom: var(--space-4); font-size: 1rem; }
.hero-actions { display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: var(--space-5); }

.hero-stats { display: flex; gap: var(--space-5); flex-wrap: wrap; }
.hero-stat strong { display: block; font-family: 'Orbitron', sans-serif; font-size: 1.6rem; font-weight: 800; color: var(--white); }
.hero-stat span { font-size: 0.78rem; color: var(--muted); letter-spacing: 0.04em; text-transform: uppercase; }

.hero-visual { position: relative; display: flex; align-items: center; justify-content: center; height: 520px; }
.hero-orbit-deco {
  position: absolute;
  inset: 0;
  margin: auto;
  border: 1px dashed rgba(148,163,184,0.18);
  border-radius: 50%;
}
.hero-orbit-deco.o1 { width: 340px; height: 340px; animation: spin 40s linear infinite; }
.hero-orbit-deco.o2 { width: 440px; height: 440px; animation: spin 60s linear infinite reverse; }
@keyframes spin { to { transform: rotate(360deg); } }
.hero-orbit-deco.o1::before, .hero-orbit-deco.o2::before {
  content: '';
  position: absolute;
  top: -4px; left: 50%;
  width: 8px; height: 8px;
  margin-left: -4px;
  border-radius: 50%;
  background: var(--cyan);
  box-shadow: 0 0 12px var(--cyan);
}

/* ---- CSS Astronaut ---- */
.astronaut {
  position: relative;
  width: 250px;
  height: 340px;
  animation: astroFloat 6s ease-in-out infinite;
  z-index: 3;
  filter: drop-shadow(0 25px 45px rgba(0,0,0,0.5));
}
@keyframes astroFloat {
  0%, 100% { transform: translateY(0) rotate(-2deg); }
  50% { transform: translateY(-22px) rotate(2deg); }
}
.astro-backpack {
  position: absolute;
  top: 128px; left: 50%;
  width: 118px; height: 96px;
  transform: translateX(-50%);
  background: linear-gradient(160deg, #475569, #1e293b);
  border-radius: 16px;
  z-index: 1;
}
.astro-thruster {
  position: absolute;
  bottom: -22px; left: 50%;
  width: 46px; height: 30px;
  transform: translateX(-50%);
  background: radial-gradient(ellipse at top, #22d3ee, rgba(34,211,238,0) 75%);
  filter: blur(2px);
  animation: thrusterFlicker 0.5s ease-in-out infinite alternate;
  border-radius: 0 0 50% 50%;
}
@keyframes thrusterFlicker { from { opacity: 0.5; height: 24px; } to { opacity: 1; height: 34px; } }
.astro-body {
  position: absolute;
  top: 132px; left: 50%;
  width: 172px; height: 190px;
  transform: translateX(-50%);
  background: linear-gradient(160deg, #f1f5f9, #94a3b8 55%, #64748b);
  border-radius: 56px 56px 34px 34px;
  box-shadow: inset -18px -14px 30px rgba(0,0,0,0.25), 0 18px 30px rgba(0,0,0,0.35);
  z-index: 2;
}
.astro-chest {
  position: absolute;
  top: 30px; left: 50%;
  width: 78px; height: 46px;
  transform: translateX(-50%);
  background: rgba(15,23,42,0.35);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  border: 1px solid rgba(255,255,255,0.2);
}
.astro-chest span { width: 8px; height: 8px; border-radius: 50%; background: var(--cyan); box-shadow: 0 0 8px var(--cyan); animation: chestBlink 1.8s infinite; }
.astro-chest span:nth-child(2) { background: var(--purple); box-shadow: 0 0 8px var(--purple); animation-delay: 0.4s; }
.astro-chest span:nth-child(3) { background: #f472b6; box-shadow: 0 0 8px #f472b6; animation-delay: 0.8s; }
@keyframes chestBlink { 0%,100% { opacity: 0.3; } 50% { opacity: 1; } }
.astro-arm {
  position: absolute;
  top: 148px;
  width: 46px; height: 118px;
  background: linear-gradient(160deg, #e2e8f0, #94a3b8);
  border-radius: 26px;
  z-index: 1;
}
.astro-arm.left { left: 18px; transform: rotate(18deg); transform-origin: top center; animation: armWave 6s ease-in-out infinite; }
.astro-arm.right { right: 18px; transform: rotate(-24deg); transform-origin: top center; }
@keyframes armWave { 0%,100% { transform: rotate(18deg); } 50% { transform: rotate(28deg); } }
.astro-glove { position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 34px; height: 34px; border-radius: 50%; background: #cbd5e1; }
.astro-helmet {
  position: absolute;
  top: 0; left: 50%;
  width: 168px; height: 168px;
  transform: translateX(-50%);
  border-radius: 50%;
  background: linear-gradient(150deg, #e2e8f0, #64748b 65%);
  box-shadow: 0 0 50px rgba(34,211,238,0.35), inset -14px -14px 26px rgba(0,0,0,0.3);
  z-index: 4;
}
.astro-visor {
  position: absolute;
  inset: 22px 16px 34px 16px;
  border-radius: 50% 50% 46% 46% / 58% 58% 42% 42%;
  background: radial-gradient(circle at 32% 28%, #a5f3fc, #0891b2 55%, #0c4a6e 100%);
  box-shadow: inset 0 0 22px rgba(0,0,0,0.55), 0 0 26px rgba(34,211,238,0.65);
  overflow: hidden;
}
.astro-visor::after {
  content: '';
  position: absolute;
  top: 14%; left: 18%;
  width: 30%; height: 20%;
  background: rgba(255,255,255,0.55);
  border-radius: 50%;
  filter: blur(4px);
}
.astro-visor .star-dot { position: absolute; width: 3px; height: 3px; background: #fff; border-radius: 50%; opacity: 0.8; }
.astro-badge {
  position: absolute;
  top: -6px; right: 6px;
  width: 20px; height: 20px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--purple), var(--cyan));
  z-index: 5;
  box-shadow: 0 0 12px var(--purple);
}

.scroll-cue {
  position: absolute;
  bottom: 28px; left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  color: var(--muted);
  font-size: 0.68rem;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  z-index: 6;
}
.scroll-cue .chevron { animation: chevronBounce 1.6s ease-in-out infinite; font-size: 0.9rem; color: var(--cyan); }
@keyframes chevronBounce { 0%,100% { transform: translateY(0); opacity:.4; } 50% { transform: translateY(8px); opacity: 1; } }

/* ============================================================
   ABOUT
   ============================================================ */
.about-grid { display: grid; grid-template-columns: 0.85fr 1.15fr; gap: var(--space-6); align-items: center; }
.about-panel {
  position: relative;
  aspect-ratio: 1 / 1;
  border-radius: var(--radius-lg);
  padding: 3px;
  background: conic-gradient(from 0deg, var(--purple), var(--cyan), var(--purple));
  animation: spin 14s linear infinite;
}
.about-panel-inner {
  height: 100%; width: 100%;
  border-radius: calc(var(--radius-lg) - 3px);
  background: var(--bg-navy);
  display: flex;
  align-items: center;
  justify-content: center;
  animation: spin 14s linear infinite reverse;
  position: relative;
  overflow: hidden;
}
.about-panel-inner::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(circle at 30% 20%, rgba(168,85,247,0.25), transparent 55%), radial-gradient(circle at 70% 80%, rgba(34,211,238,0.22), transparent 55%);
}
.about-panel-inner i { font-size: 5.5rem; color: var(--cyan); text-shadow: 0 0 40px var(--cyan); position: relative; z-index: 1; }
.about-copy .section-tag, .about-copy .section-title { text-align: left; }
.about-copy .section-title { margin-bottom: var(--space-3); }
.about-copy p { color: var(--muted); margin-bottom: var(--space-3); font-size: 1rem; }
.about-copy p strong { color: var(--white); font-weight: 600; }

.about-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin: var(--space-4) 0; }
.about-stat { padding: 16px 10px; text-align: center; border-radius: var(--radius-sm); }
.about-stat strong { display: block; font-family: 'Orbitron', sans-serif; font-size: 1.5rem; color: var(--cyan); }
.about-stat span { font-size: 0.68rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em; }

.edu-list { display: flex; flex-direction: column; gap: 14px; margin-top: var(--space-3); }
.edu-item { display: flex; gap: 16px; padding: 16px 18px; border-radius: var(--radius-sm); align-items: flex-start; transition: transform 0.35s var(--ease), border-color .35s; }
.edu-item:hover { transform: translateX(6px); border-color: rgba(34,211,238,0.4); }
.edu-icon { width: 42px; height: 42px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, var(--purple), var(--cyan)); flex-shrink: 0; color: #04070f; font-size: 1rem; }
.edu-item h4 { font-size: 1rem; margin-bottom: 2px; }
.edu-item p { font-size: 0.85rem; color: var(--muted); }

/* ============================================================
   SKILLS
   ============================================================ */
.skills-systems { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-4); }
.skill-system { padding: var(--space-4); border-radius: var(--radius-lg); }
.skill-system-head { display: flex; align-items: center; gap: 12px; margin-bottom: var(--space-3); }
.skill-system-head i { font-size: 1.3rem; color: var(--cyan); }
.skill-system-head h3 { font-family: 'Orbitron', sans-serif; font-size: 1.02rem; font-weight: 700; }
.skill-chips { display: flex; flex-wrap: wrap; gap: 10px; }
.skill-chip {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 9px 14px;
  border-radius: 999px;
  background: rgba(255,255,255,0.05);
  border: 1px solid var(--glass-border);
  font-size: 0.82rem;
  font-weight: 500;
  transition: transform 0.3s var(--ease), border-color 0.3s, background 0.3s, box-shadow .3s;
}
.skill-chip i { color: var(--purple); font-size: 0.9rem; }
.skill-chip:hover { transform: translateY(-4px) scale(1.04); border-color: var(--cyan); background: rgba(34,211,238,0.08); box-shadow: 0 10px 22px rgba(34,211,238,0.18); }

/* ============================================================
   EXPERIENCE
   ============================================================ */
.timeline { position: relative; max-width: 820px; margin: 0 auto; padding-left: 50px; }
.timeline::before {
  content: '';
  position: absolute;
  left: 14px; top: 8px; bottom: 8px;
  width: 2px;
  background: linear-gradient(var(--purple), var(--cyan));
  opacity: 0.4;
}
.timeline-item { position: relative; padding: var(--space-4); border-radius: var(--radius-md); margin-bottom: var(--space-4); }
.timeline-item:last-child { margin-bottom: 0; }
.timeline-node {
  position: absolute;
  left: -50px; top: var(--space-4);
  width: 30px; height: 30px;
  border-radius: 50%;
  background: radial-gradient(circle at 35% 30%, var(--cyan), var(--purple-2));
  box-shadow: 0 0 0 4px var(--bg-deep), 0 0 18px var(--cyan);
  display: flex; align-items: center; justify-content: center;
  font-size: 0.72rem;
}
.timeline-badge {
  display: inline-block;
  font-family: 'Orbitron', sans-serif;
  font-size: 0.7rem;
  letter-spacing: 0.08em;
  color: var(--cyan);
  background: rgba(34,211,238,0.1);
  border: 1px solid rgba(34,211,238,0.3);
  padding: 4px 12px;
  border-radius: 999px;
  margin-bottom: 10px;
}
.timeline-item h3 { font-size: 1.15rem; margin-bottom: 2px; }
.timeline-item .company { color: var(--purple); font-weight: 600; font-size: 0.92rem; margin-bottom: 10px; display: block; }
.timeline-item p { color: var(--muted); font-size: 0.94rem; }

/* ============================================================
   PROJECTS / ORBITAL SYSTEM
   ============================================================ */
.orbit-stage { display: flex; flex-direction: column; align-items: center; gap: var(--space-5); }
.orbit-system {
  position: relative;
  width: 560px;
  height: 560px;
  max-width: 100%;
  margin: 0 auto;
}
.orbit-sun {
  position: absolute;
  top: 50%; left: 50%;
  width: 96px; height: 96px;
  transform: translate(-50%, -50%);
  border-radius: 50%;
  background: radial-gradient(circle at 35% 30%, #fef3c7, var(--purple) 55%, var(--purple-2) 100%);
  box-shadow: 0 0 60px rgba(168,85,247,0.65), 0 0 120px rgba(168,85,247,0.35);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.7rem;
  color: #1e0a33;
  z-index: 5;
  animation: sunPulse 4s ease-in-out infinite;
}
@keyframes sunPulse { 0%,100% { box-shadow: 0 0 60px rgba(168,85,247,0.65), 0 0 120px rgba(168,85,247,0.35);} 50% { box-shadow: 0 0 80px rgba(34,211,238,0.65), 0 0 150px rgba(168,85,247,0.4);} }

.orbit-ring {
  position: absolute;
  inset: 0; margin: auto;
  border: 1px dashed rgba(148,163,184,0.22);
  border-radius: 50%;
  animation-name: orbit-cw;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}
.ring-1 { width: 200px; height: 200px; animation-duration: 30s; --start: 15deg; }
.ring-2 { width: 320px; height: 320px; animation-duration: 42s; --start: 105deg; }
.ring-3 { width: 440px; height: 440px; animation-duration: 54s; --start: 200deg; }
.ring-4 { width: 560px; height: 560px; animation-duration: 66s; --start: 300deg; }
@keyframes orbit-cw { from { transform: rotate(var(--start, 0deg)); } to { transform: rotate(calc(var(--start, 0deg) + 360deg)); } }
@keyframes orbit-ccw { from { transform: rotate(calc(var(--start, 0deg) * -1)); } to { transform: rotate(calc((var(--start, 0deg) + 360deg) * -1)); } }

.orbit-planet {
  position: absolute;
  top: -27px; left: 50%;
  width: 54px; height: 54px;
  margin-left: -27px;
  border: none;
  background: none;
  animation-name: orbit-ccw;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}
.ring-1 .orbit-planet { animation-duration: 30s; --start: 15deg; }
.ring-2 .orbit-planet { animation-duration: 42s; --start: 105deg; }
.ring-3 .orbit-planet { animation-duration: 54s; --start: 200deg; }
.ring-4 .orbit-planet { animation-duration: 66s; --start: 300deg; }

.planet-core {
  width: 100%; height: 100%;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.15rem;
  color: #fff;
  cursor: pointer;
  transition: transform 0.35s var(--ease), box-shadow 0.35s var(--ease);
  position: relative;
}
.planet-core::after {
  content: '';
  position: absolute;
  inset: -8px;
  border-radius: 50%;
  border: 1px solid transparent;
  transition: border-color 0.35s;
}
.planet-core:hover, .planet-core:focus-visible, .planet-core.active { transform: scale(1.22); }
.planet-core.active::after, .planet-core:hover::after { border-color: rgba(255,255,255,0.4); }
.planet-1 { background: radial-gradient(circle at 35% 30%, #fca5f9, var(--purple) 65%); box-shadow: 0 0 22px rgba(168,85,247,0.7); }
.planet-2 { background: radial-gradient(circle at 35% 30%, #67e8f9, var(--cyan-2) 65%); box-shadow: 0 0 22px rgba(34,211,238,0.7); }
.planet-3 { background: radial-gradient(circle at 35% 30%, #fda4af, #e11d48 65%); box-shadow: 0 0 22px rgba(225,29,72,0.6); }
.planet-4 { background: radial-gradient(circle at 35% 30%, #bef264, #4d7c0f 65%); box-shadow: 0 0 22px rgba(132,204,22,0.55); }

.orbit-hint { font-size: 0.78rem; color: var(--muted-dim); text-align: center; letter-spacing: 0.03em; }
.orbit-hint i { color: var(--cyan); margin-right: 6px; }

.mission-detail {
  width: 100%;
  max-width: 760px;
  padding: var(--space-4);
  border-radius: var(--radius-lg);
  display: grid;
  grid-template-columns: auto 1fr;
  gap: var(--space-4);
  align-items: flex-start;
}
.mission-icon {
  width: 68px; height: 68px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.5rem;
  color: #fff;
  flex-shrink: 0;
}
.mission-detail h3 { font-family: 'Orbitron', sans-serif; font-size: 1.2rem; margin-bottom: 8px; }
.mission-detail p { color: var(--muted); margin-bottom: 14px; font-size: 0.95rem; }
.mission-stack { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 14px; }
.mission-stack span { font-size: 0.72rem; padding: 5px 12px; border-radius: 999px; background: rgba(255,255,255,0.06); border: 1px solid var(--glass-border); color: var(--cyan); }
.mission-link { font-size: 0.85rem; color: var(--cyan); display: inline-flex; align-items: center; gap: 6px; font-weight: 600; }
.mission-link:hover { text-decoration: underline; }

.orbit-fallback { display: none; grid-template-columns: 1fr; gap: var(--space-3); }
.fallback-card { padding: var(--space-3) var(--space-3); border-radius: var(--radius-md); display: flex; gap: 16px; align-items: flex-start; }
.fallback-card .mission-icon { width: 54px; height: 54px; font-size: 1.2rem; }
.fallback-card h3 { font-family: 'Orbitron', sans-serif; font-size: 1rem; margin-bottom: 6px; }
.fallback-card p { color: var(--muted); font-size: 0.88rem; margin-bottom: 10px; }

/* ============================================================
   CERTIFICATES
   ============================================================ */
.cert-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-4); }
.cert-card { padding: var(--space-4); border-radius: var(--radius-lg); text-align: center; transition: transform 0.35s var(--ease), border-color .35s; }
.cert-card:hover { transform: translateY(-8px); border-color: rgba(168,85,247,0.5); }
.cert-badge {
  width: 74px; height: 74px;
  margin: 0 auto var(--space-3);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  background: conic-gradient(from 180deg, var(--purple), var(--cyan), var(--purple));
  position: relative;
}
.cert-badge::before { content: ''; position: absolute; inset: 4px; border-radius: 50%; background: var(--bg-navy); }
.cert-badge i { position: relative; z-index: 1; font-size: 1.5rem; color: var(--cyan); }
.cert-card h3 { font-size: 1.02rem; margin-bottom: 6px; }
.cert-card .issuer { color: var(--purple); font-size: 0.85rem; font-weight: 600; margin-bottom: 4px; }
.cert-card .year { color: var(--muted-dim); font-size: 0.78rem; letter-spacing: 0.06em; text-transform: uppercase; }

/* ============================================================
   BLOG
   ============================================================ */
.blog-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-4); }
.blog-card { border-radius: var(--radius-lg); overflow: hidden; display: flex; flex-direction: column; transition: transform 0.35s var(--ease), border-color .35s; }
.blog-card:hover { transform: translateY(-8px); border-color: rgba(34,211,238,0.45); }
.blog-cover {
  height: 140px;
  display: flex; align-items: center; justify-content: center;
  font-size: 2rem;
  color: rgba(255,255,255,0.85);
  position: relative;
  overflow: hidden;
}
.blog-cover::before { content: ''; position: absolute; inset: 0; background-size: 26px 26px; background-image: radial-gradient(circle, rgba(255,255,255,0.18) 1px, transparent 1.4px); opacity: .6; }
.blog-cover.c1 { background: linear-gradient(135deg, #7c3aed, #4c1d95); }
.blog-cover.c2 { background: linear-gradient(135deg, #0891b2, #164e63); }
.blog-cover.c3 { background: linear-gradient(135deg, #be185d, #581c33); }
.blog-body { padding: var(--space-3); flex: 1; display: flex; flex-direction: column; }
.blog-date { font-size: 0.72rem; color: var(--cyan); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px; }
.blog-body h3 { font-size: 1.05rem; margin-bottom: 8px; line-height: 1.35; }
.blog-body p { color: var(--muted); font-size: 0.88rem; margin-bottom: 14px; flex: 1; }
.blog-more { font-size: 0.84rem; font-weight: 600; color: var(--white); display: inline-flex; align-items: center; gap: 6px; }
.blog-more i { transition: transform 0.3s var(--ease); }
.blog-card:hover .blog-more i { transform: translateX(5px); }

/* ============================================================
   CONTACT
   ============================================================ */
.contact-grid { display: grid; grid-template-columns: 0.9fr 1.1fr; gap: var(--space-6); align-items: flex-start; }
.contact-info-card { padding: var(--space-4); border-radius: var(--radius-lg); }
.contact-info-card h3 { font-family: 'Orbitron', sans-serif; font-size: 1.1rem; margin-bottom: var(--space-2); }
.contact-info-card > p { color: var(--muted); font-size: 0.92rem; margin-bottom: var(--space-4); }
.contact-line { display: flex; align-items: center; gap: 14px; margin-bottom: 18px; }
.contact-line-icon {
  width: 44px; height: 44px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  background: rgba(255,255,255,0.06);
  border: 1px solid var(--glass-border);
  color: var(--cyan);
  flex-shrink: 0;
}
.contact-line span { display: block; font-size: 0.7rem; color: var(--muted-dim); text-transform: uppercase; letter-spacing: 0.06em; }
.contact-line a, .contact-line strong { font-size: 0.94rem; font-weight: 600; word-break: break-word; }
.contact-line a:hover { color: var(--cyan); }

.contact-form { padding: var(--space-4); border-radius: var(--radius-lg); }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
.form-field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
.form-field label { font-size: 0.78rem; color: var(--muted); letter-spacing: 0.04em; text-transform: uppercase; }
.form-field input, .form-field textarea {
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--glass-border);
  border-radius: var(--radius-sm);
  padding: 13px 16px;
  color: var(--white);
  transition: border-color 0.3s, background 0.3s;
  resize: vertical;
}
.form-field input:focus, .form-field textarea:focus { border-color: var(--cyan); background: rgba(34,211,238,0.05); outline: none; }
.form-field input::placeholder, .form-field textarea::placeholder { color: var(--muted-dim); }
.form-field.error input, .form-field.error textarea { border-color: #f87171; }
.field-error { font-size: 0.75rem; color: #f87171; min-height: 1em; }

.form-submit {
  width: 100%;
  justify-content: center;
  border: none;
}
.form-submit[disabled] { opacity: 0.6; cursor: not-allowed; transform: none !important; }
.form-status {
  margin-top: 14px;
  padding: 12px 16px;
  border-radius: var(--radius-sm);
  font-size: 0.88rem;
  display: none;
  align-items: center;
  gap: 10px;
}
.form-status.show { display: flex; }
.form-status.success { background: rgba(74,222,128,0.1); border: 1px solid rgba(74,222,128,0.35); color: #86efac; }
.form-status.error { background: rgba(248,113,113,0.1); border: 1px solid rgba(248,113,113,0.35); color: #fca5a5; }

/* ============================================================
   FOOTER
   ============================================================ */
footer {
  position: relative;
  z-index: 5;
  padding: var(--space-6) 0 var(--space-4);
  border-top: 1px solid var(--glass-border);
  margin-top: var(--space-6);
}
.footer-grid { display: grid; grid-template-columns: 1.4fr 1fr 1fr; gap: var(--space-5); margin-bottom: var(--space-5); }
.footer-brand .nav-logo { margin-bottom: 12px; }
.footer-brand p { color: var(--muted); font-size: 0.9rem; max-width: 320px; }
.footer-col h4 { font-family: 'Orbitron', sans-serif; font-size: 0.85rem; letter-spacing: 0.05em; margin-bottom: 16px; text-transform: uppercase; color: var(--cyan); }
.footer-col ul { display: flex; flex-direction: column; gap: 10px; }
.footer-col a { color: var(--muted); font-size: 0.9rem; transition: color .3s, transform .3s; display: inline-block; }
.footer-col a:hover { color: var(--white); transform: translateX(4px); }
.footer-social { display: flex; gap: 12px; margin-top: 6px; }
.footer-social a {
  width: 42px; height: 42px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  background: rgba(255,255,255,0.05);
  border: 1px solid var(--glass-border);
  transition: all 0.3s var(--ease);
}
.footer-social a:hover { background: linear-gradient(135deg, var(--purple), var(--cyan)); color: #04070f; transform: translateY(-4px); }
.footer-bottom { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; padding-top: var(--space-4); border-top: 1px solid var(--glass-border); font-size: 0.82rem; color: var(--muted-dim); }

#back-to-top {
  position: fixed;
  bottom: 28px; right: 28px;
  width: 50px; height: 50px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--purple), var(--cyan-2));
  color: #04070f;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem;
  border: none;
  box-shadow: 0 12px 30px rgba(168,85,247,0.4);
  z-index: 150;
  opacity: 0;
  visibility: hidden;
  transform: translateY(20px);
  transition: all 0.35s var(--ease);
}
#back-to-top.show { opacity: 1; visibility: visible; transform: translateY(0); }
#back-to-top:hover { transform: translateY(-5px) scale(1.06); }

/* ============================================================
   RESPONSIVE
   ============================================================ */
@media (max-width: 1024px) {
  .hero-grid { grid-template-columns: 1fr; text-align: center; }
  .hero-desc { margin-inline: auto; }
  .hero-stats { justify-content: center; }
  .hero-visual { height: 420px; order: -1; }
  .about-grid { grid-template-columns: 1fr; }
  .about-panel { max-width: 320px; margin: 0 auto; }
  .about-copy .section-tag, .about-copy .section-title, .about-copy > p { text-align: center; }
  .about-copy p { margin-inline: auto; }
  .skills-systems { grid-template-columns: 1fr 1fr; }
  .cert-grid, .blog-grid { grid-template-columns: 1fr 1fr; }
  .contact-grid { grid-template-columns: 1fr; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 900px) {
  .orbit-system { display: none; }
  .orbit-fallback { display: grid; max-width: 640px; }
  .orbit-hint { display: none; }
}

@media (max-width: 768px) {
  .nav-links { position: fixed; top: 0; right: -100%; height: 100vh; width: min(78vw, 320px); background: rgba(5,6,15,0.97); backdrop-filter: blur(20px); flex-direction: column; justify-content: center; align-items: flex-start; padding: var(--space-5); gap: var(--space-3); transition: right 0.4s var(--ease); border-left: 1px solid var(--glass-border); }
  .nav-links.open { right: 0; }
  .nav-links a { font-size: 1.05rem; }
  .nav-toggle { display: flex; }
  .about-stats { grid-template-columns: repeat(2, 1fr); }
  .skills-systems { grid-template-columns: 1fr; }
  .cert-grid, .blog-grid { grid-template-columns: 1fr; }
  .footer-grid { grid-template-columns: 1fr; gap: var(--space-4); }
  .timeline { padding-left: 40px; }
  .timeline-node { left: -40px; width: 26px; height: 26px; }
  .form-row { grid-template-columns: 1fr; gap: 0; }
  .mission-detail { grid-template-columns: 1fr; text-align: center; }
  .mission-detail .mission-icon { margin: 0 auto; }
  .mission-stack { justify-content: center; }
}

@media (max-width: 480px) {
  .wrap { padding-inline: var(--space-3); }
  section { padding: var(--space-6) 0; }
  .hero-actions { flex-direction: column; align-items: stretch; }
  .hero-actions .btn { justify-content: center; }
  .hero-stats { gap: var(--space-3); justify-content: space-between; width: 100%; }
  .astronaut { transform: scale(0.85); }
  .about-stats { grid-template-columns: repeat(2, 1fr); }
  #back-to-top { right: 16px; bottom: 16px; width: 44px; height: 44px; }
}

@media (max-width: 360px) {
  .hero-title { font-size: 1.9rem; }
  .section-title { font-size: 1.55rem; }
  .about-stats { grid-template-columns: 1fr 1fr; }
  .hero-stats { gap: var(--space-2); }
}
</style>
</head>
<body>

<a href="#main" class="skip-link">Skip to main content</a>

<div id="preloader" aria-hidden="true">
  <i class="fa-solid fa-rocket preloader-rocket"></i>
  <div class="preloader-text">Initializing Orbit&hellip;</div>
  <div class="preloader-bar"></div>
</div>

<canvas id="starfield-canvas" aria-hidden="true"></canvas>
<div class="bg-nebula" aria-hidden="true">
  <div class="nebula-blob nebula-1"></div>
  <div class="nebula-blob nebula-2"></div>
  <div class="nebula-blob nebula-3"></div>
</div>
<div class="cursor-glow" id="cursorGlow" aria-hidden="true"></div>

<!-- ============================================================
     NAVBAR
     ============================================================ -->
<nav id="navbar" aria-label="Primary">
  <a href="#home" class="nav-logo">
    <i class="fa-solid fa-satellite" aria-hidden="true"></i>
    <span>M.E.A.<span class="gradient-text">Khan</span></span>
  </a>
  <ul class="nav-links" id="navLinks">
    <li><a href="#home" data-nav>Home</a></li>
    <li><a href="#about" data-nav>About</a></li>
    <li><a href="#skills" data-nav>Skills</a></li>
    <li><a href="#experience" data-nav>Experience</a></li>
    <li><a href="#projects" data-nav>Missions</a></li>
    <li><a href="#certificates" data-nav>Certificates</a></li>
    <li><a href="#blog" data-nav>Blog</a></li>
    <li><a href="#contact" data-nav>Contact</a></li>
  </ul>
  <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="navLinks">
    <span></span><span></span><span></span>
  </button>
</nav>

<main id="main">

<!-- ============================================================
     HERO
     ============================================================ -->
<section id="home">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <div class="hero-eyebrow"><span class="dot" aria-hidden="true"></span> Mission Control Online</div>
      <h1 class="hero-title">M. Estiaque Ahmed<br /><span class="gradient-text">Khan</span></h1>
      <p class="hero-role">I build for the web as <span id="typedRole">Software Engineer</span><span class="caret" aria-hidden="true"></span></p>
      <p class="hero-desc">Full-stack developer with hands-on experience across frontend optimization, database management, PHP/Laravel web application development, custom inventory modules, enterprise automation, and ERP systems integration.</p>
      <div class="hero-actions">
        <a href="#projects" class="btn btn-primary"><i class="fa-solid fa-rocket" aria-hidden="true"></i> Explore Missions</a>
        <a href="#contact" class="btn btn-outline"><i class="fa-solid fa-satellite-dish" aria-hidden="true"></i> Transmit a Message</a>
      </div>
      <div class="hero-stats">
        <div class="hero-stat"><strong>3+</strong><span>Years in Orbit</span></div>
        <div class="hero-stat"><strong>4</strong><span>Missions Launched</span></div>
        <div class="hero-stat"><strong>18</strong><span>Systems Mastered</span></div>
        <div class="hero-stat"><strong>2</strong><span>Degrees Earned</span></div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-orbit-deco o1" aria-hidden="true"></div>
      <div class="hero-orbit-deco o2" aria-hidden="true"></div>
      <div class="astronaut" role="img" aria-label="Illustration of an astronaut floating in space, representing a software engineer exploring code">
        <div class="astro-thruster"></div>
        <div class="astro-backpack"></div>
        <div class="astro-arm right"><span class="astro-glove"></span></div>
        <div class="astro-body">
          <div class="astro-chest"><span></span><span></span><span></span></div>
        </div>
        <div class="astro-arm left"><span class="astro-glove"></span></div>
        <div class="astro-helmet">
          <div class="astro-visor">
            <span class="star-dot" style="top:20%;left:30%"></span>
            <span class="star-dot" style="top:55%;left:60%"></span>
            <span class="star-dot" style="top:35%;left:75%"></span>
          </div>
          <div class="astro-badge"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-cue">
    <span>Scroll</span>
    <i class="fa-solid fa-chevron-down chevron" aria-hidden="true"></i>
  </div>
</section>

<!-- ============================================================
     ABOUT
     ============================================================ -->
<section id="about">
  <div class="wrap about-grid">
    <div class="about-panel" data-reveal="scale">
      <div class="about-panel-inner">
        <i class="fa-solid fa-user-astronaut" aria-hidden="true"></i>
      </div>
    </div>
    <div class="about-copy">
      <div class="section-tag" data-reveal>Mission Log</div>
      <h2 class="section-title" data-reveal>About the <span class="gradient-text">Explorer</span></h2>
      <p data-reveal><strong>Full-stack developer</strong> with hands-on experience across frontend optimization, database management, PHP/Laravel web application development, custom inventory management modules, enterprise automation solutions, and ERP systems integration.</p>
      <p data-reveal>Currently charting new territory at <strong>Natore IT</strong>, my career has orbited the space between clean code and business impact &mdash; from optimizing Laravel applications for local businesses to building enterprise-grade ERP integrations that keep mission-critical operations running smoothly.</p>

      <div class="about-stats" data-reveal>
        <div class="about-stat glass"><strong>3+</strong><span>Years Experience</span></div>
        <div class="about-stat glass"><strong>4</strong><span>Core Projects</span></div>
        <div class="about-stat glass"><strong>18</strong><span>Technologies</span></div>
        <div class="about-stat glass"><strong>3</strong><span>Certifications</span></div>
      </div>

      <div class="edu-list">
        <div class="edu-item glass" data-reveal="left">
          <div class="edu-icon"><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i></div>
          <div>
            <h4>MSc in Computer Science</h4>
            <p>Uttara University &middot; Passing Year 2025</p>
          </div>
        </div>
        <div class="edu-item glass" data-reveal="left">
          <div class="edu-icon"><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i></div>
          <div>
            <h4>BSc in Computer Science &amp; Engineering</h4>
            <p>Uttara University &middot; Passing Year 2021</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SKILLS
     ============================================================ -->
<section id="skills">
  <div class="wrap">
    <div class="section-head">
      <div class="section-tag">Star Systems</div>
      <h2 class="section-title">Technical <span class="gradient-text">Skill Systems</span></h2>
      <p class="section-sub">Every tool in the belt, charted into three constellations of expertise.</p>
    </div>
    <div class="skills-systems">
      <div class="skill-system glass" data-reveal="left">
        <div class="skill-system-head"><i class="fa-solid fa-server" aria-hidden="true"></i><h3>Core Backend</h3></div>
        <div class="skill-chips">
          <span class="skill-chip"><i class="fa-brands fa-php" aria-hidden="true"></i>PHP 8</span>
          <span class="skill-chip"><i class="fa-brands fa-laravel" aria-hidden="true"></i>Laravel</span>
          <span class="skill-chip"><i class="fa-solid fa-plug" aria-hidden="true"></i>REST API Design</span>
          <span class="skill-chip"><i class="fa-solid fa-gauge-high" aria-hidden="true"></i>Database Optimization</span>
          <span class="skill-chip"><i class="fa-solid fa-industry" aria-hidden="true"></i>ERP Integration</span>
          <span class="skill-chip"><i class="fa-solid fa-arrows-rotate" aria-hidden="true"></i>CI/CD</span>
        </div>
      </div>
      <div class="skill-system glass" data-reveal>
        <div class="skill-system-head"><i class="fa-solid fa-display" aria-hidden="true"></i><h3>Frontend &amp; Reactive UI</h3></div>
        <div class="skill-chips">
          <span class="skill-chip"><i class="fa-brands fa-js" aria-hidden="true"></i>JavaScript (ES6+)</span>
          <span class="skill-chip"><i class="fa-brands fa-vuejs" aria-hidden="true"></i>Vue.js</span>
          <span class="skill-chip"><i class="fa-solid fa-bolt" aria-hidden="true"></i>Alpine.js</span>
          <span class="skill-chip"><i class="fa-solid fa-bolt-lightning" aria-hidden="true"></i>Livewire</span>
          <span class="skill-chip"><i class="fa-solid fa-wind" aria-hidden="true"></i>Tailwind CSS</span>
          <span class="skill-chip"><i class="fa-brands fa-bootstrap" aria-hidden="true"></i>Bootstrap 5</span>
        </div>
      </div>
      <div class="skill-system glass" data-reveal="right">
        <div class="skill-system-head"><i class="fa-solid fa-database" aria-hidden="true"></i><h3>Data &amp; Infrastructure</h3></div>
        <div class="skill-chips">
          <span class="skill-chip"><i class="fa-solid fa-database" aria-hidden="true"></i>MySQL</span>
          <span class="skill-chip"><i class="fa-solid fa-elephant" aria-hidden="true"></i>PostgreSQL</span>
          <span class="skill-chip"><i class="fa-solid fa-layer-group" aria-hidden="true"></i>Redis</span>
          <span class="skill-chip"><i class="fa-brands fa-docker" aria-hidden="true"></i>Docker</span>
          <span class="skill-chip"><i class="fa-brands fa-git-alt" aria-hidden="true"></i>Git</span>
          <span class="skill-chip"><i class="fa-brands fa-aws" aria-hidden="true"></i>AWS</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     EXPERIENCE
     ============================================================ -->
<section id="experience">
  <div class="wrap">
    <div class="section-head">
      <div class="section-tag">Flight Log</div>
      <h2 class="section-title">Mission <span class="gradient-text">Experience</span></h2>
      <p class="section-sub">A reverse-chronological trajectory through engineering roles.</p>
    </div>
    <div class="timeline">
      <div class="timeline-item glass" data-reveal="left">
        <div class="timeline-node" aria-hidden="true"><i class="fa-solid fa-rocket"></i></div>
        <span class="timeline-badge">2025 &mdash; Present</span>
        <h3>Software Engineer</h3>
        <span class="company">Natore IT</span>
        <p>Frontend optimization and database management for local business clients.</p>
      </div>
      <div class="timeline-item glass" data-reveal="left">
        <div class="timeline-node" aria-hidden="true"><i class="fa-solid fa-satellite"></i></div>
        <span class="timeline-badge">2023 &mdash; 2025</span>
        <h3>Software Developer</h3>
        <span class="company">Isotope IT</span>
        <p>Specialized in PHP/Laravel web applications and custom inventory management modules.</p>
      </div>
      <div class="timeline-item glass" data-reveal="left">
        <div class="timeline-node" aria-hidden="true"><i class="fa-solid fa-globe"></i></div>
        <span class="timeline-badge">2022 &mdash; 2023</span>
        <h3>Software Engineer</h3>
        <span class="company">Barcode Tech Automation Ltd</span>
        <p>Leading development of enterprise automation solutions and ERP systems integration.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     PROJECTS / ORBITAL SYSTEM
     ============================================================ -->
<section id="projects">
  <div class="wrap">
    <div class="section-head">
      <div class="section-tag">Deep Space Missions</div>
      <h2 class="section-title">Featured <span class="gradient-text">Missions</span></h2>
      <p class="section-sub">Four projects, four planets. Select one to open its mission briefing.</p>
    </div>

    <div class="orbit-stage">
      <div class="orbit-system" id="orbitSystem" data-reveal="scale">
        <div class="orbit-sun" aria-hidden="true"><i class="fa-solid fa-rocket"></i></div>

        <div class="orbit-ring ring-1">
          <div class="orbit-planet">
            <button type="button" class="planet-core planet-1" data-project="0" aria-label="Open mission briefing: Port3folio Package">
              <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
            </button>
          </div>
        </div>
        <div class="orbit-ring ring-2">
          <div class="orbit-planet">
            <button type="button" class="planet-core planet-2" data-project="1" aria-label="Open mission briefing: Orbital Market E-Commerce Platform">
              <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
            </button>
          </div>
        </div>
        <div class="orbit-ring ring-3">
          <div class="orbit-planet">
            <button type="button" class="planet-core planet-3" data-project="2" aria-label="Open mission briefing: Nebula Analytics SaaS Dashboard">
              <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
            </button>
          </div>
        </div>
        <div class="orbit-ring ring-4">
          <div class="orbit-planet">
            <button type="button" class="planet-core planet-4" data-project="3" aria-label="Open mission briefing: ERP Command Deck Inventory System">
              <i class="fa-solid fa-boxes-stacked" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>

      <p class="orbit-hint"><i class="fa-solid fa-hand-pointer" aria-hidden="true"></i>Click or focus a planet to read its mission briefing below.</p>

      <div class="mission-detail glass" id="missionDetail" data-reveal>
        <div class="mission-icon" id="missionIcon" style="background: radial-gradient(circle at 35% 30%, #fca5f9, var(--purple) 65%);">
          <i class="fa-solid fa-layer-group" id="missionIconGlyph" aria-hidden="true"></i>
        </div>
        <div>
          <h3 id="missionTitle">Port3folio Package</h3>
          <p id="missionDesc">A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
          <div class="mission-stack" id="missionStack">
            <span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span>
          </div>
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" class="mission-link">View on GitHub <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        </div>
      </div>

      <!-- Mobile / small-screen fallback: full mission cards -->
      <div class="orbit-fallback">
        <div class="fallback-card glass">
          <div class="mission-icon" style="background: radial-gradient(circle at 35% 30%, #fca5f9, var(--purple) 65%);"><i class="fa-solid fa-layer-group" aria-hidden="true"></i></div>
          <div>
            <h3>Port3folio Package</h3>
            <p>A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
            <div class="mission-stack"><span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span></div>
          </div>
        </div>
        <div class="fallback-card glass">
          <div class="mission-icon" style="background: radial-gradient(circle at 35% 30%, #67e8f9, var(--cyan-2) 65%);"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></div>
          <div>
            <h3>Orbital Market &mdash; E-Commerce Platform</h3>
            <p>High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
            <div class="mission-stack"><span>Laravel</span><span>Vue.js</span><span>MySQL</span><span>Redis</span><span>Stripe</span></div>
          </div>
        </div>
        <div class="fallback-card glass">
          <div class="mission-icon" style="background: radial-gradient(circle at 35% 30%, #fda4af, #e11d48 65%);"><i class="fa-solid fa-chart-line" aria-hidden="true"></i></div>
          <div>
            <h3>Nebula Analytics &mdash; SaaS Dashboard</h3>
            <p>Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
            <div class="mission-stack"><span>Laravel</span><span>Livewire</span><span>Alpine.js</span><span>PostgreSQL</span><span>Chart.js</span></div>
          </div>
        </div>
        <div class="fallback-card glass">
          <div class="mission-icon" style="background: radial-gradient(circle at 35% 30%, #bef264, #4d7c0f 65%);"><i class="fa-solid fa-boxes-stacked" aria-hidden="true"></i></div>
          <div>
            <h3>ERP Command Deck &mdash; Inventory Management</h3>
            <p>Custom-built inventory &amp; ERP automation module for enterprise clients covering stock tracking, procurement workflows, and reporting.</p>
            <div class="mission-stack"><span>PHP</span><span>Laravel</span><span>MySQL</span><span>REST API</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     CERTIFICATES
     ============================================================ -->
<section id="certificates">
  <div class="wrap">
    <div class="section-head">
      <div class="section-tag">Flight Credentials</div>
      <h2 class="section-title">Certificates &amp; <span class="gradient-text">Credentials</span></h2>
      <p class="section-sub">Verified training that keeps my systems flight-ready.</p>
    </div>
    <div class="cert-grid">
      <div class="cert-card glass" data-reveal>
        <div class="cert-badge"><i class="fa-brands fa-laravel" aria-hidden="true"></i></div>
        <h3>Certified Laravel Developer</h3>
        <p class="issuer">Laravel Certification Program</p>
        <p class="year">2023</p>
      </div>
      <div class="cert-card glass" data-reveal>
        <div class="cert-badge"><i class="fa-brands fa-aws" aria-hidden="true"></i></div>
        <h3>AWS Certified Cloud Practitioner</h3>
        <p class="issuer">Amazon Web Services Training &amp; Certification</p>
        <p class="year">2024</p>
      </div>
      <div class="cert-card glass" data-reveal>
        <div class="cert-badge"><i class="fa-solid fa-database" aria-hidden="true"></i></div>
        <h3>MySQL Database Administration</h3>
        <p class="issuer">Oracle University</p>
        <p class="year">2022</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     BLOG
     ============================================================ -->
<section id="blog">
  <div class="wrap">
    <div class="section-head">
      <div class="section-tag">Transmission Log</div>
      <h2 class="section-title">From the <span class="gradient-text">Blog</span></h2>
      <p class="section-sub">Field notes on Laravel performance, databases, and API design.</p>
    </div>
    <div class="blog-grid">
      <article class="blog-card glass" data-reveal>
        <div class="blog-cover c1"><i class="fa-solid fa-gauge-high" aria-hidden="true"></i></div>
        <div class="blog-body">
          <span class="blog-date">June 2026</span>
          <h3>Optimizing Laravel at Scale: Caching, Queues &amp; Query Discipline</h3>
          <p>How I cut response times by 60% using Redis caching, queue offloading, and disciplined eager loading in a high-traffic Laravel app.</p>
          <a href="#" class="blog-more">Read more <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </article>
      <article class="blog-card glass" data-reveal>
        <div class="blog-cover c2"><i class="fa-solid fa-magnifying-glass-chart" aria-hidden="true"></i></div>
        <div class="blog-body">
          <span class="blog-date">April 2026</span>
          <h3>N+1 No More: A Field Guide to Database Optimization</h3>
          <p>Practical techniques for spotting and eliminating slow queries before they hit production, from indexing to query profiling.</p>
          <a href="#" class="blog-more">Read more <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </article>
      <article class="blog-card glass" data-reveal>
        <div class="blog-cover c3"><i class="fa-solid fa-diagram-project" aria-hidden="true"></i></div>
        <div class="blog-body">
          <span class="blog-date">February 2026</span>
          <h3>Bridging Legacy ERP and Modern Web Apps: Lessons from the Field</h3>
          <p>Notes on designing resilient REST APIs that keep decades-old ERP systems and modern Laravel front-ends talking to each other.</p>
          <a href="#" class="blog-more">Read more <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ============================================================
     CONTACT
     ============================================================ -->
<section id="contact">
  <div class="wrap">
    <div class="section-head">
      <div class="section-tag">Open Channel</div>
      <h2 class="section-title">Let's <span class="gradient-text">Make Contact</span></h2>
      <p class="section-sub">Have a mission in mind? Send a transmission and I'll respond as soon as I'm back in range.</p>
    </div>
    <div class="contact-grid">
      <div class="contact-info-card glass" data-reveal="left">
        <h3>Ground Station</h3>
        <p>Reach out directly through any of these channels &mdash; all signals are monitored.</p>
        <div class="contact-line">
          <div class="contact-line-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></div>
          <div><span>Email</span><a href="mailto:mrm.khan.1298@gmail.com">mrm.khan.1298@gmail.com</a></div>
        </div>
        <div class="contact-line">
          <div class="contact-line-icon"><i class="fa-brands fa-github" aria-hidden="true"></i></div>
          <div><span>GitHub</span><a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer">github.com/mestiaque</a></div>
        </div>
        <div class="contact-line">
          <div class="contact-line-icon"><i class="fa-brands fa-linkedin-in" aria-hidden="true"></i></div>
          <div><span>LinkedIn</span><a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer">linkedin.com/in/mestiaque</a></div>
        </div>
        <div class="contact-line">
          <div class="contact-line-icon"><i class="fa-solid fa-tower-broadcast" aria-hidden="true"></i></div>
          <div><span>Status</span><strong>Available for new missions</strong></div>
        </div>
      </div>

      <form class="contact-form glass" id="contactForm" data-reveal="right" novalidate>
        <div class="form-row">
          <div class="form-field" id="fieldName">
            <label for="ctName">Name</label>
            <input type="text" id="ctName" name="name" placeholder="Your name" autocomplete="name" required />
            <span class="field-error" id="errName"></span>
          </div>
          <div class="form-field" id="fieldEmail">
            <label for="ctEmail">Email</label>
            <input type="email" id="ctEmail" name="email" placeholder="you@example.com" autocomplete="email" required />
            <span class="field-error" id="errEmail"></span>
          </div>
        </div>
        <div class="form-field" id="fieldSubject">
          <label for="ctSubject">Subject</label>
          <input type="text" id="ctSubject" name="subject" placeholder="What's this transmission about?" required />
          <span class="field-error" id="errSubject"></span>
        </div>
        <div class="form-field" id="fieldMessage">
          <label for="ctMessage">Message</label>
          <textarea id="ctMessage" name="message" rows="5" placeholder="Type your message here..." required></textarea>
          <span class="field-error" id="errMessage"></span>
        </div>
        <button type="submit" class="btn btn-primary form-submit" id="submitBtn">
          <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
          <span id="submitBtnText">Send Transmission</span>
        </button>
        <div class="form-status" id="formStatus" role="status" aria-live="polite"></div>
      </form>
    </div>
  </div>
</section>

</main>

<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer>
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="#home" class="nav-logo"><i class="fa-solid fa-satellite" aria-hidden="true"></i><span>M.E.A.<span class="gradient-text">Khan</span></span></a>
        <p>Full-stack software engineer navigating the space between clean code and real-world impact, one Laravel deployment at a time.</p>
        <div class="footer-social">
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="GitHub profile"><i class="fa-brands fa-github" aria-hidden="true"></i></a>
          <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn profile"><i class="fa-brands fa-linkedin-in" aria-hidden="true"></i></a>
          <a href="mailto:mrm.khan.1298@gmail.com" aria-label="Send an email"><i class="fa-solid fa-envelope" aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Navigate</h4>
        <ul>
          <li><a href="#about">About</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#projects">Missions</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>More</h4>
        <ul>
          <li><a href="#certificates">Certificates</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="mailto:mrm.khan.1298@gmail.com">Say Hello</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <span id="footerYear">2026</span> M. Estiaque Ahmed Khan. All transmissions reserved.</span>
      <span>Designed &amp; built with <i class="fa-solid fa-heart" style="color:#f472b6" aria-hidden="true"></i> in the Laravel galaxy.</span>
    </div>
  </div>
</footer>

<button id="back-to-top" aria-label="Back to top">
  <i class="fa-solid fa-chevron-up" aria-hidden="true"></i>
</button>

<script>
document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  /* ============================================================
     FOOTER YEAR
     ============================================================ */
  var footerYear = document.getElementById('footerYear');
  if (footerYear) footerYear.textContent = new Date().getFullYear();

  /* ============================================================
     STARFIELD CANVAS (parallax + twinkle)
     ============================================================ */
  var canvas = document.getElementById('starfield-canvas');
  var ctx = canvas ? canvas.getContext('2d') : null;
  var stars = [];
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var mouseX = 0, mouseY = 0, scrollFactor = 0;

  function resizeCanvas() {
    if (!canvas) return;
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }

  function initStars() {
    stars = [];
    var count = Math.min(220, Math.floor((window.innerWidth * window.innerHeight) / 6500));
    for (var i = 0; i < count; i++) {
      stars.push({
        x: Math.random() * window.innerWidth,
        y: Math.random() * window.innerHeight,
        r: Math.random() * 1.6 + 0.3,
        depth: Math.random() * 0.6 + 0.2,
        alpha: Math.random() * 0.6 + 0.3,
        twinkleSpeed: Math.random() * 0.02 + 0.005,
        twinklePhase: Math.random() * Math.PI * 2
      });
    }
  }

  function drawStars(time) {
    if (!ctx) return;
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (var i = 0; i < stars.length; i++) {
      var s = stars[i];
      var flicker = reduceMotion ? s.alpha : (Math.sin(time * s.twinkleSpeed + s.twinklePhase) * 0.35 + 0.65) * s.alpha;
      var offsetX = mouseX * s.depth * 14;
      var offsetY = mouseY * s.depth * 14 + scrollFactor * s.depth * 40;
      ctx.beginPath();
      ctx.arc(s.x + offsetX, (s.y + offsetY) % canvas.height, s.r, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(255,255,255,' + Math.max(0, Math.min(1, flicker)) + ')';
      ctx.fill();
    }
    if (!reduceMotion) requestAnimationFrame(drawStars);
  }

  if (canvas && ctx) {
    resizeCanvas();
    initStars();
    requestAnimationFrame(drawStars);
    if (reduceMotion) drawStars(0);
    window.addEventListener('resize', function () { resizeCanvas(); initStars(); });
    window.addEventListener('mousemove', function (e) {
      mouseX = (e.clientX / window.innerWidth - 0.5);
      mouseY = (e.clientY / window.innerHeight - 0.5);
    });
    window.addEventListener('scroll', function () {
      scrollFactor = window.scrollY / window.innerHeight;
    }, { passive: true });
  }

  /* ============================================================
     CURSOR GLOW
     ============================================================ */
  var glow = document.getElementById('cursorGlow');
  if (glow && window.matchMedia('(pointer: fine)').matches) {
    window.addEventListener('mousemove', function (e) {
      glow.style.left = e.clientX + 'px';
      glow.style.top = e.clientY + 'px';
    });
  } else if (glow) {
    glow.style.display = 'none';
  }

  /* ============================================================
     SHOOTING STARS
     ============================================================ */
  function spawnShootingStar() {
    var star = document.createElement('div');
    star.className = 'shooting-star';
    var startX = Math.random() * window.innerWidth * 0.6 + window.innerWidth * 0.3;
    var startY = Math.random() * window.innerHeight * 0.35;
    star.style.left = startX + 'px';
    star.style.top = startY + 'px';
    var duration = (Math.random() * 1.2 + 1.4).toFixed(2);
    star.style.animationDuration = duration + 's';
    document.body.appendChild(star);
    setTimeout(function () { star.remove(); }, duration * 1000 + 100);
  }

  if (!reduceMotion) {
    setInterval(function () {
      if (document.visibilityState === 'visible') spawnShootingStar();
    }, 3200);
    setTimeout(spawnShootingStar, 900);
  }

  /* ============================================================
     NAVBAR: scroll state, mobile toggle, active link
     ============================================================ */
  var navbar = document.getElementById('navbar');
  var navToggle = document.getElementById('navToggle');
  var navLinks = document.getElementById('navLinks');

  function onScroll() {
    if (window.scrollY > 40) navbar.classList.add('scrolled');
    else navbar.classList.remove('scrolled');

    var backBtn = document.getElementById('back-to-top');
    if (backBtn) {
      if (window.scrollY > 600) backBtn.classList.add('show');
      else backBtn.classList.remove('show');
    }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  if (navToggle && navLinks) {
    navToggle.addEventListener('click', function () {
      var isOpen = navLinks.classList.toggle('open');
      navToggle.classList.toggle('open', isOpen);
      navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
    navLinks.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        navLinks.classList.remove('open');
        navToggle.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && navLinks.classList.contains('open')) {
        navLinks.classList.remove('open');
        navToggle.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
        navToggle.focus();
      }
    });
  }

  var navAnchors = document.querySelectorAll('[data-nav]');
  var sections = Array.prototype.slice.call(document.querySelectorAll('section[id]'));
  if ('IntersectionObserver' in window && sections.length) {
    var navObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var id = entry.target.getAttribute('id');
          navAnchors.forEach(function (a) {
            a.classList.toggle('active', a.getAttribute('href') === '#' + id);
          });
        }
      });
    }, { rootMargin: '-45% 0px -45% 0px', threshold: 0 });
    sections.forEach(function (s) { navObserver.observe(s); });
  }

  /* ============================================================
     SCROLL REVEAL
     ============================================================ */
  var revealEls = document.querySelectorAll('[data-reveal]');
  if ('IntersectionObserver' in window && revealEls.length) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry, idx) {
        if (entry.isIntersecting) {
          setTimeout(function () {
            entry.target.classList.add('in-view');
          }, (idx % 4) * 90);
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
    revealEls.forEach(function (el) { revealObserver.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('in-view'); });
  }

  /* ============================================================
     HERO ROLE TYPEWRITER
     ============================================================ */
  var roles = [
    'Software Engineer',
    'Full-Stack Laravel Developer',
    'ERP Systems Integrator',
    'Database Optimizer'
  ];
  var typedEl = document.getElementById('typedRole');
  if (typedEl && !reduceMotion) {
    var roleIndex = 0, charIndex = roles[0].length, deleting = false;
    function typeLoop() {
      var current = roles[roleIndex];
      if (!deleting) {
        charIndex++;
        if (charIndex > current.length) {
          deleting = true;
          setTimeout(typeLoop, 1600);
          return;
        }
      } else {
        charIndex--;
        if (charIndex < 0) {
          deleting = false;
          roleIndex = (roleIndex + 1) % roles.length;
          charIndex = 0;
        }
      }
      typedEl.textContent = roles[roleIndex].slice(0, charIndex);
      setTimeout(typeLoop, deleting ? 40 : 65);
    }
    setTimeout(typeLoop, 1800);
  }

  /* ============================================================
     ORBITAL PROJECT SYSTEM
     ============================================================ */
  var missions = [
    {
      title: 'Port3folio Package',
      desc: 'A modular Laravel package for building dynamic, animated portfolio sites with zero config.',
      stack: ['Laravel 11', 'Blade', 'Bootstrap 5', 'jQuery'],
      icon: 'fa-solid fa-layer-group',
      bg: 'radial-gradient(circle at 35% 30%, #fca5f9, var(--purple) 65%)'
    },
    {
      title: 'Orbital Market — E-Commerce Platform',
      desc: 'High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.',
      stack: ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Stripe'],
      icon: 'fa-solid fa-cart-shopping',
      bg: 'radial-gradient(circle at 35% 30%, #67e8f9, var(--cyan-2) 65%)'
    },
    {
      title: 'Nebula Analytics — SaaS Dashboard',
      desc: 'Real-time analytics platform processing millions of events per day with customizable widget boards.',
      stack: ['Laravel', 'Livewire', 'Alpine.js', 'PostgreSQL', 'Chart.js'],
      icon: 'fa-solid fa-chart-line',
      bg: 'radial-gradient(circle at 35% 30%, #fda4af, #e11d48 65%)'
    },
    {
      title: 'ERP Command Deck — Inventory Management',
      desc: 'Custom-built inventory & ERP automation module for enterprise clients, covering stock tracking, procurement workflows, and reporting.',
      stack: ['PHP', 'Laravel', 'MySQL', 'REST API'],
      icon: 'fa-solid fa-boxes-stacked',
      bg: 'radial-gradient(circle at 35% 30%, #bef264, #4d7c0f 65%)'
    }
  ];

  var planetButtons = document.querySelectorAll('.planet-core');
  var missionIcon = document.getElementById('missionIcon');
  var missionIconGlyph = document.getElementById('missionIconGlyph');
  var missionTitle = document.getElementById('missionTitle');
  var missionDesc = document.getElementById('missionDesc');
  var missionStack = document.getElementById('missionStack');

  function showMission(index) {
    var m = missions[index];
    if (!m || !missionTitle) return;
    missionTitle.textContent = m.title;
    missionDesc.textContent = m.desc;
    missionIconGlyph.className = m.icon;
    missionIcon.style.background = m.bg;
    missionStack.innerHTML = '';
    m.stack.forEach(function (tech) {
      var span = document.createElement('span');
      span.textContent = tech;
      missionStack.appendChild(span);
    });
    planetButtons.forEach(function (btn) {
      btn.classList.toggle('active', btn.dataset.project === String(index));
    });
  }

  planetButtons.forEach(function (btn) {
    var ring = btn.closest('.orbit-ring');
    btn.addEventListener('click', function () {
      showMission(parseInt(btn.dataset.project, 10));
    });
    btn.addEventListener('mouseenter', function () {
      if (ring) ring.style.animationPlayState = 'paused';
      btn.closest('.orbit-planet').style.animationPlayState = 'paused';
    });
    btn.addEventListener('mouseleave', function () {
      if (ring) ring.style.animationPlayState = 'running';
      btn.closest('.orbit-planet').style.animationPlayState = 'running';
    });
    btn.addEventListener('focus', function () {
      showMission(parseInt(btn.dataset.project, 10));
      if (ring) ring.style.animationPlayState = 'paused';
    });
    btn.addEventListener('blur', function () {
      if (ring) ring.style.animationPlayState = 'running';
    });
  });

  if (planetButtons.length) showMission(0);

  /* ============================================================
     CONTACT FORM — fetch submit to /api/messages-store
     ============================================================ */
  var form = document.getElementById('contactForm');
  var submitBtn = document.getElementById('submitBtn');
  var submitBtnText = document.getElementById('submitBtnText');
  var formStatus = document.getElementById('formStatus');

  function setFieldError(fieldId, errId, message) {
    var field = document.getElementById(fieldId);
    var err = document.getElementById(errId);
    if (field) field.classList.toggle('error', !!message);
    if (err) err.textContent = message || '';
  }

  function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
  }

  function showStatus(type, message) {
    if (!formStatus) return;
    formStatus.className = 'form-status show ' + type;
    formStatus.innerHTML = '<i class="fa-solid ' + (type === 'success' ? 'fa-circle-check' : 'fa-triangle-exclamation') + '" aria-hidden="true"></i><span>' + message + '</span>';
  }

  function hideStatus() {
    if (!formStatus) return;
    formStatus.className = 'form-status';
    formStatus.innerHTML = '';
  }

  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      hideStatus();

      var name = document.getElementById('ctName').value.trim();
      var email = document.getElementById('ctEmail').value.trim();
      var subject = document.getElementById('ctSubject').value.trim();
      var message = document.getElementById('ctMessage').value.trim();

      var valid = true;
      setFieldError('fieldName', 'errName', '');
      setFieldError('fieldEmail', 'errEmail', '');
      setFieldError('fieldSubject', 'errSubject', '');
      setFieldError('fieldMessage', 'errMessage', '');

      if (!name) { setFieldError('fieldName', 'errName', 'Please enter your name.'); valid = false; }
      if (!email) { setFieldError('fieldEmail', 'errEmail', 'Please enter your email.'); valid = false; }
      else if (!isValidEmail(email)) { setFieldError('fieldEmail', 'errEmail', 'Please enter a valid email address.'); valid = false; }
      if (!subject) { setFieldError('fieldSubject', 'errSubject', 'Please enter a subject.'); valid = false; }
      if (!message) { setFieldError('fieldMessage', 'errMessage', 'Please enter a message.'); valid = false; }

      if (!valid) {
        showStatus('error', 'Please fix the highlighted fields before transmitting.');
        return;
      }

      submitBtn.disabled = true;
      submitBtnText.textContent = 'Transmitting…';

      fetch('/api/messages-store', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({ name: name, email: email, subject: subject, message: message })
      })
        .then(function (res) {
          return res.json().catch(function () { return {}; }).then(function (data) {
            return { ok: res.ok, status: res.status, data: data };
          });
        })
        .then(function (result) {
          if (result.ok) {
            showStatus('success', 'Transmission received! I\'ll get back to you soon.');
            form.reset();
          } else {
            var msg = (result.data && (result.data.message || (result.data.errors && Object.values(result.data.errors)[0] && Object.values(result.data.errors)[0][0])))
              || 'Something went wrong sending your transmission. Please try again.';
            showStatus('error', msg);
          }
        })
        .catch(function () {
          showStatus('error', 'Connection lost. Please check your network and try again.');
        })
        .finally(function () {
          submitBtn.disabled = false;
          submitBtnText.textContent = 'Send Transmission';
        });
    });

    ['ctName', 'ctEmail', 'ctSubject', 'ctMessage'].forEach(function (id) {
      var el = document.getElementById(id);
      if (el) el.addEventListener('input', function () {
        var fieldId = 'field' + id.replace('ct', '');
        var errId = 'err' + id.replace('ct', '');
        setFieldError(fieldId, errId, '');
      });
    });
  }

  /* ============================================================
     BACK TO TOP
     ============================================================ */
  var backBtn = document.getElementById('back-to-top');
  if (backBtn) {
    backBtn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
    });
  }

  /* ============================================================
     GSAP SCROLL-TRIGGERED PARALLAX (progressive enhancement)
     ============================================================ */
  if (window.gsap && window.ScrollTrigger && !reduceMotion) {
    gsap.registerPlugin(ScrollTrigger);
    gsap.utils.toArray('.nebula-blob').forEach(function (blob, i) {
      gsap.to(blob, {
        y: (i % 2 === 0 ? -80 : 80),
        ease: 'none',
        scrollTrigger: {
          trigger: document.body,
          start: 'top top',
          end: 'bottom bottom',
          scrub: 1.2
        }
      });
    });
  }
});
</script>
</body>
</html>
