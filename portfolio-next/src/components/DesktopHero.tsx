"use client";

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
  {
    label: "LinkedIn",
    href: contact.socials.find((s) => s.label === "LinkedIn")?.href,
    icon: iconPaths.linkedin,
  },
];

const heroLinks = heroLinksRaw.filter(
  (link): link is { label: string; href: string; icon: React.ReactNode } =>
    Boolean(link.href)
);

/**
 * No frame sequence for laptop/desktop/tablet yet, so this is a
 * typography-led hero instead of the mobile scroll-scrub: big name,
 * generous negative space, a subtle animated backdrop instead of imagery.
 * Swap in a real visual later without touching anything else - this is an
 * isolated component.
 */
export default function DesktopHero() {
  return (
    <section className="relative flex min-h-screen w-full items-center overflow-hidden bg-black px-12 lg:px-24">
      {/* subtle decorative backdrop standing in for imagery */}
      <div className="pointer-events-none absolute inset-0">
        <div className="absolute left-1/2 top-1/2 h-[70vh] w-[70vh] -translate-x-1/2 -translate-y-1/2 rounded-full border border-white/[0.06]" />
        <div className="absolute left-1/2 top-1/2 h-[50vh] w-[50vh] -translate-x-1/2 -translate-y-1/2 rounded-full border border-white/[0.06]" />
        <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_0%,black_75%)]" />
      </div>

      <div className="relative z-10 max-w-4xl">
        <p className="mb-6 text-xs font-medium uppercase tracking-[0.4em] text-white/60">
          {heroContent.jobTitle}
        </p>
        <span className="mb-6 block h-px w-14 bg-white/30" />
        <h1 className="text-[clamp(3rem,7vw,7rem)] font-bold leading-[0.98] tracking-tight text-white">
          {heroContent.name}
        </h1>

        <div className="mt-10 flex items-center gap-4">
          {heroLinks.map((link) => (
            <a
              key={link.label}
              href={link.href}
              target={link.href.startsWith("http") ? "_blank" : undefined}
              rel={link.href.startsWith("http") ? "noopener noreferrer" : undefined}
              aria-label={link.label}
              className="flex h-12 w-12 items-center justify-center rounded-full border border-white/25 text-white/80 transition-colors duration-200 hover:border-white hover:text-white"
            >
              <Icon path={link.icon} size={20} />
            </a>
          ))}
        </div>
      </div>

      <div className="pointer-events-none absolute inset-x-0 bottom-10 flex flex-col items-center gap-2">
        <span className="text-[10px] font-medium uppercase tracking-[0.35em] text-white/40">
          Scroll to explore
        </span>
        <span className="animate-bounce text-white/40">↓</span>
      </div>
    </section>
  );
}
