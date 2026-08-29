<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio | Creative Developer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            cyber: {
              bg:     '#0b0f19',
              card:   '#111827',
              accent: '#00f5ff',
              pink:   '#f0abfc',
              purple: '#a855f7',
              glow:   '#6366f1',
            }
          },
          fontFamily: {
            mono: ['"JetBrains Mono"', 'monospace'],
            sans: ['"Inter"', 'sans-serif'],
          },
          animation: {
            'fade-up':     'fadeUp 0.8s ease forwards',
            'pulse-slow':  'pulse 3s ease-in-out infinite',
            'spin-slow':   'spin 8s linear infinite',
            'glow-ping':   'glowPing 2s ease-in-out infinite',
            'text-shimmer':'textShimmer 3s linear infinite',
            'float':       'float 6s ease-in-out infinite',
          },
          keyframes: {
            fadeUp: {
              '0%':   { opacity: 0, transform: 'translateY(30px)' },
              '100%': { opacity: 1, transform: 'translateY(0)' },
            },
            glowPing: {
              '0%,100%': { boxShadow: '0 0 5px #00f5ff, 0 0 10px #00f5ff' },
              '50%':     { boxShadow: '0 0 20px #00f5ff, 0 0 40px #00f5ff55' },
            },
            textShimmer: {
              '0%':   { backgroundPosition: '0% 50%' },
              '100%': { backgroundPosition: '200% 50%' },
            },
            float: {
              '0%,100%': { transform: 'translateY(0px)' },
              '50%':     { transform: 'translateY(-12px)' },
            },
          },
          backdropBlur: { xs: '2px' },
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --accent:  #00f5ff;
      --pink:    #f0abfc;
      --purple:  #a855f7;
      --glow:    #6366f1;
      --bg:      #0b0f19;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; scroll-behavior: smooth; }

    body {
      background: var(--bg);
      color: #e2e8f0;
      font-family: 'Inter', sans-serif;
      overflow-x: hidden;
    }

    /* ── Three.js Canvas ── */
    #bg-canvas {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: 0;
      pointer-events: none;
    }

    /* ── Glassmorphic card ── */
    .glass {
      background: rgba(255,255,255,0.04);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 1rem;
    }

    /* ── Glow border on hover ── */
    .glass-hover {
      transition: border-color 0.3s, box-shadow 0.3s, transform 0.3s;
    }
    .glass-hover:hover {
      border-color: rgba(0,245,255,0.35);
      box-shadow: 0 0 24px rgba(0,245,255,0.12), 0 8px 32px rgba(0,0,0,0.4);
      transform: translateY(-4px);
    }

    /* ── Gradient text ── */
    .grad-text {
      background: linear-gradient(135deg, var(--accent) 0%, var(--purple) 50%, var(--pink) 100%);
      background-size: 200% auto;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: textShimmer 4s linear infinite;
    }

    /* ── Neon button ── */
    .neon-btn {
      position: relative;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.6rem 1.6rem;
      border-radius: 0.5rem;
      font-weight: 600;
      font-size: 0.875rem;
      letter-spacing: 0.05em;
      border: 1px solid var(--accent);
      color: var(--accent);
      background: rgba(0,245,255,0.06);
      transition: all 0.3s;
      cursor: pointer;
      text-decoration: none;
    }
    .neon-btn:hover {
      background: rgba(0,245,255,0.16);
      box-shadow: 0 0 18px rgba(0,245,255,0.4);
      color: #fff;
    }
    .neon-btn.pink {
      border-color: var(--pink);
      color: var(--pink);
      background: rgba(240,171,252,0.06);
    }
    .neon-btn.pink:hover {
      background: rgba(240,171,252,0.14);
      box-shadow: 0 0 18px rgba(240,171,252,0.35);
    }

    /* ── Progress bar ── */
    .progress-track {
      height: 5px;
      background: rgba(255,255,255,0.08);
      border-radius: 999px;
      overflow: hidden;
    }
    .progress-fill {
      height: 100%;
      border-radius: 999px;
      background: linear-gradient(90deg, var(--glow), var(--accent));
      box-shadow: 0 0 8px var(--accent);
      transition: width 1.4s cubic-bezier(0.4,0,0.2,1);
      width: 0%;
    }

    /* ── Timeline ── */
    .timeline-line {
      position: absolute;
      left: 18px; top: 0; bottom: 0;
      width: 2px;
      background: linear-gradient(180deg, var(--accent), transparent);
    }
    .timeline-dot {
      width: 12px; height: 12px;
      border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 8px var(--accent);
      flex-shrink: 0;
      margin-top: 5px;
    }

    /* ── Section wrapper ── */
    .section {
      position: relative;
      z-index: 10;
      padding: 5rem 0;
    }

    /* ── Navbar ── */
    .navbar {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      background: rgba(11,15,25,0.75);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    /* ── Typing cursor ── */
    .cursor::after {
      content: '|';
      animation: blink 0.9s step-end infinite;
      color: var(--accent);
    }
    @keyframes blink { 50% { opacity: 0; } }

    /* ── Social icon ── */
    .social-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px; height: 40px;
      border-radius: 50%;
      border: 1px solid rgba(255,255,255,0.15);
      background: rgba(255,255,255,0.04);
      color: #94a3b8;
      transition: all 0.3s;
      font-size: 0.85rem;
      font-weight: 700;
      text-decoration: none;
    }
    .social-link:hover {
      border-color: var(--accent);
      color: var(--accent);
      box-shadow: 0 0 12px rgba(0,245,255,0.3);
    }

    /* ── Skill badge ── */
    .skill-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 14px;
      border-radius: 999px;
      font-size: 0.78rem;
      font-weight: 600;
      letter-spacing: 0.04em;
      border: 1px solid rgba(99,102,241,0.35);
      background: rgba(99,102,241,0.1);
      color: #c7d2fe;
      transition: all 0.25s;
    }
    .skill-badge:hover {
      border-color: var(--glow);
      background: rgba(99,102,241,0.2);
      box-shadow: 0 0 10px rgba(99,102,241,0.3);
    }

    /* ── Project card ── */
    .project-card {
      overflow: hidden;
      transition: transform 0.35s cubic-bezier(0.4,0,0.2,1), box-shadow 0.35s;
    }
    .project-card:hover {
      transform: translateY(-6px) scale(1.015);
      box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 0 30px rgba(0,245,255,0.08);
    }
    .project-card .card-img {
      position: relative;
      overflow: hidden;
      height: 180px;
    }
    .project-card .card-img img {
      width: 100%; height: 100%;
      object-fit: cover;
      transition: transform 0.5s;
      filter: brightness(0.75) saturate(0.8);
    }
    .project-card:hover .card-img img {
      transform: scale(1.08);
      filter: brightness(0.9) saturate(1.1);
    }
    .project-card .card-img-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(11,15,25,0.8) 0%, transparent 60%);
    }

    /* ── Form inputs ── */
    .form-input {
      width: 100%;
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      color: #e2e8f0;
      font-family: 'Inter', sans-serif;
      font-size: 0.9rem;
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
    }
    .form-input:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(0,245,255,0.12);
    }
    .form-input::placeholder { color: #475569; }

    /* ── Toast ── */
    #toast {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      z-index: 9999;
      padding: 1rem 1.5rem;
      border-radius: 0.75rem;
      background: rgba(11,15,25,0.95);
      border: 1px solid var(--accent);
      box-shadow: 0 0 30px rgba(0,245,255,0.25), 0 8px 32px rgba(0,0,0,0.6);
      backdrop-filter: blur(16px);
      display: flex;
      align-items: center;
      gap: 0.75rem;
      transform: translateY(120%);
      opacity: 0;
      transition: all 0.5s cubic-bezier(0.4,0,0.2,1);
      max-width: 340px;
    }
    #toast.show {
      transform: translateY(0);
      opacity: 1;
    }

    /* ── Section heading ── */
    .section-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.75rem;
      color: var(--accent);
      letter-spacing: 0.15em;
      text-transform: uppercase;
    }

    /* ── Scrollbar ── */
    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: var(--glow); border-radius: 999px; }

    /* ── Reveal on scroll ── */
    .reveal { opacity: 0; transform: translateY(40px); transition: opacity 0.7s ease, transform 0.7s ease; }
    .reveal.visible { opacity: 1; transform: translateY(0); }
  </style>
</head>
<body>

<!-- ════════════════════════════════════════
     THREE.JS CANVAS
════════════════════════════════════════ -->
<canvas id="bg-canvas"></canvas>

<!-- ════════════════════════════════════════
     NAVBAR
════════════════════════════════════════ -->
<nav class="navbar">
  <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
    <span class="font-mono text-sm font-bold grad-text">&lt;YourName /&gt;</span>
    <ul class="hidden md:flex items-center gap-8 text-sm text-slate-400 font-medium">
      <li><a href="#hero"       class="hover:text-cyan-400 transition-colors">Home</a></li>
      <li><a href="#about"      class="hover:text-cyan-400 transition-colors">About</a></li>
      <li><a href="#experience" class="hover:text-cyan-400 transition-colors">Experience</a></li>
      <li><a href="#skills"     class="hover:text-cyan-400 transition-colors">Skills</a></li>
      <li><a href="#projects"   class="hover:text-cyan-400 transition-colors">Projects</a></li>
      <li><a href="#contact"    class="neon-btn" style="padding:0.4rem 1rem;">Contact</a></li>
    </ul>
    <!-- Mobile menu toggle -->
    <button id="menu-btn" class="md:hidden text-slate-400 focus:outline-none">
      <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>
  <!-- Mobile nav -->
  <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 flex flex-col gap-3 text-sm text-slate-400">
    <a href="#hero"       class="hover:text-cyan-400 transition-colors">Home</a>
    <a href="#about"      class="hover:text-cyan-400 transition-colors">About</a>
    <a href="#experience" class="hover:text-cyan-400 transition-colors">Experience</a>
    <a href="#skills"     class="hover:text-cyan-400 transition-colors">Skills</a>
    <a href="#projects"   class="hover:text-cyan-400 transition-colors">Projects</a>
    <a href="#contact"    class="hover:text-cyan-400 transition-colors">Contact</a>
  </div>
</nav>

<!-- ════════════════════════════════════════
     HERO SECTION
════════════════════════════════════════ -->
<section id="hero" class="section min-h-screen flex items-center justify-center pt-16">
  <div class="max-w-7xl mx-auto px-6 w-full">
    <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-16">

      <!-- Left: Text -->
      <div class="flex-1 max-w-2xl">
        <p class="section-tag mb-4 reveal">Hello, World! 👋</p>

        <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight mb-4 reveal" style="animation-delay:0.1s">
          I'm <span class="grad-text">Your Name</span>
        </h1>

        <h2 class="text-xl lg:text-2xl font-mono text-slate-400 mb-6 reveal" style="animation-delay:0.2s">
          <span id="typed-text" class="cursor text-purple-400"></span>
        </h2>

        <p class="text-slate-400 leading-relaxed mb-8 text-base max-w-lg reveal" style="animation-delay:0.3s">
          I craft immersive digital experiences — from interactive 3D web scenes to pixel-perfect UIs.
          Passionate about the intersection of code, creativity, and performance.
        </p>

        <!-- CTA buttons -->
        <div class="flex flex-wrap gap-4 mb-10 reveal" style="animation-delay:0.4s">
          <a href="#projects" class="neon-btn">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            View Projects
          </a>
          <a href="#contact" class="neon-btn pink">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Hire Me
          </a>
        </div>

        <!-- Social links -->
        <div class="flex items-center gap-4 reveal" style="animation-delay:0.5s">
          <a href="https://github.com" target="_blank" class="social-link" title="GitHub">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
          </a>
          <a href="https://linkedin.com" target="_blank" class="social-link" title="LinkedIn">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </a>
          <a href="https://twitter.com" target="_blank" class="social-link" title="Twitter / X">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <span class="w-8 h-px bg-slate-700"></span>
          <span class="text-xs text-slate-600 font-mono">Available for hire</span>
          <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-slow"></span>
        </div>
      </div>

      <!-- Right: Profile Image -->
      <div class="flex-shrink-0 reveal" style="animation-delay:0.25s">
        <div class="relative" style="animation: float 6s ease-in-out infinite;">
          <!-- Glow ring -->
          <div class="absolute inset-0 rounded-full bg-gradient-to-br from-cyan-400 via-purple-500 to-pink-400 blur-2xl opacity-25 scale-110"></div>
          <!-- Ring border -->
          <div class="relative w-52 h-52 lg:w-64 lg:h-64 rounded-full p-1 bg-gradient-to-br from-cyan-400 via-purple-500 to-pink-400">
            <div class="w-full h-full rounded-full overflow-hidden border-4 border-[#0b0f19]">
              <!-- REPLACE src with your actual photo URL -->
              <img
                src="https://placehold.co/256x256/111827/00f5ff?text=Your\nPhoto"
                alt="Profile"
                class="w-full h-full object-cover"
                onerror="this.src='https://placehold.co/256x256/111827/a855f7?text=Photo'"
              />
            </div>
          </div>
          <!-- Corner decorations -->
          <div class="absolute -top-3 -right-3 w-6 h-6 rounded-full bg-cyan-400 opacity-70 animate-pulse-slow"></div>
          <div class="absolute -bottom-2 -left-2 w-4 h-4 rounded-full bg-purple-500 opacity-70 animate-pulse-slow" style="animation-delay:1s"></div>
        </div>
      </div>
    </div>

    <!-- Scroll cue -->
    <div class="flex justify-center mt-16">
      <div class="flex flex-col items-center gap-2 animate-bounce">
        <span class="text-xs text-slate-600 font-mono">scroll</span>
        <svg width="20" height="20" fill="none" stroke="#00f5ff" stroke-width="2" viewBox="0 0 24 24" opacity="0.4"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     ABOUT & EDUCATION SECTION
════════════════════════════════════════ -->
<section id="about" class="section">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16 reveal">
      <p class="section-tag mb-3">Get to know me</p>
      <h2 class="text-4xl font-extrabold text-white mb-4">About <span class="grad-text">Me</span></h2>
      <p class="text-slate-400 max-w-xl mx-auto text-sm">A brief introduction and my academic journey</p>
    </div>

    <div class="grid lg:grid-cols-2 gap-12 items-start">

      <!-- About card -->
      <div class="glass glass-hover p-8 reveal">
        <div class="flex items-center gap-3 mb-6">
          <div class="w-10 h-10 rounded-lg bg-cyan-400/10 border border-cyan-400/25 flex items-center justify-center">
            <svg width="20" height="20" fill="none" stroke="#00f5ff" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
          </div>
          <h3 class="text-lg font-bold text-white">Who Am I?</h3>
        </div>
        <p class="text-slate-400 leading-relaxed text-sm mb-4">
          I'm a <span class="text-cyan-400 font-semibold">Creative Developer</span> with a passion for building
          digital products that live at the intersection of design and technology. I specialize in
          interactive 3D web experiences, modern frontend architectures, and full-stack development.
        </p>
        <p class="text-slate-400 leading-relaxed text-sm mb-6">
          When I'm not writing code, you'll find me exploring generative art, contributing to open-source
          projects, or experimenting with the latest WebGL shaders.
        </p>
        <div class="grid grid-cols-2 gap-4">
          <div class="glass p-4 rounded-lg">
            <p class="text-2xl font-extrabold grad-text">3+</p>
            <p class="text-xs text-slate-500 mt-1">Years Experience</p>
          </div>
          <div class="glass p-4 rounded-lg">
            <p class="text-2xl font-extrabold grad-text">20+</p>
            <p class="text-xs text-slate-500 mt-1">Projects Shipped</p>
          </div>
          <div class="glass p-4 rounded-lg">
            <p class="text-2xl font-extrabold grad-text">15+</p>
            <p class="text-xs text-slate-500 mt-1">Happy Clients</p>
          </div>
          <div class="glass p-4 rounded-lg">
            <p class="text-2xl font-extrabold grad-text">5★</p>
            <p class="text-xs text-slate-500 mt-1">Average Rating</p>
          </div>
        </div>
      </div>

      <!-- Education Timeline -->
      <div class="reveal">
        <div class="flex items-center gap-3 mb-8">
          <div class="w-10 h-10 rounded-lg bg-purple-400/10 border border-purple-400/25 flex items-center justify-center">
            <svg width="20" height="20" fill="none" stroke="#a855f7" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0-6l-6.5 3.5M12 20l6.5-3.5"/></svg>
          </div>
          <h3 class="text-lg font-bold text-white">Education</h3>
        </div>

        <div class="relative pl-10">
          <div class="timeline-line"></div>

          <!-- Entry 1 -->
          <div class="relative mb-8 glass glass-hover p-5">
            <div class="timeline-dot absolute -left-[34px] top-5"></div>
            <div class="flex items-start justify-between gap-4 flex-wrap">
              <div>
                <h4 class="font-bold text-white text-sm">B.Sc. in Computer Science & Engineering</h4>
                <p class="text-cyan-400 text-xs font-mono mt-1">University of Technology</p>
              </div>
              <span class="text-xs font-mono px-3 py-1 rounded-full bg-cyan-400/10 text-cyan-400 border border-cyan-400/20 whitespace-nowrap">2019 – 2023</span>
            </div>
            <p class="text-slate-500 text-xs mt-2 leading-relaxed">
              CGPA: 3.85/4.00 · Specialized in Software Engineering & Machine Learning
            </p>
          </div>

          <!-- Entry 2 -->
          <div class="relative mb-8 glass glass-hover p-5">
            <div class="timeline-dot absolute -left-[34px] top-5"></div>
            <div class="flex items-start justify-between gap-4 flex-wrap">
              <div>
                <h4 class="font-bold text-white text-sm">Higher Secondary Certificate (HSC)</h4>
                <p class="text-purple-400 text-xs font-mono mt-1">Dhaka City College</p>
              </div>
              <span class="text-xs font-mono px-3 py-1 rounded-full bg-purple-400/10 text-purple-400 border border-purple-400/20 whitespace-nowrap">2017 – 2019</span>
            </div>
            <p class="text-slate-500 text-xs mt-2">GPA: 5.00/5.00 · Science Group</p>
          </div>

          <!-- Entry 3 -->
          <div class="relative glass glass-hover p-5">
            <div class="timeline-dot absolute -left-[34px] top-5" style="background:var(--pink);box-shadow:0 0 8px var(--pink)"></div>
            <div class="flex items-start justify-between gap-4 flex-wrap">
              <div>
                <h4 class="font-bold text-white text-sm">Secondary School Certificate (SSC)</h4>
                <p class="text-pink-400 text-xs font-mono mt-1">Motijheel Model High School</p>
              </div>
              <span class="text-xs font-mono px-3 py-1 rounded-full bg-pink-400/10 text-pink-400 border border-pink-400/20 whitespace-nowrap">2015 – 2017</span>
            </div>
            <p class="text-slate-500 text-xs mt-2">GPA: 5.00/5.00 · Science Group</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     JOB EXPERIENCE SECTION
════════════════════════════════════════ -->
<section id="experience" class="section">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16 reveal">
      <p class="section-tag mb-3">Career Path</p>
      <h2 class="text-4xl font-extrabold text-white mb-4">Work <span class="grad-text">Experience</span></h2>
      <p class="text-slate-400 max-w-xl mx-auto text-sm">Roles I've held and the impact I've made</p>
    </div>

    <div class="relative pl-8 max-w-3xl mx-auto">
      <div class="timeline-line"></div>

      <!-- Job 1 -->
      <div class="relative mb-10 reveal">
        <div class="timeline-dot absolute -left-[22px] top-6"></div>
        <div class="glass glass-hover p-7">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <div>
              <h3 class="text-lg font-bold text-white">Senior Frontend Developer</h3>
              <p class="text-cyan-400 font-mono text-sm mt-0.5">TechNova Solutions Ltd.</p>
            </div>
            <span class="text-xs font-mono px-3 py-1.5 rounded-full bg-cyan-400/10 text-cyan-400 border border-cyan-400/20 self-start sm:self-auto whitespace-nowrap">Jan 2023 – Present</span>
          </div>
          <ul class="space-y-2">
            <li class="flex gap-3 text-sm text-slate-400">
              <span class="text-cyan-400 mt-0.5 flex-shrink-0">▸</span>
              Architected and delivered a real-time 3D data visualization dashboard using Three.js and React, reducing decision-making time for analytics teams by 40%.
            </li>
            <li class="flex gap-3 text-sm text-slate-400">
              <span class="text-cyan-400 mt-0.5 flex-shrink-0">▸</span>
              Led migration of legacy jQuery codebase to modern React 18 + TypeScript stack, cutting bundle size by 55% and improving Lighthouse performance score from 62 to 97.
            </li>
            <li class="flex gap-3 text-sm text-slate-400">
              <span class="text-cyan-400 mt-0.5 flex-shrink-0">▸</span>
              Mentored a team of 5 junior developers, introduced component-driven design system that accelerated feature delivery by 30%.
            </li>
          </ul>
          <div class="flex flex-wrap gap-2 mt-5">
            <span class="skill-badge">React</span>
            <span class="skill-badge">Three.js</span>
            <span class="skill-badge">TypeScript</span>
            <span class="skill-badge">Node.js</span>
          </div>
        </div>
      </div>

      <!-- Job 2 -->
      <div class="relative mb-10 reveal">
        <div class="timeline-dot absolute -left-[22px] top-6" style="background:var(--purple);box-shadow:0 0 8px var(--purple)"></div>
        <div class="glass glass-hover p-7">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <div>
              <h3 class="text-lg font-bold text-white">Full-Stack Developer</h3>
              <p class="text-purple-400 font-mono text-sm mt-0.5">PixelCraft Agency</p>
            </div>
            <span class="text-xs font-mono px-3 py-1.5 rounded-full bg-purple-400/10 text-purple-400 border border-purple-400/20 self-start sm:self-auto whitespace-nowrap">Jun 2021 – Dec 2022</span>
          </div>
          <ul class="space-y-2">
            <li class="flex gap-3 text-sm text-slate-400">
              <span class="text-purple-400 mt-0.5 flex-shrink-0">▸</span>
              Developed and deployed 12+ client websites with Laravel backends and Vue.js frontends, serving 100k+ monthly active users.
            </li>
            <li class="flex gap-3 text-sm text-slate-400">
              <span class="text-purple-400 mt-0.5 flex-shrink-0">▸</span>
              Implemented RESTful APIs and GraphQL endpoints integrated with PostgreSQL, optimizing complex queries that cut response time by 60%.
            </li>
            <li class="flex gap-3 text-sm text-slate-400">
              <span class="text-purple-400 mt-0.5 flex-shrink-0">▸</span>
              Designed CI/CD pipelines using GitHub Actions and Docker, reducing manual deployment effort by 80%.
            </li>
          </ul>
          <div class="flex flex-wrap gap-2 mt-5">
            <span class="skill-badge">Laravel</span>
            <span class="skill-badge">Vue.js</span>
            <span class="skill-badge">PostgreSQL</span>
            <span class="skill-badge">Docker</span>
          </div>
        </div>
      </div>

      <!-- Job 3 -->
      <div class="relative reveal">
        <div class="timeline-dot absolute -left-[22px] top-6" style="background:var(--pink);box-shadow:0 0 8px var(--pink)"></div>
        <div class="glass glass-hover p-7">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <div>
              <h3 class="text-lg font-bold text-white">Frontend Developer Intern</h3>
              <p class="text-pink-400 font-mono text-sm mt-0.5">StartupHub BD</p>
            </div>
            <span class="text-xs font-mono px-3 py-1.5 rounded-full bg-pink-400/10 text-pink-400 border border-pink-400/20 self-start sm:self-auto whitespace-nowrap">Jan 2021 – May 2021</span>
          </div>
          <ul class="space-y-2">
            <li class="flex gap-3 text-sm text-slate-400">
              <span class="text-pink-400 mt-0.5 flex-shrink-0">▸</span>
              Built interactive UI components and landing pages, contributing to a 22% increase in user engagement.
            </li>
            <li class="flex gap-3 text-sm text-slate-400">
              <span class="text-pink-400 mt-0.5 flex-shrink-0">▸</span>
              Collaborated with design team to translate Figma mockups into pixel-perfect, responsive HTML/CSS.
            </li>
          </ul>
          <div class="flex flex-wrap gap-2 mt-5">
            <span class="skill-badge">HTML/CSS</span>
            <span class="skill-badge">JavaScript</span>
            <span class="skill-badge">Figma</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     TOOLS & SKILLS SECTION
════════════════════════════════════════ -->
<section id="skills" class="section">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16 reveal">
      <p class="section-tag mb-3">My Toolkit</p>
      <h2 class="text-4xl font-extrabold text-white mb-4">Tools & <span class="grad-text">Skills</span></h2>
      <p class="text-slate-400 max-w-xl mx-auto text-sm">Technologies I work with daily</p>
    </div>

    <div class="grid lg:grid-cols-2 gap-10">

      <!-- Skill bars -->
      <div class="glass p-8 reveal">
        <h3 class="font-bold text-white text-sm mb-7 flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
          Core Proficiency
        </h3>
        <div class="space-y-6" id="skill-bars">
          <div data-pct="95">
            <div class="flex justify-between text-xs text-slate-400 mb-2"><span>JavaScript / TypeScript</span><span class="text-cyan-400 font-mono">95%</span></div>
            <div class="progress-track"><div class="progress-fill"></div></div>
          </div>
          <div data-pct="90">
            <div class="flex justify-between text-xs text-slate-400 mb-2"><span>React / Next.js</span><span class="text-cyan-400 font-mono">90%</span></div>
            <div class="progress-track"><div class="progress-fill"></div></div>
          </div>
          <div data-pct="85">
            <div class="flex justify-between text-xs text-slate-400 mb-2"><span>Three.js / WebGL</span><span class="text-cyan-400 font-mono">85%</span></div>
            <div class="progress-track"><div class="progress-fill"></div></div>
          </div>
          <div data-pct="80">
            <div class="flex justify-between text-xs text-slate-400 mb-2"><span>Node.js / Express</span><span class="text-cyan-400 font-mono">80%</span></div>
            <div class="progress-track"><div class="progress-fill"></div></div>
          </div>
          <div data-pct="75">
            <div class="flex justify-between text-xs text-slate-400 mb-2"><span>Python / Django</span><span class="text-cyan-400 font-mono">75%</span></div>
            <div class="progress-track"><div class="progress-fill"></div></div>
          </div>
          <div data-pct="88">
            <div class="flex justify-between text-xs text-slate-400 mb-2"><span>Laravel / PHP</span><span class="text-cyan-400 font-mono">88%</span></div>
            <div class="progress-track"><div class="progress-fill"></div></div>
          </div>
        </div>
      </div>

      <!-- Badge grid -->
      <div class="reveal">
        <div class="glass p-8 mb-6">
          <h3 class="font-bold text-white text-sm mb-6 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-purple-400"></span>
            Frontend & UI
          </h3>
          <div class="flex flex-wrap gap-3">
            <span class="skill-badge">⚛️ React</span>
            <span class="skill-badge">▲ Next.js</span>
            <span class="skill-badge">💚 Vue.js</span>
            <span class="skill-badge">🌊 Tailwind CSS</span>
            <span class="skill-badge">🎨 GSAP</span>
            <span class="skill-badge">🔷 Three.js</span>
            <span class="skill-badge">✨ Framer Motion</span>
            <span class="skill-badge">📐 Figma</span>
          </div>
        </div>
        <div class="glass p-8">
          <h3 class="font-bold text-white text-sm mb-6 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-pink-400"></span>
            Backend & DevOps
          </h3>
          <div class="flex flex-wrap gap-3">
            <span class="skill-badge">🟢 Node.js</span>
            <span class="skill-badge">🐘 PostgreSQL</span>
            <span class="skill-badge">🍃 MongoDB</span>
            <span class="skill-badge">🐳 Docker</span>
            <span class="skill-badge">⚙️ GitHub Actions</span>
            <span class="skill-badge">☁️ AWS / GCP</span>
            <span class="skill-badge">🔴 Redis</span>
            <span class="skill-badge">🐙 Git</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     PROJECTS SECTION
════════════════════════════════════════ -->
<section id="projects" class="section">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16 reveal">
      <p class="section-tag mb-3">My Work</p>
      <h2 class="text-4xl font-extrabold text-white mb-4">Featured <span class="grad-text">Projects</span></h2>
      <p class="text-slate-400 max-w-xl mx-auto text-sm">Things I've built that I'm proud of</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">

      <!-- Project Card 1 -->
      <div class="glass project-card reveal">
        <div class="card-img">
          <img src="https://placehold.co/640x360/0d1117/00f5ff?text=3D+Solar+System" alt="3D Solar System" />
          <div class="card-img-overlay"></div>
          <div class="absolute top-3 right-3 flex gap-2">
            <span class="text-xs px-2 py-1 rounded-full bg-cyan-400/20 text-cyan-400 border border-cyan-400/25 font-mono">Three.js</span>
          </div>
        </div>
        <div class="p-6">
          <h3 class="font-bold text-white text-base mb-2">Interactive 3D Solar System</h3>
          <p class="text-slate-500 text-xs leading-relaxed mb-5">
            A real-time WebGL simulation of the solar system with accurate orbital mechanics, hover tooltips, and GSAP-powered camera animations.
          </p>
          <div class="flex flex-wrap gap-2 mb-5">
            <span class="skill-badge text-xs">Three.js</span>
            <span class="skill-badge text-xs">GSAP</span>
            <span class="skill-badge text-xs">WebGL</span>
          </div>
          <div class="flex gap-3">
            <a href="#" class="neon-btn" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
              GitHub
            </a>
            <a href="#" class="neon-btn pink" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              Live Demo
            </a>
          </div>
        </div>
      </div>

      <!-- Project Card 2 -->
      <div class="glass project-card reveal" style="animation-delay:0.1s">
        <div class="card-img">
          <img src="https://placehold.co/640x360/0d1117/a855f7?text=AI+Dashboard" alt="AI Dashboard" />
          <div class="card-img-overlay"></div>
          <div class="absolute top-3 right-3">
            <span class="text-xs px-2 py-1 rounded-full bg-purple-400/20 text-purple-400 border border-purple-400/25 font-mono">React</span>
          </div>
        </div>
        <div class="p-6">
          <h3 class="font-bold text-white text-base mb-2">AI Analytics Dashboard</h3>
          <p class="text-slate-500 text-xs leading-relaxed mb-5">
            A real-time analytics dashboard powered by OpenAI GPT-4 API with live data streaming, custom chart components, and dark mode.
          </p>
          <div class="flex flex-wrap gap-2 mb-5">
            <span class="skill-badge text-xs">React</span>
            <span class="skill-badge text-xs">OpenAI API</span>
            <span class="skill-badge text-xs">Recharts</span>
          </div>
          <div class="flex gap-3">
            <a href="#" class="neon-btn" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
              GitHub
            </a>
            <a href="#" class="neon-btn pink" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              Live Demo
            </a>
          </div>
        </div>
      </div>

      <!-- Project Card 3 -->
      <div class="glass project-card reveal" style="animation-delay:0.2s">
        <div class="card-img">
          <img src="https://placehold.co/640x360/0d1117/f0abfc?text=E-Commerce+App" alt="E-Commerce" />
          <div class="card-img-overlay"></div>
          <div class="absolute top-3 right-3">
            <span class="text-xs px-2 py-1 rounded-full bg-pink-400/20 text-pink-400 border border-pink-400/25 font-mono">Next.js</span>
          </div>
        </div>
        <div class="p-6">
          <h3 class="font-bold text-white text-base mb-2">3D E-Commerce Platform</h3>
          <p class="text-slate-500 text-xs leading-relaxed mb-5">
            Full-stack e-commerce app with 3D product previews, Stripe integration, Next.js App Router, and Prisma ORM on PostgreSQL.
          </p>
          <div class="flex flex-wrap gap-2 mb-5">
            <span class="skill-badge text-xs">Next.js</span>
            <span class="skill-badge text-xs">Stripe</span>
            <span class="skill-badge text-xs">Prisma</span>
          </div>
          <div class="flex gap-3">
            <a href="#" class="neon-btn" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
              GitHub
            </a>
            <a href="#" class="neon-btn pink" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              Live Demo
            </a>
          </div>
        </div>
      </div>

      <!-- Project Card 4 -->
      <div class="glass project-card reveal" style="animation-delay:0.05s">
        <div class="card-img">
          <img src="https://placehold.co/640x360/0d1117/6366f1?text=Chat+Application" alt="Chat App" />
          <div class="card-img-overlay"></div>
          <div class="absolute top-3 right-3">
            <span class="text-xs px-2 py-1 rounded-full bg-indigo-400/20 text-indigo-400 border border-indigo-400/25 font-mono">Socket.io</span>
          </div>
        </div>
        <div class="p-6">
          <h3 class="font-bold text-white text-base mb-2">Real-Time Chat Platform</h3>
          <p class="text-slate-500 text-xs leading-relaxed mb-5">
            WebSocket-powered chat application with rooms, file sharing, read receipts, and end-to-end message encryption.
          </p>
          <div class="flex flex-wrap gap-2 mb-5">
            <span class="skill-badge text-xs">Node.js</span>
            <span class="skill-badge text-xs">Socket.io</span>
            <span class="skill-badge text-xs">MongoDB</span>
          </div>
          <div class="flex gap-3">
            <a href="#" class="neon-btn" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
              GitHub
            </a>
            <a href="#" class="neon-btn pink" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              Live Demo
            </a>
          </div>
        </div>
      </div>

      <!-- Project Card 5 -->
      <div class="glass project-card reveal" style="animation-delay:0.15s">
        <div class="card-img">
          <img src="https://placehold.co/640x360/0d1117/00f5ff?text=Generative+Art" alt="Generative Art" />
          <div class="card-img-overlay"></div>
          <div class="absolute top-3 right-3">
            <span class="text-xs px-2 py-1 rounded-full bg-cyan-400/20 text-cyan-400 border border-cyan-400/25 font-mono">Canvas</span>
          </div>
        </div>
        <div class="p-6">
          <h3 class="font-bold text-white text-base mb-2">Generative Art Studio</h3>
          <p class="text-slate-500 text-xs leading-relaxed mb-5">
            Browser-based generative art tool with algorithm presets, color palette editor, and PNG/SVG export. Built purely with Canvas2D API.
          </p>
          <div class="flex flex-wrap gap-2 mb-5">
            <span class="skill-badge text-xs">Canvas2D</span>
            <span class="skill-badge text-xs">JavaScript</span>
            <span class="skill-badge text-xs">Web Workers</span>
          </div>
          <div class="flex gap-3">
            <a href="#" class="neon-btn" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
              GitHub
            </a>
            <a href="#" class="neon-btn pink" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              Live Demo
            </a>
          </div>
        </div>
      </div>

      <!-- Project Card 6 -->
      <div class="glass project-card reveal" style="animation-delay:0.25s">
        <div class="card-img">
          <img src="https://placehold.co/640x360/0d1117/a855f7?text=DevOps+Pipeline" alt="DevOps" />
          <div class="card-img-overlay"></div>
          <div class="absolute top-3 right-3">
            <span class="text-xs px-2 py-1 rounded-full bg-purple-400/20 text-purple-400 border border-purple-400/25 font-mono">Docker</span>
          </div>
        </div>
        <div class="p-6">
          <h3 class="font-bold text-white text-base mb-2">CI/CD Automation Toolkit</h3>
          <p class="text-slate-500 text-xs leading-relaxed mb-5">
            Open-source CLI toolkit for bootstrapping production-ready GitHub Actions pipelines with Docker, testing, and Slack notifications.
          </p>
          <div class="flex flex-wrap gap-2 mb-5">
            <span class="skill-badge text-xs">Docker</span>
            <span class="skill-badge text-xs">GitHub Actions</span>
            <span class="skill-badge text-xs">Bash</span>
          </div>
          <div class="flex gap-3">
            <a href="#" class="neon-btn" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
              GitHub
            </a>
            <a href="#" class="neon-btn pink" style="font-size:0.75rem;padding:0.4rem 0.9rem;">
              <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              Live Demo
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     CONTACT SECTION
════════════════════════════════════════ -->
<section id="contact" class="section pb-32">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16 reveal">
      <p class="section-tag mb-3">Let's Talk</p>
      <h2 class="text-4xl font-extrabold text-white mb-4">Get In <span class="grad-text">Touch</span></h2>
      <p class="text-slate-400 max-w-xl mx-auto text-sm">Have a project in mind or just want to say hi? Drop me a message.</p>
    </div>

    <div class="grid lg:grid-cols-2 gap-12 max-w-5xl mx-auto">

      <!-- Info column -->
      <div class="space-y-6 reveal">
        <div class="glass glass-hover p-6 flex items-start gap-5">
          <div class="w-11 h-11 rounded-xl bg-cyan-400/10 border border-cyan-400/25 flex items-center justify-center flex-shrink-0">
            <svg width="20" height="20" fill="none" stroke="#00f5ff" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </div>
          <div>
            <p class="text-xs text-slate-500 mb-1">Email</p>
            <p class="text-sm text-white font-semibold">hello@yourname.dev</p>
          </div>
        </div>
        <div class="glass glass-hover p-6 flex items-start gap-5">
          <div class="w-11 h-11 rounded-xl bg-purple-400/10 border border-purple-400/25 flex items-center justify-center flex-shrink-0">
            <svg width="20" height="20" fill="none" stroke="#a855f7" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          </div>
          <div>
            <p class="text-xs text-slate-500 mb-1">Location</p>
            <p class="text-sm text-white font-semibold">Dhaka, Bangladesh</p>
          </div>
        </div>
        <div class="glass glass-hover p-6 flex items-start gap-5">
          <div class="w-11 h-11 rounded-xl bg-pink-400/10 border border-pink-400/25 flex items-center justify-center flex-shrink-0">
            <svg width="20" height="20" fill="none" stroke="#f0abfc" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div>
            <p class="text-xs text-slate-500 mb-1">Response Time</p>
            <p class="text-sm text-white font-semibold">Within 24 hours</p>
          </div>
        </div>

        <!-- Availability notice -->
        <div class="glass p-5 border border-emerald-400/20">
          <div class="flex items-center gap-3">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse-slow flex-shrink-0"></span>
            <p class="text-sm text-slate-300">Currently <span class="text-emerald-400 font-semibold">available</span> for freelance projects and full-time roles.</p>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="glass p-8 reveal" style="animation-delay:0.15s">
        <form id="contact-form" novalidate>
          <div class="space-y-5">
            <div>
              <label class="block text-xs text-slate-400 mb-2 font-medium">Your Name <span class="text-pink-400">*</span></label>
              <input type="text" id="form-name" placeholder="John Doe" class="form-input" required />
            </div>
            <div>
              <label class="block text-xs text-slate-400 mb-2 font-medium">Email Address <span class="text-pink-400">*</span></label>
              <input type="email" id="form-email" placeholder="john@example.com" class="form-input" required />
            </div>
            <div>
              <label class="block text-xs text-slate-400 mb-2 font-medium">Subject</label>
              <input type="text" id="form-subject" placeholder="Project inquiry..." class="form-input" />
            </div>
            <div>
              <label class="block text-xs text-slate-400 mb-2 font-medium">Message <span class="text-pink-400">*</span></label>
              <textarea id="form-message" placeholder="Tell me about your project..." rows="5" class="form-input resize-none" required></textarea>
            </div>
            <button type="submit" id="submit-btn" class="neon-btn w-full justify-center py-3 text-sm">
              <svg id="btn-icon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
              <span id="btn-text">Send Message</span>
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     FOOTER
════════════════════════════════════════ -->
<footer class="relative z-10 border-t border-white/5 py-8">
  <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
    <span class="font-mono text-sm font-bold grad-text">&lt;YourName /&gt;</span>
    <p class="text-slate-600 text-xs">© 2024 · Built with Three.js, Tailwind CSS & love</p>
    <div class="flex gap-4">
      <a href="https://github.com"   target="_blank" class="social-link" style="width:32px;height:32px;font-size:0.7rem">
        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
      </a>
      <a href="https://linkedin.com" target="_blank" class="social-link" style="width:32px;height:32px;">
        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
      </a>
    </div>
  </div>
</footer>

<!-- ════════════════════════════════════════
     TOAST NOTIFICATION
════════════════════════════════════════ -->
<div id="toast">
  <div class="w-9 h-9 rounded-full bg-emerald-400/15 border border-emerald-400/40 flex items-center justify-center flex-shrink-0">
    <svg width="18" height="18" fill="none" stroke="#34d399" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
  </div>
  <div>
    <p class="text-sm font-semibold text-white">Message Sent!</p>
    <p class="text-xs text-slate-400 mt-0.5">I'll get back to you within 24 hours.</p>
  </div>
  <button onclick="hideToast()" class="ml-auto text-slate-600 hover:text-white transition-colors">
    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
  </button>
</div>

<!-- ════════════════════════════════════════
     THREE.JS CDN
════════════════════════════════════════ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
/* ══════════════════════════════════════════
   THREE.JS — DUAL PARTICLE STARFIELD +
              ROTATING WIREFRAME GEOMETRY
══════════════════════════════════════════ */
(function () {
  const canvas   = document.getElementById('bg-canvas');
  const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
  renderer.setSize(window.innerWidth, window.innerHeight);

  const scene  = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 0.1, 1000);
  camera.position.set(0, 0, 60);

  /* ── Mouse tracking ── */
  const mouse = { x: 0, y: 0, tx: 0, ty: 0 };
  document.addEventListener('mousemove', e => {
    mouse.tx = (e.clientX / window.innerWidth  - 0.5) * 2;
    mouse.ty = (e.clientY / window.innerHeight - 0.5) * 2;
  });

  /* ── Particle field ── */
  const PARTICLE_COUNT = window.innerWidth < 768 ? 1800 : 3500;
  const positions = new Float32Array(PARTICLE_COUNT * 3);
  const colors    = new Float32Array(PARTICLE_COUNT * 3);
  const sizes     = new Float32Array(PARTICLE_COUNT);

  const palette = [
    new THREE.Color('#00f5ff'),
    new THREE.Color('#a855f7'),
    new THREE.Color('#6366f1'),
    new THREE.Color('#f0abfc'),
    new THREE.Color('#ffffff'),
  ];

  for (let i = 0; i < PARTICLE_COUNT; i++) {
    const i3 = i * 3;
    positions[i3]     = (Math.random() - 0.5) * 220;
    positions[i3 + 1] = (Math.random() - 0.5) * 220;
    positions[i3 + 2] = (Math.random() - 0.5) * 120;

    const c = palette[Math.floor(Math.random() * palette.length)];
    colors[i3]     = c.r;
    colors[i3 + 1] = c.g;
    colors[i3 + 2] = c.b;

    sizes[i] = Math.random() * 1.6 + 0.3;
  }

  const particleGeo = new THREE.BufferGeometry();
  particleGeo.setAttribute('position', new THREE.BufferAttribute(positions, 3));
  particleGeo.setAttribute('color',    new THREE.BufferAttribute(colors,    3));
  particleGeo.setAttribute('size',     new THREE.BufferAttribute(sizes,     1));

  const particleMat = new THREE.PointsMaterial({
    size:         0.7,
    vertexColors: true,
    transparent:  true,
    opacity:      0.75,
    sizeAttenuation: true,
  });

  const particles = new THREE.Points(particleGeo, particleMat);
  scene.add(particles);

  /* ── Wireframe geometry (icosahedron) ── */
  const geoMesh = new THREE.IcosahedronGeometry(14, 1);
  const matMesh = new THREE.MeshBasicMaterial({
    color:     0x00f5ff,
    wireframe: true,
    opacity:   0.07,
    transparent: true,
  });
  const wireMesh = new THREE.Mesh(geoMesh, matMesh);
  wireMesh.position.set(35, -10, -20);
  scene.add(wireMesh);

  /* ── Second smaller geometry ── */
  const geoMesh2 = new THREE.OctahedronGeometry(8, 0);
  const matMesh2 = new THREE.MeshBasicMaterial({
    color:     0xa855f7,
    wireframe: true,
    opacity:   0.09,
    transparent: true,
  });
  const wireMesh2 = new THREE.Mesh(geoMesh2, matMesh2);
  wireMesh2.position.set(-40, 12, -15);
  scene.add(wireMesh2);

  /* ── Third torus ── */
  const geoTorus = new THREE.TorusGeometry(10, 0.5, 8, 60);
  const matTorus = new THREE.MeshBasicMaterial({
    color:     0x6366f1,
    wireframe: true,
    opacity:   0.08,
    transparent: true,
  });
  const torusMesh = new THREE.Mesh(geoTorus, matTorus);
  torusMesh.position.set(0, -30, -30);
  scene.add(torusMesh);

  /* ── Window resize ── */
  window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
  });

  /* ── Render loop ── */
  let frame = 0;
  function animate() {
    requestAnimationFrame(animate);
    frame++;

    /* smooth mouse lerp */
    mouse.x += (mouse.tx - mouse.x) * 0.04;
    mouse.y += (mouse.ty - mouse.y) * 0.04;

    /* Particle drift */
    particles.rotation.y += 0.0003;
    particles.rotation.x  = mouse.y * 0.08;
    particles.rotation.z  = mouse.x * 0.05;

    /* Geometry rotations */
    wireMesh.rotation.x  += 0.0015;
    wireMesh.rotation.y  += 0.002;
    wireMesh2.rotation.x -= 0.002;
    wireMesh2.rotation.z += 0.0018;
    torusMesh.rotation.x += 0.001;
    torusMesh.rotation.y += 0.0012;

    /* Camera subtle parallax on mouse */
    camera.position.x += (mouse.x * 4 - camera.position.x) * 0.02;
    camera.position.y += (-mouse.y * 4 - camera.position.y) * 0.02;
    camera.lookAt(scene.position);

    renderer.render(scene, camera);
  }
  animate();
})();

/* ══════════════════════════════════════════
   TYPED TEXT ANIMATION
══════════════════════════════════════════ */
(function () {
  const phrases = [
    'Creative Developer',
    '3D Web Designer',
    'Full-Stack Engineer',
    'Three.js Enthusiast',
    'Open-Source Contributor',
  ];
  const el = document.getElementById('typed-text');
  let pIdx = 0, cIdx = 0, deleting = false, wait = 0;

  function type() {
    const phrase = phrases[pIdx];
    if (!deleting) {
      el.textContent = phrase.slice(0, ++cIdx);
      if (cIdx === phrase.length) { deleting = true; wait = 60; }
    } else {
      if (--wait > 0) { setTimeout(type, 30); return; }
      el.textContent = phrase.slice(0, --cIdx);
      if (cIdx === 0) { deleting = false; pIdx = (pIdx + 1) % phrases.length; }
    }
    setTimeout(type, deleting ? 38 : 80);
  }
  setTimeout(type, 1000);
})();

/* ══════════════════════════════════════════
   SCROLL REVEAL
══════════════════════════════════════════ */
(function () {
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el => io.observe(el));
})();

/* ══════════════════════════════════════════
   SKILL PROGRESS BARS (animate on enter)
══════════════════════════════════════════ */
(function () {
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.querySelectorAll('[data-pct]').forEach(row => {
          const pct  = row.dataset.pct;
          const fill = row.querySelector('.progress-fill');
          if (fill) fill.style.width = pct + '%';
        });
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.3 });
  const bars = document.getElementById('skill-bars');
  if (bars) io.observe(bars);
})();

/* ══════════════════════════════════════════
   CONTACT FORM
══════════════════════════════════════════ */
(function () {
  const form    = document.getElementById('contact-form');
  const btnText = document.getElementById('btn-text');
  const btnIcon = document.getElementById('btn-icon');
  const btn     = document.getElementById('submit-btn');

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const name    = document.getElementById('form-name').value.trim();
    const email   = document.getElementById('form-email').value.trim();
    const message = document.getElementById('form-message').value.trim();

    if (!name || !email || !message) {
      shakeBtn();
      return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      shakeBtn();
      return;
    }

    /* Loading state */
    btn.disabled = true;
    btnText.textContent = 'Sending...';
    btnIcon.innerHTML = `<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" stroke-dasharray="31.4" stroke-dashoffset="0" style="animation:spin 0.8s linear infinite;transform-origin:center"><animateTransform attributeName="transform" type="rotate" dur="0.8s" repeatCount="indefinite" from="0 12 12" to="360 12 12"/></circle>`;

    /* Simulate network request */
    setTimeout(() => {
      /* Reset form */
      form.reset();
      btn.disabled = false;
      btnText.textContent = 'Send Message';
      btnIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>`;

      showToast();
    }, 1600);
  });

  function shakeBtn() {
    btn.style.animation = 'shake 0.4s ease';
    setTimeout(() => btn.style.animation = '', 450);
  }
})();

/* ══════════════════════════════════════════
   TOAST
══════════════════════════════════════════ */
let toastTimer;
function showToast() {
  clearTimeout(toastTimer);
  const t = document.getElementById('toast');
  t.classList.add('show');
  toastTimer = setTimeout(hideToast, 5000);
}
function hideToast() {
  document.getElementById('toast').classList.remove('show');
}

/* ══════════════════════════════════════════
   MOBILE NAV
══════════════════════════════════════════ */
document.getElementById('menu-btn').addEventListener('click', () => {
  const m = document.getElementById('mobile-menu');
  m.classList.toggle('hidden');
  m.classList.toggle('flex');
});
document.querySelectorAll('#mobile-menu a').forEach(a => {
  a.addEventListener('click', () => {
    const m = document.getElementById('mobile-menu');
    m.classList.add('hidden');
    m.classList.remove('flex');
  });
});

/* ══════════════════════════════════════════
   SHAKE KEYFRAME (injected)
══════════════════════════════════════════ */
const shakeStyle = document.createElement('style');
shakeStyle.textContent = `
  @keyframes shake {
    0%,100%{ transform:translateX(0) }
    20%    { transform:translateX(-6px) }
    40%    { transform:translateX(6px) }
    60%    { transform:translateX(-4px) }
    80%    { transform:translateX(4px) }
  }
`;
document.head.appendChild(shakeStyle);
</script>
</body>
</html>
