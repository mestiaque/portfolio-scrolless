<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio | Spider Glass Theme</title>

    <!-- Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <!-- GLTFLoader (for .glb model if available) -->
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>
    <!-- GSAP + ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />

    <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.12);
            --glass-shadow: rgba(0, 0, 0, 0.4);
            --accent: #a855f7;
            --accent-2: #06b6d4;
            --accent-3: #f43f5e;
            --text-primary: #f1f5f9;
            --text-muted: #94a3b8;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: #020818;
            color: var(--text-primary);
            overflow-x: hidden;
        }

        /* ===== ANIMATED BACKGROUND ===== */
        .bg-orbs {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.35;
            animation: orbFloat 12s ease-in-out infinite alternate;
        }
        .orb-1 { width: 500px; height: 500px; background: radial-gradient(circle, #7c3aed, transparent); top: -10%; left: -10%; animation-delay: 0s; }
        .orb-2 { width: 400px; height: 400px; background: radial-gradient(circle, #0891b2, transparent); bottom: 10%; right: -5%; animation-delay: -4s; }
        .orb-3 { width: 350px; height: 350px; background: radial-gradient(circle, #be185d, transparent); top: 40%; left: 40%; animation-delay: -8s; }

        @keyframes orbFloat {
            0%   { transform: translate(0, 0) scale(1); }
            100% { transform: translate(40px, 30px) scale(1.1); }
        }

        /* ===== THREE.JS CANVAS (SPIDER LAYER) ===== */
        #spider-canvas {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 2;
            pointer-events: none;
        }

        /* ===== NAVBAR ===== */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(2, 8, 24, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
        }
        .logo {
            font-family: 'Orbitron', monospace;
            font-size: 1.4rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .nav-links { display: flex; gap: 2rem; list-style: none; }
        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            transition: color 0.3s;
        }
        .nav-links a:hover { color: var(--accent); }

        /* ===== SECTIONS ===== */
        section {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6rem 2rem 4rem;
        }

        .section-inner { max-width: 1100px; width: 100%; margin: 0 auto; }

        .section-tag {
            font-family: 'Orbitron', monospace;
            font-size: 0.7rem;
            letter-spacing: 0.3em;
            color: var(--accent);
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-family: 'Orbitron', monospace;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== GLASSMORPHISM CARD ===== */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--glass-border);
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow:
                0 8px 32px var(--glass-shadow),
                inset 0 1px 0 rgba(255,255,255,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 16px 48px var(--glass-shadow),
                inset 0 1px 0 rgba(255,255,255,0.12),
                0 0 24px rgba(168,85,247,0.15);
        }

        .glass-card-accent {
            border-top: 2px solid;
            border-image: linear-gradient(90deg, var(--accent), var(--accent-2)) 1;
        }

        /* ===== HERO SECTION ===== */
        #hero {
            text-align: center;
            flex-direction: column;
            gap: 0;
        }
        #hero .hero-content { position: relative; z-index: 10; }

        .hero-title {
            font-family: 'Orbitron', monospace;
            font-size: clamp(2.5rem, 8vw, 5.5rem);
            font-weight: 900;
            line-height: 1.05;
            margin-bottom: 1.5rem;
        }
        .hero-subtitle {
            font-size: clamp(1rem, 2.5vw, 1.4rem);
            color: var(--text-muted);
            margin-bottom: 0.75rem;
            font-weight: 300;
        }
        .typed-wrapper {
            font-size: clamp(1.1rem, 2.5vw, 1.5rem);
            font-weight: 600;
            min-height: 2em;
            color: var(--accent-2);
        }
        .typed-cursor { animation: blink 1s step-end infinite; }
        @keyframes blink { 50% { opacity: 0; } }

        .hero-btns { display: flex; gap: 1rem; justify-content: center; margin-top: 2.5rem; flex-wrap: wrap; }

        .btn-primary {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.875rem 2rem;
            background: linear-gradient(135deg, var(--accent), #7c3aed);
            color: #fff;
            border: none; border-radius: 0.75rem;
            font-size: 0.9rem; font-weight: 600;
            cursor: pointer; text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 20px rgba(168,85,247,0.4);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(168,85,247,0.6); }

        .btn-secondary {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.875rem 2rem;
            background: var(--glass-bg);
            color: var(--text-primary);
            border: 1px solid var(--glass-border); border-radius: 0.75rem;
            font-size: 0.9rem; font-weight: 600;
            cursor: pointer; text-decoration: none;
            backdrop-filter: blur(12px);
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .btn-secondary:hover { border-color: var(--accent); box-shadow: 0 0 20px rgba(168,85,247,0.2); }

        .scroll-hint {
            margin-top: 4rem;
            display: flex; flex-direction: column; align-items: center; gap: 0.5rem;
            color: var(--text-muted); font-size: 0.75rem; letter-spacing: 0.1em;
        }
        .scroll-hint .arrow { animation: bounceDown 1.5s ease-in-out infinite; }
        @keyframes bounceDown { 0%,100% { transform: translateY(0); } 50% { transform: translateY(8px); } }

        /* ===== ABOUT SECTION ===== */
        .about-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 3rem; align-items: center; }
        .about-image-wrap {
            position: relative;
            display: flex; align-items: center; justify-content: center;
        }
        .avatar-ring {
            width: 260px; height: 260px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            padding: 3px;
            position: relative;
        }
        .avatar-ring::before {
            content: '';
            position: absolute; inset: -12px;
            border-radius: 50%;
            border: 1px solid rgba(168,85,247,0.3);
            animation: spin 8s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        .avatar-inner {
            width: 100%; height: 100%;
            border-radius: 50%;
            background: linear-gradient(135deg, #1e1b4b, #0f172a);
            display: flex; align-items: center; justify-content: center;
            font-size: 5rem;
            overflow: hidden;
        }
        .about-text p { color: var(--text-muted); line-height: 1.8; margin-bottom: 1rem; }
        .about-stats { display: flex; gap: 1.5rem; margin-top: 1.5rem; flex-wrap: wrap; }
        .stat-item { text-align: center; }
        .stat-num { font-family: 'Orbitron', monospace; font-size: 2rem; font-weight: 900; color: var(--accent); }
        .stat-label { font-size: 0.75rem; color: var(--text-muted); }

        /* ===== EDUCATION ===== */
        .edu-timeline { display: flex; flex-direction: column; gap: 1.5rem; margin-top: 2rem; }
        .edu-item { display: flex; gap: 1.5rem; }
        .edu-dot-line { display: flex; flex-direction: column; align-items: center; }
        .edu-dot {
            width: 14px; height: 14px; border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            flex-shrink: 0; margin-top: 4px;
            box-shadow: 0 0 12px rgba(168,85,247,0.6);
        }
        .edu-line { flex: 1; width: 2px; background: linear-gradient(to bottom, var(--accent), transparent); opacity: 0.3; margin-top: 6px; }
        .edu-content h3 { font-size: 1.1rem; font-weight: 700; margin-bottom: 0.25rem; }
        .edu-content .inst { color: var(--accent-2); font-size: 0.9rem; margin-bottom: 0.25rem; }
        .edu-content .year { font-size: 0.8rem; color: var(--text-muted); }

        /* ===== SKILLS ===== */
        .skills-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem; margin-top: 2rem; }
        .skill-category h3 { font-size: 0.85rem; letter-spacing: 0.1em; color: var(--accent); margin-bottom: 1rem; text-transform: uppercase; }
        .skill-item { margin-bottom: 0.875rem; }
        .skill-label { display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 0.4rem; }
        .skill-pct { color: var(--accent-2); font-weight: 600; }
        .skill-bar { height: 6px; background: rgba(255,255,255,0.08); border-radius: 99px; overflow: hidden; }
        .skill-fill {
            height: 100%; border-radius: 99px;
            background: linear-gradient(90deg, var(--accent), var(--accent-2));
            width: 0%;
            transition: width 1.2s cubic-bezier(0.4,0,0.2,1);
            box-shadow: 0 0 8px rgba(168,85,247,0.5);
        }

        /* ===== EXPERIENCE ===== */
        .exp-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem; margin-top: 2rem; }
        .exp-card { position: relative; overflow: hidden; }
        .exp-card::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, var(--accent), var(--accent-2));
        }
        .exp-role { font-size: 1.1rem; font-weight: 700; margin-bottom: 0.25rem; }
        .exp-company { color: var(--accent-2); font-size: 0.9rem; margin-bottom: 0.5rem; }
        .exp-duration { font-size: 0.78rem; color: var(--text-muted); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.4rem; }
        .exp-list { list-style: none; }
        .exp-list li { font-size: 0.85rem; color: var(--text-muted); padding: 0.25rem 0; padding-left: 1rem; position: relative; }
        .exp-list li::before { content: '▸'; position: absolute; left: 0; color: var(--accent); }

        /* ===== PROJECTS ===== */
        .projects-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem; margin-top: 2rem; }
        .project-card { position: relative; overflow: hidden; }
        .project-img {
            width: 100%; height: 180px;
            background: linear-gradient(135deg, rgba(168,85,247,0.2), rgba(6,182,212,0.2));
            border-radius: 0.75rem; margin-bottom: 1.25rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 3rem;
        }
        .project-title { font-size: 1.15rem; font-weight: 700; margin-bottom: 0.5rem; }
        .project-desc { font-size: 0.85rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 1rem; }
        .project-tags { display: flex; flex-wrap: wrap; gap: 0.4rem; margin-bottom: 1.25rem; }
        .tag {
            padding: 0.2rem 0.7rem;
            background: rgba(168,85,247,0.15);
            border: 1px solid rgba(168,85,247,0.3);
            border-radius: 99px;
            font-size: 0.72rem; color: var(--accent);
        }
        .project-links { display: flex; gap: 0.75rem; }
        .project-links a {
            display: flex; align-items: center; gap: 0.4rem;
            font-size: 0.8rem; color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }
        .project-links a:hover { color: var(--accent); }

        /* ===== CONTACT ===== */
        .contact-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 3rem; }
        .contact-info { display: flex; flex-direction: column; gap: 1.25rem; }
        .contact-item { display: flex; align-items: center; gap: 1rem; }
        .contact-icon {
            width: 48px; height: 48px; border-radius: 0.75rem;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; font-size: 1.1rem;
        }
        .contact-text small { display: block; font-size: 0.72rem; color: var(--text-muted); }
        .contact-text span { font-size: 0.9rem; }

        /* Form */
        .contact-form { display: flex; flex-direction: column; gap: 1rem; }
        .form-group input, .form-group textarea {
            width: 100%; padding: 0.875rem 1.25rem;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--glass-border);
            border-radius: 0.75rem;
            color: var(--text-primary);
            font-size: 0.9rem; font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            backdrop-filter: blur(8px);
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(168,85,247,0.15);
        }
        .form-group input::placeholder, .form-group textarea::placeholder { color: var(--text-muted); }
        .form-group textarea { resize: none; height: 130px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        /* ===== FOOTER ===== */
        footer {
            position: relative; z-index: 10;
            text-align: center; padding: 2rem;
            border-top: 1px solid var(--glass-border);
            color: var(--text-muted); font-size: 0.82rem;
        }
        .social-links { display: flex; justify-content: center; gap: 1rem; margin-bottom: 1.25rem; }
        .social-links a {
            width: 42px; height: 42px; border-radius: 0.625rem;
            display: flex; align-items: center; justify-content: center;
            background: var(--glass-bg); border: 1px solid var(--glass-border);
            color: var(--text-muted); font-size: 1rem; text-decoration: none;
            transition: color 0.2s, border-color 0.2s, transform 0.2s;
        }
        .social-links a:hover { color: var(--accent); border-color: var(--accent); transform: translateY(-3px); }

        /* ===== WEB THREAD CANVAS (2D overlay for web threads) ===== */
        #web-canvas {
            position: fixed; inset: 0;
            z-index: 1;
            pointer-events: none;
        }

        /* ===== REVEAL ANIMATIONS ===== */
        .reveal { opacity: 0; transform: translateY(40px); }
        .reveal.visible { opacity: 1; transform: translateY(0); transition: opacity 0.7s ease, transform 0.7s ease; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .about-grid, .contact-grid { grid-template-columns: 1fr; }
            .nav-links { display: none; }
            .form-row { grid-template-columns: 1fr; }
            .about-image-wrap { order: -1; }
        }
    </style>
</head>
<body>

<!-- Animated background orbs -->
<div class="bg-orbs">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
</div>

<!-- Web thread 2D canvas -->
<canvas id="web-canvas"></canvas>

<!-- Three.js 3D spider canvas -->
<canvas id="spider-canvas"></canvas>

<!-- ===== NAVBAR ===== -->
<nav>
    <div class="logo">Spider.dev</div>
    <ul class="nav-links">
        <li><a href="#hero">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>

<!-- ===== HERO SECTION ===== -->
<section id="hero">
    <div class="section-inner hero-content">
        <p class="section-tag reveal">Welcome to my portfolio</p>
        <h1 class="hero-title reveal">
            Hi, I'm <span class="gradient-text">Your Name</span><br/>
            A Developer
        </h1>
        <p class="hero-subtitle reveal">Crafting digital experiences with passion & precision</p>
        <div class="typed-wrapper reveal" id="typed-text">
            <span id="typed-string"></span><span class="typed-cursor">|</span>
        </div>
        <div class="hero-btns reveal">
            <a href="#projects" class="btn-primary">
                <i class="fas fa-code"></i> View Projects
            </a>
            <a href="#contact" class="btn-secondary">
                <i class="fas fa-envelope"></i> Contact Me
            </a>
        </div>
        <div class="scroll-hint reveal">
            <span>Scroll to explore</span>
            <i class="fas fa-chevron-down arrow"></i>
        </div>
    </div>
</section>

<!-- ===== ABOUT SECTION ===== -->
<section id="about">
    <div class="section-inner">
        <div class="about-grid">
            <div class="about-image-wrap reveal">
                <div class="avatar-ring">
                    <div class="avatar-inner">🕷️</div>
                </div>
            </div>
            <div class="about-text">
                <p class="section-tag reveal">Get to know me</p>
                <h2 class="section-title reveal">About <span class="gradient-text">Me</span></h2>
                <div class="glass-card reveal">
                    <p>I'm a passionate Full Stack Developer who loves building beautiful, performant, and user-friendly web applications. I specialize in modern JavaScript, React, and backend APIs.</p>
                    <p>When I'm not coding, you'll find me exploring new technologies, contributing to open-source, or leveling up my problem-solving on competitive platforms.</p>
                    <div class="about-stats">
                        <div class="stat-item">
                            <div class="stat-num">3+</div>
                            <div class="stat-label">Years Exp.</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-num">40+</div>
                            <div class="stat-label">Projects</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-num">15+</div>
                            <div class="stat-label">Clients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== EDUCATION SECTION ===== -->
<section id="education">
    <div class="section-inner">
        <p class="section-tag reveal">Academic Journey</p>
        <h2 class="section-title reveal">My <span class="gradient-text">Education</span></h2>
        <div class="edu-timeline">
            <div class="edu-item reveal">
                <div class="edu-dot-line">
                    <div class="edu-dot"></div>
                    <div class="edu-line"></div>
                </div>
                <div class="glass-card edu-content" style="flex:1; margin-bottom:0;">
                    <h3>B.Sc. in Computer Science & Engineering</h3>
                    <div class="inst">University of Technology</div>
                    <div class="year"><i class="fas fa-calendar-alt"></i> 2018 – 2022 &nbsp;|&nbsp; CGPA: 3.75</div>
                </div>
            </div>
            <div class="edu-item reveal">
                <div class="edu-dot-line">
                    <div class="edu-dot"></div>
                    <div class="edu-line"></div>
                </div>
                <div class="glass-card edu-content" style="flex:1; margin-bottom:0;">
                    <h3>Higher Secondary Certificate (HSC)</h3>
                    <div class="inst">Dhaka College</div>
                    <div class="year"><i class="fas fa-calendar-alt"></i> 2016 – 2018 &nbsp;|&nbsp; GPA: 5.00</div>
                </div>
            </div>
            <div class="edu-item reveal">
                <div class="edu-dot-line">
                    <div class="edu-dot"></div>
                </div>
                <div class="glass-card edu-content" style="flex:1; margin-bottom:0;">
                    <h3>Secondary School Certificate (SSC)</h3>
                    <div class="inst">Model High School</div>
                    <div class="year"><i class="fas fa-calendar-alt"></i> 2014 – 2016 &nbsp;|&nbsp; GPA: 5.00</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SKILLS SECTION ===== -->
<section id="skills">
    <div class="section-inner">
        <p class="section-tag reveal">What I Know</p>
        <h2 class="section-title reveal">My <span class="gradient-text">Skills</span></h2>
        <div class="skills-grid">
            <div class="glass-card skill-category reveal">
                <h3><i class="fas fa-code"></i> Frontend</h3>
                <div class="skill-item">
                    <div class="skill-label"><span>React / Next.js</span><span class="skill-pct">90%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="90"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>Three.js / WebGL</span><span class="skill-pct">80%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="80"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>TypeScript</span><span class="skill-pct">85%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="85"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>Tailwind CSS</span><span class="skill-pct">95%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="95"></div></div>
                </div>
            </div>
            <div class="glass-card skill-category reveal">
                <h3><i class="fas fa-server"></i> Backend</h3>
                <div class="skill-item">
                    <div class="skill-label"><span>Laravel / PHP</span><span class="skill-pct">88%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="88"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>Node.js / Express</span><span class="skill-pct">82%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="82"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>REST APIs</span><span class="skill-pct">90%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="90"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>MySQL / PostgreSQL</span><span class="skill-pct">80%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="80"></div></div>
                </div>
            </div>
            <div class="glass-card skill-category reveal">
                <h3><i class="fas fa-tools"></i> Tools & Others</h3>
                <div class="skill-item">
                    <div class="skill-label"><span>Git / GitHub</span><span class="skill-pct">92%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="92"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>Docker</span><span class="skill-pct">72%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="72"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>GSAP Animation</span><span class="skill-pct">85%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="85"></div></div>
                </div>
                <div class="skill-item">
                    <div class="skill-label"><span>Figma / UI Design</span><span class="skill-pct">75%</span></div>
                    <div class="skill-bar"><div class="skill-fill" data-width="75"></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== EXPERIENCE SECTION ===== -->
<section id="experience">
    <div class="section-inner">
        <p class="section-tag reveal">Work History</p>
        <h2 class="section-title reveal">My <span class="gradient-text">Experience</span></h2>
        <div class="exp-grid">
            <div class="glass-card exp-card reveal">
                <div class="exp-role">Senior Frontend Developer</div>
                <div class="exp-company">TechCorp Ltd.</div>
                <div class="exp-duration"><i class="fas fa-calendar"></i> Jan 2023 – Present</div>
                <ul class="exp-list">
                    <li>Built scalable React dashboards used by 50k+ users</li>
                    <li>Integrated 3D product visualizers with Three.js</li>
                    <li>Led a team of 4 junior developers</li>
                    <li>Reduced bundle size by 40% via code splitting</li>
                </ul>
            </div>
            <div class="glass-card exp-card reveal">
                <div class="exp-role">Full Stack Developer</div>
                <div class="exp-company">StartupXYZ</div>
                <div class="exp-duration"><i class="fas fa-calendar"></i> Jun 2021 – Dec 2022</div>
                <ul class="exp-list">
                    <li>Developed RESTful APIs with Laravel & Node.js</li>
                    <li>Built real-time features using WebSockets</li>
                    <li>Deployed microservices on AWS EC2 & S3</li>
                    <li>Improved API response time by 60%</li>
                </ul>
            </div>
            <div class="glass-card exp-card reveal">
                <div class="exp-role">Junior Web Developer</div>
                <div class="exp-company">Digital Agency BD</div>
                <div class="exp-duration"><i class="fas fa-calendar"></i> Jan 2021 – May 2021</div>
                <ul class="exp-list">
                    <li>Developed responsive WordPress themes</li>
                    <li>Collaborated on e-commerce projects</li>
                    <li>Maintained client websites and CMS</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ===== PROJECTS SECTION ===== -->
<section id="projects">
    <div class="section-inner">
        <p class="section-tag reveal">What I've Built</p>
        <h2 class="section-title reveal">My <span class="gradient-text">Projects</span></h2>
        <div class="projects-grid">
            <div class="glass-card project-card reveal">
                <div class="project-img">🛒</div>
                <div class="project-title">E-Commerce Platform</div>
                <div class="project-desc">Full-featured online store with cart, payments via Stripe, and admin panel built with Laravel & React.</div>
                <div class="project-tags">
                    <span class="tag">Laravel</span><span class="tag">React</span><span class="tag">Stripe</span><span class="tag">MySQL</span>
                </div>
                <div class="project-links">
                    <a href="#"><i class="fab fa-github"></i> GitHub</a>
                    <a href="#"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                </div>
            </div>
            <div class="glass-card project-card reveal">
                <div class="project-img">💬</div>
                <div class="project-title">Real-Time Chat App</div>
                <div class="project-desc">WebSocket-powered chat with rooms, notifications, file sharing, and end-to-end encryption.</div>
                <div class="project-tags">
                    <span class="tag">Node.js</span><span class="tag">Socket.io</span><span class="tag">MongoDB</span>
                </div>
                <div class="project-links">
                    <a href="#"><i class="fab fa-github"></i> GitHub</a>
                    <a href="#"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                </div>
            </div>
            <div class="glass-card project-card reveal">
                <div class="project-img">📊</div>
                <div class="project-title">Analytics Dashboard</div>
                <div class="project-desc">Interactive data visualization dashboard with charts, filters, and real-time updates using Chart.js & Three.js.</div>
                <div class="project-tags">
                    <span class="tag">React</span><span class="tag">Three.js</span><span class="tag">D3.js</span>
                </div>
                <div class="project-links">
                    <a href="#"><i class="fab fa-github"></i> GitHub</a>
                    <a href="#"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== CONTACT SECTION ===== -->
<section id="contact">
    <div class="section-inner">
        <p class="section-tag reveal">Let's Talk</p>
        <h2 class="section-title reveal">Get In <span class="gradient-text">Touch</span></h2>
        <div class="contact-grid">
            <div class="contact-info reveal">
                <p style="color:var(--text-muted); line-height:1.8; margin-bottom:1.5rem;">
                    Have a project in mind or want to collaborate? Feel free to reach out — I'm always open to new opportunities!
                </p>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                    <div class="contact-text">
                        <small>Email</small>
                        <span>yourname@email.com</span>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-phone"></i></div>
                    <div class="contact-text">
                        <small>Phone</small>
                        <span>+880 1700-000000</span>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-text">
                        <small>Location</small>
                        <span>Dhaka, Bangladesh</span>
                    </div>
                </div>
            </div>
            <div class="glass-card reveal">
                <form class="contact-form" onsubmit="return false;">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Subject" />
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Your Message..."></textarea>
                    </div>
                    <button class="btn-primary" type="submit" style="align-self:flex-start;">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ===== FOOTER ===== -->
<footer>
    <div class="social-links">
        <a href="#"><i class="fab fa-github"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
    <p>Designed & built by <span style="color:var(--accent)">Your Name</span> &copy; 2024. Made with 🕷️ Three.js & GSAP.</p>
</footer>

<!-- ===================================================
     JAVASCRIPT — Three.js Realistic Spider + Organic Movement
     =================================================== -->
<script>
(function () {
    'use strict';

    /* =============================================
       1. TYPED TEXT
    ============================================= */
    const roles = ['Full Stack Developer', 'UI/UX Enthusiast', '3D Web Artist', 'Open Source Contributor'];
    let roleIdx = 0, charIdx = 0, isDeleting = false;
    const typedEl = document.getElementById('typed-string');
    function typeLoop() {
        const cur = roles[roleIdx];
        typedEl.textContent = isDeleting ? cur.slice(0, charIdx--) : cur.slice(0, charIdx++);
        if (!isDeleting && charIdx > cur.length) { isDeleting = true; setTimeout(typeLoop, 1200); return; }
        if (isDeleting && charIdx < 0)           { isDeleting = false; roleIdx = (roleIdx+1)%roles.length; setTimeout(typeLoop, 400); return; }
        setTimeout(typeLoop, isDeleting ? 45 : 75);
    }
    setTimeout(typeLoop, 800);

    /* =============================================
       2. THREE.JS — FRONT VIEW SETUP
       Camera faces the XY plane.
       Spider crawls on Z=0 "screen glass" surface,
       descending top→bottom as user scrolls.
    ============================================= */
    /* --- renderer --- */
    const canvas   = document.getElementById('spider-canvas');
    const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setClearColor(0x000000, 0);

    const scene  = new THREE.Scene();
    /* Front-facing camera: spider crawls on the Z=0 "screen glass" plane.
       Camera at positive Z looks toward the screen; we see the spider face-on
       with legs spreading left/right and body descending top→bottom. */
    const camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 200);
    camera.position.set(0, 0, 10);
    camera.lookAt(0, 0, 0);

    /* --- lights --- */
    scene.add(new THREE.AmbientLight(0xffffff, 0.30));
    const keyLight  = new THREE.PointLight(0xa855f7, 5, 40);
    keyLight.position.set(3, 3, 7);
    scene.add(keyLight);
    const fillLight = new THREE.PointLight(0x06b6d4, 3, 30);
    fillLight.position.set(-5, 1, 6);
    scene.add(fillLight);
    const rimLight  = new THREE.PointLight(0xf43f5e, 1.5, 20);
    rimLight.position.set(0, -5, -2);
    scene.add(rimLight);

    /* =============================================
       3. SPIDER BUILD
       Body axis: head at top (+Y), abdomen at bottom (−Y).
       Body faces camera (+Z). Legs spread left/right (±X).
       Feet rest on Z = 0 screen-glass plane.
    ============================================= */
    const spiderRoot = new THREE.Group();
    scene.add(spiderRoot);
    const bodyPivot  = new THREE.Group();
    spiderRoot.add(bodyPivot);

    /* materials */
    const matBody = new THREE.MeshStandardMaterial({ color:0x0d001a, metalness:0.70, roughness:0.25, emissive:0x5b0ea6, emissiveIntensity:0.30 });
    const matAbd  = new THREE.MeshStandardMaterial({ color:0x12002a, metalness:0.50, roughness:0.35, emissive:0x7c0d3e, emissiveIntensity:0.25 });
    const matLeg  = new THREE.MeshStandardMaterial({ color:0x220055, metalness:0.70, roughness:0.20, emissive:0x9b40ff, emissiveIntensity:0.85 });
    const matEye  = new THREE.MeshStandardMaterial({ color:0x00ffff,  emissive:0x00ffff,  emissiveIntensity:2.5,  metalness:0, roughness:0 });
    const matFang = new THREE.MeshStandardMaterial({ color:0x001a2e, metalness:0.90, roughness:0.10, emissive:0x00b4d8, emissiveIntensity:0.55 });
    const matMark = new THREE.MeshStandardMaterial({ color:0xf43f5e, emissive:0xf43f5e, emissiveIntensity:1.2 });
    const matSpin = new THREE.MeshStandardMaterial({ color:0x0a0010, emissive:0xa855f7, emissiveIntensity:0.9 });

    /* cephalothorax — head/upper body, wide & shallow */
    const ceph = new THREE.Mesh(new THREE.SphereGeometry(0.50, 24, 18), matBody);
    ceph.scale.set(1.10, 0.90, 0.78);
    ceph.position.set(0, 0.32, 0.08);
    bodyPivot.add(ceph);

    /* pedicel (waist) */
    const pedicel = new THREE.Mesh(new THREE.SphereGeometry(0.13, 10, 8), matBody);
    pedicel.scale.set(0.75, 0.70, 0.75);
    pedicel.position.set(0, -0.30, 0.06);
    bodyPivot.add(pedicel);

    /* abdomen — larger, hangs below */
    const abd = new THREE.Mesh(new THREE.SphereGeometry(0.68, 28, 20), matAbd);
    abd.scale.set(0.90, 1.18, 0.80);
    abd.position.set(0, -1.08, 0.04);
    bodyPivot.add(abd);

    /* abdomen hourglass markings */
    [[-0.75], [-1.02], [-1.30]].forEach(([y], i) => {
        const m = new THREE.Mesh(new THREE.SphereGeometry(0.10 - i*0.015, 8, 6), matMark);
        m.scale.set(0.50, 0.38, 0.75);
        m.position.set(0, y, 0.48);
        bodyPivot.add(m);
    });

    /* spinneret — silk gland at base of abdomen */
    const spinMesh = new THREE.Mesh(new THREE.ConeGeometry(0.09, 0.20, 8), matSpin);
    spinMesh.rotation.z = Math.PI; // tip points down
    spinMesh.position.set(0, -1.60, 0.04);
    bodyPivot.add(spinMesh);

    /* 8 eyes — two rows at top of cephalothorax, facing camera */
    const eyeData = [
        [-0.09, 0.73, 0.37], [0.09, 0.73, 0.37],   // AME (biggest)
        [-0.27, 0.65, 0.33], [0.27, 0.65, 0.33],   // ALE
        [-0.19, 0.59, 0.32], [0.19, 0.59, 0.32],   // PME
        [-0.31, 0.54, 0.29], [0.31, 0.54, 0.29],   // PLE
    ];
    const eyeMeshes = [];
    eyeData.forEach(([x, y, z], i) => {
        const eye = new THREE.Mesh(
            new THREE.SphereGeometry(i < 2 ? 0.060 : 0.044, 10, 8),
            matEye.clone()
        );
        eye.position.set(x, y, z);
        bodyPivot.add(eye);
        eyeMeshes.push(eye);
    });

    /* chelicerae (fangs) */
    [-0.16, 0.16].forEach(xOff => {
        const base = new THREE.Mesh(new THREE.CylinderGeometry(0.034, 0.054, 0.27, 8), matBody);
        base.rotation.x = 0.42;
        base.position.set(xOff, 0.10, 0.42);
        bodyPivot.add(base);
        const tip = new THREE.Mesh(new THREE.ConeGeometry(0.018, 0.15, 8), matFang);
        tip.rotation.x = 0.42;
        tip.position.set(xOff, -0.09, 0.52);
        bodyPivot.add(tip);
    });

    /* pedipalps */
    [-0.36, 0.36].forEach(xOff => {
        const palp = new THREE.Group();
        palp.position.set(xOff, 0.22, 0.36);
        palp.rotation.z = xOff > 0 ?  0.50 : -0.50;
        palp.rotation.x = -0.30;
        [{ r1:0.022, r2:0.028, h:0.25, y:0.125 },
         { r1:0.016, r2:0.022, h:0.17, y:0.32  }].forEach(s => {
            const seg = new THREE.Mesh(new THREE.CylinderGeometry(s.r1,s.r2,s.h,6), matLeg);
            seg.position.set(0, s.y, 0);
            palp.add(seg);
        });
        const bulb = new THREE.Mesh(new THREE.SphereGeometry(0.034, 8, 6), matFang);
        bulb.position.set(0, 0.44, 0.09);
        palp.add(bulb);
        bodyPivot.add(palp);
    });

    /* =============================================
       4. IK LEG SYSTEM
       Feet live on the Z = 0 "screen glass" plane.
       Knees bend toward camera (+Z) for a natural look.
    ============================================= */

    /* Hip sockets on the cephalothorax sides.
       Staggered in Y (body axis) so front/back legs attach at different heights. */
    const HIP_LOCAL = [
        new THREE.Vector3( 0.48,  0.28, 0.08),  // R1 (front-most)
        new THREE.Vector3( 0.52,  0.06, 0.08),  // R2
        new THREE.Vector3( 0.52, -0.18, 0.08),  // R3
        new THREE.Vector3( 0.46, -0.40, 0.08),  // R4 (rear-most)
        new THREE.Vector3(-0.48,  0.28, 0.08),  // L1
        new THREE.Vector3(-0.52,  0.06, 0.08),  // L2
        new THREE.Vector3(-0.52, -0.18, 0.08),  // L3
        new THREE.Vector3(-0.46, -0.40, 0.08),  // L4
    ];

    /* Natural foot-rest positions in body-LOCAL space, clamped to Z=0 (screen glass).
       Front legs (R1/L1) reach upward, rear legs (R4/L4) reach downward.
       All reach wide in ±X for the classic "spread" spider silhouette.     */
    const FOOT_REST_LOCAL = [
        new THREE.Vector3( 2.10,  1.30, 0),   // R1 — high, forward
        new THREE.Vector3( 2.45,  0.30, 0),   // R2 — wide, mid-up
        new THREE.Vector3( 2.45, -0.60, 0),   // R3 — wide, mid-down
        new THREE.Vector3( 1.90, -1.55, 0),   // R4 — rear, low
        new THREE.Vector3(-2.10,  1.30, 0),   // L1
        new THREE.Vector3(-2.45,  0.30, 0),   // L2
        new THREE.Vector3(-2.45, -0.60, 0),   // L3
        new THREE.Vector3(-1.90, -1.55, 0),   // L4
    ];

    const LEG_L1    = 1.10;  // femur length
    const LEG_L2    = 1.05;  // tibia length
    const STEP_TH   = 0.70;  // step threshold distance
    const STEP_SPD  = 5.5;   // step animation speed
    const STEP_ARC  = 0.40;  // step lift height (toward camera = +Z)
    const GAIT_GRP  = [0,1,0,1, 1,0,1,0]; // diagonal gait pairs

    class IKLeg {
        constructor(idx) {
            this.idx       = idx;
            this.hipLocal  = HIP_LOCAL[idx];
            this.footWorld = new THREE.Vector3();
            this.stepping  = false;
            this.stepT     = 0;
            this.stepFrom  = new THREE.Vector3();
            this.stepTo    = new THREE.Vector3();
            this.gaitGrp   = GAIT_GRP[idx];

            // rTop=thin-end (knee/foot), rBottom=thick-end (hip/knee) — tapers away from body
            this.femur = this._seg(LEG_L1, 0.028, 0.048);
            this.tibia = this._seg(LEG_L2, 0.012, 0.030);

            // knee joint sphere — visible bend point
            const kMat = new THREE.MeshStandardMaterial({ color:0x2a0060, emissive:0xa050ff, emissiveIntensity:1.0 });
            this.kneeJoint = new THREE.Mesh(new THREE.SphereGeometry(0.055, 8, 6), kMat);

            this.foot  = new THREE.Mesh(new THREE.SphereGeometry(0.042, 8, 6), matEye.clone());
            this.foot.material.emissiveIntensity = 1.0;
            scene.add(this.femur, this.tibia, this.kneeJoint, this.foot);
        }

        _seg(len, rTop, rBot) {
            const g = new THREE.CylinderGeometry(rTop, rBot, len, 8);
            // Shift so origin = bottom cap → mesh.position = `from`, cylinder extends toward `to`
            g.translate(0, len / 2, 0);
            return new THREE.Mesh(g, matLeg.clone());
        }

        _worldRest(bPos, bQuat) {
            const r = FOOT_REST_LOCAL[this.idx].clone().applyQuaternion(bQuat).add(bPos);
            r.z = 0; // clamp foot to screen glass
            return r;
        }

        initFoot(bPos, bQuat) {
            this.footWorld.copy(this._worldRest(bPos, bQuat));
        }

        update(bPos, bQuat, dt, canStep) {
            const rest    = this._worldRest(bPos, bQuat);
            let   started = false;

            if (!this.stepping && canStep && this.footWorld.distanceTo(rest) > STEP_TH) {
                this.stepping = true;
                this.stepT    = 0;
                this.stepFrom.copy(this.footWorld);
                this.stepTo.copy(rest);
                started = true;
            }

            if (this.stepping) {
                this.stepT += dt * STEP_SPD;
                const p    = Math.min(this.stepT, 1);
                const ease = p * p * (3 - 2 * p); // smooth-step
                this.footWorld.lerpVectors(this.stepFrom, this.stepTo, ease);
                this.footWorld.z = Math.sin(p * Math.PI) * STEP_ARC; // arc toward camera
                if (this.stepT >= 1) {
                    this.stepping    = false;
                    this.footWorld.z = 0;
                    this.footWorld.copy(this.stepTo);
                }
            }

            this._solveIK(bPos, bQuat);
            return started;
        }

        _solveIK(bPos, bQuat) {
            const hip    = this.hipLocal.clone().applyQuaternion(bQuat).add(bPos);
            const toFoot = this.footWorld.clone().sub(hip);
            const dist   = Math.min(toFoot.length(), LEG_L1 + LEG_L2 - 0.01);
            const cosA   = Math.max(-1, Math.min(1, (LEG_L1*LEG_L1 + dist*dist - LEG_L2*LEG_L2) / (2*LEG_L1*dist)));
            const angA   = Math.acos(cosA);

            const dir    = toFoot.clone().normalize();
            // Knee pops: outward from body center (+X for right legs, -X for left)
            // AND slightly toward camera (+Z) so knees are clearly visible from front.
            // This gives the classic raised-elbow spider silhouette.
            const sideSign = this.idx < 4 ? 1 : -1;
            const bendRaw  = new THREE.Vector3(sideSign * 0.8, 0.3, 0.7).normalize();
            // Remove the component along dir to keep bend perpendicular to the leg segment
            const bendPerp = bendRaw.clone().addScaledVector(dir, -bendRaw.dot(dir));
            const bend     = bendPerp.length() > 0.0001 ? bendPerp.normalize() : new THREE.Vector3(0, 0, 1);

            const knee = hip.clone()
                .addScaledVector(dir,  Math.cos(angA) * LEG_L1)
                .addScaledVector(bend, Math.sin(angA) * LEG_L1);

            this._orient(this.femur, hip,  knee);
            this._orient(this.tibia, knee, this.footWorld);
            this.kneeJoint.position.copy(knee);
            this.foot.position.copy(this.footWorld);
        }

        _orient(mesh, from, to) {
            const dir = to.clone().sub(from).normalize();
            const up  = new THREE.Vector3(0, 1, 0);
            const dot = up.dot(dir);
            if (Math.abs(dot) > 0.9999) {
                mesh.quaternion.identity();
                if (dot < 0) mesh.quaternion.setFromAxisAngle(new THREE.Vector3(1,0,0), Math.PI);
            } else {
                const axis  = new THREE.Vector3().crossVectors(up, dir).normalize();
                mesh.quaternion.setFromAxisAngle(axis, Math.acos(Math.max(-1, Math.min(1, dot))));
            }
            mesh.position.copy(from);
        }
    }

    const legs          = Array.from({ length: 8 }, (_, i) => new IKLeg(i));
    const stepCooldown  = new Array(8).fill(0);
    let   steppingGroup = 0;
    let   spiderInit    = false;

    /* =============================================
       5. SCROLL-DRIVEN SILK DESCENT
       pathAt(t)  →  world position for spider at scroll t ∈ [0,1].
       The spider descends in a gentle zigzag (eke-beke).
       Reverse scroll makes it climb back up automatically because
       displayT tracks targetScrollT bidirectionally.
    ============================================= */
    const PATH_TOP =  4.0;
    const PATH_BOT = -4.2;
    const ZZ_AMP   = 3.20;  // large left-right swing amplitude
    const ZZ_FREQ  = 2.5;   // swings during full descent

    /* pathAt(t): deterministic zigzag path.
       Combines a primary sine with a secondary harmonic for
       irregular-but-smooth eke-beke (winding) motion.
       Clamp X so spider stays inside visible area. */
    function pathAt(t) {
        const y   = PATH_TOP + (PATH_BOT - PATH_TOP) * t;
        const raw = Math.sin(t * Math.PI * ZZ_FREQ * 2) * ZZ_AMP
                  + Math.sin(t * Math.PI * ZZ_FREQ * 3.1 + 1.1) * 0.55;
        const x   = Math.max(-3.6, Math.min(3.6, raw));
        return new THREE.Vector3(x, y, 0.20);
    }

    /* Path tangent — direction spider faces */
    function tangentAt(t) {
        const eps = 0.002;
        return pathAt(Math.min(1, t + eps)).clone()
               .sub(pathAt(Math.max(0, t - eps)))
               .normalize();
    }

    gsap.registerPlugin(ScrollTrigger);
    let targetScrollT = 0;
    let displayT      = 0;  // smoothed, drives spider position

    ScrollTrigger.create({
        trigger: 'body',
        start:   'top top',
        end:     'bottom bottom',
        onUpdate: self => { targetScrollT = self.progress; },
    });

    /* =============================================
       6. CANVAS — SILK THREAD + WEB DECORATION
    ============================================= */
    const webCanvas = document.getElementById('web-canvas');
    const ctx       = webCanvas.getContext('2d');
    function resizeWebCanvas() {
        webCanvas.width  = window.innerWidth;
        webCanvas.height = window.innerHeight;
    }
    resizeWebCanvas();

    function project3D(v3) {
        const c = v3.clone().project(camera);
        return {
            x: ( c.x * 0.5 + 0.5) * webCanvas.width,
            y: (-c.y * 0.5 + 0.5) * webCanvas.height,
        };
    }

    /* Draw the complete silk path from the top anchor down to t.
       Because pathAt() is deterministic, the path automatically
       shortens when t decreases (scroll up = spider climbs back). */
    /* Build screen-space points along the silk path (0 → t).
       Called every frame; result reused for multi-pass drawing. */
    function buildSilkPoints(t, steps) {
        const pts = [];
        const anchorW = new THREE.Vector3(pathAt(0).x, PATH_TOP + 1.6, 0.20);
        pts.push(project3D(anchorW));
        for (let i = 1; i <= steps; i++) {
            pts.push(project3D(pathAt((i / steps) * t)));
        }
        return pts;
    }

    /* Draw a polyline through pts with optional per-segment catenary sag */
    function strokePath(pts, sagPx) {
        if (pts.length < 2) return;
        ctx.beginPath();
        ctx.moveTo(pts[0].x, pts[0].y);
        for (let i = 1; i < pts.length; i++) {
            if (sagPx > 0) {
                // Add tiny downward sag between consecutive points (catenary effect)
                const mx  = (pts[i-1].x + pts[i].x) * 0.5;
                const my  = (pts[i-1].y + pts[i].y) * 0.5 + sagPx;
                ctx.quadraticCurveTo(mx, my, pts[i].x, pts[i].y);
            } else {
                ctx.lineTo(pts[i].x, pts[i].y);
            }
        }
        ctx.stroke();
    }

    function drawSilk(t) {
        ctx.clearRect(0, 0, webCanvas.width, webCanvas.height);
        if (t < 0.004) return;

        const STEPS   = 120;
        const pts     = buildSilkPoints(t, STEPS);
        const anchor  = pts[0];
        const tipPt   = pts[pts.length - 1];

        /* ── Pass 1: wide soft glow ── */
        ctx.save();
        ctx.lineWidth   = 8;
        ctx.strokeStyle = 'rgba(140,60,255,0.10)';
        ctx.shadowColor = 'rgba(168,85,247,0.5)';
        ctx.shadowBlur  = 22;
        ctx.lineCap     = 'round';
        ctx.lineJoin    = 'round';
        strokePath(pts, 0);
        ctx.restore();

        /* ── Pass 2: medium glow ── */
        ctx.save();
        const grad2 = ctx.createLinearGradient(anchor.x, anchor.y, tipPt.x, tipPt.y);
        grad2.addColorStop(0,    'rgba(200,120,255,0.45)');
        grad2.addColorStop(0.45, 'rgba(168,85,247,0.38)');
        grad2.addColorStop(1,    'rgba(6,182,212,0.20)');
        ctx.strokeStyle = grad2;
        ctx.lineWidth   = 3.5;
        ctx.shadowColor = 'rgba(168,85,247,0.6)';
        ctx.shadowBlur  = 10;
        ctx.lineCap     = 'round';
        ctx.lineJoin    = 'round';
        strokePath(pts, 1.8);   // slight catenary sag
        ctx.restore();

        /* ── Pass 3: sharp bright core ── */
        ctx.save();
        const grad3 = ctx.createLinearGradient(anchor.x, anchor.y, tipPt.x, tipPt.y);
        grad3.addColorStop(0,   'rgba(230,180,255,0.95)');
        grad3.addColorStop(0.5, 'rgba(168,85,247,0.80)');
        grad3.addColorStop(1,   'rgba(80,220,240,0.55)');
        ctx.strokeStyle = grad3;
        ctx.lineWidth   = 1.4;
        ctx.shadowColor = 'rgba(200,150,255,0.9)';
        ctx.shadowBlur  = 4;
        ctx.lineCap     = 'round';
        ctx.lineJoin    = 'round';
        strokePath(pts, 0.8);
        ctx.restore();

        /* ── Shimmer dots along silk (tiny specular highlights) ── */
        ctx.save();
        for (let i = 2; i < pts.length - 1; i += 6) {
            const alpha = 0.55 + Math.sin(i * 0.7 + Date.now() * 0.003) * 0.35;
            ctx.beginPath();
            ctx.arc(pts[i].x, pts[i].y, 1.2, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(220,180,255,${alpha})`;
            ctx.fill();
        }
        ctx.restore();

        /* ── Anchor line from top-of-screen ── */
        ctx.save();
        ctx.beginPath();
        ctx.moveTo(anchor.x, 0);
        ctx.lineTo(anchor.x, anchor.y);
        ctx.strokeStyle = 'rgba(168,85,247,0.28)';
        ctx.lineWidth   = 1.0;
        ctx.setLineDash([4, 6]);
        ctx.stroke();
        ctx.setLineDash([]);
        ctx.restore();

        /* ── Decorative orb webs at 4 intervals along path ── */
        const WEB_COUNT = 4;
        for (let n = 0; n < WEB_COUNT; n++) {
            const nt = (n + 1) / (WEB_COUNT + 1);
            if (nt > t) break;

            const center = project3D(pathAt(nt));
            const rings  = [44, 82, 122];
            const SPOKES = 10;

            /* spoke lines */
            ctx.save();
            for (let s = 0; s < SPOKES; s++) {
                const ang = (s / SPOKES) * Math.PI * 2;
                ctx.beginPath();
                ctx.moveTo(center.x, center.y);
                ctx.lineTo(
                    center.x + Math.cos(ang) * rings[rings.length - 1],
                    center.y + Math.sin(ang) * rings[rings.length - 1] * 0.50
                );
                ctx.strokeStyle = 'rgba(168,85,247,0.09)';
                ctx.lineWidth   = 0.8;
                ctx.stroke();
            }

            /* concentric elliptical rings */
            rings.forEach((r, ri) => {
                ctx.beginPath();
                for (let s = 0; s <= SPOKES; s++) {
                    const ang = (s / SPOKES) * Math.PI * 2;
                    // Slightly wavy ring (not perfect ellipse) for organic feel
                    const wobble = 1 + Math.sin(s * 1.3 + n) * 0.04;
                    const px = center.x + Math.cos(ang) * r * wobble;
                    const py = center.y + Math.sin(ang) * r * 0.50 * wobble;
                    s === 0 ? ctx.moveTo(px, py) : ctx.lineTo(px, py);
                }
                ctx.closePath();
                const ringAlpha = 0.18 - ri * 0.05;
                ctx.strokeStyle = `rgba(168,85,247,${ringAlpha})`;
                ctx.lineWidth   = 0.9;
                ctx.shadowColor = 'rgba(168,85,247,0.4)';
                ctx.shadowBlur  = 3;
                ctx.stroke();
                ctx.shadowBlur  = 0;
            });
            ctx.restore();
        }
    }

    /* =============================================
       7. MAIN ANIMATION LOOP
    ============================================= */
    const clock       = new THREE.Clock();
    let   lastElapsed = 0;
    const bodyPos     = new THREE.Vector3();
    const bodyQuat    = new THREE.Quaternion();
    const prevBodyPos = new THREE.Vector3();

    function animate() {
        requestAnimationFrame(animate);
        const elapsed = clock.getElapsedTime();
        const dt      = Math.min(elapsed - lastElapsed, 0.05);
        lastElapsed   = elapsed;

        /* smooth scroll tracking — works for both directions */
        displayT += (targetScrollT - displayT) * Math.min(dt * 3.8, 1);

        /* spider world position */
        bodyPos.copy(pathAt(displayT));

        /* orientation: lean into the zigzag direction, always face camera */
        const tang  = tangentAt(displayT);
        const roll  = -tang.x * 0.26; // lean left/right with horizontal movement
        const pitch =  tang.y * 0.10; // slight pitch into descent
        bodyQuat.setFromEuler(new THREE.Euler(pitch, 0, roll, 'XYZ'));

        /* apply transform */
        spiderRoot.position.copy(bodyPos);
        spiderRoot.quaternion.copy(bodyQuat);

        /* init feet on first frame */
        if (!spiderInit) {
            legs.forEach(l => l.initFoot(bodyPos, bodyQuat));
            spiderInit = true;
        }

        /* velocity for gait speed */
        const vel = bodyPos.clone().sub(prevBodyPos).divideScalar(Math.max(dt, 0.001));
        prevBodyPos.copy(bodyPos);
        const speed = vel.length();

        /* step cooldowns */
        stepCooldown.forEach((_, i) => { if (stepCooldown[i] > 0) stepCooldown[i] -= dt; });
        const anyStepping = legs.some(l => l.stepping);

        legs.forEach((leg, i) => {
            const canStep = (!anyStepping || leg.gaitGrp === steppingGroup)
                            && stepCooldown[i] <= 0;
            const started = leg.update(bodyPos, bodyQuat, dt, canStep);
            if (started) {
                stepCooldown[i] = 0.14 + (speed < 0.1 ? 0.10 : 0); // slower when idle
                steppingGroup   = leg.gaitGrp;
            }
        });

        /* eye glow pulse */
        eyeMeshes.forEach((e, i) => {
            e.material.emissiveIntensity = 1.8 + Math.sin(elapsed * 2.5 + i * 0.7) * 1.0;
        });

        /* lights follow spider */
        keyLight.position.set(bodyPos.x + 2.5, bodyPos.y + 2, 7);
        fillLight.position.set(bodyPos.x - 4, bodyPos.y + 1, 6);

        /* draw silk thread on canvas */
        drawSilk(displayT);

        renderer.render(scene, camera);
    }

    animate();

    /* =============================================
       8. MOUSE — spider face tracks cursor subtly
    ============================================= */
    document.addEventListener('mousemove', e => {
        const mx = (e.clientX / window.innerWidth  - 0.5) * 2;
        const my = (e.clientY / window.innerHeight - 0.5) * 2;
        gsap.to(bodyPivot.rotation, { y: mx * 0.18, x: -my * 0.10, duration: 0.65, overwrite: 'auto' });
    });

    /* =============================================
       9. RESIZE
    ============================================= */
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
        resizeWebCanvas();
    });

    /* =============================================
       10. SCROLL REVEAL
    ============================================= */
    const revObs = new IntersectionObserver(
        entries => entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); }),
        { threshold: 0.12 }
    );
    document.querySelectorAll('.reveal').forEach(el => revObs.observe(el));

    /* =============================================
       11. SKILL BARS
    ============================================= */
    const skillObs = new IntersectionObserver(
        entries => entries.forEach(e => {
            if (e.isIntersecting)
                e.target.querySelectorAll('.skill-fill').forEach(b => { b.style.width = b.dataset.width + '%'; });
        }),
        { threshold: 0.3 }
    );
    document.querySelectorAll('.skill-category').forEach(el => skillObs.observe(el));

})();
</script>
</body>
</html>
