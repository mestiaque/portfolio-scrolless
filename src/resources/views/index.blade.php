<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <meta property="og:image"       content="{{ $seo['og_image'] }}">
    <meta property="og:site_name"   content="{{ $seo['site_name'] }}">
    <meta property="og:locale"      content="en_US">

    {{-- ─── Twitter Card ───────────────────────────────────────── --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $seo['title'] }}">
    <meta name="twitter:description" content="{{ $seo['description'] }}">
    <meta name="twitter:image"       content="{{ $seo['og_image'] }}">
    <meta name="twitter:creator"     content="{{ $seo['twitter_handle'] }}">

    {{-- ─── Favicon ────────────────────────────────────────────── --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- ─── Bootstrap 5.3 ──────────────────────────────────────── --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous"> --}}


    {{-- ─── Bootstrap Icons ────────────────────────────────────── --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- ─── Google Fonts ───────────────────────────────────────── --}}
    <link rel="preconnect" href="https://googleapis.com">
    {{-- <link rel="preconnect" href="https://gstatic.com" crossorigin> --}}
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet"> --}}

    {{-- ─── JSON-LD Structured Data ───────────────────────────── --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Person",
      "name": "{{ $seo['author'] }}",
      "url": "{{ $seo['url'] }}",
      "sameAs": {
        "github": "{{ $seo['github_url'] }}",
        "linkedin": "{{ $seo['linkedin_url'] }}"
      },
      "jobTitle": "{{ $seo['job_title'] }}",
      "description": "{{ $seo['description'] }}"
    }
    </script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,900;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>

@include('pordfolio::css')
</head>
<body>

<div id="progress-bar"></div>
<div id="cur-ring"></div>
<div id="cur-dot"></div>

<nav id="nav" style="display:none">
  <span class="nav-logo">Elara Voss</span>
  <ul class="nav-links">
    <li><a href="#" onclick="return jumpTo(1)">Work</a></li>
    <li><a href="#" onclick="return jumpTo(2)">About</a></li>
    <li><a href="#" onclick="return jumpTo(4)">Contact</a></li>
  </ul>
</nav>

<div id="dots">
  <div class="dot active" onclick="jumpTo(0)"></div>
  <div class="dot" onclick="jumpTo(1)"></div>
  <div class="dot" onclick="jumpTo(2)"></div>
  <div class="dot" onclick="jumpTo(3)"></div>
  <div class="dot" onclick="jumpTo(4)"></div>
    {{-- <div class="dot" onclick="jumpTo(5)"></div> --}}
</div>

<canvas id="tunnel-canvas"></canvas>

<!-- SECTION 1 — HERO -->
<section class="scene active" id="s1" style="z-index:60">
      <div class="portal-frame bg-s1" id="pf1">
        <div class="ring-tunnel" id="rt1"></div>
        <div class="scene-content" >
            <p class="eyebrow">Creative Director &amp; Digital Sculptor</p>        
            @include('pordfolio::hero')
        </div>
        <div class="scroll-hint" aria-hidden="true"><span>Scroll</span><span class="bar"></span></div>
        <div class="ghost" style="right:-2vw;top:85vh;transform:translateY(-50%)" aria-hidden="true" style="">ME</div>
    </div>
</section>


<!-- SECTION 2 — ABOUT -->
<section class="scene" id="s2" style="z-index:50; ">
  <div class="portal-frame bg-s2" id="pf2">
    <div class="ring-tunnel" id="rt2"></div>
    <div class="scene-content">
        @include('pordfolio::about')
    </div>
    <div class="ghost" style="right:-2vw;top:1vh;transform:translateY(-50%)" aria-hidden="true" style="">ME</div>
  </div>
</section>


<!-- SECTION 3 — JOB EXPERIENCE -->
<section class="scene" id="s3" style="z-index:40">
  <div class="portal-frame bg-s3" id="pf3">
    <div class="ring-tunnel" id="rt3"></div>
    <div class="scene-content">
      <span class="rule"></span>
      <p class="eyebrow">Professional Journey</p>
      <h2 class="d-md">Building with <em class="g">logic</em>& scale.</h2>
        @include('pordfolio::jobexp')
    </div>
    <div class="ghost" style="right:-1vw;bottom:-4rem" aria-hidden="true">02</div>
  </div>
</section>


<!-- SECTION 4 — PROJECT -->
<section class="scene" id="s4" style="z-index:30">
  <div class="portal-frame bg-s4" id="pf4">
    <div class="ring-tunnel" id="rt4"></div>
    <div class="scene-content">
      <span class="rule" style="background:var(--rose)"></span>
      <p class="eyebrow">What I Do</p>
      <h2 class="d-lg">Services &amp;<em class="r">capabilities.</em></h2>
      @include('pordfolio::services')
    </div>
    <div class="ghost" style="left:-2vw;top:-3rem" aria-hidden="true">04</div>
  </div>
</section>

<!-- SECTION 5 — CONTACT -->
<section class="scene" id="s5" style="z-index:20">
  <div class="portal-frame bg-s5" id="pf5">
    <div class="ring-tunnel" id="rt5"></div>
    <div class="scene-content contact-wrap">
      @include('pordfolio::contact')
      {{-- <span class="rule" style="margin:0 auto 1.25rem;"></span> --}}
      {{-- <p class="eyebrow">Let's make something</p>
      <h2 class="d-lg" style="color:#1a1610;">Say <em class="r">hello.</em></h2>
      <a href="mailto:hello@elaravoss.com" class="contact-email">hello@elaravoss.com</a>
      <p class="body-t">Available for freelance engagements and long-term partnerships. Response time: usually same day.</p>
      <div class="socials"><a href="#">Instagram</a><a href="#">LinkedIn</a><a href="#">Behance</a><a href="#">Dribbble</a></div>
      <p style="font-size:.65rem;letter-spacing:.14em;text-transform:uppercase;color:#b0a898;margin-top:3.5rem;">© 2025 Elara Voss — All rights reserved</p> --}}
    </div>
    <div class="ghost" style="right:-1vw;bottom:-4rem" aria-hidden="true">05</div>
  </div>
</section>


@include('pordfolio::js')
</body>
</html>
