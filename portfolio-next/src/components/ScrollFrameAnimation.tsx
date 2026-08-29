"use client";

import { useEffect, useRef, useState, useCallback, ReactNode } from "react";

export interface ScrollFrameAnimationProps {
  /** Ordered list of frame image URLs (index 0 = first frame). */
  frames: string[];
  /** Total number of frames available. Defaults to frames.length. */
  frameCount?: number;
  /** First frame index to use from `frames` (inclusive). */
  startFrame?: number;
  /** Last frame index to use from `frames` (inclusive). Defaults to frameCount - 1. */
  endFrame?: number;
  /** Intrinsic aspect ratio (width / height) of the source frames, used before the first image loads. */
  aspectRatio?: number;
  /** How many frames to eagerly preload before revealing the animation (rest load progressively). */
  priorityCount?: number;
  /** Scroll distance dedicated to the sequence, as viewport heights. Larger = slower scrub. */
  scrollLengthVh?: number;
  /** Called with a value in [0, 1] once the eager-preload batch has finished loading. */
  onReady?: () => void;
  /** Called on every rendered frame with progress in [0, 1]. Keep this cheap - it fires at scroll rate. */
  onProgress?: (progress: number) => void;
  className?: string;
  /** Overlay content (hero copy, scroll indicator, etc.), pinned above the canvas. */
  children?: ReactNode;
}

/**
 * Renders an image sequence to a <canvas> and scrubs through it based on
 * scroll position. The component owns its own tall scroll spacer (sized by
 * `scrollLengthVh`) with a `position: sticky` pane pinned inside it - the
 * spacer's height above/below the viewport is what scroll progress is
 * measured against, so this element must not be wrapped in another sticky
 * container.
 */
export default function ScrollFrameAnimation({
  frames,
  frameCount,
  startFrame = 0,
  endFrame,
  aspectRatio = 9 / 16,
  priorityCount = 24,
  scrollLengthVh = 400,
  onReady,
  onProgress,
  className = "",
  children,
}: ScrollFrameAnimationProps) {
  const total = frameCount ?? frames.length;
  const lastFrame = endFrame ?? total - 1;

  const containerRef = useRef<HTMLDivElement | null>(null);
  const stickyRef = useRef<HTMLDivElement | null>(null);
  const canvasRef = useRef<HTMLCanvasElement | null>(null);
  const imagesRef = useRef<(HTMLImageElement | null)[]>([]);
  const loadedRef = useRef<Set<number>>(new Set());
  const currentFrameRef = useRef<number>(startFrame);
  const targetFrameRef = useRef<number>(startFrame);
  const rafRef = useRef<number | null>(null);
  const dprRef = useRef(1);
  const sizeRef = useRef({ width: 0, height: 0 });
  const reducedMotionRef = useRef(false);

  const [isReady, setIsReady] = useState(false);

  const drawFrame = useCallback(
    (index: number) => {
      const canvas = canvasRef.current;
      if (!canvas) return;
      const ctx = canvas.getContext("2d");
      if (!ctx) return;

      const img = imagesRef.current[index];
      const { width, height } = sizeRef.current;
      if (!img || !img.complete || img.naturalWidth === 0 || width === 0) return;

      ctx.clearRect(0, 0, width, height);

      // cover-fit the frame inside the canvas without distorting aspect ratio
      const imgRatio = img.naturalWidth / img.naturalHeight;
      const boxRatio = width / height;
      let drawWidth = width;
      let drawHeight = height;
      if (imgRatio > boxRatio) {
        drawHeight = height;
        drawWidth = height * imgRatio;
      } else {
        drawWidth = width;
        drawHeight = width / imgRatio;
      }
      const dx = (width - drawWidth) / 2;
      const dy = (height - drawHeight) / 2;
      ctx.drawImage(img, dx, dy, drawWidth, drawHeight);
    },
    []
  );

  // Load a single frame image, lazily, at most once.
  const loadFrame = useCallback(
    (index: number, onLoad?: () => void) => {
      if (index < 0 || index >= frames.length) return;
      if (loadedRef.current.has(index)) {
        onLoad?.();
        return;
      }
      const img = new Image();
      img.decoding = "async";
      img.src = frames[index];
      img.onload = () => {
        loadedRef.current.add(index);
        onLoad?.();
      };
      imagesRef.current[index] = img;
    },
    [frames]
  );

  // Resize canvas to match the sticky pane's rendered box, accounting for DPR.
  const resizeCanvas = useCallback(() => {
    const pane = stickyRef.current;
    const canvas = canvasRef.current;
    if (!pane || !canvas) return;

    const rect = pane.getBoundingClientRect();
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    dprRef.current = dpr;

    const width = Math.round(rect.width * dpr);
    const height = Math.round(rect.height * dpr);
    if (canvas.width !== width || canvas.height !== height) {
      canvas.width = width;
      canvas.height = height;
    }
    sizeRef.current = { width, height };
    drawFrame(currentFrameRef.current);
  }, [drawFrame]);

  // Initial preload of a priority batch, then progressive background load of the rest.
  useEffect(() => {
    reducedMotionRef.current = window.matchMedia(
      "(prefers-reduced-motion: reduce)"
    ).matches;

    let cancelled = false;
    const rangeLength = lastFrame - startFrame + 1;
    const priority = Math.min(priorityCount, rangeLength);

    let loadedPriority = 0;
    for (let i = 0; i < priority; i++) {
      const idx = startFrame + i;
      loadFrame(idx, () => {
        loadedPriority++;
        if (!cancelled && loadedPriority >= priority) {
          setIsReady(true);
          onReady?.();
          drawFrame(currentFrameRef.current);
        }
      });
    }

    // Load the remaining frames in the background, without blocking readiness.
    const idleLoad = () => {
      if (cancelled) return;
      for (let i = priority; i < rangeLength; i++) {
        loadFrame(startFrame + i);
      }
    };
    const hasIdleCallback = typeof window.requestIdleCallback === "function";
    const idleId = hasIdleCallback
      ? window.requestIdleCallback(idleLoad, { timeout: 3000 })
      : window.setTimeout(idleLoad, 300);

    return () => {
      cancelled = true;
      if (hasIdleCallback) {
        window.cancelIdleCallback(idleId as number);
      } else {
        window.clearTimeout(idleId as number);
      }
    };
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [frames, startFrame, lastFrame, priorityCount]);

  // Scroll -> target frame mapping. Kept out of React state entirely.
  useEffect(() => {
    const container = containerRef.current;
    if (!container) return;

    const computeTargetFrame = () => {
      const rect = container.getBoundingClientRect();
      const viewportHeight = window.innerHeight;
      const scrollableDistance = rect.height - viewportHeight;
      if (scrollableDistance <= 0) return;

      // progress = 0 when the container's top just reaches the viewport top,
      // progress = 1 when the container's bottom reaches the viewport bottom.
      const progress = Math.min(
        1,
        Math.max(0, -rect.top / scrollableDistance)
      );

      const frameSpan = lastFrame - startFrame;
      const frame = Math.round(startFrame + progress * frameSpan);
      targetFrameRef.current = Math.min(lastFrame, Math.max(startFrame, frame));
      onProgress?.(progress);
    };

    const onScroll = () => computeTargetFrame();
    const onResize = () => {
      resizeCanvas();
      computeTargetFrame();
    };

    computeTargetFrame();
    resizeCanvas();

    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onResize);
    window.addEventListener("orientationchange", onResize);

    return () => {
      window.removeEventListener("scroll", onScroll);
      window.removeEventListener("resize", onResize);
      window.removeEventListener("orientationchange", onResize);
    };
  }, [startFrame, lastFrame, onProgress, resizeCanvas]);

  // Render loop: smoothly interpolate current frame toward the scroll target
  // and only touch the canvas (no React state) so scrolling never re-renders.
  useEffect(() => {
    const tick = () => {
      const current = currentFrameRef.current;
      const target = targetFrameRef.current;

      if (current !== target) {
        const next = reducedMotionRef.current
          ? target
          : current + (target - current) * 0.35;
        const snapped =
          Math.abs(target - next) < 0.6 ? target : Math.round(next);

        if (snapped !== current) {
          currentFrameRef.current = snapped;
          // ensure the frame (and a couple of neighbors) are requested even
          // if progressive background loading hasn't reached them yet
          loadFrame(snapped);
          drawFrame(snapped);
        }
      }

      rafRef.current = requestAnimationFrame(tick);
    };

    rafRef.current = requestAnimationFrame(tick);
    return () => {
      if (rafRef.current !== null) cancelAnimationFrame(rafRef.current);
    };
  }, [drawFrame, loadFrame]);

  return (
    <div
      ref={containerRef}
      style={{ height: `${scrollLengthVh}vh` }}
      className={`relative w-full ${className}`}
    >
      <div
        ref={stickyRef}
        className="sticky top-0 left-0 h-[100svh] w-full overflow-hidden bg-black"
      >
        <canvas
          ref={canvasRef}
          className="h-full w-full object-cover"
          style={{ aspectRatio }}
          aria-hidden="true"
        />
        {!isReady && (
          <div className="absolute inset-0 flex items-center justify-center bg-black">
            <div className="h-8 w-8 animate-spin rounded-full border-2 border-white/20 border-t-white/80" />
          </div>
        )}
        {children}
      </div>
    </div>
  );
}
