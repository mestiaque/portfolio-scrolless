<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan | Full-Stack Laravel Developer — Premium Portfolio</title>
<meta name="description" content="Portfolio of M. Estiaque Ahmed Khan, a full-stack Laravel developer specializing in database architecture, REST API design, ERP automation and frontend performance optimization." />
<meta name="theme-color" content="#050506" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<!-- GSAP (used for subtle hero entrance + micro-interactions) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<style>
    /* ================================================================
       RESET & BASE
    ================================================================ */
    *, *::before, *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --black: #050506;
        --black-soft: #0a0a0d;
        --surface: #101114;
        --surface-2: #16171b;
        --white: #ffffff;
        --silver: #c9cbd1;
        --silver-soft: #e7e8ec;
        --blue: #0a84ff;
        --blue-bright: #3fa2ff;
        --blue-deep: #0a5cd6;
        --blue-glow: rgba(10, 132, 255, 0.45);

        --glass-bg: rgba(255, 255, 255, 0.055);
        --glass-bg-strong: rgba(255, 255, 255, 0.09);
        --glass-border: rgba(255, 255, 255, 0.14);
        --glass-shadow: rgba(0, 0, 0, 0.55);

        --text-primary: #f5f5f7;
        --text-secondary: #a9abb3;
        --text-tertiary: #6e6f76;

        --radius-sm: 12px;
        --radius-md: 20px;
        --radius-lg: 28px;
        --radius-pill: 999px;

        --sp-1: 8px;
        --sp-2: 16px;
        --sp-3: 24px;
        --sp-4: 32px;
        --sp-5: 40px;
        --sp-6: 48px;
        --sp-7: 64px;
        --sp-8: 80px;
        --sp-9: 96px;
        --sp-10: 128px;

        --ease: cubic-bezier(0.16, 0.84, 0.44, 1);
        --mx: 50%;
        --my: 30%;
    }

    html {
        scroll-behavior: smooth;
        scroll-padding-top: 90px;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: var(--black);
        color: var(--text-primary);
        overflow-x: hidden;
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    img, svg { display: block; max-width: 100%; }
    ul { list-style: none; }
    a { color: inherit; text-decoration: none; }
    button { font-family: inherit; cursor: pointer; }
    input, textarea { font-family: inherit; }

    h1, h2, h3, h4 {
        font-family: 'Manrope', 'Inter', sans-serif;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: var(--white);
    }

    ::selection { background: var(--blue); color: #fff; }

    /* Focus states — accessibility first */
    a:focus-visible,
    button:focus-visible,
    input:focus-visible,
    textarea:focus-visible {
        outline: 2px solid var(--blue-bright);
        outline-offset: 3px;
        border-radius: 6px;
    }

    /* Skip link */
    .skip-link {
        position: absolute;
        top: -100px;
        left: 16px;
        background: var(--blue);
        color: #fff;
        padding: 12px 20px;
        border-radius: var(--radius-sm);
        z-index: 999;
        transition: top 0.25s var(--ease);
        font-weight: 600;
    }
    .skip-link:focus { top: 16px; }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-track { background: var(--black); }
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, var(--blue), #2a2b31);
        border-radius: 10px;
        border: 2px solid var(--black);
    }

    /* ================================================================
       LAYOUT UTILITIES
    ================================================================ */
    .container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 var(--sp-4);
    }

    section { position: relative; z-index: 5; padding: var(--sp-9) 0; }

    .section-head {
        max-width: 640px;
        margin: 0 auto var(--sp-7);
        text-align: center;
    }
    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: var(--blue-bright);
        margin-bottom: var(--sp-2);
    }
    .eyebrow::before {
        content: '';
        width: 22px;
        height: 2px;
        background: var(--blue-bright);
        border-radius: 2px;
    }
    .section-title {
        font-size: clamp(2rem, 4.2vw, 3rem);
        margin-bottom: var(--sp-2);
    }
    .section-sub {
        color: var(--text-secondary);
        font-size: 1.05rem;
    }
    .gradient-text {
        background: linear-gradient(135deg, var(--white) 20%, var(--blue-bright) 60%, var(--silver) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* ================================================================
       BACKDROP — spotlight, orbs, noise
    ================================================================ */
    .spotlight {
        position: fixed;
        inset: 0;
        z-index: 1;
        pointer-events: none;
        background: radial-gradient(650px circle at var(--mx) var(--my), rgba(10, 132, 255, 0.16), transparent 55%);
        transition: background 0.15s ease-out;
    }

    .bg-layer {
        position: fixed;
        inset: 0;
        z-index: 0;
        overflow: hidden;
        pointer-events: none;
        background:
            radial-gradient(1200px circle at 15% -10%, rgba(10, 132, 255, 0.10), transparent 55%),
            radial-gradient(900px circle at 110% 20%, rgba(180, 190, 210, 0.06), transparent 50%),
            var(--black);
    }
    .orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(90px);
        opacity: 0.4;
        animation: orbFloat 16s ease-in-out infinite alternate;
    }
    .orb-1 { width: 480px; height: 480px; background: radial-gradient(circle, rgba(10,132,255,0.55), transparent 70%); top: -8%; left: -8%; }
    .orb-2 { width: 420px; height: 420px; background: radial-gradient(circle, rgba(201,203,209,0.35), transparent 70%); bottom: -10%; right: -6%; animation-delay: -6s; }
    .orb-3 { width: 320px; height: 320px; background: radial-gradient(circle, rgba(10,132,255,0.35), transparent 70%); top: 45%; left: 55%; animation-delay: -11s; }

    @keyframes orbFloat {
        0%   { transform: translate(0, 0) scale(1); }
        100% { transform: translate(50px, 40px) scale(1.12); }
    }

    .grain {
        position: fixed;
        inset: 0;
        z-index: 2;
        pointer-events: none;
        opacity: 0.025;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    /* ================================================================
       GLASS PRIMITIVES
    ================================================================ */
    .glass {
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        border-radius: var(--radius-md);
        backdrop-filter: blur(22px) saturate(150%);
        -webkit-backdrop-filter: blur(22px) saturate(150%);
        box-shadow: 0 8px 32px var(--glass-shadow), inset 0 1px 0 rgba(255,255,255,0.06);
    }
    .glass-strong {
        background: var(--glass-bg-strong);
        border: 1px solid var(--glass-border);
        backdrop-filter: blur(28px) saturate(160%);
        -webkit-backdrop-filter: blur(28px) saturate(160%);
    }

    /* ================================================================
       NAVBAR
    ================================================================ */
    .navbar {
        position: fixed;
        top: 0; left: 0; right: 0;
        z-index: 200;
        padding: 18px var(--sp-4);
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: background 0.35s var(--ease), border-color 0.35s var(--ease), padding 0.35s var(--ease);
        border-bottom: 1px solid transparent;
    }
    .navbar.scrolled {
        background: rgba(5, 5, 6, 0.65);
        backdrop-filter: blur(18px) saturate(160%);
        -webkit-backdrop-filter: blur(18px) saturate(160%);
        border-bottom: 1px solid var(--glass-border);
        padding: 12px var(--sp-4);
    }
    .nav-inner {
        max-width: 1240px;
        margin: 0 auto;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .logo {
        font-family: 'Manrope', sans-serif;
        font-weight: 800;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 10px;
        letter-spacing: -0.01em;
    }
    .logo-mark {
        width: 34px; height: 34px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, var(--blue), #6fb7ff);
        color: #fff;
        font-size: 0.85rem;
        font-weight: 800;
        box-shadow: 0 4px 18px var(--blue-glow);
    }
    .nav-links {
        display: flex;
        align-items: center;
        gap: var(--sp-4);
    }
    .nav-links a {
        font-size: 0.88rem;
        font-weight: 500;
        color: var(--text-secondary);
        position: relative;
        padding: 6px 2px;
        transition: color 0.25s ease;
    }
    .nav-links a::after {
        content: '';
        position: absolute;
        left: 0; bottom: 0;
        width: 0; height: 2px;
        background: linear-gradient(90deg, var(--blue), var(--blue-bright));
        border-radius: 2px;
        transition: width 0.3s var(--ease);
    }
    .nav-links a:hover,
    .nav-links a.active { color: var(--white); }
    .nav-links a:hover::after,
    .nav-links a.active::after { width: 100%; }

    .nav-cta { display: flex; align-items: center; gap: var(--sp-2); }

    .nav-toggle {
        display: none;
        width: 42px; height: 42px;
        border-radius: 10px;
        border: 1px solid var(--glass-border);
        background: var(--glass-bg);
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.05rem;
        z-index: 210;
    }

    .mobile-nav {
        position: fixed;
        inset: 0;
        z-index: 195;
        background: rgba(5,5,6,0.97);
        backdrop-filter: blur(20px);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: var(--sp-4);
        transform: translateY(-100%);
        transition: transform 0.45s var(--ease);
    }
    .mobile-nav.open { transform: translateY(0); }
    .mobile-nav a { font-size: 1.4rem; font-weight: 600; color: var(--text-primary); }
    .mobile-nav a:hover { color: var(--blue-bright); }

    /* ================================================================
       BUTTONS — premium animated
    ================================================================ */
    .btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px 30px;
        border-radius: var(--radius-pill);
        font-size: 0.92rem;
        font-weight: 600;
        border: none;
        overflow: hidden;
        isolation: isolate;
        transition: transform 0.35s var(--ease), box-shadow 0.35s var(--ease);
        white-space: nowrap;
    }
    .btn:active { transform: scale(0.96); }

    .btn-primary {
        color: #fff;
        background: linear-gradient(135deg, var(--blue), var(--blue-deep));
        box-shadow: 0 8px 26px var(--blue-glow);
    }
    .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 14px 34px var(--blue-glow); }
    .btn-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        z-index: -1;
        background: linear-gradient(120deg, transparent 30%, rgba(255,255,255,0.45) 50%, transparent 70%);
        transform: translateX(-120%);
        transition: transform 0.7s var(--ease);
    }
    .btn-primary:hover::before { transform: translateX(120%); }

    .btn-ghost {
        color: var(--white);
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        backdrop-filter: blur(14px);
    }
    .btn-ghost:hover {
        transform: translateY(-3px);
        background: var(--glass-bg-strong);
        border-color: rgba(255,255,255,0.28);
    }

    .btn-sm { padding: 11px 22px; font-size: 0.82rem; }

    /* ================================================================
       HERO
    ================================================================ */
    .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding-top: 120px;
        padding-bottom: var(--sp-7);
    }
    .hero-grid {
        display: grid;
        grid-template-columns: 1.15fr 0.85fr;
        gap: var(--sp-7);
        align-items: center;
    }
    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 8px 16px 8px 10px;
        border-radius: var(--radius-pill);
        margin-bottom: var(--sp-4);
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--silver-soft);
    }
    .hero-eyebrow .dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: #34d399;
        box-shadow: 0 0 10px #34d399;
        animation: pulseDot 2s ease-in-out infinite;
    }
    @keyframes pulseDot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.75); }
    }

    .hero-title {
        font-size: clamp(2.4rem, 5.4vw, 4.3rem);
        line-height: 1.06;
        margin-bottom: var(--sp-3);
    }
    .hero-title .role-line {
        display: block;
        font-size: clamp(1.1rem, 2.2vw, 1.5rem);
        font-weight: 600;
        color: var(--text-secondary);
        margin-top: var(--sp-2);
        letter-spacing: 0;
    }

    .hero-sub {
        font-size: 1.08rem;
        color: var(--text-secondary);
        max-width: 560px;
        margin-bottom: var(--sp-5);
    }

    .hero-edu {
        display: flex;
        flex-wrap: wrap;
        gap: var(--sp-2);
        margin-bottom: var(--sp-5);
    }
    .edu-chip {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        border-radius: var(--radius-pill);
        font-size: 0.8rem;
        color: var(--text-secondary);
    }
    .edu-chip i { color: var(--blue-bright); }
    .edu-chip strong { color: var(--text-primary); font-weight: 600; }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: var(--sp-3);
        margin-bottom: var(--sp-6);
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--sp-2);
        max-width: 460px;
    }
    .stat-card {
        padding: var(--sp-3) var(--sp-2);
        border-radius: var(--radius-sm);
        text-align: center;
        transition: transform 0.35s var(--ease);
    }
    .stat-card:hover { transform: translateY(-4px); }
    .stat-num {
        font-family: 'Manrope', sans-serif;
        font-size: 1.7rem;
        font-weight: 800;
        color: var(--white);
    }
    .stat-label {
        font-size: 0.72rem;
        color: var(--text-tertiary);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-top: 4px;
    }

    /* Hero visual — abstract glass avatar */
    .hero-visual {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 480px;
    }
    .avatar-ring {
        position: absolute;
        border-radius: 50%;
        border: 1px solid var(--glass-border);
        animation: spinSlow 40s linear infinite;
    }
    .avatar-ring.r1 { width: 420px; height: 420px; }
    .avatar-ring.r2 { width: 340px; height: 340px; border-style: dashed; animation-direction: reverse; animation-duration: 55s; }
    @keyframes spinSlow { to { transform: rotate(360deg); } }

    .avatar-core {
        position: relative;
        width: 250px; height: 250px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(155deg, rgba(255,255,255,0.12), rgba(10,132,255,0.14));
        border: 1px solid var(--glass-border);
        backdrop-filter: blur(24px);
        box-shadow: 0 30px 80px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.15);
        animation: floatY 6s ease-in-out infinite;
    }
    .avatar-initials {
        font-family: 'Manrope', sans-serif;
        font-size: 4.2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #fff, var(--blue-bright));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    @keyframes floatY {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-16px); }
    }

    .float-badge {
        position: absolute;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        border-radius: var(--radius-pill);
        font-size: 0.78rem;
        font-weight: 600;
        white-space: nowrap;
        animation: floatBadge 5s ease-in-out infinite;
    }
    .float-badge i { color: var(--blue-bright); }
    .fb-1 { top: 6%; left: -4%; animation-delay: 0s; }
    .fb-2 { bottom: 14%; left: -8%; animation-delay: -1.4s; }
    .fb-3 { top: 12%; right: -6%; animation-delay: -2.6s; }
    .fb-4 { bottom: 4%; right: -2%; animation-delay: -3.8s; }
    @keyframes floatBadge {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }

    .scroll-indicator {
        position: absolute;
        bottom: var(--sp-4);
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        color: var(--text-tertiary);
        font-size: 0.7rem;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }
    .scroll-indicator .mouse {
        width: 24px; height: 38px;
        border: 1px solid var(--glass-border);
        border-radius: 14px;
        position: relative;
    }
    .scroll-indicator .mouse::before {
        content: '';
        position: absolute;
        top: 6px; left: 50%;
        width: 4px; height: 8px;
        background: var(--blue-bright);
        border-radius: 2px;
        transform: translateX(-50%);
        animation: scrollWheel 1.8s ease-in-out infinite;
    }
    @keyframes scrollWheel {
        0% { opacity: 1; top: 6px; }
        100% { opacity: 0; top: 18px; }
    }

    /* ================================================================
       SERVICES
    ================================================================ */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--sp-3);
    }
    .service-card {
        padding: var(--sp-4);
        border-radius: var(--radius-md);
        transition: transform 0.45s var(--ease), border-color 0.45s var(--ease), box-shadow 0.45s var(--ease);
    }
    .service-card:hover {
        transform: translateY(-8px);
        border-color: rgba(10, 132, 255, 0.4);
        box-shadow: 0 20px 50px rgba(10, 132, 255, 0.16);
    }
    .service-icon {
        width: 56px; height: 56px;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        color: #fff;
        background: linear-gradient(135deg, var(--blue), #6fb7ff);
        margin-bottom: var(--sp-3);
        box-shadow: 0 10px 24px var(--blue-glow);
        transition: transform 0.45s var(--ease);
    }
    .service-card:hover .service-icon { transform: rotate(-8deg) scale(1.08); }
    .service-card h3 { font-size: 1.15rem; margin-bottom: 10px; }
    .service-card p { color: var(--text-secondary); font-size: 0.92rem; }

    /* ================================================================
       SKILLS
    ================================================================ */
    .skills-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--sp-6);
        align-items: start;
    }
    .skill-bars { display: flex; flex-direction: column; gap: var(--sp-3); }
    .skill-bar-row { display: flex; flex-direction: column; gap: 8px; }
    .skill-bar-top {
        display: flex;
        justify-content: space-between;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--text-primary);
    }
    .skill-bar-top span:last-child { color: var(--blue-bright); font-weight: 700; }
    .skill-bar-track {
        height: 8px;
        border-radius: var(--radius-pill);
        background: rgba(255,255,255,0.07);
        overflow: hidden;
        border: 1px solid var(--glass-border);
    }
    .skill-bar-fill {
        height: 100%;
        width: 0%;
        border-radius: var(--radius-pill);
        background: linear-gradient(90deg, var(--blue-deep), var(--blue-bright));
        box-shadow: 0 0 12px var(--blue-glow);
        transition: width 1.4s var(--ease);
    }

    .skill-chips-wrap {
        padding: var(--sp-4);
        border-radius: var(--radius-md);
    }
    .skill-chips-title {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--text-tertiary);
        margin-bottom: var(--sp-3);
    }
    .chip-cloud { display: flex; flex-wrap: wrap; gap: 10px; }
    .chip {
        padding: 9px 16px;
        border-radius: var(--radius-pill);
        font-size: 0.82rem;
        font-weight: 500;
        color: var(--silver-soft);
        border: 1px solid var(--glass-border);
        background: var(--glass-bg);
        transition: transform 0.3s var(--ease), background 0.3s var(--ease), border-color 0.3s var(--ease);
    }
    .chip:hover {
        transform: translateY(-3px);
        background: rgba(10,132,255,0.14);
        border-color: rgba(10,132,255,0.45);
        color: #fff;
    }

    /* ================================================================
       PROJECTS
    ================================================================ */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: var(--sp-4);
    }
    .project-card {
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: transform 0.45s var(--ease), box-shadow 0.45s var(--ease);
        display: flex;
        flex-direction: column;
    }
    .project-card:hover { transform: translateY(-8px); box-shadow: 0 26px 60px rgba(0,0,0,0.5); }
    .project-preview {
        height: 190px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-bottom: 1px solid var(--glass-border);
    }
    .project-preview::before {
        content: '';
        position: absolute;
        inset: 0;
    }
    .pp-1::before { background: radial-gradient(circle at 30% 30%, rgba(10,132,255,0.55), transparent 60%), linear-gradient(135deg, #101114, #0a0a0d); }
    .pp-2::before { background: radial-gradient(circle at 70% 20%, rgba(63,162,255,0.5), transparent 60%), linear-gradient(135deg, #0d0f13, #05050a); }
    .pp-3::before { background: radial-gradient(circle at 25% 75%, rgba(10,132,255,0.45), transparent 60%), linear-gradient(135deg, #0f1013, #060608); }
    .pp-4::before { background: radial-gradient(circle at 80% 70%, rgba(201,203,209,0.3), transparent 60%), linear-gradient(135deg, #101114, #07070a); }
    .project-preview i {
        position: relative;
        font-size: 3.4rem;
        color: rgba(255,255,255,0.85);
        filter: drop-shadow(0 8px 22px rgba(10,132,255,0.4));
        transition: transform 0.45s var(--ease);
    }
    .project-card:hover .project-preview i { transform: scale(1.12) translateY(-4px); }
    .project-body { padding: var(--sp-4); display: flex; flex-direction: column; gap: var(--sp-2); flex: 1; }
    .project-body h3 { font-size: 1.2rem; }
    .project-body p { color: var(--text-secondary); font-size: 0.92rem; flex: 1; }
    .project-tags { display: flex; flex-wrap: wrap; gap: 8px; margin: 4px 0; }
    .tag {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 5px 11px;
        border-radius: var(--radius-pill);
        background: rgba(10,132,255,0.12);
        color: var(--blue-bright);
        border: 1px solid rgba(10,132,255,0.25);
    }
    .project-links { display: flex; gap: var(--sp-2); margin-top: 6px; }
    .project-links a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--text-primary);
        transition: color 0.25s ease, gap 0.25s ease;
    }
    .project-links a:hover { color: var(--blue-bright); gap: 11px; }

    /* ================================================================
       EXPERIENCE TIMELINE
    ================================================================ */
    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding-left: var(--sp-6);
    }
    .timeline::before {
        content: '';
        position: absolute;
        left: 10px; top: 6px; bottom: 6px;
        width: 2px;
        background: linear-gradient(180deg, var(--blue), rgba(10,132,255,0.05));
        border-radius: 2px;
    }
    .timeline-item { position: relative; padding-bottom: var(--sp-6); }
    .timeline-item:last-child { padding-bottom: 0; }
    .timeline-dot {
        position: absolute;
        left: calc(-1 * var(--sp-6) + 2px);
        top: 6px;
        width: 20px; height: 20px;
        border-radius: 50%;
        background: var(--black);
        border: 2px solid var(--blue-bright);
        box-shadow: 0 0 0 5px rgba(10,132,255,0.12);
    }
    .timeline-item.current .timeline-dot {
        background: var(--blue-bright);
        box-shadow: 0 0 0 6px rgba(10,132,255,0.22), 0 0 20px var(--blue-glow);
    }
    .timeline-card { padding: var(--sp-4); border-radius: var(--radius-md); }
    .timeline-top {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 8px;
    }
    .timeline-role { font-size: 1.1rem; font-weight: 700; color: #fff; }
    .timeline-company { color: var(--blue-bright); font-weight: 600; font-size: 0.92rem; margin-bottom: 10px; }
    .timeline-date {
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--text-tertiary);
        padding: 5px 12px;
        border-radius: var(--radius-pill);
        border: 1px solid var(--glass-border);
        white-space: nowrap;
    }
    .timeline-item.current .timeline-date { color: #34d399; border-color: rgba(52,211,153,0.35); background: rgba(52,211,153,0.08); }
    .timeline-desc { color: var(--text-secondary); font-size: 0.94rem; }

    /* ================================================================
       TESTIMONIALS
    ================================================================ */
    .testimonial-track-wrap { position: relative; max-width: 900px; margin: 0 auto; overflow: hidden; }
    .testimonial-track {
        display: flex;
        transition: transform 0.6s var(--ease);
    }
    .testimonial-slide { min-width: 100%; padding: 4px; }
    .testimonial-card {
        padding: var(--sp-6) var(--sp-5);
        border-radius: var(--radius-lg);
        text-align: center;
        max-width: 720px;
        margin: 0 auto;
    }
    .quote-icon {
        width: 52px; height: 52px;
        border-radius: 50%;
        margin: 0 auto var(--sp-3);
        display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, var(--blue), #6fb7ff);
        color: #fff;
        font-size: 1.15rem;
        box-shadow: 0 10px 24px var(--blue-glow);
    }
    .testimonial-text {
        font-size: 1.12rem;
        line-height: 1.7;
        color: var(--text-primary);
        margin-bottom: var(--sp-3);
        font-weight: 400;
    }
    .testimonial-author { font-weight: 700; color: var(--blue-bright); font-size: 0.92rem; }

    .testimonial-controls {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: var(--sp-3);
        margin-top: var(--sp-4);
    }
    .t-arrow {
        width: 44px; height: 44px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        border: 1px solid var(--glass-border);
        background: var(--glass-bg);
        color: var(--white);
        transition: all 0.3s var(--ease);
    }
    .t-arrow:hover { background: var(--blue); border-color: var(--blue); transform: scale(1.08); }
    .t-dots { display: flex; gap: 8px; }
    .t-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        transition: all 0.3s var(--ease);
    }
    .t-dot.active { background: var(--blue-bright); width: 24px; border-radius: var(--radius-pill); }

    /* ================================================================
       CONTACT
    ================================================================ */
    .contact-grid {
        display: grid;
        grid-template-columns: 0.85fr 1.15fr;
        gap: var(--sp-6);
        align-items: stretch;
    }
    .contact-info { display: flex; flex-direction: column; gap: var(--sp-3); }
    .contact-info-card { padding: var(--sp-4); border-radius: var(--radius-md); }
    .contact-info-card h3 { font-size: 1.25rem; margin-bottom: 10px; }
    .contact-info-card p { color: var(--text-secondary); font-size: 0.92rem; margin-bottom: var(--sp-3); }
    .contact-methods { display: flex; flex-direction: column; gap: 12px; }
    .contact-method {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 12px 14px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--glass-border);
        background: rgba(255,255,255,0.03);
        transition: all 0.3s var(--ease);
        font-size: 0.88rem;
        font-weight: 500;
    }
    .contact-method:hover {
        background: rgba(10,132,255,0.1);
        border-color: rgba(10,132,255,0.35);
        transform: translateX(6px);
    }
    .contact-method .cm-icon {
        width: 38px; height: 38px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, var(--blue), #6fb7ff);
        color: #fff;
        flex-shrink: 0;
    }
    .contact-method small { display: block; color: var(--text-tertiary); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.06em; }

    .availability-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border-radius: var(--radius-pill);
        margin-top: var(--sp-2);
        font-size: 0.8rem;
        font-weight: 600;
        color: #34d399;
        border: 1px solid rgba(52,211,153,0.3);
        background: rgba(52,211,153,0.08);
    }

    .contact-form-card { padding: var(--sp-5); border-radius: var(--radius-lg); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: var(--sp-3); }
    .form-group { margin-bottom: var(--sp-3); display: flex; flex-direction: column; gap: 8px; }
    .form-group label { font-size: 0.8rem; font-weight: 600; color: var(--text-secondary); }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 14px 16px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--glass-border);
        background: rgba(255,255,255,0.04);
        color: var(--text-primary);
        font-size: 0.92rem;
        transition: border-color 0.3s ease, background 0.3s ease;
    }
    .form-group input::placeholder,
    .form-group textarea::placeholder { color: var(--text-tertiary); }
    .form-group input:focus,
    .form-group textarea:focus {
        border-color: var(--blue-bright);
        background: rgba(10,132,255,0.06);
        outline: none;
    }
    .form-group textarea { resize: vertical; min-height: 130px; }

    .form-status {
        display: none;
        align-items: center;
        gap: 10px;
        padding: 13px 16px;
        border-radius: var(--radius-sm);
        font-size: 0.88rem;
        font-weight: 500;
        margin-bottom: var(--sp-3);
    }
    .form-status.show { display: flex; }
    .form-status.success { background: rgba(52,211,153,0.1); border: 1px solid rgba(52,211,153,0.35); color: #34d399; }
    .form-status.error { background: rgba(248,113,113,0.1); border: 1px solid rgba(248,113,113,0.35); color: #f87171; }

    .submit-btn { width: 100%; justify-content: center; }
    .submit-btn .fa-circle-notch { display: none; }
    .submit-btn.loading .fa-circle-notch { display: inline-block; animation: spin 0.8s linear infinite; }
    .submit-btn.loading .btn-text { opacity: 0.7; }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* ================================================================
       FOOTER
    ================================================================ */
    footer { position: relative; z-index: 5; padding: var(--sp-6) 0 var(--sp-4); }
    .footer-glass {
        padding: var(--sp-5);
        border-radius: var(--radius-lg);
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: var(--sp-4);
    }
    .footer-brand { display: flex; flex-direction: column; gap: 6px; }
    .footer-brand .logo { font-size: 1.1rem; }
    .footer-brand p { color: var(--text-tertiary); font-size: 0.82rem; max-width: 320px; }
    .footer-links { display: flex; gap: var(--sp-4); flex-wrap: wrap; }
    .footer-links a { font-size: 0.85rem; color: var(--text-secondary); transition: color 0.25s ease; }
    .footer-links a:hover { color: var(--blue-bright); }
    .footer-social { display: flex; gap: 10px; }
    .footer-social a {
        width: 40px; height: 40px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        border: 1px solid var(--glass-border);
        background: rgba(255,255,255,0.04);
        transition: all 0.3s var(--ease);
    }
    .footer-social a:hover { background: var(--blue); border-color: var(--blue); transform: translateY(-4px); }
    .footer-bottom {
        max-width: 1240px;
        margin: var(--sp-4) auto 0;
        padding: 0 var(--sp-4);
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        color: var(--text-tertiary);
        font-size: 0.78rem;
    }

    .back-to-top {
        position: fixed;
        right: var(--sp-3);
        bottom: var(--sp-3);
        width: 48px; height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--glass-bg-strong);
        border: 1px solid var(--glass-border);
        color: var(--white);
        z-index: 150;
        opacity: 0;
        pointer-events: none;
        transform: translateY(12px);
        transition: all 0.4s var(--ease);
    }
    .back-to-top.show { opacity: 1; pointer-events: auto; transform: translateY(0); }
    .back-to-top:hover { background: var(--blue); border-color: var(--blue); }

    /* ================================================================
       REVEAL ANIMATIONS (IntersectionObserver driven)
    ================================================================ */
    .reveal {
        opacity: 0;
        transform: translateY(36px);
        transition: opacity 0.8s var(--ease), transform 0.8s var(--ease);
    }
    .reveal.in-view { opacity: 1; transform: translateY(0); }
    .reveal-scale { opacity: 0; transform: scale(0.92); transition: opacity 0.7s var(--ease), transform 0.7s var(--ease); }
    .reveal-scale.in-view { opacity: 1; transform: scale(1); }

    /* ================================================================
       RESPONSIVE
    ================================================================ */
    @media (max-width: 1080px) {
        .hero-grid { grid-template-columns: 1fr; }
        .hero-visual { height: 380px; order: -1; }
        .avatar-ring.r1 { width: 320px; height: 320px; }
        .avatar-ring.r2 { width: 260px; height: 260px; }
        .avatar-core { width: 190px; height: 190px; }
        .avatar-initials { font-size: 3rem; }
        .services-grid { grid-template-columns: repeat(2, 1fr); }
        .projects-grid { grid-template-columns: 1fr; }
        .skills-layout { grid-template-columns: 1fr; }
        .contact-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 860px) {
        .nav-links, .nav-cta .btn-ghost-desktop { display: none; }
        .nav-toggle { display: flex; }
        .float-badge { display: none; }
        .form-row { grid-template-columns: 1fr; }
    }

    @media (max-width: 640px) {
        .container { padding: 0 var(--sp-3); }
        section { padding: var(--sp-7) 0; }
        .hero { padding-top: 100px; }
        .hero-stats { grid-template-columns: repeat(3, 1fr); gap: 8px; }
        .stat-num { font-size: 1.3rem; }
        .services-grid { grid-template-columns: 1fr; }
        .footer-glass { flex-direction: column; align-items: flex-start; }
        .timeline { padding-left: var(--sp-5); }
        .timeline-dot { left: calc(-1 * var(--sp-5) + 2px); }
    }

    @media (max-width: 400px) {
        .hero-title { font-size: 2.1rem; }
        .hero-stats { grid-template-columns: repeat(3, 1fr); }
        .avatar-ring.r1, .avatar-ring.r2 { display: none; }
    }

    /* ================================================================
       REDUCED MOTION
    ================================================================ */
    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after {
            animation-duration: 0.001ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.001ms !important;
            scroll-behavior: auto !important;
        }
    }
</style>
</head>
<body>

<a href="#home" class="skip-link">Skip to content</a>

<div class="bg-layer" aria-hidden="true">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
</div>
<div class="spotlight" id="spotlight" aria-hidden="true"></div>
<div class="grain" aria-hidden="true"></div>

<!-- ============ NAVBAR ============ -->
<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="#home" class="logo">
            <span class="logo-mark">EK</span>
            <span>Estiaque Khan</span>
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home" class="nav-link active">Home</a></li>
            <li><a href="#services" class="nav-link">Services</a></li>
            <li><a href="#skills" class="nav-link">Skills</a></li>
            <li><a href="#projects" class="nav-link">Projects</a></li>
            <li><a href="#experience" class="nav-link">Experience</a></li>
            <li><a href="#testimonials" class="nav-link">Testimonials</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
        </ul>
        <div class="nav-cta">
            <a href="#contact" class="btn btn-primary btn-sm btn-ghost-desktop">Let's Talk</a>
            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobileNav">
                <i class="fa-solid fa-bars" id="navToggleIcon"></i>
            </button>
        </div>
    </div>
</nav>

<div class="mobile-nav" id="mobileNav">
    <a href="#home" class="mobile-link">Home</a>
    <a href="#services" class="mobile-link">Services</a>
    <a href="#skills" class="mobile-link">Skills</a>
    <a href="#projects" class="mobile-link">Projects</a>
    <a href="#experience" class="mobile-link">Experience</a>
    <a href="#testimonials" class="mobile-link">Testimonials</a>
    <a href="#contact" class="mobile-link">Contact</a>
</div>

<main id="main">

    <!-- ============ HERO ============ -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-copy">
                    <div class="hero-eyebrow glass" data-gsap="fade">
                        <span class="dot"></span>
                        Available for new opportunities
                    </div>

                    <h1 class="hero-title" data-gsap="fade">
                        <span class="gradient-text">M. Estiaque Ahmed Khan</span>
                        <span class="role-line">Software Engineer &mdash; Full-Stack Laravel Developer</span>
                    </h1>

                    <p class="hero-sub" data-gsap="fade">
                        Full-stack developer with hands-on experience across frontend optimization, database
                        management, PHP/Laravel web application development, custom inventory management modules,
                        enterprise automation solutions, and ERP systems integration.
                    </p>

                    <div class="hero-edu" data-gsap="fade">
                        <div class="edu-chip glass">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span><strong>MSc</strong> Computer Science &middot; Uttara University &middot; 2025</span>
                        </div>
                        <div class="edu-chip glass">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span><strong>BSc</strong> CSE &middot; Uttara University &middot; 2021</span>
                        </div>
                    </div>

                    <div class="hero-actions" data-gsap="fade">
                        <a href="#projects" class="btn btn-primary">
                            <i class="fa-solid fa-diagram-project"></i> View My Work
                        </a>
                        <a href="#contact" class="btn btn-ghost">
                            <i class="fa-regular fa-paper-plane"></i> Get In Touch
                        </a>
                    </div>

                    <div class="hero-stats" data-gsap="fade">
                        <div class="stat-card glass">
                            <div class="stat-num" data-count="4">0</div>
                            <div class="stat-label">Years Exp.</div>
                        </div>
                        <div class="stat-card glass">
                            <div class="stat-num" data-count="20">0</div>
                            <div class="stat-label">Projects</div>
                        </div>
                        <div class="stat-card glass">
                            <div class="stat-num" data-count="18">0</div>
                            <div class="stat-label">Technologies</div>
                        </div>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="avatar-ring r1"></div>
                    <div class="avatar-ring r2"></div>
                    <div class="avatar-core">
                        <span class="avatar-initials">EK</span>
                    </div>
                    <div class="float-badge glass fb-1"><i class="fa-brands fa-laravel"></i> Laravel</div>
                    <div class="float-badge glass fb-2"><i class="fa-brands fa-php"></i> PHP 8</div>
                    <div class="float-badge glass fb-3"><i class="fa-solid fa-database"></i> MySQL</div>
                    <div class="float-badge glass fb-4"><i class="fa-brands fa-vuejs"></i> Vue.js</div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="mouse"></div>
        </div>
    </section>

    <!-- ============ SERVICES ============ -->
    <section id="services">
        <div class="container">
            <div class="section-head reveal">
                <div class="eyebrow">What I Do</div>
                <h2 class="section-title">Services Built For <span class="gradient-text">Scale</span></h2>
                <p class="section-sub">End-to-end engineering across the stack &mdash; from schema design to the pixels users touch.</p>
            </div>

            <div class="services-grid">
                <div class="service-card glass reveal">
                    <div class="service-icon"><i class="fa-solid fa-layer-group"></i></div>
                    <h3>Full-Stack Laravel Development</h3>
                    <p>Building robust, scalable web applications end-to-end with Laravel &mdash; from database schema to a polished, production-ready frontend.</p>
                </div>
                <div class="service-card glass reveal">
                    <div class="service-icon"><i class="fa-solid fa-database"></i></div>
                    <h3>Database Architecture &amp; Optimization</h3>
                    <p>Designing efficient MySQL &amp; PostgreSQL schemas and tuning slow queries so applications stay fast as data grows.</p>
                </div>
                <div class="service-card glass reveal">
                    <div class="service-icon"><i class="fa-solid fa-plug"></i></div>
                    <h3>REST API Design &amp; Integration</h3>
                    <p>Building clean, well-documented APIs and integrating third-party services, payment gateways and internal systems.</p>
                </div>
                <div class="service-card glass reveal">
                    <div class="service-icon"><i class="fa-solid fa-industry"></i></div>
                    <h3>ERP &amp; Enterprise Automation</h3>
                    <p>Custom ERP modules and automation workflows that streamline inventory, procurement and reporting for real businesses.</p>
                </div>
                <div class="service-card glass reveal">
                    <div class="service-icon"><i class="fa-solid fa-gauge-high"></i></div>
                    <h3>Frontend Performance Optimization</h3>
                    <p>Auditing and optimizing load times, rendering paths and asset delivery for measurably snappier user experiences.</p>
                </div>
                <div class="service-card glass reveal">
                    <div class="service-icon"><i class="fa-solid fa-code-branch"></i></div>
                    <h3>DevOps &amp; CI/CD Setup</h3>
                    <p>Setting up Docker environments and CI/CD pipelines for reliable, repeatable, low-friction deployments.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ SKILLS ============ -->
    <section id="skills">
        <div class="container">
            <div class="section-head reveal">
                <div class="eyebrow">Toolkit</div>
                <h2 class="section-title">Skills &amp; <span class="gradient-text">Technologies</span></h2>
                <p class="section-sub">A refined toolkit built from years of shipping production Laravel systems.</p>
            </div>

            <div class="skills-layout">
                <div class="skill-bars reveal">
                    <div class="skill-bar-row">
                        <div class="skill-bar-top"><span>PHP 8</span><span>95%</span></div>
                        <div class="skill-bar-track"><div class="skill-bar-fill" data-percent="95"></div></div>
                    </div>
                    <div class="skill-bar-row">
                        <div class="skill-bar-top"><span>Laravel</span><span>95%</span></div>
                        <div class="skill-bar-track"><div class="skill-bar-fill" data-percent="95"></div></div>
                    </div>
                    <div class="skill-bar-row">
                        <div class="skill-bar-top"><span>JavaScript (ES6+)</span><span>88%</span></div>
                        <div class="skill-bar-track"><div class="skill-bar-fill" data-percent="88"></div></div>
                    </div>
                    <div class="skill-bar-row">
                        <div class="skill-bar-top"><span>MySQL / Database Design</span><span>90%</span></div>
                        <div class="skill-bar-track"><div class="skill-bar-fill" data-percent="90"></div></div>
                    </div>
                    <div class="skill-bar-row">
                        <div class="skill-bar-top"><span>Vue.js</span><span>82%</span></div>
                        <div class="skill-bar-track"><div class="skill-bar-fill" data-percent="82"></div></div>
                    </div>
                    <div class="skill-bar-row">
                        <div class="skill-bar-top"><span>Docker</span><span>78%</span></div>
                        <div class="skill-bar-track"><div class="skill-bar-fill" data-percent="78"></div></div>
                    </div>
                </div>

                <div class="skill-chips-wrap glass reveal">
                    <div class="skill-chips-title">Also working with</div>
                    <div class="chip-cloud">
                        <span class="chip">Alpine.js</span>
                        <span class="chip">Livewire</span>
                        <span class="chip">PostgreSQL</span>
                        <span class="chip">Redis</span>
                        <span class="chip">REST API Design</span>
                        <span class="chip">Git</span>
                        <span class="chip">AWS</span>
                        <span class="chip">Tailwind CSS</span>
                        <span class="chip">Bootstrap 5</span>
                        <span class="chip">CI/CD</span>
                        <span class="chip">Database Optimization</span>
                        <span class="chip">ERP Integration</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ PROJECTS ============ -->
    <section id="projects">
        <div class="container">
            <div class="section-head reveal">
                <div class="eyebrow">Selected Work</div>
                <h2 class="section-title">Featured <span class="gradient-text">Projects</span></h2>
                <p class="section-sub">A snapshot of systems shipped &mdash; from packages to enterprise automation.</p>
            </div>

            <div class="projects-grid">
                <article class="project-card glass reveal">
                    <div class="project-preview pp-1"><i class="fa-solid fa-cubes"></i></div>
                    <div class="project-body">
                        <h3>Port3folio Package</h3>
                        <p>A modular Laravel package for building dynamic, animated portfolio sites with zero config.</p>
                        <div class="project-tags">
                            <span class="tag">Laravel 11</span>
                            <span class="tag">Blade</span>
                            <span class="tag">Bootstrap 5</span>
                            <span class="tag">jQuery</span>
                        </div>
                        <div class="project-links">
                            <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i> View on GitHub</a>
                        </div>
                    </div>
                </article>

                <article class="project-card glass reveal">
                    <div class="project-preview pp-2"><i class="fa-solid fa-cart-shopping"></i></div>
                    <div class="project-body">
                        <h3>E-Commerce Platform</h3>
                        <p>High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.</p>
                        <div class="project-tags">
                            <span class="tag">Laravel</span>
                            <span class="tag">Vue.js</span>
                            <span class="tag">MySQL</span>
                            <span class="tag">Redis</span>
                            <span class="tag">Stripe</span>
                        </div>
                        <div class="project-links">
                            <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i> View on GitHub</a>
                        </div>
                    </div>
                </article>

                <article class="project-card glass reveal">
                    <div class="project-preview pp-3"><i class="fa-solid fa-chart-line"></i></div>
                    <div class="project-body">
                        <h3>SaaS Analytics Dashboard</h3>
                        <p>Real-time analytics platform processing millions of events per day with customizable widget boards.</p>
                        <div class="project-tags">
                            <span class="tag">Laravel</span>
                            <span class="tag">Livewire</span>
                            <span class="tag">Alpine.js</span>
                            <span class="tag">PostgreSQL</span>
                            <span class="tag">Chart.js</span>
                        </div>
                        <div class="project-links">
                            <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i> View on GitHub</a>
                        </div>
                    </div>
                </article>

                <article class="project-card glass reveal">
                    <div class="project-preview pp-4"><i class="fa-solid fa-warehouse"></i></div>
                    <div class="project-body">
                        <h3>Inventory Management System</h3>
                        <p>Custom-built inventory &amp; ERP automation module for enterprise clients &mdash; stock tracking, procurement workflows and reporting.</p>
                        <div class="project-tags">
                            <span class="tag">PHP</span>
                            <span class="tag">Laravel</span>
                            <span class="tag">MySQL</span>
                            <span class="tag">REST API</span>
                        </div>
                        <div class="project-links">
                            <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i> View on GitHub</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ============ EXPERIENCE TIMELINE ============ -->
    <section id="experience">
        <div class="container">
            <div class="section-head reveal">
                <div class="eyebrow">Career Path</div>
                <h2 class="section-title">Experience <span class="gradient-text">Timeline</span></h2>
                <p class="section-sub">A steady progression through frontend, product engineering and enterprise automation.</p>
            </div>

            <div class="timeline">
                <div class="timeline-item current reveal">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card glass">
                        <div class="timeline-top">
                            <span class="timeline-role">Software Engineer</span>
                            <span class="timeline-date">2025 &mdash; Present</span>
                        </div>
                        <div class="timeline-company">Natore IT</div>
                        <p class="timeline-desc">Frontend optimization and database management for local business clients, improving load times and data reliability across production systems.</p>
                    </div>
                </div>

                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card glass">
                        <div class="timeline-top">
                            <span class="timeline-role">Software Developer</span>
                            <span class="timeline-date">2023 &mdash; 2025</span>
                        </div>
                        <div class="timeline-company">Isotope IT</div>
                        <p class="timeline-desc">Specialized in PHP/Laravel web applications and custom inventory management modules for business clients.</p>
                    </div>
                </div>

                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card glass">
                        <div class="timeline-top">
                            <span class="timeline-role">Software Engineer</span>
                            <span class="timeline-date">2022 &mdash; 2023</span>
                        </div>
                        <div class="timeline-company">Barcode Tech Automation Ltd</div>
                        <p class="timeline-desc">Led development of enterprise automation solutions and ERP systems integration for industrial clients.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ TESTIMONIALS ============ -->
    <section id="testimonials">
        <div class="container">
            <div class="section-head reveal">
                <div class="eyebrow">Kind Words</div>
                <h2 class="section-title">What People <span class="gradient-text">Say</span></h2>
                <p class="section-sub">Feedback from stakeholders and engineering leads on delivery and code quality.</p>
            </div>

            <div class="testimonial-track-wrap reveal">
                <div class="testimonial-track" id="testimonialTrack">
                    <div class="testimonial-slide">
                        <div class="testimonial-card glass">
                            <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                            <p class="testimonial-text">Estiaque consistently delivered clean, maintainable Laravel code under tight deadlines. His grasp of database design meant fewer bottlenecks as our inventory modules scaled with real client data.</p>
                            <div class="testimonial-author">&mdash; Project Stakeholder, Isotope IT</div>
                        </div>
                    </div>
                    <div class="testimonial-slide">
                        <div class="testimonial-card glass">
                            <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                            <p class="testimonial-text">His work on our ERP integration automated processes that used to take our team hours each week. He communicated technical trade-offs clearly and owned the automation pipeline end to end.</p>
                            <div class="testimonial-author">&mdash; Engineering Lead, Barcode Tech Automation Ltd</div>
                        </div>
                    </div>
                    <div class="testimonial-slide">
                        <div class="testimonial-card glass">
                            <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                            <p class="testimonial-text">From payment gateway integration to real-time order tracking, the platform he built handled peak traffic without a hitch. Reliable, detail-oriented, and easy to collaborate with.</p>
                            <div class="testimonial-author">&mdash; Client, E-Commerce Platform Project</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-controls">
                    <button class="t-arrow" id="tPrev" aria-label="Previous testimonial"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="t-dots" id="tDots">
                        <span class="t-dot active" data-index="0"></span>
                        <span class="t-dot" data-index="1"></span>
                        <span class="t-dot" data-index="2"></span>
                    </div>
                    <button class="t-arrow" id="tNext" aria-label="Next testimonial"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ CONTACT ============ -->
    <section id="contact">
        <div class="container">
            <div class="section-head reveal">
                <div class="eyebrow">Get In Touch</div>
                <h2 class="section-title">Let's Build Something <span class="gradient-text">Great</span></h2>
                <p class="section-sub">Have a project in mind or a role to discuss? I'd love to hear from you.</p>
            </div>

            <div class="contact-grid">
                <div class="contact-info reveal">
                    <div class="contact-info-card glass">
                        <h3>Contact Information</h3>
                        <p>Reach out directly, or use the form &mdash; I try to respond within a business day.</p>
                        <div class="contact-methods">
                            <a href="mailto:mrm.khan.1298@gmail.com" class="contact-method">
                                <span class="cm-icon"><i class="fa-solid fa-envelope"></i></span>
                                <span><small>Email</small>mrm.khan.1298@gmail.com</span>
                            </a>
                            <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" class="contact-method">
                                <span class="cm-icon"><i class="fa-brands fa-github"></i></span>
                                <span><small>GitHub</small>github.com/mestiaque</span>
                            </a>
                            <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" class="contact-method">
                                <span class="cm-icon"><i class="fa-brands fa-linkedin-in"></i></span>
                                <span><small>LinkedIn</small>linkedin.com/in/mestiaque</span>
                            </a>
                        </div>
                        <div class="availability-badge">
                            <span class="dot" style="width:7px;height:7px;border-radius:50%;background:#34d399;display:inline-block;"></span>
                            Open to full-time &amp; contract roles
                        </div>
                    </div>
                </div>

                <div class="contact-form-card glass reveal">
                    <div class="form-status" id="formStatus" role="status" aria-live="polite"></div>
                    <form id="contactForm" novalidate>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="cf-name">Full Name</label>
                                <input type="text" id="cf-name" name="name" placeholder="Your name" required autocomplete="name" />
                            </div>
                            <div class="form-group">
                                <label for="cf-email">Email Address</label>
                                <input type="email" id="cf-email" name="email" placeholder="you@example.com" required autocomplete="email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cf-subject">Subject</label>
                            <input type="text" id="cf-subject" name="subject" placeholder="What's this about?" required />
                        </div>
                        <div class="form-group">
                            <label for="cf-message">Message</label>
                            <textarea id="cf-message" name="message" placeholder="Tell me a bit about the project or role..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary submit-btn" id="submitBtn">
                            <i class="fa-solid fa-circle-notch"></i>
                            <span class="btn-text"><i class="fa-regular fa-paper-plane"></i> Send Message</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- ============ FOOTER ============ -->
<footer>
    <div class="container">
        <div class="footer-glass glass">
            <div class="footer-brand">
                <a href="#home" class="logo">
                    <span class="logo-mark">EK</span>
                    <span>Estiaque Khan</span>
                </a>
                <p>Full-stack Laravel developer crafting robust web applications, ERP automation and premium user experiences.</p>
            </div>
            <ul class="footer-links">
                <li><a href="#services">Services</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#experience">Experience</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="footer-social">
                <a href="mailto:mrm.khan.1298@gmail.com" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
                <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
                <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; <span id="year"></span> M. Estiaque Ahmed Khan. All rights reserved.</span>
            <span>Designed &amp; built with the glassmorphism aesthetic.</span>
        </div>
    </div>
</footer>

<button class="back-to-top" id="backToTop" aria-label="Back to top">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<script>
(function () {
    'use strict';

    /* ============================================================
       MOUSE SPOTLIGHT EFFECT
    ============================================================ */
    var spotlight = document.getElementById('spotlight');
    var mouseX = window.innerWidth / 2;
    var mouseY = window.innerHeight / 3;
    var ticking = false;

    function applySpotlight() {
        spotlight.style.setProperty('--mx', mouseX + 'px');
        spotlight.style.setProperty('--my', mouseY + 'px');
        document.documentElement.style.setProperty('--mx', mouseX + 'px');
        document.documentElement.style.setProperty('--my', mouseY + 'px');
        ticking = false;
    }

    window.addEventListener('mousemove', function (e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
        if (!ticking) {
            window.requestAnimationFrame(applySpotlight);
            ticking = true;
        }
    }, { passive: true });

    /* ============================================================
       NAVBAR SCROLL STATE + ACTIVE LINK TRACKING
    ============================================================ */
    var navbar = document.getElementById('navbar');
    var backToTop = document.getElementById('backToTop');

    function onScroll() {
        if (window.scrollY > 40) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        if (window.scrollY > 500) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    backToTop.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    /* ============================================================
       MOBILE NAVIGATION TOGGLE
    ============================================================ */
    var navToggle = document.getElementById('navToggle');
    var navToggleIcon = document.getElementById('navToggleIcon');
    var mobileNav = document.getElementById('mobileNav');

    function closeMobileNav() {
        mobileNav.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
        navToggleIcon.classList.remove('fa-xmark');
        navToggleIcon.classList.add('fa-bars');
        document.body.style.overflow = '';
    }

    navToggle.addEventListener('click', function () {
        var isOpen = mobileNav.classList.toggle('open');
        navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        navToggleIcon.classList.toggle('fa-bars', !isOpen);
        navToggleIcon.classList.toggle('fa-xmark', isOpen);
        document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    document.querySelectorAll('.mobile-link').forEach(function (link) {
        link.addEventListener('click', closeMobileNav);
    });

    /* ============================================================
       ACTIVE NAV LINK ON SCROLL (IntersectionObserver)
    ============================================================ */
    var navLinkEls = document.querySelectorAll('.nav-link');
    var sections = document.querySelectorAll('main section[id]');

    var navObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var id = entry.target.getAttribute('id');
                navLinkEls.forEach(function (link) {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                });
            }
        });
    }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });

    sections.forEach(function (sec) { navObserver.observe(sec); });

    /* ============================================================
       SCROLL REVEAL ANIMATIONS
    ============================================================ */
    var revealEls = document.querySelectorAll('.reveal, .reveal-scale');
    var revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry, idx) {
            if (entry.isIntersecting) {
                setTimeout(function () {
                    entry.target.classList.add('in-view');
                }, (idx % 6) * 90);
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

    revealEls.forEach(function (el) { revealObserver.observe(el); });

    /* ============================================================
       ANIMATED SKILL BARS
    ============================================================ */
    var skillFills = document.querySelectorAll('.skill-bar-fill');
    var skillObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var pct = entry.target.getAttribute('data-percent') || 0;
                entry.target.style.width = pct + '%';
                skillObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.4 });

    skillFills.forEach(function (el) { skillObserver.observe(el); });

    /* ============================================================
       ANIMATED STAT COUNTERS
    ============================================================ */
    var statEls = document.querySelectorAll('.stat-num[data-count]');
    var statObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var target = parseInt(entry.target.getAttribute('data-count'), 10) || 0;
                var current = 0;
                var duration = 1200;
                var startTime = null;

                function step(ts) {
                    if (!startTime) startTime = ts;
                    var progress = Math.min((ts - startTime) / duration, 1);
                    current = Math.floor(progress * target);
                    entry.target.textContent = current + (progress >= 1 ? '+' : '');
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                }
                window.requestAnimationFrame(step);
                statObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.6 });

    statEls.forEach(function (el) { statObserver.observe(el); });

    /* ============================================================
       TESTIMONIALS SLIDER
    ============================================================ */
    var track = document.getElementById('testimonialTrack');
    var slides = document.querySelectorAll('.testimonial-slide');
    var dots = document.querySelectorAll('.t-dot');
    var prevBtn = document.getElementById('tPrev');
    var nextBtn = document.getElementById('tNext');
    var currentSlide = 0;
    var slideCount = slides.length;
    var autoplayTimer = null;

    function goToSlide(index) {
        currentSlide = (index + slideCount) % slideCount;
        track.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';
        dots.forEach(function (dot, i) {
            dot.classList.toggle('active', i === currentSlide);
        });
    }

    function startAutoplay() {
        stopAutoplay();
        autoplayTimer = setInterval(function () { goToSlide(currentSlide + 1); }, 6000);
    }
    function stopAutoplay() {
        if (autoplayTimer) clearInterval(autoplayTimer);
    }

    if (prevBtn && nextBtn && track) {
        prevBtn.addEventListener('click', function () { goToSlide(currentSlide - 1); startAutoplay(); });
        nextBtn.addEventListener('click', function () { goToSlide(currentSlide + 1); startAutoplay(); });
        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                goToSlide(parseInt(dot.getAttribute('data-index'), 10));
                startAutoplay();
            });
        });

        var slideWrap = document.querySelector('.testimonial-track-wrap');
        slideWrap.addEventListener('mouseenter', stopAutoplay);
        slideWrap.addEventListener('mouseleave', startAutoplay);

        startAutoplay();
    }

    /* ============================================================
       CONTACT FORM SUBMISSION
    ============================================================ */
    var contactForm = document.getElementById('contactForm');
    var formStatus = document.getElementById('formStatus');
    var submitBtn = document.getElementById('submitBtn');

    function showStatus(type, message) {
        formStatus.className = 'form-status show ' + type;
        formStatus.innerHTML = '<i class="fa-solid ' + (type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation') + '"></i> ' + message;
    }

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            var name = document.getElementById('cf-name').value.trim();
            var email = document.getElementById('cf-email').value.trim();
            var subject = document.getElementById('cf-subject').value.trim();
            var message = document.getElementById('cf-message').value.trim();

            if (!name || !email || !subject || !message) {
                showStatus('error', 'Please fill in all fields before sending.');
                return;
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                showStatus('error', 'Please enter a valid email address.');
                return;
            }

            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            formStatus.classList.remove('show');

            fetch('/api/messages-store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ name: name, email: email, subject: subject, message: message })
            })
            .then(function (response) {
                if (!response.ok) { throw new Error('Request failed with status ' + response.status); }
                return response.json().catch(function () { return {}; });
            })
            .then(function () {
                showStatus('success', 'Message sent successfully! I will get back to you soon.');
                contactForm.reset();
            })
            .catch(function () {
                showStatus('error', 'Something went wrong while sending your message. Please try again or email me directly.');
            })
            .finally(function () {
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
            });
        });
    }

    /* ============================================================
       FOOTER YEAR
    ============================================================ */
    var yearEl = document.getElementById('year');
    if (yearEl) { yearEl.textContent = new Date().getFullYear(); }

    /* ============================================================
       GSAP HERO ENTRANCE + MAGNETIC BUTTONS (progressive enhancement)
    ============================================================ */
    if (typeof gsap !== 'undefined') {
        gsap.set('[data-gsap="fade"]', { opacity: 0, y: 24 });
        gsap.to('[data-gsap="fade"]', {
            opacity: 1,
            y: 0,
            duration: 0.9,
            ease: 'power3.out',
            stagger: 0.12,
            delay: 0.15
        });

        gsap.from('.hero-visual', {
            opacity: 0,
            scale: 0.85,
            duration: 1.1,
            ease: 'power3.out',
            delay: 0.25
        });

        document.querySelectorAll('.btn-primary, .btn-ghost').forEach(function (btn) {
            btn.addEventListener('mousemove', function (e) {
                var rect = btn.getBoundingClientRect();
                var relX = e.clientX - rect.left - rect.width / 2;
                var relY = e.clientY - rect.top - rect.height / 2;
                gsap.to(btn, { x: relX * 0.18, y: relY * 0.35, duration: 0.4, ease: 'power2.out' });
            });
            btn.addEventListener('mouseleave', function () {
                gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'elastic.out(1, 0.4)' });
            });
        });
    }

})();
</script>
</body>
</html>
