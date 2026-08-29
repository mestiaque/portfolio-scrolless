<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan — Full-Stack Laravel Developer</title>
<meta name="description" content="Portfolio of M. Estiaque Ahmed Khan, a full-stack software engineer specializing in PHP, Laravel, ERP automation and enterprise web platforms. Building software with precision." />
<meta name="theme-color" content="#000000" />
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' rx='22' fill='%23000'/%3E%3Ctext x='50' y='68' font-size='58' font-family='Arial,sans-serif' font-weight='700' fill='%23fff' text-anchor='middle'%3EM%3C/text%3E%3C/svg%3E" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- GSAP + ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<style>
/* ==========================================================================
   RESET & ROOT
   ========================================================================== */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

:root {
  --white: #ffffff;
  --off-white: #f5f5f7;
  --paper: #fbfbfd;
  --black: #000000;
  --near-black: #1d1d1f;
  --ink-700: #3a3a3c;
  --ink-500: #6e6e73;
  --ink-300: #a1a1a6;
  --line: #d2d2d7;
  --line-soft: rgba(0, 0, 0, 0.08);
  --blue: #0071e3;
  --blue-light: #2997ff;
  --blue-glow: rgba(10, 132, 255, 0.35);
  --on-dark-line: rgba(255, 255, 255, 0.14);

  --radius-sm: 12px;
  --radius-md: 20px;
  --radius-lg: 28px;
  --radius-xl: 36px;

  --sp-1: 8px;
  --sp-2: 16px;
  --sp-3: 24px;
  --sp-4: 32px;
  --sp-5: 40px;
  --sp-6: 48px;
  --sp-8: 64px;
  --sp-10: 80px;
  --sp-12: 96px;
  --sp-16: 128px;
  --sp-20: 160px;

  --ease: cubic-bezier(0.16, 1, 0.3, 1);
  --ease-soft: cubic-bezier(0.4, 0, 0.2, 1);
  --nav-h: 72px;
}

html {
  scroll-behavior: smooth;
  font-size: 100%;
}

body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  background: var(--white);
  color: var(--near-black);
  line-height: 1.5;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  overflow-x: hidden;
}

img, svg { display: block; max-width: 100%; }
a { color: inherit; text-decoration: none; }
ul, ol { list-style: none; }
button { font: inherit; background: none; border: none; cursor: pointer; color: inherit; }
input, textarea { font: inherit; color: inherit; }

::selection { background: var(--blue); color: #fff; }

/* Focus visibility (accessibility-first) */
a:focus-visible,
button:focus-visible,
input:focus-visible,
textarea:focus-visible {
  outline: 2px solid var(--blue);
  outline-offset: 3px;
  border-radius: 4px;
}

.skip-link {
  position: absolute;
  left: -9999px;
  top: 0;
  background: var(--blue);
  color: #fff;
  padding: 12px 20px;
  z-index: 9999;
  border-radius: 0 0 8px 0;
  font-weight: 600;
}
.skip-link:focus { left: 0; }

.sr-only {
  position: absolute;
  width: 1px; height: 1px;
  padding: 0; margin: -1px;
  overflow: hidden;
  clip: rect(0,0,0,0);
  white-space: nowrap;
  border: 0;
}

/* ==========================================================================
   LAYOUT UTILITIES
   ========================================================================== */
.container {
  width: 100%;
  max-width: 1240px;
  margin: 0 auto;
  padding: 0 var(--sp-4);
}

section { position: relative; }

.section-pad { padding: var(--sp-20) 0; }

.section-label {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 0.8125rem;
  font-weight: 600;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--blue);
  margin-bottom: var(--sp-3);
}
.section-label::before {
  content: '';
  width: 22px;
  height: 2px;
  background: var(--blue);
  border-radius: 2px;
}
.section-label.light { color: var(--blue-light); }

.section-title {
  font-size: clamp(2rem, 4.4vw, 3.4rem);
  font-weight: 700;
  letter-spacing: -0.025em;
  line-height: 1.08;
  color: var(--near-black);
  max-width: 18ch;
}
.section-title.on-dark { color: #fff; }

.accent-text {
  background: linear-gradient(100deg, var(--blue), var(--blue-light) 60%, #6fc3ff);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}

.eyebrow {
  font-size: 0.9375rem;
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--ink-300);
}

.lead {
  font-size: clamp(1.15rem, 2vw, 1.45rem);
  font-weight: 400;
  line-height: 1.55;
  color: var(--near-black);
}

/* Scroll reveal system */
.reveal {
  opacity: 0;
  transform: translateY(36px);
  transition: opacity 0.9s var(--ease), transform 0.9s var(--ease);
  will-change: opacity, transform;
}
.reveal.is-visible { opacity: 1; transform: translateY(0); }

.reveal-scale { opacity: 0; transform: scale(0.94); transition: opacity 1s var(--ease), transform 1s var(--ease); }
.reveal-scale.is-visible { opacity: 1; transform: scale(1); }

.reveal-line { display: block; overflow: hidden; }
.reveal-line > span {
  display: block;
  transform: translateY(110%);
  transition: transform 1.1s var(--ease);
}
.reveal-line.is-visible > span { transform: translateY(0); }

.stagger .reveal:nth-child(1) { transition-delay: 0.05s; }
.stagger .reveal:nth-child(2) { transition-delay: 0.14s; }
.stagger .reveal:nth-child(3) { transition-delay: 0.23s; }
.stagger .reveal:nth-child(4) { transition-delay: 0.32s; }

@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }
  .reveal, .reveal-scale, .reveal-line > span {
    transition-duration: 0.01s !important;
    opacity: 1 !important;
    transform: none !important;
  }
  * { animation-duration: 0.01s !important; animation-iteration-count: 1 !important; }
}

/* ==========================================================================
   BUTTONS
   ========================================================================== */
.btn {
  position: relative;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 15px 28px;
  border-radius: 999px;
  font-size: 0.95rem;
  font-weight: 600;
  letter-spacing: -0.01em;
  cursor: pointer;
  transition: transform 0.35s var(--ease-soft), background 0.35s var(--ease-soft), color 0.35s var(--ease-soft), box-shadow 0.35s var(--ease-soft), border-color 0.35s var(--ease-soft);
  border: 1px solid transparent;
  white-space: nowrap;
}
.btn i { font-size: 0.85em; transition: transform 0.35s var(--ease-soft); }
.btn:hover i { transform: translateX(3px); }
.btn:active { transform: scale(0.96); }

.btn-primary {
  background: var(--near-black);
  color: #fff;
  box-shadow: 0 1px 2px rgba(0,0,0,0.08);
}
.btn-primary:hover {
  background: var(--blue);
  box-shadow: 0 12px 30px -8px var(--blue-glow);
  transform: translateY(-2px);
}
.btn-primary.on-dark { background: #fff; color: var(--near-black); }
.btn-primary.on-dark:hover { background: var(--blue); color: #fff; }

.btn-ghost {
  background: transparent;
  border-color: rgba(0,0,0,0.16);
  color: var(--near-black);
}
.btn-ghost:hover { border-color: var(--blue); color: var(--blue); transform: translateY(-2px); }
.btn-ghost.on-dark { border-color: var(--on-dark-line); color: #fff; }
.btn-ghost.on-dark:hover { border-color: var(--blue-light); color: var(--blue-light); }

.btn-nav {
  padding: 10px 20px;
  font-size: 0.875rem;
  background: var(--near-black);
  color: #fff;
}
.btn-nav:hover { background: var(--blue); }

.btn-block { width: 100%; padding: 16px 28px; }
.btn-block .btn-text { flex: 0 0 auto; }

/* ==========================================================================
   CURSOR GLOW (decorative flourish, fine-pointer only)
   ========================================================================== */
#cursorGlow {
  position: fixed;
  top: 0; left: 0;
  width: 380px; height: 380px;
  margin-left: -190px; margin-top: -190px;
  border-radius: 50%;
  background: radial-gradient(circle, var(--blue-glow) 0%, transparent 70%);
  pointer-events: none;
  z-index: 2;
  opacity: 0;
  transition: opacity 0.5s ease;
  mix-blend-mode: plus-lighter;
  will-change: transform;
}
@media (pointer: fine) {
  #cursorGlow.active { opacity: 0.55; }
}

/* ==========================================================================
   NAV
   ========================================================================== */
.nav {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 500;
  height: var(--nav-h);
  display: flex;
  align-items: center;
  background: rgba(255,255,255,0);
  border-bottom: 1px solid transparent;
  transition: background 0.4s var(--ease-soft), border-color 0.4s var(--ease-soft), backdrop-filter 0.4s var(--ease-soft);
}
.nav.scrolled {
  background: rgba(255,255,255,0.72);
  backdrop-filter: blur(20px) saturate(180%);
  -webkit-backdrop-filter: blur(20px) saturate(180%);
  border-bottom: 1px solid var(--line-soft);
}
.nav.on-dark-section:not(.scrolled) { color: #fff; }
.nav.on-dark-section.scrolled {
  background: rgba(0,0,0,0.6);
  border-bottom: 1px solid var(--on-dark-line);
  color: #fff;
}

.nav-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}

.logo {
  font-size: 1.05rem;
  font-weight: 800;
  letter-spacing: -0.02em;
  display: inline-flex;
  align-items: baseline;
}
.logo .logo-dot { color: var(--blue); }

.nav-links {
  display: flex;
  align-items: center;
  gap: var(--sp-5);
}
.nav-links a {
  font-size: 0.875rem;
  font-weight: 500;
  color: inherit;
  opacity: 0.78;
  position: relative;
  padding: 6px 0;
  transition: opacity 0.3s;
}
.nav-links a::after {
  content: '';
  position: absolute;
  left: 0; bottom: 0;
  width: 0; height: 1.5px;
  background: var(--blue);
  transition: width 0.3s var(--ease-soft);
}
.nav-links a:hover { opacity: 1; }
.nav-links a:hover::after { width: 100%; }

.nav-cta { display: flex; align-items: center; gap: var(--sp-3); }

.nav-toggle {
  display: none;
  width: 40px; height: 40px;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 5px;
  border-radius: 50%;
}
.nav-toggle span {
  display: block;
  width: 20px; height: 2px;
  background: currentColor;
  border-radius: 2px;
  transition: transform 0.35s var(--ease-soft), opacity 0.35s var(--ease-soft);
}
.nav-toggle.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-toggle.open span:nth-child(2) { opacity: 0; }
.nav-toggle.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

.mobile-menu {
  position: fixed;
  inset: var(--nav-h) 0 0 0;
  z-index: 480;
  background: rgba(255,255,255,0.98);
  backdrop-filter: blur(24px);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: var(--sp-5);
  transform: translateY(-12px);
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.4s var(--ease-soft), transform 0.4s var(--ease-soft);
}
.mobile-menu.open { opacity: 1; transform: translateY(0); pointer-events: auto; }
.mobile-menu a { font-size: 1.6rem; font-weight: 600; letter-spacing: -0.02em; color: var(--near-black); }
.mobile-menu .btn { margin-top: var(--sp-3); }

/* ==========================================================================
   HERO
   ========================================================================== */
.hero {
  min-height: 100svh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  background: var(--black);
  color: #fff;
  overflow: hidden;
  padding: calc(var(--nav-h) + var(--sp-8)) var(--sp-4) var(--sp-10);
}

.hero-bg { position: absolute; inset: 0; z-index: 0; pointer-events: none; }
.hero-bg .glow {
  position: absolute;
  border-radius: 50%;
  filter: blur(120px);
}
.hero-bg .glow-1 {
  width: 620px; height: 620px;
  background: radial-gradient(circle, rgba(10,132,255,0.35), transparent 70%);
  top: -160px; left: 50%;
  transform: translateX(-70%);
}
.hero-bg .glow-2 {
  width: 520px; height: 520px;
  background: radial-gradient(circle, rgba(41,151,255,0.22), transparent 70%);
  bottom: -220px; right: -80px;
}
.hero-bg .grid-overlay {
  position: absolute; inset: 0;
  background-image:
    linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px);
  background-size: 64px 64px;
  mask-image: radial-gradient(ellipse 70% 60% at 50% 30%, black 10%, transparent 75%);
}

.hero-content { position: relative; z-index: 2; max-width: 960px; }

.hero-content .eyebrow { display: block; margin-bottom: var(--sp-4); }

.hero-title {
  font-size: clamp(2.6rem, 8.6vw, 6.6rem);
  font-weight: 700;
  letter-spacing: -0.035em;
  line-height: 1.02;
  margin-bottom: var(--sp-5);
}

.hero-sub {
  font-size: clamp(1.05rem, 1.7vw, 1.35rem);
  font-weight: 400;
  color: rgba(255,255,255,0.68);
  max-width: 640px;
  margin: 0 auto var(--sp-6);
  line-height: 1.6;
}

.hero-actions {
  display: flex;
  gap: var(--sp-2);
  justify-content: center;
  flex-wrap: wrap;
}

.scroll-cue {
  position: absolute;
  bottom: var(--sp-4);
  left: 50%;
  transform: translateX(-50%);
  z-index: 2;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  font-size: 0.7rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.45);
}
.scroll-cue span {
  width: 1px; height: 34px;
  background: linear-gradient(rgba(255,255,255,0.6), transparent);
  animation: scrollCue 2s ease-in-out infinite;
}
@keyframes scrollCue {
  0% { transform: scaleY(0.3); transform-origin: top; opacity: 0.3; }
  50% { transform: scaleY(1); transform-origin: top; opacity: 1; }
  100% { transform: scaleY(0.3); transform-origin: bottom; opacity: 0.3; }
}

/* ==========================================================================
   ABOUT
   ========================================================================== */
.about { background: var(--white); }
.about-grid {
  display: grid;
  grid-template-columns: 0.85fr 1.15fr;
  gap: var(--sp-10);
  padding: var(--sp-20) 0;
}
.about-sticky {
  position: sticky;
  top: calc(var(--nav-h) + var(--sp-6));
  align-self: start;
  height: fit-content;
}
.about-body p { margin-bottom: var(--sp-4); color: var(--ink-700); }
.about-body p.lead { color: var(--near-black); margin-bottom: var(--sp-5); }

.education {
  display: grid;
  gap: var(--sp-3);
  margin-top: var(--sp-6);
}
.edu-item {
  display: flex;
  gap: var(--sp-3);
  align-items: flex-start;
  padding: var(--sp-4);
  border: 1px solid var(--line-soft);
  border-radius: var(--radius-md);
  transition: border-color 0.35s var(--ease-soft), transform 0.35s var(--ease-soft), box-shadow 0.35s var(--ease-soft);
  background: var(--paper);
}
.edu-item:hover { border-color: var(--blue); transform: translateY(-3px); box-shadow: 0 16px 32px -18px rgba(0,0,0,0.15); }
.edu-icon {
  flex: 0 0 auto;
  width: 46px; height: 46px;
  border-radius: 50%;
  background: rgba(10,132,255,0.1);
  color: var(--blue);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem;
}
.edu-item h3 { font-size: 1.02rem; font-weight: 600; margin-bottom: 2px; letter-spacing: -0.01em; }
.edu-item p { margin: 0; font-size: 0.9rem; color: var(--ink-500); }

/* ==========================================================================
   EXPERIENCE
   ========================================================================== */
.experience { background: var(--off-white); }
.experience .container { padding: var(--sp-20) var(--sp-4); }
.experience .section-label,
.experience .section-title { color: var(--near-black); }
.experience .section-title { margin-bottom: var(--sp-10); }

.timeline { position: relative; max-width: 880px; }
.timeline-track {
  position: absolute;
  left: 11px; top: 6px; bottom: 6px;
  width: 2px;
  background: var(--line);
  border-radius: 2px;
}
.timeline-progress {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 0%;
  background: linear-gradient(var(--blue), var(--blue-light));
  border-radius: 2px;
}

.timeline-item {
  position: relative;
  padding-left: var(--sp-8);
  padding-bottom: var(--sp-10);
}
.timeline-item:last-child { padding-bottom: 0; }
.timeline-dot {
  position: absolute;
  left: 0; top: 4px;
  width: 24px; height: 24px;
  border-radius: 50%;
  background: var(--white);
  border: 2px solid var(--blue);
  display: flex; align-items: center; justify-content: center;
}
.timeline-dot::after { content:''; width: 8px; height: 8px; border-radius: 50%; background: var(--blue); }

.timeline-date {
  display: inline-block;
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  color: var(--blue);
  margin-bottom: var(--sp-1);
}
.timeline-content h3 { font-size: 1.5rem; font-weight: 700; letter-spacing: -0.02em; margin-bottom: 4px; }
.timeline-company { font-size: 1rem; font-weight: 500; color: var(--ink-500); margin-bottom: var(--sp-2); }
.timeline-content p:last-child { color: var(--ink-700); max-width: 56ch; line-height: 1.6; }
.timeline-item.current .timeline-dot { background: var(--blue); box-shadow: 0 0 0 6px rgba(10,132,255,0.14); }
.timeline-item.current .timeline-dot::after { background: #fff; }
.current-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  margin-left: 10px;
  font-size: 0.7rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--blue);
  background: rgba(10,132,255,0.1);
  padding: 3px 10px;
  border-radius: 999px;
  vertical-align: middle;
}
.current-badge::before { content:''; width:6px; height:6px; border-radius:50%; background: var(--blue); animation: pulseDot 1.6s ease-in-out infinite; }
@keyframes pulseDot { 0%,100%{opacity:1;} 50%{opacity:0.25;} }

/* ==========================================================================
   SKILLS
   ========================================================================== */
.skills { background: var(--white); }
.skills .container { padding: var(--sp-20) var(--sp-4); }
.skills .section-title { margin-bottom: var(--sp-10); max-width: 26ch; }

.skills-groups {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--sp-6);
}
.skill-group h3 {
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--ink-500);
  margin-bottom: var(--sp-3);
}
.pill-list { display: flex; flex-wrap: wrap; gap: 10px; }
.pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 18px;
  border-radius: 999px;
  border: 1px solid var(--line-soft);
  background: var(--paper);
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--ink-700);
  transition: border-color 0.3s var(--ease-soft), color 0.3s var(--ease-soft), transform 0.3s var(--ease-soft), background 0.3s var(--ease-soft);
}
.pill:hover {
  border-color: var(--blue);
  color: var(--blue);
  background: rgba(10,132,255,0.06);
  transform: translateY(-2px);
}

/* ==========================================================================
   PROJECTS (stacking sticky cards)
   ========================================================================== */
.projects { background: var(--black); color: #fff; padding-top: var(--sp-20); padding-bottom: var(--sp-6); }
.projects > .container { margin-bottom: var(--sp-10); }
.projects .section-title { max-width: 22ch; }

.project-stack { position: relative; }

.project-card {
  position: sticky;
  top: calc(var(--nav-h) + 18px);
  margin: 0 auto var(--sp-6);
  max-width: 1200px;
  padding: 0 var(--sp-4);
}
.project-card-inner {
  border-radius: var(--radius-xl);
  background: linear-gradient(155deg, #141416, #0a0a0c);
  border: 1px solid rgba(255,255,255,0.08);
  box-shadow: 0 40px 90px -30px rgba(0,0,0,0.7);
  overflow: hidden;
  transform-origin: top center;
}

.project-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  gap: var(--sp-8);
  padding: var(--sp-8);
}
.project-card:nth-child(even) .project-grid { direction: rtl; }
.project-card:nth-child(even) .project-grid > * { direction: ltr; }

.project-index {
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  color: var(--blue-light);
  display: block;
  margin-bottom: var(--sp-2);
}
.project-info h3 { font-size: clamp(1.5rem, 2.6vw, 2.15rem); font-weight: 700; letter-spacing: -0.02em; margin-bottom: var(--sp-2); }
.project-info p.desc { color: rgba(255,255,255,0.62); line-height: 1.65; margin-bottom: var(--sp-4); max-width: 46ch; }

.tag-list { display: flex; flex-wrap: wrap; gap: 8px; }
.tag-list span {
  font-size: 0.78rem;
  font-weight: 500;
  padding: 6px 14px;
  border-radius: 999px;
  border: 1px solid var(--on-dark-line);
  color: rgba(255,255,255,0.75);
}

/* Device mockup (CSS-only, no image assets) */
.device-frame {
  border-radius: 18px;
  background: linear-gradient(150deg, #232326, #0c0c0e);
  padding: 3px;
  box-shadow: 0 30px 60px -20px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,255,255,0.05) inset;
}
.chrome {
  height: 34px;
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 0 14px;
}
.chrome .dot { width: 9px; height: 9px; border-radius: 50%; }
.chrome .dot.r { background: #ff5f57; }
.chrome .dot.g { background: #febc2e; }
.chrome .dot.b { background: #28c840; }

.screen {
  position: relative;
  min-height: 300px;
  border-radius: 0 0 15px 15px;
  overflow: hidden;
  background: linear-gradient(165deg, #0a0a0c 0%, #1a1a1d 100%);
}
.screen .ui-glow {
  position: absolute;
  width: 260px; height: 260px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(10,132,255,0.28), transparent 70%);
  filter: blur(10px);
}
.screen-1 .ui-glow { top: -60px; right: -60px; }
.screen-2 .ui-glow { bottom: -80px; left: -40px; }
.screen-3 .ui-glow { top: 40%; left: 50%; transform: translate(-50%,-50%); }
.screen-4 .ui-glow { top: -40px; left: -40px; }

.ui-bars {
  position: absolute;
  bottom: 28px; left: 28px; right: 28px;
  height: 120px;
  display: flex;
  align-items: flex-end;
  gap: 8px;
}
.ui-bars span {
  flex: 1;
  border-radius: 6px 6px 0 0;
  background: linear-gradient(180deg, var(--blue-light), rgba(10,132,255,0.25));
}
.ui-card {
  position: absolute;
  top: 26px; left: 26px;
  width: 58%;
  height: 34px;
  border-radius: 10px;
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.08);
}
.ui-card::before {
  content: '';
  position: absolute;
  top: 12px; left: 14px;
  width: 40%; height: 8px;
  border-radius: 4px;
  background: rgba(255,255,255,0.18);
}
.ui-card.small { width: 30%; top: 74px; height: 26px; }
.ui-line { position: absolute; height: 2px; background: rgba(255,255,255,0.12); border-radius: 2px; }

/* ==========================================================================
   TESTIMONIALS
   ========================================================================== */
.testimonials { background: var(--off-white); }
.testimonials .container { padding: var(--sp-20) var(--sp-4); }
.testimonials .section-title { margin-bottom: var(--sp-10); }

.testimonial-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--sp-4);
}
.testimonial-card {
  background: var(--white);
  border: 1px solid var(--line-soft);
  border-radius: var(--radius-lg);
  padding: var(--sp-6) var(--sp-4) var(--sp-4);
  display: flex;
  flex-direction: column;
  transition: transform 0.4s var(--ease-soft), box-shadow 0.4s var(--ease-soft);
}
.testimonial-card:hover { transform: translateY(-6px); box-shadow: 0 24px 50px -24px rgba(0,0,0,0.22); }
.quote-icon { color: var(--blue); opacity: 0.5; font-size: 1.4rem; margin-bottom: var(--sp-3); }
.testimonial-card p { flex: 1; color: var(--ink-700); line-height: 1.65; margin-bottom: var(--sp-5); font-size: 0.98rem; }
.testimonial-card footer { display: flex; align-items: center; gap: 12px; }
.avatar-initials {
  width: 42px; height: 42px;
  border-radius: 50%;
  background: linear-gradient(140deg, var(--blue), var(--blue-light));
  color: #fff;
  display: flex; align-items: center; justify-content: center;
  font-weight: 700; font-size: 0.85rem;
  flex: 0 0 auto;
}
.testimonial-card footer strong { display: block; font-size: 0.9rem; font-weight: 600; }
.testimonial-card footer span { display: block; font-size: 0.8rem; color: var(--ink-500); }

/* ==========================================================================
   CONTACT
   ========================================================================== */
.contact { background: var(--black); color: #fff; }
.contact-grid {
  display: grid;
  grid-template-columns: 0.9fr 1.1fr;
  gap: var(--sp-10);
  padding: var(--sp-20) 0;
}
.contact-info p { color: rgba(255,255,255,0.62); line-height: 1.65; margin: var(--sp-4) 0 var(--sp-6); max-width: 42ch; }
.contact-email {
  display: inline-block;
  font-size: clamp(1.15rem, 2.2vw, 1.6rem);
  font-weight: 600;
  letter-spacing: -0.01em;
  color: #fff;
  border-bottom: 1px solid var(--on-dark-line);
  padding-bottom: 6px;
  margin-bottom: var(--sp-6);
  transition: color 0.3s, border-color 0.3s;
}
.contact-email:hover { color: var(--blue-light); border-color: var(--blue-light); }

.social-links { display: flex; gap: var(--sp-3); }
.social-links a {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 12px 20px;
  border-radius: 999px;
  border: 1px solid var(--on-dark-line);
  font-size: 0.875rem;
  font-weight: 500;
  transition: border-color 0.3s, color 0.3s, transform 0.3s;
}
.social-links a:hover { border-color: var(--blue-light); color: var(--blue-light); transform: translateY(-2px); }

.contact-form {
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--on-dark-line);
  border-radius: var(--radius-lg);
  padding: var(--sp-6);
}
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: var(--sp-3); }
.form-field { margin-bottom: var(--sp-4); }
.form-field label {
  display: block;
  font-size: 0.8rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.5);
  margin-bottom: 8px;
}
.form-field input,
.form-field textarea {
  width: 100%;
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--on-dark-line);
  border-radius: 10px;
  padding: 13px 16px;
  color: #fff;
  font-size: 0.95rem;
  transition: border-color 0.3s, background 0.3s;
  resize: vertical;
}
.form-field input::placeholder,
.form-field textarea::placeholder { color: rgba(255,255,255,0.3); }
.form-field input:focus,
.form-field textarea:focus {
  border-color: var(--blue-light);
  background: rgba(255,255,255,0.06);
  outline: none;
}
.form-field.error input,
.form-field.error textarea { border-color: #ff6b6b; }
.field-error { display: none; font-size: 0.78rem; color: #ff8a8a; margin-top: 6px; }
.form-field.error .field-error { display: block; }

.form-status {
  margin-top: var(--sp-3);
  font-size: 0.875rem;
  min-height: 1.2em;
  transition: color 0.3s;
}
.form-status.success { color: #34d399; }
.form-status.error { color: #ff8a8a; }

.btn-block[disabled] { opacity: 0.6; cursor: not-allowed; transform: none !important; }
.btn-block .fa-spinner { animation: spin 0.8s linear infinite; }
@keyframes spin { to { transform: rotate(360deg); } }

/* ==========================================================================
   FOOTER
   ========================================================================== */
.footer { background: #050505; color: rgba(255,255,255,0.7); padding: var(--sp-10) 0 var(--sp-5); }
.footer-inner {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  gap: var(--sp-6);
  padding-bottom: var(--sp-8);
  border-bottom: 1px solid var(--on-dark-line);
}
.footer-brand { font-size: 1.1rem; font-weight: 700; color: #fff; }
.footer-brand span { display: block; font-size: 0.8rem; font-weight: 400; color: rgba(255,255,255,0.45); margin-top: 4px; }
.footer-links { display: flex; flex-wrap: wrap; gap: var(--sp-4); }
.footer-links a { font-size: 0.875rem; color: rgba(255,255,255,0.6); transition: color 0.3s; }
.footer-links a:hover { color: var(--blue-light); }
.footer-social { display: flex; gap: var(--sp-3); }
.footer-social a {
  width: 40px; height: 40px;
  border-radius: 50%;
  border: 1px solid var(--on-dark-line);
  display: flex; align-items: center; justify-content: center;
  transition: border-color 0.3s, color 0.3s, transform 0.3s;
}
.footer-social a:hover { border-color: var(--blue-light); color: var(--blue-light); transform: translateY(-3px); }

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: var(--sp-5);
  font-size: 0.8rem;
  color: rgba(255,255,255,0.4);
}
.back-to-top {
  width: 42px; height: 42px;
  border-radius: 50%;
  border: 1px solid var(--on-dark-line);
  display: flex; align-items: center; justify-content: center;
  transition: border-color 0.3s, transform 0.3s, color 0.3s;
}
.back-to-top:hover { border-color: var(--blue-light); color: var(--blue-light); transform: translateY(-4px); }

/* ==========================================================================
   RESPONSIVE
   ========================================================================== */
@media (max-width: 1024px) {
  .about-grid { grid-template-columns: 1fr; gap: var(--sp-6); }
  .about-sticky { position: static; }
  .skills-groups { grid-template-columns: 1fr 1fr; }
  .project-grid { grid-template-columns: 1fr; gap: var(--sp-5); padding: var(--sp-6); }
  .project-card:nth-child(even) .project-grid { direction: ltr; }
  .testimonial-grid { grid-template-columns: 1fr; }
  .contact-grid { grid-template-columns: 1fr; gap: var(--sp-8); }
}

@media (max-width: 860px) {
  .nav-links, .nav-cta .btn-nav { display: none; }
  .nav-toggle { display: flex; }
}

@media (max-width: 640px) {
  .container { padding: 0 var(--sp-3); }
  .section-pad, .experience .container, .skills .container, .testimonials .container { padding-top: var(--sp-12); padding-bottom: var(--sp-12); }
  .about-grid, .contact-grid { padding: var(--sp-12) 0; }
  .skills-groups { grid-template-columns: 1fr; gap: var(--sp-5); }
  .form-row { grid-template-columns: 1fr; }
  .hero-actions { flex-direction: column; width: 100%; }
  .hero-actions .btn { width: 100%; }
  .footer-inner { flex-direction: column; }
  .footer-bottom { flex-direction: column; gap: var(--sp-3); text-align: center; }
  .project-card { top: calc(var(--nav-h) + 10px); }
  .project-card-inner { border-radius: var(--radius-md); }
  #cursorGlow { display: none; }
}

@media (max-width: 400px) {
  .hero-title { font-size: clamp(2.1rem, 11vw, 3rem); }
  .btn { width: 100%; }
  .social-links { flex-direction: column; }
}
</style>
</head>
<body>
<a href="#main" class="skip-link">Skip to content</a>
<div id="cursorGlow" aria-hidden="true"></div>

<!-- ============================= NAV ============================= -->
<header class="nav on-dark-section" id="siteNav">
  <div class="container nav-inner">
    <a href="#hero" class="logo" aria-label="M. Estiaque Ahmed Khan — Home">M<span class="logo-dot">.</span>EAK</a>

    <nav class="nav-links" aria-label="Primary">
      <a href="#about">About</a>
      <a href="#experience">Experience</a>
      <a href="#skills">Skills</a>
      <a href="#projects">Work</a>
      <a href="#testimonials">Testimonials</a>
      <a href="#contact">Contact</a>
    </nav>

    <div class="nav-cta">
      <a href="#contact" class="btn btn-nav">Let's Talk</a>
      <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobileMenu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>

  <div class="mobile-menu" id="mobileMenu">
    <a href="#about">About</a>
    <a href="#experience">Experience</a>
    <a href="#skills">Skills</a>
    <a href="#projects">Work</a>
    <a href="#testimonials">Testimonials</a>
    <a href="#contact">Contact</a>
    <a href="#contact" class="btn btn-primary">Let's Talk</a>
  </div>
</header>

<main id="main">

  <!-- ============================= HERO ============================= -->
  <section id="hero" class="hero" data-theme="dark">
    <div class="hero-bg" aria-hidden="true">
      <div class="glow glow-1"></div>
      <div class="glow glow-2"></div>
      <div class="grid-overlay"></div>
    </div>

    <div class="hero-content">
      <span class="eyebrow reveal">Software Engineer &middot; Full-Stack Laravel Developer</span>
      <h1 class="hero-title">
        <span class="reveal-line"><span>Building software.</span></span>
        <span class="reveal-line"><span class="accent-text">With precision.</span></span>
      </h1>
      <p class="hero-sub reveal">M. Estiaque Ahmed Khan designs and ships fast, reliable, beautifully engineered web platforms — from ERP automation to modern full-stack applications.</p>
      <div class="hero-actions reveal">
        <a href="#projects" class="btn btn-primary on-dark">View My Work <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        <a href="#contact" class="btn btn-ghost on-dark">Get in Touch</a>
      </div>
    </div>

    <div class="scroll-cue"><span></span>Scroll</div>
  </section>

  <!-- ============================= ABOUT ============================= -->
  <section id="about" class="about" data-theme="light">
    <div class="container about-grid">
      <div class="about-sticky">
        <p class="section-label">About</p>
        <h2 class="section-title reveal">Full-stack engineering, <span class="accent-text">precision-built.</span></h2>
      </div>

      <div class="about-body">
        <p class="lead reveal">Full-stack developer with hands-on experience across frontend optimization, database management, PHP/Laravel web application development, custom inventory management modules, enterprise automation solutions, and ERP systems integration.</p>
        <p class="reveal">Comfortable owning a feature end to end — from schema design and API contracts to the interface a client's team uses every day. The focus stays constant: fewer moving parts, faster pages, and systems that hold up under real production load.</p>

        <div class="education stagger">
          <div class="edu-item reveal">
            <div class="edu-icon"><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i></div>
            <div>
              <h3>MSc in Computer Science</h3>
              <p>Uttara University &middot; Passing Year 2025</p>
            </div>
          </div>
          <div class="edu-item reveal">
            <div class="edu-icon"><i class="fa-solid fa-graduation-cap" aria-hidden="true"></i></div>
            <div>
              <h3>BSc in Computer Science &amp; Engineering</h3>
              <p>Uttara University &middot; Passing Year 2021</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================= EXPERIENCE ============================= -->
  <section id="experience" class="experience" data-theme="light">
    <div class="container">
      <p class="section-label">Experience</p>
      <h2 class="section-title reveal">Where the work happened.</h2>

      <div class="timeline">
        <div class="timeline-track" aria-hidden="true">
          <div class="timeline-progress" id="timelineProgress"></div>
        </div>

        <div class="timeline-item current reveal">
          <div class="timeline-dot" aria-hidden="true"></div>
          <div class="timeline-content">
            <span class="timeline-date">2025 &mdash; Present <span class="current-badge">Current</span></span>
            <h3>Software Engineer</h3>
            <p class="timeline-company">Natore IT</p>
            <p>Frontend optimization and database management for local business clients.</p>
          </div>
        </div>

        <div class="timeline-item reveal">
          <div class="timeline-dot" aria-hidden="true"></div>
          <div class="timeline-content">
            <span class="timeline-date">2023 &mdash; 2025</span>
            <h3>Software Developer</h3>
            <p class="timeline-company">Isotope IT</p>
            <p>Specialized in PHP/Laravel web applications and custom inventory management modules.</p>
          </div>
        </div>

        <div class="timeline-item reveal">
          <div class="timeline-dot" aria-hidden="true"></div>
          <div class="timeline-content">
            <span class="timeline-date">2022 &mdash; 2023</span>
            <h3>Software Engineer</h3>
            <p class="timeline-company">Barcode Tech Automation Ltd</p>
            <p>Led development of enterprise automation solutions and ERP systems integration.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================= SKILLS ============================= -->
  <section id="skills" class="skills" data-theme="light">
    <div class="container">
      <p class="section-label">Skills</p>
      <h2 class="section-title reveal">Tools of the trade.</h2>

      <div class="skills-groups stagger">
        <div class="skill-group reveal">
          <h3>Languages &amp; Frameworks</h3>
          <div class="pill-list">
            <span class="pill"><i class="fa-solid fa-code" aria-hidden="true"></i>PHP 8</span>
            <span class="pill"><i class="fa-brands fa-laravel" aria-hidden="true"></i>Laravel</span>
            <span class="pill"><i class="fa-brands fa-js" aria-hidden="true"></i>JavaScript (ES6+)</span>
            <span class="pill"><i class="fa-brands fa-vuejs" aria-hidden="true"></i>Vue.js</span>
            <span class="pill"><i class="fa-solid fa-bolt" aria-hidden="true"></i>Alpine.js</span>
            <span class="pill"><i class="fa-solid fa-bolt-lightning" aria-hidden="true"></i>Livewire</span>
          </div>
        </div>

        <div class="skill-group reveal">
          <h3>Data &amp; Infrastructure</h3>
          <div class="pill-list">
            <span class="pill"><i class="fa-solid fa-database" aria-hidden="true"></i>MySQL</span>
            <span class="pill"><i class="fa-solid fa-database" aria-hidden="true"></i>PostgreSQL</span>
            <span class="pill"><i class="fa-solid fa-layer-group" aria-hidden="true"></i>Redis</span>
            <span class="pill"><i class="fa-solid fa-plug" aria-hidden="true"></i>REST API design</span>
            <span class="pill"><i class="fa-brands fa-docker" aria-hidden="true"></i>Docker</span>
            <span class="pill"><i class="fa-brands fa-aws" aria-hidden="true"></i>AWS</span>
            <span class="pill"><i class="fa-solid fa-arrows-spin" aria-hidden="true"></i>CI/CD</span>
          </div>
        </div>

        <div class="skill-group reveal">
          <h3>Styling &amp; Tooling</h3>
          <div class="pill-list">
            <span class="pill"><i class="fa-solid fa-wind" aria-hidden="true"></i>Tailwind CSS</span>
            <span class="pill"><i class="fa-brands fa-bootstrap" aria-hidden="true"></i>Bootstrap 5</span>
            <span class="pill"><i class="fa-brands fa-git-alt" aria-hidden="true"></i>Git</span>
            <span class="pill"><i class="fa-solid fa-gauge-high" aria-hidden="true"></i>Database Optimization</span>
            <span class="pill"><i class="fa-solid fa-diagram-project" aria-hidden="true"></i>ERP Integration</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================= PROJECTS ============================= -->
  <section id="projects" class="projects" data-theme="dark">
    <div class="container">
      <p class="section-label light">Featured Projects</p>
      <h2 class="section-title on-dark reveal">Selected work.</h2>
    </div>

    <div class="project-stack">
      <article class="project-card">
        <div class="project-card-inner reveal-scale">
          <div class="project-grid">
            <div class="project-info">
              <span class="project-index">01</span>
              <h3>Port3folio Package</h3>
              <p class="desc">A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
              <div class="tag-list">
                <span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span>
              </div>
            </div>
            <div class="project-visual">
              <div class="device-frame">
                <div class="chrome"><span class="dot r"></span><span class="dot g"></span><span class="dot b"></span></div>
                <div class="screen screen-1">
                  <div class="ui-glow" aria-hidden="true"></div>
                  <div class="ui-card" aria-hidden="true"></div>
                  <div class="ui-card small" aria-hidden="true"></div>
                  <div class="ui-bars" aria-hidden="true">
                    <span style="height:38%"></span><span style="height:64%"></span><span style="height:48%"></span>
                    <span style="height:82%"></span><span style="height:56%"></span><span style="height:70%"></span>
                    <span style="height:44%"></span><span style="height:60%"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      <article class="project-card">
        <div class="project-card-inner reveal-scale">
          <div class="project-grid">
            <div class="project-info">
              <span class="project-index">02</span>
              <h3>E-Commerce Platform</h3>
              <p class="desc">High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
              <div class="tag-list">
                <span>Laravel</span><span>Vue.js</span><span>MySQL</span><span>Redis</span><span>Stripe</span>
              </div>
            </div>
            <div class="project-visual">
              <div class="device-frame">
                <div class="chrome"><span class="dot r"></span><span class="dot g"></span><span class="dot b"></span></div>
                <div class="screen screen-2">
                  <div class="ui-glow" aria-hidden="true"></div>
                  <div class="ui-card" aria-hidden="true"></div>
                  <div class="ui-card small" style="top:74px; left:60%; width:32%;" aria-hidden="true"></div>
                  <div class="ui-bars" aria-hidden="true">
                    <span style="height:60%"></span><span style="height:34%"></span><span style="height:78%"></span>
                    <span style="height:50%"></span><span style="height:66%"></span><span style="height:40%"></span>
                    <span style="height:86%"></span><span style="height:52%"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      <article class="project-card">
        <div class="project-card-inner reveal-scale">
          <div class="project-grid">
            <div class="project-info">
              <span class="project-index">03</span>
              <h3>SaaS Analytics Dashboard</h3>
              <p class="desc">Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
              <div class="tag-list">
                <span>Laravel</span><span>Livewire</span><span>Alpine.js</span><span>PostgreSQL</span><span>Chart.js</span>
              </div>
            </div>
            <div class="project-visual">
              <div class="device-frame">
                <div class="chrome"><span class="dot r"></span><span class="dot g"></span><span class="dot b"></span></div>
                <div class="screen screen-3">
                  <div class="ui-glow" aria-hidden="true"></div>
                  <div class="ui-card" style="width:40%;" aria-hidden="true"></div>
                  <div class="ui-card small" style="top:70px; width:24%;" aria-hidden="true"></div>
                  <div class="ui-card small" style="top:70px; left:38%; width:24%;" aria-hidden="true"></div>
                  <div class="ui-bars" aria-hidden="true">
                    <span style="height:70%"></span><span style="height:46%"></span><span style="height:58%"></span>
                    <span style="height:32%"></span><span style="height:74%"></span><span style="height:62%"></span>
                    <span style="height:40%"></span><span style="height:80%"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      <article class="project-card">
        <div class="project-card-inner reveal-scale">
          <div class="project-grid">
            <div class="project-info">
              <span class="project-index">04</span>
              <h3>Inventory Management System</h3>
              <p class="desc">Custom-built inventory &amp; ERP automation module for enterprise clients, covering stock tracking, procurement workflows, and reporting.</p>
              <div class="tag-list">
                <span>PHP</span><span>Laravel</span><span>MySQL</span><span>REST API</span>
              </div>
            </div>
            <div class="project-visual">
              <div class="device-frame">
                <div class="chrome"><span class="dot r"></span><span class="dot g"></span><span class="dot b"></span></div>
                <div class="screen screen-4">
                  <div class="ui-glow" aria-hidden="true"></div>
                  <div class="ui-card" aria-hidden="true"></div>
                  <div class="ui-bars" aria-hidden="true">
                    <span style="height:50%"></span><span style="height:76%"></span><span style="height:36%"></span>
                    <span style="height:64%"></span><span style="height:44%"></span><span style="height:80%"></span>
                    <span style="height:58%"></span><span style="height:30%"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>

  <!-- ============================= TESTIMONIALS ============================= -->
  <section id="testimonials" class="testimonials" data-theme="light">
    <div class="container">
      <p class="section-label">Testimonials</p>
      <h2 class="section-title reveal">What people say.</h2>

      <div class="testimonial-grid stagger">
        <blockquote class="testimonial-card reveal">
          <i class="fa-solid fa-quote-left quote-icon" aria-hidden="true"></i>
          <p>"He took ownership of our inventory and ERP workflows from day one, translating complicated manual processes into clean, reliable Laravel modules. The systems he built are still running production loads without a hitch."</p>
          <footer>
            <span class="avatar-initials" aria-hidden="true">PS</span>
            <div><strong>Project Stakeholder</strong><span>Isotope IT</span></div>
          </footer>
        </blockquote>

        <blockquote class="testimonial-card reveal">
          <i class="fa-solid fa-quote-left quote-icon" aria-hidden="true"></i>
          <p>"His grasp of enterprise automation and systems integration is rare. He didn't just write code — he understood the business logic well enough to simplify it before touching a single line."</p>
          <footer>
            <span class="avatar-initials" aria-hidden="true">EL</span>
            <div><strong>Engineering Lead</strong><span>Barcode Tech Automation Ltd</span></div>
          </footer>
        </blockquote>

        <blockquote class="testimonial-card reveal">
          <i class="fa-solid fa-quote-left quote-icon" aria-hidden="true"></i>
          <p>"Consistently sharp on both frontend performance and backend data structure. Every optimization he shipped had a measurable, visible impact on load times for our clients."</p>
          <footer>
            <span class="avatar-initials" aria-hidden="true">OL</span>
            <div><strong>Operations Lead</strong><span>Natore IT</span></div>
          </footer>
        </blockquote>
      </div>
    </div>
  </section>

  <!-- ============================= CONTACT ============================= -->
  <section id="contact" class="contact" data-theme="dark">
    <div class="container contact-grid">
      <div class="contact-info">
        <p class="section-label light">Contact</p>
        <h2 class="section-title on-dark reveal">Let's build <span class="accent-text">something great.</span></h2>
        <p class="reveal">Have a project in mind, or just want to talk shop about Laravel, ERP systems, or performance engineering? I'd love to hear from you.</p>

        <a href="mailto:mrm.khan.1298@gmail.com" class="contact-email reveal">mrm.khan.1298@gmail.com</a>

        <div class="social-links reveal">
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-github" aria-hidden="true"></i><span>GitHub</span>
          </a>
          <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer">
            <i class="fa-brands fa-linkedin" aria-hidden="true"></i><span>LinkedIn</span>
          </a>
        </div>
      </div>

      <form id="contactForm" class="contact-form reveal" novalidate>
        <div class="form-row">
          <div class="form-field" data-field="name">
            <label for="cf-name">Name</label>
            <input type="text" id="cf-name" name="name" placeholder="Your full name" required autocomplete="name" />
            <span class="field-error">Please enter your name.</span>
          </div>
          <div class="form-field" data-field="email">
            <label for="cf-email">Email</label>
            <input type="email" id="cf-email" name="email" placeholder="you@example.com" required autocomplete="email" />
            <span class="field-error">Please enter a valid email.</span>
          </div>
        </div>

        <div class="form-field" data-field="subject">
          <label for="cf-subject">Subject</label>
          <input type="text" id="cf-subject" name="subject" placeholder="What's this about?" required />
          <span class="field-error">Please add a subject.</span>
        </div>

        <div class="form-field" data-field="message">
          <label for="cf-message">Message</label>
          <textarea id="cf-message" name="message" rows="5" placeholder="Tell me a bit about your project..." required></textarea>
          <span class="field-error">Please write a short message.</span>
        </div>

        <button type="submit" class="btn btn-primary on-dark btn-block" id="cfSubmit">
          <span class="btn-text">Send Message</span>
          <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
        </button>

        <p class="form-status" id="cfStatus" role="status" aria-live="polite"></p>
      </form>
    </div>
  </section>

</main>

<!-- ============================= FOOTER ============================= -->
<footer class="footer">
  <div class="container footer-inner">
    <div class="footer-brand">
      M. Estiaque Ahmed Khan
      <span>Software Engineer &middot; Full-Stack Laravel Developer</span>
    </div>

    <nav class="footer-links" aria-label="Footer">
      <a href="#about">About</a>
      <a href="#experience">Experience</a>
      <a href="#skills">Skills</a>
      <a href="#projects">Work</a>
      <a href="#testimonials">Testimonials</a>
      <a href="#contact">Contact</a>
    </nav>

    <div class="footer-social">
      <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fa-brands fa-github" aria-hidden="true"></i></a>
      <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>
      <a href="mailto:mrm.khan.1298@gmail.com" aria-label="Email"><i class="fa-solid fa-envelope" aria-hidden="true"></i></a>
    </div>
  </div>

  <div class="container footer-bottom">
    <p>&copy; <span id="year"></span> M. Estiaque Ahmed Khan. All rights reserved.</p>
    <button class="back-to-top" id="backToTop" aria-label="Back to top"><i class="fa-solid fa-arrow-up" aria-hidden="true"></i></button>
  </div>
</footer>

<script>
(function () {
  'use strict';

  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------------------------------------------------------
     NAV: scrolled state + theme (dark/light) awareness
  --------------------------------------------------------- */
  var nav = document.getElementById('siteNav');
  var sections = Array.prototype.slice.call(document.querySelectorAll('main > section[data-theme]'));
  var navLinkMap = {};
  document.querySelectorAll('.nav-links a, .mobile-menu a').forEach(function (a) {
    var href = a.getAttribute('href');
    if (href && href.charAt(0) === '#') {
      navLinkMap[href.slice(1)] = navLinkMap[href.slice(1)] || [];
      navLinkMap[href.slice(1)].push(a);
    }
  });

  function onScroll() {
    if (window.scrollY > 12) {
      nav.classList.add('scrolled');
    } else {
      nav.classList.remove('scrolled');
    }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  if ('IntersectionObserver' in window) {
    var themeObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var theme = entry.target.getAttribute('data-theme');
          nav.classList.toggle('on-dark-section', theme === 'dark');
        }
      });
    }, { rootMargin: '-50% 0px -50% 0px' });
    sections.forEach(function (s) { themeObserver.observe(s); });

    var activeObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var id = entry.target.id;
          Object.keys(navLinkMap).forEach(function (key) {
            navLinkMap[key].forEach(function (a) { a.style.opacity = key === id ? '1' : ''; });
          });
        }
      });
    }, { rootMargin: '-45% 0px -45% 0px' });
    sections.forEach(function (s) { if (s.id) activeObserver.observe(s); });
  }

  /* ---------------------------------------------------------
     MOBILE MENU
  --------------------------------------------------------- */
  var navToggle = document.getElementById('navToggle');
  var mobileMenu = document.getElementById('mobileMenu');

  function closeMenu() {
    navToggle.classList.remove('open');
    mobileMenu.classList.remove('open');
    navToggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }
  function toggleMenu() {
    var isOpen = mobileMenu.classList.toggle('open');
    navToggle.classList.toggle('open', isOpen);
    navToggle.setAttribute('aria-expanded', String(isOpen));
    document.body.style.overflow = isOpen ? 'hidden' : '';
  }
  navToggle.addEventListener('click', toggleMenu);
  mobileMenu.querySelectorAll('a').forEach(function (a) {
    a.addEventListener('click', closeMenu);
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeMenu();
  });

  /* ---------------------------------------------------------
     SMOOTH SCROLL with nav offset (scroll-margin-top helper)
  --------------------------------------------------------- */
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var id = a.getAttribute('href');
      if (id.length < 2) return;
      var target = document.querySelector(id);
      if (!target) return;
      e.preventDefault();
      var navH = document.getElementById('siteNav').offsetHeight;
      var top = target.getBoundingClientRect().top + window.pageYOffset - (navH - 1);
      window.scrollTo({ top: top, behavior: reduceMotion ? 'auto' : 'smooth' });
    });
  });

  /* ---------------------------------------------------------
     SCROLL REVEAL (IntersectionObserver)
  --------------------------------------------------------- */
  var revealTargets = document.querySelectorAll('.reveal, .reveal-scale, .reveal-line');
  if ('IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.16, rootMargin: '0px 0px -8% 0px' });
    revealTargets.forEach(function (el) { revealObserver.observe(el); });
  } else {
    revealTargets.forEach(function (el) { el.classList.add('is-visible'); });
  }

  /* ---------------------------------------------------------
     GSAP SCROLL STORYTELLING (progressive enhancement)
  --------------------------------------------------------- */
  if (window.gsap && window.ScrollTrigger && !reduceMotion) {
    gsap.registerPlugin(ScrollTrigger);

    // Hero parallax fade as user scrolls past
    gsap.to('.hero-content', {
      yPercent: -18,
      opacity: 0.15,
      ease: 'none',
      scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true }
    });
    gsap.to('.hero-bg .glow-1', {
      y: 120, x: -40, ease: 'none',
      scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true }
    });
    gsap.to('.hero-bg .glow-2', {
      y: -100, x: 40, ease: 'none',
      scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true }
    });

    // Experience timeline progress line fill
    var progress = document.getElementById('timelineProgress');
    if (progress) {
      gsap.to(progress, {
        height: '100%',
        ease: 'none',
        scrollTrigger: {
          trigger: '.timeline',
          start: 'top center',
          end: 'bottom center',
          scrub: true
        }
      });
    }

    // Stacking project cards: scale/dim as the next card covers them
    var cards = gsap.utils.toArray('.project-card-inner');
    cards.forEach(function (card, i) {
      if (i === cards.length - 1) return;
      gsap.to(card, {
        scale: 0.94,
        opacity: 0.55,
        ease: 'none',
        scrollTrigger: {
          trigger: card.closest('.project-card'),
          start: 'top ' + (100) + 'px',
          endTrigger: cards[i + 1].closest('.project-card'),
          end: 'top ' + (120) + 'px',
          scrub: true
        }
      });
    });
  } else {
    // Ensure content is visible if GSAP fails to load or reduced motion is on
    var progressFallback = document.getElementById('timelineProgress');
    if (progressFallback) progressFallback.style.height = '100%';
  }

  /* ---------------------------------------------------------
     CURSOR GLOW (fine-pointer devices only)
  --------------------------------------------------------- */
  var glow = document.getElementById('cursorGlow');
  if (window.matchMedia && window.matchMedia('(pointer: fine)').matches && !reduceMotion) {
    var gx = 0, gy = 0, cx = 0, cy = 0;
    window.addEventListener('mousemove', function (e) {
      gx = e.clientX; gy = e.clientY;
      glow.classList.add('active');
    });
    (function raf() {
      cx += (gx - cx) * 0.12;
      cy += (gy - cy) * 0.12;
      glow.style.transform = 'translate(' + cx + 'px,' + cy + 'px)';
      requestAnimationFrame(raf);
    })();
    document.addEventListener('mouseleave', function () { glow.classList.remove('active'); });
  }

  /* ---------------------------------------------------------
     CONTACT FORM — fetch() JSON POST to /api/messages-store
  --------------------------------------------------------- */
  var form = document.getElementById('contactForm');
  var statusEl = document.getElementById('cfStatus');
  var submitBtn = document.getElementById('cfSubmit');
  var submitBtnText = submitBtn.querySelector('.btn-text');
  var submitBtnIcon = submitBtn.querySelector('i');

  function setFieldError(fieldName, hasError) {
    var field = form.querySelector('[data-field="' + fieldName + '"]');
    if (field) field.classList.toggle('error', hasError);
  }

  function validate(data) {
    var valid = true;
    if (!data.name || data.name.trim().length < 2) { setFieldError('name', true); valid = false; } else setFieldError('name', false);
    var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!data.email || !emailRe.test(data.email)) { setFieldError('email', true); valid = false; } else setFieldError('email', false);
    if (!data.subject || data.subject.trim().length < 2) { setFieldError('subject', true); valid = false; } else setFieldError('subject', false);
    if (!data.message || data.message.trim().length < 5) { setFieldError('message', true); valid = false; } else setFieldError('message', false);
    return valid;
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    var data = {
      name: form.name.value.trim(),
      email: form.email.value.trim(),
      subject: form.subject.value.trim(),
      message: form.message.value.trim()
    };

    statusEl.className = 'form-status';
    statusEl.textContent = '';

    if (!validate(data)) {
      statusEl.classList.add('error');
      statusEl.textContent = 'Please fix the highlighted fields and try again.';
      return;
    }

    submitBtn.disabled = true;
    submitBtnText.textContent = 'Sending…';
    if (submitBtnIcon) submitBtnIcon.className = 'fa-solid fa-spinner';

    fetch('/api/messages-store', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify(data)
    })
      .then(function (res) {
        if (!res.ok) throw new Error('Request failed with status ' + res.status);
        return res.json().catch(function () { return {}; });
      })
      .then(function () {
        statusEl.classList.add('success');
        statusEl.textContent = 'Message sent — thank you! I\'ll get back to you soon.';
        form.reset();
      })
      .catch(function () {
        statusEl.classList.add('error');
        statusEl.textContent = 'Something went wrong sending your message. Please email mrm.khan.1298@gmail.com directly.';
      })
      .finally(function () {
        submitBtn.disabled = false;
        submitBtnText.textContent = 'Send Message';
        if (submitBtnIcon) submitBtnIcon.className = 'fa-solid fa-paper-plane';
      });
  });

  /* ---------------------------------------------------------
     FOOTER: year + back-to-top
  --------------------------------------------------------- */
  document.getElementById('year').textContent = new Date().getFullYear();

  var backToTop = document.getElementById('backToTop');
  backToTop.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
  });
})();
</script>
</body>
</html>
