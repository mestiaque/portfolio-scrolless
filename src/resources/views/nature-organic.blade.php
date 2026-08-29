<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan | Full-Stack Laravel Developer</title>
<meta name="description" content="M. Estiaque Ahmed Khan — Software Engineer & Full-Stack Laravel Developer. A calm, nature-inspired portfolio featuring projects, experience, and skills in PHP, Laravel, Vue.js and modern web engineering." />
<meta name="theme-color" content="#f4ecdb" />

<!-- Google Fonts: Fraunces (headings) + Nunito (body) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- GSAP (for extra silky scroll polish) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<style>
  /* ============================================================
     RESET & FOUNDATIONS
  ============================================================ */
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

  :root {
    /* Earth-tone palette */
    --cream: #faf5ea;
    --cream-soft: #f4ecdb;
    --beige: #ede1c9;
    --sand: #e3d0a8;
    --sand-deep: #d3b988;

    --forest-deep: #223a2c;
    --forest: #35583f;
    --forest-mid: #4c7a56;
    --forest-light: #6f9a72;
    --sage: #93ac86;
    --moss: #aec49b;

    --brown: #5c4530;
    --brown-light: #86634a;

    --terracotta: #c1794f;
    --terracotta-light: #dd9c6f;
    --terracotta-soft: #f0d3bb;

    --sky: #a6c6c1;
    --sky-deep: #6f9d97;

    --ink: #2a332a;
    --ink-soft: #52604c;
    --ink-faint: #74806d;
    --white: #fffdf7;

    --shadow-sm: 0 4px 18px rgba(72, 54, 30, 0.08);
    --shadow-md: 0 12px 36px rgba(72, 54, 30, 0.12);
    --shadow-lg: 0 24px 64px rgba(72, 54, 30, 0.16);

    --font-head: 'Fraunces', Georgia, serif;
    --font-body: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;

    /* calm, slow easing curves — never harsh */
    --ease-calm: cubic-bezier(0.19, 1, 0.22, 1);
    --ease-soft: cubic-bezier(0.34, 0.02, 0.16, 1);
    --ease-breeze: cubic-bezier(0.45, 0, 0.25, 1);

    --blob-1: 63% 37% 54% 46% / 55% 48% 52% 45%;
    --blob-2: 37% 63% 44% 56% / 51% 58% 42% 49%;
    --blob-3: 48% 52% 65% 35% / 40% 45% 55% 60%;

    --space-1: 0.5rem;   /* 8px  */
    --space-2: 1rem;     /* 16px */
    --space-3: 1.5rem;   /* 24px */
    --space-4: 2rem;     /* 32px */
    --space-5: 3rem;     /* 48px */
    --space-6: 4rem;     /* 64px */
    --space-7: 6rem;     /* 96px */

    --nav-h: 84px;
  }

  html {
    scroll-behavior: smooth;
    scroll-padding-top: var(--nav-h);
  }

  body {
    font-family: var(--font-body);
    background: var(--cream);
    color: var(--ink);
    overflow-x: hidden;
    line-height: 1.65;
    -webkit-font-smoothing: antialiased;
  }

  img, svg { display: block; max-width: 100%; }
  a { color: inherit; text-decoration: none; }
  ul { list-style: none; }
  button { font: inherit; cursor: pointer; border: none; background: none; color: inherit; }
  input, textarea { font: inherit; }

  ::selection { background: var(--terracotta-soft); color: var(--forest-deep); }

  /* Accessible focus states */
  a:focus-visible,
  button:focus-visible,
  input:focus-visible,
  textarea:focus-visible {
    outline: 3px solid var(--terracotta);
    outline-offset: 4px;
    border-radius: 4px;
  }

  /* Thin, earthy scrollbar */
  ::-webkit-scrollbar { width: 12px; }
  ::-webkit-scrollbar-track { background: var(--cream-soft); }
  ::-webkit-scrollbar-thumb { background: var(--sage); border-radius: 8px; border: 3px solid var(--cream-soft); }
  ::-webkit-scrollbar-thumb:hover { background: var(--forest-light); }

  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
      animation-duration: 0.001ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.001ms !important;
      scroll-behavior: auto !important;
    }
  }

  .container {
    width: 100%;
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 var(--space-4);
  }

  .skip-link {
    position: absolute;
    top: -60px; left: var(--space-2);
    background: var(--forest-deep);
    color: var(--cream);
    padding: 0.75rem 1.25rem;
    border-radius: 999px;
    z-index: 999;
    transition: top 0.3s var(--ease-calm);
    font-weight: 700;
  }
  .skip-link:focus { top: var(--space-2); }

  h1, h2, h3, h4 { font-family: var(--font-head); color: var(--forest-deep); line-height: 1.15; font-weight: 600; }

  .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-family: var(--font-body);
    font-weight: 800;
    font-size: 0.78rem;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--forest-mid);
    background: rgba(147, 172, 134, 0.16);
    padding: 0.45rem 1rem;
    border-radius: 999px;
    margin-bottom: var(--space-3);
  }
  .eyebrow i { color: var(--terracotta); }

  .section-title {
    font-size: clamp(2rem, 4.4vw, 3.2rem);
    margin-bottom: var(--space-3);
  }
  .section-sub {
    font-size: 1.08rem;
    color: var(--ink-soft);
    max-width: 620px;
    margin-bottom: var(--space-6);
  }
  .section-head { text-align: center; margin: 0 auto var(--space-6); max-width: 700px; }
  .section-head .section-sub { margin-left: auto; margin-right: auto; }

  section { position: relative; padding: var(--space-7) 0; }

  /* ============================================================
     BUTTONS + RIPPLE (water-ripple hover/click effect)
  ============================================================ */
  .btn {
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    padding: 0.95rem 2.1rem;
    border-radius: 999px;
    font-weight: 700;
    font-size: 0.98rem;
    isolation: isolate;
    transition: transform 0.6s var(--ease-calm), box-shadow 0.6s var(--ease-calm), background 0.6s var(--ease-calm);
  }
  .btn:active { transform: scale(0.97); }

  .btn-primary {
    background: linear-gradient(135deg, var(--forest-mid), var(--forest-deep));
    color: var(--cream);
    box-shadow: var(--shadow-sm);
  }
  .btn-primary:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }

  .btn-outline {
    background: transparent;
    color: var(--forest-deep);
    border: 2px solid var(--forest-mid);
  }
  .btn-outline:hover { background: var(--forest-deep); color: var(--cream); transform: translateY(-4px); box-shadow: var(--shadow-md); }

  .ripple-span {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.65) 0%, rgba(255,255,255,0.15) 55%, transparent 75%);
    transform: scale(0);
    pointer-events: none;
    animation: rippleGrow 1.1s var(--ease-breeze) forwards;
    z-index: -1;
  }
  .btn-outline .ripple-span,
  .icon-circle .ripple-span,
  .project-card .ripple-span,
  .contact-item .ripple-span {
    background: radial-gradient(circle, rgba(193,121,79,0.35) 0%, rgba(147,172,134,0.2) 55%, transparent 75%);
  }
  @keyframes rippleGrow {
    0%   { transform: scale(0); opacity: 0.9; }
    100% { transform: scale(3.2); opacity: 0; }
  }

  /* ============================================================
     FLOATING LEAVES (fixed decorative layer)
  ============================================================ */
  #leaf-layer {
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 5;
    overflow: hidden;
  }
  .leaf {
    position: absolute;
    top: -60px;
    opacity: 0.75;
    animation-name: leafDrift;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;
    will-change: transform;
  }
  .leaf svg { width: 100%; height: 100%; }
  @keyframes leafDrift {
    0%   { transform: translate(0, -10vh) rotate(0deg) translateX(0); }
    25%  { transform: translate(-24px, 27vh) rotate(90deg) translateX(-18px); }
    50%  { transform: translate(18px, 54vh) rotate(180deg) translateX(14px); }
    75%  { transform: translate(-14px, 81vh) rotate(270deg) translateX(-10px); }
    100% { transform: translate(10px, 112vh) rotate(360deg) translateX(0); }
  }

  /* ============================================================
     NAVBAR
  ============================================================ */
  header#site-header {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 200;
    height: var(--nav-h);
    display: flex;
    align-items: center;
    background: rgba(250, 245, 234, 0.55);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    transition: background 0.5s var(--ease-calm), box-shadow 0.5s var(--ease-calm), height 0.4s var(--ease-calm);
  }
  header#site-header.scrolled {
    background: rgba(250, 245, 234, 0.92);
    box-shadow: var(--shadow-sm);
    height: 72px;
  }
  .nav-inner { width: 100%; display: flex; align-items: center; justify-content: space-between; }

  .brand { display: flex; align-items: center; gap: 0.65rem; font-family: var(--font-head); font-weight: 700; font-size: 1.28rem; color: var(--forest-deep); }
  .brand-mark {
    width: 42px; height: 42px;
    border-radius: var(--blob-1);
    background: linear-gradient(135deg, var(--forest-mid), var(--sage));
    display: flex; align-items: center; justify-content: center;
    color: var(--cream);
    font-size: 1.05rem;
    animation: blobMorph 9s var(--ease-calm) infinite;
    flex-shrink: 0;
  }

  .nav-links { display: flex; align-items: center; gap: var(--space-5); }
  .nav-links a {
    position: relative;
    font-weight: 700;
    font-size: 0.95rem;
    color: var(--ink-soft);
    padding: 0.4rem 0.1rem;
    transition: color 0.4s var(--ease-calm);
  }
  .nav-links a::after {
    content: '';
    position: absolute;
    left: 0; bottom: -4px;
    width: 0; height: 2px;
    background: var(--terracotta);
    border-radius: 2px;
    transition: width 0.5s var(--ease-calm);
  }
  .nav-links a:hover, .nav-links a.active { color: var(--forest-deep); }
  .nav-links a:hover::after, .nav-links a.active::after { width: 100%; }

  .nav-cta {
    background: var(--forest-deep);
    color: var(--cream) !important;
    padding: 0.65rem 1.5rem;
    border-radius: 999px;
    font-weight: 700;
  }
  .nav-cta::after { display: none; }
  .nav-cta:hover { background: var(--terracotta); transform: translateY(-2px); }

  .nav-toggle {
    display: none;
    flex-direction: column;
    gap: 5px;
    width: 32px;
    z-index: 210;
  }
  .nav-toggle span {
    height: 3px;
    background: var(--forest-deep);
    border-radius: 3px;
    transition: transform 0.45s var(--ease-calm), opacity 0.3s var(--ease-calm), width 0.3s;
  }
  .nav-toggle span:nth-child(2){ width: 70%; align-self: flex-end; }
  .nav-toggle.open span:nth-child(1) { transform: translateY(8px) rotate(45deg); width: 100%; }
  .nav-toggle.open span:nth-child(2) { opacity: 0; }
  .nav-toggle.open span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); width: 100%; }

  /* ============================================================
     HERO
  ============================================================ */
  #home {
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding-top: calc(var(--nav-h) + var(--space-5));
    overflow: hidden;
    background:
      radial-gradient(circle at 85% 20%, rgba(166, 198, 193, 0.35), transparent 55%),
      radial-gradient(circle at 10% 85%, rgba(147, 172, 134, 0.3), transparent 50%),
      var(--cream);
  }

  .hero-grid {
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
    gap: var(--space-6);
    align-items: center;
    width: 100%;
  }

  .hero-eyebrow { animation: riseIn 1s var(--ease-calm) both; }

  .hero-title {
    font-size: clamp(2.4rem, 5.6vw, 4.2rem);
    margin-bottom: var(--space-3);
    animation: riseIn 1.1s var(--ease-calm) both 0.1s;
  }
  .hero-title .accent {
    font-style: italic;
    font-weight: 500;
    background: linear-gradient(120deg, var(--forest-mid), var(--terracotta) 65%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .hero-sub {
    font-size: 1.15rem;
    color: var(--ink-soft);
    max-width: 520px;
    margin-bottom: var(--space-5);
    animation: riseIn 1.1s var(--ease-calm) both 0.25s;
  }

  .hero-actions { display: flex; gap: var(--space-3); flex-wrap: wrap; margin-bottom: var(--space-6); animation: riseIn 1.1s var(--ease-calm) both 0.4s; }

  .hero-meta { display: flex; gap: var(--space-5); flex-wrap: wrap; animation: riseIn 1.1s var(--ease-calm) both 0.55s; }
  .hero-meta-item { display: flex; align-items: center; gap: 0.6rem; }
  .hero-meta-item .num { font-family: var(--font-head); font-size: 1.6rem; font-weight: 700; color: var(--forest-deep); }
  .hero-meta-item .lbl { font-size: 0.82rem; color: var(--ink-faint); max-width: 90px; line-height: 1.3; }

  @keyframes riseIn {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .hero-visual { position: relative; display: flex; align-items: center; justify-content: center; height: 100%; min-height: 420px; }

  .hero-blob {
    position: absolute;
    width: min(430px, 82vw);
    height: min(430px, 82vw);
    background: linear-gradient(150deg, var(--sage), var(--forest-mid) 60%, var(--sky-deep));
    border-radius: var(--blob-1);
    animation: blobMorph 12s var(--ease-calm) infinite;
    box-shadow: var(--shadow-lg);
  }
  .hero-blob::before {
    content: '';
    position: absolute;
    inset: 18px;
    border-radius: inherit;
    border: 2px dashed rgba(255,255,255,0.35);
    animation: blobMorph 12s var(--ease-calm) infinite reverse;
  }

  @keyframes blobMorph {
    0%, 100% { border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%; }
    25%      { border-radius: 40% 60% 65% 35% / 50% 62% 38% 50%; }
    50%      { border-radius: 55% 45% 33% 67% / 60% 40% 60% 40%; }
    75%      { border-radius: 48% 52% 60% 40% / 35% 55% 45% 65%; }
  }

  .hero-portrait {
    position: relative;
    width: min(300px, 62vw);
    height: min(300px, 62vw);
    border-radius: var(--blob-2);
    background: var(--cream-soft);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-head);
    font-size: 5rem;
    font-weight: 700;
    color: var(--forest-deep);
    box-shadow: inset 0 0 0 6px rgba(255,255,255,0.5), var(--shadow-lg);
    animation: blobMorph 10s var(--ease-calm) infinite 0.3s, floatSlow 7s var(--ease-breeze) infinite;
    z-index: 2;
  }

  @keyframes floatSlow {
    0%, 100% { transform: translateY(0); }
    50%      { transform: translateY(-16px); }
  }

  .badge-float {
    position: absolute;
    display: flex;
    align-items: center;
    gap: 0.6rem;
    background: rgba(255, 253, 247, 0.92);
    backdrop-filter: blur(6px);
    padding: 0.75rem 1.1rem;
    border-radius: 999px;
    box-shadow: var(--shadow-md);
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--forest-deep);
    z-index: 3;
    animation: floatSlow 6s var(--ease-breeze) infinite;
  }
  .badge-float i { color: var(--terracotta); font-size: 1.05rem; }
  .badge-1 { top: 6%; left: -4%; animation-delay: 0.2s; }
  .badge-2 { bottom: 10%; right: -6%; animation-delay: 1.4s; }
  .badge-3 { bottom: -2%; left: 12%; animation-delay: 2.6s; }

  .scroll-cue {
    position: absolute;
    bottom: var(--space-4);
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    color: var(--ink-faint);
    font-size: 0.78rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    font-weight: 700;
  }
  .scroll-cue .stem {
    width: 2px; height: 42px;
    background: linear-gradient(var(--forest-mid), transparent);
    border-radius: 2px;
    position: relative;
    overflow: hidden;
  }
  .scroll-cue .stem::after {
    content: '';
    position: absolute;
    top: -20px; left: 0; width: 100%; height: 20px;
    background: var(--terracotta);
    animation: dripDown 2.6s var(--ease-breeze) infinite;
  }
  @keyframes dripDown { 0% { top: -20px; } 100% { top: 42px; } }

  /* wave divider */
  .wave-divider { position: relative; line-height: 0; }
  .wave-divider svg { width: 100%; height: 90px; }

  /* ============================================================
     REVEAL ANIMATION (IntersectionObserver driven)
  ============================================================ */
  .reveal {
    opacity: 0;
    transform: translateY(48px);
    transition: opacity 1.2s var(--ease-calm), transform 1.2s var(--ease-calm);
  }
  .reveal.in-view { opacity: 1; transform: translateY(0); }
  .reveal-delay-1.in-view { transition-delay: 0.12s; }
  .reveal-delay-2.in-view { transition-delay: 0.24s; }
  .reveal-delay-3.in-view { transition-delay: 0.36s; }
  .reveal-delay-4.in-view { transition-delay: 0.48s; }

  /* ============================================================
     ABOUT
  ============================================================ */
  #about { background: var(--cream-soft); }

  .about-grid {
    display: grid;
    grid-template-columns: 0.85fr 1.15fr;
    gap: var(--space-7);
    align-items: center;
  }

  .about-visual { position: relative; display: flex; align-items: center; justify-content: center; }
  .about-blob-frame {
    position: relative;
    width: min(360px, 80vw);
    height: min(420px, 90vw);
    border-radius: var(--blob-3);
    background: linear-gradient(160deg, var(--moss), var(--forest-mid));
    box-shadow: var(--shadow-lg);
    display: flex; align-items: center; justify-content: center;
    animation: blobMorph 13s var(--ease-calm) infinite;
  }
  .about-blob-frame .inner-photo {
    width: 84%; height: 84%;
    border-radius: var(--blob-1);
    background: var(--beige);
    display: flex; align-items: center; justify-content: center;
    flex-direction: column;
    gap: 0.5rem;
    color: var(--forest-deep);
    animation: blobMorph 13s var(--ease-calm) infinite reverse;
  }
  .inner-photo i { font-size: 3.4rem; color: var(--terracotta); }
  .inner-photo span { font-family: var(--font-head); font-weight: 600; font-size: 1.1rem; }

  .leaf-orbit { position: absolute; width: 42px; height: 42px; color: var(--forest-mid); animation: floatSlow 5s var(--ease-breeze) infinite; }
  .leaf-orbit.l1 { top: -6%; right: 4%; animation-delay: 0.5s; }
  .leaf-orbit.l2 { bottom: 6%; left: -8%; animation-delay: 1.8s; color: var(--terracotta); }

  .about-text .lead { font-size: 1.15rem; color: var(--ink); margin-bottom: var(--space-3); font-weight: 600; }
  .about-text p { color: var(--ink-soft); margin-bottom: var(--space-3); }

  .edu-cards { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3); margin-top: var(--space-5); }
  .edu-card {
    position: relative;
    background: var(--white);
    border-radius: 28px 12px 28px 12px;
    padding: var(--space-4);
    box-shadow: var(--shadow-sm);
    transition: transform 0.6s var(--ease-calm), box-shadow 0.6s var(--ease-calm);
    border: 1px solid rgba(147, 172, 134, 0.25);
  }
  .edu-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-md); }
  .edu-card i { font-size: 1.6rem; color: var(--forest-mid); margin-bottom: var(--space-2); }
  .edu-card h4 { font-size: 1.02rem; margin-bottom: 0.35rem; }
  .edu-card .school { color: var(--terracotta); font-weight: 700; font-size: 0.88rem; margin-bottom: 0.2rem; }
  .edu-card .year { color: var(--ink-faint); font-size: 0.82rem; }

  /* ============================================================
     SKILLS
  ============================================================ */
  #skills { background: var(--cream); }

  .skills-cloud {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3);
    justify-content: center;
  }

  .skill-chip {
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.85rem 1.4rem;
    background: var(--white);
    border: 1px solid rgba(147, 172, 134, 0.3);
    border-radius: 60% 40% 45% 55% / 55% 45% 55% 45%;
    font-weight: 700;
    font-size: 0.92rem;
    color: var(--forest-deep);
    box-shadow: var(--shadow-sm);
    transition: transform 0.55s var(--ease-calm), box-shadow 0.55s var(--ease-calm), background 0.55s var(--ease-calm), border-radius 0.7s var(--ease-calm);
    cursor: default;
  }
  .skill-chip i { color: var(--terracotta); font-size: 1.05rem; }
  .skill-chip:hover {
    transform: translateY(-6px) rotate(-1deg);
    background: var(--forest-deep);
    color: var(--cream);
    border-radius: 40% 60% 55% 45% / 45% 55% 45% 55%;
    box-shadow: var(--shadow-md);
  }
  .skill-chip:hover i { color: var(--terracotta-light); }

  /* ============================================================
     EXPERIENCE — flowing timeline
  ============================================================ */
  #experience { background: var(--cream-soft); overflow: hidden; }

  .timeline { position: relative; max-width: 820px; margin: 0 auto; }
  .timeline-svg {
    position: absolute;
    top: 0; left: 32px;
    width: 4px;
    height: 100%;
    overflow: visible;
  }
  .timeline-svg path {
    fill: none;
    stroke: var(--forest-mid);
    stroke-width: 3;
    stroke-linecap: round;
    transition: stroke-dashoffset 2s var(--ease-calm);
  }

  .timeline-item {
    position: relative;
    padding-left: 88px;
    margin-bottom: var(--space-6);
  }
  .timeline-item:last-child { margin-bottom: 0; }

  .timeline-dot {
    position: absolute;
    left: 6px; top: 4px;
    width: 52px; height: 52px;
    border-radius: var(--blob-2);
    background: linear-gradient(135deg, var(--forest-mid), var(--sage));
    display: flex; align-items: center; justify-content: center;
    color: var(--cream);
    font-size: 1.25rem;
    box-shadow: var(--shadow-sm);
    z-index: 2;
    animation: blobMorph 8s var(--ease-calm) infinite;
  }

  .timeline-card {
    background: var(--white);
    border-radius: 12px 32px 12px 32px;
    padding: var(--space-4) var(--space-5);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(147, 172, 134, 0.22);
    transition: transform 0.6s var(--ease-calm), box-shadow 0.6s var(--ease-calm);
  }
  .timeline-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); }

  .timeline-card .role-row { display: flex; flex-wrap: wrap; align-items: center; gap: 0.8rem; margin-bottom: 0.3rem; }
  .timeline-card h3 { font-size: 1.28rem; }
  .timeline-date {
    background: rgba(193, 121, 79, 0.14);
    color: var(--terracotta);
    font-weight: 800;
    font-size: 0.78rem;
    letter-spacing: 0.04em;
    padding: 0.3rem 0.85rem;
    border-radius: 999px;
  }
  .timeline-card .company { color: var(--forest-mid); font-weight: 700; margin-bottom: 0.7rem; font-size: 0.98rem; }
  .timeline-card p.desc { color: var(--ink-soft); }

  /* ============================================================
     PROJECTS
  ============================================================ */
  #projects { background: var(--cream); }

  .projects-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-5);
  }

  .project-card {
    position: relative;
    overflow: hidden;
    background: var(--white);
    border-radius: 36px 12px 36px 12px;
    padding: var(--space-5);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(147, 172, 134, 0.22);
    transition: transform 0.7s var(--ease-calm), box-shadow 0.7s var(--ease-calm), border-radius 0.7s var(--ease-calm);
    isolation: isolate;
  }
  .project-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-lg);
    border-radius: 12px 36px 12px 36px;
  }

  .project-icon {
    width: 64px; height: 64px;
    border-radius: var(--blob-1);
    background: linear-gradient(135deg, var(--sage), var(--sky-deep));
    display: flex; align-items: center; justify-content: center;
    color: var(--white);
    font-size: 1.6rem;
    margin-bottom: var(--space-3);
    animation: blobMorph 9s var(--ease-calm) infinite;
  }

  .project-card h3 { font-size: 1.35rem; margin-bottom: 0.6rem; }
  .project-card p { color: var(--ink-soft); margin-bottom: var(--space-3); }

  .tech-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: var(--space-3); }
  .tech-tags span {
    font-size: 0.76rem;
    font-weight: 700;
    padding: 0.3rem 0.75rem;
    border-radius: 999px;
    background: var(--beige);
    color: var(--brown);
  }

  .project-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 800;
    font-size: 0.9rem;
    color: var(--forest-deep);
    position: relative;
  }
  .project-link i { transition: transform 0.5s var(--ease-calm); }
  .project-link:hover { color: var(--terracotta); }
  .project-link:hover i { transform: translateX(6px); }

  /* ============================================================
     CONTACT
  ============================================================ */
  #contact { background: var(--forest-deep); color: var(--cream); overflow: hidden; position: relative; }
  #contact::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(circle at 12% 18%, rgba(147, 172, 134, 0.22), transparent 45%),
      radial-gradient(circle at 90% 80%, rgba(193, 121, 79, 0.18), transparent 45%);
    pointer-events: none;
  }
  #contact .section-title, #contact h3 { color: var(--cream); }
  #contact .section-sub { color: rgba(250, 245, 234, 0.72); }
  #contact .eyebrow { background: rgba(147, 172, 134, 0.22); color: var(--moss); }

  .contact-grid { display: grid; grid-template-columns: 0.85fr 1.15fr; gap: var(--space-7); position: relative; z-index: 2; }

  .contact-item {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3) var(--space-3);
    border-radius: 20px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.12);
    margin-bottom: var(--space-3);
    transition: transform 0.55s var(--ease-calm), background 0.55s var(--ease-calm);
  }
  .contact-item:hover { transform: translateX(8px); background: rgba(255,255,255,0.1); }
  .contact-item .icon-circle {
    width: 50px; height: 50px;
    border-radius: var(--blob-2);
    background: linear-gradient(135deg, var(--terracotta), var(--terracotta-light));
    display: flex; align-items: center; justify-content: center;
    color: var(--white);
    font-size: 1.15rem;
    flex-shrink: 0;
    animation: blobMorph 8s var(--ease-calm) infinite;
  }
  .contact-item .label { font-size: 0.76rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--moss); font-weight: 700; }
  .contact-item .value { font-weight: 700; font-size: 1.02rem; word-break: break-word; }

  .contact-form {
    background: var(--cream);
    border-radius: 32px;
    padding: var(--space-5);
    box-shadow: var(--shadow-lg);
    color: var(--ink);
  }
  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-3); }
  .field { margin-bottom: var(--space-3); }
  .field label { display: block; font-size: 0.82rem; font-weight: 800; color: var(--forest-deep); margin-bottom: 0.4rem; letter-spacing: 0.02em; }
  .field input, .field textarea {
    width: 100%;
    padding: 0.9rem 1.1rem;
    border-radius: 16px;
    border: 1.5px solid rgba(147, 172, 134, 0.4);
    background: var(--white);
    color: var(--ink);
    transition: border-color 0.4s var(--ease-calm), box-shadow 0.4s var(--ease-calm);
  }
  .field input::placeholder, .field textarea::placeholder { color: var(--ink-faint); }
  .field input:focus, .field textarea:focus {
    border-color: var(--forest-mid);
    box-shadow: 0 0 0 4px rgba(147, 172, 134, 0.22);
    outline: none;
  }
  .field textarea { resize: vertical; min-height: 130px; }

  .form-submit {
    width: 100%;
    justify-content: center;
    margin-top: var(--space-2);
  }
  .form-submit .fa-spinner { display: none; }
  .form-submit.loading .fa-spinner { display: inline-block; animation: spin 0.9s linear infinite; }
  .form-submit.loading .btn-label { opacity: 0.7; }
  @keyframes spin { to { transform: rotate(360deg); } }

  .form-status {
    margin-top: var(--space-3);
    padding: 0.85rem 1.1rem;
    border-radius: 14px;
    font-weight: 700;
    font-size: 0.92rem;
    display: none;
    align-items: center;
    gap: 0.6rem;
  }
  .form-status.show { display: flex; animation: riseIn 0.6s var(--ease-calm) both; }
  .form-status.success { background: rgba(147, 172, 134, 0.25); color: var(--forest-deep); }
  .form-status.error { background: rgba(193, 79, 79, 0.14); color: #8a3a2f; }

  /* ============================================================
     FOOTER
  ============================================================ */
  footer {
    background: var(--forest-deep);
    color: rgba(250, 245, 234, 0.7);
    padding: var(--space-6) 0 var(--space-4);
    border-top: 1px solid rgba(255,255,255,0.08);
    position: relative;
    z-index: 2;
  }
  .footer-grid { display: flex; justify-content: space-between; align-items: flex-start; gap: var(--space-5); flex-wrap: wrap; margin-bottom: var(--space-5); }
  .footer-brand { display: flex; align-items: center; gap: 0.65rem; font-family: var(--font-head); font-size: 1.3rem; color: var(--cream); font-weight: 700; margin-bottom: 0.8rem; }
  .footer-tag { max-width: 320px; font-size: 0.92rem; }

  .footer-links { display: flex; gap: var(--space-6); flex-wrap: wrap; }
  .footer-col h5 { color: var(--cream); font-size: 0.85rem; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: var(--space-3); font-family: var(--font-body); font-weight: 800; }
  .footer-col a { display: block; margin-bottom: 0.6rem; font-size: 0.92rem; transition: color 0.4s var(--ease-calm), transform 0.4s var(--ease-calm); }
  .footer-col a:hover { color: var(--terracotta-light); transform: translateX(4px); display: inline-block; }

  .footer-socials { display: flex; gap: 0.8rem; margin-top: var(--space-3); }
  .footer-socials a {
    width: 42px; height: 42px;
    border-radius: var(--blob-1);
    background: rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
    transition: background 0.5s var(--ease-calm), transform 0.5s var(--ease-calm);
  }
  .footer-socials a:hover { background: var(--terracotta); transform: translateY(-4px) rotate(-6deg); }

  .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.08);
    padding-top: var(--space-3);
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 0.8rem;
    font-size: 0.82rem;
  }
  .footer-bottom i { color: var(--terracotta); }

  /* ============================================================
     BACK TO TOP
  ============================================================ */
  #back-to-top {
    position: fixed;
    right: var(--space-4);
    bottom: var(--space-4);
    width: 54px; height: 54px;
    border-radius: var(--blob-2);
    background: var(--forest-deep);
    color: var(--cream);
    display: flex; align-items: center; justify-content: center;
    box-shadow: var(--shadow-md);
    opacity: 0;
    visibility: hidden;
    transform: translateY(16px);
    transition: opacity 0.5s var(--ease-calm), transform 0.5s var(--ease-calm), background 0.5s var(--ease-calm), visibility 0.5s;
    z-index: 150;
    overflow: hidden;
  }
  #back-to-top.show { opacity: 1; visibility: visible; transform: translateY(0); }
  #back-to-top:hover { background: var(--terracotta); }

  /* ============================================================
     RESPONSIVE
  ============================================================ */
  @media (max-width: 1024px) {
    .hero-grid, .about-grid, .contact-grid { grid-template-columns: 1fr; }
    .hero-visual { order: -1; min-height: 340px; }
    .about-visual { order: -1; }
    .projects-grid { grid-template-columns: 1fr 1fr; }
  }

  @media (max-width: 860px) {
    .nav-links { position: fixed; top: 0; right: 0; height: 100vh; width: min(320px, 84vw); background: var(--cream); flex-direction: column; justify-content: center; align-items: flex-start; gap: var(--space-4); padding: var(--space-6) var(--space-5); box-shadow: -12px 0 40px rgba(0,0,0,0.12); transform: translateX(100%); transition: transform 0.55s var(--ease-calm); }
    .nav-links.open { transform: translateX(0); }
    .nav-toggle { display: flex; }
    .nav-links a { font-size: 1.05rem; }
    .projects-grid { grid-template-columns: 1fr; }
    .form-row { grid-template-columns: 1fr; }
    .edu-cards { grid-template-columns: 1fr; }
  }

  @media (max-width: 640px) {
    .container { padding: 0 var(--space-3); }
    section { padding: var(--space-6) 0; }
    .hero-meta { gap: var(--space-4); }
    .badge-float { display: none; }
    .footer-grid { flex-direction: column; }
  }

  @media (max-width: 400px) {
    .hero-title { font-size: 2rem; }
    .contact-form { padding: var(--space-4); }
  }
</style>
</head>
<body>
<a href="#home" class="skip-link">Skip to content</a>

<!-- Floating leaves decorative layer -->
<div id="leaf-layer" aria-hidden="true"></div>

<!-- Hidden SVG symbol defs -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="icon-leaf" viewBox="0 0 64 64">
    <path d="M32 4C14 4 6 22 6 38c0 14 12 22 26 22s26-8 26-22C58 22 50 4 32 4z" />
    <path d="M32 10v46" stroke="rgba(255,255,255,0.55)" stroke-width="2" fill="none" />
  </symbol>
</svg>

<!-- ============================================================
     HEADER / NAV
============================================================ -->
<header id="site-header">
  <div class="container nav-inner">
    <a href="#home" class="brand">
      <span class="brand-mark"><i class="fa-solid fa-leaf"></i></span>
      Estiaque Khan
    </a>

    <nav class="nav-links" id="nav-links" aria-label="Primary">
      <a href="#home" class="nav-link">Home</a>
      <a href="#about" class="nav-link">About</a>
      <a href="#skills" class="nav-link">Skills</a>
      <a href="#experience" class="nav-link">Experience</a>
      <a href="#projects" class="nav-link">Projects</a>
      <a href="#contact" class="nav-link nav-cta">Say Hello</a>
    </nav>

    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="nav-links">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main id="main-content">

  <!-- ============================================================
       HERO
  ============================================================ -->
  <section id="home">
    <div class="container hero-grid">
      <div class="hero-copy">
        <p class="eyebrow hero-eyebrow"><i class="fa-solid fa-seedling"></i> Welcome to my digital garden</p>
        <h1 class="hero-title">
          Cultivating calm code &amp;<br class="br-desktop" />
          <span class="accent">rooted digital experiences</span>
        </h1>
        <p class="hero-sub">
          I'm <strong>M. Estiaque Ahmed Khan</strong>, a Software Engineer and full-stack Laravel developer who
          grows reliable web applications the way a gardener tends a forest — patiently, thoughtfully,
          and built to last.
        </p>
        <div class="hero-actions">
          <a href="#projects" class="btn btn-primary" data-ripple>
            <i class="fa-solid fa-tree"></i> View My Work
          </a>
          <a href="#contact" class="btn btn-outline" data-ripple>
            <i class="fa-regular fa-envelope"></i> Get In Touch
          </a>
        </div>
        <div class="hero-meta">
          <div class="hero-meta-item">
            <span class="num">3+</span>
            <span class="lbl">Years cultivating software</span>
          </div>
          <div class="hero-meta-item">
            <span class="num">4</span>
            <span class="lbl">Flagship projects grown</span>
          </div>
          <div class="hero-meta-item">
            <span class="num">18+</span>
            <span class="lbl">Tools &amp; technologies</span>
          </div>
        </div>
      </div>

      <div class="hero-visual">
        <div class="hero-blob" aria-hidden="true"></div>
        <div class="hero-portrait">EK</div>
        <div class="badge-float badge-1"><i class="fa-solid fa-code"></i> Laravel Specialist</div>
        <div class="badge-float badge-2"><i class="fa-solid fa-database"></i> ERP &amp; Systems</div>
        <div class="badge-float badge-3"><i class="fa-solid fa-mountain"></i> Full-Stack</div>
      </div>
    </div>

    <div class="scroll-cue" aria-hidden="true">
      <span>Scroll</span>
      <span class="stem"></span>
    </div>
  </section>

  <div class="wave-divider" aria-hidden="true">
    <svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#f4ecdb" d="M0,32 C 240,90 480,0 720,28 C 960,56 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
  </div>

  <!-- ============================================================
       ABOUT
  ============================================================ -->
  <section id="about">
    <div class="container about-grid">
      <div class="about-visual reveal">
        <div class="about-blob-frame">
          <div class="inner-photo">
            <i class="fa-solid fa-user"></i>
            <span>Estiaque Khan</span>
          </div>
        </div>
        <svg class="leaf-orbit l1" viewBox="0 0 64 64" fill="currentColor" aria-hidden="true"><use href="#icon-leaf"></use></svg>
        <svg class="leaf-orbit l2" viewBox="0 0 64 64" fill="currentColor" aria-hidden="true"><use href="#icon-leaf"></use></svg>
      </div>

      <div class="about-text">
        <p class="eyebrow reveal"><i class="fa-solid fa-spa"></i> About Me</p>
        <h2 class="section-title reveal">Growing thoughtful software, one root at a time</h2>
        <p class="lead reveal reveal-delay-1">
          Full-stack developer with hands-on experience across frontend optimization, database management,
          and PHP/Laravel web application development.
        </p>
        <p class="reveal reveal-delay-2">
          Over the years I've built custom inventory management modules, delivered enterprise automation
          solutions, and integrated ERP systems for real businesses — always aiming for interfaces that feel
          calm and code that stays maintainable long after launch.
        </p>
        <p class="reveal reveal-delay-2">
          I care about performance, clean architecture, and the quiet details that make an application feel
          trustworthy — much like a well-tended garden, good software should feel effortless from the outside.
        </p>

        <div class="edu-cards">
          <div class="edu-card reveal reveal-delay-3">
            <i class="fa-solid fa-graduation-cap"></i>
            <h4>MSc in Computer Science</h4>
            <p class="school">Uttara University</p>
            <p class="year">Passing Year: 2025</p>
          </div>
          <div class="edu-card reveal reveal-delay-4">
            <i class="fa-solid fa-book"></i>
            <h4>BSc in Computer Science &amp; Engineering</h4>
            <p class="school">Uttara University</p>
            <p class="year">Passing Year: 2021</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SKILLS
  ============================================================ -->
  <section id="skills">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow reveal"><i class="fa-solid fa-seedling"></i> Skills &amp; Toolbox</p>
        <h2 class="section-title reveal">A well-tended technology garden</h2>
        <p class="section-sub reveal reveal-delay-1">
          Every tool below has earned its place through real projects — from crafting APIs to
          optimizing databases and shipping production-ready interfaces.
        </p>
      </div>

      <div class="skills-cloud">
        <span class="skill-chip reveal" data-ripple><i class="fa-brands fa-php"></i>PHP 8</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-leaf"></i>Laravel</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-brands fa-js"></i>JavaScript (ES6+)</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-brands fa-vuejs"></i>Vue.js</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-mountain"></i>Alpine.js</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-bolt"></i>Livewire</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-database"></i>MySQL</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-server"></i>PostgreSQL</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-droplet"></i>Redis</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-network-wired"></i>REST API Design</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-brands fa-docker"></i>Docker</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-brands fa-git-alt"></i>Git</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-brands fa-aws"></i>AWS</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-brands fa-css3-alt"></i>Tailwind CSS</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-brands fa-bootstrap"></i>Bootstrap 5</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-arrows-rotate"></i>CI/CD</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-gauge-high"></i>Database Optimization</span>
        <span class="skill-chip reveal" data-ripple><i class="fa-solid fa-sitemap"></i>ERP Integration</span>
      </div>
    </div>
  </section>

  <div class="wave-divider" aria-hidden="true">
    <svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#f4ecdb" d="M0,50 C 240,0 480,90 720,45 C 960,0 1200,80 1440,30 L1440,0 L0,0 Z"></path></svg>
  </div>

  <!-- ============================================================
       EXPERIENCE
  ============================================================ -->
  <section id="experience">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow reveal"><i class="fa-solid fa-tree"></i> Experience</p>
        <h2 class="section-title reveal">From seedling to steady growth</h2>
        <p class="section-sub reveal reveal-delay-1">A gentle timeline of where I've grown my craft.</p>
      </div>

      <div class="timeline">
        <svg class="timeline-svg" viewBox="0 0 4 620" preserveAspectRatio="none" aria-hidden="true">
          <path id="timeline-path" d="M2 0 C 2 100, 2 100, 2 210 C 2 320, 2 320, 2 430 C 2 540, 2 540, 2 620" />
        </svg>

        <div class="timeline-item reveal">
          <div class="timeline-dot"><i class="fa-solid fa-tree"></i></div>
          <div class="timeline-card">
            <div class="role-row">
              <h3>Software Engineer</h3>
              <span class="timeline-date">2025 – Present</span>
            </div>
            <p class="company">Natore IT</p>
            <p class="desc">Frontend optimization and database management for local business clients — improving load times, refining UI flows, and keeping data layers efficient and reliable.</p>
          </div>
        </div>

        <div class="timeline-item reveal reveal-delay-1">
          <div class="timeline-dot"><i class="fa-solid fa-leaf"></i></div>
          <div class="timeline-card">
            <div class="role-row">
              <h3>Software Developer</h3>
              <span class="timeline-date">2023 – 2025</span>
            </div>
            <p class="company">Isotope IT</p>
            <p class="desc">Specialized in PHP/Laravel web applications and custom inventory management modules tailored to client-specific business workflows.</p>
          </div>
        </div>

        <div class="timeline-item reveal reveal-delay-2">
          <div class="timeline-dot"><i class="fa-solid fa-seedling"></i></div>
          <div class="timeline-card">
            <div class="role-row">
              <h3>Software Engineer</h3>
              <span class="timeline-date">2022 – 2023</span>
            </div>
            <p class="company">Barcode Tech Automation Ltd</p>
            <p class="desc">Led development of enterprise automation solutions and ERP systems integration, laying the technical foundation for my full-stack journey.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PROJECTS
  ============================================================ -->
  <section id="projects" style="background:var(--cream-soft);">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow reveal"><i class="fa-solid fa-water"></i> Projects</p>
        <h2 class="section-title reveal">Things I've grown &amp; shipped</h2>
        <p class="section-sub reveal reveal-delay-1">A handful of projects that reflect how I think, build, and solve real problems.</p>
      </div>

      <div class="projects-grid">
        <article class="project-card reveal" data-ripple>
          <div class="project-icon"><i class="fa-solid fa-seedling"></i></div>
          <h3>Port3folio Package</h3>
          <p>A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
          <div class="tech-tags">
            <span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span>
          </div>
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" class="project-link">
            View Code <i class="fa-solid fa-arrow-right"></i>
          </a>
        </article>

        <article class="project-card reveal reveal-delay-1" data-ripple>
          <div class="project-icon"><i class="fa-solid fa-cart-shopping"></i></div>
          <h3>E-Commerce Platform</h3>
          <p>High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
          <div class="tech-tags">
            <span>Laravel</span><span>Vue.js</span><span>MySQL</span><span>Redis</span><span>Stripe</span>
          </div>
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" class="project-link">
            View Code <i class="fa-solid fa-arrow-right"></i>
          </a>
        </article>

        <article class="project-card reveal reveal-delay-2" data-ripple>
          <div class="project-icon"><i class="fa-solid fa-chart-line"></i></div>
          <h3>SaaS Analytics Dashboard</h3>
          <p>Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
          <div class="tech-tags">
            <span>Laravel</span><span>Livewire</span><span>Alpine.js</span><span>PostgreSQL</span><span>Chart.js</span>
          </div>
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" class="project-link">
            View Code <i class="fa-solid fa-arrow-right"></i>
          </a>
        </article>

        <article class="project-card reveal reveal-delay-3" data-ripple>
          <div class="project-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
          <h3>Inventory Management System</h3>
          <p>Custom-built inventory &amp; ERP automation module for enterprise clients, covering stock tracking, procurement workflows, and reporting.</p>
          <div class="tech-tags">
            <span>PHP</span><span>Laravel</span><span>MySQL</span><span>REST API</span>
          </div>
          <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" class="project-link">
            View Code <i class="fa-solid fa-arrow-right"></i>
          </a>
        </article>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CONTACT
  ============================================================ -->
  <section id="contact">
    <div class="container contact-grid">
      <div class="contact-info">
        <p class="eyebrow reveal"><i class="fa-solid fa-sun"></i> Contact</p>
        <h2 class="section-title reveal">Let's grow something together</h2>
        <p class="section-sub reveal reveal-delay-1">
          Have a project, a role, or just an idea worth planting? I'd love to hear from you —
          I try to respond within a day or two.
        </p>

        <a class="contact-item reveal reveal-delay-2" href="mailto:mrm.khan.1298@gmail.com" data-ripple>
          <span class="icon-circle"><i class="fa-regular fa-envelope"></i></span>
          <span>
            <span class="label">Email</span><br>
            <span class="value">mrm.khan.1298@gmail.com</span>
          </span>
        </a>
        <a class="contact-item reveal reveal-delay-3" href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" data-ripple>
          <span class="icon-circle"><i class="fa-brands fa-github"></i></span>
          <span>
            <span class="label">GitHub</span><br>
            <span class="value">github.com/mestiaque</span>
          </span>
        </a>
        <a class="contact-item reveal reveal-delay-4" href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" data-ripple>
          <span class="icon-circle"><i class="fa-brands fa-linkedin-in"></i></span>
          <span>
            <span class="label">LinkedIn</span><br>
            <span class="value">linkedin.com/in/mestiaque</span>
          </span>
        </a>
      </div>

      <form class="contact-form reveal reveal-delay-1" id="contact-form" novalidate>
        <div class="form-row">
          <div class="field">
            <label for="cf-name">Your Name</label>
            <input type="text" id="cf-name" name="name" placeholder="Jane Doe" required autocomplete="name" />
          </div>
          <div class="field">
            <label for="cf-email">Your Email</label>
            <input type="email" id="cf-email" name="email" placeholder="jane@example.com" required autocomplete="email" />
          </div>
        </div>
        <div class="field">
          <label for="cf-subject">Subject</label>
          <input type="text" id="cf-subject" name="subject" placeholder="Let's talk about..." required />
        </div>
        <div class="field">
          <label for="cf-message">Message</label>
          <textarea id="cf-message" name="message" placeholder="Tell me a little about your project or idea..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary form-submit" id="cf-submit">
          <i class="fa-solid fa-spinner"></i>
          <span class="btn-label"><i class="fa-solid fa-paper-plane"></i> Send Message</span>
        </button>
        <div class="form-status" id="form-status" role="status" aria-live="polite"></div>
      </form>
    </div>
  </section>

  <!-- ============================================================
       FOOTER
  ============================================================ -->
  <footer>
    <div class="container">
      <div class="footer-grid">
        <div>
          <div class="footer-brand"><i class="fa-solid fa-leaf"></i> Estiaque Khan</div>
          <p class="footer-tag">Software Engineer crafting calm, reliable full-stack Laravel experiences — rooted in clean code and considered design.</p>
          <div class="footer-socials">
            <a href="mailto:mrm.khan.1298@gmail.com" aria-label="Email"><i class="fa-regular fa-envelope"></i></a>
            <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
            <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
        </div>

        <div class="footer-links">
          <div class="footer-col">
            <h5>Navigate</h5>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#experience">Experience</a>
          </div>
          <div class="footer-col">
            <h5>More</h5>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer">GitHub</a>
            <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer">LinkedIn</a>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <span>&copy; <span id="cur-year"></span> M. Estiaque Ahmed Khan. All rights reserved.</span>
        <span>Grown with <i class="fa-solid fa-seedling"></i> and Laravel</span>
      </div>
    </div>
  </footer>

</main>

<button id="back-to-top" aria-label="Back to top" data-ripple>
  <i class="fa-solid fa-arrow-up"></i>
</button>

<script>
(function () {
  'use strict';

  /* ============================================================
     HEADER SCROLL STATE
  ============================================================ */
  var header = document.getElementById('site-header');
  var backToTop = document.getElementById('back-to-top');

  function onScroll() {
    var y = window.scrollY || window.pageYOffset;
    if (y > 40) { header.classList.add('scrolled'); } else { header.classList.remove('scrolled'); }
    if (y > 500) { backToTop.classList.add('show'); } else { backToTop.classList.remove('show'); }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  backToTop.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  /* ============================================================
     MOBILE NAV TOGGLE
  ============================================================ */
  var navToggle = document.getElementById('nav-toggle');
  var navLinks = document.getElementById('nav-links');

  navToggle.addEventListener('click', function () {
    var isOpen = navLinks.classList.toggle('open');
    navToggle.classList.toggle('open', isOpen);
    navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    document.body.style.overflow = isOpen ? 'hidden' : '';
  });

  document.querySelectorAll('.nav-links a').forEach(function (link) {
    link.addEventListener('click', function () {
      navLinks.classList.remove('open');
      navToggle.classList.remove('open');
      navToggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    });
  });

  /* ============================================================
     SMOOTH SCROLL WITH FIXED-HEADER OFFSET
  ============================================================ */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var targetId = this.getAttribute('href');
      if (targetId.length < 2) return;
      var target = document.querySelector(targetId);
      if (!target) return;
      e.preventDefault();
      var offset = target.getBoundingClientRect().top + window.pageYOffset - (header.offsetHeight - 4);
      window.scrollTo({ top: offset, behavior: 'smooth' });
    });
  });

  /* ============================================================
     SCROLLSPY — highlight active nav link
  ============================================================ */
  var sections = document.querySelectorAll('main section[id]');
  var navAnchors = document.querySelectorAll('.nav-links a[href^="#"]');

  var spyObserver = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        var id = entry.target.getAttribute('id');
        navAnchors.forEach(function (a) {
          a.classList.toggle('active', a.getAttribute('href') === '#' + id);
        });
      }
    });
  }, { rootMargin: '-40% 0px -50% 0px', threshold: 0 });

  sections.forEach(function (sec) { spyObserver.observe(sec); });

  /* ============================================================
     GENTLE SCROLL-TRIGGERED REVEAL (IntersectionObserver)
  ============================================================ */
  var revealEls = document.querySelectorAll('.reveal');
  var revealObserver = new IntersectionObserver(function (entries, obs) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

  revealEls.forEach(function (el) { revealObserver.observe(el); });

  /* ============================================================
     TIMELINE "DRAW" ANIMATION
  ============================================================ */
  var timelinePath = document.getElementById('timeline-path');
  if (timelinePath && timelinePath.getTotalLength) {
    var len = timelinePath.getTotalLength();
    timelinePath.style.strokeDasharray = len;
    timelinePath.style.strokeDashoffset = len;

    var pathObserver = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          timelinePath.style.strokeDashoffset = '0';
          obs.disconnect();
        }
      });
    }, { threshold: 0.1 });
    pathObserver.observe(document.querySelector('.timeline'));
  }

  /* ============================================================
     WATER-RIPPLE EFFECT — hover + click on ripple-enabled elements
  ============================================================ */
  function spawnRipple(el, x, y) {
    var rect = el.getBoundingClientRect();
    var size = Math.max(rect.width, rect.height) * 1.4;
    var span = document.createElement('span');
    span.className = 'ripple-span';
    span.style.width = size + 'px';
    span.style.height = size + 'px';
    span.style.left = (x - rect.left - size / 2) + 'px';
    span.style.top = (y - rect.top - size / 2) + 'px';
    el.appendChild(span);
    window.setTimeout(function () {
      if (span.parentNode) span.parentNode.removeChild(span);
    }, 1200);
  }

  var rippleEls = document.querySelectorAll('[data-ripple]');
  rippleEls.forEach(function (el) {
    el.style.position = el.style.position || 'relative';
    el.style.overflow = 'hidden';

    el.addEventListener('mouseenter', function (e) {
      var rect = el.getBoundingClientRect();
      spawnRipple(el, rect.left + rect.width / 2, rect.top + rect.height / 2);
    });

    el.addEventListener('click', function (e) {
      spawnRipple(el, e.clientX, e.clientY);
    });
  });

  /* ============================================================
     FLOATING LEAVES GENERATOR
  ============================================================ */
  var leafLayer = document.getElementById('leaf-layer');
  var leafColors = ['#6f9a72', '#93ac86', '#c1794f', '#aec49b', '#8faa8b'];
  var LEAF_COUNT = window.innerWidth < 640 ? 8 : 14;

  for (var i = 0; i < LEAF_COUNT; i++) {
    (function (idx) {
      var leaf = document.createElement('div');
      leaf.className = 'leaf';
      var size = 14 + Math.random() * 18;
      var left = Math.random() * 100;
      var duration = 16 + Math.random() * 14;
      var delay = Math.random() * 20;
      var color = leafColors[idx % leafColors.length];

      leaf.style.left = left + 'vw';
      leaf.style.width = size + 'px';
      leaf.style.height = size + 'px';
      leaf.style.color = color;
      leaf.style.animationDuration = duration + 's';
      leaf.style.animationDelay = '-' + delay + 's';

      leaf.innerHTML = '<svg viewBox="0 0 64 64" fill="currentColor" aria-hidden="true"><use href="#icon-leaf"></use></svg>';
      leafLayer.appendChild(leaf);
    })(i);
  }

  /* ============================================================
     CONTACT FORM — real submission via fetch()
  ============================================================ */
  var form = document.getElementById('contact-form');
  var submitBtn = document.getElementById('cf-submit');
  var statusBox = document.getElementById('form-status');

  function showStatus(type, message) {
    statusBox.className = 'form-status show ' + type;
    statusBox.innerHTML = (type === 'success'
      ? '<i class="fa-solid fa-circle-check"></i> '
      : '<i class="fa-solid fa-triangle-exclamation"></i> ') + message;
  }

  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var name = document.getElementById('cf-name').value.trim();
      var email = document.getElementById('cf-email').value.trim();
      var subject = document.getElementById('cf-subject').value.trim();
      var message = document.getElementById('cf-message').value.trim();

      if (!name || !email || !subject || !message) {
        showStatus('error', 'Please fill in every field before sending.');
        return;
      }

      submitBtn.classList.add('loading');
      submitBtn.disabled = true;
      statusBox.classList.remove('show');

      fetch('/api/messages-store', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({ name: name, email: email, subject: subject, message: message })
      })
        .then(function (response) {
          return response.json().catch(function () { return {}; }).then(function (data) {
            return { ok: response.ok, data: data };
          });
        })
        .then(function (result) {
          submitBtn.classList.remove('loading');
          submitBtn.disabled = false;

          if (result.ok) {
            showStatus('success', (result.data && result.data.message) || 'Thank you! Your message has taken root — I\'ll get back to you soon.');
            form.reset();
          } else {
            var errMsg = (result.data && (result.data.message || (result.data.errors && Object.values(result.data.errors)[0][0]))) || 'Something went wrong. Please try again in a moment.';
            showStatus('error', errMsg);
          }
        })
        .catch(function () {
          submitBtn.classList.remove('loading');
          submitBtn.disabled = false;
          showStatus('error', 'Network error — please check your connection and try again.');
        });
    });
  }

  /* ============================================================
     FOOTER YEAR
  ============================================================ */
  var yearEl = document.getElementById('cur-year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  /* ============================================================
     OPTIONAL GSAP POLISH (progressive enhancement)
  ============================================================ */
  if (window.gsap) {
    gsap.from('.hero-blob', { scale: 0.85, opacity: 0, duration: 1.6, ease: 'power2.out' });
  }

})();
</script>
</body>
</html>
