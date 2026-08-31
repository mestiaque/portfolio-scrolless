@php
    // A fresh id per include - pattern/gradient ids must be unique when
    // this partial is used more than once on the same page.
    $hexId = 'hexPattern' . uniqid();
@endphp
{{-- Pure CSS/SVG hexagon network background (no image assets) - a true
     tiling honeycomb line pattern (SVG <pattern>, so hexagons stay a
     constant real size no matter how tall the section is) plus a handful
     of fixed-size cyan glow spotlights, matching the reference
     network/tech-pattern look. --}}
<div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden" aria-hidden="true">
    <svg width="100%" height="100%">
        <defs>
            <pattern id="{{ $hexId }}" width="72.75" height="126" patternUnits="userSpaceOnUse">
                <g fill="none" stroke="rgba(94,214,255,0.28)" stroke-width="1.25">
                    <polygon points="0.00,-42.00 36.37,-21.00 36.37,21.00 0.00,42.00 -36.37,21.00 -36.37,-21.00" />
                    <polygon points="36.37,21.00 72.75,42.00 72.75,84.00 36.37,105.00 0.00,84.00 0.00,42.00" />
                </g>
                <g fill="rgba(120,224,255,0.6)">
                    <circle cx="0.00" cy="-42.00" r="1.8" />
                    <circle cx="36.37" cy="-21.00" r="1.8" />
                    <circle cx="36.37" cy="21.00" r="1.8" />
                    <circle cx="0.00" cy="42.00" r="1.8" />
                    <circle cx="-36.37" cy="21.00" r="1.8" />
                    <circle cx="-36.37" cy="-21.00" r="1.8" />
                    <circle cx="72.75" cy="42.00" r="1.8" />
                    <circle cx="72.75" cy="84.00" r="1.8" />
                    <circle cx="36.37" cy="105.00" r="1.8" />
                    <circle cx="0.00" cy="84.00" r="1.8" />
                </g>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#{{ $hexId }})" />
    </svg>

    {{-- fixed-size glow spotlights - sized in px, not tied to the SVG tile
         or the section's height, so they stay tight highlights on any
         section rather than scaling into a wash. --}}
    <div class="absolute -left-16 -top-16 h-72 w-72 rounded-full bg-cyan-300/25 blur-[70px]"></div>
    <div class="absolute left-[2%] top-[38%] h-56 w-56 rounded-full bg-cyan-300/15 blur-[60px]"></div>
    <div class="absolute right-[4%] top-[8%] h-64 w-64 rounded-full bg-cyan-300/15 blur-[65px]"></div>
</div>
