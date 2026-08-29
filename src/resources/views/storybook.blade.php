<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>M. Estiaque Ahmed Khan | The Storybook Portfolio — Full-Stack Laravel Developer</title>
<meta name="description" content="A storybook-style portfolio of M. Estiaque Ahmed Khan, Software Engineer &amp; Full-Stack Laravel Developer. Turn the pages through About, Skills, Projects, Experience and Contact — told like a handwritten, vintage novel." />
<meta name="theme-color" content="#4a2c1a" />

<!-- Google Fonts: handwritten pairing + readable serif body -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600;700&family=Patrick+Hand&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Playfair+Display:ital,wght@0,600;0,700;1,500&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<style>
/* ============================================================
   RESET & BASE
   ============================================================ */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

:root{
  --paper:        #f3e9d2;
  --paper-alt:     #ece0c2;
  --paper-deep:    #e4d5ac;
  --paper-shadow:  #cdb888;
  --ink:           #2b2013;
  --ink-soft:      #4a3a26;
  --ink-faint:     #6b5940;
  --navy:          #1f3b5c;
  --navy-dark:     #14283f;
  --leather:       #4a2c1a;
  --leather-dark:  #2c1a0e;
  --leather-light: #6e4127;
  --gold:          #b1842f;
  --gold-light:    #d9b268;
  --crimson:       #7c2632;
  --crimson-light: #a3394a;
  --forest:        #385c40;
  --shadow-soft:   rgba(43, 33, 19, .20);
  --shadow-strong: rgba(20, 14, 8, .55);
  --space-1: .5rem;   /* 8px  */
  --space-2: 1rem;    /* 16px */
  --space-3: 1.5rem;  /* 24px */
  --space-4: 2rem;    /* 32px */
  --space-5: 3rem;    /* 48px */
  --space-6: 4rem;    /* 64px */
  --font-hand:  'Caveat', cursive;
  --font-hand2: 'Patrick Hand', cursive;
  --font-body:  'Lora', serif;
  --font-display: 'Playfair Display', serif;
  --radius-page: 6px;
  --ease-page: cubic-bezier(.65,0,.35,1);
}

html{
  scroll-behavior: smooth;
  scroll-padding-top: 24px;
}

body{
  font-family: var(--font-body);
  color: var(--ink);
  background: var(--leather-dark);
  overflow-x: hidden;
  line-height: 1.7;
  -webkit-font-smoothing: antialiased;
}

img{ max-width:100%; display:block; }
a{ color:inherit; }
ul,ol{ list-style:none; }
button{ font:inherit; cursor:pointer; background:none; border:none; color:inherit; }

::selection{ background: var(--gold-light); color: var(--ink); }

/* Focus states — accessibility first */
a:focus-visible,
button:focus-visible,
input:focus-visible,
textarea:focus-visible{
  outline: 3px solid var(--navy);
  outline-offset: 3px;
  border-radius: 2px;
}

/* ============================================================
   PAPER TEXTURE (pure CSS — layered gradients, no images)
   ============================================================ */
.paper-texture{ position:relative; background-color: var(--paper); }
.paper-texture::before{
  content:"";
  position:absolute; inset:0;
  pointer-events:none;
  background-image:
    radial-gradient(circle at 12% 22%, rgba(120,95,55,.05) 0, transparent 3%),
    radial-gradient(circle at 78% 14%, rgba(120,95,55,.045) 0, transparent 4%),
    radial-gradient(circle at 34% 68%, rgba(120,95,55,.05) 0, transparent 3%),
    radial-gradient(circle at 92% 82%, rgba(120,95,55,.04) 0, transparent 3%),
    radial-gradient(circle at 55% 45%, rgba(120,95,55,.035) 0, transparent 3%),
    repeating-linear-gradient(90deg, rgba(120,95,55,.03) 0px, transparent 1px, transparent 3px),
    repeating-linear-gradient(0deg, rgba(120,95,55,.025) 0px, transparent 1px, transparent 4px);
  background-size: 180px 180px, 220px 220px, 160px 160px, 210px 210px, 260px 260px, 3px 3px, 4px 4px;
  mix-blend-mode: multiply;
  opacity:.7;
  z-index:0;
}
.paper-texture::after{
  content:"";
  position:absolute; inset:0;
  pointer-events:none;
  background: radial-gradient(ellipse at 50% 0%, transparent 55%, rgba(76,52,24,.10) 100%);
  z-index:0;
}
.paper-texture > *{ position:relative; z-index:1; }

/* ============================================================
   READING PROGRESS
   ============================================================ */
.progress-track{
  position:fixed; top:0; left:0; right:0; height:5px;
  background: rgba(20,14,8,.35);
  z-index: 9998;
}
.progress-fill{
  height:100%; width:0%;
  background: linear-gradient(90deg, var(--gold), var(--crimson-light), var(--navy));
  box-shadow: 0 0 8px rgba(217,178,104,.6);
  transition: width .12s linear;
}

.bookmark-ribbon{
  position:fixed;
  top:0; right: 28px;
  width: 30px;
  height: 70px;
  background: linear-gradient(180deg, var(--crimson-light), var(--crimson));
  box-shadow: 0 4px 10px var(--shadow-strong);
  z-index: 9997;
  transition: height .18s var(--ease-page);
  clip-path: polygon(0 0, 100% 0, 100% 88%, 50% 100%, 0 88%);
}
@media (max-width: 640px){ .bookmark-ribbon{ display:none; } }

/* ============================================================
   PAGE-FLIP OVERLAY TRANSITION
   ============================================================ */
.flip-overlay{
  position:fixed; inset:0;
  z-index: 9999;
  pointer-events:none;
  perspective: 2400px;
  display:flex;
  opacity:0;
}
.flip-leaf{
  position:absolute; inset:0;
  transform-origin: left center;
  transform: rotateY(0deg);
  transform-style: preserve-3d;
}
.flip-leaf-face{
  position:absolute; inset:0;
  backface-visibility: hidden;
  background: var(--paper);
  display:flex; align-items:center; justify-content:center;
  box-shadow: inset 0 0 120px rgba(76,52,24,.25);
}
.flip-front{
  font-size: clamp(2.5rem, 8vw, 5rem);
  color: var(--leather);
}
.flip-back{
  transform: rotateY(180deg);
  background: var(--paper-alt);
}
.flip-overlay.active{
  opacity:1;
  pointer-events:auto;
}
.flip-overlay.active .flip-leaf{
  animation: pageTurn .74s var(--ease-page) forwards;
}
@keyframes pageTurn{
  0%   { transform: rotateY(0deg);   box-shadow: 6px 0 24px var(--shadow-strong); }
  48%  { transform: rotateY(-96deg); box-shadow: 30px 0 60px var(--shadow-strong); }
  100% { transform: rotateY(-180deg); box-shadow: 0 0 0 transparent; }
}

/* ============================================================
   TOC TOGGLE (mobile)
   ============================================================ */
.toc-toggle{
  position:fixed;
  bottom: var(--space-3);
  right: var(--space-3);
  z-index: 9500;
  width: 56px; height: 56px;
  border-radius: 50%;
  background: linear-gradient(160deg, var(--leather-light), var(--leather));
  color: var(--gold-light);
  font-size: 1.25rem;
  display:flex; align-items:center; justify-content:center;
  box-shadow: 0 8px 20px var(--shadow-strong), inset 0 0 0 2px rgba(217,178,104,.35);
  border: 1px solid rgba(217,178,104,.4);
}
@media (min-width: 961px){ .toc-toggle{ display:none; } }

/* ============================================================
   CHAPTER NAV — bookmark tabs / table of contents
   ============================================================ */
.chapter-nav{
  position:fixed;
  top:0; right:0;
  height:100vh;
  width: min(280px, 82vw);
  background: linear-gradient(160deg, var(--leather-light), var(--leather) 55%, var(--leather-dark));
  box-shadow: -10px 0 40px var(--shadow-strong);
  z-index: 9600;
  padding: var(--space-5) var(--space-3) var(--space-3);
  transform: translateX(100%);
  transition: transform .4s var(--ease-page);
  overflow-y:auto;
  border-left: 1px solid rgba(217,178,104,.3);
}
.chapter-nav.open{ transform: translateX(0); }
.nav-close{
  position:absolute; top: var(--space-2); right: var(--space-2);
  width:40px; height:40px; border-radius:50%;
  color: var(--gold-light); font-size:1.1rem;
  display:flex; align-items:center; justify-content:center;
}
.nav-close:hover{ background: rgba(217,178,104,.15); }
.nav-heading{
  font-family: var(--font-hand);
  font-size: 1.7rem;
  color: var(--gold-light);
  line-height:1.15;
  margin-bottom: var(--space-3);
  border-bottom: 1px dashed rgba(217,178,104,.4);
  padding-bottom: var(--space-2);
}
.tab-list{ display:flex; flex-direction:column; gap: .35rem; }
.tab-link{
  display:flex; align-items:center; gap: var(--space-2);
  padding: .7rem .9rem;
  border-radius: 4px;
  color: #ecdfc0;
  text-decoration:none;
  font-family: var(--font-hand2);
  font-size: 1.15rem;
  letter-spacing: .02em;
  transition: background .25s, transform .25s, color .25s;
  border-left: 3px solid transparent;
}
.tab-num{
  font-family: var(--font-display);
  font-style: italic;
  color: var(--gold-light);
  font-size: .95rem;
  width: 1.6rem;
  flex-shrink:0;
}
.tab-link:hover{ background: rgba(217,178,104,.12); transform: translateX(-4px); }
.tab-link.active{
  background: rgba(217,178,104,.18);
  border-left-color: var(--gold-light);
  color: #fff;
}
.nav-scrim{
  position:fixed; inset:0; background: rgba(10,7,4,.55);
  z-index: 9550; opacity:0; pointer-events:none; transition: opacity .35s;
  backdrop-filter: blur(2px);
}
.nav-scrim.show{ opacity:1; pointer-events:auto; }

@media (min-width: 961px){
  .chapter-nav{
    top:50%; right:0; transform: translate(0,-50%);
    height:auto; width: 92px;
    padding: var(--space-3) .6rem;
    border-radius: 14px 0 0 14px;
    transition: width .3s var(--ease-page);
  }
  .chapter-nav:hover, .chapter-nav:focus-within{ width: 250px; }
  .nav-close{ display:none; }
  .nav-heading{ font-size:1.1rem; text-align:center; }
  .tab-text{
    opacity:0; max-width:0; overflow:hidden; white-space:nowrap;
    transition: opacity .25s, max-width .3s;
  }
  .chapter-nav:hover .tab-text, .chapter-nav:focus-within .tab-text{
    opacity:1; max-width:160px; margin-left:.25rem;
  }
  .nav-scrim{ display:none; }
}

/* ============================================================
   BOOK COVER (HERO / TITLE PAGE)
   ============================================================ */
.cover{
  position:relative;
  min-height:100vh;
  display:flex; flex-direction:column; align-items:center; justify-content:center;
  text-align:center;
  padding: var(--space-6) var(--space-3) var(--space-5);
  background:
    radial-gradient(ellipse at 30% 20%, rgba(217,178,104,.10), transparent 55%),
    radial-gradient(ellipse at 80% 85%, rgba(124,38,50,.18), transparent 55%),
    linear-gradient(160deg, var(--leather-light) 0%, var(--leather) 45%, var(--leather-dark) 100%);
  color: var(--paper);
  overflow:hidden;
}
.cover::before{
  content:"";
  position:absolute; inset:14px;
  border: 2px solid rgba(217,178,104,.55);
  border-radius: 10px;
  pointer-events:none;
}
.cover::after{
  content:"";
  position:absolute; inset:26px;
  border: 1px solid rgba(217,178,104,.28);
  border-radius: 6px;
  pointer-events:none;
}
.cover-corner{
  position:absolute; width:64px; height:64px; pointer-events:none;
  border: 2px solid rgba(217,178,104,.6);
  opacity:.85;
}
.cover-corner.tl{ top:34px; left:34px; border-right:none; border-bottom:none; }
.cover-corner.tr{ top:34px; right:34px; border-left:none; border-bottom:none; }
.cover-corner.bl{ bottom:34px; left:34px; border-right:none; border-top:none; }
.cover-corner.br{ bottom:34px; right:34px; border-left:none; border-top:none; }

.cover-frame{ position:relative; z-index:2; max-width: 760px; }
.cover-kicker{
  font-family: var(--font-hand2);
  letter-spacing: .35em;
  text-transform:uppercase;
  font-size: clamp(.7rem, 1.4vw, .85rem);
  color: var(--gold-light);
  margin-bottom: var(--space-2);
}
.cover-title{
  font-family: var(--font-hand);
  font-weight:700;
  font-size: clamp(3rem, 9vw, 6.4rem);
  line-height: 1.05;
  color: #fbf3de;
  text-shadow: 0 3px 0 rgba(0,0,0,.25), 0 10px 30px rgba(0,0,0,.35);
}
.cover-role{
  font-family: var(--font-display);
  font-style: italic;
  font-weight:500;
  font-size: clamp(1rem, 2.4vw, 1.5rem);
  color: var(--paper-deep);
  margin-top: var(--space-2);
}
.cover-divider{
  display:flex; align-items:center; justify-content:center; gap: var(--space-2);
  margin: var(--space-4) auto;
  max-width: 320px;
  color: var(--gold-light);
}
.cover-divider span{ flex:1; height:1px; background: linear-gradient(90deg, transparent, rgba(217,178,104,.7), transparent); }
.cover-blurb{
  font-size: 1.05rem;
  color: var(--paper-deep);
  max-width: 46ch;
  margin: 0 auto var(--space-4);
}
.btn-open-book{
  display:inline-flex; align-items:center; gap: .6rem;
  padding: .95rem 2.1rem;
  background: linear-gradient(160deg, var(--gold-light), var(--gold));
  color: var(--leather-dark);
  font-family: var(--font-hand2);
  font-size: 1.25rem;
  letter-spacing:.03em;
  border-radius: 999px;
  box-shadow: 0 10px 26px rgba(0,0,0,.35), inset 0 1px 0 rgba(255,255,255,.4);
  transition: transform .25s, box-shadow .25s;
  text-decoration:none;
}
.btn-open-book:hover{ transform: translateY(-3px); box-shadow: 0 16px 34px rgba(0,0,0,.4); }
.btn-open-book i{ transition: transform .3s; }
.btn-open-book:hover i{ transform: translateX(4px); }

.cover-index{
  margin: var(--space-5) auto 0;
  max-width: 380px;
  background: rgba(243,233,210,.06);
  border: 1px solid rgba(217,178,104,.3);
  border-radius: 10px;
  padding: var(--space-3) var(--space-4);
  text-align:left;
  backdrop-filter: blur(3px);
}
.index-title{
  font-family: var(--font-hand);
  font-size: 1.5rem;
  color: var(--gold-light);
  margin-bottom: var(--space-2);
  text-align:center;
}
.cover-index ol{ display:flex; flex-direction:column; gap:.4rem; counter-reset:idx; }
.cover-index a{
  display:flex; justify-content:space-between; align-items:baseline;
  text-decoration:none;
  color: var(--paper-deep);
  font-family: var(--font-hand2);
  font-size: 1.05rem;
  padding: .3rem 0;
  border-bottom: 1px dotted rgba(217,178,104,.3);
  transition: color .2s, padding-left .2s;
}
.cover-index a:hover{ color: var(--gold-light); padding-left: .35rem; }
.cover-index a span{ font-family: var(--font-display); font-style:italic; color: var(--gold-light); font-size:.9rem; }

.scroll-cue{
  margin-top: var(--space-5);
  color: var(--gold-light);
  font-size: 1.4rem;
  animation: bob 2.2s ease-in-out infinite;
  position:relative; z-index:2;
}
@keyframes bob{ 0%,100%{ transform: translateY(0);} 50%{ transform: translateY(10px);} }

/* ============================================================
   CHAPTER PAGES — shared "open book" layout
   ============================================================ */
.chapter-page{
  position:relative;
  padding: var(--space-6) var(--space-3);
  background: var(--paper-alt);
}
.chapter-page.alt{ background: var(--paper); }
.chapter-page::before{
  content:"";
  position:absolute; inset:0;
  background: linear-gradient(90deg, rgba(76,52,24,.10) 0%, transparent 3%, transparent 97%, rgba(76,52,24,.10) 100%);
  pointer-events:none;
}
.page-spread{
  position:relative;
  max-width: 980px;
  margin: 0 auto;
  background: var(--paper);
  border-radius: var(--radius-page);
  box-shadow:
    0 1px 0 rgba(255,255,255,.5) inset,
    0 30px 60px -20px var(--shadow-strong),
    0 0 0 1px var(--paper-shadow);
  padding: var(--space-5) var(--space-5) var(--space-4);
  opacity:0;
  transform: rotateY(10deg) translateX(-16px);
  transform-origin: left center;
  transition: opacity .8s var(--ease-page), transform .8s var(--ease-page);
}
.page-spread.in-view{ opacity:1; transform: rotateY(0) translateX(0); }

.running-head{
  display:flex; justify-content:space-between; align-items:center;
  font-family: var(--font-hand2);
  font-size: .85rem;
  letter-spacing:.12em;
  text-transform:uppercase;
  color: var(--ink-faint);
  padding-bottom: var(--space-2);
  margin-bottom: var(--space-4);
  border-bottom: 1px dashed var(--paper-shadow);
}
.chapter-tag{ color: var(--crimson); font-weight:600; }

.chapter-title{
  font-family: var(--font-hand);
  font-weight:700;
  font-size: clamp(2.2rem, 5vw, 3.4rem);
  color: var(--leather);
  display:flex; align-items:center; gap: var(--space-2);
  margin-bottom: var(--space-4);
}
.chapter-title i{ color: var(--crimson); font-size: .72em; }

.page-columns{
  display:grid;
  grid-template-columns: 1fr;
  gap: var(--space-5);
}
@media (min-width: 800px){
  .page-columns.with-margin{ grid-template-columns: 1.7fr 1fr; }
}
.page-main p{ margin-bottom: var(--space-3); color: var(--ink-soft); font-size: 1.05rem; }
.drop-cap::first-letter{
  font-family: var(--font-display);
  font-size: 3.6rem;
  float:left;
  line-height:.82;
  padding: .06em .12em 0 0;
  color: var(--crimson);
  font-weight:700;
}

.page-footer{
  display:flex; align-items:center; justify-content:space-between;
  margin-top: var(--space-5);
  padding-top: var(--space-3);
  border-top: 1px dashed var(--paper-shadow);
}
.folio{ font-family: var(--font-hand2); color: var(--ink-faint); letter-spacing:.15em; }
.corner-turn{
  width:44px; height:44px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  background: var(--paper-deep);
  color: var(--leather);
  box-shadow: 0 4px 10px var(--shadow-soft), inset 0 0 0 1px var(--paper-shadow);
  transition: transform .25s, background .25s;
}
.corner-turn:hover{ transform: scale(1.08); background: var(--gold-light); }

/* ============================================================
   MARGINALIA / STICKY NOTE
   ============================================================ */
.marginalia{ display:flex; align-items:flex-start; justify-content:center; }
.sticky-note{
  position:relative;
  background: linear-gradient(160deg, #fdf3b0, #f7e685);
  padding: var(--space-3) var(--space-3) var(--space-4);
  width:100%; max-width:280px;
  box-shadow: 3px 6px 14px rgba(0,0,0,.22);
  transform: rotate(-3deg);
  font-family: var(--font-hand2);
  color: #4a3d0f;
  transition: transform .3s;
}
.sticky-note:hover{ transform: rotate(0deg) scale(1.02); }
.sticky-note .note-title{
  font-family: var(--font-hand);
  font-size: 1.5rem;
  font-weight:700;
  margin-bottom: var(--space-2);
  color: #4a3d0f;
  display:flex; align-items:center; gap:.4rem;
}
.sticky-note p{ font-size: 1rem; line-height:1.5; margin-bottom: var(--space-2); }
.sticky-note .note-meta{ font-size:.88rem; opacity:.75; }
.sticky-note .pin{
  position:absolute; top:-10px; left:50%; transform: translateX(-50%);
  width:18px; height:18px; border-radius:50%;
  background: radial-gradient(circle at 35% 30%, #ff8a8a, var(--crimson));
  box-shadow: 0 3px 4px rgba(0,0,0,.4);
}

/* ============================================================
   SKILL STAMPS (Chapter II)
   ============================================================ */
.stamp-grid{
  display:grid;
  grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
  gap: var(--space-3);
  margin-top: var(--space-2);
}
.stamp{
  position:relative;
  display:flex; align-items:center; justify-content:center;
  text-align:center;
  padding: var(--space-3) var(--space-2);
  min-height:76px;
  font-family: var(--font-hand2);
  font-size: 1rem;
  color: var(--navy);
  border: 2px solid var(--navy);
  border-radius: 6px;
  background: rgba(31,59,92,.04);
  transform: rotate(var(--r, 0deg));
  transition: transform .25s, background .25s, box-shadow .25s;
}
.stamp::before{
  content:"";
  position:absolute; inset:4px;
  border: 1px dashed var(--navy);
  border-radius:3px;
  opacity:.55;
  pointer-events:none;
}
.stamp:hover{ background: rgba(31,59,92,.1); transform: rotate(0deg) scale(1.05); box-shadow: 0 8px 16px var(--shadow-soft); }
.stamp:nth-child(3n){ --r: -2.4deg; border-color: var(--crimson); color: var(--crimson); }
.stamp:nth-child(3n) ::before{ border-color: var(--crimson); }
.stamp:nth-child(3n)::before{ border-color: var(--crimson); }
.stamp:nth-child(4n){ --r: 2deg; border-color: var(--forest); color: var(--forest); }
.stamp:nth-child(4n)::before{ border-color: var(--forest); }
.stamp:nth-child(5n){ --r: -1.2deg; }
.stamp:nth-child(2n){ --r: 1.6deg; }

/* ============================================================
   PROJECT STORY CARDS (Chapter III)
   ============================================================ */
.story-grid{
  display:grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-4);
  margin-top: var(--space-2);
}
.story-card{
  position:relative;
  background: var(--paper);
  padding: var(--space-4);
  box-shadow: 0 14px 30px -12px var(--shadow-strong), 0 0 0 1px var(--paper-shadow);
  border-radius: 4px;
  transform: rotate(var(--rot, 0deg));
  transition: transform .3s, box-shadow .3s;
}
.story-card:hover{ transform: rotate(0deg) translateY(-6px); box-shadow: 0 22px 40px -14px var(--shadow-strong), 0 0 0 1px var(--paper-shadow); }
.story-card:nth-child(1){ --rot: -1.4deg; }
.story-card:nth-child(2){ --rot: 1.1deg; }
.story-card:nth-child(3){ --rot: -0.8deg; }
.story-card:nth-child(4){ --rot: 1.6deg; }
.story-card::after{
  content:"";
  position:absolute; left: var(--space-4); right: var(--space-4); bottom:10px; height:1px;
  background: repeating-linear-gradient(90deg, var(--paper-shadow) 0 6px, transparent 6px 11px);
}
.story-icon{
  width:52px; height:52px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  background: linear-gradient(160deg, var(--navy), var(--navy-dark));
  color: var(--gold-light);
  font-size: 1.3rem;
  margin-bottom: var(--space-2);
  box-shadow: 0 6px 14px rgba(0,0,0,.25);
}
.story-title{
  font-family: var(--font-hand);
  font-size: 1.7rem;
  color: var(--leather);
  margin-bottom: .35rem;
}
.story-desc{ color: var(--ink-soft); font-size:.98rem; margin-bottom: var(--space-3); }
.story-stack{ display:flex; flex-wrap:wrap; gap:.4rem; }
.story-stack span{
  font-family: var(--font-hand2);
  font-size:.82rem;
  padding: .25rem .6rem;
  border-radius: 999px;
  background: rgba(31,59,92,.08);
  color: var(--navy);
  border: 1px solid rgba(31,59,92,.25);
}

/* ============================================================
   EXPERIENCE TIMELINE (Chapter IV)
   ============================================================ */
.timeline{ position:relative; margin-top: var(--space-3); padding-left: var(--space-5); }
.timeline::before{
  content:"";
  position:absolute; left: 14px; top:6px; bottom:6px; width:2px;
  background: repeating-linear-gradient(180deg, var(--crimson) 0 8px, transparent 8px 14px);
}
.timeline-entry{ position:relative; padding-bottom: var(--space-5); }
.timeline-entry:last-child{ padding-bottom:0; }
.timeline-entry::before{
  content:"";
  position:absolute; left: -34px; top:4px;
  width:16px; height:16px; border-radius:50%;
  background: var(--paper);
  border:3px solid var(--crimson);
  box-shadow: 0 0 0 4px var(--paper);
}
.timeline-dates{
  font-family: var(--font-hand2);
  color: var(--crimson);
  font-size: .95rem;
  letter-spacing:.06em;
  text-transform:uppercase;
  margin-bottom: .2rem;
}
.timeline-role{ font-family: var(--font-display); font-weight:700; font-size:1.35rem; color: var(--leather); }
.timeline-org{ font-style:italic; color: var(--ink-faint); margin-bottom: .5rem; font-size: 1rem; }
.timeline-desc{ color: var(--ink-soft); max-width: 60ch; }

/* ============================================================
   CONTACT — handwritten letter (Chapter V)
   ============================================================ */
.contact-wrap{ display:grid; grid-template-columns: 1fr; gap: var(--space-5); }
@media (min-width: 800px){ .contact-wrap{ grid-template-columns: 1fr 1.15fr; } }

.contact-info p{ color: var(--ink-soft); margin-bottom: var(--space-3); }
.contact-links{ display:flex; flex-direction:column; gap: var(--space-2); }
.contact-links a{
  display:flex; align-items:center; gap: var(--space-2);
  text-decoration:none;
  color: var(--ink);
  font-family: var(--font-hand2);
  font-size: 1.1rem;
  padding: .7rem .9rem;
  border-radius: 6px;
  border: 1px solid var(--paper-shadow);
  background: rgba(31,59,92,.03);
  transition: background .2s, transform .2s;
}
.contact-links a:hover{ background: rgba(31,59,92,.08); transform: translateX(4px); }
.seal{
  width:38px; height:38px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  background: radial-gradient(circle at 35% 30%, var(--crimson-light), var(--crimson));
  color: #f6e6c8;
  box-shadow: 0 3px 8px rgba(0,0,0,.3);
  flex-shrink:0;
}

.letter{
  position:relative;
  background:
    repeating-linear-gradient(180deg, transparent 0 34px, rgba(31,59,92,.10) 34px 35px),
    var(--paper);
  padding: var(--space-4);
  border-radius: 4px;
  box-shadow: 0 16px 30px -14px var(--shadow-strong), 0 0 0 1px var(--paper-shadow);
}
.letter::before{
  content:"";
  position:absolute; left: 42px; top:0; bottom:0; width:2px; background: rgba(124,38,50,.25);
}
.field{ margin-bottom: var(--space-3); position:relative; z-index:1; }
.field label{
  display:block;
  font-family: var(--font-hand2);
  font-size: 1.05rem;
  color: var(--ink-faint);
  margin-bottom: .3rem;
}
.field input, .field textarea{
  width:100%;
  background: transparent;
  border:none;
  border-bottom: 1px solid rgba(43,32,19,.3);
  font-family: var(--font-hand);
  font-size: 1.3rem;
  color: var(--ink);
  padding: .35rem .1rem;
  resize: vertical;
}
.field textarea{ min-height:110px; line-height:1.6; }
.field input:focus, .field textarea:focus{ border-bottom-color: var(--navy); }
.field input::placeholder, .field textarea::placeholder{ color: rgba(43,32,19,.35); font-family: var(--font-body); font-size:1rem; }

.btn-send{
  display:inline-flex; align-items:center; gap:.6rem;
  padding: .85rem 1.9rem;
  background: linear-gradient(160deg, var(--navy), var(--navy-dark));
  color: #f3e9d2;
  font-family: var(--font-hand2);
  font-size: 1.2rem;
  border-radius: 999px;
  box-shadow: 0 10px 22px rgba(20,40,63,.4);
  transition: transform .25s, box-shadow .25s, opacity .2s;
}
.btn-send:hover{ transform: translateY(-2px); box-shadow: 0 14px 28px rgba(20,40,63,.45); }
.btn-send:disabled{ opacity:.6; cursor:not-allowed; transform:none; }

.form-status{
  margin-top: var(--space-3);
  font-family: var(--font-hand2);
  font-size: 1.1rem;
  padding: .7rem 1rem;
  border-radius: 6px;
  display:none;
  align-items:center; gap:.5rem;
}
.form-status.show{ display:flex; }
.form-status.ok{ background: rgba(56,92,64,.12); color: var(--forest); border:1px solid rgba(56,92,64,.35); }
.form-status.err{ background: rgba(124,38,50,.1); color: var(--crimson); border:1px solid rgba(124,38,50,.35); }

/* ============================================================
   BACK COVER / FOOTER
   ============================================================ */
.back-cover{
  position:relative;
  background: linear-gradient(160deg, var(--leather-light), var(--leather) 50%, var(--leather-dark));
  color: var(--paper-deep);
  padding: var(--space-6) var(--space-3) var(--space-4);
  text-align:center;
}
.back-cover::before{
  content:"";
  position:absolute; inset:14px;
  border: 1px solid rgba(217,178,104,.35);
  border-radius: 8px;
  pointer-events:none;
}
.the-end{
  font-family: var(--font-hand);
  font-size: clamp(2.2rem, 6vw, 3.4rem);
  color: var(--gold-light);
  margin-bottom: var(--space-2);
}
.back-cover p.tagline{ max-width: 46ch; margin: 0 auto var(--space-4); font-style:italic; }
.footer-socials{ display:flex; justify-content:center; gap: var(--space-3); margin-bottom: var(--space-4); flex-wrap:wrap; }
.footer-socials a{
  width:48px; height:48px; border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  border: 1px solid rgba(217,178,104,.4);
  color: var(--gold-light);
  font-size:1.15rem;
  transition: background .2s, transform .2s;
}
.footer-socials a:hover{ background: rgba(217,178,104,.15); transform: translateY(-3px); }
.footer-toc{ display:flex; flex-wrap:wrap; justify-content:center; gap: var(--space-3); margin-bottom: var(--space-4); font-family: var(--font-hand2); }
.footer-toc a{ text-decoration:none; color: var(--paper-deep); opacity:.85; }
.footer-toc a:hover{ opacity:1; color: var(--gold-light); }
.footer-fine{ font-size:.85rem; opacity:.65; }
.back-to-top{
  display:inline-flex; align-items:center; gap:.4rem;
  margin-top: var(--space-3);
  font-family: var(--font-hand2);
  color: var(--gold-light);
  text-decoration:none;
  font-size:1rem;
}

/* ============================================================
   REVEAL ANIMATIONS (utility)
   ============================================================ */
.reveal{ opacity:0; transform: translateY(22px); transition: opacity .7s ease, transform .7s ease; }
.reveal.in-view{ opacity:1; transform: translateY(0); }
.reveal-delay-1.in-view{ transition-delay:.08s; }
.reveal-delay-2.in-view{ transition-delay:.16s; }
.reveal-delay-3.in-view{ transition-delay:.24s; }
.reveal-delay-4.in-view{ transition-delay:.32s; }

@media (prefers-reduced-motion: reduce){
  html{ scroll-behavior:auto; }
  *{ animation-duration: .01ms !important; animation-iteration-count:1 !important; transition-duration:.01ms !important; }
}

/* ============================================================
   RESPONSIVE TWEAKS
   ============================================================ */
@media (max-width: 640px){
  .page-spread{ padding: var(--space-4) var(--space-3); }
  .chapter-title{ font-size: clamp(1.9rem, 8vw, 2.6rem); }
  .cover-index{ padding: var(--space-3); }
  .sticky-note{ max-width:100%; }
  .timeline{ padding-left: var(--space-4); }
  .timeline-entry::before{ left:-28px; }
}
</style>
</head>
<body>

<!-- Reading progress -->
<div class="progress-track" aria-hidden="true"><div class="progress-fill" id="progressFill"></div></div>
<div class="bookmark-ribbon" id="bookmarkRibbon" aria-hidden="true"></div>

<!-- Page-turn overlay -->
<div class="flip-overlay" id="flipOverlay" aria-hidden="true">
  <div class="flip-leaf">
    <div class="flip-leaf-face flip-front"><i class="fa-solid fa-feather-pointed"></i></div>
    <div class="flip-leaf-face flip-back"></div>
  </div>
</div>

<!-- Mobile TOC toggle -->
<button class="toc-toggle" id="tocToggle" aria-expanded="false" aria-controls="chapterNav" aria-label="Open table of contents">
  <i class="fa-solid fa-bookmark"></i>
</button>
<div class="nav-scrim" id="navScrim"></div>

<!-- Chapter bookmark navigation -->
<nav class="chapter-nav" id="chapterNav" aria-label="Chapter navigation">
  <button class="nav-close" id="navClose" aria-label="Close table of contents"><i class="fa-solid fa-xmark"></i></button>
  <p class="nav-heading">Contents</p>
  <ul class="tab-list">
    <li><a href="#cover" class="tab-link" data-target="cover"><span class="tab-num">✦</span><span class="tab-text">Cover</span></a></li>
    <li><a href="#chapter-1" class="tab-link" data-target="chapter-1"><span class="tab-num">I</span><span class="tab-text">About</span></a></li>
    <li><a href="#chapter-2" class="tab-link" data-target="chapter-2"><span class="tab-num">II</span><span class="tab-text">Skills</span></a></li>
    <li><a href="#chapter-3" class="tab-link" data-target="chapter-3"><span class="tab-num">III</span><span class="tab-text">Projects</span></a></li>
    <li><a href="#chapter-4" class="tab-link" data-target="chapter-4"><span class="tab-num">IV</span><span class="tab-text">Experience</span></a></li>
    <li><a href="#chapter-5" class="tab-link" data-target="chapter-5"><span class="tab-num">V</span><span class="tab-text">Contact</span></a></li>
  </ul>
</nav>

<main id="top">

  <!-- ============ COVER / TITLE PAGE ============ -->
  <header class="cover" id="cover">
    <span class="cover-corner tl" aria-hidden="true"></span>
    <span class="cover-corner tr" aria-hidden="true"></span>
    <span class="cover-corner bl" aria-hidden="true"></span>
    <span class="cover-corner br" aria-hidden="true"></span>

    <div class="cover-frame">
      <p class="cover-kicker">A Software Engineer's Story</p>
      <h1 class="cover-title">M. Estiaque<br>Ahmed Khan</h1>
      <p class="cover-role">Software Engineer &mdash; Full-Stack Laravel Developer</p>

      <div class="cover-divider" aria-hidden="true"><span></span><i class="fa-solid fa-feather"></i><span></span></div>

      <p class="cover-blurb">Bound within these pages: five chapters of code, craft, and continuous
        learning &mdash; from first principles to production systems. Turn the page to begin.</p>

      <a href="#chapter-1" class="btn-open-book" data-target="chapter-1">
        <i class="fa-solid fa-book-open"></i> Open the Book
      </a>

      <nav class="cover-index" aria-label="Table of contents">
        <p class="index-title">Contents</p>
        <ol>
          <li><a data-target="chapter-1" href="#chapter-1">About the Author <span>I</span></a></li>
          <li><a data-target="chapter-2" href="#chapter-2">Skills &amp; Craft <span>II</span></a></li>
          <li><a data-target="chapter-3" href="#chapter-3">Projects &amp; Stories <span>III</span></a></li>
          <li><a data-target="chapter-4" href="#chapter-4">Experience <span>IV</span></a></li>
          <li><a data-target="chapter-5" href="#chapter-5">Get in Touch <span>V</span></a></li>
        </ol>
      </nav>
    </div>

    <button class="scroll-cue" data-target="chapter-1" aria-label="Scroll to first chapter">
      <i class="fa-solid fa-chevron-down"></i>
    </button>
  </header>

  <!-- ============ CHAPTER I — ABOUT ============ -->
  <section class="chapter-page paper-texture" id="chapter-1" aria-labelledby="ch1-title">
    <div class="page-spread reveal">
      <div class="running-head">
        <span class="chapter-tag">Chapter I</span>
        <span class="chapter-page-no">About the Author</span>
      </div>
      <h2 class="chapter-title" id="ch1-title"><i class="fa-solid fa-feather-pointed"></i> About</h2>

      <div class="page-columns with-margin">
        <div class="page-main">
          <p class="drop-cap">Full-stack developer with hands-on experience across frontend
            optimization, database management, PHP/Laravel web application development, custom
            inventory management modules, enterprise automation solutions, and ERP systems
            integration.</p>
          <p>Every project is treated like a new chapter &mdash; a problem worth understanding
            before a single line is written, and a story worth telling cleanly once it ships.
            The chapters ahead cover the tools of the trade, a handful of projects worth
            bragging about, the roles that shaped the craft, and an easy way to get in touch.</p>
          <p>Turn the page for the toolbox, or skip ahead using the bookmarks on the edge of
            the book.</p>
        </div>
        <aside class="marginalia" aria-label="Handwritten education note">
          <div class="sticky-note note-1">
            <span class="pin" aria-hidden="true"></span>
            <p class="note-title"><i class="fa-solid fa-graduation-cap"></i> Education</p>
            <p><strong>MSc, Computer Science</strong><br>Uttara University<br><span class="note-meta">Passing Year: 2025</span></p>
            <p><strong>BSc, Computer Science &amp; Engineering</strong><br>Uttara University<br><span class="note-meta">Passing Year: 2021</span></p>
          </div>
        </aside>
      </div>

      <div class="page-footer">
        <button class="corner-turn prev" data-target="cover" aria-label="Back to cover"><i class="fa-solid fa-angle-left"></i></button>
        <span class="folio">&mdash; 01 &mdash;</span>
        <button class="corner-turn next" data-target="chapter-2" aria-label="Next chapter: Skills"><i class="fa-solid fa-angle-right"></i></button>
      </div>
    </div>
  </section>

  <!-- ============ CHAPTER II — SKILLS ============ -->
  <section class="chapter-page alt paper-texture" id="chapter-2" aria-labelledby="ch2-title">
    <div class="page-spread reveal">
      <div class="running-head">
        <span class="chapter-tag">Chapter II</span>
        <span class="chapter-page-no">Skills &amp; Craft</span>
      </div>
      <h2 class="chapter-title" id="ch2-title"><i class="fa-solid fa-stamp"></i> Skills</h2>
      <p style="color:var(--ink-soft); max-width:65ch; margin-bottom: var(--space-4);">
        A collection of tools and techniques, stamped into the margins like a well-travelled
        passport &mdash; each one earned through real projects, not just tutorials.
      </p>

      <ul class="stamp-grid">
        <li class="stamp">PHP 8</li>
        <li class="stamp">Laravel</li>
        <li class="stamp">JavaScript (ES6+)</li>
        <li class="stamp">Vue.js</li>
        <li class="stamp">Alpine.js</li>
        <li class="stamp">Livewire</li>
        <li class="stamp">MySQL</li>
        <li class="stamp">PostgreSQL</li>
        <li class="stamp">Redis</li>
        <li class="stamp">REST API Design</li>
        <li class="stamp">Docker</li>
        <li class="stamp">Git</li>
        <li class="stamp">AWS</li>
        <li class="stamp">Tailwind CSS</li>
        <li class="stamp">Bootstrap 5</li>
        <li class="stamp">CI/CD</li>
        <li class="stamp">Database Optimization</li>
        <li class="stamp">ERP Integration</li>
      </ul>

      <div class="page-footer">
        <button class="corner-turn prev" data-target="chapter-1" aria-label="Previous chapter: About"><i class="fa-solid fa-angle-left"></i></button>
        <span class="folio">&mdash; 02 &mdash;</span>
        <button class="corner-turn next" data-target="chapter-3" aria-label="Next chapter: Projects"><i class="fa-solid fa-angle-right"></i></button>
      </div>
    </div>
  </section>

  <!-- ============ CHAPTER III — PROJECTS ============ -->
  <section class="chapter-page paper-texture" id="chapter-3" aria-labelledby="ch3-title">
    <div class="page-spread reveal">
      <div class="running-head">
        <span class="chapter-tag">Chapter III</span>
        <span class="chapter-page-no">Projects &amp; Stories</span>
      </div>
      <h2 class="chapter-title" id="ch3-title"><i class="fa-solid fa-scroll"></i> Projects</h2>
      <p style="color:var(--ink-soft); max-width:65ch; margin-bottom: var(--space-4);">
        Four short stories from the workshop &mdash; each one a system built, shipped, and lived in.
      </p>

      <div class="story-grid">
        <article class="story-card">
          <div class="story-icon"><i class="fa-solid fa-book-bookmark"></i></div>
          <h3 class="story-title">Port3folio Package</h3>
          <p class="story-desc">A modular Laravel package for building dynamic, animated
            portfolio sites with zero config.</p>
          <div class="story-stack">
            <span>Laravel 11</span><span>Blade</span><span>Bootstrap 5</span><span>jQuery</span>
          </div>
        </article>

        <article class="story-card">
          <div class="story-icon"><i class="fa-solid fa-cart-shopping"></i></div>
          <h3 class="story-title">E-Commerce Platform</h3>
          <p class="story-desc">High-performance multi-vendor marketplace with real-time order
            tracking and payment gateway integration.</p>
          <div class="story-stack">
            <span>Laravel</span><span>Vue.js</span><span>MySQL</span><span>Redis</span><span>Stripe</span>
          </div>
        </article>

        <article class="story-card">
          <div class="story-icon"><i class="fa-solid fa-chart-line"></i></div>
          <h3 class="story-title">SaaS Analytics Dashboard</h3>
          <p class="story-desc">Real-time analytics platform processing millions of events per
            day with customizable widget boards.</p>
          <div class="story-stack">
            <span>Laravel</span><span>Livewire</span><span>Alpine.js</span><span>PostgreSQL</span><span>Chart.js</span>
          </div>
        </article>

        <article class="story-card">
          <div class="story-icon"><i class="fa-solid fa-warehouse"></i></div>
          <h3 class="story-title">Inventory Management System</h3>
          <p class="story-desc">Custom-built inventory &amp; ERP automation module for enterprise
            clients &mdash; stock tracking, procurement workflows, and reporting.</p>
          <div class="story-stack">
            <span>PHP</span><span>Laravel</span><span>MySQL</span><span>REST API</span>
          </div>
        </article>
      </div>

      <div class="page-footer">
        <button class="corner-turn prev" data-target="chapter-2" aria-label="Previous chapter: Skills"><i class="fa-solid fa-angle-left"></i></button>
        <span class="folio">&mdash; 03 &mdash;</span>
        <button class="corner-turn next" data-target="chapter-4" aria-label="Next chapter: Experience"><i class="fa-solid fa-angle-right"></i></button>
      </div>
    </div>
  </section>

  <!-- ============ CHAPTER IV — EXPERIENCE ============ -->
  <section class="chapter-page alt paper-texture" id="chapter-4" aria-labelledby="ch4-title">
    <div class="page-spread reveal">
      <div class="running-head">
        <span class="chapter-tag">Chapter IV</span>
        <span class="chapter-page-no">Experience</span>
      </div>
      <h2 class="chapter-title" id="ch4-title"><i class="fa-solid fa-timeline"></i> Experience</h2>

      <div class="timeline">
        <div class="timeline-entry">
          <p class="timeline-dates">2025 &ndash; Present</p>
          <h3 class="timeline-role">Software Engineer</h3>
          <p class="timeline-org">Natore IT</p>
          <p class="timeline-desc">Frontend optimization and database management for local
            business clients.</p>
        </div>
        <div class="timeline-entry">
          <p class="timeline-dates">2023 &ndash; 2025</p>
          <h3 class="timeline-role">Software Developer</h3>
          <p class="timeline-org">Isotope IT</p>
          <p class="timeline-desc">Specialized in PHP/Laravel web applications and custom
            inventory management modules.</p>
        </div>
        <div class="timeline-entry">
          <p class="timeline-dates">2022 &ndash; 2023</p>
          <h3 class="timeline-role">Software Engineer</h3>
          <p class="timeline-org">Barcode Tech Automation Ltd</p>
          <p class="timeline-desc">Leading development of enterprise automation solutions and
            ERP systems integration.</p>
        </div>
      </div>

      <div class="page-footer">
        <button class="corner-turn prev" data-target="chapter-3" aria-label="Previous chapter: Projects"><i class="fa-solid fa-angle-left"></i></button>
        <span class="folio">&mdash; 04 &mdash;</span>
        <button class="corner-turn next" data-target="chapter-5" aria-label="Next chapter: Contact"><i class="fa-solid fa-angle-right"></i></button>
      </div>
    </div>
  </section>

  <!-- ============ CHAPTER V — CONTACT ============ -->
  <section class="chapter-page paper-texture" id="chapter-5" aria-labelledby="ch5-title">
    <div class="page-spread reveal">
      <div class="running-head">
        <span class="chapter-tag">Chapter V</span>
        <span class="chapter-page-no">Get in Touch</span>
      </div>
      <h2 class="chapter-title" id="ch5-title"><i class="fa-solid fa-envelope-open-text"></i> Contact</h2>

      <div class="contact-wrap">
        <div class="contact-info">
          <p>Have a project, a role, or just a question about a chapter above? Write a letter
            below, or reach out directly &mdash; every message gets a reply.</p>
          <div class="contact-links">
            <a href="mailto:mrm.khan.1298@gmail.com">
              <span class="seal"><i class="fa-solid fa-envelope"></i></span> mrm.khan.1298@gmail.com
            </a>
            <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer">
              <span class="seal"><i class="fa-brands fa-github"></i></span> github.com/mestiaque
            </a>
            <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer">
              <span class="seal"><i class="fa-brands fa-linkedin-in"></i></span> linkedin.com/in/mestiaque
            </a>
          </div>
        </div>

        <form class="letter" id="contactForm" novalidate>
          <div class="field">
            <label for="f-name">Dear Estiaque, my name is</label>
            <input type="text" id="f-name" name="name" placeholder="Your name" required autocomplete="name" />
          </div>
          <div class="field">
            <label for="f-email">You may write back to me at</label>
            <input type="email" id="f-email" name="email" placeholder="you@example.com" required autocomplete="email" />
          </div>
          <div class="field">
            <label for="f-subject">This letter is about</label>
            <input type="text" id="f-subject" name="subject" placeholder="Subject" required />
          </div>
          <div class="field">
            <label for="f-message">And here is what I'd like to say</label>
            <textarea id="f-message" name="message" placeholder="Write your message here..." required></textarea>
          </div>
          <button type="submit" class="btn-send" id="sendBtn">
            <i class="fa-solid fa-paper-plane"></i> <span id="sendBtnText">Send the Letter</span>
          </button>
          <div class="form-status" id="formStatus" role="status" aria-live="polite"></div>
        </form>
      </div>

      <div class="page-footer">
        <button class="corner-turn prev" data-target="chapter-4" aria-label="Previous chapter: Experience"><i class="fa-solid fa-angle-left"></i></button>
        <span class="folio">&mdash; 05 &mdash;</span>
        <button class="corner-turn next" data-target="back-cover" aria-label="Go to back cover"><i class="fa-solid fa-angle-right"></i></button>
      </div>
    </div>
  </section>

</main>

<!-- ============ BACK COVER ============ -->
<footer class="back-cover" id="back-cover">
  <p class="the-end">The End &mdash; or just the beginning</p>
  <p class="tagline">Thank you for reading this far. There are always more chapters to write &mdash;
    let's start the next one together.</p>

  <div class="footer-socials">
    <a href="mailto:mrm.khan.1298@gmail.com" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
    <a href="https://github.com/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
    <a href="https://linkedin.com/in/mestiaque" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
  </div>

  <nav class="footer-toc" aria-label="Footer chapter links">
    <a data-target="chapter-1" href="#chapter-1">About</a>
    <a data-target="chapter-2" href="#chapter-2">Skills</a>
    <a data-target="chapter-3" href="#chapter-3">Projects</a>
    <a data-target="chapter-4" href="#chapter-4">Experience</a>
    <a data-target="chapter-5" href="#chapter-5">Contact</a>
  </nav>

  <p class="footer-fine">&copy; <span id="yearNow">2026</span> M. Estiaque Ahmed Khan. Handwritten &amp; hand-coded, one page at a time.</p>
  <a class="back-to-top" data-target="cover" href="#cover"><i class="fa-solid fa-arrow-up"></i> Back to the cover</a>
</footer>

<script>
(function(){
  "use strict";

  /* ---------- Element refs ---------- */
  var progressFill   = document.getElementById('progressFill');
  var bookmarkRibbon = document.getElementById('bookmarkRibbon');
  var flipOverlay    = document.getElementById('flipOverlay');
  var chapterNav     = document.getElementById('chapterNav');
  var tocToggle      = document.getElementById('tocToggle');
  var navClose       = document.getElementById('navClose');
  var navScrim       = document.getElementById('navScrim');
  var tabLinks        = document.querySelectorAll('.tab-link');
  var sections        = document.querySelectorAll('main .chapter-page, header.cover, footer.back-cover');
  var yearNow         = document.getElementById('yearNow');

  if (yearNow) { yearNow.textContent = new Date().getFullYear(); }

  /* ---------- Reading progress + bookmark ribbon ---------- */
  function updateProgress(){
    var doc = document.documentElement;
    var scrollTop = window.scrollY || doc.scrollTop;
    var height = doc.scrollHeight - doc.clientHeight;
    var pct = height > 0 ? Math.min(100, Math.max(0, (scrollTop / height) * 100)) : 0;
    if (progressFill) progressFill.style.width = pct + '%';
    if (bookmarkRibbon) bookmarkRibbon.style.height = (70 + (pct * 3)) + 'px';
  }
  window.addEventListener('scroll', updateProgress, { passive: true });
  window.addEventListener('resize', updateProgress);
  updateProgress();

  /* ---------- Mobile TOC drawer ---------- */
  function openNav(){
    chapterNav.classList.add('open');
    navScrim.classList.add('show');
    tocToggle.setAttribute('aria-expanded', 'true');
  }
  function closeNav(){
    chapterNav.classList.remove('open');
    navScrim.classList.remove('show');
    tocToggle.setAttribute('aria-expanded', 'false');
  }
  if (tocToggle) {
    tocToggle.addEventListener('click', function(){
      chapterNav.classList.contains('open') ? closeNav() : openNav();
    });
  }
  if (navClose) navClose.addEventListener('click', closeNav);
  if (navScrim) navScrim.addEventListener('click', closeNav);

  /* ---------- Scrollspy: highlight active bookmark tab ---------- */
  var spyMap = {};
  tabLinks.forEach(function(link){
    spyMap[link.getAttribute('data-target')] = link;
  });
  if ('IntersectionObserver' in window) {
    var spyObserver = new IntersectionObserver(function(entries){
      entries.forEach(function(entry){
        var id = entry.target.id;
        var link = spyMap[id];
        if (!link) return;
        if (entry.isIntersecting) {
          tabLinks.forEach(function(l){ l.classList.remove('active'); });
          link.classList.add('active');
        }
      });
    }, { rootMargin: '-40% 0px -50% 0px', threshold: 0 });
    sections.forEach(function(sec){ if (sec.id) spyObserver.observe(sec); });
  }

  /* ---------- Page reveal on scroll (page-turn-in effect) ---------- */
  if ('IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function(entries, obs){
      entries.forEach(function(entry){
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    document.querySelectorAll('.page-spread, .reveal').forEach(function(el){
      revealObserver.observe(el);
    });
  } else {
    document.querySelectorAll('.page-spread, .reveal').forEach(function(el){
      el.classList.add('in-view');
    });
  }

  /* ---------- Page-flip transition on chapter navigation ---------- */
  var flipping = false;
  function flipTo(targetId){
    var target = document.getElementById(targetId);
    if (!target) return;

    if (flipping || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      closeNav();
      return;
    }

    flipping = true;
    flipOverlay.classList.add('active');

    window.setTimeout(function(){
      target.scrollIntoView({ behavior: 'auto', block: 'start' });
    }, 330);

    window.setTimeout(function(){
      flipOverlay.classList.remove('active');
      flipping = false;
    }, 760);

    closeNav();
  }

  document.querySelectorAll('[data-target]').forEach(function(el){
    el.addEventListener('click', function(e){
      var targetId = el.getAttribute('data-target');
      if (!targetId) return;
      e.preventDefault();
      flipTo(targetId);
    });
  });

  /* ---------- Contact form: submit as JSON via fetch ---------- */
  var form       = document.getElementById('contactForm');
  var sendBtn    = document.getElementById('sendBtn');
  var sendBtnText= document.getElementById('sendBtnText');
  var formStatus = document.getElementById('formStatus');

  function showStatus(kind, message){
    formStatus.className = 'form-status show ' + kind;
    formStatus.innerHTML = (kind === 'ok'
      ? '<i class="fa-solid fa-feather"></i> '
      : '<i class="fa-solid fa-triangle-exclamation"></i> ') + message;
  }

  if (form) {
    form.addEventListener('submit', function(e){
      e.preventDefault();

      var name    = document.getElementById('f-name').value.trim();
      var email   = document.getElementById('f-email').value.trim();
      var subject = document.getElementById('f-subject').value.trim();
      var message = document.getElementById('f-message').value.trim();

      if (!name || !email || !subject || !message) {
        showStatus('err', 'Please fill in every line of the letter before sending.');
        return;
      }

      sendBtn.disabled = true;
      sendBtnText.textContent = 'Sending...';
      formStatus.className = 'form-status';

      fetch('/api/messages-store', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({ name: name, email: email, subject: subject, message: message })
      })
      .then(function(response){
        if (!response.ok) { throw new Error('Request failed with status ' + response.status); }
        return response.json().catch(function(){ return {}; });
      })
      .then(function(){
        showStatus('ok', 'Letter sent! Thank you for writing &mdash; a reply is on its way.');
        form.reset();
      })
      .catch(function(){
        showStatus('err', 'The letter did not make it this time. Please try again, or email directly.');
      })
      .finally(function(){
        sendBtn.disabled = false;
        sendBtnText.textContent = 'Send the Letter';
      });
    });
  }

})();
</script>
</body>
</html>
