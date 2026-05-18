
<script>
/* ═══════════════════════════════════════════════════
   INFINITY ZOOM ENGINE
   ───────────────────────────────────────────────────
   HOW SCROLLING WORKS:
   ▸ body is given a tall height (TOTAL_H) by JS
   ▸ window.scrollY is the single source of truth
   ▸ All sections are position:fixed — no DOM flow
   ▸ window 'scroll' event → onScroll() → GSAP .set()
     directly moves frames (no ScrollTrigger needed)

   ZOOM MATH per transition i → i+1:
   ▸ outgoing frame[i]:   scale 1→5, opacity 1→0, corners round
   ▸ incoming frame[i+1]: scale 0.06→1, opacity 0→1, corners square
═══════════════════════════════════════════════════ */

const SECTIONS = 5; // total sections (including hero)
const VH       = window.innerHeight;
const SPH      = VH * 1.6;                      // scroll px per transition
const TOTAL_H  = VH + SPH * (SECTIONS - 1);     // total page height

/* Give body its height so the page is scrollable */
document.body.style.height = TOTAL_H + 'px';

const frames = [1,2,3,4,5].map(i => document.getElementById(`pf${i}`));
const scenes = [1,2,3,4,5].map(i => document.getElementById(`s${i}`));
const dots   = [...document.querySelectorAll('.dot')];
const pb     = document.getElementById('progress-bar');

/* ── CSS 3D RING TUNNELS ── */
const RING_COLORS = [
  'rgba(212,168,67,',   // gold
  'rgba(192,80,96,',    // rose
  'rgba(64,200,192,',   // cyan
  'rgba(136,96,224,',   // violet
  'rgba(80,72,64,',     // warm grey
];

// [1,2,3,4,5].forEach((n, si) => {
//   const ct   = document.getElementById(`rt${n}`);
//   const col  = RING_COLORS[si];
//   const base = Math.max(window.innerWidth, window.innerHeight) * 0.54;
//   const COUNT = 12;
//   for (let i = 0; i < COUNT; i++) {
//     const ring = document.createElement('div');
//     ring.className = 'ring';
//     const r = base * (0.15 + (1 - i/COUNT) * 0.85);
//     ring.style.cssText = `
//       width:${r*2}px;height:${r*2}px;
//       margin-left:${-r}px;margin-top:${-r}px;
//       border-color:${col}${0.04 + (i/COUNT)*0.14});
//       border-width:${1 + (i/COUNT)*1.5}px;
//     `;
//     ring._phase = i / COUNT;
//     ct.appendChild(ring);
//   }
// });

/* ── RING ANIMATION TICKER ── */
const ringGroups = [1,2,3,4,5,6].map(n => {
  const tunnel = document.getElementById(`rt${n}`);
  return tunnel ? [...tunnel.querySelectorAll('.ring')] : [];
});
let scrollSpeed = 0, lastSY = 0;

gsap.ticker.add(() => {
  const spd = 0.18 + Math.abs(scrollSpeed) * 0.6;
  ringGroups.forEach(rings => {
    rings.forEach(ring => {
      ring._phase = (ring._phase + spd * 0.008) % 1;
      const z  = ring._phase;
      const sc = 0.15 + z * 2.5;
      const op = z < 0.1 ? z*10 : z > 0.85 ? (1-z)*6.67 : 1;
      ring.style.transform = `scale(${sc})`;
      ring.style.opacity   = Math.max(0, Math.min(0.8, op));
    });
  });
  scrollSpeed *= 0.88;
});

/* ── CANVAS STARFIELD ── */
const canvas = document.getElementById('tunnel-canvas');
const ctx    = canvas.getContext('2d');
function resizeCanvas(){ canvas.width=window.innerWidth; canvas.height=window.innerHeight; }
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

const STARS = Array.from({length:240}, () => ({
  x:Math.random(), y:Math.random(), z:Math.random(),
  r:Math.random()*1.1+0.2, spd:Math.random()*0.0006+0.0002,
}));
let warpI = 0;

function drawCanvas(){
  const W=canvas.width,H=canvas.height,cx=W/2,cy=H/2;
  ctx.clearRect(0,0,W,H);
  const wi = Math.min(1, Math.abs(scrollSpeed)*0.04);
  warpI += (wi - warpI) * 0.06;
  STARS.forEach(s => {
    s.z += s.spd * (1 + warpI * 9);
    if (s.z>1){ s.z=0; s.x=Math.random(); s.y=Math.random(); }
    const p  = 1/(1-s.z*0.95);
    const sx = cx+(s.x-.5)*W*p, sy=cy+(s.y-.5)*H*p;
    const sr = s.r*p*0.5, a=0.15+s.z*0.7;
    ctx.beginPath();
    if (warpI > 0.12){
      const pp=1/(1-(s.z-s.spd*5)*0.95);
      ctx.moveTo(cx+(s.x-.5)*W*pp, cy+(s.y-.5)*H*pp);
      ctx.lineTo(sx,sy);
      ctx.strokeStyle=`rgba(212,168,67,${a*warpI*0.7})`;
      ctx.lineWidth=sr*0.7; ctx.stroke();
    } else {
      ctx.arc(sx,sy,Math.max(0.2,sr),0,Math.PI*2);
      ctx.fillStyle=`rgba(240,238,228,${a})`; ctx.fill();
    }
  });
  requestAnimationFrame(drawCanvas);
}
requestAnimationFrame(drawCanvas);

/* ══════════════════════════════════════════
   CORE ZOOM ENGINE
══════════════════════════════════════════ */

/* Initial states */
frames.forEach((f,i) => {
  if (i===0) gsap.set(f, { scale: 1, opacity: 1 });
  else       gsap.set(f, { scale: 0.06, opacity: 0 });
});

let currentSec = 0;

function onScroll(){
  const sy    = window.scrollY;
  const maxSY = TOTAL_H - window.innerHeight;
  if (maxSY <= 0) return;

  scrollSpeed = sy - lastSY;
  lastSY = sy;

  const gp  = Math.min(1, Math.max(0, sy / maxSY));
  pb.style.width = (gp * 100) + '%';

  const T    = SECTIONS - 1;           // 4 transitions
  const rawT = gp * T;                 // 0..4
  const tIdx = Math.min(T-1, Math.floor(rawT)); // 0..3
  const t    = rawT - tIdx;            // local 0..1

  /* Update active section */
  const active = t < 0.5 ? tIdx : tIdx + 1;
  if (active !== currentSec){
    currentSec = active;
    dots.forEach((d,i) => d.classList.toggle('active', i===active));
    scenes.forEach((s,i) => s.classList.toggle('active', i===active));
  }

  /* Ease function for smooth feel */
  const easeIO = x => x < 0.5 ? 2*x*x : 1-Math.pow(-2*x+2,2)/2;

  frames.forEach((f, i) => {
    if (i < tIdx){
      /* Already zoomed past — invisible */
      gsap.set(f, {scale:5, opacity:0, });

    } else if (i === tIdx){
      /* OUTGOING: zoom out past the camera */
      const e = easeIO(t);
      gsap.set(f, {
        scale:        1 + e * 4,
        opacity:      Math.max(0, 1 - t * 1.5),
        // borderRadius: (e * 48) + '%',
      });

    } else if (i === tIdx + 1){
      /* INCOMING: zoom in from the far distance */
      const e = easeIO(t);
      gsap.set(f, {
        scale:        0.06 + e * 0.94,
        opacity:      Math.min(1, t * 1.8),
        // borderRadius: ((1-e) * 48) + '%',
      });

    } else {
      /* Waiting far away */
      gsap.set(f, {scale:0.06, opacity:0, });
    }
  });
}

/* THE KEY LINE: listen on window, not a div */
window.addEventListener('scroll', onScroll, {passive:true});
onScroll(); // run once on load

/* ── HERO ENTRANCE ── */
gsap.timeline({delay:0.4})
  .from('#s1 .eyebrow',    {y:20, opacity:0, duration:.8, ease:'power3.out'})
  .from('#s1 h1',          {y:65, opacity:0, duration:1,  ease:'power3.out'}, '-=.5')
  .from('#s1 .body-t',     {y:28, opacity:0, duration:.7, ease:'power3.out'}, '-=.5')
  .from('#s1 .scroll-hint',{opacity:0, duration:.6, ease:'power2.out'}, '-=.3');

/* ── JUMP TO SECTION ── */
function jumpTo(idx){
  const maxSY = TOTAL_H - window.innerHeight;
  const target = (idx / (SECTIONS-1)) * maxSY;
  gsap.to(window, {
    scrollTo: target, duration:1.4, ease:'power3.inOut',
    onUpdate: onScroll,
  });
  return false;
}

/* ── KEYBOARD NAV ── */
document.addEventListener('keydown', e => {
  const maxSY = TOTAL_H - window.innerHeight;
  if (e.key==='ArrowDown'||e.key==='PageDown')
    gsap.to(window,{scrollTo:Math.min(window.scrollY+SPH,maxSY),duration:1.2,ease:'power3.inOut',onUpdate:onScroll});
  if (e.key==='ArrowUp'||e.key==='PageUp')
    gsap.to(window,{scrollTo:Math.max(window.scrollY-SPH,0),duration:1.2,ease:'power3.inOut',onUpdate:onScroll});
});

/* ── CURSOR ── */
const cdot=document.getElementById('cur-dot'), cring=document.getElementById('cur-ring');
let mx=0,my=0,rx=0,ry=0;
document.addEventListener('mousemove', e=>{mx=e.clientX;my=e.clientY;gsap.set(cdot,{x:mx,y:my});});
gsap.ticker.add(()=>{ rx+=(mx-rx)*.1; ry+=(my-ry)*.1; gsap.set(cring,{x:rx,y:ry}); });
document.querySelectorAll('a,.proj,.svc').forEach(el=>{
  el.addEventListener('mouseenter',()=>gsap.to(cring,{width:64,height:64,opacity:.2,duration:.2}));
  el.addEventListener('mouseleave',()=>gsap.to(cring,{width:38,height:38,opacity:.6,duration:.2}));
});

/* ── RESIZE ── */
window.addEventListener('resize',()=>{ document.body.style.height=TOTAL_H+'px'; });
</script>