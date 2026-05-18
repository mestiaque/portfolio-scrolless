@php
	$isMobile = (new Jenssegers\Agent\Agent())->isMobile();
@endphp

@if(!$isMobile)
	@include('pordfolio::content.desk.job')
@else
	@include('pordfolio::content.mob.job')
@endif



<style>

/* job experience */
.job-wrap { margin-top:1.4rem; }
.job-head {
  font-family:var(--ff-b);
  font-size:clamp(1.8rem, 3.1vw, 3.15rem);
  font-weight:800;
  color:#3fb0ff;
  margin-bottom:1.35rem;
}
.job-timeline {
  position:relative;
  display:grid;
  gap:1.2rem;
  padding-left:2.4rem;
}
.job-timeline::before {
  content:'';
  position:absolute;
  left:.6rem;
  top:0;
  bottom:0;
  width:2px;
  background:linear-gradient(180deg, rgba(53,146,255,.7), rgba(53,146,255,.18));
}
.job-item {
  position:relative;
}
.job-item::before {
  content:'';
  position:absolute;
  left:-2.02rem;
  top:1.2rem;
  width:11px;
  height:11px;
  border-radius:50%;
  background:#2f9cff;
  box-shadow:0 0 0 3px rgba(47,156,255,.14), 0 0 14px rgba(47,156,255,.9);
}
.job-card {
  border:1px solid rgba(223,234,255,.72);
  border-radius:26px;
  padding:1.5rem 1.7rem;
  background:radial-gradient(circle at 55% 10%, rgba(58,128,222,.18), rgba(16,22,40,.84) 58%);
  box-shadow:inset 0 1px 0 rgba(255,255,255,.05);
}
.job-top {
  display:flex;
  justify-content:space-between;
  align-items:flex-start;
  gap:.8rem;
}
.job-top h4 {
  font-family:var(--ff-b);
  font-size:clamp(1.25rem, 2vw, 2.6rem);
  font-weight:800;
  color:#eff4ff;
}
.job-badge {
  font-size:.66rem;
  letter-spacing:.12em;
  text-transform:uppercase;
  color:#a8d2ff;
  border:1px solid rgba(125,178,255,.5);
  border-radius:999px;
  padding:.38rem .78rem;
  background:rgba(50,103,176,.28);
  font-weight:700;
  margin-top:.2rem;
}
.job-badge.muted {
  color:#9cb9d8;
  background:rgba(38,71,116,.26);
  border-color:rgba(109,152,210,.35);
}
.job-company {
  margin-top:.5rem;
  font-size:clamp(1rem, 1.15vw, 1.45rem);
  font-weight:600;
  color:#9fb7d4;
}
.job-desc {
  margin-top:.75rem;
  font-size:clamp(.92rem, 1.05vw, 1.25rem);
  line-height:1.65;
  color:#c8d4e7;
  max-width:66ch;
}
.job-year {
  margin-top:.8rem;
  font-size:.73rem;
  letter-spacing:.16em;
  text-transform:uppercase;
  color:#9ab6d8;
}

</style>