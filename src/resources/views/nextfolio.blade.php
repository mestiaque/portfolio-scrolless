<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- ─── Primary SEO ─────────────────────────────────────────── --}}
    <title>{{ $seo['title'] }}</title>
    <meta name="description" content="{{ $seo['description'] }}">
    <meta name="keywords"    content="{{ $seo['keywords'] }}">
    <meta name="author"      content="{{ $seo['author'] }}">
    <meta name="robots"      content="index, follow">
    <link rel="canonical"    href="{{ $seo['url'] }}">

    {{-- ─── Open Graph ──────────────────────────────────────────── --}}
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="{{ $seo['title'] }}">
    <meta property="og:description" content="{{ $seo['description'] }}">
    <meta property="og:url"         content="{{ $seo['url'] }}">
    @if($seo['og_image'])
    <meta property="og:image"       content="{{ $seo['og_image'] }}">
    @endif
    <meta property="og:site_name"   content="{{ $seo['site_name'] }}">
    <meta property="og:locale"      content="en_US">

    {{-- ─── Twitter Card ───────────────────────────────────────── --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $seo['title'] }}">
    <meta name="twitter:description" content="{{ $seo['description'] }}">
    @if($seo['og_image'])
    <meta name="twitter:image"       content="{{ $seo['og_image'] }}">
    @endif
    <meta name="twitter:creator"     content="{{ $seo['twitter_handle'] }}">

    {{-- ─── Favicon ────────────────────────────────────────────── --}}
    <link rel="icon" href="{{ get_image('app_ico') ?? asset('assets/img/favicon/Encodex.ico') }}" type="image/x-icon">

    {{-- ─── JSON-LD Structured Data ───────────────────────────── --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Person",
      "name": "{{ $seo['author'] }}",
      "url": "{{ $seo['url'] }}",
      "sameAs": ["{{ $seo['github_url'] }}", "{{ $seo['linkedin_url'] }}"],
      "jobTitle": "{{ $seo['job_title'] }}",
      "description": "{{ $seo['description'] }}"
    }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        html { overflow-x: hidden; }
        html, body { background: #050811; color: #ededed; overscroll-behavior-y: none; }
        body { font-family: 'Inter', Arial, Helvetica, sans-serif; }

        /* ── Reveal-on-scroll ─────────────────────────────────── */
        .reveal { opacity: 0; transform: translateY(2rem); transition: opacity .7s ease-out, transform .7s ease-out; }
        .reveal.in { opacity: 1; transform: translateY(0); }

        /* ── Hero: scroll-frame canvas (all breakpoints) ──────────── */
        #hero { position: relative; width: 100%; }
        #hero-sticky {
            position: sticky; top: 0; left: 0; height: 100svh; width: 100%;
            overflow: hidden; background: #050811;
        }
        #hero-canvas { width: 100%; height: 100%; object-fit: cover; aspect-ratio: 16 / 9; }
        #hero-loading {
            position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
            background: #050811;
        }
        .spinner {
            height: 2rem; width: 2rem; border-radius: 9999px;
            border: 2px solid rgba(255,255,255,.2); border-top-color: rgba(255,255,255,.8);
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        .curtain { position: absolute; inset-inline: 0; z-index: 10; height: 50%; background: #050811; }
        .curtain-top { top: 0; }
        .curtain-bottom { bottom: 0; }

        @keyframes bounce {
            0%, 100% { transform: translateY(-15%); animation-timing-function: cubic-bezier(0.8,0,1,1); }
            50% { transform: translateY(0); animation-timing-function: cubic-bezier(0,0,0.2,1); }
        }
        .animate-bounce { animation: bounce 1s infinite; }

        /* ── Contact form success checkmark ──────────────────────── */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes drawCheck { to { stroke-dashoffset: 0; } }
        .fade-in { animation: fadeIn .4s ease-out; }
        .draw-check { animation: drawCheck .5s .15s ease-out forwards; }

        [hidden] { display: none !important; }

        /* "Neon blue" section background: ~75% black, ~25% neon blue
           (#1F51FF), blended flat, plus a very soft glow for a bit of
           depth without any pattern/lines. */
        .hex-section {
            position: relative;
            background-color: #050811;
            background-image: radial-gradient(ellipse 900px 500px at 15% 0%, rgba(31, 80, 255, 0.075), transparent 70%);
        }
    </style>
</head>
<body class="bg-black text-white">

<main class="w-full bg-black">

    {{-- ══════════════════════════ HERO — scroll-frame, all breakpoints ══════════════════════════ --}}
    <section id="hero" style="height: 400vh;" aria-label="Intro animation">
        <div id="hero-sticky">
            <canvas id="hero-canvas" aria-hidden="true"></canvas>
            <div id="hero-loading"><div class="spinner"></div></div>

            {{-- Hero copy overlay --}}
            <div id="hero-copy" class="pointer-events-none absolute inset-0 z-30 flex flex-col items-center justify-center px-6 text-center">
                <p class="mb-5 text-xs font-medium uppercase tracking-[0.35em] text-white/60 md:text-sm md:tracking-[0.4em]">{{ $portfolio['job_title'] }}</p>
                <span class="mb-5 block h-px w-10 bg-white/30 md:w-14"></span>
                <h1 class="text-[9vw] font-bold leading-[1.05] tracking-tight text-white md:text-[clamp(3rem,7vw,7rem)] md:leading-[0.98]">{{ $portfolio['name'] }}</h1>

                <div id="hero-cta" class="pointer-events-auto mt-8 flex items-center gap-3 md:mt-10 md:gap-4">
                    @if(!empty($portfolio['email']))
                    <a href="mailto:{{ $portfolio['email'] }}" aria-label="Email" class="flex h-11 w-11 items-center justify-center rounded-full border border-white/25 text-white/80 transition-colors duration-200 active:border-white active:text-white md:h-12 md:w-12 md:hover:border-white md:hover:text-white">
                        @include('pordfolio::partials.icon', ['name' => 'email'])
                    </a>
                    @endif
                    @if(!empty($portfolio['telegram']))
                    <a href="https://t.me/{{ ltrim($portfolio['telegram'], '@') }}" target="_blank" rel="noopener noreferrer" aria-label="Telegram" class="flex h-11 w-11 items-center justify-center rounded-full border border-white/25 text-white/80 transition-colors duration-200 active:border-white active:text-white md:h-12 md:w-12 md:hover:border-white md:hover:text-white">
                        @include('pordfolio::partials.icon', ['name' => 'telegram'])
                    </a>
                    @endif
                    @if(!empty($portfolio['phone']))
                    <a href="https://wa.me/{{ preg_replace('/[^\d]/', '', $portfolio['phone']) }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" class="flex h-11 w-11 items-center justify-center rounded-full border border-white/25 text-white/80 transition-colors duration-200 active:border-white active:text-white md:h-12 md:w-12 md:hover:border-white md:hover:text-white">
                        @include('pordfolio::partials.icon', ['name' => 'whatsapp'])
                    </a>
                    @endif
                    @foreach($portfolio['social_links'] as $social)
                    <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['label'] }}" class="flex h-11 w-11 items-center justify-center rounded-full border border-white/25 text-white/80 transition-colors duration-200 active:border-white active:text-white md:h-12 md:w-12 md:hover:border-white md:hover:text-white">
                        @include('pordfolio::partials.icon', ['name' => strtolower($social['label'])])
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Scroll indicator --}}
            <div id="scroll-hint" class="pointer-events-none absolute inset-x-0 bottom-8 z-20 flex flex-col items-center gap-2 transition-opacity duration-500 md:bottom-10">
                <span class="text-[10px] font-medium uppercase tracking-[0.35em] text-white/50">Scroll to explore</span>
                <span class="animate-bounce text-white/50">↓</span>
            </div>

            <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/60"></div>

            <div id="curtain-top" class="curtain curtain-top"></div>
            <div id="curtain-bottom" class="curtain curtain-bottom"></div>
        </div>
    </section>

    {{-- Single shared background for everything below the hero - painted
         once on this wrapper so the glow doesn't restart per section. --}}
    <div class="hex-section">

    {{-- ══════════════════════════ ABOUT ══════════════════════════ --}}
    <section class="py-28 text-white lg:py-40">
        <div class="mx-auto w-full max-w-2xl px-6 lg:max-w-4xl lg:px-12">
            <div class="reveal">
                <p class="mb-6 text-xs font-medium uppercase tracking-[0.4em] text-white/40">About</p>
                <p class="text-2xl font-medium leading-snug text-white/90 lg:max-w-2xl lg:text-3xl">{{ $portfolio['bio'] }}</p>
            </div>

            <div class="reveal mt-14 lg:mt-20">
                <ul class="grid grid-cols-4 gap-y-6 border-y border-white/10 py-8 lg:py-10">
                    @foreach($portfolio['stats'] as $stat)
                    <li class="text-center">
                        <p class="text-xl font-semibold text-white lg:text-3xl">{{ $stat['value'] }}</p>
                        <p class="mt-1 text-[10px] uppercase tracking-widest text-white/40 lg:text-xs">{{ $stat['label'] }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="reveal mt-14 lg:mt-20">
                <p class="mb-5 text-xs font-medium uppercase tracking-[0.4em] text-white/40">Expertise</p>
                <ul class="flex flex-wrap gap-2">
                    @foreach($portfolio['skills'] as $skill)
                    <li class="rounded-full border border-white/15 px-4 py-2 text-sm text-white/70">{{ $skill }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════ SELECTED WORK ══════════════════════════ --}}
    <section class="py-28 text-white lg:py-40">
        <div class="mx-auto w-full max-w-2xl px-6 lg:max-w-6xl lg:px-12">
            <p class="reveal mb-10 text-xs font-medium uppercase tracking-[0.4em] text-white/40 lg:mb-14">Selected Work</p>

            <div class="flex flex-col gap-6 lg:grid lg:grid-cols-2 lg:gap-8 xl:grid-cols-3">
                @foreach($portfolio['projects'] as $i => $project)
                @php $link = $project['demo'] ?: $project['github']; @endphp
                <{{ $link ? 'a' : 'div' }}
                    @if($link) href="{{ $link }}" target="_blank" rel="noopener noreferrer" @endif
                    class="reveal group block h-full rounded-2xl border border-white/10 bg-white/[0.03] p-6 transition-transform duration-300 active:scale-[0.98] lg:hover:-translate-y-1 lg:hover:border-white/25"
                    style="transition-delay: {{ $i * 60 }}ms"
                >
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-white/40">{{ $project['category'] ?? '' }}</p>
                            <h3 class="mt-1 text-xl font-semibold text-white">{{ $project['title'] }}</h3>
                        </div>
                        @if($link)
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/25 text-white transition-transform duration-300 group-active:translate-x-1 group-active:-translate-y-1">↗</span>
                        @endif
                    </div>
                    <p class="mt-4 text-sm leading-relaxed text-white/60">{{ $project['description'] }}</p>
                    <ul class="mt-5 flex flex-wrap gap-2">
                        @foreach($project['stack'] as $tech)
                        <li class="rounded-full border border-white/10 px-3 py-1 text-xs text-white/50">{{ $tech }}</li>
                        @endforeach
                    </ul>
                </{{ $link ? 'a' : 'div' }}>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════ EXPERIENCE + EDUCATION ══════════════════════════ --}}
    <section class="py-28 text-white lg:py-40">
        <div class="mx-auto w-full max-w-2xl px-6 lg:max-w-6xl lg:px-12">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16">
                <div>
                    <p class="reveal mb-10 text-xs font-medium uppercase tracking-[0.4em] text-white/40">Experience</p>
                    <ol class="relative border-l border-white/15 pl-6">
                        @foreach($portfolio['experience'] as $i => $item)
                        <li class="reveal relative mb-12 last:mb-0" style="transition-delay: {{ $i * 80 }}ms">
                            <span class="absolute -left-[29px] top-1 h-2.5 w-2.5 rounded-full bg-white"></span>
                            <p class="text-xs uppercase tracking-widest text-white/40">{{ $item['period'] }}</p>
                            <h3 class="mt-2 text-lg font-semibold text-white">{{ $item['role'] }}</h3>
                            <p class="text-sm text-white/50">{{ $item['company'] }}</p>
                            <p class="mt-3 text-sm leading-relaxed text-white/70">{{ $item['description'] }}</p>
                        </li>
                        @endforeach
                    </ol>
                </div>

                <div class="mt-20 lg:mt-0">
                    <p class="reveal mb-10 text-xs font-medium uppercase tracking-[0.4em] text-white/40">Education</p>
                    <ol class="relative border-l border-white/15 pl-6">
                        @foreach($portfolio['education'] as $i => $item)
                        <li class="reveal relative mb-12 last:mb-0" style="transition-delay: {{ $i * 80 }}ms">
                            <span class="absolute -left-[29px] top-1 h-2.5 w-2.5 rounded-full bg-white"></span>
                            <p class="text-xs uppercase tracking-widest text-white/40">{{ $item['period'] }}</p>
                            <h3 class="mt-2 text-lg font-semibold text-white">{{ $item['degree'] }}</h3>
                            <p class="text-sm text-white/50">{{ $item['institution'] }}</p>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════ CONTACT ══════════════════════════ --}}
    <footer class="px-6 pb-14 pt-28 text-white lg:px-12 lg:pb-20 lg:pt-40">
        <div class="mx-auto w-full max-w-2xl lg:max-w-6xl">
            <div class="reveal">
                <p class="mb-6 text-xs font-medium uppercase tracking-[0.4em] text-white/40">Contact</p>
                <h2 class="text-4xl font-semibold leading-[1.05] tracking-tight lg:text-6xl">Let's build something great.</h2>
            </div>

            <div class="lg:grid lg:grid-cols-2 lg:gap-16">
                {{-- Contact Hub --}}
                <ul class="mt-10 flex flex-col gap-3 lg:mt-14 lg:grid lg:grid-cols-2 lg:content-start lg:gap-3">
                    @if(!empty($portfolio['phone']))
                    <li>
                        <a href="tel:{{ preg_replace('/[^\d+]/', '', $portfolio['phone']) }}" class="reveal flex items-center gap-4 rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 transition-transform duration-200 active:scale-[0.98] lg:hover:border-white/25">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/70">@include('pordfolio::partials.icon', ['name' => 'phone'])</span>
                            <span><p class="text-sm font-medium text-white">Phone</p><p class="text-xs text-white/50">{{ $portfolio['phone'] }}</p></span>
                        </a>
                    </li>
                    @endif
                    @if(!empty($portfolio['email']))
                    <li>
                        <a href="mailto:{{ $portfolio['email'] }}" class="reveal flex items-center gap-4 rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 transition-transform duration-200 active:scale-[0.98] lg:hover:border-white/25">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/70">@include('pordfolio::partials.icon', ['name' => 'email'])</span>
                            <span><p class="text-sm font-medium text-white">Email</p><p class="text-xs text-white/50">{{ $portfolio['email'] }}</p></span>
                        </a>
                    </li>
                    @endif
                    @if(!empty($portfolio['address']))
                    <li>
                        <div class="reveal flex items-center gap-4 rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/70">@include('pordfolio::partials.icon', ['name' => 'address'])</span>
                            <span><p class="text-sm font-medium text-white">Address</p><p class="text-xs text-white/50">{{ $portfolio['address'] }}</p></span>
                        </div>
                    </li>
                    @endif
                    @if(!empty($portfolio['telegram']))
                    <li>
                        <a href="https://t.me/{{ ltrim($portfolio['telegram'], '@') }}" target="_blank" rel="noopener noreferrer" class="reveal flex items-center gap-4 rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 transition-transform duration-200 active:scale-[0.98] lg:hover:border-white/25">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/70">@include('pordfolio::partials.icon', ['name' => 'telegram'])</span>
                            <span><p class="text-sm font-medium text-white">Telegram</p><p class="text-xs text-white/50">{{ $portfolio['telegram'] }}</p></span>
                        </a>
                    </li>
                    @endif
                    @if(!empty($portfolio['phone']))
                    <li>
                        <a href="https://wa.me/{{ preg_replace('/[^\d]/', '', $portfolio['phone']) }}" target="_blank" rel="noopener noreferrer" class="reveal flex items-center gap-4 rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 transition-transform duration-200 active:scale-[0.98] lg:hover:border-white/25">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/70">@include('pordfolio::partials.icon', ['name' => 'whatsapp'])</span>
                            <span><p class="text-sm font-medium text-white">WhatsApp</p><p class="text-xs text-white/50">Chat instantly</p></span>
                        </a>
                    </li>
                    @endif
                    @foreach($portfolio['social_links'] as $social)
                    <li>
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="reveal flex items-center gap-4 rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 transition-transform duration-200 active:scale-[0.98] lg:hover:border-white/25">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/70">@include('pordfolio::partials.icon', ['name' => strtolower($social['label'])])</span>
                            <span><p class="text-sm font-medium text-white">{{ $social['label'] }}</p><p class="text-xs text-white/50">{{ preg_replace('#^https?://#', '', $social['url']) }}</p></span>
                        </a>
                    </li>
                    @endforeach
                </ul>

                {{-- Message form --}}
                <div class="mt-10 lg:mt-14">
                    <div id="contact-success" hidden class="flex flex-col items-center gap-4 rounded-2xl border border-emerald-400/20 bg-emerald-400/[0.04] py-12 text-center fade-in">
                        <span class="flex h-14 w-14 items-center justify-center rounded-full border-2 border-emerald-400 text-emerald-400">
                            <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M4 12.5 9.5 18 20 6" pathLength="1" stroke-dasharray="1" stroke-dashoffset="1" class="draw-check"></path>
                            </svg>
                        </span>
                        <p class="text-sm text-emerald-400">Message sent — thanks for reaching out!</p>
                        <button type="button" id="contact-reset" class="text-xs uppercase tracking-widest text-white/40 active:text-white/70">Send another</button>
                    </div>

                    <form id="contact-form" class="flex flex-col gap-4">
                        <input name="name" type="text" required placeholder="Your name" class="rounded-xl border border-white/15 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder:text-white/30 outline-none focus:border-white/40 disabled:opacity-50">
                        <input name="email" type="email" required placeholder="Your email" class="rounded-xl border border-white/15 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder:text-white/30 outline-none focus:border-white/40 disabled:opacity-50">
                        <input name="subject" type="text" required placeholder="Subject" class="rounded-xl border border-white/15 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder:text-white/30 outline-none focus:border-white/40 disabled:opacity-50">
                        <textarea name="message" required rows="4" placeholder="Your message" class="resize-none rounded-xl border border-white/15 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder:text-white/30 outline-none focus:border-white/40 disabled:opacity-50"></textarea>
                        <button type="submit" id="contact-submit" class="mt-2 rounded-xl bg-white py-3 text-sm font-medium text-black active:opacity-70 disabled:opacity-50">Send message</button>
                        <p id="contact-error" hidden class="text-sm text-red-400"></p>
                    </form>
                </div>
            </div>

            <p class="mt-14 border-t border-white/10 pt-8 text-xs text-white/30 lg:mt-20">
                © {{ date('Y') }} {{ $portfolio['name'] }}. All rights reserved.
            </p>
        </div>
    </footer>

    </div>

</main>

<script>
(function () {
    "use strict";

    /* ── Reveal-on-scroll (IntersectionObserver) ─────────────────────── */
    var revealEls = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('in'); });
    }

    /* ── Hero: scroll-frame canvas (all breakpoints) ─────────────────── */
    var FRAME_COUNT = {{ (int) $frameCount }};
    var heroSection = document.getElementById('hero');
    var stickyPane = document.getElementById('hero-sticky');
    var canvas = document.getElementById('hero-canvas');
    var loadingEl = document.getElementById('hero-loading');
    var heroCopy = document.getElementById('hero-copy');
    var scrollHint = document.getElementById('scroll-hint');
    var curtainTop = document.getElementById('curtain-top');
    var curtainBottom = document.getElementById('curtain-bottom');

    if (heroSection && canvas) {
        var ctx = canvas.getContext('2d');
        var images = new Array(FRAME_COUNT + 1);
        var loaded = {};
        var currentFrame = 0;
        var targetFrame = 0;
        var size = { width: 0, height: 0 };
        var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var priorityCount = 30;
        var loadedPriority = 0;
        var ready = false;
        var hasScrolled = false;

        var SPLIT_END = 0.18;
        var TEXT_OUT_END = 0.07;

        function frameUrl(i) {
            var n = String(i + 1).padStart(3, '0');
            return "{{ url('/frames') }}/frame-" + n + ".webp";
        }

        function loadFrame(i, onLoad) {
            if (i < 0 || i >= FRAME_COUNT) return;
            if (loaded[i]) { if (onLoad) onLoad(); return; }
            var img = new Image();
            img.decoding = 'async';
            img.onload = function () { loaded[i] = true; if (onLoad) onLoad(); };
            img.src = frameUrl(i);
            images[i] = img;
        }

        // The source footage is 16:9 landscape; on narrow portrait screens
        // (mobile) the cover-fit crop has to cut a lot of width away. The
        // subject sits right-of-centre in frame, so a plain 50% centre
        // crop was cutting into his face - bias the horizontal crop
        // toward FOCAL_X (fraction across the source image) instead.
        // Tune this if a future clip frames the subject differently.
        var FOCAL_X = 0.65;

        function drawFrame(i) {
            var img = images[i];
            if (!img || !img.complete || !img.naturalWidth || !size.width) return;
            ctx.clearRect(0, 0, size.width, size.height);
            var imgRatio = img.naturalWidth / img.naturalHeight;
            var boxRatio = size.width / size.height;
            var dw, dh, dx, dy;
            if (imgRatio > boxRatio) {
                dh = size.height; dw = dh * imgRatio;
                dx = Math.min(0, Math.max(size.width - dw, size.width / 2 - FOCAL_X * dw));
                dy = 0;
            } else {
                dw = size.width; dh = dw / imgRatio;
                dx = 0;
                dy = (size.height - dh) / 2;
            }
            ctx.drawImage(img, dx, dy, dw, dh);
        }

        function resizeCanvas() {
            var rect = stickyPane.getBoundingClientRect();
            var dpr = Math.min(window.devicePixelRatio || 1, 2);
            var w = Math.round(rect.width * dpr);
            var h = Math.round(rect.height * dpr);
            if (canvas.width !== w || canvas.height !== h) { canvas.width = w; canvas.height = h; }
            size = { width: w, height: h };
            drawFrame(currentFrame);
        }

        function computeTargetFrame() {
            var rect = heroSection.getBoundingClientRect();
            var vh = window.innerHeight;
            var scrollable = rect.height - vh;
            if (scrollable <= 0) return;
            var progress = Math.min(1, Math.max(0, -rect.top / scrollable));

            var frame = Math.round(progress * (FRAME_COUNT - 1));
            targetFrame = Math.min(FRAME_COUNT - 1, Math.max(0, frame));

            // split curtain
            var splitProgress = Math.min(1, progress / SPLIT_END);
            curtainTop.style.transform = 'translateY(-' + (splitProgress * 100) + '%)';
            curtainBottom.style.transform = 'translateY(' + (splitProgress * 100) + '%)';

            // hero text fade-out
            var textT = Math.min(1, progress / TEXT_OUT_END);
            heroCopy.style.opacity = String(1 - textT);
            heroCopy.style.transform = 'translateY(' + (-textT * 24) + 'px)';

            if (!hasScrolled && progress > 0.02) {
                hasScrolled = true;
                scrollHint.style.opacity = '0';
            }
        }

        for (var i = 0; i < priorityCount; i++) {
            loadFrame(i, function () {
                loadedPriority++;
                if (!ready && loadedPriority >= priorityCount) {
                    ready = true;
                    loadingEl.hidden = true;
                    drawFrame(currentFrame);
                }
            });
        }
        var idleLoad = function () {
            for (var j = priorityCount; j < FRAME_COUNT; j++) loadFrame(j);
        };
        if ('requestIdleCallback' in window) requestIdleCallback(idleLoad, { timeout: 3000 });
        else setTimeout(idleLoad, 300);

        window.addEventListener('scroll', computeTargetFrame, { passive: true });
        window.addEventListener('resize', function () { resizeCanvas(); computeTargetFrame(); });
        resizeCanvas();
        computeTargetFrame();

        function tick() {
            if (currentFrame !== targetFrame) {
                var next = reducedMotion ? targetFrame : currentFrame + (targetFrame - currentFrame) * 0.35;
                var snapped = Math.abs(targetFrame - next) < 0.6 ? targetFrame : Math.round(next);
                if (snapped !== currentFrame) {
                    currentFrame = snapped;
                    loadFrame(snapped);
                    drawFrame(snapped);
                }
            }
            requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }

    /* ── Contact form ─────────────────────────────────────────────────── */
    var form = document.getElementById('contact-form');
    var successEl = document.getElementById('contact-success');
    var errorEl = document.getElementById('contact-error');
    var submitBtn = document.getElementById('contact-submit');
    var resetBtn = document.getElementById('contact-reset');

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var data = new FormData(form);
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
            errorEl.hidden = true;

            fetch("{{ url('/api/messages-store') }}", {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({
                    name: data.get('name'),
                    email: data.get('email'),
                    subject: data.get('subject'),
                    message: data.get('message'),
                    device_info: navigator.userAgent
                })
            }).then(function (res) {
                return res.json().catch(function () { return {}; }).then(function (body) {
                    return { ok: res.ok, body: body };
                });
            }).then(function (result) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send message';
                if (!result.ok) {
                    errorEl.textContent = result.body.message || 'Something went wrong. Please try again.';
                    errorEl.hidden = false;
                    return;
                }
                form.hidden = true;
                successEl.hidden = false;
                form.reset();
            }).catch(function () {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send message';
                errorEl.textContent = 'Network error. Please try again.';
                errorEl.hidden = false;
            });
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            successEl.hidden = true;
            form.hidden = false;
        });
    }
})();
</script>

</body>
</html>
