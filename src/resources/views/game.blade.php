<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
<title>NEON SIEGE — Wave Shooter</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{background:#04060e;overflow:hidden;font-family:'Courier New',monospace;user-select:none;cursor:crosshair}
canvas#c{display:block;width:100vw;height:100vh}

/* ── SCREEN FLASH ── */
#flash{position:fixed;inset:0;pointer-events:none;z-index:5;opacity:0;transition:opacity .06s}

/* ── HUD ── */
#hud{position:fixed;inset:0;pointer-events:none;z-index:10}

/* top bar */
#top{position:absolute;top:0;left:0;right:0;height:52px;background:linear-gradient(180deg,rgba(0,0,0,.75),transparent);display:flex;align-items:center;justify-content:space-between;padding:0 22px}
.hb{display:flex;flex-direction:column;gap:1px}
.hl{font-size:8px;letter-spacing:3px;color:#00f5ff55;text-transform:uppercase}
.hv{font-size:20px;font-weight:700;color:#00f5ff;text-shadow:0 0 10px #00f5ff}
.hv.warn{color:#ff4060;text-shadow:0 0 10px #ff4060}
#wave-val{color:#f0abfc;text-shadow:0 0 10px #f0abfc}
#kill-val{color:#a855f7;text-shadow:0 0 10px #a855f7}

/* bottom bar */
#bot{position:absolute;bottom:0;left:0;right:0;height:64px;background:linear-gradient(0deg,rgba(0,0,0,.8),transparent);display:flex;align-items:center;gap:28px;padding:0 20px}
.bar-wrap{display:flex;flex-direction:column;gap:3px;min-width:130px}
.bar-lbl{font-size:7px;letter-spacing:3px;color:#ffffff44;text-transform:uppercase}
.bar-bg{height:6px;border-radius:3px;background:rgba(255,255,255,.08);overflow:hidden;position:relative}
.bar-fill{height:100%;border-radius:3px;transition:width .2s}
#hp-fill{background:linear-gradient(90deg,#ff2040,#ff6070);box-shadow:0 0 8px #ff2040}
#sh-fill{background:linear-gradient(90deg,#4488ff,#00f5ff);box-shadow:0 0 8px #4488ff}

/* weapon indicator */
#wpn{display:flex;align-items:center;gap:10px;padding:6px 14px;border-radius:6px;border:1px solid rgba(0,245,255,.2);background:rgba(0,245,255,.05)}
#wpn-icon{font-size:18px}
#wpn-name{font-size:10px;color:#00f5ff88;letter-spacing:2px;text-transform:uppercase}

/* buffs */
#buffs{display:flex;gap:8px}
.buff{width:36px;height:36px;border-radius:8px;border:1px solid rgba(255,255,255,.15);background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;font-size:16px;position:relative;transition:all .3s}
.buff.active{border-color:rgba(0,245,255,.6);box-shadow:0 0 12px rgba(0,245,255,.3)}
.buff-timer{position:absolute;bottom:-1px;left:0;right:0;height:3px;border-radius:2px;background:#00f5ff;transform-origin:left;transition:transform .1s linear}

/* boss bar */
#boss-bar{position:absolute;top:58px;left:50%;transform:translateX(-50%);width:min(480px,85vw);display:none;flex-direction:column;align-items:center;gap:4px}
#boss-bar.show{display:flex}
#boss-lbl{font-size:9px;letter-spacing:4px;color:#ff2040;text-transform:uppercase;text-shadow:0 0 10px #ff2040}
#boss-bg{width:100%;height:10px;border-radius:5px;background:rgba(255,255,255,.08);border:1px solid rgba(255,32,64,.2);overflow:hidden}
#boss-fill{height:100%;background:linear-gradient(90deg,#880020,#ff2040);box-shadow:0 0 10px #ff2040;transition:width .3s}
#boss-phase{font-size:7px;letter-spacing:2px;color:#ff204055;margin-top:-2px}

/* floating score numbers */
.fscore{position:fixed;pointer-events:none;z-index:20;font-size:16px;font-weight:700;color:#00f5ff;text-shadow:0 0 10px #00f5ff;animation:floatUp .9s ease-out forwards}
@keyframes floatUp{0%{opacity:1;transform:translateY(0) scale(1)}100%{opacity:0;transform:translateY(-60px) scale(.7)}}
.fscore.combo{color:#f0abfc;text-shadow:0 0 14px #f0abfc;font-size:22px}
.fscore.boss{color:#ff4060;font-size:28px}

/* crosshair */
#xhair{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);width:24px;height:24px;pointer-events:none;z-index:15;opacity:0}
#xhair::before,#xhair::after{content:'';position:absolute;background:#00f5ff66;border-radius:1px}
#xhair::before{width:1.5px;height:100%;left:50%;transform:translateX(-50%)}
#xhair::after{height:1.5px;width:100%;top:50%;transform:translateY(-50%)}

/* minimap */
#mmap{position:absolute;top:58px;right:16px;width:110px;height:110px;border:1px solid rgba(0,245,255,.2);border-radius:8px;background:rgba(0,0,0,.55);backdrop-filter:blur(4px)}

/* hint strip */
#hints{position:absolute;bottom:68px;right:14px;display:flex;flex-direction:column;align-items:flex-end;gap:3px}
.hint{font-size:9px;color:#ffffff22;letter-spacing:1px}
.hint kbd{font-size:9px;padding:1px 5px;border:1px solid #ffffff18;border-radius:3px;color:#ffffff44;margin:0 2px}

/* ── OVERLAY SCREENS ── */
.screen{position:fixed;inset:0;z-index:50;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:20px;background:rgba(4,6,14,.92);backdrop-filter:blur(14px);transition:opacity .4s}
.screen.hidden{opacity:0;pointer-events:none}
.stitle{font-size:52px;font-weight:700;letter-spacing:8px;text-transform:uppercase;background:linear-gradient(135deg,#00f5ff,#a855f7,#f0abfc);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;text-align:center;line-height:1.1}
.ssub{font-size:12px;color:#475569;letter-spacing:3px;text-align:center;line-height:2;max-width:400px}
.sbtn{padding:14px 52px;border-radius:6px;font-size:11px;font-weight:700;letter-spacing:5px;text-transform:uppercase;cursor:pointer;border:1px solid #00f5ff;color:#00f5ff;background:rgba(0,245,255,.07);font-family:'Courier New',monospace;transition:all .3s}
.sbtn:hover{background:rgba(0,245,255,.18);box-shadow:0 0 24px rgba(0,245,255,.4)}
.sbtn.red{border-color:#ff4060;color:#ff4060;background:rgba(255,64,96,.07)}
.sbtn.red:hover{background:rgba(255,64,96,.18);box-shadow:0 0 24px rgba(255,64,96,.4)}
.score-big{font-size:68px;font-weight:700;color:#00f5ff;text-shadow:0 0 30px #00f5ff,0 0 60px #00f5ff44}
.stat-row{display:flex;gap:32px}
.stat{display:flex;flex-direction:column;align-items:center;gap:3px}
.stat-n{font-size:28px;font-weight:700;color:#a855f7;text-shadow:0 0 12px #a855f7}
.stat-l{font-size:9px;color:#334155;letter-spacing:3px}

/* ── WAVE ANNOUNCE ── */
#wave-ann{position:fixed;inset:0;z-index:45;display:flex;flex-direction:column;align-items:center;justify-content:center;pointer-events:none;opacity:0;transition:opacity .3s}
#wave-ann.show{opacity:1}
.wann-t{font-size:16px;letter-spacing:8px;color:#00f5ff88;text-transform:uppercase;margin-bottom:8px}
.wann-n{font-size:80px;font-weight:700;letter-spacing:4px;background:linear-gradient(135deg,#00f5ff,#a855f7);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1}
.wann-s{font-size:12px;letter-spacing:4px;color:#f0abfc88;text-transform:uppercase;margin-top:6px}

/* ── PAUSE ── */
#pause-icon{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:48;font-size:64px;color:#00f5ff88;pointer-events:none;opacity:0;transition:opacity .3s}
#pause-icon.show{opacity:1}
</style>
</head>
<body>

<canvas id="c"></canvas>
<div id="flash"></div>

<!-- HUD -->
<div id="hud">
  <div id="top">
    <div class="hb"><div class="hl">Score</div><div class="hv" id="score-val">0</div></div>
    <div style="display:flex;gap:28px;align-items:center">
      <div class="hb" style="align-items:center"><div class="hl">Wave</div><div class="hv" id="wave-val">1</div></div>
      <div class="hb" style="align-items:center"><div class="hl">Kills</div><div class="hv" id="kill-val">0</div></div>
    </div>
    <div class="hb" style="align-items:flex-end"><div class="hl">Multiplier</div><div class="hv" id="mult-val">x1</div></div>
  </div>

  <div id="boss-bar">
    <div id="boss-lbl">⚠ BOSS UNIT ⚠</div>
    <div id="boss-bg"><div id="boss-fill" style="width:100%"></div></div>
    <div id="boss-phase">PHASE 1</div>
  </div>

  <canvas id="mmap" width="110" height="110"></canvas>

  <div id="bot">
    <div class="bar-wrap">
      <div class="bar-lbl">Hull Integrity</div>
      <div class="bar-bg" style="width:150px"><div class="bar-fill" id="hp-fill" style="width:100%"></div></div>
    </div>
    <div class="bar-wrap">
      <div class="bar-lbl">Shield</div>
      <div class="bar-bg" style="width:100px"><div class="bar-fill" id="sh-fill" style="width:0%"></div></div>
    </div>
    <div id="wpn"><span id="wpn-icon">●</span><span id="wpn-name">Standard</span></div>
    <div id="buffs">
      <div class="buff" id="b-speed" title="Speed Boost">⚡<div class="buff-timer" id="bt-speed" style="transform:scaleX(0)"></div></div>
      <div class="buff" id="b-triple" title="Triple Shot">⊕<div class="buff-timer" id="bt-triple" style="transform:scaleX(0)"></div></div>
      <div class="buff" id="b-laser" title="Laser">⊸<div class="buff-timer" id="bt-laser" style="transform:scaleX(0)"></div></div>
      <div class="buff" id="b-shield" title="Shield">⛡<div class="buff-timer" id="bt-shield" style="transform:scaleX(0)"></div></div>
    </div>
    <div style="margin-left:auto">
      <div class="hints">
        <div class="hint"><kbd>WASD</kbd> Move</div>
        <div class="hint"><kbd>LMB / Space</kbd> Shoot</div>
        <div class="hint"><kbd>ESC</kbd> Pause</div>
      </div>
    </div>
  </div>

  <div id="xhair"></div>
</div>

<!-- Wave announce -->
<div id="wave-ann">
  <div class="wann-t">Wave Incoming</div>
  <div class="wann-n" id="wann-n">1</div>
  <div class="wann-s" id="wann-s">Prepare yourself</div>
</div>

<!-- Pause icon -->
<div id="pause-icon">⏸</div>

<!-- START SCREEN -->
<div class="screen" id="start-scr">
  <div class="stitle">Neon<br>Siege</div>
  <div class="ssub">Survive endless waves of enemy drones.<br>Collect <span style="color:#00f5ff">power-ups</span>, upgrade weapons, defeat <span style="color:#ff4060">BOSS</span> units.<br>How long can you hold the line?</div>
  <div style="display:flex;gap:16px;flex-wrap:wrap;justify-content:center">
    <div style="font-size:10px;color:#334155;letter-spacing:2px;text-align:center;line-height:2.2">
      <span style="color:#00f5ff88">DRONE</span> — Basic chaser &nbsp;|&nbsp;
      <span style="color:#ff8800cc">SPEEDER</span> — Fast zigzag &nbsp;|&nbsp;
      <span style="color:#880020cc">TANK</span> — Armoured &amp; shoots &nbsp;|&nbsp;
      <span style="color:#ff00ffcc">SWARM</span> — Floods the field &nbsp;|&nbsp;
      <span style="color:#ff2040">BOSS</span> — Multi-phase beast
    </div>
  </div>
  <button class="sbtn" id="start-btn">Boot System</button>
  <div style="font-size:9px;color:#1e293b;letter-spacing:2px">WASD · MOUSE AIM · CLICK/SPACE TO FIRE</div>
</div>

<!-- GAME OVER -->
<div class="screen hidden" id="over-scr">
  <div class="stitle" style="background:linear-gradient(135deg,#ff4060,#a855f7);-webkit-background-clip:text;background-clip:text">System<br>Down</div>
  <div class="score-big" id="over-score">0</div>
  <div class="stat-row">
    <div class="stat"><div class="stat-n" id="ov-wave">0</div><div class="stat-l">Waves</div></div>
    <div class="stat"><div class="stat-n" id="ov-kills">0</div><div class="stat-l">Kills</div></div>
    <div class="stat"><div class="stat-n" id="ov-boss">0</div><div class="stat-l">Bosses</div></div>
    <div class="stat"><div class="stat-n" id="ov-mult">x1</div><div class="stat-l">Max Mult</div></div>
  </div>
  <button class="sbtn red" id="restart-btn">Reboot</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
'use strict';

/* ══════════════════════════════════════════════════════════
   CONFIG
══════════════════════════════════════════════════════════ */
const CFG={
  AW:44, AH:44,
  PLAYER_SPD:10, PLAYER_HP:100, PLAYER_R:.8,
  FIRE_RATE:.135, BULLET_SPD:26, BULLET_DMG:22,
  CAM_H:24, CAM_DZ:10,
  MAX_BULLETS:280, MAX_PARTICLES:600,
};

const ETYPES={
  DRONE:  {hp:30,  spd:4.2, dmg:10, score:10, r:.7,  col:0xff2040, ecol:0xff0020, shoots:false, zigzag:false, name:'DRONE'},
  SPEEDER:{hp:15,  spd:9.0, dmg:8,  score:15, r:.55, col:0xff8800, ecol:0xff6600, shoots:false, zigzag:true,  name:'SPEEDER'},
  TANK:   {hp:110, spd:2.2, dmg:22, score:35, r:1.2, col:0x880020, ecol:0x660010, shoots:true,  fireRate:2.2, name:'TANK'},
  SWARM:  {hp:8,   spd:6.5, dmg:5,  score:5,  r:.35, col:0xff00ff, ecol:0xcc00cc, shoots:false, zigzag:false, name:'SWARM'},
  BOSS:   {hp:480, spd:3.0, dmg:28, score:200,r:2.2, col:0xff1030, ecol:0xaa0020, shoots:true,  fireRate:.55, name:'BOSS UNIT'},
};

const PTYPES={
  SHIELD: {col:0x4488ff, icon:'⛡', label:'SHIELD',    dur:9,  bg:'#4488ff'},
  SPEED:  {col:0x00ff88, icon:'⚡', label:'SPEED',     dur:6,  bg:'#00ff88'},
  TRIPLE: {col:0xffff00, icon:'⊕', label:'TRIPLE',    dur:8,  bg:'#ffff00'},
  LASER:  {col:0x00ffff, icon:'⊸', label:'LASER',     dur:9,  bg:'#00ffff'},
  NUKE:   {col:0xff4400, icon:'💥', label:'NUKE',      dur:0,  bg:'#ff4400'},
  HEAL:   {col:0xff0088, icon:'♥', label:'HEAL',      dur:0,  bg:'#ff0088'},
};

const WAVES=[
  [{type:'DRONE',n:5}],
  [{type:'DRONE',n:8},{type:'SPEEDER',n:2}],
  [{type:'DRONE',n:10},{type:'SPEEDER',n:4},{type:'TANK',n:1}],
  [{type:'SPEEDER',n:8},{type:'SWARM',n:15},{type:'TANK',n:2}],
  [{type:'BOSS',n:1},{type:'DRONE',n:4}],
  [{type:'DRONE',n:14},{type:'SPEEDER',n:6},{type:'TANK',n:2}],
  [{type:'SWARM',n:20},{type:'SPEEDER',n:8},{type:'TANK',n:3}],
  [{type:'DRONE',n:12},{type:'SPEEDER',n:8},{type:'TANK',n:4},{type:'SWARM',n:10}],
  [{type:'BOSS',n:1},{type:'TANK',n:3},{type:'SPEEDER',n:6}],
  [{type:'DRONE',n:20},{type:'SPEEDER',n:10},{type:'TANK',n:5},{type:'SWARM',n:20}],
];

/* ══════════════════════════════════════════════════════════
   THREE.JS SETUP
══════════════════════════════════════════════════════════ */
const canvas=document.getElementById('c');
const renderer=new THREE.WebGLRenderer({canvas,antialias:true});
renderer.setPixelRatio(Math.min(window.devicePixelRatio,1.8));
renderer.setSize(window.innerWidth,window.innerHeight);
renderer.shadowMap.enabled=true;
renderer.shadowMap.type=THREE.PCFSoftShadowMap;
renderer.toneMapping=THREE.ACESFilmicToneMapping;
renderer.toneMappingExposure=1.1;

const scene=new THREE.Scene();
scene.background=new THREE.Color(0x04060e);
scene.fog=new THREE.FogExp2(0x04060e,.028);

const camera=new THREE.PerspectiveCamera(62,window.innerWidth/window.innerHeight,.1,200);
const camShake={x:0,y:0,t:0};
const clock=new THREE.Clock();

window.addEventListener('resize',()=>{
  camera.aspect=window.innerWidth/window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth,window.innerHeight);
});

/* ══════════════════════════════════════════════════════════
   AUDIO
══════════════════════════════════════════════════════════ */
let aC; function getA(){if(!aC)aC=new(window.AudioContext||window.webkitAudioContext)();if(aC.state==='suspended')aC.resume();return aC;}
function tone(f,t,d,g=.18,delay=0){try{const c=getA(),at=c.currentTime+delay,o=c.createOscillator(),e=c.createGain();o.connect(e);e.connect(c.destination);o.type=t;o.frequency.value=f;e.gain.setValueAtTime(0,at);e.gain.linearRampToValueAtTime(g,at+.01);e.gain.exponentialRampToValueAtTime(.0001,at+d);o.start(at);o.stop(at+d+.05);}catch(e){}}
function noise(d,g=.3){try{const c=getA(),at=c.currentTime,b=c.createBuffer(1,c.sampleRate*.1,c.sampleRate),da=b.getChannelData(0);for(let i=0;i<da.length;i++)da[i]=Math.random()*2-1;const s=c.createBufferSource(),e=c.createGain();s.buffer=b;s.connect(e);e.connect(c.destination);e.gain.setValueAtTime(g,at);e.gain.exponentialRampToValueAtTime(.001,at+d);s.start(at);}catch(e){}}

const SFX={
  shoot:()=>{tone(880,'square',.04,.06);},
  shootLaser:()=>{tone(440,'sawtooth',.15,.1);tone(660,'sawtooth',.12,.07,.02);},
  hit:()=>{noise(.08,.25);tone(120,'sawtooth',.1,.2);},
  kill:()=>{tone(330,'sine',.08,.12);tone(440,'sine',.06,.1,.05);},
  killBig:()=>{noise(.15,.4);[220,180,140].forEach((f,i)=>tone(f,'sawtooth',.2,.2,i*.06));},
  powerup:()=>{[440,554,659,880].forEach((f,i)=>tone(f,'sine',.15,.15,i*.07));},
  nuke:()=>{noise(.4,.6);[110,88,66].forEach((f,i)=>tone(f,'square',.3,.3,i*.1));},
  bossHit:()=>{tone(80,'sawtooth',.12,.3);},
  wave:()=>{[330,440,554].forEach((f,i)=>tone(f,'sine',.2,.2,i*.1));},
  die:()=>{noise(.5,.5);[220,180,140,100].forEach((f,i)=>tone(f,'sawtooth',.3,.3,i*.12));},
};

/* ══════════════════════════════════════════════════════════
   LIGHTING
══════════════════════════════════════════════════════════ */
scene.add(new THREE.AmbientLight(0x050a14,3));
const dir=new THREE.DirectionalLight(0x8899ff,.9);
dir.position.set(8,20,8);dir.castShadow=true;dir.shadow.mapSize.set(1024,1024);
dir.shadow.camera.near=.5;dir.shadow.camera.far=80;
[-25,25].forEach(v=>{dir.shadow.camera.left=dir.shadow.camera.bottom=v;dir.shadow.camera.right=dir.shadow.camera.top=-v;});
scene.add(dir);
const ptA=new THREE.PointLight(0x00f5ff,1.8,35);ptA.position.set(-18,.5,-18);scene.add(ptA);
const ptB=new THREE.PointLight(0xa855f7,1.8,35);ptB.position.set( 18,.5,-18);scene.add(ptB);
const ptC=new THREE.PointLight(0x00f5ff,1.8,35);ptC.position.set( 18,.5, 18);scene.add(ptC);
const ptD=new THREE.PointLight(0xf0abfc,1.8,35);ptD.position.set(-18,.5, 18);scene.add(ptD);

/* ══════════════════════════════════════════════════════════
   PROCEDURAL FLOOR TEXTURE
══════════════════════════════════════════════════════════ */
function makeFloorTex(){
  const cv=document.createElement('canvas');cv.width=cv.height=512;const c=cv.getContext('2d');
  c.fillStyle='#060b18';c.fillRect(0,0,512,512);
  c.strokeStyle='rgba(0,245,255,.12)';c.lineWidth=1;
  for(let i=0;i<=16;i++){const s=512/16,p=i*s;c.beginPath();c.moveTo(p,0);c.lineTo(p,512);c.stroke();c.beginPath();c.moveTo(0,p);c.lineTo(512,p);c.stroke();}
  c.fillStyle='rgba(0,245,255,.25)';
  for(let i=0;i<=16;i++)for(let j=0;j<=16;j++){c.beginPath();c.arc(i*32,j*32,1.5,0,Math.PI*2);c.fill();}
  // hex accent rings
  c.strokeStyle='rgba(168,85,247,.2)';c.lineWidth=1.5;
  c.beginPath();c.arc(256,256,100,0,Math.PI*2);c.stroke();
  c.strokeStyle='rgba(0,245,255,.1)';
  c.beginPath();c.arc(256,256,180,0,Math.PI*2);c.stroke();
  const t=new THREE.CanvasTexture(cv);t.wrapS=t.wrapT=THREE.RepeatWrapping;t.repeat.set(4,4);return t;
}

/* ══════════════════════════════════════════════════════════
   ARENA
══════════════════════════════════════════════════════════ */
const pillars=[];
function buildArena(){
  const W=CFG.AW,H=CFG.AH;
  // Floor
  const floor=new THREE.Mesh(new THREE.PlaneGeometry(W,H),new THREE.MeshStandardMaterial({map:makeFloorTex(),roughness:.9,metalness:.2,color:0x0d1525}));
  floor.rotation.x=-Math.PI/2;floor.receiveShadow=true;scene.add(floor);
  // Floor rings
  [[5,.06,0x00f5ff,.3],[10,.06,0xa855f7,.2],[16,.05,0x00f5ff,.15]].forEach(([r,t,c,o])=>{
    const m=new THREE.Mesh(new THREE.RingGeometry(r,r+t,64),new THREE.MeshBasicMaterial({color:c,transparent:true,opacity:o,side:THREE.DoubleSide}));
    m.rotation.x=-Math.PI/2;m.position.y=.01;scene.add(m);
  });
  // Walls (4 sides)
  const wallMat=new THREE.MeshStandardMaterial({color:0x0a1428,roughness:.8,metalness:.5,emissive:0x001133,emissiveIntensity:.5});
  [[W,8,0,4,-(H/2)],[W,8,0,4,H/2],[8,H,(H/2),4,0],[8,H,-(H/2),4,0]].forEach(([bw,bh,rx,y,z],i)=>{
    const m=new THREE.Mesh(new THREE.BoxGeometry(i<2?bw:bw*.5,bh,i<2?.4:.4),wallMat);
    m.position.set(i<2?0:rx,y,z);m.castShadow=true;scene.add(m);
  });
  // Neon edge strips
  const e=new THREE.MeshBasicMaterial({color:0x00f5ff,transparent:true,opacity:.6});
  [[W,.05,.08,0,.02,-(H/2)],[W,.05,.08,0,.02,H/2],[.08,.05,H,-(W/2),.02,0],[.08,.05,H,W/2,.02,0]].forEach(([bw,bh,bd,x,y,z])=>{
    const m=new THREE.Mesh(new THREE.BoxGeometry(bw,bh,bd),e);m.position.set(x,y,z);scene.add(m);
  });
  // Corner lights (visible orbs)
  [[-W/2,.3,-H/2],[W/2,.3,-H/2],[W/2,.3,H/2],[-W/2,.3,H/2]].forEach(([x,y,z])=>{
    const m=new THREE.Mesh(new THREE.SphereGeometry(.2,8,8),new THREE.MeshBasicMaterial({color:0x00f5ff}));
    m.position.set(x,y,z);scene.add(m);
  });
  // Interior pillars (obstacles)
  const pillarPos=[[-10,0,-10],[10,0,-10],[-10,0,10],[10,0,10],[0,0,-14],[0,0,14],[-14,0,0],[14,0,0]];
  const pMat=new THREE.MeshStandardMaterial({color:0x0a1428,roughness:.7,metalness:.7,emissive:0x001133,emissiveIntensity:.6});
  pillarPos.forEach(([px,py,pz])=>{
    const r=1+Math.random()*.4, h=4+Math.random()*3;
    const m=new THREE.Mesh(new THREE.CylinderGeometry(r,r*1.1,h,8),pMat);
    m.position.set(px,h/2,pz);m.castShadow=m.receiveShadow=true;scene.add(m);
    pillars.push({x:px,z:pz,r:r+CFG.PLAYER_R});
    const cap=new THREE.Mesh(new THREE.TorusGeometry(r*1.05,.07,8,32),new THREE.MeshBasicMaterial({color:0x00f5ff,transparent:true,opacity:.7}));
    cap.rotation.x=Math.PI/2;cap.position.set(px,h+.01,pz);scene.add(cap);
  });
}

function clampArena(pos,r=CFG.PLAYER_R){
  const HW=CFG.AW/2-r-1, HH=CFG.AH/2-r-1;
  pos.x=Math.max(-HW,Math.min(HW,pos.x));
  pos.z=Math.max(-HH,Math.min(HH,pos.z));
  pillars.forEach(p=>{
    const dx=pos.x-p.x,dz=pos.z-p.z,d=Math.hypot(dx,dz);
    if(d<p.r){pos.x=p.x+dx/d*p.r;pos.z=p.z+dz/d*p.r;}
  });
}

/* ══════════════════════════════════════════════════════════
   PHYSICS PARTICLES
══════════════════════════════════════════════════════════ */
const MAX_P=CFG.MAX_PARTICLES;
const pP=new Float32Array(MAX_P*3),pC=new Float32Array(MAX_P*3);
const pV=[],pL=new Float32Array(MAX_P),pS=new Float32Array(MAX_P);
for(let i=0;i<MAX_P;i++){pP[i*3]=pP[i*3+1]=pP[i*3+2]=9999;pV.push(new THREE.Vector3());}
const pGeo=new THREE.BufferGeometry();
pGeo.setAttribute('position',new THREE.BufferAttribute(pP,3));
pGeo.setAttribute('color',   new THREE.BufferAttribute(pC,3));
const pPts=new THREE.Points(pGeo,new THREE.PointsMaterial({size:.22,vertexColors:true,transparent:true,opacity:.9,sizeAttenuation:true,blending:THREE.AdditiveBlending,depthWrite:false}));
scene.add(pPts);

function burst(x,y,z,col,n=25,spd=3.5){
  const c=new THREE.Color(col);let s=0;
  for(let i=0;i<MAX_P&&s<n;i++){
    if(pL[i]<=0){
      pP[i*3]=x;pP[i*3+1]=y;pP[i*3+2]=z;
      pC[i*3]=c.r;pC[i*3+1]=c.g;pC[i*3+2]=c.b;
      const sp=spd+Math.random()*spd*.8,th=Math.random()*Math.PI*2,ph=Math.random()*Math.PI;
      pV[i].set(Math.sin(ph)*Math.cos(th)*sp,(Math.cos(ph)*sp*.5)+.3,Math.sin(ph)*Math.sin(th)*sp);
      pL[i]=.4+Math.random()*.5;pS[i]=sp;s++;
    }
  }
}

function updateParticles(dt){
  let d=false;
  for(let i=0;i<MAX_P;i++){
    if(pL[i]>0){
      pL[i]-=dt;
      if(pL[i]<=0){pP[i*3]=pP[i*3+1]=pP[i*3+2]=9999;}
      else{pP[i*3]+=pV[i].x*dt;pP[i*3+1]+=pV[i].y*dt;pP[i*3+2]+=pV[i].z*dt;pV[i].y-=5*dt;pV[i].multiplyScalar(.97);}
      d=true;
    }
  }
  if(d){pGeo.attributes.position.needsUpdate=true;}
}

/* ══════════════════════════════════════════════════════════
   PLAYER SHIP
══════════════════════════════════════════════════════════ */
let player;
const playerData={
  pos:new THREE.Vector3(0,0,0),vel:new THREE.Vector3(),
  hp:CFG.PLAYER_HP, maxHp:CFG.PLAYER_HP,
  shield:0, shieldMax:100,
  hitCooldown:0,
  fireTimer:0,
  angle:0,
  buffs:{speed:0,triple:0,laser:0,shield:0},
  buffMax:{speed:6,triple:8,laser:9,shield:9},
};

function buildPlayer(){
  const g=new THREE.Group();
  // Hull
  const hull=new THREE.Mesh(new THREE.ConeGeometry(.75,2,4),new THREE.MeshStandardMaterial({color:0x0a2040,roughness:.3,metalness:.9,emissive:0x002244,emissiveIntensity:.5}));
  hull.rotation.x=Math.PI/2;g.add(hull);
  // Cockpit
  const cock=new THREE.Mesh(new THREE.SphereGeometry(.28,8,8),new THREE.MeshBasicMaterial({color:0x00f5ff}));
  cock.position.z=-.35;g.add(cock);
  // Wings
  [-1,1].forEach(s=>{
    const w=new THREE.Mesh(new THREE.BoxGeometry(2.2,.1,.8),new THREE.MeshStandardMaterial({color:0x0a2040,metalness:.9,roughness:.3,emissive:0x001133,emissiveIntensity:.4}));
    w.position.set(s*1.1,0,.35);w.rotation.z=s*.18;g.add(w);
    const eng=new THREE.Mesh(new THREE.CylinderGeometry(.13,.18,.38,8),new THREE.MeshBasicMaterial({color:0x00f5ff}));
    eng.position.set(s*1.35,0,.55);eng.rotation.x=Math.PI/2;g.add(eng);
    const gl=new THREE.PointLight(0x00f5ff,.8,3);gl.position.set(s*1.35,0,.7);g.add(gl);
  });
  // Center light
  const cl=new THREE.PointLight(0x00f5ff,1.5,5);g.add(cl);
  g.position.set(0,.4,0);
  scene.add(g);return g;
}

// Engine trail particles
let trailTimer=0;
function updateTrail(dt){
  trailTimer+=dt;
  if(trailTimer>.04&&(keys.w||keys.s||keys.a||keys.d||mob.active)){
    trailTimer=0;
    const bx=player.position.x+Math.sin(playerData.angle)*.6;
    const bz=player.position.z+Math.cos(playerData.angle)*.6;
    burst(bx,.4,bz,0x00f5ff,3,.8);
  }
}

/* ══════════════════════════════════════════════════════════
   BULLET POOL
══════════════════════════════════════════════════════════ */
const MAX_B=CFG.MAX_BULLETS;
const bullets=[];
for(let i=0;i<MAX_B;i++){
  const geo=new THREE.BoxGeometry(.12,.12,.65);
  const mat=new THREE.MeshBasicMaterial({color:0x00f5ff});
  const m=new THREE.Mesh(geo,mat);
  m.visible=false; scene.add(m);
  const gl=new THREE.PointLight(0x00f5ff,.5,2.5); m.add(gl);
  bullets.push({mesh:m,active:false,vel:new THREE.Vector3(),life:0,friendly:true,dmg:CFG.BULLET_DMG,type:'std'});
}

function fireBullet(ox,oy,oz,dx,dz,friendly,dmg,col=0x00f5ff,type='std'){
  for(let i=0;i<MAX_B;i++){
    if(!bullets[i].active){
      const b=bullets[i]; b.active=true; b.friendly=friendly; b.dmg=dmg; b.type=type;
      b.mesh.visible=true; b.mesh.position.set(ox,oy,oz);
      b.mesh.material.color.setHex(col);
      if(b.mesh.children[0]) b.mesh.children[0].color.setHex(col);
      const spd=type==='laser'?35:friendly?CFG.BULLET_SPD:8.5;
      b.vel.set(dx*spd,0,dz*spd); b.life=type==='laser'?2.2:1.8;
      const ang=Math.atan2(dx,dz); b.mesh.rotation.y=ang;
      if(type==='laser'){b.mesh.scale.set(1.8,1.8,2.5);}
      else if(!friendly){b.mesh.scale.set(.9,.9,1);}
      else{b.mesh.scale.set(1,1,1);}
      return b;
    }
  }
}

function updateBullets(dt){
  bullets.forEach(b=>{
    if(!b.active) return;
    b.life-=dt;
    if(b.life<=0){deactivateBullet(b);return;}
    b.mesh.position.x+=b.vel.x*dt;
    b.mesh.position.z+=b.vel.z*dt;
    const hw=CFG.AW/2-1;
    if(Math.abs(b.mesh.position.x)>hw||Math.abs(b.mesh.position.z)>hw){deactivateBullet(b);return;}
  });
}

function deactivateBullet(b){b.active=false;b.mesh.visible=false;b.mesh.scale.set(1,1,1);}

/* ══════════════════════════════════════════════════════════
   ENEMIES
══════════════════════════════════════════════════════════ */
const enemies=[];

function buildEnemyMesh(type){
  const cfg=ETYPES[type], g=new THREE.Group();
  const mat=new THREE.MeshStandardMaterial({color:cfg.ecol,roughness:.3,metalness:.8,emissive:cfg.ecol,emissiveIntensity:.6});
  let body;
  if(type==='DRONE')   body=new THREE.Mesh(new THREE.OctahedronGeometry(cfg.r,0),mat);
  else if(type==='SPEEDER') body=new THREE.Mesh(new THREE.TetrahedronGeometry(cfg.r,0),mat);
  else if(type==='TANK'){
    body=new THREE.Mesh(new THREE.BoxGeometry(cfg.r*1.8,cfg.r*.8,cfg.r*1.8),mat);
    const turret=new THREE.Mesh(new THREE.CylinderGeometry(.3,.35,.8,8),new THREE.MeshStandardMaterial({color:0x440010,roughness:.4,metalness:.9,emissive:0x880020,emissiveIntensity:.5}));
    turret.position.y=.6;g.add(turret);
    const barrel=new THREE.Mesh(new THREE.CylinderGeometry(.1,.1,.8,6),new THREE.MeshBasicMaterial({color:0xff2040}));
    barrel.rotation.x=Math.PI/2;barrel.position.set(0,.6,-.8);g.add(barrel);
  }
  else if(type==='SWARM') body=new THREE.Mesh(new THREE.SphereGeometry(cfg.r,8,8),mat);
  else{ // BOSS
    body=new THREE.Mesh(new THREE.IcosahedronGeometry(cfg.r,1),mat);
    const ring1=new THREE.Mesh(new THREE.TorusGeometry(cfg.r*1.3,.15,8,40),new THREE.MeshBasicMaterial({color:cfg.col,transparent:true,opacity:.7}));
    g.add(ring1); ring1.rotation.x=Math.PI/2;
    const ring2=new THREE.Mesh(new THREE.TorusGeometry(cfg.r*1.7,.1,8,40),new THREE.MeshBasicMaterial({color:cfg.col,transparent:true,opacity:.4}));
    g.add(ring2);
    g.userData.rings=[ring1,ring2];
    const inner=new THREE.Mesh(new THREE.IcosahedronGeometry(cfg.r*.6,0),new THREE.MeshBasicMaterial({color:cfg.col,transparent:true,opacity:.5}));
    g.add(inner); g.userData.inner=inner;
  }
  body.castShadow=true; g.add(body); g.userData.body=body;
  const gl=new THREE.PointLight(cfg.col,2,type==='BOSS'?12:6);g.add(gl);g.userData.light=gl;
  return g;
}

function spawnEnemy(type,x,z){
  const cfg=ETYPES[type];
  const mesh=buildEnemyMesh(type);
  mesh.position.set(x,type==='BOSS'?cfg.r*.6:.4,z);
  scene.add(mesh);
  enemies.push({
    mesh, type, hp:cfg.hp, maxHp:cfg.hp,
    spd:cfg.spd, dmg:cfg.dmg, r:cfg.r, col:cfg.col,
    fireTimer:0, fireRate:cfg.fireRate||0,
    hitFlash:0, phase:1,
    zigzagT:0, zigzagDir:Math.random()>.5?1:-1,
    swarmOffset:{x:(Math.random()-.5)*.5,z:(Math.random()-.5)*.5},
    dead:false, deathTimer:0,
    cfgName:cfg.name,
  });
}

function spawnWaveEnemies(wave){
  const configs=wave<WAVES.length?WAVES[wave]:genWave(wave);
  configs.forEach(({type,n})=>{
    for(let i=0;i<n;i++){
      let x,z,tries=0;
      do{
        const a=Math.random()*Math.PI*2, r=CFG.AW*.38+Math.random()*5;
        x=Math.cos(a)*r; z=Math.sin(a)*r;
        tries++;
      }while(Math.hypot(x-playerData.pos.x,z-playerData.pos.z)<10&&tries<20);
      x=Math.max(-CFG.AW/2+2,Math.min(CFG.AW/2-2,x));
      z=Math.max(-CFG.AH/2+2,Math.min(CFG.AH/2-2,z));
      spawnEnemy(type,x,z);
    }
  });
}

function genWave(w){
  const base=Math.floor((w-WAVES.length)/2)+2;
  return[
    {type:'DRONE',  n:8+base*2},
    {type:'SPEEDER',n:4+base},
    {type:'TANK',   n:2+Math.floor(base/2)},
    {type:'SWARM',  n:w%3===0?20+base*3:0},
    {type:'BOSS',   n:w%5===0?1:0},
  ].filter(e=>e.n>0);
}

function updateEnemies(dt,t){
  const px=playerData.pos.x, pz=playerData.pos.z;
  let hasEnemy=false;

  enemies.forEach(e=>{
    if(e.dead){
      e.deathTimer-=dt;
      e.mesh.scale.multiplyScalar(1+dt*4);
      e.mesh.userData.body?.material&&(e.mesh.userData.body.material.opacity=Math.max(0,e.deathTimer));
      if(e.deathTimer<=0) e.mesh.visible=false;
      return;
    }
    hasEnemy=true;

    // Hit flash
    if(e.hitFlash>0){e.hitFlash-=dt;const f=Math.min(1,e.hitFlash*10);e.mesh.userData.body.material.emissiveIntensity=.6+f*2;}
    else{e.mesh.userData.body.material.emissiveIntensity=.6;}

    const dx=px-e.mesh.position.x, dz=pz-e.mesh.position.z;
    const dist=Math.hypot(dx,dz);
    const ndx=dist>0?dx/dist:0, ndz=dist>0?dz/dist:0;

    // Movement
    let spd=e.spd; if(gState.buffs?.speed>0){}
    let mvx=ndx*spd, mvz=ndz*spd;

    if(e.type==='SPEEDER'){
      e.zigzagT+=dt*4;
      const perp=e.zigzagDir;
      mvx+=Math.cos(e.mesh.rotation.y)*perp*3.5*Math.sin(e.zigzagT);
      mvz-=Math.sin(e.mesh.rotation.y)*perp*3.5*Math.sin(e.zigzagT);
    }
    if(e.type==='SWARM'){
      mvx+=e.swarmOffset.x; mvz+=e.swarmOffset.z;
      if(Math.random()<.005){e.swarmOffset.x=(Math.random()-.5)*.5;e.swarmOffset.z=(Math.random()-.5)*.5;}
    }
    if(e.type==='BOSS'&&e.phase===2){
      e.zigzagT+=dt*2.5;
      mvx+=Math.sin(e.zigzagT)*4; mvz+=Math.cos(e.zigzagT*1.3)*2;
    }
    if(e.type==='BOSS'&&e.phase===3){ spd=e.spd*1.6; mvx*=1.6; mvz*=1.6; }

    e.mesh.position.x+=mvx*dt;
    e.mesh.position.z+=mvz*dt;
    clampArena(e.mesh.position,e.r+.5);

    // Rotate
    if(dist>.5) e.mesh.rotation.y=Math.atan2(dx,dz);

    // Spin (visual)
    if(e.type==='DRONE')  e.mesh.userData.body.rotation.y+=dt*2;
    if(e.type==='SPEEDER')e.mesh.userData.body.rotation.z+=dt*3;
    if(e.type==='SWARM')  e.mesh.userData.body.rotation.x+=dt*5;
    if(e.type==='BOSS'){
      e.mesh.userData.body.rotation.y+=dt*.8;
      e.mesh.userData.rings[0].rotation.y+=dt*1.5;
      e.mesh.userData.rings[1].rotation.x+=dt*1.2;
      e.mesh.userData.inner.rotation.y-=dt*2;
      e.mesh.userData.light.intensity=2+Math.sin(t*4)*.8;
    }

    // Enemy shooting
    if(e.fireRate>0){
      e.fireTimer+=dt;
      if(e.fireTimer>=e.fireRate){
        e.fireTimer=0;
        const shoots=e.type==='BOSS'&&e.phase>=2?3:e.type==='BOSS'?1:1;
        for(let s=0;s<shoots;s++){
          const spreadA=shoots>1?(s-1)*.4:0;
          const bndx=Math.sin(Math.atan2(dx,dz)+spreadA);
          const bndz=Math.cos(Math.atan2(dx,dz)+spreadA);
          fireBullet(e.mesh.position.x,e.mesh.position.y,e.mesh.position.z,bndx,bndz,false,e.dmg,0xff2040);
        }
        if(e.type==='BOSS'&&e.phase===3){
          // circle burst
          for(let a=0;a<8;a++){const ang=a/8*Math.PI*2;fireBullet(e.mesh.position.x,.4,e.mesh.position.z,Math.sin(ang),Math.cos(ang),false,e.dmg*.7,0xff6040);}
        }
      }
    }

    // Player contact damage
    if(dist<e.r+CFG.PLAYER_R&&playerData.hitCooldown<=0){
      damagePlayer(e.dmg); playerData.hitCooldown=.6;
      burst(px,.5,pz,0xff2040,15,2.5);
    }
  });
  return hasEnemy;
}

/* ══════════════════════════════════════════════════════════
   POWER-UPS
══════════════════════════════════════════════════════════ */
const powerups=[];

function spawnPowerup(x,z,type){
  const cfg=PTYPES[type];
  const g=new THREE.Group();
  // Crystal shape
  const m=new THREE.Mesh(new THREE.OctahedronGeometry(.45,0),new THREE.MeshStandardMaterial({color:cfg.col,emissive:cfg.col,emissiveIntensity:.8,roughness:.1,metalness:.6,transparent:true,opacity:.9}));
  g.add(m);
  const ring=new THREE.Mesh(new THREE.TorusGeometry(.7,.05,8,32),new THREE.MeshBasicMaterial({color:cfg.col,transparent:true,opacity:.5}));
  ring.rotation.x=Math.PI/2; g.add(ring);
  const gl=new THREE.PointLight(cfg.col,2,5); g.add(gl);
  g.position.set(x,.6,z); g.userData={type,ring,m,gl,alive:true};
  scene.add(g); powerups.push(g);
}

function updatePowerups(dt,t){
  powerups.forEach(p=>{
    if(!p.userData.alive) return;
    p.userData.m.rotation.y+=dt*2;
    p.userData.ring.rotation.z+=dt*1.5;
    p.position.y=.6+Math.sin(t*2+p.position.x)*.2;
    p.userData.gl.intensity=1.5+Math.sin(t*3)*.5;
    // Collect
    const dx=playerData.pos.x-p.position.x, dz=playerData.pos.z-p.position.z;
    if(Math.hypot(dx,dz)<1.8){collectPowerup(p);}
  });
}

function collectPowerup(p){
  const type=p.userData.type;
  p.userData.alive=false; p.visible=false;
  burst(p.position.x,.5,p.position.z,PTYPES[type].col,30,3);
  SFX.powerup();
  floatScore(p.position.x,p.position.z,PTYPES[type].icon+' '+PTYPES[type].label,'#'+PTYPES[type].col.toString(16).padStart(6,'0'));
  if(type==='NUKE'){ nukeAll(); return; }
  if(type==='HEAL'){ playerData.hp=Math.min(playerData.maxHp,playerData.hp+40); updateHPBar(); return; }
  if(type==='SHIELD'){ playerData.shield=Math.min(playerData.shieldMax,playerData.shield+playerData.shieldMax); }
  playerData.buffs[type.toLowerCase()]=PTYPES[type].dur;
  document.getElementById('b-'+type.toLowerCase()).classList.add('active');
}

function nukeAll(){
  SFX.nuke(); screenShake(1.5);
  enemies.forEach(e=>{if(!e.dead)killEnemy(e,false);});
  document.getElementById('flash').style.background='rgba(255,100,0,.6)';
  document.getElementById('flash').style.opacity='1';
  setTimeout(()=>document.getElementById('flash').style.opacity='0',120);
}

/* ══════════════════════════════════════════════════════════
   GAME STATE
══════════════════════════════════════════════════════════ */
let gState={
  phase:'menu', wave:0, score:0, kills:0, bossKills:0,
  mult:1, multTimer:0, maxMult:1,
  waveActive:false, bossRef:null,
};

function damagePlayer(dmg){
  if(playerData.hitCooldown>0) return;
  if(playerData.buffs.shield>0){
    playerData.shield=Math.max(0,playerData.shield-dmg*1.5);
    if(playerData.shield<=0) playerData.buffs.shield=0;
    updateShieldBar(); SFX.hit(); screenShake(.25);
    document.getElementById('flash').style.background='rgba(68,136,255,.4)';
    document.getElementById('flash').style.opacity='1';
    setTimeout(()=>document.getElementById('flash').style.opacity='0',80);
    return;
  }
  playerData.hp=Math.max(0,playerData.hp-dmg);
  updateHPBar(); SFX.hit(); screenShake(.4);
  document.getElementById('flash').style.background='rgba(255,32,64,.5)';
  document.getElementById('flash').style.opacity='1';
  setTimeout(()=>document.getElementById('flash').style.opacity='0',90);
  if(playerData.hp<=0) gameOver();
}

function killEnemy(e,byPlayer=true){
  if(e.dead) return;
  e.dead=true; e.deathTimer=.35;
  e.mesh.userData.body.material.transparent=true;
  burst(e.mesh.position.x,e.mesh.position.y,e.mesh.position.z,e.col,e.type==='BOSS'?80:e.type==='TANK'?35:20,e.type==='BOSS'?6:3.5);
  if(e.type==='BOSS'||e.type==='TANK') SFX.killBig(); else SFX.kill();
  if(e.type==='BOSS'){screenShake(2);gState.bossKills++;document.getElementById('boss-bar').classList.remove('show');}
  if(byPlayer){
    gState.kills++;
    const pts=ETYPES[e.type].score*gState.mult;
    gState.score+=pts;
    // Mult system
    gState.multTimer=4;
    gState.mult=Math.min(8,gState.mult+.5);
    if(gState.mult>gState.maxMult) gState.maxMult=gState.mult;
    updateHUD();
    floatScore(e.mesh.position.x,e.mesh.position.z,'+'+pts,e.type==='BOSS'?'#ff4060':'#00f5ff',e.type==='BOSS');
    // Power-up drop chance
    const pNames=Object.keys(PTYPES);
    if(e.type==='BOSS'||Math.random()<(e.type==='TANK'?.5:e.type==='SWARM'?.08:.2)){
      const t=pNames[Math.floor(Math.random()*pNames.length)];
      spawnPowerup(e.mesh.position.x,e.mesh.position.z,t);
    }
    if(e.type==='BOSS'){ screenShake(2.5); }
  }
  if(e.type==='BOSS') gState.bossRef=null;
}

function startGame(){
  // Reset
  gState={phase:'playing',wave:0,score:0,kills:0,bossKills:0,mult:1,multTimer:0,maxMult:1,waveActive:false,bossRef:null};
  playerData.hp=CFG.PLAYER_HP; playerData.shield=0; playerData.hitCooldown=0;
  playerData.buffs={speed:0,triple:0,laser:0,shield:0};
  playerData.pos.set(0,0,0); playerData.vel.set(0,0,0);
  player.position.set(0,.4,0);
  // Clear enemies/bullets/powerups
  enemies.forEach(e=>scene.remove(e.mesh)); enemies.length=0;
  bullets.forEach(b=>{b.active=false;b.mesh.visible=false;});
  powerups.forEach(p=>scene.remove(p)); powerups.length=0;
  updateHPBar(); updateShieldBar(); updateHUD();
  document.getElementById('boss-bar').classList.remove('show');
  // Star wave
  showWaveAnnounce(1,()=>{ spawnWaveEnemies(0); gState.waveActive=true; });
  document.getElementById('start-scr').classList.add('hidden');
  document.getElementById('over-scr').classList.add('hidden');
  SFX.wave();
}

function gameOver(){
  gState.phase='over'; SFX.die(); screenShake(3);
  setTimeout(()=>{
    document.getElementById('over-score').textContent=gState.score;
    document.getElementById('ov-wave').textContent=gState.wave;
    document.getElementById('ov-kills').textContent=gState.kills;
    document.getElementById('ov-boss').textContent=gState.bossKills;
    document.getElementById('ov-mult').textContent='x'+gState.maxMult.toFixed(1);
    document.getElementById('over-scr').classList.remove('hidden');
  },800);
}

function nextWave(){
  gState.wave++;
  gState.waveActive=false;
  setTimeout(()=>{
    showWaveAnnounce(gState.wave+1,()=>{
      spawnWaveEnemies(gState.wave);
      gState.waveActive=true;
      SFX.wave();
    });
  },600);
}

function showWaveAnnounce(wNum,cb){
  const isBoss=WAVES[wNum-1]?.some(e=>e.type==='BOSS')||((wNum-1)>=WAVES.length&&(wNum-1)%5===4);
  document.getElementById('wann-n').textContent=wNum;
  document.getElementById('wann-s').textContent=isBoss?'⚠ BOSS INCOMING ⚠':'Prepare yourself';
  const ann=document.getElementById('wave-ann'); ann.classList.add('show');
  document.getElementById('wave-val').textContent=wNum;
  setTimeout(()=>{ann.classList.remove('show');setTimeout(cb,300);},2200);
}

/* ══════════════════════════════════════════════════════════
   SHOOTING
══════════════════════════════════════════════════════════ */
const aimDir=new THREE.Vector3();
const groundPlane=new THREE.Plane(new THREE.Vector3(0,1,0),0);
const raycaster=new THREE.Raycaster();
const mouseNDC=new THREE.Vector2();
const aimWorld=new THREE.Vector3();

function updateAim(){
  mouseNDC.set((mouse.sx/window.innerWidth)*2-1,-(mouse.sy/window.innerHeight)*2+1);
  raycaster.setFromCamera(mouseNDC,camera);
  raycaster.ray.intersectPlane(groundPlane,aimWorld);
  const dx=aimWorld.x-playerData.pos.x, dz=aimWorld.z-playerData.pos.z;
  const d=Math.hypot(dx,dz);
  if(d>.1){aimDir.set(dx/d,0,dz/d);}
}

function shoot(){
  const {buffs}=playerData;
  const col=buffs.laser>0?0x00ffff:buffs.triple>0?0xffff00:0x00f5ff;
  const type=buffs.laser>0?'laser':'std';
  const dx=aimDir.x, dz=aimDir.z;
  fireBullet(playerData.pos.x,.45,playerData.pos.z,dx,dz,true,CFG.BULLET_DMG*(buffs.laser>0?2.5:1),col,type);
  if(buffs.triple>0&&type!=='laser'){
    const sp=.4;
    fireBullet(playerData.pos.x,.45,playerData.pos.z,dx*Math.cos(sp)-dz*Math.sin(sp),dx*Math.sin(sp)+dz*Math.cos(sp),true,CFG.BULLET_DMG*.75,0xffff00);
    fireBullet(playerData.pos.x,.45,playerData.pos.z,dx*Math.cos(-sp)-dz*Math.sin(-sp),dx*Math.sin(-sp)+dz*Math.cos(-sp),true,CFG.BULLET_DMG*.75,0xffff00);
  }
  buffs.laser>0?SFX.shootLaser():SFX.shoot();
}

/* ══════════════════════════════════════════════════════════
   COLLISION: BULLETS ↔ ENEMIES / PLAYER
══════════════════════════════════════════════════════════ */
function checkCollisions(){
  bullets.forEach(b=>{
    if(!b.active) return;
    const bx=b.mesh.position.x, bz=b.mesh.position.z;
    if(b.friendly){
      enemies.forEach(e=>{
        if(e.dead) return;
        const d=Math.hypot(bx-e.mesh.position.x,bz-e.mesh.position.z);
        if(d<e.r+.5){
          e.hp-=b.dmg; e.hitFlash=.12;
          deactivateBullet(b);
          burst(bx,.5,bz,e.col,8,1.5);
          if(e.type==='BOSS'){
            SFX.bossHit();
            const pct=e.hp/e.maxHp;
            document.getElementById('boss-fill').style.width=(pct*100)+'%';
            if(pct<.5&&e.phase===1){e.phase=2;document.getElementById('boss-phase').textContent='PHASE 2 — ENRAGED';burst(e.mesh.position.x,e.mesh.position.y,e.mesh.position.z,0xff2040,60,5);}
            if(pct<.25&&e.phase===2){e.phase=3;document.getElementById('boss-phase').textContent='PHASE 3 — BERSERK';burst(e.mesh.position.x,e.mesh.position.y,e.mesh.position.z,0xff6040,80,6);}
          }
          if(e.hp<=0) killEnemy(e,true);
        }
      });
    } else {
      if(playerData.hitCooldown>0) return;
      const d=Math.hypot(bx-playerData.pos.x,bz-playerData.pos.z);
      if(d<CFG.PLAYER_R+.4){
        damagePlayer(b.dmg); playerData.hitCooldown=.3;
        deactivateBullet(b);
      }
    }
  });
}

/* ══════════════════════════════════════════════════════════
   INPUT
══════════════════════════════════════════════════════════ */
const keys={w:false,a:false,s:false,d:false};
const mouse={sx:window.innerWidth/2,sy:window.innerHeight/2,down:false};
let firing=false, paused=false;

document.addEventListener('keydown',e=>{
  if(e.code==='KeyW'||e.code==='ArrowUp')   keys.w=true;
  if(e.code==='KeyS'||e.code==='ArrowDown') keys.s=true;
  if(e.code==='KeyA'||e.code==='ArrowLeft') keys.a=true;
  if(e.code==='KeyD'||e.code==='ArrowRight')keys.d=true;
  if(e.code==='Space'){e.preventDefault();firing=true;}
  if(e.code==='Escape'){paused=!paused;document.getElementById('pause-icon').classList.toggle('show',paused);}
});
document.addEventListener('keyup',e=>{
  if(e.code==='KeyW'||e.code==='ArrowUp')   keys.w=false;
  if(e.code==='KeyS'||e.code==='ArrowDown') keys.s=false;
  if(e.code==='KeyA'||e.code==='ArrowLeft') keys.a=false;
  if(e.code==='KeyD'||e.code==='ArrowRight')keys.d=false;
  if(e.code==='Space') firing=false;
});
document.addEventListener('mousemove',e=>{mouse.sx=e.clientX;mouse.sy=e.clientY;});
canvas.addEventListener('mousedown',()=>{mouse.down=true;firing=true;getA();});
canvas.addEventListener('mouseup',()=>{mouse.down=false;firing=false;});

// Mobile joystick
const mob={active:false,x:0,y:0,sx:0,sy:0};
const MR=55;
function initMobile(){
  const zone=document.createElement('div');
  zone.style.cssText='position:fixed;bottom:100px;left:20px;width:120px;height:120px;z-index:50;';
  const bg=document.createElement('div');
  bg.style.cssText='width:120px;height:120px;border-radius:50%;border:2px solid rgba(0,245,255,.2);background:rgba(0,245,255,.04);position:absolute;';
  const thumb=document.createElement('div');
  thumb.style.cssText='width:48px;height:48px;border-radius:50%;background:rgba(0,245,255,.15);border:2px solid rgba(0,245,255,.4);position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);';
  zone.appendChild(bg); zone.appendChild(thumb); document.body.appendChild(zone);
  const fireBtn=document.createElement('div');
  fireBtn.style.cssText='position:fixed;bottom:100px;right:20px;width:80px;height:80px;border-radius:50%;border:2px solid rgba(0,245,255,.3);background:rgba(0,245,255,.08);display:flex;align-items:center;justify-content:center;font-size:28px;z-index:50;color:#00f5ff;';
  fireBtn.textContent='●'; document.body.appendChild(fireBtn);
  fireBtn.addEventListener('touchstart',e=>{e.preventDefault();firing=true;},{passive:false});
  fireBtn.addEventListener('touchend',e=>{e.preventDefault();firing=false;},{passive:false});
  zone.addEventListener('touchstart',e=>{e.preventDefault();const t=e.touches[0];mob.active=true;mob.sx=t.clientX;mob.sy=t.clientY;},{passive:false});
  document.addEventListener('touchmove',e=>{
    if(!mob.active) return; e.preventDefault();
    const t=e.touches[0],dx=t.clientX-mob.sx,dy=t.clientY-mob.sy;
    const d=Math.min(Math.hypot(dx,dy),MR),a=Math.atan2(dy,dx);
    mob.x=Math.cos(a)*d/MR; mob.y=Math.sin(a)*d/MR;
    thumb.style.transform=`translate(calc(-50% + ${Math.cos(a)*d}px),calc(-50% + ${Math.sin(a)*d}px))`;
  },{passive:false});
  document.addEventListener('touchend',()=>{mob.active=false;mob.x=0;mob.y=0;thumb.style.transform='translate(-50%,-50%)';});
}
if('ontouchstart' in window) initMobile();

/* ══════════════════════════════════════════════════════════
   SCREEN SHAKE + FLOATING SCORE
══════════════════════════════════════════════════════════ */
function screenShake(intensity=.5){camShake.t=intensity*.4;camShake.x=camShake.y=intensity;}

function floatScore(wx,wz,text,color='#00f5ff',boss=false){
  const v=new THREE.Vector3(wx,.5,wz).project(camera);
  const sx=(v.x*.5+.5)*window.innerWidth;
  const sy=(-.5*v.y+.5)*window.innerHeight;
  const el=document.createElement('div');
  el.className='fscore'+(boss?' boss':'');
  el.textContent=text; el.style.color=color; el.style.textShadow=`0 0 10px ${color}`;
  el.style.left=sx+'px'; el.style.top=sy+'px'; el.style.position='fixed';
  document.body.appendChild(el);
  setTimeout(()=>el.remove(),900);
}

/* ══════════════════════════════════════════════════════════
   HUD UPDATE
══════════════════════════════════════════════════════════ */
function updateHPBar(){const p=playerData.hp/playerData.maxHp;document.getElementById('hp-fill').style.width=(p*100)+'%';if(p<.3)document.getElementById('score-val').classList.add('warn');else document.getElementById('score-val').classList.remove('warn');}
function updateShieldBar(){document.getElementById('sh-fill').style.width=(playerData.shield/playerData.shieldMax*100)+'%';}
function updateHUD(){
  document.getElementById('score-val').textContent=gState.score;
  document.getElementById('kill-val').textContent=gState.kills;
  document.getElementById('mult-val').textContent='x'+gState.mult.toFixed(1);
}

function updateBuffTimers(dt){
  const buffs=playerData.buffs;
  ['speed','triple','laser','shield'].forEach(k=>{
    if(buffs[k]>0){
      buffs[k]-=dt;
      const pct=Math.max(0,buffs[k]/playerData.buffMax[k]);
      document.getElementById('bt-'+k).style.transform='scaleX('+pct+')';
      if(buffs[k]<=0){
        buffs[k]=0; document.getElementById('b-'+k).classList.remove('active');
        document.getElementById('bt-'+k).style.transform='scaleX(0)';
        if(k==='shield') playerData.shield=0;
      }
    }
  });
  // Shield bar
  if(buffs.shield>0) updateShieldBar();
  // Weapon display
  const wpn=buffs.laser>0?{icon:'⊸',name:'LASER BEAM'}:buffs.triple>0?{icon:'⊕',name:'TRIPLE SHOT'}:{icon:'●',name:'STANDARD'};
  document.getElementById('wpn-icon').textContent=wpn.icon;
  document.getElementById('wpn-name').textContent=wpn.name;
  // Multiplier decay
  if(gState.multTimer>0){
    gState.multTimer-=dt;
    if(gState.multTimer<=0&&gState.mult>1){
      gState.mult=Math.max(1,gState.mult-.5);
      document.getElementById('mult-val').textContent='x'+gState.mult.toFixed(1);
    }
  }
}

/* ══════════════════════════════════════════════════════════
   MINIMAP
══════════════════════════════════════════════════════════ */
const mm=document.getElementById('mmap');
const mmCtx=mm.getContext('2d');
function drawMinimap(){
  mmCtx.clearRect(0,0,110,110);
  const s=110/CFG.AW, hW=CFG.AW/2;
  const toMM=(wx,wz)=>[(wx+hW)*s,(wz+hW)*s];
  // floor
  mmCtx.fillStyle='rgba(0,245,255,.04)'; mmCtx.fillRect(0,0,110,110);
  // pillars
  pillars.forEach(p=>{const[mx,mz]=toMM(p.x,p.z);mmCtx.fillStyle='#1a2540';mmCtx.beginPath();mmCtx.arc(mx,mz,p.r*s,0,Math.PI*2);mmCtx.fill();});
  // enemies
  enemies.forEach(e=>{if(e.dead)return;const[mx,mz]=toMM(e.mesh.position.x,e.mesh.position.z);mmCtx.fillStyle=e.type==='BOSS'?'#ff2040':'#ff4060aa';mmCtx.beginPath();mmCtx.arc(mx,mz,e.type==='BOSS'?4:2.5,0,Math.PI*2);mmCtx.fill();});
  // powerups
  powerups.forEach(p=>{if(!p.userData.alive)return;const[mx,mz]=toMM(p.position.x,p.position.z);mmCtx.fillStyle='#ffff0088';mmCtx.beginPath();mmCtx.arc(mx,mz,2.5,0,Math.PI*2);mmCtx.fill();});
  // player
  const[px,pz]=toMM(playerData.pos.x,playerData.pos.z);
  mmCtx.fillStyle='#00f5ff'; mmCtx.beginPath(); mmCtx.arc(px,pz,4,0,Math.PI*2); mmCtx.fill();
  mmCtx.shadowColor='#00f5ff'; mmCtx.shadowBlur=6; mmCtx.fill(); mmCtx.shadowBlur=0;
  // border
  mmCtx.strokeStyle='rgba(0,245,255,.2)'; mmCtx.lineWidth=1; mmCtx.strokeRect(.5,.5,109,109);
}

/* ══════════════════════════════════════════════════════════
   RENDER LOOP
══════════════════════════════════════════════════════════ */
buildArena();
player=buildPlayer();

document.getElementById('start-btn').addEventListener('click',()=>{getA();startGame();});
document.getElementById('restart-btn').addEventListener('click',()=>{getA();startGame();});

let frameCount=0;
function loop(){
  requestAnimationFrame(loop);
  const dt=Math.min(clock.getDelta(),.05);
  const t=clock.elapsedTime;
  frameCount++;

  if(gState.phase!=='playing'||paused){
    renderer.render(scene,camera); return;
  }

  /* ── Player movement ── */
  const spd=CFG.PLAYER_SPD*(playerData.buffs.speed>0?1.8:1);
  const mx=(keys.d?1:0)-(keys.a?1:0)+(mob.active?mob.x:0);
  const mz=(keys.s?1:0)-(keys.w?1:0)+(mob.active?mob.y:0);
  if(mx!==0||mz!==0){
    const len=Math.hypot(mx,mz);
    playerData.pos.x+=mx/len*spd*dt;
    playerData.pos.z+=mz/len*spd*dt;
    playerData.angle=Math.atan2(mx,mz);
  }
  clampArena(playerData.pos);
  player.position.set(playerData.pos.x,.4,playerData.pos.z);
  player.rotation.y=playerData.angle+Math.PI;

  /* ── Aim ── */
  updateAim();
  player.rotation.y=Math.atan2(aimDir.x,aimDir.z);

  /* ── Shooting ── */
  playerData.fireTimer+=dt;
  const fr=CFG.FIRE_RATE*(playerData.buffs.laser>0?.4:playerData.buffs.triple>0?.9:1);
  if(firing&&playerData.fireTimer>=fr){playerData.fireTimer=0;shoot();}

  /* ── Enemy AI ── */
  const hasEnemies=updateEnemies(dt,t);
  // Boss ref tracking
  enemies.forEach(e=>{if(e.type==='BOSS'&&!e.dead){gState.bossRef=e;if(!document.getElementById('boss-bar').classList.contains('show'))document.getElementById('boss-bar').classList.add('show');}});

  /* ── Bullets ── */
  updateBullets(dt);
  checkCollisions();

  /* ── Power-ups ── */
  updatePowerups(dt,t);

  /* ── Particles ── */
  updateParticles(dt);

  /* ── Engine trail ── */
  updateTrail(dt);

  /* ── Buffs ── */
  updateBuffTimers(dt);
  if(playerData.hitCooldown>0) playerData.hitCooldown-=dt;

  /* ── Wave check ── */
  const activeEnemies=enemies.filter(e=>!e.dead);
  if(gState.waveActive&&activeEnemies.length===0){
    gState.waveActive=false;
    // Bonus for clearing wave
    const bonus=500*gState.wave*gState.mult;
    gState.score+=Math.round(bonus);
    floatScore(playerData.pos.x,playerData.pos.z,`WAVE CLEAR! +${Math.round(bonus)}`,'#00f5ff',true);
    updateHUD();
    setTimeout(nextWave,1500);
  }

  /* ── Pulsing lights ── */
  [ptA,ptB,ptC,ptD].forEach((l,i)=>{l.intensity=1.5+Math.sin(t*1.5+i)*.5;});

  /* ── Screen shake ── */
  if(camShake.t>0){
    camShake.t-=dt;
    camShake.x=camShake.t*(Math.random()-.5)*3;
    camShake.y=camShake.t*(Math.random()-.5)*2;
    if(camShake.t<=0){camShake.x=0;camShake.y=0;}
  }

  /* ── Camera follow ── */
  const tCamX=playerData.pos.x+camShake.x;
  const tCamY=CFG.CAM_H+camShake.y;
  const tCamZ=playerData.pos.z+CFG.CAM_DZ;
  camera.position.x+=(tCamX-camera.position.x)*dt*5;
  camera.position.y+=(tCamY-camera.position.y)*dt*5;
  camera.position.z+=(tCamZ-camera.position.z)*dt*5;
  camera.lookAt(playerData.pos.x,0,playerData.pos.z);

  /* ── Minimap (every 3 frames) ── */
  if(frameCount%3===0) drawMinimap();

  renderer.render(scene,camera);
}

// Init camera
camera.position.set(0,CFG.CAM_H,CFG.CAM_DZ);
camera.lookAt(0,0,0);
loop();
</script>
</body>
</html>
