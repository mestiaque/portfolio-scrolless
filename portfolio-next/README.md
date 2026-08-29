This is a [Next.js](https://nextjs.org) project bootstrapped with [`create-next-app`](https://nextjs.org/docs/app/api-reference/cli/create-next-app).

## Mobile-first scroll-frame portfolio

The hero section plays an image sequence (`public/frames/frame-001.webp` ...
`frame-210.webp`) frame-by-frame as the user scrolls, rendered to a
`<canvas>` via the reusable `ScrollFrameAnimation` component
(`src/components/ScrollFrameAnimation.tsx`).

This experience is intentionally **mobile-only**. On viewports 768px and
wider, `src/app/page.tsx` renders `DesktopNotice` instead of the hero/portfolio
content.

### Replacing the keyframe images

1. Export your video as a sequence of frames.
2. Convert them to WebP, resized to a mobile-appropriate width (the current
   set is 640px wide, ~9:16 aspect, ~12KB/frame):
   ```bash
   i=1
   for f in path/to/frames/*.jpg; do
     n=$(printf "%03d" $i)
     convert "$f" -resize 640x -quality 72 -define webp:method=6 \
       "public/frames/frame-${n}.webp"
     i=$((i+1))
   done
   ```
3. Update `FRAME_COUNT` in `src/lib/frames.ts` to match the new frame total.
4. If the new sequence has a different aspect ratio, update the
   `aspectRatio` prop passed to `ScrollFrameAnimation` in
   `src/components/Hero.tsx`.

### Tuning the scroll feel

- `SCROLL_LENGTH_VH` in `src/components/Hero.tsx` controls how much scroll
  distance maps to the full frame sequence (larger = slower scrub).
- `priorityCount` on `ScrollFrameAnimation` controls how many frames are
  eagerly preloaded before the hero is considered "ready"; the rest load
  progressively via `requestIdleCallback`.
- The render loop lerps the displayed frame toward the scroll-derived target
  frame (see the `tick` function in `ScrollFrameAnimation.tsx`) for a smooth,
  video-like scrub instead of a stepped one. Set the `prefers-reduced-motion`
  media query to snap directly to the target frame instead.

## Getting Started

```bash
npm run dev
```

Open [http://localhost:3000](http://localhost:3000) — resize your browser to
a mobile width (or use device emulation) to see the intended experience.
