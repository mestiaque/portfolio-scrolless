<?php
return [

    /*
    |--------------------------------------------------------------------------
    | SEO Metadata
    |--------------------------------------------------------------------------
    */
    'seo' => [
        'title'          => 'Port3folio | Full Stack Developer',
        'description'    => 'Experienced full-stack Laravel developer building modern, performant web applications.',
        'keywords'       => 'Laravel, PHP, Full Stack Developer, Web Developer, Portfolio',
        'author'         => 'M. Estiaque Ahmed Khan',
        'og_image'       => '/frames/frame-156.webp',
        'site_name'      => 'Port3folio',
        'twitter_handle' => '@mestiaque',
        'github_url'     => 'https://github.com/mestiaque',
        'linkedin_url'   => 'https://linkedin.com/in/mestiaque',
        'job_title'      => 'Full Stack Laravel Developer',
    ],

    /*
    |--------------------------------------------------------------------------
    | Portfolio Sections
    |--------------------------------------------------------------------------
    | Each entry becomes one full-screen section.
    | Blade, nav-dots, navbar, and counter are ALL generated from this array.
    | Adding a section = appending one array entry. No JS/CSS edits needed.
    |
    | Built-in types:
    |   'hero'     — name, job title, stats, CTA buttons, animated orbs
    |   'about'    — photo, bio, skills, social links
    |   'projects' — card grid of projects
    |   'cards'    — generic icon/title/body grid (services, testimonials...)
    |   'generic'  — heading + body + optional CTA buttons (contact, etc.)
    |
    | Keys required for ALL types:  id, label, type
    | Optional for ALL types:       style (inline CSS), class (extra CSS class)
    |--------------------------------------------------------------------------
    */
    'portfolio' => [
        'sections' => [

            // ── HERO ──────────────────────────────────────────────────────
            [
                'id'        => 'hero',
                'label'     => 'Hero',
                'type'      => 'hero',
                'class'     => 'section-type-hero',
                'style'     => 'background: radial-gradient(ellipse 80% 60% at 50% 0%, #1e1b4b 0%, #0a0a14 70%);',
                'badge'     => 'Available for work',
                'name'      => 'M. Estiaque Ahmed Khan',
                'job_title' => 'Full Stack Laravel Developer',
                'tagline'   => 'crafting performant web experiences',
                'cv_url'    => '',
                'stats'     => [
                    ['value' => '5+',  'label' => 'Years Exp.'],
                    ['value' => '40+', 'label' => 'Projects'],
                    ['value' => '20+', 'label' => 'Clients'],
                    ['value' => '99%', 'label' => 'Satisfaction'],
                ],
            ],

            // ── ABOUT ─────────────────────────────────────────────────────
            [
                'id'           => 'about',
                'label'        => 'About',
                'type'         => 'about',
                'style'        => 'background: #0f172a;',
                'photo'        => '',
                'name'         => 'M. Estiaque Ahmed Khan',
                'heading'      => 'Building things<br>that <em style="color:var(--clr-accent);font-style:normal">actually work.</em>',
                'bio'          => 'I\'m a <strong>full-stack developer</strong> with deep expertise in <strong>Laravel</strong>, Vue.js, and modern DevOps practices.',
                'skills'       => [
                    'Laravel', 'PHP 8.3', 'Vue.js', 'Alpine.js', 'Livewire',
                    'MySQL', 'Redis', 'Docker', 'REST API', 'Tailwind CSS',
                    'Bootstrap 5', 'Git', 'AWS', 'CI/CD',
                ],
                'social_links' => [
                    ['label' => 'GitHub',   'icon' => 'github',   'url' => 'https://github.com/mestiaque'],
                    ['label' => 'LinkedIn', 'icon' => 'linkedin', 'url' => 'https://linkedin.com/in/mestiaque'],
                ],
            ],

            // ── PROJECTS ──────────────────────────────────────────────────
            [
                'id'         => 'projects',
                'label'      => 'Projects',
                'type'       => 'projects',
                'style'      => 'background: #111827; padding: 0 1rem;',
                'heading'    => 'Featured <span style="color:var(--clr-accent)">Projects</span>',
                'subheading' => 'Selected Work',
                'projects'   => [
                    [
                        'title'       => 'Port3folio Package',
                        'description' => 'A modular Laravel package for building dynamic, animated portfolio sites with zero config.',
                        'stack'       => ['Laravel 11', 'Blade', 'Bootstrap 5', 'jQuery'],
                        'icon'        => 'box-seam',
                        'image'       => '',
                        'demo'        => '',
                        'github'      => 'https://github.com/mestiaque/port3folio',
                    ],
                    [
                        'title'       => 'E-Commerce Platform',
                        'description' => 'High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.',
                        'stack'       => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Stripe'],
                        'icon'        => 'cart4',
                        'image'       => '',
                        'demo'        => '',
                        'github'      => '',
                    ],
                    [
                        'title'       => 'SaaS Analytics Dashboard',
                        'description' => 'Real-time analytics platform processing millions of events per day with customisable widget boards.',
                        'stack'       => ['Laravel', 'Livewire', 'Alpine.js', 'PostgreSQL', 'Chart.js'],
                        'icon'        => 'graph-up-arrow',
                        'image'       => '',
                        'demo'        => '',
                        'github'      => '',
                    ],
                ],
            ],

            // ── ADD MORE SECTIONS BELOW — NO CSS/JS CHANGES NEEDED ────────
            //
            // TYPE: cards  (services, testimonials, skills grid...)
            // [
            //     'id'         => 'services',
            //     'label'      => 'Services',
            //     'type'       => 'cards',
            //     'style'      => 'background: #0f172a;',
            //     'heading'    => 'What I <span style="color:var(--clr-accent)">Do</span>',
            //     'subheading' => 'Services',
            //     'cards'      => [
            //         ['icon' => 'code-slash',  'title' => 'Backend Dev',  'body' => 'Laravel, REST APIs, queues.'],
            //         ['icon' => 'phone',       'title' => 'Mobile',       'body' => 'React Native & PWA.'],
            //         ['icon' => 'cloud-check', 'title' => 'DevOps',       'body' => 'Docker, CI/CD, AWS.'],
            //     ],
            // ],
            //
            // TYPE: generic  (contact, coming-soon, anything custom...)
            // [
            //     'id'         => 'contact',
            //     'label'      => 'Contact',
            //     'type'       => 'generic',
            //     'style'      => 'background: #0a0a14;',
            //     'heading'    => 'Get In <span style="color:var(--clr-accent)">Touch</span>',
            //     'subheading' => 'Say Hello',
            //     'body'       => 'Open to freelance, contracts and full-time roles.',
            //     'cta'        => [
            //         ['label' => 'Email Me', 'url' => 'mailto:you@example.com', 'icon' => 'envelope', 'primary' => true],
            //         ['label' => 'LinkedIn', 'url' => 'https://linkedin.com/in/...', 'icon' => 'linkedin'],
            //     ],
            // ],
        ],
    ],
];
