"use client";

import { useCallback, useRef, useState } from "react";
import ScrollFrameAnimation from "./ScrollFrameAnimation";
import { getFrameUrls, FRAME_COUNT } from "@/lib/frames";
import { hero as heroContent, contact } from "@/lib/content";
import { Icon, iconPaths } from "./icons";

const heroLinksRaw: { label: string; href: string | undefined; icon: React.ReactNode }[] = [
  {
    label: "Email",
    href: `mailto:${contact.email}`,
    icon: iconPaths.email,
  },
  {
    label: "Telegram",
    href: contact.telegram
      ? `https://t.me/${contact.telegram.replace(/^@/, "")}`
      : undefined,
    icon: iconPaths.telegram,
  },
  {
    label: "WhatsApp",
    href: contact.phone
      ? `https://wa.me/${contact.phone.replace(/[^\d]/g, "")}`
      : undefined,
    icon: iconPaths.whatsapp,
  },
  {
    label: "GitHub",
    href: contact.socials.find((s) => s.label === "GitHub")?.href,
    icon: iconPaths.github,
  },
];

const heroLinks = heroLinksRaw.filter(
  (link): link is { label: string; href: string; icon: React.ReactNode } =>
    Boolean(link.href)
);

const frames = getFrameUrls();

// One extra viewport of scroll distance per frame-second of "footage" -
// tuned so 210 frames feels like scrubbing a few seconds of cinematic video
// rather than flicking through stills. Increase for a slower, longer scrub.
const SCROLL_LENGTH_VH = 400;

export default function Hero() {
  const [hasScrolled, setHasScrolled] = useState(false);
  const [progress, setProgress] = useState(0);
  const scrolledRef = useRef(false);

  const handleProgress = useCallback((p: number) => {
    setProgress(p);
    if (!scrolledRef.current && p > 0.02) {
      scrolledRef.current = true;
      setHasScrolled(true);
    }
  }, []);

  // The screen starts as a full black title card with the hero copy visible.
  // From the very first scroll input (progress 0), a horizontal split
  // curtain opens from the middle - the top half slides up and the bottom
  // half slides down - revealing the animation underneath. The hero copy is
  // only meant to be read against the black card, so it fades/lifts away
  // quickly as soon as scrolling starts, finishing before the curtain has
  // opened far enough to show the frame underneath it.
  const SPLIT_END = 0.18;
  const TEXT_OUT_END = 0.07;

  const splitProgress = Math.min(1, progress / SPLIT_END);

  const textT = Math.min(1, progress / TEXT_OUT_END);
  const textOpacity = 1 - textT;
  const textTranslate = -textT * 24;

  return (
    <ScrollFrameAnimation
      frames={frames}
      frameCount={FRAME_COUNT}
      aspectRatio={640 / 1138}
      priorityCount={30}
      scrollLengthVh={SCROLL_LENGTH_VH}
      onProgress={handleProgress}
    >
      {/* Hero copy overlay - stays above the split curtain panels so the
          name is legible on the initial full-black title card */}
      <div
        className="pointer-events-none absolute inset-0 z-30 flex flex-col items-center justify-center px-6 text-center"
        style={{
          opacity: textOpacity,
          transform: `translateY(${textTranslate}px)`,
        }}
      >
        <p className="mb-5 text-xs font-medium uppercase tracking-[0.4em] text-white/60">
          {heroContent.jobTitle}
        </p>
        <span className="mb-5 h-px w-10 bg-white/30" />
        <h1 className="text-[13vw] font-bold leading-[0.98] tracking-tight text-white [text-wrap:balance]">
          {heroContent.name}
        </h1>

        {/* CTA row - real contact channels, not decorative */}
        <div className="pointer-events-auto mt-8 flex items-center gap-3">
          {heroLinks.map((link) => (
            <a
              key={link.label}
              href={link.href}
              target={link.href.startsWith("http") ? "_blank" : undefined}
              rel={link.href.startsWith("http") ? "noopener noreferrer" : undefined}
              aria-label={link.label}
              className="flex h-11 w-11 items-center justify-center rounded-full border border-white/25 text-white/80 transition-colors duration-200 active:border-white active:text-white"
            >
              <Icon path={link.icon} />
            </a>
          ))}
        </div>
      </div>

      {/* Scroll indicator - sits above the black curtain so it's visible
          while the screen is still fully black */}
      <div
        className="pointer-events-none absolute inset-x-0 bottom-8 z-20 flex flex-col items-center gap-2 transition-opacity duration-500"
        style={{ opacity: hasScrolled ? 0 : 1 }}
      >
        <span className="text-[10px] font-medium uppercase tracking-[0.35em] text-white/50">
          Scroll to explore
        </span>
        <span className="animate-bounce text-white/50">↓</span>
      </div>

      {/* subtle vignette for contrast under the text */}
      <div className="pointer-events-none absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/60" />

      {/* split curtain: two black panels meeting at the middle, sliding
          fully off-screen (up / down) as the reveal completes */}
      <div
        className="pointer-events-none absolute inset-x-0 top-0 z-10 h-1/2 bg-black"
        style={{ transform: `translateY(${-splitProgress * 100}%)` }}
      />
      <div
        className="pointer-events-none absolute inset-x-0 bottom-0 z-10 h-1/2 bg-black"
        style={{ transform: `translateY(${splitProgress * 100}%)` }}
      />
    </ScrollFrameAnimation>
  );
}
